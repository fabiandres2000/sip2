(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[34],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Servicios_consultas__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Servicios/consultas */ "./resources/js/Servicios/consultas.js");
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../store */ "./resources/js/store.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//


/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {
    this.iniciales(1);
  },
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      ruta: "",
      datos: {
        id_dpto: "",
        id_mun: "",
        id_corre: "",
        id_vereda: "",
        id_zona: "",
        id_barrio: "",
        tenencia_vivienda: "",
        tipo_vivienda: "",
        poblacion_especial: "",
        material_predominante: "",
        promedio_ingresos: "",
        energia_electrica: "",
        gas_natural: "",
        acueducto: "",
        alcantarillado: "",
        aseo: "",
        servicio_sanitario: "",
        aguas_negras: "",
        tipo_combustible: ""
      },
      viviendas: {},
      paginacion: {
        total: 0,
        pagina_actual: 0,
        por_pagina: 0,
        ultima_pagina: 0,
        desde: 0,
        hasta: 0
      },
      offset: 4,
      fila: {}
    };
  },
  methods: {
    iniciales: function iniciales(pagina) {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _this.datos = {
                  id_dpto: _this.$route.params.id_dpto,
                  id_mun: _this.$route.params.id_mun,
                  id_corre: _this.$route.params.id_corre,
                  id_vereda: _this.$route.params.id_vereda,
                  id_zona: _this.$route.params.id_zona,
                  id_barrio: _this.$route.params.id_barrio,
                  tenencia_vivienda: _this.$route.params.tenencia_vivienda,
                  tipo_vivienda: _this.$route.params.tipo_vivienda,
                  poblacion_especial: _this.$route.params.poblacion_especial,
                  material_predominante: _this.$route.params.material_predominante,
                  promedio_ingresos: _this.$route.params.promedio_ingresos,
                  energia_electrica: _this.$route.params.energia_electrica,
                  gas_natural: _this.$route.params.gas_natural,
                  acueducto: _this.$route.params.acueducto,
                  alcantarillado: _this.$route.params.alcantarillado,
                  aseo: _this.$route.params.aseo,
                  servicio_sanitario: _this.$route.params.servicio_sanitario,
                  aguas_negras: _this.$route.params.aguas_negras,
                  tipo_combustible: _this.$route.params.tipo_combustible
                };
                parametros = {
                  _token: _this.csrf,
                  datos: _this.datos,
                  page: pagina
                };
                _context.prev = 2;
                _context.next = 5;
                return _Servicios_consultas__WEBPACK_IMPORTED_MODULE_1__["viviendas"](parametros).then(function (respuesta) {
                  _this.viviendas = respuesta.data.viviendas.data;
                  _this.paginacion = respuesta.data.paginacion; //console.log(respuesta.data.viviendas);
                });

              case 5:
                _context.next = 9;
                break;

              case 7:
                _context.prev = 7;
                _context.t0 = _context["catch"](2);

              case 9:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, null, [[2, 7]]);
      }))();
    },
    Buscar: function Buscar() {},
    cambiarPaginas: function cambiarPaginas(pagina) {
      this.paginacion.pagina_actual = pagina;
      this.iniciales(pagina);
    },
    generarPDF: function generarPDF() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                parametros = {
                  _token: _this2.csrf,
                  datos: _this2.datos
                };
                _context2.prev = 1;
                _context2.next = 4;
                return _Servicios_consultas__WEBPACK_IMPORTED_MODULE_1__["viviendaspdf"](parametros).then(function (respuesta) {
                  _this2.ruta = _store__WEBPACK_IMPORTED_MODULE_2__["default"].state.apiURL + respuesta.data.nombre;

                  _this2.$refs.modalpdf.show();
                });

              case 4:
                _context2.next = 8;
                break;

              case 6:
                _context2.prev = 6;
                _context2.t0 = _context2["catch"](1);

              case 8:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, null, [[1, 6]]);
      }))();
    },
    abrirModal: function abrirModal() {
      this.$refs.modalCorregimiento.show();
    },
    cerrarModal: function cerrarModal() {
      this.$refs.modalCorregimiento.hide();
    },
    detalles: function detalles(item) {
      this.fila = item;
      this.$refs.modalCorregimiento.show();
    },
    consultar: function consultar() {}
  },
  computed: {
    esActivo: function esActivo() {
      return this.paginacion.pagina_actual;
    },
    numeroDePaginas: function numeroDePaginas() {
      if (!this.paginacion.hasta) {
        return [];
      }

      var desde = this.paginacion.pagina_actual - this.offset; // TODO offset

      if (desde < 1) {
        desde = 1;
      }

      var aux = this.offset * 2;
      var hasta = desde + aux;

      if (hasta >= this.paginacion.ultima_pagina) {
        hasta = this.paginacion.ultima_pagina;
      }

      var paginasArray = [];

      while (desde <= hasta) {
        paginasArray.push(desde);
        desde++;
      }

      return paginasArray;
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=style&index=0&lang=css&":
/*!********************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=style&index=0&lang=css& ***!
  \********************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./listadoviviendas.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=style&index=0&lang=css&");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../../../node_modules/style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=template&id=e9f1b276&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=template&id=e9f1b276& ***!
  \*************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    { staticClass: "row" },
    [
      _c("div", { staticClass: "col-12" }, [
        _c(
          "div",
          {
            staticClass:
              "kt-portlet kt-portlet--height-fluid kt-portlet--mobile",
            staticStyle: { "margin-top": "-4%", height: "auto" }
          },
          [
            _c(
              "div",
              {
                staticClass:
                  "\n          kt-portlet__head\n          kt-portlet__head--lg\n          kt-portlet__head--noborder\n          kt-portlet__head--break-sm\n        "
              },
              [
                _vm._m(0),
                _vm._v(" "),
                _c("div", { staticClass: "kt-portlet__head-toolbar" }, [
                  _c("div", { staticClass: "btn-group" }, [
                    _c(
                      "a",
                      {
                        staticClass: "btn btn-danger",
                        attrs: { href: "javascript:void(0);" },
                        on: {
                          click: function($event) {
                            return _vm.generarPDF()
                          }
                        }
                      },
                      [
                        _c("i", { staticClass: "la la-file-pdf-o" }),
                        _vm._v(" "),
                        _c("span", { staticClass: "kt-hidden-mobile" }, [
                          _vm._v("Listado PDF")
                        ])
                      ]
                    )
                  ])
                ])
              ]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "kt-portlet__body" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-12" }, [
                  _c("div", { staticClass: "table-responsive" }, [
                    _c("table", { staticClass: "table table-sm table-hover" }, [
                      _vm._m(1),
                      _vm._v(" "),
                      _c(
                        "tbody",
                        _vm._l(_vm.viviendas, function(item, index) {
                          return _c("tr", { key: index }, [
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                      " +
                                    _vm._s(index + 1) +
                                    "\n                    "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                      " +
                                    _vm._s(item.id) +
                                    "\n                    "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                      " +
                                    _vm._s(item.dpto) +
                                    "\n                    "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                      " +
                                    _vm._s(item.muni) +
                                    "\n                    "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                      " +
                                    _vm._s(item.corre) +
                                    "\n                    "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                      " +
                                    _vm._s(item.vereda) +
                                    "\n                    "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                      " +
                                    _vm._s(item.pnom) +
                                    " " +
                                    _vm._s(item.snom) +
                                    " " +
                                    _vm._s(item.pape) +
                                    "\n                      " +
                                    _vm._s(item.sape) +
                                    "\n                    "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "text-align": "center",
                                  "vertical-align": "middle"
                                }
                              },
                              [
                                _c(
                                  "button",
                                  {
                                    staticClass:
                                      "btn btn-outline-info btn-icon btn-sm",
                                    attrs: {
                                      type: "button",
                                      title: "Detalles"
                                    },
                                    on: {
                                      click: function($event) {
                                        return _vm.detalles(item)
                                      }
                                    }
                                  },
                                  [_c("i", { staticClass: "fa fa-list" })]
                                )
                              ]
                            )
                          ])
                        }),
                        0
                      )
                    ]),
                    _vm._v(" "),
                    _c("div", {
                      staticClass: "kt-separator kt-separator--border-dashed"
                    }),
                    _vm._v(" "),
                    _c("div", { staticClass: "kt-section" }, [
                      _c(
                        "div",
                        { staticClass: "kt-pagination kt-pagination--danger" },
                        [
                          _c(
                            "ul",
                            { staticClass: "kt-pagination__links" },
                            [
                              _vm.paginacion.pagina_actual > 1
                                ? _c(
                                    "li",
                                    {
                                      staticClass: "kt-pagination__link--first"
                                    },
                                    [
                                      _c(
                                        "a",
                                        {
                                          attrs: { href: "javascript:;" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              return _vm.cambiarPaginas(1)
                                            }
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass:
                                              "fa fa-angle-double-left kt-font-danger"
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.paginacion.pagina_actual > 1
                                ? _c(
                                    "li",
                                    {
                                      staticClass: "kt-pagination__link--next"
                                    },
                                    [
                                      _c(
                                        "a",
                                        {
                                          attrs: { href: "javascript:;" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              return _vm.cambiarPaginas(
                                                _vm.paginacion.pagina_actual - 1
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass:
                                              "fa fa-angle-left kt-font-danger"
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              _vm._l(_vm.numeroDePaginas, function(
                                pagina,
                                index
                              ) {
                                return _c(
                                  "li",
                                  {
                                    key: index,
                                    class: [
                                      pagina == _vm.esActivo
                                        ? "kt-pagination__link--active"
                                        : ""
                                    ]
                                  },
                                  [
                                    _c(
                                      "a",
                                      {
                                        attrs: { href: "javascript:;" },
                                        on: {
                                          click: function($event) {
                                            $event.preventDefault()
                                            return _vm.cambiarPaginas(pagina)
                                          }
                                        }
                                      },
                                      [_vm._v(_vm._s(pagina))]
                                    )
                                  ]
                                )
                              }),
                              _vm._v(" "),
                              _vm.paginacion.pagina_actual <
                              _vm.paginacion.ultima_pagina
                                ? _c(
                                    "li",
                                    {
                                      staticClass: "kt-pagination__link--prev"
                                    },
                                    [
                                      _c(
                                        "a",
                                        {
                                          attrs: { href: "javascript:;" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              return _vm.cambiarPaginas(
                                                _vm.paginacion.pagina_actual + 1
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass:
                                              "fa fa-angle-right kt-font-danger"
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                : _vm._e(),
                              _vm._v(" "),
                              _vm.paginacion.pagina_actual <
                              _vm.paginacion.ultima_pagina
                                ? _c(
                                    "li",
                                    {
                                      staticClass: "kt-pagination__link--last"
                                    },
                                    [
                                      _c(
                                        "a",
                                        {
                                          attrs: { href: "javascript:;" },
                                          on: {
                                            click: function($event) {
                                              $event.preventDefault()
                                              return _vm.cambiarPaginas(
                                                _vm.paginacion.ultima_pagina
                                              )
                                            }
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass:
                                              "fa fa-angle-double-right kt-font-danger"
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                : _vm._e()
                            ],
                            2
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("br")
                    ])
                  ])
                ])
              ])
            ])
          ]
        )
      ]),
      _vm._v(" "),
      _c(
        "b-modal",
        {
          ref: "modalpdf",
          attrs: {
            title: "Listado de viviendas",
            size: "xl",
            centered: "",
            "header-bg-variant": "danger",
            "header-text-variant": "light",
            "no-close-on-backdrop": false
          },
          scopedSlots: _vm._u([
            {
              key: "modal-header-close",
              fn: function() {
                return [_c("i", { staticClass: "fa fa-close" })]
              },
              proxy: true
            }
          ])
        },
        [
          _vm._v(" "),
          _c("embed", {
            attrs: {
              id: "divPdf",
              src: _vm.ruta,
              type: "application/pdf",
              width: "100%",
              height: "650px"
            }
          })
        ]
      ),
      _vm._v(" "),
      _c(
        "b-modal",
        {
          ref: "modalCorregimiento",
          attrs: {
            "hide-footer": "",
            title: "Detalles de vivienda",
            size: "xl",
            centered: "",
            "header-bg-variant": "danger",
            "header-text-variant": "light",
            "no-close-on-backdrop": false
          }
        },
        [
          _c("div", { staticClass: "d-block" }, [
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [_vm._v("Jefes de hogar")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c("div", { staticClass: "table-responsive" }, [
                  _c("table", { staticClass: "table table-sm table-hover" }, [
                    _c("thead", {}, [
                      _c("tr", { staticClass: "kt-bg-fill-brand" }, [
                        _c("th", [_vm._v("No.")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Tipo Identificación")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Identificación")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Nombres")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Estado civil")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Edad")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Ocupación")])
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "tbody",
                      _vm._l(_vm.fila.jefes, function(item, index) {
                        return _c(
                          "tr",
                          {
                            directives: [
                              {
                                name: "show",
                                rawName: "v-show",
                                value: item.estado == "Activo",
                                expression: "item.estado=='Activo'"
                              }
                            ],
                            key: index
                          },
                          [
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle"
                                }
                              },
                              [_vm._v(_vm._s(index + 1))]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.tipo_id))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.identificacion))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(
                                    _vm._s(item.pnom) +
                                      " " +
                                      _vm._s(item.snom) +
                                      " " +
                                      _vm._s(item.pape) +
                                      " " +
                                      _vm._s(item.sape)
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.textoEstado))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.edad))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.textoOcupacion))
                                ])
                              ]
                            )
                          ]
                        )
                      }),
                      0
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "kt-separator kt-separator--border-dashed"
                  })
                ])
              ])
            ]),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [_vm._v("Integrantes")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c("div", { staticClass: "table-responsive" }, [
                  _c("table", { staticClass: "table table-sm table-hover" }, [
                    _c("thead", {}, [
                      _c("tr", { staticClass: "kt-bg-fill-brand" }, [
                        _c("th", [_vm._v("No.")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Tipo Identificación")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Identificación")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Nombres")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Estado civil")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Edad")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Ocupación")])
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "tbody",
                      _vm._l(_vm.fila.integrantes, function(item, index) {
                        return _c(
                          "tr",
                          {
                            directives: [
                              {
                                name: "show",
                                rawName: "v-show",
                                value: item.estado == "Activo",
                                expression: "item.estado=='Activo'"
                              }
                            ],
                            key: index
                          },
                          [
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle"
                                }
                              },
                              [_vm._v(_vm._s(index + 1))]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.tipo_id))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.identificacion))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(
                                    _vm._s(item.pnom) +
                                      " " +
                                      _vm._s(item.snom) +
                                      " " +
                                      _vm._s(item.pape) +
                                      " " +
                                      _vm._s(item.sape)
                                  )
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.textoEstado))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.edad))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.textoOcupacion))
                                ])
                              ]
                            )
                          ]
                        )
                      }),
                      0
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "kt-separator kt-separator--border-dashed"
                  })
                ])
              ])
            ]),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [_vm._v("Ubicación")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Departamento:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.dpto))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Municipio:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.muni))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Corregimiento:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.corre))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Vereda:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.vereda))])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Barrio:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.barrio))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Zona:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.id_zona == 0
                          ? "No Aplica"
                          : _vm.fila.id_zona == 1
                          ? "Urbano"
                          : _vm.fila.id_zona == 2
                          ? "Rural centro poblado"
                          : _vm.fila.id_zona == 3
                          ? "Rural disperso"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Tenencia de vivienda:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.tenencia_vivienda))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Número de hogares:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.numero_hogares))])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Población Especial:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.poblacion_especial == 0
                          ? "NO APLICA"
                          : _vm.fila.poblacion_especial == 1
                          ? "DESPLAZADO"
                          : _vm.fila.poblacion_especial == 3
                          ? "VICTIMA DEL CONFLICTO ARMADO"
                          : _vm.fila.poblacion_especial == 4
                          ? "MADRE COMUNITARIA"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-4" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("¿La comunidad presenta vías de acceso?:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.vias_acceso == 0
                          ? "No Aplica"
                          : _vm.fila.vias_acceso == 1
                          ? "Pavimentadas"
                          : _vm.fila.vias_acceso == 2
                          ? "Placa huella"
                          : _vm.fila.vias_acceso == 3
                          ? "Sin pavimentar"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-4" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("¿Presenta acceso fácil a los servicios públicos? :")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.servicios_publicos == 1
                          ? "Permanente"
                          : _vm.fila.servicios_publicos == 2
                          ? "Ocasional"
                          : _vm.fila.servicios_publicos == 3
                          ? "Periódico"
                          : _vm.fila.servicios_publicos == 4
                          ? "No hay acceso a servicios públicos"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-12" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Dirección:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.direccion))])
              ])
            ]),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [_vm._v("Vivienda")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Tipo de Vivienda:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.tipo_vivienda == 1
                          ? "No Aplica"
                          : _vm.fila.tipo_vivienda == 2
                          ? "Casa"
                          : _vm.fila.tipo_vivienda == 3
                          ? "Apartamento"
                          : _vm.fila.tipo_vivienda == 4
                          ? "Finca"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Tipo de Estructura:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.tipo_estructura == 1
                          ? "No Aplica"
                          : _vm.fila.tipo_estructura == 2
                          ? "Concreto"
                          : _vm.fila.tipo_estructura == 3
                          ? "Ladrillo ó Bloque"
                          : _vm.fila.tipo_estructura == 4
                          ? "Madera"
                          : "Otro"
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.tipo_estructura == 5
                ? _c("div", { staticClass: "col-lg-6" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otro Tipo de Estructura:")
                    ]),
                    _vm._v(" "),
                    _c("div", [_vm._v(_vm._s(_vm.fila.otro_tipo_estructura))])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("# de Habitaciones:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.numero_cuartos))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Materia Predominante Piso:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.material_predominante == "NA"
                          ? "No Aplica"
                          : _vm.fila.material_predominante == 1
                          ? "Marmol ó Madera Pulida"
                          : _vm.fila.material_predominante == 2
                          ? "Cerámica ó Tablón"
                          : _vm.fila.material_predominante == 3
                          ? "Cemento"
                          : _vm.fila.material_predominante == 4
                          ? "Madera"
                          : _vm.fila.material_predominante == 5
                          ? "Tierra"
                          : _vm.fila.material_predominante == 6
                          ? "Bolsa ó Vinilo"
                          : "Otro"
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Tipo de Cubierta:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.tipo_cubierta == 1
                          ? "No Aplica"
                          : _vm.fila.tipo_cubierta == 2
                          ? "Material de Desecho Plastico - Lona"
                          : _vm.fila.tipo_cubierta == 3
                          ? "Zinc"
                          : _vm.fila.tipo_cubierta == 4
                          ? "Eternit"
                          : _vm.fila.tipo_cubierta == 5
                          ? "Entre Piso"
                          : _vm.fila.tipo_cubierta == 6
                          ? "Teja de Barro"
                          : _vm.fila.tipo_cubierta == 7
                          ? "Placa Definitiva"
                          : _vm.fila.tipo_cubierta == 8
                          ? "Paja ó Palma"
                          : "Otro"
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.tipo_cubierta == 9
                ? _c("div", { staticClass: "col-lg-3" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otro Tipo de Cubierta:")
                    ]),
                    _vm._v(" "),
                    _c("div", [_vm._v(_vm._s(_vm.fila.otro_tipo_cubierta))])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c("div", { staticClass: "table-responsive" }, [
                  _c("table", { staticClass: "table table-sm table-hover" }, [
                    _c("thead", [
                      _c("tr", { staticClass: "kt-bg-fill-brand" }, [
                        _c("th", [_vm._v("No.")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Actividad")])
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "tbody",
                      [
                        _vm._l(_vm.fila.actividad, function(item, index) {
                          return _c("tr", { key: index }, [
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                    " +
                                    _vm._s(index) +
                                    "\n                  "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.actividad))
                                ])
                              ]
                            )
                          ])
                        }),
                        _vm._v(" "),
                        _vm.fila.actividad == null
                          ? _c("tr", [
                              _c(
                                "td",
                                {
                                  staticStyle: {
                                    "font-weight": "normal",
                                    "vertical-align": "middle"
                                  },
                                  attrs: { colspan: "2" }
                                },
                                [
                                  _vm._v(
                                    "\n                    No hay registros\n                  "
                                  )
                                ]
                              )
                            ])
                          : _vm._e()
                      ],
                      2
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "kt-separator kt-separator--border-dashed"
                  })
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Evento que Puede Afectar la Vivienda:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.evento_afecta_vivienda == 1
                          ? "No Aplica"
                          : _vm.fila.evento_afecta_vivienda == 2
                          ? "Inundación"
                          : _vm.fila.evento_afecta_vivienda == 3
                          ? "Arroyo"
                          : _vm.fila.evento_afecta_vivienda == 4
                          ? "Oleaje Fuerte"
                          : "Deslizamiento"
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Pertenece a Familias en Acción:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.familias_accion == "NA"
                          ? "No Aplica"
                          : _vm.fila.familias_accion
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-4" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Promedio de Ingresos Mensuales:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.promedio_ingresos == "NA"
                          ? "No Aplica"
                          : _vm.fila.promedio_ingresos == 1
                          ? "Menos de un salario minimo legal vigente"
                          : _vm.fila.promedio_ingresos == 2
                          ? "Un salario minimo legal vigente"
                          : _vm.fila.promedio_ingresos == 3
                          ? "Entre 1 y 3 salarios mínimos"
                          : _vm.fila.promedio_ingresos == 4
                          ? "Entre 3 y 5 salarios mínimos"
                          : "Más de 5 salarios mínimos"
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Fuente de Agua para Consumo:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.fuente_agua == "NA"
                          ? "No Aplica"
                          : _vm.fila.fuente_agua == 1
                          ? "Acueducto"
                          : _vm.fila.fuente_agua == 3
                          ? "Pozo con bomba"
                          : _vm.fila.fuente_agua == 4
                          ? "Laguna o jaguey"
                          : _vm.fila.fuente_agua == 5
                          ? "Rio quebrada ó manantial"
                          : _vm.fila.fuente_agua == 6
                          ? "Aguas lluvias"
                          : _vm.fila.fuente_agua == 7
                          ? "Carro tanque"
                          : _vm.fila.fuente_agua == 8
                          ? "Agua tratada envasada"
                          : _vm.fila.fuente_agua == 9
                          ? "Otro"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.tipo_estructura == 9
                ? _c("div", { staticClass: "col-lg-5" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otra fuente de agua:")
                    ]),
                    _vm._v(" "),
                    _c("div", [_vm._v(_vm._s(_vm.fila.cual_fuente))])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [_vm._v("Acceso a servicios públicos")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Energia Electrica:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.energia_electrica == "NA"
                          ? "No Aplica"
                          : _vm.fila.energia_electrica
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Gas Natural:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.gas_natural == "NA"
                          ? "No Aplica"
                          : _vm.fila.gas_natural
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Acueducto:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.acueducto == "NA"
                          ? "No Aplica"
                          : _vm.fila.acueducto
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Alcantarillado:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.alcantarillado == "NA"
                          ? "No Aplica"
                          : _vm.fila.alcantarillado
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Telefono Fijo:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.telefono_fijo == "NA"
                          ? "No Aplica"
                          : _vm.fila.telefono_fijo
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Aseo:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.aseo == "NA" ? "No Aplica" : _vm.fila.aseo
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Internet Subsidiado:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.internet_subsidiado == "NA"
                          ? "No Aplica"
                          : _vm.fila.internet_subsidiado
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Internet Privado:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.internet_privado == "NA"
                          ? "No Aplica"
                          : _vm.fila.internet_privado
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Donde se Almacena el Agua:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.donde_almacena_agua == "NA"
                          ? "No Aplica"
                          : _vm.fila.donde_almacena_agua == 1
                          ? "No almacenan"
                          : _vm.fila.donde_almacena_agua == 2
                          ? "Tanque"
                          : _vm.fila.donde_almacena_agua == 3
                          ? "Alberca"
                          : _vm.fila.donde_almacena_agua == 4
                          ? "Planta acuatica"
                          : _vm.fila.donde_almacena_agua == 6
                          ? "Otro"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.otro_almacena_agua == 9
                ? _c("div", { staticClass: "col-lg-3" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otra lugar de almacenamiento del agua:")
                    ]),
                    _vm._v(" "),
                    _c("div", [_vm._v(_vm._s(_vm.fila.otro_almacena_agua))])
                  ])
                : _vm._e(),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Ubicación del Tanque:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.ubicacion_tanque == 5
                          ? "No Aplica"
                          : _vm.fila.ubicacion_tanque == 1
                          ? "Interior de la vivienda"
                          : _vm.fila.ubicacion_tanque == 2
                          ? "Exterior de la vivienda bajo techo"
                          : _vm.fila.ubicacion_tanque == 3
                          ? "Exterior de la vivienda sin techo"
                          : _vm.fila.ubicacion_tanque == 4
                          ? "Sobre el techo"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Tipo de Tratamiento del Agua:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.tipo_tratamiento_agua == "NA"
                          ? "No Aplica"
                          : _vm.fila.tipo_tratamiento_agua == 1
                          ? "Clorada"
                          : _vm.fila.tipo_tratamiento_agua == 2
                          ? "Filtrada"
                          : _vm.fila.tipo_tratamiento_agua == 3
                          ? "Hervida"
                          : _vm.fila.tipo_tratamiento_agua == 4
                          ? "Consume sin tratamiento"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Destino final de la Basura:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.destino_final_basura == "NA"
                          ? "No Aplica"
                          : _vm.fila.destino_final_basura == 1
                          ? "Recolección y dispocisión en el aseo municipal"
                          : _vm.fila.destino_final_basura == 2
                          ? "Quemada"
                          : _vm.fila.destino_final_basura == 3
                          ? "Cielo Abierto"
                          : _vm.fila.destino_final_basura == 4
                          ? "Enterrada"
                          : _vm.fila.destino_final_basura == 5
                          ? "Otro"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.destino_final_basura == 5
                ? _c("div", { staticClass: "col-lg-6" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otra destino final de la basura:")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(_vm._s(_vm.fila.otro_destino_final_basura))
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [_vm._v("Observe si cerca de la vivienda hay")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Porquerizas:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.porquerizas == "NA"
                          ? "No Aplica"
                          : _vm.fila.porquerizas
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Plagas:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.plagas == "NA" ? "No Aplica" : _vm.fila.plagas
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Industrias Contaminantes:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.industrias == "NA"
                          ? "No Aplica"
                          : _vm.fila.industrias
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Malos Olores:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.malos_olores == "NA"
                          ? "No Aplica"
                          : _vm.fila.malos_olores
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Rellenos Sanitarios:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.rellenos == "NA"
                          ? "No Aplica"
                          : _vm.fila.rellenos
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Ruido")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.contaminacion_a == "NA"
                          ? "No Aplica"
                          : _vm.fila.contaminacion_a
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Cuerpos de agua:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.rio == "NA" ? "No Aplica" : _vm.fila.rio
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Avenidas:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.avenidas_transitadas == "NA"
                          ? "No Aplica"
                          : _vm.fila.avenidas_transitadas
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Lotes Abandonados:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.lotes_abandonados == "NA"
                          ? "No Aplica"
                          : _vm.fila.lotes_abandonados
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Otro")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.otro_cerca == "NA"
                          ? "No Aplica"
                          : _vm.fila.otro_cerca
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.otro_cerca == "SI"
                ? _c("div", { staticClass: "col-lg-6" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Cual otro:")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(
                        "\n            " +
                          _vm._s(_vm.fila.cual_otro) +
                          "\n          "
                      )
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [_vm._v("Animales dentro de la Vivienda")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c("div", { staticClass: "table-responsive" }, [
                  _c("table", { staticClass: "table table-sm table-hover" }, [
                    _c("thead", {}, [
                      _c("tr", { staticClass: "kt-bg-fill-brand" }, [
                        _c("th", [_vm._v("No.")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Animal")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Cuantos")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Vacunado")])
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "tbody",
                      _vm._l(_vm.fila.animales, function(item, index) {
                        return _c("tr", { key: index }, [
                          _c(
                            "td",
                            {
                              staticStyle: {
                                "font-weight": "normal",
                                "vertical-align": "middle"
                              }
                            },
                            [
                              _vm._v(
                                "\n                    " +
                                  _vm._s(index + 1) +
                                  "\n                  "
                              )
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "td",
                            {
                              staticStyle: {
                                "font-weight": "normal",
                                "vertical-align": "middle",
                                "text-align": "left",
                                "text-transform": "capitalize"
                              }
                            },
                            [
                              _c("span", { staticClass: "text-capitalize" }, [
                                _vm._v(_vm._s(item.animal))
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "td",
                            {
                              staticStyle: {
                                "font-weight": "normal",
                                "vertical-align": "middle",
                                "text-align": "left",
                                "text-transform": "capitalize"
                              }
                            },
                            [
                              _c("span", { staticClass: "text-capitalize" }, [
                                _vm._v(_vm._s(item.cuantos))
                              ])
                            ]
                          ),
                          _vm._v(" "),
                          _c(
                            "td",
                            {
                              staticStyle: {
                                "font-weight": "normal",
                                "vertical-align": "middle",
                                "text-align": "left",
                                "text-transform": "capitalize"
                              }
                            },
                            [
                              _c("span", { staticClass: "text-capitalize" }, [
                                _vm._v(_vm._s(item.vacunados))
                              ])
                            ]
                          )
                        ])
                      }),
                      0
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "kt-separator kt-separator--border-dashed"
                  })
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-4" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("El Servicio Sanitario Es:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.servicio_sanitario == "NA"
                          ? "No Aplica"
                          : _vm.fila.servicio_sanitario == 1
                          ? "De Uso Exclusivo de las Personas de la Familia"
                          : _vm.fila.servicio_sanitario == 2
                          ? "Compartida con Personas de Otras Familias"
                          : _vm.fila.servicio_sanitario == 3
                          ? "Sin servicio sanitario"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-4" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Donde se Encuentra el Sanitario,Inodoro Ó Letrina:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.donde_sanitario == 1
                          ? "Fuera de la casa"
                          : _vm.fila.donde_sanitario == 2
                          ? "Patio"
                          : _vm.fila.donde_sanitario == 3
                          ? "Dentro de la casa"
                          : "No aplica"
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.otro_cerca == "SI"
                ? _c("div", { staticClass: "col-lg-6" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Donde se Disponen las Excretas (HECES):")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(
                        "\n            " +
                          _vm._s(
                            _vm.fila.excretas == "NA"
                              ? "No Aplica"
                              : _vm.fila.excretas == 1
                              ? "Letrina"
                              : _vm.fila.excretas == 3
                              ? "Inodoro conectado a red de alcantarillado"
                              : _vm.fila.excretas == 4
                              ? "Cuerpos de aguas"
                              : _vm.fila.excretas == 5
                              ? "Inododoro conectado a pozo séptico"
                              : _vm.fila.excretas == 6
                              ? "Campo abierto"
                              : _vm.fila.excretas == 7
                              ? "Otro"
                              : ""
                          ) +
                          "\n          "
                      )
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _vm.fila.excretas == 7
              ? _c("div", { staticClass: "form-group row" }, [
                  _c("div", { staticClass: "col-lg-4" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("En otro lugar:")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(
                        "\n            " +
                          _vm._s(_vm.fila.otro_depositan_excretas) +
                          "\n          "
                      )
                    ])
                  ])
                ])
              : _vm._e(),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [_vm._v("La vivienda Tiene los Siguientes Ambientes Separados")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Cocina:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.cocina == "NA" ? "No Aplica" : _vm.fila.cocina
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Dormitorios:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.dormitorio_a == "NA"
                          ? "No Aplica"
                          : _vm.fila.plagas
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Sala Comedor:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.sala == "NA" ? "No Aplica" : _vm.fila.sala
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Sanitario:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.sanitario == "NA"
                          ? "No Aplica"
                          : _vm.fila.sanitario
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Lavadero:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.lavadero == "NA"
                          ? "No Aplica"
                          : _vm.fila.lavadero
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [
                  _vm._v(
                    "Almacena Junto A Los Alimentos Y/O Agua De Consumo Alguno De Los\n          Siguientes Productos"
                  )
                ]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Gasolina:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.gasolina == "NA"
                          ? "No Aplica"
                          : _vm.fila.gasolina
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Plaguicidas Agricolas:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.plaguicidas == "NA"
                          ? "No Aplica"
                          : _vm.fila.plaguicidas
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Detergentes/Desifectantes:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.detergentes == "NA"
                          ? "No Aplica"
                          : _vm.fila.detergentes
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Plaguicidas Para Insectos:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.plaguicidas_insectos == "NA"
                          ? "No Aplica"
                          : _vm.fila.plaguicidas_insectos
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "Uso Final Que Le Dan A Los Envases Vacios De Los\n            Plaguicidas:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.envases_vacios == "1"
                          ? "No Aplica"
                          : _vm.fila.envases_vacios == 2
                          ? "Guardar alimentos y agua"
                          : _vm.fila.envases_vacios == 3
                          ? "Para varios usos en el hogar"
                          : _vm.fila.envases_vacios == 4
                          ? "Los botan a la basura"
                          : _vm.fila.envases_vacios == 5
                          ? "Los entierran"
                          : _vm.fila.envases_vacios == 6
                          ? "Los queman"
                          : _vm.fila.envases_vacios == 7
                          ? "Otro"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.envases_vacios == 7
                ? _c("div", { staticClass: "col-lg-6" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otro uso:")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(
                        "\n            " +
                          _vm._s(_vm.fila.otro_envases_vacios) +
                          "\n          "
                      )
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "Con Que Tipo De Elementos Se Protegen Contra\n            Animales,Plagas:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.elementos_protecion == "1"
                          ? "Toldillos/mosquiteros"
                          : _vm.fila.elementos_protecion == 2
                          ? "Anjeos"
                          : _vm.fila.elementos_protecion == 3
                          ? "Fumigación con insecticidas/plaguicidas"
                          : _vm.fila.elementos_protecion == 4
                          ? "Raticidas"
                          : _vm.fila.elementos_protecion == 5
                          ? "Otro"
                          : _vm.fila.elementos_protecion == 6
                          ? "Ninguna"
                          : _vm.fila.elementos_protecion == 7
                          ? "No aplica"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.elementos_protecion == 5
                ? _c("div", { staticClass: "col-lg-6" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otros elementos de protección:")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(
                        "\n            " +
                          _vm._s(_vm.fila.otro_elementos_protecion) +
                          "\n          "
                      )
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Metodo de cocción de los alimentos:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.metodos_coccion == "NA"
                          ? "No Aplica"
                          : _vm.fila.metodos_coccion == 1
                          ? "Estufa a gas"
                          : _vm.fila.metodos_coccion == 2
                          ? "Estufa electrica"
                          : _vm.fila.metodos_coccion == 3
                          ? "Estufa a gasolina"
                          : _vm.fila.metodos_coccion == 4
                          ? "Leña"
                          : _vm.fila.metodos_coccion == 5
                          ? "Carbon"
                          : _vm.fila.metodos_coccion == 6
                          ? "Otro"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.metodos_coccion == 6
                ? _c("div", { staticClass: "col-lg-6" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otros Metodos de Cocción:")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(
                        "\n            " +
                          _vm._s(_vm.fila.otro_metodos_coccion) +
                          "\n          "
                      )
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "En cual de los siguientes lugares preparan los alimentos:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.lugares_preparan_alimentos == "NA"
                          ? "No Aplica"
                          : _vm.fila.lugares_preparan_alimentos == 1
                          ? "En un cuarto usado solo para cocinar"
                          : _vm.fila.lugares_preparan_alimentos == 2
                          ? "En un cuarto usado tambien para dormir"
                          : _vm.fila.lugares_preparan_alimentos == 3
                          ? "En una sala comedor con lavaplatos"
                          : _vm.fila.lugares_preparan_alimentos == 4
                          ? "En una sala comedor sin lavaplatos"
                          : _vm.fila.lugares_preparan_alimentos == 5
                          ? "En un patio comedor al aire libre"
                          : _vm.fila.lugares_preparan_alimentos == 6
                          ? "En ninguna parte(no preparan alimentos)"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Antes de consumir frutas y verduras las lava:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.lava_frutas == "NA"
                          ? "No Aplica"
                          : _vm.fila.lava_frutas
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Como conserva los alimentos:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.lugares_almacenan_alimentos == "NA"
                          ? "No Aplica"
                          : _vm.fila.lugares_almacenan_alimentos == 1
                          ? "Refrigerador"
                          : _vm.fila.lugares_almacenan_alimentos == 2
                          ? "Recipientes Abiertos"
                          : _vm.fila.lugares_almacenan_alimentos == 3
                          ? "Recipientes Cerrados"
                          : _vm.fila.lugares_almacenan_alimentos == 4
                          ? "Al aire libre dentro de la casa"
                          : _vm.fila.lugares_almacenan_alimentos == 5
                          ? "AL aire libre fuera de la casa"
                          : _vm.fila.lugares_almacenan_alimentos == 6
                          ? "Otro"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.lugares_almacenan_alimentos == 6
                ? _c("div", { staticClass: "col-lg-6" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otros Lugares de Almacenamiento:")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(
                        "\n            " +
                          _vm._s(_vm.fila.otro_lugares_almacenan_alimentos) +
                          "\n          "
                      )
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("¿Qué tipo de explotación se le está dando al suelo?:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.tipo_explotacion == "NA"
                          ? "No Aplica"
                          : _vm.fila.tipo_explotacion == 1
                          ? "Forestal"
                          : _vm.fila.tipo_explotacion == 2
                          ? "Estufa electrica"
                          : _vm.fila.tipo_explotacion == 3
                          ? "Estufa a gasolina"
                          : _vm.fila.tipo_explotacion == 4
                          ? "Leña"
                          : _vm.fila.tipo_explotacion == 5
                          ? "Carbon"
                          : _vm.fila.tipo_explotacion == 6
                          ? "Otro"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _vm.fila.tipo_explotacion == 6
                ? _c("div", { staticClass: "col-lg-6" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otros Metodos de Cocción:")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(
                        "\n            " +
                          _vm._s(_vm.fila.otro_tipo_explotacion) +
                          "\n          "
                      )
                    ])
                  ])
                : _vm._e()
            ]),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [
                  _vm._v(
                    "¿Cuáles son los tipos de residuos que se genera en su casa?"
                  )
                ]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Residuos Aprovechables:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.residuos_aprovechables == "NA"
                          ? "No Aplica"
                          : _vm.fila.residuos_aprovechables
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Residuos Organicos:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.residuos_organicos == "NA"
                          ? "No Aplica"
                          : _vm.fila.residuos_organicos
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Residuos No Aprovechables:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.residuos_no_aprovechables == "NA"
                          ? "No Aplica"
                          : _vm.fila.residuos_no_aprovechables
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Otros:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.otros_genera == "NA"
                          ? "No Aplica"
                          : _vm.fila.otros_genera
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _vm.fila.otros_genera == "SI"
              ? _c("div", { staticClass: "form-group row" }, [
                  _c("div", { staticClass: "col-lg-3" }, [
                    _c("label", { staticStyle: { "font-weight": "500" } }, [
                      _vm._v("Otros residuos:")
                    ]),
                    _vm._v(" "),
                    _c("div", [
                      _vm._v(
                        "\n            " +
                          _vm._s(_vm.fila.cual_genera) +
                          "\n          "
                      )
                    ])
                  ])
                ])
              : _vm._e(),
            _vm._v(" "),
            _c("div", {
              staticClass: "kt-separator kt-separator--border-dashed"
            }),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "¿Cuál es el tipo de combustible utilizado en su casa para\n            cocinar?:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.tipo_combustible == "NA"
                          ? "No Aplica"
                          : _vm.fila.tipo_combustible == 1
                          ? "Luz eléctrica"
                          : _vm.fila.tipo_combustible == 2
                          ? "Gasolina"
                          : _vm.fila.tipo_combustible == 3
                          ? "Leña"
                          : _vm.fila.tipo_combustible == 4
                          ? "Carbón"
                          : _vm.fila.tipo_combustible == 5
                          ? "Gas natural"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Su vivienda se encuentra en una zona de alto riesgo:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.zona_alto_riesgo == 0
                          ? "No Aplica"
                          : _vm.fila.zona_alto_riesgo == 1
                          ? "Ladera"
                          : _vm.fila.zona_alto_riesgo == 2
                          ? "Cuerpos de agua"
                          : _vm.fila.zona_alto_riesgo == 3
                          ? "suelo inestable, derrumbes"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "¿Existe un lugar apto para el almacenamiento de los residuos\n            antes de la recolección?:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.almacenamiento_residuos == "NA"
                          ? "No Aplica"
                          : _vm.fila.almacenamiento_residuos
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "¿Se presenta en tu barrio problemáticas de aguas negras?:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(_vm.fila.aguas_negras) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "Considera que su comunidad posee adecuadas zonas verdes como\n            parques:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.zonas_verdes == "NA"
                          ? "No Aplica"
                          : _vm.fila.zona_alto_riesgo == 1
                          ? "SI HAY"
                          : _vm.fila.zona_alto_riesgo == 2
                          ? "NO HAY"
                          : _vm.fila.zona_alto_riesgo == 3
                          ? "SI HAY EN MAL ESTADO"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "Cuantas veces los deslizamientos afectaron su comunidad o su\n            vivienda:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.desplazamientos == "NA"
                          ? "No Aplica"
                          : _vm.fila.desplazamientos == 1
                          ? "Más de 2 veces al año"
                          : _vm.fila.desplazamientos == 2
                          ? "Al menos una vez al año"
                          : _vm.fila.desplazamientos == 3
                          ? "Una vez cada 2 años"
                          : "Nunca"
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("¿Realiza usted rotación del cultivo? :")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.rotacion_cultivo == "NA"
                          ? "No Aplica"
                          : _vm.fila.rotacion_cultivo == 1
                          ? "Permanentemente"
                          : _vm.fila.rotacion_cultivo == 2
                          ? "Nunca"
                          : _vm.fila.rotacion_cultivo == 3
                          ? "Ocasional"
                          : _vm.fila.rotacion_cultivo == 4
                          ? "Periódicamente"
                          : _vm.fila.rotacion_cultivo == 5
                          ? "No Aplica"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "Emplea fertilizantes químicos o plaguicidas en su\n            actividad:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.emplea_fertilizantes == "NA"
                          ? "No Aplica"
                          : _vm.fila.emplea_fertilizantes
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("¿Usted realiza quema de cultivo?:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.quema_cultivo == "NA"
                          ? "No Aplica"
                          : _vm.fila.quema_cultivo
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "¿ha evidenciado usted mantenimiento preventivo a la red de\n            alcantarillado en su comunidad?:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.rotacion_cultivo == "NA"
                          ? "No Aplica"
                          : _vm.fila.rotacion_cultivo == 1
                          ? "Permanentemente"
                          : _vm.fila.rotacion_cultivo == 2
                          ? "Nunca"
                          : _vm.fila.rotacion_cultivo == 3
                          ? "Ocasional"
                          : _vm.fila.rotacion_cultivo == 4
                          ? "Periódicamente"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "Cuantas veces las inundaciones afectaron su comunidad o su\n            vivienda:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.veces_inundaciones == "NA"
                          ? "No Aplica"
                          : _vm.fila.veces_inundaciones == 1
                          ? "Más de 2 veces al año"
                          : _vm.fila.veces_inundaciones == 2
                          ? "Al menos una vez al año"
                          : _vm.fila.veces_inundaciones == 3
                          ? "Una vez cada 2 años"
                          : _vm.fila.veces_inundaciones == 4
                          ? "Nunca"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Fachada de la casa:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.fachada == "NA"
                          ? "No Aplica"
                          : _vm.fila.fachada == 1
                          ? "Permanentemente"
                          : _vm.fila.fachada == 2
                          ? "Nunca"
                          : _vm.fila.fachada == 3
                          ? "Ocasional"
                          : _vm.fila.fachada == 4
                          ? "Periódicamente"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("¿Cuantos baños de uso exclusivo tiene?:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.cuantos_baños == "NA"
                          ? "No Aplica"
                          : _vm.fila.cuantos_baños == 1
                          ? "No posee baño de uso exclusivo"
                          : _vm.fila.cuantos_baños == 2
                          ? "1 Baño"
                          : _vm.fila.cuantos_baños == 3
                          ? "2 Baños"
                          : _vm.fila.cuantos_baños == 4
                          ? "3 Baños ó mas"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Estado de conservacion de los baños:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.estado_conservacion_baños == "NA"
                          ? "No Aplica"
                          : _vm.fila.estado_conservacion_baños == 1
                          ? "Malo"
                          : _vm.fila.estado_conservacion_baños == 2
                          ? "Nunca"
                          : _vm.fila.estado_conservacion_baños == 3
                          ? "Ocasional"
                          : _vm.fila.estado_conservacion_baños == 4
                          ? "Periódicamente"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Estado de conservacion de los baños:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.estado_conservacion_baños == "NA"
                          ? "No Aplica"
                          : _vm.fila.estado_conservacion_baños == 1
                          ? "Malo"
                          : _vm.fila.estado_conservacion_baños == 2
                          ? "Nunca"
                          : _vm.fila.estado_conservacion_baños == 3
                          ? "Ocasional"
                          : _vm.fila.estado_conservacion_baños == 4
                          ? "Periódicamente"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Acabados externos de los muros ó paredes:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.acabados_externos == "NA"
                          ? "No Aplica"
                          : _vm.fila.acabados_externos == 1
                          ? "Sin cubrimiento"
                          : _vm.fila.acabados_externos == 2
                          ? "Pañete ó ladrillos presado"
                          : _vm.fila.acabados_externos == 3
                          ? "Estuco, Cerámica, Papel de Colgadura"
                          : _vm.fila.acabados_externos == 4
                          ? "Madera Piedra Ornamental"
                          : "Marmol, lujoso"
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-4" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v(
                    "Estado de Conservacion de las estructuras de la Vivienda:"
                  )
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.estado_conservacion_estructuras == "NA"
                          ? "No Aplica"
                          : _vm.fila.estado_conservacion_estructuras == 1
                          ? "Malo"
                          : _vm.fila.estado_conservacion_estructuras == 2
                          ? "Regular"
                          : _vm.fila.estado_conservacion_estructuras == 3
                          ? "Bueno"
                          : _vm.fila.estado_conservacion_estructuras == 4
                          ? "Excelente"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Mobiliario de la cocina:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.mobiliario_cocina == "NA"
                          ? "No Aplica"
                          : _vm.fila.mobiliario_cocina == 1
                          ? "Pobre"
                          : _vm.fila.mobiliario_cocina == 2
                          ? "Sencillo"
                          : _vm.fila.mobiliario_cocina == 3
                          ? "Regular"
                          : _vm.fila.mobiliario_cocina == 4
                          ? "Excelente"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-4" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("¿Estado de los andenes y bordillo de la vivienda?:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n            " +
                      _vm._s(
                        _vm.fila.andenes == "NA"
                          ? "No Aplica"
                          : _vm.fila.andenes == 1
                          ? "No tiene."
                          : _vm.fila.andenes == 2
                          ? "Si tiene, pavimentado"
                          : _vm.fila.andenes == 3
                          ? "Si tiene en mal estado"
                          : ""
                      ) +
                      "\n          "
                  )
                ])
              ])
            ]),
            _vm._v(" "),
            _c("p", [
              _c(
                "span",
                {
                  staticClass: "kt-font-boldest",
                  staticStyle: { "font-size": "18px" }
                },
                [_vm._v("Estratificación")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "row" }, [
              _c("div", { staticClass: "col-md-12" }, [
                _c("div", { staticClass: "table-responsive" }, [
                  _c("table", { staticClass: "table table-sm table-hover" }, [
                    _c("thead", {}, [
                      _c("tr", { staticClass: "kt-bg-fill-brand" }, [
                        _c("th", [_vm._v("No.")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("¿Cuenta ese Hogar con Internet?")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("¿Tiene computador de Escritorío?")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("¿Tiene Computador Portatil?")]),
                        _vm._v(" "),
                        _c("th", [
                          _vm._v("¿Cuantos celular en uso hay en el Hogar?")
                        ]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Tiene Equipo de sonido")]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Cuantos Tv a Color")]),
                        _vm._v(" "),
                        _c("th", [
                          _vm._v(
                            "Cuantos Vehiculos de Uso exclusivo tiene el Hogar"
                          )
                        ]),
                        _vm._v(" "),
                        _c("th", [
                          _vm._v(
                            "¿Cual es el nivel de Instrucción del jefe del Hogar?"
                          )
                        ]),
                        _vm._v(" "),
                        _c("th", [
                          _vm._v(
                            "¿Alguien en el Hogar posee afiliación de salud Privada o contribituva, prepagada ?"
                          )
                        ]),
                        _vm._v(" "),
                        _c("th", [
                          _vm._v("¿Ingresos mensuales por Hogar zona rural?")
                        ]),
                        _vm._v(" "),
                        _c("th", [
                          _vm._v("¿Ingresos mensuales por Hogar en Ciudad?")
                        ]),
                        _vm._v(" "),
                        _c("th", [_vm._v("Jefe del hogar")])
                      ])
                    ]),
                    _vm._v(" "),
                    _c(
                      "tbody",
                      _vm._l(_vm.fila.estratificacion, function(item, index) {
                        return _c(
                          "tr",
                          {
                            directives: [
                              {
                                name: "show",
                                rawName: "v-show",
                                value: item.estado == "Activo",
                                expression: "item.estado=='Activo'"
                              }
                            ],
                            key: index
                          },
                          [
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle"
                                }
                              },
                              [_vm._v(_vm._s(index + 1))]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.cuenta_internet))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.tiene_pc_escritorio))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.tiene_pc_portatil))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.texto_cuantos_celulares))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.tiene_equipo_sonido))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.texto_cuantos_tv_color))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.texto_cuantos_vehiculos))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.texto_nivel_instruccion))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.afiliacion_salud_privada))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.texto_ingresos_zona_rural))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.texto_ingresos_ciudad))
                                ])
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _c("span", { staticClass: "text-capitalize" }, [
                                  _vm._v(_vm._s(item.id_jefe))
                                ])
                              ]
                            )
                          ]
                        )
                      }),
                      0
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticClass: "kt-separator kt-separator--border-dashed"
                  })
                ])
              ])
            ])
          ])
        ]
      )
    ],
    1
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-portlet__head-label" }, [
      _c("h3", { staticClass: "kt-portlet__head-title" }, [
        _c("span", { staticClass: "kt-widget20__number kt-font-danger" }, [
          _vm._v("Listado de viviendas")
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("thead", {}, [
      _c("tr", { staticClass: "kt-bg-fill-brand" }, [
        _c("th", [_vm._v("No.")]),
        _vm._v(" "),
        _c("th", [_vm._v("Id")]),
        _vm._v(" "),
        _c("th", [_vm._v("Departamento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Municipio")]),
        _vm._v(" "),
        _c("th", [_vm._v("Corregimiento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Vereda")]),
        _vm._v(" "),
        _c("th", [_vm._v("Jefe de hogar")]),
        _vm._v(" "),
        _c("td", { staticClass: "text-center" }, [_vm._v("Opciones")])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Servicios/consultas.js":
/*!*********************************************!*\
  !*** ./resources/js/Servicios/consultas.js ***!
  \*********************************************/
/*! exports provided: iniciales, viviendas, viviendaspdf, jefe, jefespdf */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "iniciales", function() { return iniciales; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "viviendas", function() { return viviendas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "viviendaspdf", function() { return viviendaspdf; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "jefe", function() { return jefe; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "jefespdf", function() { return jefespdf; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function iniciales($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/vivienda/iniciales', $data);
}
function viviendas($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/vivienda/listar', $data);
}
function viviendaspdf($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/vivienda/listarpdf', $data);
}
function jefe($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/jefehogar/listar', $data);
}
function jefespdf($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/jefehogar/listarpdf', $data);
}

/***/ }),

/***/ "./resources/js/Vistas/Consultas/listadoviviendas.vue":
/*!************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/listadoviviendas.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _listadoviviendas_vue_vue_type_template_id_e9f1b276___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./listadoviviendas.vue?vue&type=template&id=e9f1b276& */ "./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=template&id=e9f1b276&");
/* harmony import */ var _listadoviviendas_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./listadoviviendas.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _listadoviviendas_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./listadoviviendas.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _listadoviviendas_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _listadoviviendas_vue_vue_type_template_id_e9f1b276___WEBPACK_IMPORTED_MODULE_0__["render"],
  _listadoviviendas_vue_vue_type_template_id_e9f1b276___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Consultas/listadoviviendas.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./listadoviviendas.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=style&index=0&lang=css&":
/*!*********************************************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=style&index=0&lang=css& ***!
  \*********************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./listadoviviendas.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=template&id=e9f1b276&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=template&id=e9f1b276& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_template_id_e9f1b276___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./listadoviviendas.vue?vue&type=template&id=e9f1b276& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadoviviendas.vue?vue&type=template&id=e9f1b276&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_template_id_e9f1b276___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_listadoviviendas_vue_vue_type_template_id_e9f1b276___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);