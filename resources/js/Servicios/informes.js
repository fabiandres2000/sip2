import { http } from "./http_services";

export function inicialesMigrantes($data) {
    return http().post('/informes/migrantes', $data);
}

export function poblacion_no_asegurada() {
    return http().get('/informes/poblacion-no-asegurada');
}

export function determinante_salud() {
    return http().get('/informes/determinante-salud');
}

export function condiciones_salud() {
    return http().get('/informes/condiciones-salud');
}

export function exportarGeneralSalud($data) {
    return http().post('/informes/exportar-general-salud', $data);
}

export function riesgos_salud() {
    return http().get('/informes/riesgos-salud');
}

