<?php
namespace App\Models;
use CodeIgniter\Model;

class SeccionesModel extends Model {
    protected $table                = 'secciones';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        "id",
        "nombre",
        "idasignaturas",
        "horario"
    ];
}