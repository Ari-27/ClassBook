<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Siswa</title>
</head>
<body>
    <h1>Edit Data Siswa</h1>
    <?php
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM siswa WHERE id = $id");
    $data = mysqli_fetch_assoc($result);
    ?>
    <form action="tambah.php" method="POST" class="p-4 bg-light shadow rounded">
    <div class="mb-3">
        <label for="nama" class="form-label">Nama Siswa</label>
        <input type="text" name="nama" class="form-control" id="nama" placeholder="Masukkan nama siswa" required>
    </div>
    <div class="mb-3">
        <label for="kelas" class="form-label">Kelas</label>
        <input type="text" name="kelas" class="form-control" id="kelas" placeholder="Masukkan kelas siswa" required>
    </div>
    <div class="mb-3">
        <label for="umur" class="form-label">Umur</label>
        <input type="text" name="umur" class="form-control" id="umur" placeholder="Masukkan umur siswa" required>
    </div>
    <div class="mb-3">
        <label for="alamat" class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" id="alamat" placeholder="Masukkan alamat siswa" required>
    </div>
    <button type="submit" class="btn btn-primary">Tambah Data</button>
</form>

    <?php
    if (isset($_POST['submit'])) {
        $nama = $_POST['nama'];
        $kelas = $_POST['kelas'];
        $umur = $_POST['umur'];
        $alamat = $_POST['alamat'];
        mysqli_query($conn, "UPDATE siswa SET nama = '$nama', kelas = '$kelas', umur = $umur, alamat = '$alamat' WHERE id = $id");
        echo "Data berhasil diupdate!";
        header("Location: index.php");
    }
    ?>
</body>
</html>
