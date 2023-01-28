<template>
  <div style="margin-top: -4%">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-sm-10">
                <h3>INFORME POBLACIÓN MIGRANTE</h3>
              </div>
              <div class="col-sm-2 text-right">
                <button
                  type="button"
                  class="btn btn-danger"
                  v-on:click="generarPDF"
                >
                  <i class="la la-pdf"></i>
                  <span class="kt-hidden-mobile">Generar PDF</span>
                </button>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6 text-center" ref="printMe">
                <h5>Población migrante</h5>

                <vue-circle
                  ref="gc"
                  :progress="mivariable"
                  :size="250"
                  :reverse="false"
                  line-cap="round"
                  :fill="fill"
                  empty-fill="rgba(0, 0, 0, .1)"
                  :animation-start-value="0.0"
                  :start-angle="-190"
                  insert-mode="append"
                  :thickness="7"
                  :show-percent="false"
                  @vue-circle-progress="progress"
                  @vue-circle-end="progress_end"
                >
                  <p style="font-size: 30px; font-weight: bold">
                    {{ Math.round(poblacionMigrante) }}%
                  </p>
                </vue-circle>
              </div>
              <div class="col-lg-6 text-center">
                <h5>Estado migratorio</h5>
                
                <div id="chartdiv" style="width: 100%; height: 250px"></div>
                <b>
                  El
                  {{
                    Math.round(
                      (migrantesNoRegulados * 100) /
                        (migrantesNoRegulados + migrantesRegulados)
                    )
                  }}% de la poblacion migrante no se encuentran registrados como
                  migrantes.</b
                >
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 text-center">
                <h4>Principales ocupaciones de los migrantes</h4>
                <div id="chartbarra" style="width: 100%; height: 400px"></div>
                En relación a la ocupación migrante en el municipio, el
                {{ Math.round((primerOcupacion.cant * 100) / totalMigrantes) }}%
                {{primerOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ primerOcupacion.nombre }}, el
                {{ Math.round((segundaOcupacion.cant * 100) / totalMigrantes) }}%
                {{segundaOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ segundaOcupacion.nombre }}, el
                {{ Math.round((terceraOcupacion.cant * 100) / totalMigrantes) }}%
                {{terceraOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ terceraOcupacion.nombre }}, el
                {{ Math.round((cuartaOcupacion.cant * 100) / totalMigrantes) }}%
                {{cuartaOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ cuartaOcupacion.nombre }}, el
                {{ Math.round((quintaOcupacion.cant * 100) / totalMigrantes) }}%
                {{quintaOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ quintaOcupacion.nombre }}.
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-6 text-center">
                <h5>
                  Población migrante por grupo de edad
                </h5>
                <div
                  id="chartocupaciones"
                  style="width: 100%; height: 400px"
                ></div>
                Del 100% de la población migrante ({{ totalMigrantes }}), la
                mayoría {{ poblacionEdadUno.cant }} tienen entre
                {{ poblacionEdadUno.edad }} años de edad, seguido de
                {{ poblacionEdadDos.cant }} entre 18-28 años,
                {{ poblacionEdadTres.cant }} entre
                {{ poblacionEdadTres.edad }} y
                {{ poblacionEdadCuatro.cant }} entre
                {{ poblacionEdadCuatro.edad }}.
              </div>
              <div class="col-lg-6 text-center">
                <h5>Migrantes por sexo</h5>
                <div id="chartdivsexo" style="width: 100%; height: 400px"></div>
                
                  El
                  {{
                    Math.round(
                      (migrantesNoRegulados * 100) /
                        (migrantesNoRegulados + migrantesRegulados)
                    )
                  }}% de la poblacion migrante no se encuentran registrados como
                  migrantes.
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-12 text-center" ref="printMe">
                <h5>Principales paises</h5>
                <div
                  id="chartdivpaises"
                  style="width: 100%; height: 500px"
                ></div>
              </div>
            </div>
          </div>
        </div>    
        <div class="card">
          <div class="card-body text-center">
            <h4>Situación de salud de migrantes</h4>
            <div class="row">
              <div class="col-lg-12 text-center">
                <h4>Principales enfermedades</h4>
                <div id="chartbarraenfermedades" style="width: 100%; height: 400px"></div>
                <div v-if="enfermedades.length >0">
                  Las principales enfermedades reportadas en la población migrante son:  
                  <span 
                    v-for="e in enfermedades"
                    :value="e.id"
                    :key="e.id"
                  >
                    {{e.enfe}}, 
                  </span>  
                </div>
                <div v-else>
                   No hay datos para las enfermedades.
                </div>  
              </div>  
              <div class="col-lg-6 text-center">
                <h4>Acesso a servicio de salud</h4>
                <h5>Migrantes afiliados</h5>
                <h1>{{afiliaciones.afiliados}}</h1>
                <h5>Migrantes no afiliados</h5>
                <h1>{{afiliaciones.no_afiliados}}</h1>
              </div>
              <div class="col-lg-6 text-center">
                <h4>Situación nutricional</h4>
              </div>  
            </div>
          </div>
        </div>
      </div>
    </div>
    <VueHtml2pdf
      :show-layout="false"
      :float-layout="true"
      :enable-download="true"
      :preview-modal="true"
      :paginate-elements-by-height="1400"
      filename="myPDF"
      :pdf-quality="2"
      :manual-pagination="false"
      pdf-format="a4"
      pdf-orientation="portrait"
      pdf-content-width="100%"
      ref="html2Pdf"
      :margin="[0, 100, 0, 100]"
    >
      <section slot="pdf-content">
        <section class="pdf-item">
          <div class="row" style="margin-top: 30px">
            <div class="col-sm-12 text-center">
              <h3>INFORME POBLACIÓN MIGRANTE</h3>
            </div>
          </div>

          <table style="width: 100%">
            <tr>
              <td
                class="text-center"
                style="font-size: 14px; width: 50%; font-weight: 600"
              >
                Población migrante
              </td>
              <td
                class="text-center"
                style="font-size: 14px; width: 50%; font-weight: 600"
              >
                Estado migratorio
              </td>
            </tr>
            <tr>
              <td class="text-center" style="font-size: 11px">
                <br />
                <vue-circle
                  ref="gcpdf"
                  :progress="mivariable"
                  :size="180"
                  :reverse="false"
                  line-cap="round"
                  :fill="fill"
                  empty-fill="rgba(0, 0, 0, .1)"
                  :animation-start-value="0.0"
                  :start-angle="-190"
                  insert-mode="append"
                  :thickness="10"
                  :show-percent="false"
                  @vue-circle-progress="progress"
                  @vue-circle-end="progress_end"
                >
                  <p style="font-size: 35px; font-weight: bold">
                    {{ Math.round(poblacionMigrante) }}%
                  </p>
                </vue-circle>
              </td>
              <td class="text-center" style="font-size: 11px">
                <img :src="imagenPie" style="width: 100%; font-size: 11px" />
              </td>
            </tr>
            <tr>
              <td class="text-center" colspan="2" style="font-size: 11px">
                El
                {{
                  Math.round(
                    (migrantesNoRegulados * 100) /
                      (migrantesNoRegulados + migrantesRegulados)
                  )
                }}% de la poblacion migrante no se encuentran registrados como
                migrantes
              </td>
            </tr>
          </table>
          <br />
          <table style="width: 100%">
            <tr>
              <td class="text-center" colspan="2" style="font-size: 11px">
                <h5>Principales ocupaciones de los migrantes</h5>
              </td>
            </tr>
            <tr>
              <td class="text-center" colspan="2" style="font-size: 11px">
                <img :src="imagenBarra" style="width: 100%; font-size: 11px" />
               <span style="padding-left: 10px; padding-right: 10px;"> En relación a la ocupación migrante en el municipio, el
                {{ Math.round((primerOcupacion.cant * 100) / totalMigrantes) }}%
                {{primerOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ primerOcupacion.nombre }}, el
                {{ Math.round((segundaOcupacion.cant * 100) / totalMigrantes) }}%
                {{segundaOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ segundaOcupacion.nombre }}, el
                {{ Math.round((terceraOcupacion.cant * 100) / totalMigrantes) }}%
                {{terceraOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ terceraOcupacion.nombre }}, el
                {{ Math.round((cuartaOcupacion.cant * 100) / totalMigrantes) }}%
                {{cuartaOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ cuartaOcupacion.nombre }}, el
                {{ Math.round((quintaOcupacion.cant * 100) / totalMigrantes) }}%
                {{quintaOcupacion.nombre == "Sin empleo" ? 'están' : 'son' }} {{ quintaOcupacion.nombre }}.</span>
              </td>
            </tr>
          </table>
          <br />
          <table style="width: 100%">
            <tr>
              <td class="text-center" colspan="2" style="font-size: 11px">
                <h5>Población migrante por grupo de edad</h5>
              </td>
            </tr>
            <tr>
              <td class="text-center" colspan="2" style="font-size: 11px">
                <img
                  :src="imagenPieOcupaciones"
                  style="width: 100%; font-size: 11px"
                />
                <span style="padding-left: 10px; padding-right: 10px;">Del 100% de la población migrante ({{ totalMigrantes }}), la
                mayoría {{ poblacionEdadUno.cant }} tienen entre
                {{ poblacionEdadUno.edad }} años de edad, seguido de
                {{ poblacionEdadDos.cant }} entre 18-28 años,
                {{ poblacionEdadTres.cant }} entre
                {{ poblacionEdadTres.edad }} y
                {{ poblacionEdadCuatro.cant }} entre
                {{ poblacionEdadCuatro.edad }}.</span>
              </td>
            </tr>
          </table>
        </section>
        <div class="html2pdf__page-break" />
        <section slot="pdf-content">

        </section>  
      </section>
    </VueHtml2pdf>
  </div>
</template>
<script>
"use strict";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import * as informes from "../../Servicios/informes";
import VueApexCharts from "vue-apexcharts";
import VueHtml2pdf from "vue-html2pdf";
import VueEasyPieChart from "vue-easy-pie-chart";
import "vue-easy-pie-chart/dist/vue-easy-pie-chart.css";
import Progress from "easy-circular-progress";
import VueCircle from "vue2-circle-progress";
am4core.useTheme(am4themes_animated);
export default {
  components: {
    VueHtml2pdf,
    VueEasyPieChart,
    Progress,
    VueCircle,
  },

  mounted() {
    this.calcular();
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      combo: "",
      j: 0,
      mivariable: 0,
      totalMigrantes: 0,
      poblacionMigrante: 0,
      migrantesRegulados: 0,
      migrantesNoRegulados: 0,
      imagenPie: [],
      imagenBarra: [],
      imagenPieOcupaciones: [],
      imagenPiePaises: [],
      imagenSexo:[],
      enfermedades: [],
      afiliaciones: [],
      datos: {
        migrantes0: 0,
        migrantes115: 0,
        migrantes611: 0,
        migrantes1217: 0,
        migrantes1828: 0,
        migrantes2959: 0,
        migrantes60: 0,
      },
      sexo: {
        m_0:0,
        m_15: 0,
        m_611: 0,
        m_1217: 0,
        m_1828: 0,
        m_2959: 0,
        m_60: 0,
        f_0: 0,
        f_15: 0,
        f_611: 0,
        f_1217: 0,
        f_1828: 0,
        f_2959: 0,
        f_60: 0,
      },
      ocupaciones: {
        id: 0,
        descripcion: "",
        cont: 0,
      },
      poblacion: {
        migrantes: 0,
        nomigrantes: 0,
      },
      primerOcupacion: {
        nombre: "",
        cant: 0,
      },
      segundaOcupacion: {
        nombre: "",
        cant: 0,
      },
      terceraOcupacion: {
        nombre: "",
        cant: 0,
      },
      cuartaOcupacion: {
        nombre: "",
        cant: 0,
      },
      quintaOcupacion: {
        nombre: "",
        cant: 0,
      },
      poblacionEdadUno: {
        edad: "",
        cant: 0,
      },
      poblacionEdadDos: {
        edad: "",
        cant: 0,
      },
      poblacionEdadTres: {
        edad: "",
        cant: 0,
      },
      poblacionEdadCuatro: {
        edad: "",
        cant: 0,
      },
      primeraEnfermedad: {
        nombre: "",
        cant: 0,
      },
      segundaEnfermedad: {
        nombre: "",
        cant: 0,
      },
      terceraEnfermedad: {
        nombre: "",
        cant: 0,
      },
      cuartaEnfermedad: {
        nombre: "",
        cant: 0,
      },
      quintaEnfermedad: {
        nombre: "",
        cant: 0,
      },
      series: [],
      series_grupo: [],
      series_barra_orden: [],
      series_ocupaciones: [],
      series_enfermedades: [],
      series_paises: [],
      serie_sexo: [],
      textoEnfermedades: "",
      fill: { gradient: ["#078914", "#078914", "#078914"] },
    };
  },
  methods: {
    progress(event, progress, stepValue) {
      // console.log(event);
      //this.$refs.gc.progress = 12;
    },
    progress_end(event) {
      //console.log("Circle progress end");
      //this.$refs.gc.progress = 12;
    },
    pdfgen: function (imagen) {
      var pdfMake = require("pdfmake/build/pdfmake.js");
      if (pdfMake.vfs == undefined) {
        var pdfFonts = require("pdfmake/build/vfs_fonts.js");
        pdfMake.vfs = pdfFonts.pdfMake.vfs;
      }
      var docDefinition = { content: "<img src='" + imagen + "'>" };
      pdfMake.createPdf(docDefinition).download("optionalName.pdf");
    },
    extraerimagen: async function (chart) {

      this.$refs.html2Pdf.generatePdf();

      chart.exporting.getImage("png").then((data) => {
        this.img = data;
      });
    },
    async calcular() {
      let data = {
        _token: this.csrf,
      };
      await informes
        .inicialesMigrantes(data)
        .then((respuesta) => {
          this.poblacionMigrante =(respuesta.data.total_migrantes * 100) /respuesta.data.total_poblacion;
          this.totalMigrantes = respuesta.data.total_migrantes;
          this.migrantesRegulados = respuesta.data.total_regulado;
          this.migrantesNoRegulados = respuesta.data.total_no_regulado;
          this.datos = respuesta.data.edades;
          this.ocupaciones = respuesta.data.ocupaciones;
          this.$refs.gc.updateProgress(this.poblacionMigrante);
          this.$refs.gcpdf.updateProgress(this.poblacionMigrante);
          this.series_paises = respuesta.data.paises;
          this.sexo = respuesta.data.sexo;
          this.enfermedades = respuesta.data.enfermedades;
          this.afiliaciones = respuesta.data.afiliaciones;
          
          //console.log(12);

          //GRAFICA DE PIE
          this.series.push({
            migrantes: "Regulados",
            cantidad: this.migrantesRegulados,
          });
          this.series.push({
            migrantes: "No regulados",
            cantidad: this.migrantesNoRegulados,
          });

          //GRAFICA DE BARS
          this.series_grupo.push({
            edad: "0+",
            migrantes: this.datos.migrantes0,
          });
          this.series_grupo.push({
            edad: "1-5",
            migrantes: this.datos.migrantes115,
          });
          this.series_grupo.push({
            edad: "6-11",
            migrantes: this.datos.migrantes611,
          });
          this.series_grupo.push({
            edad: "12-17",
            migrantes: this.datos.migrantes1217,
          });
          this.series_grupo.push({
            edad: "18-28",
            migrantes: this.datos.migrantes1828,
          });
          this.series_grupo.push({
            edad: "29-59",
            migrantes: this.datos.migrantes2959,
          });
          this.series_grupo.push({
            edad: "60+",
            migrantes: this.datos.migrantes60,
          });

          /////ORDENANDO///////////
          //GRAFICA DE BARS
          this.series_barra_orden.push({
            edad: "0+",
            migrantes: this.datos.migrantes0,
          });
          this.series_barra_orden.push({
            edad: "1-5",
            migrantes: this.datos.migrantes115,
          });
          this.series_barra_orden.push({
            edad: "6-11",
            migrantes: this.datos.migrantes611,
          });
          this.series_barra_orden.push({
            edad: "12-17",
            migrantes: this.datos.migrantes1217,
          });
          this.series_barra_orden.push({
            edad: "18-28",
            migrantes: this.datos.migrantes1828,
          });
          this.series_barra_orden.push({
            edad: "29-59",
            migrantes: this.datos.migrantes2959,
          });
          this.series_barra_orden.push({
            edad: "60+",
            migrantes: this.datos.migrantes60,
          });

          this.series_barra_orden.sort(function (a, b) {
            if (a.migrantes > b.migrantes) {
              return 1;
            }
            if (a.migrantes < b.migrantes) {
              return -1;
            }
            // a must be equal to b
            return 0;
          });

          this.poblacionEdadUno.edad = this.series_barra_orden[6].edad;
          this.poblacionEdadUno.cant = this.series_barra_orden[6].migrantes;

          this.poblacionEdadDos.edad = this.series_barra_orden[5].edad;
          this.poblacionEdadDos.cant = this.series_barra_orden[5].migrantes;

          this.poblacionEdadTres.edad = this.series_barra_orden[4].edad;
          this.poblacionEdadTres.cant = this.series_barra_orden[4].migrantes;

          this.poblacionEdadCuatro.edad = this.series_barra_orden[3].edad;
          this.poblacionEdadCuatro.cant = this.series_barra_orden[3].migrantes;

          for (var i = 0; i < this.ocupaciones.length; i++) {
            this.series_ocupaciones.push({
              ocupacion: this.ocupaciones[i]["descripcion"],
              migrantes: this.ocupaciones[i]["cont"],
            });
          }

          

          this.series_ocupaciones.sort(function (a, b) {
            if (a.migrantes > b.migrantes) {
              return 1;
            }
            if (a.migrantes < b.migrantes) {
              return -1;
            }
            // a must be equal to b
            return 0;
          });

          for (this.j = 0; this.j < this.enfermedades.length; this.j++) {
            this.series_enfermedades.push({
              enfermedad: this.enfermedades[this.j]["enfe"],
              migrantes: this.enfermedades[this.j]["total"],
            });
          }

          if(this.enfermedades.length > 0){
            this.primeraEnfermedad.nombre = this.enfermedades[0]["enfe"];
            this.primeraEnfermedad.cant = this.enfermedades[0]["total"];
          }

          if(this.enfermedades.length > 1){
            this.segundaEnfermedad.nombre = this.enfermedades[1]["enfe"];
            this.segundaEnfermedad.cant = this.enfermedades[1]["total"];
          }

          if(this.enfermedades.length > 2){
            this.terceraEnfermedad.nombre = this.enfermedades[2]["enfe"];
            this.terceraEnfermedad.cant = this.enfermedades[2]["total"];
          }

          if(this.enfermedades.length > 3){
            this.cuartaEnfermedad.nombre = this.enfermedades[3]["enfe"];
            this.cuartaEnfermedad.cant = this.enfermedades[3]["total"];
          }

          if(this.enfermedades.length > 4){
            this.quintaEnfermedad.nombre = this.enfermedades[4]["enfe"];
            this.quintaEnfermedad.cant = this.enfermedades[4]["total"];
          }


          this.primerOcupacion.nombre = this.series_ocupaciones[4].ocupacion;
          this.primerOcupacion.cant = this.series_ocupaciones[4].migrantes;

          this.segundaOcupacion.nombre = this.series_ocupaciones[3].ocupacion;
          this.segundaOcupacion.cant = this.series_ocupaciones[3].migrantes;

          this.terceraOcupacion.nombre = this.series_ocupaciones[2].ocupacion;
          this.terceraOcupacion.cant = this.series_ocupaciones[2].migrantes;

          this.cuartaOcupacion.nombre = this.series_ocupaciones[1].ocupacion;
          this.cuartaOcupacion.cant = this.series_ocupaciones[1].migrantes;

          this.quintaOcupacion.nombre = this.series_ocupaciones[0].ocupacion;
          this.quintaOcupacion.cant = this.series_ocupaciones[0].migrantes;

          ///////////////////SEXOEDAD///////////////

          this.serie_sexo = [
            {
              age: "60+",
              male: Number(this.sexo.m_60),
              female: Number(this.sexo.f_60),
            },
            {
              age: "29-59",
              male: Number(this.sexo.m_2959),
              female: Number(this.sexo.f_2959),
            },
            {
              age: "18-28",
              male: Number(this.sexo.m_1828),
              female: Number(this.sexo.f_1828),
            },
            {
              age: "12-17",
              male: Number(this.sexo.m_1217),
              female: Number(this.sexo.f_1217),
            },
            {
              age: "6-11",
              male: Number(this.sexo.m_611),
              female: Number(this.sexo.f_611),
            },
            {
              age: "1-5",
              male: Number(this.sexo.m_15),
              female: Number(this.sexo.f_15),
            },
            {
              age: "0+",
              male: Number(this.sexo.m_0),
              female: Number(this.sexo.f_0),
            },
          ];

          this.grafica_de_pie();
          this.grafica_barra();
          this.grafica_de_pie_ocupaciones();
          this.grafica_de_pie_paises();
          this.grafica_stacked();
          this.grafica_barra_enfermedades();

        })
        .catch((err) => {
          console.log(err);
        });
    },
    async grafica_de_pie() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      var chart = am4core.create("chartdiv", am4charts.PieChart3D);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.legend = new am4charts.Legend();

      chart.data = this.series;

      var series = chart.series.push(new am4charts.PieSeries3D());
      series.dataFields.value = "cantidad";
      series.dataFields.category = "migrantes";

      await chart.exporting.getImage("png").then((data) => {
        this.imagenPie = data;
      });
    },
    async grafica_barra() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      // Add data
      var chart = am4core.create("chartbarra", am4charts.XYChart);
      chart.padding(40, 40, 40, 40);

      var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
      categoryAxis.renderer.grid.template.location = 0;
      categoryAxis.dataFields.category = "ocupacion";
      categoryAxis.renderer.minGridDistance = 1;
      categoryAxis.renderer.inversed = true;
      categoryAxis.renderer.grid.template.disabled = true;

      var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
      valueAxis.min = 0;

      var series = chart.series.push(new am4charts.ColumnSeries());
      series.dataFields.categoryY = "ocupacion";
      series.dataFields.valueX = "migrantes";
      series.tooltipText = "{valueX.value}";
      series.columns.template.strokeOpacity = 0;
      series.columns.template.column.cornerRadiusBottomRight = 5;
      series.columns.template.column.cornerRadiusTopRight = 5;

      var labelBullet = series.bullets.push(new am4charts.LabelBullet());
      labelBullet.label.horizontalCenter = "left";
      labelBullet.label.dx = 10;
      labelBullet.label.text =
        "{values.valueX.workingValue.formatNumber('#')}";
      labelBullet.locationX = 1;

      // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
      series.columns.template.adapter.add("fill", function (fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });

      categoryAxis.sortBySeries = series;
      chart.data = this.series_ocupaciones;

      await chart.exporting.getImage("png").then((data) => {
        this.imagenBarra = data;
      });
    },
    async grafica_de_pie_ocupaciones() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      var chart = am4core.create("chartocupaciones", am4charts.PieChart3D);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.legend = new am4charts.Legend();

      chart.data = this.series_grupo;

      var series = chart.series.push(new am4charts.PieSeries3D());
      series.dataFields.value = "migrantes";
      series.dataFields.category = "edad";

      await chart.exporting.getImage("png").then((data) => {
        this.imagenPieOcupaciones = data;
      });
    },
    async grafica_de_pie_paises() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      var chart = am4core.create("chartdivpaises", am4charts.PieChart3D);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.legend = new am4charts.Legend();
      chart.data = this.series_paises;

      var series = chart.series.push(new am4charts.PieSeries3D());
      series.dataFields.value = "total";
      series.dataFields.category = "nombre";

      await chart.exporting.getImage("png").then((data) => {
        this.imagenPiePaises = data;
      });
    },
    async grafica_stacked() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      // Create chart instance
      var chart = am4core.create("chartdivsexo", am4charts.XYChart);

      // Add data
      chart.data = this.serie_sexo;
      // Use only absolute numbers
      chart.numberFormatter.numberFormat = "#.#s";

      // Create axes
      var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
      categoryAxis.dataFields.category = "age";
      categoryAxis.renderer.grid.template.location = 0;
      categoryAxis.renderer.inversed = true;

      var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
      valueAxis.extraMin = 0.1;
      valueAxis.extraMax = 0.1;
      valueAxis.renderer.minGridDistance = 40;
      valueAxis.renderer.ticks.template.length = 5;
      valueAxis.renderer.ticks.template.disabled = false;
      valueAxis.renderer.ticks.template.strokeOpacity = 0.4;
      valueAxis.renderer.labels.template.adapter.add("text", function (text) {
        return text == "Male" || text == "Female" ? text : text + "";
      });

      // Create series
      var male = chart.series.push(new am4charts.ColumnSeries());
      male.dataFields.valueX = "male";
      male.dataFields.categoryY = "age";
      male.clustered = false;

      var maleLabel = male.bullets.push(new am4charts.LabelBullet());
      maleLabel.label.text = "{valueX}";
      maleLabel.label.hideOversized = false;
      maleLabel.label.truncate = false;
      maleLabel.label.horizontalCenter = "right";
      maleLabel.label.dx = -10;

      var female = chart.series.push(new am4charts.ColumnSeries());
      female.dataFields.valueX = "female";
      female.dataFields.categoryY = "age";
      female.clustered = false;

      var femaleLabel = female.bullets.push(new am4charts.LabelBullet());
      femaleLabel.label.text = "{valueX}";
      femaleLabel.label.hideOversized = false;
      femaleLabel.label.truncate = false;
      femaleLabel.label.horizontalCenter = "left";
      femaleLabel.label.dx = 10;

      var maleRange = valueAxis.axisRanges.create();
      maleRange.value = -10;
      maleRange.endValue = 0;
      maleRange.label.text = "Masculino";
      maleRange.label.fill = chart.colors.list[0];
      maleRange.label.dy = 20;
      maleRange.label.fontWeight = "600";
      maleRange.grid.strokeOpacity = 1;
      maleRange.grid.stroke = male.stroke;

      var femaleRange = valueAxis.axisRanges.create();
      femaleRange.value = 1;
      femaleRange.endValue = 0;
      femaleRange.label.text = "Femenino";
      femaleRange.label.fill = chart.colors.list[1];
      femaleRange.label.dy = 20;
      femaleRange.label.fontWeight = "600";
      femaleRange.grid.strokeOpacity = 1;
      femaleRange.grid.stroke = female.stroke;

      chart.exporting.getImage("png").then((data) => {
        this.imagenSexo = data;
      });
    },
    generarPDF: async function () {
      this.$refs.html2Pdf.generatePdf();
    },
    async grafica_barra_enfermedades() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      // Add data
      var chart = am4core.create("chartbarraenfermedades", am4charts.XYChart);
      chart.padding(40, 40, 40, 40);

      var categoryAxis = chart.yAxes.push(new am4charts.CategoryAxis());
      categoryAxis.renderer.grid.template.location = 0;
      categoryAxis.dataFields.category = "enfermedad";
      categoryAxis.renderer.minGridDistance = 1;
      categoryAxis.renderer.inversed = true;
      categoryAxis.renderer.grid.template.disabled = true;

      var valueAxis = chart.xAxes.push(new am4charts.ValueAxis());
      valueAxis.min = 0;

      var series = chart.series.push(new am4charts.ColumnSeries());
      series.dataFields.categoryY = "enfermedad";
      series.dataFields.valueX = "migrantes";
      series.tooltipText = "{valueX.value}";
      series.columns.template.strokeOpacity = 0;
      series.columns.template.column.cornerRadiusBottomRight = 5;
      series.columns.template.column.cornerRadiusTopRight = 5;

      var labelBullet = series.bullets.push(new am4charts.LabelBullet());
      labelBullet.label.horizontalCenter = "left";
      labelBullet.label.dx = 10;
      labelBullet.label.text =
        "{values.valueX.workingValue.formatNumber('#')}";
      labelBullet.locationX = 1;

      // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set
      series.columns.template.adapter.add("fill", function (fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });

      categoryAxis.sortBySeries = series;
      chart.data = this.series_enfermedades;

      await chart.exporting.getImage("png").then((data) => {
        this.imagenBarra = data;
      });
    },

    async filtrar() {
      let data = {
        _token: this.csrf,
        _tipo: this.combo,
      };
      //alert(this.combo);
      if (this.combo == "") {
        await IndicadoresService.spa(data)
          .then((respuesta) => {
            this.poblacion = respuesta.data["poblacion"];
            this.grafica_barras();
            //console.log(this.serie);
          })
          .catch((err) => {
            console.log(err);
          });
      } else {
        await IndicadoresService.filtrospa(data)
          .then((respuesta) => {
            this.poblacion = respuesta.data["poblacion"];
            this.grafica_barras();
            //console.log(this.serie);
          })
          .catch((err) => {
            console.log(err);
          });
      }
    },
  },
};
</script>