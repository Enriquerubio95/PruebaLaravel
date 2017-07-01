<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class CotizacionController extends Controller{
	public function index(){
		$Cotizacion = DB::table('POS.Cotizaciones')->get();

		if($Cotizacion != null){
			$message['success'] = true;
			$message['message'] = 'Lista de cotizaciones obtenida correctamente';
			$message['data'] = $Cotizacion;
		}

		else{
			$message['success'] = false;
			$message['message'] = 'Hubo un error al procesar su solicitud';
			$message['data'] = $Cotizacion;	
		}

		return response()->json($message);
		}

		public function getcotizacion($id){
			$Cotizacion = DB::table('POS.Cotizaciones')->where('Id', '=', (integer)$id)->get();
			
			if($Cotizacion != '[]'){
				$message['success'] = true;
				$message['message'] = 'Cotización obtenida con exito';
				$message['data'] = $Cotizacion;	
			}

			else{
				$message['success'] = false;
				$message['message'] = 'La cotización no existe';
				$message['data'] = null;		
			}
			
			return response()->json($message);
		}
	}