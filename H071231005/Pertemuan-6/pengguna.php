<?php
include 'data/data.php';
session_start();

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengguna</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="h-screen bg-cover" style="background-image: url('image/foto2.jpg');">
<div class="h-screen flex items-center justify-center">
    <div class="relative overflow-x-auto bg-white/50 p-6 rounded-lg">
        <div class="flex items-center mt-4">
            <img src="image/user.png" alt="User Image" class="w-20 h-20">
            <div class="ml-20">
                <p class="font-medium text-3xl font-bold mb-4">Welcome, <?php echo $_SESSION['user']['name']; ?></p>
                <p class=""><?php echo $_SESSION['user']['email']; ?></p>
            </div>
        </div>

        <table class="w-full text-sm text-left rtl:text-right mt-8">
            <tbody>
                <tr class="border-b">
                    <td scope="row" class="px-6 py-4 border">
                        <p class="font-bold ">Username</p>
                        <p><?php echo $_SESSION['user']['username']; ?></p>
                    </td>
                    <td class="px-6 py-4 border">
                        <p class="font-bold ">Gender</p>
                        <p><?php echo $_SESSION['user']['gender']; ?></p>
                    </td>
                    <td class="px-6 py-4 border">
                        <p class="font-bold ">Faculty</p>
                        <p><?php echo $_SESSION['user']['faculty']; ?></p>
                    </td>
                    <td class="px-6 py-4 border">
                        <p class="font-bold ">Batch</p>
                        <p><?php echo $_SESSION['user']['batch']; ?></p>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="absolute bottom-0 right-0 p-4 " >
    <a href="index.php?logout" class="text-white bg-emerald-900 focus:outline-none hover:bg-transparent border border-emerald-900 hover:text-black focus:ring-4 focus:ring-emerald-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 transition-all duration-300">Logout</a>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>

