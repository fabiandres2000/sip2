<template>
    <div class="row">
        <div class="col-12">
            <div
                class="kt-portlet kt-portlet--height-fluid kt-portlet--mobile"
                style="margin-top: -4%"
            >
                <div class="kt-portlet__head">
                    <div class="kt-portlet__head-label">
                        <h3 class="kt-portlet__head-title">
                            <span class="kt-widget20__number kt-font-danger"
                                >REPORTE RIESGOS DE SALUD</span
                            >
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <br />
                                <button
                                    type="button"
                                    class="btn btn-brand"
                                    data-skin="dark"
                                    data-toggle="kt-tooltip"
                                    data-placement="top"
                                    title="Filtrar"
                                    @click="filtrar"
                                >
                                    <i class="fa fa-search"></i>Filtrar
                                </button>
                                <button
                                    type="button"
                                    class="btn btn-success"
                                    data-skin="dark"
                                    data-toggle="kt-tooltip"
                                    data-placement="top"
                                    title="Exportar EXCEL"
                                    @click="generarExcel"
                                >
                                    <i class="fa fa-table"></i>Exportar a Excel
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="kt-portlet__body">
                    <div class="kt-section">
                        <div class="kt-section__content">
                            <div class="row">
                                <div class="col-md-5 col-lg-5">
                                    <div class="form-group">
                                        <label>Riesgo de Salud:</label>
                                        <b-form-select v-model="datos.riesgosSalud">
                                            <option v-for="(item, index) in riesgos_salud" :key="index" :value="item.value">{{ item.nombre }}</option>
                                        </b-form-select>
                                    </div>
                                </div>
                                <div class="col-md-3 col-lg-3">
                                    <div class="form-group">
                                        <label>Nivel de Riesgo:</label>
                                        <b-form-select
                                            v-model="datos.nivel"
                                        >
                                            <option value="Todos">Todos</option>
                                            <option value="Inexistente"
                                                >Inexistente</option
                                            >
                                            <option value="Bajo"
                                                >Bajo</option
                                            >
                                            <option value="Moderado"
                                                >Moderado</option
                                            >
                                            <option value="Alto"
                                                >Alto</option
                                            >
                                        </b-form-select>
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table
                                            id="rs_table"
                                            class="table table-sm table-hover"
                                        >
                                            <thead style="color: white; font-weight: bold">
                                                <tr class="kt-bg-fill-brand">
                                                    <th>No.</th>
                                                    <th>Identificación</th>
                                                    <th>Nombres completos</th>
                                                    <th style="width: 150px">Edad</th>
                                                    <th>Genero</th>
                                                    <th style="width: 150px">Nivel de Riesgo</th>
                                                    <th>Localización</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr
                                                    v-for="(item,
                                                    index) in integrantes"
                                                    :key="index"
                                                >
                                                    <td style="font-weight: normal; vertical-align: middle">
                                                        {{ index + 1 }}
                                                    </td>
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.identificacion }}
                                                    </td>
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.nombres }}
                                                    </td>
                                                   
                                                    <td style="width: 150px; font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.edad }} Años
                                                    </td>
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.genero }}
                                                    </td>
                                                    <td style="width: 150px; font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.puntaje_riesgo }} - {{ item.eficacia }}
                                                    </td>
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.localizacion }}
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>      
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>

import * as reportes from "../../Servicios/reportes";
import store from "../../store";
import $ from "jquery";
import DataTable from "datatables.net"

export default {
    mounted() {
        this.iniciales();
    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            ruta: "",
            datos: {
                riesgosSalud: "alteraciones_transtornos_audicion",
                nivel: "Todos"
            },
            integrantes: [],
            riesgos_salud:  [
                { value: "alteraciones_transtornos_audicion", nombre: "Alteraciones Y Transtornos De La Audición Y Comunicación " },
                { value: "alteraciones_transtornos_visuales", nombre: "Alteraciones Y Transtornos Visuales" },
                { value: "cancer", nombre: "Cancer" },
                { value: "consumo_spa", nombre: "Consumo De SPA" },
                { value: "enfermedad_cardiovascular", nombre: "Enfermedad Cardiovascular Aterogénica" },
                { value: "enfermedades_infecciosas", nombre: "Enfermedades Infeccisosas" },
                { value: "enfermedades_respiratorias", nombre: "Enfermedades Respiratorias Crónicas " },
                { value: "enfermedades_zoonoticas", nombre: "Enfermedades Zoonoticas " },
                { value: "problemas_salud_mental", nombre: "Problemas En Salud Mental " },
                { value: "riesgo_delgadez", nombre: "Riesgo De Delgadez" },
                { value: "riesgo_muerte", nombre: "Riesgo De Muerte Por Desnutrición " },
                { value: "riesgo_sobrepeso", nombre: "Riesgo Sobrepeso " },
                { value: "riesgo_talla_baja", nombre: "Riesgo De Talla Baja " },
                { value: "riesgos_desnutricion_aguda", nombre: "Riesgo Desnutrición Aguda" },
                { value: "riesgos_desnutricion_global", nombre: "Riesgo Desnutrición Global " },
                { value: "salud_bucal", nombre: "Salud Bucal " },
                { value: "transtornos_asociados_spa", nombre: "Trastornos Asociados Al Uso De SPA" },
                { value: "transtornos_degenartivos", nombre: "Trastornos Degenerativos, Neuropatías Y Enfermedades Autoinmunes" },
                { value: "violencias", nombre: "Violencias" },
            ],
        };
    },
    methods: { 
        filtrar() {
            this.iniciales();
        },
        async iniciales(){

            const parametros = {
                _token: this.csrf,
                datos: this.datos,
            };

            await reportes.riesgo_salud(parametros).then(respuesta => {
                this.integrantes = respuesta.data.integrantes;
                this.crearDataTable()
            });
        },
        crearDataTable() {
            $("#rs_table").dataTable().fnDestroy();
            setTimeout(() => {
                $('#rs_table').DataTable({
                    "lengthChange": true,
                    "ordering": false,
                    "bFilter": false,
                    pageLength : 10,
                    language: {
                        "decimal": "",
                        "emptyTable": "No hay información",
                        "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
                        "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
                        "infoFiltered": "(Filtrado de _MAX_ total Registros)",
                        "infoPostFix": "",
                        "thousands": ",",
                        "lengthMenu": "Mostrar _MENU_ Registros",
                        "loadingRecords": "Cargando...",
                        "processing": "Procesando...",
                        "search": "Buscar:",
                        "zeroRecords": "Sin resultados encontrados",
                        "paginate": {
                            "first": "Primero",
                            "last": "Ultimo",
                            "next": "Siguiente",
                            "previous": "Anterior"
                        }
                    }
                });
            }, 100);
        },
        async generarExcel(){
            let riesgo = "";
            this.riesgos_salud.forEach(element => {
                if(this.datos.riesgosSalud == element.value){
                    riesgo = element.nombre;
                }
            });

            const parametros = {
                datos: this.integrantes,
                nombre_ar: "Reporte_Riesgo_Salud_"+riesgo,
                riesgo: riesgo,
                nivel: this.datos.nivel
            };

            await reportes.exportarRiesgosSalud(parametros).then(respuesta => {
                let href = store.state.apiURL + respuesta.data.nombre;
                this.downloadItem(href, "Reporte_Riesgo_Salud_"+riesgo);
            });    
        },
        downloadItem (url, nombre) {      
            const link = document.createElement('a')
            link.href = url
            link.download = nombre+".xlsx"
            link.click()
            URL.revokeObjectURL(link.href);
        },    
    },
};
</script>
<style>
    .table_data {
        width: 100%;
        font-size: 17px;
        border-collapse: collapse;
    }

    .table_data thead {
        padding: 0.3em;
        color: #fff !important;
        background: #5578eb;
    }

    .table_data thead tr th, .table_data tbody tr td {
        text-align: left;
        vertical-align: top;
        padding: 0.3em;
        caption-side: bottom;
    }

    .dataTable th {
        color: #ffffff !important;
    }

    .dataTables_paginate span .paginate_button{ 
        color: #5578eb !important;
        margin-left: 3px;
        margin-right: 3px;
        font-weight: bold;
        background-color: #ffff;
        padding: 4px 8px 4px 8px;
        border-radius: 4px;  
        cursor: pointer;  
    }

    .dataTables_paginate span .current{     
        color: #ffff !important;
        margin-left: 3px;
        margin-right: 3px;
        font-weight: bold;
        background-color: #5578eb;
        padding: 4px 8px 4px 8px;
        border-radius: 4px;
        cursor: pointer;
    }
    

    .next{
        cursor: pointer;
        background-color: #fd397a;
        color: white;
        padding: 5px;
        border-radius: 4px;
    }

    .previous{
        cursor: pointer;
        background-color: #fd397a;
        color: white;
        padding: 5px;
        border-radius: 4px;
    }

    .dataTables_paginate{
        margin-top: 20px;
        height: 40px;
    }

    .next:hover, .previous:hover{
        font-weight: bold;
        color: white;
    }
</style>
