<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-md-4">
                <div class="card glass-effect shadow-lg">
                    <div class="card-body">
                        <h2 class="card-title text-center mb-4 text-4xl font-medium">Sign Up</h2>
                        <form action="proses_register.php" method="POST">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" name="name" class="form-control" placeholder="Enter Name" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Enter Password" required>
                            </div>
                            <button type="submit" class="bg-red-700 w-100 h-9 rounded-full border-1 border-black hover:bg-red-800 text-white">SIGN UP</button>
                        </form>
                        <div class="text-center mt-3">
                            <p>Already a member? <a href="login.php" class="text-red-700 hover:underline decoration-red-700">Sign In</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>