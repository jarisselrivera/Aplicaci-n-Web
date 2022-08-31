<?php
namespace App\Controllers;
use App\Models\AsignaturasModel;

class Asignaturas extends BaseController
{
    private $db;

    public function __construct() {
        $this->db = db_connect();
    }
    
    public function index() {
        $modelo = new AsignaturasModel();
        $data['asignaturas'] = $modelo->orderBy('id', 'DESC')->findAll();
        return view("asignaturas/asignaturas", $data);
    }

    public function crear() {
        $data['asignaturas'] = $this->db->query("Select catedraticos_id from asignaturas")->getResultArray();
        return view('asignaturas/crear', $data);
    }

    public function salvarAsignaturas() {
        
        if($this->request->getMethod() == "post") {
            $rules = [
                "nombre" => "required", 
                 
            ];

            if(!$this->validate($rules)) {
                $respuesta = [
                    'success' => false,
                    'msg' => 'Hay algunos errores de validación',
                ];

                return $this->response->setJSON($respuesta);
            } else {
                $archivo = $this->request->getFile('imagenperfil');

                $imagen_perfil = $archivo->getName();

                $temp = explode(".",$imagen_perfil);
                $nnarchivo = round(microtime(true)) . '.' . end($temp);

                if($archivo->move("imagenes", $nnarchivo)) {
                    $modeloAsignaturas = new AsignaturasModel();

                    $data = [
                        "nombre" => $this->request->getVar("nombre"),
                        
                    ];

                    if($modeloAsignaturas->insert($data)) {
                        $respuesta = [
                            'success' => true,
                            'msg' => 'Asignatura creado correctamente',
                        ];
                    } else {
                        $respuesta = [
                            'success' => false,
                            'msg' => 'Error al crear Asignatura',
                        ];
                    }

                    return $this->response->setJSON($respuesta);
                }
            }
        }
    }

    public function editar($id = null) {
        $modelo = new AsignaturasModel();
        $data['asignaturas'] = $modelo->where('id', $id)->first();
        return view('asignaturas/editar', $data);
    }

    public function actualizar() {
        helper(['form', 'url']);

        $modelo = new AsignaturasModel();

        $id = $this->request->getVar('id');

        $data = [
            'nombre' => $this->request->getVar('nombre'),
        ];

        $salvar = $modelo->update($id, $data);
        return redirect()->to(base_url('public/asignaturas'));
    }

    public function eliminar($id = null) {
        $modelo = new AsignaturasModel();
        $data['asignaturas'] = $modelo->where('id', $id)->delete($id);
        return redirect()->to(base_url('public/asignaturas'));
    }

}