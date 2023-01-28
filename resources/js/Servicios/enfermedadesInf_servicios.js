import { http } from "./http_services";

export function listar($data) {
    return http().post('/enfermedadesInf', $data);
}
export function guardar($data) {
    return http().post('/enfermedadesInf/guardar', $data);
}
export function eliminar($data) {
    return http().post('/enfermedadesInf/eliminar', $data);
}

export function combo($data) {
    return http().get('/enfermedadesInf/combo');
}