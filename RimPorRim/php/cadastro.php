<?php
include("db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $senha = password_hash($_POST["senha"], PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES ('$nome', '$email', '$senha')";

    if ($conn->query($sql) === TRUE) {
        echo "Cadastro realizado com sucesso!";
        header("Location: login.php");
        exit;
    } else {
        echo "Erro: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estiloCasLog.css">
  <title>Cadastro</title>
</head>
<body>
  <div class="container">
    <div class="box-esquerda">
      <h2>Primeira vez aqui?<br>Seja bem vindo!</h2>
      <p>Caso já possua uma conta faça login!</p>
      <a href="login.php" class="botao">Login</a>
    </div>
    <div class="box-direita">
      <h1>Cadastro</h1>
      <form method="POST">
        <label>Nome:</label>
        <input type="text" name="nome" required>
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Senha:</label>
        <input type="password" name="senha" required>
        <button type="submit" class="botao">Cadastrar</button>
      </form>
    </div>
  </div>
</body>
</html>
