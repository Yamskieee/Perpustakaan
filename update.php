<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    try {
        $id = $_POST['id_buku'];
        $judul = $_POST['judul_buku'];
        $penerbit = $_POST['penerbit'];
        $tahun_terbit = $_POST['tahun_terbit'];
        $harga = $_POST['harga'];

        echo "ID Buku: " . $id . "<br>";
        echo "Judul: " . $judul . "<br>";
        echo "Penerbit: " . $penerbit . "<br>";
        echo "Tahun Terbit: " . $tahun_terbit . "<br>";
        echo "Harga: " . $harga . "<br>";

        $query = "UPDATE tabelbuku SET judul_buku=?, penerbit=?, tahun_terbit=?, harga=? WHERE id_buku=?";
        $stmt = mysqli_prepare($koneksi, $query);
        mysqli_stmt_bind_param($stmt, "ssidi", $judul, $penerbit, $tahun_terbit, $harga, $id);

        $result = mysqli_stmt_execute($stmt);

        if ($result) {
            mysqli_commit($koneksi); // Commit transaksi
            echo "Data berhasil diperbarui.";
        } else {
            echo "Terjadi kesalahan: " . mysqli_error($koneksi);
        }

        mysqli_stmt_close($stmt);

        // Pengecekan hasil dengan SELECT setelah eksekusi UPDATE
        $query_select = "SELECT * FROM tabelbuku WHERE id_buku=?";
        $stmt_select = mysqli_prepare($koneksi, $query_select);
        mysqli_stmt_bind_param($stmt_select, "i", $id);
        mysqli_stmt_execute($stmt_select);
        $result_select = mysqli_stmt_get_result($stmt_select);
        $row_select = mysqli_fetch_assoc($result_select);

        var_dump($row_select); // Cetak hasil SELECT untuk melihat perubahan

        mysqli_stmt_close($stmt_select);

        mysqli_close($koneksi);
    } catch (Exception $e) {
        echo "Terjadi kesalahan: " . $e->getMessage();
    }
} else {
    header("Location: index.php");
    exit();
}
?>

<br>
<a href="index.php">Kembali</a>