import Vue from 'vue';
import Router from 'vue-router';

Vue.use(Router);

export const routes = [
    {
        path: '/',
        name: 'Index',
        component: () => import ('./Vistas/Caracterizacion/Gestion.vue')
    },
    {
        path: '/Dashboard',
        name: 'Dashboard',
        component: () => import ('./Vistas/Administracion.vue')
    },
    {
        path: '/barrios',
        name: 'Barrios',
        component: () => import ('./Vistas/Barrios/Barrios.vue')
    },
    {
        path: '/veredas',
        name: 'Veredas',
        component: () => import ('./Vistas/Veredas/Veredas.vue')
    },
    {
        path: '/usuarios',
        name: 'Usuarios',
        component: () => import ('./Vistas/Usuarios/Usuarios.vue')
    }, 
    {
        path: '/corregimientos',
        name: 'Corregimientos',
        component: () => import ('./Vistas/Corregimientos/Corregimientos.vue')
    }, 
    {
        path: '/etnias',
        name: 'Etnias',
        component: () => import ('./Vistas/Etnias/Etnias.vue')
    }, 
    {
        path: '/ocupaciones',
        name: 'Ocupaciones',
        component: () => import ('./Vistas/Ocupaciones/Ocupaciones.vue')
    }, 
    {
        path: '/parentescos',
        name: 'Parentescos',
        component: () => import ('./Vistas/Parentescos/Parentescos.vue')
    }, 
    {
        path: '/estadocivil',
        name: 'Estadocivil',
        component: () => import ('./Vistas/Estadocivil/Estadocivil.vue')
    }, 
    {
        path: '/escolaridad',
        name: 'Escolaridad',
        component: () => import ('./Vistas/Escolaridad/Escolaridad.vue')
    }, 
    {
        path: '/gestion',
        name: 'Gestion',
        component: () => import ('./Vistas/Caracterizacion/Gestion.vue')
    }, 
    {
        path: '/ingreso',
        name: 'Ingreso',
        component: () => import ('./Vistas/Caracterizacion/Ingreso.vue')
    }, 
    {
        path: '/editarIngreso',
        name: 'Editar',
        component: () => import ('./Vistas/Caracterizacion/Editar.vue')
    }, 
    {
        path: '/morbilidad_nacer',
        name: 'Morbilidad_Nacer',
        component: () => import ('./Vistas/Morbilidad/MorbilidadNacer.vue')
    }, 
    {
        path: '/morbilidad',
        name: 'Morbilidad',
        component: () => import ('./Vistas/Morbilidad/Morbilidad.vue')
    }, 
    {
        path: '/metodos',
        name: 'Metodos',
        component: () => import ('./Vistas/Metodos/Metodos.vue')
    }, 
    {
        path: '/motivos',
        name: 'Motivos',
        component: () => import ('./Vistas/Motivos/Motivos.vue')
    }, 
    {
        path: '/grupos',
        name: 'Grupos',
        component: () => import ('./Vistas/Grupos/Grupos.vue')
    }, 
    {
        path: '/enfermedadesCro',
        name: 'EnfermedadesCro',
        component: () => import ('./Vistas/Enfermedades/EnfermedadesCro.vue')
    }, 
    {
        path: '/enfermedadesInf',
        name: 'EnfermedadesInf',
        component: () => import ('./Vistas/Enfermedades/EnfermedadesInf.vue')
    }, 
    {
        path: '/religion',
        name: 'Religion',
        component: () => import ('./Vistas/Religion/Religion.vue')
    }, 
    {
        path: '/colegios',
        name: 'Colegios',
        component: () => import ('./Vistas/Colegios/Colegios.vue')
    }, 
    {
        path: '/ayu',
        name: 'Ayu',
        component: () => import ('./Vistas/Caracterizacion/ayu.vue')
    }, 
    {
        path: '/actividad',
        name: 'Actividad',
        component: () => import ('./Vistas/Actividad/Actividad.vue')
    }, 
    {
        path: '/establecimientos',
        name: 'Establecimientos',
        component: () => import ('./Vistas/Establecimientos/Establecimientos.vue')
    }, 
    {
        path: '/establecimientos/editar',
        name: 'EditarEstablecimientos',
        component: () => import ('./Vistas/Establecimientos/Editar.vue')
    }, 
    {
        path: '/unidades',
        name: 'Unidades',
        component: () => import ('./Vistas/Unidades/Unidades.vue')
    }, 
    {
        path: '/unidades/editar',
        name: 'EditarUnidades',
        component: () => import ('./Vistas/Unidades/Editar.vue')
    }, 
    {
        path: '/indicadores',
        name: 'indicadores',
        component: () => import ('./Vistas/Indicadores/Principal.vue')
    }, 
    {
        path: '/indicadores/gestantes',
        name: 'indicadores_gestante',
        component: () => import ('./Vistas/Indicadores/gestantes.vue')
    }, 
    {
        path: '/indicadores/spa',
        name: 'indicadores_spa',
        component: () => import ('./Vistas/Indicadores/spa.vue')
    }, 
    {
        path: '/salud/enfermedades',
        name: 'indicadores_enfermedades',
        component: () => import ('./Vistas/Indicadores/enfermedades.vue')
    }, 
    {
        path: '/indicadores/deteccion',
        name: 'indicadores_deteccion',
        component: () => import ('./Vistas/Indicadores/deteccion.vue')
    }, 
    {
        path: '/consultas/vivienda',
        name: 'consulta_viviendas',
        component: () => import ('./Vistas/Consultas/viviendas.vue')
    }, 
    {
        path: '/consultas/listadovivienda',
        name: 'ConsultaVivienda',
        component: () => import ('./Vistas/Consultas/listadoviviendas.vue')
    }, 
    {
        path: '/consultas/jefehogar',
        name: 'ConsultaJefe',
        component: () => import ('./Vistas/Consultas/jefedehogar.vue')
    }, 
    {
        path: '/consultas/listadojefehogar',
        name: 'ConsultaJefeHogar',
        component: () => import ('./Vistas/Consultas/listadojefes.vue')
    }, 
    {
        path: '/entes',
        name: 'Entes',
        component: () => import ('./Vistas/Entes/Entes.vue')
    }, 
    {
        path: '/usuariosSop',
        name: 'UsuariosSop',
        component: () => import ('./Vistas/Usuarios/UsuariosSop.vue')
    }, 
    {
        path: '/log',
        name: 'Log',
        component: () => import ('./Vistas/Log/Log.vue')
    }, 
    {
        path: '/reportes/gestantes',
        name: 'Log',
        component: () => import ('./Vistas/Reportes/Gestantes.vue')
    }, 
    {
        path: '/reportes/nutricional',
        name: 'Log',
        component: () => import ('./Vistas/Reportes/Nutricional.vue')
    }, 
    {
        path: '/reportes/cronicos',
        name: 'ReportesCronicos',
        component: () => import ('./Vistas/Reportes/EnfermedadesCronicas.vue')
    }, 
    {
        path: '/reportes/infecciosas',
        name: 'ReportesInfecciosos',
        component: () => import ('./Vistas/Reportes/EnfermedadesInfecciosas.vue')
    }, 
    {
        path: '/reportes/migrantes',
        name: 'ReportesMigrantes',
        component: () => import ('./Vistas/Reportes/PoblacionMigrante.vue')
    }, 
    {
        path: '/informes/migrantes',
        name: 'InformesMigrantes',
        component: () => import ('./Vistas/Informes/poblacionMigrante.vue')
    }, 
    {
        path: '/perfil',
        name: 'Perfil',
        component: () => import ('./Vistas/Perfil/Gestion.vue')
    },
    {
        path: '/informes/salud',
        name: 'informesSalud',
        component: () => import ('./Vistas/Informes/SaludAdmin.vue')
    },
    {
        path: '/reportes/discapacitados',
        name: 'ReporteDiscapacitados',
        component: () => import ('./Vistas/Reportes/Discapacitados.vue')
    },
    {
        path: '/reportes/adulto-mayor',
        name: 'AdultoMayor',
        component: () => import ('./Vistas/Reportes/AdultoMayor.vue')
    },
    {
        path: '/reportes/descolarizados',
        name: 'Descolarizados',
        component: () => import ('./Vistas/Reportes/Descolarizados.vue')
    },
    {
        path: '/reportes/bajo-nivel-socioeconomico',
        name: 'BajoNivel',
        component: () => import ('./Vistas/Reportes/BajoNivelSocioeconomico.vue')
    },
    {
        path: '/reportes/riesgosSalud',
        name: 'riesgosSalud',
        component: () => import ('./Vistas/Reportes/RiesgosSalud.vue')
    }
];

const router = new Router({routes: routes});
export default router;
