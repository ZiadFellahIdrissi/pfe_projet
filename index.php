<!doctype html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#563d7c">
  <link href="./layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="./layout/css/index.css" rel="stylesheet" type="text/css" />
  <link href="./layout/css/womanIndex.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <title>Welcome</title>
</head>
<style>
  .header-content .h1 {
    font-size: 20px;
    font-weight: bold;
    text-transform: capitalize;
    color: black;
  }

  .header-content p {
    letter-spacing: 1px;
    font-weight: 300;
    text-transform: capitalize;
  }
</style>

<body>
  <header>
    <nav class="navbar navbar-expand-md navbar-light fixed-top ">
      <a class="navbar-brand" href="#">Our Logo</a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Test</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Test</a>
          </li>
          <li class="nav-item text-nowrap ">
            <a class="btn btn-outline-dark" href="./src/admin/pages/login.php">Espace Admin</a>
          </li>
          <li class="nav-item text-nowrap ">
            <a class="btn btn-outline-dark" href="./src/login">Connexion</a>
          </li>

        </ul>
      </div>

      <!-- <form class="form-inline mt-2 mt-md-0">
          <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form> -->

    </nav>
    <div class="container">
      <div class="header-content">
        <div class="row">
          <div class="col-lg-6" style="text-align: left;">
            <div style="margin-top: 150px;"></div>
            <h1>Nouveau ici?</h1>
            <p>Si vous êtes nouveau ici et vous faites partie de ce faculté, veuillez activer votre compte via ce button ci-dessous.</p>
            <p><a class="btn btn-lg btn-outline-dark" href="src/signup" title="Activer votre compte">Activer votre compte</a></p>
            <div class="go-about"></div>
          </div>
          <div class="col-lg-6">
            <div style="margin-top: 150px;"></div>
              <?php
                include './img/index/teacher.svg';
              ?>
          </div>
        </div>
      </div>
    </div>
  </header>

  <script type="text/javascript" src="./layout/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="./layout/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="./layout/js/index.js"></script>
</body>

</html>
