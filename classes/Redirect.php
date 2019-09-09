<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/18/2018
 * Time: 21:16
 */

class Redirect{
    public static function to($location = null){
        if($location){
            if(is_numeric($location)){
                switch ($location){
                    case 404:
                        //header('HTTP/1.0 404 Not Found');
                        include 'includes/errors/404.php';
                        exit();
                        break;
                    case 'no_profile':
                        include 'login.php';
                        exit();
                        break;
                }
            }
            header('Location:'.$location);
            exit();
        }

    }
}