<?php

	$mensaje="Buen día, link para la cotización: ". " \nnotas adicionales: " . $msg;

	if(($destinatario=="")){
		echo "Debe ingresar al menos 1 destinatario para continuar.";
	}
	else{
		$from="From: Anonimo <detallecotizacion@plumanegra.com>\r\n";
		$subject="Mensaje de prueba";
		mail($destinatario, $subject, $mensaje, $from);
		echo "Se envio el correo!.";
	}

 ?>