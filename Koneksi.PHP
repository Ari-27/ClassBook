<?php
// Konfigurasi koneksi database
$servername = "localhost";
$username = "root";
$password = "R270920"; // Password MySQL Anda
$dbname = "db_kelas";

// Membuat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!";
}
?>
