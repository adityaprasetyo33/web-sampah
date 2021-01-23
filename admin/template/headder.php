<!DOCTYPE html>
<html lang="en">

<head>
  <title>Jenis Sampah</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="../assets/css/styles.css">
  <script src=" https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js">
  </script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <?php session_start();
  include 'connection.php';
  if ($_SESSION['status'] != "login" && $_SESSION['username'] == null) {
    header("location:../login.html");
  } ?>
</head>

<body>
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container" id="navbar">
      <div class="navbar-header">
        <a href="#" class="navbar-brand navbar-link"><img src="../assets/img/recycle.png"></a>
      </div>
      <div class="collapse navbar-collapse" id="navcol-1">
        <ul class="nav navbar-nav navbar-right">
          <li role="presentation"><a href="index.php">Home</a></li>
          <li role="presentation"><a href="setor_sampah.php">Setor Sampah</a></li>
          <li role="presentation"><a href="tabel.php">Tabel</a></li>
          <li role="presentation"><a href="logout.php">Logout</a></li>
        </ul>
      </div>
    </div>
  </nav>