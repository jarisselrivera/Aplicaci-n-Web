<?php
namespace App\Controllers;
use App\Models\SeccionesModel;

class Secciones extends BaseController
{
    private $db;

    public function __construct() {
        $this->db = db_connect();
    }
    
    public function index() {
        $modelo = new SeccionesModel();
        $data['secciones'] = $modelo->orderBy('id', 'DESC')->findAll();
        return view("secciones/secciones", $data);
    }

    public function crear() {
        $data['secciones'] = $this->db->query("Select idasignaturas from secciones")->getResultArray();
        return view('secciones/crear', $data);
    }

    public function salvarSecciones() {
        
        if($this->request->getMethod() == "post") {
            $rules = [
                "nombre" => "required", 
                "horario" => "required", 
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
                    $modeloSecciones = new SeccionesModel();

                    $data = [
                        "nombre" => $this->request->getVar("nombre"),
                        "horario" => $this->request->getVar("horario"),
                    ];

                    if($modeloSecciones->insert($data)) {
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
        $modelo = new SeccionesModel();
        $data['secciones'] = $modelo->where('id', $id)->first();
        return view('secciones/editar', $data);
    }

    public function actualizar() {
        helper(['form', 'url']);

        $modelo = new SeccionesModel();

        $id = $this->request->getVar('id');

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            "horario" => $this->request->getVar("horario"),
        ];

        $salvar = $modelo->update($id, $data);
        return redirect()->to(base_url('public/secciones'));
    }

    public function eliminar($id = null) {
        $modelo = new SeccionesModel();
        $data['secciones'] = $modelo->where('id', $id)->delete($id);
        return redirect()->to(base_url('public/secciones'));
    }

}