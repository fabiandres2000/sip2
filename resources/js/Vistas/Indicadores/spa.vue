<template>
  <div style="margin-top: -4%;">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h3>Consumo de SPA (Sustancias Psicoactivas)</h3>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3 text-center">
                <h5>Número consumidores</h5>
                <vue-ellipse-progress
                  :progress="datos.porcentaje_consumidores"
                  :size="120"
                  :angle="-90"
                  :gap="10"
                  :legend="true"
                  :legendValue="180"
                  :thickness="5"
                  emptyThickness="5%"
                  dash="60 0.9"
                  color="#068204"
                  :noData="false"
                  :loading="false"
                  fontColor="white"
                  :half="false"
                  line-mode="out 2"
                >
                  <p
                    slot="legend-caption"
                    style="font-size: 14px; font-weight: bold;"
                  >{{datos.total_consumidores}}</p>
                </vue-ellipse-progress>
              </div>
              <div class="col-lg-3 text-center">
                <h5>Adolescentes consumidores</h5>
                <vue-ellipse-progress
                  :progress="Math.round(datos.adolescentes_consumidores)"
                  :size="120"
                  :angle="-90"
                  :gap="10"
                  :legend="true"
                  :thickness="5"
                  emptyThickness="5%"
                  dash="60 0.9"
                  color="#db2be3"
                  :noData="false"
                  :loading="false"
                  fontColor="white"
                  :half="false"
                  line-mode="out 2"
                >
                  <p
                    slot="legend-caption"
                    style="font-size: 14px; font-weight: bold;"
                  >{{Math.round(datos.adolescentes_consumidores)}}</p>
                </vue-ellipse-progress>
              </div>
              <div class="col-lg-3 text-center">
                <h5>Niños consumidores</h5>
                <vue-ellipse-progress
                  :progress="Math.round(datos.ninos_consumidores)"
                  :size="120"
                  :angle="-90"
                  :gap="10"
                  :legend="true"
                  :thickness="5"
                  emptyThickness="5%"
                  dash="60 0.9"
                  color="#0511ca"
                  :noData="false"
                  :loading="false"
                  fontColor="white"
                  :half="false"
                  line-mode="out 2"
                >
                  <p
                    slot="legend-caption"
                    style="font-size: 14px; font-weight: bold;"
                  >{{Math.round(datos.ninos_consumidores)}}</p>
                </vue-ellipse-progress>
              </div>
              <div class="col-lg-3 text-center">
                <h5>Gestantes consumidores</h5>
                <vue-ellipse-progress
                  :progress="Math.round(datos.gestantes_consumidores)"
                  :size="120"
                  :angle="-90"
                  :gap="10"
                  :legend="true"
                  :thickness="5"
                  emptyThickness="5%"
                  dash="60 0.9"
                  color="#891481"
                  :noData="false"
                  :loading="false"
                  fontColor="white"
                  :half="false"
                  line-mode="out 2"
                >
                  <p
                    slot="legend-caption"
                    style="font-size: 14px; font-weight: bold;"
                  >{{Math.round(datos.gestantes_consumidores)}}</p>
                </vue-ellipse-progress>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <br />
            <div class="row justify-center">
              <div class="col-lg-4 text-center">
                <h4>Población que consume SPA por grupo de edades</h4>
                <br />
                <div id="grafica1" style="width: 100%; height: 400px"></div>
              </div>
              <div class="col-lg-8 text-center">
                <h4>Población que consume SPA</h4>
                <br />
                <div class="row offset-2">
                  <div class="col-lg-8">
                    <select class="form-control" @change="filtrar" v-model="combo">
                      <option value>Todos</option>
                      <option value="spa">SPA</option>
                      <option value="fuma">Tabaco</option>
                      <option value="alcohol">Alcohol</option>
                    </select>
                  </div>
                </div>
                <div id="chartdiv" style="width: 100%; height: 380px"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
"use strict";
import * as am4core from "@amcharts/amcharts4/core";
import * as am4charts from "@amcharts/amcharts4/charts";
import am4themes_animated from "@amcharts/amcharts4/themes/animated";
import * as IndicadoresService from "../../Servicios/indicadores";
import VueApexCharts from "vue-apexcharts";
am4core.useTheme(am4themes_animated);
export default {
  mounted() {
    this.calcular();
  },
  data() {
    return {
      csrf: document
        .querySelector('meta[name="csrf-token"]')
        .getAttribute("content"),
      combo: "",
      datos: {
        total_consumidores: 0,
        porcentaje_consumidores: 0,
        adolescentes_consumidores: 0,
        ninos_consumidores: 0,
        gestantes_consumidores: 0,
        grupo_611_hombres: 0,
        grupo_611_mujeres: 0,
        grupo_1217_hombres: 0,
        grupo_1217_mujeres: 0,
        grupo_1828_hombres: 0,
        grupo_1828_mujeres: 0,
        grupo_2959_hombres: 0,
        grupo_2959_mujeres: 0,
        grupo_60m_hombres: 0,
        grupo_60m_mujeres: 0

        //gestantes_grupo_510: 0,
        //gestantes_grupo_1117: 0,
        //gestantes_grupo_1828: 0,
        //gestantes_grupo_2959: 0
      },
      poblacion: {
        grupo_611_hombrest: 0,
        grupo_611_mujerest: 0,
        grupo_1217_hombrest: 0,
        grupo_1217_mujerest: 0,
        grupo_1828_hombrest: 0,
        grupo_1828_mujerest: 0,
        grupo_2959_hombrest: 0,
        grupo_2959_mujerest: 0,
        grupo_60m_hombrest: 0,
        grupo_60m_mujerest: 0
      },
      serie: []
    };
  },
  methods: {
    async calcular() {
      let data = {
        _token: this.csrf
      };
      await IndicadoresService.spa(data)
        .then(respuesta => {
          this.datos = respuesta.data["cantidades"];
          console.log(this.datos);
          this.poblacion = respuesta.data["poblacion"];

          this.serie = [
            {
              age: "60+",
              male: Number(this.datos.grupo_611_hombres),
              female: Number(this.datos.grupo_611_mujeres)
            },
            {
              age: "29-59",
              male: Number(this.datos.grupo_2959_hombres),
              female: Number(this.datos.grupo_2959_mujeres)
            },
            {
              age: "18-28",
              male: Number(this.datos.grupo_1828_hombres),
              female: Number(this.datos.grupo_1828_mujeres)
            },
            {
              age: "12-17",
              male: Number(this.datos.grupo_1217_hombres),
              female: Number(this.datos.grupo_1217_mujeres)
            },
            {
              age: "6-11",
              male: Number(this.datos.grupo_611_hombres),
              female: Number(this.datos.grupo_611_mujeres)
            }
          ];
          this.grafica_stacked();
          this.grafica_barras();
          //console.log(this.serie);
        })
        .catch(err => {
          console.log(err);
        });
    },

    grafica_stacked() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      // Create chart instance
      var chart = am4core.create("grafica1", am4charts.XYChart);

      // Add data
      chart.data = this.serie;
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
      valueAxis.renderer.labels.template.adapter.add("text", function(text) {
        return text == "Male" || text == "Female" ? text : text + "%";
      });

      // Create series
      var male = chart.series.push(new am4charts.ColumnSeries());
      male.dataFields.valueX = "male";
      male.dataFields.categoryY = "age";
      male.clustered = false;

      var maleLabel = male.bullets.push(new am4charts.LabelBullet());
      maleLabel.label.text = "{valueX}%";
      maleLabel.label.hideOversized = false;
      maleLabel.label.truncate = false;
      maleLabel.label.horizontalCenter = "right";
      maleLabel.label.dx = -10;

      var female = chart.series.push(new am4charts.ColumnSeries());
      female.dataFields.valueX = "female";
      female.dataFields.categoryY = "age";
      female.clustered = false;

      var femaleLabel = female.bullets.push(new am4charts.LabelBullet());
      femaleLabel.label.text = "{valueX}%";
      femaleLabel.label.hideOversized = false;
      femaleLabel.label.truncate = false;
      femaleLabel.label.horizontalCenter = "left";
      femaleLabel.label.dx = 10;

      var maleRange = valueAxis.axisRanges.create();
      maleRange.value = -10;
      maleRange.endValue = 0;
      maleRange.label.text = "Hombres";
      maleRange.label.fill = chart.colors.list[0];
      maleRange.label.dy = 20;
      maleRange.label.fontWeight = "600";
      maleRange.grid.strokeOpacity = 1;
      maleRange.grid.stroke = male.stroke;

      var femaleRange = valueAxis.axisRanges.create();
      femaleRange.value = 0;
      femaleRange.endValue = 10;
      femaleRange.label.text = "Mujeres";
      femaleRange.label.fill = chart.colors.list[1];
      femaleRange.label.dy = 20;
      femaleRange.label.fontWeight = "600";
      femaleRange.grid.strokeOpacity = 1;
      femaleRange.grid.stroke = female.stroke;
    },

    grafica_barras() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end
      var chart = am4core.create("chartdiv", am4charts.XYChart);
      chart.paddingBottom = 50;

      chart.cursor = new am4charts.XYCursor();
      chart.scrollbarX = new am4core.Scrollbar();
      chart.colors.step = 2;

      chart.legend = new am4charts.Legend();
      chart.legend.position = "top";
      chart.legend.paddingBottom = 20;
      chart.legend.labels.template.maxWidth = 95;

      var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      xAxis.dataFields.category = "category";
      xAxis.renderer.cellStartLocation = 0.1;
      xAxis.renderer.cellEndLocation = 0.9;
      xAxis.renderer.grid.template.location = 0;

      var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
      yAxis.min = 0;

      function createSeries(value, name) {
        var series = chart.series.push(new am4charts.ColumnSeries());
        series.dataFields.valueY = value;
        series.dataFields.categoryX = "category";
        series.name = name;

        series.events.on("hidden", arrangeColumns);
        series.events.on("shown", arrangeColumns);

        var bullet = series.bullets.push(new am4charts.LabelBullet());
        bullet.interactionsEnabled = false;
        bullet.dy = 30;
        bullet.label.text = "{valueY}";
        bullet.label.fill = am4core.color("#ffffff");

        return series;
      }

      chart.data = [
        {
          category: "6-11",
          first: this.poblacion.grupo_611_hombrest,
          second: this.poblacion.grupo_611_mujerest
        },
        {
          category: "12-17",
          first: this.poblacion.grupo_1217_hombrest,
          second: this.poblacion.grupo_1217_mujerest
        },
        {
          category: "18-28",
          first: this.poblacion.grupo_1828_hombrest,
          second: this.poblacion.grupo_1828_mujerest
        },
        {
          category: "29-59",
          first: this.poblacion.grupo_2959_hombrest,
          second: this.poblacion.grupo_2959_mujerest
        },
        {
          category: "60+",
          first: this.poblacion.grupo_60m_hombrest,
          second: this.poblacion.grupo_60m_mujerest
        }
      ];

      createSeries("first", "Hombres");
      createSeries("second", "Mujeres");

      function arrangeColumns() {
        var series = chart.series.getIndex(0);

        var w =
          1 -
          xAxis.renderer.cellStartLocation -
          (1 - xAxis.renderer.cellEndLocation);
      }
    },

    async filtrar() {
      let data = {
          _token: this.csrf,
          _tipo: this.combo
        };
      //alert(this.combo);
      if (this.combo == "") {
        await IndicadoresService.spa(data)
        .then(respuesta => {
          this.poblacion = respuesta.data["poblacion"];
          this.grafica_barras();
          //console.log(this.serie);
        })
        .catch(err => {
          console.log(err);
        });
      } else {
        
        await IndicadoresService.filtrospa(data)
          .then(respuesta => {
            this.poblacion = respuesta.data["poblacion"];
            this.grafica_barras();
            //console.log(this.serie);
          })
          .catch(err => {
            console.log(err);
          });
      }
    }
  }
};
</script>