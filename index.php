<?php
session_start();
$usuarioLogado = isset($_SESSION['usuario']);
?>



<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <title>DRC - Doença Renal Crônica</title>
  <link rel="stylesheet" href="css/Index.css">
  <link href="https://fonts.googleapis.com/css2?family=Berkshire+Swash&display=swap" rel="stylesheet">
  <script src="js/Index.js"></script>
  
</head>
<body>
  <header>
    <nav class="navbar">
      <div class="logo"><img src="img/Imagem rim.png" class="img_navbar"></div> <!-- logo profisorio -->
      
      <ul class="nav-links">
        <li><a href="index.php">Home</a></li>
        <li><a href="ebook.html">EBook</a></li>
        <li><a href="#">Contato</a></li>
      </ul>
      <div class="botoes">
  <?php if ($usuarioLogado): ?>
      <a href="perfil.php" class="btn perfil">Perfil</a>
  <?php else: ?>
      <a href="login.html" class="btn entrar">Entrar</a>
      <a href="cadastro.html" class="btn cadastrar">Cadastrar</a>
  <?php endif; ?>
</div>


    </nav>
  </header>
  <section class="Meio">
    <center><h1>DRC <img src="img/Imagem rim.png" class="img_meio"> </h1> 
        
    <h2>Doença Renal Crônica</h2>

   <a href="escolha.php" class="saiba-mais">Saiba mais</a> </center>
   <h1 id="rim" >Rim por Rim</h1>
  </section>
  <footer id="footer">
    <div class="footer-container">
    
     
        
          <div class="footer-box">
          <h3>Assuntos</h3>
            <p>Lorem ipsum dolor</p>
            <p>Lorem ipsum dolor</p>
            <p>Lorem ipsum dolor</p>
          </div>
          <div class="footer-box">
            <h3>Dúvidas</h3>
            <p href="Post.html">A DRC tem cura?</p>
            <p href="Post.html">Como a DRC é diagnosticada?</p>
            <p href="Post.html">O que é Doença Renal Crônica (DRC)?</p>
          </div>
          <div class="footer-box">
            <h3>Conta</h3>
            <p><a href="login.html">Entrar</a></p>
            <p><a href="cadastro.html">Cadastrar</a></p>
            <p><a href="chat.php">Chat</a></p>
          </div>

          <div class="footer-box direita">
            <h3>Contato</h3>
            <p>Telefone: (11) 4002-8922</p>
            <p>Telefone: (11) 96145-5885</p>
            <p>Email: TccDcsNutri@gmail.com</p>
      
    </div>
  </footer>
  <script src="js/Index.js"></script>
</body>
</html>
