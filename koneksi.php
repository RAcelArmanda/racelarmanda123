<?php
$host = 'localhost';
$db   = 'nama_database_kamu'; // Ganti dengan nama database
$user = 'root';               // User default XAMPP biasanya 'root'
$pass = '';                   // Password default XAMPP biasanya kosong
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
    // echo "Koneksi berhasil!"; // Hapus baris ini jika sudah fix agar tidak muncul di web
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}
