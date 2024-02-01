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
    <title>Data Mahasiswa</title>
</head>

<body>
    

    <?php
    $id = $_GET['id'];
    //Melakukan query untuk mendapatkan data mahasiswa berdasarkan $id
    $user = mysqli_query($koneksi, "SELECT * FROM user where id='$id'");
    while ($iya = mysqli_fetch_assoc($user)){
    ?>
        <div class="container my-5">
            
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Profil Alumni</p>
                </div>
                <div class="card-body fw-bold">
                    <!-- Kita membuat form dengan memanggil file store.php-->
                    <form method="post" action="edit.php">
                    <div class="mb-3 row">
                                <input type="hidden" class="form-control" name="id" value="<?php echo $iya['id']; ?>">
                            </div>
                    <div class="mb-3 row">
                        <label for="nim" class="col-sm-2 col-form-label">NIM</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nim" name="nim" value="<?php echo $iya['nim']; ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="nama" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="nama" name="nama" value="<?php echo $iya['nama'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tempat_lahir" class="col-sm-2 col-form-label">Tempat Tanggal Lahir</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="ttl" name="ttl" value="<?php echo $iya['ttl'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="alamat" name="alamat" value="<?php echo $iya['alamat'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="jenia_kelamin" class="col-sm-2 col-form-label">Jenis Kelamin</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="gender" id="gender">
                                <option value="">- Pilih -</option>
                                <option value="Laki-laki" <?php if ($iya['gender'] == "laki-laki") echo "selected" ?>>Laki-laki</option>
                                <option value="Perempuan" <?php if ($iya['gender'] == "perempuan") echo "selected" ?>>Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="agama" class="col-sm-2 col-form-label">Agama</label>
                        <div class="col-sm-10">
                            <select class="form-control" name="agama" id="agama">
                                <option value="">- Pilih -</option>
                                <option value="Islam" <?php if ($iya['agama'] == "islam") echo "selected" ?>>Islam</option>
                                <option value="Kristen" <?php if ($iya['agama'] == "kristen") echo "selected" ?>>Kristen</option>
                                <option value="Katolik" <?php if ($iya['agama'] == "katolik") echo "selected" ?>>Katolik</option>
                                <option value="Hindu" <?php if ($iya['agama'] == "hindu") echo "selected" ?>>Hindu</option>
                                <option value="Budha" <?php if ($iya['agama'] == "buddha") echo "selected" ?>>Budha</option>
                                <option value="Konghuchu" <?php if ($iya['agama'] == "buddha") echo "selected" ?>>Konghuchu</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="fakultas" name="fakultas" value="<?php echo $iya['fakultas'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="prodi" class="col-sm-2 col-form-label">Prodi</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $iya['prodi'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_masuk" class="col-sm-2 col-form-label">Tahun Masuk</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tahunmasuk" name="tahunmasuk" value="<?php echo $iya['tahunmasuk'] ?>">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="tahun_keluar" class="col-sm-2 col-form-label">Tahun Keluar</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="tahunkeluar" name="tahunkeluar" value="<?php echo $iya['tahunkeluar'] ?>">
                        </div>
                    </div>
                    <div class="col-12">
                        <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary" />
                    </div>
                    </form>
                </div>
            </div>
        </div>
    <?php
    }
    ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>

</body>

</html>