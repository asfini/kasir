<?php
include "koneksi.php";

//menangkap data dari yang dikirim di barang.php
$id_barang = $_POST['id_barang'];
$nama_barang = $_POST['nama_barang'];
$harga = $_POST['harga'];
$stok = $_POST['stok'];
$filename = $_FILES['foto']['name'];

move_uploaded_file($_FILES['foto']['tmp_name'], 'gambar/' . $filename);
mysqli_query($koneksi, "INSERT INTO barang 
values('id_barang','$nama_barang','$harga','$stok','$filename')");
header("location:barang.php?alert=berhasil");
