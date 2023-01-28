<template>
    <div>
        <div class="kt-portlet" style="margin-top: -4%;">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <span class="kt-widget20__number kt-font-danger"
                            >BITACORA DEL SISTEMA</span
                        >
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <div class="row">
                            <div class="col-lg-2">
                                <label>Usuarios:</label>
                                <b-form-select
                                    v-model.trim="datos.usuarios"
                                    :class="
                                        datos.usuarios == '0'
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                >
                                    <option value="0" selected
                                        >Seleccione</option
                                    >
                                    <option
                                        v-for="item in usuarios"
                                        :value="item.id"
                                        :key="item.id"
                                        >{{ item.nombre }}</option
                                    >
                                </b-form-select>
                            </div>
                            <div class="col-lg-2">
                                <label>Modulos:</label>
                                <b-form-select
                                    v-model.trim="datos.modulos"
                                    :class="
                                        datos.modulos == '0'
                                            ? 'is-invalid'
                                            : 'is-valid'
                                    "
                                >
                                    <option value="0" selected
                                        >Seleccione</option
                                    >
                                    <option id="INICIO SESION">INICIO</option>
                                    <option id="PARAMETROS ACTIVIDADES"
                                        >ACTIVIDADES</option
                                    >
                                    <option id="PARAMETROS BARRIOS"
                                        >BARRIOS</option
                                    >
                                    <option id="PARAMETROS ESCOLARIDAD"
                                        >ESCOLARIDAD</option
                                    >
                                    <option
                                        id="PARAMETROS ENFERMEDADES_INFECCIOSAS"
                                        >ENFERMEDADES INFECCIOSAS</option
                                    >
                                    <option
                                        id="PARAMETROS ENFERMEDADES_CRONICAS"
                                        >ENFERMEDADES CRONICAS</option
                                    >
                                    <option id="PARAMETROS CORREGIMIENTOS"
                                        >CORREGIMIENTOS</option
                                    >
                                    <option id="PARAMETROS COLEGIOS"
                                        >COLEGIOS</option
                                    >
                                    <option id="ESTABLECIMIENTOS"
                                        >ESTABLECIMIENTOS</option
                                    >
                                    <option id="PARAMETROS ESTADO_CIVIL"
                                        >ESTADO CIVIL</option
                                    >
                                    <option id="PARAMETROS ETNIAS"
                                        >ETNIAS</option
                                    >
                                    <option id="PARAMETROS GRUPOS"
                                        >GRUPOS</option
                                    >
                                    <option id="PARAMETROS METODOS"
                                        >METODOS</option
                                    >
                                    <option id="PARAMETROS MORBILIDAD_GESTACION"
                                        >MORBILIDAD GESTACION</option
                                    >
                                    <option id="PARAMETROS MORBILIDAD_NACER"
                                        >MORBILIDAD AL NACER</option
                                    >
                                    <option id="PARAMETROS MOTIVOS"
                                        >MOTIVOS</option
                                    >
                                    <option id="PARAMETROS OCUPACIONES"
                                        >OCUPACIONES</option
                                    >
                                    <option id="PARAMETROS PARENTESCOS"
                                        >PARENTESCOS</option
                                    >
                                    <option id="PARAMETROS RELIGION"
                                        >RELIGION</option
                                    >
                                    <option id="PARAMETROS VEREDAS"
                                        >VEREDAS</option
                                    >
                                    <option id="PARAMETROS USUARIOS"
                                        >USUARIOS</option
                                    >
                                    <option id="SOPORTE ENTES"
                                        >SOPORTE ENTES</option
                                    >
                                    <option id="UNIDADES">UNIDADES</option>
                                    <option id="CERRAR SESION">CERRAR</option>
                                </b-form-select>
                            </div>
                            <div class="col-lg-2">
                                <label>Fecha:</label>
                                <input
                                    id="date"
                                    type="date"
                                    placeholder="Fecha"
                                    v-model="datos.fecha"
                                    :class="
                                        datos.fecha == '0' ? '' : 'is-valid'
                                    "
                                    class="form-control text-capitalize"
                                    :max="hoy | moment"
                                />
                            </div>
                            <div class="col-lg-2">
                                <br />
                                <label
                                    >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</label
                                >
                                <a
                                    href="javascript:;"
                                    class="btn btn-outline-success btn-icon"
                                    data-skin="dark"
                                    data-toggle="kt-tooltip"
                                    data-placement="top"
                                    title="Buscar"
                                    @click.prevent="buscar(1)"
                                >
                                    <i class="fa fa-search"></i> </a
                                >&nbsp;
                            </div>
                        </div>
                        <br />
                        <div class="row">
                            <div class="col-md-12">
                                <div class="table-responsive">
                                    <table
                                        class="table table-sm table-hover"
                                        id="tablaDatos"
                                    >
                                        <thead class>
                                            <tr class="kt-bg-fill-brand">
                                                <th class="text-white">No.</th>
                                                <th class="text-white">
                                                    Acción
                                                </th>
                                                <th class="text-white">
                                                    Fecha
                                                </th>
                                                <th
                                                    class="text-center text-white"
                                                >
                                                    IP
                                                </th>
                                                <th class="text-white">
                                                    Modulo
                                                </th>
                                                <th
                                                    class="text-left text-white"
                                                >
                                                    Usuario
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item, index) in logs"
                                                :key="index"
                                            >
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;"
                                                >
                                                    {{ index + 1 }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;"
                                                >
                                                    {{ item.accion }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;"
                                                >
                                                    {{ item.fecha }} -
                                                    {{ item.hora }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: center;"
                                                >
                                                    {{ item.ip }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;"
                                                >
                                                    {{ item.modulo }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;"
                                                >
                                                    {{ item.nombre }}
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <div
                                        class="kt-separator kt-separator--border-dashed"
                                    ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
"use strict";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import datatable from "datatables.net-bs4";
require("datatables.net-buttons/js/dataTables.buttons");
require("datatables.net-buttons/js/buttons.html5");
import print from "datatables.net-buttons/js/buttons.print";
import jszip from "jszip/dist/jszip";
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
// import fixedHeader from "datatables.net/js/jquery.dataTables/fixedHeader";

pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = jszip;
export default {
    mounted() {
        this.consultar(1);
        this.hoy = moment();
    },
    filters: {
        moment: function(date) {
            return moment(date).format("YYYY-MM-DD");
        }
    },
    name: "entes",
    data() {
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
            csrf: document
                .querySelector('meta[name="csrf-token"]')
                .getAttribute("content"),
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
        esActivo: function() {
            return this.paginacion.pagina_actual;
        },
        numeroDePaginas: function() {
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
        iniciarTabla() {
            this.tabla();
        },
        consultar: async function(pagina) {
            const parametros = {
                _token: this.csrf,
                page: pagina
            };
            try {
                await usuarioServicios
                    .usuariosLog(parametros)
                    .then(respuesta => {
                        this.usuarios = respuesta.data.usuarios;
                        this.logs = respuesta.data.logs;
                        // this.paginacion = respuesta.data.paginacion;
                        this.iniciarTabla();
                    });
            } catch (error) {
                switch (error.response.status) {
                    case 419:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },
        cambiarPaginas: function(pagina) {
            this.paginacion.pagina_actual = pagina;
            this.buscar(pagina);
        },
        buscar: async function(pagina) {
            this.logs = [];
            const parametros = {
                _token: this.csrf,
                id_usuario: this.datos.usuarios,
                modulos: this.datos.modulos,
                fecha: this.datos.fecha,
                page: pagina
            };
            try {
                await usuarioServicios
                    .usuariosLogBuscar(parametros)
                    .then(respuesta => {
                        $.fn.DataTable = datatable;
                        this.tabladatos.fnClearTable();
                        this.tabladatos.fnDestroy();            
                        // $('#tablaDatos tbody').empty();                        
                        
                        this.logs = respuesta.data.logs;
                        // this.tabladatos.fnAddData(this.logs);
                        this.iniciarTabla();                                      
                        
                    });
            } catch (error) {
                switch (error.response.status) {
                    case 419:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    case 422:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                    default:
                        this.$swal("Error...!", "Ocurrio un error!", "error");
                        break;
                }
            }
        },
        tabla() {
            this.$nextTick(() => {
                $.fn.DataTable = datatable;
                this.tabladatos = $("#tablaDatos").DataTable({
                    orderCellsTop: true,
                    language: {
                        processing: "Procesando...",
                        lengthMenu: "Mostrar _MENU_ registros",
                        zeroRecords: "No se encontraron resultados",
                        emptyTable: "Ningún dato disponible en esta tabla",
                        infoEmpty:
                            "Mostrando registros del 0 al 0 de un total de 0 registros",
                        infoFiltered:
                            "(filtrado de un total de _MAX_ registros)",
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
                            sortAscending:
                                ": Activar para ordenar la columna de manera ascendente",
                            sortDescending:
                                ": Activar para ordenar la columna de manera descendente"
                        },
                        buttons: {
                            copy: "Copiar",
                            colvis: "Visibilidad",
                            collection: "Colección",
                            colvisRestore: "Restaurar visibilidad",
                            copyKeys:
                                "Presione ctrl o u2318 + C para copiar los datos de la tabla al portapapeles del sistema. <br \/> <br \/> Para cancelar, haga clic en este mensaje o presione escape.",
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
                            weekdays: [
                                "Dom",
                                "Lun",
                                "Mar",
                                "Mie",
                                "Jue",
                                "Vie",
                                "Sab"
                            ]
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
                                    _:
                                        "¿Está seguro que desea eliminar %d filas?",
                                    "1":
                                        "¿Está seguro que desea eliminar 1 fila?"
                                }
                            },
                            error: {
                                system:
                                    'Ha ocurrido un error en el sistema (<a target="\\" rel="\\ nofollow" href="\\">Más información&lt;\\\/a&gt;).<\/a>'
                            },
                            multi: {
                                title: "Múltiples Valores",
                                info:
                                    "Los elementos seleccionados contienen diferentes valores para este registro. Para editar y establecer todos los elementos de este registro con el mismo valor, hacer click o tap aquí, de lo contrario conservarán sus valores individuales.",
                                restore: "Deshacer Cambios",
                                noMulti:
                                    "Este registro puede ser editado individualmente, pero no como parte de un grupo."
                            }
                        },
                        info: "Mostrando _START_ a _END_ de _TOTAL_ registros"
                    },
                    dom:
                        "B<'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>" +
                        "<'row'<'col-sm-12'tr>>" +
                        "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                    buttons: {
                        dom: {
                            buttons: {
                                className: "btn"
                            }
                        },
                        buttons: [
                            {
                                extend: "copyHtml5",
                                text: "<i class='fa fa-file-alt'></i>",
                                titleAttr: "Copiar",
                                className:
                                    "btn btn-outline-brand btn-icon btn-lg",
                                messageTop: "Listado de Logs",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                },
                            },
                            {
                                extend: "excelHtml5",
                                text: "<i class='fa fa-file-excel'></i>",
                                titleAttr: "Exportar a Excel",
                                className:
                                    "btn btn-outline-success btn-icon btn-lg",
                                excelStyles: {
                                    template: "header_blue"
                                },
                                messageTop: "Listado de Logs",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                }
                            },
                            {
                                extend: "pdfHtml5",
                                text: "<i class='fa fa-file-pdf'></i>",
                                titleAttr: "Exportar a PDF",
                                className:
                                    "btn btn-outline-danger btn-icon btn-lg",
                                messageTop: "Listado de Logs",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                },
                                customize: function(doc) {
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
                            },
                            {
                                extend: "csvHtml5",
                                text: "<i class='fa fa-file-csv'></i>",
                                titleAttr: "Exportar a csv",
                                className:
                                    "btn btn-outline-info btn-icon btn-lg",
                                messageTop: "Listado de Logs",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                }
                            },
                            {
                                extend: "print",
                                text: "<i class='fa fa-print'></i>",
                                titleAttr: "Imprimir Archivo",
                                className:
                                    "btn btn-outline-dark btn-icon btn-lg",
                                messageTop: "Listado de Logs",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5]
                                }
                            }
                        ]
                    }
                });
                $('.dataTables_filter input').attr("placeholder", "Busqueda...");
                $('.dataTables_filter label').addClass("form-control");
                $('.dataTables_filter label').css("outline","none");
                $('.dataTables_filter label').css("border","0");
                $('.dataTables_filter label').css("padding-bottom","35px");     
                $(".dataTables_filter label input").css("margin-left", "0px");           
            });
        }
    }
};
</script>
