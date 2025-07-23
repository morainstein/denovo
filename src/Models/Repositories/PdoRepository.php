<?php

namespace Morainstein\Denovo\Models\Repositories;

use Morainstein\Denovo\Models\Entities\Entity;

class PdoRepository
{
  protected string $table = '';
  protected \PDO $pdo;

  public function __construct()
  {
    $this->pdo = conn();
  }

  protected function add(Entity $entity)
  {
    $colunas = [];
    $valores = [];
    $bindings = [];

    foreach($entity as $chave => $valor){
      $colunas[] = $chave;
      $valores[] = $valor;
      $bindings[] = "?";
    }

    $colunas = implode(", ",$colunas);
    $bindings = implode(", ",$bindings);

    $sql = "INSERT INTO {$this->table} ($colunas) VALUES ($bindings)"; 

    $stmt = $this->pdo->prepare($sql);
    
    $i = 1;
    foreach($valores as $valor){
      $stmt->bindValue($i++, $valor);
    }
    
    return $stmt->execute();
  }

}