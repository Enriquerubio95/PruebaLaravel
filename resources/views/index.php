
<html>
<head>
	<title>Cotización</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/multiple-emails.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="js/multiple-emails.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<!-- Nomenclatura
	col-xs-* .- Dispositivos moviles (celulares)
	col-md-* .- Escritorio común
	col-sm-* .- Tablets
	col-lg-* .- Escritorio amplio
-->
<body>

	<!--Ventana modal para compartir -->
	<div class="modal fade" id="ShareModal" tabindex="-1" role="dialog" aria-labelledby="VentanaCompartir" aria-hidden="true">
		<div class="modal-dialog modal-lg" role="document">
			<div class="modal-content" id="CompartirEnlace">
				<div class="modal-header">
					<h4 class="modal-title">Compartir enlace
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true"> &times; </span>
					</button>
					</h4>
				</div> 
				<div class="modal-body">
					<form method="POST" id="contactForm" action="sendEmail.php">
						<div class="form-group" hidden="true">
							<label for="URLOrigen" class="form-control-label">URL:</label>
							<input type="text" class="form-control" id="URLOrigen" name="URLOrigen">
						</div>
						<div class="form-group">
							<label for="Correo" class="form-control-label">Correo de destino: </label>
							<input type="text" name="Correo" id="Correo" class="form-control">
						</div>
						<div class="form-group">
							<label for="Mensaje" class="form-control-label">Mensaje adicional: </label>
							<textarea id="Mensaje" name="Mensaje" class="form-control" title="Mesnsaje adicional para el destinatario"></textarea>
						</div>
					</form>
				</div>
				<div class="modal-footer">
			        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
			        <input type="submit" id="test" name="enviar" class="btn btn-submit" value="Enviar" disabled="disabled">
			    </div>
			</div>
		</div>
	</div>
	<!-- Finaliza ventana modal de compartir -->

	
	
	<!-- inicia modal de error 404 -->
		<div id="myModal" class="error" role="dialog">
  	<!-- Modal content -->
		  	<div class="error-dialog">
		  		<div class="col-md-4 col-xs-9 col-sm-5 col-lg-3 error-content">
		    <div class="error-header">
		      <h2>MDC - Aviso</h2>
		    </div>
		    <br>
		    <div class="error-body">
		    	<div class="error-image">
		    		<img src="/img/404.png" width="40%">
		    	</div>
		    	<br>
		      <p class="col-md-12">La cotización que buscas, no existe</p>
		    </div>
		  	</div>
		  	</div>	
		  	</div>	
	
	<!-- Inicia cotizacion -->
	<div class="container-fluid" id="app">
		<header style="text-align: right; border-bottom: 2px solid silver; padding: 10px">
		<button class="btn btn-default fa fa-download" data-toggle="modal" data-placement="bottom" title="Descargar"></button>
		<button class="btn btn-default fa fa-share-alt" data-toggle="modal" data-target="#ShareModal" data-placement="bottom" title="Compartir"></button>
		<br>
		</header>
		
		<!-- Inicia encabezado -->
		<div class="row" id="encabezado">
			<div class="col-xs-12 col-md-12 col-sm-12">
				<div class="col-md-3 col-xs-1 col-sm-3 col-lg-2" > <!-- En esta parte va un logo --> </div>
				<div class="col-md-6 col-xs-10 col-sm-6 col-lg-8">
					<div class="row" style="text-align: center;">
					<h2> {{ Cliente.Nombre }} </h2>
					<h4> {{ Cliente.RazonSocial }}
					<br>
					{{ Cliente.RFC }}
					<br>
					{{ Cliente.Direccion }}
					<br>
					{{ Cliente.PaginaWeb }} </h4></div>
				</div>

				<div class="col-md-3 col-xs-1 col-sm-3 col-lg-2" > <!-- En esta parte va un logo --> </div>
			</div>		
		</div>
		<!-- Finaliza encabezado -->

		<br>
		<br>

		<!--Inicia sección con información sobre la cotización-->
		<div class="row" id="información">
			<div class="col-xs-12 col-md-3 col-sm-4 col-lg-3 pull-right">
					<table class="table table-condensed table-bordered">
						<thead>
							<tr>
								<td colspan="2" class="title"> COTIZACIÓN </td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td class="titleLeft">FOLIO: </td>
								<td> {{ Folio }}</td>
							</tr>
							<tr>
								<td class="titleLeft">FECHA:</td>
								<td>{{ FechaCreacion }}</td>
							</tr>
						</tbody>
					</table>
			</div>
		</div>		
		<!-- Finaliza sección con información sobre la cotización-->
		
		<!--Inicia sección de datos del cliente -->	
		<div class="row" id="datosCliente">
			<div class="col-xs-12 col-sm-7 col-md-7 col-lg-7 pull-right">
				<table class="table table-condensed table-bordered">
					<thead>
						<tr>
							<td class="col-xs-8 col-sm-8 col-md-8 col-lg-9 title">CLIENTE ({{ NombreCliente }})</td>
							<td class="col-xs-4 col-sm-4 col-md-4 col-lg-3 title">DESCARGAR</td>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td>{{RazonSocial}}</td>
							<td rowspan="4"></td>
						</tr>
						<tr>
							<td>{{RFC}}</td>
						</tr>
						<tr>
							<td>{{Direccion}}</td>
						</tr>
						<tr>
							<td>{{Ciudad}}</td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
		<!-- Finaliza sección con datos del cliente -->

		<!-- Inicia tabla de articulos -->
		<div class="row">
			<div class="col-xs-12">
				<div class="table-responsive">
					<table class="table table table-condensed table-bordered" id="articulos">
						<thead class="title">
							<tr>
								<th style="text-align: center;" >#</th>
								<th style="text-align: center;" >UNI</th>
								<th style="text-align: center;" >DESCRIPCIÓN</th>
								<th class="alineadoDerecha">CANTIDAD</th>
								<th class="alineadoDerecha">P.UNIT</th>
								<th class="alineadoDerecha">TOTAL</th>
							</tr>
						</thead>
						<tbody>
							<tr v-for="(articulo, index) in articulos" :index="index">
								<td style="text-align: center;">{{index + 1}}</td>
								<td style="text-align: center;">{{articulo.Id}}</td>
								<td>{{articulo.Descripcion}}</td>
								<td style="text-align: right;">{{articulo.Cantidad}}</td>
								<td style="text-align: right;">{{articulo.Precio}}</td>
								<td style="text-align: right;">{{articulo.Importe}}</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>
		<!-- Finaliza tabla de artículos -->


		<!-- Inicia sección de comentarios y datos de pago -->
		<div class="row">
				<!-- Inicia sección con datos de pago -->
				<div class="col-xs-12 col-sm-5 col-md-3 col-lg-4 pull-right" style="text-align: right">
					<table class="table table-condensed table table-bordered">
						<tbody>
							<tr>
								<td class="important"> <b> SUBTOTAL: </b></td>
								<td>$10,000,000.00</td>
							</tr>
							<tr>
								<td class="important"> <b> IVA: </b></td>
								<td>$10,000,000.00</td>
							</tr>
							<tr>
								<td class="important"> <b> IEPS: </b> </td>
								<td>$10,000,000.00</td>
							</tr>
							<tr>
								<td class="important"> <b> TOTAL: </b></td>
								<td>$10,000,000.00</td>
							</tr>
						</tbody>
				</table>
				</div>
				<!-- Finaliza sección con datos de pago -->

				<!-- Inicia sección de comentarios -->
				<div class="col-sm-7 col-md-9 col-lg-8 pull-left" id="comentarios">
					<div class="row" align="justify">
						<div class="col-xs-12 col-md-12 col-lg-12">{{Mensaje}}</div>
					</div>

					<div class="row" align="justify">
						<div class="col-xs-12 col-md-12 col-lg-12">{{Pago}}</div>
					</div>

					<div class="row" align="justify">
						<div class="col-xs-12 col-md-12 col-lg-12">{{Cuenta}}</div>
					</div>

					<div class="row" align="justify">
					<div class="col-xs-12 col-md-12 col-lg-12">{{Datos}}</div>
					</div>
				</div>
		<!-- Finaliza sección de comentarios -->

		</div>
		<!-- Finaliza sección de comentarios y datos de pago -->
	
	</div>
	<!-- Finaliza cotización -->

	<!-- Implementación de Vue -->
	<script type="text/javascript" src="js/vue.min.js"></script>
	<script src="https://unpkg.com/vue-router/dist/vue-router.js"></script>
	<script type="text/javascript" src="js/script.js"></script>

</body>