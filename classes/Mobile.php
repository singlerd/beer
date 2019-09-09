<?php
 class Mobile{
     private $mobile;
     //private $location = "com.example.marko997.app";
     private $_db, $_data;

     public function __construct(){
        $this -> _db = DB::getInstance();
//        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
//            $request = $_SERVER['HTTP_X_REQUESTED_WITH'];
//            if (strpos($request, $this -> location) !== false) {
//                $this -> mobile = true;
//            }
//        }
//        else {
//            $this -> mobile = false;
//        }
    
     }

//     public function detectAndroidApp() {
//        $redirect = new Redirect();
//        if(!empty($_SERVER['HTTP_X_REQUESTED_WITH'])){
//            $request = $_SERVER['HTTP_X_REQUESTED_WITH'];
//            if (strpos($request, $this -> location) !== false) {
//                require "includes/header.php";
//                require "includes/navigation.php";
//                require "includes/here_maps_content.php";
//                require "includes/footer.php";
//            }
//            else {
//                $redirect -> to("blog_post.php");
//            }
//        }
//        else {
//            $redirect -> to("blog_post.php");
//        }
//
//     }

     public function test(){
        require "includes/header.php";
        require "includes/navigation.php";
        require "includes/here_maps_content.php";
        require "includes/footer.php";
     }

     public function getLocations(){
         $data = $this -> _db -> get("beer_locations", array('id', '!=', ''));
         if($data -> results() > 0){
             $locations = $data -> results();
             return $locations;
         }
        
     }

     public function getLocation($id){
        $data = $this -> _db -> get("beer_locations", array('id', '=', $id));
         if($data -> results() > 0){
             $locations = $data -> results();
             return $locations;
         }
     }

     public function isAndroidApp() {  
         return $this -> mobile;
     }

     public function insertNewLocation($lat, $lng, $website_link, $pub_name, $description, $city_address, $pub_image) {
         $this -> _db -> insert("beer_locations", array(
            'lat' => $lat,
            'lng' => $lng,
            'website_link' => $website_link,
            'pub_name' => $pub_name,
            'description' => $description,
            'city_address' => $city_address,
            'pub_image' => $pub_image
         ));
     }

     public function updateLocation($id, $lat, $lng, $website_link, $pub_name, $description, $city_address){
         $this -> _db -> update("beer_locations", 'id', $id, array(
            'lat' => $lat,
            'lng' => $lng,
            'website_link' => $website_link,
            'pub_name' => $pub_name,
            'description' => $description,
            'city_address' => $city_address
         ));
     }

     public function updateImage($id, $pub_image){
        $this -> _db -> update("beer_locations", 'id', $id, array(
           'pub_image' => $pub_image
        ));
    }

     public function deleteLocation($id){
         $this -> _db -> delete("beer_locations", array('id', '=', $id));
     }

     public function searchLocation($search_words){
        $connection = $this -> _db -> getDb();
        $search_words = "";
        $search_words_array = array();
        $location_ids = array();
        $search_result = null;

        if(isset($_POST['search_words'])){
            $search_words = $_POST['search_words'];
        
            $search_words = trim($search_words);
            $temp = explode(" ", $search_words);
            $search_words_array = array_filter($temp);
            $search_words_array = array_unique($search_words_array);
            $search_words_array = array_values($search_words_array);
            
            for($i = 0; $i < count($search_words_array); $i++){
                $stmt_1 = $connection -> prepare("SELECT * FROM beer_locations WHERE pub_name LIKE '%$search_words_array[$i]%' OR city_address LIKE '%$search_words_array[$i]%'");
                $stmt_1 -> execute();
                if($stmt_1 -> rowCount() > 0){
                    while($row_1 = $stmt_1 -> fetch(PDO::FETCH_BOTH)){
                        $location_ids[] = $row_1['id'];
                    }
                }
            }

            if(!empty($location_ids)){
                $location_ids = array_unique($location_ids);
                sort($location_ids);
                $locations = join(",", $location_ids);

                $stmt_2 = $connection -> prepare("SELECT * FROM beer_locations WHERE id IN ($locations)");
                $stmt_2 -> execute();
                if($stmt_2 -> rowCount() > 0){
                    $search_result = $stmt_2 -> fetchAll(PDO::FETCH_OBJ);
                    return $search_result;
                }
            }
        }
     }

     public function addToFavorites($id_user, $id_location){
        $this -> _db -> insert("favorite_locations", array(
            'id_user' => $id_user,
            'id_location' => $id_location,
         ));
     }

     public function getFavoritesForUser($id_user){
        $connection = $this -> _db -> getDb();
        $favorite_locations = null;
        $stmt = $connection -> prepare("SELECT * FROM favorite_locations WHERE id_user = '$id_user'");
        $stmt -> execute();
        if($stmt -> rowCount() > 0){
            $favorite_locations = $stmt -> fetchAll(PDO::FETCH_OBJ);
            return $favorite_locations;
        }

     }

     public function deleteFromFavorites($id_location){
        $this -> _db -> delete("favorite_locations", array('id_location', '=', $id_location));
     }

     public function imageResize($image, $width, $height) {
        $target_width = 170;
        $target_height = 150;

        $target_layer = imagecreatetruecolor($target_width, $target_height);
        imagecopyresampled($target_layer, $image, 0, 0, 0, 0, $target_width, $target_height, $width, $height);

        return $target_layer;
    }
 }