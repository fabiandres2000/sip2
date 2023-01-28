import { http } from "./http_services";

export function listarEstados($data) {
    return http().post('/estadocivil', $data);
}
export function guardarEstados($data) {
    return http().post('/estadocivil/guardar', $data);
}
export function eliminarEstados($data) {
    return http().post('/estadocivil/eliminar', $data);
}