<?php
   
    $usernameLogin=$_POST["email"];
    $userPassword=$_POST["password"];

    if( $usernameLogin=='admin' and $userPassword=='admin' ){
        header('location: src/admin/pages/');
    }
    else{
        header('location: login_page.php?login=failed');
    }

?>