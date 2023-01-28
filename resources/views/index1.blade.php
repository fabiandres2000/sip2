<!DOCTYPE html>
<html lang="en">

<!-- begin::Head -->

<head>

    <!--begin::Base Path (base relative path for assets of this page) -->
    <base href="../../../../">

    <!--end::Base Path -->
    <meta charset="utf-8" />
    <title>SIP | Iniciar Sesion</title>
    <meta name="description" content="SIP">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--begin::Fonts -->
    <script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
    <script>
        WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
    </script>

    <!--end::Fonts -->

    <!--begin::Page Custom Styles(used by this page) -->
    <link href="{{ asset('assets/css/demo1/pages/general/login/login-1.css') }}" rel="stylesheet" type="text/css" />
    @include('Plantilla.Head')

</head>

<!-- end::Head -->

<!-- begin::Body -->

<body
    class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--fixed kt-subheader--enabled kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

    <!-- begin:: Page -->
    <div class="kt-grid kt-grid--ver kt-grid--root">
        <div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v1" id="kt_login">
            <div
                class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--desktop kt-grid--ver-desktop kt-grid--hor-tablet-and-mobile">

                <!--begin::Aside-->
                <div class="kt-grid__item kt-grid__item--order-tablet-and-mobile-2 kt-grid kt-grid--hor kt-login__aside"
                    style="background-image: url({{ asset('assets/media//bg/1.png')}});">
                    <div class="kt-grid__item">
                        <a href="#" class="kt-login__logo">
                            {{-- <img src="{{ asset('assets/media/logos/logo-4.png')}}"> --}}
                        </a>
                    </div>
                    <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver">
                        <div class="kt-grid__item kt-grid__item--middle">
                            {{-- <h3 class="kt-login__title">SISTEMA INTEGRAL POBLACIONAL</h3>
                            <h4 class="kt-login__subtitle bold">Herramienta para la caracterización poblacional, gestión
                                y apoyo de las politicas de atención integral en salud.</h4> --}}
                        </div>
                    </div>
                    <div class="kt-grid__item">
                        <div class="kt-login__info">
                            {{-- <div class="kt-login__copyright">
                                &copy;<script>
                                    document.write(new Date().getFullYear());
                                </script><a href="#"> &nbsp;LeearIngenieria&nbsp;</a> Todos los derechos reservados.
                            </div> --}}
                            {{-- <div class="kt-login__menu">
                                <a href="#" class="kt-link">Privacy</a>
                                <a href="#" class="kt-link">Legal</a>
                                <a href="#" class="kt-link">Contact</a>
                            </div> --}}
                        </div>
                    </div>
                </div>

                <!--begin::Aside-->

                <!--begin::Content-->
                <div
                    class="kt-grid__item kt-grid__item--fluid  kt-grid__item--order-tablet-and-mobile-2  kt-login__wrapper"
                    
                    >

                    <!--begin::Head-->
                    <div class="kt-login__head">
                        {{-- <span class="kt-login__signup-label">Don't have an account yet?</span>&nbsp;&nbsp;
                        <a href="#" class="kt-link kt-login__signup-link">Sign Up!</a> --}}
                    </div>

                    <!--end::Head-->

                    <!--begin::Body-->
                    <div class="kt-login__body">
                        <!--begin::Signin-->
                        <div class="kt-login__form">
                            <div class="kt-login__title">
                                <h3>Iniciar Sesión</h3>
                            </div>
                            <div id="app_login">
                                <form class="kt-form">
                                    <div class="form-group">
                                        <input class="form-control" type="text" placeholder="Usuario ó Email"
                                            name="email" autocomplete="off" v-model="usuarioData.email" />
                                    </div>
                                    <div class="form-group">
                                        <input class="form-control" type="password" placeholder="Contraseña"
                                            name="password" v-model="usuarioData.password" />
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
                                        <button class="btn btn-primary btn-elevate kt-btn"
                                            @click.prevent="IniciarSesion">
                                            <i class="fa fa-sign-in-alt"></i> Entrar
                                        </button>
                                    </div>

                                    <!--end::Action-->
                                </form>
                            </div>
                        </div>

                        <!--end::Signin-->
                    </div>

                    <!--end::Body-->
                </div>

                <!--end::Content-->
            </div>
        </div>
    </div>

    <!-- end:: Page -->

    <script src="{{asset('js/app.js')}}"></script>
    @include('Plantilla.Footer')
</body>

<!-- end::Body -->

</html>