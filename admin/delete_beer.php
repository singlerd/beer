<?php
require_once __DIR__ . '/../core/init.php';
$beer = new Beer();

if(isset($_GET['id_product'])){
    $id = $_GET['id_product'];
    $beer -> deleteBeer($id);
}