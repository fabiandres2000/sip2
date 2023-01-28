import { http } from "./http_services";

export function listar($data) {
    return http().post('/colegios', $data);
}
export function guardar($data) {
    return http().post('/colegios/guardar', $data);
}
export function eliminar($data) {
    return http().post('/colegios/eliminar', $data);
}
export function combo($data) {
    return http().post('/colegios/combo', $data);
}
