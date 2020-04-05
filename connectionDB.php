<?php

    $conn= mysqli_connect('localhost', 'root' , '' , 'gestion_filieres_formation' );
    try{
        if (mysqli_connect_errno()) 
            throw new Exception("something goeas wrong with connceting");
    }catch(Exception $e){
        echo $e->getMessage();
    }
?>