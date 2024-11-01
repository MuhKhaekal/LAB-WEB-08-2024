<?php
session_start();
include 'conn.php';

// Cek apakah sudah login dan memiliki akses admin
if (!isset($_SESSION['user']) || $_SESSION['user']['role'] !== 'admin') {
    header("Location: signin.php");
    exit();
}

// Proses tambah, edit, atau hapus mahasiswa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case 'tambah':
                $nama = $_POST['nama'];
                $nim = $_POST['nim'];
                $prodi = $_POST['prodi'];
                
                // Cek apakah NIM sudah ada
                $cek_nim = $conn->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
                $cek_nim->bind_param("s", $nim);
                $cek_nim->execute();
                $result = $cek_nim->get_result();
                
                if ($result->num_rows > 0) {
                    $_SESSION['pesan_error'] = "NIM sudah terdaftar!";
                } else {
                    // Query untuk menambah mahasiswa
                    $stmt = $conn->prepare("INSERT INTO mahasiswa (nama, nim, program_studi) VALUES (?, ?, ?)");
                    $stmt->bind_param("sss", $nama, $nim, $prodi);
                    
                    if ($stmt->execute()) {
                        $_SESSION['pesan_sukses'] = "Mahasiswa berhasil ditambahkan!";
                    } else {
                        $_SESSION['pesan_error'] = "Gagal menambahkan mahasiswa: " . $stmt->error;
                    }
                    $stmt->close();
                }
                break;

            case 'edit':
                $id = $_POST['id'];
                $nama = $_POST['nama'];
                $nim = $_POST['nim'];
                $prodi = $_POST['prodi'];
                
                // Query untuk update mahasiswa
                $stmt = $conn->prepare("UPDATE mahasiswa SET nama = ?, nim = ?, program_studi = ? WHERE id = ?");
                $stmt->bind_param("sssi", $nama, $nim, $prodi, $id);
                
                // Cek apakah NIM sudah ada
                $cek_nim = $conn->prepare("SELECT * FROM mahasiswa WHERE nim = ?");
                $cek_nim->bind_param("s", $nim);
                $cek_nim->execute();
                $result = $cek_nim->get_result();
                
                if ($result->num_rows > 0) {
                    $_SESSION['pesan_error'] = "NIM sudah terdaftar!";
                } else {
                    if ($stmt->execute()) {
                        $_SESSION['pesan_sukses'] = "Mahasiswa berhasil diupdate!";
                    } else {
                        $_SESSION['pesan_error'] = "Gagal mengupdate mahasiswa: " . $stmt->error;
                    }
                    $stmt->close();
                }
                break;

            case 'hapus':
                $id = $_POST['id'];
                
                // Query untuk hapus mahasiswa
                $stmt = $conn->prepare("DELETE FROM mahasiswa WHERE id = ?");
                $stmt->bind_param("i", $id);
                
                if ($stmt->execute()) {
                    $_SESSION['pesan_sukses'] = "Mahasiswa berhasil dihapus!";
                } else {
                    $_SESSION['pesan_error'] = "Gagal menghapus mahasiswa: " . $stmt->error;
                }
                $stmt->close();
                break;
        }
        
        // Redirect untuk mencegah form resubmission
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
    }
}

// Ambil data mahasiswa
$mahasiswa = [];
$query = $conn->query("SELECT * FROM mahasiswa");
if ($query) {
    while ($row = $query->fetch_assoc()) {
        $mahasiswa[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Manajemen Mahasiswa</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        // Fungsi untuk menampilkan modal tambah/edit mahasiswa
        function tampilkanModal(tipe, mahasiswa = null) {
            const modal = document.getElementById('modal');
            const modalTitle = document.getElementById('modal-title');
            const formAction = document.getElementById('form-action');
            const namaInput = document.getElementById('nama');
            const nimInput = document.getElementById('nim');
            const prodiInput = document.getElementById('prodi');
            const idInput = document.getElementById('id');

            modal.classList.remove('hidden');

            if (tipe === 'tambah') {
                modalTitle.textContent = 'Tambah Mahasiswa';
                formAction.value = 'tambah';
                namaInput.value = '';
                nimInput.value = '';
                prodiInput.value = '';
                idInput.value = '';
            } else if (tipe === 'edit') {
                modalTitle.textContent = 'Edit Mahasiswa';
                formAction.value = 'edit';
                namaInput.value = mahasiswa.nama;
                nimInput.value = mahasiswa.nim;
                prodiInput.value = mahasiswa.program_studi;
                idInput.value = mahasiswa.id;
            }
        }

        // Fungsi untuk menutup modal
        function tutupModal() {
            const modal = document.getElementById('modal');
            modal.classList.add('hidden');
        }
    </script>
</head>
<body class="bg-gray-900 text-white min-h-screen">
    <div class="container mx-auto p-6">
        <!-- Pesan Notifikasi -->
        <?php if (isset($_SESSION['pesan_sukses'])): ?>
            <div class="bg-green-600 text-white p-4 rounded mb-4">
                <?= $_SESSION['pesan_sukses'] ?>
                <?php unset($_SESSION['pesan_sukses']); ?>
            </div>
        <?php endif; ?>

        <?php if (isset($_SESSION['pesan_error'])): ?>
            <div class="bg-red-600 text-white p-4 rounded mb-4">
                <?= $_SESSION['pesan_error'] ?>
                <?php unset($_SESSION['pesan_error']); ?>
            </div>
        <?php endif; ?>

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Sistem Manajemen Mahasiswa</h1>
            
            <div class="flex space-x-4">
                <button 
                    onclick="tampilkanModal('tambah')"
                    class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700 transition"
                >
                    Tambah Mahasiswa
                </button>
                <form action="logout.php" method="POST">
                    <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                        Logout
                    </button>
                </form>
            </div>
        </div>

        <!-- Tabel Mahasiswa -->
        <div class="bg-gray-800 rounded-lg overflow-hidden">
            <table class="w-full">
                <thead class="bg-gray-700">
                    <tr>
                        <th class="p-3 text-left">No</th>
                        <th class="p-3 text-left">Nama</th>
                        <th class="p-3 text-left">NIM</th>
                        <th class="p-3 text-left">Program Studi</th>
                        <th class="p-3 text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($mahasiswa)): ?>
                        <tr>
                            <td colspan="5" class="text-center p-4 text-gray-500">
                                Belum ada data mahasiswa
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php $no = 1; foreach ($mahasiswa as $mhs): ?>
                            <tr class="border-b border-gray-700 hover:bg-gray-700">
                                <td class="p-3"><?= $no++ ?></td>
                                <td class="p-3"><?= htmlspecialchars($mhs['nama']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($mhs['nim']) ?></td>
                                <td class="p-3"><?= htmlspecialchars($mhs['program_studi']) ?></td>
                                <td class="p-3 flex justify-center space-x-2">
                                    <button 
                                        onclick='tampilkanModal("edit", <?= json_encode($mhs) ?>)'
                                        class="text-blue-400 hover:text-blue-600"
                                    >
                                        Edit
                                    </button>
                                    <form method="POST" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        <input type="hidden" name="action" value="hapus">
                                        <input type="hidden" name="id" value="<?= $mhs['id'] ?>">
                                        <button type="submit" class="text-red-400 hover:text-red-600">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <!-- Modal Tambah/Edit Mahasiswa -->
        <div id="modal" class="fixed inset-0 bg-black bg-opacity-50 hidden flex justify-center items-center">
            <div class="bg-gray-800 p-6 rounded-lg w-96">
                <h2 id="modal-title" class="text-xl mb-4">Tambah/Edit Mahasiswa</h2>
                <form method="POST" class="space-y-4">
                    <input type="hidden" name="action" id="form-action" value="tambah">
                    <input type="hidden" name="id" id="id">
                    <input 
                        type="text" 
                        name="nama" 
                        id="nama" 
                        placeholder="Nama" 
                        required 
                        class="w-full p-2 bg-gray-700 text-white rounded"
                    >
                    <input 
                        type="text" 
                        name="nim" 
                        id="nim" 
                        placeholder="NIM" 
                        required 
                        class="w-full p-2 bg-gray-700 text-white rounded"
                    >
                    <select 
                        name="prodi" 
                        id="prodi" 
                        required 
                        class="w-full p-2 bg-gray-700 text-white rounded"
                    >
                        <option value="">Pilih Program Studi</option>
                        <option value="Teknik Informatika">Teknik Informatika</option>
                        <option value="Sistem Informasi">Sistem Informasi</option>
                        <option value="Kedokteran">Kedokteran</option>
                        <option value="Ekonomi">Ekonomi</option>
                    </select>
                    <div class="flex space-x-4">
                        <button 
                            type="submit" 
                            class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 w-full"
                        >
                            Simpan
                        </button>
                        <button 
                            type="button" 
                            onclick="tutupModal()" 
                            class="bg-gray-600 text-white px-4 py-2 rounded hover:bg-gray-700 w-full"
                        >
                            Batal
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>