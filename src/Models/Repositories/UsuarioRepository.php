<?php

namespace Morainstein\Denovo\Models\Repositories;

use Morainstein\Denovo\Models\Entities\Usuario;

class UsuarioRepository extends PdoRepository
{

  protected string $table = 'usuarios';

  public function addUsuario(Usuario $usuario) : bool
  {
    return $this->add($usuario);
  }

  public function getUsuarioByEmail(string $email) : ?Usuario
  {
    $sql = "SELECT * FROM {$this->table} WHERE email = ?";
    $stmt = $this->pdo->prepare($sql);
    $stmt->execute([$email]);
    
    $data = $stmt->fetch(\PDO::FETCH_ASSOC);
    
    if ($data) {
      return new Usuario($data['id'], $data['nome'], $data['email'], $data['senha']);
    }
    
    return null;
  }


}