<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use Illuminate\Support\Facades\Storage;

class UsuarioController extends Controller
{

    public function index()
    {
        return view('index');
    }

    public function login()
    {
        $opc = false;
        $mensaje = "";
        $resultado = \App\User::login(request()->get('email'), request()->get('password'));
        $ip = request()->get('ip') ?? "0.0.0.0";

        if ($resultado) {

            // $alias = \App\User::consultarEnte($resultado->id);
            $alias = Auth::user()->permisos->where('actual', 1)->first()->ente;
            // Auth::user()->permisos->where('actual', 1)->first()->ente
            Session::put('alias', $alias->alias);
            Session::put('idusuario', $resultado->id);
            Session::put('sigla', $alias->sigla);
            Session::put('ip', $ip);
            // Session::put('imagen', Auth::user()->imagen);
            $opc = true;
            $mensaje = "Usuario logueado";

            $gua = \App\Log::guardar("Entrada al sistema del usuario con el id = " . $resultado->id, Session::get('alias'), 'INICIO SESION');
            $respuesta = [
                'OPC' => $opc,
                'MENSAJE' => $mensaje,
            ];
            return response()->json($respuesta, 200);
        } else {
            $opc = false;
            $mensaje = "Usuario ó Contraseña Incorrecta";
            $respuesta = [
                'OPC' => $opc,
                'MENSAJE' => $mensaje,
            ];
            return response()->json($respuesta, 200);
        }
    }
    public function administracion()
    {
        if (Auth::check()) {
            return view('Administracion');
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function gestion()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $usuarios = \App\User::listar($busqueda);
            foreach ($usuarios as $usu) {
                $usu->permi = $usu->permisos->where('id_ente', Auth::user()->permisos->where('actual', 1)->first()->ente->id)->first();
            }
            if ($usuarios) {
                $respuesta = [
                    // 'paginacion' => [
                    //     'total' => $usuarios->total(),
                    //     'pagina_actual' => $usuarios->currentPage(),
                    //     'por_pagina' => $usuarios->perPage(),
                    //     'ultima_pagina' => $usuarios->lastPage(),
                    //     'desde' => $usuarios->firstItem(),
                    //     'hasta' => $usuarios->lastItem(),
                    // ],
                    'usuarios' => $usuarios,
                    'alias' => Auth::user()->permisos->where('actual', 1)->first()->ente->alias,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'MENSAJE' => "Ocurrio un error...",
                ];
                return response()->json("Error", 500);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
    public function guardar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $usuarios = null;
            if ($data["id"] == 0) {
                request()->validate([
                    'identificacion' => 'required|unique:users,identificacion',
                    'nombre' => 'required',
                    'email' => 'required|email|unique:users,email',
                    'rol' => 'required',
                    'celular' => 'required',
                    'usuario' => 'required|unique:users,usuario',
                ], [
                    'identificacion.required' => 'La identificación es obligatorio',
                    'identificacion.unique' => 'La identificación ya se encuentra registrada',
                    'nombre.required' => 'El Nombre es obligatorio',
                    'email.required' => 'El email es obligatorio',
                    'email.unique' => 'El email ya se encuentra registrado',
                    'email.email' => 'El email debe ser valido',
                    'rol.required' => 'El rol es obligatorio',
                    'celular.required' => 'El celular es obligatorio',
                    'usuario.required' => 'El usuario es obligatorio',
                    'usuario.unique' => 'El usuario ya se encuentra registrado',
                ]);

                $usuarios = \App\User::guardar($data);
            } else {
                $usuario = \App\User::buscarUsuario($data['id']);
                request()->validate([
                    'identificacion' => 'required|unique:users,identificacion,' . $usuario->id,
                    'nombre' => 'required',
                    'email' => 'required|email|unique:users,email,' . $usuario->id,
                    'rol' => 'required',
                    'celular' => 'required',
                    'usuario' => 'required|unique:users,usuario,' . $usuario->id,
                ], [
                    'identificacion.required' => 'La identificación es obligatorio',
                    'identificacion.unique' => 'La identificación ya se encuentra registrada',
                    'nombre.required' => 'El Nombre es obligatorio',
                    'email.required' => 'El email es obligatorio',
                    'email.unique' => 'El email ya se encuentra registrado',
                    'email.email' => 'El email debe ser valido',
                    'rol.required' => 'El rol es obligatorio',
                    'celular.required' => 'El celular es obligatorio',
                    'usuario.required' => 'El usuario es obligatorio',
                    'usuario.unique' => 'El usuario ya se encuentra registrado',
                ]);
                $usuarios = \App\User::modificar($data, $data["id"]);
            }

            if ($usuarios) {

                if ($data["id"] == 0) {
                    $data["permisos"]["id_usuario"] = $usuarios->id;
                } else {
                    $data["permisos"]["id_usuario"] = $data["id"];
                }
                $data["permisos"]["superadmin"] = "N";

                $permi = \App\UserPermisos::where('id_usuario', $data["id"])->exists();
                if ($permi) {
                    $data["permisos"]["actual"] = 0;
                } else {
                    $data["permisos"]["actual"] = 1;
                }
                $usuarios_permisos = \App\UserPermisos::guardar($data["permisos"]);
                if ($data["id"] != 0) {
                    $usuarios = \App\User::buscarUsuario($data["id"]);
                }
                $usuarios->permi = $usuarios->permisos;
                $gua = \App\Log::guardar("Guardar el usuario con id = " . $data["id"], Session::get('alias'), 'PARAMETROS USUARIOS');
                $respuesta = [
                    'OPC' => 'SI',
                    'usuarios' => $usuarios,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Usuario No Guardado...",
                ];
                return response()->json($respuesta, 500);

            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function eliminar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $id = $data["usuario"]["permi"]["id"];
            $estado = $data["usuario"]["permi"]["estado"];
            if ($estado == "Activo") {
                $estado = "Inactivo";
            } else {
                $estado = "Activo";
            }
            $respuesta = \App\UserPermisos::editarestado($estado, $id);
            if ($respuesta) {
                if ($estado == "Inactivo") {
                    $eli = \App\UserPermisos::editarActual($id, 0);
                    $cam = \App\UserPermisos::cambiarActual($data["usuario"]["id"]);
                    $gua = \App\Log::guardar("Eliminar el permiso del usuario con id de permiso = " . $id, Session::get('alias'), 'PARAMETROS USUARIOS');
                } else {
                    $gua = \App\Log::guardar("Activar el permiso del usuario con id de permiso = " . $id, Session::get('alias'), 'PARAMETROS USUARIOS');
                }
            }
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function modificar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $id = $data['id'];
            $usuario = \App\User::buscarUsuario($id);
            request()->validate([
                'identificacion' => 'required|unique:users,identificacion,' . $usuario->id,
                'nombre' => 'required',
                'email' => 'required|email|unique:users,email,' . $usuario->id,
                'rol' => 'required',
                'celular' => 'required',
                'usuario' => 'required|unique:users,usuario,' . $usuario->id,
            ], [
                'identificacion.required' => 'La identificación es obligatorio',
                'identificacion.unique' => 'La identificación ya se encuentra registrada',
                'nombre.required' => 'El Nombre es obligatorio',
                'email.required' => 'El email es obligatorio',
                'email.unique' => 'El email ya se encuentra registrado',
                'email.email' => 'El email debe ser valido',
                'rol.required' => 'El rol es obligatorio',
                'celular.required' => 'El celular es obligatorio',
                'usuario.required' => 'El usuario es obligatorio',
                'usuario.unique' => 'El usuario ya se encuentra registrado',
            ]);
            $resp = \App\User::modificar($data, $id);
            if ($resp) {
                $usuarios_permisos = \App\UserPermisos::modificar($data["permisos"], $id);
                $gua = \App\Log::guardar("Editar el usuario con id = " . $id, Session::get('alias'), 'PARAMETROS USUARIOS');
                $usuarios = \App\User::buscarUsuario($id);
                $usuarios->permi = $usuarios->permisos;
                $respuesta = [
                    'OPC' => 'SI',
                    'usuarios' => $usuarios,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Usuario No Guardado...",
                ];
                return response()->json($respuesta, 500);

            }
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function logout()
    {
        $gua = \App\Log::guardar("Salida del sistema del usuario con el id = " . Auth::user()->id, Session::get('alias'), 'CERRAR SESION');
        Session::flush();
        Auth::logout();
        $respuesta = [
            'OPC' => "SI",
        ];
        return response()->json($respuesta, 200);
        // return redirect('/')->with('success', 'Sesion Finalizada');
    }
    public function iniciar()
    {
        if(Auth::user() != null){
            $entesTotal = \App\Entes::mostrar();

            $respuesta = [
                'OPC' => "SI",
                'nombreUsuario' => Auth::user()->nombre,
                'rolUsuario' => Auth::user()->rol,
                'ente' => Auth::user()->permisos->where('actual', 1)->first()->ente->nombre,
                'entesTotal' => $entesTotal->count() ?? 0,
                'imagen' => Auth::user()->imagen,
                'alias' => Auth::user()->permisos->where('actual', 1)->first()->ente->alias,
                'permisos_usuario' => Auth::user()->permisos->where('actual', 1)->first()
            ];

        }else{
            $entesTotal = 0;

            $respuesta = [
                'OPC' => "SI",
                'nombreUsuario' => null,
                'rolUsuario' => null,
                'ente' => null,
                'entesTotal' => null,
                'imagen' => null,
                'alias' => null,
                'permisos_usuario' => null
            ];
        }
        
        
        return response()->json($respuesta, 200);
        // return redirect('/')->with('success', 'Sesion Finalizada');
    }

    public function cambiarclave()
    {
        $data = request()->all();
        $res = \App\User::cambiarclave($data["claves"]);
        
        if ($res) {
            $gua = \App\Log::guardar("Cambio de contraseña el usuario con el id = " . Auth::user()->id, Session::get('alias'), 'PERFIL');
            $respuesta = [
                'OPC' => "SI",
            ];
        } else {
            $respuesta = [
                'OPC' => "NO",
            ];

        }
        return response()->json($respuesta, 200);
    }

    public function buscar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $opc = "NO";
            $usuario = \App\User::where('identificacion', $data["identificacion"])->first();
            if ($usuario) {
                if ($usuario->count() > 0) {
                    $usuario->permi = $usuario->permisos;
                    $opc = "SI";
                } else {
                    $opc = "NO";
                }
            } else {
                $opc = "NO";
            }
            $respuesta = [
                'OPC' => $opc,
                'usuario' => $usuario,
            ];
            return response()->json($respuesta, 200);
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function usuariosLog()
    {
        if (Auth::check()) {
            $usuarios = \App\User::usuariosLog();
            if ($usuarios) {
                $logs = \App\Log::listar(Session::get('alias'));
                $respuesta = [
                    'usuarios' => $usuarios,
                    'logs' => $logs,
                    // 'paginacion' => [
                    //     'total' => $logs->total(),
                    //     'pagina_actual' => $logs->currentPage(),
                    //     'por_pagina' => $logs->perPage(),
                    //     'ultima_pagina' => $logs->lastPage(),
                    //     'desde' => $logs->firstItem(),
                    //     'hasta' => $logs->lastItem(),
                    // ],
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'MENSAJE' => "Ocurrio un error...",
                ];
                return response()->json("Error", 500);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function usuariosLogBuscar()
    {
        if (Auth::check()) {
            $data = request()->all();
            $id_usuario = $data['id_usuario'];
            $modulos = $data['modulos'];
            $fecha = $data['fecha'];

            $logs = \App\Log::buscar(Session::get('alias'), $data);

            if ($logs) {
                $respuesta = [
                    'logs' => $logs,
                    // 'paginacion' => [
                    //     'total' => $logs->total(),
                    //     'pagina_actual' => $logs->currentPage(),
                    //     'por_pagina' => $logs->perPage(),
                    //     'ultima_pagina' => $logs->lastPage(),
                    //     'desde' => $logs->firstItem(),
                    //     'hasta' => $logs->lastItem(),
                    // ],
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'MENSAJE' => "Ocurrio un error...",
                ];
                return response()->json("Error", 500);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function usuariosSubirImagen()
    {
        $data = request()->all();
        $filename1 = "NADA";
        $hasFile1 = request()->hasFile('imagen') && request()->imagen->isValid();
        if ($hasFile1) {
            $imagen_tmp1 = $data['imagen'];
            if ($imagen_tmp1->isValid()) {
                $filename1 = 'foto_usuario_' . date('Y-m-d-h-i-s-A');
                $imagen_tmp1->move(public_path() . '/assets/media/' . Auth::user()->permisos->where('actual', 1)->first()->ente->alias . '/fotos/', $filename1);
            }
        }
        $respuesta = [
            'ruta' => $filename1,
        ];
        return response()->json($respuesta, 200);
    }

    public function usuariosEditarSubirImagen()
    {
        $data = request()->all();
        $usuario = \App\User::buscarUsuario($data['id']);

        if ($usuario) {
            try {
                unlink(public_path() . '/assets/media/fotos/' . $usuario->imagen);    
            } catch (\Exception $e) {

            }
        }
        $filename1 = "NADA";
        $hasFile1 = request()->hasFile('imagen') && request()->imagen->isValid();
        if ($hasFile1) {
            $imagen_tmp1 = $data['imagen'];
            if ($imagen_tmp1->isValid()) {
                $filename1 = 'foto_usuario_' . date('Y-m-d-h-i-s-A');
                $imagen_tmp1->move(public_path() . '/assets/media/fotos/', $filename1);
            }      
        }
        $respuesta = [
            'ruta' => $filename1,
        ];
        return response()->json($respuesta, 200);
    }

    public function perfil()
    {
        if (Auth::check()) {
            $data = request()->all();
            $usuarios = \App\User::where('id', Auth::user()->id)
                ->first();

            if ($usuarios) {
                $respuesta = [
                    'usuarios' => $usuarios,
                    'alias' => Auth::user()->permisos->where('actual', 1)->first()->ente->alias,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'MENSAJE' => "Ocurrio un error...",
                ];
                return response()->json("Error", 500);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function guardarPerfil()
    {
        if (Auth::check()) {
            $data = request()->all();
            
            $id = $data['id'];
            $usuario = \App\User::buscarUsuario($id);
            request()->validate([
                'identificacion' => 'required|unique:users,identificacion,' . $usuario->id,
                'nombre' => 'required',
                'email' => 'required|email|unique:users,email,' . $usuario->id,
                'celular' => 'required',
                'usuario' => 'required|unique:users,usuario,' . $usuario->id,
            ], [
                'identificacion.required' => 'La identificación es obligatorio',
                'identificacion.unique' => 'La identificación ya se encuentra registrada',
                'nombre.required' => 'El Nombre es obligatorio',
                'email.required' => 'El email es obligatorio',
                'email.unique' => 'El email ya se encuentra registrado',
                'email.email' => 'El email debe ser valido',
                'celular.required' => 'El celular es obligatorio',
                'usuario.required' => 'El usuario es obligatorio',
                'usuario.unique' => 'El usuario ya se encuentra registrado',
            ]);
            
            $resp = \App\User::modificar($data, $id);
            if ($resp) {
                $respuesta = [
                    'OPC' => 'SI',
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Perfil No Modificado...",
                ];
                return response()->json($respuesta, 500);

            }
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
