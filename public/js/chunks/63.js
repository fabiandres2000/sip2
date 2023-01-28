(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[63],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Log/Log.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Log/Log.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Servicios_usuarios_servicios__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Servicios/usuarios_servicios */ "./resources/js/Servicios/usuarios_servicios.js");
/* harmony import */ var datatables_net_bs4__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! datatables.net-bs4 */ "./node_modules/datatables.net-bs4/js/dataTables.bootstrap4.js");
/* harmony import */ var datatables_net_bs4__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(datatables_net_bs4__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var datatables_net_buttons_js_buttons_print__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! datatables.net-buttons/js/buttons.print */ "./node_modules/datatables.net-buttons/js/buttons.print.js");
/* harmony import */ var datatables_net_buttons_js_buttons_print__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(datatables_net_buttons_js_buttons_print__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var jszip_dist_jszip__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! jszip/dist/jszip */ "./node_modules/jszip/dist/jszip.js");
/* harmony import */ var jszip_dist_jszip__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(jszip_dist_jszip__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var pdfmake_build_pdfmake__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! pdfmake/build/pdfmake */ "./node_modules/pdfmake/build/pdfmake.js");
/* harmony import */ var pdfmake_build_pdfmake__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(pdfmake_build_pdfmake__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var pdfmake_build_vfs_fonts__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! pdfmake/build/vfs_fonts */ "./node_modules/pdfmake/build/vfs_fonts.js");
/* harmony import */ var pdfmake_build_vfs_fonts__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(pdfmake_build_vfs_fonts__WEBPACK_IMPORTED_MODULE_6__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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




__webpack_require__(/*! datatables.net-buttons/js/dataTables.buttons */ "./node_modules/datatables.net-buttons/js/dataTables.buttons.js");

__webpack_require__(/*! datatables.net-buttons/js/buttons.html5 */ "./node_modules/datatables.net-buttons/js/buttons.html5.js");




 // import fixedHeader from "datatables.net/js/jquery.dataTables/fixedHeader";

pdfmake_build_pdfmake__WEBPACK_IMPORTED_MODULE_5___default.a.vfs = pdfmake_build_vfs_fonts__WEBPACK_IMPORTED_MODULE_6___default.a.pdfMake.vfs;
window.JSZip = jszip_dist_jszip__WEBPACK_IMPORTED_MODULE_4___default.a;
/* harmony default export */ __webpack_exports__["default"] = ({
  mounted: function mounted() {
    this.consultar(1);
    this.hoy = moment();
  },
  filters: {
    moment: function (_moment) {
      function moment(_x) {
        return _moment.apply(this, arguments);
      }

      moment.toString = function () {
        return _moment.toString();
      };

      return moment;
    }(function (date) {
      return moment(date).format("YYYY-MM-DD");
    })
  },
  name: "entes",
  data: function data() {
    return {
      errores: [],
      usuarios: [],
      logs: [],
      errorDevuelto: [],
      entrarPorError: false,
      logData: {
        id: 0,
        id_usuario: 0,
        accion: "",
        fecha: "",
        hora: "",
        estado: "Activo",
        ip: "",
        modulo: ""
      },
      datos: {
        usuarios: "0",
        fecha: "0",
        modulos: "0"
      },
      hoy: "",
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      headerTextVariant: "light",
      mostrar: true,
      paginacion: {
        total: 0,
        pagina_actual: 0,
        por_pagina: 0,
        ultima_pagina: 0,
        desde: 0,
        hasta: 0
      },
      offset: 4,
      valG: true,
      actual: 0,
      tabladatos: null
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
    }
  },
  methods: {
    iniciarTabla: function iniciarTabla() {
      this.tabla();
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
                  _token: this.csrf,
                  page: pagina
                };
                _context.prev = 1;
                _context.next = 4;
                return _Servicios_usuarios_servicios__WEBPACK_IMPORTED_MODULE_1__["usuariosLog"](parametros).then(function (respuesta) {
                  _this.usuarios = respuesta.data.usuarios;
                  _this.logs = respuesta.data.logs; // this.paginacion = respuesta.data.paginacion;

                  // this.paginacion = respuesta.data.paginacion;
                  _this.iniciarTabla();
                });

              case 4:
                _context.next = 17;
                break;

              case 6:
                _context.prev = 6;
                _context.t0 = _context["catch"](1);
                _context.t1 = _context.t0.response.status;
                _context.next = _context.t1 === 419 ? 11 : _context.t1 === 422 ? 13 : 15;
                break;

              case 11:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context.abrupt("break", 17);

              case 13:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context.abrupt("break", 17);

              case 15:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context.abrupt("break", 17);

              case 17:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this, [[1, 6]]);
      }));

      function consultar(_x2) {
        return _consultar.apply(this, arguments);
      }

      return consultar;
    }(),
    cambiarPaginas: function cambiarPaginas(pagina) {
      this.paginacion.pagina_actual = pagina;
      this.buscar(pagina);
    },
    buscar: function () {
      var _buscar = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2(pagina) {
        var _this2 = this;

        var parametros;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                this.logs = [];
                parametros = {
                  _token: this.csrf,
                  id_usuario: this.datos.usuarios,
                  modulos: this.datos.modulos,
                  fecha: this.datos.fecha,
                  page: pagina
                };
                _context2.prev = 2;
                _context2.next = 5;
                return _Servicios_usuarios_servicios__WEBPACK_IMPORTED_MODULE_1__["usuariosLogBuscar"](parametros).then(function (respuesta) {
                  $.fn.DataTable = datatables_net_bs4__WEBPACK_IMPORTED_MODULE_2___default.a;

                  _this2.tabladatos.fnClearTable();

                  _this2.tabladatos.fnDestroy(); // $('#tablaDatos tbody').empty();                        


                  // $('#tablaDatos tbody').empty();                        
                  _this2.logs = respuesta.data.logs; // this.tabladatos.fnAddData(this.logs);

                  // this.tabladatos.fnAddData(this.logs);
                  _this2.iniciarTabla();
                });

              case 5:
                _context2.next = 18;
                break;

              case 7:
                _context2.prev = 7;
                _context2.t0 = _context2["catch"](2);
                _context2.t1 = _context2.t0.response.status;
                _context2.next = _context2.t1 === 419 ? 12 : _context2.t1 === 422 ? 14 : 16;
                break;

              case 12:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 18);

              case 14:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 18);

              case 16:
                this.$swal("Error...!", "Ocurrio un error!", "error");
                return _context2.abrupt("break", 18);

              case 18:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2, this, [[2, 7]]);
      }));

      function buscar(_x3) {
        return _buscar.apply(this, arguments);
      }

      return buscar;
    }(),
    tabla: function tabla() {
      var _this3 = this;

      this.$nextTick(function () {
        $.fn.DataTable = datatables_net_bs4__WEBPACK_IMPORTED_MODULE_2___default.a;
        _this3.tabladatos = $("#tablaDatos").DataTable({
          orderCellsTop: true,
          language: {
            processing: "Procesando...",
            lengthMenu: "Mostrar _MENU_ registros",
            zeroRecords: "No se encontraron resultados",
            emptyTable: "Ningún dato disponible en esta tabla",
            infoEmpty: "Mostrando registros del 0 al 0 de un total de 0 registros",
            infoFiltered: "(filtrado de un total de _MAX_ registros)",
            search: "Buscar:",
            infoThousands: ",",
            loadingRecords: "Cargando...",
            paginate: {
              first: "Primero",
              last: "Último",
              next: "Siguiente",
              previous: "Anterior"
            },
            aria: {
              sortAscending: ": Activar para ordenar la columna de manera ascendente",
              sortDescending: ": Activar para ordenar la columna de manera descendente"
            },
            buttons: {
              copy: "Copiar",
              colvis: "Visibilidad",
              collection: "Colección",
              colvisRestore: "Restaurar visibilidad",
              copyKeys: "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
              copySuccess: {
                "1": "Copiada 1 fila al portapapeles",
                _: "Copiadas %d fila al portapapeles"
              },
              copyTitle: "Copiar al portapapeles",
              csv: "CSV",
              excel: "Excel",
              pageLength: {
                "-1": "Mostrar todas las filas",
                _: "Mostrar %d filas"
              },
              pdf: "PDF",
              print: "Imprimir"
            },
            autoFill: {
              cancel: "Cancelar",
              fill: "Rellene todas las celdas con <i>%d<\/i>",
              fillHorizontal: "Rellenar celdas horizontalmente",
              fillVertical: "Rellenar celdas verticalmentemente"
            },
            decimal: ",",
            searchBuilder: {
              add: "Añadir condición",
              button: {
                "0": "Constructor de búsqueda",
                _: "Constructor de búsqueda (%d)"
              },
              clearAll: "Borrar todo",
              condition: "Condición",
              conditions: {
                date: {
                  after: "Despues",
                  before: "Antes",
                  between: "Entre",
                  empty: "Vacío",
                  equals: "Igual a",
                  notBetween: "No entre",
                  notEmpty: "No Vacio",
                  not: "Diferente de"
                },
                number: {
                  between: "Entre",
                  empty: "Vacio",
                  equals: "Igual a",
                  gt: "Mayor a",
                  gte: "Mayor o igual a",
                  lt: "Menor que",
                  lte: "Menor o igual que",
                  notBetween: "No entre",
                  notEmpty: "No vacío",
                  not: "Diferente de"
                },
                string: {
                  contains: "Contiene",
                  empty: "Vacío",
                  endsWith: "Termina en",
                  equals: "Igual a",
                  notEmpty: "No Vacio",
                  startsWith: "Empieza con",
                  not: "Diferente de"
                },
                array: {
                  not: "Diferente de",
                  equals: "Igual",
                  empty: "Vacío",
                  contains: "Contiene",
                  notEmpty: "No Vacío",
                  without: "Sin"
                }
              },
              data: "Data",
              deleteTitle: "Eliminar regla de filtrado",
              leftTitle: "Criterios anulados",
              logicAnd: "Y",
              logicOr: "O",
              rightTitle: "Criterios de sangría",
              title: {
                "0": "Constructor de búsqueda",
                _: "Constructor de búsqueda (%d)"
              },
              value: "Valor"
            },
            searchPanes: {
              clearMessage: "Borrar todo",
              collapse: {
                "0": "Paneles de búsqueda",
                _: "Paneles de búsqueda (%d)"
              },
              count: "{total}",
              countFiltered: "{shown} ({total})",
              emptyPanes: "Sin paneles de búsqueda",
              loadMessage: "Cargando paneles de búsqueda",
              title: "Filtros Activos - %d"
            },
            select: {
              cells: {
                "1": "1 celda seleccionada",
                _: "%d celdas seleccionadas"
              },
              columns: {
                "1": "1 columna seleccionada",
                _: "%d columnas seleccionadas"
              },
              rows: {
                "1": "1 fila seleccionada",
                _: "%d filas seleccionadas"
              }
            },
            thousands: ".",
            datetime: {
              previous: "Anterior",
              next: "Proximo",
              hours: "Horas",
              minutes: "Minutos",
              seconds: "Segundos",
              unknown: "-",
              amPm: ["AM", "PM"],
              months: {
                "0": "Enero",
                "1": "Febrero",
                "10": "Noviembre",
                "11": "Diciembre",
                "2": "Marzo",
                "3": "Abril",
                "4": "Mayo",
                "5": "Junio",
                "6": "Julio",
                "7": "Agosto",
                "8": "Septiembre",
                "9": "Octubre"
              },
              weekdays: ["Dom", "Lun", "Mar", "Mie", "Jue", "Vie", "Sab"]
            },
            editor: {
              close: "Cerrar",
              create: {
                button: "Nuevo",
                title: "Crear Nuevo Registro",
                submit: "Crear"
              },
              edit: {
                button: "Editar",
                title: "Editar Registro",
                submit: "Actualizar"
              },
              remove: {
                button: "Eliminar",
                title: "Eliminar Registro",
                submit: "Eliminar",
                confirm: {
                  _: "¿Está seguro que desea eliminar %d filas?",
                  "1": "¿Está seguro que desea eliminar 1 fila?"
                }
              },
              error: {
                system: 'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\\/a&gt;).<\/a>'
              },
              multi: {
                title: "Múltiples Valores",
                info: "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                restore: "Deshacer Cambios",
                noMulti: "Este registro puede ser editado individualmente, pero no como parte de un grupo."
              }
            },
            info: "Mostrando _START_ a _END_ de _TOTAL_ registros"
          },
          dom: "B<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" + "<'row'<'col-sm-12'tr>>" + "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
          buttons: {
            dom: {
              buttons: {
                className: "btn"
              }
            },
            buttons: [{
              extend: "copyHtml5",
              text: "<i class='fa fa-file-alt'></i>",
              titleAttr: "Copiar",
              className: "btn btn-outline-brand btn-icon btn-lg",
              messageTop: "Listado de Logs",
              title: "Sistema Integrado Poblacional",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
              }
            }, {
              extend: "excelHtml5",
              text: "<i class='fa fa-file-excel'></i>",
              titleAttr: "Exportar a Excel",
              className: "btn btn-outline-success btn-icon btn-lg",
              excelStyles: {
                template: "header_blue"
              },
              messageTop: "Listado de Logs",
              title: "Sistema Integrado Poblacional",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
              }
            }, {
              extend: "pdfHtml5",
              text: "<i class='fa fa-file-pdf'></i>",
              titleAttr: "Exportar a PDF",
              className: "btn btn-outline-danger btn-icon btn-lg",
              messageTop: "Listado de Logs",
              title: "Sistema Integrado Poblacional",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
              },
              customize: function customize(doc) {
                doc.styles.title = {
                  color: "red",
                  fontSize: "20",
                  alignment: "center"
                };
                doc.styles["td:nth-child(2)"] = {
                  width: "100px",
                  "max-width": "100px"
                };
                doc.styles.tableHeader = {
                  fillColor: "#DF0101",
                  color: "white"
                };
              }
            }, {
              extend: "csvHtml5",
              text: "<i class='fa fa-file-csv'></i>",
              titleAttr: "Exportar a csv",
              className: "btn btn-outline-info btn-icon btn-lg",
              messageTop: "Listado de Logs",
              title: "Sistema Integrado Poblacional",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
              }
            }, {
              extend: "print",
              text: "<i class='fa fa-print'></i>",
              titleAttr: "Imprimir Archivo",
              className: "btn btn-outline-dark btn-icon btn-lg",
              messageTop: "Listado de Logs",
              title: "Sistema Integrado Poblacional",
              exportOptions: {
                columns: [0, 1, 2, 3, 4, 5]
              }
            }]
          }
        });
        $('.dataTables_filter input').attr("placeholder", "Busqueda...");
        $('.dataTables_filter label').addClass("form-control");
        $('.dataTables_filter label').css("outline", "none");
        $('.dataTables_filter label').css("border", "0");
        $('.dataTables_filter label').css("padding-bottom", "35px");
        $(".dataTables_filter label input").css("margin-left", "0px");
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Log/Log.vue?vue&type=template&id=2b7f364e&":
/*!******************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Log/Log.vue?vue&type=template&id=2b7f364e& ***!
  \******************************************************************************************************************************************************************************************************/
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
                  { staticClass: "col-lg-2" },
                  [
                    _c("label", [_vm._v("Usuarios:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        class:
                          _vm.datos.usuarios == "0" ? "is-invalid" : "is-valid",
                        model: {
                          value: _vm.datos.usuarios,
                          callback: function($$v) {
                            _vm.$set(
                              _vm.datos,
                              "usuarios",
                              typeof $$v === "string" ? $$v.trim() : $$v
                            )
                          },
                          expression: "datos.usuarios"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "0", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _vm._l(_vm.usuarios, function(item) {
                          return _c(
                            "option",
                            { key: item.id, domProps: { value: item.id } },
                            [_vm._v(_vm._s(item.nombre))]
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
                  { staticClass: "col-lg-2" },
                  [
                    _c("label", [_vm._v("Modulos:")]),
                    _vm._v(" "),
                    _c(
                      "b-form-select",
                      {
                        class:
                          _vm.datos.modulos == "0" ? "is-invalid" : "is-valid",
                        model: {
                          value: _vm.datos.modulos,
                          callback: function($$v) {
                            _vm.$set(
                              _vm.datos,
                              "modulos",
                              typeof $$v === "string" ? $$v.trim() : $$v
                            )
                          },
                          expression: "datos.modulos"
                        }
                      },
                      [
                        _c("option", { attrs: { value: "0", selected: "" } }, [
                          _vm._v("Seleccione")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "INICIO SESION" } }, [
                          _vm._v("INICIO")
                        ]),
                        _vm._v(" "),
                        _c(
                          "option",
                          { attrs: { id: "PARAMETROS ACTIVIDADES" } },
                          [_vm._v("ACTIVIDADES")]
                        ),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "PARAMETROS BARRIOS" } }, [
                          _vm._v("BARRIOS")
                        ]),
                        _vm._v(" "),
                        _c(
                          "option",
                          { attrs: { id: "PARAMETROS ESCOLARIDAD" } },
                          [_vm._v("ESCOLARIDAD")]
                        ),
                        _vm._v(" "),
                        _c(
                          "option",
                          {
                            attrs: { id: "PARAMETROS ENFERMEDADES_INFECCIOSAS" }
                          },
                          [_vm._v("ENFERMEDADES INFECCIOSAS")]
                        ),
                        _vm._v(" "),
                        _c(
                          "option",
                          { attrs: { id: "PARAMETROS ENFERMEDADES_CRONICAS" } },
                          [_vm._v("ENFERMEDADES CRONICAS")]
                        ),
                        _vm._v(" "),
                        _c(
                          "option",
                          { attrs: { id: "PARAMETROS CORREGIMIENTOS" } },
                          [_vm._v("CORREGIMIENTOS")]
                        ),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "PARAMETROS COLEGIOS" } }, [
                          _vm._v("COLEGIOS")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "ESTABLECIMIENTOS" } }, [
                          _vm._v("ESTABLECIMIENTOS")
                        ]),
                        _vm._v(" "),
                        _c(
                          "option",
                          { attrs: { id: "PARAMETROS ESTADO_CIVIL" } },
                          [_vm._v("ESTADO CIVIL")]
                        ),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "PARAMETROS ETNIAS" } }, [
                          _vm._v("ETNIAS")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "PARAMETROS GRUPOS" } }, [
                          _vm._v("GRUPOS")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "PARAMETROS METODOS" } }, [
                          _vm._v("METODOS")
                        ]),
                        _vm._v(" "),
                        _c(
                          "option",
                          { attrs: { id: "PARAMETROS MORBILIDAD_GESTACION" } },
                          [_vm._v("MORBILIDAD GESTACION")]
                        ),
                        _vm._v(" "),
                        _c(
                          "option",
                          { attrs: { id: "PARAMETROS MORBILIDAD_NACER" } },
                          [_vm._v("MORBILIDAD AL NACER")]
                        ),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "PARAMETROS MOTIVOS" } }, [
                          _vm._v("MOTIVOS")
                        ]),
                        _vm._v(" "),
                        _c(
                          "option",
                          { attrs: { id: "PARAMETROS OCUPACIONES" } },
                          [_vm._v("OCUPACIONES")]
                        ),
                        _vm._v(" "),
                        _c(
                          "option",
                          { attrs: { id: "PARAMETROS PARENTESCOS" } },
                          [_vm._v("PARENTESCOS")]
                        ),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "PARAMETROS RELIGION" } }, [
                          _vm._v("RELIGION")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "PARAMETROS VEREDAS" } }, [
                          _vm._v("VEREDAS")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "PARAMETROS USUARIOS" } }, [
                          _vm._v("USUARIOS")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "SOPORTE ENTES" } }, [
                          _vm._v("SOPORTE ENTES")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "UNIDADES" } }, [
                          _vm._v("UNIDADES")
                        ]),
                        _vm._v(" "),
                        _c("option", { attrs: { id: "CERRAR SESION" } }, [
                          _vm._v("CERRAR")
                        ])
                      ]
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-2" }, [
                  _c("label", [_vm._v("Fecha:")]),
                  _vm._v(" "),
                  _c("input", {
                    directives: [
                      {
                        name: "model",
                        rawName: "v-model",
                        value: _vm.datos.fecha,
                        expression: "datos.fecha"
                      }
                    ],
                    staticClass: "form-control text-capitalize",
                    class: _vm.datos.fecha == "0" ? "" : "is-valid",
                    attrs: {
                      id: "date",
                      type: "date",
                      placeholder: "Fecha",
                      max: _vm._f("moment")(_vm.hoy)
                    },
                    domProps: { value: _vm.datos.fecha },
                    on: {
                      input: function($event) {
                        if ($event.target.composing) {
                          return
                        }
                        _vm.$set(_vm.datos, "fecha", $event.target.value)
                      }
                    }
                  })
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-2" }, [
                  _c("br"),
                  _vm._v(" "),
                  _c("label", [_vm._v("      ")]),
                  _vm._v(" "),
                  _c(
                    "a",
                    {
                      staticClass: "btn btn-outline-success btn-icon",
                      attrs: {
                        href: "javascript:;",
                        "data-skin": "dark",
                        "data-toggle": "kt-tooltip",
                        "data-placement": "top",
                        title: "Buscar"
                      },
                      on: {
                        click: function($event) {
                          $event.preventDefault()
                          return _vm.buscar(1)
                        }
                      }
                    },
                    [_c("i", { staticClass: "fa fa-search" })]
                  ),
                  _vm._v(" \n                        ")
                ])
              ]),
              _vm._v(" "),
              _c("br"),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-md-12" }, [
                  _c("div", { staticClass: "table-responsive" }, [
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
                          _vm._l(_vm.logs, function(item, index) {
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
                                    "\n                                                " +
                                      _vm._s(index + 1) +
                                      "\n                                            "
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
                                    "\n                                                " +
                                      _vm._s(item.accion) +
                                      "\n                                            "
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
                                    "text-align": "left"
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                                " +
                                      _vm._s(item.fecha) +
                                      " -\n                                                " +
                                      _vm._s(item.hora) +
                                      "\n                                            "
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
                                    "text-align": "center"
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                                " +
                                      _vm._s(item.ip) +
                                      "\n                                            "
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
                                    "text-align": "left"
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                                " +
                                      _vm._s(item.modulo) +
                                      "\n                                            "
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
                                    "text-align": "left"
                                  }
                                },
                                [
                                  _vm._v(
                                    "\n                                                " +
                                      _vm._s(item.nombre) +
                                      "\n                                            "
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
                      staticClass: "kt-separator kt-separator--border-dashed"
                    })
                  ])
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
            _vm._v("BITACORA DEL SISTEMA")
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
        _c("th", { staticClass: "text-white" }, [_vm._v("No.")]),
        _vm._v(" "),
        _c("th", { staticClass: "text-white" }, [
          _vm._v(
            "\n                                                Acción\n                                            "
          )
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "text-white" }, [
          _vm._v(
            "\n                                                Fecha\n                                            "
          )
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "text-center text-white" }, [
          _vm._v(
            "\n                                                IP\n                                            "
          )
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "text-white" }, [
          _vm._v(
            "\n                                                Modulo\n                                            "
          )
        ]),
        _vm._v(" "),
        _c("th", { staticClass: "text-left text-white" }, [
          _vm._v(
            "\n                                                Usuario\n                                            "
          )
        ])
      ])
    ])
  }
]
render._withStripped = true



/***/ }),

/***/ "./resources/js/Vistas/Log/Log.vue":
/*!*****************************************!*\
  !*** ./resources/js/Vistas/Log/Log.vue ***!
  \*****************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Log_vue_vue_type_template_id_2b7f364e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Log.vue?vue&type=template&id=2b7f364e& */ "./resources/js/Vistas/Log/Log.vue?vue&type=template&id=2b7f364e&");
/* harmony import */ var _Log_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Log.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Log/Log.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Log_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Log_vue_vue_type_template_id_2b7f364e___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Log_vue_vue_type_template_id_2b7f364e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Log/Log.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Log/Log.vue?vue&type=script&lang=js&":
/*!******************************************************************!*\
  !*** ./resources/js/Vistas/Log/Log.vue?vue&type=script&lang=js& ***!
  \******************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Log_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Log.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Log/Log.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Log_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Log/Log.vue?vue&type=template&id=2b7f364e&":
/*!************************************************************************!*\
  !*** ./resources/js/Vistas/Log/Log.vue?vue&type=template&id=2b7f364e& ***!
  \************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Log_vue_vue_type_template_id_2b7f364e___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Log.vue?vue&type=template&id=2b7f364e& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Log/Log.vue?vue&type=template&id=2b7f364e&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Log_vue_vue_type_template_id_2b7f364e___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Log_vue_vue_type_template_id_2b7f364e___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);