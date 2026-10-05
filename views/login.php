<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login - PSP Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-sm border-0 col-md-6 mx-auto">
            <div class="card-header bg-primary text-white fw-bold py-3">
                <h5 class="mb-0">PSP Portal - Student Login</h5>
            </div>
            <div class="card-body p-4">
                <form action="../controllers/auth_controller.php?action=login" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter your email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter your password" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">Login</button>
                        <a href="register.php" class="text-decoration-none">Need an account? Register</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>