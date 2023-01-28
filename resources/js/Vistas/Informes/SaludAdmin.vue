<template lang="">
    <div id="divPadre1">
        <div id="divHijo1" style="width: 70%">
            <b-card no-body>
                <b-tabs card>
                    <b-tab title="Informe General de Salud " active>
                        <Salud></Salud>
                    </b-tab>
                    <b-tab title="Informe Riesgos de Salud">
                    <h4>Riesgos ...</h4>
                    </b-tab>
                </b-tabs>
            </b-card>
        </div>
    </div>
    
</template>
<script>

import Salud from "./salud.vue"

export default {
    components: {
        Salud,
    },  
}
</script>
<style>
    #divPadre1 {
        text-align:center;
        margin-top: -2%;
    }
    #divHijo1 {
        width:21cm;
        margin:0px auto;
    }
</style>