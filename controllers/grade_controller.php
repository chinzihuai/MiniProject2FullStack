<?php
require_once __DIR__ . '/../models/database.php';
require_once __DIR__ . '/../models/grademodel.php';

$conn = get_db_connection();
$action = $_GET['action'] ?? '';

if ($action === 'add' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name    = trim($_POST['name'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $marks   = (int)($_POST['marks'] ?? 0);
    $ic      = trim($_POST['ic'] ?? '');

    if (!empty($name) && !empty($subject) && !empty($ic)) {
        add_grade($conn, $name, $subject, $marks, $ic);
    }
    header("Location: ../views/home.php");
    exit();
}

if ($action === 'update' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $id      = (int)($_POST['id'] ?? 0);
    $name    = trim($_POST['name'] ?? '');
    $subject = trim($_POST['subject'] ?? '');
    $marks   = (int)($_POST['marks'] ?? 0);
    $ic      = trim($_POST['ic'] ?? '');

    if ($id > 0 && !empty($name) && !empty($subject) && !empty($ic)) {
        update_grade($conn, $id, $name, $subject, $marks, $ic);
    }
    header("Location: ../views/home.php");
    exit();
}

if ($action === 'delete' && isset($_GET['id'])) {
    delete_grade($conn, (int)$_GET['id']);
    header("Location: ../views/home.php");
    exit();
}
?>