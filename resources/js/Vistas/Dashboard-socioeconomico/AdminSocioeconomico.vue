<template lang="">
    <div>
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Población" active>
                    <PoblacionDashboard></PoblacionDashboard>
                </b-tab>
                <b-tab title="Analfabetismo (Mayores de 15 años)">
                    <AnalfabetismoDesempleo></AnalfabetismoDesempleo>
                </b-tab>
                <b-tab title="Analfabetismo (menores de 15 años)">
                    <Analfabetismo2></Analfabetismo2>
                </b-tab>
                <b-tab title="Mercado Laboral ">
                    <MercadoLaboralDashboard></MercadoLaboralDashboard>
                </b-tab>
                <b-tab title="Desempleo">
                    <DesempleoDashboard></DesempleoDashboard>
                </b-tab>
                <b-tab title="Viviendas">
                    <ViviendaDashboard></ViviendaDashboard>
                </b-tab>
                <b-tab title="Hogares">
                    <HogaresDashboard></HogaresDashboard>
                </b-tab>
            </b-tabs>
        </b-card>
    </div>
</template>
<script>

import AnalfabetismoDesempleo from "./AnalfabetismoDesempleo.vue";
import Analfabetismo2 from "./Analfabtismo2.vue";
import DesempleoDashboard from "./DesempleoDashboard.vue";
import MercadoLaboralDashboard from "./MercadoLaboralDashboard.vue";
import PoblacionDashboard from "./PoblacionDashboard.vue";
import ViviendaDashboard from "./ViviendaDashboard.vue";
import HogaresDashboard from "./HogaresDashboard.vue";

export default {
    components: {
        AnalfabetismoDesempleo,
        Analfabetismo2,
        DesempleoDashboard,
        MercadoLaboralDashboard,
        PoblacionDashboard,
        ViviendaDashboard,
        HogaresDashboard
    },  
}
</script>