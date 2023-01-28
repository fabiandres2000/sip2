(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[25],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Servicios/reportes */ "./resources/js/Servicios/reportes.js");
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../store */ "./resources/js/store.js");
/* harmony import */ var _Servicios_enfermedadesCro_servicios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../Servicios/enfermedadesCro_servicios */ "./resources/js/Servicios/enfermedadesCro_servicios.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var datatables_net__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! datatables.net */ "./node_modules/datatables.net/js/jquery.dataTables.js");
/* harmony import */ var datatables_net__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(datatables_net__WEBPACK_IMPORTED_MODULE_5__);


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





/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {
    this.iniciales();
  },
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      ruta: "",
      datos: {
        rangoEdad: "Todos"
      },
      integrantes: []
    };
  },
  methods: {
    filtrar: function filtrar() {
      this.iniciales();
    },
    iniciales: function iniciales() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                parametros = {
                  _token: _this.csrf,
                  datos: _this.datos
                };
                _context.next = 3;
                return _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__["descolarizados"](parametros).then(function (respuesta) {
                  _this.integrantes = respuesta.data.integrantes;

                  _this.crearDataTable();
                });

              case 3:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    crearDataTable: function crearDataTable() {
      jquery__WEBPACK_IMPORTED_MODULE_4___default()("#descolarizados_table").dataTable().fnDestroy();
      setTimeout(function () {
        jquery__WEBPACK_IMPORTED_MODULE_4___default()('#descolarizados_table').DataTable({
          "lengthChange": true,
          "ordering": false,
          "bFilter": false,
          pageLength: 10,
          language: {
            "decimal": "",
            "emptyTable": "No hay información",
            "info": "Mostrando _START_ a _END_ de _TOTAL_ Registros",
            "infoEmpty": "Mostrando 0 to 0 of 0 Registros",
            "infoFiltered": "(Filtrado de _MAX_ total Registros)",
            "infoPostFix": "",
            "thousands": ",",
            "lengthMenu": "Mostrar _MENU_ Registros",
            "loadingRecords": "Cargando...",
            "processing": "Procesando...",
            "search": "Buscar:",
            "zeroRecords": "Sin resultados encontrados",
            "paginate": {
              "first": "Primero",
              "last": "Ultimo",
              "next": "Siguiente",
              "previous": "Anterior"
            }
          }
        });
      }, 500);
    },
    generarExcel: function generarExcel() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                parametros = {
                  datos: _this2.integrantes,
                  titulo: "Reporte Personas Descolarizadas",
                  tipo: "Crónicas"
                };
                _context2.next = 3;
                return _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__["exportarDescolarizados"](parametros).then(function (respuesta) {
                  var href = _store__WEBPACK_IMPORTED_MODULE_2__["default"].state.apiURL + respuesta.data.nombre;

                  _this2.downloadItem(href);
                });

              case 3:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    downloadItem: function downloadItem(url) {
      var link = document.createElement('a');
      link.href = url;
      link.download = "Reporte Personas Descolarizadas.xlsx";
      link.click();
      URL.revokeObjectURL(link.href);
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.table_data {\n    width: 100%;\n    font-size: 17px;\n    border-collapse: collapse;\n}\n.table_data thead {\n    padding: 0.3em;\n    color: #fff !important;\n    background: #5578eb;\n}\n.table_data thead tr th, .table_data tbody tr td {\n    text-align: left;\n    vertical-align: top;\n    padding: 0.3em;\n    caption-side: bottom;\n}\n.dataTable th {\n    color: #ffffff !important;\n}\n.dataTables_paginate span .paginate_button{ \n    color: #5578eb !important;\n    margin-left: 3px;\n    margin-right: 3px;\n    font-weight: bold;\n    background-color: #ffff;\n    padding: 4px 8px 4px 8px;\n    border-radius: 4px;\n}\n.dataTables_paginate span .current{     \n    color: #ffff !important;\n    margin-left: 3px;\n    margin-right: 3px;\n    font-weight: bold;\n    background-color: #5578eb;\n    padding: 4px 8px 4px 8px;\n    border-radius: 4px;\n}\n.next{\n    cursor: pointer;\n    background-color: #fd397a;\n    color: white;\n    padding: 5px;\n    border-radius: 4px;\n}\n.previous{\n    cursor: pointer;\n    background-color: #fd397a;\n    color: white;\n    padding: 5px;\n    border-radius: 4px;\n}\n.dataTables_paginate{\n    margin-top: 20px;\n    height: 40px;\n}\n.next:hover, .previous:hover{\n    font-weight: bold;\n    color: white;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Descolarizados.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=template&id=70991979&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=template&id=70991979& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "row" }, [
    _c("div", { staticClass: "col-12" }, [
      _c(
        "div",
        {
          staticClass: "kt-portlet kt-portlet--height-fluid kt-portlet--mobile",
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
                      staticClass: "btn btn-success",
                      attrs: {
                        type: "button",
                        "data-skin": "dark",
                        "data-toggle": "kt-tooltip",
                        "data-placement": "top",
                        title: "Exportar EXCEL"
                      },
                      on: { click: _vm.generarExcel }
                    },
                    [
                      _c("i", { staticClass: "fa fa-table" }),
                      _vm._v("Exportar a Excel\n                            ")
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
                        {
                          staticClass: "table table-sm table-hover",
                          attrs: { id: "descolarizados_table" }
                        },
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
                                        " Años\n                                                "
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
                                        _vm._s(item.nivel_escolaridad) +
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
                      )
                    ])
                  ])
                ])
              ])
            ])
          ])
        ]
      )
    ])
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-portlet__head-label" }, [
      _c("h3", { staticClass: "kt-portlet__head-title" }, [
        _c("span", { staticClass: "kt-widget20__number kt-font-danger" }, [
          _vm._v("REPORTE DE PERSONAS DESCOLARIZADAS")
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c(
      "thead",
      { staticStyle: { color: "white", "font-weight": "bold" } },
      [
        _c("tr", { staticClass: "kt-bg-fill-brand" }, [
          _c("th", [_vm._v("No.")]),
          _vm._v(" "),
          _c("th", [_vm._v("Identificacion")]),
          _vm._v(" "),
          _c("th", [_vm._v("Nombres completos")]),
          _vm._v(" "),
          _c("th", [_vm._v("Localización")]),
          _vm._v(" "),
          _c("th", [_vm._v("Edad")]),
          _vm._v(" "),
          _c("th", [_vm._v("Genero")]),
          _vm._v(" "),
          _c("th", [_vm._v("Nivel de Escolaridad")]),
          _vm._v(" "),
          _c("th", [_vm._v("Ocupación")])
        ])
      ]
    )
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Servicios/enfermedadesCro_servicios.js":
/*!*************************************************************!*\
  !*** ./resources/js/Servicios/enfermedadesCro_servicios.js ***!
  \*************************************************************/
/*! exports provided: listar, guardar, eliminar, combo */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listar", function() { return listar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardar", function() { return guardar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminar", function() { return eliminar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "combo", function() { return combo; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/enfermedadesCro', $data);
}
function guardar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/enfermedadesCro/guardar', $data);
}
function eliminar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/enfermedadesCro/eliminar', $data);
}
function combo() {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().get('/enfermedadesCro/combo');
}

/***/ }),

/***/ "./resources/js/Servicios/reportes.js":
/*!********************************************!*\
  !*** ./resources/js/Servicios/reportes.js ***!
  \********************************************/
/*! exports provided: gestantes, exportarGestantes, nutricional, exportarNutricional, inicialesCronicas, cronicasPDF, inicialesMigrantes, migrantesPDF, personas_discapacitadas, adulto_mayor, exportaAdultoMayorExcel, exportaDiscapacitadosExcel, inicialesInfecciosas, exportarEnfermedades, descolarizados, exportarDescolarizados, bajo_nivel_socioeconomico, exportarSocioeconomico, riesgo_salud */
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

/***/ }),

/***/ "./resources/js/Vistas/Reportes/Descolarizados.vue":
/*!*********************************************************!*\
  !*** ./resources/js/Vistas/Reportes/Descolarizados.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Descolarizados_vue_vue_type_template_id_70991979___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Descolarizados.vue?vue&type=template&id=70991979& */ "./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=template&id=70991979&");
/* harmony import */ var _Descolarizados_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Descolarizados.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Descolarizados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Descolarizados.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Descolarizados_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Descolarizados_vue_vue_type_template_id_70991979___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Descolarizados_vue_vue_type_template_id_70991979___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Reportes/Descolarizados.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Descolarizados.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************!*\
  !*** ./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Descolarizados.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=template&id=70991979&":
/*!****************************************************************************************!*\
  !*** ./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=template&id=70991979& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_template_id_70991979___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Descolarizados.vue?vue&type=template&id=70991979& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Descolarizados.vue?vue&type=template&id=70991979&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_template_id_70991979___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Descolarizados_vue_vue_type_template_id_70991979___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);