(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[41],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @amcharts/amcharts4/charts */ "./node_modules/@amcharts/amcharts4/charts.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");
/* harmony import */ var _Servicios_indicadores__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../Servicios/indicadores */ "./resources/js/Servicios/indicadores.js");
/* harmony import */ var vue_apexcharts__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue-apexcharts */ "./node_modules/vue-apexcharts/dist/vue-apexcharts.js");
/* harmony import */ var vue_apexcharts__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue_apexcharts__WEBPACK_IMPORTED_MODULE_5__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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






_amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]);
/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {
    this.calcular();
  },
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      datos: {
        nro_mujeres_embarazadas: 0,
        porcentaje_embarazadas: 0,
        nro_adolescentes_embarazadas: 0,
        nro_adolescentes_desescolarizadas: 0,
        nro_adolescentes_lactantes: 0,
        embarazos_vih: 0,
        porcentaje_atencion_prenatal: 0,
        razon_gestantes_sin_atencion_prental: 0,
        nro_gestantes: 0,
        grupo_510: 0,
        grupo_1117: 0,
        grupo_1828: 0,
        grupo_2959: 0,
        gestantes_grupo_510: 0,
        gestantes_grupo_1117: 0,
        gestantes_grupo_1828: 0,
        gestantes_grupo_2959: 0
      },
      series: [],
      series_barra: []
    };
  },
  methods: {
    calcular: function calcular() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                data = {
                  _token: _this.csrf
                };
                _context.next = 3;
                return _Servicios_indicadores__WEBPACK_IMPORTED_MODULE_4__["gestantes"](data).then(function (respuesta) {
                  _this.datos = respuesta.data["cantidades"];

                  _this.series.push({
                    edad: "6-11",
                    gestantes: _this.datos.grupo_510
                  });

                  _this.series.push({
                    edad: "12-17",
                    gestantes: _this.datos.grupo_1117
                  });

                  _this.series.push({
                    edad: "18-28",
                    gestantes: _this.datos.grupo_1828
                  });

                  _this.series.push({
                    edad: "29-59",
                    gestantes: _this.datos.grupo_2959
                  });

                  _this.series_barra.push({
                    edad: "6-11",
                    gestantes: _this.datos.gestantes_grupo_510
                  });

                  _this.series_barra.push({
                    edad: "12-17",
                    gestantes: _this.datos.gestantes_grupo_1117
                  });

                  _this.series_barra.push({
                    edad: "18-28",
                    gestantes: _this.datos.gestantes_grupo_1828
                  });

                  _this.series_barra.push({
                    edad: "29-59",
                    gestantes: _this.datos.gestantes_grupo_2959
                  });

                  _this.grafica_de_pie();

                  _this.grafica_barra();
                })["catch"](function (err) {
                  console.log(err);
                });

              case 3:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    grafica_de_pie: function grafica_de_pie() {
      // Themes begin
      _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end

      var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartdiv", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieChart3D"]);
      chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

      chart.legend = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["Legend"]();
      chart.data = this.series;
      var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieSeries3D"]());
      series.dataFields.value = "gestantes";
      series.dataFields.category = "edad";
    },
    grafica_barra: function grafica_barra() {
      // Themes begin
      _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end
      // Create chart instance

      var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartbarra", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYChart3D"]); // Add data

      chart.data = this.series_barra; // Create axes

      var categoryAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["CategoryAxis"]());
      categoryAxis.dataFields.category = "edad";
      categoryAxis.renderer.labels.template.rotation = 270;
      categoryAxis.renderer.labels.template.hideOversized = false;
      categoryAxis.renderer.minGridDistance = 20;
      categoryAxis.renderer.labels.template.horizontalCenter = "right";
      categoryAxis.renderer.labels.template.verticalCenter = "middle";
      categoryAxis.tooltip.label.rotation = 270;
      categoryAxis.tooltip.label.horizontalCenter = "right";
      categoryAxis.tooltip.label.verticalCenter = "middle";
      var valueAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ValueAxis"]());
      valueAxis.title.text = "Gestantes";
      valueAxis.title.fontWeight = "bold"; // Create series

      var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ColumnSeries3D"]());
      series.dataFields.valueY = "gestantes";
      series.dataFields.categoryX = "edad";
      series.name = "Gestantes";
      series.tooltipText = "{categoryX}: [bold]{valueY}[/]";
      series.columns.template.fillOpacity = 0.8;
      var columnTemplate = series.columns.template;
      columnTemplate.strokeWidth = 2;
      columnTemplate.strokeOpacity = 1;
      columnTemplate.stroke = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["color"]("#FFFFFF");
      columnTemplate.adapter.add("fill", function (fill, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });
      columnTemplate.adapter.add("stroke", function (stroke, target) {
        return chart.colors.getIndex(target.dataItem.index);
      });
      chart.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYCursor"]();
      chart.cursor.lineX.strokeOpacity = 0;
      chart.cursor.lineY.strokeOpacity = 0;
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.redondo {\n  border-radius: 25px;\n}\n.deabjohaciaarriba {\n  writing-mode: vertical-rl;\n  text-orientation: use-glyph-orientation;\n  transform: rotate(0.5turn);\n}\n.borderbottomright {\n  border-top-left-radius: 20px;\n  border-bottom-left-radius: 20px;\n  border-bottom-right-radius: 20px;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./gestantes.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=template&id=6a228809&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=template&id=6a228809& ***!
  \********************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticStyle: { "margin-top": "-4%" } }, [
    _c("div", { staticClass: "row" }, [
      _c("div", { staticClass: "col-lg-12" }, [
        _vm._m(0),
        _vm._v(" "),
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("div", { staticClass: "row" }, [
              _c(
                "div",
                { staticClass: "col-lg-3 text-center" },
                [
                  _c("h5", [_vm._v("Número gestanes")]),
                  _vm._v(" "),
                  _c(
                    "vue-ellipse-progress",
                    {
                      attrs: {
                        progress: _vm.datos.porcentaje_embarazadas,
                        size: 120,
                        angle: -90,
                        gap: 10,
                        legend: true,
                        legendValue: 180,
                        thickness: 5,
                        emptyThickness: "5%",
                        dash: "60 0.9",
                        color: "#068204",
                        noData: false,
                        loading: false,
                        fontColor: "white",
                        half: false,
                        "line-mode": "out 2"
                      }
                    },
                    [
                      _c(
                        "p",
                        {
                          staticStyle: {
                            "font-size": "14px",
                            "font-weight": "bold"
                          },
                          attrs: { slot: "legend-caption" },
                          slot: "legend-caption"
                        },
                        [_vm._v(_vm._s(_vm.datos.nro_gestantes))]
                      )
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-lg-3 text-center" },
                [
                  _c("h5", [_vm._v("Adolescentes gestantes")]),
                  _vm._v(" "),
                  _c(
                    "vue-ellipse-progress",
                    {
                      attrs: {
                        progress: Math.round(
                          _vm.datos.nro_adolescentes_embarazadas
                        ),
                        size: 120,
                        angle: -90,
                        gap: 10,
                        legend: true,
                        thickness: 5,
                        emptyThickness: "5%",
                        dash: "60 0.9",
                        color: "#db2be3",
                        noData: false,
                        loading: false,
                        fontColor: "white",
                        half: false,
                        "line-mode": "out 2"
                      }
                    },
                    [
                      _c(
                        "p",
                        {
                          staticStyle: {
                            "font-size": "14px",
                            "font-weight": "bold"
                          },
                          attrs: { slot: "legend-caption" },
                          slot: "legend-caption"
                        },
                        [
                          _vm._v(
                            _vm._s(
                              Math.round(_vm.datos.nro_adolescentes_embarazadas)
                            )
                          )
                        ]
                      )
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-lg-3 text-center" },
                [
                  _c("h5", [_vm._v("Atención prenatal")]),
                  _vm._v(" "),
                  _c(
                    "vue-ellipse-progress",
                    {
                      attrs: {
                        progress: Math.round(
                          _vm.datos.porcentaje_atencion_prenatal
                        ),
                        size: 120,
                        angle: -90,
                        gap: 10,
                        legend: true,
                        thickness: 5,
                        emptyThickness: "5%",
                        dash: "60 0.9",
                        color: "#0511ca",
                        noData: false,
                        loading: false,
                        fontColor: "white",
                        half: false,
                        "line-mode": "out 2"
                      }
                    },
                    [
                      _c(
                        "p",
                        {
                          staticStyle: {
                            "font-size": "14px",
                            "font-weight": "bold"
                          },
                          attrs: { slot: "legend-caption" },
                          slot: "legend-caption"
                        },
                        [
                          _vm._v(
                            _vm._s(
                              Math.round(_vm.datos.porcentaje_atencion_prenatal)
                            ) + "%"
                          )
                        ]
                      )
                    ]
                  )
                ],
                1
              ),
              _vm._v(" "),
              _c(
                "div",
                { staticClass: "col-lg-3 text-center" },
                [
                  _c("h5", [_vm._v("Sin atención prenatal")]),
                  _vm._v(" "),
                  _c(
                    "vue-ellipse-progress",
                    {
                      attrs: {
                        progress: Math.round(
                          100 - _vm.datos.porcentaje_atencion_prenatal
                        ),
                        size: 120,
                        angle: -90,
                        gap: 10,
                        legend: true,
                        thickness: 5,
                        emptyThickness: "5%",
                        dash: "60 0.9",
                        color: "#891481",
                        noData: false,
                        loading: false,
                        fontColor: "white",
                        half: false,
                        "line-mode": "out 2"
                      }
                    },
                    [
                      _c(
                        "p",
                        {
                          staticStyle: {
                            "font-size": "14px",
                            "font-weight": "bold"
                          },
                          attrs: { slot: "legend-caption" },
                          slot: "legend-caption"
                        },
                        [
                          _vm._v(
                            _vm._s(
                              Math.round(
                                100 - _vm.datos.porcentaje_atencion_prenatal
                              )
                            ) + "%"
                          )
                        ]
                      )
                    ]
                  )
                ],
                1
              )
            ])
          ])
        ]),
        _vm._v(" "),
        _vm._m(1)
      ])
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-body" }, [_c("h3", [_vm._v("Gestantes")])])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "card" }, [
      _c("div", { staticClass: "card-body" }, [
        _c("br"),
        _vm._v(" "),
        _c("div", { staticClass: "row justify-center" }, [
          _c("div", { staticClass: "col-lg-6 text-center" }, [
            _c("h4", [_vm._v("Números de gestantes")]),
            _vm._v(" "),
            _c("br"),
            _vm._v(" "),
            _c("div", {
              staticStyle: { width: "100%", height: "400px" },
              attrs: { id: "chartbarra" }
            })
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "col-lg-6 text-center" }, [
            _c("h4", [_vm._v("Porcentaje de gestantes sin atención prenatal")]),
            _vm._v(" "),
            _c("br"),
            _vm._v(" "),
            _c("div", {
              staticStyle: { width: "100%", height: "400px" },
              attrs: { id: "chartdiv" }
            })
          ])
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Servicios/indicadores.js":
/*!***********************************************!*\
  !*** ./resources/js/Servicios/indicadores.js ***!
  \***********************************************/
/*! exports provided: listar, gestantes, spa, filtrospa */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listar", function() { return listar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "gestantes", function() { return gestantes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "spa", function() { return spa; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "filtrospa", function() { return filtrospa; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/indicadores/calcular', $data);
}
function gestantes($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/indicadores/gestantes', $data);
}
function spa($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/indicadores/spa', $data);
}
function filtrospa($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/indicadores/filtrospa', $data);
}

/***/ }),

/***/ "./resources/js/Vistas/Indicadores/gestantes.vue":
/*!*******************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/gestantes.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _gestantes_vue_vue_type_template_id_6a228809___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./gestantes.vue?vue&type=template&id=6a228809& */ "./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=template&id=6a228809&");
/* harmony import */ var _gestantes_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./gestantes.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _gestantes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./gestantes.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _gestantes_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _gestantes_vue_vue_type_template_id_6a228809___WEBPACK_IMPORTED_MODULE_0__["render"],
  _gestantes_vue_vue_type_template_id_6a228809___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Indicadores/gestantes.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./gestantes.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./gestantes.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=template&id=6a228809&":
/*!**************************************************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=template&id=6a228809& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_template_id_6a228809___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./gestantes.vue?vue&type=template&id=6a228809& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/gestantes.vue?vue&type=template&id=6a228809&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_template_id_6a228809___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_gestantes_vue_vue_type_template_id_6a228809___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);