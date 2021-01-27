<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Darslar - Delux.uz</title>

  <!-- Bootstrap core CSS -->
  <link href="../Homepage/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="../Homepage/css/business-frontpage.css" rel="stylesheet">

</head>

<body>

<div class="container">
  <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
  <a class="navbar-brand" href="#">Delux.uz</a>
  <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="navbar-collapse collapse" id="navbarColor02" style="">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="../index.php">Bosh sahifa <span class="sr-only">(Hozirgi)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.php#start">Test topshirish</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../index.php#res">Natijalar</a>
      </li>
      <li class="nav-item">
<a class="nav-link" href="../contact.php">Qayta a'loqa <span class="sr-only">(Hozirgi)</span></a>                </li>
<li class="nav-item">
<a class="nav-link" href="/index.php">Darslar <span class="sr-only"></span></a>                </li>

    </ul>

    <?php
      if (isset($_SESSION['u_name'])){
        echo '<a href="../admin/index.php"><button type="button" class="btn btn-round btn-success">Xush kelibsiz '.$_SESSION['u_name'].'</button></a>';
      }else{
        echo '<form class="form-inline" action="/login.php">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Kirish</button>
        </form>

        <form class="form-inline" action="/registration.php">
        <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Ro`yhatdan o`tish</button>
        </form>';
      }

     ?>
  </div>
</nav>
</div>
<br>
<br>
