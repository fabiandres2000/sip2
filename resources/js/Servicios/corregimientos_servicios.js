import { http } from "./http_services";

export function listarCorregimientos($data) {
    return http().post('/corregimientos', $data);
}
export function guardarCorregimientos($data) {
    return http().post('/corregimientos/guardar', $data);
}
export function eliminarCorregimientos($data) {
    return http().post('/corregimientos/eliminar', $data);
}
export function comboCorregimientos($data) {
    return http().post('/corregimientos/combo', $data);
}