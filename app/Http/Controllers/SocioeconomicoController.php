<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Session;
use File;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class SocioeconomicoController extends Controller
{
    public function socioEconomicoPersonas()
    {
        if (Auth::check()) {
            $tipo = request()->get('tipo');
            $id = request()->get('id');
            $consulta = request()->get('consulta');
            if($consulta == 1){
                $analfabetismo = \App\SocioeconomicoDashboard::tasaAnalfabetismo(Session::get('alias'), $tipo, $id);
            }else{
                $analfabetismo = \App\SocioeconomicoDashboard::tasaAnalfabetismoNinios(Session::get('alias'), $tipo, $id);
            }
            
            $respuesta = [
                'analfabetismo' => $analfabetismo,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarAnalfabetas() {
        if (Auth::check()) {
            
            $tipo = request()->get('tipo');
            $torta = request()->get('torta');
            $datos = request()->get('datos');
            $grafico1 = request()->get('grafico1');
            $filtro = request()->get('filtro');
            $hm = request()->get('hm');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'socioeconomico_analfabetas.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Analfabetas', [
                'grafico1' => $grafico1,  
                'filtro' => $filtro, 
                'torta' => $torta, 
                'datos' => $datos, 
                'hm' => $hm, 
                'tipo' => $tipo, 
                'ente' => $ente,
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

    public function desempleo(){
        if (Auth::check()) {
            $tipo = request()->get('tipo');
            $id = request()->get('id');
           
            $tasaDesempleo = \App\SocioeconomicoDashboard::tasaDesempleo(Session::get('alias'), $tipo, $id);
            
            $respuesta = [
                'tasaDesempleo' => $tasaDesempleo,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarDesempleo() {
        if (Auth::check()) {
            
            $torta1 = request()->get('torta1');
            $torta2 = request()->get('torta2');
            $porcentajes = request()->get('porcentajes');
            $data = request()->get('data');
            $filtro = request()->get('filtro');
            $tipo = request()->get('tipo');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'desempleo.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/desempleo', [
                'ente' => $ente, 
                'torta1' => $torta1,  
                'torta2' => $torta2, 
                'porcentajes' => $porcentajes, 
                'data' => $data, 
                'filtro' => $filtro,
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

    public function mercadoLaboral(){
        if (Auth::check()) {
           
            $tasaOcupacion = \App\SocioeconomicoDashboard::tasaOcupacion(Session::get('alias'));
            $PAE = \App\SocioeconomicoDashboard::poblacionEconomicamenteActiva(Session::get('alias'));
            $PET = \App\SocioeconomicoDashboard::personasEdadTrabajar(Session::get('alias'));
            
            $respuesta = [
                'tasaOcupacion' => $tasaOcupacion,
                'PAE' => $PAE,
                'PET' => $PET,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarMercadoLaboral() {
        if (Auth::check()) {
            
            $torta1 = request()->get('torta1');
            $torta2 = request()->get('torta2');
            $torta3 = request()->get('torta3');
            $torta4 = request()->get('torta4');
            $porcentajes = request()->get('porcentajes');
            $topc = request()->get('topc');
            $tasaOcupacion = request()->get('tasaOcupacion');
            $PAE = request()->get('PAE');
            $PET = request()->get('PET');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'mercado_laboral.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/MercadoLaboral', [
                'ente' => $ente, 
                'torta1' => $torta1,  
                'torta2' => $torta2, 
                'torta3' => $torta3, 
                'torta4' => $torta4, 
                'porcentajes' => $porcentajes, 
                'topc' => $topc, 
                'tasaOcupacion' => $tasaOcupacion, 
                'PAE' => $PAE, 
                'PET' => $PET, 
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

    public function poblacion() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');

        if (Auth::check()) {

            $poblacion = \App\SocioeconomicoDashboard::poblacion(Session::get('alias'), $tipo, $id);
            
            $respuesta = [
                'poblacion' => $poblacion,
            ];

            return response()->json($respuesta, 200);
        }
    }

    public function exportarPoblacion() {
        if (Auth::check()) {
            
            $filtro = request()->get('filtro');
            $imagenes = request()->get('imagenes');
            $grafico1 = request()->get('grafico1');
            $grafico2 = request()->get('grafico2');
            $hmp = request()->get('hmp');
            $grafico3 = request()->get('grafico3');
            $grafico4 = request()->get('grafico4');
            $grafico5 = request()->get('grafico5');
            $grafico6 = request()->get('grafico6');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'poblacional.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Poblacion', [
                'filtro' => $filtro,
                'ente' => $ente, 
                'imagenes' => $imagenes,  
                'grafico1' => $grafico1, 
                'grafico2' => $grafico2, 
                'hmp' => $hmp, 
                'grafico3' => $grafico3, 
                'grafico4' => $grafico4, 
                'grafico5' => $grafico5, 
                'grafico6' => $grafico6, 
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

    public function vivienda() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        if (Auth::check()) {
            $inb = \App\SocioeconomicoDashboard::inb(Session::get('alias'), $tipo, $id);
            $nso = \App\SocioeconomicoDashboard::nivel_socioeconomico(Session::get('alias'), $tipo, $id);
            $haci = \App\SocioeconomicoDashboard::hacinamiento(Session::get('alias'), $tipo, $id);
            
            $respuesta = [
                'inb' => $inb,
                'nso' => $nso,
                'haci' => $haci,
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
    
    public function exportarVivienda() {
        if (Auth::check()) {
            
            $torta1 = request()->get('torta1');
            $torta2 = request()->get('torta2');
            $porcentaje = request()->get('porcentaje');
            $torta3 = request()->get('torta3');
            $data = request()->get('data');
            $filtro = request()->get('filtro');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'vivienda.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Vivienda', [
                'filtro' => $filtro,
                'ente' => $ente, 
                'torta1' => $torta1,  
                'torta2' => $torta2, 
                'porcentaje' => $porcentaje, 
                'torta3' => $torta3, 
                'data' => $data, 
                'filtro' => $filtro, 
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

    public function hogares() {
        $tipo = request()->get('tipo');
        $id = request()->get('id');
        if (Auth::check()) {
            $nso = \App\SocioeconomicoDashboard::nivel_socioeconomico_hogares(Session::get('alias'), $tipo, $id);
            $haci = \App\SocioeconomicoDashboard::hacinamiento_hogares(Session::get('alias'), $tipo, $id);
            $estra = \App\SocioeconomicoDashboard::estratificacion(Session::get('alias'), $tipo, $id);
            $servicios = \App\SocioeconomicoDashboard::servicios_hogares(Session::get('alias'), $tipo, $id);
            $jefes_menores_edad = \App\SocioeconomicoDashboard::jefes_menores_edad(Session::get('alias'), $tipo, $id);

            $respuesta = [
                'nso' => $nso,
                'haci' => $haci,
                'estra' => $estra,
                'servicios' => $servicios,
                'jefes_menores_edad' => $jefes_menores_edad
            ];

            return response()->json($respuesta, 200);
        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarHogar() {
        if (Auth::check()) {
            
            $torta1 = request()->get('torta1');
            $torta2 = request()->get('torta2');
            $torta3 = request()->get('torta3');
            $torta4 = request()->get('torta4');
            $porcentajes = request()->get('porcentajes');
            $filtro = request()->get('filtro');

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);

            $nombre = 'hohares.pdf';
            $pdf = app('dompdf.wrapper');
            $pdf->loadView('Pdf/Hogares', [
                'ente' => $ente, 
                'torta1' => $torta1,  
                'torta2' => $torta2, 
                'torta3' => $torta3, 
                'torta4' => $torta4, 
                'porcentajes' => $porcentajes, 
                'filtro' => $filtro, 
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

    public function exportarAnalfabetasExcel() {
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 18,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
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

        $styleArray2 = [
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
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
            
            $ente = request()->get('ente');
            $datos = request()->get('datos');
            $titulo = request()->get('titulo');
           

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
            $nombre = $titulo.".xlsx";

            $spreadsheet = new Spreadsheet();
               
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Lista-Analfabetas');

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            
            $sheet->setCellValue('A1', $ente);
            $sheet->setCellValue('A2', $titulo);
            $sheet->setCellValue('A3', 'Listado de personas analfabetas');

            $sheet->mergeCells('A1:D1');
            $spreadsheet->getActiveSheet()->getStyle('A1:D1')->applyFromArray($styleArray);
            $sheet->mergeCells('A2:D2');
            $spreadsheet->getActiveSheet()->getStyle('A2:D2')->applyFromArray($styleArray);
            $sheet->mergeCells('A3:D3');
            $spreadsheet->getActiveSheet()->getStyle('A3:D3')->applyFromArray($styleArray);

            $sheet->setCellValue('A4', 'Identificación');
            $sheet->setCellValue('B4', 'Nombre');
            $sheet->setCellValue('C4', 'Edad');
            $sheet->setCellValue('D4', 'Localización');
    

            $spreadsheet->getActiveSheet()->getStyle('A4:D4')->applyFromArray($styleArray2);

            $row = 5;
            foreach ($datos as $item) {
                $sheet
                    ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                    ->setCellValue("B{$row}", $item["pnom"]." ".$item["snom"]." ".$item["pape"]." ".$item["sape"])
                    ->setCellValue("C{$row}", $item["edad"]." Años")
                    ->setCellValue("D{$row}", $item["localizacion"]);
                ++$row;
            }
            
            $writer = new Xlsx($spreadsheet);
            $writer->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }

    public function exportarDesempleadosExcel() {
        $styleArray = [
            'font' => [
                'bold' => true,
                'size' => 18,
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
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

        $styleArray2 = [
            'font' => [
                'bold' => true,
                'size' => 14,
            ],
            'borders' => [
                'top' => [
                    'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
                ],
            ],
            'alignment' => [
                'horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT,
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
            
            $ente = request()->get('ente');
            $datos = request()->get('datos');
            $titulo = request()->get('titulo');
           

            $ente = Auth::user()->permisos->where('actual', 1)->first()->ente->nombre;
            File::makeDirectory(public_path().'/'.$ente, $mode = 0777, true, true);
            $nombre = $titulo.".xlsx";

            $spreadsheet = new Spreadsheet();
               
            $sheet = $spreadsheet->getActiveSheet();
            $sheet->setTitle('Lista-Desempleados');

            $spreadsheet->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $spreadsheet->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            
            $sheet->setCellValue('A1', $ente);
            $sheet->setCellValue('A2', $titulo);
            $sheet->setCellValue('A3', 'Listado de personas desempleadas');

            $sheet->mergeCells('A1:F1');
            $spreadsheet->getActiveSheet()->getStyle('A1:F1')->applyFromArray($styleArray);
            $sheet->mergeCells('A2:F2');
            $spreadsheet->getActiveSheet()->getStyle('A2:F2')->applyFromArray($styleArray);
            $sheet->mergeCells('A3:F3');
            $spreadsheet->getActiveSheet()->getStyle('A3:F3')->applyFromArray($styleArray);

            $sheet->setCellValue('A4', 'Identificación');
            $sheet->setCellValue('B4', 'Nombre');
            $sheet->setCellValue('C4', 'Edad');
            $sheet->setCellValue('D4', 'Sexo');
            $sheet->setCellValue('E4', 'Corregimiento');
            $sheet->setCellValue('F4', 'Dirección');
    

            $spreadsheet->getActiveSheet()->getStyle('A4:F4')->applyFromArray($styleArray2);

            $row = 5;
            foreach ($datos as $item) {
                if($item["des_corr"] != ""){
                    $corre = $item["des_corr"];
                }else{
                    $corre = "CASCO URBANO";
                }
                $sheet
                    ->setCellValue("A{$row}", $item["tipo_id"].":".$item["identificacion"])
                    ->setCellValue("B{$row}", $item["pnom"]." ".$item["snom"]." ".$item["pape"]." ".$item["sape"])
                    ->setCellValue("C{$row}", $item["edad"]." Años")
                    ->setCellValue("D{$row}", $item["sexo"])
                    ->setCellValue("E{$row}", $corre)
                    ->setCellValue("F{$row}", $item["des_direc"]);
                ++$row;
            }
            
            $writer = new Xlsx($spreadsheet);
            $writer->save( $ente.'/'.$nombre);

            $respuesta = [
                'nombre' => $ente.'/'.$nombre,
            ];

            return response()->json($respuesta, 200);

        }else {
            return redirect("/index")->with("error", "Su sesion ha terminado");
        }
    }
}
