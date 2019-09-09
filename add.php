<?php

session_start();

if (!isset($_SESSION['user'])) {
    header("Location:blog_post.php");
    exit();
}

require "store/db_config.php";

$amount = (int)mysqli_real_escape_string($connection, $_POST['amount']);
$id_product = (int)mysqli_real_escape_string($connection, $_POST['id_product']);

if (is_numeric($amount) AND $amount > 0) {
    //$_SESSION['cart'][$id_product] = $amount+$_SESSION['cart'][$id_product];
    $_SESSION['cart'][$id_product] += $amount; // INSERT $_SESSION['cart'][3] = 12;
    // $_SESSION['cart'][$id_product] = $amount; // UPDATE $_SESSION['cart'][3] = 12;
}

header("Location:cart_content.php");
exit();

?>