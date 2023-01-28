import {http} from "./http_services";

export function gestantes($data) {
    return http().post('/reportes/gestantes', $data);
}

export function exportarGestantes($data) {
    return http().post('/reportes/exportarGestantes', $data);
}

export function nutricional($data) {
    return http().post('/reportes/nutricional', $data);
}

export function exportarNutricional($data) {
    return http().post('/reportes/exportarNutricional', $data);
}

export function inicialesCronicas($data) {
    return http().post('/reportes/cronicas', $data);
}

export function cronicasPDF($data) {
    return http().post('/reportes/cronicaspdf', $data);
}

export function inicialesMigrantes($data) {
    return http().post('/reportes/migrantes', $data);
}

export function migrantesPDF($data) {
    return http().post('/reportes/migrantespdf', $data);
}

export function personas_discapacitadas($tipo, $id) {
    return http().get('/reportes/personas-discapacitadas?tipo='+$tipo+'&id='+$id);
}

export function adulto_mayor($tipo, $id) {
    return http().get('/reportes/adulto-mayor?tipo='+$tipo+'&id='+$id);
}

export function exportaAdultoMayorExcel($data) {
    return http().post('/reportes/exportar-adulto-mayor', $data);
}

export function exportaDiscapacitadosExcel($data) {
    return http().post('/reportes/exportar-discapacitados', $data);
}

export function inicialesInfecciosas($data) {
    return http().post('/reportes/infecciosas', $data);
}

export function exportarEnfermedades($data) {
    return http().post('/reportes/exportar-enfermedades', $data);
}

export function descolarizados($data) {
    return http().post('/reportes/descolarizados', $data);
}

export function exportarDescolarizados($data) {
    return http().post('/reportes/exportar-descolarizados', $data);
}

export function bajo_nivel_socioeconomico($data) {
    return http().post('/reportes/bajo-nivel-socioeconomico', $data);
}

export function exportarSocioeconomico($data) {
    return http().post('/reportes/exportar-socioeconomico', $data);
}

export function riesgo_salud($data) {
    return http().post('/reportes/riesgos-salud', $data);
}

export function exportarRiesgosSalud($data) {
    return http().post('/reportes/exportar-riesgos-salud', $data);
}