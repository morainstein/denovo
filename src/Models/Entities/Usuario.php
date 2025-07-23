<?php

namespace Morainstein\Denovo\Models\Entities;

use Exception;
use Iterator;
use IteratorAggregate;

class Usuario implements Entity
{

  public readonly string $email;
  
  public function __construct(
    public readonly string $id,
    public readonly string $nome,
    string $email,
    public readonly string $senha
  )
  {
    $this->setEmail($email);
  }

  public function setEmail(string $email)
  {
    if(!filter_var($email,FILTER_VALIDATE_EMAIL)){
      throw new EntityException(EntityException::INVALID_EMAIL);
    }

    $this->email = $email;
  }

}