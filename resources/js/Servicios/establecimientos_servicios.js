import { http } from "./http_services";

export function listar($data) {
  return http().post('/establecimientos-listar', $data);
}
export function nuevo($data) {
  return http().post('/establecimientos/nuevo', $data);
}
export function guardar($data) {
  return http().post('/establecimientos/guardar', $data);
}
export function eliminar($data) {
  return http().post('/establecimientos/eliminar', $data);
}
export function combo($data) {
  return http().post('/establecimientos/combo', $data);
}
export function editar($data) {
  return http().post('/establecimientos/editar', $data);
}

export function exportarEstablecimientosPDF($data) {
  return http().post('/establecimientos/exportarEstablecimientosPDF', $data);
}

export function exportarEstablecimientoPDF($data) {
  return http().post('/establecimientos/exportarEstablecimientoPDF', $data);
}