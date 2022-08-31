<?php
namespace App\Models;
use CodeIgniter\Model;

class CatedraticosModel extends Model {
    protected $table                = 'catedraticos';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $insertID             = 0;
    protected $returnType           = 'array';
    protected $useSoftDelete        = false;
    protected $protectFields        = true;
    protected $allowedFields        = [
        "nombre",
        "direccion",
        "email",
        "telefono",
        "imagenperfil"
    ];
}