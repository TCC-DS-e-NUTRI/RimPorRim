<?php
session_start();

if (!isset($_SESSION['usuario'])) {
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
  <a href="logout.php">Sair</a>
  
  //tentar fazer que nem o descomplica, imagem no grupo-1
</body>
</html>
