<?php
	error_reporting(0);
    $conn=mysqli_connect('localhost', 'root', '', 'gestionfilieres');
    error_reporting(E_ALL);
    if (mysqli_connect_errno()){
        echo "Connection failed!";
		exit();
    }
?>
