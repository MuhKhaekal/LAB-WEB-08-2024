<?php
// Tentukan Kredential DB
$server_name = 'localhost:123';
$username = 'root';
$password = '';
$database = 'tp7_web';

// Koneksikan DB
$conn = new mysqli($server_name, $username, $password, $database);

// Cek Keberhasilan Koneksi
if($conn->connect_error) {
    die("Koneksi Gagal: ". $conn->$connection_error);
}

