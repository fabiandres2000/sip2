(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[11],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Servicios_caracterizacion_servicios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Servicios/caracterizacion_servicios */ "./resources/js/Servicios/caracterizacion_servicios.js");
/* harmony import */ var _Servicios_establecimientos_servicios__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../Servicios/establecimientos_servicios */ "./resources/js/Servicios/establecimientos_servicios.js");
/* harmony import */ var _Servicios_unidades_servicios__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../Servicios/unidades_servicios */ "./resources/js/Servicios/unidades_servicios.js");
/* harmony import */ var html2canvas__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! html2canvas */ "./node_modules/html2canvas/dist/npm/index.js");
/* harmony import */ var html2canvas__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(html2canvas__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var jspdf__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! jspdf */ "./node_modules/jspdf/dist/jspdf.min.js");
/* harmony import */ var jspdf__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(jspdf__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var _store__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ../../store */ "./resources/js/store.js");
/* harmony import */ var vue_loading_overlay__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! vue-loading-overlay */ "./node_modules/vue-loading-overlay/dist/vue-loading.min.js");
/* harmony import */ var vue_loading_overlay__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(vue_loading_overlay__WEBPACK_IMPORTED_MODULE_7__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    this.consultar(1);
    this.consultar2(1);
    this.consultar3(1);
  },
  components: {
    Loading: vue_loading_overlay__WEBPACK_IMPORTED_MODULE_7___default.a
  },
  data: function data() {
    return {
      caracterizacion: [],
      caracterizacion2: [],
      nombreCaracterizacion2: "",
      caracterizacion3: [],
      integrantes: [],
      txtbusqueda: "",
      txtbusqueda2: "",
      txtbusqueda3: "",
      bandera: false,
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      datos: [],
      paginacion: {
        total: 0,
        pagina_actual: 0,
        por_pagina: 0,
        ultima_pagina: 0,
        desde: 0,
        hasta: 0
      },
      paginacion2: {
        total: 0,
        pagina_actual: 0,
        por_pagina: 0,
        ultima_pagina: 0,
        desde: 0,
        hasta: 0
      },
      paginacion3: {
        total: 0,
        pagina_actual: 0,
        por_pagina: 0,
        ultima_pagina: 0,
        desde: 0,
        hasta: 0
      },
      offset: 4,
      establecimientos: [],
      unidades: [],
      pdf_caracterizacion: "",
      isLoading: false
    };
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
    },
    esActivo2: function esActivo2() {
      return this.paginacion2.pagina_actual;
    },
    numeroDePaginas2: function numeroDePaginas2() {
      if (!this.paginacion2.hasta) {
        return [];
      }

      var desde = this.paginacion2.pagina_actual - this.offset; // TODO offset

      if (desde < 1) {
        desde = 1;
      }

      var aux = this.offset * 2;
      var hasta = desde + aux;

      if (hasta >= this.paginacion2.ultima_pagina) {
        hasta = this.paginacion2.ultima_pagina;
      }

      var paginasArray = [];

      while (desde <= hasta) {
        paginasArray.push(desde);
        desde++;
      }

      return paginasArray;
    },
    esActivo3: function esActivo3() {
      return this.paginacion3.pagina_actual;
    },
    numeroDePaginas3: function numeroDePaginas3() {
      if (!this.paginacion3.hasta) {
        return [];
      }

      var desde = this.paginacion3.pagina_actual - this.offset; // TODO offset

      if (desde < 1) {
        desde = 1;
      }

      var aux = this.offset * 2;
      var hasta = desde + aux;

      if (hasta >= this.paginacion3.ultima_pagina) {
        hasta = this.paginacion3.ultima_pagina;
      }

      var paginasArray = [];

      while (desde <= hasta) {
        paginasArray.push(desde);
        desde++;
      }

      return paginasArray;
    }
  },
  methods: {
    cambiarPaginas: function cambiarPaginas(pagina) {
      this.paginacion.pagina_actual = pagina;
      this.consultar(pagina);
    },
    cambiarPaginas2: function cambiarPaginas2(pagina) {
      this.paginacion2.pagina_actual = pagina;
      this.consultar2(pagina);
    },
    cambiarPaginas3: function cambiarPaginas3(pagina) {
      this.paginacion3.pagina_actual = pagina;
      this.consultar3(pagina);
    },
    consultar: function () {
      var _consultar = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(pagina) {
        var _this = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                parametros = {
                  txtbusqueda: this.txtbusqueda.trim(),
                  _token: this.csrf,
                  page: pagina
                };
                _context.prev = 1;
                _context.next = 4;
                return _Servicios_caracterizacion_servicios__WEBPACK_IMPORTED_MODULE_1__["listarCaracterizacion"](parametros).then(function (respuesta) {
                  _this.caracterizacion = respuesta.data.caracterizacion.data;
                  _this.paginacion = respuesta.data.paginacion;
                });

              case 4:
                _context.next = 15;
                break;

              case 6:
                _context.prev = 6;
                _context.t0 = _context["catch"](1);
                _context.t1 = _context.t0.response.status;
                _context.next = _context.t1 === 422 ? 11 : 13;
                break;

              case 11:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context.abrupt("break", 15);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context.abrupt("break", 15);

              case 15:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this, [[1, 6]]);
      }));

      function consultar(_x) {
        return _consultar.apply(this, arguments);
      }

      return consultar;
    }(),
    consultar2: function () {
      var _consultar2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(pagina) {
        var _this2 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                parametros = {
                  txtbusqueda: this.txtbusqueda2.trim(),
                  _token: this.csrf,
                  page: pagina
                };
                _context2.prev = 1;
                _context2.next = 4;
                return _Servicios_establecimientos_servicios__WEBPACK_IMPORTED_MODULE_2__["listar"](parametros).then(function (respuesta) {
                  _this2.establecimientos = respuesta.data.establecimientos.data;
                  _this2.paginacion2 = respuesta.data.paginacion;
                });

              case 4:
                _context2.next = 15;
                break;

              case 6:
                _context2.prev = 6;
                _context2.t0 = _context2["catch"](1);
                _context2.t1 = _context2.t0.response.status;
                _context2.next = _context2.t1 === 422 ? 11 : 13;
                break;

              case 11:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 15);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 15);

              case 15:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this, [[1, 6]]);
      }));

      function consultar2(_x2) {
        return _consultar2.apply(this, arguments);
      }

      return consultar2;
    }(),
    consultar3: function () {
      var _consultar3 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3(pagina) {
        var _this3 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                parametros = {
                  txtbusqueda: this.txtbusqueda3.trim(),
                  _token: this.csrf,
                  page: pagina
                };
                _context3.prev = 1;
                _context3.next = 4;
                return _Servicios_unidades_servicios__WEBPACK_IMPORTED_MODULE_3__["listar"](parametros).then(function (respuesta) {
                  _this3.unidades = respuesta.data.unidades.data;
                  _this3.paginacion3 = respuesta.data.paginacion;
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
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context3.abrupt("break", 15);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context3.abrupt("break", 15);

              case 15:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3, this, [[1, 6]]);
      }));

      function consultar3(_x3) {
        return _consultar3.apply(this, arguments);
      }

      return consultar3;
    }(),
    eliminar: function () {
      var _eliminar = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4(usu) {
        var _this4 = this;

        var title, titulo;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                title = "";
                titulo = "";

                if (usu.ESTADO == "Activo") {
                  title = "¿Desea anular la caracterización del usuario " + usu.USUARIO + "?";
                  titulo = "Caracterización del usuario " + usu.USUARIO + " anulado de manera exitosa";
                } else {
                  title = "¿Desea activar la caracterización del usuario " + usu.USUARIO + "?";
                  titulo = "Caracterización del usuario " + usu.USUARIO + " activado de manera exitosa";
                }

                this.$swal({
                  title: title,
                  text: "",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Aceptar",
                  cancelButtonText: "Cancelar"
                }).then(function (result) {
                  if (result.value) {
                    var parametros = {
                      _token: _this4.csrf,
                      id_hogar: usu.IDHOGAR,
                      id: usu.id,
                      estado: usu.ESTADO,
                      opcion: "CARACTERIZACION"
                    };

                    try {
                      _Servicios_caracterizacion_servicios__WEBPACK_IMPORTED_MODULE_1__["eliminarCaracterizacion"](parametros).then(function (respuesta) {
                        _this4.consultar(1);

                        _this4.$swal({
                          position: "top-end",
                          icon: "success",
                          title: titulo,
                          showConfirmButton: false,
                          timer: 2000
                        });
                      })["catch"](function (error) {
                        _this4.$swal("Error...!", "Ocurrio un error!", "error");
                      });
                    } catch (error) {
                      switch (error.response.status) {
                        case 422:
                          _this4.$swal("Error...!", "Ocurrio un error!", "error");

                          break;

                        default:
                          _this4.$swal("Error...!", "Ocurrio un error!", "error");

                          break;
                      }
                    }
                  }
                });

              case 4:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4, this);
      }));

      function eliminar(_x4) {
        return _eliminar.apply(this, arguments);
      }

      return eliminar;
    }(),
    eliminar2: function () {
      var _eliminar2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5(usu) {
        var _this5 = this;

        var title, titulo;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {
          while (1) {
            switch (_context5.prev = _context5.next) {
              case 0:
                title = "";
                titulo = "";

                if (usu.ESTADO == "Activo") {
                  title = "¿Desea anular el establecimiento " + usu.razon + "?";
                  titulo = "Establecimiento " + usu.razon + " anulado de manera exitosa";
                } else {
                  title = "¿Desea activar el establecimiento " + usu.razon + "?";
                  titulo = "Establecimiento " + usu.razon + " activado de manera exitosa";
                }

                this.$swal({
                  title: title,
                  text: "",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Aceptar",
                  cancelButtonText: "Cancelar"
                }).then(function (result) {
                  if (result.value) {
                    var parametros = {
                      _token: _this5.csrf,
                      id: usu.id,
                      estado: usu.ESTADO
                    };

                    try {
                      _Servicios_establecimientos_servicios__WEBPACK_IMPORTED_MODULE_2__["eliminar"](parametros).then(function (respuesta) {
                        _this5.consultar2(1);

                        _this5.$swal({
                          position: "top-end",
                          icon: "success",
                          title: titulo,
                          showConfirmButton: false,
                          timer: 2000
                        });
                      })["catch"](function (error) {
                        _this5.$swal("Error...!", "Ocurrio un error!", "error");
                      });
                    } catch (error) {
                      switch (error.response.status) {
                        case 422:
                          _this5.$swal("Error...!", "Ocurrio un error!", "error");

                          break;

                        default:
                          _this5.$swal("Error...!", "Ocurrio un error!", "error");

                          break;
                      }
                    }
                  }
                });

              case 4:
              case "end":
                return _context5.stop();
            }
          }
        }, _callee5, this);
      }));

      function eliminar2(_x5) {
        return _eliminar2.apply(this, arguments);
      }

      return eliminar2;
    }(),
    eliminar3: function () {
      var _eliminar3 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee6(usu) {
        var _this6 = this;

        var title, titulo;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee6$(_context6) {
          while (1) {
            switch (_context6.prev = _context6.next) {
              case 0:
                title = "";
                titulo = "";

                if (usu.ESTADO == "Activo") {
                  title = "¿Desea anular la unidad productiva del productor " + usu.nom_productor + "?";
                  titulo = "Unidad productiva del productor " + usu.nom_productor + " anulada de manera exitosa";
                } else {
                  title = "¿Desea activar la unidad productiva del productor " + usu.nom_productor + "?";
                  titulo = "Unidad productiva del productor " + usu.nom_productor + " activada de manera exitosa";
                }

                this.$swal({
                  title: title,
                  text: "",
                  icon: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#3085d6",
                  cancelButtonColor: "#d33",
                  confirmButtonText: "Aceptar",
                  cancelButtonText: "Cancelar"
                }).then(function (result) {
                  if (result.value) {
                    var parametros = {
                      _token: _this6.csrf,
                      id: usu.id,
                      estado: usu.ESTADO
                    };

                    try {
                      _Servicios_unidades_servicios__WEBPACK_IMPORTED_MODULE_3__["eliminar"](parametros).then(function (respuesta) {
                        _this6.consultar3(1);

                        _this6.$swal({
                          position: "top-end",
                          icon: "success",
                          title: titulo,
                          showConfirmButton: false,
                          timer: 2000
                        });
                      })["catch"](function (error) {
                        _this6.$swal("Error...!", "Ocurrio un error!", "error");
                      });
                    } catch (error) {
                      switch (error.response.status) {
                        case 422:
                          _this6.$swal("Error...!", "Ocurrio un error!", "error");

                          break;

                        default:
                          _this6.$swal("Error...!", "Ocurrio un error!", "error");

                          break;
                      }
                    }
                  }
                });

              case 4:
              case "end":
                return _context6.stop();
            }
          }
        }, _callee6, this);
      }));

      function eliminar3(_x6) {
        return _eliminar3.apply(this, arguments);
      }

      return eliminar3;
    }(),
    ExportarTodo: function () {
      var _ExportarTodo = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee7() {
        var doc, canvasElement;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee7$(_context7) {
          while (1) {
            switch (_context7.prev = _context7.next) {
              case 0:
                doc = new jspdf__WEBPACK_IMPORTED_MODULE_5___default.a({
                  // orientation: "landscape"
                  orientation: "portrait"
                });
                canvasElement = document.createElement("canvas");
                html2canvas__WEBPACK_IMPORTED_MODULE_4___default()(this.$refs.content, {
                  canvas: canvasElement
                }).then(function (canvas) {
                  var img = canvas.toDataURL("image/jpeg"); // doc.setFontSize(22);
                  // doc.text(20, 20, "This is a title");

                  doc.addImage(img, "JPEG", 5, 20);
                  doc.save("Listado de Usuarios.pdf");
                });
                this.$swal({
                  position: "top-end",
                  icon: "success",
                  title: "Datos exportados a pdf de manera exitosa",
                  showConfirmButton: false,
                  timer: 2000
                });

              case 4:
              case "end":
                return _context7.stop();
            }
          }
        }, _callee7, this);
      }));

      function ExportarTodo() {
        return _ExportarTodo.apply(this, arguments);
      }

      return ExportarTodo;
    }(),
    DescargarPdf: function DescargarPdf(response) {
      var newBlob = new Blob([response.data], {
        type: "application/pdf"
      });
      var data = window.URL.createObjectURL(newBlob);

      if (window.navigator && window.navigator.msSaveOrOpenBlob) {
        window.navigator.msSaveOrOpenBlob(newBlob);
        return;
      }

      var link = document.createElement("a");
      link.href = data;
      link.download = "Caracterizacion.pdf";
      link.click();
      link.remove();
      setTimeout(function () {
        window: URL.revokeObjectURL(data);
      }, 100);
    },
    cerrarModal: function cerrarModal() {
      this.$refs.modalExportar.hide();
      this.$refs.modalExportar2.hide();
      this.$refs.modalAbrir.hide();
    },
    abrirModal: function () {
      var _abrirModal = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee8() {
        var _this7 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee8$(_context8) {
          while (1) {
            switch (_context8.prev = _context8.next) {
              case 0:
                parametros = {
                  _token: this.csrf
                };
                _context8.prev = 1;
                _Servicios_caracterizacion_servicios__WEBPACK_IMPORTED_MODULE_1__["exportarCaracterizacion"](parametros).then(function (respuesta) {
                  _this7.nombreCaracterizacion2 = respuesta.data.nombre;
                  _this7.caracterizacion2 = respuesta.data.caracterizacion;

                  _this7.$refs.modalExportar.show();
                })["catch"](function (error) {
                  _this7.$swal("Error...!", "Ocurrio un error!", "error");
                });
                _context8.next = 14;
                break;

              case 5:
                _context8.prev = 5;
                _context8.t0 = _context8["catch"](1);
                _context8.t1 = _context8.t0.response.status;
                _context8.next = _context8.t1 === 422 ? 10 : 12;
                break;

              case 10:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context8.abrupt("break", 14);

              case 12:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context8.abrupt("break", 14);

              case 14:
              case "end":
                return _context8.stop();
            }
          }
        }, _callee8, this, [[1, 5]]);
      }));

      function abrirModal() {
        return _abrirModal.apply(this, arguments);
      }

      return abrirModal;
    }(),
    abrirModal2: function () {
      var _abrirModal2 = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee9(item) {
        var _this8 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee9$(_context9) {
          while (1) {
            switch (_context9.prev = _context9.next) {
              case 0:
                this.isLoading = true;
                parametros = {
                  _token: this.csrf,
                  id: item.id
                };
                _context9.prev = 2;
                _Servicios_caracterizacion_servicios__WEBPACK_IMPORTED_MODULE_1__["exportarCaracterizacion2"](parametros).then(function (respuesta) {
                  console.log(respuesta.data.integrantes);
                  _this8.caracterizacion3 = respuesta.data.caracterizacion;
                  _this8.integrantes = respuesta.data.integrantes;
                  _this8.pdf_caracterizacion = _store__WEBPACK_IMPORTED_MODULE_6__["default"].state.apiURL + respuesta.data.nombre;
                  _this8.isLoading = false;

                  _this8.$refs.modalExportar2.show();
                })["catch"](function (error) {
                  _this8.$swal("Error...!", "Ocurrio un error!", "error");
                });
                _context9.next = 15;
                break;

              case 6:
                _context9.prev = 6;
                _context9.t0 = _context9["catch"](2);
                _context9.t1 = _context9.t0.response.status;
                _context9.next = _context9.t1 === 422 ? 11 : 13;
                break;

              case 11:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context9.abrupt("break", 15);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context9.abrupt("break", 15);

              case 15:
              case "end":
                return _context9.stop();
            }
          }
        }, _callee9, this, [[2, 6]]);
      }));

      function abrirModal2(_x7) {
        return _abrirModal2.apply(this, arguments);
      }

      return abrirModal2;
    }(),
    exportarEstablecimientosPDF: function () {
      var _exportarEstablecimientosPDF = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee10() {
        var _this9 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee10$(_context10) {
          while (1) {
            switch (_context10.prev = _context10.next) {
              case 0:
                this.isLoading = true;
                parametros = {
                  _token: this.csrf
                };
                _context10.prev = 2;
                _Servicios_establecimientos_servicios__WEBPACK_IMPORTED_MODULE_2__["exportarEstablecimientosPDF"](parametros).then(function (respuesta) {
                  _this9.pdf_caracterizacion = _store__WEBPACK_IMPORTED_MODULE_6__["default"].state.apiURL + respuesta.data.nombre;
                  _this9.isLoading = false;

                  _this9.$refs.modalExportar2.show();
                })["catch"](function (error) {
                  _this9.$swal("Error...!", "Ocurrio un error!", "error");
                });
                _context10.next = 15;
                break;

              case 6:
                _context10.prev = 6;
                _context10.t0 = _context10["catch"](2);
                _context10.t1 = _context10.t0.response.status;
                _context10.next = _context10.t1 === 422 ? 11 : 13;
                break;

              case 11:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context10.abrupt("break", 15);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context10.abrupt("break", 15);

              case 15:
              case "end":
                return _context10.stop();
            }
          }
        }, _callee10, this, [[2, 6]]);
      }));

      function exportarEstablecimientosPDF() {
        return _exportarEstablecimientosPDF.apply(this, arguments);
      }

      return exportarEstablecimientosPDF;
    }(),
    exportarEstablecimientoPDF: function () {
      var _exportarEstablecimientoPDF = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee11(item) {
        var _this10 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee11$(_context11) {
          while (1) {
            switch (_context11.prev = _context11.next) {
              case 0:
                this.isLoading = true;
                parametros = {
                  _token: this.csrf,
                  id: item.id
                };
                _context11.prev = 2;
                _Servicios_establecimientos_servicios__WEBPACK_IMPORTED_MODULE_2__["exportarEstablecimientoPDF"](parametros).then(function (respuesta) {
                  _this10.pdf_caracterizacion = _store__WEBPACK_IMPORTED_MODULE_6__["default"].state.apiURL + respuesta.data.nombre;
                  _this10.isLoading = false;

                  _this10.$refs.modalExportar2.show();
                })["catch"](function (error) {
                  _this10.$swal("Error...!", "Ocurrio un error!", "error");
                });
                _context11.next = 15;
                break;

              case 6:
                _context11.prev = 6;
                _context11.t0 = _context11["catch"](2);
                _context11.t1 = _context11.t0.response.status;
                _context11.next = _context11.t1 === 422 ? 11 : 13;
                break;

              case 11:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context11.abrupt("break", 15);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context11.abrupt("break", 15);

              case 15:
              case "end":
                return _context11.stop();
            }
          }
        }, _callee11, this, [[2, 6]]);
      }));

      function exportarEstablecimientoPDF(_x8) {
        return _exportarEstablecimientoPDF.apply(this, arguments);
      }

      return exportarEstablecimientoPDF;
    }(),
    exportarUnidades: function () {
      var _exportarUnidades = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee12() {
        var _this11 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee12$(_context12) {
          while (1) {
            switch (_context12.prev = _context12.next) {
              case 0:
                this.isLoading = true;
                parametros = {
                  _token: this.csrf
                };
                _context12.prev = 2;
                _Servicios_unidades_servicios__WEBPACK_IMPORTED_MODULE_3__["exportarUnidades"](parametros).then(function (respuesta) {
                  _this11.pdf_caracterizacion = _store__WEBPACK_IMPORTED_MODULE_6__["default"].state.apiURL + respuesta.data.nombre;
                  _this11.isLoading = false;

                  _this11.$refs.modalExportar2.show();
                })["catch"](function (error) {
                  _this11.$swal("Error...!", "Ocurrio un error!", "error");
                });
                _context12.next = 15;
                break;

              case 6:
                _context12.prev = 6;
                _context12.t0 = _context12["catch"](2);
                _context12.t1 = _context12.t0.response.status;
                _context12.next = _context12.t1 === 422 ? 11 : 13;
                break;

              case 11:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context12.abrupt("break", 15);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context12.abrupt("break", 15);

              case 15:
              case "end":
                return _context12.stop();
            }
          }
        }, _callee12, this, [[2, 6]]);
      }));

      function exportarUnidades() {
        return _exportarUnidades.apply(this, arguments);
      }

      return exportarUnidades;
    }(),
    exportarUnidad: function () {
      var _exportarUnidad = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee13(item) {
        var _this12 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee13$(_context13) {
          while (1) {
            switch (_context13.prev = _context13.next) {
              case 0:
                this.isLoading = true;
                parametros = {
                  _token: this.csrf,
                  id: item.id
                };
                _context13.prev = 2;
                _Servicios_unidades_servicios__WEBPACK_IMPORTED_MODULE_3__["exportarUnidad"](parametros).then(function (respuesta) {
                  _this12.pdf_caracterizacion = _store__WEBPACK_IMPORTED_MODULE_6__["default"].state.apiURL + respuesta.data.nombre;
                  _this12.isLoading = false;

                  _this12.$refs.modalExportar2.show();
                })["catch"](function (error) {
                  _this12.$swal("Error...!", "Ocurrio un error!", "error");
                });
                _context13.next = 15;
                break;

              case 6:
                _context13.prev = 6;
                _context13.t0 = _context13["catch"](2);
                _context13.t1 = _context13.t0.response.status;
                _context13.next = _context13.t1 === 422 ? 11 : 13;
                break;

              case 11:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context13.abrupt("break", 15);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context13.abrupt("break", 15);

              case 15:
              case "end":
                return _context13.stop();
            }
          }
        }, _callee13, this, [[2, 6]]);
      }));

      function exportarUnidad(_x9) {
        return _exportarUnidad.apply(this, arguments);
      }

      return exportarUnidad;
    }(),
    abrir: function abrir() {
      // this.$refs.modalAbrir.show();
      this.$router.push({
        name: "Establecimientos",
        params: {
          IDHOGAR: 0
        }
      });
    },
    seleccionarOpcion: function seleccionarOpcion(opcion) {
      if (opcion === "ingreso") {
        this.$router.push({
          name: "Ingreso"
        });
      } else {
        this.$router.push({
          name: "Establecimientos",
          params: {
            IDHOGAR: 0
          }
        });
      }
    },
    editar: function editar(item) {
      this.$router.push({
        name: "Editar",
        params: {
          IDHOGAR: item.IDHOGAR
        }
      });
    },
    editar2: function editar2(item) {
      this.$router.push({
        name: "EditarEstablecimientos",
        params: {
          id: item.id,
          IDHOGAR: item.IDHOGAR
        }
      });
    },
    editar3: function editar3(item) {
      this.$router.push({
        name: "EditarUnidades",
        params: {
          id: item.id,
          IDHOGAR: item.IDHOGAR
        }
      });
    },
    abrir3: function abrir3() {
      // this.$refs.modalAbrir.show();
      this.$router.push({
        name: "Unidades",
        params: {
          IDHOGAR: 0
        }
      });
    },
    onCancel: function onCancel() {}
  }
});

/***/ }),

/***/ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=style&index=0&lang=css&":
/*!*************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=style&index=0&lang=css& ***!
  \*************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(/*! ../../../../node_modules/css-loader/lib/css-base.js */ "./node_modules/css-loader/lib/css-base.js")(false);
// imports


// module
exports.push([module.i, "\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n.modal-sm {\n  max-width: 40%;\n}\n.nav-pills, .nav-tabs {\n  margin: 0 0 -10px 0 !important;\n}\n\n", ""]);

// exports


/***/ }),

/***/ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=style&index=0&lang=css&":
/*!*****************************************************************************************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/style-loader!./node_modules/css-loader??ref--5-1!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src??ref--5-2!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=style&index=0&lang=css& ***!
  \*****************************************************************************************************************************************************************************************************************************************************************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {


var content = __webpack_require__(/*! !../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Gestion.vue?vue&type=style&index=0&lang=css& */ "./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=style&index=0&lang=css&");

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

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=template&id=14c7bdf9&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=template&id=14c7bdf9& ***!
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
      { staticStyle: { "margin-top": "-4%" } },
      [
        _c(
          "b-card",
          { attrs: { "no-body": "" } },
          [
            _c(
              "b-tabs",
              { attrs: { card: "" } },
              [
                _c(
                  "b-tab",
                  { attrs: { title: "CARACTERIZACIÓN", active: "" } },
                  [
                    _c(
                      "div",
                      {
                        staticClass:
                          "kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile",
                        staticStyle: { padding: "20px" }
                      },
                      [
                        _c("div", { staticClass: "kt-portlet__head" }, [
                          _c("div", { staticClass: "kt-portlet__head-label" }, [
                            _c(
                              "h3",
                              { staticClass: "kt-portlet__head-title" },
                              [
                                _c(
                                  "span",
                                  {
                                    staticClass:
                                      "kt-widget20__number kt-font-danger"
                                  },
                                  [_vm._v("GESTIÓN DE CARACTERIZACIÓN")]
                                )
                              ]
                            )
                          ])
                        ]),
                        _vm._v(" "),
                        _c("hr"),
                        _vm._v(" "),
                        _c("br"),
                        _vm._v(" "),
                        _c("div", { staticClass: "kt-portlet__body" }, [
                          _c("div", { staticClass: "kt-section" }, [
                            _c("div", { staticClass: "kt-section__content" }, [
                              _c("div", { staticClass: "row" }, [
                                _c(
                                  "div",
                                  { staticClass: "col-md-6 col-lg-6" },
                                  [
                                    _c("div", { staticClass: "kt-section" }, [
                                      _c(
                                        "div",
                                        { staticClass: "kt-section__content" },
                                        [
                                          _c(
                                            "router-link",
                                            {
                                              staticClass:
                                                "btn btn-outline-primary btn-icon",
                                              attrs: {
                                                to: "/ingreso",
                                                title: "Nueva Caracterización"
                                              }
                                            },
                                            [
                                              _c("i", {
                                                staticClass: "la la-file-text-o"
                                              })
                                            ]
                                          ),
                                          _vm._v(
                                            " \n                          "
                                          ),
                                          _vm._v(" "),
                                          _c(
                                            "a",
                                            {
                                              staticClass:
                                                "btn btn-outline-warning btn-icon",
                                              attrs: {
                                                href: "javascript:;",
                                                title: "Exportar a Pdf"
                                              },
                                              on: { click: _vm.abrirModal }
                                            },
                                            [
                                              _c("i", {
                                                staticClass: "la la-file-pdf-o"
                                              })
                                            ]
                                          )
                                        ],
                                        1
                                      )
                                    ])
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "div",
                                  { staticClass: "col-md-6 col-lg-6" },
                                  [
                                    _c("form", { staticClass: "kt-form" }, [
                                      _c("div", { staticClass: "form-group" }, [
                                        _c(
                                          "div",
                                          { staticClass: "input-group" },
                                          [
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
                                              attrs: {
                                                type: "text",
                                                placeholder: "Busqueda"
                                              },
                                              domProps: {
                                                value: _vm.txtbusqueda
                                              },
                                              on: {
                                                input: function($event) {
                                                  if ($event.target.composing) {
                                                    return
                                                  }
                                                  _vm.txtbusqueda =
                                                    $event.target.value
                                                }
                                              }
                                            }),
                                            _vm._v(" "),
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "input-group-append"
                                              },
                                              [
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-primary btn-icon",
                                                    attrs: { type: "button" },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.consultar(1)
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass:
                                                        "fa fa-search"
                                                    })
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ])
                                    ])
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("div", { staticClass: "row" }, [
                                _c("div", { staticClass: "col-md-12" }, [
                                  _c(
                                    "div",
                                    { staticClass: "table-responsive" },
                                    [
                                      _c(
                                        "table",
                                        {
                                          staticClass:
                                            "table table-sm table-hover"
                                        },
                                        [
                                          _c("thead", {}, [
                                            _c(
                                              "tr",
                                              {
                                                staticClass: "kt-bg-fill-brand"
                                              },
                                              [
                                                _c("th", [_vm._v("No.")]),
                                                _vm._v(" "),
                                                _c("th", [
                                                  _vm._v("Departamento")
                                                ]),
                                                _vm._v(" "),
                                                _c("th", [_vm._v("Municipio")]),
                                                _vm._v(" "),
                                                _c("th", [
                                                  _vm._v("Corregimiento")
                                                ]),
                                                _vm._v(" "),
                                                _c("th", [
                                                  _vm._v("Identificación")
                                                ]),
                                                _vm._v(" "),
                                                _c("th", [_vm._v("Usuario")]),
                                                _vm._v(" "),
                                                _c(
                                                  "td",
                                                  {
                                                    staticClass: "text-center"
                                                  },
                                                  [_vm._v("Estado")]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "td",
                                                  {
                                                    staticClass: "text-center"
                                                  },
                                                  [_vm._v("Opciones")]
                                                )
                                              ]
                                            )
                                          ]),
                                          _vm._v(" "),
                                          _c(
                                            "tbody",
                                            _vm._l(
                                              _vm.caracterizacion,
                                              function(item, index) {
                                                return _c(
                                                  "tr",
                                                  { key: index },
                                                  [
                                                    _c(
                                                      "td",
                                                      {
                                                        staticStyle: {
                                                          "font-weight":
                                                            "normal",
                                                          "vertical-align":
                                                            "middle"
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(index + 1)
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "td",
                                                      {
                                                        staticStyle: {
                                                          "font-weight":
                                                            "normal",
                                                          "vertical-align":
                                                            "middle",
                                                          "text-align": "left",
                                                          "text-transform":
                                                            "capitalize"
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(
                                                            item.DPTO.toUpperCase()
                                                          )
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "td",
                                                      {
                                                        staticStyle: {
                                                          "font-weight":
                                                            "normal",
                                                          "vertical-align":
                                                            "middle",
                                                          "text-align": "left",
                                                          "text-transform":
                                                            "capitalize"
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(
                                                            item.MUNI.toUpperCase()
                                                          )
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    item.CORREGIMIENTO !== null
                                                      ? _c(
                                                          "td",
                                                          {
                                                            staticStyle: {
                                                              "font-weight":
                                                                "normal",
                                                              "vertical-align":
                                                                "middle",
                                                              "text-align":
                                                                "left",
                                                              "text-transform":
                                                                "capitalize"
                                                            }
                                                          },
                                                          [
                                                            _vm._v(
                                                              _vm._s(
                                                                item.CORREGIMIENTO.toUpperCase()
                                                              )
                                                            )
                                                          ]
                                                        )
                                                      : _c("td", {
                                                          staticStyle: {
                                                            "font-weight":
                                                              "normal",
                                                            "vertical-align":
                                                              "middle",
                                                            "text-align":
                                                              "left",
                                                            "text-transform":
                                                              "capitalize"
                                                          }
                                                        }),
                                                    _vm._v(" "),
                                                    _c(
                                                      "td",
                                                      {
                                                        staticStyle: {
                                                          "font-weight":
                                                            "normal",
                                                          "vertical-align":
                                                            "middle",
                                                          "text-align": "left",
                                                          "text-transform":
                                                            "capitalize"
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(
                                                            item.IDENTIFICACION.toUpperCase()
                                                          )
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "td",
                                                      {
                                                        staticStyle: {
                                                          "font-weight":
                                                            "normal",
                                                          "vertical-align":
                                                            "middle",
                                                          "text-align": "left",
                                                          "text-transform":
                                                            "capitalize"
                                                        }
                                                      },
                                                      [
                                                        _vm._v(
                                                          _vm._s(
                                                            item.USUARIO.toUpperCase()
                                                          )
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "td",
                                                      {
                                                        staticStyle: {
                                                          "font-weight":
                                                            "normal",
                                                          "vertical-align":
                                                            "middle",
                                                          "text-align": "center"
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "span",
                                                          {
                                                            staticClass:
                                                              "kt-badge kt-badge--inline",
                                                            class:
                                                              item.ESTADO ==
                                                              "Activo"
                                                                ? "kt-badge--success"
                                                                : "kt-badge--danger"
                                                          },
                                                          [
                                                            _vm._v(
                                                              _vm._s(
                                                                item.ESTADO.toUpperCase()
                                                              )
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "td",
                                                      {
                                                        staticStyle: {
                                                          "text-align":
                                                            "center",
                                                          "vertical-align":
                                                            "middle"
                                                        }
                                                      },
                                                      [
                                                        _c(
                                                          "button",
                                                          {
                                                            staticClass:
                                                              "btn btn-outline-success btn-icon btn-sm",
                                                            attrs: {
                                                              type: "button",
                                                              title: "Imprimir"
                                                            },
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                return _vm.abrirModal2(
                                                                  item
                                                                )
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-file-pdf"
                                                            })
                                                          ]
                                                        ),
                                                        _vm._v(" "),
                                                        _c(
                                                          "button",
                                                          {
                                                            staticClass:
                                                              "btn btn-outline-info btn-icon btn-sm",
                                                            attrs: {
                                                              type: "button",
                                                              title: "Editar"
                                                            },
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                return _vm.editar(
                                                                  item
                                                                )
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass:
                                                                "fa fa-edit"
                                                            })
                                                          ]
                                                        ),
                                                        _vm._v(" "),
                                                        _c(
                                                          "button",
                                                          {
                                                            staticClass:
                                                              "btn btn-icon btn-sm",
                                                            class:
                                                              item.ESTADO ==
                                                              "Activo"
                                                                ? "btn-outline-danger"
                                                                : "btn-outline-success",
                                                            attrs: {
                                                              type: "button",
                                                              title:
                                                                item.ESTADO ==
                                                                "Activo"
                                                                  ? "Anular"
                                                                  : "Activar"
                                                            },
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                return _vm.eliminar(
                                                                  item
                                                                )
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _c("i", {
                                                              staticClass: "fa",
                                                              class:
                                                                item.ESTADO ==
                                                                "Activo"
                                                                  ? "fa-trash"
                                                                  : "fa-check"
                                                            })
                                                          ]
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              }
                                            ),
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
                                            staticClass:
                                              "kt-pagination kt-pagination--danger"
                                          },
                                          [
                                            _c(
                                              "ul",
                                              {
                                                staticClass:
                                                  "kt-pagination__links"
                                              },
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
                                                            attrs: {
                                                              href:
                                                                "javascript:;"
                                                            },
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                $event.preventDefault()
                                                                return _vm.cambiarPaginas(
                                                                  1
                                                                )
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
                                                            attrs: {
                                                              href:
                                                                "javascript:;"
                                                            },
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                $event.preventDefault()
                                                                return _vm.cambiarPaginas(
                                                                  _vm.paginacion
                                                                    .pagina_actual -
                                                                    1
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
                                                _vm._l(
                                                  _vm.numeroDePaginas,
                                                  function(pagina, index) {
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
                                                            attrs: {
                                                              href:
                                                                "javascript:;"
                                                            },
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                $event.preventDefault()
                                                                return _vm.cambiarPaginas(
                                                                  pagina
                                                                )
                                                              }
                                                            }
                                                          },
                                                          [
                                                            _vm._v(
                                                              _vm._s(pagina)
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    )
                                                  }
                                                ),
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
                                                            attrs: {
                                                              href:
                                                                "javascript:;"
                                                            },
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                $event.preventDefault()
                                                                return _vm.cambiarPaginas(
                                                                  _vm.paginacion
                                                                    .pagina_actual +
                                                                    1
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
                                                            attrs: {
                                                              href:
                                                                "javascript:;"
                                                            },
                                                            on: {
                                                              click: function(
                                                                $event
                                                              ) {
                                                                $event.preventDefault()
                                                                return _vm.cambiarPaginas(
                                                                  _vm.paginacion
                                                                    .ultima_pagina
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
                                        )
                                      ])
                                    ]
                                  )
                                ])
                              ])
                            ])
                          ])
                        ]),
                        _vm._v(" "),
                        _c(
                          "b-modal",
                          {
                            ref: "modalExportar",
                            attrs: {
                              "hide-footer": "",
                              title: "Listado de Usuarios Caracterizados",
                              size: "xl",
                              centered: "",
                              "header-bg-variant": "danger",
                              "header-text-variant": "light",
                              "no-close-on-backdrop": true
                            }
                          },
                          [
                            _c("div", { staticClass: "d-block" }, [
                              _c("div", { ref: "content" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "kt-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "kt-section" },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "kt-section__content"
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "row justify-content-center"
                                                  },
                                                  [
                                                    _c(
                                                      "div",
                                                      {
                                                        staticClass: "col-xl-12"
                                                      },
                                                      [
                                                        _c("center", [
                                                          _c(
                                                            "span",
                                                            {
                                                              staticClass:
                                                                "kt-font-boldest",
                                                              staticStyle: {
                                                                "font-size":
                                                                  "22px"
                                                              }
                                                            },
                                                            [
                                                              _vm._v(
                                                                "SISTEMA INTEGRADO POBLACIONAL"
                                                              )
                                                            ]
                                                          )
                                                        ])
                                                      ],
                                                      1
                                                    )
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c("div", {
                                                  staticClass:
                                                    "kt-separator kt-separator--border-dashed"
                                                }),
                                                _vm._v(" "),
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "row justify-content-center"
                                                  },
                                                  [
                                                    _c(
                                                      "div",
                                                      {
                                                        staticClass: "col-xl-12"
                                                      },
                                                      [
                                                        _c(
                                                          "div",
                                                          {
                                                            staticClass:
                                                              "table-responsive"
                                                          },
                                                          [
                                                            _c("p", [
                                                              _c(
                                                                "span",
                                                                {
                                                                  staticClass:
                                                                    "kt-font-boldest",
                                                                  staticStyle: {
                                                                    "font-size":
                                                                      "18px"
                                                                  }
                                                                },
                                                                [
                                                                  _vm._v(
                                                                    "Listado de usuarios caracterizados"
                                                                  )
                                                                ]
                                                              )
                                                            ]),
                                                            _vm._v(" "),
                                                            _c(
                                                              "table",
                                                              {
                                                                staticClass:
                                                                  "table table-sm table-hover"
                                                              },
                                                              [
                                                                _c(
                                                                  "thead",
                                                                  {},
                                                                  [
                                                                    _c(
                                                                      "tr",
                                                                      {
                                                                        staticClass:
                                                                          "kt-bg-fill-brand"
                                                                      },
                                                                      [
                                                                        _c(
                                                                          "th",
                                                                          [
                                                                            _vm._v(
                                                                              "No."
                                                                            )
                                                                          ]
                                                                        ),
                                                                        _vm._v(
                                                                          " "
                                                                        ),
                                                                        _c(
                                                                          "th",
                                                                          [
                                                                            _vm._v(
                                                                              "Departamento"
                                                                            )
                                                                          ]
                                                                        ),
                                                                        _vm._v(
                                                                          " "
                                                                        ),
                                                                        _c(
                                                                          "th",
                                                                          [
                                                                            _vm._v(
                                                                              "Municipio"
                                                                            )
                                                                          ]
                                                                        ),
                                                                        _vm._v(
                                                                          " "
                                                                        ),
                                                                        _c(
                                                                          "th",
                                                                          [
                                                                            _vm._v(
                                                                              "Corregimiento"
                                                                            )
                                                                          ]
                                                                        ),
                                                                        _vm._v(
                                                                          " "
                                                                        ),
                                                                        _c(
                                                                          "th",
                                                                          [
                                                                            _vm._v(
                                                                              "Identificación"
                                                                            )
                                                                          ]
                                                                        ),
                                                                        _vm._v(
                                                                          " "
                                                                        ),
                                                                        _c(
                                                                          "th",
                                                                          [
                                                                            _vm._v(
                                                                              "Usuario"
                                                                            )
                                                                          ]
                                                                        )
                                                                      ]
                                                                    )
                                                                  ]
                                                                ),
                                                                _vm._v(" "),
                                                                _c(
                                                                  "tbody",
                                                                  _vm._l(
                                                                    _vm.caracterizacion2,
                                                                    function(
                                                                      item,
                                                                      index
                                                                    ) {
                                                                      return _c(
                                                                        "tr",
                                                                        {
                                                                          key: index
                                                                        },
                                                                        [
                                                                          _c(
                                                                            "td",
                                                                            {
                                                                              staticStyle: {
                                                                                "font-weight":
                                                                                  "normal",
                                                                                "vertical-align":
                                                                                  "middle"
                                                                              }
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                _vm._s(
                                                                                  index +
                                                                                    1
                                                                                )
                                                                              )
                                                                            ]
                                                                          ),
                                                                          _vm._v(
                                                                            " "
                                                                          ),
                                                                          _c(
                                                                            "td",
                                                                            {
                                                                              staticStyle: {
                                                                                "font-weight":
                                                                                  "normal",
                                                                                "vertical-align":
                                                                                  "middle",
                                                                                "text-align":
                                                                                  "left",
                                                                                "text-transform":
                                                                                  "capitalize"
                                                                              }
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                _vm._s(
                                                                                  item.DPTO.toUpperCase()
                                                                                )
                                                                              )
                                                                            ]
                                                                          ),
                                                                          _vm._v(
                                                                            " "
                                                                          ),
                                                                          _c(
                                                                            "td",
                                                                            {
                                                                              staticStyle: {
                                                                                "font-weight":
                                                                                  "normal",
                                                                                "vertical-align":
                                                                                  "middle",
                                                                                "text-align":
                                                                                  "left",
                                                                                "text-transform":
                                                                                  "capitalize"
                                                                              }
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                _vm._s(
                                                                                  item.MUNI.toUpperCase()
                                                                                )
                                                                              )
                                                                            ]
                                                                          ),
                                                                          _vm._v(
                                                                            " "
                                                                          ),
                                                                          item.CORREGIMIENTO !==
                                                                          null
                                                                            ? _c(
                                                                                "td",
                                                                                {
                                                                                  staticStyle: {
                                                                                    "font-weight":
                                                                                      "normal",
                                                                                    "vertical-align":
                                                                                      "middle",
                                                                                    "text-align":
                                                                                      "left",
                                                                                    "text-transform":
                                                                                      "capitalize"
                                                                                  }
                                                                                },
                                                                                [
                                                                                  _vm._v(
                                                                                    _vm._s(
                                                                                      item.CORREGIMIENTO.toUpperCase()
                                                                                    )
                                                                                  )
                                                                                ]
                                                                              )
                                                                            : _c(
                                                                                "td",
                                                                                {
                                                                                  staticStyle: {
                                                                                    "font-weight":
                                                                                      "normal",
                                                                                    "vertical-align":
                                                                                      "middle",
                                                                                    "text-align":
                                                                                      "left",
                                                                                    "text-transform":
                                                                                      "capitalize"
                                                                                  }
                                                                                }
                                                                              ),
                                                                          _vm._v(
                                                                            " "
                                                                          ),
                                                                          _c(
                                                                            "td",
                                                                            {
                                                                              staticStyle: {
                                                                                "font-weight":
                                                                                  "normal",
                                                                                "vertical-align":
                                                                                  "middle",
                                                                                "text-align":
                                                                                  "left",
                                                                                "text-transform":
                                                                                  "capitalize"
                                                                              }
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                _vm._s(
                                                                                  item.IDENTIFICACION.toUpperCase()
                                                                                )
                                                                              )
                                                                            ]
                                                                          ),
                                                                          _vm._v(
                                                                            " "
                                                                          ),
                                                                          _c(
                                                                            "td",
                                                                            {
                                                                              staticStyle: {
                                                                                "font-weight":
                                                                                  "normal",
                                                                                "vertical-align":
                                                                                  "middle",
                                                                                "text-align":
                                                                                  "left",
                                                                                "text-transform":
                                                                                  "capitalize"
                                                                              }
                                                                            },
                                                                            [
                                                                              _vm._v(
                                                                                _vm._s(
                                                                                  item.USUARIO.toUpperCase()
                                                                                )
                                                                              )
                                                                            ]
                                                                          )
                                                                        ]
                                                                      )
                                                                    }
                                                                  ),
                                                                  0
                                                                )
                                                              ]
                                                            ),
                                                            _vm._v(" "),
                                                            _c("div", {
                                                              staticClass:
                                                                "kt-separator kt-separator--border-dashed"
                                                            })
                                                          ]
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
                              _vm._v(" "),
                              _c("hr"),
                              _vm._v(" "),
                              _c("div", { staticClass: "text-right" }, [
                                _c(
                                  "a",
                                  {
                                    staticClass: "btn btn-success",
                                    attrs: {
                                      download: "",
                                      href: this.nombreCaracterizacion2,
                                      type: "button"
                                    }
                                  },
                                  [
                                    _c("i", {
                                      staticClass: "la la-file-pdf-o"
                                    }),
                                    _vm._v(" Imprimir")
                                  ]
                                ),
                                _vm._v(" "),
                                _c(
                                  "button",
                                  {
                                    staticClass: "btn btn-warning",
                                    attrs: { type: "button" },
                                    on: { click: _vm.cerrarModal }
                                  },
                                  [
                                    _c("i", {
                                      staticClass: "fa fa-window-close"
                                    }),
                                    _vm._v(" Cerrar\n                  ")
                                  ]
                                )
                              ])
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "b-modal",
                          {
                            ref: "modalExportar2",
                            attrs: {
                              "hide-footer": "",
                              title: "Detalle de Usuario Caracterizado",
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
                                src: _vm.pdf_caracterizacion,
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
                                  _c("i", {
                                    staticClass: "fa fa-window-close"
                                  }),
                                  _vm._v(" Cancelar\n                  ")
                                ]
                              )
                            ])
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "b-modal",
                          {
                            ref: "modalAbrir",
                            attrs: {
                              "hide-footer": "",
                              title: "Seleccione una opción",
                              size: "sm",
                              centered: "",
                              "header-bg-variant": "danger",
                              "header-text-variant": "light",
                              "no-close-on-backdrop": true
                            }
                          },
                          [
                            _c("div", { staticClass: "d-block" }, [
                              _c("div", { ref: "content" }, [
                                _c(
                                  "div",
                                  {
                                    staticClass:
                                      "kt-portlet kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile"
                                  },
                                  [
                                    _c(
                                      "div",
                                      { staticClass: "kt-portlet__body" },
                                      [
                                        _c(
                                          "div",
                                          { staticClass: "kt-section" },
                                          [
                                            _c(
                                              "div",
                                              {
                                                staticClass:
                                                  "kt-section__content"
                                              },
                                              [
                                                _c(
                                                  "div",
                                                  {
                                                    staticClass:
                                                      "row justify-content-center"
                                                  },
                                                  [
                                                    _c(
                                                      "div",
                                                      {
                                                        staticClass: "col-md-6"
                                                      },
                                                      [
                                                        _c(
                                                          "div",
                                                          {
                                                            staticClass:
                                                              "kt-portlet kt-portlet--height-fluid",
                                                            attrs: {
                                                              "data-container":
                                                                "body",
                                                              "data-toggle":
                                                                "kt-popover",
                                                              "data-placement":
                                                                "left",
                                                              "data-content":
                                                                "",
                                                              "data-html":
                                                                "true"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "div",
                                                              {
                                                                staticClass:
                                                                  "kt-widget14",
                                                                staticStyle: {
                                                                  cursor:
                                                                    "pointer",
                                                                  width: "200px"
                                                                },
                                                                on: {
                                                                  click: function(
                                                                    $event
                                                                  ) {
                                                                    return _vm.seleccionarOpcion(
                                                                      "ingreso"
                                                                    )
                                                                  }
                                                                }
                                                              },
                                                              [
                                                                _c(
                                                                  "div",
                                                                  {
                                                                    staticClass:
                                                                      "kt-widget14__header"
                                                                  },
                                                                  [
                                                                    _c(
                                                                      "h3",
                                                                      {
                                                                        staticClass:
                                                                          "kt-widget14__title text-center font-weight-bold",
                                                                        staticStyle: {
                                                                          "font-size":
                                                                            "11px"
                                                                        }
                                                                      },
                                                                      [
                                                                        _vm._v(
                                                                          "Vivienda"
                                                                        )
                                                                      ]
                                                                    )
                                                                  ]
                                                                ),
                                                                _vm._v(" "),
                                                                _c(
                                                                  "div",
                                                                  {
                                                                    staticClass:
                                                                      "kt-widget14__content"
                                                                  },
                                                                  [
                                                                    _c(
                                                                      "div",
                                                                      {
                                                                        staticClass:
                                                                          "kt-widget14__chart text-center"
                                                                      },
                                                                      [
                                                                        _c(
                                                                          "img",
                                                                          {
                                                                            staticStyle: {
                                                                              height:
                                                                                "100px",
                                                                              width:
                                                                                "140px",
                                                                              float:
                                                                                "right"
                                                                            },
                                                                            attrs: {
                                                                              src:
                                                                                _vm
                                                                                  .$store
                                                                                  .state
                                                                                  .serverPath +
                                                                                "assets/iconos/zonas/hogares.png"
                                                                            }
                                                                          }
                                                                        )
                                                                      ]
                                                                    )
                                                                  ]
                                                                )
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    ),
                                                    _vm._v(" "),
                                                    _c(
                                                      "div",
                                                      {
                                                        staticClass: "col-md-6"
                                                      },
                                                      [
                                                        _c(
                                                          "div",
                                                          {
                                                            staticClass:
                                                              "kt-portlet kt-portlet--height-fluid",
                                                            attrs: {
                                                              "data-container":
                                                                "body",
                                                              "data-toggle":
                                                                "kt-popover",
                                                              "data-placement":
                                                                "left",
                                                              "data-content":
                                                                "",
                                                              "data-html":
                                                                "true"
                                                            }
                                                          },
                                                          [
                                                            _c(
                                                              "div",
                                                              {
                                                                staticClass:
                                                                  "kt-widget14",
                                                                staticStyle: {
                                                                  cursor:
                                                                    "pointer",
                                                                  width: "200px"
                                                                },
                                                                on: {
                                                                  click: function(
                                                                    $event
                                                                  ) {
                                                                    return _vm.seleccionarOpcion(
                                                                      "establecimiento"
                                                                    )
                                                                  }
                                                                }
                                                              },
                                                              [
                                                                _c(
                                                                  "div",
                                                                  {
                                                                    staticClass:
                                                                      "kt-widget14__header"
                                                                  },
                                                                  [
                                                                    _c(
                                                                      "h3",
                                                                      {
                                                                        staticClass:
                                                                          "kt-widget14__title text-center font-weight-bold",
                                                                        staticStyle: {
                                                                          "font-size":
                                                                            "11px"
                                                                        }
                                                                      },
                                                                      [
                                                                        _vm._v(
                                                                          "Establecimiento"
                                                                        )
                                                                      ]
                                                                    )
                                                                  ]
                                                                ),
                                                                _vm._v(" "),
                                                                _c(
                                                                  "div",
                                                                  {
                                                                    staticClass:
                                                                      "kt-widget14__content"
                                                                  },
                                                                  [
                                                                    _c(
                                                                      "div",
                                                                      {
                                                                        staticClass:
                                                                          "kt-widget14__chart text-center"
                                                                      },
                                                                      [
                                                                        _c(
                                                                          "img",
                                                                          {
                                                                            staticStyle: {
                                                                              height:
                                                                                "100px",
                                                                              width:
                                                                                "140px",
                                                                              float:
                                                                                "right"
                                                                            },
                                                                            attrs: {
                                                                              src:
                                                                                _vm
                                                                                  .$store
                                                                                  .state
                                                                                  .serverPath +
                                                                                "assets/iconos/zonas/viviendas.png"
                                                                            }
                                                                          }
                                                                        )
                                                                      ]
                                                                    )
                                                                  ]
                                                                )
                                                              ]
                                                            )
                                                          ]
                                                        )
                                                      ]
                                                    )
                                                  ]
                                                )
                                              ]
                                            )
                                          ]
                                        )
                                      ]
                                    )
                                  ]
                                )
                              ]),
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
                                    _c("i", {
                                      staticClass: "fa fa-window-close"
                                    }),
                                    _vm._v(" Cerrar\n                  ")
                                  ]
                                )
                              ])
                            ])
                          ]
                        )
                      ],
                      1
                    )
                  ]
                ),
                _vm._v(" "),
                _c("b-tab", { attrs: { title: "ESTABLECIMIENTOS" } }, [
                  _c(
                    "div",
                    {
                      staticClass:
                        "kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile",
                      staticStyle: { padding: "20px" }
                    },
                    [
                      _c("div", { staticClass: "kt-portlet__head" }, [
                        _c("div", { staticClass: "kt-portlet__head-label" }, [
                          _c("h3", { staticClass: "kt-portlet__head-title" }, [
                            _c(
                              "span",
                              {
                                staticClass:
                                  "kt-widget20__number kt-font-danger"
                              },
                              [_vm._v("GESTIÓN DE ESTABLECIMIENTOS")]
                            )
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _c("hr"),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("div", { staticClass: "kt-portlet__body" }, [
                        _c("div", { staticClass: "kt-section" }, [
                          _c("div", { staticClass: "kt-section__content" }, [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-md-6 col-lg-6" }, [
                                _c("div", { staticClass: "kt-section" }, [
                                  _c(
                                    "div",
                                    { staticClass: "kt-section__content" },
                                    [
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-outline-primary btn-icon",
                                          attrs: {
                                            href: "javascript:;",
                                            title: "Nuevo Establecimiento"
                                          },
                                          on: { click: _vm.abrir }
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "la la-file-text-o"
                                          })
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-outline-warning btn-icon",
                                          attrs: {
                                            href: "javascript:;",
                                            title: "Exportar a Pdf"
                                          },
                                          on: {
                                            click:
                                              _vm.exportarEstablecimientosPDF
                                          }
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "la la-file-pdf-o"
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                ])
                              ]),
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
                                            value: _vm.txtbusqueda2,
                                            expression: "txtbusqueda2"
                                          }
                                        ],
                                        staticClass: "form-control",
                                        attrs: {
                                          type: "text",
                                          placeholder: "Busqueda"
                                        },
                                        domProps: { value: _vm.txtbusqueda2 },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.txtbusqueda2 =
                                              $event.target.value
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "button",
                                            {
                                              staticClass:
                                                "btn btn-primary btn-icon",
                                              attrs: { type: "button" },
                                              on: {
                                                click: function($event) {
                                                  return _vm.consultar2(1)
                                                }
                                              }
                                            },
                                            [
                                              _c("i", {
                                                staticClass: "fa fa-search"
                                              })
                                            ]
                                          )
                                        ]
                                      )
                                    ])
                                  ])
                                ])
                              ])
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-lg-12" }, [
                                _c("div", { staticClass: "table-responsive" }, [
                                  _c(
                                    "table",
                                    {
                                      staticClass: "table table-sm table-hover"
                                    },
                                    [
                                      _c("thead", {}, [
                                        _c(
                                          "tr",
                                          { staticClass: "kt-bg-fill-brand" },
                                          [
                                            _c("th", [_vm._v("No.")]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Departamento")]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Municipio")]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Corregimiento")]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Razón Social")]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Nit")]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Representante")]),
                                            _vm._v(" "),
                                            _c(
                                              "td",
                                              { staticClass: "text-center" },
                                              [_vm._v("Opciones")]
                                            )
                                          ]
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c(
                                        "tbody",
                                        _vm._l(_vm.establecimientos, function(
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
                                                _vm._v(
                                                  _vm._s(
                                                    item.DPTO.toUpperCase()
                                                  )
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
                                                  _vm._s(
                                                    item.MUNI.toUpperCase()
                                                  )
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            item.CORREGIMIENTO !== null
                                              ? _c(
                                                  "td",
                                                  {
                                                    staticStyle: {
                                                      "font-weight": "normal",
                                                      "vertical-align":
                                                        "middle",
                                                      "text-align": "left",
                                                      "text-transform":
                                                        "capitalize"
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        item.CORREGIMIENTO.toUpperCase()
                                                      )
                                                    )
                                                  ]
                                                )
                                              : _c("td", {
                                                  staticStyle: {
                                                    "font-weight": "normal",
                                                    "vertical-align": "middle",
                                                    "text-align": "left",
                                                    "text-transform":
                                                      "capitalize"
                                                  }
                                                }),
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
                                                  _vm._s(
                                                    item.razon.toUpperCase()
                                                  )
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
                                                  _vm._s(item.nit.toUpperCase())
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
                                                  _vm._s(
                                                    item.representante.toUpperCase()
                                                  )
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
                                                      "btn btn-outline-success btn-icon btn-sm",
                                                    attrs: {
                                                      type: "button",
                                                      title: "Imprimir"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.exportarEstablecimientoPDF(
                                                          item
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass:
                                                        "fa fa-file-pdf"
                                                    })
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-outline-info btn-icon btn-sm",
                                                    attrs: {
                                                      type: "button",
                                                      title: "Editar"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.editar2(item)
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass: "fa fa-edit"
                                                    })
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-icon btn-sm",
                                                    class:
                                                      item.ESTADO == "Activo"
                                                        ? "btn-outline-danger"
                                                        : "btn-outline-success",
                                                    attrs: {
                                                      type: "button",
                                                      title:
                                                        item.ESTADO == "Activo"
                                                          ? "Anular"
                                                          : "Activar"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.eliminar2(
                                                          item
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass: "fa",
                                                      class:
                                                        item.ESTADO == "Activo"
                                                          ? "fa-trash"
                                                          : "fa-check"
                                                    })
                                                  ]
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
                                        staticClass:
                                          "kt-pagination kt-pagination--danger"
                                      },
                                      [
                                        _c(
                                          "ul",
                                          {
                                            staticClass: "kt-pagination__links"
                                          },
                                          [
                                            _vm.paginacion2.pagina_actual > 1
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
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas2(
                                                              1
                                                            )
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
                                            _vm.paginacion2.pagina_actual > 1
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
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas2(
                                                              _vm.paginacion2
                                                                .pagina_actual -
                                                                1
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
                                            _vm._l(
                                              _vm.numeroDePaginas2,
                                              function(pagina, index) {
                                                return _c(
                                                  "li",
                                                  {
                                                    key: index,
                                                    class: [
                                                      pagina == _vm.esActivo2
                                                        ? "kt-pagination__link--active"
                                                        : ""
                                                    ]
                                                  },
                                                  [
                                                    _c(
                                                      "a",
                                                      {
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas2(
                                                              pagina
                                                            )
                                                          }
                                                        }
                                                      },
                                                      [_vm._v(_vm._s(pagina))]
                                                    )
                                                  ]
                                                )
                                              }
                                            ),
                                            _vm._v(" "),
                                            _vm.paginacion2.pagina_actual <
                                            _vm.paginacion2.ultima_pagina
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
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas2(
                                                              _vm.paginacion2
                                                                .pagina_actual +
                                                                1
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
                                            _vm.paginacion2.pagina_actual <
                                            _vm.paginacion2.ultima_pagina
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
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas2(
                                                              _vm.paginacion2
                                                                .ultima_pagina
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
                                    )
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
                _c("b-tab", { attrs: { title: "UNIDADES PRODUCTIVAS" } }, [
                  _c(
                    "div",
                    {
                      staticClass:
                        "kt-portlet--last kt-portlet--head-lg kt-portlet--responsive-mobile",
                      staticStyle: { padding: "20px" }
                    },
                    [
                      _c("div", { staticClass: "kt-portlet__head" }, [
                        _c("div", { staticClass: "kt-portlet__head-label" }, [
                          _c("h3", { staticClass: "kt-portlet__head-title" }, [
                            _c(
                              "span",
                              {
                                staticClass:
                                  "kt-widget20__number kt-font-danger"
                              },
                              [_vm._v("GESTIÓN DE UNIDADES PRODUCTIVAS")]
                            )
                          ])
                        ])
                      ]),
                      _vm._v(" "),
                      _c("hr"),
                      _vm._v(" "),
                      _c("br"),
                      _vm._v(" "),
                      _c("div", { staticClass: "kt-portlet__body" }, [
                        _c("div", { staticClass: "kt-section" }, [
                          _c("div", { staticClass: "kt-section__content" }, [
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-md-6 col-lg-6" }, [
                                _c("div", { staticClass: "kt-section" }, [
                                  _c(
                                    "div",
                                    { staticClass: "kt-section__content" },
                                    [
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-outline-primary btn-icon",
                                          attrs: {
                                            href: "javascript:;",
                                            title: "Nueva Unidad Productiva"
                                          },
                                          on: { click: _vm.abrir3 }
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "la la-file-text-o"
                                          })
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c(
                                        "a",
                                        {
                                          staticClass:
                                            "btn btn-outline-warning btn-icon",
                                          attrs: {
                                            href: "javascript:;",
                                            title: "Exportar a Pdf"
                                          },
                                          on: { click: _vm.exportarUnidades }
                                        },
                                        [
                                          _c("i", {
                                            staticClass: "la la-file-pdf-o"
                                          })
                                        ]
                                      )
                                    ]
                                  )
                                ])
                              ]),
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
                                            value: _vm.txtbusqueda3,
                                            expression: "txtbusqueda3"
                                          }
                                        ],
                                        staticClass: "form-control",
                                        attrs: {
                                          type: "text",
                                          placeholder: "Busqueda"
                                        },
                                        domProps: { value: _vm.txtbusqueda3 },
                                        on: {
                                          input: function($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.txtbusqueda3 =
                                              $event.target.value
                                          }
                                        }
                                      }),
                                      _vm._v(" "),
                                      _c(
                                        "div",
                                        { staticClass: "input-group-append" },
                                        [
                                          _c(
                                            "button",
                                            {
                                              staticClass:
                                                "btn btn-primary btn-icon",
                                              attrs: { type: "button" },
                                              on: {
                                                click: function($event) {
                                                  return _vm.consultar3(1)
                                                }
                                              }
                                            },
                                            [
                                              _c("i", {
                                                staticClass: "fa fa-search"
                                              })
                                            ]
                                          )
                                        ]
                                      )
                                    ])
                                  ])
                                ])
                              ])
                            ]),
                            _vm._v(" "),
                            _c("div", { staticClass: "row" }, [
                              _c("div", { staticClass: "col-lg-12" }, [
                                _c("div", { staticClass: "table-responsive" }, [
                                  _c(
                                    "table",
                                    {
                                      staticClass: "table table-sm table-hover"
                                    },
                                    [
                                      _c("thead", {}, [
                                        _c(
                                          "tr",
                                          { staticClass: "kt-bg-fill-brand" },
                                          [
                                            _c("th", [_vm._v("No.")]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Departamento")]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Municipio")]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Corregimiento")]),
                                            _vm._v(" "),
                                            _c("th", [
                                              _vm._v("Nombre de la Finca")
                                            ]),
                                            _vm._v(" "),
                                            _c("th", [
                                              _vm._v("Identificación")
                                            ]),
                                            _vm._v(" "),
                                            _c("th", [_vm._v("Productor")]),
                                            _vm._v(" "),
                                            _c(
                                              "td",
                                              { staticClass: "text-center" },
                                              [_vm._v("Opciones")]
                                            )
                                          ]
                                        )
                                      ]),
                                      _vm._v(" "),
                                      _c(
                                        "tbody",
                                        _vm._l(_vm.unidades, function(
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
                                                _vm._v(
                                                  _vm._s(
                                                    item.DPTO.toUpperCase()
                                                  )
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
                                                  _vm._s(
                                                    item.MUNI.toUpperCase()
                                                  )
                                                )
                                              ]
                                            ),
                                            _vm._v(" "),
                                            item.CORREGIMIENTO !== null
                                              ? _c(
                                                  "td",
                                                  {
                                                    staticStyle: {
                                                      "font-weight": "normal",
                                                      "vertical-align":
                                                        "middle",
                                                      "text-align": "left",
                                                      "text-transform":
                                                        "capitalize"
                                                    }
                                                  },
                                                  [
                                                    _vm._v(
                                                      _vm._s(
                                                        item.CORREGIMIENTO.toUpperCase()
                                                      )
                                                    )
                                                  ]
                                                )
                                              : _c("td", {
                                                  staticStyle: {
                                                    "font-weight": "normal",
                                                    "vertical-align": "middle",
                                                    "text-align": "left",
                                                    "text-transform":
                                                      "capitalize"
                                                  }
                                                }),
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
                                                  _vm._s(
                                                    item.nom_finca.toUpperCase()
                                                  )
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
                                                  _vm._s(
                                                    item.identificacion.toUpperCase()
                                                  )
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
                                                  _vm._s(
                                                    item.nom_productor.toUpperCase()
                                                  )
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
                                                      "btn btn-outline-success btn-icon btn-sm",
                                                    attrs: {
                                                      type: "button",
                                                      title: "Imprimir"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.exportarUnidad(
                                                          item
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass:
                                                        "fa fa-file-pdf"
                                                    })
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-outline-info btn-icon btn-sm",
                                                    attrs: {
                                                      type: "button",
                                                      title: "Editar"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.editar3(item)
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass: "fa fa-edit"
                                                    })
                                                  ]
                                                ),
                                                _vm._v(" "),
                                                _c(
                                                  "button",
                                                  {
                                                    staticClass:
                                                      "btn btn-icon btn-sm",
                                                    class:
                                                      item.ESTADO == "Activo"
                                                        ? "btn-outline-danger"
                                                        : "btn-outline-success",
                                                    attrs: {
                                                      type: "button",
                                                      title:
                                                        item.ESTADO == "Activo"
                                                          ? "Anular"
                                                          : "Activar"
                                                    },
                                                    on: {
                                                      click: function($event) {
                                                        return _vm.eliminar3(
                                                          item
                                                        )
                                                      }
                                                    }
                                                  },
                                                  [
                                                    _c("i", {
                                                      staticClass: "fa",
                                                      class:
                                                        item.ESTADO == "Activo"
                                                          ? "fa-trash"
                                                          : "fa-check"
                                                    })
                                                  ]
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
                                        staticClass:
                                          "kt-pagination kt-pagination--danger"
                                      },
                                      [
                                        _c(
                                          "ul",
                                          {
                                            staticClass: "kt-pagination__links"
                                          },
                                          [
                                            _vm.paginacion3.pagina_actual > 1
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
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas3(
                                                              1
                                                            )
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
                                            _vm.paginacion3.pagina_actual > 1
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
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas3(
                                                              _vm.paginacion3
                                                                .pagina_actual -
                                                                1
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
                                            _vm._l(
                                              _vm.numeroDePaginas3,
                                              function(pagina, index) {
                                                return _c(
                                                  "li",
                                                  {
                                                    key: index,
                                                    class: [
                                                      pagina == _vm.esActivo3
                                                        ? "kt-pagination__link--active"
                                                        : ""
                                                    ]
                                                  },
                                                  [
                                                    _c(
                                                      "a",
                                                      {
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas3(
                                                              pagina
                                                            )
                                                          }
                                                        }
                                                      },
                                                      [_vm._v(_vm._s(pagina))]
                                                    )
                                                  ]
                                                )
                                              }
                                            ),
                                            _vm._v(" "),
                                            _vm.paginacion3.pagina_actual <
                                            _vm.paginacion3.ultima_pagina
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
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas3(
                                                              _vm.paginacion3
                                                                .pagina_actual +
                                                                1
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
                                            _vm.paginacion3.pagina_actual <
                                            _vm.paginacion3.ultima_pagina
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
                                                        attrs: {
                                                          href: "javascript:;"
                                                        },
                                                        on: {
                                                          click: function(
                                                            $event
                                                          ) {
                                                            $event.preventDefault()
                                                            return _vm.cambiarPaginas3(
                                                              _vm.paginacion3
                                                                .ultima_pagina
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
                                    )
                                  ])
                                ])
                              ])
                            ])
                          ])
                        ])
                      ])
                    ]
                  )
                ])
              ],
              1
            )
          ],
          1
        )
      ],
      1
    )
  ])
}
var staticRenderFns = []
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

/***/ "./resources/js/Servicios/caracterizacion_servicios.js":
/*!*************************************************************!*\
  !*** ./resources/js/Servicios/caracterizacion_servicios.js ***!
  \*************************************************************/
/*! exports provided: listarCaracterizacion, nuevaCaracterizacion, guardar, validar, eliminarCaracterizacion, exportarCaracterizacion, exportarCaracterizacion2, validarJefe, actualizar, editarCaracterizacion, eliminar, controlesRA, buscarTablas, ControlRS, DetallesAmbiental, DetallesControlAmbiental, DetallesSalud */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listarCaracterizacion", function() { return listarCaracterizacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "nuevaCaracterizacion", function() { return nuevaCaracterizacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardar", function() { return guardar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "validar", function() { return validar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminarCaracterizacion", function() { return eliminarCaracterizacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarCaracterizacion", function() { return exportarCaracterizacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarCaracterizacion2", function() { return exportarCaracterizacion2; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "validarJefe", function() { return validarJefe; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "actualizar", function() { return actualizar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "editarCaracterizacion", function() { return editarCaracterizacion; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminar", function() { return eliminar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "controlesRA", function() { return controlesRA; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "buscarTablas", function() { return buscarTablas; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "ControlRS", function() { return ControlRS; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DetallesAmbiental", function() { return DetallesAmbiental; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DetallesControlAmbiental", function() { return DetallesControlAmbiental; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "DetallesSalud", function() { return DetallesSalud; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listarCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion', $data);
}
function nuevaCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/nuevo', $data);
}
function guardar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/guardar', $data);
}
function validar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/validar', $data);
}
function eliminarCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/eliminar', $data);
}
function exportarCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/exportar', $data);
}
function exportarCaracterizacion2($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/exportar2', $data);
}
function validarJefe($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/validarJefe', $data);
}
function actualizar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/actualizar', $data);
}
function editarCaracterizacion($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/editar', $data);
}
function eliminar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/eliminar', $data);
}
function controlesRA($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/controlesRA', $data);
}
function buscarTablas($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/buscarTablas', $data);
}
function ControlRS($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/ControlRS', $data);
}
function DetallesAmbiental($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/DetallesAmbiental', $data);
}
function DetallesControlAmbiental($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/DetallesControlAmbiental', $data);
}
function DetallesSalud($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/caracterizacion/DetallesSalud', $data);
}

/***/ }),

/***/ "./resources/js/Servicios/establecimientos_servicios.js":
/*!**************************************************************!*\
  !*** ./resources/js/Servicios/establecimientos_servicios.js ***!
  \**************************************************************/
/*! exports provided: listar, nuevo, guardar, eliminar, combo, editar, exportarEstablecimientosPDF, exportarEstablecimientoPDF */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listar", function() { return listar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "nuevo", function() { return nuevo; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardar", function() { return guardar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminar", function() { return eliminar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "combo", function() { return combo; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "editar", function() { return editar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarEstablecimientosPDF", function() { return exportarEstablecimientosPDF; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarEstablecimientoPDF", function() { return exportarEstablecimientoPDF; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/establecimientos-listar', $data);
}
function nuevo($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/establecimientos/nuevo', $data);
}
function guardar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/establecimientos/guardar', $data);
}
function eliminar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/establecimientos/eliminar', $data);
}
function combo($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/establecimientos/combo', $data);
}
function editar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/establecimientos/editar', $data);
}
function exportarEstablecimientosPDF($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/establecimientos/exportarEstablecimientosPDF', $data);
}
function exportarEstablecimientoPDF($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/establecimientos/exportarEstablecimientoPDF', $data);
}

/***/ }),

/***/ "./resources/js/Servicios/unidades_servicios.js":
/*!******************************************************!*\
  !*** ./resources/js/Servicios/unidades_servicios.js ***!
  \******************************************************/
/*! exports provided: listar, nuevo, guardar, eliminar, combo, editar, exportarUnidades, exportarUnidad */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "listar", function() { return listar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "nuevo", function() { return nuevo; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "guardar", function() { return guardar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "eliminar", function() { return eliminar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "combo", function() { return combo; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "editar", function() { return editar; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarUnidades", function() { return exportarUnidades; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "exportarUnidad", function() { return exportarUnidad; });
/* harmony import */ var _http_services__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./http_services */ "./resources/js/Servicios/http_services.js");

function listar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/unidades', $data);
}
function nuevo($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/unidades/nuevo', $data);
}
function guardar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/unidades/guardar', $data);
}
function eliminar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/unidades/eliminar', $data);
}
function combo($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/unidades/combo', $data);
}
function editar($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/unidades/editar', $data);
}
function exportarUnidades($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/unidades/exportarUnidades', $data);
}
function exportarUnidad($data) {
  return Object(_http_services__WEBPACK_IMPORTED_MODULE_0__["http"])().post('/unidades/exportarUnidad', $data);
}

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/Gestion.vue":
/*!*********************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/Gestion.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Gestion_vue_vue_type_template_id_14c7bdf9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Gestion.vue?vue&type=template&id=14c7bdf9& */ "./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=template&id=14c7bdf9&");
/* harmony import */ var _Gestion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Gestion.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _Gestion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./Gestion.vue?vue&type=style&index=0&lang=css& */ "./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");






/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_3__["default"])(
  _Gestion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Gestion_vue_vue_type_template_id_14c7bdf9___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Gestion_vue_vue_type_template_id_14c7bdf9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Caracterizacion/Gestion.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Gestion.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=style&index=0&lang=css&":
/*!******************************************************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=style&index=0&lang=css& ***!
  \******************************************************************************************/
/*! no static exports found */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/style-loader!../../../../node_modules/css-loader??ref--5-1!../../../../node_modules/vue-loader/lib/loaders/stylePostLoader.js!../../../../node_modules/postcss-loader/src??ref--5-2!../../../../node_modules/vue-loader/lib??vue-loader-options!./Gestion.vue?vue&type=style&index=0&lang=css& */ "./node_modules/style-loader/index.js!./node_modules/css-loader/index.js?!./node_modules/vue-loader/lib/loaders/stylePostLoader.js!./node_modules/postcss-loader/src/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=style&index=0&lang=css&");
/* harmony import */ var _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__);
/* harmony reexport (unknown) */ for(var __WEBPACK_IMPORT_KEY__ in _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__) if(["default"].indexOf(__WEBPACK_IMPORT_KEY__) < 0) (function(key) { __webpack_require__.d(__webpack_exports__, key, function() { return _node_modules_style_loader_index_js_node_modules_css_loader_index_js_ref_5_1_node_modules_vue_loader_lib_loaders_stylePostLoader_js_node_modules_postcss_loader_src_index_js_ref_5_2_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_style_index_0_lang_css___WEBPACK_IMPORTED_MODULE_0__[key]; }) }(__WEBPACK_IMPORT_KEY__));


/***/ }),

/***/ "./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=template&id=14c7bdf9&":
/*!****************************************************************************************!*\
  !*** ./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=template&id=14c7bdf9& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_template_id_14c7bdf9___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Gestion.vue?vue&type=template&id=14c7bdf9& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Caracterizacion/Gestion.vue?vue&type=template&id=14c7bdf9&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_template_id_14c7bdf9___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Gestion_vue_vue_type_template_id_14c7bdf9___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);