<?php
namespace App\Controllers;
use App\Models\CatedraticosModel;

class Catedraticos extends BaseController {
    public function __construct() {
        helper(["url"]);
    }

    public function index() {
        $modelo = new CatedraticosModel();
        $data['catedraticos'] = $modelo->orderBy('id', 'DESC')->findAll();
        return view('catedraticos/catedraticos', $data);
    }

    public function crear() {
        return view('catedraticos/crear');
    }

    public function salvarCatedratico() {
        if($this->request->getMethod() == "post") {
            $rules = [
                "nombre" => "required",
                "direccion" => "required",
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
                    $modeloCatedratico = new CatedraticosModel();

                    $data = [
                        "nombre" => $this->request->getVar("nombre"),
                        "direccion" => $this->request->getVar("direccion"),
                        "email" => $this->request->getVar("email"),
                        "telefono" => $this->request->getVar("telefono"),
                        "imagenperfil" => "imagenes/" . $nnarchivo,
                    ];

                    if($modeloCatedratico->insert($data)) {
                        $respuesta = [
                            'success' => true,
                            'msg' => 'Catedratico creado correctamente',
                        ];
                    } else {
                        $respuesta = [
                            'success' => false,
                            'msg' => 'Error al crear Catedratico',
                        ];
                    }

                    return $this->response->setJSON($respuesta);
                }
            }
        }
    }

    public function editar($id = null) {
        $modelo = new CatedraticosModel();
        $data['catedraticos'] = $modelo->where('id', $id)->first();
        return view('catedraticos/editar', $data);
    }

    public function actualizar() {
        if($this->request->getMethod() == "post") {
            $id = $this->request->getVar("id");
            $img = $this->request->getFile('imagenperfil');

            if($img == "") {
                $rules = [
                    "nombre" => "required",
                    "direccion" => "required",
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
                    $modeloCatedratico = new CatedraticosModel();
    
                    $data = [
                        "nombre" => $this->request->getVar("nombre"),
                        "email" => $this->request->getVar("email"),
                        "telefono" => $this->request->getVar("telefono"),
                    ];
    
                    if($modeloCatedratico->update($id, $data)) {
                        $respuesta = [
                            'success' => true,
                            'msg' => 'Catedratico actualizado correctamente',
                        ];
                    } else {
                        $respuesta = [
                            'success' => false,
                            'msg' => 'Error al actualizar Catedratico',
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
                        $modeloCatedratico = new CatedraticosModel();
    
                        $data = [
                            "nombre" => $this->request->getVar("nombre"),
                            "direccion" => $this->request->getVar("direccion"),
                            "email" => $this->request->getVar("email"),
                            "telefono" => $this->request->getVar("telefono"),
                            "imagenperfil" => "imagenes/" . $nnarchivo,
                        ];
    
                        if($modeloCatedratico->update($id, $data)) {
                            $respuesta = [
                                'success' => true,
                                'msg' => 'Catedratico creado correctamente',
                            ];
                        } else {
                            $respuesta = [
                                'success' => false,
                                'msg' => 'Error al crear Catedratico',
                            ];
                        }
    
                        return $this->response->setJSON($respuesta);
                    }
                }
            }
        }
    }

    public function eliminar($id = null) {
        $modelo = new CatedraticosModel();
        $data = $modelo->find($id);
        $imagen = $data['imagenperfil'];
        if(file_exists($imagen)) {
            unlink($imagen);
        }
        $modelo->delete($id);
        return redirect()->to(base_url('public/catedraticos'));
    }
}