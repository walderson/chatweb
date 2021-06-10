<?php
session_start();
if (isset($_SESSION['unique_id'])) {
    include_once "config.php";
    $status = "Off-line agora";
    mysqli_query($conn, "UPDATE users SET status = '{$status}'
                         WHERE unique_id = {$_SESSION['unique_id']}");
    session_unset();
    session_destroy();
}
header('location: ../login.php');