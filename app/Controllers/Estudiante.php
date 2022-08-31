<?php
namespace App\Controllers;
use App\Models\EstudianteModel;

class Estudiante extends BaseController {
    public function __construct() {
        helper(["url"]);
    }

    public function index() {
        $modelo = new EstudianteModel();
        $data['estudiantes'] = $modelo->orderBy('id', 'DESC')->findAll();
        return view('estudiante/lista', $data);
    }

    public function agregarEstudiante() {
        return view('estudiante/agregar-estudiante');
    }

    public function salvarEstudiante() {
        if($this->request->getMethod() == "post") {
            $rules = [
                "nombre" => "required",
                "email" => "required|valid_email",
                "telefono" => "required",
                "imagenperfil" => [
                    "rules" => "uploaded[imagenperfil]|max_size[imagenperfil,1024]|is_image[imagenperfil]|mime_in[imagenperfil,image/jpg,image/jpeg,image/gif,image/png]",
                ],
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
                    $modeloEstudiante = new EstudianteModel();

                    $data = [
                        "nombre" => $this->request->getVar("nombre"),
                        "email" => $this->request->getVar("email"),
                        "telefono" => $this->request->getVar("telefono"),
                        "imagenperfil" => "imagenes/" . $nnarchivo,
                    ];

                    if($modeloEstudiante->insert($data)) {
                        $respuesta = [
                            'success' => true,
                            'msg' => 'Estudiante creado correctamente',
                        ];
                    } else {
                        $respuesta = [
                            'success' => false,
                            'msg' => 'Error al crear estudiante',
                        ];
                    }

                    return $this->response->setJSON($respuesta);
                }
            }
        }
    }

    public function editarEstudiante($id = null) {
        $modelo = new EstudianteModel();
        $data['estudiante'] = $modelo->where('id', $id)->first();
        return view('estudiante/editar', $data);
    }

    public function actualizarEstudiante() {
        if($this->request->getMethod() == "post") {
            $id = $this->request->getVar("id");
            $img = $this->request->getFile('imagenperfil');

            if($img == "") {
                $rules = [
                    "nombre" => "required",
                    "email" => "required|valid_email",
                    "telefono" => "required",
                ];
    
                if(!$this->validate($rules)) {
                    $respuesta = [
                        'success' => false,
                        'msg' => 'Hay algunos errores de validación',
                    ];
    
                    return $this->response->setJSON($respuesta);
                } else {
                    $modeloEstudiante = new EstudianteModel();
    
                    $data = [
                        "nombre" => $this->request->getVar("nombre"),
                        "email" => $this->request->getVar("email"),
                        "telefono" => $this->request->getVar("telefono"),
                    ];
    
                    if($modeloEstudiante->update($id, $data)) {
                        $respuesta = [
                            'success' => true,
                            'msg' => 'Estudiante actualizado correctamente',
                        ];
                    } else {
                        $respuesta = [
                            'success' => false,
                            'msg' => 'Error al actualizar estudiante',
                        ];
                    }
    
                    return $this->response->setJSON($respuesta);
                }
            } else {
                $img2 = $this->request->getVar("img");
                if(file_exists($img2)) {
                    unlink($img2);
                }
                $rules = [
                    "nombre" => "required",
                    "email" => "required|valid_email",
                    "telefono" => "required",
                    "imagenperfil" => [
                        "rules" => "uploaded[imagenperfil]|max_size[imagenperfil,1024]|is_image[imagenperfil]|mime_in[imagenperfil,image/jpg,image/jpeg,image/gif,image/png]",
                    ],
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
                        $modeloEstudiante = new EstudianteModel();
    
                        $data = [
                            "nombre" => $this->request->getVar("nombre"),
                            "email" => $this->request->getVar("email"),
                            "telefono" => $this->request->getVar("telefono"),
                            "imagenperfil" => "imagenes/" . $nnarchivo,
                        ];
    
                        if($modeloEstudiante->update($id, $data)) {
                            $respuesta = [
                                'success' => true,
                                'msg' => 'Estudiante creado correctamente',
                            ];
                        } else {
                            $respuesta = [
                                'success' => false,
                                'msg' => 'Error al crear estudiante',
                            ];
                        }
    
                        return $this->response->setJSON($respuesta);
                    }
                }
            }
        }
    }

    public function eliminarEstudiante($id = null) {
        $modelo = new EstudianteModel();
        $data = $modelo->find($id);
        $imagen = $data['imagenperfil'];
        if(file_exists($imagen)) {
            unlink($imagen);
        }
        $modelo->delete($id);
        return redirect()->to(base_url('public/estudiantes'));
    }
}