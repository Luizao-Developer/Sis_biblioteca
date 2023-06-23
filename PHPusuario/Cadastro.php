<?php 

$host = 'localhost';
$dbname = 'sisbiblioteca';
$username = 'root';
$password = '';



try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // configurar o PDO para lançar exceções em caso de erros
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
}

//Pegando os valores dos inputs do cadastro
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha = $_POST['senha'];

//Definindo a consulta a ser realizada no banco
$query = "INSERT INTO usuario (nome, email, senha) VALUES (:nome, :email, :senha)";


//Enviando a consulta ao servidor
$stmt = $pdo->prepare($query);

//Passando como paramentro os valores
$stmt->bindParam(':nome', $nome);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':senha', $senha);


//Verificando o sucesso da consulta
try {
    

    $stmt->execute();
    header('Location: ../usuario/Home.html');
    exit();
} catch (PDOException $e) {
    echo "Erro ao executar consulta: " . $e->getMessage();
}

