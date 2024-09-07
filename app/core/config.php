<?php

defined('ROOTPATH') OR exit('Access Denied!');

if($_SERVER['SERVER_NAME'] == 'localhost'){

    /*Database config */
    define('DBNAME', 'my_db_mvc');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');
    
    define('ROOT', 'http://localhost/mvc-php-project/public'); //website name

}else{

    /*Database config */
    define('DBNAME', 'my_db_mvc');
    define('DBHOST', 'localhost');
    define('DBUSER', 'root');
    define('DBPASS', '');
    define('DBDRIVER', '');

    define('ROOT', 'http://www.mywebsite.com'); 
    
}

define('APP_NAME', 'My Website');
define('APP_DESC', 'Best website on the planet');

//true means show errors
define('DEBUG', true);