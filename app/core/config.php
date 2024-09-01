<?php

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