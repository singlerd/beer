<?php
require_once __DIR__ . '/../core/init.php';
$beer = new Beer();

if(isset($_POST['btn_upload'])){
    $post_names = array("id_category", "name", "description", "price", "origin");
    foreach ($post_names as $var) { 
        if (isset($_POST["$var"]))
            $$var = $_POST["$var"];
        else
            $$var = "";
    }
    
    if(isset($_POST['update_id_product'])){
        $id_product = $_POST['update_id_product'];
        $beer -> updateBeer($id_product, $id_category, $name, $description, $price);
        Redirect::to("../admin.php?messageBeer=1");
    }
    else {
        $file = $_FILES['image']['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $folderPath = "../images/beers/";
        if(!file_exists($folderPath)){
            mkdir($folderPath);
        }
        
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];

        switch ($imageType) {


            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
                $targetLayer = $beer -> imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName. "_resize.". $ext);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file); 
                $targetLayer = $beer -> imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$folderPath. $fileNewName. "_resize.". $ext);
                break;

            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 
                $targetLayer = $beer -> imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName. "_resize.". $ext);
                break;

            default:
                Redirect::to("../admin.php?messageBeer=3");
                exit;
                break;
        }

        move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
    
        if(isset($_POST["image_update_id_product"])){
            $id = $_POST["image_update_id_product"];
            $beer -> updateImage($id, $fileNewName. "_resize.". $ext);
            Redirect::to("../admin.php?messageBeer=4");
        }
        else{
            $beer -> insertNewBeer($id_category, $name, $description, $price, $origin,$fileNewName. "_resize.". $ext);
            Redirect::to("../admin.php?messageBeer=2");
        }
    }
}
