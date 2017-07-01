<?php
 
namespace App\Http\Controllers;
 
use App\Mail\StaticParams;
use Illuminate\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
 
class sendMessage extends Controller
{
	public function newMessage(Request $request){
		$correo = $request->get('correo');
		$mensaje = $request->get('mensajeExtra');
		$url = $request->get('urlorigen');

		$datos = array('correo' => $correo, 'url' => $url, 'comentarios' => $mensaje);

		if($url != null && $correo != null){
			$message['success'] = true;
			$message['message'] = 'Tus datos han sido enviados con exito';
			$message['data'] = $datos;
		}
		else{
			$message['success'] = false;
			$message['message'] = 'No se pudo procesar tu petición, verifica que los datos ingresados sean correctos';
			$message['data'] = null;	
		}

		/*return response()->json($message);*/
		return view('sendEmail')->with('msg', $mensaje)->with('destinatario', $correo)->with('url', $url);
	}
    
}