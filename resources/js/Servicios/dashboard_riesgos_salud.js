import { http } from "./http_services";

export function poblacion($tipo, $id, $rangoEdad) {
    return http().get('/dashboard-riesgos-salud/poblacion?tipo='+$tipo+'&id='+$id+'&rango='+$rangoEdad);
}

export function exportarRiesgoSalud($data) {
    return http().post('/dashboard-riesgos-salud/exportar-rs-dashboard', $data);
}

export function hogares($tipo, $id) {
    return http().get('/dashboard-riesgos-salud/hogares?tipo='+$tipo+'&id='+$id);
}

export function exportarHogares($data) {
    return http().post('/dashboard-riesgos-salud/exportar-hogares-dashboard', $data);
}

export function enfermedades($tipo, $id, $rangoEdad, $tipoEnfermedad) {
    return http().get('/dashboard-riesgos-salud/enfermedades?tipo='+$tipo+'&id='+$id+'&rango='+$rangoEdad+'&tipo_enfer='+$tipoEnfermedad);
}

export function exportarPestanaEnfermedad($data) {
    return http().post('/dashboard-riesgos-salud/exportar-enfermedades', $data);
}

export function spa($tipo, $id) {
    return http().get('/dashboard-riesgos-salud/spa?tipo='+$tipo+'&id='+$id);
}

export function exportarRSSPA($data) {
    return http().post('/dashboard-riesgos-salud/exportar-spa', $data);
}

export function embarazo($tipo, $id) {
    return http().get('/dashboard-riesgos-salud/embarazo?tipo='+$tipo+'&id='+$id);
}

export function exportarEmbarazo($data) {
    return http().post('/dashboard-riesgos-salud/exportar-embarazo', $data);
}

export function inmunizacion($tipo, $id, $rango) {
    return http().get('/dashboard-riesgos-salud/inmunizacion?tipo='+$tipo+'&id='+$id+'&rango='+$rango);
}

export function exportToPDFINM($data) {
    return http().post('/dashboard-riesgos-salud/exportar-inmunizacion', $data);
}

export function exportToPDFINMEXCEL($data) {
    return http().post('/dashboard-riesgos-salud/exportar-inmunizacion-excel', $data);
}