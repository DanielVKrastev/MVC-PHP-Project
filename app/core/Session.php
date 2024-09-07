<?php

/*
Session Class
Save or read data to the current session 
*/

//$ses = new \Core\Session;

namespace Core;

defined('ROOTPATH') OR exit('Access Denied!');

class Session{
    
    public $mainkey = 'APP';
    public $userkey = 'USER';

    /* activate session if not yet started */
    private function start_session(){
        if(session_status() === PHP_SESSION_NONE){
            session_start();
        }
        return 1;
    }

    /* Put data into the session */
    //$_SESSION['key'] = 'value';
    public function set(mixed $keyOrArray, mixed $value = ''){
        $this->start_session();

        if(is_array($keyOrArray)){
            foreach($keyOrArray as $key => $value){
                $_SESSION[$this->mainkey][$key] = $value;
            }

            return 1;
        }

        $_SESSION[$this->mainkey][$keyOrArray] = $value;

        return 1;
    }

    /* Get data from the session. Default is return is data not found */
    public function get(string $key, mixed $default = ''){

        //echo $ses->get('john', 'mary');
        $this->start_session();

        if(isset($_SESSION[$this->mainkey[$key]])){
            return $_SESSION[$this->mainkey[$key]];
        }
        
        return $default;
    }

    /* Saves the user row data omtp the session after a login*/
    public function auth(mixed $user_row){

        $this->start_session();

        $_SESSION[$this->userkey] = $user_row;

        return 0;
    }

    /* Removes user data from the session */
    public function logout(){
        $this->start_session();

        if(!empty($_SESSION[$this->userkey])){
            unset($_SESSION[$this->userkey]);
        }

        return 0;
    }

    /* Checks if user is logged in */
    public function is_logged_in(){
        $this->start_session();

        if(!empty($_SESSION[$this->userkey])){
            return true;
        }

        return false;
    }

    // user('email')
    /* Gets data fro a column in the session user data */
    public function user(string $key = '', mixed $default = ''){
        $this->start_session();

        if(empty($key) && !empty($_SESSION[$this->userkey])){

            return $_SESSION[$this->userkey];
        }else if(!empty($_SESSION[$this->userkey]->$key)){

                return $_SESSION[$this->userkey]->$key;
        }

        return $default;
    }

    /* Return data from a key and deletes it */
    public function pop(string $key, mixed $default = ''){
        $this->start_session();

        if(!empty($_SESSION[$this->userkey][$key])){

            $value = $_SESSION[$this->userkey][$key];
            unset($_SESSION[$this->userkey][$key]);
            return $value;
        }

        return $default;
    }

    /* Returns all data from the APP array */
    public function  all(){
        $this->start_session();

        if(isset($_SESSION[$this->mainkey])){
            return $_SESSION[$this->mainkey];
        }

        return [];
    }
}