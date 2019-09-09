<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/18/2018
 * Time: 21:18
 */

class User{
    private $_db,
            $_data,
            $_sessionName,
            $_cookieName,
            $_isLoggedIn;

    public function  __construct($user = null){
        $this->_db = DB::getInstance();


        $this->_sessionName = Config::get('session/session_name');
        $this->_cookieName = Config::get('remember/cookie_name');


        if(!$user){
            if(Session::exists($this->_sessionName)){
                $user = Session::get($this->_sessionName);

                if($this->find($user)){
                    $this->_isLoggedIn = true;

                }
            }

        }else{
            $this->find($user);
        }
    }
    public function update($fields = array(), $id = null){
        if(!$id && $this->isLoggedIn()){
            $id = $this->data()->id_user;
        }

        if(!$this->_db->update('users', 'id_user', $id, $fields)){
            throw new Exception('There was a problem updating');

        }

    }
    public function create($fields) {
        if(!$this->_db->insert('users', $fields)){
            throw new Exception('There was a problem creating an acount');

        }
    }
    public function find($user = null){
        if($user){

            $field = (is_numeric($user)) ? 'id_user' : 'email';
            $data = $this->_db->get('users',array($field, '=', $user));

            if($data->count()){
                $this->_data = $data->first();
                return true;

            }
        }
        return false;

    }
    public function login($username = null, $password = null, $remember = false){


        if(!$username && !$password && $this->exists()){
           Session::put($this->_sessionName, $this->data()->id_user);


        }else {

            $user = $this->find($username);
            if ($user) {
                    $if = $this->data()->password === Hash::make($password, $this->data()->salt);

                if ($if) {


                    Session::put($this->_sessionName, $this->data()->id_user);

                    if ($remember) {
                        $hash = Hash::unique();
                        var_dump($hash);
                        $hashCheck = $this->_db->get('users_session', array('user_id', '=', $this->data()->id_user));



                        if (!$hashCheck->count()) {
                            $this->_db->insert('users_session', array(
                                'user_id' => $this->data()->id_user,
                                'hash' => $hash
                            ));


                        } else {
                            $hash = $hashCheck->first()->hash;
                        }

                        Cookie::put($this->_cookieName, $hash, Config::get('remember/cookie_expiry'));


                    }
                    return true;
                }
            }
        }

        return false;

    }
    public function hasPermission($key){
        $group = $this->_db->get('groups',array('id', '=', $this->data()->group));
       // print_r($group->first());

        if($group->count()){
            $permissions = json_decode($group->first()->permissions, true);



            if($permissions[$key] == true){
                return true;

            }
        }

        return false;
    }
    public function exists(){
        return (!empty($this->data())) ? true : false;
    }
    public function logout(){

        $this->_db->delete('users_session', array('user_id', '=', $this->data()->id_user));

        Session::delete($this->_sessionName);
        Cookie::delete($this->_cookieName);
    }
    public function data(){
        return $this->_data;
    }
    public function isLoggedIn(){
        return $this->_isLoggedIn;
    }

}