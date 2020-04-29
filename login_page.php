<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Prompt:ital,wght@1,500&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./layout/css/materialize.min.css">
    <title>login in</title>
</head>
<style>
    * {
        padding: 0px;
        margin: 0px;
        box-sizing: border-box;
    }

    body {
        font-family: 'poppins', sans-serif;
        background: rgb(226, 231, 238);
        background: linear-gradient(232deg, rgba(226, 231, 238, 1) 33%, rgba(100, 144, 162, 1) 87%);
        background-position: center;
        background-attachment: fixed;
        background-size: cover;
        overflow: auto;

    }

    h2 {
        font-size: 35px;
        font-weight: bold;
        text-transform: capitalize;
        color: black;
        text-align: center;
        font-family: 'Prompt', sans-serif;
    }

    form {
        width: 16px;
    }

    .profileimg {

        width: 70px;
        height: 70px;
        border-radius: 50%;
    }

    .img {
        text-align: center;
    }

    .btn {
        display: block;
        width: 100%;
        height: 50px;
        border-radius: 25px;
        outline: none;
        border: none;
        background-color: #536DFE;
        background-size: 200%;
        font-family: 'poppins', sans-serif;
        font-weight: bold;
        letter-spacing: 1px;
        color: #fff;
        margin: 1rem 0;
        cursor: pointer;
        transition: .5s;
    }
    .x{
        margin-top: 8%;
        margin-left: 30%;
        font-size: 25px;
        font-weight: bold;
        color:black;
    }
</style>

<body>
    <header>
      <a class="btn-floating pulse" href="index.php"><span class="x">&times;</span></a>
    </header>
    <div class="container">
        <div class="row">
            <div class="col s12 m12 l6">
                <div style="margin-top: 170px;"></div>
                <img src="img/login/login.svg" class="img-responsive" width="370px" height="350px">
            </div>
            <div class="col s12 m12 l6 ">
                <div style="margin-top: 80px;"></div>
                <div class="img">
                    <img src="img/login/profile.svg" alt="" class="profileimg">
                </div>
                <h2>Login as admin</h2>
                <form class="col s12" method="POST" action="validation_login.php">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="email" type="text" name="email" class="validate">
                            <label for="email">Email</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="password" type="password" name="password" class="validate">
                            <label for="password">Password</label>
                        </div>
                    </div>
                    <?php
                        $fullurl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
                        if (strpos($fullurl, "login=failed")) {
                                echo '<p style="color:#d63031;"><b>Email or password invalide</b></p>';
                        }
                    ?>
                    <button class="btn waves-effect waves-light" type="submit">Log in
                    </button>
                </form>

            </div>
        </div>
    </div>
    <script type="text/javascript" src="./layout/js/jquery-3.4.1.min.js"></script>
    <script type="text/javascript" src="./layout/js/materialize.min.js"></script>
    <script>
        $(document).ready(function() {
            M.updateTextFields();
        });
        $(document).ready(function(){
    $('.sidenav').sidenav();
  });
        
    </script>
</body>

</html>