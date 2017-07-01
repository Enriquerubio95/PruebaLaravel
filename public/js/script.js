$(document).ready(function(){
    $('[data-toggle="modal"]').tooltip({ trigger: "hover" });
});

function shareUrl(){
	console.log(window.location.href);
};

$('#Correo').multiple_emails();

$('#ShareModal').on('show.bs.modal', function (event) {
  var button = $(event.relatedTarget) 
  var recipient = window.location.href 
  var modal = $(this)
  modal.find('#URLOrigen').val(recipient)
});

/*-- Validar si campo de email es valido --*/
$('#Correo').bind('change', check);

function check(){
	if($('#Correo').val() != '[]'){
		$('#test').removeAttr('disabled');
	}
	else{
		$('#test').attr('disabled', 'disabled');
	}

};


/* -- Funcion para enviar correo -- */
$('#test').on("click", function(e){
	var url = $('#URLOrigen').val(),
		msg = $('#Mensaje').val(),
		email = $('#Correo').val(),
		correos = JSON.stringify(email);

		$.ajax({
		url: "/Api/sendEmail",
		data: decodeURIComponent(jQuery.param({correo: correos, urlorigen: url, mensajeExtra: msg})),
		type: 'POST',
		success: function(data){
			console.log('Exito');
		},

		error: function(data){
			console.log('falla');
		}
	}), e.preventDefault()
});


$('body').on('hidden.bs.modal', '.modal', function () {
     $(this).find('#Correo').val('');
     $(this).find('#test').attr('disabled', 'disabled');
     $(this).find('textarea').val('');
     $(this).find('li').remove();
});

new Vue({
	el: '#encabezado',
	data: {
			Cliente: []
	}/*,
	mounted: function () {
			var self = this;
			$.ajax({
				url: 'http://localhost:8000/Api/Usuarios/2',
				method: 'GET',
				success: function (data) {
					if(data.success == true){
						}
					},
					error: function(data){
				}
				});
			}*/
});



var apiURL = '/Api/Detalles_cotizacion/';

var test = new Vue({
	el: '#articulos',
	data: {
		articulos: null
	},

	created: function(){
		this.fetchData()
	},

	methods: {
		fetchData: function(){
			var xhr = new XMLHttpRequest()
			var self = this
			xhr.open('GET', apiURL + window.location.search.split('=')[1]),
			xhr.onload = function () {
				var data = JSON.parse(xhr.responseText)
				if(data.success==true){
				self.articulos = data.data
				}
			}
			xhr.send()
		}
	}

});

new Vue({
	el: '#información',
	data:{
		Folio: null,
		FechaCreacion: null
	},
	created: function(){
		this.fillData()
	},

	methods: {
		fillData: function(){
			var xhr = new XMLHttpRequest()
			var self = this
			xhr.open('GET', '/Api/Cotizaciones/' + window.location.search.split('=')[1]),
			xhr.onload = function(){
				var data = JSON.parse(xhr.responseText)
				if(data.success == true){
					self.Folio = data.data[0].Folio
					var serverDate = new Date(data.data[0].FechaCreacion),
					 month = serverDate.getMonth(),
					 day = serverDate.getDate(),
					 year = serverDate.getFullYear();
					 if(day < 10){
					 	day = "0" + day;
					 }
					 if(month < 10){
					 	month = "0" + month;
					 }

					date = day + "/" + month + "/" + year;
					self.FechaCreacion = date;
					document.getElementById('app').style.display = "block";
				}
				else{
					var myModal = document.getElementById('myModal');
					myModal.style.display = "block";
				}
			}
			xhr.send()
		}
	}
});

new Vue({
	el: '#datosCliente',
	data:{
		NombreCliente: 'Pluma Negra',
		RazonSocial: 'Luis Enrique Sapien Rubio',
		RFC: 'SARL950527',
		Direccion: 'Ave. Conocida 103, Col. Santa Rosa',
		Ciudad: 'Chihuahua, Chihuahua, México, CP. 31050'
	}
});


new Vue({
	el: '#comentarios',
	data:{
		Mensaje: 'En esta parte es donde se supone debe ir un mensaje dirigido al cliente en el cual se le agradece por la compra, se incluyen datos fiscales, entre otros (cargado con vue).',
		Pago: 'Instrucciones de pago.',
		Cuenta: 'Número de cuenta.',
		Datos: 'Datos.'
	}
});