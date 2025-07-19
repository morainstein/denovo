<?php

use Morainstein\Denovo\Controllers\UsuarioController;

require_once __DIR__ . '/../vendor/autoload.php';

$pdo = conn();

$recurso = $_SERVER['PATH_INFO'] ?? "/";
$metodo = $_SERVER['REQUEST_METHOD'];

$rota = "$metodo|$recurso";

$rotas = [
  'GET|/usuario/create' => [UsuarioController::class, 'formCreate'],
  'POST|/usuario/create' => [UsuarioController::class, 'create'],
  'GET|/usuario/all' => [UsuarioController::class, ''],
  'GET|/usuario/edit' => [UsuarioController::class, ''],
  'POST|/usuario/edit' => [UsuarioController::class, ''],
  'POST|/usuario/delete' => [UsuarioController::class, ''],
];

$controlador = new $rotas[$rota][0]();
$funcao = $rotas[$rota][1];

$controlador->$funcao();












// // Rota para formulário de criação de usuário
// if($rota == '/usuario/create' && $metodo == 'GET'){
  
//   include_once __DIR__ . '/../views/home.php';

// // Rota para criação de usuário
// } else if($rota == '/usuario/create' && $metodo == 'POST'){

// // Rota para selecionar todos os usuários
// } else if($rota == '/usuario/all' && $metodo == 'GET'){

// // Rota para formulário de edição de usuário  
// } else if($rota == '/usuario/edit' && $metodo == 'GET'){

// // Rota para editar usuário  
// } else if($rota == '/usuario/edit' && $metodo == 'POST'){

// // Rota para deletar usuário  
// } else if($rota == '/usuario/delete'){
  
// } else{  
//   http_response_code(404);
//   echo "<h1>ROTA NÃO EXISTENTE</h1>";
// }
