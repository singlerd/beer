<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/18/2018
 * Time: 21:15
 */

class Cookie{
    public static function exists($name){
        return(isset($_COOKIE[$name])) ? true : false;

    }

    public static function get($name){
        return $_COOKIE[$name];
    }
    public static function put($name, $value, $expiry){
        if(setcookie($name, $value, time() + $expiry, '/')){
            return true;
        }
        return false;
    }
    public static function delete($name){
        self::put($name, '',time()-1);
    }
}