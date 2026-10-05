<?php
session_start();
if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Change Password - PSP Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">PSP Student Portal</a>
            <div>
                <a href="profile.php" class="btn btn-outline-light btn-sm me-2">Profile</a>
                <a href="../controllers/auth_controller.php?action=logout" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card shadow-sm border-0 col-md-6 mx-auto">
            <div class="card-header bg-primary text-white fw-bold py-3">
                <h5 class="mb-0">Password Exchange Module</h5>
            </div>
            <div class="card-body p-4">
                <form action="../controllers/profile_controller.php?action=update_password" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Old Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Enter current password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">New Password</label>
                        <input type="password" name="newpassword" class="form-control" placeholder="Enter new password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Confirm New Password</label>
                        <input type="password" name="confirmnewpassword" class="form-control" placeholder="Re-enter new password" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">Update Password</button>
                        <a href="profile.php" class="btn btn-outline-secondary">Back to Profile</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>