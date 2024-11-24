<?php
include '../conn.php';

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $nama = $_POST['nama'];
    $nim = $_POST['nim'];
    $prodi = $_POST['prodi'];
    $password = $_POST['password'];
    
    $cekNim = $conn->prepare("SELECT COUNT(*) FROM mahasiswa WHERE nim = ?");
    $cekNim->bind_param('s', $nim);
    $cekNim->execute();
    $cekNim->bind_result($count);
    $cekNim->fetch();
    $cekNim->close();
    
    if ($count == 0) {  // Jika nim tidak ditemukan, lakukan INSERT
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $in = $conn->prepare("INSERT INTO mahasiswa (nama, nim, prodi, `password`, `role`) VALUES (?, ?, ?, ?, 'mahasiswa')");
        $in->bind_param('ssss', $nama, $nim, $prodi, $hashed_password);
    
        if ($in->execute()) {
            header('Location: ../index.php');
        } else {
            echo "Error: " . $in->error;
        }
    
        $in->close();
    } else {
        echo "<script>alert('NIM sudah ada di database !'); window.location.href = '../index.php'; </script>";
    }
    
}