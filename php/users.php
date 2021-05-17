<?php
session_start();
include_once "config.php";

$output = "";

$sql = mysqli_query($conn, "SELECT * FROM users
                            WHERE unique_id != {$_SESSION['unique_id']}");
if (mysqli_num_rows($sql) > 0) {
    include "data.php";
} else {
    $output .= "Nenhum usuário encontrado para o chat.";
}

echo $output;