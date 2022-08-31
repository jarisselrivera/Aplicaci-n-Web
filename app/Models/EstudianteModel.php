<?php

namespace App\Models;
use CodeIgniter\Model;

class EstudianteModel extends Model {
    protected $table                = 'estudiantes';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        "nombre",
        "email",
        "telefono",
        "imagenperfil"
    ];
}