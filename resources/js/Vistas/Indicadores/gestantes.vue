<template>
  <div style="margin-top: -4%;">
    <div class="row">
      <div class="col-lg-12">
        <div class="card">
          <div class="card-body">
            <h3>Gestantes</h3>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
            <div class="row">
              <div class="col-lg-3 text-center">
                <h5>Número gestanes</h5>
                <vue-ellipse-progress
                  :progress="datos.porcentaje_embarazadas"
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
                  >{{datos.nro_gestantes}}</p>
                </vue-ellipse-progress>
              </div>
              <div class="col-lg-3 text-center">
                <h5>Adolescentes gestantes</h5>
                <vue-ellipse-progress
                  :progress="Math.round(datos.nro_adolescentes_embarazadas)"
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
                  >{{Math.round(datos.nro_adolescentes_embarazadas)}}</p>
                </vue-ellipse-progress>
              </div>
              <div class="col-lg-3 text-center">
                <h5>Atención prenatal</h5>
                <vue-ellipse-progress
                  :progress="Math.round(datos.porcentaje_atencion_prenatal)"
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
                  >{{Math.round(datos.porcentaje_atencion_prenatal)}}%</p>
                </vue-ellipse-progress>
              </div>
              <div class="col-lg-3 text-center">
                <h5>Sin atención prenatal</h5>
                <vue-ellipse-progress
                  :progress="Math.round(100-datos.porcentaje_atencion_prenatal)"
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
                  >{{Math.round(100-datos.porcentaje_atencion_prenatal)}}%</p>
                </vue-ellipse-progress>
              </div>
            </div>
          </div>
        </div>
        <div class="card">
          <div class="card-body">
          <br>
            <div class="row justify-center">
              <div class="col-lg-6 text-center">
              <h4>Números de gestantes</h4>
                <br />
                <div id="chartbarra" style="width: 100%; height: 400px"></div>
              </div>
              <div class="col-lg-6 text-center">
                <h4>Porcentaje de gestantes sin atención prenatal</h4>
                <br />
                <div id="chartdiv" style="width: 100%; height: 400px"></div>
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
      datos: {
        nro_mujeres_embarazadas: 0,
        porcentaje_embarazadas: 0,
        nro_adolescentes_embarazadas: 0,
        nro_adolescentes_desescolarizadas: 0,
        nro_adolescentes_lactantes: 0,
        embarazos_vih: 0,
        porcentaje_atencion_prenatal: 0,
        razon_gestantes_sin_atencion_prental: 0,
        nro_gestantes: 0,
        grupo_510: 0,
        grupo_1117: 0,
        grupo_1828: 0,
        grupo_2959: 0,
        gestantes_grupo_510: 0,
        gestantes_grupo_1117: 0,
        gestantes_grupo_1828: 0,
        gestantes_grupo_2959: 0
      },
      series: [],
      series_barra: []
    };
  },
  methods: {
    async calcular() {
      let data = {
        _token: this.csrf
      };
      await IndicadoresService.gestantes(data)
        .then(respuesta => {
          this.datos = respuesta.data["cantidades"];

          this.series.push({
            edad: "6-11",
            gestantes: this.datos.grupo_510
          });
          this.series.push({
            edad: "12-17",
            gestantes: this.datos.grupo_1117
          });
          this.series.push({
            edad: "18-28",
            gestantes: this.datos.grupo_1828
          });
          this.series.push({
            edad: "29-59",
            gestantes: this.datos.grupo_2959
          });

          this.series_barra.push({
            edad: "6-11",
            gestantes: this.datos.gestantes_grupo_510
          });
          this.series_barra.push({
            edad: "12-17",
            gestantes: this.datos.gestantes_grupo_1117
          });
          this.series_barra.push({
            edad: "18-28",
            gestantes: this.datos.gestantes_grupo_1828
          });
          this.series_barra.push({
            edad: "29-59",
            gestantes: this.datos.gestantes_grupo_2959
          });

          this.grafica_de_pie();
          this.grafica_barra();
        })
        .catch(err => {
          console.log(err);
        });
    },
    grafica_de_pie() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      var chart = am4core.create("chartdiv", am4charts.PieChart3D);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.legend = new am4charts.Legend();

      chart.data = this.series;

      var series = chart.series.push(new am4charts.PieSeries3D());
      series.dataFields.value = "gestantes";
      series.dataFields.category = "edad";
    },
    grafica_barra() {
      // Themes begin
      am4core.useTheme(am4themes_animated);
      // Themes end

      // Create chart instance
      var chart = am4core.create("chartbarra", am4charts.XYChart3D);

      // Add data
      chart.data = this.series_barra;

      // Create axes
      let categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
      categoryAxis.dataFields.category = "edad";
      categoryAxis.renderer.labels.template.rotation = 270;
      categoryAxis.renderer.labels.template.hideOversized = false;
      categoryAxis.renderer.minGridDistance = 20;
      categoryAxis.renderer.labels.template.horizontalCenter = "right";
      categoryAxis.renderer.labels.template.verticalCenter = "middle";
      categoryAxis.tooltip.label.rotation = 270;
      categoryAxis.tooltip.label.horizontalCenter = "right";
      categoryAxis.tooltip.label.verticalCenter = "middle";

      let valueAxis = chart.yAxes.push(new am4charts.ValueAxis());
      valueAxis.title.text = "Gestantes";
      valueAxis.title.fontWeight = "bold";

      // Create series
      var series = chart.series.push(new am4charts.ColumnSeries3D());
      series.dataFields.valueY = "gestantes";
      series.dataFields.categoryX = "edad";
      series.name = "Gestantes";
      series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
      series.columns.template.fillOpacity = 0.8;

      var columnTemplate = series.columns.template;
      columnTemplate.strokeWidth = 2;
      columnTemplate.strokeOpacity = 1;
      columnTemplate.stroke = am4core.color("#FFFFFF");

      columnTemplate.adapter.add("fill", function(fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });

      columnTemplate.adapter.add("stroke", function(stroke, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });

      chart.cursor = new am4charts.XYCursor();
      chart.cursor.lineX.strokeOpacity = 0;
      chart.cursor.lineY.strokeOpacity = 0;
    }
  }
};
</script>
<style>
.redondo {
  border-radius: 25px;
}

.deabjohaciaarriba {
  writing-mode: vertical-rl;
  text-orientation: use-glyph-orientation;
  transform: rotate(0.5turn);
}

.borderbottomright {
  border-top-left-radius: 20px;
  border-bottom-left-radius: 20px;
  border-bottom-right-radius: 20px;
}
</style>