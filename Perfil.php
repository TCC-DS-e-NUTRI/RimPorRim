<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    $_SESSION['ultima_pagina'] = $_SERVER['REQUEST_URI'];  
    header("Location: login.html");
    exit;
}

$usuario = $_SESSION['usuario'];
?>

<!DOCTYPE html>
<html>
<head><title>Perfil</title></head>
<body>
  <h1>Bem-vindo: <?= htmlspecialchars($usuario['nome']) ?>!</h1>
  <p>Email: <?= htmlspecialchars($usuario['email']) ?></p>
  <p>Tipo: <?= htmlspecialchars($usuario['tipo']) ?></p>
  <a href="index.php">voltar</a>
  <a href="logout.php">Sair</a>
  
  //tentar fazer que nem o descomplica, imagem no grupo-1
</body>
</html>
