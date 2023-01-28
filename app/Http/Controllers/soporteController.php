<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;

class soporteController extends Controller
{

    public function listarEntes()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $entes = \App\Entes::listar($busqueda, Session::get('alias'));

            $consdptos = \App\Dpto::buscarDepartamentos(Session::get('alias'));
            foreach ($consdptos as $item) {
                $arrayDpto[] = [
                    'value' => $item->codigo,
                    'texto' => strtoupper($item->descripcion),
                ];
            }

            $arrayMuni = [];
            $consmuni = \App\Muni::buscarMunicipios(Session::get('alias'));
            foreach ($consmuni as $item) {
                $arrayMuni[$item->codigo][] = [
                    'value' => $item->codmun,
                    'texto' => strtoupper($item->descripcion),
                ];
            }
            if ($entes) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $entes->total(),
                        'pagina_actual' => $entes->currentPage(),
                        'por_pagina' => $entes->perPage(),
                        'ultima_pagina' => $entes->lastPage(),
                        'desde' => $entes->firstItem(),
                        'hasta' => $entes->lastItem(),
                    ],
                    'entes' => $entes,
                    'arrayDpto' => $arrayDpto,
                    'arrayMuni' => $arrayMuni,
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

    public function guardarEntes()
    {
        if (Auth::check()) {
            $data = request()->all();
            if ($data["opcion"] == "GUARDAR") {
                request()->validate([
                    'entes.nombre' => 'required|unique:entes,nombre',
                    'entes.alias' => 'required|unique:entes,alias',
                    'entes.sigla' => 'required|unique:entes,sigla',
                    'entes.poblacion' => 'required',
                    'entes.viviendas' => 'required',
                    'entes.lat' => 'required',
                    'entes.lng' => 'required',
                    'entes.id_dpto' => 'required',
                    'entes.id_mun' => 'required',
                ], [
                    'entes.nombre.required' => 'EL nombre es obligatorio',
                    'entes.nombre.unique' => 'El nombre ya se encuentra registrado',
                    'entes.alias.required' => 'El alias es obligatorio',
                    'entes.alias.unique' => 'El alias ya se encuentra registrado',
                    'entes.sigla.required' => 'La sigla es obligatoria',
                    'entes.sigla.unique' => 'La sigla ya se encuentra registrada',
                    'entes.poblacion.required' => 'La población es obligatoria',
                    'entes.viviendas.required' => 'El numero de viviendas es obligatorio',
                    'entes.lat.required' => 'La latitud es obligatoria',
                    'entes.lng.required' => 'La longitud es obligatoria',
                    'entes.id_dpto.required' => 'El departamento es obligatorio',
                    'entes.id_mun.required' => 'El municipio es obligatorio',
                ]);
            } else {
                $ente = \App\Entes::buscarEnte($data["entes"]['id']);
                request()->validate([
                    'entes.nombre' => 'required|unique:entes,nombre,' . $ente->id,
                    'entes.alias' => 'required|unique:entes,alias,' . $ente->id,
                    'entes.sigla' => 'required|unique:entes,sigla,' . $ente->id,
                    'entes.poblacion' => 'required',
                    'entes.viviendas' => 'required',
                    'entes.lat' => 'required',
                    'entes.lng' => 'required',
                    'entes.id_dpto' => 'required',
                    'entes.id_mun' => 'required',
                ], [
                    'entes.nombre.required' => 'EL nombre es obligatorio',
                    'entes.nombre.unique' => 'El nombre ya se encuentra registrado',
                    'entes.alias.required' => 'El alias es obligatorio',
                    'entes.alias.unique' => 'El alias ya se encuentra registrado',
                    'entes.sigla.required' => 'La sigla es obligatoria',
                    'entes.sigla.unique' => 'La sigla ya se encuentra registrada',
                    'entes.poblacion.required' => 'La población es obligatoria',
                    'entes.viviendas.required' => 'El numero de viviendas es obligatorio',
                    'entes.lat.required' => 'La latitud es obligatoria',
                    'entes.lng.required' => 'La longitud es obligatoria',
                    'entes.id_dpto.required' => 'El departamento es obligatorio',
                    'entes.id_mun.required' => 'El municipio es obligatorio',
                ]);
            }

            $entes = \App\Entes::guardar($data["entes"]);

            if ($entes) {
                $gua = \App\Log::guardar("Guardar entes  = " . $entes->id, Session::get('alias'), 'SOPORTE ENTES');
                $respuesta = [
                    'OPC' => 'SI',
                    'entes' => $entes,
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                    'MENSAJE' => "Ente No Guardado...",
                ];
                return response()->json($respuesta, 200);

            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function eliminarEntes()
    {
        if (Auth::check()) {
            $mensaje = "";
            $id = request()->get('id');
            $estado = request()->get('estado');
            if ($estado == "Activo") {
                $estado = "Inactivo";
                $gua = \App\Log::guardar("Eliminar el ente con id = " . $id, Session::get('alias'), 'SOPORTE ENTES');
            } else {
                $gua = \App\Log::guardar("Activar el ente con id = " . $id, Session::get('alias'), 'SOPORTE ENTES');
                $estado = "Activo";
            }
            $respuesta = \App\Entes::editarestado($estado, $id);
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function mostrarEntes()
    {
        if (Auth::check()) {
            $entes = \App\Entes::mostrar();
            if ($entes) {
                $respuesta = [
                    'entes' => $entes,
                    'OPC' => 'SI',
                ];
                return response()->json($respuesta, 200);
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                ];
                return response()->json($respuesta, 200);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function seleccionarEntes()
    {
        if (Auth::check()) {
            $data = request()->all();
            $id_ente = $data["ente"]["id"];
            $eae = \App\UserPermisos::editarActualEnte(Auth::user()->permisos->where('actual', 1)->first()->ente->id, Auth::user()->id);
            if ($eae) {
                
                $cam = \App\UserPermisos::cambiarActualEnte($id_ente);
                $caie = \App\User::cambiarIdEntidad(Auth::user()->id, $id_ente);

                if ($cam) {
                    $alias = Auth::user()->permisos->where('id_ente', $id_ente)->first()->ente;
                    Session::put('alias', $alias->alias);
                    Session::put('sigla', $alias->sigla);

                    $respuesta = [
                        'OPC' => 'SI',
                        'alias' => Session::get('alias'),
                    ];
                    return response()->json($respuesta, 200);
                } else {
                    $respuesta = [
                        'OPC' => 'NO',
                    ];
                    return response()->json($respuesta, 200);
                }
            } else {
                $respuesta = [
                    'OPC' => 'NO',
                ];
                return response()->json($respuesta, 200);
            }
        } else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function listarUsuarios()
    {
        if (Auth::check()) {
            $busqueda = request()->get('txtbusqueda');
            $usuarios = \App\User::listarSop($busqueda);
            foreach ($usuarios as $usu) {
                $usu->permi = $usu->permisos->where('id_ente', $usu->ide)->first();

            }
            $entes = \App\Entes::todos();
            if ($usuarios) {
                $respuesta = [
                    'paginacion' => [
                        'total' => $usuarios->total(),
                        'pagina_actual' => $usuarios->currentPage(),
                        'por_pagina' => $usuarios->perPage(),
                        'ultima_pagina' => $usuarios->lastPage(),
                        'desde' => $usuarios->firstItem(),
                        'hasta' => $usuarios->lastItem(),
                    ],
                    'usuarios' => $usuarios,
                    'entes' => $entes,
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

    public function guardarUsuarios()
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
                $usuarios = \App\User::guardarSop($data);
            } else {

                $existe = \App\UserPermisos::existe($data['id'], $data['permisos']['id_ente']);
                if ($existe) {
                    $respuesta = [
                        'OPC' => 'EXISTE',
                        'MENSAJE' => "El usuario que intenta crear ya está asignado a esta entidad...",
                    ];
                    return response()->json($respuesta, 200);
                }

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
                $usuarios = \App\User::modificarSop($data, $data["id"]);
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
                $data["permisos"]["id"] = 0;
                $usuarios_permisos = \App\UserPermisos::guardarSop($data["permisos"]);
                if ($data["id"] != 0) {
                    $usuarios = \App\User::buscarUsuario($data["id"]);
                }
                $usuarios->permi = $usuarios->permisos;
                $gua = \App\Log::guardar("Guardar el usuario con id = " . $data["id"], Session::get('alias'), 'SOPORTE USUARIOS');
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

    public function modificarUsuarios()
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

            if ($data['permisos']['id_ente'] != $data['permisos']['id_actual']) {

                $existe = \App\UserPermisos::existe($data['id'], $data['permisos']['id_ente']);
                if ($existe) {
                    $respuesta = [
                        'OPC' => 'EXISTE',
                        'MENSAJE' => "El usuario que intenta modificar ya está asignado a esta entidad...",
                    ];
                    return response()->json($respuesta, 200);
                }
            }

            $resp = \App\User::modificarSop($data, $id);

            if ($resp) {
                $usuarios_permisos = \App\UserPermisos::modificarSop($data["permisos"], $data['permisos']['id']);
                $gua = \App\Log::guardar("Editar el usuario con id = " . $id, Session::get('alias'), 'SOPORTE USUARIOS');
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
                return response()->json($respuesta, 200);

            }
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }

    public function eliminarUsuarios()
    {
        if (Auth::check()) {
            $mensaje = "";
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
                    $gua = \App\Log::guardar("Eliminar el permiso del usuario con id de permiso = " . $id, Session::get('alias'), 'SOPORTE USUARIOS');
                } else {
                    $gua = \App\Log::guardar("Activar el permiso del usuario con id de permiso = " . $id, Session::get('alias'), 'SOPORTE USUARIOS');
                }
            }
            return;
        } else {
            return redirect("/")->with("error", "Su sesion ha terminado");
        }
    }
}
