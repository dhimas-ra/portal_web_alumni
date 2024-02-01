<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <title>Data Karyawan</title>
</head>

<body>
    
    <?php
    //Memanggil file config.php
    include 'config.php';
    //Menangkap query id yang dikirim melalui button detail di index.php
    $id = $_GET['id'];
    //Melakukan query untuk mendapatkan data mahasiswa berdasarkan $id
    $mhswa = mysqli_query($koneksi, "select * from data where id='$id'");
    while ($data = mysqli_fetch_assoc($mhswa)){
    ?>
        <div class="container my-5">
            <div class="card">
                <div class="card-header">
                    <p class="fw-bold">Profil Alumni</p>
                </div>
                <div class="card-body fw-bold">
                    <p>NIM : <?php echo $data['nim'] ?></p>
                    <p>Nama : <?php echo $data['nama'] ?></p>
                    <p>Tempat Lahir : <?php echo $data['tempatlahir'] ?></p>
                    <p>Tanggal Lahir : <?php echo $data['tgllahir'] ?></p>
                    <p>Alamat : <?php echo $data['alamat'] ?></p>
                    <p>Jenis Kelamin : <?php echo $data['jeniskelamin'] ?></p>
                    <p>Agama : <?php echo $data['agama'] ?></p>
                    <p>Fakultas : <?php echo $data['fakultas'] ?></p>
                    <p>Prodi : <?php echo $data['prodi'] ?></p>
                    <p>Tahun Masuk : <?php echo $data['tahunmasuk'] ?></p>
                    <p>Tahun Keluar : <?php echo $data['tahunkeluar'] ?></p>
                    <a href="mhs.php" class="btn btn-danger btn-sm text-white">Kembali</a>
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