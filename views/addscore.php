<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Score - PSP Portal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body class="bg-light">
    <div class="container my-5">
        <div class="card shadow-sm border-0 col-md-6 mx-auto">
            <div class="card-header bg-primary text-white fw-bold py-3">
                <h5 class="mb-0">Add Student Grade Record</h5>
            </div>
            <div class="card-body p-4">
                <form action="../controllers/grade_controller.php?action=add" method="POST">
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Student Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter student name" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Subject</label>
                        <input type="text" name="subject" class="form-control" placeholder="Enter subject name" maxlength="20" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Marks</label>
                        <input type="number" name="marks" class="form-control" placeholder="0 - 100" min="0" max="100" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-semibold">IC Number</label>
                        <input type="text" name="ic" class="form-control" placeholder="Enter IC number" maxlength="12" required>
                    </div>
                    <div class="d-flex justify-content-between align-items-center mt-4">
                        <button type="submit" class="btn btn-primary px-4">Save Score</button>
                        <a href="home.php" class="btn btn-outline-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>