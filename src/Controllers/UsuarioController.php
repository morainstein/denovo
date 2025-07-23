<?php

namespace Morainstein\Denovo\Controllers;

use Exception;
use Morainstein\Denovo\Models\Entities\EntityException;
use Morainstein\Denovo\Models\Entities\Usuario;
use Morainstein\Denovo\Models\Repositories\UsuarioRepository;
use Ramsey\Uuid\Uuid;

class UsuarioController implements Controller
{
  private UsuarioRepository $repository;

  public function __construct()
  {
    $this->repository = new UsuarioRepository;
  }

  public function home()
  {
    ?>
    
      <a href="/usuario/create">Cadastrar Usuário</a>

    <?php 
  }

  public function formCreate()
  {
    include_once __DIR__ . '/../../views/formulario.php';
  }

  public function create()
  {
    
    $senha = password_hash($_POST['senha'],PASSWORD_ARGON2ID);
    $id = Uuid::uuid4()->toString();
    $nome = $_POST['nome'];
    $email = $_POST['email'];

    try{
      $usuario = new Usuario($id,$nome,$email,$senha);

    }catch(EntityException $e){
      $messagem = $e->getMessage();

      $_SESSION['mensagem'] = $messagem;

      $paginaAnterior = $_SERVER['HTTP_REFERER'];
      header("Location: $paginaAnterior");
    }

    $this->repository->addUsuario($usuario);

    header("location: /");
  }


}