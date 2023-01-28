import { http } from "./http_services";

export function guardar(data) {
    return http().post('/entes/guardar', data);
}

export function listar(data) {
    return http().post('/entes/listar', data);
}

export function eliminar(data) {
    return http().post('/entes/eliminar', data);
}

export function mostrar(data) {
    return http().post('/entes/mostrar', data);
}

export function seleccionar(data) {
    return http().post('/entes/seleccionar', data);
}