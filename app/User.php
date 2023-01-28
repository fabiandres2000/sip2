<?php

namespace App;

use Auth;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use DB;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'email', 'password', 'rol', 'usuario', 'estado', 'identificacion', 'celular', 'direccion', 'id_entidad', 'imagen',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function login($usua, $pass)
    {
        $usuario = User::join("usuarios_permisos", "usuarios_permisos.id_usuario", "users.id")
            ->join("entes", "usuarios_permisos.id_ente", "entes.id")
            ->where(function ($query) use ($usua) {
                $query->where('email', $usua)
                    ->orWhere('usuario', $usua);
            })
            ->where("entes.estado", "Activo")
            ->where('users.estado', 'Activo')
            ->where('usuarios_permisos.estado', 'Activo')
            ->where("usuarios_permisos.actual", 1)
            ->select('users.*')
            ->first();
        if ($usuario && \Hash::check($pass, $usuario->password)) {
            auth()->loginUsingId($usuario->id);
            return $usuario;
        }
        return false;
    }
    public static function listar($busqueda)
    {
        if (!empty($busqueda)) {
            $respuesta = User::join('usuarios_permisos', 'usuarios_permisos.id_usuario', 'users.id')
                ->where(function ($query) use ($busqueda) {
                    $query->where('users.nombre', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('email', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('usuarios_permisos.rol', 'LIKE', '%' . $busqueda . '%');
                })
                ->where('usuarios_permisos.id_ente', Auth::user()->permisos->where('actual', 1)->first()->ente->id)
                ->where('users.rol', '!=', 'SuperAdministrador')
                ->select("users.*")
                ->orderBy('users.id', 'DESC')
                ->get();
        } else {
            $respuesta = User::join('usuarios_permisos', 'usuarios_permisos.id_usuario', 'users.id')
                ->where('usuarios_permisos.id_ente', Auth::user()->permisos->where('actual', 1)->first()->ente->id)
                ->orderBy('users.id', 'DESC')
                ->where('users.rol', '!=', 'SuperAdministrador')
                ->select("users.*")
                ->get();
        }
        return $respuesta;
    }
    public static function guardar($data)
    {
        return User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'estado' => 'Activo',
            'identificacion' => $data['identificacion'],
            'rol' => $data['rol'],
            'celular' => $data['celular'],
            'usuario' => $data['usuario'],
            'direccion' => $data['direccion'],
            'id_entidad' => Auth::user()->permisos->where('actual', 1)->first()->ente->id,
            'imagen' => $data['ruta'],
        ]);
    }
    public static function editarestado($estado, $id)
    {
        return User::where('id', $id)->update([
            'estado' => $estado,
        ]);
    }
    public static function modificar($data, $id)
    {
        $respuesta = User::where(['id' => $id])->update([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'identificacion' => $data['identificacion'],
            'rol' => $data['rol'],
            'celular' => $data['celular'],
            'usuario' => $data['usuario'],
            'direccion' => $data['direccion'],
            'imagen' => $data['ruta'],
        ]);
        return $respuesta;
    }
    public static function buscarUsuario($id)
    {
        return User::findOrFail($id);
    }

    public static function consultarEnte($id_user)
    {
        return User::join('entes', 'users.id_entidad', 'entes.id')
            ->where('users.id', $id_user)
            ->select('entes.alias', 'entes.id', 'entes.sigla', 'entes.poblacion', 'entes.viviendas', 'lat', 'lng')
            ->first();
    }

    public static function consultarCoordenadas($alias)
    {
        return DB::connection('mysql')->table('entes')
        ->where('entes.alias', $alias)
        ->select('entes.lat', 'entes.lng')
        ->first();
    }

    public static function cambiarclave($data)
    {
        $password = $data['actual'];
        $check_password = User::where(['id' => Auth::user()->id])->first();
        
        if (\Hash::check($password, $check_password->password)) {
            $new_pasword = bcrypt($data['nueva']);
            $id = Auth::user()->id;
            User::where('id', $id)->update(['password' => $new_pasword]);
            return true;
        } else {
            return false;
        }
    }

    public static function listarSop($busqueda)
    {
        if (!empty($busqueda)) {
            $respuesta = User::join('usuarios_permisos', 'usuarios_permisos.id_usuario', 'users.id')
                ->join("entes", "usuarios_permisos.id_ente", "entes.id")
                ->where(function ($query) use ($busqueda) {
                    $query->where('users.nombre', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('email', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('usuarios_permisos.rol', 'LIKE', '%' . $busqueda . '%')
                        ->orWhere('entes.nombre', 'LIKE', '%' . $busqueda . '%');
                })
                ->where('users.rol', '!=', 'SuperAdministrador')
                ->orderBy('users.id', 'DESC')
                ->select("users.*", 'entes.nombre as entidad', 'entes.id as ide')
                ->paginate(10);
        } else {
            $respuesta = User::join('usuarios_permisos', 'usuarios_permisos.id_usuario', 'users.id')
                ->join("entes", "usuarios_permisos.id_ente", "entes.id")
                ->orderBy('users.id', 'DESC')
                ->where('users.rol', '!=', 'SuperAdministrador')
                ->select("users.*", 'entes.nombre as entidad', 'entes.id as ide')
                ->paginate(10);
        }
        return $respuesta;
    }

    public function permisos()
    {
        return $this->hasMany(\App\UserPermisos::class, "id_usuario");
    }

    public static function guardarSop($data)
    {
        return User::create([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'estado' => 'Activo',
            'identificacion' => $data['identificacion'],
            'rol' => $data['rol'],
            'celular' => $data['celular'],
            'usuario' => $data['usuario'],
            'direccion' => $data['direccion'],
            'id_entidad' => $data["permisos"]['id_ente'],
        ]);
    }

    public static function modificarSop($data, $id)
    {
        $respuesta = User::where(['id' => $id])->update([
            'nombre' => $data['nombre'],
            'email' => $data['email'],
            'identificacion' => $data['identificacion'],
            'celular' => $data['celular'],
            'rol' => $data['rol'],
            'usuario' => $data['usuario'],
            'direccion' => $data['direccion'],
            'id_entidad' => $data["permisos"]['id_ente'],
        ]);
        return $respuesta;
    }

    public static function usuariosLog()
    {
        $respuesta = User::join('usuarios_permisos', 'usuarios_permisos.id_usuario', 'users.id')
            ->where('usuarios_permisos.id_ente', Auth::user()->permisos->where('actual', 1)->first()->ente->id)
            ->orderBy('users.id', 'DESC')
            ->select("users.*")
            ->get();
        return $respuesta;
    }

    public static function cambiarIdEntidad($id_usuario, $id_ente){
        return User::where('id', $id_usuario)
            ->update([
                'id_entidad' => $id_ente,
            ]);
    }
}
