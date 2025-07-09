<?php
session_start();
include('conexao.php');

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "SELECT * FROM usuarios WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();

    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $usuario = $result->fetch_assoc();

        if (password_verify($senha, $usuario['senha'])) {
            // SALVAR TUDO DENTRO DE $_SESSION['usuario']
            $_SESSION['usuario'] = [
                'id' => $usuario['id'],
                'nome' => $usuario['nome'],
                'email' => $usuario['email'],
                'tipo' => $usuario['tipo']
            ];

            // Redirecionar para a página inicial
            header('Location: ../index.php');
            exit();
        } else {
            echo "<script>alert('Senha incorreta!'); window.location.href='../login.html';</script>";
        }
    } else {
        echo "<script>alert('Email não encontrado!'); window.location.href='../login.html';</script>";
    }

    $stmt->close();
    $conn->close();
}
?>
