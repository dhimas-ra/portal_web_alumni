<?php
session_start();

if( isset($_SESSION["login"]) ) {
  header("location: mhs.php");
  exit;
}

include 'config.php';

if( isset($_POST["login"]) ) {
  $username = $_POST["username"];
  $password = $_POST["password"];

  $login = mysqli_query($koneksi, "SELECT * FROM user WHERE username = '$username'");

  $count = mysqli_num_rows($login);

  if ($count > 0) {

    $data = mysqli_fetch_assoc($login);

    if($data['level']=="admin") {
     $_SESSION['username'] = $username;
     $_SESSION['level'] = "admin";
     $_SESSION["login"] = true;
     header("location: admin.php");
    } else if($data['level']=="mahasiswa") {
      $_SESSION['username'] = $username;
      $_SESSION['level'] = "mahasiswa";
      $_SESSION["login"] = true;
      header("location: mhs.php");
    }
  
  } else {
    $array["status"] = false;
    $array["message"] = "Login gagal";
    $array["data"] = null;
  }
  echo json_encode($array);
}

?>

<DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Mahasiswa</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link
    href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i"
    rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>

  <section>
      <div class="container">
      <div class="col-lg-6 pt-4 pt-lg-0">
      <h1>LOGIN</h1>
            <p class="fst-italic">
              <form  action="" method="post">		
                <div class="control-group">
                  <div class="mb-3">
                    <label for="exampleFormControlInput1" class="col-sm-2 col-form-label">Username</label>
                    <div class="col-sm-10">
                      <input type="text" name="username" class="form-control" id="username" placeholder="username">
                    </div>
                    
                  </div>
                </div>	
                <div class="control-group">
                  <div class="mb-3">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-10">
                      <input type="password" name="password" class="form-control" id="password" placeholder="password">
                    </div>
                  </div>
                </div>
                <button type="submit" name="login" class="btn btn-secondary btn-sm">Login</button>
              </form>
            </p>
            <a href="index.php" class="btn btn-danger btn-sm">Kembali</a>
          </div>
      </div>
  </section>
  

          <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i
      class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/purecounter/purecounter.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>
</body>
</html>