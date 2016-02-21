//Funciones
$(document).on('ready',function()
{

	$(".btn-saludcoop").click(function(){
		//se obtiene el valor digitado por el usuario
		var searchString = $("#search_box").val();
		var data = 'buscador_saludcoop='+ searchString;

		//Si searchString no esta vacio
		if (searchString){
			//ajax
			$.ajax({
				type: "POST",
				url: "fn_buscar_usuario_saludcoop.php",
				data: data,
				beforeSend: function(html) {
					$("#results").html('');
					$("#searchresults").show();
					$(".word").html(searchString);
				},
				success: function(html){
					$("#results").show();
                    $("#results").append(html);
				}

			});
		}
		return false;
	});

	$('#FechaNacimiento, #FechaPeso, #FechaTalla, #FechaProbablePartoInput, #FechaAtencionPartoInput, #FechaSalidaPartoInput, #FechaConsejeriaLactanciaInput, #ControlRecienNacidoInput, #PlanificacionFamiliarPrimeraVezInput, #FechaSuministroMetodoAnticonceptivoInput, #ControlPrenatalPrimeraVezInput, #UltimoControlPrenatalInput, #ValoracionAgudezaVisualInput, #ConsultaOftalmologiaInput, #FechaDiagnosticoDesnutricionInput, #ConsultaMujerMenorVictimaInput, #ConsultaVictimaViolenciaSexualInput, #ConsultaNutricionInput, #ConsultaPsicologiaInput, #ConsultaCyDPrimeraVezInput, #ConsultaJovenPrimeraVezInput, #ConsultaAdultoPrimeraVezInput, #AsesoriaPreElisaInput, #AsesoriaPostElisaInput, #FechaAntigenoHepatitisBGestantesInput, #FechaSerologiaSifilisInput, #FechaTomaElisaVIHInput, #FechaTSHNeonatalInput, #FechaCitologiaCUInput, #FechaColposcopiaInput, #FechaBiopsiaCervicalInput, #FechaMamografiaInput, #FechaBiopsiaSenoInput, #FechaResultadoBiopsiaSeno, #FechaTomaHemoglobinaInput, #FechaTomaGlisemiaInput, #FechaTomaCreatininaInput, #FechaHemoglobinaGlicosiladaInput, #FechaTomaMicroalbuminuriaInput, #FechaTomaHDLInput, #FechaTomaBaciloscopiaInput, #FechaTerLeishmaniasisInput' ).datepicker();
	$('.dropdown-toggle').dropdown();
	$('#myCarousel').carousel();
	
	$('#myCollapsible').on('hidden', function ()
	{
		$('');
	});

});