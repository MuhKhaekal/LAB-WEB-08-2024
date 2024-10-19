<?php 
    session_start();
    $users = [
        [
           'email' => 'admin@gmail.com',
           'username' => 'adminxxx',
           'name' => 'Admin',
           'password' => password_hash('admin123', PASSWORD_DEFAULT),
           'role' => 'admin'
        ],
        [
            'email' => 'nanda@gmail.com',
           'username' => 'nanda_aja',
           'name' => 'Wd. Ananda Lesmono',
           'password' => password_hash('nanda123', PASSWORD_DEFAULT),
            'gender' => 'Female',
           'faculty' => 'MIPA',
           'batch' => '2021',
           'role' => 'user'
       ],
        [
            'email' => 'arif@gmail.com',
           'username' => 'arif_nich',
           'name' => 'Muhammad Arief',
           'password' => password_hash('arief123', PASSWORD_DEFAULT),
            'gender' => 'Male',
           'faculty' => 'Hukum',
           'batch' => '2021',
           'role' => 'user'
       ],
        [
            'email' => 'eka@gmail.com',
           'username' => 'eka59',
           'name' => 'Eka Hanny',
           'password' => password_hash('eka123', PASSWORD_DEFAULT),
            'gender' => 'Female',
           'faculty' => 'Keperawatan',
           'batch' => '2021',
           'role' => 'user'
       ],
        [
            'email' => 'adnan@gmail.com',
           'username' => 'adnan72',
           'name' => 'Adnan',
           'password' => password_hash('adnan123', PASSWORD_DEFAULT),               
           'gender' => 'Male',
            'faculty' => 'Teknik',
           'batch' => '2020',
           'role' => 'user'
        ]   
    ];

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $email = htmlspecialchars($_POST['email']);
        $password = htmlspecialchars($_POST['password']);

        $user = null;
        foreach ($users as $key => $u) {
            if ($u['email'] == $email) {
                $user = $u;
                break;
            }
        }

        if ($user) {
            if (password_verify($password, $user['password'])) {
                // Cek role admin atau user
                $_SESSION['user'] = $user;
                if ($user['role'] == 'admin') {
                    $_SESSION['users'] = $users; 
                    // Redirect ke dashboard admin
                    header("Location: admin_dashboard.php");
                    exit();
                } elseif ($user['role'] == 'user') {
                    header('Location: user_dashboard.php');
                    exit();
                }
            } else {
                echo "Password salah.";
            }
        } else {
            echo "Email tidak ditemukan.";
        }
    }
?>