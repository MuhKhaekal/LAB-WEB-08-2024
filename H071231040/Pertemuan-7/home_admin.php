<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}
$name = htmlspecialchars($_SESSION['name']);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <h1>Selamat datang, <?php echo $name; ?>!</h1>
        <h2 class="text-center mb-4">Daftar Mahasiswa</h2>
        <form action="proses_input_mahasiswa.php" method="POST">
            <div class="row g-3">
                <div class="col">
                    <label for="nama" class="form-label">Nama:</label>
                    <input type="text" name="nama" id="nama" class="form-control" placeholder="Enter Nama" required>
                </div>
                <div class="col">
                    <label for="nim" class="form-label">NIM:</label>
                    <input type="text" name="nim" id="nim" class="form-control" placeholder="Enter NIM" required>
                </div>
                <div class="col">
                    <label for="prodi" class="form-label">Program Studi:</label>
                    <input type="text" name="prodi" id="prodi" class="form-control" placeholder="Enter Program Studi" required>
                </div>
            </div>
                <button type="submit" class="btn btn-primary mt-3">Tambah Mahasiswa</button>
        </form>
        <div class="table-responsive mt-3">
            <table class="table table-striped table-bordered">
                <tr>
                    <td>Nama</td>
                    <td>NIM</td>
                    <td>Program Studi</td>
                    <td>Action</td>
                </tr>
                <?php
                include 'conn.php';

                $query = 'SELECT * FROM mahasiswa';
                $user = $conn->query($query);

                while ($row = $user->fetch_assoc()) {
                    $id = htmlspecialchars($row['ID']);
                    $nama = htmlspecialchars($row['Nama']);
                    $nim = htmlspecialchars($row['Nim']);
                    $prodi = htmlspecialchars($row['Program Studi']);
                ?>
                    <tr>
                        <td><?= $nama ?></td> <!-- Menggunakan = akan langsung meng-echo -->
                        <td><?= $nim ?></td>
                        <td><?= $prodi ?></td>
                        <td>
                            <a href="edit_mahasiswa.php?id=<?= $id ?>">Edit</a>
                            <a href="proses_delete_mahasiswa.php?id=<?= $id ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Hapus</a>
                        </td>
                    </tr>
                <?php
                } ?>
            </table>

            <!-- Form logout dengan spacing tambahan -->
            <form action="proses_logout.php" method="POST" class="mt-3 py-3">
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>
    </div>
</body>

</html>