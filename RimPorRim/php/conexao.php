<?php
$host = "localhost";
$usuario = "root";
$senha = "";
$banco = "chat_drc"; // ou o nome que você criou no phpMyAdmin

$conn = new mysqli($host, $usuario, $senha, $banco);

if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
