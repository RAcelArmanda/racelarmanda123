<?php
// 1. Panggil file koneksi
require 'koneksi.php';

// 2. Cek apakah tombol 'submit' sudah ditekan
if (isset($_POST['submit'])) {
    // Ambil data dari form
    $nama    = $_POST['nama'];
    $email   = $_POST['email'];
    $jurusan = $_POST['jurusan'];

    // 3. Siapkan Query (Ganti 'mahasiswa' dengan nama tabelmu)
    $sql = "INSERT INTO mahasiswa (nama, email, jurusan) VALUES (:nama, :email, :jurusan)";
    $stmt = $pdo->prepare($sql);

    // 4. Eksekusi Query dengan data yang aman
    $data = [
        ':nama' => $nama,
        ':email' => $email,
        ':jurusan' => $jurusan
    ];

    if ($stmt->execute($data)) {
        // Jika berhasil, redirect ke halaman utama/index
        echo "<script>
                alert('Data berhasil ditambahkan!');
                document.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>alert('Gagal menambahkan data');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Data Mahasiswa</title>
</head>

<body>
    <h1>Tambah Data Mahasiswa</h1>

    <form action="" method="post">
        <ul>
            <li>
                <label for="nama">Nama : </label>
                <input type="text" name="nama" id="nama" required>
            </li>
            <li>
                <label for="email">Email : </label>
                <input type="email" name="email" id="email" required>
            </li>
            <li>
                <label for="jurusan">Jurusan : </label>
                <input type="text" name="jurusan" id="jurusan" required>
            </li>
            <br>
            <li>
                <button type="submit" name="submit">Tambah Data</button>
            </li>
        </ul>
    </form>

    <a href="index.php">Kembali ke Daftar</a>
</body>

</html>