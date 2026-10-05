<?php
session_start();
require_once __DIR__ . '/../models/database.php';
require_once __DIR__ . '/../models/usermodels.php';

$conn = get_db_connection();
$action = $_GET['action'] ?? '';

if ($action === 'register' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $name     = trim($_POST['name'] ?? '');
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';
    $ic       = trim($_POST['icnumber'] ?? '');
    $program  = trim($_POST['program'] ?? '');

    if (email_exists($conn, $email)) {
        echo "<script>alert('Email already exists.'); window.location.href='../views/register.php';</script>";
        exit();
    }

    if (register_user($conn, $name, $email, $password, $ic, $program)) {
        echo "<script>alert('Registration successful!'); window.location.href='../views/login.php';</script>";
    } else {
        echo "<script>alert('Registration failed.'); window.location.href='../views/register.php';</script>";
    }
    exit();
}

if ($action === 'login' && $_SERVER['REQUEST_METHOD'] === 'POST') {
    $email    = trim($_POST['email'] ?? '');
    $password = $_POST['password'] ?? '';

    $user = get_user_by_email($conn, $email);
    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['userid'] = $user['userid'];
        $_SESSION['name']   = $user['name'];
        header("Location: ../views/profile.php");
    } else {
        echo "<script>alert('Invalid email or password.'); window.location.href='../views/login.php';</script>";
    }
    exit();
}

if ($action === 'logout') {
    session_destroy();
    header("Location: ../views/login.php");
    exit();
}
?>