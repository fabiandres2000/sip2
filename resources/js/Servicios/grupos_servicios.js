import { http } from "./http_services";

export function listar($data) {
    return http().post('/grupos', $data);
}
export function guardar($data) {
    return http().post('/grupos/guardar', $data);
}
export function eliminar($data) {
    return http().post('/grupos/eliminar', $data);
}