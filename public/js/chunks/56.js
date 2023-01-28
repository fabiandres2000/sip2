(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[56],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/spa.vue?vue&type=script&lang=js&":
/*!**********************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Indicadores/spa.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************************************************************************************************/
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
//
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
      combo: "",
      datos: {
        total_consumidores: 0,
        porcentaje_consumidores: 0,
        adolescentes_consumidores: 0,
        ninos_consumidores: 0,
        gestantes_consumidores: 0,
        grupo_611_hombres: 0,
        grupo_611_mujeres: 0,
        grupo_1217_hombres: 0,
        grupo_1217_mujeres: 0,
        grupo_1828_hombres: 0,
        grupo_1828_mujeres: 0,
        grupo_2959_hombres: 0,
        grupo_2959_mujeres: 0,
        grupo_60m_hombres: 0,
        grupo_60m_mujeres: 0 //gestantes_grupo_510: 0,
        //gestantes_grupo_1117: 0,
        //gestantes_grupo_1828: 0,
        //gestantes_grupo_2959: 0

      },
      poblacion: {
        grupo_611_hombrest: 0,
        grupo_611_mujerest: 0,
        grupo_1217_hombrest: 0,
        grupo_1217_mujerest: 0,
        grupo_1828_hombrest: 0,
        grupo_1828_mujerest: 0,
        grupo_2959_hombrest: 0,
        grupo_2959_mujerest: 0,
        grupo_60m_hombrest: 0,
        grupo_60m_mujerest: 0
      },
      serie: []
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
                return _Servicios_indicadores__WEBPACK_IMPORTED_MODULE_4__["spa"](data).then(function (respuesta) {
                  _this.datos = respuesta.data["cantidades"];
                  console.log(_this.datos);
                  _this.poblacion = respuesta.data["poblacion"];
                  _this.serie = [{
                    age: "60+",
                    male: Number(_this.datos.grupo_611_hombres),
                    female: Number(_this.datos.grupo_611_mujeres)
                  }, {
                    age: "29-59",
                    male: Number(_this.datos.grupo_2959_hombres),
                    female: Number(_this.datos.grupo_2959_mujeres)
                  }, {
                    age: "18-28",
                    male: Number(_this.datos.grupo_1828_hombres),
                    female: Number(_this.datos.grupo_1828_mujeres)
                  }, {
                    age: "12-17",
                    male: Number(_this.datos.grupo_1217_hombres),
                    female: Number(_this.datos.grupo_1217_mujeres)
                  }, {
                    age: "6-11",
                    male: Number(_this.datos.grupo_611_hombres),
                    female: Number(_this.datos.grupo_611_mujeres)
                  }];

                  _this.grafica_stacked();

                  _this.grafica_barras(); //console.log(this.serie);

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
    grafica_stacked: function grafica_stacked() {
      // Themes begin
      _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end
      // Create chart instance

      var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("grafica1", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYChart"]); // Add data

      chart.data = this.serie; // Use only absolute numbers

      chart.numberFormatter.numberFormat = "#.#s"; // Create axes

      var categoryAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["CategoryAxis"]());
      categoryAxis.dataFields.category = "age";
      categoryAxis.renderer.grid.template.location = 0;
      categoryAxis.renderer.inversed = true;
      var valueAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ValueAxis"]());
      valueAxis.extraMin = 0.1;
      valueAxis.extraMax = 0.1;
      valueAxis.renderer.minGridDistance = 40;
      valueAxis.renderer.ticks.template.length = 5;
      valueAxis.renderer.ticks.template.disabled = false;
      valueAxis.renderer.ticks.template.strokeOpacity = 0.4;
      valueAxis.renderer.labels.template.adapter.add("text", function (text) {
        return text == "Male" || text == "Female" ? text : text + "%";
      }); // Create series

      var male = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ColumnSeries"]());
      male.dataFields.valueX = "male";
      male.dataFields.categoryY = "age";
      male.clustered = false;
      var maleLabel = male.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["LabelBullet"]());
      maleLabel.label.text = "{valueX}%";
      maleLabel.label.hideOversized = false;
      maleLabel.label.truncate = false;
      maleLabel.label.horizontalCenter = "right";
      maleLabel.label.dx = -10;
      var female = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ColumnSeries"]());
      female.dataFields.valueX = "female";
      female.dataFields.categoryY = "age";
      female.clustered = false;
      var femaleLabel = female.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["LabelBullet"]());
      femaleLabel.label.text = "{valueX}%";
      femaleLabel.label.hideOversized = false;
      femaleLabel.label.truncate = false;
      femaleLabel.label.horizontalCenter = "left";
      femaleLabel.label.dx = 10;
      var maleRange = valueAxis.axisRanges.create();
      maleRange.value = -10;
      maleRange.endValue = 0;
      maleRange.label.text = "Hombres";
      maleRange.label.fill = chart.colors.list[0];
      maleRange.label.dy = 20;
      maleRange.label.fontWeight = "600";
      maleRange.grid.strokeOpacity = 1;
      maleRange.grid.stroke = male.stroke;
      var femaleRange = valueAxis.axisRanges.create();
      femaleRange.value = 0;
      femaleRange.endValue = 10;
      femaleRange.label.text = "Mujeres";
      femaleRange.label.fill = chart.colors.list[1];
      femaleRange.label.dy = 20;
      femaleRange.label.fontWeight = "600";
      femaleRange.grid.strokeOpacity = 1;
      femaleRange.grid.stroke = female.stroke;
    },
    grafica_barras: function grafica_barras() {
      // Themes begin
      _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end

      var chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartdiv", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYChart"]);
      chart.paddingBottom = 50;
      chart.cursor = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYCursor"]();
      chart.scrollbarX = new _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["Scrollbar"]();
      chart.colors.step = 2;
      chart.legend = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["Legend"]();
      chart.legend.position = "top";
      chart.legend.paddingBottom = 20;
      chart.legend.labels.template.maxWidth = 95;
      var xAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["CategoryAxis"]());
      xAxis.dataFields.category = "category";
      xAxis.renderer.cellStartLocation = 0.1;
      xAxis.renderer.cellEndLocation = 0.9;
      xAxis.renderer.grid.template.location = 0;
      var yAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ValueAxis"]());
      yAxis.min = 0;

      function createSeries(value, name) {
        var series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ColumnSeries"]());
        series.dataFields.valueY = value;
        series.dataFields.categoryX = "category";
        series.name = name;
        series.events.on("hidden", arrangeColumns);
        series.events.on("shown", arrangeColumns);
        var bullet = series.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["LabelBullet"]());
        bullet.interactionsEnabled = false;
        bullet.dy = 30;
        bullet.label.text = "{valueY}";
        bullet.label.fill = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["color"]("#ffffff");
        return series;
      }

      chart.data = [{
        category: "6-11",
        first: this.poblacion.grupo_611_hombrest,
        second: this.poblacion.grupo_611_mujerest
      }, {
        category: "12-17",
        first: this.poblacion.grupo_1217_hombrest,
        second: this.poblacion.grupo_1217_mujerest
      }, {
        category: "18-28",
        first: this.poblacion.grupo_1828_hombrest,
        second: this.poblacion.grupo_1828_mujerest
      }, {
        category: "29-59",
        first: this.poblacion.grupo_2959_hombrest,
        second: this.poblacion.grupo_2959_mujerest
      }, {
        category: "60+",
        first: this.poblacion.grupo_60m_hombrest,
        second: this.poblacion.grupo_60m_mujerest
      }];
      createSeries("first", "Hombres");
      createSeries("second", "Mujeres");

      function arrangeColumns() {
        var series = chart.series.getIndex(0);
        var w = 1 - xAxis.renderer.cellStartLocation - (1 - xAxis.renderer.cellEndLocation);
      }
    },
    filtrar: function filtrar() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                data = {
                  _token: _this2.csrf,
                  _tipo: _this2.combo
                }; //alert(this.combo);

                if (!(_this2.combo == "")) {
                  _context2.next = 6;
                  break;
                }

                _context2.next = 4;
                return _Servicios_indicadores__WEBPACK_IMPORTED_MODULE_4__["spa"](data).then(function (respuesta) {
                  _this2.poblacion = respuesta.data["poblacion"];

                  _this2.grafica_barras(); //console.log(this.serie);

                })["catch"](function (err) {
                  console.log(err);
                });

              case 4:
                _context2.next = 8;
                break;

              case 6:
                _context2.next = 8;
                return _Servicios_indicadores__WEBPACK_IMPORTED_MODULE_4__["filtrospa"](data).then(function (respuesta) {
                  _this2.poblacion = respuesta.data["poblacion"];

                  _this2.grafica_barras(); //console.log(this.serie);

                })["catch"](function (err) {
                  console.log(err);
                });

              case 8:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/spa.vue?vue&type=template&id=5966eb12&":
/*!**************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Indicadores/spa.vue?vue&type=template&id=5966eb12& ***!
  \**************************************************************************************************************************************************************************************************************/
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
                  _c("h5", [_vm._v("Número consumidores")]),
                  _vm._v(" "),
                  _c(
                    "vue-ellipse-progress",
                    {
                      attrs: {
                        progress: _vm.datos.porcentaje_consumidores,
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
                        [_vm._v(_vm._s(_vm.datos.total_consumidores))]
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
                  _c("h5", [_vm._v("Adolescentes consumidores")]),
                  _vm._v(" "),
                  _c(
                    "vue-ellipse-progress",
                    {
                      attrs: {
                        progress: Math.round(
                          _vm.datos.adolescentes_consumidores
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
                              Math.round(_vm.datos.adolescentes_consumidores)
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
                  _c("h5", [_vm._v("Niños consumidores")]),
                  _vm._v(" "),
                  _c(
                    "vue-ellipse-progress",
                    {
                      attrs: {
                        progress: Math.round(_vm.datos.ninos_consumidores),
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
                            _vm._s(Math.round(_vm.datos.ninos_consumidores))
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
                  _c("h5", [_vm._v("Gestantes consumidores")]),
                  _vm._v(" "),
                  _c(
                    "vue-ellipse-progress",
                    {
                      attrs: {
                        progress: Math.round(_vm.datos.gestantes_consumidores),
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
                            _vm._s(Math.round(_vm.datos.gestantes_consumidores))
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
        _c("div", { staticClass: "card" }, [
          _c("div", { staticClass: "card-body" }, [
            _c("br"),
            _vm._v(" "),
            _c("div", { staticClass: "row justify-center" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-8 text-center" }, [
                _c("h4", [_vm._v("Población que consume SPA")]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("div", { staticClass: "row offset-2" }, [
                  _c("div", { staticClass: "col-lg-8" }, [
                    _c(
                      "select",
                      {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.combo,
                            expression: "combo"
                          }
                        ],
                        staticClass: "form-control",
                        on: {
                          change: [
                            function($event) {
                              var $$selectedVal = Array.prototype.filter
                                .call($event.target.options, function(o) {
                                  return o.selected
                                })
                                .map(function(o) {
                                  var val = "_value" in o ? o._value : o.value
                                  return val
                                })
                              _vm.combo = $event.target.multiple
                                ? $$selectedVal
                                : $$selectedVal[0]
                            },
                            _vm.filtrar
                          ]
                        }
                      },
                      [
                        _c("option", { attrs: { value: "" } }, [
                          _vm._v("Todos")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "spa" } }, [
                          _vm._v("SPA")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "fuma" } }, [
                          _vm._v("Tabaco")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "alcohol" } }, [
                          _vm._v("Alcohol")
                        ])
                      ]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("div", {
                  staticStyle: { width: "100%", height: "380px" },
                  attrs: { id: "chartdiv" }
                })
              ])
            ])
          ])
        ])
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
      _c("div", { staticClass: "card-body" }, [
        _c("h3", [_vm._v("Consumo de SPA (Sustancias Psicoactivas)")])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-4 text-center" }, [
      _c("h4", [_vm._v("Población que consume SPA por grupo de edades")]),
      _vm._v(" "),
      _c("br"),
      _vm._v(" "),
      _c("div", {
        staticStyle: { width: "100%", height: "400px" },
        attrs: { id: "grafica1" }
      })
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

/***/ "./resources/js/Vistas/Indicadores/spa.vue":
/*!*************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/spa.vue ***!
  \*************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _spa_vue_vue_type_template_id_5966eb12___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./spa.vue?vue&type=template&id=5966eb12& */ "./resources/js/Vistas/Indicadores/spa.vue?vue&type=template&id=5966eb12&");
/* harmony import */ var _spa_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./spa.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Indicadores/spa.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _spa_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _spa_vue_vue_type_template_id_5966eb12___WEBPACK_IMPORTED_MODULE_0__["render"],
  _spa_vue_vue_type_template_id_5966eb12___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Indicadores/spa.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Indicadores/spa.vue?vue&type=script&lang=js&":
/*!**************************************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/spa.vue?vue&type=script&lang=js& ***!
  \**************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_spa_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./spa.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/spa.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_spa_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Indicadores/spa.vue?vue&type=template&id=5966eb12&":
/*!********************************************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/spa.vue?vue&type=template&id=5966eb12& ***!
  \********************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_spa_vue_vue_type_template_id_5966eb12___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./spa.vue?vue&type=template&id=5966eb12& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/spa.vue?vue&type=template&id=5966eb12&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_spa_vue_vue_type_template_id_5966eb12___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_spa_vue_vue_type_template_id_5966eb12___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);