<?php
session_start();
include('conexao.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $resultado = $stmt->get_result();

    if ($resultado->num_rows === 1) {
        $usuario = $resultado->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            // Salva os dados na sessão
            $_SESSION['usuario'] = [
                'id' => $usuario['usuario_id'],
                'nome' => $usuario['nome'],
                'email' => $usuario['email'],
                'tipo' => $usuario['tipo']
            ];

            // Corrige o caminho de redirecionamento
            $destino = $_SESSION['ultima_pagina'] ?? $_SERVER['HTTP_REFERER']?? '/tcc/rimporrim/index.php'; // <-- caminho absoluto correto
             if (preg_match('/login\.php|login\.html/i', $destino)) {
                $destino = '/tcc/rimporrim/index.php';
            } else {
                $destino = $destino;
            }   
            unset($_SESSION['ultima_pagina']);
            
            header("Location: $destino");
            exit();
        } else {
            echo "<script>alert('❌ Senha incorreta.'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('❌ Usuário não encontrado.'); window.history.back();</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
