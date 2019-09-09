<?php
require "core/init.php";
$user = new User();
$db = DB::getInstance();
$con = $db -> getDb();
if($user -> isLoggedIn()){
    if($user -> hasPermission('admin')){
        require "includes/header.php";
        require "includes/navigation.php";
        require "admin/admin_content.php";
        require "includes/footer.php";
    }
    else {
        Redirect::to("blog_post.php");
    }
 }
 else {
    Redirect::to("blog_post.php");
 }

?>