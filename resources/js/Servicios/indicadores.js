import { http } from "./http_services";

export function listar($data) {
    return http().post('/indicadores/calcular', $data);
}

export function gestantes($data) {
    return http().post('/indicadores/gestantes', $data);
}

export function spa($data) {
    return http().post('/indicadores/spa', $data);
}

export function filtrospa($data) {
    return http().post('/indicadores/filtrospa', $data);
}