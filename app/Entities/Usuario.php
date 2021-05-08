<?php

namespace App\Entities;

final class Usuario
{
    public $id;
    public $username;
    public $password;
    public $estado;
    public $email;
    public $validado;
    public $fecha_registro;

    public function __construct(object $entity)
    {
        $this->id = $entity->id;
        $this->username = $entity->username;
        $this->password = $entity->password;
        $this->estado = $entity->estado;
        $this->email = $entity->email;
        $this->validado = $entity->validado;
        $this->fecha_registro = $entity->fecha_registro;
    }   
}