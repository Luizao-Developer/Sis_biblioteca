<?php 

// Obtém as informações do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Conecta ao banco de dados usando PDO
$pdo = new PDO('mysql:host=localhost;dbname=sisbiblioteca', 'root', '');

// Executa uma consulta para verificar se o usuário e a senha correspondem a um registro na tabela de usuários
$stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ? AND senha = ?');
$stmt->execute([$email, $senha]);
$user = $stmt->fetch();

// Verifica se o usuário foi encontrado e redireciona para a página principal se as credenciais estiverem corretas
if ($user) {
  header('Location: ../usuario/Home.html');
  exit;
} else {
  // Exibe uma mensagem de erro se as credenciais estiverem incorretas
  echo 'Usuário ou senha incorretos.';
}


// Inicia uma nova sessão
session_start();

// Cria uma variável de sessão para armazenar as informações do usuário
$_SESSION['user_id'] = $user['id'];
$_SESSION['username'] = $user['username'];
