<template>
    <div>
        <div class="kt-portlet" style="margin-top: -4%;">
            <div class="kt-portlet__head">
                <div class="kt-portlet__head-label">
                    <h3 class="kt-portlet__head-title">
                        <span class="kt-widget20__number kt-font-danger"
                            >GESTIÓN DE USUARIOS</span
                        >
                    </h3>
                </div>
            </div>
            <div class="kt-portlet__body">
                <div class="kt-section">
                    <div class="kt-section__content">
                        <div class="row">
                            <div class="col-md-6 col-lg-6">
                                <div class="kt-section">
                                    <div class="kt-section__content">
                                        <a
                                            href="javascript:;"
                                            class="btn btn-outline-primary btn-icon"
                                            data-skin="dark"
                                            data-toggle="kt-tooltip"
                                            data-placement="top"
                                            title="Nuevo Usuario"
                                            @click="abrirModal"
                                        >
                                            <i
                                                class="la la-file-text-o"
                                            ></i> </a
                                        >&nbsp;
                                    </div>
                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-lg-6">
                                <form class="kt-form">
                                    <div class="form-group">
                                        <div class="input-group">
                                            <input
                                                type="text"
                                                class="form-control"
                                                placeholder="Busqueda"
                                                v-model="txtbusqueda"
                                            />
                                            <div class="input-group-append">
                                                <button
                                                    type="button"
                                                    class="btn btn-primary btn-icon"
                                                    @click.prevent="
                                                        consultar(1)
                                                    "
                                                >
                                                    <i class="fa fa-search"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div> -->
                        </div>
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
                                                    Identificación
                                                </th>
                                                <th class="text-white">
                                                    Nombre
                                                </th>
                                                <th class="text-white">
                                                    Usuario
                                                </th>
                                                <th class="text-white">
                                                    Email
                                                </th>
                                                <th class="text-white">
                                                    Celular
                                                </th>
                                                <th class="text-white">Rol</th>
                                                <td
                                                    class="text-center text-white"
                                                >
                                                    Estado
                                                </td>
                                                <td
                                                    class="text-center text-white"
                                                >
                                                    Opciones
                                                </td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr
                                                v-for="(item,
                                                index) in usuarios"
                                                :key="index"
                                            >
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;color: #212529;"
                                                >
                                                    {{ index + 1 }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;color: #212529;"
                                                >
                                                    {{ item.identificacion }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;text-transform:capitalize;color: #212529;"
                                                >
                                                    {{ item.nombre }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;color: #212529;"
                                                >
                                                    {{ item.usuario }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;color: #212529;"
                                                >
                                                    {{
                                                        item.email == ""
                                                            ? "-"
                                                            : item.email
                                                    }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;color: #212529;"
                                                >
                                                    {{
                                                        item.celular == ""
                                                            ? "-"
                                                            : item.celular
                                                    }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: left;color: #212529;"
                                                >
                                                    {{ item.permi.rol }}
                                                </td>
                                                <td
                                                    style="font-weight: normal;vertical-align: middle;text-align: center;color: #212529;"
                                                >
                                                    <span
                                                        class="kt-badge kt-badge--inline"
                                                        :class="
                                                            item.permi.estado ==
                                                            'Activo'
                                                                ? 'kt-badge--success'
                                                                : 'kt-badge--danger'
                                                        "
                                                        >{{
                                                            item.permi.estado
                                                        }}</span
                                                    >
                                                </td>
                                                <td
                                                    style="text-align:center;vertical-align: middle;text-align: center;color: #212529;"
                                                >
                                                    <button
                                                        type="button"
                                                        class="btn btn-outline-info btn-icon btn-sm"
                                                        title="Editar"
                                                        @click="editar(item)"
                                                    >
                                                        <i
                                                            class="fa fa-edit"
                                                        ></i>
                                                    </button>
                                                    <button
                                                        class="btn btn-icon btn-sm"
                                                        :class="
                                                            item.permi.estado ==
                                                            'Activo'
                                                                ? 'btn-outline-danger'
                                                                : 'btn-outline-success'
                                                        "
                                                        type="button"
                                                        :title="
                                                            item.permi.estado ==
                                                            'Activo'
                                                                ? 'Anular'
                                                                : 'Activar'
                                                        "
                                                        @click="eliminar(item)"
                                                    >
                                                        <i
                                                            class="fa"
                                                            :class="
                                                                item.permi
                                                                    .estado ==
                                                                'Activo'
                                                                    ? 'fa-trash'
                                                                    : 'fa-check'
                                                            "
                                                        ></i>
                                                    </button>
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
            <!--begin::Modal-->
            <b-modal
                ref="modalUsuario"
                hide-footer
                title="Gestion de Usuarios"
                size="lg"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
            >
                <div class="d-block">
                    <div class="row">
                        <div class="col-lg-12">
                            <transition :duration="1000" name="fade">
                                <div
                                    class="alert alert-warning fade show"
                                    role="alert"
                                    v-if="entrarPorError"
                                >
                                    <div class="alert-icon">
                                        <i class="flaticon-warning"></i>
                                    </div>
                                    <div class="alert-text">
                                        Por favor, corrija el(los) siguiente(s)
                                        error(es):
                                        <hr />
                                        <ul>
                                            <li
                                                v-for="(error,
                                                index) in errorDevuelto"
                                                :key="index"
                                            >
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="alert-close">
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">
                                                <i class="la la-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <transition :duration="1000" name="fade">
                                <div
                                    class="alert alert-warning fade show"
                                    role="alert"
                                    v-if="errores.length"
                                >
                                    <div class="alert-icon">
                                        <i class="flaticon-warning"></i>
                                    </div>
                                    <div class="alert-text">
                                        Por favor, corrija el(los) siguiente(s)
                                        error(es):
                                        <hr />
                                        <ul>
                                            <li
                                                v-for="(error,
                                                index) in errores"
                                                :key="index"
                                            >
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="alert-close">
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">
                                                <i class="la la-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                    <ul
                        class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success"
                        role="tablist"
                    >
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                data-toggle="tab"
                                href="#tabDP"
                                role="tab"
                                >Datos Personales</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                data-toggle="tab"
                                href="#tabP"
                                role="tab"
                                >Permisos</a
                            >
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabDP" role="tabpanel">
                            <form enctype="multipart/form-data">
                                <div class="form-group row justify-content-center">
                                    <!-- <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label> -->
                                    <div class="col-lg-12 col-xl-12" style="text-align: center;">
                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
                                            <div class="kt-avatar__holder" :style="imagen"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" @change="obtenerImagen">
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>                                
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label>Identificación:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Identificación"
                                            v-model="
                                                usuariosData.identificacion
                                            "
                                            :class="identiClases"
                                            @change="BuscarUsuario"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="identiError"
                                        >
                                            {{ identiError }}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Nombre:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Nombre"
                                            v-model="usuariosData.nombre"
                                            style="text-transform:capitalize;"
                                            :class="nameClases"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="nameError"
                                        >
                                            {{ nameError }}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <label>Email:</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            placeholder="Email"
                                            v-model="usuariosData.email"
                                            :class="emailClases"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="emailError"
                                        >
                                            {{ emailError }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Rol:</label>
                                        <b-form-select
                                            v-model="permisos.rol"
                                            :class="rolClases"
                                            @change="cambiarRol('Crear')"
                                        >
                                            <option value selected
                                                >Seleccione</option
                                            >
                                            <option
                                                v-for="item in roles"
                                                :value="item.value"
                                                :key="item.value"
                                                >{{ item.texto }}</option
                                            >
                                        </b-form-select>
                                        <div
                                            class="invalid-feedback"
                                            v-if="rolError"
                                        >
                                            {{ rolError }}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Celular:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Celular"
                                            v-model="usuariosData.celular"
                                            :class="celClases"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="celError"
                                        >
                                            {{ celError }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label>Dirección:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Dirección"
                                            v-model="usuariosData.direccion"
                                            :class="dirClases"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Usuario:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Usuario"
                                            v-model="usuariosData.usuario"
                                            :class="usuClases"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="usuError"
                                        >
                                            {{ usuError }}
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4"
                                        v-show="usuariosData.id == 0"
                                    >
                                        <label>Contraseña:</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            placeholder="Contraseña"
                                            v-model="usuariosData.password"
                                            :class="pasClases"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="pasError"
                                        >
                                            {{ pasError }}
                                        </div>
                                    </div>
                                    <div
                                        class="col-lg-4"
                                        v-show="usuariosData.id == 0"
                                    >
                                        <label>Repita Contraseña:</label>
                                        <input
                                            type="password"
                                            class="form-control"
                                            placeholder="Repita Contraseña"
                                            v-model="usuariosData.confPassword"
                                            :class="conClases"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="conError"
                                        >
                                            {{ conError }}
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </form>
                        </div>
                        <div class="tab-pane" id="tabP" role="tabpanel">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="kt-section">
                                        <div
                                            class="kt-section__content kt-section__content--solid"
                                        >
                                            <div class="kt-widget4">
                                                <div class="kt-widget4__item">
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--warning kt-badge--lg"
                                                            >T</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Todos
                                                    </a>
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--brand kt-badge--lg"
                                                            >S</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Sin Permisos
                                                    </a>
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--danger kt-badge--lg"
                                                            >E</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Editar
                                                    </a>
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--primary kt-badge--lg"
                                                            >C</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Crear
                                                    </a>
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--success kt-badge--lg"
                                                            >L</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Lectura
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="kt-form">
                                <div class="kt-section kt-section--first">
                                    <h3 class="kt-section__title">
                                        1. Parametros:
                                    </h3>
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Barrios:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.barrios"
                                                    :class="
                                                        permisos.barrios == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Usuarios:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.usuarios"
                                                    :class="
                                                        permisos.usuarios == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Corregimientos:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.corregimientos
                                                    "
                                                    :class="
                                                        permisos.corregimientos ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Etnias:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.etnias"
                                                    :class="
                                                        permisos.etnias == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Ocupaciones:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.ocupaciones
                                                    "
                                                    :class="
                                                        permisos.ocupaciones ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Parentescos:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.parentescos
                                                    "
                                                    :class="
                                                        permisos.parentescos ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Estado Civil:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.estado_civil
                                                    "
                                                    :class="
                                                        permisos.estado_civil ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Escolaridad:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.escolaridad
                                                    "
                                                    :class="
                                                        permisos.escolaridad ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Veredas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.veredas"
                                                    :class="
                                                        permisos.veredas == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Mor. en Gestación:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.morbilidad_ges
                                                    "
                                                    :class="
                                                        permisos.morbilidad_ges ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Mor. al Nacer:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.morbilidad_nac
                                                    "
                                                    :class="
                                                        permisos.morbilidad_nac ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Met. Planificación:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.metodos"
                                                    :class="
                                                        permisos.metodos == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Mot. no Planificación:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.motivos"
                                                    :class="
                                                        permisos.motivos == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Grupos de Ayuda:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.grupos"
                                                    :class="
                                                        permisos.grupos == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Enf. Cronicas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.enfermedades_cro
                                                    "
                                                    :class="
                                                        permisos.enfermedades_cro ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Enf. Infecciosas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.enfermedades_inf
                                                    "
                                                    :class="
                                                        permisos.enfermedades_inf ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Religión:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.religion"
                                                    :class="
                                                        permisos.religion == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Colegios:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.colegios"
                                                    :class="
                                                        permisos.colegios == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Act. Economicas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.actividades_economicas
                                                    "
                                                    :class="
                                                        permisos.actividades_economicas ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="kt-section__title">
                                        2. Caracterización:
                                    </h3>
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Gestión:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.gestion"
                                                    :class="
                                                        permisos.gestion == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Cons. Integrantes:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.consulta_integrante
                                                    "
                                                    :class="
                                                        permisos.consulta_integrante ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Cons. Viviendas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.consulta_vivienda
                                                    "
                                                    :class="
                                                        permisos.consulta_vivienda ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>
                                        <h3 class="kt-section__title">
                                            3. Informes:
                                        </h3>
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Ind. Gestantes:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.indicadores_gestantes
                                                    "
                                                    :class="
                                                        permisos.indicadores_gestantes ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Ind. SPA:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        permisos.indicadores_spa
                                                    "
                                                    :class="
                                                        permisos.indicadores_spa ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Dashboard:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="permisos.dashboard"
                                                    :class="
                                                        permisos.dashboard == ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-right">
                            <button
                                type="button"
                                class="btn btn-success"
                                @click="guardarUsuario"
                            >
                                <i class="fa fa-edit"></i> Guardar
                            </button>
                            <button
                                type="button"
                                class="btn btn-warning"
                                @click="cerrarModal"
                            >
                                <i class="fa fa-window-close"></i> Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </b-modal>

            <b-modal
                ref="modalUsuarioEditar"
                hide-footer
                title="Gestion de Usuarios"
                size="lg"
                centered
                header-bg-variant="danger"
                header-text-variant="light"
                :no-close-on-backdrop="true"
            >
                <div class="d-block">
                    <div class="row">
                        <div class="col-lg-12">
                            <transition :duration="1000" name="fade">
                                <div
                                    class="alert alert-warning fade show"
                                    role="alert"
                                    v-if="entrarPorError"
                                >
                                    <div class="alert-icon">
                                        <i class="flaticon-warning"></i>
                                    </div>
                                    <div class="alert-text">
                                        Por favor, corrija el(los) siguiente(s)
                                        error(es):
                                        <hr />
                                        <ul>
                                            <li
                                                v-for="(error,
                                                index) in errorDevuelto"
                                                :key="index"
                                            >
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="alert-close">
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">
                                                <i class="la la-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <transition :duration="1000" name="fade">
                                <div
                                    class="alert alert-warning fade show"
                                    role="alert"
                                    v-if="errores.length"
                                >
                                    <div class="alert-icon">
                                        <i class="flaticon-warning"></i>
                                    </div>
                                    <div class="alert-text">
                                        Por favor, corrija el(los) siguiente(s)
                                        error(es):
                                        <hr />
                                        <ul>
                                            <li
                                                v-for="(error,
                                                index) in errores"
                                                :key="index"
                                            >
                                                {{ error }}
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="alert-close">
                                        <button
                                            type="button"
                                            class="close"
                                            data-dismiss="alert"
                                            aria-label="Close"
                                        >
                                            <span aria-hidden="true">
                                                <i class="la la-close"></i>
                                            </span>
                                        </button>
                                    </div>
                                </div>
                            </transition>
                        </div>
                    </div>
                    <ul
                        class="nav nav-tabs nav-tabs-line nav-tabs-bold nav-tabs-line-3x nav-tabs-line-success"
                        role="tablist"
                    >
                        <li class="nav-item">
                            <a
                                class="nav-link active"
                                data-toggle="tab"
                                href="#tabDP1"
                                role="tab"
                                >Datos Personales</a
                            >
                        </li>
                        <li class="nav-item">
                            <a
                                class="nav-link"
                                data-toggle="tab"
                                href="#tabP1"
                                role="tab"
                                >Permisos</a
                            >
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div
                            class="tab-pane active"
                            id="tabDP1"
                            role="tabpanel"
                        >
                            <form enctype="multipart/form-data">
                                <div class="form-group row justify-content-center">
                                    <!-- <label class="col-xl-3 col-lg-3 col-form-label">Avatar</label> -->
                                    <div class="col-lg-12 col-xl-12" style="text-align: center;">
                                        <div class="kt-avatar kt-avatar--outline kt-avatar--circle-" id="kt_apps_user_add_avatar">
                                            <div class="kt-avatar__holder" :style="imagen1"></div>
                                            <label class="kt-avatar__upload" data-toggle="kt-tooltip" title="" data-original-title="Change avatar">
                                                <i class="fa fa-pen"></i>
                                                <input type="file" name="profile_avatar" accept=".png, .jpg, .jpeg" @change="obtenerImagen1">
                                            </label>
                                            <span class="kt-avatar__cancel" data-toggle="kt-tooltip" title="" data-original-title="Cancel avatar">
                                                <i class="fa fa-times"></i>
                                            </span>
                                        </div>
                                    </div>
                                </div>                            
                                <div class="form-group row">
                                    <div class="col-lg-3">
                                        <label>Identificación:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Identificación"
                                            v-model="
                                                editarUsuariosData.identificacion
                                            "
                                            :class="identiClases2"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="identiError2"
                                        >
                                            {{ identiError2 }}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Nombre:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Nombre"
                                            v-model="editarUsuariosData.nombre"
                                            style="text-transform:capitalize;"
                                            :class="nameClases2"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="nameError2"
                                        >
                                            {{ nameError2 }}
                                        </div>
                                    </div>
                                    <div class="col-lg-5">
                                        <label>Email:</label>
                                        <input
                                            type="email"
                                            class="form-control"
                                            placeholder="Email"
                                            v-model="editarUsuariosData.email"
                                            :class="emailClases2"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="emailError2"
                                        >
                                            {{ emailError2 }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Rol:</label>
                                        <b-form-select
                                            class
                                            v-model="editarpermisos.rol"
                                            :class="rolClases2"
                                        >
                                            <option value selected
                                                >Seleccione</option
                                            >
                                            <option
                                                v-for="item in roles"
                                                :value="item.value"
                                                :key="item.value"
                                                >{{ item.texto }}</option
                                            >
                                        </b-form-select>
                                        <div
                                            class="invalid-feedback"
                                            v-if="rolError2"
                                        >
                                            {{ rolError2 }}
                                        </div>
                                    </div>
                                    <div class="col-lg-4">
                                        <label>Celular:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Celular"
                                            v-model="editarUsuariosData.celular"
                                            :class="celClases2"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="celError2"
                                        >
                                            {{ celError2 }}
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-12">
                                        <label>Dirección:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Dirección"
                                            v-model="
                                                editarUsuariosData.direccion
                                            "
                                            :class="dirClases2"
                                        />
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4">
                                        <label>Usuario:</label>
                                        <input
                                            type="text"
                                            class="form-control"
                                            placeholder="Usuario"
                                            v-model="editarUsuariosData.usuario"
                                            :class="usuClases2"
                                        />
                                        <div
                                            class="invalid-feedback"
                                            v-if="usuError2"
                                        >
                                            {{ usuError2 }}
                                        </div>
                                    </div>
                                </div>
                                <hr />
                            </form>
                        </div>
                        <div class="tab-pane" id="tabP1" role="tabpanel">
                            <div class="form-group row">
                                <div class="col-lg-12">
                                    <div class="kt-section">
                                        <div
                                            class="kt-section__content kt-section__content--solid"
                                        >
                                            <div class="kt-widget4">
                                                <div class="kt-widget4__item">
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--warning kt-badge--lg"
                                                            >T</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Todos
                                                    </a>
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--brand kt-badge--lg"
                                                            >S</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Sin Permisos
                                                    </a>
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--danger kt-badge--lg"
                                                            >E</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Editar
                                                    </a>
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--primary kt-badge--lg"
                                                            >C</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Crear
                                                    </a>
                                                    <div
                                                        class="kt-widget4__pic kt-widget4__pic--icon"
                                                    >
                                                        <span
                                                            class="kt-badge kt-badge--success kt-badge--lg"
                                                            >L</span
                                                        >
                                                    </div>
                                                    <a
                                                        href="#"
                                                        class="kt-widget4__title"
                                                    >
                                                        Lectura
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <form class="kt-form">
                                <div class="kt-section kt-section--first">
                                    <h3 class="kt-section__title">
                                        1. Parametros:
                                    </h3>
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Barrios:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.barrios
                                                    "
                                                    :class="
                                                        editarpermisos.barrios ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Usuarios:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.usuarios
                                                    "
                                                    :class="
                                                        editarpermisos.usuarios ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Corregimientos:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.corregimientos
                                                    "
                                                    :class="
                                                        editarpermisos.corregimientos ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Etnias:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.etnias
                                                    "
                                                    :class="
                                                        editarpermisos.etnias ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Ocupaciones:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.ocupaciones
                                                    "
                                                    :class="
                                                        editarpermisos.ocupaciones ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Parentescos:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.parentescos
                                                    "
                                                    :class="
                                                        editarpermisos.parentescos ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Estado Civil:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.estado_civil
                                                    "
                                                    :class="
                                                        editarpermisos.estado_civil ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Escolaridad:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.escolaridad
                                                    "
                                                    :class="
                                                        editarpermisos.escolaridad ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Veredas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.veredas
                                                    "
                                                    :class="
                                                        editarpermisos.veredas ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Mor. en Gestación:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.morbilidad_ges
                                                    "
                                                    :class="
                                                        editarpermisos.morbilidad_ges ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Mor. al Nacer:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.morbilidad_nac
                                                    "
                                                    :class="
                                                        editarpermisos.morbilidad_nac ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Met. Planificación:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.metodos
                                                    "
                                                    :class="
                                                        editarpermisos.metodos ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Mot. no Planificación:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.motivos
                                                    "
                                                    :class="
                                                        editarpermisos.motivos ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Grupos de Ayuda:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.grupos
                                                    "
                                                    :class="
                                                        editarpermisos.grupos ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Enf. Cronicas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.enfermedades_cro
                                                    "
                                                    :class="
                                                        editarpermisos.enfermedades_cro ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Enf. Infecciosas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.enfermedades_inf
                                                    "
                                                    :class="
                                                        editarpermisos.enfermedades_inf ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Religión:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.religion
                                                    "
                                                    :class="
                                                        editarpermisos.religion ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Colegios:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.colegios
                                                    "
                                                    :class="
                                                        editarpermisos.colegios ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Act. Economicas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.actividades_economicas
                                                    "
                                                    :class="
                                                        editarpermisos.actividades_economicas ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>
                                    </div>
                                    <h3 class="kt-section__title">
                                        2. Caracterización:
                                    </h3>
                                    <div class="kt-section__body">
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Gestión:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.gestion
                                                    "
                                                    :class="
                                                        editarpermisos.gestion ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Cons. Integrantes:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.consulta_integrante
                                                    "
                                                    :class="
                                                        editarpermisos.consulta_integrante ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Cons. Viviendas:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.consulta_vivienda
                                                    "
                                                    :class="
                                                        editarpermisos.consulta_vivienda ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>
                                        <h3 class="kt-section__title">
                                            3. Informes:
                                        </h3>
                                        <div class="form-group row">
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Ind. Gestantes:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.indicadores_gestantes
                                                    "
                                                    :class="
                                                        editarpermisos.indicadores_gestantes ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Ind. SPA:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.indicadores_spa
                                                    "
                                                    :class="
                                                        editarpermisos.indicadores_spa ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                            <label
                                                class="col-lg-1 col-form-label"
                                                >Dashboard:</label
                                            >
                                            <div class="col-lg-1">
                                                <b-form-select
                                                    v-model="
                                                        editarpermisos.dashboard
                                                    "
                                                    :class="
                                                        editarpermisos.dashboard ==
                                                        ''
                                                            ? 'is-invalid'
                                                            : 'is-valid'
                                                    "
                                                >
                                                    <option value selected
                                                        >Sel</option
                                                    >
                                                    <option value="L">L</option>
                                                    <option value="C">C</option>
                                                    <option value="E">E</option>
                                                    <option value="S">S</option>
                                                    <option value="T">T</option>
                                                </b-form-select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div class="text-right">
                            <button
                                type="button"
                                class="btn btn-success"
                                @click="editarUsuario"
                            >
                                <i class="fa fa-edit"></i> Guardar
                            </button>
                            <button
                                type="button"
                                class="btn btn-warning"
                                @click="cerrarModal2"
                            >
                                <i class="fa fa-window-close"></i> Cancelar
                            </button>
                        </div>
                    </div>
                </div>
            </b-modal>
            <!--end::Modal-->
        </div>
    </div>
</template>

<script>
"use strict";
import * as usuarioServicios from "../../Servicios/usuarios_servicios";
import store from "../../store";

import datatable from "datatables.net-bs4";
require("datatables.net-buttons/js/dataTables.buttons");
require("datatables.net-buttons/js/buttons.html5");
import print from "datatables.net-buttons/js/buttons.print";
import jszip from "jszip/dist/jszip";
import pdfMake from "pdfmake/build/pdfmake";
import pdfFonts from "pdfmake/build/vfs_fonts";
pdfMake.vfs = pdfFonts.pdfMake.vfs;
window.JSZip = jszip;
export default {
    mounted() {
        this.consultar(1);
    },
    name: "usuari",
    data() {
        return {
            errores: [],
            usuarios: [],
            errorDevuelto: [],
            entrarPorError: false,
            txtbusqueda: "",
            opciones: ["Administrador", "Promotor", "Usuario"],
            roles: [
                {
                    texto: "Administrador",
                    value: "Administrador"
                },
                {
                    texto: "Coordinador",
                    value: "Coordinador"
                },
                {
                    texto: "Promotor",
                    value: "Promotor"
                },
                {
                    texto: "General",
                    value: "General"
                }
            ],
            imagenMiniatura: null,
            imagenMiniatura1: null,
            usuariosData: {
                id: 0,
                identificacion: "",
                nombre: "",
                email: "",
                password: "",
                confPassword: "",
                rol: "usuario",
                usuario: "",
                estado: "",
                celular: "",
                direccion: "",
                id_compania: 0,
                imagen: null
            },
            editarUsuariosData: {
                identificacion: "",
                nombre: "",
                email: "",
                password: "",
                confPassword: "",
                rol: "usuario",
                usuario: "",
                estado: "",
                celular: "",
                direccion: "",
                id_compania: 0,
                id: 0,
                imagen: null
            },
            permisos: {
                usuarios: "",
                barrios: "",
                corregimientos: "",
                etnias: "",
                ocupaciones: "",
                parentescos: "",
                estado_civil: "",
                escolaridad: "",
                veredas: "",
                morbilidad_ges: "",
                morbilidad_nac: "",
                metodos: "",
                motivos: "",
                grupos: "",
                enfermedades_cro: "",
                enfermedades_inf: "",
                religion: "",
                colegios: "",
                actividades_economicas: "",

                gestion: "",
                consulta_integrante: "",
                consulta_vivienda: "",

                indicadores_gestantes: "",
                indicadores_spa: "",
                dashboard: "",
                rol: "",

                id: 0
            },
            editarpermisos: {
                usuarios: "",
                barrios: "",
                corregimientos: "",
                etnias: "",
                ocupaciones: "",
                parentescos: "",
                estado_civil: "",
                escolaridad: "",
                veredas: "",
                morbilidad_ges: "",
                morbilidad_nac: "",
                metodos: "",
                motivos: "",
                grupos: "",
                enfermedades_cro: "",
                enfermedades_inf: "",
                religion: "",
                colegios: "",
                actividades_economicas: "",

                gestion: "",
                consulta_integrante: "",
                consulta_vivienda: "",

                indicadores_gestantes: "",
                indicadores_spa: "",
                dashboard: "",
                rol: ""
            },
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
            alias: ""
        };
    },
    computed: {
        imagen(){
            return "background-image: url('" + this.imagenMiniatura + "')";
        },
        imagen1(){            
            return "background-image: url('" + this.imagenMiniatura1 + "')";
        },
        // CLASES Y ERRORES DE CAMPO IDENTIFICACION
        identiError() {
            var valor = this.usuariosData.identificacion.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (valor.length < 6) {
                return "Por favor escriba una identificación mayor a 6 caracteres";
            }
        },
        identiClases() {
            return [
                {
                    "is-invalid": this.identiError,
                    "is-valid": !this.identiError
                }
            ];
        },
        identiError2() {
            var valor = this.editarUsuariosData.identificacion.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (valor.length < 6) {
                return "Por favor escriba una identificación mayor a 6 caracteres";
            }
        },
        identiClases2() {
            return [
                {
                    "is-invalid": this.identiError2,
                    "is-valid": !this.identiError2
                }
            ];
        },
        // CLASES Y ERRORES DE CAMPO IDENTIFICACION
        // CLASES Y ERRORES DE CAMPO NOMBRE
        nameError() {
            var valor = this.usuariosData.nombre.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (valor.length < 5) {
                return "Por favor escribe un nombre mayor a 5 caracteres";
            }
        },
        nameClases() {
            return [
                {
                    "is-invalid": this.nameError,
                    "is-valid": !this.nameError
                }
            ];
        },
        nameError2() {
            var valor = this.editarUsuariosData.nombre.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (valor.length < 5) {
                return "Por favor escribe un nombre mayor a 5 caracteres";
            }
        },
        nameClases2() {
            return [
                {
                    "is-invalid": this.nameError2,
                    "is-valid": !this.nameError2
                }
            ];
        },
        // CLASES Y ERRORES DE CAMPO NOMBRE
        // CLASES Y ERRORES DE CAMPO EMAIL
        emailError() {
            var valor = this.usuariosData.email.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (!this.validEmail(valor)) {
                return "El correo electrónico debe ser válido.";
            }
        },
        emailClases() {
            return [
                {
                    "is-invalid": this.emailError,
                    "is-valid": !this.emailError
                }
            ];
        },
        emailError2() {
            var valor = this.editarUsuariosData.email.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (!this.validEmail(valor)) {
                return "El correo electrónico debe ser válido.";
            }
        },
        emailClases2() {
            return [
                {
                    "is-invalid": this.emailError2,
                    "is-valid": !this.emailError2
                }
            ];
        },
        // CLASES Y ERRORES DE CAMPO EMAIL
        // CLASES Y ERRORES DE CAMPO ROL
        rolError() {
            var valor = this.permisos.rol;
            if (valor == "") {
                return "El campo es obligatorio";
            }
            // return false;
        },
        rolClases() {
            return [
                {
                    "is-invalid": this.rolError,
                    "is-valid": !this.rolError
                }
            ];
        },
        rolError2() {
            var valor = this.editarpermisos.rol;
            if (valor == "") {
                return "El campo es obligatorio";
            }
            // return false;
        },
        rolClases2() {
            return [
                {
                    "is-invalid": this.rolError2,
                    "is-valid": !this.rolError2
                }
            ];
        },
        // CLASES Y ERRORES DE CAMPO ROL
        // CLASES Y ERRORES DE CAMPO CELULAR
        celError() {
            var valor = this.usuariosData.celular;
            if (valor == "") {
                return "El campo es obligatorio";
            }
            // return false;
        },
        celClases() {
            return [
                {
                    "is-invalid": this.celError,
                    "is-valid": !this.celError
                }
            ];
        },
        celError2() {
            var valor = this.editarUsuariosData.celular;
            if (valor == "") {
                return "El campo es obligatorio";
            }
            // return false;
        },
        celClases2() {
            return [
                {
                    "is-invalid": this.celError2,
                    "is-valid": !this.celError2
                }
            ];
        },
        // CLASES Y ERRORES DE CAMPO CELULAR
        // CLASES Y ERRORES DE CAMPO DIRECCION
        dirError() {
            var valor = this.usuariosData.direccion;
            if (valor == "") {
                return true;
            }
            // return false;
        },
        dirClases() {
            return [
                {
                    "": this.dirError,
                    "is-valid": !this.dirError
                }
            ];
        },
        dirError2() {
            var valor = this.editarUsuariosData.direccion;
            if (valor == "") {
                return true;
            }
            // return false;
        },
        dirClases2() {
            return [
                {
                    "": this.dirError2,
                    "is-valid": !this.dirError2
                }
            ];
        },
        // CLASES Y ERRORES DE CAMPO DIRECCION
        // CLASES Y ERRORES DE CAMPO USUARIO
        usuError() {
            var valor = this.usuariosData.usuario.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (valor.length < 5) {
                return "Por favor escriba un usuario mayor a 5 caracteres";
            }
        },
        usuClases() {
            return [
                {
                    "is-invalid": this.usuError,
                    "is-valid": !this.usuError
                }
            ];
        },
        usuError2() {
            var valor = this.editarUsuariosData.usuario.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (valor.length < 5) {
                return "Por favor escriba un usuario mayor a 5 caracteres";
            }
        },
        usuClases2() {
            return [
                {
                    "is-invalid": this.usuError2,
                    "is-valid": !this.usuError2
                }
            ];
        },
        // CLASES Y ERRORES DE CAMPO USUARIO
        // CLASES Y ERRORES DE CAMPO PASSWORD
        pasError() {
            var valor = this.usuariosData.password.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (valor.length < 5) {
                return "Por favor escriba una Contraseña mayor a 5 caracteres";
            }
        },
        pasClases() {
            return [
                {
                    "is-invalid": this.pasError,
                    "is-valid": !this.pasError
                }
            ];
        },
        // CLASES Y ERRORES DE CAMPO PASSWORD
        // CLASES Y ERRORES DE CAMPO CONFPASSWORD
        conError() {
            var valor = this.usuariosData.confPassword.trim();
            if (valor == "") {
                return "El campo es obligatorio";
            }
            if (valor != this.usuariosData.password) {
                return "Las contraseñas no coinciden";
            }
        },
        conClases() {
            return [
                {
                    "is-invalid": this.conError,
                    "is-valid": !this.conError
                }
            ];
        },
        // CLASES Y ERRORES DE CAMPO CONFPASSWORD
        filtrarUsuarios() {
            return this.usuarios.filter(
                item =>
                    item.nombre
                        .toLowerCase()
                        .includes(this.txtbusqueda.toLowerCase()) +
                    item.rol
                        .toLowerCase()
                        .includes(this.txtbusqueda.toLowerCase()) +
                    item.email
                        .toLowerCase()
                        .includes(this.txtbusqueda.toLowerCase()) +
                    item.usuario
                        .toLowerCase()
                        .includes(this.txtbusqueda.toLowerCase()) +
                    item.identificacion
                        .toLowerCase()
                        .includes(this.txtbusqueda.toLowerCase())
            );
        },
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
        consultar: async function(pagina) {
            this.usuarios = [];
            const parametros = {
                txtbusqueda: this.txtbusqueda.trim(),
                _token: this.csrf,
                page: pagina
            };
            try {
                await usuarioServicios
                    .listarUsuarios(parametros)
                    .then(respuesta => {
                        this.usuarios = respuesta.data.usuarios;
                        this.alias = respuesta.data.alias;
                        this.tabla();
                        // this.paginacion = respuesta.data.paginacion;
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
        abrirModal() {
            this.errores = [];
            this.entrarPorError = false;
            this.$refs.modalUsuario.show();
        },
        cerrarModal() {
            this.limpiar();
            this.$refs.modalUsuario.hide();
        },
        cerrarModal2() {
            this.limpiar2();
            this.$refs.modalUsuarioEditar.hide();
        },
        guardarUsuario: async function() {
            if (!this.checkForm()) {
                this.entrarPorError = false;
            } else {
                this.errores = [];
                const parametros = {
                    _token: this.csrf,
                    id: this.usuariosData.id,
                    identificacion: this.usuariosData.identificacion,
                    nombre: this.usuariosData.nombre,
                    email: this.usuariosData.email,
                    rol: this.permisos.rol,
                    celular: this.usuariosData.celular,
                    direccion: this.usuariosData.direccion,
                    usuario: this.usuariosData.usuario,
                    password: this.usuariosData.password,
                    confPassword: this.usuariosData.confPassword,
                    permisos: this.permisos,
                    ruta: this.usuariosData.imagen
                };
                try {
                    await usuarioServicios
                        .guardarUsuarios(parametros)
                        .then(respuesta => {
                            // if (this.usuariosData.id == 0) {
                            //     this.usuarios.unshift(respuesta.data.usuarios);
                            // } else {
                            //     this.consultar(1);
                            // }
                            this.tabladatos.fnClearTable();
                            this.tabladatos.fnDestroy();
                            this.consultar(1);
                            this.cerrarModal();
                            this.limpiar();
                            this.$swal(
                                "Guardar...!",
                                "Datos Guardados Exitosamente!",
                                "success"
                            );
                        })
                        .catch(error => {
                            this.errorDevuelto = error.response.data.errors;
                            this.entrarPorError = true;
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
        },
        checkForm(e) {
            this.errores = [];
            if (!this.usuariosData.identificacion) {
                this.errores.push("La identificación es obligatoria.");
            }
            if (this.usuariosData.identificacion.length < 6) {
                this.errores.push(
                    "Por favor escriba una identificación mayor a 6 caracteres"
                );
            }
            if (!this.usuariosData.nombre) {
                this.errores.push("El nombre es obligatorio.");
            }
            if (this.usuariosData.nombre.length < 5) {
                this.errores.push(
                    "Por favor escriba un nombre mayor a 5 caracteres"
                );
            }
            if (!this.usuariosData.email) {
                this.errores.push("El correo electrónico es obligatorio.");
            } else if (!this.validEmail(this.usuariosData.email)) {
                this.errores.push("El correo electrónico debe ser válido.");
            }
            if (!this.permisos.rol) {
                this.errores.push("El rol es obligatorio.");
            }
            if (!this.usuariosData.celular) {
                this.errores.push("El celular es obligatorio.");
            }
            if (this.mostrar) {
                if (this.usuariosData.id == 0) {
                    if (!this.usuariosData.usuario) {
                        this.errores.push("El usuario es obligatorio.");
                    }
                    if (this.usuariosData.usuario.length < 5) {
                        this.errores.push(
                            "Por favor escriba un usuario mayor a 5 caracteres."
                        );
                    }
                    if (!this.usuariosData.password) {
                        this.errores.push("La contraseña es obligatoria.");
                    }
                    if (!this.usuariosData.confPassword) {
                        this.errores.push(
                            "Confirmar la contraseña es obligatorio."
                        );
                    }
                    if (
                        this.usuariosData.password !=
                        this.usuariosData.confPassword
                    ) {
                        this.errores.push("Las contraseñas no coinciden.");
                    }
                }
            }

            if (this.permisos.usuarios == "") {
                this.errores.push("El permiso usuarios es obligatorio.");
            }
            if (this.permisos.barrios == "") {
                this.errores.push("El permiso barrios es obligatorio.");
            }
            if (this.permisos.corregimientos == "") {
                this.errores.push("El permiso corregimientos es obligatorio.");
            }
            if (this.permisos.etnias == "") {
                this.errores.push("El permiso etnias es obligatorio.");
            }
            if (this.permisos.ocupaciones == "") {
                this.errores.push("El permiso ocupaciones es obligatorio.");
            }
            if (this.permisos.parentescos == "") {
                this.errores.push("El permiso parentescos es obligatorio.");
            }
            if (this.permisos.estado_civil == "") {
                this.errores.push("El permiso estado civil es obligatorio.");
            }
            if (this.permisos.escolaridad == "") {
                this.errores.push("El permiso escolaridad es obligatorio.");
            }
            if (this.permisos.veredas == "") {
                this.errores.push("El permiso veredas es obligatorio.");
            }
            if (this.permisos.morbilidad_ges == "") {
                this.errores.push(
                    "El permiso morbilidad en gestación es obligatorio."
                );
            }
            if (this.permisos.morbilidad_nac == "") {
                this.errores.push(
                    "El permiso morbilidad al nacer es obligatorio."
                );
            }
            if (this.permisos.metodos == "") {
                this.errores.push(
                    "El permiso metodos de planificación es obligatorio."
                );
            }
            if (this.permisos.motivos == "") {
                this.errores.push(
                    "El permiso motivos para no planificar es obligatorio."
                );
            }
            if (this.permisos.grupos == "") {
                this.errores.push("El permiso grupos de ayuda es obligatorio.");
            }
            if (this.permisos.enfermedades_cro == "") {
                this.errores.push(
                    "El permiso enfermedades cronicas es obligatorio."
                );
            }
            if (this.permisos.enfermedades_inf == "") {
                this.errores.push(
                    "El permiso enfermedades infecciosas es obligatorio."
                );
            }
            if (this.permisos.religion == "") {
                this.errores.push("El permiso religión es obligatorio.");
            }
            if (this.permisos.colegios == "") {
                this.errores.push("El permiso colegios es obligatorio.");
            }
            if (this.permisos.actividades_economicas == "") {
                this.errores.push(
                    "El permiso actividades economicas es obligatorio."
                );
            }
            if (this.permisos.gestion == "") {
                this.errores.push("El permiso gestión es obligatorio.");
            }
            if (this.permisos.consulta_integrante == "") {
                this.errores.push(
                    "El permiso consulta integrante es obligatorio."
                );
            }
            if (this.permisos.consulta_vivienda == "") {
                this.errores.push(
                    "El permiso consulta vivienda es obligatorio."
                );
            }
            if (this.permisos.indicadores_gestantes == "") {
                this.errores.push(
                    "El permiso indicadores gestantes es obligatorio."
                );
            }
            if (this.permisos.indicadores_spa == "") {
                this.errores.push("El permiso indicadores spa es obligatorio.");
            }
            if (this.permisos.dashboard == "") {
                this.errores.push("El permiso dashboard es obligatorio.");
            }

            if (!this.errores.length) {
                return true;
            } else {
                return false;
            }
            e.preventDefault();
        },
        checkForm2(e) {
            this.errores = [];
            if (!this.editarUsuariosData.identificacion) {
                this.errores.push("La identificación es obligatoria.");
            }
            if (this.editarUsuariosData.identificacion.length < 6) {
                this.errores.push(
                    "Por favor escriba una identificación mayor a 6 caracteres"
                );
            }
            if (!this.editarUsuariosData.nombre) {
                this.errores.push("El nombre es obligatorio.");
            }
            if (this.editarUsuariosData.nombre.length < 5) {
                this.errores.push(
                    "Por favor escriba un nombre mayor a 5 caracteres"
                );
            }
            if (!this.editarUsuariosData.email) {
                this.errores.push("El correo electrónico es obligatorio.");
            } else if (!this.validEmail(this.editarUsuariosData.email)) {
                this.errores.push("El correo electrónico debe ser válido.");
            }
            if (!this.editarpermisos.rol) {
                this.errores.push("El rol es obligatorio.");
            }
            if (!this.editarUsuariosData.celular) {
                this.errores.push("El celular es obligatorio.");
            }
            if (!this.editarUsuariosData.usuario) {
                this.errores.push("El usuario es obligatorio.");
            }
            if (this.editarUsuariosData.usuario.length < 5) {
                this.errores.push(
                    "Por favor escriba un usuario mayor a 5 caracteres."
                );
            }

            if (this.editarpermisos.usuarios == "") {
                this.errores.push("El permiso usuarios es obligatorio.");
            }
            if (this.editarpermisos.barrios == "") {
                this.errores.push("El permiso barrios es obligatorio.");
            }
            if (this.editarpermisos.corregimientos == "") {
                this.errores.push("El permiso corregimientos es obligatorio.");
            }
            if (this.editarpermisos.etnias == "") {
                this.errores.push("El permiso etnias es obligatorio.");
            }
            if (this.editarpermisos.ocupaciones == "") {
                this.errores.push("El permiso ocupaciones es obligatorio.");
            }
            if (this.editarpermisos.parentescos == "") {
                this.errores.push("El permiso parentescos es obligatorio.");
            }
            if (this.editarpermisos.estado_civil == "") {
                this.errores.push("El permiso estado civil es obligatorio.");
            }
            if (this.editarpermisos.escolaridad == "") {
                this.errores.push("El permiso escolaridad es obligatorio.");
            }
            if (this.editarpermisos.veredas == "") {
                this.errores.push("El permiso veredas es obligatorio.");
            }
            if (this.editarpermisos.morbilidad_ges == "") {
                this.errores.push(
                    "El permiso morbilidad en gestación es obligatorio."
                );
            }
            if (this.editarpermisos.morbilidad_nac == "") {
                this.errores.push(
                    "El permiso morbilidad al nacer es obligatorio."
                );
            }
            if (this.editarpermisos.metodos == "") {
                this.errores.push(
                    "El permiso metodos de planificación es obligatorio."
                );
            }
            if (this.editarpermisos.motivos == "") {
                this.errores.push(
                    "El permiso motivos para no planificar es obligatorio."
                );
            }
            if (this.editarpermisos.grupos == "") {
                this.errores.push("El permiso grupos de ayuda es obligatorio.");
            }
            if (this.editarpermisos.enfermedades_cro == "") {
                this.errores.push(
                    "El permiso enfermedades cronicas es obligatorio."
                );
            }
            if (this.editarpermisos.enfermedades_inf == "") {
                this.errores.push(
                    "El permiso enfermedades infecciosas es obligatorio."
                );
            }
            if (this.editarpermisos.religion == "") {
                this.errores.push("El permiso religión es obligatorio.");
            }
            if (this.editarpermisos.colegios == "") {
                this.errores.push("El permiso colegios es obligatorio.");
            }
            if (this.editarpermisos.actividades_economicas == "") {
                this.errores.push(
                    "El permiso actividades economicas es obligatorio."
                );
            }
            if (this.editarpermisos.gestion == "") {
                this.errores.push("El permiso gestión es obligatorio.");
            }
            if (this.editarpermisos.consulta_integrante == "") {
                this.errores.push(
                    "El permiso consulta integrante es obligatorio."
                );
            }
            if (this.editarpermisos.consulta_vivienda == "") {
                this.errores.push(
                    "El permiso consulta vivienda es obligatorio."
                );
            }
            if (this.editarpermisos.indicadores_gestantes == "") {
                this.errores.push(
                    "El permiso indicadores gestantes es obligatorio."
                );
            }
            if (this.editarpermisos.indicadores_spa == "") {
                this.errores.push("El permiso indicadores spa es obligatorio.");
            }
            if (this.editarpermisos.dashboard == "") {
                this.errores.push("El permiso dashboard es obligatorio.");
            }
            if (!this.errores.length) {
                return true;
            } else {
                return false;
            }
            e.preventDefault();
        },
        validEmail: function(email) {
            var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            return re.test(email);
        },
        eliminar: async function(usu) {
            var title = "";
            var titulo = "";
            if (usu.permi.estado == "Activo") {
                title = "¿Desea anular el usuario " + usu.nombre + "?";
                titulo = "Usuario " + usu.nombre + " anulado de manera exitosa";
            } else {
                title = "¿Desea activar el usuario " + usu.nombre + "?";
                titulo =
                    "Usuario " + usu.nombre + " activado de manera exitosa";
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
            }).then(result => {
                if (result.value) {
                    const parametros = {
                        _token: this.csrf,
                        usuario: usu
                    };

                    try {
                        usuarioServicios
                            .eliminarUsuarios(parametros)
                            .then(respuesta => {
                                this.tabladatos.fnClearTable();
                                this.tabladatos.fnDestroy();
                                this.consultar(1);
                                this.$swal({
                                    position: "top-end",
                                    icon: "success",
                                    title: titulo,
                                    showConfirmButton: false,
                                    timer: 2000
                                });
                            })
                            .catch(error => {
                                this.$swal(
                                    "Error...!",
                                    "Ocurrio un error!",
                                    "error"
                                );
                            });
                    } catch (error) {
                        switch (error.response.status) {
                            case 422:
                                this.$swal(
                                    "Error...!",
                                    "Ocurrio un error!",
                                    "error"
                                );
                                break;
                            default:
                                this.$swal(
                                    "Error...!",
                                    "Ocurrio un error!",
                                    "error"
                                );
                                break;
                        }
                    }
                }
            });
        },
        editar: function(usu) {
            let permi = [];
            this.mostrar = false;
            this.editarUsuariosData = { ...usu };
            this.imagenMiniatura1 = `${store.state.serverPath}assets/media/${this.alias}/fotos/${this.editarUsuariosData.imagen}`;
            permi = { ...usu.permi };
            this.editarpermisos = permi;
            this.$refs.modalUsuarioEditar.show();
        },
        editarUsuario: async function() {
            if (!this.checkForm2()) {
                this.entrarPorError = false;
            } else {
                this.errores = [];
                const parametros = {
                    _token: this.csrf,
                    identificacion: this.editarUsuariosData.identificacion,
                    nombre: this.editarUsuariosData.nombre,
                    email: this.editarUsuariosData.email,
                    rol: this.editarpermisos.rol,
                    celular: this.editarUsuariosData.celular,
                    direccion: this.editarUsuariosData.direccion,
                    id: this.editarUsuariosData.id,
                    usuario: this.editarUsuariosData.usuario,
                    permisos: this.editarpermisos,
                    ruta: this.editarUsuariosData.imagen
                };
                try {
                    await usuarioServicios
                        .editarUsuarios(parametros)
                        .then(respuesta => {
                            // this.usuarios.map(usua => {
                            //     if (usua.id == respuesta.data.usuarios.id) {
                            //         for (let key in respuesta.data.usuarios) {
                            //             usua[key] =
                            //                 respuesta.data.usuarios[key];
                            //         }
                            //     }
                            // });
                            this.tabladatos.fnClearTable();
                            this.tabladatos.fnDestroy();
                            this.consultar(1);
                            this.cerrarModal2();
                            this.$swal({
                                position: "top-end",
                                icon: "success",
                                title: "Datos Guardados Exitosamente!",
                                showConfirmButton: false,
                                timer: 2000
                            });
                        })
                        .catch(error => {
                            this.errorDevuelto = error.response.data.errors;
                            this.entrarPorError = true;
                        });
                } catch (error) {
                    switch (error.response.status) {
                        case 422:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                        default:
                            this.$swal(
                                "Error...!",
                                "Ocurrio un error!",
                                "error"
                            );
                            break;
                    }
                }
            }
        },
        cambiarPaginas: function(pagina) {
            this.paginacion.pagina_actual = pagina;
            this.consultar(pagina);
        },
        cambiarRol(opcion) {
            if (opcion == "Crear") {
                switch (this.permisos.rol) {
                    case "Administrador":
                        this.permisos.usuarios = "T";
                        this.permisos.barrios = "T";
                        this.permisos.corregimientos = "T";
                        this.permisos.etnias = "T";
                        this.permisos.ocupaciones = "T";
                        this.permisos.parentescos = "T";
                        this.permisos.estado_civil = "T";
                        this.permisos.escolaridad = "T";
                        this.permisos.veredas = "T";
                        this.permisos.morbilidad_ges = "T";
                        this.permisos.morbilidad_nac = "T";
                        this.permisos.metodos = "T";
                        this.permisos.motivos = "T";
                        this.permisos.grupos = "T";
                        this.permisos.enfermedades_cro = "T";
                        this.permisos.enfermedades_inf = "T";
                        this.permisos.religion = "T";
                        this.permisos.colegios = "T";
                        this.permisos.actividades_economicas = "T";
                        this.permisos.gestion = "T";
                        this.permisos.consulta_integrante = "T";
                        this.permisos.consulta_vivienda = "T";
                        this.permisos.indicadores_gestantes = "T";
                        this.permisos.indicadores_spa = "T";
                        this.permisos.dashboard = "T";

                        break;

                    case "Coordinador":
                        this.permisos.usuarios = "S";
                        this.permisos.barrios = "S";
                        this.permisos.corregimientos = "S";
                        this.permisos.etnias = "S";
                        this.permisos.ocupaciones = "S";
                        this.permisos.parentescos = "S";
                        this.permisos.estado_civil = "S";
                        this.permisos.escolaridad = "S";
                        this.permisos.veredas = "S";
                        this.permisos.morbilidad_ges = "S";
                        this.permisos.morbilidad_nac = "S";
                        this.permisos.metodos = "S";
                        this.permisos.motivos = "S";
                        this.permisos.grupos = "S";
                        this.permisos.enfermedades_cro = "S";
                        this.permisos.enfermedades_inf = "S";
                        this.permisos.religion = "S";
                        this.permisos.colegios = "S";
                        this.permisos.actividades_economicas = "S";
                        this.permisos.gestion = "E";
                        this.permisos.consulta_integrante = "T";
                        this.permisos.consulta_vivienda = "T";
                        this.permisos.indicadores_gestantes = "T";
                        this.permisos.indicadores_spa = "T";
                        this.permisos.dashboard = "T";
                        break;

                    case "Promotor":
                        this.permisos.usuarios = "S";
                        this.permisos.barrios = "S";
                        this.permisos.corregimientos = "S";
                        this.permisos.etnias = "S";
                        this.permisos.ocupaciones = "S";
                        this.permisos.parentescos = "S";
                        this.permisos.estado_civil = "S";
                        this.permisos.escolaridad = "S";
                        this.permisos.veredas = "S";
                        this.permisos.morbilidad_ges = "S";
                        this.permisos.morbilidad_nac = "S";
                        this.permisos.metodos = "S";
                        this.permisos.motivos = "S";
                        this.permisos.grupos = "S";
                        this.permisos.enfermedades_cro = "S";
                        this.permisos.enfermedades_inf = "S";
                        this.permisos.religion = "S";
                        this.permisos.colegios = "S";
                        this.permisos.actividades_economicas = "S";
                        this.permisos.gestion = "C";
                        this.permisos.consulta_integrante = "S";
                        this.permisos.consulta_vivienda = "S";
                        this.permisos.indicadores_gestantes = "S";
                        this.permisos.indicadores_spa = "S";
                        this.permisos.dashboard = "S";
                        break;

                    case "General":
                        this.permisos.usuarios = "S";
                        this.permisos.barrios = "S";
                        this.permisos.corregimientos = "S";
                        this.permisos.etnias = "S";
                        this.permisos.ocupaciones = "S";
                        this.permisos.parentescos = "S";
                        this.permisos.estado_civil = "S";
                        this.permisos.escolaridad = "S";
                        this.permisos.veredas = "S";
                        this.permisos.morbilidad_ges = "S";
                        this.permisos.morbilidad_nac = "S";
                        this.permisos.metodos = "S";
                        this.permisos.motivos = "S";
                        this.permisos.grupos = "S";
                        this.permisos.enfermedades_cro = "S";
                        this.permisos.enfermedades_inf = "S";
                        this.permisos.religion = "S";
                        this.permisos.colegios = "S";
                        this.permisos.actividades_economicas = "S";
                        this.permisos.gestion = "S";
                        this.permisos.consulta_integrante = "S";
                        this.permisos.consulta_vivienda = "S";
                        this.permisos.indicadores_gestantes = "S";
                        this.permisos.indicadores_spa = "S";
                        this.permisos.dashboard = "T";
                        break;

                    default:
                        this.permisos.usuarios = "S";
                        this.permisos.barrios = "S";
                        this.permisos.corregimientos = "S";
                        this.permisos.etnias = "S";
                        this.permisos.ocupaciones = "S";
                        this.permisos.parentescos = "S";
                        this.permisos.estado_civil = "S";
                        this.permisos.escolaridad = "S";
                        this.permisos.veredas = "S";
                        this.permisos.morbilidad_ges = "S";
                        this.permisos.morbilidad_nac = "S";
                        this.permisos.metodos = "S";
                        this.permisos.motivos = "S";
                        this.permisos.grupos = "S";
                        this.permisos.enfermedades_cro = "S";
                        this.permisos.enfermedades_inf = "S";
                        this.permisos.religion = "S";
                        this.permisos.colegios = "S";
                        this.permisos.actividades_economicas = "S";
                        this.permisos.gestion = "S";
                        this.permisos.consulta_integrante = "S";
                        this.permisos.consulta_vivienda = "S";
                        this.permisos.indicadores_gestantes = "S";
                        this.permisos.indicadores_spa = "S";
                        this.permisos.dashboard = "L";
                        break;
                }
            }
        },
        limpiar() {
            this.usuariosData.id = 0;
            this.usuariosData.identificacion = "";
            this.usuariosData.nombre = "";
            this.usuariosData.email = "";
            this.usuariosData.rol = "";
            this.usuariosData.celular = "";
            this.usuariosData.direccion = "";
            this.usuariosData.usuario = "";
            this.usuariosData.password = "";
            this.usuariosData.confPassword = "";
            this.usuariosData.imagen = null;
            this.imagenMiniatura = null;

            this.permisos.usuarios = "";
            this.permisos.barrios = "";
            this.permisos.corregimientos = "";
            this.permisos.etnias = "";
            this.permisos.ocupaciones = "";
            this.permisos.parentescos = "";
            this.permisos.estado_civil = "";
            this.permisos.escolaridad = "";
            this.permisos.veredas = "";
            this.permisos.morbilidad_ges = "";
            this.permisos.morbilidad_nac = "";
            this.permisos.metodos = "";
            this.permisos.motivos = "";
            this.permisos.grupos = "";
            this.permisos.enfermedades_cro = "";
            this.permisos.enfermedades_inf = "";
            this.permisos.religion = "";
            this.permisos.colegios = "";
            this.permisos.actividades_economicas = "";
            this.permisos.gestion = "";
            this.permisos.consulta_integrante = "";
            this.permisos.consulta_vivienda = "";
            this.permisos.indicadores_gestantes = "";
            this.permisos.indicadores_spa = "";
            this.permisos.dashboard = "";
            this.permisos.id = 0;
        },
        limpiar2() {
            this.editarUsuariosData.identificacion = "";
            this.editarUsuariosData.nombre = "";
            this.editarUsuariosData.email = "";
            this.editarUsuariosData.rol = "";
            this.editarUsuariosData.celular = "";
            this.editarUsuariosData.direccion = "";
            this.editarUsuariosData.usuario = "";
            this.editarUsuariosData.imagen = null;
            this.imagenMiniatura1 = null;

            // this.editarpermisos.usuarios = "";
            // this.editarpermisos.barrios = "";
            // this.editarpermisos.corregimientos = "";
            // this.editarpermisos.etnias = "";
            // this.editarpermisos.ocupaciones = "";
            // this.editarpermisos.parentescos = "";
            // this.editarpermisos.estado_civil = "";
            // this.editarpermisos.escolaridad = "";
            // this.editarpermisos.veredas = "";
            // this.editarpermisos.morbilidad_ges = "";
            // this.editarpermisos.morbilidad_nac = "";
            // this.editarpermisos.metodos = "";
            // this.editarpermisos.motivos = "";
            // this.editarpermisos.grupos = "";
            // this.editarpermisos.enfermedades_cro = "";
            // this.editarpermisos.enfermedades_inf = "";
            // this.editarpermisos.religion = "";
            // this.editarpermisos.colegios = "";
            // this.editarpermisos.actividades_economicas = "";
            // this.editarpermisos.gestion = "";
            // this.editarpermisos.consulta_integrante = "";
            // this.editarpermisos.consulta_vivienda = "";
            // this.editarpermisos.indicadores_gestantes = "";
            // this.editarpermisos.indicadores_spa = "";
            // this.editarpermisos.dashboard = "";
        },
        BuscarUsuario: async function() {
            const parametros = {
                _token: this.csrf,
                identificacion: this.usuariosData.identificacion
            };
            await usuarioServicios
                .buscar(parametros)
                .then(respuesta => {
                    if (respuesta.data.OPC == "SI") {
                        this.usuariosData.id = respuesta.data.usuario.id;
                        this.usuariosData.identificacion =
                            respuesta.data.usuario.identificacion;
                        this.usuariosData.nombre =
                            respuesta.data.usuario.nombre;
                        this.usuariosData.email = respuesta.data.usuario.email;
                        this.usuariosData.estado =
                            respuesta.data.usuario.estado;
                        this.usuariosData.usuario =
                            respuesta.data.usuario.usuario;
                        this.usuariosData.celular =
                            respuesta.data.usuario.celular;
                        this.usuariosData.direccion =
                            respuesta.data.usuario.direccion;
                        this.usuariosData.imagen =
                            respuesta.data.usuario.imagen;
                        this.permisos = respuesta.data.usuario.permi[0];
                        this.imagenMiniatura = `${store.state.serverPath}assets/media/${this.alias}/fotos/${this.usuariosData.imagen}`;
                    } else {
                        this.usuariosData.id = 0;
                        this.usuariosData.nombre = "";
                        this.usuariosData.email = "";
                        this.usuariosData.estado = "";
                        this.usuariosData.usuario = "";
                        this.usuariosData.celular = "";
                        this.usuariosData.direccion = "";
                    }
                })
                .catch(error => {
                    this.errorDevuelto = error.response.data.errors;
                    this.entrarPorError = true;
                });
        },
        tabla() {
            this.$nextTick(() => {
                $.fn.DataTable = datatable;
                this.tabladatos = $("#tablaDatos").DataTable({
                    // bFilter: false,
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
                                messageTop: "Listado de Usuarios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
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
                                messageTop: "Listado de Usuarios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                extend: "pdfHtml5",
                                text: "<i class='fa fa-file-pdf'></i>",
                                titleAttr: "Exportar a PDF",
                                className:
                                    "btn btn-outline-danger btn-icon btn-lg",
                                messageTop: "Listado de Usuarios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
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
                                messageTop: "Listado de Usuarios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            },
                            {
                                extend: "print",
                                text: "<i class='fa fa-print'></i>",
                                titleAttr: "Imprimir Archivo",
                                className:
                                    "btn btn-outline-dark btn-icon btn-lg",
                                messageTop: "Listado de Usuarios",
                                title: "Sistema Integrado Poblacional",
                                exportOptions: {
                                    columns: [0, 1, 2, 3, 4, 5, 6]
                                }
                            }
                        ]
                    }
                });
                $(".dataTables_filter input").attr(
                    "placeholder",
                    "Busqueda..."
                );
                $(".dataTables_filter label").addClass("form-control");
                $(".dataTables_filter label").css("outline", "none");
                $(".dataTables_filter label").css("border", "0");
                $(".dataTables_filter label").css("padding-bottom", "35px");
                $(".dataTables_filter label input").css("margin-left", "0px");
            });
        },
        obtenerImagen(e){
            let file = e.target.files[0];
            this.usuariosData.imagen = file;            
            this.cargarImagen(file);
        },
        cargarImagen: async function(file) {
            let reader = new FileReader();
            reader.onload = (e) =>{
                this.imagenMiniatura = e.target.result;
            }
            reader.readAsDataURL(file);

            let campos = new FormData();   
            campos.append("_token",this.csrf);
            campos.append("imagen",this.usuariosData.imagen);
            await usuarioServicios
                .usuariosSubirImagen(campos)
                .then(respuesta => {
                    this.usuariosData.imagen = respuesta.data.ruta;
                })
                .catch(error => {
                    this.errorDevuelto = error.response.data.errors;
                    this.entrarPorError = true;
                });                   
        },
        obtenerImagen1(e){
            let file = e.target.files[0];
            this.editarUsuariosData.imagen = file;            
            this.cargarImagen1(file);
        },
        cargarImagen1: async function(file) {
            let reader = new FileReader();
            reader.onload = (e) =>{
                this.imagenMiniatura1 = e.target.result;
            }
            reader.readAsDataURL(file);

            let campos = new FormData();   
            campos.append("_token",this.csrf);
            campos.append("imagen",this.editarUsuariosData.imagen);
            campos.append("id",this.editarUsuariosData.id);              
            await usuarioServicios
                .usuariosEditarSubirImagen(campos)
                .then(respuesta => {
                    this.editarUsuariosData.imagen = respuesta.data.ruta;
                })
                .catch(error => {
                    this.errorDevuelto = error.response.data.errors;
                    this.entrarPorError = true;
                });                   
        }        
    }
};
</script>
<style>
.modal-backdrop {
    background-color: rgba(0, 0, 0, 0.5) !important;
}
.modal-title {
    color: #f8f9fa !important;
}
.close {
    display: none;
}
</style>
