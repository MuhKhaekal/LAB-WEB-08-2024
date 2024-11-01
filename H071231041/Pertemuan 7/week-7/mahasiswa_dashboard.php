<?php
session_start();
@include 'conn.php';

if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'Mahasiswa') {
    // Ambil semua data pengguna dari session
    $users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
    $user = $_SESSION['user'];
} else {
    header("Location: signin.php");
    exit();
}

$mahasiswa = [];
$query = $conn->prepare("SELECT nama, nim, program_studi FROM mahasiswa");
$query->execute();
$result = $query->get_result();

while ($row = $result->fetch_assoc()) {
    $mahasiswa[] = $row;
}
$query->close();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto p-6">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">
                Selamat Datang, <?= htmlspecialchars($_SESSION['user']['nama']) ?>
            </h1>
            
            <div class="flex space-x-4">
                <form action="logout.php" method="POST">
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Daftar Mahasiswa Lain -->
        <div class="bg-gray-800 rounded-lg overflow-hidden">
            <div class="p-4 bg-gray-700">
                <h2 class="text-xl font-semibold">Daftar Mahasiswa Lulus Seleksi Universitas Hasanuddin</h2>
            </div>
            <table class="w-full">
                <thead>
                    <tr class="bg-gray-700">
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">NIM</th>
                        <th class="p-3 text-left">Program Studi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($mahasiswa)): ?>
                        <tr>
                            <td colspan="4" class="text-center p-4 text-gray-500">
                                Belum ada data mahasiswa lain
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($mahasiswa as $mhs): ?>
                            <tr class="border-b border-gray-700 hover:bg-gray-700">
                                <td class="p-3"><?= $no++ ?></td>
                                <td class="p-3"><?= htmlspecialchars($mhs['nama']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($mhs['nim']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($mhs['program_studi']) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>