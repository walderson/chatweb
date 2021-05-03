<?php
$conn = mysqli_connect("localhost", "root", "", "webchat");
if (!$conn) {
    echo "Erro ao conectar com o banco de dados: " . mysqli_connect_error();
}