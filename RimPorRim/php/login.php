<?php
include("db.php");

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $senha = $_POST["senha"];

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($senha, $usuario["senha"])) {
            $_SESSION["usuario_id"] = $usuario["id"];
            $_SESSION["nome"] = $usuario["nome"];
            header("Location: chat.php"); // redireciona para o chat
            exit;
        } else {
            echo "Senha incorreta!";
        }
    } else {
        echo "Usuário não encontrado!";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="estiloCasLog.css">
  <title>Login</title>
</head>
<body>
  <div class="container">
    <div class="box-esquerda">
      <h2>Parece que você já esteve aqui...<br>Bem vindo de volta!</h2>
      <p>Caso não possua conta cadastre-se agora!</p>
      <a href="cadastro.php" class="botao">Cadastrar</a>
    </div>
    <div class="box-direita">
      <h1>Entrar</h1>
      <form method="POST">
        <label>Email:</label>
        <input type="email" name="email" required>
        <label>Senha:</label>
        <input type="password" name="senha" required>
        <button type="submit" class="botao">Entrar</button>
      </form>
    </div>
  </div>
</body>
</html>
