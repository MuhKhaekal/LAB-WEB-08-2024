<?php
session_start();
include 'conn.php';

$query = 'SELECT * FROM users';
$user = $conn->query($query);


$name = htmlspecialchars($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="style.css"> -->
</head>

<body>
    <!-- <header>
        <nav class="navbar">
            <div class="navbar-title">
                <h1>grand Theft auto <span style="color: red;">Online</span></h1>
            </div>
            <div class="navbar-list">
                <a href="#About">About</a></li>
                <a href="#Gallery">Gallery</a></li>
                <a href="#Contact">Contact</a></li>
                <form action="proses_logout.php" method="POST">
                    <button type="submit"><a>Sign Out</a></button>
                </form>
            </div>
        </nav>
    </header>
    <main>
        <div class="hero-caption">
            <h2>Welcome to Los Santos, <?php echo $name; ?></h2>
            <p>Experience the thrill of Grand Theft Auto Online. Play as 
                your own character as you embark on a series of heists 
                across the city of Los Santos.
            </p>
        </div>
    </main> -->
    <div class="container mt-5">
    <h1>Selamat datang, <?php echo $name; ?>!</h1>
        
        <!-- Bootstrap Table -->
        <h2 class="text-center mb-4">Daftar Mahasiswa</h2>
        <div class="table-responsive">
            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>NIM</th>
                        <th>Prodi</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                include 'conn.php';

                $query = 'SELECT * FROM mahasiswa';
                $result = $conn->query($query);

                while($row = $result->fetch_assoc()) {
                    $nama = htmlspecialchars($row['Nama']);
                    $nim = htmlspecialchars($row['Nim']);
                    $prodi = htmlspecialchars($row['Program Studi']);
                    $id = htmlspecialchars($row['ID']);
                ?>
                    <tr>
                        <td><?= $nama ?></td>
                        <td><?= $nim ?></td>
                        <td><?= $prodi ?></td>
                    </tr>
                <?php } ?>
                </tbody>
            </table>
        </div>

        <!-- Form logout dengan spacing tambahan -->
        <form action="proses_logout.php" method="POST" class="mt-3 py-3">
            <button type="submit" class="btn btn-danger">Logout</button>
        </form>
    </div>
</body>

</html>