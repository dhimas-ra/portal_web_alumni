<?php 

include 'config.php';

$id = $_POST['id'];
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

        $query = "UPDATE user SET nim='$nim', nama='$nama',  ttl='$ttl', alamat='$alamat', gender='$gender', agama='$agama', fakultas='$fakultas', prodi='$prodi', tahunmasuk='$tahunmasuk', tahunkeluar='$tahunkeluar', foto='$nama_gambar_baru'";
        $query .= "WHERE id='$id'";
        $result = mysqli_query($koneksi, $query);

        if(!$result){
            echo $koneksi->error; 
        }else {
            header("location: admin_dataalumni.php");
        }
    } else {
        
        echo "<script>alert('Hanya bisa jpg dan png!');window.location='update.php';</script>";
    }
} else {
    $query = "UPDATE user SET nim='$nim', nama='$nama',  ttl='$ttl', alamat='$alamat', gender='$gender', agama='$agama', fakultas='$fakultas', prodi='$prodi', tahunmasuk='$tahunmasuk', tahunkeluar='$tahunkeluar'";
        $query = "WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    if(!$result){
        echo $koneksi->error; 
    }else {
        header("location: admin_dataalumni.php");
    }
   
}
// mysqli_query($koneksi, "update user set nim='$nim', nama='$nama',  ttl='$ttl', alamat='$alamat', gender='$gender', agama='$agama', fakultas='$fakultas', prodi='$prodi', tahunmasuk='$tahunmasuk', tahunkeluar='$tahunkeluar' where id='$id'");
// header("location:admin_dataalumni.php");

?>