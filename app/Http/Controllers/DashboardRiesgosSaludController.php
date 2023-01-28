<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Auth;
use File;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class DashboardRiesgosSaludController extends Controller
{
    public function poblacion() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        $rango = request()->get('rango');
        if (Auth::check()) {
           
            $poblacion = \App\DashboardRiesgosSalud::riesgos_poblacion(Session::get('alias'), $tipo, $id, $rango);

            $respuesta = [
                'poblacion' => $poblacion,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarPoblacion() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $grafico1 = request()->get('grafico1');
            $grafico2 = request()->get('grafico2');
            $riesgo = request()->get('riesgo');
            $data = request()->get('data');
          
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboard', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'grafico1' => $grafico1, 
                'grafico2' => $grafico2, 
                'riesgo' => $riesgo, 
                'data' => $data, 
            ])->setPaper('a5', 'portrait')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function hogares() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        if (Auth::check()) {
           
            $hogares = \App\DashboardRiesgosSalud::riesgos_hogares(Session::get('alias'), $tipo, $id);
            $riesgos_infantil_desnutricion = \App\DashboardRiesgosSalud::riesgos_desnutricion(Session::get('alias'), $tipo, $id, 1);
            $riesgos_adulto_desnutricion = \App\DashboardRiesgosSalud::riesgos_desnutricion(Session::get('alias'), $tipo, $id, 2);
            $consumo_spa = \App\DashboardRiesgosSalud::spa_violencia(Session::get('alias'), $tipo, $id, 1);
            $violencias = \App\DashboardRiesgosSalud::spa_violencia(Session::get('alias'), $tipo, $id, 2);
            $obesidad_ninios = \App\DashboardRiesgosSalud::obesidad_sobrepeso(Session::get('alias'), $tipo, $id, 1);
            $obesidad_adultos = \App\DashboardRiesgosSalud::obesidad_sobrepeso(Session::get('alias'), $tipo, $id, 2);

            $respuesta = [
                'hogares' => $hogares,
                'riesgos_infantil_desnutricion' => $riesgos_infantil_desnutricion,
                'riesgos_adulto_desnutricion' => $riesgos_adulto_desnutricion,
                'consumo_spa' => $consumo_spa,
                'violencias' => $violencias,
                'obesidad_ninios' => $obesidad_ninios,
                'obesidad_adultos' => $obesidad_adultos
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarHogares() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $grafica = request()->get('grafica');
            $data = request()->get('data');
            $tipo_data = request()->get('tipo_data');
           
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud-Hogares.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboardHogar', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'grafica' => $grafica, 
                'data' => $data, 
                'tipo_data' => $tipo_data, 
            ])->setPaper('a4', 'landscape')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function enfermedades() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        $rango = request()->get('rango');
        $tipo_enfer = request()->get('tipo_enfer');

        if (Auth::check()) {
           
            $enfermedades_por_edad = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, $rango, $tipo_enfer);
            

            $men1a = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'men1a', $tipo_enfer);
            $de1a5 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de1a5', $tipo_enfer);
            $de6a11 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de6a11', $tipo_enfer);
            $de12a17 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de12a17', $tipo_enfer);
            $de18a28 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de18a28', $tipo_enfer);
            $de29a59 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de29a59', $tipo_enfer);
            $de60 = \App\DashboardRiesgosSalud::enfermedades_por_edad(Session::get('alias'), $tipo, $id, 'de60', $tipo_enfer);


            $respuesta = [
                'enfermedades_por_edad' => $enfermedades_por_edad,
                'comparativa' => [
                    'men1a' => $men1a,
                    'de6a11' => $de6a11,
                    'de1a5' => $de1a5,
                    'de12a17' => $de12a17,
                    'de18a28' => $de18a28,
                    'de29a59' => $de29a59,
                    'de60' => $de60
                ]
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarEnfermedades() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $filtro2 = request()->get('filtro2');
            $imagenes = request()->get('imagenes');
            $grafico1 = request()->get('grafico1');
            $grafico2 = request()->get('grafico2');
            $grafico3 = request()->get('grafico3');
            $data = request()->get('data');
            $hmp = request()->get('hmp');
            $tipo_enfermedad = request()->get('tipo_enfermedad');
           
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud-Enfermedades.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboardEnfermedad', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'filtro2' => $filtro2, 
                'imagenes' => $imagenes,  
                'grafico1' => $grafico1, 
                'grafico2' => $grafico2, 
                'grafico3' => $grafico3, 
                'data' => $data, 
                'hmp' => $hmp,
                'tipo_enfermedad' => $tipo_enfermedad
            ])->setPaper('a4', 'landscape')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function spa() {

        $tipo = request()->get('tipo');
        $id = request()->get('id');

        if (Auth::check()) {
            $de6a11 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de6a11');
            $de12a17 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de12a17');
            $de18a28 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de18a28');
            $de29a59 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de29a59');
            $de60 = \App\DashboardRiesgosSalud::spa(Session::get('alias'), $tipo, $id, 'de60');
            $gestantes_consumidores = \App\Indicadores::total_gestantes_spa_integrantes_f(Session::get('alias'), $tipo, $id)+\App\Indicadores::total_gestantes_spa_jefe_f(Session::get('alias'), $tipo, $id);
            $gestantes = \App\Indicadores::mujeres_embarazadas(Session::get('alias'));;

            $respuesta = [
                'data_por_tipo' => [  
                    'de6a11' => $de6a11,
                    'de12a17' => $de12a17,
                    'de18a28' => $de18a28,
                    'de29a59' => $de29a59,
                    'de60' => $de60,
                    'gestantes_consumidores' => [
                        'porcen' => ($gestantes_consumidores / $gestantes) * 100,
                        'mujeres_spa' => $gestantes_consumidores,
                        'gestantes' => $gestantes
                    ],
                ],
            ];
            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarSpa() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $grafico1 = request()->get('grafico1');
            $grafico2 = request()->get('grafico2');
            $grafico3 = request()->get('grafico3');
            $imagen1 = request()->get('imagen1');
            $data = request()->get('data');
           
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud-SPA.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboardSpa', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'grafico1' => $grafico1, 
                'grafico2' => $grafico2, 
                'grafico3' => $grafico3, 
                'imagen1' => $imagen1,
                'data' => $data
            ])->setPaper('a4', 'landscape')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function embarazo() {

        $tipo = request()->get('tipo');
        $id = request()->get('id');

        if (Auth::check()) {
            $embarazo = \App\DashboardRiesgosSalud::embarazo(Session::get('alias'), $tipo, $id);
            $lactantes = \App\DashboardRiesgosSalud::lactantes(Session::get('alias'), $tipo, $id);

            $respuesta = [
                'embarazo' => $embarazo,
                'lactantes' => $lactantes
            ];
            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarEmbarazo() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $imagen1 = request()->get('imagen1');
            $grafico1 = request()->get('grafico1');
            $graficos = request()->get('graficos');
            $embarazadas = request()->get('embarazadas');
            $lactantes = request()->get('lactantes');
           
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud-Gestante.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboardGestante', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'imagen1' => $imagen1, 
                'grafico1' => $grafico1, 
                'graficos' => $graficos, 
                'embarazadas' => $embarazadas,
                'lactantes' => $lactantes,
            ])->setPaper('a4', 'landscape')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
 
    public function inmunizacion() {

        $tipo = request()->get('tipo');
        $id = request()->get('id');
        $rango = request()->get('rango');

        if (Auth::check()) {
            
            if($rango == "men1a"){
                $data = \App\DashboardRiesgosSalud::inmunizacion_men_1(Session::get('alias'), $tipo, $id);
            }else{
                if($rango == "de1a5"){
                    $data = \App\DashboardRiesgosSalud::inmunizacion_de1a5(Session::get('alias'), $tipo, $id);
                }else{
                    $data = \App\DashboardRiesgosSalud::inmunizacion_general_9a18(Session::get('alias'), $tipo, $id);
                } 
            }
            
            $respuesta = [
                'inmunizacion_data' => $data
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarInmunizacion() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $filtro2 = request()->get('filtro2');
            $tipo = request()->get('tipo');
            $graficos = request()->get('graficos');
            $data = request()->get('data');
            
           
            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'Riesgo-Salud-Inunizacion.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/RSDashboardInunizacion', [
                'ente' => $ente, 
                'filtro' => $filtro,  
                'filtro2' => $filtro2, 
                'graficos' => $graficos, 
                'data' => $data, 
                'tipo' => $tipo,
            ])->setPaper('a4', 'landscape')
            ->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarInmunizacionExcel() {
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'fill' => [
                'fillType' => \PhpOffice\PhpSpreadsheet\Style\Fill::FILL_GRADIENT_LINEAR,
                'rotation' => 90,
                'startColor' => [
                    'argb' => 'FF2FA021',
                ],
                'endColor' => [
                    'argb' => 'FF2FA021',
                ],
            ],
        ];
        
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $filtro2 = request()->get('filtro2');
            $tipo = request()->get('tipo');
            $graficos = request()->get('graficos');
            $data = request()->get('data');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
            $nombre = "Riesgo-Salud-Inunizacion.xlsx";
            
            if($tipo == "men1a"){
                  
                $spreadsheet = new Spreadsheet();

                // sin BCG
                $sheet = $spreadsheet->getActiveSheet();
                $sheet->setTitle('BCG');

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                $sheet->setCellValue('A1', 'Niños menores de 1 años sin vacuna BGC');

                $sheet->mergeCells('A1:G1');
                $spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);

                $sheet->setCellValue('A2', 'Identificacion');
                $sheet->setCellValue('B2', 'Nombre');
                $sheet->setCellValue('C2', 'Edad (Meses)');
                $sheet->setCellValue('D2', 'Corregimiento');
                $sheet->setCellValue('E2', 'Barrio');
                $sheet->setCellValue('F2', 'Direccion');
                $sheet->setCellValue('G2', 'BCG');

                $spreadsheet->getActiveSheet()->getStyle('A2:G2')->applyFromArray($styleArray);

                $row = 3;
                foreach ($data["sin_bcg_array"] as $item) {
                    if($item["des_corr"] != ""){
                        $des_corr = $item["des_corr"];
                    }else{
                        $des_corr = "CASCO URBANO";
                    }
                    $sheet
                        ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                        ->setCellValue("B{$row}", $item["nombre"])
                        ->setCellValue("C{$row}", $item["edad"])
                        ->setCellValue("D{$row}", $des_corr)
                        ->setCellValue("E{$row}", $item["des_barrio"])
                        ->setCellValue("F{$row}", $item["des_direc"])
                        ->setCellValue("G{$row}", $item["bcg"]);
                    ++$row;
                }
                // sin BCG

                // sin vacuna de polio
                $spreadsheet->createSheet();
                $spreadsheet->setActiveSheetIndex(1);
                $spreadsheet->getActiveSheet()->setTitle('Polio');
                $sheet = $spreadsheet->getActiveSheet();

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                $sheet->setCellValue("A1", 'Niños menores de 1 años sin vacuna de Polio');
                $sheet->mergeCells("A1:G1");
                $spreadsheet->getActiveSheet()->getStyle("A1:G1")->applyFromArray($styleArray);

                
                $sheet->setCellValue("A2", 'Identificacion');
                $sheet->setCellValue("B2", 'Nombre');
                $sheet->setCellValue("C2", 'Edad (Meses)');
                $sheet->setCellValue("D2", 'Corregimiento');
                $sheet->setCellValue("E2", 'Barrio');
                $sheet->setCellValue("F2", 'Direccion');
                $sheet->setCellValue("G2", 'Polio');

                $spreadsheet->getActiveSheet()->getStyle("A2:G2")->applyFromArray($styleArray);

                $row = 3;

                foreach ($data["sin_polio_array"] as $item) {
                    if($item["des_corr"] != ""){
                        $des_corr = $item["des_corr"];
                    }else{
                        $des_corr = "CASCO URBANO";
                    }
                    $sheet
                        ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                        ->setCellValue("B{$row}", $item["nombre"])
                        ->setCellValue("C{$row}", $item["edad"])
                        ->setCellValue("D{$row}", $des_corr)
                        ->setCellValue("E{$row}", $item["des_barrio"])
                        ->setCellValue("F{$row}", $item["des_direc"])
                        ->setCellValue("G{$row}", $item["polio"]);
                    ++$row;
                }
                // sin vacuna de polio

                // con esquema completo de pentavalente
                $spreadsheet->createSheet();
                $spreadsheet->setActiveSheetIndex(2);
                $spreadsheet->getActiveSheet()->setTitle('Pentavalente');
                $sheet = $spreadsheet->getActiveSheet();

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);


                $sheet->setCellValue("A1", 'Niños menores de 1 años con esquema completo de pentavalente');
                $sheet->mergeCells("A1:G1");
                $spreadsheet->getActiveSheet()->getStyle("A1:G1")->applyFromArray($styleArray);


                $sheet->setCellValue("A2", 'Identificacion');
                $sheet->setCellValue("B2", 'Nombre');
                $sheet->setCellValue("C2", 'Edad (Meses)');
                $sheet->setCellValue("D2", 'Corregimiento');
                $sheet->setCellValue("E2", 'Barrio');
                $sheet->setCellValue("F2", 'Direccion');
                $sheet->setCellValue("G2", 'Pentavalente');

                $spreadsheet->getActiveSheet()->getStyle("A2:G2")->applyFromArray($styleArray);

                $row = 3;

                foreach ($data["esquema_completo_pentavalente_array"] as $item) {
                    if($item["des_corr"] != ""){
                        $des_corr = $item["des_corr"];
                    }else{
                        $des_corr = "CASCO URBANO";
                    }
                    $sheet
                        ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                        ->setCellValue("B{$row}", $item["nombre"])
                        ->setCellValue("C{$row}", $item["edad"])
                        ->setCellValue("D{$row}", $des_corr)
                        ->setCellValue("E{$row}", $item["des_barrio"])
                        ->setCellValue("F{$row}", $item["des_direc"])
                        ->setCellValue("G{$row}", $item["pentavalente"]);
                    ++$row;
                }
                // con esquema completo de pentavalente

                // con esquema incompleto de pentavalente
                $spreadsheet->createSheet();
                $spreadsheet->setActiveSheetIndex(3);
                $spreadsheet->getActiveSheet()->setTitle('Pentavalente II');
                $sheet = $spreadsheet->getActiveSheet();

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                $sheet->setCellValue("A1", 'Niños menores de 1 años con esquema incompleto de pentavalente');
                $sheet->mergeCells("A1:G1");
                $spreadsheet->getActiveSheet()->getStyle("A1:G1")->applyFromArray($styleArray);


                $sheet->setCellValue("A2", 'Identificacion');
                $sheet->setCellValue("B2", 'Nombre');
                $sheet->setCellValue("C2", 'Edad (Meses)');
                $sheet->setCellValue("D2", 'Corregimiento');
                $sheet->setCellValue("E2", 'Barrio');
                $sheet->setCellValue("F2", 'Direccion');
                $sheet->setCellValue("G2", 'Pentavalente');

                $spreadsheet->getActiveSheet()->getStyle("A2:G2")->applyFromArray($styleArray);

                $row = 3;

                foreach ($data["esquema_icompleto_pentavalente_array"] as $item) {
                    if($item["des_corr"] != ""){
                        $des_corr = $item["des_corr"];
                    }else{
                        $des_corr = "CASCO URBANO";
                    }
                    $sheet
                        ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                        ->setCellValue("B{$row}", $item["nombre"])
                        ->setCellValue("C{$row}", $item["edad"])
                        ->setCellValue("D{$row}", $des_corr)
                        ->setCellValue("E{$row}", $item["des_barrio"])
                        ->setCellValue("F{$row}", $item["des_direc"])
                        ->setCellValue("G{$row}", $item["pentavalente"]);
                    ++$row;
                }
                // con esquema incompleto de pentavalente

                // esquema completo de polio II
                $spreadsheet->createSheet();
                $spreadsheet->setActiveSheetIndex(4);
                $spreadsheet->getActiveSheet()->setTitle('Polio II');
                $sheet = $spreadsheet->getActiveSheet();

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                $sheet->setCellValue("A1", 'Niños menores de 1 año con esquema completo de polio');
                $sheet->mergeCells("A1:G1");
                $spreadsheet->getActiveSheet()->getStyle("A1:G1")->applyFromArray($styleArray);

                $row += 1;

                $sheet->setCellValue("A2", 'Identificacion');
                $sheet->setCellValue("B2", 'Nombre');
                $sheet->setCellValue("C2", 'Edad (Meses)');
                $sheet->setCellValue("D2", 'Corregimiento');
                $sheet->setCellValue("E2", 'Barrio');
                $sheet->setCellValue("F2", 'Direccion');
                $sheet->setCellValue("G2", 'Polio');

                $spreadsheet->getActiveSheet()->getStyle("A2:G2")->applyFromArray($styleArray);

                $row = 3;

                foreach ($data["esquema_completo_polio_array"] as $item) {
                    if($item["des_corr"] != ""){
                        $des_corr = $item["des_corr"];
                    }else{
                        $des_corr = "CASCO URBANO";
                    }
                    $sheet
                        ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                        ->setCellValue("B{$row}", $item["nombre"])
                        ->setCellValue("C{$row}", $item["edad"])
                        ->setCellValue("D{$row}", $des_corr)
                        ->setCellValue("E{$row}", $item["des_barrio"])
                        ->setCellValue("F{$row}", $item["des_direc"])
                        ->setCellValue("G{$row}", $item["polio"]);
                    ++$row;
                }
                // esquema completo de polio

                // desnutrición con esquema de vacunación incompleto
                $spreadsheet->createSheet();
                $spreadsheet->setActiveSheetIndex(5);
                $spreadsheet->getActiveSheet()->setTitle('Desnutrición');
                $sheet = $spreadsheet->getActiveSheet();

                $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

                $sheet->setCellValue("A1", 'Niños en riesgos de desnutrición con esquema de vacunación incompleto');
                $sheet->mergeCells("A1:I1");
                $spreadsheet->getActiveSheet()->getStyle("A1:I1")->applyFromArray($styleArray);

                $row += 1;

                $sheet->setCellValue("A2", 'Identificacion');
                $sheet->setCellValue("B2", 'Nombre');
                $sheet->setCellValue("C2", 'Edad (Meses)');
                $sheet->setCellValue("D2", 'Corregimiento');
                $sheet->setCellValue("E2", 'Barrio');
                $sheet->setCellValue("F2", 'Direccion');
                $sheet->setCellValue("G2", 'Desnutrición Aguda');
                $sheet->setCellValue("H2", 'Desnutrición Global');
                $sheet->setCellValue("I2", 'Carnet ');

                $spreadsheet->getActiveSheet()->getStyle("A2:I2")->applyFromArray($styleArray);

                $row = 3;

                foreach ($data["desnutricion_carnet_desac_array"] as $item) {

                    if($item["riesgos_desnutricion_aguda_R"] == 0 || $item["riesgos_desnutricion_aguda_R"] == 1){
                        $da = "BAJO";
                    }else{
                        if($item["riesgos_desnutricion_aguda_R"] == 2 || $item["riesgos_desnutricion_aguda_R"] == 3){
                            $da = "MODERADO";
                        }else{  
                            $da = "ALTO";
                        }
                    }

                    if($item["riesgos_desnutricion_global_R"] == 0 || $item["riesgos_desnutricion_global_R"] == 1){
                        $dg = "BAJO";
                    }else{
                        if($item["riesgos_desnutricion_global_R"] == 2 || $item["riesgos_desnutricion_global_R"] == 3){
                            $dg = "MODERADO";
                        }else{  
                            $dg = "ALTO";
                        }
                    }

                    if($item["des_corr"] != ""){
                        $des_corr = $item["des_corr"];
                    }else{
                        $des_corr = "CASCO URBANO";
                    }

                    $sheet
                        ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                        ->setCellValue("B{$row}", $item["nombre"])
                        ->setCellValue("C{$row}", $item["edad"])
                        ->setCellValue("D{$row}", $des_corr)
                        ->setCellValue("E{$row}", $item["des_barrio"])
                        ->setCellValue("F{$row}", $item["des_direc"])
                        ->setCellValue("G{$row}", $da)
                        ->setCellValue("H{$row}", $dg)
                        ->setCellValue("I{$row}", 'Desactualizado');
                    ++$row;
                }
                // desnutrición con esquema de vacunación incompleto

                $writer = new Xlsx($spreadsheet);
                $writer->save( $ente.'/'.$nombre);
            }else{
                if($tipo == "de1a5"){
                    $spreadsheet = new Spreadsheet();

                    // vacunación incompleto
                    $sheet = $spreadsheet->getActiveSheet();
                    $sheet->setTitle('vacunación');

                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                    $sheet->setCellValue('A1', 'Niños de 1 a 5 años con esquema de vacunación incompleto');

                    $sheet->mergeCells('A1:G1');
                    $spreadsheet->getActiveSheet()->getStyle('A1:G1')->applyFromArray($styleArray);

                    $sheet->setCellValue('A2', 'Identificacion');
                    $sheet->setCellValue('B2', 'Nombre');
                    $sheet->setCellValue('C2', 'Edad (Meses)');
                    $sheet->setCellValue('D2', 'Corregimiento');
                    $sheet->setCellValue('E2', 'Barrio');
                    $sheet->setCellValue('F2', 'Direccion');
                    $sheet->setCellValue('G2', 'Carnet');

                    $spreadsheet->getActiveSheet()->getStyle('A2:G2')->applyFromArray($styleArray);

                    $row = 3;
                    foreach ($data["vacunacion_incompleto_array"] as $item) {
                        if($item["des_corr"] != ""){
                            $des_corr = $item["des_corr"];
                        }else{
                            $des_corr = "CASCO URBANO";
                        }
                        $sheet
                            ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                            ->setCellValue("B{$row}", $item["nombre"])
                            ->setCellValue("C{$row}", $item["edad"])
                            ->setCellValue("D{$row}", $des_corr)
                            ->setCellValue("E{$row}", $item["des_barrio"])
                            ->setCellValue("F{$row}", $item["des_direc"])
                            ->setCellValue("G{$row}", "Desactualizado");
                        ++$row;
                    }

                    // vacunación incompleto

                    // srp completo
                    $spreadsheet->createSheet();
                    $spreadsheet->setActiveSheetIndex(1);
                    $spreadsheet->getActiveSheet()->setTitle('SRP');
                    $sheet = $spreadsheet->getActiveSheet();

                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                    $sheet->setCellValue("A1", 'Niños de 1 a 5 años con esquema de (sarampión, Rubeola, Papera) completo');
                    $sheet->mergeCells("A1:G1");
                    $spreadsheet->getActiveSheet()->getStyle("A1:G1")->applyFromArray($styleArray);

                    $sheet->setCellValue("A2", 'Identificacion');
                    $sheet->setCellValue("B2", 'Nombre');
                    $sheet->setCellValue("C2", 'Edad (Meses)');
                    $sheet->setCellValue("D2", 'Corregimiento');
                    $sheet->setCellValue("E2", 'Barrio');
                    $sheet->setCellValue("F2", 'Direccion');
                    $sheet->setCellValue("G2", 'SRP');

                    $spreadsheet->getActiveSheet()->getStyle("A2:G2")->applyFromArray($styleArray);

                    $row = 3;

                    foreach ($data["srp_completo_array"] as $item) {
                        if($item["des_corr"] != ""){
                            $des_corr = $item["des_corr"];
                        }else{
                            $des_corr = "CASCO URBANO";
                        }
                        $sheet
                            ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                            ->setCellValue("B{$row}", $item["nombre"])
                            ->setCellValue("C{$row}", $item["edad"])
                            ->setCellValue("D{$row}", $des_corr)
                            ->setCellValue("E{$row}", $item["des_barrio"])
                            ->setCellValue("F{$row}", $item["des_direc"])
                            ->setCellValue("G{$row}", $item["tripleviral"]);
                        ++$row;
                    }
                    // srp completo

                    // con esquema completo de Neumococo
                    $spreadsheet->createSheet();
                    $spreadsheet->setActiveSheetIndex(2);
                    $spreadsheet->getActiveSheet()->setTitle('Neumococo');
                    $sheet = $spreadsheet->getActiveSheet();

                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                    $sheet->setCellValue("A1", 'Niños de 1 año con esquema de neumococo completo');
                    $sheet->mergeCells("A1:G1");
                    $spreadsheet->getActiveSheet()->getStyle("A1:G1")->applyFromArray($styleArray);

                    $sheet->setCellValue("A2", 'Identificacion');
                    $sheet->setCellValue("B2", 'Nombre');
                    $sheet->setCellValue("C2", 'Edad (Meses)');
                    $sheet->setCellValue("D2", 'Corregimiento');
                    $sheet->setCellValue("E2", 'Barrio');
                    $sheet->setCellValue("F2", 'Direccion');
                    $sheet->setCellValue("G2", 'Neumococo');

                    $spreadsheet->getActiveSheet()->getStyle("A2:G2")->applyFromArray($styleArray);

                    $row = 3;

                    foreach ($data["neumococo_completo_array"] as $item) {
                        if($item["des_corr"] != ""){
                            $des_corr = $item["des_corr"];
                        }else{
                            $des_corr = "CASCO URBANO";
                        }
                        $sheet
                            ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                            ->setCellValue("B{$row}", $item["nombre"])
                            ->setCellValue("C{$row}", $item["edad"])
                            ->setCellValue("D{$row}", $des_corr)
                            ->setCellValue("E{$row}", $item["des_barrio"])
                            ->setCellValue("F{$row}", $item["des_direc"])
                            ->setCellValue("G{$row}", $item["neumococo"]);
                        ++$row;
                    }
                    // con esquema completo de Neumococo

                    // Niños de 1 a 5 años Vacuna de Polio
                    $spreadsheet->createSheet();
                    $spreadsheet->setActiveSheetIndex(3);
                    $spreadsheet->getActiveSheet()->setTitle('Polio');
                    $sheet = $spreadsheet->getActiveSheet();

                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                    $sheet->setCellValue("A1", 'Niños de 1 a 5 años Vacuna de Polio');
                    $sheet->mergeCells("A1:G1");
                    $spreadsheet->getActiveSheet()->getStyle("A1:G1")->applyFromArray($styleArray);

                    $sheet->setCellValue("A2", 'Identificacion');
                    $sheet->setCellValue("B2", 'Nombre');
                    $sheet->setCellValue("C2", 'Edad (Meses)');
                    $sheet->setCellValue("D2", 'Corregimiento');
                    $sheet->setCellValue("E2", 'Barrio');
                    $sheet->setCellValue("F2", 'Direccion');
                    $sheet->setCellValue("G2", 'Dosis');

                    $spreadsheet->getActiveSheet()->getStyle("A2:G2")->applyFromArray($styleArray);

                    $row = 3;

                    foreach ($data["personas"] as $item) {
                        if($item["des_corr"] != ""){
                            $des_corr = $item["des_corr"];
                        }else{
                            $des_corr = "CASCO URBANO";
                        }
                        $sheet
                            ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                            ->setCellValue("B{$row}", $item["nombre"])
                            ->setCellValue("C{$row}", $item["edad"])
                            ->setCellValue("D{$row}", $des_corr)
                            ->setCellValue("E{$row}", $item["des_barrio"])
                            ->setCellValue("F{$row}", $item["des_direc"])
                            ->setCellValue("G{$row}", $item["polio"]);
                        ++$row;
                    }
                    // con esquema completo de Neumococo

                    // Niños de 1 a 5 años Vacuna de Pentavalente
                    $spreadsheet->createSheet();
                    $spreadsheet->setActiveSheetIndex(4);
                    $spreadsheet->getActiveSheet()->setTitle('Pentavalente');
                    $sheet = $spreadsheet->getActiveSheet();

                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);

                    $sheet->setCellValue("A1", 'Niños de 1 a 5 años Vacuna de Pentavalente');
                    $sheet->mergeCells("A1:G1");
                    $spreadsheet->getActiveSheet()->getStyle("A1:G1")->applyFromArray($styleArray);

                    $sheet->setCellValue("A2", 'Identificacion');
                    $sheet->setCellValue("B2", 'Nombre');
                    $sheet->setCellValue("C2", 'Edad (Meses)');
                    $sheet->setCellValue("D2", 'Corregimiento');
                    $sheet->setCellValue("E2", 'Barrio');
                    $sheet->setCellValue("F2", 'Direccion');
                    $sheet->setCellValue("G2", 'Dosis');

                    $spreadsheet->getActiveSheet()->getStyle("A2:G2")->applyFromArray($styleArray);

                    $row = 3;

                    foreach ($data["personas"] as $item) {
                        if($item["des_corr"] != ""){
                            $des_corr = $item["des_corr"];
                        }else{
                            $des_corr = "CASCO URBANO";
                        }
                        $sheet
                            ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                            ->setCellValue("B{$row}", $item["nombre"])
                            ->setCellValue("C{$row}", $item["edad"])
                            ->setCellValue("D{$row}", $des_corr)
                            ->setCellValue("E{$row}", $item["des_barrio"])
                            ->setCellValue("F{$row}", $item["des_direc"])
                            ->setCellValue("G{$row}", $item["pentavalente"]);
                        ++$row;
                    }
                    // con esquema completo de Neumococo

                    // Niños de 1 a 5 años en riesgos de desnutrición con esquema de vacunación incompleto
                    $spreadsheet->createSheet();
                    $spreadsheet->setActiveSheetIndex(5);
                    $spreadsheet->getActiveSheet()->setTitle('Desnutrición');
                    $sheet = $spreadsheet->getActiveSheet();

                    $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);
                    $spreadsheet->getActiveSheet()->getColumnDimension('I')->setAutoSize(true);

                    $sheet->setCellValue("A1", 'Niños de 1 a 5 años en riesgos de desnutrición con esquema de vacunación incompleto');
                    $sheet->mergeCells("A1:I1");
                    $spreadsheet->getActiveSheet()->getStyle("A1:I1")->applyFromArray($styleArray);

                    $sheet->setCellValue("A2", 'Identificacion');
                    $sheet->setCellValue("B2", 'Nombre');
                    $sheet->setCellValue("C2", 'Edad (Meses)');
                    $sheet->setCellValue("D2", 'Corregimiento');
                    $sheet->setCellValue("E2", 'Barrio');
                    $sheet->setCellValue("F2", 'Direccion');
                    $sheet->setCellValue("G2", 'Desnutrición Aguda');
                    $sheet->setCellValue("H2", 'Desnutrición Global');
                    $sheet->setCellValue("I2", 'Estado Carnet');

                    $spreadsheet->getActiveSheet()->getStyle("A2:I2")->applyFromArray($styleArray);

                    $row = 3;

                    foreach ($data["desn_incompleo_array"] as $item) {

                        if($item["riesgos_desnutricion_aguda_R"] == 0 || $item["riesgos_desnutricion_aguda_R"] == 1){
                            $da = "BAJO";
                        }else{
                            if($item["riesgos_desnutricion_aguda_R"] == 2 || $item["riesgos_desnutricion_aguda_R"] == 3){
                                $da = "MODERADO";
                            }else{  
                                $da = "ALTO";
                            }
                        }
    
                        if($item["riesgos_desnutricion_global_R"] == 0 || $item["riesgos_desnutricion_global_R"] == 1){
                            $dg = "BAJO";
                        }else{
                            if($item["riesgos_desnutricion_global_R"] == 2 || $item["riesgos_desnutricion_global_R"] == 3){
                                $dg = "MODERADO";
                            }else{  
                                $dg = "ALTO";
                            }
                        }

                        if($item["des_corr"] != ""){
                            $des_corr = $item["des_corr"];
                        }else{
                            $des_corr = "CASCO URBANO";
                        }

                        $sheet
                            ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                            ->setCellValue("B{$row}", $item["nombre"])
                            ->setCellValue("C{$row}", $item["edad"])
                            ->setCellValue("D{$row}", $des_corr)
                            ->setCellValue("E{$row}", $item["des_barrio"])
                            ->setCellValue("F{$row}", $item["des_direc"])
                            ->setCellValue("G{$row}", $da)
                            ->setCellValue("H{$row}", $dg)
                            ->setCellValue("I{$row}", "Desactualizado");
                        ++$row;
                    }
                    // Niños de 1 a 5 años en riesgos de desnutrición con esquema de vacunación incompleto

                    $writer = new Xlsx($spreadsheet);
                    $writer->save( $ente.'/'.$nombre);
                }
            }

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

}


