<?php
session_start(); // Mulai session
include 'conn.php'; // Include file koneksi ke database

// Jika sudah login, redirect ke dashboard
if (isset($_SESSION['username'])) {
    if ($_SESSION['username'] === "adminxxx"){ 
        header("Location: home_admin.php"); // Redirect ke halaman dashboard admin
        exit();
    } else{
        header("Location: home_user.php"); // Redirect ke halaman dashboard user
        exit();
    }
}

if($_SERVER['REQUEST_METHOD'] == 'POST') { // Jika form di-submit
    $name = $_POST['name']; // Ambil name dari form
    $username = $_POST['username']; // Ambil username dari form
    $password = $_POST['password']; // Ambil password dari form

    $query = 'SELECT * FROM users WHERE Username = ?'; // Query untuk mencari user berdasarkan username
    $stmt = $conn->prepare($query); // Persiapkan query
    $stmt->bind_param('s', $username); // Bind parameter ke query
    $stmt->execute(); // Eksekusi query
    $result = $stmt->get_result(); // Ambil hasil query

    if ($result->num_rows > 0) { // Jika hasil query menghasilkan lebih dari 0 baris
        $user = $result->fetch_assoc(); // Ambil data user
    
        // Verifikasi password (dengan hash)
        if (password_verify($password, $user['Password'])) { 
            // Jika login berhasil
            $_SESSION['name'] = $user['Name'];
            $_SESSION['username'] = $user['Username']; // Simpan username di session

            if ($user['Username'] === "adminxxx") {
                header("Location: home_admin.php"); // Redirect ke halaman dashboard admin
                exit();
            } else {
                header("Location: home_user.php"); // Redirect ke halaman dashboard user
                exit();
            }
        } 
        else {
            echo "Password salah!";
        }
    } else {
        echo "Username tidak ditemukan!";
    }
}