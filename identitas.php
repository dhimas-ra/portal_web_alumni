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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Identitas</title>
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>   
        <?php 
        $user = mysqli_query($koneksi, "select * from user where username='$username'");
        while($data = mysqli_fetch_assoc($user)) {
        ?>
        <br>
        <h3>Halo, <?php echo $data['nama'];?></h3>
        <div class="container my-5">

            <div class="card">
            
            <div class="card-header">
                    <p class="fw-bold">Profil Alumni</p>
                </div>
                <div class="card-body">
                <div class="row">   
                <div class="col-md-3">
                    <img width="300" height="327" src="assets/img/foto_alumni/<?php echo $data['foto']; ?>">
                </div>
                <div class="card-body fw-bold">
                    <p>NIM : <?php echo $data['nim']; ?></p>
                    <p>Nama : <?php echo $data['nama']; ?></p>
                    <p>Tempat Tanggal Lahir : <?php echo $data['ttl']; ?></p>
                    <p>Alamat : <?php echo $data['alamat']; ?></p>
                    <p>Jenis Kelamin : <?php echo $data['gender']; ?></p>
                    <p>Agama : <?php echo $data['agama']; ?></p>
                    <p>Fakultas : <?php echo $data['fakultas']; ?></p>
                    <p>Prodi : <?php echo $data['prodi']; ?></p>
                    <p>Tahun Masuk : <?php echo $data['tahunmasuk']; ?></p>
                    <p>Tahun Keluar : <?php echo $data['tahunkeluar']; ?></p>
                    <a href=ubah.php?id=<?php echo $data['id']; ?>" class= "btn btn-warning btn-sm text-white">EDIT</a>
                    <a href="mhs.php" class="btn btn-danger btn-sm text-white">Kembali</a>
                </div>   
                </div>
                </div>
               
            </div>
                
            <?php
        }
        ?>
        </div>
        </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>