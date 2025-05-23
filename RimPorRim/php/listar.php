<?php
session_start();
include 'conexao.php';

$sql = "SELECT m.mensagem, m.data_envio, u.nome, u.tipo
        FROM mensagens m
        JOIN usuarios u ON m.usuario_id = u.id
        ORDER BY m.data_envio ASC";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while ($msg = $result->fetch_assoc()) {
    $classe_tipo = $msg['tipo'] === 'profissional' ? 'profissional' : 'paciente';
    $cor_nome = $msg['tipo'] === 'profissional' ? 'style=\"color:red;\"' : '';

    echo '<div class="mensagem ' . $classe_tipo . '">';
    echo '<div class="nome" ' . $cor_nome . '><strong>' . htmlspecialchars($msg['nome']) . '</strong></div>';
    echo '<div class="texto">' . htmlspecialchars($msg['mensagem']) . '</div>';
    echo '</div>';
  }
} else {
  echo "<p>Nenhuma mensagem ainda.</p>";
}
?>
