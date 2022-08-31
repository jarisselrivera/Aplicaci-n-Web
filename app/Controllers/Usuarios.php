<?php namespace App\Controllers;
use App\Models\UsuariosModel;

class Usuarios extends BaseController
{
    public function login() 
    {
        $data = [];

        if($this->request->getMethod() == 'post') {
            
            $rules = [
                'usuario' => 'required',
                'password' => 'required|min_length[6]|max_length[255]|validateUser[usuario,password]',
            ];

            $errors = [
                'password' => [
                    'validarUsuario' => "Usuario o Password no encontrados",
                ],
            ];

            if(!$this->validate($rules, $errors)) {
                return view('login', [
                    "validation" => $this->validator,
                ]);
            } else {
                $modelo = new UsuariosModel();

                $usuario = $modelo->where('usuario', $this->request->getVar('usuario'))->first();

                $this->setUserSession($usuario);

                return redirect()->to(base_url('public/dashboard'));
            }
        }
        return view('login');
    }

    private function setUserSession($usuario) {
        $data = [
            'id' => $usuario['id'],
            'nombre' => $usuario['nombre'],
            'tel' => $usuario['telfono'],
            'email' => $usuario['email'],
            'estaLogueado' => true,
        ];

        session()->set($data);
        return true;
    }

    public function logout() {
        session()->destroy();
        return redirect()->to(base_url('public/login'));
    }

    public function registrar() {
        $data = [];

        if($this->request->getMethod() == 'post') {
            $rules = [
                'nombre' => 'required|min_length[3]|max_length[50]',
                'telefono' => 'required|min_length[8]|max_length[20]',
                'email' => 'required|min_length[6]|max_length[50]|valid_email',
                'usuario' => 'required|min_length[6]|max_length[20]|is_unique[usuarios.usuario]',
                'password' => 'required|min_length[8]|max_length[255]',
                'confirmar_password' => 'matches[password]',
            ];

            if(!$this->validate($rules)) {
                return view('registrar', [
                    "validation" => $this->validator,
                ]);
            } else {
                $modelo = new UsuariosModel();

                $dataNueva = [
                    'nombre' => $this->request->getVar('nombre'),
                    'email' => $this->request->getVar('email'),
                    'telefono' => $this->request->getVar('telefono'),
                    'usuario' => $this->request->getVar('usuario'),
                    'password' => $this->request->getVar('password'),
                ];

                $modelo->save($dataNueva);
                $session = session();
                $session->setFlashdata('success', 'Registro Correcto');

                return redirect()->to(base_url('public/login'));
            }
        }
        return view('registrar');
    }


    public function index() {
        $modelo = new UsuariosModel();
        $data['usuarios'] = $modelo->orderBy('id', 'DESC')->findAll();
        return view('usuarios/usuarios', $data);
    }

    public function crear() {
        return view('usuarios/crear');
    }

    public function almacenar() {
        if($this->request->getMethod() == "post") {
            $rules = [
                "nombre" => "required",
                "email" => "required|valid_email",
                "telefono" => "required",
                "usuario" => "required",
                "imagenperfil" => [
                    "rules" => "uploaded[imagenperfil]|max_size[imagenperfil,1024]|is_image[imagenperfil]|mime_in[imagenperfil,image/jpg,image/jpeg,image/gif,image/png]",
                "password" => "required",
                "confirmar_password" => "required",
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
                    $modeloUsuarios = new UsuariosModel();

                    $data = [
                        "nombre" => $this->request->getVar("nombre"),
                        "email" => $this->request->getVar("email"),
                        "telefono" => $this->request->getVar("telefono"),
                        "usuario" => $this->request->getVar("usuario"),
                        "imagenperfil" => "imagenes/" . $nnarchivo,
                        "password" => $this->request->getVar("password"),
                    ];

                    if($modeloUsuarios->insert($data)) {
                        $respuesta = [
                            'success' => true,
                            'msg' => 'Usuario creado correctamente',
                        ];
                    } else {
                        $respuesta = [
                            'success' => false,
                            'msg' => 'Error al crear Usuario',
                        ];
                    }

                    return $this->response->setJSON($respuesta);
                }
            }
        }
    }

    public function editar($id = null) {
        $modelo = new UsuariosModel();
        $data['usuario'] = $modelo->where('id', $id)->first();
        return view('usuarios/editar', $data);
    }

    public function actualizar() {
        helper(['form', 'url']);

        $modelo = new UsuariosModel();

        $id = $this->request->getVar('id');

        $data = [
            'nombre' => $this->request->getVar('nombre'),
            'email' => $this->request->getVar('correo'),
            'telefono' => $this->request->getVar('telefono'),
            'usuario' => $this->request->getVar('usuario'),
        ];

        $salvar = $modelo->update($id, $data);
        return redirect()->to(base_url('public/usuarios'));
    }

    public function eliminar($id = null) {
        $modelo = new UsuariosModel();
        $data['usuario'] = $modelo->where('id', $id)->delete($id);
        return redirect()->to(base_url('public/usuarios'));
    }

}