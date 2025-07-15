<?php
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


if($rota == '/usuario/create' && $metodo == 'GET'){
  
  include_once __DIR__ . '/../views/home.php';

} else if($rota == '/usuario/create' && $metodo == 'POST'){

  var_dump($_POST);

} else if($rota == '/coisas'){

  echo "rota coisas";

} else{

  http_response_code(404);
}


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


if($rota == '/usuario/create' && $metodo == 'GET'){
  
  include_once __DIR__ . '/../views/home.php';

} else if($rota == '/usuario/create' && $metodo == 'POST'){

  var_dump($_POST);

} else if($rota == '/coisas'){

  echo "rota coisas";

} else{
//Alerkina777
  http_response_code(404);
}

