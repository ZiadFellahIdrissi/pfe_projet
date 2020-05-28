<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="msapplication-config" content="/docs/4.4/assets/img/favicons/browserconfig.xml">
  <meta name="theme-color" content="#563d7c">
  <link href="./layout/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
  <link href="./layout/css/index.css" rel="stylesheet" type="text/css" />
  <link href="./layout/css/logo.css" rel="stylesheet" type="text/css" />
  <link href="./layout/css/womanIndex.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <title>Welcome</title>
</head>
<style>
    .header-content .h1{
    font-size: 20px;
    font-weight: bold;
    text-transform: capitalize;
    color: black;
  }
  .header-content p{
    letter-spacing: 1px;
    font-weight: 300;
    text-transform: capitalize;
  }
</style>
<body>
  <!-- header !-->
    <nav class="navbar navbar-expand-md navbar-light bg-dark">
      <div class="innerHeader ml-auto">
        <div class="logo">
          <a class="navbar-brand" href="#">
            <?php
              include './img/index/logo.svg';
            ?>
          </a>
        </div>

        <button class="navbar-toggler ml-auto" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item active">
              <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>


            <li class="nav-item text-nowrap ">
              <a class="btn btn btn-outline-dark" href="src/etudiant/pages/login.php">Espace Etudiant</a>
            </li>
            <li class="nav-item text-nowrap ">
              <a class="btn btn btn-outline-dark" href="src/admin/pages/login.php">Espace Admin</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>
  <!-- end header -->
  <div class="container">
    <div class="row">
      <div class="col-lg-6">
        <h1>Procédure d'inscription</h1>
        <p>
          Les programmes de formation proposés sont payants et sont dispensés en temps aménagé le vendredi soir,
          le samedi et le dimanche.</p>
        <p><a class="btn btn-lg btn-outline-primary" href="#" role="button">S'inscrire maintenant</a></p>
        <div class="go-about"></div>
      </div>
      <div class="col-lg-6">
        <?php
            include 'img/index/teacher.svg';
        ?>
      </div>
    </div>
  </div>
  <div class="footer">
      tous droits reservés.
  </div>
  <script type="text/javascript" src="./layout/js/jquery-3.4.1.min.js"></script>
  <script type="text/javascript" src="./layout/js/bootstrap.min.js"></script>
  
</body>

</html>