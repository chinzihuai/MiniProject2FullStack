<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register - PSP Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-sm border-0 col-md-6 mx-auto">
            <div class="card-header bg-primary text-white fw-bold py-3">
                <h5 class="mb-0">PSP Portal - Student Registration</h5>
            </div>
            <div class="card-body p-4">
                <form action="../controllers/auth_controller.php?action=register" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Full Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter full name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Email Address</label>
                        <input type="email" name="email" class="form-control" placeholder="Enter email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">IC Number</label>
                        <input type="text" name="icnumber" class="form-control" placeholder="e.g. 030101071234" maxlength="12" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Program Code</label>
                        <input type="text" name="program" class="form-control" placeholder="e.g. DDT" maxlength="10" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">Register</button>
                        <a href="login.php" class="text-decoration-none">Already registered? Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>