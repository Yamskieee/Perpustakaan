<?php
include 'koneksi.php';

if (isset($_GET['id_buku'])) {
    $id = $_GET['id_buku'];

    $queryDelete = "DELETE FROM tabelbuku WHERE id_buku=?";
    $stmtDelete = mysqli_prepare($koneksi, $queryDelete);
    mysqli_stmt_bind_param($stmtDelete, "i", $id);

    $resultDelete = mysqli_stmt_execute($stmtDelete);

    if ($resultDelete) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Terjadi kesalahan: " . mysqli_error($koneksi);
    }

    // Tutup statement penghapusan
    mysqli_stmt_close($stmtDelete);
}

// Query untuk mendapatkan data buku setelah penghapusan
$querySelect = "SELECT * FROM tabelbuku";
$resultSelect = mysqli_query($koneksi, $querySelect);

// Tutup koneksi
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Data Buku</h2>

    <?php
    include 'koneksi.php';

    // Query untuk mendapatkan data buku
    $query = "SELECT * FROM tabelbuku";
    $result = mysqli_query($koneksi, $query);

    // Cek apakah ada data
    if (mysqli_num_rows($result) > 0) {
        echo "<table>";
        echo "<tr><th>ID Buku</th><th>Judul Buku</th><th>Penerbit</th><th>Tahun Terbit</th><th>Harga</th><th>Action</th></tr>";

        // Tampilkan data
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['id_buku'] . "</td>";
            echo "<td>" . $row['judul_buku'] . "</td>";
            echo "<td>" . $row['penerbit'] . "</td>";
            echo "<td>" . $row['tahun_terbit'] . "</td>";
            echo "<td>" . $row['harga'] . "</td>";
            echo "<td><a href='edit.php?id_buku=" . $row['id_buku'] . "'>Edit</a> | <a href='delete.php?id_buku=" . $row['id_buku'] . "'>Delete</a></td>";
            echo "</tr>";
        }

        echo "</table>";
    } else {
        echo "Tidak ada data buku.";
    }

    // Tutup koneksi
    mysqli_close($koneksi);
    ?>

    <br>
    <a href="create.php">Tambah Buku</a>
</body>
</html>
