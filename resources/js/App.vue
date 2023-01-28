<template>
  <div>
    <!-- begin:: Page -->
    <!-- begin:: Header Mobile -->
    <div id="kt_header_mobile" class="kt-header-mobile kt-header-mobile--fixed">
      <div class="kt-header-mobile__logo">
        <a href="#">
          <!-- <img alt="Logo" src="{{asset('assets/media/logos/logo-2.png')}}" /> -->
        </a>
      </div>
      <div class="kt-header-mobile__toolbar">
        <button
          class="kt-header-mobile__toggler kt-header-mobile__toggler--left"
          id="kt_aside_mobile_toggler"
        >
          <span></span>
        </button>
        <!-- <button class="kt-header-mobile__toggler" id="kt_header_mobile_toggler">
          <span></span>
        </button> -->
        <button class="kt-header-mobile__topbar-toggler" id="kt_header_mobile_topbar_toggler">
          <i class="flaticon-more"></i>
        </button>
      </div>
    </div>
    <!-- end:: Header Mobile -->
    <div class="kt-grid kt-grid--hor kt-grid--root" style="background: linear-gradient(to left, #acb1c2 , #bcbfcb  , #e4e4e4  );">
      <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--ver kt-page">
        <!-- begin:: Aside -->
        <button class="kt-aside-close" id="kt_aside_close_btn">
          <i class="la la-close"></i>
        </button>

        <!-- @include('Plantilla.Menu') -->
        <Menu />
        <!-- end:: Aside -->
        <div
          class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor kt-wrapper"
          id="kt_wrapper"
        >
          <!-- begin:: Header -->
          <!-- @include('Plantilla.Barra') -->
          <Barra />
          <!-- end:: Header -->
          <div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor">
            <!-- begin:: Content -->
            <div class="kt-content kt-grid__item kt-grid__item--fluid" id="kt_content">
              <!-- @yield('Contenido') -->
              <router-view></router-view>              
            </div>

            <!-- end:: Content -->
          </div>

          <!-- begin:: Footer -->
          <div
            class="kt-footer kt-grid__item kt-grid kt-grid--desktop kt-grid--ver-desktop"
            id="kt_footer"
          >
            <div class="kt-footer__copyright">
              Copyright &copy;{{fecha}}
              <a href="#">&nbsp;CSI&nbsp;</a> Todos los derechos reservados.
            </div>
          </div>

          <!-- end:: Footer -->
        </div>
      </div>
    </div>

    <!-- end:: Page -->

    <!-- begin::Scrolltop -->
    <div id="kt_scrolltop" class="kt-scrolltop">
      <i class="fa fa-arrow-up"></i>
    </div>
    <!-- end::Scrolltop -->
  </div>
</template>
<script>
  import Barra from "./components/Barra.vue";
  import Menu from "./components/Menu.vue";
  export default {
    components: {
      Barra,
      Menu
    },
    data(){
      return {
        fecha: new Date().getFullYear()
      }
    }
  };
</script>