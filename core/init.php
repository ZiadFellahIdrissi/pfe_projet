<?php
    session_start();
    $GLOBALS['config'] = array(
        'mysql' => array(
            'host' => 'localhost',
            'username' => 'root',
            'password' => '',
            'db' => 'gestionfilieres'
        ),
        'remember' => array(
            'cookie_name' => 'remember',
            'cookie_expiry' => 604800
        ),
        'session' => array(
            'session_name'=>'user',
            'session_cin' => 'cin'
        )
    );

    spl_autoload_register('myAutoLoader');

    function myAutoLoader($className){
        $path = $_SERVER['DOCUMENT_ROOT']."/pfe_projet/Classes/";
        $ext = ".class.php";
        $fullPath = $path.$className.$ext;
        include_once $fullPath;
    }
?>