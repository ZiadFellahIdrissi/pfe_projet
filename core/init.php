<?php   
session_start();

$GLOBALS['config'] = array(
    'mysql' => array(
        'host' => '127.0.0.1',
        'username' => 'root',
        'password'=> '',
        'db' => 'gestionfilieres'
    ),
    'remember' => array(
        'cookie_name' => 'remember',
        'cookie_expiry' => 604800
    ),
    'session' => array(
        'session_name'=>'user'
    )
);

spl_autoload_register('myAutoLoader');

function myAutoLoader($className){
    $path = "../../../Classes/";
    $ext = ".class.php";
    $fullPath = $path . $className . $ext;
    include_once $fullPath;
}