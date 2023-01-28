import { http } from "./http_services";

export function listar($data) {
    return http().post('/morbilidad_nacer', $data);
}
export function guardar($data) {
    return http().post('/morbilidad_nacer/guardar', $data);
}
export function eliminar($data) {
    return http().post('/morbilidad_nacer/eliminar', $data);
}