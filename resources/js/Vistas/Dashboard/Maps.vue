<template>
    <div>
        <div>
            <h3>Densidad de la población</h3>
        </div>
        <br />
        <div class="col-sm-12" v-if="points.length">
            <vue-google-heatmap
                :points="points"
                style="width: 100%;"
                :height="350"
                map-type="roadmap"
                :initial-zoom="13.2"
                :lat="latitud"
                :lng="longitud"
            />
        </div>
    </div>
</template>

<script>
import * as DashboardService from "../../Servicios/dashboard";

export default {
    name: "GoogleMap",
    data() {
        return {
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            center: { lat: 0, lng: 0 },
            latitud: 0.0,
            longitud: 0.0,
            points: []
        };
    },
    mounted() {},
    created() {
        this.coordenadas();
        this.densidadPoblacion();
    },
    beforeMount() {},
    methods: {
        async coordenadas() {
            let data = {
                _token: this.csrf
            };

            await DashboardService.coordenadas(data)
                .then(respuesta => {
                    this.latitud = Number(respuesta.data["latitud"]);
                    this.longitud = Number(respuesta.data["longitud"]);
                    this.center.lat = this.latitud;
                    this.center.lng = this.longitud;
                })
                .catch(err => {
                    console.log(err);
                });
        },
        async densidadPoblacion() {
            this.points.splice(0);
            await DashboardService.consultarPuntosPoblacion().then(respuesta => {
                var data = respuesta.data.puntos;
                data.forEach(element => {
                    this.points.push({ lat: element.lat, lng: element.lng });
                });
            })
            .catch(err => {
                console.log(err);
            });
        }   
    }
};
</script>
