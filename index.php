<!DOCTYPE html>
<html>
<head>
    <title>CRUD Buku</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <h2>Data Buku</h2>
        <a href="tambah_data.php" class="btn btn-primary mb-3">Tambah Data Buku</a>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>No</th>
                    <th>Judul</th>
                    <th>Penerbit</th>
                    <th>Pengarang</th>
                    <th>Tahun Terbit</th>
                    <th>Jumlah</th>
                    <th>Genre</th>
                    <th>Lorong</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include 'koneksi.php';

                $sql = "SELECT * FROM buku";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    $no = 1; // Inisialisasi nomor urut
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $no++ . "</td>"; // Menampilkan nomor urut dan meningkatkan nilai setiap baris
                        echo "<td>" . $row["judul"] . "</td>";
                        echo "<td>" . $row["penerbit"] . "</td>";
                        echo "<td>" . $row["pengarang"] . "</td>";
                        echo "<td>" . $row["tahun_terbit"] . "</td>";
                        echo "<td>" . $row["jumlah"] . "</td>";
                        echo "<td>" . $row["genre"] . "</td>";
                        echo "<td>" . $row["lorong"] . "</td>";
                        echo "<td class='d-flex'>";
                        echo "<form action='edit_data.php' method='GET' class='mr-2'>";
                        echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                        echo "<button type='submit' class='btn btn-sm btn-warning'>Edit</button>";
                        echo "</form>";
                        echo "<a href='delete_data.php?id=" . $row['id'] . "' class='btn btn-sm btn-danger'>Delete</a>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9' class='text-center'>Tidak ada data</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
