<?php

defined('ROOTPATH') OR exit('Access Denied!');

check_extensions();
function check_extensions(){
    $required_extensions = [
        'gd',
        'mysqli',
        'pdo_mysql',
        'pdo_sqlite',
        'curl',
        'fileinfo',
        'intl',
        'exif',
        'mbstring',
    ];

    $not_loaded = [];

    foreach ($required_extensions as $ext){

        if(!extension_loaded($ext)){
            $not_loaded[] = $ext;
        }
    }

    if(!empty($not_loaded)){
        show("Please load the following extensions in your php.ini file: <br>".implode("<br>", $not_loaded));
        die;
    }
}

function show($stuff){
    echo "<pre>";
    print_r($stuff);
    echo "</pre>";
}

function esc($str){
    return htmlspecialchars($str);
}

function redirect($path){
    header("Location:".ROOT."/".$path);
    die;
}

/* Load image. if not exist, load placeholder */
function get_image(mixed $file = '',string $type = 'post'):string{

    $file = $file ?? '';
    if(file_exists($file)){
        return ROOT . "/" . $file;
    }

    if($type == 'user'){
        return ROOT."/assests/images/user.jpg";
    }else{
        return ROOT."/assests/images/no_image.jpg";
    }
}

/* Returns pagination links*/
function get_pagination_vars(){
    $vars = [];
    $vars['page'] = $_GET['page'] ?? 1;
    $vars['page'] = (int)$vars['page'];
    $vars['prev_page'] = $vars['page'] <= 1 ? 1 : $vars['page'] - 1;
    $vars['next_page'] = $vars['page'] + 1;

    return $vars;
}

/* Saves or displays a saved message to the user */
function message(string $msg = null, bool $clear = false){
    $ses = new Core\Session();

    if(!empty($msg)){
        $ses->set('message',$msg);
    }else{
        if(!empty($ses->get('message'))){
            
            $msg = $ses->get('message');

            if($clear){
                $ses->pop('message');
            }
            return $msg;
        }

        return false;
    }
}

/* Displays input values after a page refresh */
function old_checked(string $key, string $value , string $default = ""){
    
    if(isset($POST[$key])){
        if($POST[$key] == $value){
            return ' checked ';
        }
    }else{

        if($_SERVER['REQUEST_METHOD'] == 'GET' && $default == $value){
            return ' checked ';
        }
    }
    return '';
}

//Example: <input type="old_value('email', 'example@email.com')" name="" id="">
function old_value(string $key, mixed $default = "", string $mode = 'post'){
    $POST = ($mode == 'post') ? $_POST : $_GET;
    if(isset($POST[$key])){
        return $POST[$key];
    }

    return $default;
}

function old_select(string $key, mixed $value , mixed $default = "", string $mode = 'post'){
    $POST = ($mode == 'post') ? $_POST : $_GET;
    if(isset($POST[$key])){
        if($POST[$key] == $value){
            return ' selected ';
        }
    }else{

        if($default == $value){
            return ' selected ';
        }
    }

    return '';
}

/* Returns a user readable date format */
//2024-09-07 -> 07th September, 2024
function get_date($date){
    return date("jS M, Y",strtotime($date));
}