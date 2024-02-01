<?php 
require_once 'config.php';


$username = $_POST['username'];
$password = $_POST['password'];
$level = $_POST['level'];
$nim = $_POST['nim'];
$nama = $_POST['nama'];
$ttl = $_POST['ttl'];
$alamat = $_POST['alamat'];
$gender = $_POST['gender'];
$agama = $_POST['agama'];
$fakultas = $_POST['fakultas'];
$prodi = $_POST['prodi'];
$tahunmasuk =$_POST['tahunmasuk'];
$tahunkeluar = $_POST['tahunkeluar'];
$foto = $_FILES['foto']['name'];

if($foto != "") {
    $ekstensi_diperbolehkan = array('png', 'jpg');
    $x = explode('.', $foto);
    $ekstensi = strtolower(end($x));
    $file_tmp = $_FILES['foto']['tmp_name'];
    $angka_acak = rand(1, 999);
    $nama_gambar_baru = $angka_acak.'-'.$foto;

    if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
        move_uploaded_file($file_tmp, 'assets/img/foto_alumni/'.$nama_gambar_baru);

        $query = "INSERT INTO user VALUES( 0, '$username','$password', '$level','$nim','$nama', '$ttl', '$alamat', '$gender', '$agama', '$fakultas', '$prodi', '$tahunmasuk', '$tahunkeluar', '$nama_gambar_baru')";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            echo $koneksi->error; 
        }else {
            header("location: admin_dataalumni.php");
        }
    } else {
        
        echo "<script>alert('Hanya bisa jpg dan png!');window.location='create.php';</script>";
    }
} else {
    $query = "INSERT INTO user VALUES( 0, '$username','$password', '$level','$nim','$nama', '$ttl', '$alamat', '$gender', '$agama', '$fakultas', '$prodi', '$tahunmasuk', '$tahunkeluar')";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        echo $koneksi->error; 
    }else {
        header("location: admin_dataalumni.php");
    }
   
}

// $result = $koneksi->
//     query("INSERT INTO user VALUES( 0, '$username','$password', '$level','$nim','$nama', '$ttl', '$alamat', '$gender', '$agama', '$fakultas', '$prodi', '$tahunmasuk', '$tahunkeluar')");
//     if($result){
//         header("location: admin_dataalumni.php");
//     }else {
//         echo $koneksi->error; 
//     }

?>