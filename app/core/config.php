<?php

if($_SERVER['SERVER_NAME'] == 'localhost'){

    define('ROOT', 'http://localhost/mvc-php-project/public'); //website name

}else{

    define('ROOT', 'http://www.mywebsite.com'); 
    
}