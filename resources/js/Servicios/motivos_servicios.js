import { http } from "./http_services";

export function listar($data) {
    return http().post('/motivos', $data);
}
export function guardar($data) {
    return http().post('/motivos/guardar', $data);
}
export function eliminar($data) {
    return http().post('/motivos/eliminar', $data);
}