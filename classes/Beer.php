<?php
 class Beer{
     private $_db, $_data;

     public function __construct(){
        $this -> _db = DB::getInstance();
     }

     public function getBeers(){
         $data = $this -> _db -> get("product", array('id_product', '!=', ''));
         if($data -> results() > 0){
             $beers = $data -> results();
             return $beers;
         }
        
     }

     public function getBeer($id){
        $data = $this -> _db -> get("product", array('id_product', '=', $id));
         if($data -> results() > 0){
             $beer = $data -> results();
             return $beer;
         }
     }

     public function insertNewBeer($id_category, $name, $description, $price, $image, $origin) {
         $this -> _db -> insert("product", array(
            'id_category' => $id_category,
            'name' => $name,
            'description' => $description,
            'price' => $price,
            'origin' => $origin,
            'image' => $image
         ));
     }

     public function updateBeer($id_product, $id_category, $name, $description, $price){
         $this -> _db -> update("product", 'id_product', $id_product, array(
            'id_category' => $id_category,
            'name' => $name,
            'description' => $description,
            'price' => $price
         ));
     }

     public function updateImage($id, $image){
        $this -> _db -> update("product", 'id_product', $id, array(
           'image' => $image
        ));
    }

     public function deleteBeer($id){
         $this -> _db -> delete("product", array('id_product', '=', $id));
     }

     public function imageResize($image, $width, $height) {
        $target_width = 300;
        $target_height = 300;

        $target_layer = imagecreatetruecolor($target_width, $target_height);
        imagecopyresampled($target_layer, $image, 0, 0, 0, 0, $target_width, $target_height, $width, $height);

        return $target_layer;
    }

 }