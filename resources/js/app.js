window.Vue = require('vue');
// import 'bootstrap/dist/css/bootstrap.css';
// import 'bootstrap';
import App from './App.vue';
import router from './router';
import store from './store.js';
import BootstrapVue from 'bootstrap-vue';
import VueSweetalert2 from 'vue-sweetalert2';
import Vuelidate from 'vuelidate';
import VueEllipseProgress from 'vue-ellipse-progress';
import VueApexCharts from 'vue-apexcharts';
//import * as VueGoogleMaps from 'vue2-google-maps'
import VueGoogleHeatmap from 'vue-google-heatmap';
import VueHtml2Canvas from 'vue-html2canvas';
import VueExcelXlsx from "vue-excel-xlsx";
 


// import FlashMessage from '@smartweb/vue-flash-message';
Vue.use(BootstrapVue);
Vue.use(VueSweetalert2);
Vue.use(Vuelidate);
Vue.use(VueEllipseProgress);
Vue.use(VueApexCharts);
Vue.component('apexchart', VueApexCharts);
Vue.use(VueHtml2Canvas);

Vue.use(VueGoogleHeatmap, {
  apiKey: 'AIzaSyCZ_FNKVfd7vx76ykD4XbVjATqK5sVp8AQ'
});

Vue.use(VueExcelXlsx);

// Vue.filter('moneda', {
//     // model -> view
//     // formats the value when updating the input element.
//     read: function (val) {
//         return '$' + val.toFixed(2)
//     },
//     // view -> model
//     // formats the value when updating the data.
//     write: function (val, oldVal) {
//         var number = +val.replace(/[^\d.]/g, '')
//         return isNaN(number) ? 0 : number
//     }
// });
// Vue.use(Datepicker);
// Vue.use(FlashMessage);
const app = new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});
