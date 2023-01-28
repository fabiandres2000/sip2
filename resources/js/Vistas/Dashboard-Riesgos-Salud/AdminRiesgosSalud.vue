<template lang="">
    <div>
        <b-card no-body>
            <b-tabs card>
                <b-tab title="Población" active>
                    <PoblacionDashboard></PoblacionDashboard>
                </b-tab>
                <b-tab title="Hogares">
                    <HogaresDashboard></HogaresDashboard>
                </b-tab>
                <b-tab title="Enfermedades">
                    <enfermedadesDashboard></enfermedadesDashboard>
                </b-tab>
                <b-tab title="SPA">
                    <SpaDashboard></SpaDashboard>
                </b-tab>
                <b-tab title="Embarazo">
                    <EmbarazoDashboard></EmbarazoDashboard>
                </b-tab>
                <b-tab title="Inmunización">
                    <InmunizacionDashboard></InmunizacionDashboard>
                </b-tab>
            </b-tabs>
        </b-card>
    </div>
</template>
<script>

import PoblacionDashboard from "./PoblacionDashboard.vue"
import HogaresDashboard from "./HogaresDashboard.vue"
import enfermedadesDashboard from "./enfermedadesDashboard.vue"
import SpaDashboard from "./SpaDashboard.vue"
import EmbarazoDashboard from "./EmbarazoDashboard.vue"
import InmunizacionDashboard from "./InmunizacionDashboard.vue"

export default {
    components: {
        PoblacionDashboard,
        HogaresDashboard,
        enfermedadesDashboard,
        SpaDashboard,
        EmbarazoDashboard,
        InmunizacionDashboard
    },  
}
</script>