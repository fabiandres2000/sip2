import {http} from "./http_services";

export function loginUsuario(data) {
    return http().post('/login', data);
}
export function listarUsuarios($data) {
    return http().post('/usuarios', $data);
}
export function guardarUsuarios($data) {
    return http().post('/usuarios/guardar', $data);
}
export function eliminarUsuarios($data) {
    return http().post('/usuarios/eliminar', $data);
}

export function editarUsuarios($data) {
    return http().post('/usuarios/modificar', $data);
}

export function salir($data) {
    return http().post('/logout', $data);
}
export function iniciar($data) {
    return http().post('/usuarios/iniciar', $data);
}
export function cambiarclave($data) {
    return http().post('/usuarios/cambiarclave', $data);
}

export function buscar($data) {
    return http().post('/usuarios/buscar', $data);
}

export function listar($data) {
    return http().post('/usuarios/listar', $data);
}

export function guardar($data) {
    return http().post('/usuarios/guardarSop', $data);
}

export function editar($data) {
    return http().post('/usuarios/modificarSop', $data);
}

export function eliminar($data) {
    return http().post('/usuarios/eliminarSop', $data);
}

export function consIp() {
    return http().get('https://api.ipify.org?format=json');
}

export function usuariosLog($data) {
    return http().post('/usuarios/usuarioslog', $data);
}

export function usuariosLogBuscar($data) {
    return http().post('/usuarios/usuarioslogbuscar', $data);
}

export function usuariosSubirImagen($data) {
    return http().post('/usuarios/usuariosSubirImagen', $data);
}

export function usuariosEditarSubirImagen($data) {
    return http().post('/usuarios/usuariosEditarSubirImagen', $data);
}

export function perfil($data) {
    return http().post('/perfil', $data);
}
export function guardarPerfil($data) {
    return http().post('/usuarios/guardarPerfil', $data);
}