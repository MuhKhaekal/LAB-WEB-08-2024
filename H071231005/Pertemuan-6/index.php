<?php
include 'data/data.php';

session_start();

// Fungsi untuk mencocokkan email/username dengan password
function authenticate($email_or_username, $password) {
    global $users;
    foreach ($users as $user) {
        if (($user['email'] == $email_or_username || $user['username'] == $email_or_username) && 
            password_verify($password, $user['password'])) {
            return $user;
        }
    }
    return null;
}

if (isset($_POST['login'])) {
    $user = authenticate($_POST['email_or_username'], $_POST['password']);
    if ($user) {
        $_SESSION['user'] = $user;
        if ($user['email'] == 'admin@gmail.com') {
            header('Location: admin.php');
        } else {
            header('Location: pengguna.php');
        }
        exit;
    } else {
        $error = "Data Yang di Masukan salah!";
    }
}

if (isset($_GET['logout'])) {
    session_destroy(); 
    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.css" rel="stylesheet" />
</head>
<body class="h-screen bg-gray-600 flex items-center justify-center bg-cover" style="background-image: url('image/login.jpg');">
    <?php if (!isset($_SESSION['user'])): ?>
        <form class="max-w-sm w-full bg-white/30 p-6 rounded-lg shadow-md" method="post">
            <div class="mb-4">
            <h1 class="text-2xl font-bold mb-6 text-gray-700 text-center">LOGIN</h1>
                <label for="email_or_username" class="block text-sm font-bold text-gray-700 mb-2">Email or Username</label>
                <input type="text" id="email_or_username" name="email_or_username"
                        class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-emerald-700 focus:border-emerald-700"
                        placeholder="Email or Username" required />
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-bold text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password"
                        class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-emerald-700 focus:border-emerald-700"
                        required />
            </div>
            <div class="flex items-center mb-4">
                <input id="remember" name="remember" type="checkbox"
                    class="w-4 h-4 text-emerald-700 border-gray-300 rounded focus:ring-emerald-700" required />
                <label for="remember" class="ml-2 text-sm font-bold text-gray-700" >Remember me</label>
            </div>
            <button type="submit" name="login" class="w-full bg-emerald-700 text-white font-bold py-2.5 rounded-lg focus:ring-4 focus:ring-emerald-300">
                Login
            </button>
            <?php if (isset($error)): ?>
                <p class="bg-red-600/60 text-white font-bold text-center mt-4  rounded-lg"><?php echo $error; ?></p>
            <?php endif; ?>
        </form>
    <?php else: ?>
        <h2 class="max-w-sm w-full bg-white/30 p-6 rounded-lg shadow-md font-bold text-center">
        Sedang Login 
    <br>
    <a href="?logout" class="text-red-400">Logout</a>
    <br>
    </h2>
    <?php endif; ?>

    <script src="https://cdn.jsdelivr.net/npm/flowbite@2.5.2/dist/flowbite.min.js"></script>
</body>
</html>