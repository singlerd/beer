<?php
/**
 * Created by PhpStorm.
 * User: Daniel
 * Date: 11/18/2018
 * Time: 21:19
 */

class Validate{
    private $_passed = false,
            $_errors = array(),
            $_db = null;

    public function __construct(){
        $this->_db = DB::getInstance();
    }
    public function check($source, $items = array()){
        foreach ($items as $item => $rules){
            foreach ($rules as $rule => $rule_value){

                $value = trim($source[$item]);
                $item = escape($item);

                if($rule === 'required' && empty($value)){
                    $this->adError("{$item} is required");

                }elseif(!empty($value)){
                    switch ($rule){
                        case 'min':
                            if(strlen($value) < $rule_value){
                                $this->adError("{$item} must be a minimum of {$rule_value} characters. ");
                            }
                            break;
                        case 'max':
                            if(strlen($value) > $rule_value){
                                $this->adError("{$item} must be a maximum of {$rule_value} characters. ");
                            }

                            break;
                        case 'matches':
                            if($value != $source[$rule_value]){
                                $this->adError("{$rule_value} must match {$item}");
                            }

                            break;
                        case 'unique':

                            $check = $this->_db->get($rule_value,array($item, '=', $value));
                            if($check ->count() ){
                                $this->adError("{$item} already exists");
                            }


                            break;



                    }
                }
            }
        }
        if(empty($this->_errors)){
            $this->_passed = true;
        }
        return $this;

    }
    private  function adError($error){
        $this->_errors[] = $error;
    }
    public function errors(){
        return $this->_errors;
    }
    public function passed(){
        return $this->_passed;
    }
}