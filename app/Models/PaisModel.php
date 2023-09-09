<?php 
namespace App\Models;

use  App\Entities\Pais;
use CodeIgniter\Model;

class PaisModel extends Model{
    protected $table = 'paises';
    protected $primaryKey = 'pais_id';
    protected $allowedFields = ['nombre'];

    protected $returnType = Pais::class;
}