<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;

class UsuariosController extends Controller{
	public function index(){
		$Usuarios = DB::table('POS.view_Usuarios')->get();

		return response()->json($Usuarios);
	}
}