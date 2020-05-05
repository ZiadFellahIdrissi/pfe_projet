<!DOCTYPE html>
<html>

<head>
    <title>Animated Login Form</title>
    <link rel="stylesheet" type="text/css" href="../../../layout/css/login.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body style="background: rgb(216,216,227);
background: linear-gradient(232deg, rgba(216,216,227,1) 33%, rgba(19,98,130,1) 76%);">
<a href="../../../index.php"><span class="x">&times;</span></a>
    <div class="container">
    
        <div class="img">
            <img src="../../../img/login/bg1.svg" height="320px">
        </div>
        <div class="login-content">
            <form action="./" method="POST">
                <img src="../../../img/login/avatar.svg">
                <h2 class="title">Welcome</h2>
                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-user"></i>
                    </div>
                    <div class="div">
                        <h5>Username</h5>
                        <input type="text" name="username" class="input">
                    </div>
                </div>
                <div class="input-div pass">
                    <div class="i">
                        <i class="fas fa-lock"></i>
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input type="password" name="password" class="input">
                    </div>
                </div>
                <a href="#">Forgot Password?</a>
                <input type="submit" class="btn" name="login" value="Login">
            </form>
        </div>
    </div>
    <script type="text/javascript" src="../../../layout/js/login.js"></script>
</body>

</html>