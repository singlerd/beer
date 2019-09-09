<?php

require_once 'core/init.php';

$user = new User();
$user->logout();

//var_dump(DB::getInstance());



Redirect::to('blog_post.php');