<?php
session_start();
require_once __DIR__ . '/../models/database.php';
require_once __DIR__ . '/../models/usermodels.php';

if (!isset($_SESSION['userid'])) {
    header("Location: login.php");
    exit();
}

$conn = get_db_connection();
$student = get_user_by_id($conn, $_SESSION['userid']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile - PSP Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">PSP Student Portal</a>
            <div>
                <a href="profile.php" class="btn btn-light btn-sm text-primary fw-semibold me-2">Profile</a>
                <a href="../controllers/auth_controller.php?action=logout" class="btn btn-danger btn-sm">Logout</a>
            </div>
        </div>
    </nav>

    <div class="container my-5">
        <div class="card shadow-sm border-0 col-md-6 mx-auto">
            <div class="card-header bg-primary text-white fw-bold py-3">
                <h5 class="mb-0">Student Profile Information</h5>
            </div>
            <div class="card-body p-4">
                <div class="text-center mb-4">
                    <?php if (!empty($student['profile_pic'])): ?>
                        <img src="../uploads/<?= htmlspecialchars($student['profile_pic']) ?>" alt="Profile picture"
                            class="rounded-circle border shadow-sm" style="width:150px;height:150px;object-fit:cover;">
                    <?php else: ?>
                        <div class="rounded-circle bg-secondary text-white d-inline-flex align-items-center justify-content-center"
                            style="width:150px;height:150px;font-size:3rem;">
                            <?= htmlspecialchars(strtoupper(substr($student['name'], 0, 1))) ?>
                        </div>
                    <?php endif; ?>
                    <form action="../controllers/profile_controller.php?action=upload_picture" method="POST"
                        enctype="multipart/form-data" class="mt-3">
                        <input type="file" name="profile_pic" class="form-control form-control-sm mb-2"
                            accept=".jpg,.jpeg,.png" required>
                        <small class="text-muted d-block mb-2">JPG, JPEG or PNG only. Max 2MB.</small>
                        <button type="submit" class="btn btn-outline-primary btn-sm">Upload Picture</button>
                    </form>
                </div>
                <div class="mb-3 pb-2 border-bottom">
                    <label class="text-muted small">Full Name</label>
                    <p class="fs-5 fw-semibold mb-0"><?= htmlspecialchars($student['name']) ?></p>
                </div>
                <div class="mb-3 pb-2 border-bottom">
                    <label class="text-muted small">NRIC / IC Number</label>
                    <p class="fs-5 fw-semibold mb-0"><?= htmlspecialchars($student['ic']) ?></p>
                </div>
                <div class="mb-3 pb-2 border-bottom">
                    <label class="text-muted small">Academic Program</label>
                    <p class="fs-5 fw-semibold mb-0"><?= htmlspecialchars($student['program']) ?></p>
                </div>
                <div class="mb-3 pb-2 border-bottom">
                    <label class="text-muted small">Email Address</label>
                    <p class="fs-5 fw-semibold mb-0"><?= htmlspecialchars($student['email']) ?></p>
                </div>
                <div class="mt-4">
                    <a href="updatepassword.php" class="btn btn-primary px-4">Change Password</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>