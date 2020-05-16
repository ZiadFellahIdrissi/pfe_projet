<?php
    $conn=mysqli_connect('localhost', 'root', '', 'gestionfilieres');
    if (mysqli_connect_errno()){
        echo "Connection failed!";
		exit();
    }
?>
