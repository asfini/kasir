<?php
include "index.php";
?>
<!DOCTYPE html>
<html>

<head>
    <title>CRUD Barang, Bagian Edit Data</title>
</head>

<body>
    <h2>Edit Data Barang</h2>
    <br>
    <form action="update_barang.php" method="POST">
        <?php
        include 'koneksi.php';
        $id_barang = $_GET['id_barang']; //id di url
        $query = mysqli_query($koneksi, "SELECT * FROM barang WHERE id_barang='$id_barang'");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <table>
                <tr>
                    <td>ID Barang</td>
                    <td><input type="text" name="id_barang" value="<?php echo $data['id_barang'] ?>"></td>
                </tr>
                <tr>
                    <td>Nama Barang</td>
                    <td><input type="text" name="nama_barang" value="<?php echo $data['nama_barang'] ?>"></td>
                </tr>
                <tr>
                    <td>Harga</td>
                    <td><input type="text" name="harga" value="<?php echo $data['harga'] ?>"></td>
                </tr>
                <tr>
                    <td>Stok</td>
                    <td><input type="text" name="stok" value="<?php echo $data['stok'] ?>"></td>
                </tr>
                <tr>
                    <td>Foto</td>
                    <td><img src="gambar/<?php echo $data['foto'] ?>" width="70" height="80"></td>
                </tr>
                <tr>
                    <td><input type="submit" name="update" value="Update"></td>
                </tr>
            </table>
        <?php } ?>
    </form>
</body>

</html>