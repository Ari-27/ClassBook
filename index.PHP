<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <title>Data Siswa</title>
</head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
<body>
    <h1>Data Siswa</h1>
    <a href="tambah.php">Tambah Data</a>
    <table class="table table-striped table-hover">
    <thead>
        <tr>
            <th>#</th>
            <th>Nama Siswa</th>
            <th>Kelas</th>
            <th>Umur</th>
            <th>Alamat</th>
        </tr>
    </thead>
    <tbody>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td><?= $row['id']; ?></td>
                <td><?= $row['nama']; ?></td>
                <td><?= $row['kelas']; ?></td>
                <td><?= $row['umur']; ?></td>
                <td><?= $row['alamat']; ?></td>
                <td>
                    <a href="edit.php?id=<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                    <a href="delete.php?id=<?= $row['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?');">Hapus</a>
                </td>
            </tr>
        <?php } ?>
    </tbody>
</table>

