<?php
session_start();
if (!isset($_SESSION['usuario_id'])) {
  header("Location: ../login/login.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8" />
  <title>Chat em Grupo</title>
  <link rel="stylesheet" href="Chat.css" />
</head>
<body>
  <div class="chat-container">
    <h2 class="chat-title">Chat em Grupo</h2>

    <div class="chat-box" id="chatBox">
    </div>

    <form id="mensagemForm">
      <input type="text" name="mensagem" id="mensagemInput" placeholder="Digite sua mensagem..." required />
      <button type="submit">&#9658;</button>
    </form>
  </div>

  <script src="chat.js"></script>
</body>
</html>
