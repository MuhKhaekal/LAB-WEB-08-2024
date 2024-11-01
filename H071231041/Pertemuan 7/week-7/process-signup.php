<?php 
    include 'conn.php';

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['name'];
        $email = $_POST['email'];
        $password = htmlspecialchars($_POST['password']);

        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $input = $conn->prepare('INSERT INTO users (nama, email, hash_pass) VALUES (?, ?, ?)');
        $input->bind_param("sss", $nama, $email, $hashed_password);
        
        if ($input->execute()) {
            header("Location: signin.php");
        }
    }

    

?>