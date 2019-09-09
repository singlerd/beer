<?php
require_once __DIR__ . '/../core/init.php';
$mobile = new Mobile();

if(isset($_POST['btn_upload'])){
    $post_names = array("pub_name", "description", "website_link", "lat", "lng", "city_address");
    foreach ($post_names as $var) { 
        if (isset($_POST["$var"]))
            $$var = $_POST["$var"];
        else
            $$var = "";
    }
    
    if(isset($_POST['update_id_location'])){
        $id = $_POST['update_id_location'];
        $mobile -> updateLocation($id, $lat, $lng, $website_link, $pub_name, $description, $city_address);
        Redirect::to("../admin.php?messageLocation=1");
    }
    else {
        $file = $_FILES['image']['tmp_name']; 
        $sourceProperties = getimagesize($file);
        $fileNewName = time();
        $folderPath = "../images/locations/";
        if(!file_exists($folderPath)){
            mkdir($folderPath);
        }
        
        $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
        $imageType = $sourceProperties[2];

        switch ($imageType) {


            case IMAGETYPE_PNG:
                $imageResourceId = imagecreatefrompng($file); 
                $targetLayer = $mobile -> imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagepng($targetLayer,$folderPath. $fileNewName. "_resize.". $ext);
                break;

            case IMAGETYPE_GIF:
                $imageResourceId = imagecreatefromgif($file); 
                $targetLayer = $mobile -> imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagegif($targetLayer,$folderPath. $fileNewName. "_resize.". $ext);
                break;

            case IMAGETYPE_JPEG:
                $imageResourceId = imagecreatefromjpeg($file); 
                $targetLayer = $mobile -> imageResize($imageResourceId,$sourceProperties[0],$sourceProperties[1]);
                imagejpeg($targetLayer,$folderPath. $fileNewName. "_resize.". $ext);
                break;

            default:
                Redirect::to("../admin.php?messageLocation=3");
                exit;
                break;
        }

        move_uploaded_file($file, $folderPath. $fileNewName. ".". $ext);
    
        if(isset($_POST["image_update_id_location"])){
            $id = $_POST["image_update_id_location"];
            $mobile -> updateImage($id, $fileNewName. "_resize.". $ext);
            Redirect::to("../admin.php?messageLocation=4");
        }
        else{
            $mobile -> insertNewLocation($lat, $lng, $website_link, $pub_name, $description, $city_address, $fileNewName. "_resize.". $ext);
            Redirect::to("../admin.php?messageLocation=2");
        }
    }
}
