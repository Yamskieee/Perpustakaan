<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'koneksi.php';

    $id = $_GET['id_buku'];

    // Query untuk mendapatkan data buku berdasarkan ID
    $query = "SELECT * FROM tabelbuku WHERE id_buku=?";
    $stmt = mysqli_prepare($koneksi, $query);
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);

    $genreOptions = array(
        "0" => "Petualangan", // Sesuaikan dengan nilai genre yang digunakan di database
        // Tambahkan opsi lain sesuai kebutuhan
    );
    ?>

    <h2>Edit Buku</h2>
    <form action="update.php" method="post">
        <input type="hidden" name="id_buku" value="<?php echo $id; ?>">
        Judul: <input type="text" name="judul_buku" value="<?php echo $row['judul_buku']; ?>" required><br>
        Penerbit: <input type="text" name="penerbit" value="<?php echo $row['penerbit']; ?>" required><br>
        Tahun Terbit: <input type="number" name="tahun_terbit" value="<?php echo $row['tahun_terbit']; ?>" required><br>
        Harga: <input type="number" name="harga" value="<?php echo $row['harga']; ?>" required><br>
        <input type="submit" value="Update">
    </form>
    <br>
    <a href="index.php" class="button">Kembali</a>
</body>
</html>