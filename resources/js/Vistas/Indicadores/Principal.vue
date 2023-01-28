<template>
  <div>
    <b>Número de mujeres con embarazo multiples:</b> {{datos.nro_mujeres_embarazadas}}
    <br>
    <b>Número de adolescentes en embarazo:</b> {{datos.nro_adolescentes_embarazadas}}
    <br>
    <b>Número de adolescentes desescolarizadas en embarazo:</b> {{datos.nro_adolescentes_desescolarizadas}}
    <br>
    <b>Numero de lactantes:</b> {{datos.nro_adolescentes_lactantes}}
    <br>
    <b>Número de mujeres en embarazo con VIH:</b> {{datos.embarazos_vih}}
    <br>
    <b>NIÑOS EN HOGARES CON VIOLENCIA INTRAFAMILIAR:</b> {{datos.ninos_violencia}}
    <br>
    <b>ADOLESCENTES EN HOGARES CON VIOLENCIA INTRAFAMILIAR:</b> {{datos.adolescentes_violencia}}
    <br>
    <b>Número de la población no afiliada a SGSSS:</b> {{datos.poblacion_sin_eps}}
    <br>

    <h4>INDICADORES DE SALUD</h4>
    <br>
    <b>Porcentaje de atención prenatal: {{datos.porcentaje_atencion_prenatal}}</b>
    <br>
    <b>Porcentaje de mujeres embarazadas sn atención prental: {{datos.porcentaje_sin_atencion_prenatal}}</b>
    <br>
    <b>Razón de gestantes sin atención prenatal: {{datos.razon_gestantes_sin_atencion_prental}}</b>
    
  </div>
  
</template>
<script>
"use strict";
import * as IndicadoresService from "../../Servicios/indicadores";
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
            nro_adolescentes_embarazadas: 0,
            nro_adolescentes_desescolarizadas: 0,
            nro_adolescentes_lactantes: 0,
            embarazos_vih: 0,
            adolescentes_violencia: 0,
            ninos_violencia: 0,
            poblacion_sin_eps: 0,
            porcentaje_atencion_prenatal:0,
            porcentaje_sin_atencion_prenatal:0,
            razon_gestantes_sin_atencion_prental:0
       } 
    };
  },
  methods: {
    async calcular() {
      let data = {
        _token: this.csrf
      };
      await IndicadoresService.listar(data)
        .then(respuesta => {
            this.datos = respuesta.data["cantidades"]
        })
        .catch(err => {
          console.log(err);
        });
    }
  }
};
</script>