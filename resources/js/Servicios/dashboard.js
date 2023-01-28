import { http } from "./http_services";

export function listar($data) {
    return http().post('/datosdashboard', $data);
}

export function coordenadas($data) {
    return http().post('/coordenadas', $data);
}

export function consultarPuntosPoblacion() {
    return http().get('/consultarPuntosPoblacion');
}