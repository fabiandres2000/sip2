(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[20],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Servicios_consultas__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Servicios/consultas */ "./resources/js/Servicios/consultas.js");
/* harmony import */ var _Servicios_barrios_servicios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../Servicios/barrios_servicios */ "./resources/js/Servicios/barrios_servicios.js");
/* harmony import */ var _Servicios_ocupaciones_servicios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../Servicios/ocupaciones_servicios */ "./resources/js/Servicios/ocupaciones_servicios.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    this.iniciales();
  },
  data: function data() {
    return {
      hoy: "",
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      paises_options: [],
      dpto_options: [],
      muni_options: {},
      corregi_options: {},
      barrio_options: {},
      vereda_options: {},
      estado_options: [],
      admini_options: [],
      escolaridad_options: [],
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
      ocupacionAuxiliar: "",
      txtbusqueda: "",
      ocupacionesVector: "",
      paginacionVector: "",
      opcionOcupaciones: "",
      ocupacion: "",
      ocupacionAuxiliar2: "",
      salariominimo: "",
      salariomaximo: ""
    };
  },
  methods: {
    volver: function volver() {},
    buscar: function buscar() {
      this.$router.push({
        name: "ConsultaJefeHogar",
        params: {
          id_dpto: this.id_dpto,
          id_mun: this.id_mun,
          id_corre: this.id_corre,
          id_vereda: this.id_vereda,
          id_zona: this.id_zona,
          id_barrio: this.id_barrio,
          documento: this.documento,
          tipo_id: this.tipo_id,
          sexo: this.sexo,
          estado_civil: this.estado_civil,
          tipo_afiliacion: this.tipo_afiliacion,
          afiliacion_entidad: this.afiliacion_entidad,
          nivel_escolaridad: this.nivel_escolaridad,
          ocupacion: this.ocupacion,
          salariominimo: this.salariominimo,
          salariomaximo: this.salariomaximo
        }
      }); //recibir this.$router.params.acueductos
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
                  _token: _this.csrf
                };
                _context.prev = 1;
                _context.next = 4;
                return _Servicios_consultas__WEBPACK_IMPORTED_MODULE_1__["iniciales"](parametros).then(function (respuesta) {
                  _this.dpto_options = respuesta.data.arrayDpto;
                  _this.muni_options = respuesta.data.arrayMuni;
                  _this.corregi_options = respuesta.data.arrayCorregi;
                  _this.vereda_options = respuesta.data.arrayVeredas;
                  _this.estado_options = respuesta.data.arrayEstados;
                  _this.admini_options = respuesta.data.arrayAdmini;
                  _this.escolaridad_options = respuesta.data.arrayEscolaridad;
                });

              case 4:
                _context.next = 9;
                break;

              case 6:
                _context.prev = 6;
                _context.t0 = _context["catch"](1);
                console.log(_context.t0);

              case 9:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, null, [[1, 6]]);
      }))();
    },
    cambiarCombo: function () {
      var _cambiarCombo = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(caja) {
        var _this2 = this;

        var parametros, _parametros;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                if (caja === "dpto") {
                  this.id_mun = "";
                  this.id_corre = "";
                  this.id_vereda = "";
                  this.id_barrio = "";
                }

                if (!(caja === "muni")) {
                  _context2.next = 20;
                  break;
                }

                this.id_corre = "";
                this.id_vereda = "";
                this.id_barrio = "";
                parametros = {
                  _token: this.csrf,
                  id: this.id_mun,
                  opcion: "MUN"
                };
                _context2.prev = 6;
                _context2.next = 9;
                return _Servicios_barrios_servicios__WEBPACK_IMPORTED_MODULE_2__["comboBarrios"](parametros).then(function (respuesta) {
                  _this2.barrio_options = respuesta.data.arrayBarrios;
                });

              case 9:
                _context2.next = 20;
                break;

              case 11:
                _context2.prev = 11;
                _context2.t0 = _context2["catch"](6);
                _context2.t1 = _context2.t0.response.status;
                _context2.next = _context2.t1 === 422 ? 16 : 18;
                break;

              case 16:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 20);

              case 18:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 20);

              case 20:
                if (!(caja === "corregi")) {
                  _context2.next = 42;
                  break;
                }

                this.id_vereda = "";
                this.id_barrio = "";

                if (!(this.id_corre !== "0" && this.id_corre !== "")) {
                  _context2.next = 41;
                  break;
                }

                _parametros = {
                  _token: this.csrf,
                  id: this.id_corre,
                  opcion: "CORRE"
                };
                _context2.prev = 25;
                _context2.next = 28;
                return _Servicios_barrios_servicios__WEBPACK_IMPORTED_MODULE_2__["comboBarrios"](_parametros).then(function (respuesta) {
                  _this2.barrio_options = respuesta.data.arrayBarrios;
                });

              case 28:
                _context2.next = 39;
                break;

              case 30:
                _context2.prev = 30;
                _context2.t2 = _context2["catch"](25);
                _context2.t3 = _context2.t2.response.status;
                _context2.next = _context2.t3 === 422 ? 35 : 37;
                break;

              case 35:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 39);

              case 37:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 39);

              case 39:
                _context2.next = 42;
                break;

              case 41:
                if (this.id_corre === "0") {
                  this.cambiarCombo("muni");
                  this.id_corre = "0";
                } else {
                  this.cambiarCombo("muni");
                }

              case 42:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this, [[6, 11], [25, 30]]);
      }));

      function cambiarCombo(_x) {
        return _cambiarCombo.apply(this, arguments);
      }

      return cambiarCombo;
    }(),
    formato: function formato(caja) {
      if (caja == "id1") {
        if (this.tipo_id == "CC") {
          this.documento = this.documento.replace(/[.*+\-?^${}()|[\]\\]/g, "");
          var val = (this.documento / 1).toFixed(0).replace(".", ",");
          this.documento = val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

          if (this.documento == "NaN") {
            this.documento = "";
          }

          if (this.documento == "0") {
            this.documento = "";
          }
        }
      }

      if (caja == "salario1") {
        this.salariominimo = this.salariominimo.replace(/[.*+\-?^${}()|[\]\\]/g, "");

        var _val = (this.salariominimo / 1).toFixed(0).replace(".", ",");

        this.salariominimo = _val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        if (this.salariominimo == "NaN") {
          this.salariominimo = "";
        }

        if (this.salariominimo == "0") {
          this.salariominimo = "";
        }
      }

      if (caja == "salario2") {
        this.salariomaximo = this.salariomaximo.replace(/[.*+\-?^${}()|[\]\\]/g, "");

        var _val2 = (this.salariomaximo / 1).toFixed(0).replace(".", ",");

        this.salariomaximo = _val2.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");

        if (this.salariomaximo == "NaN") {
          this.salariomaximo = "";
        }

        if (this.salariomaximo == "0") {
          this.salariomaximo = "";
        }
      }
    },
    abrirModalOcupaciones: function abrirModalOcupaciones(opcion) {
      this.opcionOcupaciones = opcion;
      this.txtbusqueda = "";
      this.consultarOcupaciones(1);
      this.$refs.modalOcupaciones.show();
    },
    cerrarModal: function cerrarModal() {
      this.$refs.modalOcupaciones.hide();
    },
    consultarOcupaciones: function consultarOcupaciones(pagina) {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                parametros = {
                  txtbusqueda: _this3.txtbusqueda.trim(),
                  _token: _this3.csrf,
                  page: pagina
                };
                _context3.prev = 1;
                _context3.next = 4;
                return _Servicios_ocupaciones_servicios__WEBPACK_IMPORTED_MODULE_3__["listarOcupaciones"](parametros).then(function (respuesta) {
                  _this3.ocupacionesVector = respuesta.data.ocupaciones.data;
                  _this3.paginacionVector = respuesta.data.paginacion;
                });

              case 4:
                _context3.next = 15;
                break;

              case 6:
                _context3.prev = 6;
                _context3.t0 = _context3["catch"](1);
                _context3.t1 = _context3.t0.response.status;
                _context3.next = _context3.t1 === 422 ? 11 : 13;
                break;

              case 11:
                _this3.$swal("Error...!", "Ocurrio un error!", "error");

                return _context3.abrupt("break", 15);

              case 13:
                _this3.$swal("Error...!", "Ocurrio un error!", "error");

                return _context3.abrupt("break", 15);

              case 15:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3, null, [[1, 6]]);
      }))();
    },
    seleccionarOcupaciones: function seleccionarOcupaciones(item) {
      if (this.opcionOcupaciones === "jefe") {
        this.ocupacion = item.id;
        this.ocupacionAuxiliar = item.descripcion;
      } else {
        this.CA1.ocupacion = item.id;
        this.ocupacionAuxiliar2 = item.descripcion;
      }

      this.$refs.modalOcupaciones.hide();
    }
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=style&index=0&lang=css&":
/*!***********************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=style&index=0&lang=css& ***!
  \***********************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n.color-datepicker {\n  background: #f2f2f2;\n  border: 1px solid #ddd;\n  padding: 0em 1em 1em;\n  margin-bottom: 2em;\n}\n.modal-sm {\n  max-width: 60%;\n}\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=style&index=0&lang=css&":
/*!***************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=style&index=0&lang=css& ***!
  \***************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./jefedehogar.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=template&id=647a3c5a&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=template&id=647a3c5a& ***!
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
                      "button",
                      {
                        staticClass: "btn btn-brand",
                        attrs: { type: "button" },
                        on: {
                          click: function($event) {
                            $event.preventDefault()
                            return _vm.buscar.apply(null, arguments)
                          }
                        }
                      },
                      [
                        _c("i", { staticClass: "la la-search" }),
                        _vm._v(" "),
                        _c("span", { staticClass: "kt-hidden-mobile" }, [
                          _vm._v("Buscar")
                        ])
                      ]
                    )
                  ])
                ])
              ]
            ),
            _vm._v(" "),
            _c("div", { staticClass: "kt-portlet__body" }, [
              _vm._m(1),
              _vm._v(" "),
              _c("div", { staticClass: "form-group row" }, [
                _c(
                  "div",
                  { staticClass: "col-lg-4" },
                  [
                    _c("label", [_vm._v("Departamento:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        ref: "id_dpto",
                        on: {
                          change: function($event) {
                            return _vm.cambiarCombo("dpto")
                          }
                        },
                        model: {
                          value: _vm.id_dpto,
                          callback: function($$v) {
                            _vm.id_dpto =
                              typeof $$v === "string" ? $$v.trim() : $$v
                          },
                          expression: "id_dpto"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.dpto_options, function(item) {
                          return _c(
                            "option",
                            {
                              key: item.value,
                              domProps: { value: item.value }
                            },
                            [
                              _vm._v(
                                "\n                " +
                                  _vm._s(item.texto) +
                                  "\n              "
                              )
                            ]
                          )
                        })
                      ],
                      2
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-lg-4" },
                  [
                    _c("label", [_vm._v("Municipio:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        ref: "id_mun",
                        on: {
                          change: function($event) {
                            return _vm.cambiarCombo("muni")
                          }
                        },
                        model: {
                          value: _vm.id_mun,
                          callback: function($$v) {
                            _vm.id_mun =
                              typeof $$v === "string" ? $$v.trim() : $$v
                          },
                          expression: "id_mun"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.muni_options[_vm.id_dpto], function(item) {
                          return _c(
                            "option",
                            {
                              key: item.value,
                              domProps: { value: item.value }
                            },
                            [
                              _vm._v(
                                "\n                " +
                                  _vm._s(item.texto) +
                                  "\n              "
                              )
                            ]
                          )
                        })
                      ],
                      2
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-lg-4" },
                  [
                    _c("label", [_vm._v("Corregimiento:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        on: {
                          change: function($event) {
                            return _vm.cambiarCombo("corregi")
                          }
                        },
                        model: {
                          value: _vm.id_corre,
                          callback: function($$v) {
                            _vm.id_corre = $$v
                          },
                          expression: "id_corre"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "0" } }, [
                          _vm._v("No Aplica")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.corregi_options[_vm.id_mun], function(item) {
                          return _c(
                            "option",
                            {
                              key: item.value,
                              domProps: { value: item.value }
                            },
                            [
                              _vm._v(
                                "\n                " +
                                  _vm._s(item.texto) +
                                  "\n              "
                              )
                            ]
                          )
                        })
                      ],
                      2
                    )
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "form-group row" }, [
                _c(
                  "div",
                  { staticClass: "col-lg-4" },
                  [
                    _c("label", [_vm._v("Vereda:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        on: {
                          change: function($event) {
                            return _vm.cambiarCombo("vereda")
                          }
                        },
                        model: {
                          value: _vm.id_vereda,
                          callback: function($$v) {
                            _vm.id_vereda = $$v
                          },
                          expression: "id_vereda"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "0" } }, [
                          _vm._v("No Aplica")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.vereda_options[_vm.id_corre], function(
                          item
                        ) {
                          return _c(
                            "option",
                            {
                              key: item.value,
                              domProps: { value: item.value }
                            },
                            [
                              _vm._v(
                                "\n                " +
                                  _vm._s(item.texto) +
                                  "\n              "
                              )
                            ]
                          )
                        })
                      ],
                      2
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-lg-4" },
                  [
                    _c("label", [_vm._v("Barrio:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        model: {
                          value: _vm.id_barrio,
                          callback: function($$v) {
                            _vm.id_barrio = $$v
                          },
                          expression: "id_barrio"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "0" } }, [
                          _vm._v("No Aplica")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.barrio_options, function(item) {
                          return _c(
                            "option",
                            {
                              key: item.value,
                              domProps: { value: item.value }
                            },
                            [
                              _vm._v(
                                "\n                " +
                                  _vm._s(item.texto) +
                                  "\n              "
                              )
                            ]
                          )
                        })
                      ],
                      2
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-lg-4" },
                  [
                    _c("label", [_vm._v("Zona:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        model: {
                          value: _vm.id_zona,
                          callback: function($$v) {
                            _vm.id_zona = $$v
                          },
                          expression: "id_zona"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "0" } }, [
                          _vm._v("No Aplica")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "1" } }, [
                          _vm._v("Urbano")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "2" } }, [
                          _vm._v("Rural centro poblado")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "3" } }, [
                          _vm._v("Rural disperso")
                        ])
                      ]
                    )
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _vm._m(2),
              _vm._v(" "),
              _c("div", { staticClass: "form-group row" }, [
                _c(
                  "div",
                  { staticClass: "col-lg-4" },
                  [
                    _c("label", [_vm._v("Tipo de Documento (*):")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        ref: "tipo_id",
                        on: {
                          change: function($event) {
                            return _vm.formato("tipoid")
                          }
                        },
                        model: {
                          value: _vm.tipo_id,
                          callback: function($$v) {
                            _vm.tipo_id =
                              typeof $$v === "string" ? $$v.trim() : $$v
                          },
                          expression: "tipo_id"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "CC" } }, [
                          _vm._v("CEDULA DE CIUDADANIA")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "PA" } }, [
                          _vm._v("PASAPORTE")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "RC" } }, [
                          _vm._v("REGISTRO CIVIL")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "TI" } }, [
                          _vm._v("TARJETA DE IDENTIDAD")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "ASI" } }, [
                          _vm._v("ADULTO SIN IDENTIFICACIÓN")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "MSI" } }, [
                          _vm._v("MENOR SIN IDENTIFICACIÓN")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "CE" } }, [
                          _vm._v("CEDULA DE EXTRANJERIA")
                        ])
                      ]
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-4" }, [
                  _c("label", [_vm._v("Documento (*):")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model.trim",
                        value: _vm.documento,
                        expression: "documento",
                        modifiers: { trim: true }
                      }
                    ],
                    ref: "identificacionJefe",
                    staticClass: "form-control text-capitalize",
                    attrs: { type: "text", placeholder: "Documento" },
                    domProps: { value: _vm.documento },
                    on: {
                      change: function($event) {
                        return _vm.formato("id1")
                      },
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.documento = $event.target.value.trim()
                      },
                      blur: function($event) {
                        return _vm.$forceUpdate()
                      }
                    }
                  })
                ]),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-lg-4" },
                  [
                    _c("label", [_vm._v("Sexo (*):")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        ref: "sexo",
                        model: {
                          value: _vm.sexo,
                          callback: function($$v) {
                            _vm.sexo =
                              typeof $$v === "string" ? $$v.trim() : $$v
                          },
                          expression: "sexo"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "MASCULINO" } }, [
                          _vm._v("MASCULINO")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "FEMENINO" } }, [
                          _vm._v("FEMENINO")
                        ])
                      ]
                    )
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "form-group row" }, [
                _c(
                  "div",
                  { staticClass: "col-lg-3" },
                  [
                    _c("label", [_vm._v("Estado Civil (*):")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        ref: "estado_civil",
                        model: {
                          value: _vm.estado_civil,
                          callback: function($$v) {
                            _vm.estado_civil = $$v
                          },
                          expression: "estado_civil"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.estado_options, function(item) {
                          return _c(
                            "option",
                            {
                              key: item.value,
                              domProps: { value: item.value }
                            },
                            [
                              _vm._v(
                                "\n                " +
                                  _vm._s(item.texto) +
                                  "\n              "
                              )
                            ]
                          )
                        })
                      ],
                      2
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-lg-6" },
                  [
                    _c("label", [_vm._v("Eps (*):")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        ref: "afiliacion_entidad",
                        class: _vm.afiliacion_entidad == "" ? "" : "is-valid",
                        on: {
                          change: function($event) {
                            return _vm.mostrarOtro("OEPS1")
                          }
                        },
                        model: {
                          value: _vm.afiliacion_entidad,
                          callback: function($$v) {
                            _vm.afiliacion_entidad =
                              typeof $$v === "string" ? $$v.trim() : $$v
                          },
                          expression: "afiliacion_entidad"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "NINGUNA" } }, [
                          _vm._v("NINGUNA")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "OTRA" } }, [
                          _vm._v("OTRA")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.admini_options, function(item) {
                          return _c(
                            "option",
                            {
                              key: item.value,
                              domProps: { value: item.value }
                            },
                            [
                              _vm._v(
                                "\n                " +
                                  _vm._s(item.texto) +
                                  "\n              "
                              )
                            ]
                          )
                        })
                      ],
                      2
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c(
                  "div",
                  { staticClass: "col-lg-3" },
                  [
                    _c("label", [_vm._v("Tipo Afiliación:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        class: _vm.tipo_afiliacion == "" ? "" : "is-valid",
                        model: {
                          value: _vm.tipo_afiliacion,
                          callback: function($$v) {
                            _vm.tipo_afiliacion = $$v
                          },
                          expression: "tipo_afiliacion"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "NA" } }, [
                          _vm._v("No Aplica")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "SUBSIDIADO" } }, [
                          _vm._v("SUBSIDIADO")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "CONTRIBUTIVO" } }, [
                          _vm._v("CONTRIBUTIVO")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "ESPECIAL" } }, [
                          _vm._v("ESPECIAL")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "PPNA" } }, [
                          _vm._v("POBLACIÓN POBRE NO ASEGURADA")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "BENEFICIARIO" } }, [
                          _vm._v("BENEFICIARIO")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { value: "ND" } }, [
                          _vm._v("NO DECLARA")
                        ])
                      ]
                    )
                  ],
                  1
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "form-group row" }, [
                _c(
                  "div",
                  { staticClass: "col-lg-3" },
                  [
                    _c("label", [_vm._v("Nivel Educativo:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        model: {
                          value: _vm.nivel_escolaridad,
                          callback: function($$v) {
                            _vm.nivel_escolaridad = $$v
                          },
                          expression: "nivel_escolaridad"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.escolaridad_options, function(item) {
                          return _c(
                            "option",
                            {
                              key: item.value,
                              domProps: { value: item.value }
                            },
                            [
                              _vm._v(
                                "\n                " +
                                  _vm._s(item.texto) +
                                  "\n              "
                              )
                            ]
                          )
                        })
                      ],
                      2
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-9" }, [
                  _c("label", [_vm._v("Ocupación (*):")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.ocupacionAuxiliar,
                        expression: "ocupacionAuxiliar"
                      }
                    ],
                    ref: "ocupacion",
                    staticClass: "form-control text-capitalize",
                    attrs: {
                      type: "text",
                      placeholder: "Ocupaciones",
                      readonly: true
                    },
                    domProps: { value: _vm.ocupacionAuxiliar },
                    on: {
                      click: function($event) {
                        return _vm.abrirModalOcupaciones("jefe")
                      },
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.ocupacionAuxiliar = $event.target.value
                      }
                    }
                  })
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "form-group row" }, [
                _c("div", { staticClass: "col-lg-3" }, [
                  _c("label", [_vm._v("Salario minimo:")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model.trim",
                        value: _vm.salariominimo,
                        expression: "salariominimo",
                        modifiers: { trim: true }
                      }
                    ],
                    ref: "salario",
                    staticClass: "form-control text-capitalize",
                    attrs: { type: "text", placeholder: "Salario" },
                    domProps: { value: _vm.salariominimo },
                    on: {
                      change: function($event) {
                        return _vm.formato("salario1")
                      },
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.salariominimo = $event.target.value.trim()
                      },
                      blur: function($event) {
                        return _vm.$forceUpdate()
                      }
                    }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-3" }, [
                  _c("label", [_vm._v("Salario maximo:")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model.trim",
                        value: _vm.salariomaximo,
                        expression: "salariomaximo",
                        modifiers: { trim: true }
                      }
                    ],
                    ref: "salario",
                    staticClass: "form-control text-capitalize",
                    attrs: { type: "text", placeholder: "Salario" },
                    domProps: { value: _vm.salariomaximo },
                    on: {
                      change: function($event) {
                        return _vm.formato("salario2")
                      },
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.salariomaximo = $event.target.value.trim()
                      },
                      blur: function($event) {
                        return _vm.$forceUpdate()
                      }
                    }
                  })
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
          ref: "modalOcupaciones",
          attrs: {
            "hide-footer": "",
            title: "Ocupaciones",
            size: "xl",
            centered: "",
            "header-bg-variant": "danger",
            "header-text-variant": "light",
            "no-close-on-backdrop": true
          }
        },
        [
          _c("div", { staticClass: "d-block" }, [
            _c("form", [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-6 col-lg-6" }),
                _vm._v(" "),
                _c("div", { staticClass: "col-md-6 col-lg-6" }, [
                  _c("form", { staticClass: "kt-form" }, [
                    _c("div", { staticClass: "form-group" }, [
                      _c("div", { staticClass: "input-group" }, [
                        _c("input", {
                          directives: [
                            {
                              name: "model",
                              rawName: "v-model",
                              value: _vm.txtbusqueda,
                              expression: "txtbusqueda"
                            }
                          ],
                          staticClass: "form-control",
                          attrs: { type: "text", placeholder: "Busqueda" },
                          domProps: { value: _vm.txtbusqueda },
                          on: {
                            input: function($event) {
                              if ($event.target.composing) {
                                return
                              }
                              _vm.txtbusqueda = $event.target.value
                            }
                          }
                        }),
                        _vm._v(" "),
                        _c("div", { staticClass: "input-group-append" }, [
                          _c(
                            "button",
                            {
                              staticClass: "btn btn-primary btn-icon",
                              attrs: { type: "button" },
                              on: {
                                click: function($event) {
                                  return _vm.consultarOcupaciones(1)
                                }
                              }
                            },
                            [_c("i", { staticClass: "fa fa-search" })]
                          )
                        ])
                      ])
                    ])
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "form-group row" }, [
                _c("div", { staticClass: "col-md-12" }, [
                  _c(
                    "div",
                    {
                      staticClass: "table-responsive",
                      staticStyle: { height: "350px" }
                    },
                    [
                      _c(
                        "table",
                        { staticClass: "table table-sm table-hover" },
                        [
                          _c("thead", {}, [
                            _c("tr", { staticClass: "kt-bg-fill-brand" }, [
                              _c("th", [_vm._v("No.")]),
                              _vm._v(" "),
                              _c("th", [_vm._v("Ocupación")]),
                              _vm._v(" "),
                              _c("td", { staticClass: "text-center" }, [
                                _vm._v("Opciones")
                              ])
                            ])
                          ]),
                          _vm._v(" "),
                          _c(
                            "tbody",
                            _vm._l(_vm.ocupacionesVector, function(
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
                                    _c(
                                      "span",
                                      { staticClass: "text-capitalize" },
                                      [_vm._v(_vm._s(item.descripcion))]
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
                                          "btn btn-icon btn-sm btn-outline-success",
                                        attrs: {
                                          type: "button",
                                          title: "Seleccionar"
                                        },
                                        on: {
                                          click: function($event) {
                                            return _vm.seleccionarOcupaciones(
                                              item
                                            )
                                          }
                                        }
                                      },
                                      [
                                        _c(
                                          "svg",
                                          {
                                            staticClass: "kt-svg-icon",
                                            attrs: {
                                              xmlns:
                                                "http://www.w3.org/2000/svg",
                                              "xmlns:xlink":
                                                "http://www.w3.org/1999/xlink",
                                              width: "24px",
                                              height: "24px",
                                              viewBox: "0 0 24 24",
                                              version: "1.1"
                                            }
                                          },
                                          [
                                            _c(
                                              "g",
                                              {
                                                attrs: {
                                                  stroke: "none",
                                                  "stroke-width": "1",
                                                  fill: "none",
                                                  "fill-rule": "evenodd"
                                                }
                                              },
                                              [
                                                _c("polygon", {
                                                  attrs: {
                                                    id: "Shape",
                                                    points:
                                                      "0 0 24 0 24 24 0 24"
                                                  }
                                                }),
                                                _vm._v(" "),
                                                _c("path", {
                                                  attrs: {
                                                    d:
                                                      "M6.26193932,17.6476484 C5.90425297,18.0684559 5.27315905,18.1196257 4.85235158,17.7619393 C4.43154411,17.404253 4.38037434,16.773159 4.73806068,16.3523516 L13.2380607,6.35235158 C13.6013618,5.92493855 14.2451015,5.87991302 14.6643638,6.25259068 L19.1643638,10.2525907 C19.5771466,10.6195087 19.6143273,11.2515811 19.2474093,11.6643638 C18.8804913,12.0771466 18.2484189,12.1143273 17.8356362,11.7474093 L14.0997854,8.42665306 L6.26193932,17.6476484 Z",
                                                    id: "Path-94",
                                                    fill: "#000000",
                                                    "fill-rule": "nonzero",
                                                    transform:
                                                      "translate(11.999995, 12.000002) rotate(-180.000000) translate(-11.999995, -12.000002) "
                                                  }
                                                })
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ])
                            }),
                            0
                          )
                        ]
                      )
                    ]
                  )
                ])
              ]),
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
                    _vm._v(" Cerrar\n          ")
                  ]
                )
              ])
            ])
          ])
        ]
      ),
      _vm._v(" "),
      _c("br"),
      _vm._v(" "),
      _c("br")
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
          _vm._v("CONSULTA DE JEFES DE HOGAR")
        ])
      ])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [
      _c(
        "span",
        {
          staticClass: "kt-font-boldest",
          staticStyle: { "font-size": "18px" }
        },
        [_vm._v("Ubicación")]
      )
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("p", [
      _c(
        "span",
        {
          staticClass: "kt-font-boldest",
          staticStyle: { "font-size": "18px" }
        },
        [_vm._v("Datos del jefe de hogar")]
      )
    ])
  }
]
render._withStripped = true



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

/***/ "./resources/js/Servicios/ocupaciones_servicios.js":
/*!*********************************************************!*\
  !*** ./resources/js/Servicios/ocupaciones_servicios.js ***!
  \*********************************************************/
/*! exports provided: listarOcupaciones, guardarOcupaciones, eliminarOcupaciones, listar_table */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarOcupaciones", function() { return listarOcupaciones; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardarOcupaciones", function() { return guardarOcupaciones; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminarOcupaciones", function() { return eliminarOcupaciones; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listar_table", function() { return listar_table; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listarOcupaciones($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/ocupaciones', $data);
}
function guardarOcupaciones($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/ocupaciones/guardar', $data);
}
function eliminarOcupaciones($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/ocupaciones/eliminar', $data);
}
function listar_table($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/ocupaciones/listar_table', $data);
}

/***/ }),

/***/ "./resources/js/Vistas/Consultas/jefedehogar.vue":
/*!*******************************************************!*\
  !*** ./resources/js/Vistas/Consultas/jefedehogar.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _jefedehogar_vue_vue_type_template_id_647a3c5a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./jefedehogar.vue?vue&type=template&id=647a3c5a& */ "./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=template&id=647a3c5a&");
/* harmony import */ var _jefedehogar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./jefedehogar.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _jefedehogar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./jefedehogar.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _jefedehogar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _jefedehogar_vue_vue_type_template_id_647a3c5a___WEBPACK_IMPORTED_MODULE_0__["render"],
  _jefedehogar_vue_vue_type_template_id_647a3c5a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Consultas/jefedehogar.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./jefedehogar.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=style&index=0&lang=css&":
/*!****************************************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=style&index=0&lang=css& ***!
  \****************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./jefedehogar.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=template&id=647a3c5a&":
/*!**************************************************************************************!*\
  !*** ./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=template&id=647a3c5a& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_template_id_647a3c5a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./jefedehogar.vue?vue&type=template&id=647a3c5a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Consultas/jefedehogar.vue?vue&type=template&id=647a3c5a&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_template_id_647a3c5a___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_jefedehogar_vue_vue_type_template_id_647a3c5a___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);