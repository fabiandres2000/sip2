<template>
    <div>
        <div id="kt_header" class="kt-header kt-grid__item kt-header--fixed">
            <!-- begin:: Header Menu -->
            <button
                class="kt-header-menu-wrapper-close"
                id="kt_header_menu_mobile_close_btn"
            >
                <i class="la la-close"></i>
            </button>
            <div class="kt-header-menu-wrapper" id="kt_header_menu_wrapper">
                <div
                    id="kt_header_menu"
                    class="kt-header-menu kt-header-menu-mobile kt-header-menu--layout-default"
                >
                    <ul class="kt-menu__nav ">
                        <li
                            class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active"
                            data-ktmenu-submenu-toggle="click"
                            aria-haspopup="true"
                        >
                            <a
                                href="javascript:;"
                                class="kt-menu__link kt-menu__toggle"
                            >
                                <h4 class="text-danger">
                                    {{ ente }}
                                </h4>
                            </a>
                        </li>

                        <li
                            class="kt-menu__item  kt-menu__item--open kt-menu__item--here kt-menu__item--submenu kt-menu__item--rel kt-menu__item--open kt-menu__item--here kt-menu__item--active"
                            data-ktmenu-submenu-toggle="click"
                            aria-haspopup="true"
                            v-if="entesTotal > 0"
                        >
                            <a
                                href="javascript:;"
                                class="kt-menu__link kt-menu__toggle"
                                title="Cambiar Entidad"
                                @click="CambiarEnte"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                    width="24px"
                                    height="24px"
                                    viewBox="0 0 24 24"
                                    version="1.1"
                                    class="kt-svg-icon"
                                >
                                    <g
                                        stroke="none"
                                        stroke-width="1"
                                        fill="none"
                                        fill-rule="evenodd"
                                    >
                                        <rect
                                            id="bound"
                                            x="0"
                                            y="0"
                                            width="24"
                                            height="24"
                                        />
                                        <path
                                            d="M12.7442084,3.27882877 L19.2473374,6.9949025 C19.7146999,7.26196679 20.003129,7.75898194 20.003129,8.29726722 L20.003129,15.7027328 C20.003129,16.2410181 19.7146999,16.7380332 19.2473374,17.0050975 L12.7442084,20.7211712 C12.2830594,20.9846849 11.7169406,20.9846849 11.2557916,20.7211712 L4.75266256,17.0050975 C4.28530007,16.7380332 3.99687097,16.2410181 3.99687097,15.7027328 L3.99687097,8.29726722 C3.99687097,7.75898194 4.28530007,7.26196679 4.75266256,6.9949025 L11.2557916,3.27882877 C11.7169406,3.01531506 12.2830594,3.01531506 12.7442084,3.27882877 Z M12,14.5 C13.3807119,14.5 14.5,13.3807119 14.5,12 C14.5,10.6192881 13.3807119,9.5 12,9.5 C10.6192881,9.5 9.5,10.6192881 9.5,12 C9.5,13.3807119 10.6192881,14.5 12,14.5 Z"
                                            id="Combined-Shape"
                                            fill="#000000"
                                        />
                                    </g>
                                </svg>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- end:: Header Menu -->

            <!-- begin:: Header Topbar -->
            <div class="kt-header__topbar">
                <!--begin: Search -->

                <!--end: Search -->

                <!--begin: Notifications -->
                <div class="kt-header__topbar-item dropdown">
                    <div
                        class="kt-header__topbar-wrapper"
                        data-toggle="dropdown"
                        data-offset="30px,0px"
                        aria-expanded="true"
                    >
                        <span
                            class="kt-header__topbar-icon kt-pulse kt-pulse--brand"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                xmlns:xlink="http://www.w3.org/1999/xlink"
                                width="24px"
                                height="24px"
                                viewBox="0 0 24 24"
                                version="1.1"
                                class="kt-svg-icon"
                            >
                                <g
                                    stroke="none"
                                    stroke-width="1"
                                    fill="none"
                                    fill-rule="evenodd"
                                >
                                    <rect
                                        id="bound"
                                        x="0"
                                        y="0"
                                        width="24"
                                        height="24"
                                    />
                                    <path
                                        d="M2.56066017,10.6819805 L4.68198052,8.56066017 C5.26776695,7.97487373 6.21751442,7.97487373 6.80330086,8.56066017 L8.9246212,10.6819805 C9.51040764,11.267767 9.51040764,12.2175144 8.9246212,12.8033009 L6.80330086,14.9246212 C6.21751442,15.5104076 5.26776695,15.5104076 4.68198052,14.9246212 L2.56066017,12.8033009 C1.97487373,12.2175144 1.97487373,11.267767 2.56066017,10.6819805 Z M14.5606602,10.6819805 L16.6819805,8.56066017 C17.267767,7.97487373 18.2175144,7.97487373 18.8033009,8.56066017 L20.9246212,10.6819805 C21.5104076,11.267767 21.5104076,12.2175144 20.9246212,12.8033009 L18.8033009,14.9246212 C18.2175144,15.5104076 17.267767,15.5104076 16.6819805,14.9246212 L14.5606602,12.8033009 C13.9748737,12.2175144 13.9748737,11.267767 14.5606602,10.6819805 Z"
                                        id="Combined-Shape"
                                        fill="#000000"
                                        opacity="0.3"
                                    />
                                    <path
                                        d="M8.56066017,16.6819805 L10.6819805,14.5606602 C11.267767,13.9748737 12.2175144,13.9748737 12.8033009,14.5606602 L14.9246212,16.6819805 C15.5104076,17.267767 15.5104076,18.2175144 14.9246212,18.8033009 L12.8033009,20.9246212 C12.2175144,21.5104076 11.267767,21.5104076 10.6819805,20.9246212 L8.56066017,18.8033009 C7.97487373,18.2175144 7.97487373,17.267767 8.56066017,16.6819805 Z M8.56066017,4.68198052 L10.6819805,2.56066017 C11.267767,1.97487373 12.2175144,1.97487373 12.8033009,2.56066017 L14.9246212,4.68198052 C15.5104076,5.26776695 15.5104076,6.21751442 14.9246212,6.80330086 L12.8033009,8.9246212 C12.2175144,9.51040764 11.267767,9.51040764 10.6819805,8.9246212 L8.56066017,6.80330086 C7.97487373,6.21751442 7.97487373,5.26776695 8.56066017,4.68198052 Z"
                                        id="Combined-Shape"
                                        fill="#000000"
                                    />
                                </g>
                            </svg>
                            <span class="kt-pulse__ring"></span>
                        </span>
                    </div>
                    <div
                        class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-lg"
                    >
                        <form>
                            <!--begin: Head -->
                            <div
                                class="kt-head kt-head--skin-dark kt-head--fit-x kt-head--fit-b"
                                style="background-image: url('assets/media/misc/bg-1.jpg')"
                            >
                                <h3 class="kt-head__title">
                                    Notificaciones &nbsp;
                                    <span
                                        class="btn btn-success btn-sm btn-bold btn-font-md"
                                        >23 new</span
                                    >
                                </h3>
                                <ul
                                    class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success kt-notification-item-padding-x"
                                    role="tablist"
                                ></ul>
                            </div>

                            <!--end: Head -->
                            <div class="tab-content">
                                <div
                                    class="tab-pane active show"
                                    id="topbar_notifications_notifications"
                                    role="tabpanel"
                                >
                                    <div
                                        class="kt-notification kt-margin-t-10 kt-margin-b-10 kt-scroll"
                                        data-scroll="true"
                                        data-height="300"
                                        data-mobile-height="200"
                                    >
                                        <a
                                            href="#"
                                            class="kt-notification__item"
                                        >
                                            <div
                                                class="kt-notification__item-icon"
                                            >
                                                <i
                                                    class="flaticon2-line-chart kt-font-success"
                                                ></i>
                                            </div>
                                            <div
                                                class="kt-notification__item-details"
                                            >
                                                <div
                                                    class="kt-notification__item-title"
                                                >
                                                    New order has been received
                                                </div>
                                                <div
                                                    class="kt-notification__item-time"
                                                >
                                                    2 hrs ago
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!--end: Notifications -->

                <!--begin: User Bar -->
                <div
                    class="kt-header__topbar-item kt-header__topbar-item--user"
                >
                    <div
                        class="kt-header__topbar-wrapper"
                        data-toggle="dropdown"
                        data-offset="0px,0px"
                    >
                        <div class="kt-header__topbar-user">
                            <span
                                class="kt-header__topbar-welcome kt-hidden-mobile"
                                >Hola,</span
                            >
                            <span
                                class="kt-header__topbar-username kt-hidden-mobile"
                                >{{ nombreUsuario }}</span
                            >
                            <!-- <img class="kt-hidden" alt="Pic" src="{{ asset('assets/media/users/300_25.jpg') }}" /> -->

                            <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                            <!-- <span
                                class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold"
                                >{{ nombreUsuario.substring(0, 1) }}</span
                            > -->
                            <span
                                class="kt-badge kt-badge--username kt-badge--unified-success kt-badge--lg kt-badge--rounded kt-badge--bold"
                            >
                                <img
                                    v-if="imagen != null"
                                    alt="Logo"
                                    :src="
                                        `${$store.state.serverPath}assets/media/fotos/${imagen}`
                                    "
                                    width="70"
                                    style="margin-left:5px;"
                                />
                                <img
                                    v-else
                                    alt="Logo"
                                    :src="
                                        `${$store.state.serverPath}assets/media/default.png`
                                    "
                                    width="70"
                                    style="margin-left:5px;"
                                />
                            </span>
                        </div>
                    </div>
                    <div
                        class="dropdown-menu dropdown-menu-fit dropdown-menu-right dropdown-menu-anim dropdown-menu-top-unround dropdown-menu-xl"
                    >
                        <!--begin: Head -->
                        <div
                            class="kt-user-card kt-user-card--skin-dark kt-notification-item-padding-x"
                            style="background: linear-gradient(to right, #1D4A7E  , #305580  );"
                        >
                            <div class="kt-user-card__avatar">
                                <!-- <img class="kt-hidden" alt="Pic" :src="`${$store.state.serverPath}assets/media/users/300_25.jpg`" /> -->
                                <!--use below badge element instead the user avatar to display username's first letter(remove kt-hidden class to display it) -->
                                <!-- <span
                                    class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"
                                    >{{ nombreUsuario.substring(0, 1) }}</span
                                > -->
                                <span
                                    class="kt-badge kt-badge--lg kt-badge--rounded kt-badge--bold kt-font-success"
                                >
                                    <img
                                        v-if="imagen != null"
                                        alt="Logo"
                                        :src="
                                            `${$store.state.serverPath}assets/media/fotos/${imagen}`
                                        "
                                        width="70"
                                        style="margin-left:5px;"
                                    />
                                    <img
                                        v-else
                                        alt="Logo"
                                        :src="
                                            `${$store.state.serverPath}assets/media/default.png`
                                        "
                                        width="70"
                                        style="margin-left:5px;"
                                    />
                                </span>
                            </div>
                            <div class="kt-user-card__name">
                                {{ nombreUsuario }}
                            </div>
                        </div>

                        <!--end: Head -->

                        <!--begin: Navigation -->
                        <div
                            class="kt-notification"
                            style="background: linear-gradient(to right, #f9f9f9  , #c2cbcb  );"
                        >
                            <router-link to="/perfil" class="kt-notification__item">
                                <div class="kt-notification__item-icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px"
                                        height="24px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        class="kt-svg-icon"
                                    >
                                        <g
                                            stroke="none"
                                            stroke-width="1"
                                            fill="none"
                                            fill-rule="evenodd"
                                        >
                                            <polygon
                                                id="Shape"
                                                points="0 0 24 0 24 24 0 24"
                                            />
                                            <path
                                                d="M12,11 C9.790861,11 8,9.209139 8,7 C8,4.790861 9.790861,3 12,3 C14.209139,3 16,4.790861 16,7 C16,9.209139 14.209139,11 12,11 Z"
                                                id="Mask"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                                opacity="0.3"
                                            />
                                            <path
                                                d="M3.00065168,20.1992055 C3.38825852,15.4265159 7.26191235,13 11.9833413,13 C16.7712164,13 20.7048837,15.2931929 20.9979143,20.2 C21.0095879,20.3954741 20.9979143,21 20.2466999,21 C16.541124,21 11.0347247,21 3.72750223,21 C3.47671215,21 2.97953825,20.45918 3.00065168,20.1992055 Z"
                                                id="Mask-Copy"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                            />
                                        </g>
                                    </svg>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div
                                        class="kt-notification__item-title kt-font-bold"
                                        style="color: black;"
                                    >
                                        Mi Perfil
                                    </div>
                                    <div
                                        class="kt-notification__item-time"
                                        style="color: black;"
                                    >
                                        Configuar Cuenta
                                    </div>
                                </div>
                            </router-link>
                            <a
                                href="javascript:;"
                                @click="abrirModal"
                                class="kt-notification__item"
                            >
                                <div class="kt-notification__item-icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px"
                                        height="24px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        class="kt-svg-icon"
                                    >
                                        <g
                                            stroke="none"
                                            stroke-width="1"
                                            fill="none"
                                            fill-rule="evenodd"
                                        >
                                            <mask id="mask-2" fill="white">
                                                <use xlink:href="#path-1" />
                                            </mask>
                                            <g id="bound" />
                                            <path
                                                d="M7,10 L7,8 C7,5.23857625 9.23857625,3 12,3 C14.7614237,3 17,5.23857625 17,8 L17,10 L18,10 C19.1045695,10 20,10.8954305 20,12 L20,18 C20,19.1045695 19.1045695,20 18,20 L6,20 C4.8954305,20 4,19.1045695 4,18 L4,12 C4,10.8954305 4.8954305,10 6,10 L7,10 Z M12,5 C10.3431458,5 9,6.34314575 9,8 L9,10 L15,10 L15,8 C15,6.34314575 13.6568542,5 12,5 Z"
                                                id="Mask"
                                                fill="#000000"
                                            />
                                        </g>
                                    </svg>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div
                                        class="kt-notification__item-title kt-font-bold"
                                        style="color: black;"
                                    >
                                        Contraseña
                                    </div>
                                    <div
                                        class="kt-notification__item-time"
                                        style="color: black;"
                                    >
                                        Cambiar Contraseñas
                                    </div>
                                </div>
                            </a>
                            <a
                                href="javascript:;"
                                @click="salir"
                                class="kt-notification__item"
                            >
                                <div class="kt-notification__item-icon">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        xmlns:xlink="http://www.w3.org/1999/xlink"
                                        width="24px"
                                        height="24px"
                                        viewBox="0 0 24 24"
                                        version="1.1"
                                        class="kt-svg-icon"
                                    >
                                        <g
                                            stroke="none"
                                            stroke-width="1"
                                            fill="none"
                                            fill-rule="evenodd"
                                        >
                                            <rect
                                                id="bound"
                                                x="0"
                                                y="0"
                                                width="24"
                                                height="24"
                                            />
                                            <path
                                                d="M7.62302337,5.30262097 C8.08508802,5.000107 8.70490146,5.12944838 9.00741543,5.59151303 C9.3099294,6.05357769 9.18058801,6.67339112 8.71852336,6.97590509 C7.03468892,8.07831239 6,9.95030239 6,12 C6,15.3137085 8.6862915,18 12,18 C15.3137085,18 18,15.3137085 18,12 C18,9.99549229 17.0108275,8.15969002 15.3875704,7.04698597 C14.9320347,6.73472706 14.8158858,6.11230651 15.1281448,5.65677076 C15.4404037,5.20123501 16.0628242,5.08508618 16.51836,5.39734508 C18.6800181,6.87911023 20,9.32886071 20,12 C20,16.418278 16.418278,20 12,20 C7.581722,20 4,16.418278 4,12 C4,9.26852332 5.38056879,6.77075716 7.62302337,5.30262097 Z"
                                                id="Oval-25"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                            />
                                            <rect
                                                id="Rectangle"
                                                fill="#000000"
                                                opacity="0.3"
                                                x="11"
                                                y="3"
                                                width="2"
                                                height="10"
                                                rx="1"
                                            />
                                        </g>
                                    </svg>
                                </div>
                                <div class="kt-notification__item-details">
                                    <div
                                        class="kt-notification__item-title kt-font-bold"
                                        style="color: black;"
                                    >
                                        Salir
                                    </div>
                                </div>
                            </a>
                        </div>

                        <!--end: Navigation -->
                    </div>
                </div>

                <!--end: User Bar -->
            </div>
            <!-- end:: Header Topbar -->

            <!--begin::Modal-->
            <b-modal
                ref="modalCamCon"
                hide-footer
                title="Cambiar Contraseña"
                size="xs"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
            >
                <div class="d-block">
                    <div class="row">
                        <div class="col-lg-12">
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
                    <div class="row">
                        <div class="col-lg-12">
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

                    <form>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label"
                                >Contraseña Actual:</label
                            >
                            <div class="col-lg-6">
                                <input
                                    type="password"
                                    class="form-control text-capitalize"
                                    placeholder="Contraseña Actual"
                                    v-model="claves.actual"
                                    :class="
                                        claves.actual == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label"
                                >Nueva Contraseña:</label
                            >
                            <div class="col-lg-6">
                                <input
                                    type="password"
                                    class="form-control text-capitalize"
                                    placeholder="Nueva Contraseña"
                                    v-model="claves.nueva"
                                    :class="
                                        claves.nueva == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                />
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-lg-5 col-form-label"
                                >Confirmar Contraseña:</label
                            >
                            <div class="col-lg-6">
                                <input
                                    type="password"
                                    class="form-control text-capitalize"
                                    placeholder="Confirmar Contraseña"
                                    v-model="claves.confir"
                                    :class="
                                        claves.confir == ''
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                />
                            </div>
                        </div>
                        <hr />
                        <div class="text-right">
                            <button
                                type="button"
                                class="btn btn-success"
                                @click="guardar"
                            >
                                <i class="fa fa-edit"></i> Guardar
                            </button>
                            <button
                                type="button"
                                class="btn btn-warning"
                                @click="cerrarModal"
                            >
                                <i class="fa fa-window-close"></i> Cancelar
                            </button>
                        </div>
                    </form>
                </div>
            </b-modal>

            <b-modal
                ref="modalCamEnt"
                hide-footer
                title="Cambiar Entidad"
                size="md"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
            >
                <div class="d-block">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table class="table table-sm table-hover">
                                    <thead class>
                                        <tr class="kt-bg-fill-brand">
                                            <th>No.</th>
                                            <th>Nombre</th>
                                            <td class="text-center">
                                                Opciones
                                            </td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(item, index) in entes"
                                            :key="index"
                                        >
                                            <td
                                                style="font-weight: normal;vertical-align: middle;"
                                            >
                                                {{ index + 1 }}
                                            </td>
                                            <td
                                                style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                            >
                                                {{ item.nombre }}
                                            </td>
                                            <td
                                                style="text-align:center;vertical-align: middle;text-align: center;"
                                            >
                                                <button
                                                    type="button"
                                                    class="btn btn-outline-success btn-icon btn-sm"
                                                    title="Seleccionar"
                                                    @click="selecEnte(item)"
                                                >
                                                    <i
                                                        class="fa fa-arrow-right"
                                                    ></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div
                                    class="kt-separator kt-separator--border-dashed"
                                ></div>
                            </div>
                        </div>
                    </div>
                    <hr />
                    <div class="text-right">
                        <button
                            type="button"
                            class="btn btn-warning"
                            @click="cerrarModal"
                        >
                            <i class="fa fa-window-close"></i> Cancelar
                        </button>
                    </div>
                </div>
            </b-modal>
            <!--end::Modal-->
        </div>
    </div>
</template>
<script>
"use strict";
import * as usuarioServicios from "../Servicios/usuarios_servicios";
import * as entesServicios from "../Servicios/entes_servicios";
export default {
    mounted() {
        this.iniciar();
    },
    data() {
        return {
            errores: [],
            errorDevuelto: [],
            entrarPorError: false,
            nombreUsuario: "",
            rolUsuario: "",
            ente: "",
            imagen: "NADA",
            alias: "",
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
            claves: {
                actual: "",
                nueva: "",
                confir: ""
            },
            entes: [],
            entesTotal: 0
        };
    },
    methods: {
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
        iniciar: async function() {
            const parametros = {
                _token: this.csrf
            };
            try {
                await usuarioServicios
                    .iniciar(parametros)
                    .then(respuesta => {
                        this.nombreUsuario = respuesta.data.nombreUsuario;
                        this.rolUsuario = respuesta.data.rolUsuario;
                        this.ente = respuesta.data.ente;
                        this.entesTotal = respuesta.data.entesTotal;
                        this.imagen = respuesta.data.imagen;
                        this.alias = respuesta.data.alias;
                        // $.getJSON(
                        //     "http://www.geoplugin.net/json.gp?jsoncallback=?",
                        //     function(data) {
                        //         console.log(JSON.stringify(data, null, 2));
                        //     }
                        // );
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
        abrirModal() {
            this.claves.actual = "";
            this.claves.nueva = "";
            this.claves.confir = "";
            this.$refs.modalCamCon.show();
        },
        cerrarModal() {
            this.$refs.modalCamCon.hide();
            this.$refs.modalCamEnt.hide();
        },
        guardar: async function() {
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
            this.errores = [];
            const parametros = {
                _token: this.csrf,
                claves: this.claves
            };
            try {
                await usuarioServicios
                    .cambiarclave(parametros)
                    .then(respuesta => {
                        this.cerrarModal();
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
                        this.errorDevuelto = error.response.data.errors;
                        this.entrarPorError = true;
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

        CambiarEnte: async function() {
            const parametros = {
                _token: this.csrf
            };
            try {
                await entesServicios.mostrar(parametros).then(respuesta => {
                    if (respuesta.data.OPC === "SI") {
                        this.entes = respuesta.data.entes;
                        this.$refs.modalCamEnt.show();
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
        selecEnte: async function(item) {
            const parametros = {
                _token: this.csrf,
                ente: item
            };
            try {
                await entesServicios.seleccionar(parametros).then(respuesta => {
                    if (respuesta.data.OPC === "SI") {
                        this.iniciar();
                        this.$swal(
                            "Cambiar...!",
                            "Entidad Cambiada!",
                            "success"
                        );
                        this.$router.go(0);
                    } else {
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                    }
                    this.$refs.modalCamEnt.hide();
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
        }
    }
};
</script>

<style>
.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.5) !important;
}
.modal-title {
    color: #f8f9fa !important;
}
.close {
    display: none;
}
</style>
