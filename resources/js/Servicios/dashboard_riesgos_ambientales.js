import { http } from "./http_services";

export function listarEstadistica($tipo, $id) {
    return http().get('/riesgos-ambientales/estadisticas?tipo='+$tipo+'&id='+$id);
}

export function listarValoresRiesgo($id) {
    return http().get('/riesgos-ambientales/valores-riesgos?id_hogar='+$id);
}

export function listarEstadisticaPorVivienda($tipo, $id) {
    return http().get('/riesgos-ambientales/estadisticas-viviendas?tipo='+$tipo+'&id='+$id);
}

export function PorcentajesGeneral($tipo, $id) {
    return http().get('/riesgos-ambientales/estadisticas-generales?tipo='+$tipo+'&id='+$id);
}