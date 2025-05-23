document.getElementById('mensagemForm').addEventListener('submit', function (e) {
  e.preventDefault();

  const mensagem = document.getElementById('mensagemInput').value;

  fetch('enviar_mensagem.php', {
    method: 'POST',
    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
    body: 'mensagem=' + encodeURIComponent(mensagem)
  })
  .then(() => {
    document.getElementById('mensagemInput').value = '';
    carregarMensagens(); 
  });
});

function carregarMensagens() {
  fetch('listar.php')
    .then(res => res.text())
    .then(html => {
      document.getElementById('chatBox').innerHTML = html;
      document.getElementById('chatBox').scrollTop = 9999;
    });
}

setInterval(carregarMensagens, 2000);
carregarMensagens();
