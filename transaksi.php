<?php
include "index.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Data Transaksi</title>
</head>

<body>
    <h1>CRUD Data Transaksi</h1>
    <form action="simpan_transaksi.php" method="POST" enctype="multipart/form-data">
        <table>
            <tr>
                <td>ID Transaksi</td>
                <td><input type="text" name="id_transaksi"></td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td><input type="text" name="tanggal" value="<?php echo date("Y-m-d H:i:s"); ?> "> </td>
            </tr>
            <tr>
                <td>Barang</td>
                <td>
                    <select name="id_barang" id="id_barang" onchange="changeValue(this.value)">
                        <?php
                        include "koneksi.php";
                        $query = mysqli_query($koneksi, "SELECT * FROM barang");
                        $jsArray =  "var dtBrg =  new Array();\n";
                        while ($data = mysqli_fetch_array($query)) {
                            echo "<option value = $data[id_barang]> $data[nama_barang] </option>";
                            $jsArray .= "dtBrg['" . $data['id_barang'] . "'] 
                            = {harga:'" . addslashes($data['harga']) . "'};";
                        }
                        ?>
                    </select>
                </td>
                <td><input type="text" name="harga_barang" id="harga_barang"></td>
            </tr>
            <tr>
                <td>Jumlah</td>
                <td> <input type="text" name="jumlah" id="jumlah" onkeyup="hitung();"> </td>
            </tr>
            <tr>
                <td>Total</td>
                <td> <input type="text" name="total" id="total"> </td>
            </tr>
            <tr>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

    <table border="1">
        <tr>
            <td>ID Transaksi</td>
            <td>Tanggal</td>
            <td>Barang</td>
            <td>Jumlah</td>
            <td>Total</td>
            <td>Aksi</td>
        </tr>
        <?php
        include 'koneksi.php';
        $query = mysqli_query($koneksi, "SELECT * FROM transaksi,barang WHERE transaksi.id_barang = barang.id_barang");
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $data['id_transaksi'] ?></td>
                <td><?php echo $data['tanggal'] ?></td>
                <td><?php echo $data['nama_barang'] ?></td>
                <td><?php echo $data['jumlah'] ?></td>
                <td><?php echo $data['total'] ?></td>
                <td><a href="hapus_transaksi.php?id_transaksi=<?php echo $data['id_transaksi'] ?>"> Hapus </td>
            </tr>
        <?php } ?>
    </table>
</body>

</html>

<script>
    <?php echo $jsArray; ?>
    //menampilkan perubahan harga ketika nama barang dirubah klik
    function changeValue(id_barang) {
        document.getElementById('harga_barang').value = dtBrg[id_barang].harga;
    };
    //menghitung total = jumlah * harga
    function hitung() {
        var jumlah = document.getElementById('jumlah').value;
        var harga_barang = document.getElementById('harga_barang').value;
        var result = parseInt(jumlah) * parseInt(harga_barang);
        if (!isNaN(result)) {
            document.getElementById('total').value = result;
        }
    }
</script>