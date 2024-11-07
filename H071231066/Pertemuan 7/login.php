<?php
session_start();
include 'conn.php';

if (isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST['username']);
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        $error = "Silakan isi username dan password";
    } else {
        $sql = "SELECT * FROM mahasiswa WHERE nama = ? or nim = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ss", $username, $username);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows == 1) {
            $user = $result->fetch_assoc();
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user;

                header('Location: index.php');
                exit;
            } else {
                $error = "Password salah!";
            }
        } else {
            $error = "Username tidak ditemukan!";
        }
    }
    
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>

<body class="bg-gradient-to-br from-gray-500 via-gray-600 to-red-700 min-h-screen">
<div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white/90 backdrop-blur-sm p-8 rounded-2xl shadow-2xl w-full max-w-md transform transition-all hover:scale-105">
            <!-- Logo/Icon -->
            <div class="text-center mb-8">
                <div class="bg-gradient-to-r from-red-500 to-gray-600 w-16 h-16 rounded-full mx-auto flex items-center justify-center shadow-lg">
                    <i class="fas fa-user-circle text-3xl text-white"></i>
                </div>
                <h2 class="text-2xl font-bold mt-4 bg-gradient-to-r from-gray-500 to-gray-600 bg-clip-text text-transparent">Welcome Back!</h2>
                <p class="text-gray-500 mt-2">Please sign in to continue</p>
            </div>

            <?php if (isset($error)): ?>
                <div class="mb-6 bg-red-100 border-l-4 border-red-500 p-4 rounded-md">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <i class="fas fa-exclamation-circle text-red-500"></i>
                        </div>
                        <div class="ml-3">
                            <p class="text-red-500 text-sm"><?= $error ?></p>
                        </div>
                    </div>
                </div>
            <?php endif; ?>

            <form method="POST" class="space-y-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input type="text" name="username" placeholder="NIM/Username"
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                        required>
                </div>

                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-lock text-gray-400"></i>
                    </div>
                    <input type="password" name="password" placeholder="Password"
                        class="w-full pl-10 pr-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all bg-gray-50 focus:bg-white"
                        >
                </div>

                <div class="flex items-center justify-between text-sm">
                    <label class="flex items-center text-gray-600 hover:text-gray-800 cursor-pointer">
                        <input type="checkbox" class="rounded border-gray-300 text-gray-500 shadow-sm focus:border-gray-300 focus:ring focus:ring-gray-200 focus:ring-opacity-50">
                        <span class="ml-2">Remember me</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full bg-gradient-to-r from-gray-500 to-gray-600 hover:from-gray-600 hover:to-gray-700 text-white py-3 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-xl flex items-center justify-center space-x-2">
                    <span>Sign in</span>
                    <i class="fas fa-arrow-right"></i>
                </button>
            </form>

            <div class="mt-6 text-center text-gray-600">
                <p>Don't have an account?
                    <a href="regis.php" class="text-gray-500 hover:text-gray-600 font-semibold transition-colors">Sign up</a>
                </p>
            </div>
        </div>
    </div>
    </div>

    <!-- Background decoration -->
    <div class="fixed top-0 left-0 w-full h-full pointer-events-none overflow-hidden -z-10">
        <div class="absolute top-1/4 left-1/4 w-64 h-64 bg-gray-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob"></div>
        <div class="absolute top-1/3 right-1/3 w-64 h-64 bg-gray-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-2000"></div>
        <div class="absolute bottom-1/4 right-1/4 w-64 h-64 bg-gray-300 rounded-full mix-blend-multiply filter blur-xl opacity-70 animate-blob animation-delay-4000"></div>
    </div>


</body>

</html>