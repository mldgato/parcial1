<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Integrante extends Entity
{
    protected $attributes = [
        'integrante_id' => null,
        'nombre' => null,
        'apellido' => null,
        'fecha_nacimiento' => null,
        'fecha_muerte' => null,
        'web_oficial' => null,
        'pais_id' => null,
    ];
}
