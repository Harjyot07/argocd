<?php
include('dbcon.php');
$conn = dbcon();
session_start();

$username = $_POST['username'];
$password = $_POST['password'];

// Prevent SQL injection
$username = mysqli_real_escape_string($conn, $username);
$password = mysqli_real_escape_string($conn, $password);

/* Admin login */
$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
$result = mysqli_query($conn, $query) or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);
$num_row = mysqli_num_rows($result);

/* Technical Staff login */
$query_client = mysqli_query($conn, "SELECT * FROM technical_user WHERE username='$username' AND password='$password'") or die(mysqli_error($conn));
$num_row_client = mysqli_num_rows($query_client);
$row_client = mysqli_fetch_array($query_client);

if ($num_row > 0) {
    $_SESSION['id'] = $row['user_id'];
    echo 'true_admin';
    mysqli_query($conn, "INSERT INTO user_log (username, login_date, logout_date, user_id) VALUES ('$username', NOW(), NULL, " . $row['user_id'] . ")") or die(mysqli_error($conn));
} else if ($num_row_client > 0) {
    $_SESSION['technical_user'] = $row_client['tech_id'];
    echo 'true';
    mysqli_query($conn, "INSERT INTO user_log (username, login_date, logout_date, tech_id) VALUES ('$username', NOW(), NULL, " . $row_client['tech_id'] . ")") or die(mysqli_error($conn));
} else {
    echo 'false';
}

mysqli_close($conn);
?>
