<?php

session_start();

/* Valid PHP Version? */
$minPhpVersion = '8.0';
if(phpversion() < $minPhpVersion){
    die("You PHP version must be {$minPhpVersion} or higher to run this app. You current version is " . phpversion());
}

/* Pah to this file */
define('ROOTPATH', __DIR__ . DIRECTORY_SEPARATOR);

require "../app/core/init.php";

DEBUG ? ini_set('display_errors', 1) : ini_set('display_errors', 0);

$app = new App;
$app->loadController();