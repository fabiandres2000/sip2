<template>
    <div>
        <div class="kt-portlet" style="margin-top: -4%;">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <span class="kt-widget20__number kt-font-danger"
                            >PERFIL DEL USUARIO</span
                        >
                    </h3>
                </div>
            </div>
        </div>
        <div class="kt-portlet__body">
            <!--Begin::App-->
            <div class="kt-grid kt-grid--desktop kt-grid--ver kt-grid--ver-desktop kt-app">
                <!--Begin:: App Aside Mobile Toggle-->
                <button class="kt-app__aside-close" id="kt_user_profile_aside_close">
                    <i class="la la-close"></i>
                </button>
                <!--End:: App Aside Mobile Toggle-->

                <!--Begin:: App Aside-->
                <div class="kt-grid__item kt-app__toggle kt-app__aside" id="kt_user_profile_aside">
                    <!--begin:: Widgets/Applications/User/Profile1-->
                    <div class="kt-portlet ">
                        <div class="kt-portlet__head  kt-portlet__head--noborder">
                            <div class="kt-portlet__head-label">
                                <h3 class="kt-portlet__head-title">
                                </h3>
                            </div>
                            <div class="kt-portlet__head-toolbar">
                                <div class="dropdown-menu dropdown-menu-right dropdown-menu-fit dropdown-menu-md">
                                    <!--begin::Nav-->

                                    <!--end::Nav-->
                                </div>
                            </div>                         
                        </div>

                        <div class="kt-portlet__body kt-portlet__body--fit-y">
                            <!--begin::Widget -->
                            <div class="kt-widget kt-widget--user-profile-1">
                                <div class="kt-widget__head">
                                    <div class="kt-widget__media">
                                        <img :src="imagen" alt="image">
                                    </div>
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__section">
                                            <a href="#" class="kt-widget__username">
                                                {{usuariosData.nombre}}
                                                <i class="flaticon2-correct kt-font-success"></i>
                                            </a>
                                            <span class="kt-widget__subtitle">
                                                {{usuariosData.rol}}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="kt-widget__body">
                                    <div class="kt-widget__content">
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Email:</span>
                                            <a href="#" class="kt-widget__data">{{usuariosData.email}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Telefono:</span>
                                            <a href="#" class="kt-widget__data">{{usuariosData.celular}}</a>
                                        </div>
                                        <div class="kt-widget__info">
                                            <span class="kt-widget__label">Dirección:</span>
                                            <span class="kt-widget__data">{{usuariosData.direccion}}</span>
                                        </div>
                                    </div>
                                    <div class="kt-widget__items">
                                        <a href="javascript:;" class="kt-widget__item kt-widget__item--active" @click="cambiarTab(1)" id="enlaceIP">
                                            <span class="kt-widget__section">
                                                <span class="kt-widget__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <polygon id="Shape" points="0 0 24 0 24 24 0 24" />
                                                            <path d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z" id="Mask" fill="#000000" fill-rule="nonzero" opacity="0.3" />
                                                            <path d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z" id="Mask-Copy" fill="#000000" fill-rule="nonzero" />
                                                        </g>
                                                    </svg> </span>
                                                <span class="kt-widget__desc">
                                                    Información Personal
                                                </span>
                                            </span>
                                        </a>
                                        <a href="javascript:;" class="kt-widget__item " @click="cambiarTab(2)" id="enlaceCC">
                                            <span class="kt-widget__section">
                                                <span class="kt-widget__icon">
                                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                                            <rect id="bound" x="0" y="0" width="24" height="24" />
                                                            <path d="M4,4 L11.6314229,2.5691082 C11.8750185,2.52343403 12.1249815,2.52343403 12.3685771,2.5691082 L20,4 L20,13.2830094 C20,16.2173861 18.4883464,18.9447835 16,20.5 L12.5299989,22.6687507 C12.2057287,22.8714196 11.7942713,22.8714196 11.4700011,22.6687507 L8,20.5 C5.51165358,18.9447835 4,16.2173861 4,13.2830094 L4,4 Z" id="Path-50" fill="#000000" opacity="0.3" />
                                                            <path d="M12,11 C10.8954305,11 10,10.1045695 10,9 C10,7.8954305 10.8954305,7 12,7 C13.1045695,7 14,7.8954305 14,9 C14,10.1045695 13.1045695,11 12,11 Z" id="Mask" fill="#000000" opacity="0.3" />
                                                            <path d="M7.00036205,16.4995035 C7.21569918,13.5165724 9.36772908,12 11.9907452,12 C14.6506758,12 16.8360465,13.4332455 16.9988413,16.5 C17.0053266,16.6221713 16.9988413,17 16.5815,17 C14.5228466,17 11.463736,17 7.4041679,17 C7.26484009,17 6.98863236,16.6619875 7.00036205,16.4995035 Z" id="Mask-Copy" fill="#000000" opacity="0.3" />
                                                        </g>
                                                    </svg> </span>
                                                <span class="kt-widget__desc">
                                                    Cambiar Contraseña
                                                </span>
                                            </span>                                            
                                        </a>                                                                                
                                    </div>                                 
                                </div>                            
                            </div>
                            <!--end::Widget -->
                        </div>
                    </div>
                    <!--end:: Widgets/Applications/User/Profile1-->
                </div>
                <!--End:: App Aside-->

                <!--Begin:: App Content-->
                <div class="kt-grid__item kt-grid__item--fluid kt-app__content">
                    <div class="row" v-if="auxiliar">
                        <div class="col-xl-12">
                            <div class="kt-portlet">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">Información Personal <small>modifique su información personal</small></h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <div class="kt-portlet__head-wrapper">
                                          
                                        </div>
                                    </div>
                                </div>
                                <form class="kt-form kt-form--label-right">
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-7">
                                                        <transition :duration="1000" name="fade">
                                                            <div
                                                                class="alert alert-warning fade show"
                                                                role="alert"
                                                                v-if="errores.length"
                                                            >
                                                                <div class="alert-icon">
                                                                    <i class="flaticon-warning"></i>
                                                                </div>
                                                                <div class="alert-text">
                                                                    Por favor, corrija el(los) siguiente(s)
                                                                    error(es):
                                                                    <hr />
                                                                    <ul>
                                                                        <li
                                                                            v-for="(error,
                                                                            index) in errores"
                                                                            :key="index"
                                                                        >
                                                                            {{ error }}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="alert-close">
                                                                    <button
                                                                        type="button"
                                                                        class="close"
                                                                        data-dismiss="alert"
                                                                        aria-label="Close"
                                                                    >
                                                                        <span aria-hidden="true">
                                                                            <i class="la la-close"></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </transition>
                                                    </div>
                                                </div>
                                                <div class="row justify-content-center">
                                                    <div class="col-lg-7">
                                                        <transition :duration="1000" name="fade">
                                                            <div
                                                                class="alert alert-warning fade show"
                                                                role="alert"
                                                                v-if="entrarPorError"
                                                            >
                                                                <div class="alert-icon">
                                                                    <i class="flaticon-warning"></i>
                                                                </div>
                                                                <div class="alert-text">
                                                                    Por favor, corrija el(los) siguiente(s)
                                                                    error(es):
                                                                    <hr />
                                                                    <ul>
                                                                        <li
                                                                            v-for="(error,
                                                                            index) in errorDevuelto"
                                                                            :key="index"
                                                                        >
                                                                            {{ error }}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="alert-close">
                                                                    <button
                                                                        type="button"
                                                                        class="close"
                                                                        data-dismiss="alert"
                                                                        aria-label="Close"
                                                                    >
                                                                        <span aria-hidden="true">
                                                                            <i class="la la-close"></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </transition>
                                                    </div>
                                                </div>                                                                                      
                                                <div class="form-group row">
                                                    <!-- <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label> -->
                                                    <div class="col-lg-12 col-xl-12"  style="text-align: center;">
                                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle" id="kt_apps_user_add_avatar">
                                                            <div class="kt-avatar__holder" :style="imagen1"></div>
                                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                                <i class="fa fa-pen"></i>
                                                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" @change="obtenerImagen1">
                                                            </label>
                                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                                <i class="fa fa-times"></i>
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Identificación</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="text" v-model="usuariosData.identificacion" >
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Nombre</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="text" v-model="usuariosData.nombre">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Dirección</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="text" v-model="usuariosData.direccion">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Telefono</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-phone"></i></span></div>
                                                            <input type="text" class="form-control" v-model="usuariosData.celular" placeholder="Celular" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Email</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text"><i class="la la-at"></i></span></div>
                                                            <input type="text" class="form-control" v-model="usuariosData.email" placeholder="Email" aria-describedby="basic-addon1">
                                                        </div>
                                                    </div>
                                                </div>                                                
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Usuario</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input class="form-control" type="text" v-model="usuariosData.usuario">
                                                    </div>
                                                </div>                                                                                                                                                                                                                                            
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot">
                                        <div class="kt-form__actions">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-6 col-xl-6">
                                                </div>
                                                <div class="col-lg-6 col-xl-6">
                                                    <button type="button" class="btn btn-success" @click="guardarDatos">
                                                        <i class="fa fa-edit"></i>
                                                        Guardar
                                                    </button>
                                                </div>
                                            </div>
                                           
                                        </div>
                                    </div>                                    
                                </form>                              
                            </div>
                        </div> 
                    </div>
                    <div class="row" v-else>
                        <div class="col-xl-12">
                            <div class="kt-portlet">
                                <div class="kt-portlet__head">
                                    <div class="kt-portlet__head-label">
                                        <h3 class="kt-portlet__head-title">Cambiar Contraseña <small>cambie su contraseña de inicio de sesion</small></h3>
                                    </div>
                                    <div class="kt-portlet__head-toolbar">
                                        <div class="kt-portlet__head-wrapper">
                                          
                                        </div>
                                    </div>
                                </div>
                                <form class="kt-form kt-form--label-right">
                                    <div class="kt-portlet__body">
                                        <div class="kt-section kt-section--first">
                                            <div class="kt-section__body">
                                                <div class="row">
                                                    <div class="col-lg-12">
                                                        <transition :duration="1000" name="fade">
                                                            <div
                                                                class="alert alert-warning fade show"
                                                                role="alert"
                                                                v-if="entrarPorError1"
                                                            >
                                                                <div class="alert-icon">
                                                                    <i class="flaticon-warning"></i>
                                                                </div>
                                                                <div class="alert-text">
                                                                    Por favor, corrija el(los) siguiente(s)
                                                                    error(es):
                                                                    <hr />
                                                                    <ul>
                                                                        <li
                                                                            v-for="(error,
                                                                            index) in errorDevuelto1"
                                                                            :key="index"
                                                                        >
                                                                            {{ error }}
                                                                        </li>
                                                                    </ul>
                                                                </div>
                                                                <div class="alert-close">
                                                                    <button
                                                                        type="button"
                                                                        class="close"
                                                                        data-dismiss="alert"
                                                                        aria-label="Close"
                                                                    >
                                                                        <span aria-hidden="true">
                                                                            <i class="la la-close"></i>
                                                                        </span>
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </transition>
                                                    </div>
                                                </div>                                                       
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Contraseña Actual</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="password" v-model="claves.actual" class="form-control" value="" placeholder="Contraseña Actual">
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Nueva Contraseña</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="password" v-model="claves.nueva" class="form-control" value="" placeholder="Nueva Contraseña">
                                                    </div>
                                                </div>
                                                <div class="form-group form-group-last row">
                                                    <label class="col-xl-3 col-lg-3 col-form-label">Verificar Contraseña</label>
                                                    <div class="col-lg-9 col-xl-6">
                                                        <input type="password" v-model="claves.confir" class="form-control" value="" placeholder="Verificar Contraseña">
                                                    </div>
                                                </div>                                                                                                                                                                                                                                                                                     
                                            </div>
                                        </div>
                                    </div>
                                    <div class="kt-portlet__foot">
                                        <div class="kt-form__actions">
                                            <div class="row justify-content-center">
                                                <div class="col-lg-6 col-xl-6">
                                                </div>
                                                <div class="col-lg-6 col-xl-6">
                                                    <button type="button" class="btn btn-success" @click="guardarContrasena">
                                                        <i class="fa fa-edit"></i>
                                                        Guardar
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>                                                                     
                                </form>                              
                            </div>
                        </div>
                    </div>
                </div>
                <!--End:: App Content-->
            </div>
                <!--End::App-->
        </div>
    </div>
</template>
<script>
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import store from "../../store";

export default {
    mounted() {
        this.consultar();
    },
    name: "usuari",
    data() {
        return {
            errores: [],
            usuariosData: {
                id: 0,
                identificacion: "",
                nombre: "",
                email: "",
                password: "",
                confPassword: "",
                rol: "",
                usuario: "",
                estado: "",
                celular: "",
                direccion: "",
                id_compania: 0,
                imagen: null
            },
            errorDevuelto: [],
            entrarPorError: false,
            imagenMiniatura: null,     
            imagenMiniatura1: null,       
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            alias: "",
            auxiliar: true,
            errorDevuelto1: [],
            entrarPorError1: false,
            claves: {
                actual: "",
                nueva: "",
                confir: ""
            },                  
        };
    },
    computed:{
        imagen(){
            if(this.imagenMiniatura == null) {
                return `${store.state.serverPath}assets/media/default.png`;
            }else{
                return `${store.state.serverPath}assets/media/fotos/${this.usuariosData.imagen}`;
            }
        },
        imagen1(){
            return "background-image: url('" + this.imagenMiniatura1 + "')";
        },        
    },
    methods: {
        consultar: async function() {
            this.usuarios = [];
            const parametros = {
                _token: this.csrf
            };
            try {
                await usuarioServicios
                    .perfil(parametros)
                    .then(respuesta => {
                        this.errores = [];
                        this.entrarPorError = false;
                        this.usuariosData = respuesta.data.usuarios;
                        this.alias = respuesta.data.alias;
                        this.imagenMiniatura = this.usuariosData.imagen;
                        this.imagenMiniatura1 = this.usuariosData.imagen;
                        if(this.imagenMiniatura1 == null) {
                            this.imagenMiniatura1 = `${store.state.serverPath}assets/media/default.png`;
                        }else{
                            this.imagenMiniatura1 = `${store.state.serverPath}assets/media/fotos/${this.usuariosData.imagen}`;
                        }
                    });
            } catch (error) {
                switch (error.response.status) {
                    case 419:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },
        obtenerImagen1(e){
            let file = e.target.files[0];
            this.usuariosData.imagen = file;            
            this.cargarImagen1(file);
        },
        cargarImagen1: async function(file) {
            let reader = new FileReader();
            reader.onload = (e) =>{
                this.imagenMiniatura1 = e.target.result;
            }
            reader.readAsDataURL(file);

            let campos = new FormData();   
            campos.append("_token",this.csrf);
            campos.append("imagen",this.usuariosData.imagen);
            campos.append("id",this.usuariosData.id);              
            await usuarioServicios
                .usuariosEditarSubirImagen(campos)
                .then(respuesta => {
                    this.usuariosData.imagen = respuesta.data.ruta;
                })
                .catch(error => {
                    this.errorDevuelto = error.response.data.errors;
                    this.entrarPorError = true;
                });                   
        },
        cambiarTab(opcion){
            console.log(opcion)
            if(opcion == 1){
                this.auxiliar = true;
                $("#enlaceIP").addClass("kt-widget__item--active");
                $("#enlaceCC").removeClass("kt-widget__item--active");
            }else{
                $("#enlaceCC").addClass("kt-widget__item--active");
                $("#enlaceIP").removeClass("kt-widget__item--active");                
                this.auxiliar = false;
            }
        },
        guardarDatos: async function() {
            if (!this.checkForm()) {
                this.entrarPorError = false;
            } else {
                this.errores = [];
                   
                const parametros = {
                    _token: this.csrf,
                    id: this.usuariosData.id,
                    identificacion: this.usuariosData.identificacion,
                    nombre: this.usuariosData.nombre,
                    email: this.usuariosData.email,
                    celular: this.usuariosData.celular,
                    direccion: this.usuariosData.direccion,
                    usuario: this.usuariosData.usuario,
                    rol: this.usuariosData.rol,
                    ruta: this.usuariosData.imagen
                };
                try {
                    await usuarioServicios
                        .guardarPerfil(parametros)
                        .then(respuesta => {
                            
                            this.errorDevuelto = [];
                            this.entrarPorError = false;
                            this.$swal(
                                "Guardar...!",
                                "Datos Guardados Exitosamente!",
                                "success"
                            );
                            // this.$router.push("/perfil");
                            location.reload();
                        })
                        .catch(error => {
                            this.errorDevuelto = error.response.data.errors;
                            this.entrarPorError = true;
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
        },
        checkForm(e) {
            this.errores = [];
            
            if (!this.usuariosData.identificacion) {
                this.errores.push("La identificación es obligatoria.");
            }
            if (this.usuariosData.identificacion.length < 6) {
                this.errores.push(
                    "Por favor escriba una identificación mayor a 6 caracteres"
                );
            }
            if (!this.usuariosData.nombre) {
                this.errores.push("El nombre es obligatorio.");
            }
            if (this.usuariosData.nombre.length < 5) {
                this.errores.push(
                    "Por favor escriba un nombre mayor a 5 caracteres"
                );
            }
            if (!this.usuariosData.email) {
                this.errores.push("El correo electrónico es obligatorio.");
            } else if (!this.validEmail(this.usuariosData.email)) {
                this.errores.push("El correo electrónico debe ser válido.");
            }
            if (!this.usuariosData.celular) {
                this.errores.push("El celular es obligatorio.");
            }
            if (!this.usuariosData.usuario) {
                this.errores.push("El usuario es obligatorio.");
            }
            if (!this.errores.length) {
                return true;
            } else {
                return false;
            }
            e.preventDefault();
        },
        validEmail: function(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        guardarContrasena: async function() {
            if (this.claves.actual === "") {
                this.$swal(
                    "Error...!",
                    "La contraseña actual es obligatoria!",
                    "error"
                );
                return false;
            }
            if (this.claves.nueva === "") {
                this.$swal(
                    "Error...!",
                    "La nueva contraseña es obligatoria!",
                    "error"
                );
                return false;
            }
            if (this.claves.nueva.length < 5) {
                this.$swal(
                    "Error...!",
                    "Por favor escriba una Contraseña mayor a 5 caracteres!",
                    "error"
                );
                return false;
            }
            if (this.claves.confir === "") {
                this.$swal(
                    "Error...!",
                    "Confirmar la contraseña es obligatorio!",
                    "error"
                );
                return false;
            }
            if (this.claves.nueva != this.claves.confir) {
                this.$swal(
                    "Error...!",
                    "Las contraseñas no coinciden!",
                    "error"
                );
                return false;
            }
            // this.errores = [];
            const parametros = {
                _token: this.csrf,
                claves: this.claves
            };
            try {
                await usuarioServicios
                    .cambiarclave(parametros)
                    .then(respuesta => {
                        if (respuesta.data.OPC === "SI") {
                            this.$swal(
                                "Cambiar...!",
                                "Contraseña cambiada de manera exitosa!",
                                "success"
                            );
                            setTimeout(() => {
                                this.salir();
                            }, 3000);
                        } else {
                            this.$swal(
                                "Cambiar...!",
                                "Contraseña no cambiada!",
                                "warning"
                            );
                        }
                    })
                    .catch(error => {
                        this.errorDevuelto1 = error.response.data.errors;
                        this.entrarPorError1 = true;
                    });
            } catch (error) {
                switch (error.response.status) {
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },
        salir: async function() {
            const parametros = {
                _token: this.csrf
            };
            try {
                await usuarioServicios
                    .salir(parametros)
                    .then(respuesta => {
                        this.$swal(
                            "Cerrar...!",
                            "Sesion Cerrada de Manera Exitosa!",
                            "success"
                        );
                        setTimeout(() => {
                            // this.$router.go("/index");
                            window.location = "/index";
                            // window.location = "/SIP/public/index";
                        }, 2000);
                    })
                    .catch(error => {});
            } catch (error) {
                switch (error.response.status) {
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },                                   
    }    
};
</script>
  
