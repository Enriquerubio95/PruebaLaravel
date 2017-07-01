<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class DetallesController extends Controller{
	public function index(){
		$Detalles = DB::table('POS.DetallesCotizacion')->get();

		if($Detalles != null){
			$message['success'] = true;
			$message['message'] = 'Lista de detalles obtenida correctamente';
			$message['data'] = $Detalles;
		}

		else{
			$message['success'] = false;
			$message['message'] = 'No se encuentra la lista buscada';
			$message['data'] = $Detalles;	
		}
		return response()->json($message);
}
	public function getdetalles($id){
		$Detalle = DB::table('POS.DetallesCotizacion')->where('CotizacionId', '=', (integer)$id)->get();

		if($Detalle != '[]'){
			$message['success'] = true;
			$message['message'] = 'Detalles obtenidos correctamente';
			$message['data'] = $Detalle;
		}
		else{
			$message['success'] = false;
			$message['message'] = 'Los detalles no existen';
			$message['data'] = null;
		}
		return response()->json($message);
	}
}