<?php
if (!function_exists('dbcon')) {
    function dbcon() {
        $host = "localhost";
        $user = "ppes";
        $pass = "admin@123";
        $db   = "ppes";

        $conn = new mysqli($host, $user, $pass, $db);

        if ($conn->connect_error) {
            die("DB Connection failed: " . $conn->connect_error);
        }

        return $conn;
    }
}

if (!function_exists('host')) {
    function host() {
        return "http://localhost/php/PPES/admin/";
    }
}
?>
