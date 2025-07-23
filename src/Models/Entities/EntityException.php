<?php

namespace Morainstein\Denovo\Models\Entities;

use InvalidArgumentException;

class EntityException extends InvalidArgumentException
{

  public const INVALID_EMAIL = 'Email inválido';

    public function __construct(string $message)
    {
        parent::__construct($message);
    }
}