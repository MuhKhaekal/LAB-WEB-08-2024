<?php
include 'conn.php';
$id = $_GET['id'];

$query = "SELECT * FROM mahasiswa WHERE ID = $id";
$user = $conn->query($query);

$result = $user->fetch_assoc();
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
<div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <div class="card glass-effect shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4">Edit Mahasiswa</h2>
                        <!-- Form inside the card -->
                        <form action="proses_edit_mahasiswa.php" method="post">
                            <input type="hidden" name="id" value="<?= htmlspecialchars($result['ID']) ?>">
                            
                            <div class="mb-4">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" name="nama" id="nama" class="form-control" value="<?= htmlspecialchars($result['Nama']) ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="nim" class="form-label">NIM</label>
                                <input type="text" name="nim" id="nim" class="form-control" value="<?= htmlspecialchars($result['Nim']) ?>" required>
                            </div>
                            <div class="mb-4">
                                <label for="prodi" class="form-label">Prodi</label>
                                <input type="text" name="prodi" id="prodi" class="form-control" value="<?= htmlspecialchars($result['Program Studi']) ?>" required>
                            </div>
                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>