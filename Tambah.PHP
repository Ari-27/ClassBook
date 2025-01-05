<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Siswa</title>
</head>
<body>
    <h1>Tambah Data Siswa</h1>
    <form action="" method="post">
        <label>Nama:</label><br>
        <input type="text" name="nama" required><br>
        <label>Kelas:</label><br>
        <input type="text" name="kelas" required><br>
        <label>Umur:</label><br>
        <input type="number" name="umur" required><br>
        <label>Alamat:</label><br>
        <textarea name="alamat" required></textarea><br><br>
        <button type="submit" name="submit">Simpan</button>
    </form>
    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        mysqli_query($conn, "INSERT INTO siswa (nama, kelas, umur, alamat) VALUES ('$nama', '$kelas', $umur, '$alamat')");
        echo "Data berhasil disimpan!";
        header("Location: index.php");
    }
    ?>
</body>
</html>
