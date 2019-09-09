<?php
require_once __DIR__ . '/../core/init.php';
$user = new User();
$search = new Mobile();
$search_results = null;
$favorite_locations = null;
$fav_location[] = null;

if($user -> isLoggedIn()){
    $id_user = $user -> data() -> id_user;
    $favorite_locations = $search -> getFavoritesForUser($id_user);
    if(count((array)$favorite_locations) > 0){
        foreach($favorite_locations as $fl){
            $fav_location[] = $fl -> id_location;
        }
    }
}

if(isset($_POST["search_words"])){
    $search_words = $_POST["search_words"];
    $search_results = $search -> searchLocation($search_words);
    if(count((array)$search_results) > 0){
        foreach ($search_results as $result){
            $id_location[] = $result -> id;
            $coordinates[] = array($result -> lat, $result -> lng);
            $pub_name[] = $result -> pub_name;  
        } 
        echo "<div class='row animated zoomInRight'>";
        echo "<div class='col-12 col-sm-12 col-md-12 text-center'><button class='closeSearch btn-sm btn btn-info'>Zatvori pretragu</button></div>";
        echo "<div class='col-12 col-sm-12 col-md-12'><hr></div>";
        echo "<div class='col-4 col-sm-4 col-md-4 mt-2'>Naziv</div>";
        echo "<div class='col-4 col-sm-4 col-md-3 mt-2'>Prikaži na mapi</div>";
        echo "<div class='col-4 col-sm-4 col-md-3 mt-2'>Dodaj u favorite</div>";
        echo "<div class='col-12 col-sm-12 col-md-12'><hr></div>";
        for($i = 0; $i < count($pub_name); $i++){  
            echo "<div class='col-4 col-sm-4 col-md-4'>$pub_name[$i]</div>";
            echo "<div class='col-4 col-sm-4 col-md-4'><button id='" . json_encode($coordinates[$i]) . "' class='showOnMap btn-sm btn btn-warning'><i class='fa fa-map-marker'></i></button></div>";
            if($user -> isLoggedIn()){
                $id_user = $user -> data() -> id_user;
                $favorites = array($id_user, $id_location[$i]);
                if(!in_array($id_location[$i], $fav_location)){
                    echo "<div class='col-4 col-sm-4 col-md-4'><button id='" . json_encode($favorites) . "' class='addTofavorite btn-sm btn btn-warning'><i class='fa fa-check'></i></button></div>";
                }
                else{
                    echo "<div class='col-4 col-sm-4 col-md-4'>Već je u favoritima</div>";
                } 
            }
            else{
                echo "<div class='col-4 col-sm-4 col-md-4'>Niste prijavljeni</div>";
            }
            echo "<div class='col-12 col-sm-12 col-md-12'><hr></div>";
        }
        echo "</div>";
    }
    else{
        echo "<div class='row animated zoomInLeft'>";
        echo "<div class='col-6 col-sm-6 col-md-6 mt-2'>Nema takve lokacije</div>";
        echo "<div class='col-6 col-sm-6 col-md-6'><button class='closeSearch btn-sm btn btn-info'>Zatvori</button></div>";
        echo "</div>";
    }
}
?>

