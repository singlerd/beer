<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/18/2018
 * Time: 21:19
 */

session_start();
$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password' => '',
        'db' => 'beer',
        'charset' => 'charset=utf8'

    ),
    'remember' => array(
        'cookie_name' => 'hash',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name' => 'user',
        'token_name' => 'token'
    )
);

spl_autoload_register(function ($class){
   require_once __DIR__ . '/../classes/' .$class. '.php';
});
require_once __DIR__ . '/../functions/sanitize.php';
if(Cookie::exists(Config::get('remember/cookie_name')) && !Session::exists(Config::get('session/session_name'))){
   $hash = Cookie::get(Config::get('remember/cookie_name'));
   $hashCheck = DB::getInstance()->get('users_session', array('hash', '=', $hash));

   if($hashCheck->count()){
       $user = new User($hashCheck->first()->user_id);
       $user->login();
   }
}
