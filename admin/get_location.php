<?php
require_once __DIR__ . '/../core/init.php';
$db = DB::getInstance();
$con = $db -> getDb();
if(isset($_POST['id'])){
    $id = $_POST['id'];
    $stmt = $con -> prepare("SELECT * FROM beer_locations WHERE id = '$id'");
    $stmt -> execute();
    $result = $stmt -> fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($result);
}

   
    
    