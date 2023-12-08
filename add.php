<?php
// Koneksi ke database
include 'koneksi.php';

// Periksa apakah formulir telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Mendapatkan nilai dari formulir HTML menggunakan metode POST
    $judul_buku = $_POST['judul_buku'];
    $penerbit = $_POST['penerbit'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];

    // Perbarui pernyataan SQL dengan kolom yang sesuai
    $query = "INSERT INTO tabelbuku (judul_buku, penerbit, tahun_terbit, harga) 
            VALUES ('$judul_buku', '$penerbit', '$tahun_terbit', '$harga')";
    $stmt = mysqli_prepare($koneksi, $query);
    $result = mysqli_stmt_execute($stmt);
    // Jalankan pernyataan SQL
    if ($result) {
        echo "Data berhasil ditambahkan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<br>
<a href="index.php">Kembali</a>
