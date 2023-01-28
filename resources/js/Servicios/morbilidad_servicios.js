import { http } from "./http_services";

export function listar($data) {
    return http().post('/morbilidad', $data);
}
export function guardar($data) {
    return http().post('/morbilidad/guardar', $data);
}
export function eliminar($data) {
    return http().post('/morbilidad/eliminar', $data);
}