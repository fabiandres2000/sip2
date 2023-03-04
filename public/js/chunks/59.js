(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[59],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Servicios/reportes */ "./resources/js/Servicios/reportes.js");
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


/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {
    this.iniciales(1);
  },
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      ruta: "",
      datos: {
        rangoEdad: "Todos"
      },
      integrantes: {
        id: 0,
        nombres: "",
        identificacion: "",
        localizacion: "",
        edad: "",
        genero: "",
        pais: "",
        eps: "",
        ocupacion: ""
      },
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
                parametros = {
                  _token: _this.csrf,
                  datos: _this.datos,
                  page: pagina,
                  tipo: "paginate"
                };
                _context.prev = 1;
                _context.next = 4;
                return _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__["inicialesMigrantes"](parametros).then(function (respuesta) {
                  _this.integrantes = respuesta.data.integrantes.data;
                  _this.paginacion = respuesta.data.paginacion;
                });

              case 4:
                _context.next = 8;
                break;

              case 6:
                _context.prev = 6;
                _context.t0 = _context["catch"](1);

              case 8:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, null, [[1, 6]]);
      }))();
    },
    Buscar: function Buscar() {},
    cambiarPaginas: function cambiarPaginas(pagina) {
      this.paginacion.pagina_actual = pagina;
      this.iniciales(pagina);
    },
    filtrar: function filtrar() {
      this.iniciales(1);
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
                  datos: _this2.datos,
                  tipo: "Todos"
                };
                _context2.prev = 1;
                _context2.next = 4;
                return _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__["migrantesPDF"](parametros).then(function (respuesta) {
                  // this.ruta = "http://127.0.0.1:8000/archivomigrantes.pdf";
                  _this2.ruta = _store__WEBPACK_IMPORTED_MODULE_2__["default"].state.apiURL + respuesta.data.nombre;
                  console.log(_this2.ruta);

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
    cerrarModal: function cerrarModal() {
      this.$refs.modalpdf.hide();
    }
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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=template&id=54fc30d0&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=template&id=54fc30d0& ***!
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
            staticStyle: { "margin-top": "-4%" }
          },
          [
            _c("div", { staticClass: "kt-portlet__head" }, [
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "kt-portlet__head-toolbar" }, [
                _c("div", { staticClass: "kt-section" }, [
                  _c("div", { staticClass: "kt-section__content" }, [
                    _c("br"),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-brand",
                        attrs: {
                          type: "button",
                          "data-skin": "dark",
                          "data-toggle": "kt-tooltip",
                          "data-placement": "top",
                          title: "Filtrar"
                        },
                        on: { click: _vm.filtrar }
                      },
                      [
                        _c("i", { staticClass: "fa fa-search" }),
                        _vm._v("Filtrar\n                            ")
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-danger",
                        attrs: {
                          type: "button",
                          "data-skin": "dark",
                          "data-toggle": "kt-tooltip",
                          "data-placement": "top",
                          title: "Exportar Pdf"
                        },
                        on: { click: _vm.generarPDF }
                      },
                      [
                        _c("i", { staticClass: "fa fa-file-pdf" }),
                        _vm._v("Exportar a Pdf\n                            ")
                      ]
                    )
                  ])
                ])
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "kt-portlet__body" }, [
              _c("div", { staticClass: "kt-section" }, [
                _c("div", { staticClass: "kt-section__content" }, [
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-3 col-lg-3" }, [
                      _c(
                        "div",
                        { staticClass: "form-group" },
                        [
                          _c("label", [_vm._v("Grupo de edades:")]),
                          _vm._v(" "),
                          _c(
                            "b-form-select",
                            {
                              model: {
                                value: _vm.datos.rangoEdad,
                                callback: function($$v) {
                                  _vm.$set(_vm.datos, "rangoEdad", $$v)
                                },
                                expression: "datos.rangoEdad"
                              }
                            },
                            [
                              _c("option", { attrs: { value: "Todos" } }, [
                                _vm._v("Todos")
                              ]),
                              _vm._v(" "),
                              _c("option", { attrs: { value: "0-" } }, [
                                _vm._v("Menores de 1")
                              ]),
                              _vm._v(" "),
                              _c("option", { attrs: { value: "r1-5" } }, [
                                _vm._v("De 1 a 5 años")
                              ]),
                              _vm._v(" "),
                              _c("option", { attrs: { value: "r6-11" } }, [
                                _vm._v("De 6 a 11 años")
                              ]),
                              _vm._v(" "),
                              _c("option", { attrs: { value: "r12-17" } }, [
                                _vm._v("De 12 a 17 años")
                              ]),
                              _vm._v(" "),
                              _c("option", { attrs: { value: "r18-28" } }, [
                                _vm._v("De 18 a 28 años")
                              ]),
                              _vm._v(" "),
                              _c("option", { attrs: { value: "r29-59" } }, [
                                _vm._v("De 29 a 59")
                              ]),
                              _vm._v(" "),
                              _c("option", { attrs: { value: "r60+" } }, [
                                _vm._v("Mayores de 60")
                              ])
                            ]
                          )
                        ],
                        1
                      )
                    ])
                  ]),
                  _vm._v(" "),
                  _c("div", { staticClass: "row" }, [
                    _c("div", { staticClass: "col-md-12" }, [
                      _c("div", { staticClass: "table-responsive" }, [
                        _c(
                          "table",
                          { staticClass: "table table-sm table-hover" },
                          [
                            _vm._m(1),
                            _vm._v(" "),
                            _c(
                              "tbody",
                              _vm._l(_vm.integrantes, function(item, index) {
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
                                        "\n                                                    " +
                                          _vm._s(index + 1) +
                                          "\n                                                "
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
                                        "\n                                                    " +
                                          _vm._s(item.nombres) +
                                          "\n                                                "
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
                                        "\n                                                    " +
                                          _vm._s(item.identificacion) +
                                          "\n                                                "
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
                                        "\n                                                    " +
                                          _vm._s(item.localizacion) +
                                          "\n                                                "
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
                                        "\n                                                    " +
                                          _vm._s(item.edad) +
                                          "\n                                                "
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
                                        "\n                                                    " +
                                          _vm._s(item.genero) +
                                          "\n                                                "
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
                                        "\n                                                    " +
                                          _vm._s(item.pais) +
                                          "\n                                                "
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
                                        "\n                                                    " +
                                          _vm._s(item.eps) +
                                          "\n                                                "
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
                                        "\n                                                    " +
                                          _vm._s(item.ocupacion) +
                                          "\n                                                "
                                      )
                                    ]
                                  )
                                ])
                              }),
                              0
                            )
                          ]
                        ),
                        _vm._v(" "),
                        _c("div", {
                          staticClass:
                            "kt-separator kt-separator--border-dashed"
                        }),
                        _vm._v(" "),
                        _c("div", { staticClass: "kt-section" }, [
                          _c(
                            "div",
                            {
                              staticClass: "kt-pagination kt-pagination--danger"
                            },
                            [
                              _c(
                                "ul",
                                { staticClass: "kt-pagination__links" },
                                [
                                  _vm.paginacion.pagina_actual > 1
                                    ? _c(
                                        "li",
                                        {
                                          staticClass:
                                            "kt-pagination__link--first"
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
                                          staticClass:
                                            "kt-pagination__link--next"
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
                                                    _vm.paginacion
                                                      .pagina_actual - 1
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
                                                return _vm.cambiarPaginas(
                                                  pagina
                                                )
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
                                          staticClass:
                                            "kt-pagination__link--prev"
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
                                                    _vm.paginacion
                                                      .pagina_actual + 1
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
                                          staticClass:
                                            "kt-pagination__link--last"
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
            "hide-footer": "",
            title: "Enfermedades crónicas",
            size: "xl",
            centered: "",
            "header-bg-variant": "danger",
            "header-text-variant": "light",
            "no-close-on-backdrop": false
          }
        },
        [
          _c("embed", {
            attrs: {
              id: "divPdf",
              src: _vm.ruta,
              type: "application/pdf",
              width: "100%",
              height: "650px"
            }
          }),
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
    return _c("div", { staticClass: "kt-portlet__head-label" }, [
      _c("h3", { staticClass: "kt-portlet__head-title" }, [
        _c("span", { staticClass: "kt-widget20__number kt-font-danger" }, [
          _vm._v("POBLACION MIGRANTE")
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
        _c("th", [_vm._v("Nombres completos")]),
        _vm._v(" "),
        _c("th", [_vm._v("Identificacion")]),
        _vm._v(" "),
        _c("th", [_vm._v("Localización")]),
        _vm._v(" "),
        _c("th", [_vm._v("Edad")]),
        _vm._v(" "),
        _c("th", [_vm._v("Genero")]),
        _vm._v(" "),
        _c("th", [_vm._v("Pais")]),
        _vm._v(" "),
        _c("th", [_vm._v("Eps")]),
        _vm._v(" "),
        _c("th", [_vm._v("Ocupación")]),
        _vm._v(" "),
        _c("td", { staticClass: "text-center" })
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Servicios/reportes.js":
/*!********************************************!*\
  !*** ./resources/js/Servicios/reportes.js ***!
  \********************************************/
/*! exports provided: gestantes, exportarGestantes, nutricional, exportarNutricional, inicialesCronicas, cronicasPDF, inicialesMigrantes, migrantesPDF, personas_discapacitadas, adulto_mayor, exportaAdultoMayorExcel, exportaDiscapacitadosExcel, inicialesInfecciosas, exportarEnfermedades, descolarizados, exportarDescolarizados, bajo_nivel_socioeconomico, exportarSocioeconomico, riesgo_salud, exportarRiesgosSalud */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "gestantes", function() { return gestantes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarGestantes", function() { return exportarGestantes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "nutricional", function() { return nutricional; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarNutricional", function() { return exportarNutricional; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "inicialesCronicas", function() { return inicialesCronicas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "cronicasPDF", function() { return cronicasPDF; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "inicialesMigrantes", function() { return inicialesMigrantes; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "migrantesPDF", function() { return migrantesPDF; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "personas_discapacitadas", function() { return personas_discapacitadas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "adulto_mayor", function() { return adulto_mayor; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportaAdultoMayorExcel", function() { return exportaAdultoMayorExcel; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportaDiscapacitadosExcel", function() { return exportaDiscapacitadosExcel; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "inicialesInfecciosas", function() { return inicialesInfecciosas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarEnfermedades", function() { return exportarEnfermedades; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "descolarizados", function() { return descolarizados; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarDescolarizados", function() { return exportarDescolarizados; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "bajo_nivel_socioeconomico", function() { return bajo_nivel_socioeconomico; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarSocioeconomico", function() { return exportarSocioeconomico; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "riesgo_salud", function() { return riesgo_salud; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarRiesgosSalud", function() { return exportarRiesgosSalud; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function gestantes($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/gestantes', $data);
}
function exportarGestantes($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/exportarGestantes', $data);
}
function nutricional($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/nutricional', $data);
}
function exportarNutricional($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/exportarNutricional', $data);
}
function inicialesCronicas($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/cronicas', $data);
}
function cronicasPDF($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/cronicaspdf', $data);
}
function inicialesMigrantes($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/migrantes', $data);
}
function migrantesPDF($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/migrantespdf', $data);
}
function personas_discapacitadas($tipo, $id) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/reportes/personas-discapacitadas?tipo=' + $tipo + '&id=' + $id);
}
function adulto_mayor($tipo, $id) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/reportes/adulto-mayor?tipo=' + $tipo + '&id=' + $id);
}
function exportaAdultoMayorExcel($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/exportar-adulto-mayor', $data);
}
function exportaDiscapacitadosExcel($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/exportar-discapacitados', $data);
}
function inicialesInfecciosas($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/infecciosas', $data);
}
function exportarEnfermedades($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/exportar-enfermedades', $data);
}
function descolarizados($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/descolarizados', $data);
}
function exportarDescolarizados($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/exportar-descolarizados', $data);
}
function bajo_nivel_socioeconomico($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/bajo-nivel-socioeconomico', $data);
}
function exportarSocioeconomico($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/exportar-socioeconomico', $data);
}
function riesgo_salud($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/riesgos-salud', $data);
}
function exportarRiesgosSalud($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/reportes/exportar-riesgos-salud', $data);
}

/***/ }),

/***/ "./resources/js/Vistas/Reportes/PoblacionMigrante.vue":
/*!************************************************************!*\
  !*** ./resources/js/Vistas/Reportes/PoblacionMigrante.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _PoblacionMigrante_vue_vue_type_template_id_54fc30d0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PoblacionMigrante.vue?vue&type=template&id=54fc30d0& */ "./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=template&id=54fc30d0&");
/* harmony import */ var _PoblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PoblacionMigrante.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _PoblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _PoblacionMigrante_vue_vue_type_template_id_54fc30d0___WEBPACK_IMPORTED_MODULE_0__["render"],
  _PoblacionMigrante_vue_vue_type_template_id_54fc30d0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Reportes/PoblacionMigrante.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PoblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./PoblacionMigrante.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PoblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=template&id=54fc30d0&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=template&id=54fc30d0& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PoblacionMigrante_vue_vue_type_template_id_54fc30d0___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./PoblacionMigrante.vue?vue&type=template&id=54fc30d0& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/PoblacionMigrante.vue?vue&type=template&id=54fc30d0&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PoblacionMigrante_vue_vue_type_template_id_54fc30d0___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PoblacionMigrante_vue_vue_type_template_id_54fc30d0___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);