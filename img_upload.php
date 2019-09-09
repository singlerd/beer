<?php
session_start();
require 'store/db_config.php';
require 'store/functions.php';

if ($_FILES['file']["error"] > 0) {
    echo "Something went wrong during file upload!";
} else {
    if (isset($_FILES["file"]) AND is_uploaded_file($_FILES['file']['tmp_name'])) {

        $fileName = $_FILES['file']["name"];
        $fileTemp = $_FILES["file"]["tmp_name"];
        $fileSize = $_FILES["file"]["size"];
        $fileType = $_FILES["file"]["type"];
        $fileError = $_FILES['file']["error"];


        $directory = "images/profile";

        $upload = "$directory/$fileName";


        if (!is_dir($directory))
            mkdir($directory);

        if (!file_exists($upload)) {
            if (move_uploaded_file($fileTemp, $upload)) {
                //echo "Upload of $fileName was successful!";
                header("Location:profile.php");
            } else
                echo "<p><b>Error!</b></p>";
        } else
           // echo "<p><b>File with this name already exists!</b></p>";
        header("Location:profile.php");
    }


    $id_user = $_SESSION['user'];

    insert_profile_image($fileName,$id_user);


}
?>
