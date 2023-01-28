import { http } from "./http_services";

export function listar($data) {
    return http().post('/religion', $data);
}
export function guardar($data) {
    return http().post('/religion/guardar', $data);
}
export function eliminar($data) {
    return http().post('/religion/eliminar', $data);
}