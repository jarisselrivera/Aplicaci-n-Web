<?php
namespace App\Validation;
use App\Models\UsuariosModel;

class Reglasusuario{

  public function validateUser(string $str, string $fields, array $data){
    $modelo = new UsuariosModel();
    $usuario = $modelo->where('usuario', $data['usuario'])->first();

    if(!$usuario)
      return false;

    return password_verify($data['password'], $usuario['password']);
  }
}