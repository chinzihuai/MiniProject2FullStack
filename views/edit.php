<?php
require_once __DIR__ . '/../models/database.php';
require_once __DIR__ . '/../models/grademodel.php';

$conn = get_db_connection();
$grade = get_grade_by_id($conn, (int)($_GET['id'] ?? 0));

if (!$grade) {
    header("Location: home.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Score - PSP Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-sm border-0 col-md-6 mx-auto">
            <div class="card-header bg-primary text-white fw-bold py-3">
                <h5 class="mb-0">Edit Student Grade Record</h5>
            </div>
            <div class="card-body p-4">
                <form action="../controllers/grade_controller.php?action=update" method="POST">
                    <input type="hidden" name="id" value="<?= $grade['id'] ?>">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Student Name</label>
                        <input type="text" name="name" value="<?= htmlspecialchars($grade['name']) ?>" class="form-control" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Subject</label>
                        <input type="text" name="subject" value="<?= htmlspecialchars($grade['subject']) ?>" class="form-control" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Marks</label>
                        <input type="number" name="marks" value="<?= htmlspecialchars($grade['marks']) ?>" class="form-control" min="0" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">IC Number</label>
                        <input type="text" name="ic" value="<?= htmlspecialchars($grade['IC']) ?>" class="form-control" maxlength="12" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">Update Record</button>
                        <a href="home.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>