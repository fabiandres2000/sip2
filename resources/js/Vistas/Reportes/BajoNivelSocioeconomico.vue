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
                                >POBLACIÓN EN BAJO NIVEL SOCIOECONOMICO</span
                            >
                        </h3>
                    </div>
                    <div class="kt-portlet__head-toolbar">
                        <div class="kt-section">
                            <div class="kt-section__content">
                                <br />
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
                                <div class="col-md-12">
                                    <div class="table-responsive">
                                        <table
                                            id="bajo_nivel_table"
                                            class="table table-sm table-hover"
                                        >
                                            <thead style="color: white; font-weight: bold">
                                                <tr class="kt-bg-fill-brand">
                                                    <th>No.</th>
                                                    <th>Identificacion</th>
                                                    <th>Nombres completos</th>
                                                    <th>Localización</th>
                                                    <th>Edad</th>
                                                    <th>Genero</th>
                                                    <th>Nivel Hohar</th>
                                                    <th>Nivel Vivienda</th>
                                                    <th>Ocupación</th>
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
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.localizacion }}
                                                    </td>
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.edad }} Años
                                                    </td>
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.genero }}
                                                    </td>
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.riesgo_hogar.valor }}
                                                    </td>
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.riesgo_vivienda.valor }}
                                                    </td>
                                                    <td style="font-weight: normal;vertical-align: middle;text-align: left;text-transform: capitalize;">
                                                        {{ item.ocupacion }}
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
import * as enfermedadesCro from "../../Servicios/enfermedadesCro_servicios";
import $ from "jquery";
import DataTable from "datatables.net";

export default {
    mounted() {
        this.bajo_nivel_socioeconomico();
    },
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            ruta: "",
            integrantes: []
        };
    },
    methods: { 
        filtrar() {
            this.bajo_nivel_socioeconomico();
        },
        async bajo_nivel_socioeconomico(){

            const parametros = {
                _token: this.csrf,
            };

            await reportes.bajo_nivel_socioeconomico(parametros).then(respuesta => {
                this.integrantes = respuesta.data.integrantes;
                this.crearDataTable()
            });
        },
        crearDataTable() {
            $("#bajo_nivel_table").dataTable().fnDestroy();
            setTimeout(() => {
                $('#bajo_nivel_table').DataTable({
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
            }, 500);
        },
        async generarExcel(){
            const parametros = {
                datos: this.integrantes,
                titulo: "Reporte Población en Bajo Nivel Socioeconomico",
            };

            await reportes.exportarSocioeconomico(parametros).then(respuesta => {
                let href = store.state.apiURL + respuesta.data.nombre;
                this.downloadItem(href);
            });
           
        },
        downloadItem (url) {      
            const link = document.createElement('a')
            link.href = url
            link.download = "Poblacion en Bajo Nivel Socioeconomico.xlsx"
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
    }

    .dataTables_paginate span .current{     
        color: #ffff !important;
        margin-left: 3px;
        margin-right: 3px;
        font-weight: bold;
        background-color: #5578eb;
        padding: 4px 8px 4px 8px;
        border-radius: 4px;
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
