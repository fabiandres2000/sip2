import { http } from "./http_services";

export function listarParentescos($data) {
    return http().post('/parentescos', $data);
}
export function guardarParentescos($data) {
    return http().post('/parentescos/guardar', $data);
}
export function eliminarParentescos($data) {
    return http().post('/parentescos/eliminar', $data);
}