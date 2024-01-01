<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lokasi_buku";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
