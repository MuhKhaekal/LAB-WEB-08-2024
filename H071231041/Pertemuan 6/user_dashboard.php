<?php
// Mulai session
session_start();

// Periksa apakah pengguna sudah login dan data pengguna ada di session
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user']; // Mengambil data pengguna dari session
} 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <script src="https://cdn.tailwindcss.com"></script>    
</head>
<body class="bg-gray-50 dark:bg-gray-900 text-white p-4">
    <h1 class="text-4xl">Welcome, <?php echo htmlspecialchars($user['name']); ?></h1>
    <p>Email: <?php echo htmlspecialchars($user['email']); ?></p>
    <p>Username: <?php echo htmlspecialchars($user['username']); ?></p>
    <p>Gender: <?php echo htmlspecialchars($user['gender']); ?></p>
    <p>Faculty: <?php echo htmlspecialchars($user['faculty']); ?></p>
    <p>Batch: <?php echo htmlspecialchars($user['batch']); ?></p>

    <!-- Tombol Logout -->
    <form action="logout.php" method="POST">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out transform hover:scale-105">Logout</button>
    </form>
    
</body>
</html>