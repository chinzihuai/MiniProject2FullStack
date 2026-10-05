<?php
function get_all_grades($conn) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM marks ORDER BY id DESC");
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $grades = mysqli_fetch_all($result, MYSQLI_ASSOC);
    mysqli_stmt_close($stmt);
    return $grades;
}

function get_grade_by_id($conn, $id) {
    $stmt = mysqli_prepare($conn, "SELECT * FROM marks WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $grade = mysqli_fetch_assoc($result);
    mysqli_stmt_close($stmt);
    return $grade;
}

function add_grade($conn, $name, $subject, $marks, $ic) {
    $stmt = mysqli_prepare($conn, "INSERT INTO marks (name, subject, marks, IC) VALUES (?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "ssis", $name, $subject, $marks, $ic);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function update_grade($conn, $id, $name, $subject, $marks, $ic) {
    $stmt = mysqli_prepare($conn, "UPDATE marks SET name = ?, subject = ?, marks = ?, IC = ? WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "ssisi", $name, $subject, $marks, $ic, $id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}

function delete_grade($conn, $id) {
    $stmt = mysqli_prepare($conn, "DELETE FROM marks WHERE id = ?");
    mysqli_stmt_bind_param($stmt, "i", $id);
    $result = mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    return $result;
}
?>