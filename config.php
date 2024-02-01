<?php
// Koneksi ke database ("" merupakan password phpmyadmin)
$koneksi = mysqli_connect("localhost", "root", "", "mhswa");

// function query($query) {
//     $result = mysqli_query($koneksi, $query);
//     $rows = [];
//     while( $rows=mysqli_fetch_assoc($result)) {
//         $rows[] = $row;
//     }
//     return $rows;
// }

//Cek koneksi ke Database
//Apabila Error
if (mysqli_connect_errno()){
    echo "Koneksi database gagal : " . mysqli_connect_error();
}

?>