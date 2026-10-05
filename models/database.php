<?php
function get_db_connection() {
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $dbname     = "miniproject1";

    // Pass variables without single quotes around them
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    return $conn;
}
?>