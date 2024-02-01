<?php
    session_start();
    if($_SESSION['level']=="") {
        header("location:login.php?pesan=anda_belum_login");
    }

    include 'config.php';
    $username=$_SESSION['username'];
    $query = "SELECT * FROM user WHERE username='username'";
    $result = mysqli_query($koneksi, $query);
?>
<?php
    if(mysqli_num_rows($result)>0 ) {
        $data = mysqli_fetch_array($result);
        $_SESSION["id"] = $data["id"];
        $_SESSION["nama"] = $data["nama"];
        $_SESSION["nim"] = $data["nim"];
        $_SESSION["level"] = $data["level"];
        $_SESSION["ttl"] = $data["ttl"];
        $_SESSION["alamat"] = $data["alamat"];
        $_SESSION["gender"] = $data["gender"];
        $_SESSION["agama"] = $data["agama"];
        $_SESSION["fakultas"] = $data["fakultas"];
        $_SESSION["prodi"] = $data["prodi"];
        $_SESSION["tahunmasuk"] = $data["tahunmasuk"];
        $_SESSION["tahunkeluar"] = $data["tahunkeluar"];
    }
?>
<DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Daftar Alumni</title>
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
<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center justify-content-between">

      <div class="logo">
        <h1><a href="#">Ceritanya<span>Logo</span></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->
      </div>

      <nav id="navbar" class="navbar">
        <ul>
          <!-- <li><a class="nav-link scrollto active" href="#hero">Home</a></li>         
          <li class="dropdown"><a href="#"><span>Info</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
              <li><a href="#">Alumni</a></li>
              <li><a href="#">Lowongan</a></li>
            </ul>
          </li>
          <li><a><div class="topbar-divider d-none d-sm-block"></div></a></li>
           -->
          <li class="dropdown">
              <?php 
              $user = mysqli_query($koneksi, "select * from user where username='$username'");
              while($data = mysqli_fetch_assoc($user)) {
              ?>
              <a class="nav-link scrollto" href="#">
              
                  <span><?php echo $data['nama'];?></span>
                  
                  <i class="bi bi-chevron-down"></i>
              </a>
              <?php
              }
              ?>
            <ul>
              <li>
                  <a href="identitas.php">Profile</a>
              </li>
              <li>
                  <a href="#" data-bs-toggle="modal" data-bs-target="#logoutModal">Logout</a>                            
              </li>
            </ul>
          </li>

        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
         
      </nav><!-- .navbar -->

    </div>

    
    
  </section>
  </header>
  <section>
    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Log Out</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Yakin Mau Keluar?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tidak</button>
        <a href="logout.php" class="btn btn-primary">Ya</a>
      </div>
    </div>
  </div>
</div>
 
    <div class="container">
    
    <!--tabel-->
    <div class="container mt-5">
    <div class="section-title">
          <h3>Data Alumni</h2>
        </div>
      <table class="table table-striped" id="tabelMahasiswa">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Nama</th>
            <th scope="col">NIM</th>
            <th scope="col">Alamat</th>
            <!-- <th scope="col">Aksi</th> -->
          </tr>
        </thead>

      <tbody>
          <?php
          $no = 1;
          $user = mysqli_query($koneksi, "select * from user");
          while ($data = mysqli_fetch_array($user)){
            ?>
              <tr>
                  <td><?php echo $no++; ?> </td>
                  <td><?php echo $data['nama']; ?> </td>
                  <td><?php echo $data['nim']; ?> </td>
                  <td><?php echo $data['alamat']; ?> </td>
                  <!-- <td>
                      <a href="detail.php?id=<?php echo $data['id']; ?>" class= "btn btn-success btn-sm text-white">DETAIL</a>
                  </td> -->
              </tr>
            <?php
          }
          ?>
      </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>
    <script>
        $(document).ready(function(){
            $('#tabelMahasiswa').DataTable();
        });
    </script>
    </div>
  </section>

  <section id="loker">
  <div class="container">
        <div class="section-title">
          <h3>Lowongan Pekerjaan</h3>
        </div>
    
    <div class="container mt-5">
    <div class="row row-cols-3 row-cols-md-3 g-4">
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
  <div class="col">
    <div class="card">
      <img src="..." class="card-img-top" alt="...">
      <div class="card-body">
        <h5 class="card-title">Card title</h5>
        <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
        <a href="#" class="btn btn-primary">Go somewhere</a>
      </div>
    </div>
  </div>
</div>
    </div>
    
  </div>
 
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