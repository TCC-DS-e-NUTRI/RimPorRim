<?php
session_start();
$usuarioLogado = isset($_SESSION['usuario']);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Escolha a Página</title>
    <link rel="stylesheet" href="css/Index.css"> <!-- Você pode renomear para css/Escolha.css se quiser -->
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
            <?php if ($usuarioLogado): ?>
                <a href="perfil.php" class="btn perfil"><img src="img/IconeCL.png" class="img_pessoa"> Perfil</a>
                
            <?php else: ?>
                <a href="login.html" class="btn entrar"><img src="img/IconeCL.png" class="img_pessoa"> Entrar</a>
                <a href="cadastro.html" class="btn cadastrar"><img src="img/IconeCL.png" class="img_pessoa"> Cadastrar</a>
            <?php endif; ?>
        </div>
    </nav>
</header>

<section class="Meio" style="height: auto; padding-top: 50px; text-align: center;">
    <h1 style="font-family: 'Berkshire Swash', cursive; font-size: 50px; color: #282E34;">Escolha a página</h1>

    <div style="display: flex; justify-content: center; gap: 50px; margin-top: 50px; flex-wrap: wrap;">
        <a href="pagina_crianca.php" class="btn_infantil button">
            <span style="font-size: 40px; font-family: 'Berkshire Swash', cursive;">Criança</span>
        </a>

        <a href="pagina_adulto.php" class="btn_adulto button">
            <span style="font-size: 40px; font-family: 'Berkshire Swash', cursive;">Adulto</span>
        </a>

        <a href="pagina_profissional.php" class="btn_profissional button">
            <span style="font-size: 40px; font-family: 'Berkshire Swash', cursive;">Profissional</span>
        </a>
    </div>
</section>

</body>
</html>
