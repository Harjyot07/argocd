<?php
function dbcon() {
    $host = "db";
    $user = "ppes";
    $pass = "admin@123";
    $db   = "ppes";

    $conn = new mysqli($host, $user, $pass, $db);

    if ($conn->connect_error) {
        die("DB Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

