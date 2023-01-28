import { http } from "./http_services";

export function listarEtnias($data) {
    return http().post('/etnias', $data);
}
export function guardarEtnias($data) {
    return http().post('/etnias/guardar', $data);
}
export function eliminarEtnias($data) {
    return http().post('/etnias/eliminar', $data);
}
export function guardarClasificacion($data) {
    return http().post('/etnias/guardarClasificacion', $data);
}
export function listarClasificacion($data) {
    return http().post('/etnias/listarClasificacion', $data);
}