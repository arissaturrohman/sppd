<?php

session_start();
include('config.php');

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if (isset($_POST['login'])) {
  $nip            = $_POST['nip'];
  $password       = $_POST['password'];

  $sql = $conn->query("SELECT * FROM tb_user WHERE nip='$nip'");

  if (mysqli_num_rows($sql) === 1) {

    $row = mysqli_fetch_assoc($sql);
    if (password_verify($password, $row['password'])) {

      $_SESSION['login'] = true;
      if ($row['level']  == "admin") {
        $_SESSION['nip']      = $nip;
        $_SESSION['id_user']  = $row['id_user'];
        $_SESSION['id_pegawai']  = $row['id_pegawai'];
        $_SESSION['level']    = "admin";

        header('location:index.php');
        exit;
      } elseif ($row['level'] == "pegawai") {
        $_SESSION['nip']      = $nip;
        $_SESSION['id_user']  = $row['id_user'];
        $_SESSION['id_pegawai']  = $row['id_pegawai'];
        $_SESSION['level']    = "pegawai";

        header('location:index.php');
        exit;
      }
    }
  }

  $error = true;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Login e-Agenda</title>

  <!-- Custom fonts for this template-->
  <link href="asset/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="asset/css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Favicon-->
  <link rel="shortcut icon" href="asset/img/logo.png" type="image/x-icon">

</head>

<body class="bg-gradient-dark">

  <div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

      <div class="mt-5 col-md-5">

        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body p-0">
            <!-- Nested Row within Card Body -->
            <div class="row">
              <div class="col-lg-12">
                <div class="p-5">
                  <div class="text-center">
                    <img src="asset/img/logo.png" width="80" height="100">
                    <br><br>
                    <h1 class="h4 text-gray-900 mb-4">Login e-SPPD</h1>
                  </div>

                  <?php if (isset($error)) : ?>
                    <p style="color:red; font-style:italic; text-align:center;">NIP / Password salah</p>
                  <?php endif; ?>
                  <form class="user" method="post">
                    <div class="form-group">
                      <input type="text" class="form-control form-control-user" name="nip" placeholder="Masukkan NIP" autofocus>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control form-control-user" name="password" placeholder="Masukkan Password">
                    </div>
                    <input value="Login" type="submit" name="login" class="btn btn-primary btn-user btn-block">
                    <!-- <a href="registrasi.php" class="btn btn-info btn-user btn-block">Registrasi</a> -->
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>

  </div>


  <!-- Bootstrap core JavaScript-->
  <script src="asset/vendor/jquery/jquery.min.js"></script>
  <script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="asset/js/sb-admin-2.min.js"></script>

</body>

</html>