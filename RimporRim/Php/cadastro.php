<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include_once('conexao.php');

if (isset($_POST['cadastro'])) {
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $tipo = $_POST['tipo'] ?? '';

    $senhaHash = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nome, email, senha, tipo) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        $stmt->bind_param("ssss", $nome, $email, $senhaHash, $tipo);
        if ($stmt->execute()) {
            echo "<script>
                alert('Cadastro realizado com sucesso!');
                window.location.href = '../Login.html';
            </script>";
        } else {
            echo "<script>
                alert('Erro ao cadastrar: " . $stmt->error . "');
                window.history.back();
            </script>";
        }
        $stmt->close();
    } else {
        echo "<script>
            alert('Erro na preparação da query: " . $conn->error . "');
            window.history.back();
        </script>";
    }

    $conn->close();
}
?>
