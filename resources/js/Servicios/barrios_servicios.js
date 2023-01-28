import {http} from "./http_services";

export function listarBarrios($data) {
    return http().post('/barrios', $data);
}
export function guardarBarrios($data) {
    return http().post('/barrios/guardar', $data);
}
export function eliminarBarrios($data) {
    return http().post('/barrios/eliminar', $data);
}
export function comboBarrios($data) {
    return http().post('/barrios/combo', $data);
}

export function exportar($data) {
    return http().post('/barrios/exportar', $data);
}
