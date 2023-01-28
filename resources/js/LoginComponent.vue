<template>
  <div>
    <form class="kt-form">
      <div class="form-group">
        <input
          class="form-control"
          type="text"
          placeholder="Usuario ó Email"
          name="email"
          autocomplete="off"
          v-model="usuarioData.email"
        />
      </div>
      <div class="form-group">
        <input
          class="form-control"
          type="password"
          placeholder="Contraseña"
          name="password"
          v-model="usuarioData.password"
        />
      </div>
      <!--begin::Divider-->
      <div class="kt-login__divider">
        <div class="kt-divider">
          <span></span>
          <span>OR</span>
          <span></span>
        </div>
      </div>

      <!--end::Divider-->
      <!--begin::Action-->
      <div class="kt-login__actions">
        <a href="#" class="kt-link kt-login__link-forgot">¿Olvidó su contraseña?</a>
        <button class="btn btn-primary btn-elevate kt-btn" @click.prevent="IniciarSesion">
          <i class="fa fa-sign-in-alt"></i> Entrar
        </button>
      </div>

      <!--end::Action-->
    </form>
  </div>
</template>

<script>
  import * as usuarioServicios from "./Servicios/usuarios_servicios";
  export default {
    name: "login",
    data() {
      return {
        usuarioData: {
          email: "",
          password: ""
        },
        hayErrores: false,
        errores: {},
        csrf: document
          .querySelector('meta[name="csrf-token"]')
          .getAttribute("content")
      };
    },
    methods: {
      IniciarSesion: async function() {
        this.hayErrores = false;
        
        if (!this.validarCampos()) {
          this.$swal("Error...!", "Por favor complete los campos!", "error");
          return;
        }
        // let formData = new FormData();
        // formData.append("email", this.usuarioData.email);
        // formData.append("password", this.usuarioData.password);
        // formData.append("_token", this.csrf);
        const parametros = {
          email: this.usuarioData.email.trim(),
          password: this.usuarioData.password.trim(),
          _token: this.csrf
        };
        try {
          const resp = await usuarioServicios
            .loginUsuario(parametros)
            .then(respuesta => {
              if (respuesta.data.OPC) {
                window.location = "/administracion";
              } else {
                // this.hayErrores = true;
                // this.mensajeError = "Usuario ó Contraseña incorrecta";
              }
              console.info(respuesta.data);
            });
        } catch (error) {
          switch (error.response.status) {
            case 422:
              this.errores = error.response.data.errors;
              break;
            default:
              break;
          }
          // alert("hubo error");
        }
      },
      validarCampos() {
        if (
          this.usuarioData.email.trim() == "" ||
          this.usuarioData.password.trim() == ""
        ) {
          return false;
        }
        return true;
      }
    }
  };
</script>