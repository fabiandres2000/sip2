(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[57],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js&":
/*!*********************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js& ***!
  \*********************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! @amcharts/amcharts4/core */ "./node_modules/@amcharts/amcharts4/core.js");
/* harmony import */ var _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! @amcharts/amcharts4/charts */ "./node_modules/@amcharts/amcharts4/charts.js");
/* harmony import */ var _amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @amcharts/amcharts4/themes/animated */ "./node_modules/@amcharts/amcharts4/themes/animated.js");
/* harmony import */ var _Servicios_informes__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../../Servicios/informes */ "./resources/js/Servicios/informes.js");
/* harmony import */ var vue_apexcharts__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! vue-apexcharts */ "./node_modules/vue-apexcharts/dist/vue-apexcharts.js");
/* harmony import */ var vue_apexcharts__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(vue_apexcharts__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var vue_html2pdf__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! vue-html2pdf */ "./node_modules/vue-html2pdf/dist/vue-html2pdf.esm.js");
/* harmony import */ var vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! vue-easy-pie-chart */ "./node_modules/vue-easy-pie-chart/dist/vue-easy-pie-chart.common.js");
/* harmony import */ var vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var vue_easy_pie_chart_dist_vue_easy_pie_chart_css__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! vue-easy-pie-chart/dist/vue-easy-pie-chart.css */ "./node_modules/vue-easy-pie-chart/dist/vue-easy-pie-chart.css");
/* harmony import */ var vue_easy_pie_chart_dist_vue_easy_pie_chart_css__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(vue_easy_pie_chart_dist_vue_easy_pie_chart_css__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var easy_circular_progress__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! easy-circular-progress */ "./node_modules/easy-circular-progress/dist/easy-circular-progress.umd.min.js");
/* harmony import */ var easy_circular_progress__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(easy_circular_progress__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var vue2_circle_progress__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! vue2-circle-progress */ "./node_modules/vue2-circle-progress/dist/vue-circle-progress.js");
/* harmony import */ var vue2_circle_progress__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(vue2_circle_progress__WEBPACK_IMPORTED_MODULE_10__);
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  components: {
    VueHtml2pdf: vue_html2pdf__WEBPACK_IMPORTED_MODULE_6__["default"],
    VueEasyPieChart: vue_easy_pie_chart__WEBPACK_IMPORTED_MODULE_7___default.a,
    Progress: easy_circular_progress__WEBPACK_IMPORTED_MODULE_9___default.a,
    VueCircle: vue2_circle_progress__WEBPACK_IMPORTED_MODULE_10___default.a
  },
  mounted: function mounted() {
    this.calcular();
  },
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      combo: "",
      j: 0,
      mivariable: 0,
      totalMigrantes: 0,
      poblacionMigrante: 0,
      migrantesRegulados: 0,
      migrantesNoRegulados: 0,
      imagenPie: [],
      imagenBarra: [],
      imagenPieOcupaciones: [],
      imagenPiePaises: [],
      imagenSexo: [],
      enfermedades: [],
      afiliaciones: [],
      datos: {
        migrantes0: 0,
        migrantes115: 0,
        migrantes611: 0,
        migrantes1217: 0,
        migrantes1828: 0,
        migrantes2959: 0,
        migrantes60: 0
      },
      sexo: {
        m_0: 0,
        m_15: 0,
        m_611: 0,
        m_1217: 0,
        m_1828: 0,
        m_2959: 0,
        m_60: 0,
        f_0: 0,
        f_15: 0,
        f_611: 0,
        f_1217: 0,
        f_1828: 0,
        f_2959: 0,
        f_60: 0
      },
      ocupaciones: {
        id: 0,
        descripcion: "",
        cont: 0
      },
      poblacion: {
        migrantes: 0,
        nomigrantes: 0
      },
      primerOcupacion: {
        nombre: "",
        cant: 0
      },
      segundaOcupacion: {
        nombre: "",
        cant: 0
      },
      terceraOcupacion: {
        nombre: "",
        cant: 0
      },
      cuartaOcupacion: {
        nombre: "",
        cant: 0
      },
      quintaOcupacion: {
        nombre: "",
        cant: 0
      },
      poblacionEdadUno: {
        edad: "",
        cant: 0
      },
      poblacionEdadDos: {
        edad: "",
        cant: 0
      },
      poblacionEdadTres: {
        edad: "",
        cant: 0
      },
      poblacionEdadCuatro: {
        edad: "",
        cant: 0
      },
      primeraEnfermedad: {
        nombre: "",
        cant: 0
      },
      segundaEnfermedad: {
        nombre: "",
        cant: 0
      },
      terceraEnfermedad: {
        nombre: "",
        cant: 0
      },
      cuartaEnfermedad: {
        nombre: "",
        cant: 0
      },
      quintaEnfermedad: {
        nombre: "",
        cant: 0
      },
      series: [],
      series_grupo: [],
      series_barra_orden: [],
      series_ocupaciones: [],
      series_enfermedades: [],
      series_paises: [],
      serie_sexo: [],
      textoEnfermedades: "",
      fill: {
        gradient: ["#078914", "#078914", "#078914"]
      }
    };
  },
  methods: {
    progress: function progress(event, _progress, stepValue) {// console.log(event);
      //this.$refs.gc.progress = 12;
    },
    progress_end: function progress_end(event) {//console.log("Circle progress end");
      //this.$refs.gc.progress = 12;
    },
    pdfgen: function pdfgen(imagen) {
      var pdfMake = __webpack_require__(/*! pdfmake/build/pdfmake.js */ "./node_modules/pdfmake/build/pdfmake.js");

      if (pdfMake.vfs == undefined) {
        var pdfFonts = __webpack_require__(/*! pdfmake/build/vfs_fonts.js */ "./node_modules/pdfmake/build/vfs_fonts.js");

        pdfMake.vfs = pdfFonts.pdfMake.vfs;
      }

      var docDefinition = {
        content: "<img src='" + imagen + "'>"
      };
      pdfMake.createPdf(docDefinition).download("optionalName.pdf");
    },
    extraerimagen: function () {
      var _extraerimagen = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee(chart) {
        var _this = this;

        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                this.$refs.html2Pdf.generatePdf();
                chart.exporting.getImage("png").then(function (data) {
                  _this.img = data;
                });

              case 2:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this);
      }));

      function extraerimagen(_x) {
        return _extraerimagen.apply(this, arguments);
      }

      return extraerimagen;
    }(),
    calcular: function calcular() {
      var _this2 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee2() {
        var data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee2$(_context2) {
          while (1) {
            switch (_context2.prev = _context2.next) {
              case 0:
                data = {
                  _token: _this2.csrf
                };
                _context2.next = 3;
                return _Servicios_informes__WEBPACK_IMPORTED_MODULE_4__["inicialesMigrantes"](data).then(function (respuesta) {
                  _this2.poblacionMigrante = respuesta.data.total_migrantes * 100 / respuesta.data.total_poblacion;
                  _this2.totalMigrantes = respuesta.data.total_migrantes;
                  _this2.migrantesRegulados = respuesta.data.total_regulado;
                  _this2.migrantesNoRegulados = respuesta.data.total_no_regulado;
                  _this2.datos = respuesta.data.edades;
                  _this2.ocupaciones = respuesta.data.ocupaciones;

                  _this2.$refs.gc.updateProgress(_this2.poblacionMigrante);

                  _this2.$refs.gcpdf.updateProgress(_this2.poblacionMigrante);

                  _this2.series_paises = respuesta.data.paises;
                  _this2.sexo = respuesta.data.sexo;
                  _this2.enfermedades = respuesta.data.enfermedades;
                  _this2.afiliaciones = respuesta.data.afiliaciones; //console.log(12);
                  //GRAFICA DE PIE

                  //console.log(12);
                  //GRAFICA DE PIE
                  _this2.series.push({
                    migrantes: "Regulados",
                    cantidad: _this2.migrantesRegulados
                  });

                  _this2.series.push({
                    migrantes: "No regulados",
                    cantidad: _this2.migrantesNoRegulados
                  }); //GRAFICA DE BARS


                  //GRAFICA DE BARS
                  _this2.series_grupo.push({
                    edad: "0+",
                    migrantes: _this2.datos.migrantes0
                  });

                  _this2.series_grupo.push({
                    edad: "1-5",
                    migrantes: _this2.datos.migrantes115
                  });

                  _this2.series_grupo.push({
                    edad: "6-11",
                    migrantes: _this2.datos.migrantes611
                  });

                  _this2.series_grupo.push({
                    edad: "12-17",
                    migrantes: _this2.datos.migrantes1217
                  });

                  _this2.series_grupo.push({
                    edad: "18-28",
                    migrantes: _this2.datos.migrantes1828
                  });

                  _this2.series_grupo.push({
                    edad: "29-59",
                    migrantes: _this2.datos.migrantes2959
                  });

                  _this2.series_grupo.push({
                    edad: "60+",
                    migrantes: _this2.datos.migrantes60
                  }); /////ORDENANDO///////////
                  //GRAFICA DE BARS


                  /////ORDENANDO///////////
                  //GRAFICA DE BARS
                  _this2.series_barra_orden.push({
                    edad: "0+",
                    migrantes: _this2.datos.migrantes0
                  });

                  _this2.series_barra_orden.push({
                    edad: "1-5",
                    migrantes: _this2.datos.migrantes115
                  });

                  _this2.series_barra_orden.push({
                    edad: "6-11",
                    migrantes: _this2.datos.migrantes611
                  });

                  _this2.series_barra_orden.push({
                    edad: "12-17",
                    migrantes: _this2.datos.migrantes1217
                  });

                  _this2.series_barra_orden.push({
                    edad: "18-28",
                    migrantes: _this2.datos.migrantes1828
                  });

                  _this2.series_barra_orden.push({
                    edad: "29-59",
                    migrantes: _this2.datos.migrantes2959
                  });

                  _this2.series_barra_orden.push({
                    edad: "60+",
                    migrantes: _this2.datos.migrantes60
                  });

                  _this2.series_barra_orden.sort(function (a, b) {
                    if (a.migrantes > b.migrantes) {
                      return 1;
                    }

                    if (a.migrantes < b.migrantes) {
                      return -1;
                    } // a must be equal to b


                    // a must be equal to b
                    return 0;
                  });

                  _this2.poblacionEdadUno.edad = _this2.series_barra_orden[6].edad;
                  _this2.poblacionEdadUno.cant = _this2.series_barra_orden[6].migrantes;
                  _this2.poblacionEdadDos.edad = _this2.series_barra_orden[5].edad;
                  _this2.poblacionEdadDos.cant = _this2.series_barra_orden[5].migrantes;
                  _this2.poblacionEdadTres.edad = _this2.series_barra_orden[4].edad;
                  _this2.poblacionEdadTres.cant = _this2.series_barra_orden[4].migrantes;
                  _this2.poblacionEdadCuatro.edad = _this2.series_barra_orden[3].edad;
                  _this2.poblacionEdadCuatro.cant = _this2.series_barra_orden[3].migrantes;

                  for (var i = 0; i < _this2.ocupaciones.length; i++) {
                    _this2.series_ocupaciones.push({
                      ocupacion: _this2.ocupaciones[i]["descripcion"],
                      migrantes: _this2.ocupaciones[i]["cont"]
                    });
                  }

                  _this2.series_ocupaciones.sort(function (a, b) {
                    if (a.migrantes > b.migrantes) {
                      return 1;
                    }

                    if (a.migrantes < b.migrantes) {
                      return -1;
                    } // a must be equal to b


                    // a must be equal to b
                    return 0;
                  });

                  for (_this2.j = 0; _this2.j < _this2.enfermedades.length; _this2.j++) {
                    _this2.series_enfermedades.push({
                      enfermedad: _this2.enfermedades[_this2.j]["enfe"],
                      migrantes: _this2.enfermedades[_this2.j]["total"]
                    });
                  }

                  if (_this2.enfermedades.length > 0) {
                    _this2.primeraEnfermedad.nombre = _this2.enfermedades[0]["enfe"];
                    _this2.primeraEnfermedad.cant = _this2.enfermedades[0]["total"];
                  }

                  if (_this2.enfermedades.length > 1) {
                    _this2.segundaEnfermedad.nombre = _this2.enfermedades[1]["enfe"];
                    _this2.segundaEnfermedad.cant = _this2.enfermedades[1]["total"];
                  }

                  if (_this2.enfermedades.length > 2) {
                    _this2.terceraEnfermedad.nombre = _this2.enfermedades[2]["enfe"];
                    _this2.terceraEnfermedad.cant = _this2.enfermedades[2]["total"];
                  }

                  if (_this2.enfermedades.length > 3) {
                    _this2.cuartaEnfermedad.nombre = _this2.enfermedades[3]["enfe"];
                    _this2.cuartaEnfermedad.cant = _this2.enfermedades[3]["total"];
                  }

                  if (_this2.enfermedades.length > 4) {
                    _this2.quintaEnfermedad.nombre = _this2.enfermedades[4]["enfe"];
                    _this2.quintaEnfermedad.cant = _this2.enfermedades[4]["total"];
                  }

                  _this2.primerOcupacion.nombre = _this2.series_ocupaciones[4].ocupacion;
                  _this2.primerOcupacion.cant = _this2.series_ocupaciones[4].migrantes;
                  _this2.segundaOcupacion.nombre = _this2.series_ocupaciones[3].ocupacion;
                  _this2.segundaOcupacion.cant = _this2.series_ocupaciones[3].migrantes;
                  _this2.terceraOcupacion.nombre = _this2.series_ocupaciones[2].ocupacion;
                  _this2.terceraOcupacion.cant = _this2.series_ocupaciones[2].migrantes;
                  _this2.cuartaOcupacion.nombre = _this2.series_ocupaciones[1].ocupacion;
                  _this2.cuartaOcupacion.cant = _this2.series_ocupaciones[1].migrantes;
                  _this2.quintaOcupacion.nombre = _this2.series_ocupaciones[0].ocupacion;
                  _this2.quintaOcupacion.cant = _this2.series_ocupaciones[0].migrantes; ///////////////////SEXOEDAD///////////////

                  ///////////////////SEXOEDAD///////////////
                  _this2.serie_sexo = [{
                    age: "60+",
                    male: Number(_this2.sexo.m_60),
                    female: Number(_this2.sexo.f_60)
                  }, {
                    age: "29-59",
                    male: Number(_this2.sexo.m_2959),
                    female: Number(_this2.sexo.f_2959)
                  }, {
                    age: "18-28",
                    male: Number(_this2.sexo.m_1828),
                    female: Number(_this2.sexo.f_1828)
                  }, {
                    age: "12-17",
                    male: Number(_this2.sexo.m_1217),
                    female: Number(_this2.sexo.f_1217)
                  }, {
                    age: "6-11",
                    male: Number(_this2.sexo.m_611),
                    female: Number(_this2.sexo.f_611)
                  }, {
                    age: "1-5",
                    male: Number(_this2.sexo.m_15),
                    female: Number(_this2.sexo.f_15)
                  }, {
                    age: "0+",
                    male: Number(_this2.sexo.m_0),
                    female: Number(_this2.sexo.f_0)
                  }];

                  _this2.grafica_de_pie();

                  _this2.grafica_barra();

                  _this2.grafica_de_pie_ocupaciones();

                  _this2.grafica_de_pie_paises();

                  _this2.grafica_stacked();

                  _this2.grafica_barra_enfermedades();
                })["catch"](function (err) {
                  console.log(err);
                });

              case 3:
              case "end":
                return _context2.stop();
            }
          }
        }, _callee2);
      }))();
    },
    grafica_de_pie: function grafica_de_pie() {
      var _this3 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee3() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee3$(_context3) {
          while (1) {
            switch (_context3.prev = _context3.next) {
              case 0:
                // Themes begin
                _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartdiv", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieChart3D"]);
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.legend = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["Legend"]();
                chart.data = _this3.series;
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieSeries3D"]());
                series.dataFields.value = "cantidad";
                series.dataFields.category = "migrantes";
                _context3.next = 10;
                return chart.exporting.getImage("png").then(function (data) {
                  _this3.imagenPie = data;
                });

              case 10:
              case "end":
                return _context3.stop();
            }
          }
        }, _callee3);
      }))();
    },
    grafica_barra: function grafica_barra() {
      var _this4 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee4() {
        var chart, categoryAxis, valueAxis, series, labelBullet;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee4$(_context4) {
          while (1) {
            switch (_context4.prev = _context4.next) {
              case 0:
                // Themes begin
                _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end
                // Add data

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartbarra", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYChart"]);
                chart.padding(40, 40, 40, 40);
                categoryAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["CategoryAxis"]());
                categoryAxis.renderer.grid.template.location = 0;
                categoryAxis.dataFields.category = "ocupacion";
                categoryAxis.renderer.minGridDistance = 1;
                categoryAxis.renderer.inversed = true;
                categoryAxis.renderer.grid.template.disabled = true;
                valueAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ValueAxis"]());
                valueAxis.min = 0;
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ColumnSeries"]());
                series.dataFields.categoryY = "ocupacion";
                series.dataFields.valueX = "migrantes";
                series.tooltipText = "{valueX.value}";
                series.columns.template.strokeOpacity = 0;
                series.columns.template.column.cornerRadiusBottomRight = 5;
                series.columns.template.column.cornerRadiusTopRight = 5;
                labelBullet = series.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["LabelBullet"]());
                labelBullet.label.horizontalCenter = "left";
                labelBullet.label.dx = 10;
                labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#')}";
                labelBullet.locationX = 1; // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set

                series.columns.template.adapter.add("fill", function (fill, target) {
                  return chart.colors.getIndex(target.dataItem.index);
                });
                categoryAxis.sortBySeries = series;
                chart.data = _this4.series_ocupaciones;
                _context4.next = 28;
                return chart.exporting.getImage("png").then(function (data) {
                  _this4.imagenBarra = data;
                });

              case 28:
              case "end":
                return _context4.stop();
            }
          }
        }, _callee4);
      }))();
    },
    grafica_de_pie_ocupaciones: function grafica_de_pie_ocupaciones() {
      var _this5 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee5() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee5$(_context5) {
          while (1) {
            switch (_context5.prev = _context5.next) {
              case 0:
                // Themes begin
                _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartocupaciones", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieChart3D"]);
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.legend = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["Legend"]();
                chart.data = _this5.series_grupo;
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieSeries3D"]());
                series.dataFields.value = "migrantes";
                series.dataFields.category = "edad";
                _context5.next = 10;
                return chart.exporting.getImage("png").then(function (data) {
                  _this5.imagenPieOcupaciones = data;
                });

              case 10:
              case "end":
                return _context5.stop();
            }
          }
        }, _callee5);
      }))();
    },
    grafica_de_pie_paises: function grafica_de_pie_paises() {
      var _this6 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee6() {
        var chart, series;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee6$(_context6) {
          while (1) {
            switch (_context6.prev = _context6.next) {
              case 0:
                // Themes begin
                _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartdivpaises", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieChart3D"]);
                chart.hiddenState.properties.opacity = 0; // this creates initial fade-in

                chart.legend = new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["Legend"]();
                chart.data = _this6.series_paises;
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["PieSeries3D"]());
                series.dataFields.value = "total";
                series.dataFields.category = "nombre";
                _context6.next = 10;
                return chart.exporting.getImage("png").then(function (data) {
                  _this6.imagenPiePaises = data;
                });

              case 10:
              case "end":
                return _context6.stop();
            }
          }
        }, _callee6);
      }))();
    },
    grafica_stacked: function grafica_stacked() {
      var _this7 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee7() {
        var chart, categoryAxis, valueAxis, male, maleLabel, female, femaleLabel, maleRange, femaleRange;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee7$(_context7) {
          while (1) {
            switch (_context7.prev = _context7.next) {
              case 0:
                // Themes begin
                _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end
                // Create chart instance

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartdivsexo", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYChart"]); // Add data

                chart.data = _this7.serie_sexo; // Use only absolute numbers

                chart.numberFormatter.numberFormat = "#.#s"; // Create axes

                categoryAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["CategoryAxis"]());
                categoryAxis.dataFields.category = "age";
                categoryAxis.renderer.grid.template.location = 0;
                categoryAxis.renderer.inversed = true;
                valueAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ValueAxis"]());
                valueAxis.extraMin = 0.1;
                valueAxis.extraMax = 0.1;
                valueAxis.renderer.minGridDistance = 40;
                valueAxis.renderer.ticks.template.length = 5;
                valueAxis.renderer.ticks.template.disabled = false;
                valueAxis.renderer.ticks.template.strokeOpacity = 0.4;
                valueAxis.renderer.labels.template.adapter.add("text", function (text) {
                  return text == "Male" || text == "Female" ? text : text + "";
                }); // Create series

                male = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ColumnSeries"]());
                male.dataFields.valueX = "male";
                male.dataFields.categoryY = "age";
                male.clustered = false;
                maleLabel = male.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["LabelBullet"]());
                maleLabel.label.text = "{valueX}";
                maleLabel.label.hideOversized = false;
                maleLabel.label.truncate = false;
                maleLabel.label.horizontalCenter = "right";
                maleLabel.label.dx = -10;
                female = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ColumnSeries"]());
                female.dataFields.valueX = "female";
                female.dataFields.categoryY = "age";
                female.clustered = false;
                femaleLabel = female.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["LabelBullet"]());
                femaleLabel.label.text = "{valueX}";
                femaleLabel.label.hideOversized = false;
                femaleLabel.label.truncate = false;
                femaleLabel.label.horizontalCenter = "left";
                femaleLabel.label.dx = 10;
                maleRange = valueAxis.axisRanges.create();
                maleRange.value = -10;
                maleRange.endValue = 0;
                maleRange.label.text = "Masculino";
                maleRange.label.fill = chart.colors.list[0];
                maleRange.label.dy = 20;
                maleRange.label.fontWeight = "600";
                maleRange.grid.strokeOpacity = 1;
                maleRange.grid.stroke = male.stroke;
                femaleRange = valueAxis.axisRanges.create();
                femaleRange.value = 1;
                femaleRange.endValue = 0;
                femaleRange.label.text = "Femenino";
                femaleRange.label.fill = chart.colors.list[1];
                femaleRange.label.dy = 20;
                femaleRange.label.fontWeight = "600";
                femaleRange.grid.strokeOpacity = 1;
                femaleRange.grid.stroke = female.stroke;
                chart.exporting.getImage("png").then(function (data) {
                  _this7.imagenSexo = data;
                });

              case 55:
              case "end":
                return _context7.stop();
            }
          }
        }, _callee7);
      }))();
    },
    generarPDF: function () {
      var _generarPDF = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee8() {
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee8$(_context8) {
          while (1) {
            switch (_context8.prev = _context8.next) {
              case 0:
                this.$refs.html2Pdf.generatePdf();

              case 1:
              case "end":
                return _context8.stop();
            }
          }
        }, _callee8, this);
      }));

      function generarPDF() {
        return _generarPDF.apply(this, arguments);
      }

      return generarPDF;
    }(),
    grafica_barra_enfermedades: function grafica_barra_enfermedades() {
      var _this8 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee9() {
        var chart, categoryAxis, valueAxis, series, labelBullet;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee9$(_context9) {
          while (1) {
            switch (_context9.prev = _context9.next) {
              case 0:
                // Themes begin
                _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["useTheme"](_amcharts_amcharts4_themes_animated__WEBPACK_IMPORTED_MODULE_3__["default"]); // Themes end
                // Add data

                chart = _amcharts_amcharts4_core__WEBPACK_IMPORTED_MODULE_1__["create"]("chartbarraenfermedades", _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["XYChart"]);
                chart.padding(40, 40, 40, 40);
                categoryAxis = chart.yAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["CategoryAxis"]());
                categoryAxis.renderer.grid.template.location = 0;
                categoryAxis.dataFields.category = "enfermedad";
                categoryAxis.renderer.minGridDistance = 1;
                categoryAxis.renderer.inversed = true;
                categoryAxis.renderer.grid.template.disabled = true;
                valueAxis = chart.xAxes.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ValueAxis"]());
                valueAxis.min = 0;
                series = chart.series.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["ColumnSeries"]());
                series.dataFields.categoryY = "enfermedad";
                series.dataFields.valueX = "migrantes";
                series.tooltipText = "{valueX.value}";
                series.columns.template.strokeOpacity = 0;
                series.columns.template.column.cornerRadiusBottomRight = 5;
                series.columns.template.column.cornerRadiusTopRight = 5;
                labelBullet = series.bullets.push(new _amcharts_amcharts4_charts__WEBPACK_IMPORTED_MODULE_2__["LabelBullet"]());
                labelBullet.label.horizontalCenter = "left";
                labelBullet.label.dx = 10;
                labelBullet.label.text = "{values.valueX.workingValue.formatNumber('#')}";
                labelBullet.locationX = 1; // as by default columns of the same series are of the same color, we add adapter which takes colors from chart.colors color set

                series.columns.template.adapter.add("fill", function (fill, target) {
                  return chart.colors.getIndex(target.dataItem.index);
                });
                categoryAxis.sortBySeries = series;
                chart.data = _this8.series_enfermedades;
                _context9.next = 28;
                return chart.exporting.getImage("png").then(function (data) {
                  _this8.imagenBarra = data;
                });

              case 28:
              case "end":
                return _context9.stop();
            }
          }
        }, _callee9);
      }))();
    },
    filtrar: function filtrar() {
      var _this9 = this;

      return _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.mark(function _callee10() {
        var data;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default.a.wrap(function _callee10$(_context10) {
          while (1) {
            switch (_context10.prev = _context10.next) {
              case 0:
                data = {
                  _token: _this9.csrf,
                  _tipo: _this9.combo
                }; //alert(this.combo);

                if (!(_this9.combo == "")) {
                  _context10.next = 6;
                  break;
                }

                _context10.next = 4;
                return IndicadoresService.spa(data).then(function (respuesta) {
                  _this9.poblacion = respuesta.data["poblacion"];

                  _this9.grafica_barras(); //console.log(this.serie);

                })["catch"](function (err) {
                  console.log(err);
                });

              case 4:
                _context10.next = 8;
                break;

              case 6:
                _context10.next = 8;
                return IndicadoresService.filtrospa(data).then(function (respuesta) {
                  _this9.poblacion = respuesta.data["poblacion"];

                  _this9.grafica_barras(); //console.log(this.serie);

                })["catch"](function (err) {
                  console.log(err);
                });

              case 8:
              case "end":
                return _context10.stop();
            }
          }
        }, _callee10);
      }))();
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25&":
/*!*************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25& ***!
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
    { staticStyle: { "margin-top": "-4%" } },
    [
      _c("div", { staticClass: "row" }, [
        _c("div", { staticClass: "col-lg-12" }, [
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("div", { staticClass: "row" }, [
                _vm._m(0),
                _vm._v(" "),
                _c("div", { staticClass: "col-sm-2 text-right" }, [
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
            _c("div", { staticClass: "card-body" }, [
              _c("div", { staticClass: "row" }, [
                _c(
                  "div",
                  { ref: "printMe", staticClass: "col-lg-6 text-center" },
                  [
                    _c("h5", [_vm._v("Población migrante")]),
                    _vm._v(" "),
                    _c(
                      "vue-circle",
                      {
                        ref: "gc",
                        attrs: {
                          progress: _vm.mivariable,
                          size: 250,
                          reverse: false,
                          "line-cap": "round",
                          fill: _vm.fill,
                          "empty-fill": "rgba(0, 0, 0, .1)",
                          "animation-start-value": 0.0,
                          "start-angle": -190,
                          "insert-mode": "append",
                          thickness: 7,
                          "show-percent": false
                        },
                        on: {
                          "vue-circle-progress": _vm.progress,
                          "vue-circle-end": _vm.progress_end
                        }
                      },
                      [
                        _c(
                          "p",
                          {
                            staticStyle: {
                              "font-size": "30px",
                              "font-weight": "bold"
                            }
                          },
                          [
                            _vm._v(
                              "\n                  " +
                                _vm._s(Math.round(_vm.poblacionMigrante)) +
                                "%\n                "
                            )
                          ]
                        )
                      ]
                    )
                  ],
                  1
                ),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-6 text-center" }, [
                  _c("h5", [_vm._v("Estado migratorio")]),
                  _vm._v(" "),
                  _c("div", {
                    staticStyle: { width: "100%", height: "250px" },
                    attrs: { id: "chartdiv" }
                  }),
                  _vm._v(" "),
                  _c("b", [
                    _vm._v(
                      "\n                El\n                " +
                        _vm._s(
                          Math.round(
                            (_vm.migrantesNoRegulados * 100) /
                              (_vm.migrantesNoRegulados +
                                _vm.migrantesRegulados)
                          )
                        ) +
                        "% de la poblacion migrante no se encuentran registrados como\n                migrantes."
                    )
                  ])
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-lg-12 text-center" }, [
                  _c("h4", [
                    _vm._v("Principales ocupaciones de los migrantes")
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticStyle: { width: "100%", height: "400px" },
                    attrs: { id: "chartbarra" }
                  }),
                  _vm._v(
                    "\n              En relación a la ocupación migrante en el municipio, el\n              " +
                      _vm._s(
                        Math.round(
                          (_vm.primerOcupacion.cant * 100) / _vm.totalMigrantes
                        )
                      ) +
                      "%\n              " +
                      _vm._s(
                        _vm.primerOcupacion.nombre == "Sin empleo"
                          ? "están"
                          : "son"
                      ) +
                      " " +
                      _vm._s(_vm.primerOcupacion.nombre) +
                      ", el\n              " +
                      _vm._s(
                        Math.round(
                          (_vm.segundaOcupacion.cant * 100) / _vm.totalMigrantes
                        )
                      ) +
                      "%\n              " +
                      _vm._s(
                        _vm.segundaOcupacion.nombre == "Sin empleo"
                          ? "están"
                          : "son"
                      ) +
                      " " +
                      _vm._s(_vm.segundaOcupacion.nombre) +
                      ", el\n              " +
                      _vm._s(
                        Math.round(
                          (_vm.terceraOcupacion.cant * 100) / _vm.totalMigrantes
                        )
                      ) +
                      "%\n              " +
                      _vm._s(
                        _vm.terceraOcupacion.nombre == "Sin empleo"
                          ? "están"
                          : "son"
                      ) +
                      " " +
                      _vm._s(_vm.terceraOcupacion.nombre) +
                      ", el\n              " +
                      _vm._s(
                        Math.round(
                          (_vm.cuartaOcupacion.cant * 100) / _vm.totalMigrantes
                        )
                      ) +
                      "%\n              " +
                      _vm._s(
                        _vm.cuartaOcupacion.nombre == "Sin empleo"
                          ? "están"
                          : "son"
                      ) +
                      " " +
                      _vm._s(_vm.cuartaOcupacion.nombre) +
                      ", el\n              " +
                      _vm._s(
                        Math.round(
                          (_vm.quintaOcupacion.cant * 100) / _vm.totalMigrantes
                        )
                      ) +
                      "%\n              " +
                      _vm._s(
                        _vm.quintaOcupacion.nombre == "Sin empleo"
                          ? "están"
                          : "son"
                      ) +
                      " " +
                      _vm._s(_vm.quintaOcupacion.nombre) +
                      ".\n            "
                  )
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-lg-6 text-center" }, [
                  _c("h5", [
                    _vm._v(
                      "\n                Población migrante por grupo de edad\n              "
                    )
                  ]),
                  _vm._v(" "),
                  _c("div", {
                    staticStyle: { width: "100%", height: "400px" },
                    attrs: { id: "chartocupaciones" }
                  }),
                  _vm._v(
                    "\n              Del 100% de la población migrante (" +
                      _vm._s(_vm.totalMigrantes) +
                      "), la\n              mayoría " +
                      _vm._s(_vm.poblacionEdadUno.cant) +
                      " tienen entre\n              " +
                      _vm._s(_vm.poblacionEdadUno.edad) +
                      " años de edad, seguido de\n              " +
                      _vm._s(_vm.poblacionEdadDos.cant) +
                      " entre 18-28 años,\n              " +
                      _vm._s(_vm.poblacionEdadTres.cant) +
                      " entre\n              " +
                      _vm._s(_vm.poblacionEdadTres.edad) +
                      " y\n              " +
                      _vm._s(_vm.poblacionEdadCuatro.cant) +
                      " entre\n              " +
                      _vm._s(_vm.poblacionEdadCuatro.edad) +
                      ".\n            "
                  )
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-6 text-center" }, [
                  _c("h5", [_vm._v("Migrantes por sexo")]),
                  _vm._v(" "),
                  _c("div", {
                    staticStyle: { width: "100%", height: "400px" },
                    attrs: { id: "chartdivsexo" }
                  }),
                  _vm._v(
                    "\n              \n                El\n                " +
                      _vm._s(
                        Math.round(
                          (_vm.migrantesNoRegulados * 100) /
                            (_vm.migrantesNoRegulados + _vm.migrantesRegulados)
                        )
                      ) +
                      "% de la poblacion migrante no se encuentran registrados como\n                migrantes.\n            "
                  )
                ])
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-body" }, [
              _c("div", { staticClass: "row" }, [
                _c(
                  "div",
                  { ref: "printMe", staticClass: "col-lg-12 text-center" },
                  [
                    _c("h5", [_vm._v("Principales paises")]),
                    _vm._v(" "),
                    _c("div", {
                      staticStyle: { width: "100%", height: "500px" },
                      attrs: { id: "chartdivpaises" }
                    })
                  ]
                )
              ])
            ])
          ]),
          _vm._v(" "),
          _c("div", { staticClass: "card" }, [
            _c("div", { staticClass: "card-body text-center" }, [
              _c("h4", [_vm._v("Situación de salud de migrantes")]),
              _vm._v(" "),
              _c("div", { staticClass: "row" }, [
                _c("div", { staticClass: "col-lg-12 text-center" }, [
                  _c("h4", [_vm._v("Principales enfermedades")]),
                  _vm._v(" "),
                  _c("div", {
                    staticStyle: { width: "100%", height: "400px" },
                    attrs: { id: "chartbarraenfermedades" }
                  }),
                  _vm._v(" "),
                  _vm.enfermedades.length > 0
                    ? _c(
                        "div",
                        [
                          _vm._v(
                            "\n                Las principales enfermedades reportadas en la población migrante son:  \n                "
                          ),
                          _vm._l(_vm.enfermedades, function(e) {
                            return _c(
                              "span",
                              { key: e.id, attrs: { value: e.id } },
                              [
                                _vm._v(
                                  "\n                  " +
                                    _vm._s(e.enfe) +
                                    ", \n                "
                                )
                              ]
                            )
                          })
                        ],
                        2
                      )
                    : _c("div", [
                        _vm._v(
                          "\n                 No hay datos para las enfermedades.\n              "
                        )
                      ])
                ]),
                _vm._v(" "),
                _c("div", { staticClass: "col-lg-6 text-center" }, [
                  _c("h4", [_vm._v("Acesso a servicio de salud")]),
                  _vm._v(" "),
                  _c("h5", [_vm._v("Migrantes afiliados")]),
                  _vm._v(" "),
                  _c("h1", [_vm._v(_vm._s(_vm.afiliaciones.afiliados))]),
                  _vm._v(" "),
                  _c("h5", [_vm._v("Migrantes no afiliados")]),
                  _vm._v(" "),
                  _c("h1", [_vm._v(_vm._s(_vm.afiliaciones.no_afiliados))])
                ]),
                _vm._v(" "),
                _vm._m(1)
              ])
            ])
          ])
        ])
      ]),
      _vm._v(" "),
      _c(
        "VueHtml2pdf",
        {
          ref: "html2Pdf",
          attrs: {
            "show-layout": false,
            "float-layout": true,
            "enable-download": true,
            "preview-modal": true,
            "paginate-elements-by-height": 1400,
            filename: "myPDF",
            "pdf-quality": 2,
            "manual-pagination": false,
            "pdf-format": "a4",
            "pdf-orientation": "portrait",
            "pdf-content-width": "100%",
            margin: [0, 100, 0, 100]
          }
        },
        [
          _c(
            "section",
            { attrs: { slot: "pdf-content" }, slot: "pdf-content" },
            [
              _c("section", { staticClass: "pdf-item" }, [
                _c(
                  "div",
                  { staticClass: "row", staticStyle: { "margin-top": "30px" } },
                  [
                    _c("div", { staticClass: "col-sm-12 text-center" }, [
                      _c("h3", [_vm._v("INFORME POBLACIÓN MIGRANTE")])
                    ])
                  ]
                ),
                _vm._v(" "),
                _c("table", { staticStyle: { width: "100%" } }, [
                  _c("tr", [
                    _c(
                      "td",
                      {
                        staticClass: "text-center",
                        staticStyle: {
                          "font-size": "14px",
                          width: "50%",
                          "font-weight": "600"
                        }
                      },
                      [
                        _vm._v(
                          "\n              Población migrante\n            "
                        )
                      ]
                    ),
                    _vm._v(" "),
                    _c(
                      "td",
                      {
                        staticClass: "text-center",
                        staticStyle: {
                          "font-size": "14px",
                          width: "50%",
                          "font-weight": "600"
                        }
                      },
                      [
                        _vm._v(
                          "\n              Estado migratorio\n            "
                        )
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("tr", [
                    _c(
                      "td",
                      {
                        staticClass: "text-center",
                        staticStyle: { "font-size": "11px" }
                      },
                      [
                        _c("br"),
                        _vm._v(" "),
                        _c(
                          "vue-circle",
                          {
                            ref: "gcpdf",
                            attrs: {
                              progress: _vm.mivariable,
                              size: 180,
                              reverse: false,
                              "line-cap": "round",
                              fill: _vm.fill,
                              "empty-fill": "rgba(0, 0, 0, .1)",
                              "animation-start-value": 0.0,
                              "start-angle": -190,
                              "insert-mode": "append",
                              thickness: 10,
                              "show-percent": false
                            },
                            on: {
                              "vue-circle-progress": _vm.progress,
                              "vue-circle-end": _vm.progress_end
                            }
                          },
                          [
                            _c(
                              "p",
                              {
                                staticStyle: {
                                  "font-size": "35px",
                                  "font-weight": "bold"
                                }
                              },
                              [
                                _vm._v(
                                  "\n                  " +
                                    _vm._s(Math.round(_vm.poblacionMigrante)) +
                                    "%\n                "
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
                      "td",
                      {
                        staticClass: "text-center",
                        staticStyle: { "font-size": "11px" }
                      },
                      [
                        _c("img", {
                          staticStyle: { width: "100%", "font-size": "11px" },
                          attrs: { src: _vm.imagenPie }
                        })
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("tr", [
                    _c(
                      "td",
                      {
                        staticClass: "text-center",
                        staticStyle: { "font-size": "11px" },
                        attrs: { colspan: "2" }
                      },
                      [
                        _vm._v(
                          "\n              El\n              " +
                            _vm._s(
                              Math.round(
                                (_vm.migrantesNoRegulados * 100) /
                                  (_vm.migrantesNoRegulados +
                                    _vm.migrantesRegulados)
                              )
                            ) +
                            "% de la poblacion migrante no se encuentran registrados como\n              migrantes\n            "
                        )
                      ]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("table", { staticStyle: { width: "100%" } }, [
                  _c("tr", [
                    _c(
                      "td",
                      {
                        staticClass: "text-center",
                        staticStyle: { "font-size": "11px" },
                        attrs: { colspan: "2" }
                      },
                      [
                        _c("h5", [
                          _vm._v("Principales ocupaciones de los migrantes")
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("tr", [
                    _c(
                      "td",
                      {
                        staticClass: "text-center",
                        staticStyle: { "font-size": "11px" },
                        attrs: { colspan: "2" }
                      },
                      [
                        _c("img", {
                          staticStyle: { width: "100%", "font-size": "11px" },
                          attrs: { src: _vm.imagenBarra }
                        }),
                        _vm._v(" "),
                        _c(
                          "span",
                          {
                            staticStyle: {
                              "padding-left": "10px",
                              "padding-right": "10px"
                            }
                          },
                          [
                            _vm._v(
                              " En relación a la ocupación migrante en el municipio, el\n              " +
                                _vm._s(
                                  Math.round(
                                    (_vm.primerOcupacion.cant * 100) /
                                      _vm.totalMigrantes
                                  )
                                ) +
                                "%\n              " +
                                _vm._s(
                                  _vm.primerOcupacion.nombre == "Sin empleo"
                                    ? "están"
                                    : "son"
                                ) +
                                " " +
                                _vm._s(_vm.primerOcupacion.nombre) +
                                ", el\n              " +
                                _vm._s(
                                  Math.round(
                                    (_vm.segundaOcupacion.cant * 100) /
                                      _vm.totalMigrantes
                                  )
                                ) +
                                "%\n              " +
                                _vm._s(
                                  _vm.segundaOcupacion.nombre == "Sin empleo"
                                    ? "están"
                                    : "son"
                                ) +
                                " " +
                                _vm._s(_vm.segundaOcupacion.nombre) +
                                ", el\n              " +
                                _vm._s(
                                  Math.round(
                                    (_vm.terceraOcupacion.cant * 100) /
                                      _vm.totalMigrantes
                                  )
                                ) +
                                "%\n              " +
                                _vm._s(
                                  _vm.terceraOcupacion.nombre == "Sin empleo"
                                    ? "están"
                                    : "son"
                                ) +
                                " " +
                                _vm._s(_vm.terceraOcupacion.nombre) +
                                ", el\n              " +
                                _vm._s(
                                  Math.round(
                                    (_vm.cuartaOcupacion.cant * 100) /
                                      _vm.totalMigrantes
                                  )
                                ) +
                                "%\n              " +
                                _vm._s(
                                  _vm.cuartaOcupacion.nombre == "Sin empleo"
                                    ? "están"
                                    : "son"
                                ) +
                                " " +
                                _vm._s(_vm.cuartaOcupacion.nombre) +
                                ", el\n              " +
                                _vm._s(
                                  Math.round(
                                    (_vm.quintaOcupacion.cant * 100) /
                                      _vm.totalMigrantes
                                  )
                                ) +
                                "%\n              " +
                                _vm._s(
                                  _vm.quintaOcupacion.nombre == "Sin empleo"
                                    ? "están"
                                    : "son"
                                ) +
                                " " +
                                _vm._s(_vm.quintaOcupacion.nombre) +
                                "."
                            )
                          ]
                        )
                      ]
                    )
                  ])
                ]),
                _vm._v(" "),
                _c("br"),
                _vm._v(" "),
                _c("table", { staticStyle: { width: "100%" } }, [
                  _c("tr", [
                    _c(
                      "td",
                      {
                        staticClass: "text-center",
                        staticStyle: { "font-size": "11px" },
                        attrs: { colspan: "2" }
                      },
                      [
                        _c("h5", [
                          _vm._v("Población migrante por grupo de edad")
                        ])
                      ]
                    )
                  ]),
                  _vm._v(" "),
                  _c("tr", [
                    _c(
                      "td",
                      {
                        staticClass: "text-center",
                        staticStyle: { "font-size": "11px" },
                        attrs: { colspan: "2" }
                      },
                      [
                        _c("img", {
                          staticStyle: { width: "100%", "font-size": "11px" },
                          attrs: { src: _vm.imagenPieOcupaciones }
                        }),
                        _vm._v(" "),
                        _c(
                          "span",
                          {
                            staticStyle: {
                              "padding-left": "10px",
                              "padding-right": "10px"
                            }
                          },
                          [
                            _vm._v(
                              "Del 100% de la población migrante (" +
                                _vm._s(_vm.totalMigrantes) +
                                "), la\n              mayoría " +
                                _vm._s(_vm.poblacionEdadUno.cant) +
                                " tienen entre\n              " +
                                _vm._s(_vm.poblacionEdadUno.edad) +
                                " años de edad, seguido de\n              " +
                                _vm._s(_vm.poblacionEdadDos.cant) +
                                " entre 18-28 años,\n              " +
                                _vm._s(_vm.poblacionEdadTres.cant) +
                                " entre\n              " +
                                _vm._s(_vm.poblacionEdadTres.edad) +
                                " y\n              " +
                                _vm._s(_vm.poblacionEdadCuatro.cant) +
                                " entre\n              " +
                                _vm._s(_vm.poblacionEdadCuatro.edad) +
                                "."
                            )
                          ]
                        )
                      ]
                    )
                  ])
                ])
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "html2pdf__page-break" }),
              _vm._v(" "),
              _c("section", {
                attrs: { slot: "pdf-content" },
                slot: "pdf-content"
              })
            ]
          )
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
    return _c("div", { staticClass: "col-sm-10" }, [
      _c("h3", [_vm._v("INFORME POBLACIÓN MIGRANTE")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "col-lg-6 text-center" }, [
      _c("h4", [_vm._v("Situación nutricional")])
    ])
  }
]
render._withStripped = true



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

/***/ "./resources/js/Vistas/Informes/poblacionMigrante.vue":
/*!************************************************************!*\
  !*** ./resources/js/Vistas/Informes/poblacionMigrante.vue ***!
  \************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./poblacionMigrante.vue?vue&type=template&id=505b7c25& */ "./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25&");
/* harmony import */ var _poblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./poblacionMigrante.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _poblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__["render"],
  _poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Informes/poblacionMigrante.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js&":
/*!*************************************************************************************!*\
  !*** ./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js& ***!
  \*************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./poblacionMigrante.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25& ***!
  \*******************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./poblacionMigrante.vue?vue&type=template&id=505b7c25& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Informes/poblacionMigrante.vue?vue&type=template&id=505b7c25&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_poblacionMigrante_vue_vue_type_template_id_505b7c25___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);