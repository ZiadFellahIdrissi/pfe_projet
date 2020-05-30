<?php
    $sqltest = "SELECT id
    			FROM Personnel
                WHERE id = '$cin'
                AND id != '$oldCin'";

    if(mysqli_num_rows(mysqli_query($conn, $sqltest))){
        header('location: ./?inserting=failed');
        exit();
    }
?>