import { http } from "./http_services";

export function listar($data) {
    return http().post('/enfermedadesCro', $data);
}
export function guardar($data) {
    return http().post('/enfermedadesCro/guardar', $data);
}
export function eliminar($data) {
    return http().post('/enfermedadesCro/eliminar', $data);
}

export function combo() {
    return http().get('/enfermedadesCro/combo');
}