<?php
/**
* Created by PhpStorm.
* User: Daniel
* Date: 11/18/2018
* Time: 21:15
*/

class Config {
    public static function get($path = null){
        if($path){
            $config = $GLOBALS['config'];
            $path = explode('/', $path);

            foreach ($path as $bit){
                if(isset($config[$bit])){
                    $config = $config[$bit];
                }
            }
            return $config;
        }
        return false;
    }
}