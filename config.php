<?php
$koneksi = mysqli_connect("localhost", "root", "", "lsp");

//cek koneksi
if (mysqli_connect_error()) {
    echo "Tidak bisa konek ke database";
}
