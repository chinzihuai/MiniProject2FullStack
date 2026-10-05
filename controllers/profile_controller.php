<?php
session_start();
require_once '../models/database.php';
require_once '../models/usermodels.php';

if (!isset($_SESSION['userid'])) {
    header("Location: ../views/login.php");
    exit();
}

$conn = get_db_connection();
$action = $_GET['action'] ?? '';

if ($action === 'update_password' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid          = $_SESSION['userid'];
    $oldPassword     = $_POST['password'] ?? '';
    $newPassword     = $_POST['newpassword'] ?? '';
    $confirmPassword = $_POST['confirmnewpassword'] ?? '';

    if ($newPassword !== $confirmPassword) {
        echo "<script>alert('Passwords do not match.'); window.location.href='../views/updatepassword.php';</script>";
        exit();
    }

    $user = get_user_by_id($conn, $userid);
    if ($user && password_verify($oldPassword, $user['password'])) {
        if (update_user_password($conn, $userid, $newPassword)) {
            echo "<script>alert('Password updated!'); window.location.href='../controllers/auth_controller.php?action=logout';</script>";
        } else {
            echo "<script>alert('Error updating password.'); window.location.href='../views/updatepassword.php';</script>";
        }
    } else {
        echo "<script>alert('Incorrect old password.'); window.location.href='../views/updatepassword.php';</script>";
    }
    exit();
}

if ($action === 'upload_picture' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $userid      = $_SESSION['userid'];
    $uploadDir   = __DIR__ . '/../uploads/';
    $maxSize     = 2 * 1024 * 1024; // 2MB
    $allowedExt  = ['jpg', 'jpeg', 'png'];
    $allowedMime = ['image/jpeg', 'image/png'];

    $fail = function ($msg) {
        echo "<script>alert('" . $msg . "'); window.location.href='../views/profile.php';</script>";
        exit();
    };

    if (!isset($_FILES['profile_pic']) || $_FILES['profile_pic']['error'] === UPLOAD_ERR_NO_FILE) {
        $fail('Please choose a file.');
    }
    $file = $_FILES['profile_pic'];

    if ($file['error'] === UPLOAD_ERR_INI_SIZE || $file['error'] === UPLOAD_ERR_FORM_SIZE) {
        $fail('File is too large. Maximum size is 2MB.');
    }
    if ($file['error'] !== UPLOAD_ERR_OK || !is_uploaded_file($file['tmp_name'])) {
        $fail('Upload failed. Please try again.');
    }
    if ($file['size'] > $maxSize) {
        $fail('File is too large. Maximum size is 2MB.');
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExt, true)) {
        $fail('Only JPG, JPEG and PNG files are allowed.');
    }

    $finfo = new finfo(FILEINFO_MIME_TYPE);
    $mime  = $finfo->file($file['tmp_name']);
    if (!in_array($mime, $allowedMime, true) || getimagesize($file['tmp_name']) === false) {
        $fail('Invalid image file.');
    }

    $newName = uniqid('profile_' . $userid . '_', true) . '.' . $ext;

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }
    if (!move_uploaded_file($file['tmp_name'], $uploadDir . $newName)) {
        $fail('Could not save the file.');
    }

    $user = get_user_by_id($conn, $userid);
    if (update_profile_picture($conn, $userid, $newName)) {
        if (!empty($user['profile_pic'])) {
            $old = $uploadDir . basename($user['profile_pic']);
            if (is_file($old)) { unlink($old); }
        }
        echo "<script>alert('Profile picture updated!'); window.location.href='../views/profile.php';</script>";
    } else {
        unlink($uploadDir . $newName);
        $fail('Database error. Please try again.');
    }
    exit();
}
?>