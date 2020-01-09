<?php

namespace App\Http\Controllers;


use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use App\Import;
use App\Importfails;
use App\Blacklist;
use App\ImportBlacklist;

class ReportesController extends Controller
{
    
	public function index()
	{
		$blacklist = ImportBlacklist::get();

		$validation = Importfails::get();

		return view('reportes.index', compact('blacklist', 'validation'));
	}


	public function exportcsv()
	{

		   $report = Import::get();
       
               
        Excel::create("reporte", function ($excel) use ($report) {
        $excel->setTitle("Title");
        $excel->sheet("Libro 1", function ($sheet) use ($report) {
            $sheet->loadView('reportes.reporte1')->with('report', $report);
        });
            })->download('csv');
           

	}


	public function limpiar()
	{

		Import::truncate();
		Importfails::truncate();
		Blacklist::truncate();
		ImportBlacklist::truncate();


		$message = "Registros Limpiados con Exito";


        return redirect()->route('imports')->with('info', $message);
	}
}
