<?php
$koneksi = mysqli_connect("localhost", "root", "", "kasir");

//cek koneksi
if (mysqli_connect_error()) {
    echo "Tidak bisa konek ke database";
}
