<?php

include 'config.php';

$id = $_POST['id'];
$nim           = $_POST['nim'];
$nama          = $_POST['nama'];
$ttl  = $_POST['ttl'];
$alamat        = $_POST['alamat'];
$gender = $_POST['gender'];
$agama         = $_POST['agama'];
$fakultas      = $_POST['fakultas'];
$prodi         = $_POST['prodi'];
$tahunmasuk   = $_POST['tahunmasuk'];
$tahunkeluar  = $_POST['tahunkeluar'];

mysqli_query($koneksi, "update user set nim = '$nim',nama='$nama',ttl = '$ttl',alamat = '$alamat',gender = '$gender',agama = '$agama',fakultas='$fakultas',prodi='$prodi',tahunmasuk='$tahunmasuk',tahunkeluar='$tahunkeluar' where id='$id'");

header("location: identitas.php");
?>