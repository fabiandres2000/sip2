<template>
    <div>
        <loading
            :active.sync="isLoading"
            :can-cancel="true"
            loader="dots"
            :height=128
            :width=128
            color="#007bff"
            :is-full-page="true"
        />
        <div class="row">
            <div class="col-lg-9"></div>
            <div class="col-lg-3" style="text-align: right">
                <button  @click="exportToPDFML()" class="btn btn-danger"><i class="fa fa-file" aria-hidden="true"></i> Exportar PDF</button>
                <vue-excel-xlsx
                    :data="tasaOcupacionPorCorregimiento"
                    :columns="columns"
                    file-name="tasas-ocupacion"
                    :file-type="'xlsx'"
                    :sheet-name="'sheetname'"
                    style = "    background-color: green;color: white;border: 0px;padding: 10px;border-radius: 3px;"
                    >
                    <i class="fa fa-table" aria-hidden="true"></i> Exportar a excel
                </vue-excel-xlsx>
            </div>
        </div>
        <hr>
        <div class="row" v-if="finalizado == true" ref="porcentajes">
            <div class="col-lg-4 text-center">
                <br>
                <h3>Tasa de Ocupación</h3>
                <h5>(General)</h5>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="100" 
                    :stroke-width="15"  
                    :stroke-color="tasaOcupacion.tasaOcupacion < 20 ? '#f2451a': tasaOcupacion.tasaOcupacion >= 20  && tasaOcupacion.tasaOcupacion < 60 ? '#f2ce1a' : '#1abf03'"  
                    :percentage="Math.floor(tasaOcupacion.tasaOcupacion * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{tasaOcupacion.personasOcupadas}} / {{tasaOcupacion.personasEdadTrabajar}}</h4> 
            </div>
            <div class="col-lg-4 text-center">
                <br>
                <h3>Mayor Tasa de Ocupación</h3>
                <h5>({{tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].localizacion==""?'CASCO URBANO':tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].localizacion}})</h5>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="100" 
                    :stroke-width="15"  
                    :stroke-color="tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].tasa_ocupacion < 20 ? '#f2451a': tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].tasa_ocupacion >= 20  && tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].tasa_ocupacion < 60 ? '#f2ce1a' : '#1abf03'"  
                    :percentage="Math.floor(tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].tasa_ocupacion * 10) / 10"> 
                </circle-progress>
                <br>
                <h5>{{tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].numero_personas}} / {{tasaOcupacionPorCorregimiento[tasaOcupacionPorCorregimiento.length -1].personas_edad_trabajo}}</h5> 
            </div>
            <div class="col-lg-4 text-center">
                <br>
                <h3>Menor Tasa de Ocupación</h3>
                <h4>({{tasaOcupacionPorCorregimiento[0].localizacion==""?'CASCO URBANO':tasaOcupacionPorCorregimiento[0].localizacion}})</h4>
                <circle-progress
                    stroke-bg-color = "#e3e2e1"
                    :r="100" 
                    :stroke-width="15"  
                    :stroke-color="tasaOcupacionPorCorregimiento[0].tasa_ocupacion < 20 ? '#f2451a': tasaOcupacionPorCorregimiento[0].tasa_ocupacion >= 20  && tasaOcupacionPorCorregimiento[0].tasa_ocupacion < 60 ? '#f2ce1a' : '#1abf03'"  
                    :percentage="Math.floor(tasaOcupacionPorCorregimiento[0].tasa_ocupacion * 10) / 10"> 
                </circle-progress>
                <br>
                <h4>{{tasaOcupacionPorCorregimiento[0].numero_personas}} / {{tasaOcupacionPorCorregimiento[0].personas_edad_trabajo}}</h4> 
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="col-lg-5 text-center">
                <h3>Tasa de Ocupación</h3>
                <h4>(Por Tipo de Empleo)</h4>
            </div>
            <div class="col-lg-7">
                <h3>Tasa de Ocupación (Por Corregimiento)</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-5 text-center">
                <div id="chartdiv_ocupacion_pie" style="width: 100%; height: 300px"></div>
            </div>
            <div class="col-lg-7" style="overflow: scroll;">
                <table id="tabla_tasa_ocupacion" class="table_data" style="width: 100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th style="width: 250px">Corregimiento</th>
                            <th># Personas Ocupadas</th>
                            <th># Personas ET</th>
                            <th>Tasa Ocupación</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in tasaOcupacionPorCorregimiento">
                            <td>{{ index+1 }}</td>
                            <td>{{item.localizacion==""?'CASCO URBANO':item.localizacion}}</td>
                            <td>{{item.numero_personas}}</td>
                            <td>{{item.personas_edad_trabajo}}</td>
                            <td>{{Math.floor(item.tasa_ocupacion * 10) / 10}} %</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div>
        <br>
        <hr>
        <div class="row">
            <div class="col-lg-6 text-center">
                <br>
                <h3>Porcentaje de Población</h3>
                <h3>(Por Tipo de Empleo)</h3>
                <div id="chartdiv_ocupacion_pie_2" style="width: 100%; height: 300px"></div>
            </div>
            <div class="col-lg-6">
                <br>
                <h3>Numero de Personas</h3>
                <h3>(Por Tipo de Empleo)</h3>
                <br>
                <table class="table_data" style="width: 100%">
                    <thead>
                        <tr>
                            <th>Tipo de empleo</th>
                            <th># Personas Ocupadas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Empleo Formal</td>
                            <td>{{tasaOcupacion.personasEmpleoFormal}}</td>
                        </tr>
                        <tr>
                            <td>Empleo Informal</td>
                            <td>{{tasaOcupacion.personasEmpleoInformal}}</td>
                        </tr>
                        <tr>
                            <td>Independiente</td>
                            <td>{{tasaOcupacion.personasEmpleoIndependiente}}</td>
                        </tr>   
                        <tr>
                            <td>Sin Empleo</td>
                            <td>{{tasaOcupacion.personasSinEmpleo}}</td>
                        </tr>
                        <tr>
                            <td>NA</td>
                            <td>{{tasaOcupacion.personasNA}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
        </div> 
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <br>
                <h3>Poblacion Economicamente Activa ({{PAE.PAE}} Personas)</h3>
                <br>
                <table id="table_pae" class="table_data" style="width: 100%">
                    <thead>
                        <tr>
                            <th>N0</th>
                            <th>Corregimiento</th>
                            <th>#Personas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in PAE.porCorregimeinto">
                            <td>{{ index+1 }}</td>
                            <td>{{item.localizacion==""?'CASCO URBANO':item.localizacion}}</td>
                            <td>{{item.numero_personas}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="col-lg-6 text-center">
                <br>
                <h3>Poblacion Economicamente Activa</h3>
                <h3>(Por Corregimeinto)</h3>
                <div id="chartdiv_pae" style="width: 100%; height: 300px"></div>
            </div>
        </div>
        <hr>
        <br>
        <div class="row">
            <div class="col-lg-6">
                <br>
                <h3>Poblacion en Edad para Trabajar ({{PET.PET}} Personas)</h3>
                <br>
                <table id="table_pet" class="table_data" style="width: 100%">
                    <thead>
                        <tr>
                            <th>N0</th>
                            <th>Corregimiento</th>
                            <th>#Personas</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(item, index) in PET.porCorregimeinto">
                            <td>{{ index+1 }}</td>
                            <td>{{item.localizacion==""?'CASCO URBANO':item.localizacion}}</td>
                            <td>{{item.numero_personas}}</td>
                        </tr>
                    </tbody>
                </table>
            </div> 
            <div class="col-lg-6 text-center">
                <br>
                <h3>Poblacion en Edad para Trabajar</h3>
                <h3>(Por Corregimeinto)</h3>
                <div id="chartdiv_pet" style="width: 100%; height: 300px"></div>
            </div>
        </div>

        <b-modal
            ref="modalpdf"
            hide-footer
            title="Reporte Mercado Laboral"
            size="xl"
            centered
            header-bg-variant="danger"
            header-text-variant="light"
            :no-close-on-backdrop="true"
        >
            <embed
                id="divPdf"
                :src="rutaPdf"
                type="application/pdf"
                width="100%"
                height="650px"
            />
            <hr />
            <div class="text-right">
                <button
                    type="button"
                    class="btn btn-warning"
                    @click="cerrarModal"
                >
                    <i class="fa fa-window-close"></i> Cancelar
                </button>
            </div>
        </b-modal>
    </div>
</template>
<script>

import * as DashboardServiceSocioeconomico from "../../Servicios/dashboard_socioeconomico_servicios";
import CircleProgress from 'vue-pithy-progress/lib/circle-progress.umd.min.js';
import Loading from "vue-loading-overlay";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import * as DashboardService from "../../Servicios/dashboard";
import $ from "jquery";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
am4core.useTheme(am4themes_animated);
import store from "../../store";

export default {
    components: { CircleProgress, Loading },
    mounted() {
        this.coordenadas();
        this.iniciar();
        this.mercadoLaboral();
    },
    props: [],
    data() {
        return {
            PET: [],
            PAE: [],
            tasaOcupacion: [],
            tasaOcupacionPorCorregimiento: [],
            columns: [
                {
                    label: "CORREGIMIENTO",
                    field: "localizacion",
                },
                {
                    label: "PERSONAS OCUPADAS",
                    field: "numero_personas",
                },
                {
                    label: "PERSONAS EN EDAD DE TRABAJO",
                    field: "personas_edad_trabajo",
                },
                {
                    label: "TASA DE OCUPACION %",
                    field: "tasa_ocupacion",
                },
            ],
            finalizado: false,
            torta1: null,
            torta2: null,
            torta3: null,
            torta4: null,
            isLoading: false,
            rutaPdf: ""
        }
    },
    methods: {
        async iniciar() {
            const parametros = {
                _token: this.csrf
            };
            try {
                await usuarioServicios
                    .iniciar(parametros)
                    .then(respuesta => {
                        this.ente = respuesta.data.ente;    
                    })
                    .catch(error => {});
            } catch (error) {
                switch (error.response.status) {
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },
        async coordenadas() {
            let data = {
                _token: this.csrf
            };

            await DashboardService.coordenadas(data)
            .then(respuesta => {
                this.latitud = Number(respuesta.data["latitud"]);
                this.longitud = Number(respuesta.data["longitud"]);
            })
            .catch(err => {
                console.log(err);
            });
        },
        async mercadoLaboral() {
            await DashboardServiceSocioeconomico.mercadoLaboral()
            .then(respuesta => {
                this.tasaOcupacion = respuesta.data.tasaOcupacion;
                this.PAE = respuesta.data.PAE;
                this.PET = respuesta.data.PET;
                this.ordenarTasaOcupacion(this.tasaOcupacion.porCorregimeinto);
                this.crearDataTable();
                this.grafica_torta(this.tasaOcupacion);
                this.grafica_torta2(this.tasaOcupacion);
                this.grafica_torta3(this.PAE.porCorregimeinto);
                this.grafica_torta4(this.PET.porCorregimeinto);
                this.finalizado = true;
            })
            .catch(err => {
                console.log(err);
            });
        },
        ordenarTasaOcupacion(array) {
            this.tasaOcupacionPorCorregimiento =  array.sort(function(a, b){
                return a.tasa_ocupacion - b.tasa_ocupacion;
            });
        },
        crearDataTable() {
            $("#tabla_tasa_ocupacion").dataTable().fnDestroy();
            setTimeout(() => {
                $('#tabla_tasa_ocupacion').DataTable({
                    "lengthChange": false,
                    "ordering": false,
                    pageLength : 5,
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

            $("#table_pae").dataTable().fnDestroy();
            setTimeout(() => {
                $('#table_pae').DataTable({
                    "lengthChange": false,
                    pageLength : 5,
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

            $("#table_pet").dataTable().fnDestroy();
            setTimeout(() => {
                $('#table_pet').DataTable({
                    "lengthChange": false,
                    pageLength : 5,
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
        async grafica_torta(array) {
            var chart = am4core.create("chartdiv_ocupacion_pie", am4charts.PieChart3D);
            this.torta1 = chart;
            chart.data = [
                {
                    category: "Emp. Formal",
                    first: array.personasEmpleoFormal,
                },
                {
                    category: "Emp. Informal",
                    first: array.personasEmpleoInformal,
                },
                {
                    category: "Independiente",
                    first: array.personasEmpleoIndependiente,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafica_torta2(array) {
            var chart = am4core.create("chartdiv_ocupacion_pie_2", am4charts.PieChart3D);
            this.torta2 = chart;
            chart.data = [
                {
                    category: "Emp. Formal",
                    first: array.personasEmpleoFormal,
                },
                {
                    category: "Emp. Informal",
                    first: array.personasEmpleoInformal,
                },
                {
                    category: "Independiente",
                    first: array.personasEmpleoIndependiente,
                },
                {
                    category: "NA",
                    first: array.personasNA,
                },
                {
                    category: "Sin Empleo",
                    first: array.personasSinEmpleo,
                },
            ];
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafica_torta3(array) {
            var chart = am4core.create("chartdiv_pae", am4charts.PieChart3D);
            this.torta3 = chart;
            chart.data = [];

            for (let index = 0; index < array.length; index++) {
                chart.data.push({
                    category: array[index].localizacion==""?'CASCO URBANO':array[index].localizacion,
                    first: array[index].numero_personas,
                });     
            }
            
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async grafica_torta4(array) {
            var chart = am4core.create("chartdiv_pet", am4charts.PieChart3D);
            this.torta4 = chart;
            chart.data = [];

            for (let index = 0; index < array.length; index++) {
                chart.data.push({
                    category: array[index].localizacion==""?'CASCO URBANO':array[index].localizacion,
                    first: array[index].numero_personas,
                });     
            }
            
            var series = chart.series.push(new am4charts.PieSeries3D());
            series.dataFields.value = "first";
            series.dataFields.category = "category";
        },
        async exportToPDFML(){ 
            this.isLoading = true;

            // convertir a imagen todos los graficos
            const options = {
                type: 'dataURL',
                useCORS: true,
            }
            let porcentajes = await this.$html2canvas(this.$refs.porcentajes, options);
            let torta1 = await this.torta1.exporting.getImage("png");
            let torta2 = await this.torta2.exporting.getImage("png");
            let torta3 = await this.torta3.exporting.getImage("png");
            let torta4 = await this.torta4.exporting.getImage("png");
            // convertir a imagen todos los graficos

            const parametros = {
                _token: this.csrf,
                torta1: torta1,
                torta2: torta2,
                torta3: torta3,
                torta4: torta4,
                porcentajes: porcentajes,
                topc: this.tasaOcupacionPorCorregimiento,
                tasaOcupacion: this.tasaOcupacion,
                PAE: this.PAE,
                PET: this.PET
            };
            try {
                await DashboardServiceSocioeconomico.exportarMercadoLaboral(parametros).then(respuesta => {
                    this.rutaPdf = store.state.apiURL + respuesta.data.nombre;
                    this.isLoading = false;
                    this.$refs.modalpdf.show();
                });
            } catch (error) {
                switch (error.response.status) {
                    case 422:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                    default:
                    this.$swal("Error...!", "Ocurrio un error!", "error");
                    break;
                }
                this.isLoading = false;
            }
        },
        cerrarModal() {
            this.$refs.modalpdf.hide();
        }
    }
}
</script>