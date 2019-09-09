<?php
require_once __DIR__ . '/../core/init.php';
$mobile = new Mobile();

if(isset($_GET['id_location'])){
    $id = $_GET['id_location'];
    $mobile -> deleteLocation($id);
}