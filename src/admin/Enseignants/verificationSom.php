<?php
    $sqltest = "SELECT id
    			FROM Personnel
                WHERE som = '$som'
                AND id != '$oldCin'";

    if(mysqli_num_rows(mysqli_query($conn, $sqltest))){
        header('location: ./?errsom');
        exit();
    }
?>