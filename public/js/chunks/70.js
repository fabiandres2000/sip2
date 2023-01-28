(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[70],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Servicios/reportes */ "./resources/js/Servicios/reportes.js");
/* harmony import */ var _Servicios_barrios_servicios_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../Servicios/barrios_servicios.js */ "./resources/js/Servicios/barrios_servicios.js");
/* harmony import */ var _Servicios_corregimientos_servicios_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../Servicios/corregimientos_servicios.js */ "./resources/js/Servicios/corregimientos_servicios.js");
/* harmony import */ var _Servicios_veredas_servicios_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../Servicios/veredas_servicios.js */ "./resources/js/Servicios/veredas_servicios.js");
/* harmony import */ var vue_pithy_progress_lib_circle_progress_css__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue-pithy-progress/lib/circle-progress.css */ "./node_modules/vue-pithy-progress/lib/circle-progress.css");
/* harmony import */ var vue_pithy_progress_lib_circle_progress_css__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue_pithy_progress_lib_circle_progress_css__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var datatables_net__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! datatables.net */ "./node_modules/datatables.net/js/jquery.dataTables.js");
/* harmony import */ var datatables_net__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(datatables_net__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ../../store */ "./resources/js/store.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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









/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {
    this.listarBarrios();
    this.listarCorregimientos();
    this.listarVeredas();
    this.personas_discapacitadas();
  },
  name: "gestan",
  data: function data() {
    return {
      personas_discapacitadas_array: [],
      comboBarrio: "",
      barrios: [],
      barriosCorregimiento: [],
      comboBarrio2: "",
      comboCorregimiento: "",
      corregimientos: [],
      comboVereda: "",
      veredas: [],
      tipoCombo: "todos"
    };
  },
  computed: {},
  methods: {
    personas_discapacitadas: function personas_discapacitadas() {
      var _this = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.next = 2;
                return _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__["personas_discapacitadas"]("todos", null).then(function (respuesta) {
                  _this.personas_discapacitadas_array = respuesta.data.discapacitados;

                  _this.crearDataTable();
                });

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee);
      }))();
    },
    listarBarrios: function listarBarrios() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                parametros = {
                  _token: _this2.csrf,
                  id: null,
                  opcion: "MUN"
                };
                _context2.next = 3;
                return _Servicios_barrios_servicios_js__WEBPACK_IMPORTED_MODULE_2__["comboBarrios"](parametros).then(function (respuesta) {
                  _this2.barrios = respuesta.data.arrayBarrios;
                });

              case 3:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    listarBarriosCorregimiento: function listarBarriosCorregimiento() {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                parametros = {
                  _token: _this3.csrf,
                  id: _this3.comboCorregimiento,
                  opcion: "CORRE"
                };
                _context3.next = 3;
                return _Servicios_barrios_servicios_js__WEBPACK_IMPORTED_MODULE_2__["comboBarrios"](parametros).then(function (respuesta) {
                  _this3.barriosCorregimiento = respuesta.data.arrayBarrios;
                });

              case 3:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3);
      }))();
    },
    listarCorregimientos: function listarCorregimientos() {
      var _this4 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                parametros = {
                  _token: _this4.csrf
                };
                _context4.next = 3;
                return _Servicios_corregimientos_servicios_js__WEBPACK_IMPORTED_MODULE_3__["comboCorregimientos"](parametros).then(function (respuesta) {
                  _this4.corregimientos = respuesta.data.corregimientos;
                });

              case 3:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4);
      }))();
    },
    listarVeredas: function listarVeredas() {
      var _this5 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {
          while (1) {
            switch (_context5.prev = _context5.next) {
              case 0:
                parametros = {
                  _token: _this5.csrf
                };
                _context5.next = 3;
                return _Servicios_veredas_servicios_js__WEBPACK_IMPORTED_MODULE_4__["comboVeredas"](parametros).then(function (respuesta) {
                  _this5.veredas = respuesta.data.veredas;
                });

              case 3:
              case "end":
                return _context5.stop();
            }
          }
        }, _callee5);
      }))();
    },
    cambiaraTodos: function cambiaraTodos() {
      if (this.tipoCombo == "todos") {
        this.comboBarrio = "";
        this.comboVereda = "";
        this.comboCorregimiento = "";
        this.comboBarrio2 = "";
        this.personas_discapacitadas();
      }
    },
    filtrar: function filtrar(tipo) {
      var _this6 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee6() {
        var id;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee6$(_context6) {
          while (1) {
            switch (_context6.prev = _context6.next) {
              case 0:
                if (tipo == "barrio") {
                  tipo = "barrio";
                  _this6.comboCorregimiento = "";
                  _this6.comboVereda = "";
                  _this6.comboBarrio2 = "";
                  id = _this6.comboBarrio;
                }

                if (tipo == "corregimiento") {
                  tipo = "corre";
                  _this6.comboBarrio = "";
                  _this6.comboVereda = "";
                  _this6.comboBarrio2 = "";
                  id = _this6.comboCorregimiento;

                  _this6.listarBarriosCorregimiento();
                }

                if (tipo == "vereda") {
                  tipo = "vereda";
                  _this6.comboCorregimiento = "";
                  _this6.comboBarrio = "";
                  _this6.comboBarrio2 = "";
                  id = _this6.comboVereda;
                }

                if (tipo == "barrio2") {
                  tipo = "barrio";
                  _this6.comboVereda = "";
                  _this6.comboBarrio = "";
                  id = _this6.comboBarrio2;

                  if (_this6.comboBarrio2 == "") {
                    tipo = "corre";
                    id = _this6.comboCorregimiento;
                  }
                }

                if (_this6.comboVereda == "" && _this6.comboBarrio == "" && _this6.comboCorregimiento == "" && _this6.comboBarrio2 == "") {
                  tipo = "Todos";
                }

                _context6.next = 7;
                return _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__["personas_discapacitadas"](tipo, id).then(function (respuesta) {
                  _this6.personas_discapacitadas_array = respuesta.data.discapacitados;

                  _this6.crearDataTable();
                })["catch"](function (err) {
                  console.log(err);
                });

              case 7:
              case "end":
                return _context6.stop();
            }
          }
        }, _callee6);
      }))();
    },
    crearDataTable: function crearDataTable() {
      jquery__WEBPACK_IMPORTED_MODULE_6___default()("#tablaDatos").dataTable().fnDestroy();
      setTimeout(function () {
        jquery__WEBPACK_IMPORTED_MODULE_6___default()('#tablaDatos').DataTable({
          "lengthChange": false,
          "ordering": false,
          pageLength: 10,
          "bFilter": false,
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
    exportToExcel: function exportToExcel() {
      var _this7 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee7() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee7$(_context7) {
          while (1) {
            switch (_context7.prev = _context7.next) {
              case 0:
                parametros = {
                  datos: _this7.personas_discapacitadas_array,
                  titulo: "Reporte de Personas Discapacitadas"
                };
                _context7.prev = 1;
                _context7.next = 4;
                return _Servicios_reportes__WEBPACK_IMPORTED_MODULE_1__["exportaDiscapacitadosExcel"](parametros).then(function (respuesta) {
                  var href = _store__WEBPACK_IMPORTED_MODULE_8__["default"].state.apiURL + respuesta.data.nombre;

                  _this7.downloadItem(href);
                });

              case 4:
                _context7.next = 15;
                break;

              case 6:
                _context7.prev = 6;
                _context7.t0 = _context7["catch"](1);
                _context7.t1 = _context7.t0.response.status;
                _context7.next = _context7.t1 === 422 ? 11 : 13;
                break;

              case 11:
                _this7.$swal("Error...!", "Ocurrio un error!", "error");

                return _context7.abrupt("break", 15);

              case 13:
                _this7.$swal("Error...!", "Ocurrio un error!", "error");

                return _context7.abrupt("break", 15);

              case 15:
              case "end":
                return _context7.stop();
            }
          }
        }, _callee7, null, [[1, 6]]);
      }))();
    },
    downloadItem: function downloadItem(url) {
      var link = document.createElement('a');
      link.href = url;
      link.download = "Reporte-Discapacitados.xlsx";
      link.click();
      URL.revokeObjectURL(link.href);
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-pithy-progress/lib/circle-progress.css":
/*!*************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-pithy-progress/lib/circle-progress.css ***!
  \*************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, ".a-circle-progress-wrapper .circle-progress{position:relative;display:flex;justify-content:center}.a-circle-progress-wrapper .circle-progress .circle-progress-bar{transform:rotate(-90deg)}.a-circle-progress-wrapper .circle-progress .progress-content{position:absolute;left:50%;transform:translateX(-50%)}.a-circle-progress-wrapper .circle-progress .progress-content .percent-text{height:100%;width:100%;display:flex;align-items:center;justify-content:center}", ""]);

// exports


/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.table_data {\n    width: 100%;\n    font-size: 17px;\n    border-collapse: collapse;\n}\n.table_data thead {\n    padding: 0.3em;\n    color: #fff !important;\n    background: #5578eb;\n}\n.table_data thead tr th, .table_data tbody tr td {\n    text-align: left;\n    vertical-align: top;\n    padding: 0.3em;\n    caption-side: bottom;\n}\n.dataTable th {\n    color: #ffffff !important;\n}\n.dataTables_paginate span .paginate_button{ \n    color: #5578eb !important;\n    margin-left: 4px;\n    margin-right: 4px;\n    font-weight: bold;\n    background-color: #ffff;\n    padding: 4px 8px 4px 8px;\n    border-radius: 4px;\n}\n.dataTables_paginate span .current{     \n    color: #ffff !important;\n    margin-left: 4px;\n    margin-right: 4px;\n    font-weight: bold;\n    background-color: #5578eb;\n    padding: 4px 8px 4px 8px;\n    border-radius: 4px;\n}\n.next{\n    cursor: pointer;\n    background-color: #fd397a;\n    color: white;\n    padding: 5px;\n    border-radius: 4px;\n}\n.previous{\n    cursor: pointer;\n    background-color: #fd397a;\n    color: white;\n    padding: 5px;\n    border-radius: 4px;\n}\n.next:hover, .previous:hover{\n    font-weight: bold;\n    color: white;\n}\n.dataTables_paginate{\n    margin-top: 20px;\n    height: 40px;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Discapacitados.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=template&id=3faadd0c&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=template&id=3faadd0c& ***!
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
  return _c("div", [
    _c(
      "div",
      { staticClass: "kt-portlet", staticStyle: { "margin-top": "-4%" } },
      [
        _vm._m(0),
        _vm._v(" "),
        _c("div", { staticClass: "kt-portlet__body" }, [
          _c("div", { staticClass: "kt-section" }, [
            _c("div", { staticClass: "kt-section__content" }, [
              _c("div", { staticClass: "row" }, [
                _c(
                  "div",
                  {
                    staticClass: "col-sm-3 col-lg-3 text-left",
                    staticStyle: { padding: "10px 10px 10px 10px" }
                  },
                  [
                    _c("h4", [_vm._v("Aplicar filtro por:")]),
                    _vm._v(" "),
                    _c("br"),
                    _vm._v(" "),
                    _c(
                      "select",
                      {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.tipoCombo,
                            expression: "tipoCombo"
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
                              _vm.tipoCombo = $event.target.multiple
                                ? $$selectedVal
                                : $$selectedVal[0]
                            },
                            function($event) {
                              return _vm.cambiaraTodos()
                            }
                          ]
                        }
                      },
                      [
                        _c("option", { attrs: { value: "todos" } }, [
                          _vm._v("Seleccione...")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "barrio" } }, [
                          _vm._v("Barrio - Cabecera Municipal")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "barrio2" } }, [
                          _vm._v("Barrio - Corregimiento")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "corregimiento" } }, [
                          _vm._v("Corregimiento")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "vereda" } }, [
                          _vm._v("Vereda")
                        ])
                      ]
                    )
                  ]
                ),
                _vm._v(" "),
                _vm.tipoCombo == "todos"
                  ? _c("div", {
                      staticClass: "col-sm-6 col-lg-6 text-left",
                      staticStyle: { padding: "10px 10px 10px 20px" }
                    })
                  : _vm._e(),
                _vm._v(" "),
                _vm.tipoCombo == "barrio"
                  ? _c(
                      "div",
                      {
                        staticClass: "col-sm-4 col-lg-4 text-left",
                        staticStyle: { padding: "10px 10px 10px 20px" }
                      },
                      [
                        _c("h4", [_vm._v("Seleccione un Barrio")]),
                        _vm._v(" "),
                        _c("br"),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.comboBarrio,
                                expression: "comboBarrio"
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
                                      var val =
                                        "_value" in o ? o._value : o.value
                                      return val
                                    })
                                  _vm.comboBarrio = $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                },
                                function($event) {
                                  return _vm.filtrar("barrio")
                                }
                              ]
                            }
                          },
                          [
                            _c("option", { attrs: { value: "" } }, [
                              _vm._v("Seleccione...")
                            ]),
                            _vm._v(" "),
                            _vm._l(_vm.barrios, function(item) {
                              return _c(
                                "option",
                                { domProps: { value: item.value } },
                                [_vm._v(_vm._s(item.texto))]
                              )
                            })
                          ],
                          2
                        )
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.tipoCombo == "corregimiento" || _vm.tipoCombo == "barrio2"
                  ? _c(
                      "div",
                      {
                        staticClass: "col-sm-3 col-lg-3 text-left",
                        staticStyle: { padding: "10px 10px 10px 20px" }
                      },
                      [
                        _c("h4", [_vm._v("Seleccione un Corregimiento")]),
                        _vm._v(" "),
                        _c("br"),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.comboCorregimiento,
                                expression: "comboCorregimiento"
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
                                      var val =
                                        "_value" in o ? o._value : o.value
                                      return val
                                    })
                                  _vm.comboCorregimiento = $event.target
                                    .multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                },
                                function($event) {
                                  return _vm.filtrar("corregimiento")
                                }
                              ]
                            }
                          },
                          [
                            _c("option", { attrs: { value: "" } }, [
                              _vm._v("Seleccione...")
                            ]),
                            _vm._v(" "),
                            _vm._l(_vm.corregimientos, function(item) {
                              return _c(
                                "option",
                                { domProps: { value: item.id } },
                                [_vm._v(_vm._s(item.descripcion))]
                              )
                            })
                          ],
                          2
                        )
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.tipoCombo == "barrio2"
                  ? _c(
                      "div",
                      {
                        staticClass: "col-sm-3 col-lg-3 text-left",
                        staticStyle: { padding: "10px 10px 10px 20px" }
                      },
                      [
                        _c("h4", [_vm._v("Seleccione un Barrio")]),
                        _vm._v(" "),
                        _c("br"),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.comboBarrio2,
                                expression: "comboBarrio2"
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
                                      var val =
                                        "_value" in o ? o._value : o.value
                                      return val
                                    })
                                  _vm.comboBarrio2 = $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                },
                                function($event) {
                                  return _vm.filtrar("barrio2")
                                }
                              ]
                            }
                          },
                          [
                            _c("option", { attrs: { value: "" } }, [
                              _vm._v("Seleccione...")
                            ]),
                            _vm._v(" "),
                            _vm._l(_vm.barriosCorregimiento, function(item) {
                              return _c(
                                "option",
                                { domProps: { value: item.value } },
                                [_vm._v(_vm._s(item.texto))]
                              )
                            })
                          ],
                          2
                        )
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.tipoCombo == "vereda"
                  ? _c(
                      "div",
                      {
                        staticClass: "col-sm-4 col-lg-4 text-left",
                        staticStyle: { padding: "10px 10px 10px 20px" }
                      },
                      [
                        _c("h4", [_vm._v("Seleccione una Vereda")]),
                        _vm._v(" "),
                        _c("br"),
                        _vm._v(" "),
                        _c(
                          "select",
                          {
                            directives: [
                              {
                                name: "model",
                                rawName: "v-model",
                                value: _vm.comboVereda,
                                expression: "comboVereda"
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
                                      var val =
                                        "_value" in o ? o._value : o.value
                                      return val
                                    })
                                  _vm.comboVereda = $event.target.multiple
                                    ? $$selectedVal
                                    : $$selectedVal[0]
                                },
                                function($event) {
                                  return _vm.filtrar("vereda")
                                }
                              ]
                            }
                          },
                          [
                            _c("option", { attrs: { value: "" } }, [
                              _vm._v("Seleccione...")
                            ]),
                            _vm._v(" "),
                            _vm._l(_vm.veredas, function(item) {
                              return _c(
                                "option",
                                { domProps: { value: item.id } },
                                [_vm._v(_vm._s(item.descripcion))]
                              )
                            })
                          ],
                          2
                        )
                      ]
                    )
                  : _vm._e(),
                _vm._v(" "),
                _vm.tipoCombo == "corregimiento"
                  ? _c("div", {
                      staticClass: "col-sm-1 col-lg-1 text-left",
                      staticStyle: { padding: "10px 10px 10px 20px" }
                    })
                  : _vm._e(),
                _vm._v(" "),
                _vm.tipoCombo != "todos" && _vm.tipoCombo != "barrio2"
                  ? _c("div", {
                      staticClass: "col-sm-2 col-lg-2 text-left",
                      staticStyle: { padding: "10px 10px 10px 20px" }
                    })
                  : _vm._e(),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    ref: "boton1",
                    staticClass: "col-sm-3 col-lg-3 text-right",
                    staticStyle: { padding: "60px 10px 10px 20px" }
                  },
                  [
                    _c(
                      "button",
                      {
                        staticClass: "btn btn-success",
                        on: {
                          click: function($event) {
                            return _vm.exportToExcel()
                          }
                        }
                      },
                      [
                        _c("i", {
                          staticClass: "fa fa-table",
                          attrs: { "aria-hidden": "true" }
                        }),
                        _vm._v(" Exportar Excel")
                      ]
                    )
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-12" }, [
                  _c(
                    "table",
                    {
                      staticClass: "table table-sm table-hover",
                      attrs: { id: "tablaDatos" }
                    },
                    [
                      _vm._m(1),
                      _vm._v(" "),
                      _c(
                        "tbody",
                        _vm._l(_vm.personas_discapacitadas_array, function(
                          item,
                          index
                        ) {
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
                                  "\n                                            " +
                                    _vm._s(index + 1) +
                                    "\n                                        "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  width: "150px",
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                                            " +
                                    _vm._s(item.identificacion) +
                                    "\n                                        "
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
                                  "\n                                            " +
                                    _vm._s(item.pnom) +
                                    " " +
                                    _vm._s(item.snom) +
                                    " " +
                                    _vm._s(item.pape) +
                                    " " +
                                    _vm._s(item.sape) +
                                    "\n                                        "
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
                                  "\n                                            " +
                                    _vm._s(item.edad) +
                                    " Años\n                                        "
                                )
                              ]
                            ),
                            _vm._v(" "),
                            _c(
                              "td",
                              {
                                staticStyle: {
                                  width: "150px",
                                  "font-weight": "normal",
                                  "vertical-align": "middle",
                                  "text-align": "left",
                                  "text-transform": "capitalize"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                                            " +
                                    _vm._s(item.discapacidad) +
                                    "\n                                        "
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
                                  "\n                                            " +
                                    _vm._s(item.localizacion) +
                                    "\n                                        "
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
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "kt-portlet__head" }, [
      _c("div", { staticClass: "kt-portlet__head-label" }, [
        _c("h3", { staticClass: "kt-portlet__head-title" }, [
          _c("span", { staticClass: "kt-widget20__number kt-font-danger" }, [
            _vm._v("REPORTE DE DISCAPACITADOS")
          ])
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
        _c("th", { staticClass: "text-left" }, [_vm._v("No.")]),
        _vm._v(" "),
        _c(
          "th",
          { staticClass: "text-left", staticStyle: { width: "150px" } },
          [
            _vm._v(
              "\n                                            Identificación\n                                        "
            )
          ]
        ),
        _vm._v(" "),
        _c("th", { staticClass: "text-left" }, [
          _vm._v(
            "\n                                            Nombre\n                                        "
          )
        ]),
        _vm._v(" "),
        _c("th", [
          _vm._v(
            "\n                                            Edad\n                                        "
          )
        ]),
        _vm._v(" "),
        _c("th", { staticStyle: { width: "150px" } }, [
          _vm._v(
            "\n                                            Discapacidad\n                                        "
          )
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "text-left" }, [
          _vm._v(
            "\n                                            Ubicación\n                                        "
          )
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-pithy-progress/lib/circle-progress.css":
/*!*****************************************************************!*\
  !*** ./node_modules/vue-pithy-progress/lib/circle-progress.css ***!
  \*****************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../css-loader??ref--5-1!../../postcss-loader/src??ref--5-2!./circle-progress.css */ "./node_modules/css-loader/index.js?!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-pithy-progress/lib/circle-progress.css");

if(typeof content === 'string') content = [[module.i, content, '']];

var transform;
var insertInto;



var options = {"hmr":true}

options.transform = transform
options.insertInto = undefined;

var update = __webpack_require__(/*! ../../style-loader/lib/addStyles.js */ "./node_modules/style-loader/lib/addStyles.js")(content, options);

if(content.locals) module.exports = content.locals;

if(false) {}

/***/ }),

/***/ "./resources/js/Servicios/barrios_servicios.js":
/*!*****************************************************!*\
  !*** ./resources/js/Servicios/barrios_servicios.js ***!
  \*****************************************************/
/*! exports provided: listarBarrios, guardarBarrios, eliminarBarrios, comboBarrios, exportar */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarBarrios", function() { return listarBarrios; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardarBarrios", function() { return guardarBarrios; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminarBarrios", function() { return eliminarBarrios; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "comboBarrios", function() { return comboBarrios; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportar", function() { return exportar; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listarBarrios($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/barrios', $data);
}
function guardarBarrios($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/barrios/guardar', $data);
}
function eliminarBarrios($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/barrios/eliminar', $data);
}
function comboBarrios($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/barrios/combo', $data);
}
function exportar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/barrios/exportar', $data);
}

/***/ }),

/***/ "./resources/js/Servicios/corregimientos_servicios.js":
/*!************************************************************!*\
  !*** ./resources/js/Servicios/corregimientos_servicios.js ***!
  \************************************************************/
/*! exports provided: listarCorregimientos, guardarCorregimientos, eliminarCorregimientos, comboCorregimientos */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarCorregimientos", function() { return listarCorregimientos; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardarCorregimientos", function() { return guardarCorregimientos; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminarCorregimientos", function() { return eliminarCorregimientos; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "comboCorregimientos", function() { return comboCorregimientos; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listarCorregimientos($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/corregimientos', $data);
}
function guardarCorregimientos($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/corregimientos/guardar', $data);
}
function eliminarCorregimientos($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/corregimientos/eliminar', $data);
}
function comboCorregimientos($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/corregimientos/combo', $data);
}

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

/***/ "./resources/js/Servicios/veredas_servicios.js":
/*!*****************************************************!*\
  !*** ./resources/js/Servicios/veredas_servicios.js ***!
  \*****************************************************/
/*! exports provided: listarVeredas, guardarVeredas, eliminarVeredas, comboVeredas */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarVeredas", function() { return listarVeredas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardarVeredas", function() { return guardarVeredas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminarVeredas", function() { return eliminarVeredas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "comboVeredas", function() { return comboVeredas; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listarVeredas($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/veredas', $data);
}
function guardarVeredas($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/veredas/guardar', $data);
}
function eliminarVeredas($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/veredas/eliminar', $data);
}
function comboVeredas($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/veredas/combo', $data);
}

/***/ }),

/***/ "./resources/js/Vistas/Reportes/Discapacitados.vue":
/*!*********************************************************!*\
  !*** ./resources/js/Vistas/Reportes/Discapacitados.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Discapacitados_vue_vue_type_template_id_3faadd0c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Discapacitados.vue?vue&type=template&id=3faadd0c& */ "./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=template&id=3faadd0c&");
/* harmony import */ var _Discapacitados_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Discapacitados.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Discapacitados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Discapacitados.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Discapacitados_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Discapacitados_vue_vue_type_template_id_3faadd0c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Discapacitados_vue_vue_type_template_id_3faadd0c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Reportes/Discapacitados.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Discapacitados.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************!*\
  !*** ./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Discapacitados.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=template&id=3faadd0c&":
/*!****************************************************************************************!*\
  !*** ./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=template&id=3faadd0c& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_template_id_3faadd0c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Discapacitados.vue?vue&type=template&id=3faadd0c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Reportes/Discapacitados.vue?vue&type=template&id=3faadd0c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_template_id_3faadd0c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Discapacitados_vue_vue_type_template_id_3faadd0c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);