<?php

namespace App\Models;

use App\Entities\Integrante;
use CodeIgniter\Model;

class IntegranteModel extends Model
{
    protected $table = 'integrantes';
    protected $primaryKey = 'integrante_id';
    protected $allowedFields = ['nombre', 'apellido', 'fecha_nacimiento', 'fecha_muerte', 'web_oficial', 'pais_id'];

    protected $returnType = Integrante::class;

    protected function getFechaNacimiento(string $fechaNacimiento)
    {
        return date('d-m-Y', strtotime($fechaNacimiento));
    }

    protected function getFechaMuerte(string $fechaMuerte)
    {
        return date('d-m-Y', strtotime($fechaMuerte));
    }

    public function findAllWithPais()
    {
        return $this->select('integrantes.*, paises.nombre AS nombre_pais')
            ->join('paises', 'paises.pais_id = integrantes.pais_id')
            ->findAll();
    }
}