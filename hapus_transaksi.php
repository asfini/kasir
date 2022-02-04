<?php

include 'koneksi.php';

//mengambil id transaksi di url
$id_transaksi = $_GET['id_transaksi'];

//query menghapus data
mysqli_query($koneksi, "DELETE FROM transaksi WHERE id_transaksi = '$id_transaksi'");

//alihkan halaman ke transaski.php
header("location:transaksi.php");
