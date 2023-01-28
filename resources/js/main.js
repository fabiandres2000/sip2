import VueSweetalert2 from 'vue-sweetalert2';
import Axios from 'axios';
import * as usuarioServicios from "./Servicios/usuarios_servicios";
import {http} from "./Servicios/http_services";

new Vue({
    el: "#app_login",
    mounted() { // console.log(this.ip);
    },
    data: {
        usuarioData: {
            email: "",
            password: ""
        },
        hayErrores: false,
        errores: {},
        csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
        ip: "0.0.0.0"
    },
    methods: {
        IniciarSesion: async function () {
            this.buscarIP();
            this.hayErrores = false;
            if (!this.validarCampos()) {
                this.$swal("Error...!", "Por favor complete los campos!", "error");
                return;
            }
            // let ip = "0.0.0.0";
            // $.getJSON("https://api.ipify.org?format=json", function (data) {
            //     ip = data.ip;
            // });
            // http().get('https://api.ipify.org?format=json').then(respuesta => {
            //     ip = respuesta.data.ip;
            //     console.log(ip);
            // });
            // this.ip = this.getIpClient();
            const parametros = {
                email: this.usuarioData.email.trim(),
                password: this.usuarioData.password.trim(),
                _token: this.csrf,
                ip: this.ip
            };
            try {
                const resp = await usuarioServicios.loginUsuario(parametros).then(respuesta => {
                    if (respuesta.data.OPC) {
                        window.location = "/";
                        // window.location = "/SIP/public/";
                    } else {
                        this.$swal("Error...!", respuesta.data.MENSAJE, "error");
                    }
                });
            } catch (error) {
                switch (error.response.status) {
                    case 422:
                        this.errores = error.response.data.errors;
                        break;
                    default:
                        break;
                }
            }
        },
        validarCampos() {
            if (this.usuarioData.email.trim() == "" || this.usuarioData.password.trim() == "") {
                return false;
            }
            return true;
        },
        getIpClient: async function () {
            try {
                const resp = await usuarioServicios.consIp().then(respuesta => {
                    this.ip = respuesta.data.ip;
                    // console.log(respuesta.data.ip);
                    return respuesta.data.ip;
                });
            } catch (error) {
                console.error(error);
            }
        },
        buscarIP() {
            this.getIpClient();
        }
    }
});
