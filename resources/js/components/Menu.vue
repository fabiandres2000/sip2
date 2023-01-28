<template>
    <div>
        <div
            class="kt-aside kt-aside--fixed kt-grid__item kt-grid kt-grid--desktop kt-grid--hor-desktop"
            id="kt_aside"
        >
            <!-- begin:: Aside -->
            <div class="kt-aside__brand kt-grid__item" id="kt_aside_brand">
                <div class="kt-aside__brand-logo">
                    <a href="javascript:;">
                        <img
                            alt="Logo"
                            :src="
                                `${$store.state.serverPath}assets/media/logos/logoSip8.png`
                            "
                            width="180"
                            style="margin-left:5px;"
                        />
                    </a>
                </div>
                <div class="kt-aside__brand-tools">
                    <button
                        class="kt-aside__brand-aside-toggler"
                        id="kt_aside_toggler"
                    >
                        <span>
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
                                        d="M5.29288961,6.70710318 C4.90236532,6.31657888 4.90236532,5.68341391 5.29288961,5.29288961 C5.68341391,4.90236532 6.31657888,4.90236532 6.70710318,5.29288961 L12.7071032,11.2928896 C13.0856821,11.6714686 13.0989277,12.281055 12.7371505,12.675721 L7.23715054,18.675721 C6.86395813,19.08284 6.23139076,19.1103429 5.82427177,18.7371505 C5.41715278,18.3639581 5.38964985,17.7313908 5.76284226,17.3242718 L10.6158586,12.0300721 L5.29288961,6.70710318 Z"
                                        id="Path-94"
                                        fill="#000000"
                                        fill-rule="nonzero"
                                        transform="translate(8.999997, 11.999999) scale(-1, 1) translate(-8.999997, -11.999999) "
                                    />
                                    <path
                                        d="M10.7071009,15.7071068 C10.3165766,16.0976311 9.68341162,16.0976311 9.29288733,15.7071068 C8.90236304,15.3165825 8.90236304,14.6834175 9.29288733,14.2928932 L15.2928873,8.29289322 C15.6714663,7.91431428 16.2810527,7.90106866 16.6757187,8.26284586 L22.6757187,13.7628459 C23.0828377,14.1360383 23.1103407,14.7686056 22.7371482,15.1757246 C22.3639558,15.5828436 21.7313885,15.6103465 21.3242695,15.2371541 L16.0300699,10.3841378 L10.7071009,15.7071068 Z"
                                        id="Path-94"
                                        fill="#000000"
                                        fill-rule="nonzero"
                                        opacity="0.3"
                                        transform="translate(15.999997, 11.999999) scale(-1, 1) rotate(-270.000000) translate(-15.999997, -11.999999) "
                                    />
                                </g>
                            </svg>
                        </span>
                        <span>
                            <!-- <svg
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
                                        d="M12.2928955,6.70710318 C11.9023712,6.31657888 11.9023712,5.68341391 12.2928955,5.29288961 C12.6834198,4.90236532 13.3165848,4.90236532 13.7071091,5.29288961 L19.7071091,11.2928896 C20.085688,11.6714686 20.0989336,12.281055 19.7371564,12.675721 L14.2371564,18.675721 C13.863964,19.08284 13.2313966,19.1103429 12.8242777,18.7371505 C12.4171587,18.3639581 12.3896557,17.7313908 12.7628481,17.3242718 L17.6158645,12.0300721 L12.2928955,6.70710318 Z"
                                        id="Path-94"
                                        fill="#000000"
                                        fill-rule="nonzero"
                                    />
                                    <path
                                        d="M3.70710678,15.7071068 C3.31658249,16.0976311 2.68341751,16.0976311 2.29289322,15.7071068 C1.90236893,15.3165825 1.90236893,14.6834175 2.29289322,14.2928932 L8.29289322,8.29289322 C8.67147216,7.91431428 9.28105859,7.90106866 9.67572463,8.26284586 L15.6757246,13.7628459 C16.0828436,14.1360383 16.1103465,14.7686056 15.7371541,15.1757246 C15.3639617,15.5828436 14.7313944,15.6103465 14.3242754,15.2371541 L9.03007575,10.3841378 L3.70710678,15.7071068 Z"
                                        id="Path-94"
                                        fill="#000000"
                                        fill-rule="nonzero"
                                        opacity="0.3"
                                        transform="translate(9.000003, 11.999999) rotate(-270.000000) translate(-9.000003, -11.999999) "
                                    />
                                </g>
                            </svg> -->
                            <img
                                alt="Logo"
                                :src="
                                    `${$store.state.serverPath}assets/media/logos/logooculto1.png`
                                "
                                width="70"
                                style="margin-left:5px;"
                            />
                        </span>
                    </button>

                    <!--
<button class="kt-aside__brand-aside-toggler kt-aside__brand-aside-toggler--left" id="kt_aside_toggler"><span></span></button>
          -->
                </div>
            </div>

            <!-- end:: Aside -->

            <!-- begin:: Aside Menu -->
            <div
                class="kt-aside-menu-wrapper kt-grid__item kt-grid__item--fluid"
                id="kt_aside_menu_wrapper"
                style="background: linear-gradient(to bottom, #1D4A7E , #02A3F2  , #32BEA2  );"
            >
                <div
                    id="kt_aside_menu"
                    class="kt-aside-menu"
                    data-ktmenu-vertical="1"
                    data-ktmenu-scroll="1"
                    data-ktmenu-dropdown-timeout="500"
                >
                    <ul class="kt-menu__nav">
                        <li v-if="permisos_usuario.dashboard != 'S'"
                            class="kt-menu__item"
                            aria-haspopup="true"
                            style="color: #001e36"
                        >
                            <router-link to="/Dashboard" class="kt-menu__link">
                                <span class="kt-menu__link-icon">
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
                                                id="Bound"
                                                points="0 0 24 0 24 24 0 24"
                                            />
                                            <path
                                                d="M12.9336061,16.072447 L19.36,10.9564761 L19.5181585,10.8312381 C20.1676248,10.3169571 20.2772143,9.3735535 19.7629333,8.72408713 C19.6917232,8.63415859 19.6104327,8.55269514 19.5206557,8.48129411 L12.9336854,3.24257445 C12.3871201,2.80788259 11.6128799,2.80788259 11.0663146,3.24257445 L4.47482784,8.48488609 C3.82645598,9.00054628 3.71887192,9.94418071 4.23453211,10.5925526 C4.30500305,10.6811601 4.38527899,10.7615046 4.47382636,10.8320511 L4.63,10.9564761 L11.0659024,16.0730648 C11.6126744,16.5077525 12.3871218,16.5074963 12.9336061,16.072447 Z"
                                                id="Shape"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                            />
                                            <path
                                                d="M11.0563554,18.6706981 L5.33593024,14.122919 C4.94553994,13.8125559 4.37746707,13.8774308 4.06710397,14.2678211 C4.06471678,14.2708238 4.06234874,14.2738418 4.06,14.2768747 L4.06,14.2768747 C3.75257288,14.6738539 3.82516916,15.244888 4.22214834,15.5523151 C4.22358765,15.5534297 4.2250303,15.55454 4.22647627,15.555646 L11.0872776,20.8031356 C11.6250734,21.2144692 12.371757,21.2145375 12.909628,20.8033023 L19.7677785,15.559828 C20.1693192,15.2528257 20.2459576,14.6784381 19.9389553,14.2768974 C19.9376429,14.2751809 19.9363245,14.2734691 19.935,14.2717619 L19.935,14.2717619 C19.6266937,13.8743807 19.0546209,13.8021712 18.6572397,14.1104775 C18.654352,14.112718 18.6514778,14.1149757 18.6486172,14.1172508 L12.9235044,18.6705218 C12.377022,19.1051477 11.6029199,19.1052208 11.0563554,18.6706981 Z"
                                                id="Path"
                                                fill="#000000"
                                                opacity="0.3"
                                            />
                                        </g>
                                    </svg>
                                </span>
                                <span class="kt-menu__link-text"
                                    >Dashboard</span
                                >
                            </router-link>
                        </li>
                        <li class="kt-menu__section">
                            <h4 class="kt-menu__section-text">Navegación</h4>
                            <i
                                class="kt-menu__section-icon flaticon-more-v2"
                            ></i>
                        </li>
                        <li
                            class="kt-menu__item kt-menu__item--submenu"
                            aria-haspopup="true"
                            data-ktmenu-submenu-toggle="hover"
                        >
                            <a
                                href="javascript:;"
                                class="kt-menu__link kt-menu__toggle"
                            >
                                <span class="kt-menu__link-icon">
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
                                                d="M18.6225,9.75 L18.75,9.75 C19.9926407,9.75 21,10.7573593 21,12 C21,13.2426407 19.9926407,14.25 18.75,14.25 L18.6854912,14.249994 C18.4911876,14.250769 18.3158978,14.366855 18.2393549,14.5454486 C18.1556809,14.7351461 18.1942911,14.948087 18.3278301,15.0846699 L18.372535,15.129375 C18.7950334,15.5514036 19.03243,16.1240792 19.03243,16.72125 C19.03243,17.3184208 18.7950334,17.8910964 18.373125,18.312535 C17.9510964,18.7350334 17.3784208,18.97243 16.78125,18.97243 C16.1840792,18.97243 15.6114036,18.7350334 15.1896699,18.3128301 L15.1505513,18.2736469 C15.008087,18.1342911 14.7951461,18.0956809 14.6054486,18.1793549 C14.426855,18.2558978 14.310769,18.4311876 14.31,18.6225 L14.31,18.75 C14.31,19.9926407 13.3026407,21 12.06,21 C10.8173593,21 9.81,19.9926407 9.81,18.75 C9.80552409,18.4999185 9.67898539,18.3229986 9.44717599,18.2361469 C9.26485393,18.1556809 9.05191298,18.1942911 8.91533009,18.3278301 L8.870625,18.372535 C8.44859642,18.7950334 7.87592081,19.03243 7.27875,19.03243 C6.68157919,19.03243 6.10890358,18.7950334 5.68746499,18.373125 C5.26496665,17.9510964 5.02757002,17.3784208 5.02757002,16.78125 C5.02757002,16.1840792 5.26496665,15.6114036 5.68716991,15.1896699 L5.72635306,15.1505513 C5.86570889,15.008087 5.90431906,14.7951461 5.82064513,14.6054486 C5.74410223,14.426855 5.56881236,14.310769 5.3775,14.31 L5.25,14.31 C4.00735931,14.31 3,13.3026407 3,12.06 C3,10.8173593 4.00735931,9.81 5.25,9.81 C5.50008154,9.80552409 5.67700139,9.67898539 5.76385306,9.44717599 C5.84431906,9.26485393 5.80570889,9.05191298 5.67216991,8.91533009 L5.62746499,8.870625 C5.20496665,8.44859642 4.96757002,7.87592081 4.96757002,7.27875 C4.96757002,6.68157919 5.20496665,6.10890358 5.626875,5.68746499 C6.04890358,5.26496665 6.62157919,5.02757002 7.21875,5.02757002 C7.81592081,5.02757002 8.38859642,5.26496665 8.81033009,5.68716991 L8.84944872,5.72635306 C8.99191298,5.86570889 9.20485393,5.90431906 9.38717599,5.82385306 L9.49484664,5.80114977 C9.65041313,5.71688974 9.7492905,5.55401473 9.75,5.3775 L9.75,5.25 C9.75,4.00735931 10.7573593,3 12,3 C13.2426407,3 14.25,4.00735931 14.25,5.25 L14.249994,5.31450877 C14.250769,5.50881236 14.366855,5.68410223 14.552824,5.76385306 C14.7351461,5.84431906 14.948087,5.80570889 15.0846699,5.67216991 L15.129375,5.62746499 C15.5514036,5.20496665 16.1240792,4.96757002 16.72125,4.96757002 C17.3184208,4.96757002 17.8910964,5.20496665 18.312535,5.626875 C18.7350334,6.04890358 18.97243,6.62157919 18.97243,7.21875 C18.97243,7.81592081 18.7350334,8.38859642 18.3128301,8.81033009 L18.2736469,8.84944872 C18.1342911,8.99191298 18.0956809,9.20485393 18.1761469,9.38717599 L18.1988502,9.49484664 C18.2831103,9.65041313 18.4459853,9.7492905 18.6225,9.75 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                                opacity="0.3"
                                            />
                                            <path
                                                d="M12,15 C13.6568542,15 15,13.6568542 15,12 C15,10.3431458 13.6568542,9 12,9 C10.3431458,9 9,10.3431458 9,12 C9,13.6568542 10.3431458,15 12,15 Z"
                                                id="Path"
                                                fill="#000000"
                                            />
                                        </g>
                                    </svg>
                                </span>
                                <span class="kt-menu__link-text"
                                    >Parametros</span
                                >
                                <i
                                    class="kt-menu__ver-arrow la la-angle-right"
                                ></i>
                            </a>
                            <div class="kt-menu__submenu">
                                <span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.barrios != 'S'"
                                    >
                                        <router-link
                                            to="/barrios"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Barrios</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.usuarios != 'S'"
                                    >
                                        <router-link
                                            to="/usuarios"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Usuarios</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.corregimientos != 'S'"
                                    >
                                        <router-link
                                            to="/corregimientos"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Corregimientos</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.etnias != 'S'"
                                    >
                                        <router-link
                                            to="/etnias"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Etnias</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.ocupaciones != 'S'"
                                    >
                                        <router-link
                                            to="/ocupaciones"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Ocupaciones</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.parentescos != 'S'"
                                    >
                                        <router-link
                                            to="/parentescos"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Parentescos</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.estado_civil != 'S'"
                                    >
                                        <router-link
                                            to="/estadocivil"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Estado civil</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.escolaridad != 'S'"
                                    >
                                        <router-link
                                            to="/escolaridad"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Escolaridad</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.veredas != 'S'"
                                    >
                                        <router-link
                                            to="/veredas"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Veredas</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.mobilidad_ges != 'S'"
                                    >
                                        <router-link
                                            to="/morbilidad"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Morbilidad en Gestación</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.mobilidad_nac != 'S'"
                                    >
                                        <router-link
                                            to="/morbilidad_nacer"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Morbilidad al Nacer</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.metodos != 'S'"
                                    >
                                        <router-link
                                            to="/metodos"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Metodos de Planificación</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.motivos != 'S'"
                                    >
                                        <router-link
                                            to="/motivos"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Motivos para no
                                                Planificar</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.grupos != 'S'"
                                    >
                                        <router-link
                                            to="/grupos"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Grupos de Ayuda</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.enfermedades_cro != 'S'"
                                    >
                                        <router-link
                                            to="/enfermedadesCro"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Enfermedades Cronicas</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.enfermedades_inf != 'S'"
                                    >
                                        <router-link
                                            to="/enfermedadesInf"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Enfermedades Infecciosas</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.religion != 'S'"
                                    >
                                        <router-link
                                            to="/religion"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Religión</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.colegios != 'S'"
                                    >
                                        <router-link
                                            to="/colegios"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Colegios</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.actividades_economicas != 'S'"
                                    >
                                        <router-link
                                            to="/actividad"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Actividades Economicas</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/log"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Bitacora</span
                                            >
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li
                            class="kt-menu__item kt-menu__item--submenu"
                            aria-haspopup="true"
                            data-ktmenu-submenu-toggle="hover"
                        >
                            <a
                                href="javascript:;"
                                class="kt-menu__link kt-menu__toggle"
                            >
                                <span class="kt-menu__link-icon">
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
                                                d="M4.85714286,1 L11.7364114,1 C12.0910962,1 12.4343066,1.12568431 12.7051108,1.35473959 L17.4686994,5.3839416 C17.8056532,5.66894833 18,6.08787823 18,6.52920201 L18,19.0833333 C18,20.8738751 17.9795521,21 16.1428571,21 L4.85714286,21 C3.02044787,21 3,20.8738751 3,19.0833333 L3,2.91666667 C3,1.12612489 3.02044787,1 4.85714286,1 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                id="Combined-Shape-Copy"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                                opacity="0.3"
                                            />
                                            <path
                                                d="M6.85714286,3 L14.7364114,3 C15.0910962,3 15.4343066,3.12568431 15.7051108,3.35473959 L20.4686994,7.3839416 C20.8056532,7.66894833 21,8.08787823 21,8.52920201 L21,21.0833333 C21,22.8738751 20.9795521,23 19.1428571,23 L6.85714286,23 C5.02044787,23 5,22.8738751 5,21.0833333 L5,4.91666667 C5,3.12612489 5.02044787,3 6.85714286,3 Z M8,12 C7.44771525,12 7,12.4477153 7,13 C7,13.5522847 7.44771525,14 8,14 L15,14 C15.5522847,14 16,13.5522847 16,13 C16,12.4477153 15.5522847,12 15,12 L8,12 Z M8,16 C7.44771525,16 7,16.4477153 7,17 C7,17.5522847 7.44771525,18 8,18 L11,18 C11.5522847,18 12,17.5522847 12,17 C12,16.4477153 11.5522847,16 11,16 L8,16 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                                fill-rule="nonzero"
                                            />
                                        </g>
                                    </svg>
                                </span>
                                <span class="kt-menu__link-text"
                                    >Caracterización</span
                                >
                                <i
                                    class="kt-menu__ver-arrow la la-angle-right"
                                ></i>
                            </a>
                            <div class="kt-menu__submenu">
                                <span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.gestion != 'S'"
                                    >
                                        <router-link
                                            to="/gestion"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Gestión</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.consulta_integrante != 'S'"
                                    >
                                        <router-link
                                            to="/consultas/jefehogar"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Consultas Integrantes</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.consulta_vivienda != 'S'"
                                    >
                                        <router-link
                                            to="/consultas/vivienda"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Consultas Viviendas</span
                                            >
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li
                            class="kt-menu__item kt-menu__item--submenu"
                            aria-haspopup="true"
                            data-ktmenu-submenu-toggle="hover"
                        >
                            <a
                                href="javascript:;"
                                class="kt-menu__link kt-menu__toggle"
                            >
                                <span class="kt-menu__link-icon">
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
                                                d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                                opacity="0.3"
                                            />
                                            <path
                                                d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                            />
                                        </g>
                                    </svg>
                                </span>
                                <span class="kt-menu__link-text">Informes</span>
                                <i
                                    class="kt-menu__ver-arrow la la-angle-right"
                                ></i>
                            </a>
                            <div class="kt-menu__submenu">
                                <span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/informes/salud"
                                            class="kt-menu__link kt-menu__toggle"
                                            v-if="permisos_usuario.indicadores_gestantes != 'S'"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Situación en Salud</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/indicadores/gestantes"
                                            class="kt-menu__link kt-menu__toggle"
                                            v-if="permisos_usuario.indicadores_gestantes != 'S'"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Indicadores Gestantes</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                        v-if="permisos_usuario.indicadores_spa != 'S'"
                                    >
                                        <router-link
                                            to="/indicadores/spa"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Indicadores SPA</span
                                            >
                                        </router-link>
                                    </li>

                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/informes/migrantes"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Población Migrante</span
                                            >
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li
                            class="kt-menu__item kt-menu__item--submenu"
                            aria-haspopup="true"
                            data-ktmenu-submenu-toggle="hover"
                        >
                            <a
                                href="javascript:;"
                                class="kt-menu__link kt-menu__toggle"
                            >
                                <span class="kt-menu__link-icon">
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
                                                d="M5.5,2 L18.5,2 C19.3284271,2 20,2.67157288 20,3.5 L20,6.5 C20,7.32842712 19.3284271,8 18.5,8 L5.5,8 C4.67157288,8 4,7.32842712 4,6.5 L4,3.5 C4,2.67157288 4.67157288,2 5.5,2 Z M11,4 C10.4477153,4 10,4.44771525 10,5 C10,5.55228475 10.4477153,6 11,6 L13,6 C13.5522847,6 14,5.55228475 14,5 C14,4.44771525 13.5522847,4 13,4 L11,4 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                                opacity="0.3"
                                            />
                                            <path
                                                d="M5.5,9 L18.5,9 C19.3284271,9 20,9.67157288 20,10.5 L20,13.5 C20,14.3284271 19.3284271,15 18.5,15 L5.5,15 C4.67157288,15 4,14.3284271 4,13.5 L4,10.5 C4,9.67157288 4.67157288,9 5.5,9 Z M11,11 C10.4477153,11 10,11.4477153 10,12 C10,12.5522847 10.4477153,13 11,13 L13,13 C13.5522847,13 14,12.5522847 14,12 C14,11.4477153 13.5522847,11 13,11 L11,11 Z M5.5,16 L18.5,16 C19.3284271,16 20,16.6715729 20,17.5 L20,20.5 C20,21.3284271 19.3284271,22 18.5,22 L5.5,22 C4.67157288,22 4,21.3284271 4,20.5 L4,17.5 C4,16.6715729 4.67157288,16 5.5,16 Z M11,18 C10.4477153,18 10,18.4477153 10,19 C10,19.5522847 10.4477153,20 11,20 L13,20 C13.5522847,20 14,19.5522847 14,19 C14,18.4477153 13.5522847,18 13,18 L11,18 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                            />
                                        </g>
                                    </svg>
                                </span>
                                <span class="kt-menu__link-text">Reportes</span>
                                <i
                                    class="kt-menu__ver-arrow la la-angle-right"
                                ></i>
                            </a>
                            <div class="kt-menu__submenu">
                                <span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/gestantes"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Gestantes</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/nutricional"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Reporte Nutricional</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/cronicos"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Enfermedades Crónicas</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/infecciosas"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Enfermedades Infecciosas</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/migrantes"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Población Migrante</span
                                            >
                                        </router-link>
                                    </li>

                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/discapacitados"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Población discapacitada</span
                                            >
                                        </router-link>
                                    </li>

                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/adulto-mayor"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Población Adulto Mayor</span
                                            >
                                        </router-link>
                                    </li>

                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/descolarizados"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Población Descolarizada</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/bajo-nivel-socioeconomico"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Población Bajo Nivel Socio.</span
                                            >
                                        </router-link>
                                    </li>

                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/reportes/RiesgosSalud"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Riesgos de Salud</span
                                            >
                                        </router-link>
                                    </li>
                                </ul>
                            </div>
                        </li>

                        <li
                            class="kt-menu__item kt-menu__item--submenu"
                            aria-haspopup="true"
                            data-ktmenu-submenu-toggle="hover"
                            v-if="rolUsuario == 'SuperAdministrador'"
                        >
                            <a
                                href="javascript:;"
                                class="kt-menu__link kt-menu__toggle"
                            >
                                <span class="kt-menu__link-icon">
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
                                </span>
                                <span class="kt-menu__link-text">Soporte</span>
                                <i
                                    class="kt-menu__ver-arrow la la-angle-right"
                                ></i>
                            </a>
                            <div class="kt-menu__submenu">
                                <span class="kt-menu__arrow"></span>
                                <ul class="kt-menu__subnav">
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/usuariosSop"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Usuarios</span
                                            >
                                        </router-link>
                                    </li>
                                    <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/entes"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Entidades</span
                                            >
                                        </router-link>
                                    </li>
                                    <!-- <li
                                        class="kt-menu__item kt-menu__item--submenu"
                                        aria-haspopup="true"
                                        data-ktmenu-submenu-toggle="hover"
                                    >
                                        <router-link
                                            to="/indicadores/spa"
                                            class="kt-menu__link kt-menu__toggle"
                                        >
                                            <i
                                                class="kt-menu__link-bullet kt-menu__link-bullet--line"
                                            >
                                                <span></span>
                                            </i>
                                            <span class="kt-menu__link-text"
                                                >Tickets</span
                                            >
                                        </router-link>
                                    </li> -->
                                </ul>
                            </div>
                        </li>

                        <li class="kt-menu__item" aria-haspopup="true">
                            <a
                                href="https://api.whatsapp.com/send?phone=+573017459893"
                                target="_blank"
                                class="kt-menu__link"
                            >
                                <span class="kt-menu__link-icon">
                                    <!-- <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1" class="kt-svg-icon">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <rect id="bound" x="0" y="0" width="24" height="24"/>
                                            <path d="M14,13.381038 L14,3.47213595 L7.99460483,15.4829263 L14,13.381038 Z M4.88230018,17.2353996 L13.2844582,0.431083506 C13.4820496,0.0359007077 13.9625881,-0.12427877 14.3577709,0.0733126292 C14.5125928,0.15072359 14.6381308,0.276261584 14.7155418,0.431083506 L23.1176998,17.2353996 C23.3152912,17.6305824 23.1551117,18.1111209 22.7599289,18.3087123 C22.5664522,18.4054506 22.3420471,18.4197165 22.1378777,18.3482572 L14,15.5 L5.86212227,18.3482572 C5.44509941,18.4942152 4.98871325,18.2744737 4.84275525,17.8574509 C4.77129597,17.6532815 4.78556182,17.4288764 4.88230018,17.2353996 Z" id="Path-99" fill="#000000" fill-rule="nonzero" transform="translate(14.000087, 9.191034) rotate(-315.000000) translate(-14.000087, -9.191034) "/>
                                        </g>
                                    </svg> -->
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
                                                d="M12,22 C6.4771525,22 2,17.5228475 2,12 C2,6.4771525 6.4771525,2 12,2 C17.5228475,2 22,6.4771525 22,12 C22,17.5228475 17.5228475,22 12,22 Z M11.613922,13.2130341 C11.1688026,13.6581534 10.4887934,13.7685037 9.92575695,13.4869855 C9.36272054,13.2054673 8.68271128,13.3158176 8.23759191,13.760937 L6.72658218,15.2719467 C6.67169475,15.3268342 6.63034033,15.393747 6.60579393,15.4673862 C6.51847004,15.7293579 6.66005003,16.0125179 6.92202169,16.0998418 L8.27584113,16.5511149 C9.57592638,16.9844767 11.009274,16.6461092 11.9783003,15.6770829 L15.9775173,11.6778659 C16.867756,10.7876271 17.0884566,9.42760861 16.5254202,8.3015358 L15.8928491,7.03639343 C15.8688153,6.98832598 15.8371895,6.9444475 15.7991889,6.90644684 C15.6039267,6.71118469 15.2873442,6.71118469 15.0920821,6.90644684 L13.4995401,8.49898884 C13.0544207,8.94410821 12.9440704,9.62411747 13.2255886,10.1871539 C13.5071068,10.7501903 13.3967565,11.4301996 12.9516371,11.8753189 L11.613922,13.2130341 Z"
                                                id="Combined-Shape"
                                                fill="#000000"
                                            />
                                        </g>
                                    </svg>
                                </span>
                                <span class="kt-menu__link-text"
                                    >Soporte Whatsapp</span
                                >
                            </a>
                        </li>
                        <li
                            class="kt-menu__item kt-menu__item--submenu"
                            aria-haspopup="true"
                            data-ktmenu-submenu-toggle="hover"
                        >
                            <a
                                href="javascript:;"
                                @click="salir"
                                class="kt-menu__link kt-menu__toggle"
                            >
                                <span class="kt-menu__link-icon">
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
                                                rx="1.5"
                                            />
                                        </g>
                                    </svg>
                                </span>
                                <span class="kt-menu__link-text">Salir</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- end:: Aside Menu -->
        </div>
    </div>
</template>
<script>
"use strict";
import * as usuarioServicios from "../Servicios/usuarios_servicios";
export default {
    mounted() {
        this.iniciar();
    },
    data() {
        return {
            nombreUsuario: "",
            permisos_usuario: {},
            rolUsuario: "",
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content")
        };
    },
    /////SOY GAY
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
                        this.rolUsuario = respuesta.data.rolUsuario;
                        this.permisos_usuario = respuesta.data.permisos_usuario;
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
        }
    }
};
</script>
