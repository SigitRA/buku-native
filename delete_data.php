<?php
include 'koneksi.php';

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data buku berdasarkan ID
    $sql = "DELETE FROM buku WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        // Arahkan ke index.php setelah berhasil menghapus data
        header("Location: index.php");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "ID tidak ditemukan.";
}
$conn->close();
?>
