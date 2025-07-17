<?php
session_start();
if (!isset($_SESSION['usuario'])) {
  $_SESSION['ultima_pagina'] = $_SERVER['REQUEST_URI'];
  header("Location: login.html");
  exit();
}

include('php/conexao.php');

// Buscar mensagens
$sql = "SELECT c.mensagem, c.hora_mandada, u.nome, u.tipo
        FROM chat c
        JOIN usuarios u ON c.usuario_id = u.usuario_id
        WHERE c.excluida = 0
        ORDER BY c.hora_mandada ASC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Chat</title>
  <link rel="stylesheet" href="css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo"><img src="img/Imagem rim.png" class="img_navbar"></div>
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="ebook.html">EBook</a></li>
        <li><a href="#">Contato</a></li>
      </ul>
      <div class="botoes">
        <a href="perfil.php" class="btn perfil"><img src="img/IconeCL.png" class="img_pessoa"> Perfil</a>
        <a href="logout.php" class="btn sair">Sair</a>
      </div>
    </nav>
  </header>

  <main class="chat-container">
    <h2 class="chat-titulo">CHAT</h2>

    <div class="caixa-chat"  id="caixa-chat">
      <?php while ($row = $result->fetch_assoc()): ?>
        <?php
          $sou_eu = ($row['nome'] === $_SESSION['usuario']['nome']);
          $classe_lado = $sou_eu ? 'direita' : 'esquerda';
          $classe_profissional = ($row['tipo'] === 'Profissional') ? 'Profissional' : '';
        ?>
        <div class="mensagem <?php echo $classe_lado; ?>">
          <div class="conteudo-mensagem">
            <p class="nome <?php echo $classe_profissional; ?>">
              <?php echo htmlspecialchars($row['nome']); ?>
            </p>
            <div class="bolha">
              <?php echo htmlspecialchars($row['mensagem']); ?>
            </div>
          </div>
        </div>
      <?php endwhile; ?>
    </div>

    <form action="enviar_mensagem.php" method="POST" class="form-chat">
      <input type="text" name="mensagem" placeholder="Digite sua mensagem..." required>
      <button alt="enviar" type="submit">
        <img src="img/send_icon.png" alt="Enviar" height="25">
      </button>
    </form>
  </main>
  <script>
  window.addEventListener('load', function () {
    var chatBox = document.getElementById('caixa-chat');
    chatBox.scrollTop = chatBox.scrollHeight;
  });
</script>
</body>
</html>
