<?php

namespace Morainstein\Denovo\Controllers;

use PDO;
use Ramsey\Uuid\Uuid;

class UsuarioController implements Controller
{
  private PDO $pdo;

  public function __construct()
  {
    $this->pdo = conn();
  }

  public function formCreate()
  {
    include_once __DIR__ . '/../../views/home.php';
  }

  public function create()
  {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "INSERT INTO usuarios (id, nome, email, senha) VALUES (?, ?, ?, ?)";
    $stmt = $this->pdo->prepare($sql);

    $stmt->execute([Uuid::uuid4()->toString(), $nome, $email, $senha]);

    header("location: /usuario/create");
  }


}