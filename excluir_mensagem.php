<?php
session_start();
include('php/conexao.php');

if (!isset($_SESSION['usuario'])) {
  header("Location: login.html");
  exit();
}

$hora = $_GET['hora'] ?? '';
$usuario = $_SESSION['usuario'];

if (!$hora) {
  exit("Hora inválida.");
}

if (strtolower($usuario['tipo']) === 'profissional') {
  // Profissional pode excluir qualquer uma
  $sql = "UPDATE chat SET excluida = 1 WHERE hora_mandada = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("s", $hora);
} else {
  // Adulto só exclui suas mensagens
  $sql = "UPDATE chat c 
          JOIN usuarios u ON c.usuario_id = u.usuario_id
          SET c.excluida = 1 
          WHERE c.hora_mandada = ? AND u.nome = ?";
  $stmt = $conn->prepare($sql);
  $stmt->bind_param("ss", $hora, $usuario['nome']);
}

$stmt->execute();
$stmt->close();
$conn->close();

header("Location: chat.php");
exit();
