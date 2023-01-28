(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[33],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=script&lang=js&":
/*!*****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=script&lang=js& ***!
  \*****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var _Servicios_consultas__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../Servicios/consultas */ "./resources/js/Servicios/consultas.js");
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../store */ "./resources/js/store.js");


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
        documento: "",
        tipo_id: "",
        sexo: "",
        estado_civil: "",
        tipo_afiliacion: "",
        afiliacion_entidad: "",
        nivel_escolaridad: "",
        ocupacion: "",
        salariominimo: "",
        salariomaximo: ""
      },
      jefes: [],
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
                  documento: _this.$route.params.documento,
                  tipo_id: _this.$route.params.tipo_id,
                  sexo: _this.$route.params.sexo,
                  estado_civil: _this.$route.params.estado_civil,
                  tipo_afiliacion: _this.$route.params.tipo_afiliacion,
                  afiliacion_entidad: _this.$route.params.afiliacion_entidad,
                  nivel_escolaridad: _this.$route.params.nivel_escolaridad,
                  ocupacion: _this.$route.params.ocupacion,
                  salariominimo: _this.$route.params.salariominimo,
                  salariomaximo: _this.$route.params.salariomaximo
                };
                parametros = {
                  _token: _this.csrf,
                  datos: _this.datos,
                  page: pagina
                };
                _context.prev = 2;
                _context.next = 5;
                return _Servicios_consultas__WEBPACK_IMPORTED_MODULE_2__["jefe"](parametros).then(function (respuesta) {
                  _this.jefes = respuesta.data.jefes.data;
                  _this.paginacion = respuesta.data.paginacion;
                  console.log(_this.jefes);
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
                return _Servicios_consultas__WEBPACK_IMPORTED_MODULE_2__["jefespdf"](parametros).then(function (respuesta) {
                  _this2.ruta = _store__WEBPACK_IMPORTED_MODULE_3__["default"].state.apiURL + respuesta.data.nombre;

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

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=style&index=0&lang=css&":
/*!************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=style&index=0&lang=css& ***!
  \************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./listadojefes.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=template&id=0a3b0bd7&":
/*!*********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=template&id=0a3b0bd7& ***!
  \*********************************************************************************************************************************************************************************************************************/
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
                  "\n            kt-portlet__head\n            kt-portlet__head--lg\n            kt-portlet__head--noborder\n            kt-portlet__head--break-sm\n          "
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
                        _vm._l(_vm.jefes, function(item, index) {
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
                                  "\n                        " +
                                    _vm._s(index + 1) +
                                    "\n                      "
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
                                  "\n                        " +
                                    _vm._s(item.identificacion) +
                                    "\n                      "
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
                                  "\n                        " +
                                    _vm._s(item.DPTO) +
                                    "\n                      "
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
                                  "\n                        " +
                                    _vm._s(item.MUNI) +
                                    "\n                      "
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
                                  "\n                        " +
                                    _vm._s(item.pnom) +
                                    " " +
                                    _vm._s(item.snom) +
                                    " " +
                                    _vm._s(item.pape) +
                                    "\n                        " +
                                    _vm._s(item.sape) +
                                    "\n                      "
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
                                  "\n                        " +
                                    _vm._s(item.edad) +
                                    "\n                      "
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
                                  "\n                        " +
                                    _vm._s(item.textoOcupacion) +
                                    "\n                      "
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
                                  "\n                        " +
                                    _vm._s(item.tipo) +
                                    "\n                      "
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
                _c("div", [_vm._v(_vm._s(_vm.fila.DPTO))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Municipio:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.MUNI))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Corregimiento:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.CORREGIMIENTO))])
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
                  _vm._v("Zona:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    "\n              " +
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
                      "\n            "
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Barrio:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.barrio))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Direccion:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.DIRECCION))])
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
                                expression: "item.estado == 'Activo'"
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
                                      "\n                        " +
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
                                expression: "item.estado == 'Activo'"
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
                                      "\n                        " +
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
                [_vm._v("Datos del integrante")]
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Tipo de Documento:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.tipo_id))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Identificación:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.identificacion))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Nombres:")
                ]),
                _vm._v(" "),
                _c("div", [
                  _vm._v(
                    _vm._s(_vm.fila.pnom) +
                      " " +
                      _vm._s(_vm.fila.snom) +
                      " " +
                      _vm._s(_vm.fila.pape) +
                      " " +
                      _vm._s(_vm.fila.sape)
                  )
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Edad:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.edad) + " ")])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Estado civil:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.textoEstado))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Parentesco:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.textoParentesco))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Escolaridad:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.textoNivel) + " ")])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Etnia:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.textoEtnia) + " ")])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Clasificación de etnia:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.textoClasificacion))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-6" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Eps:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.textoEps))])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Ocupación:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.textoOcupacion))])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "form-group row" }, [
              _c("div", { staticClass: "col-lg-3" }, [
                _c("label", { staticStyle: { "font-weight": "500" } }, [
                  _vm._v("Salario:")
                ]),
                _vm._v(" "),
                _c("div", [_vm._v(_vm._s(_vm.fila.salario))])
              ])
            ])
          ])
        ]
      ),
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
          _vm._v("Listado de jefes de hogar")
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
        _c("th", [_vm._v("Identificación")]),
        _vm._v(" "),
        _c("th", [_vm._v("Departamento")]),
        _vm._v(" "),
        _c("th", [_vm._v("Municipio")]),
        _vm._v(" "),
        _c("th", [_vm._v("Jefe de hogar")]),
        _vm._v(" "),
        _c("th", [_vm._v("Edad")]),
        _vm._v(" "),
        _c("th", [_vm._v("Ocupación")]),
        _vm._v(" "),
        _c("th", [_vm._v("Tipo")]),
        _vm._v(" "),
        _c("td", { staticClass: "text-center" })
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

/***/ "./resources/js/Vistas/Consultas/listadojefes.vue":
/*!********************************************************!*\
  !*** ./resources/js/Vistas/Consultas/listadojefes.vue ***!
  \********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _listadojefes_vue_vue_type_template_id_0a3b0bd7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./listadojefes.vue?vue&type=template&id=0a3b0bd7& */ "./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=template&id=0a3b0bd7&");
/* harmony import */ var _listadojefes_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./listadojefes.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _listadojefes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./listadojefes.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _listadojefes_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _listadojefes_vue_vue_type_template_id_0a3b0bd7___WEBPACK_IMPORTED_MODULE_0__["render"],
  _listadojefes_vue_vue_type_template_id_0a3b0bd7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Consultas/listadojefes.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=script&lang=js&":
/*!*********************************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./listadojefes.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./listadojefes.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=template&id=0a3b0bd7&":
/*!***************************************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=template&id=0a3b0bd7& ***!
  \***************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_template_id_0a3b0bd7___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./listadojefes.vue?vue&type=template&id=0a3b0bd7& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/listadojefes.vue?vue&type=template&id=0a3b0bd7&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_template_id_0a3b0bd7___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_listadojefes_vue_vue_type_template_id_0a3b0bd7___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);