(window.webpackJsonp=window.webpackJsonp||[]).push([[30],{107:function(t,n,e){"use strict";e.d(n,"l",(function(){return r})),e.d(n,"h",(function(){return o})),e.d(n,"q",(function(){return i})),e.d(n,"i",(function(){return s})),e.d(n,"m",(function(){return c})),e.d(n,"o",(function(){return l})),e.d(n,"p",(function(){return d})),e.d(n,"r",(function(){return u})),e.d(n,"a",(function(){return p})),e.d(n,"d",(function(){return f})),e.d(n,"e",(function(){return v})),e.d(n,"n",(function(){return _})),e.d(n,"g",(function(){return g})),e.d(n,"c",(function(){return b})),e.d(n,"f",(function(){return m})),e.d(n,"b",(function(){return h})),e.d(n,"k",(function(){return x})),e.d(n,"s",(function(){return k})),e.d(n,"j",(function(){return w}));var a=e(0);function r(t){return Object(a.a)().post("/reportes/gestantes",t)}function o(t){return Object(a.a)().post("/reportes/exportarGestantes",t)}function i(t){return Object(a.a)().post("/reportes/nutricional",t)}function s(t){return Object(a.a)().post("/reportes/exportarNutricional",t)}function c(t){return Object(a.a)().post("/reportes/cronicas",t)}function l(t){return Object(a.a)().post("/reportes/migrantes",t)}function d(t){return Object(a.a)().post("/reportes/migrantespdf",t)}function u(t,n){return Object(a.a)().get("/reportes/personas-discapacitadas?tipo="+t+"&id="+n)}function p(t,n){return Object(a.a)().get("/reportes/adulto-mayor?tipo="+t+"&id="+n)}function f(t){return Object(a.a)().post("/reportes/exportar-adulto-mayor",t)}function v(t){return Object(a.a)().post("/reportes/exportar-discapacitados",t)}function _(t){return Object(a.a)().post("/reportes/infecciosas",t)}function g(t){return Object(a.a)().post("/reportes/exportar-enfermedades",t)}function b(t){return Object(a.a)().post("/reportes/descolarizados",t)}function m(t){return Object(a.a)().post("/reportes/exportar-descolarizados",t)}function h(t){return Object(a.a)().post("/reportes/bajo-nivel-socioeconomico",t)}function x(t){return Object(a.a)().post("/reportes/exportar-socioeconomico",t)}function k(t){return Object(a.a)().post("/reportes/riesgos-salud",t)}function w(t){return Object(a.a)().post("/reportes/exportar-riesgos-salud",t)}},167:function(t,n,e){"use strict";e.d(n,"d",(function(){return r})),e.d(n,"c",(function(){return o})),e.d(n,"b",(function(){return i})),e.d(n,"a",(function(){return s}));var a=e(0);function r(t){return Object(a.a)().post("/enfermedadesCro",t)}function o(t){return Object(a.a)().post("/enfermedadesCro/guardar",t)}function i(t){return Object(a.a)().post("/enfermedadesCro/eliminar",t)}function s(){return Object(a.a)().get("/enfermedadesCro/combo")}},389:function(t,n,e){var a=e(600);"string"==typeof a&&(a=[[t.i,a,""]]);var r={hmr:!0,transform:void 0,insertInto:void 0};e(37)(a,r);a.locals&&(t.exports=a.locals)},599:function(t,n,e){"use strict";e(389)},600:function(t,n,e){(t.exports=e(36)(!1)).push([t.i,"\n.table_data {\n    width: 100%;\n    font-size: 17px;\n    border-collapse: collapse;\n}\n.table_data thead {\n    padding: 0.3em;\n    color: #fff !important;\n    background: #5578eb;\n}\n.table_data thead tr th, .table_data tbody tr td {\n    text-align: left;\n    vertical-align: top;\n    padding: 0.3em;\n    caption-side: bottom;\n}\n.dataTable th {\n    color: #ffffff !important;\n}\n.dataTables_paginate span .paginate_button{ \n    color: #5578eb !important;\n    margin-left: 3px;\n    margin-right: 3px;\n    font-weight: bold;\n    background-color: #ffff;\n    padding: 4px 8px 4px 8px;\n    border-radius: 4px;\n}\n.dataTables_paginate span .current{     \n    color: #ffff !important;\n    margin-left: 3px;\n    margin-right: 3px;\n    font-weight: bold;\n    background-color: #5578eb;\n    padding: 4px 8px 4px 8px;\n    border-radius: 4px;\n}\n.next{\n    cursor: pointer;\n    background-color: #fd397a;\n    color: white;\n    padding: 5px;\n    border-radius: 4px;\n}\n.previous{\n    cursor: pointer;\n    background-color: #fd397a;\n    color: white;\n    padding: 5px;\n    border-radius: 4px;\n}\n.dataTables_paginate{\n    margin-top: 20px;\n    height: 40px;\n}\n.next:hover, .previous:hover{\n    font-weight: bold;\n    color: white;\n}\n",""])},750:function(t,n,e){"use strict";e.r(n);var a=e(1),r=e.n(a),o=e(107),i=e(10),s=(e(167),e(99)),c=e.n(s);e(123);function l(t,n,e,a,r,o,i){try{var s=t[o](i),c=s.value}catch(t){return void e(t)}s.done?n(c):Promise.resolve(c).then(a,r)}function d(t){return function(){var n=this,e=arguments;return new Promise((function(a,r){var o=t.apply(n,e);function i(t){l(o,a,r,i,s,"next",t)}function s(t){l(o,a,r,i,s,"throw",t)}i(void 0)}))}}var u={mounted:function(){this.iniciales()},data:function(){return{csrf:document.querySelector('meta[name="csrf-token"]').getAttribute("content"),ruta:"",datos:{rangoEdad:"Todos"},integrantes:[]}},methods:{filtrar:function(){this.iniciales()},iniciales:function(){var t=this;return d(r.a.mark((function n(){var e;return r.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return e={_token:t.csrf,datos:t.datos},n.next=3,o.c(e).then((function(n){t.integrantes=n.data.integrantes,t.crearDataTable()}));case 3:case"end":return n.stop()}}),n)})))()},crearDataTable:function(){c()("#descolarizados_table").dataTable().fnDestroy(),setTimeout((function(){c()("#descolarizados_table").DataTable({lengthChange:!0,ordering:!1,bFilter:!1,pageLength:10,language:{decimal:"",emptyTable:"No hay información",info:"Mostrando _START_ a _END_ de _TOTAL_ Registros",infoEmpty:"Mostrando 0 to 0 of 0 Registros",infoFiltered:"(Filtrado de _MAX_ total Registros)",infoPostFix:"",thousands:",",lengthMenu:"Mostrar _MENU_ Registros",loadingRecords:"Cargando...",processing:"Procesando...",search:"Buscar:",zeroRecords:"Sin resultados encontrados",paginate:{first:"Primero",last:"Ultimo",next:"Siguiente",previous:"Anterior"}}})}),500)},generarExcel:function(){var t=this;return d(r.a.mark((function n(){var e;return r.a.wrap((function(n){for(;;)switch(n.prev=n.next){case 0:return e={datos:t.integrantes,titulo:"Reporte Personas Descolarizadas",tipo:"Crónicas"},n.next=3,o.f(e).then((function(n){var e=i.a.state.apiURL+n.data.nombre;t.downloadItem(e)}));case 3:case"end":return n.stop()}}),n)})))()},downloadItem:function(t){var n=document.createElement("a");n.href=t,n.download="Reporte Personas Descolarizadas.xlsx",n.click(),URL.revokeObjectURL(n.href)}}},p=(e(599),e(3)),f=Object(p.a)(u,(function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("div",{staticClass:"row"},[e("div",{staticClass:"col-12"},[e("div",{staticClass:"kt-portlet kt-portlet--height-fluid kt-portlet--mobile",staticStyle:{"margin-top":"-4%"}},[e("div",{staticClass:"kt-portlet__head"},[t._m(0),t._v(" "),e("div",{staticClass:"kt-portlet__head-toolbar"},[e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-section__content"},[e("br"),t._v(" "),e("button",{staticClass:"btn btn-brand",attrs:{type:"button","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Filtrar"},on:{click:t.filtrar}},[e("i",{staticClass:"fa fa-search"}),t._v("Filtrar\n                            ")]),t._v(" "),e("button",{staticClass:"btn btn-success",attrs:{type:"button","data-skin":"dark","data-toggle":"kt-tooltip","data-placement":"top",title:"Exportar EXCEL"},on:{click:t.generarExcel}},[e("i",{staticClass:"fa fa-table"}),t._v("Exportar a Excel\n                            ")])])])])]),t._v(" "),e("div",{staticClass:"kt-portlet__body"},[e("div",{staticClass:"kt-section"},[e("div",{staticClass:"kt-section__content"},[e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-3 col-lg-3"},[e("div",{staticClass:"form-group"},[e("label",[t._v("Grupo de edades:")]),t._v(" "),e("b-form-select",{model:{value:t.datos.rangoEdad,callback:function(n){t.$set(t.datos,"rangoEdad",n)},expression:"datos.rangoEdad"}},[e("option",{attrs:{value:"Todos"}},[t._v("Todos")]),t._v(" "),e("option",{attrs:{value:"0-"}},[t._v("Menores de 1")]),t._v(" "),e("option",{attrs:{value:"r1-5"}},[t._v("De 1 a 5 años")]),t._v(" "),e("option",{attrs:{value:"r6-11"}},[t._v("De 6 a 11 años")]),t._v(" "),e("option",{attrs:{value:"r12-17"}},[t._v("De 12 a 17 años")]),t._v(" "),e("option",{attrs:{value:"r18-28"}},[t._v("De 18 a 28 años")]),t._v(" "),e("option",{attrs:{value:"r29-59"}},[t._v("De 29 a 59")]),t._v(" "),e("option",{attrs:{value:"r60+"}},[t._v("Mayores de 60")])])],1)])]),t._v(" "),e("div",{staticClass:"row"},[e("div",{staticClass:"col-md-12"},[e("div",{staticClass:"table-responsive"},[e("table",{staticClass:"table table-sm table-hover",attrs:{id:"descolarizados_table"}},[t._m(1),t._v(" "),e("tbody",t._l(t.integrantes,(function(n,a){return e("tr",{key:a},[e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle"}},[t._v("\n                                                    "+t._s(a+1)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(n.identificacion)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(n.nombres)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(n.localizacion)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(n.edad)+" Años\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(n.genero)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(n.nivel_escolaridad)+"\n                                                ")]),t._v(" "),e("td",{staticStyle:{"font-weight":"normal","vertical-align":"middle","text-align":"left","text-transform":"capitalize"}},[t._v("\n                                                    "+t._s(n.ocupacion)+"\n                                                ")])])})),0)])])])])])])])])])])}),[function(){var t=this.$createElement,n=this._self._c||t;return n("div",{staticClass:"kt-portlet__head-label"},[n("h3",{staticClass:"kt-portlet__head-title"},[n("span",{staticClass:"kt-widget20__number kt-font-danger"},[this._v("REPORTE DE PERSONAS DESCOLARIZADAS")])])])},function(){var t=this,n=t.$createElement,e=t._self._c||n;return e("thead",{staticStyle:{color:"white","font-weight":"bold"}},[e("tr",{staticClass:"kt-bg-fill-brand"},[e("th",[t._v("No.")]),t._v(" "),e("th",[t._v("Identificacion")]),t._v(" "),e("th",[t._v("Nombres completos")]),t._v(" "),e("th",[t._v("Localización")]),t._v(" "),e("th",[t._v("Edad")]),t._v(" "),e("th",[t._v("Genero")]),t._v(" "),e("th",[t._v("Nivel de Escolaridad")]),t._v(" "),e("th",[t._v("Ocupación")])])])}],!1,null,null,null);n.default=f.exports}}]);