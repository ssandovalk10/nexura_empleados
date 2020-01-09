<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImportCSVRequest;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Import;
use App\Importfails;
use App\Blacklist;
use App\ImportBlacklist;

class ImportsController extends Controller
{
    

    public function index(){

    	return view('imports.index');
    }


     public function csv(){

    	return view('imports.csv');
    }


     public function blacklist(){

    	return view('imports.blacklist');
    }

    public function upload(ImportCSVRequest $request){

    	
    	if($request->file)
    	{
	    	Excel::load($request->file, function($reader)
	    	{

	    			$blacklist = Blacklist::select('phone')
	        													->get();
	      			     
	      		$result = $reader->get();
	      		$objeto = array();
	        	$i=0;



	     		foreach ($result as $data) {
				     
				    $datos =  explode(";", $data->phonemessage);
				   	
			     	 $objeto[$i] = $datos;
				      $i++;
				    }

				    for ( $l=0; $l < sizeof($objeto); $l++)
				    {
				    	 $phone	=  $objeto[$l][0];
				    	 //$arraymessage[$l]=  $objeto[$l][1];

				    	 			if(!ctype_digit(strval($phone)))
				    	 			{

				    	 					//dd('Nonumber', $phone);
				    	 					Importfails::create([

				    	 							'phone' 	=>  $objeto[$l][0],
				    	 							'message' => $objeto[$l][1],
				    	 					]);

				    	 					

				    	 			}
				    	 			else{			
				    	 					
				    	 						$validacion = $this->validateBlacklist($phone);

				    	 						

				    	 						if($validacion == FALSE)	    	 							
				    	 						{

						    	 						Import::create([

									    	 							'phone' 	=>  $phone,
									    	 							'message' => $objeto[$l][1],
						    	 								]);

						    	 				}
						    	 								    	 						
						    	 				
				    	 			}

				    	 				
				    	 	}
				    
				  	

				   
				 })->get();
					
	    		$message = 'Cargado con exito';

				  return redirect()->route('resultados')->with('info', $message);

			}
			else{

					$message = 'Por favor carge un Archivo';

				  return redirect()->route('imports')->with('info', $message);
			}

    }

    public function validateBlacklist($phone){

    		//Cargar datos Almacenados en la Blacklist
      
    	 $blacklist = Blacklist::select('phone', 'fullname')
        													->get();

        //Variable de control para validacion
        $i=0;
        
        	foreach ($blacklist as $value) {
        								
        					$phoneBlack = $value->phone;

        					//Validacion Blacklist
        						if($phoneBlack == $phone)
        						{

        							ImportBlacklist::create([

								    	 							'phone' 	=>  $phone,
								    	 							'message' => '',
								    	 							'fullname' => $value->fullname,
					    	 								]);
        								$i++;

        						}
        						
        		}												
			    	
       //If Final despues de evaluar los registros
         if($i > 0)
                {

                      return true;
                }

            else{

              return false;
            }

			    
    	
    }

     public function Importblacklist(ImportCSVRequest $request){

    
    	Excel::load($request->file, function($reader)
    	{
      			     
      		$result = $reader->get();

      		
      		$objeto = array();
        	$i=0;

     		foreach ($result as $data) {
			     
			    $datos =  explode(";", $data->fullnamephone);
			   	
		     	 $objeto[$i] = $datos;
			      $i++;
			    }
			     for ( $l=0; $l < sizeof($objeto); $l++)
			    {
			    	 $fullname[$l]	=  $objeto[$l][0];

			    	 $phone[$l]	=  $objeto[$l][1];

			    	 Blacklist::create([

			    	 				'fullname' => $objeto[$l][0],
			    	 				'phone'   => $objeto[$l][1]
			    	 		]);
			    }

			

			   
			 })->get();
				
    		$message = 'Cargado con exito';

			  return redirect()->route('imports')->with('info', $message);

    }
}
