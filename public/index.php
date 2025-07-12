<?php

use Ramsey\Uuid\Uuid;

require_once __DIR__ . '/../vendor/autoload.php';

  define("DB_NAME", "php");
  define("DB_HOST", "localhost");
  define("DB_USER", "root");
  define("DB_PASS", "123");

  try {
    $pdo = new PDO("mysql:host=".DB_HOST.";dbname=".DB_NAME, DB_USER, DB_PASS);
  } catch (PDOException $e) {
    echo "Erro com o banco de dados: ".$e->getMessage();
  }

$rota = $_SERVER['REQUEST_URI'] ?? "/";
$metodo = $_SERVER['REQUEST_METHOD'];

if($rota == '/usuarios'){
  echo "rota usuarios";

}else if($rota == '/'){
  
  include_once '../views/inicial.php';

}else if($rota == '/home'){

  // $pdo->

  include_once '../views/home.php';

}else if($rota == '/usuario/create' && $metodo == 'POST'){

  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  $uuid = Uuid::uuid4()->toString();

  $sql = "INSERT INTO usuarios (id, nome, email, senha) VALUES (?, ?, ?, ?)";
  
  $stmt = $pdo->prepare($sql);
  $stmt->execute([$uuid, $nome, $email, $senha]);

  header('Location: /home');

}else{
  http_response_code(404);
  echo "<h1> ROTA NÂO EXISTE </h1>";
}