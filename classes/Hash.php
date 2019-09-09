<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/18/2018
 * Time: 21:15
 */

class Hash{
    public static function make($string, $salt = ''){
        return hash('sha256', $string . $salt);

    }

    public static function salt(){
        return hash('md5', 'hahijhjkHJKHHjkhajkwhehh@hjk');

    }

    public static function unique(){
        return self::make(uniqid());
    }

}