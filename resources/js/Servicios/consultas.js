import { http } from "./http_services";

export function iniciales($data) {
    return http().post('/vivienda/iniciales', $data);
}

export function viviendas($data) {
    return http().post('/vivienda/listar', $data);
}

export function viviendaspdf($data) {
    return http().post('/vivienda/listarpdf', $data);
}

export function jefe($data) {
    return http().post('/jefehogar/listar', $data);
}

export function jefespdf($data) {
    return http().post('/jefehogar/listarpdf', $data);
}