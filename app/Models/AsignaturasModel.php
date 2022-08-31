<?php
namespace App\Models;
use CodeIgniter\Model;

class AsignaturasModel extends Model {
    protected $table                = 'asignaturas';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        "id",
        "nombre",
        "catedraticos_id"
    ];
}