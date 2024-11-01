<?php 
    session_start();

    include 'conn.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $userQuery = $conn->prepare("SELECT id, `nama`, hash_pass, `role` FROM users WHERE email = ?");
        $userQuery->bind_param("s", $email);
        $userQuery->execute();
        $userQuery->bind_result($userId, $userName, $storedHashedPassword, $userRole);
        $userQuery->fetch();

        if ($userId) {
            if (password_verify($password, $storedHashedPassword)) {
                $_SESSION['user'] = [
                    'id' => $userId,
                    'nama' => $userName,
                    'role' => $userRole
                ];
                if ($userRole == 'admin') {
                    header("Location: admin_dashboard.php");
                    exit();
                } elseif ($userRole = 'Mahasiswa') {
                    header('Location: mahasiswa_dashboard.php');
                    exit();
                }
            } else {
                echo "Password verification failed";
            }
        } else {
            echo "User not found";
        }

    }
?>