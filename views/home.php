<?php
require_once __DIR__ . '/../models/database.php';
require_once __DIR__ . '/../models/grademodel.php';

$conn = get_db_connection();
$grades = get_all_grades($conn);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Grade Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white fw-bold py-3 d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Grade Management System</h5>
                <a href="addscore.php" class="btn btn-light text-primary btn-sm fw-semibold">+ Add Student Score</a>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">ID</th>
                                <th>Name</th>
                                <th>Subject</th>
                                <th>Marks</th>
                                <th>IC Number</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (empty($grades)): ?>
                                <tr><td colspan="6" class="text-center py-4 text-muted">No student records found.</td></tr>
                            <?php else: ?>
                                <?php foreach ($grades as $g): ?>
                                <tr>
                                    <td class="ps-4 fw-semibold"><?= $g['id'] ?></td>
                                    <td><?= htmlspecialchars($g['name']) ?></td>
                                    <td><?= htmlspecialchars($g['subject']) ?></td>
                                    <td><span class="badge bg-primary fs-6"><?= htmlspecialchars($g['marks']) ?></span></td>
                                    <td><?= htmlspecialchars($g['IC']) ?></td>
                                    <td class="text-center">
                                        <a href="edit.php?id=<?= $g['id'] ?>" class="btn btn-sm btn-outline-primary me-1">Edit</a>
                                        <a href="../controllers/grade_controller.php?action=delete&id=<?= $g['id'] ?>" 
                                           class="btn btn-sm btn-outline-danger" 
                                           onclick="return confirm('Are you sure you want to permanently delete this student record?');">Delete</a>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>