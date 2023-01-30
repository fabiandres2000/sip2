(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[29],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=script&lang=js&":
/*!***************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=script&lang=js& ***!
  \***************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vue_html2pdf__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-html2pdf */ "./node_modules/vue-html2pdf/dist/vue-html2pdf.esm.js");
/* harmony import */ var vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! vue-easy-pie-chart */ "./node_modules/vue-easy-pie-chart/dist/vue-easy-pie-chart.common.js");
/* harmony import */ var vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var vue_easy_pie_chart_dist_vue_easy_pie_chart_css__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! vue-easy-pie-chart/dist/vue-easy-pie-chart.css */ "./node_modules/vue-easy-pie-chart/dist/vue-easy-pie-chart.css");
/* harmony import */ var vue_easy_pie_chart_dist_vue_easy_pie_chart_css__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(vue_easy_pie_chart_dist_vue_easy_pie_chart_css__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var easy_circular_progress__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! easy-circular-progress */ "./node_modules/easy-circular-progress/dist/easy-circular-progress.umd.min.js");
/* harmony import */ var easy_circular_progress__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(easy_circular_progress__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var vue2_circle_progress__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue2-circle-progress */ "./node_modules/vue2-circle-progress/dist/vue-circle-progress.js");
/* harmony import */ var vue2_circle_progress__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue2_circle_progress__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _Servicios_informes__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../Servicios/informes */ "./resources/js/Servicios/informes.js");
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! @amcharts/amcharts4/charts */ "./node_modules/@amcharts/amcharts4/charts.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");
/* harmony import */ var vue_loading_overlay__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! vue-loading-overlay */ "./node_modules/vue-loading-overlay/dist/vue-loading.min.js");
/* harmony import */ var vue_loading_overlay__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(vue_loading_overlay__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ../../store */ "./resources/js/store.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }










_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_7__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_9__["default"]);


/* harmony default export */ __webpack_exports__["default"] = ({
  components: {
    VueHtml2pdf: vue_html2pdf__WEBPACK_IMPORTED_MODULE_1__["default"],
    VueEasyPieChart: vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_2___default.a,
    Progress: easy_circular_progress__WEBPACK_IMPORTED_MODULE_4___default.a,
    VueCircle: vue2_circle_progress__WEBPACK_IMPORTED_MODULE_5___default.a,
    Loading: vue_loading_overlay__WEBPACK_IMPORTED_MODULE_10___default.a
  },
  mounted: function mounted() {
    this.riesgos_salud();
  },
  data: function data() {
    return {
      poblacion_array: null,
      isLoading: false,
      rutaPdf: "",
      chart_alteraciones_transtornos_audicion: null
    };
  },
  methods: {
    riesgos_salud: function riesgos_salud() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return _Servicios_informes__WEBPACK_IMPORTED_MODULE_6__["riesgos_salud"]().then(function (respuesta) {
                  _this.poblacion_array = respuesta.data;

                  _this.grafica_alteraciones_transtornos_audicion(_this.poblacion_array.alteraciones_transtornos_audicion);
                })["catch"](function (err) {
                  console.log(err);
                });

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    grafica_alteraciones_transtornos_audicion: function grafica_alteraciones_transtornos_audicion(array) {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                if (_this2.chart_desempleo != null) {
                  _this2.chart_desempleo.dispose();
                }

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_7__["create"]("chartdiv_alteraciones_transtornos_audicion", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_8__["PieChart3D"]);
                _this2.chart_desempleo = chart;
                chart.data = [{
                  category: "Alto",
                  first: array.alto
                }, {
                  category: "Moderado",
                  first: array.moderado
                }, {
                  category: "Bajo",
                  first: array.bajo
                }, {
                  category: "Inexistente",
                  first: array.inexistente
                }];
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_8__["PieSeries3D"]());
                series.dataFields.value = "first";
                series.dataFields.category = "category";

              case 7:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    generarPDF: function () {
      var _generarPDF = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var _this3 = this;

        var options, chart_torta_edades, chart_no_asegurado_1, chart_no_asegurado_2, chart_poblacion_pobreza, chart_escolaridad, chart_desempleo, chart_acueducto, chart_alcantarillado, chart_cronica, chart_infecciosa, chart_discapacidad, chart_embarazo, chart_inmunizacion, chart_peso_para_talla, chart_talla_para_edad, chart_imc, chart_imc_5_17, chart_imc_5_17_e, chart_imc_18_60, chart_imc_18_60_e, parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                this.isLoading = true;
                options = {
                  type: 'dataURL',
                  useCORS: true
                };
                _context3.next = 4;
                return this.chart_torta_edades.exporting.getImage("png");

              case 4:
                chart_torta_edades = _context3.sent;
                _context3.next = 7;
                return this.chart_no_asegurado_1.exporting.getImage("png");

              case 7:
                chart_no_asegurado_1 = _context3.sent;
                _context3.next = 10;
                return this.chart_no_asegurado_2.exporting.getImage("png");

              case 10:
                chart_no_asegurado_2 = _context3.sent;
                _context3.next = 13;
                return this.chart_poblacion_pobreza.exporting.getImage("png");

              case 13:
                chart_poblacion_pobreza = _context3.sent;
                _context3.next = 16;
                return this.chart_escolaridad.exporting.getImage("png");

              case 16:
                chart_escolaridad = _context3.sent;
                _context3.next = 19;
                return this.chart_desempleo.exporting.getImage("png");

              case 19:
                chart_desempleo = _context3.sent;
                _context3.next = 22;
                return this.chart_acueducto.exporting.getImage("png");

              case 22:
                chart_acueducto = _context3.sent;
                _context3.next = 25;
                return this.chart_alcantarillado.exporting.getImage("png");

              case 25:
                chart_alcantarillado = _context3.sent;
                _context3.next = 28;
                return this.chart_cronica.exporting.getImage("png");

              case 28:
                chart_cronica = _context3.sent;
                _context3.next = 31;
                return this.chart_infecciosa.exporting.getImage("png");

              case 31:
                chart_infecciosa = _context3.sent;
                _context3.next = 34;
                return this.chart_discapacidad.exporting.getImage("png");

              case 34:
                chart_discapacidad = _context3.sent;
                _context3.next = 37;
                return this.chart_embarazo.exporting.getImage("png");

              case 37:
                chart_embarazo = _context3.sent;
                _context3.next = 40;
                return this.chart_inmunizacion.exporting.getImage("png");

              case 40:
                chart_inmunizacion = _context3.sent;
                _context3.next = 43;
                return this.chart_peso_para_talla.exporting.getImage("png");

              case 43:
                chart_peso_para_talla = _context3.sent;
                _context3.next = 46;
                return this.chart_talla_para_edad.exporting.getImage("png");

              case 46:
                chart_talla_para_edad = _context3.sent;
                _context3.next = 49;
                return this.chart_imc.exporting.getImage("png");

              case 49:
                chart_imc = _context3.sent;
                _context3.next = 52;
                return this.chart_imc_5_17.exporting.getImage("png");

              case 52:
                chart_imc_5_17 = _context3.sent;
                _context3.next = 55;
                return this.chart_imc_5_17_e.exporting.getImage("png");

              case 55:
                chart_imc_5_17_e = _context3.sent;
                _context3.next = 58;
                return this.chart_imc_18_60.exporting.getImage("png");

              case 58:
                chart_imc_18_60 = _context3.sent;
                _context3.next = 61;
                return this.chart_imc_18_60_e.exporting.getImage("png");

              case 61:
                chart_imc_18_60_e = _context3.sent;
                parametros = {
                  _token: this.csrf,
                  poblacion_array: this.poblacion_array,
                  poblacion_no_asegurada: this.poblacion_no_asegurada,
                  chart_torta_edades: chart_torta_edades,
                  chart_no_asegurado_1: chart_no_asegurado_1,
                  chart_no_asegurado_2: chart_no_asegurado_2,
                  determinante_salud_array: this.determinante_salud_array,
                  chart_poblacion_pobreza: chart_poblacion_pobreza,
                  chart_escolaridad: chart_escolaridad,
                  chart_desempleo: chart_desempleo,
                  chart_acueducto: chart_acueducto,
                  chart_alcantarillado: chart_alcantarillado,
                  condiciones_salud_array: this.condiciones_salud_array,
                  chart_cronica: chart_cronica,
                  chart_infecciosa: chart_infecciosa,
                  chart_discapacidad: chart_discapacidad,
                  chart_embarazo: chart_embarazo,
                  chart_inmunizacion: chart_inmunizacion,
                  chart_peso_para_talla: chart_peso_para_talla,
                  chart_talla_para_edad: chart_talla_para_edad,
                  chart_imc: chart_imc,
                  chart_imc_5_17: chart_imc_5_17,
                  chart_imc_5_17_e: chart_imc_5_17_e,
                  chart_imc_18_60: chart_imc_18_60,
                  chart_imc_18_60_e: chart_imc_18_60_e
                };
                _context3.prev = 63;
                _context3.next = 66;
                return _Servicios_informes__WEBPACK_IMPORTED_MODULE_6__["exportarGeneralSalud"](parametros).then(function (respuesta) {
                  _this3.rutaPdf = _store__WEBPACK_IMPORTED_MODULE_11__["default"].state.apiURL + respuesta.data.nombre;
                  _this3.isLoading = false;

                  _this3.$refs.modalpdf.show();
                });

              case 66:
                _context3.next = 71;
                break;

              case 68:
                _context3.prev = 68;
                _context3.t0 = _context3["catch"](63);
                this.$swal("Error...!", "Ocurrio un error!", "error");

              case 71:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3, this, [[63, 68]]);
      }));

      function generarPDF() {
        return _generarPDF.apply(this, arguments);
      }

      return generarPDF;
    }(),
    cerrarModal: function cerrarModal() {
      this.$refs.modalpdf.hide();
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=style&index=0&lang=css&":
/*!**********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=style&index=0&lang=css& ***!
  \**********************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.li_li {\n    padding-top: 7px;\n    padding-bottom: 7px;\n}\np{\n    line-height: 200%;\n}\n#divPadre {\n    text-align:center;\n}\n#divHijo {\n    width:25cm;\n    margin:0px auto;\n}\n.table_data {\n    width: 100%;\n    font-size: 13px;\n    border-collapse: collapse;\n}\n.table_data thead {\n    padding: 0.3em;\n    color: #fff;\n    background: #5578eb;\n}\n.table_data thead tr th, .table_data tbody tr td {\n    text-align: left;\n    vertical-align: top;\n    padding: 0.3em;\n    caption-side: bottom;\n}\n.table_data tbody tr:nth-child(odd) {\n    background-color: #fff;\n}\n.table_data tbody tr:nth-child(even) {\n    background-color: #f1f1f1;\n}\n.nav-pills, .nav-tabs {\n    margin: 0 0 -10px 0 !important;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=style&index=0&lang=css&":
/*!**************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=style&index=0&lang=css& ***!
  \**************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./riesgoSalud.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=template&id=0bb26523&":
/*!*******************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=template&id=0bb26523& ***!
  \*******************************************************************************************************************************************************************************************************************/
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
    { staticStyle: { "margin-top": "4%" }, attrs: { id: "divPadre" } },
    [
      _c("loading", {
        attrs: {
          active: _vm.isLoading,
          "can-cancel": true,
          loader: "dots",
          height: 128,
          width: 128,
          color: "#007bff",
          "is-full-page": true
        },
        on: {
          "update:active": function($event) {
            _vm.isLoading = $event
          }
        }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "row", attrs: { id: "divHijo" } }, [
        _c("div", { staticClass: "col-lg-12" }, [
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("div", { staticClass: "row" }, [
                _vm._m(0),
                _vm._v(" "),
                _c("div", { staticClass: "col-sm-3 text-right" }, [
                  _c(
                    "button",
                    {
                      staticClass: "btn btn-danger",
                      attrs: { type: "button" },
                      on: { click: _vm.generarPDF }
                    },
                    [
                      _c("i", { staticClass: "la la-pdf" }),
                      _vm._v(" "),
                      _c("span", { staticClass: "kt-hidden-mobile" }, [
                        _vm._v("Generar PDF")
                      ])
                    ]
                  )
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card" }, [
            _c(
              "div",
              {
                staticClass: "card-body",
                staticStyle: { "text-align": "left" }
              },
              [
                _c("div", { staticClass: "row" }, [
                  _c("h4", { staticStyle: { color: "#fd397a" } }, [
                    _vm._v(
                      "Alteraciones Y Transtornos De La Audición Y Comunicación"
                    )
                  ]),
                  _vm._v(" "),
                  _c("br"),
                  _vm._v(" "),
                  _vm.poblacion_array != null
                    ? _c(
                        "div",
                        {
                          staticClass: "col-lg-6",
                          staticStyle: { "padding-top": "30px" }
                        },
                        [
                          _c("h5", [
                            _vm._v("De "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_array
                                    .alteraciones_transtornos_audicion
                                    .numero_personas
                                ) + " Personas"
                              )
                            ]),
                            _vm._v(", se tiene que: ")
                          ]),
                          _vm._v(" "),
                          _c("ul", [
                            _c("li", { staticClass: "li_li" }, [
                              _c("strong", [_vm._v("Nivel de Riesgo Alto: ")]),
                              _vm._v(
                                " " +
                                  _vm._s(
                                    _vm.poblacion_array
                                      .alteraciones_transtornos_audicion.alto
                                  ) +
                                  " Personas"
                              )
                            ]),
                            _vm._v(" "),
                            _c("li", { staticClass: "li_li" }, [
                              _c("strong", [
                                _vm._v("Nivel de Riesgo Moderado: ")
                              ]),
                              _vm._v(
                                " " +
                                  _vm._s(
                                    _vm.poblacion_array
                                      .alteraciones_transtornos_audicion
                                      .moderado
                                  ) +
                                  " Personas"
                              )
                            ]),
                            _vm._v(" "),
                            _c("li", { staticClass: "li_li" }, [
                              _c("strong", [_vm._v("Nivel de Riesgo Bajo: ")]),
                              _vm._v(
                                " " +
                                  _vm._s(
                                    _vm.poblacion_array
                                      .alteraciones_transtornos_audicion.bajo
                                  ) +
                                  " Personas"
                              )
                            ]),
                            _vm._v(" "),
                            _c("li", { staticClass: "li_li" }, [
                              _c("strong", [
                                _vm._v("Nivel de Riesgo nexistente: ")
                              ]),
                              _vm._v(
                                " " +
                                  _vm._s(
                                    _vm.poblacion_array
                                      .alteraciones_transtornos_audicion
                                      .inexistente
                                  ) +
                                  " Personas"
                              )
                            ])
                          ])
                        ]
                      )
                    : _vm._e(),
                  _vm._v(" "),
                  _vm._m(1),
                  _vm._v(" "),
                  _vm.poblacion_array != null
                    ? _c(
                        "div",
                        {
                          staticClass: "col-lg-12",
                          staticStyle: { "padding-top": "30px" }
                        },
                        [
                          _c("h5", [
                            _vm._v("De esas "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_array
                                    .alteraciones_transtornos_audicion.alto
                                ) + " Personas"
                              )
                            ]),
                            _vm._v(" que se encuentran en nivel de riesgo "),
                            _c("strong", [_vm._v('"Alto" ')]),
                            _vm._v("se tiene que: ")
                          ]),
                          _vm._v(" "),
                          _c("p", [
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_array
                                    .alteraciones_transtornos_audicion
                                    .porcentaje_femeninos_alto
                                ) + "%"
                              )
                            ]),
                            _vm._v(" son de genero Femenino, "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_array
                                    .alteraciones_transtornos_audicion
                                    .porcentaje_masculinos_alto
                                ) + "%"
                              )
                            ]),
                            _vm._v(" son de genero Masculino, ademas el "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_array
                                    .alteraciones_transtornos_audicion
                                    .porcentaje_zona_urbana
                                ) + "%"
                              )
                            ]),
                            _vm._v(" se encuentra en la zona urbana, y el "),
                            _c("strong", [
                              _vm._v(
                                _vm._s(
                                  _vm.poblacion_array
                                    .alteraciones_transtornos_audicion
                                    .porcentaje_zona_rural
                                ) + "%"
                              )
                            ]),
                            _vm._v(" se encuentra en zona rural.")
                          ])
                        ]
                      )
                    : _vm._e()
                ])
              ]
            )
          ])
        ])
      ]),
      _vm._v(" "),
      _c(
        "b-modal",
        {
          ref: "modalpdf",
          attrs: {
            "hide-footer": "",
            title: "INFORME GENERAL RIESGOS DE SALUD",
            size: "xl",
            centered: "",
            "header-bg-variant": "danger",
            "header-text-variant": "light",
            "no-close-on-backdrop": true
          }
        },
        [
          _c("embed", {
            attrs: {
              id: "divPdf",
              src: _vm.rutaPdf,
              type: "application/pdf",
              width: "100%",
              height: "650px"
            }
          }),
          _vm._v(" "),
          _c("hr"),
          _vm._v(" "),
          _c("div", { staticClass: "text-right" }, [
            _c(
              "button",
              {
                staticClass: "btn btn-warning",
                attrs: { type: "button" },
                on: { click: _vm.cerrarModal }
              },
              [
                _c("i", { staticClass: "fa fa-window-close" }),
                _vm._v(" Cancelar\n            ")
              ]
            )
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
    return _c(
      "div",
      { staticClass: "col-sm-9", staticStyle: { "text-align": "left" } },
      [_c("h4", [_vm._v("INFORME GENERAL RIESGOS DE SALUD")])]
    )
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "div",
      {
        staticClass: "col-lg-6 text-center",
        staticStyle: { "padding-top": "30px" }
      },
      [
        _c("div", {
          staticStyle: { width: "100%", height: "180px" },
          attrs: { id: "chartdiv_alteraciones_transtornos_audicion" }
        })
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loading-overlay/dist/vue-loading.min.js":
/*!******************************************************************!*\
  !*** ./node_modules/vue-loading-overlay/dist/vue-loading.min.js ***!
  \******************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

!function(t,e){ true?module.exports=e():undefined}("undefined"!=typeof self?self:this,(function(){return function(t){var e={};function i(n){if(e[n])return e[n].exports;var r=e[n]={i:n,l:!1,exports:{}};return t[n].call(r.exports,r,r.exports,i),r.l=!0,r.exports}return i.m=t,i.c=e,i.d=function(t,e,n){i.o(t,e)||Object.defineProperty(t,e,{enumerable:!0,get:n})},i.r=function(t){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(t,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(t,"__esModule",{value:!0})},i.t=function(t,e){if(1&e&&(t=i(t)),8&e)return t;if(4&e&&"object"==typeof t&&t&&t.__esModule)return t;var n=Object.create(null);if(i.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:t}),2&e&&"string"!=typeof t)for(var r in t)i.d(n,r,function(e){return t[e]}.bind(null,r));return n},i.n=function(t){var e=t&&t.__esModule?function(){return t.default}:function(){return t};return i.d(e,"a",e),e},i.o=function(t,e){return Object.prototype.hasOwnProperty.call(t,e)},i.p="",i(i.s=1)}([function(t,e,i){},function(t,e,i){"use strict";i.r(e);var n="undefined"!=typeof window?window.HTMLElement:Object,r={mounted:function(){this.enforceFocus&&document.addEventListener("focusin",this.focusIn)},methods:{focusIn:function(t){if(this.isActive&&t.target!==this.$el&&!this.$el.contains(t.target)){var e=this.container?this.container:this.isFullPage?null:this.$el.parentElement;(this.isFullPage||e&&e.contains(t.target))&&(t.preventDefault(),this.$el.focus())}}},beforeDestroy:function(){document.removeEventListener("focusin",this.focusIn)}};function a(t,e,i,n,r,a,o,s){var l,u="function"==typeof t?t.options:t;if(e&&(u.render=e,u.staticRenderFns=i,u._compiled=!0),n&&(u.functional=!0),a&&(u._scopeId="data-v-"+a),o?(l=function(t){(t=t||this.$vnode&&this.$vnode.ssrContext||this.parent&&this.parent.$vnode&&this.parent.$vnode.ssrContext)||"undefined"==typeof __VUE_SSR_CONTEXT__||(t=__VUE_SSR_CONTEXT__),r&&r.call(this,t),t&&t._registeredComponents&&t._registeredComponents.add(o)},u._ssrRegister=l):r&&(l=s?function(){r.call(this,(u.functional?this.parent:this).$root.$options.shadowRoot)}:r),l)if(u.functional){u._injectStyles=l;var c=u.render;u.render=function(t,e){return l.call(e),c(t,e)}}else{var d=u.beforeCreate;u.beforeCreate=d?[].concat(d,l):[l]}return{exports:t,options:u}}var o=a({name:"spinner",props:{color:{type:String,default:"#000"},height:{type:Number,default:64},width:{type:Number,default:64}}},(function(){var t=this.$createElement,e=this._self._c||t;return e("svg",{attrs:{viewBox:"0 0 38 38",xmlns:"http://www.w3.org/2000/svg",width:this.width,height:this.height,stroke:this.color}},[e("g",{attrs:{fill:"none","fill-rule":"evenodd"}},[e("g",{attrs:{transform:"translate(1 1)","stroke-width":"2"}},[e("circle",{attrs:{"stroke-opacity":".25",cx:"18",cy:"18",r:"18"}}),e("path",{attrs:{d:"M36 18c0-9.94-8.06-18-18-18"}},[e("animateTransform",{attrs:{attributeName:"transform",type:"rotate",from:"0 18 18",to:"360 18 18",dur:"0.8s",repeatCount:"indefinite"}})],1)])])])}),[],!1,null,null,null).exports,s=a({name:"dots",props:{color:{type:String,default:"#000"},height:{type:Number,default:240},width:{type:Number,default:60}}},(function(){var t=this.$createElement,e=this._self._c||t;return e("svg",{attrs:{viewBox:"0 0 120 30",xmlns:"http://www.w3.org/2000/svg",fill:this.color,width:this.width,height:this.height}},[e("circle",{attrs:{cx:"15",cy:"15",r:"15"}},[e("animate",{attrs:{attributeName:"r",from:"15",to:"15",begin:"0s",dur:"0.8s",values:"15;9;15",calcMode:"linear",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"fill-opacity",from:"1",to:"1",begin:"0s",dur:"0.8s",values:"1;.5;1",calcMode:"linear",repeatCount:"indefinite"}})]),e("circle",{attrs:{cx:"60",cy:"15",r:"9","fill-opacity":"0.3"}},[e("animate",{attrs:{attributeName:"r",from:"9",to:"9",begin:"0s",dur:"0.8s",values:"9;15;9",calcMode:"linear",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"fill-opacity",from:"0.5",to:"0.5",begin:"0s",dur:"0.8s",values:".5;1;.5",calcMode:"linear",repeatCount:"indefinite"}})]),e("circle",{attrs:{cx:"105",cy:"15",r:"15"}},[e("animate",{attrs:{attributeName:"r",from:"15",to:"15",begin:"0s",dur:"0.8s",values:"15;9;15",calcMode:"linear",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"fill-opacity",from:"1",to:"1",begin:"0s",dur:"0.8s",values:"1;.5;1",calcMode:"linear",repeatCount:"indefinite"}})])])}),[],!1,null,null,null).exports,l=a({name:"bars",props:{color:{type:String,default:"#000"},height:{type:Number,default:40},width:{type:Number,default:40}}},(function(){var t=this.$createElement,e=this._self._c||t;return e("svg",{attrs:{xmlns:"http://www.w3.org/2000/svg",viewBox:"0 0 30 30",height:this.height,width:this.width,fill:this.color}},[e("rect",{attrs:{x:"0",y:"13",width:"4",height:"5"}},[e("animate",{attrs:{attributeName:"height",attributeType:"XML",values:"5;21;5",begin:"0s",dur:"0.6s",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"y",attributeType:"XML",values:"13; 5; 13",begin:"0s",dur:"0.6s",repeatCount:"indefinite"}})]),e("rect",{attrs:{x:"10",y:"13",width:"4",height:"5"}},[e("animate",{attrs:{attributeName:"height",attributeType:"XML",values:"5;21;5",begin:"0.15s",dur:"0.6s",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"y",attributeType:"XML",values:"13; 5; 13",begin:"0.15s",dur:"0.6s",repeatCount:"indefinite"}})]),e("rect",{attrs:{x:"20",y:"13",width:"4",height:"5"}},[e("animate",{attrs:{attributeName:"height",attributeType:"XML",values:"5;21;5",begin:"0.3s",dur:"0.6s",repeatCount:"indefinite"}}),e("animate",{attrs:{attributeName:"y",attributeType:"XML",values:"13; 5; 13",begin:"0.3s",dur:"0.6s",repeatCount:"indefinite"}})])])}),[],!1,null,null,null).exports,u=a({name:"vue-loading",mixins:[r],props:{active:Boolean,programmatic:Boolean,container:[Object,Function,n],isFullPage:{type:Boolean,default:!0},enforceFocus:{type:Boolean,default:!0},lockScroll:{type:Boolean,default:!1},transition:{type:String,default:"fade"},canCancel:Boolean,onCancel:{type:Function,default:function(){}},color:String,backgroundColor:String,blur:{type:String,default:"2px"},opacity:Number,width:Number,height:Number,zIndex:Number,loader:{type:String,default:"spinner"}},data:function(){return{isActive:this.active}},components:{Spinner:o,Dots:s,Bars:l},beforeMount:function(){this.programmatic&&(this.container?(this.isFullPage=!1,this.container.appendChild(this.$el)):document.body.appendChild(this.$el))},mounted:function(){this.programmatic&&(this.isActive=!0),document.addEventListener("keyup",this.keyPress)},methods:{cancel:function(){this.canCancel&&this.isActive&&(this.hide(),this.onCancel.apply(null,arguments))},hide:function(){var t=this;this.$emit("hide"),this.$emit("update:active",!1),this.programmatic&&(this.isActive=!1,setTimeout((function(){var e;t.$destroy(),void 0!==(e=t.$el).remove?e.remove():e.parentNode.removeChild(e)}),150))},disableScroll:function(){this.isFullPage&&this.lockScroll&&document.body.classList.add("vld-shown")},enableScroll:function(){this.isFullPage&&this.lockScroll&&document.body.classList.remove("vld-shown")},keyPress:function(t){27===t.keyCode&&this.cancel()}},watch:{active:function(t){this.isActive=t},isActive:function(t){t?this.disableScroll():this.enableScroll()}},computed:{bgStyle:function(){return{background:this.backgroundColor,opacity:this.opacity,backdropFilter:"blur(".concat(this.blur,")")}}},beforeDestroy:function(){document.removeEventListener("keyup",this.keyPress)}},(function(){var t=this,e=t.$createElement,i=t._self._c||e;return i("transition",{attrs:{name:t.transition}},[i("div",{directives:[{name:"show",rawName:"v-show",value:t.isActive,expression:"isActive"}],staticClass:"vld-overlay is-active",class:{"is-full-page":t.isFullPage},style:{zIndex:t.zIndex},attrs:{tabindex:"0","aria-busy":t.isActive,"aria-label":"Loading"}},[i("div",{staticClass:"vld-background",style:t.bgStyle,on:{click:function(e){return e.preventDefault(),t.cancel(e)}}}),i("div",{staticClass:"vld-icon"},[t._t("before"),t._t("default",[i(t.loader,{tag:"component",attrs:{color:t.color,width:t.width,height:t.height}})]),t._t("after")],2)])])}),[],!1,null,null,null).exports,c=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{};return{show:function(){var n=arguments.length>0&&void 0!==arguments[0]?arguments[0]:e,r=arguments.length>1&&void 0!==arguments[1]?arguments[1]:i,a={programmatic:!0},o=Object.assign({},e,n,a),s=new(t.extend(u))({el:document.createElement("div"),propsData:o}),l=Object.assign({},i,r);return Object.keys(l).map((function(t){s.$slots[t]=l[t]})),s}}};i(0);u.install=function(t){var e=arguments.length>1&&void 0!==arguments[1]?arguments[1]:{},i=arguments.length>2&&void 0!==arguments[2]?arguments[2]:{},n=c(t,e,i);t.$loading=n,t.prototype.$loading=n};e.default=u}]).default}));

/***/ }),

/***/ "./resources/js/Servicios/informes.js":
/*!********************************************!*\
  !*** ./resources/js/Servicios/informes.js ***!
  \********************************************/
/*! exports provided: inicialesMigrantes, poblacion_no_asegurada, determinante_salud, condiciones_salud, exportarGeneralSalud, riesgos_salud */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "inicialesMigrantes", function() { return inicialesMigrantes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "poblacion_no_asegurada", function() { return poblacion_no_asegurada; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "determinante_salud", function() { return determinante_salud; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "condiciones_salud", function() { return condiciones_salud; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarGeneralSalud", function() { return exportarGeneralSalud; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "riesgos_salud", function() { return riesgos_salud; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function inicialesMigrantes($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/informes/migrantes', $data);
}
function poblacion_no_asegurada() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/informes/poblacion-no-asegurada');
}
function determinante_salud() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/informes/determinante-salud');
}
function condiciones_salud() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/informes/condiciones-salud');
}
function exportarGeneralSalud($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/informes/exportar-general-salud', $data);
}
function riesgos_salud() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/informes/riesgos-salud');
}

/***/ }),

/***/ "./resources/js/Vistas/informes/riesgoSalud.vue":
/*!******************************************************!*\
  !*** ./resources/js/Vistas/informes/riesgoSalud.vue ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _riesgoSalud_vue_vue_type_template_id_0bb26523___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./riesgoSalud.vue?vue&type=template&id=0bb26523& */ "./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=template&id=0bb26523&");
/* harmony import */ var _riesgoSalud_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./riesgoSalud.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _riesgoSalud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./riesgoSalud.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _riesgoSalud_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _riesgoSalud_vue_vue_type_template_id_0bb26523___WEBPACK_IMPORTED_MODULE_0__["render"],
  _riesgoSalud_vue_vue_type_template_id_0bb26523___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/informes/riesgoSalud.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=script&lang=js&":
/*!*******************************************************************************!*\
  !*** ./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./riesgoSalud.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************!*\
  !*** ./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./riesgoSalud.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=template&id=0bb26523&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=template&id=0bb26523& ***!
  \*************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_template_id_0bb26523___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./riesgoSalud.vue?vue&type=template&id=0bb26523& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/informes/riesgoSalud.vue?vue&type=template&id=0bb26523&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_template_id_0bb26523___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_riesgoSalud_vue_vue_type_template_id_0bb26523___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);