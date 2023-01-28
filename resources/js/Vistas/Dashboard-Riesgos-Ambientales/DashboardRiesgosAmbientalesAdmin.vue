<template lang="">
    <div>
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Riesgos Ambientales por Hogar" active>
                    <DashboardRiesgosAmbientales></DashboardRiesgosAmbientales>
                </b-tab>
                <b-tab title="Riesgos Ambientales por Vivienda">
                    <DashboardRiesgosAmbientalesVivienda></DashboardRiesgosAmbientalesVivienda>
                </b-tab>
                <b-tab title="Riesgos Ambientales- General">
                    <DashboardRiesgosAmbientalesGeneral></DashboardRiesgosAmbientalesGeneral>
                </b-tab>
            </b-tabs>
        </b-card>
    </div>
</template>
<script>
import DashboardRiesgosAmbientales from "./DashboardRiesgosAmbientales.vue";
import DashboardRiesgosAmbientalesVivienda from "./DashboardRiesgosAmbientalesVivienda.vue";
import DashboardRiesgosAmbientalesGeneral from "./DashboardRiesgosAmbientalesGeneral.vue";

export default {
    components: {
        DashboardRiesgosAmbientales,
        DashboardRiesgosAmbientalesVivienda,
        DashboardRiesgosAmbientalesGeneral
    },  
}
</script>