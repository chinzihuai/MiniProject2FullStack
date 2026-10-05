<?php
function email_exists($conn, $email) {
    $stmt = mysqli_prepare($conn, "SELECT userid FROM user WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_store_result($stmt);
    $exists = mysqli_stmt_num_rows($stmt) > 0;
    mysqli_stmt_close($stmt);
    return $exists;
}

function register_user($conn, $name, $email, $password, $ic, $program) {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "INSERT INTO user (email, password, ic, program, name) VALUES (?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $email, $hash, $ic, $program, $name);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function get_user_by_email($conn, $email) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM user WHERE email = ?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $user;
}

function get_user_by_id($conn, $userid) {
    $stmt = mysqli_prepare($conn, "SELECT userid, name, email, password, ic, program, profile_pic FROM user WHERE userid = ?");
    mysqli_stmt_bind_param($stmt, "i", $userid);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $user;
}

function update_user_password($conn, $userid, $new_password) {
    $hash = password_hash($new_password, PASSWORD_DEFAULT);
    $stmt = mysqli_prepare($conn, "UPDATE user SET password = ? WHERE userid = ?");
    mysqli_stmt_bind_param($stmt, "si", $hash, $userid);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function update_profile_picture($conn, $userid, $filename) {
    $stmt = mysqli_prepare($conn, "UPDATE user SET profile_pic = ? WHERE userid = ?");
    mysqli_stmt_bind_param($stmt, "si", $filename, $userid);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
?>