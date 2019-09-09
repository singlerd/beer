// Locations
// List locations
$(document).ready(function() {
    $("#locations").hide();
    $("#listLocations").click(function() { 
        if($("#locations").is(":visible")){
            $("#locations").hide();
        }
        else{
            $("#locations").show(); 
            $.ajax({  
                type: "POST",
                url: "admin/get_locations.php",             
                dataType: "html",                  
                success: function(response){                
                    $("#locations").html(response);
                }
            });
        }    
});
});

// Add values to update modal for specific location
$(document).on("click", ".updateModal", function(){
    let id = this.id;
    $.post("admin/get_location.php", {id: id}, function(data){
        let obj = JSON.parse(data);
        let update_id_location = obj[0].id;
        let pub_name = obj[0].pub_name;
        let description = obj[0].description;
        let website_link = obj[0].website_link;
        let lat = obj[0].lat;
        let lng = obj[0].lng;
        let city_address = obj[0].city_address;
        $("#update_id_location").val(update_id_location);
        $("#update_pub_name").val(pub_name);
        $("#update_description").val(description);
        $("#update_website_link").val(website_link);
        $("#update_lat").val(lat);
        $("#update_lng").val(lng);
        $("#update_city_address").val(city_address);
        $("#updateLocationModal").modal("show");
    });
});

// Add image to update modal for specific location
$(document).on("click", ".updateImageModal", function(){
    let id = this.id;
    $.post("admin/get_location.php", {id: id}, function(data){
        let obj = JSON.parse(data);
        let image_update_id_location = obj[0].id;
        let pub_image = obj[0].pub_image;
        $("#image_update_id_location").val(image_update_id_location);
        $("#pub_image").attr("src", "images/locations/" + pub_image);
        $("#updateImageModal").modal("show");
    });
});

// Delete location
$(document).on("click", ".deleteLocation", function(){
    let id = this.id;
    $.post("admin/delete_location.php?id_location=" + id, function(data){
        $.ajax({  
            type: "POST",
            url: "admin/get_locations.php",             
            dataType: "html",                  
            success: function(response){                
                $("#locations").html(response);
            }
        });
    })
})

// Beers
// List beers
$(document).ready(function() {
    $("#beers").hide();
    $("#listBeers").click(function() { 
        if($("#beers").is(":visible")){
            $("#beers").hide();
        }
        else{
            $("#beers").show(); 
            $.ajax({  
                type: "POST",
                url: "admin/get_beers.php",             
                dataType: "html",                  
                success: function(response){                
                    $("#beers").html(response);
                }
            });
        }    
});
});

// Add values to update modal for specific beer
$(document).on("click", ".updateBeerModal", function(){
    let id = this.id;
    $.post("admin/get_beer.php", {id: id}, function(data){
        let obj = JSON.parse(data);
        let update_id_product = obj[0].id_product;
        let update_id_category = obj[0].id_category;
        let update_name = obj[0].name;
        let update_beer_description = obj[0].description;
        let update_price = obj[0].price;
        $("#update_id_product").val(update_id_product);
        $("#update_id_category").val(update_id_category);
        $("#update_name").val(update_name);
        $("#update_beer_description").val(update_beer_description);
        $("#update_price").val(update_price);
        $("#updateBeerModal").modal("show");
    });
});

// Add image to update modal for specific beer
$(document).on("click", ".updateImageBeerModal", function(){
    let id = this.id;
    $.post("admin/get_beer.php", {id: id}, function(data){
        let obj = JSON.parse(data);
        let image_update_id_product = obj[0].id_product;
        let beer_image = obj[0].image;
        $("#image_update_id_product").val(image_update_id_product);
        $("#beer_image").attr("src", "images/beers/" + beer_image);
        $("#updateImageBeerModal").modal("show");
    });
});

// Delete beer
$(document).on("click", ".deleteBeer", function(){
    let id = this.id;
    $.post("admin/delete_beer.php?id_product=" + id, function(data){
        $.ajax({  
            type: "POST",
            url: "admin/get_beers.php",             
            dataType: "html",                  
            success: function(response){                
                $("#beers").html(response);
            }
        });
    })
})

// Search locations
$(document).ready(function() {
    $("#search_result").hide();
    $("#search_form").on("submit", function(e) { 
        e.preventDefault();
        let search_words = $("#search_words").val();
        $("#search_result").show();     
        $.ajax({  
            type: "POST",
            data: {search_words: search_words},
            url: "operations/search_locations.php",                  
            success: function(response){                
                $("#search_result").html(response);
            }
        });
            
    });
});

$(document).on("click", ".closeSearch", function(){
    if($("#search_result").is(":visible")){
        $("#search_result").hide();
    }
})

