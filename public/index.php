<?php

use Morainstein\Denovo\Controllers\UsuarioController;

require_once __DIR__ . '/../vendor/autoload.php';

session_start();

$recurso = $_SERVER['PATH_INFO'] ?? "/";
$metodo = $_SERVER['REQUEST_METHOD'];

$rota = "$metodo|$recurso";

$rotas = [
  "GET|/" => [UsuarioController::class,'home'],
  "GET|/usuario/create" => [UsuarioController::class,'formCreate'],
  "POST|/usuario/create" => [UsuarioController::class,'create'],
  "GET|/usuario/all" => [UsuarioController::class,''],
  "GET|/usuario/edit" => [UsuarioController::class,''],
  'POST|/usuario/edit' => [UsuarioController::class,''],
  'POST|/usuario/delete' => [UsuarioController::class,''],
];

if(array_key_exists($rota, $rotas)){

  $controlador = new $rotas[$rota][0];
  $funcao = $rotas[$rota][1];
  
  $controlador->$funcao();
}else{
  http_response_code(404);
}
