<!DOCTYPE html>
<html>
<head>
    <title>Tambah Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2 class="text-danger mb-4">Tambah Data Buku</h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="judul">Judul:</label>
                <input type="text" class="form-control" id="judul" name="judul">
            </div>
            <div class="form-group">
                <label for="penerbit">Penerbit:</label>
                <input type="text" class="form-control" id="penerbit" name="penerbit">
            </div>
            <div class="form-group">
                <label for="pengarang">Pengarang:</label>
                <input type="text" class="form-control" id="pengarang" name="pengarang">
            </div>
            <div class="form-group">
                <label for="tahun_terbit">Tahun Terbit:</label>
                <input type="number" class="form-control" id="tahun_terbit" name="tahun_terbit">
            </div>
            <div class="form-group">
                <label for="jumlah">Jumlah:</label>
                <input type="number" class="form-control" id="jumlah" name="jumlah">
            </div>
            <div class="form-group">
    <label for="genre">Genre:</label>
    <select class="form-control" id="genre" name="genre">
    <option value="">Pilih Genre</option>
        <option value="Fiksi">Fiksi</option>
        <option value="Non-Fiksi">Non-Fiksi</option>
        <option value="Fantasi">Fantasi</option>
        <!--Tambahkan opsi genre lainnya sesuai kebutuhan-->
    </select>
</div>
<div class="form-group">
    <label for="lorong">Lorong:</label>
    <select class="form-control" id="lorong" name="lorong">
    <option value="">Pilih Lorong</option>
        <option value="Lorong A">Lorong A</option>
        <option value="Lorong B">Lorong B</option>
        <option value="Lorong C">Lorong C</option>
        <!--Tambahkan opsi lorong lainnya sesuai kebutuhan-->
    </select>
</div>

            <button type="submit" name="submit" class="btn btn-danger btn-block">Tambah</button>
        </form>
    </div>

    <?php
    include 'koneksi.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $judul = $_POST['judul'];
        $penerbit = $_POST['penerbit'];
        $pengarang = $_POST['pengarang'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $jumlah = $_POST['jumlah'];
        $genre = $_POST['genre'];
        $lorong = $_POST['lorong'];

        // Query untuk menambahkan data buku ke dalam tabel
        $sql = "INSERT INTO buku (judul, penerbit, pengarang, tahun_terbit, jumlah, genre, lorong)
        VALUES ('$judul', '$penerbit', '$pengarang', $tahun_terbit, $jumlah, '$genre', '$lorong')";

        if ($conn->query($sql) === TRUE) {
            echo "Data berhasil ditambahkan";
            // Arahkan ke halaman index.php setelah berhasil menambahkan data
            header("Location: index.php");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
    ?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>
