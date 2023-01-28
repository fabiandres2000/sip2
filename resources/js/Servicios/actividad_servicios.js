import { http } from "./http_services";

export function listar($data) {
    return http().post('/actividad', $data);
}
export function guardar($data) {
    return http().post('/actividad/guardar', $data);
}
export function eliminar($data) {
    return http().post('/actividad/eliminar', $data);
}