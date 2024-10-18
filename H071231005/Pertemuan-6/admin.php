<?php
include 'data/dataAdmin.php';
session_start();

if (!isset($_SESSION['user']) || $_SESSION['user']['email'] !== 'admin@gmail.com') {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="h-screen bg-gray-100 flex items-center justify-center bg-cover" style="background-image: url('image/foto4.jpg');">
<div class="relative overflow-x-auto">
    <div class="mb-8 relative overflow-x-auto bg-white/50 p-6 rounded-lg flex items-center mt-4">
        <img src="image/user.png" alt="User Image" class="w-20 h-20">
        <div class="ml-20">
            <h1 class="text-3xl font-bold mb-4">Welcome, <?php echo $_SESSION['user']['name']; ?></h1>
            <p>Email: <?php echo $_SESSION['user']['email']; ?></p>
            <p>Username: <?php echo $_SESSION['user']['username']; ?></p>
        </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right mt-8 bg-white/30 p-6 rounded-lg">
        <thead class="bg-gray-200">
            <tr>
                <th scope="col" class="px-4 py-3 text-lg">Name</th>
                <th scope="col" class="px-4 py-3 text-lg">Email</th>
                <th scope="col" class="px-4 py-3 text-lg">Username</th>
                <th scope="col" class="px-4 py-3 text-lg">Gender</th>
                <th scope="col" class="px-4 py-3 text-lg">Faculty</th>
                <th scope="col" class="px-4 py-3 text-lg">Batch</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($users as $user): ?>
            <tr class="border-b">
                <td scope="row" class="px-4 py-4 whitespace-nowrap ">
                    <?php echo $user['name']; ?>
                </td>
                <td class="px-4 py-4">
                    <?php echo $user['email']; ?>
                </td>
                <td class="px-4 py-4">
                    <?php echo $user['username']; ?>
                </td>
                <td class="px-4 py-4">
                    <?php echo $user['gender']; ?>
                </td>
                <td class="px-4 py-4">
                    <?php echo $user['faculty']; ?>
                </td>
                <td class="px-4 py-4">
                    <?php echo $user['batch']; ?>
                </td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>

<div class="absolute bottom-0 right-0 p-4 " >
    <a href="index.php?logout" class="text-white bg-emerald-900 focus:outline-none hover:bg-transparent border border-emerald-900 hover:text-black focus:ring-4 focus:ring-emerald-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 transition-all duration-300">Logout</a>
    </div>

<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>
