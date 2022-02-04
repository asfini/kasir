<?php
include "index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Barang</title>
</head>

<body>
    <h1>CRUD Data Barang</h1>
    <form action="simpan_barang.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ID Barang</td>
                <td><input type="text" name="id_barang"></td>
            </tr>
            <tr>
                <td>Nama Barang</td>
                <td><input type="text" name="nama_barang"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input type="text" name="harga"></td>
            </tr>
            <tr>
                <td>Stok</td>
                <td><input type="text" name="stok"></td>
            </tr>
            <tr>
                <td>Foto</td>
                <td><input type="file" name="foto"></td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

    <table border="1">
        <tr>
            <td>ID Barang</td>
            <td>Nama Barang</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Foto</td>
            <td colspan="2">Aksi</td>
        </tr>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM barang");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td> <?php echo $data['id_barang']; ?> </td>
                <td> <?php echo $data['nama_barang']; ?> </td>
                <td> <?php echo $data['harga']; ?> </td>
                <td> <?php echo $data['stok']; ?> </td>
                <td> <img src="gambar/<?php echo $data['foto']; ?>" width="70px" height="80px"> </td>
                <td>
                    <a href="edit_barang.php?id_barang=<?php echo $data['id_barang'] ?>">
                        Edit
                </td>
                <td><a href="hapus_barang.php?id_barang=<?php echo $data['id_barang'] ?>">Hapus</td>

            </tr>
        <?php } ?>
    </table>
</body>

</html>