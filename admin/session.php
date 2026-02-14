<?php
//Start session
session_start();

//Include dbcon and get connection
include_once('lib/dbcon.php');
$conn = dbcon();

//Check whether the session variable SESS_MEMBER_ID is present or not
if (!isset($_SESSION['id']) || (trim($_SESSION['id']) == '')) {
    header("location:" . host() . "../index.php");
    exit();
}
$session_id = $_SESSION['id'];

// Prevent SQL injection
$session_id = mysqli_real_escape_string($conn, $session_id);

$user_query = mysqli_query($conn, "SELECT * FROM user WHERE user_id = '$session_id'") or die(mysqli_error($conn));
$user_row = mysqli_fetch_array($user_query);
$admin_username = $user_row['username'];
?>
