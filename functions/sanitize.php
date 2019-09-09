<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/18/2018
 * Time: 21:20
 */

function escape($string){
    return htmlentities($string, ENT_QUOTES, 'UTF-8');

}