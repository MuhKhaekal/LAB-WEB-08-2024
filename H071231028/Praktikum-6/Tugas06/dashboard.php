<?php
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$user = $_SESSION['user'];

// Data users
$users = [
    [
        'email' => 'admin@gmail.com',
        'username' => 'adminxxx',
        'name' => 'Admin',
        'password' => password_hash('admin123', PASSWORD_DEFAULT),
    ],
    [
        'email' => 'nanda@gmail.com',
        'username' => 'nanda_aja',
        'name' => 'Wd. Ananda Lesmono',
        'password' => password_hash('nanda123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'MIPA',
        'batch' => '2021',
    ],
    [
        'email' => 'arif@gmail.com',
        'username' => 'arif_nich',
        'name' => 'Muhammad Arief',
        'password' => password_hash('arief123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Hukum',
        'batch' => '2021',
    ],
    [
        'email' => 'eka@gmail.com',
        'username' => 'eka59',
        'name' => 'Eka Hanny',
        'password' => password_hash('eka123', PASSWORD_DEFAULT),
        'gender' => 'Female',
        'faculty' => 'Keperawatan',
        'batch' => '2021',
    ],
    [
        'email' => 'adnan@gmail.com',
        'username' => 'adnan72',
        'name' => 'Adnan',
        'password' => password_hash('adnan123', PASSWORD_DEFAULT),
        'gender' => 'Male',
        'faculty' => 'Teknik',
        'batch' => '2020',
    ],
]
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="wrapper">
        <div class="dashboard-container">
            <!-- <div class="Dashboard-header">
                <span>Dashboard</span>
            </div> -->
            <h2>Welcome, <?= $user['name'] ?></h2>
            <!-- <a href="logout.php" class="logout-button">Logout</a> -->

            <?php if ($user['username'] === 'adminxxx') : ?>
                <h3>All Users Data</h3>
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Gender</th>
                            <th>Faculty</th>
                            <th>Batch</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($users as $u) : ?>
                            <?php if ($u['username'] === 'adminxxx') continue; ?>
                            <tr>
                                <td><?= $u['name'] ?></td>
                                <td><?= $u['email'] ?></td>
                                <td><?= $u['username'] ?></td>
                                <td><?= $u['gender'] ?></td>
                                <td><?= $u['faculty'] ?></td>
                                <td><?= $u['batch'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                     <!-- <a href="logout.php" class="logout-button">Logout</a> -->

                    </tbody>
                </table>
            <?php else : ?>
                <h3>Your Profile</h3>
                    <table class="profile-table">
                        <tr>
                            <td><strong>Name   </strong></td>
                            <td><?= $user['name'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Email   </strong></td>
                            <td><?= $user['email'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Username</strong></td>
                            <td><?= $user['username'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Gender</strong></td>
                            <td><?= $user['gender'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Faculty</strong></td>
                            <td><?= $user['faculty'] ?></td>
                        </tr>
                        <tr>
                            <td><strong>Batch</strong></td>
                            <td><?= $user['batch'] ?></td>
                        </tr>

                    </table>
            <?php endif; ?>
            <a href="logout.php" class="logout-button">Logout</a>
        </div>
    </div>
</body>
</html>
