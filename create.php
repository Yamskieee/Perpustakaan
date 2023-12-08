<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Buku</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Tambah Buku</h1>
    <form action="add.php" method="post">
        <label for="judul_buku">Judul Buku:</label>
        <input type="text" id="judul_buku" name="judul_buku" required>
        
        <label for="penerbit">Penerbit:</label>
        <input type="text" id="penerbit" name="penerbit" required>

        <label for="tahun_terbit">Tahun Terbit:</label>
        <input type="text" id="tahun_terbit" name="tahun_terbit" required>

        <label for="harga">Harga:</label>
        <input type="text" id="harga" name="harga" required>

        <button type="submit">Tambah Buku</button>
        <a href="index.php" class="button">Batal</a>
    </form>
</body>
</html>
