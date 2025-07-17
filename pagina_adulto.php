<?php
session_start();
$usuarioLogado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>Área dos Adultos</title>
  <link rel="stylesheet" href="css/index.css">
  <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
  <script>
    function mostrarConteudo(tipo) {
      const conteudo = document.getElementById("conteudo");
      const botoes = document.querySelectorAll(".sidebar button");
      botoes.forEach(btn => btn.classList.remove("active"));
      document.getElementById("btn-" + tipo).classList.add("active");

      let html = "";
      if (tipo === "drc") {
        html = `
          <h2>O que é DRC</h2>
          <div class="item"><img src="img/ic1.png"><p>DRC explicação 1</p></div>
          <div class="item"><img src="img/ic2.png"><p>DRC explicação 2</p></div>
          <div class="item"><img src="img/ic3.png"><p>DRC explicação 3</p></div>
        `;
      } else if (tipo === "videos") {
        html = `
          <h2>Vídeos educativos</h2>
          <div class="item"><img src="img/ic4.png"><p>Vídeo 1</p></div>
          <div class="item"><img src="img/ic5.png"><p>Vídeo 2</p></div>
          <div class="item"><img src="img/ic6.png"><p>Vídeo 3</p></div>
        `;
      } else if (tipo === "receitas") {
        html = `
          <h2>Receitas saudáveis</h2>
          <div class="item"><img src="img/ic7.png"><p>Receita 1</p></div>
          <div class="item"><img src="img/ic8.png"><p>Receita 2</p></div>
          <div class="item"><img src="img/ic9.png"><p>Receita 3</p></div>
        `;
      }

      conteudo.innerHTML = html;
    }

    window.onload = () => {
      mostrarConteudo("drc");
    };
  </script>
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
        <?php if ($usuarioLogado): ?>
          <a href="perfil.php" class="btn perfil"><img src="img/IconeCL.png" class="img_pessoa"> Perfil</a>
          <a href="logout.php" class="btn sair">Sair</a>
        <?php else: ?>
          <a href="login.html" class="btn entrar"><img src="img/IconeCL.png" class="img_pessoa"> Entrar</a>
          <a href="cadastro.html" class="btn cadastrar"><img src="img/IconeCL.png" class="img_pessoa"> Cadastrar</a>
        <?php endif; ?>
      </div>
    </nav>
  </header>

  <div class="container-geral">
    <div class="sidebar">
      <button id="btn-drc" onclick="mostrarConteudo('drc')">Oque é DRC</button>
      <button id="btn-videos" onclick="mostrarConteudo('videos')">Vídeos</button>
      <button id="btn-receitas" onclick="mostrarConteudo('receitas')">Receitas</button>
      <button onclick="window.location.href='chat.php'">Chat</button>
    </div>
    <div class="conteudo" id="conteudo"></div>
  </div>
</body>
</html>