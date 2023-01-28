import { http } from "./http_services";

export function listarEscolaridad($data) {
    return http().post('/escolaridad', $data);
}
export function guardarEscolaridad($data) {
    return http().post('/escolaridad/guardar', $data);
}
export function eliminarEscolaridad($data) {
    return http().post('/escolaridad/eliminar', $data);
}