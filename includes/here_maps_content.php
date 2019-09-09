<?php 
require_once __DIR__ . '/../core/init.php';
$mobile = new Mobile();
$user = new User();
$locations_exist = false;
$locations = $mobile -> getLocations();
$lat = array();
$lng = array();
$website_link = array();
$pub_name = array();
$description = array();
$city_address = array();
$image = array();
if($locations != null or !empty($locations)){
    $locations_exist = true;
    foreach ($locations as $location){
        $lat[] = $location -> lat;
        $lng[] = $location -> lng;
        $website_link[] = $location -> website_link;
        $pub_name[] = $location -> pub_name;
        $description[] = $location -> description;
        $city_address[] = $location -> city_address;
        $image[] = $location -> pub_image;
    } 
}
?>
<div class="card-body card-body-cascade text-center">
    <div class="animated fadeIn" id="map" style="width: 100%; height: 400px; background: grey"></div>
    <div class="pt-3">
        <div class="row pb-3">
            <div class="col-6 col-sm-6 col-md-6">
                <button id="all_locations" type="button" class="btn btn-sm peach-gradient">Sve lokacije</button>
            </div>
            <?php if($user -> isLoggedIn()) { ?>
            <div class="col-6 col-sm-6 col-md-6">
                <button id="my_favs" type="button" class="btn btn-sm aqua-gradient">Moji favoriti</button>
            </div>
            <?php } else {
                echo "<div class='col-6 col-sm-6 col-md-6'>Prijavi se da vidiš favorite</div>";
            } 
            ?>
        </div>
        <form id="search_form" action="operations/search_locations.php" method="POST">
            <div class="form-group">
                <label for="search_words">Pretraga lokacija</label>
                <input type="text" class="form-control" name="search_words" id="search_words" placeholder="Pretraga lokacija">
            </div>
            <button type="submit" class="btn btn-sm blue-gradient">Pretraži</button>
        </form>
        <div class="pt-3" id="search_result"></div>
    </div>
    
</div>
 <script>
//  Vanilla JS for Maps
    let locations_exist = <?php echo json_encode($locations_exist); ?>;
    
    if(locations_exist){
        let lat = <?php echo json_encode($lat); ?>;
        let lng = <?php echo json_encode($lng); ?>;
        let website_link = <?php echo json_encode($website_link); ?>;
        let pub_name = <?php echo json_encode($pub_name); ?>;
        let description = <?php echo json_encode($description); ?>;
        let city_address = <?php echo json_encode($city_address); ?>;
        let image = <?php echo json_encode($image); ?>;

        function addMarkerToGroup(group, coordinate, html) {
            let icon = new H.map.Icon("images/beer.png");
            let marker = new H.map.Marker(coordinate, {icon: icon});
            marker.setData(html);
            group.addObject(marker);
        }

        function addInfoBubble(map) {
            let group = new H.map.Group();

            map.addObject(group);

            group.addEventListener('tap', function (evt) {
            let bubble =  new H.ui.InfoBubble(evt.target.getPosition(), {
                content: evt.target.getData()
            });
            ui.addBubble(bubble);
        }, false);

            for (let i in lat) {
                addMarkerToGroup(group, {lat:lat[i], lng:lng[i]},
                '<div>' + 
                '<h5>' + pub_name[i] + '</h5>' + 
                '<p>' + description[i] + '</p>' +
                '<p>' + city_address[i] + '</p>' +
                '<p><a href="' + website_link[i] + '">Pritisni za sajt!</a></p>' + 
                '<img width="170px" height="150px" src="images/locations/' + image[i] + '" alt="">' +
                '</div>');
            }
        }
    }
    
    let platform = new H.service.Platform({
        app_id: 'BbtT7X7r0VjvVDiO8hG6',
        app_code: 'ZzgF7tyr7cMOgygkgEHJBw',
        useHTTPS: true
    });

    let pixelRatio = window.devicePixelRatio || 1;
    let defaultLayers = platform.createDefaultLayers({
        tileSize: pixelRatio === 1 ? 256 : 512,
        ppi: pixelRatio === 1 ? undefined : 320
    });

    let map = new H.Map(document.getElementById('map'),
    defaultLayers.normal.map, {pixelRatio: pixelRatio});

    let behavior = new H.mapevents.Behavior(new H.mapevents.MapEvents(map));
    
    let ui = H.ui.UI.createDefault(map, defaultLayers);
    function moveMapToSubotica(map){
        map.setCenter({lat:46.0945, lng:19.66376});
        map.setZoom(14);
    }

    function moveMapTo(map, current_lat, current_lnt){
        map.setCenter({lat: current_lat, lng: current_lnt});
        map.setZoom(25);
    }

    moveMapToSubotica(map);
    addInfoBubble(map);

    function showAndroidToast(toast) {
        Android.showToast(toast);
    }

    // jQuery + Ajax (has to be here because it communicates with Android Java, function above)
    $(document).on("click", ".showOnMap", function(){
        let id = this.id;
        let obj = JSON.parse(id);
        let current_lat = obj[0];
        let current_lng = obj[1];
        moveMapTo(map, current_lat, current_lng);
    });

    // Add to favorites via search
    $(document).on("click", ".addTofavorite", function(){
        let id = this.id;
        let obj = JSON.parse(id);
        let id_user = obj[0];
        let id_location = obj[1];
        let search_words = $("#search_words").val();
        $.ajax({  
            type: "POST",
            url: "operations/add_to_favorites.php",  
            data: {id_user: id_user, id_location: id_location},
            dataType: "html",                  
            success: function(){                            
                $("#search_result").show();     
                $.ajax({  
                    type: "POST",
                    data: {search_words: search_words},
                    url: "operations/search_locations.php",                  
                    success: function(response){                
                        $("#search_result").html(response);
                    }
                });
                showAndroidToast("Uspešno ste dodali u favorite!");
            }
        });
    });

    // Add to favorites via all locations
    $(document).on("click", ".addTofavoritesAllLocations", function(){
        let id = this.id;
        let obj = JSON.parse(id);
        let id_user = obj[0];
        let id_location = obj[1];
        $.ajax({  
            type: "POST",
            url: "operations/add_to_favorites.php",  
            data: {id_user: id_user, id_location: id_location},
            dataType: "html",                  
            success: function(){                            
                $("#search_result").show();     
                $.ajax({  
                    type: "POST",
                    url: "operations/list_all_locations.php",                  
                    success: function(response){                
                        $("#search_result").html(response);
                    }
                });
                showAndroidToast("Uspešno ste dodali u favorite!");
            }
        }); 
    });
    
    // List all locations
    $(document).on("click", "#all_locations", function(){
        $.ajax({  
            type: "POST",
            url: "operations/list_all_locations.php",
            dataType: "html",                  
            success: function(response){                            
                $("#search_result").show();               
                $("#search_result").html(response);  
            }
        });
    });

    // List favorites
    $(document).on("click", "#my_favs", function(){
        $.ajax({  
            type: "POST",
            url: "operations/list_my_favorites.php",
            dataType: "html",                  
            success: function(response){                            
                $("#search_result").show();                       
                $("#search_result").html(response);
            }
        });
    });

    // Delete from favorites
    $(document).on("click", ".deleteFromFavorites", function(){
        let id = this.id;
        $.post("operations/delete_from_favorites.php?id_location=" + id, function(data){
            $.ajax({  
                type: "POST",
                url: "operations/list_my_favorites.php",             
                dataType: "html",                  
                success: function(response){                
                    $("#search_result").html(response);
                    showAndroidToast("Uspešno ste obrisali iz favorita!");
                }
            });
        })
    });
 
</script>

