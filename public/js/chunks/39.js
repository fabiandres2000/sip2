(window.webpackJsonp=window.webpackJsonp||[]).push([[39],{167:function(t,a,e){"use strict";e.d(a,"d",(function(){return n})),e.d(a,"c",(function(){return i})),e.d(a,"b",(function(){return s})),e.d(a,"a",(function(){return o}));var r=e(0);function n(t){return Object(r.a)().post("/enfermedadesCro",t)}function i(t){return Object(r.a)().post("/enfermedadesCro/guardar",t)}function s(t){return Object(r.a)().post("/enfermedadesCro/eliminar",t)}function o(){return Object(r.a)().get("/enfermedadesCro/combo")}},365:function(t,a,e){var r=e(553);"string"==typeof r&&(r=[[t.i,r,""]]);var n={hmr:!0,transform:void 0,insertInto:void 0};e(37)(r,n);r.locals&&(t.exports=r.locals)},552:function(t,a,e){"use strict";e(365)},553:function(t,a,e){(t.exports=e(36)(!1)).push([t.i,"\n.modal-backdrop {\n  background-color: rgba(0, 0, 0, 0.5) !important;\n}\n.modal-title {\n  color: #f8f9fa !important;\n}\n.close {\n  display: none;\n}\n",""])},721:function(t,a,e){"use strict";e.r(a);var r=e(1),n=e.n(r),i=e(167);function s(t,a,e,r,n,i,s){try{var o=t[i](s),c=o.value}catch(t){return void e(t)}o.done?a(c):Promise.resolve(c).then(r,n)}function o(t){return function(){var a=this,e=arguments;return new Promise((function(r,n){var i=t.apply(a,e);function o(t){s(i,r,n,o,c,"next",t)}function c(t){s(i,r,n,o,c,"throw",t)}o(void 0)}))}}var c,l,d,u,f={mounted:function(){this.consultar(1)},name:"barri",data:function(){return{errores:[],bandera:!1,entrarPorError:!1,txtbusqueda:"",enfermedadescro:[],enfermedadData:{descripcion:"",observacion:"",id:0},csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),paginacion:{total:0,pagina_actual:0,por_pagina:0,ultima_pagina:0,desde:0,hasta:0},offset:4,valG:!0}},computed:{enfermedadescroError:function(){if(""==this.enfermedadData.descripcion.trim())return"El campo es obligatorio"},enfermedadesClases:function(){return[{"is-invalid":this.enfermedadescroError,"is-valid":!this.enfermedadescroError}]},esActivo:function(){return this.paginacion.pagina_actual},numeroDePaginas:function(){if(!this.paginacion.hasta)return[];var t=this.paginacion.pagina_actual-this.offset;t<1&&(t=1);var a=t+2*this.offset;a>=this.paginacion.ultima_pagina&&(a=this.paginacion.ultima_pagina);for(var e=[];t<=a;)e.push(t),t++;return e},spinG:function(){return this.valG?{}:["kt-spinner","kt-spinner--right","kt-spinner--sm","kt-spinner--light"]}},methods:{consultar:(u=o(n.a.mark((function t(a){var e,r=this;return n.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:return e={txtbusqueda:this.txtbusqueda.trim(),_token:this.csrf,page:a},t.prev=1,t.next=4,i.d(e).then((function(t){r.enfermedadescro=t.data.enfermedadescro.data,r.paginacion=t.data.paginacion}));case 4:t.next=15;break;case 6:t.prev=6,t.t0=t.catch(1),t.t1=t.t0.response.status,t.next=422===t.t1?11:13;break;case 11:case 13:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",15);case 15:case"end":return t.stop()}}),t,this,[[1,6]])}))),function(t){return u.apply(this,arguments)}),abrirModal:function(){this.enfermedadData.descripcion="",this.enfermedadData.observacion="",this.enfermedadData.id=0,this.errores=[],this.entrarPorError=!1,this.$refs.modalEnfermedad.show()},cerrarModal:function(){this.$refs.modalEnfermedad.hide()},guardar:(d=o(n.a.mark((function t(){var a,e=this;return n.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:if(this.checkForm()){t.next=4;break}this.entrarPorError=!1,t.next=23;break;case 4:return this.errores=[],a={_token:this.csrf,descripcion:this.enfermedadData.descripcion,observacion:this.enfermedadData.observacion,id:this.enfermedadData.id},this.valG=!1,t.prev=7,t.next=10,i.c(a).then((function(t){e.consultar(1),e.enfermedadData.descripcion="",e.enfermedadData.observacion="",e.enfermedadData.id=0,e.cerrarModal(),e.$swal("Guardar...!","Datos Guardados Exitosamente!","success"),e.valG=!0})).catch((function(t){e.errorDevuelto=t.response.data.errors,e.entrarPorError=!0}));case 10:t.next=23;break;case 12:t.prev=12,t.t0=t.catch(7),t.t1=t.t0.response.status,t.next=419===t.t1?17:422===t.t1?19:21;break;case 17:case 19:case 21:return this.$swal("Error...!","Ocurrio un error!","error"),t.abrupt("break",23);case 23:case"end":return t.stop()}}),t,this,[[7,12]])}))),function(){return d.apply(this,arguments)}),checkForm:function(t){return this.errores=[],this.enfermedadData.descripcion||this.errores.push("La descripción es obligatoria."),!this.errores.length},cambiarPaginas:function(t){this.paginacion.pagina_actual=t,this.consultar(t)},eliminar:(l=o(n.a.mark((function t(a){var e,r,s=this;return n.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:e="",r="","Activo"==a.estado?(e="¿Desea anular la enfermedad cronica "+a.descripcion+"?",r="Enfermedad cronica "+a.descripcion+" anulada de manera exitosa"):(e="¿Desea activar la enfermedad cronica "+a.descripcion+"?",r="Enfermedad cronica "+a.descripcion+" activada de manera exitosa"),this.$swal({title:e,text:"",icon:"warning",showCancelButton:!0,confirmButtonColor:"#3085d6",cancelButtonColor:"#d33",confirmButtonText:"Aceptar",cancelButtonText:"Cancelar"}).then((function(t){if(t.value){var e={_token:s.csrf,id:a.id,estado:a.estado};try{i.b(e).then((function(t){s.consultar(1),s.$swal({position:"top-end",icon:"success",title:r,showConfirmButton:!1,timer:2e3})})).catch((function(t){s.$swal("Error...!","Ocurrio un error!","error")}))}catch(t){switch(t.response.status){case 422:default:s.$swal("Error...!","Ocurrio un error!","error")}}}}));case 4:case"end":return t.stop()}}),t,this)}))),function(t){return l.apply(this,arguments)}),editar:(c=o(n.a.mark((function t(a){return n.a.wrap((function(t){for(;;)switch(t.prev=t.next){case 0:this.enfermedadData.descripcion=a.descripcion,this.enfermedadData.observacion=a.observacion,this.enfermedadData.id=a.id,this.$refs.modalEnfermedad.show();case 4:case"end":return t.stop()}}),t,this)}))),function(t){return c.apply(this,arguments)})}},v=(e(552),e(3)),p=Object(v.a)(f,(function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("div",[e("div",{staticClass:"kt-portlet",staticStyle:{"margin-top":"-4%"}},[t._m(0),t._v(" "),e("div",{staticClass:"kt-portlet__body"},[e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-section__content"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-6 col-lg-6"},[e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-section__content"},[e("a",{staticClass:"btn btn-outline-primary btn-icon",attrs:{href:"javascript:;","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Nueva Enfermedad Cronica"},on:{click:t.abrirModal}},[e("i",{staticClass:"la la-file-text-o"})]),t._v(" \n                ")])])]),t._v(" "),e("div",{staticClass:"col-md-6 col-lg-6"},[e("form",{staticClass:"kt-form"},[e("div",{staticClass:"form-group"},[e("div",{staticClass:"input-group"},[e("input",{directives:[{name:"model",rawName:"v-model",value:t.txtbusqueda,expression:"txtbusqueda"}],staticClass:"form-control",attrs:{type:"text",placeholder:"Busqueda"},domProps:{value:t.txtbusqueda},on:{input:function(a){a.target.composing||(t.txtbusqueda=a.target.value)}}}),t._v(" "),e("div",{staticClass:"input-group-append"},[e("button",{staticClass:"btn btn-primary btn-icon",attrs:{type:"button"},on:{click:function(a){return t.consultar(1)}}},[e("i",{staticClass:"fa fa-search"})])])])])])])]),t._v(" "),e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-12"},[e("div",{staticClass:"table-responsive"},[e("table",{staticClass:"table table-sm table-hover"},[t._m(1),t._v(" "),e("tbody",t._l(t.enfermedadescro,(function(a,r){return e("tr",{key:r},[e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v(t._s(r+1))]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.descripcion))]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v(t._s(a.observacion))]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"center"}},[e("span",{staticClass:"kt-badge kt-badge--inline",class:"Activo"==a.estado?"kt-badge--success":"kt-badge--danger"},[t._v(t._s(a.estado))])]),t._v(" "),e("td",{staticStyle:{"text-align":"center","vertical-align":"middle"}},[e("button",{staticClass:"btn btn-outline-info btn-icon btn-sm",attrs:{type:"button",title:"Editar"},on:{click:function(e){return t.editar(a)}}},[e("i",{staticClass:"fa fa-edit"})]),t._v(" "),e("button",{staticClass:"btn btn-icon btn-sm",class:"Activo"==a.estado?"btn-outline-danger":"btn-outline-success",attrs:{type:"button",title:"Activo"==a.estado?"Anular":"Activar"},on:{click:function(e){return t.eliminar(a)}}},[e("i",{staticClass:"fa",class:"Activo"==a.estado?"fa-trash":"fa-check"})])])])})),0)]),t._v(" "),e("div",{staticClass:"kt-separator kt-separator--border-dashed"}),t._v(" "),e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-pagination kt-pagination--danger"},[e("ul",{staticClass:"kt-pagination__links"},[t.paginacion.pagina_actual>1?e("li",{staticClass:"kt-pagination__link--first"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(1)}}},[e("i",{staticClass:"fa fa-angle-double-left kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual>1?e("li",{staticClass:"kt-pagination__link--next"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual-1)}}},[e("i",{staticClass:"fa fa-angle-left kt-font-danger"})])]):t._e(),t._v(" "),t._l(t.numeroDePaginas,(function(a,r){return e("li",{key:r,class:[a==t.esActivo?"kt-pagination__link--active":""]},[e("a",{attrs:{href:"javascript:;"},on:{click:function(e){return e.preventDefault(),t.cambiarPaginas(a)}}},[t._v(t._s(a))])])})),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?e("li",{staticClass:"kt-pagination__link--prev"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.pagina_actual+1)}}},[e("i",{staticClass:"fa fa-angle-right kt-font-danger"})])]):t._e(),t._v(" "),t.paginacion.pagina_actual<t.paginacion.ultima_pagina?e("li",{staticClass:"kt-pagination__link--last"},[e("a",{attrs:{href:"javascript:;"},on:{click:function(a){return a.preventDefault(),t.cambiarPaginas(t.paginacion.ultima_pagina)}}},[e("i",{staticClass:"fa fa-angle-double-right kt-font-danger"})])]):t._e()],2)])])])])])])])]),t._v(" "),e("b-modal",{ref:"modalEnfermedad",attrs:{"hide-footer":"",title:"Gestion de Enfermedades Cronicas",size:"xl",centered:"","header-bg-variant":"danger","header-text-variant":"light","no-close-on-backdrop":!0}},[e("div",{staticClass:"d-block"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-lg-12"},[e("transition",{attrs:{duration:1e3,name:"fade"}},[t.entrarPorError?e("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[e("div",{staticClass:"alert-icon"},[e("i",{staticClass:"flaticon-warning"})]),t._v(" "),e("div",{staticClass:"alert-text"},[t._v("\n                  Por favor, corrija el(los) siguiente(s) error(es):\n                  "),e("hr"),t._v(" "),e("ul",t._l(t.errorDevuelto,(function(a,r){return e("li",{key:r},[t._v(t._s(a))])})),0)]),t._v(" "),e("div",{staticClass:"alert-close"},[e("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[e("span",{attrs:{"aria-hidden":"true"}},[e("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),e("div",{staticClass:"row"},[e("div",{staticClass:"col-lg-12"},[e("transition",{attrs:{duration:1e3,name:"fade"}},[t.errores.length?e("div",{staticClass:"alert alert-warning fade show",attrs:{role:"alert"}},[e("div",{staticClass:"alert-icon"},[e("i",{staticClass:"flaticon-warning"})]),t._v(" "),e("div",{staticClass:"alert-text"},[t._v("\n                  Por favor, corrija el(los) siguiente(s) error(es):\n                  "),e("hr"),t._v(" "),e("ul",t._l(t.errores,(function(a,r){return e("li",{key:r},[t._v(t._s(a))])})),0)]),t._v(" "),e("div",{staticClass:"alert-close"},[e("button",{staticClass:"close",attrs:{type:"button","data-dismiss":"alert","aria-label":"Close"}},[e("span",{attrs:{"aria-hidden":"true"}},[e("i",{staticClass:"la la-close"})])])])]):t._e()])],1)]),t._v(" "),e("form",[e("div",{staticClass:"form-group row"},[e("div",{staticClass:"col-lg-6"},[e("label",[t._v("Enfermedad Cronica:")]),t._v(" "),e("input",{directives:[{name:"model",rawName:"v-model",value:t.enfermedadData.descripcion,expression:"enfermedadData.descripcion"}],staticClass:"form-control text-capitalize",class:t.enfermedadesClases,attrs:{type:"text",placeholder:"Descripción"},domProps:{value:t.enfermedadData.descripcion},on:{input:function(a){a.target.composing||t.$set(t.enfermedadData,"descripcion",a.target.value)}}}),t._v(" "),t.enfermedadescroError?e("div",{staticClass:"invalid-feedback"},[t._v(t._s(t.enfermedadescroError))]):t._e()]),t._v(" "),e("div",{staticClass:"col-lg-6"},[e("label",[t._v("Observación:")]),t._v(" "),e("input",{directives:[{name:"model",rawName:"v-model",value:t.enfermedadData.observacion,expression:"enfermedadData.observacion"}],staticClass:"form-control text-capitalize",attrs:{type:"text",placeholder:"Observación"},domProps:{value:t.enfermedadData.observacion},on:{input:function(a){a.target.composing||t.$set(t.enfermedadData,"observacion",a.target.value)}}})])]),t._v(" "),e("hr"),t._v(" "),e("div",{staticClass:"text-right"},[e("button",{staticClass:"btn btn-success",class:t.spinG,attrs:{type:"button",disabled:!t.valG},on:{click:t.guardar}},[e("i",{staticClass:"fa fa-edit"}),t._v(" Guardar\n            ")]),t._v(" "),e("button",{staticClass:"btn btn-warning",attrs:{type:"button"},on:{click:t.cerrarModal}},[e("i",{staticClass:"fa fa-window-close"}),t._v(" Cancelar\n            ")])])])])])],1)])}),[function(){var t=this.$createElement,a=this._self._c||t;return a("div",{staticClass:"kt-portlet__head"},[a("div",{staticClass:"kt-portlet__head-label"},[a("h3",{staticClass:"kt-portlet__head-title"},[a("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("GESTIÓN DE ENFERMEDADES CRONICAS")])])])])},function(){var t=this,a=t.$createElement,e=t._self._c||a;return e("thead",{},[e("tr",{staticClass:"kt-bg-fill-brand"},[e("th",[t._v("No.")]),t._v(" "),e("th",[t._v("Enfermedad")]),t._v(" "),e("th",[t._v("Observación")]),t._v(" "),e("td",{staticClass:"text-center"},[t._v("Estado")]),t._v(" "),e("td",{staticClass:"text-center"},[t._v("Opciones")])])])}],!1,null,null,null);a.default=p.exports}}]);