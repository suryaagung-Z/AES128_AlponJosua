<?php
// Menghubungkan ke database MySQL
$servername = "localhost";
$username = "root";
$dbpassword = "";
$dbname = "aes128";

$conn = new mysqli($servername, $username, $dbpassword, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
