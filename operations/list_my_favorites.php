<?php
require_once __DIR__ . '/../core/init.php';
$db = DB::getInstance();
$connection = $db -> getDb();
$user = new User();
$mobile = new Mobile();
$all_locations = null;
$favorite_locations = null;
$fav_location = array();
$id_user = null;

if($user -> isLoggedIn()){
    $id_user = $user -> data() -> id_user;
    $favorite_locations = $mobile -> getFavoritesForUser($id_user);
    if(count((array)$favorite_locations) > 0){
        foreach($favorite_locations as $fl){
            $fav_location[] = $fl -> id_location;
        }
        $favorites = join(",", $fav_location);
        $stmt = $connection -> prepare("SELECT * FROM beer_locations WHERE id IN ($favorites)");
        $stmt -> execute();
        if($stmt -> rowCount() > 0){
            $all_locations = $stmt -> fetchAll(PDO::FETCH_OBJ);
        }
        if(count((array)$all_locations) > 0){
            foreach ($all_locations as $result){
                $coordinates[] = array($result -> lat, $result -> lng);
                $pub_name[] = $result -> pub_name;  
            }
            echo "<div class='row animated zoomInRight'>";
            echo "<div class='col-12 col-sm-12 col-md-12 text-center'><button class='closeSearch btn-sm btn btn-info'>Zatvori</button></div>";
            echo "<div class='col-12 col-sm-12 col-md-12'><hr></div>";
            echo "<div class='col-4 col-sm-4 col-md-4 mt-2'>Naziv</div>";
            echo "<div class='col-4 col-sm-4 col-md-3 mt-2'>Prikaži na mapi</div>";
            echo "<div class='col-4 col-sm-4 col-md-3 mt-2'>Obriši iz favorita</div>";
            echo "<div class='col-12 col-sm-12 col-md-12'><hr></div>";
            for($i = 0; $i < count($pub_name); $i++){  
                echo "<div class='col-4 col-sm-4 col-md-4'>$pub_name[$i]</div>";
                echo "<div class='col-4 col-sm-4 col-md-4'><button id='" . json_encode($coordinates[$i]) . "' class='showOnMap btn-sm btn btn-warning'><i class='fa fa-map-marker'></i></button></div>";
                echo "<div class='col-4 col-sm-4 col-md-4'><button id='" . $fav_location[$i] . "' class='deleteFromFavorites btn-sm btn btn-danger'><i class='fa fa-times'></i></button></div>";
                echo "<div class='col-12 col-sm-12 col-md-12'><hr></div>";
            }
            echo "</div>"; 
        }
    }
    else{
        echo "<div class='row animated zoomInLeft'>";
        echo "<div class='col-6 col-sm-6 col-md-6 mt-2'>Trenutno nemate favorite</div>";
        echo "<div class='col-6 col-sm-6 col-md-6'><button class='closeSearch btn-sm btn btn-info'>Zatvori</button></div>";
        echo "</div>";
    }
}

?>

