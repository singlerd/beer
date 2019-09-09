<?php
require_once __DIR__ . '/../core/init.php';
$mobile = new Mobile();
if(isset($_POST["id_user"]) and isset($_POST["id_location"])){
    $id_user = $_POST["id_user"];
    $id_location = $_POST["id_location"];
    $mobile -> addToFavorites($id_user, $id_location);
}
