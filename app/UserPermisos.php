<?php

namespace App;

use Auth;
use Illuminate\Database\Eloquent\Model;

class UserPermisos extends Model
{
    protected $table = 'usuarios_permisos';
    protected $fillable = [
        'id_usuario', 'id_ente', 'actual', 'rol',
        'usuarios', 'barrios', 'corregimientos', 'etnias', 'ocupaciones',
        'parentescos', 'estado_civil', 'escolaridad', 'veredas', 'morbilidad_ges',
        'morbilidad_nac', 'metodos', 'motivos', 'grupos', 'enfermedades_cro',
        'enfermedades_inf', 'religion', 'colegios', 'actividades_economicas', 'gestion',
        'consulta_integrante', 'consulta_vivienda', 'indicadores_gestantes', 'indicadores_spa', 'dashboard', 'estado',
    ];

    public static function guardar($data)
    {
        return UserPermisos::updateOrCreate([
            'id' => $data['id'],
        ], [
            'id_usuario' => $data['id_usuario'],
            'id_ente' => Auth::user()->permisos->where('actual', 1)->first()->id_ente,
            'actual' => $data['actual'],
            'rol' => $data['rol'],
            'usuarios' => $data['usuarios'],
            'barrios' => $data['barrios'],
            'corregimientos' => $data['corregimientos'],
            'etnias' => $data['etnias'],
            'ocupaciones' => $data['ocupaciones'],
            'parentescos' => $data['parentescos'],
            'estado_civil' => $data['estado_civil'],

            'escolaridad' => $data['escolaridad'],
            'veredas' => $data['veredas'],
            'morbilidad_ges' => $data['morbilidad_ges'],
            'morbilidad_nac' => $data['morbilidad_nac'],
            'metodos' => $data['metodos'],
            'motivos' => $data['motivos'],
            'grupos' => $data['grupos'],
            'enfermedades_cro' => $data['enfermedades_cro'],

            'enfermedades_inf' => $data['enfermedades_inf'],
            'religion' => $data['religion'],
            'colegios' => $data['colegios'],
            'actividades_economicas' => $data['actividades_economicas'],
            'gestion' => $data['gestion'],

            'consulta_integrante' => $data['consulta_integrante'],
            'consulta_vivienda' => $data['consulta_vivienda'],
            'indicadores_gestantes' => $data['indicadores_gestantes'],
            'indicadores_spa' => $data['indicadores_spa'],
            'dashboard' => $data['dashboard'],
        ]);
    }

    public static function modificar($data, $id)
    {
        $respuesta = UserPermisos::where(['id' => $data['id']])->update([
            'rol' => $data['rol'],
            'usuarios' => $data['usuarios'],
            'barrios' => $data['barrios'],
            'corregimientos' => $data['corregimientos'],
            'etnias' => $data['etnias'],
            'ocupaciones' => $data['ocupaciones'],
            'parentescos' => $data['parentescos'],
            'estado_civil' => $data['estado_civil'],

            'escolaridad' => $data['escolaridad'],
            'veredas' => $data['veredas'],
            'morbilidad_ges' => $data['morbilidad_ges'],
            'morbilidad_nac' => $data['morbilidad_nac'],
            'metodos' => $data['metodos'],
            'motivos' => $data['motivos'],
            'grupos' => $data['grupos'],
            'enfermedades_cro' => $data['enfermedades_cro'],

            'enfermedades_inf' => $data['enfermedades_inf'],
            'religion' => $data['religion'],
            'colegios' => $data['colegios'],
            'actividades_economicas' => $data['actividades_economicas'],
            'gestion' => $data['gestion'],

            'consulta_integrante' => $data['consulta_integrante'],
            'consulta_vivienda' => $data['consulta_vivienda'],
            'indicadores_gestantes' => $data['indicadores_gestantes'],
            'indicadores_spa' => $data['indicadores_spa'],
            'dashboard' => $data['dashboard'],
        ]);
        return $respuesta;
    }

    public static function guardarSop($data)
    {
        return UserPermisos::updateOrCreate([
            'id' => $data['id'],
        ], [
            'id_usuario' => $data['id_usuario'],
            'id_ente' => $data['id_ente'],
            'actual' => $data['actual'],
            'rol' => $data['rol'],
            'usuarios' => $data['usuarios'],
            'barrios' => $data['barrios'],
            'corregimientos' => $data['corregimientos'],
            'etnias' => $data['etnias'],
            'ocupaciones' => $data['ocupaciones'],
            'parentescos' => $data['parentescos'],
            'estado_civil' => $data['estado_civil'],

            'escolaridad' => $data['escolaridad'],
            'veredas' => $data['veredas'],
            'morbilidad_ges' => $data['morbilidad_ges'],
            'morbilidad_nac' => $data['morbilidad_nac'],
            'metodos' => $data['metodos'],
            'motivos' => $data['motivos'],
            'grupos' => $data['grupos'],
            'enfermedades_cro' => $data['enfermedades_cro'],

            'enfermedades_inf' => $data['enfermedades_inf'],
            'religion' => $data['religion'],
            'colegios' => $data['colegios'],
            'actividades_economicas' => $data['actividades_economicas'],
            'gestion' => $data['gestion'],

            'consulta_integrante' => $data['consulta_integrante'],
            'consulta_vivienda' => $data['consulta_vivienda'],
            'indicadores_gestantes' => $data['indicadores_gestantes'],
            'indicadores_spa' => $data['indicadores_spa'],
            'dashboard' => $data['dashboard'],
        ]);
    }

    public static function modificarSop($data, $id)
    {
        $respuesta = UserPermisos::where(['id' => $data['id']])->update([
            'id_ente' => $data['id_ente'],
            'rol' => $data['rol'],
            'usuarios' => $data['usuarios'],
            'barrios' => $data['barrios'],
            'corregimientos' => $data['corregimientos'],
            'etnias' => $data['etnias'],
            'ocupaciones' => $data['ocupaciones'],
            'parentescos' => $data['parentescos'],
            'estado_civil' => $data['estado_civil'],

            'escolaridad' => $data['escolaridad'],
            'veredas' => $data['veredas'],
            'morbilidad_ges' => $data['morbilidad_ges'],
            'morbilidad_nac' => $data['morbilidad_nac'],
            'metodos' => $data['metodos'],
            'motivos' => $data['motivos'],
            'grupos' => $data['grupos'],
            'enfermedades_cro' => $data['enfermedades_cro'],

            'enfermedades_inf' => $data['enfermedades_inf'],
            'religion' => $data['religion'],
            'colegios' => $data['colegios'],
            'actividades_economicas' => $data['actividades_economicas'],
            'gestion' => $data['gestion'],

            'consulta_integrante' => $data['consulta_integrante'],
            'consulta_vivienda' => $data['consulta_vivienda'],
            'indicadores_gestantes' => $data['indicadores_gestantes'],
            'indicadores_spa' => $data['indicadores_spa'],
            'dashboard' => $data['dashboard'],
        ]);
        return $respuesta;
    }

    public static function existe($id_usu, $id_ente)
    {
        return UserPermisos::where('id_usuario', $id_usu)
            ->where('id_ente', $id_ente)
            ->exists();
    }

    public static function editarestado($estado, $id)
    {
        return UserPermisos::where('id', $id)->update([
            'estado' => $estado,
        ]);
    }

    public static function editarActual($id, $valor)
    {
        return UserPermisos::where('id', $id)->update([
            'actual' => $valor,
        ]);
    }

    public static function cambiarActual($id_usuario)
    {
        return UserPermisos::where('id_usuario', $id_usuario)
            ->where('estado', '!=', 'Inactivo')
            ->take(1)
            ->update([
                'actual' => 1,
            ]);
    }

    public static function editarActualEnte($id_ente, $id_usuario)
    {
        return UserPermisos::where('id_ente', $id_ente)
            ->where('id_usuario', $id_usuario)
            ->update([
                'actual' => 0,
            ]);
    }

    public static function cambiarActualEnte($id_ente)
    {
        $permi = UserPermisos::where('id_ente', $id_ente)
            ->where('id_usuario', Auth::user()->id)
            ->where('estado', '!=', 'Inactivo')
            ->update([
                'actual' => 1,
            ]);
        return $permi;
    }

    public function usuario()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function ente()
    {
        return $this->hasOne(\App\Entes::class, 'id', 'id_ente');
    }
}
