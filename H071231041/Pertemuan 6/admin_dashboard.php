<?php
session_start();

if (isset($_SESSION['user']) && $_SESSION['user']['role'] === 'admin') {
    // Ambil semua data pengguna dari session
    $users = isset($_SESSION['users']) ? $_SESSION['users'] : [];
    $user = $_SESSION['user'];
} else {
    header("Location: login.php");
    exit();
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
<p class="text-white"><span class="font-bold">Email: </span> <?php echo htmlspecialchars($user['email']); ?> </p>
<p class="text-white"><span class="font-bold">Username: </span> <?php echo htmlspecialchars($user['username']); ?> </p>
    <!-- Tombol Logout -->
    <form action="logout.php" method="POST">
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded shadow-lg transition duration-300 ease-in-out transform hover:scale-105">Logout</button>
    </form>
<div class="overflow-x-auto p-4">
  <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg text-black">
    <thead class="bg-blue-500 text-white">
      <tr>
        <th class="py-2 px-4 border-b">Name</th>
        <th class="py-2 px-4 border-b">Email</th>
        <th class="py-2 px-4 border-b">Username</th>
        <th class="py-2 px-4 border-b">Gender</th>
        <th class="py-2 px-4 border-b">Faculty</th>
        <th class="py-2 px-4 border-b">Batch</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <?php if ($user['role'] === 'admin') continue; // Lewati user admin ?>
            <tr class="hover:bg-gray-100 transition duration-200">
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($user['name']); ?></td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($user['email']); ?></td>
                <td class="py-2 px-4 border-b"><?php echo htmlspecialchars($user['username']); ?></td>
                <td class="py-2 px-4 border-b"><?php echo isset($user['gender']) ? htmlspecialchars($user['gender']) : 'N/A'; ?></td>
                <td class="py-2 px-4 border-b"><?php echo isset($user['faculty']) ? htmlspecialchars($user['faculty']) : 'N/A'; ?></td>
                <td class="py-2 px-4 border-b"><?php echo isset($user['batch']) ? htmlspecialchars($user['batch']) : 'N/A'; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
</div>
</body>
</html>