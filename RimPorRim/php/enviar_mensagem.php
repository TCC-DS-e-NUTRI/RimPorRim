<?php
session_start();
include 'conexao.php';

if (!isset($_SESSION['usuario_id'])) {
  exit;
}

$usuario_id = $_SESSION['usuario_id'];
$mensagem = trim($_POST['mensagem']);

if (!empty($mensagem)) {
  $stmt = $conn->prepare("INSERT INTO mensagens (usuario_id, mensagem) VALUES (?, ?)");
  $stmt->bind_param("is", $usuario_id, $mensagem);
  $stmt->execute();
}
?>
