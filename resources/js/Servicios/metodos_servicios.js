import { http } from "./http_services";

export function listar($data) {
    return http().post('/metodos', $data);
}
export function guardar($data) {
    return http().post('/metodos/guardar', $data);
}
export function eliminar($data) {
    return http().post('/metodos/eliminar', $data);
}