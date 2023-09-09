<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class Pais extends Entity
{
    protected $attributes = [
        'pais_id' => null,
        'nombre' => null,
    ];
}
