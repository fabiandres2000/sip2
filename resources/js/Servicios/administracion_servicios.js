import { http } from "./http_services";

export function listar($data) {
    return http().post('/estadisticas', $data);
}