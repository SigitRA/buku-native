<!DOCTYPE html>
<html>
<head>
    <title>Edit Data Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Edit Data Buku</h2>
        <?php
        include 'koneksi.php';

        if (isset($_GET['id'])) {
            $id = $_GET['id'];

            $sql = "SELECT * FROM buku WHERE id = $id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                ?>
                <form action="update_data.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                    <div class="form-group">
                        <label for="judul">Judul:</label>
                        <input type="text" class="form-control" name="judul" value="<?php echo $row['judul']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="penerbit">Penerbit:</label>
                        <input type="text" class="form-control" name="penerbit" value="<?php echo $row['penerbit']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="pengarang">Pengarang:</label>
                        <input type="text" class="form-control" name="pengarang" value="<?php echo $row['pengarang']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="tahun_terbit">Tahun Terbit:</label>
                        <input type="text" class="form-control" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>">
                    </div>
                    <div class="form-group">
                        <label for="jumlah">Jumlah:</label>
                        <input type="text" class="form-control" name="jumlah" value="<?php echo $row['jumlah']; ?>">
                    </div>
                    <div class="form-group">
    <label for="genre">Genre:</label>
    <select class="form-control" name="genre">
    <option value="">Pilih Genre</option>
        <?php
        // Ambil nilai genre dari database atau sumber lain
        $genre_values = array("Fiksi", "Non-Fiksi", "Fantasi"); // Ganti dengan nilai yang Anda miliki dari database

        foreach ($genre_values as $genre) {
            $selected = ($row['genre'] == $genre) ? "selected" : "";
            echo "<option value='$genre' $selected>$genre</option>";
        }
        ?>
    </select>
</div>
<div class="form-group">
    <label for="lorong">Lorong:</label>
    <select class="form-control" name="lorong">
        <option value="">Pilih Lorong</option>
        <?php
        // Ambil nilai lorong dari database atau sumber lain
        $lorong_values = array("Lorong A", "Lorong B", "Lorong C"); // Ganti dengan nilai yang Anda miliki dari database

        foreach ($lorong_values as $lorong) {
            $selected = ($row['lorong'] == $lorong) ? "selected" : "";
            echo "<option value='$lorong' $selected>$lorong</option>";
        }
        ?>
    </select>
</div>

                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
                <?php
            } else {
                echo "Buku tidak ditemukan.";
            }
        } else {
            echo "ID tidak ditemukan.";
        }

        $conn->close();
        ?>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
