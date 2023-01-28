(window["webpackJsonp"] = window["webpackJsonp"] || []).push([[55],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/Principal.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Indicadores/Principal.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _Servicios_indicadores__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../Servicios/indicadores */ "./resources/js/Servicios/indicadores.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    this.calcular();
  },
  data: function data() {
    return {
      csrf: document.querySelector('meta[name="csrf-token"]').getAttribute("content"),
      datos: {
        nro_mujeres_embarazadas: 0,
        nro_adolescentes_embarazadas: 0,
        nro_adolescentes_desescolarizadas: 0,
        nro_adolescentes_lactantes: 0,
        embarazos_vih: 0,
        adolescentes_violencia: 0,
        ninos_violencia: 0,
        poblacion_sin_eps: 0,
        porcentaje_atencion_prenatal: 0,
        porcentaje_sin_atencion_prenatal: 0,
        razon_gestantes_sin_atencion_prental: 0
      }
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
                return _Servicios_indicadores__WEBPACK_IMPORTED_MODULE_1__["listar"](data).then(function (respuesta) {
                  _this.datos = respuesta.data["cantidades"];
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
    }
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/Principal.vue?vue&type=template&id=1c0ebfa1&":
/*!********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/Vistas/Indicadores/Principal.vue?vue&type=template&id=1c0ebfa1& ***!
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
  return _c("div", [
    _c("b", [_vm._v("Número de mujeres con embarazo multiples:")]),
    _vm._v(" " + _vm._s(_vm.datos.nro_mujeres_embarazadas) + "\n  "),
    _c("br"),
    _vm._v(" "),
    _c("b", [_vm._v("Número de adolescentes en embarazo:")]),
    _vm._v(" " + _vm._s(_vm.datos.nro_adolescentes_embarazadas) + "\n  "),
    _c("br"),
    _vm._v(" "),
    _c("b", [_vm._v("Número de adolescentes desescolarizadas en embarazo:")]),
    _vm._v(" " + _vm._s(_vm.datos.nro_adolescentes_desescolarizadas) + "\n  "),
    _c("br"),
    _vm._v(" "),
    _c("b", [_vm._v("Numero de lactantes:")]),
    _vm._v(" " + _vm._s(_vm.datos.nro_adolescentes_lactantes) + "\n  "),
    _c("br"),
    _vm._v(" "),
    _c("b", [_vm._v("Número de mujeres en embarazo con VIH:")]),
    _vm._v(" " + _vm._s(_vm.datos.embarazos_vih) + "\n  "),
    _c("br"),
    _vm._v(" "),
    _c("b", [_vm._v("NIÑOS EN HOGARES CON VIOLENCIA INTRAFAMILIAR:")]),
    _vm._v(" " + _vm._s(_vm.datos.ninos_violencia) + "\n  "),
    _c("br"),
    _vm._v(" "),
    _c("b", [_vm._v("ADOLESCENTES EN HOGARES CON VIOLENCIA INTRAFAMILIAR:")]),
    _vm._v(" " + _vm._s(_vm.datos.adolescentes_violencia) + "\n  "),
    _c("br"),
    _vm._v(" "),
    _c("b", [_vm._v("Número de la población no afiliada a SGSSS:")]),
    _vm._v(" " + _vm._s(_vm.datos.poblacion_sin_eps) + "\n  "),
    _c("br"),
    _vm._v(" "),
    _c("h4", [_vm._v("INDICADORES DE SALUD")]),
    _vm._v(" "),
    _c("br"),
    _vm._v(" "),
    _c("b", [
      _vm._v(
        "Porcentaje de atención prenatal: " +
          _vm._s(_vm.datos.porcentaje_atencion_prenatal)
      )
    ]),
    _vm._v(" "),
    _c("br"),
    _vm._v(" "),
    _c("b", [
      _vm._v(
        "Porcentaje de mujeres embarazadas sn atención prental: " +
          _vm._s(_vm.datos.porcentaje_sin_atencion_prenatal)
      )
    ]),
    _vm._v(" "),
    _c("br"),
    _vm._v(" "),
    _c("b", [
      _vm._v(
        "Razón de gestantes sin atención prenatal: " +
          _vm._s(_vm.datos.razon_gestantes_sin_atencion_prental)
      )
    ])
  ])
}
var staticRenderFns = []
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

/***/ "./resources/js/Vistas/Indicadores/Principal.vue":
/*!*******************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/Principal.vue ***!
  \*******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Principal_vue_vue_type_template_id_1c0ebfa1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Principal.vue?vue&type=template&id=1c0ebfa1& */ "./resources/js/Vistas/Indicadores/Principal.vue?vue&type=template&id=1c0ebfa1&");
/* harmony import */ var _Principal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./Principal.vue?vue&type=script&lang=js& */ "./resources/js/Vistas/Indicadores/Principal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _Principal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _Principal_vue_vue_type_template_id_1c0ebfa1___WEBPACK_IMPORTED_MODULE_0__["render"],
  _Principal_vue_vue_type_template_id_1c0ebfa1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/Vistas/Indicadores/Principal.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/Vistas/Indicadores/Principal.vue?vue&type=script&lang=js&":
/*!********************************************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/Principal.vue?vue&type=script&lang=js& ***!
  \********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Principal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./Principal.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/Principal.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_Principal_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/Vistas/Indicadores/Principal.vue?vue&type=template&id=1c0ebfa1&":
/*!**************************************************************************************!*\
  !*** ./resources/js/Vistas/Indicadores/Principal.vue?vue&type=template&id=1c0ebfa1& ***!
  \**************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Principal_vue_vue_type_template_id_1c0ebfa1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./Principal.vue?vue&type=template&id=1c0ebfa1& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/Vistas/Indicadores/Principal.vue?vue&type=template&id=1c0ebfa1&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Principal_vue_vue_type_template_id_1c0ebfa1___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_Principal_vue_vue_type_template_id_1c0ebfa1___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);