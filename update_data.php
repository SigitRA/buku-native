<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Pastikan data yang diterima tidak mengandung SQL injection
    $id = mysqli_real_escape_string($conn, $_POST['id']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $penerbit = mysqli_real_escape_string($conn, $_POST['penerbit']);
    $pengarang = mysqli_real_escape_string($conn, $_POST['pengarang']);
    $tahun_terbit = mysqli_real_escape_string($conn, $_POST['tahun_terbit']);
    $jumlah = mysqli_real_escape_string($conn, $_POST['jumlah']);
    $genre = mysqli_real_escape_string($conn, $_POST['genre']);
    $lorong = mysqli_real_escape_string($conn, $_POST['lorong']);

    // Query untuk melakukan update data buku
    $sql = "UPDATE buku SET judul='$judul', penerbit='$penerbit', pengarang='$pengarang', tahun_terbit='$tahun_terbit', jumlah='$jumlah', genre='$genre', lorong='$lorong' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // Redirect kembali ke halaman index.php setelah update berhasil
        header("Location: index.php");
        exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Metode yang digunakan bukan POST.";
}

$conn->close();
?>
