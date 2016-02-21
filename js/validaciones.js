$(document).on('ready',function()
{
	// INICIO - VALIDACION FORMULARIO 4505 - VALIDACIÓN DE CAMPOS VACIOS -----------------------------------

		$("#form-res-4505").submit(function()
		{
			// Variables Preguntas

			var Pregunta3 = $('#TipoIdUsuario').val();
			var Pregunta4 = $('#NumeroIdUsuario').val();
			var Pregunta5 = $('#Apellido1').val();
			var Pregunta6 = $('#Apellido2').val();
			var Pregunta7 = $('#Nombre1').val();
			var Pregunta8 = $('#Nombre2').val();
			var Pregunta9 = $('#FechaNacimiento').val();
			var Pregunta10 = $('#Sexo').val();
			var Pregunta11 = $('#PertenenciaEtnica').val();
			var Pregunta12 = $('#CodigoOcupacion').val();
			var Pregunta13 = $('#CodigoNivelEducativo').val();
			var Pregunta14 = $('#Gestacion').val();
			var Pregunta15 = $('#SifilisGestacional').val();
			var Pregunta16 = $('#HipertensionInducidaGestacion').val();
			var Pregunta17 = $('#HipotiroidismoCongenito').val();
			var Pregunta18 = $('#SintomaticoRespiratorio').val();
			var Pregunta19 = $('#Tuberculosis').val();
			var Pregunta20 = $('#Lepra').val();
			var Pregunta21 = $('#ObesidadDesnutricion').val();
			var Pregunta22 = $('#VictimaMaltrato').val();
			var Pregunta23 = $('#VictimaViolenciaSexual').val();
			var Pregunta24 = $('#InfeccionTrasmisionSexual').val();
			var Pregunta25 = $('#EnfermedadMental').val();
			var Pregunta26 = $('#CancerCervix').val();
			var Pregunta27 = $('#CancerSeno').val();
			var Pregunta28 = $('#FluorosisDental').val();
			var Pregunta29 = $('#FechaPeso').val();
			var Pregunta30 = $('#PesoKilogramos').val();
			var Pregunta31 = $('#FechaTalla').val();
			var Pregunta32 = $('#TallaCentimetros').val();
			var Pregunta33 = $('#FechaProbablePartoInput').val();
			var Pregunta34 = $('#EdadGestacional').val();
			var Pregunta35 = $('#BCG').val();
			var Pregunta36 = $('#HepatitisB').val();
			var Pregunta37 = $('#Pentavalente').val();
			var Pregunta38 = $('#Polio').val();
			var Pregunta39 = $('#DPT').val();
			var Pregunta40 = $('#Rotavirus').val();
			var Pregunta41 = $('#Neumococo').val();
			var Pregunta42 = $('#InfluenzaN').val();
			var Pregunta43 = $('#FiebreAmarillaN1').val();
			var Pregunta44 = $('#HepatitisA').val();
			var Pregunta45 = $('#TripleViralN').val();
			var Pregunta46 = $('#VPH').val();
			var Pregunta47 = $('#TdTtMEF').val();
			var Pregunta48 = $('#ControlPlacaBacteriana').val();
			var Pregunta49 = $('#FechaAtencionPartoInput').val();
			var Pregunta50 = $('#FechaSalidaPartoInput').val();
			var Pregunta51 = $('#FechaConsejeriaLactanciaInput').val();
			var Pregunta52 = $('#ControlRecienNacidoInput').val();
			var Pregunta53 = $('#PlanificacionFamiliarPrimeraVezInput').val();
			var Pregunta54 = $('#SuministroMetodoAnticonceptivo').val();
			var Pregunta55 = $('#FechaSuministroMetodoAnticonceptivoInput').val();
			var Pregunta56 = $('#ControlPrenatalPrimeraVezInput').val();
			var Pregunta57 = $('#ControlPrenatalInput').val();
			var Pregunta58 = $('#UltimoControlPrenatalInput').val();
			var Pregunta59 = $('#SuministroAcidoFolico').val();
			var Pregunta60 = $('#SuministroSulfatoFerroso').val();
			var Pregunta61 = $('#SuministroCarbonatoCalcio').val();
			var Pregunta62 = $('#ValoracionAgudezaVisualInput').val();
			var Pregunta63 = $('#ConsultaOftalmologiaInput').val();
			var Pregunta64 = $('#FechaDiagnosticoDesnutricionInput').val();
			var Pregunta65 = $('#ConsultaMujerMenorVictimaInput').val();
			var Pregunta66 = $('#ConsultaVictimaViolenciaSexualInput').val();
			var Pregunta67 = $('#ConsultaNutricionInput').val();
			var Pregunta68 = $('#ConsultaPsicologiaInput').val();
			var Pregunta69 = $('#ConsultaCyDPrimeraVezInput').val();
			var Pregunta70 = $('#SuministroSulfatoFerrosoMenor').val();
			var Pregunta71 = $('#SuministroVitaminaAMenor').val();
			var Pregunta72 = $('#ConsultaJovenPrimeraVezInput').val();
			var Pregunta73 = $('#ConsultaAdultoPrimeraVezInput').val();
			var Pregunta74 = $('#PreservativosITSInput').val();
			var Pregunta75 = $('#AsesoriaPreElisaInput').val();
			var Pregunta76 = $('#AsesoriaPostElisaInput').val();
			var Pregunta77 = $('#PacienteEnfermedadMental').val();
			var Pregunta78 = $('#FechaAntigenoHepatitisBGestantesInput').val();
			var Pregunta79 = $('#ResultadoAntigenoHepatitisBGestantes').val();
			var Pregunta80 = $('#FechaSerologiaSifilisInput').val();
			var Pregunta81 = $('#ResultadoSerologiaSifilis').val();
			var Pregunta82 = $('#FechaTomaElisaVIHInput').val();
			var Pregunta83 = $('#ResultadoElisaVIH').val();
			var Pregunta84 = $('#FechaTSHNeonatalInput').val();
			var Pregunta85 = $('#ResultadoTSHNeonatal').val();
			var Pregunta86 = $('#TamizajeCencerCU').val();
			var Pregunta87 = $('#FechaCitologiaCUInput').val();
			var Pregunta88 = $('#CitologiaCUResultados').val();
			var Pregunta89 = $('#CalidadMuestraCitologia').val();
			var Pregunta90 = $('#CodigoHabilitacionIPSTomaMuestra').val();
			var Pregunta91 = $('#FechaColposcopiaInput').val();
			var Pregunta92 = $('#CodigoHabilitacionTomaColposcopia').val();
			var Pregunta93 = $('#FechaBiopsiaCervicalInput').val();
			var Pregunta94 = $('#ResultadoBiopsiaCervical').val();
			var Pregunta95 = $('#CodigoHabilitacionTomaBiopsia').val();
			var Pregunta96 = $('#FechaMamografiaInput').val();
			var Pregunta97 = $('#ResultadoMamografia').val();
			var Pregunta98 = $('#CodigoHabilitacionTomaMamografia').val();
			var Pregunta99 = $('#FechaBiopsiaSenoInput').val();
			var Pregunta100 = $('#FechaResultadoBiopsiaSeno').val();
			var Pregunta101 = $('#ResultadoBiopsiaSeno').val();
			var Pregunta102 = $('#CodigoHabilitacionBiopsiaSeno').val();
			var Pregunta103 = $('#FechaTomaHemoglobinaInput').val();
			var Pregunta104 = $('#ResultadoHemoglobina').val();
			var Pregunta105 = $('#FechaTomaGlisemiaInput').val();
			var Pregunta106 = $('#FechaTomaCreatininaInput').val();
			var Pregunta107 = $('#ResultadoCreatinina').val();
			var Pregunta108 = $('#FechaHemoglobinaInput').val();
			var Pregunta109 = $('#ResultadoHemoglobina').val();
			var Pregunta110 = $('#FechaTomaMicroalbuminuriaInput').val();
			var Pregunta111 = $('#FechaTomaHDLInput').val();
			var Pregunta112 = $('#FechaTomaBaciloscopiaInput').val();
			var Pregunta113 = $('#ResultadoBaciloscopia').val();
			var Pregunta114 = $('#TratamientoHipotiroidismoCongenito').val();
			var Pregunta115 = $('#TratamientoSifilisGestacional').val();
			var Pregunta116 = $('#TratamientoSifilisCongenita').val();
			var Pregunta117 = $('#TratamientoLepra').val();
			var Pregunta118 = $('#FechaTerLeishmaniasisInput').val();

			var validado4505 = true;

			// VALIDACIÓN PREGUNTAS - VALIDACION DE CAMPOS VACIOS

			// Pregunta 3

			if(Pregunta3==='')
			{
				alert ("Falta Tipo Id Usuario - Pregunta 3");
				$('#TipoIdUsuario').focus();
				$('#control-pregunta3').addClass("error");
				validado4505 = false;

				$('#TipoIdUsuario').click(function()
				{	
					$('#control-pregunta3').removeClass('error');
				});
				return false;

			}

			// Pregunta 4 Numero de Identificación del Usuario

			if(Pregunta4==='')
			{
				alert ("Falta Numero Identificacion Usuario - Pregunta 4");
				$('#NumeroIdUsuario').focus();			
				validado4505 = false;
				return false;
			}

			// Pregunta 5 Primer Apellido del Usuario

			if(Pregunta5==='')
			{	
				alert ("Falta Primer Apellido del Usuario - Pregunta 5");
				$('#Apellido1').focus();	
				validado4505 = false;
				return false;
			}

			// Pregunta 6 Segundo Apellido del Usuario

			if (Pregunta6==='')
			{
				$('#Apellido1').val('NONE');
			}

			// Pregunta 7 Primer Nombre del Usuario

			if(Pregunta7==='')
			{
				alert ("Falta Primer Nombre del Usuario - Pregunta 7");
				$('#Nombre1').focus();	
				validado4505 = false;
				return false;
			}

			// Pregunta 8 Segundo Nombre del Usuario

			if(Pregunta8==='')
			{
				$('#Nombre2').val('NONE');
			}

			// Pregunta 9 Fecha Nacimiento

			if (Pregunta9==='')
			{
				alert ("Falta Fecha de Nacimiento - Pregunta 9");
				$('#FechaNacimiento').focus();	
				validado4505 = false;
				return false;
			}

			function calcularEdad (fecha)
			{
				var today = new Date();
				var FechaNacimiento = new Date($('#FechaNacimiento').val());
				var todayYear = today.getFullYear();
				var todayMonth = today.getMonth() + 1;
				var todayDay = today.getDate();
				var FechaNacimientoYear = FechaNacimiento.getFullYear();
				var FechaNacimientoMonth = FechaNacimiento.getMonth() + 1;
				var FechaNacimientoDay = FechaNacimiento.getUTCDate();
				var edad;
				//alert (today);
				//alert (FechaNacimiento);
				//alert (todayYear);
				//alert ("Mes Actual: "+todayMonth);
				//alert (todayDay);
				//alert (FechaNacimientoYear);
				//alert ("Mes de Nacimiento: "+FechaNacimientoMonth);
				//alert (FechaNacimientoDay);

				if (todayMonth>FechaNacimientoMonth)
				{
					//alert ("Mes Hoy Mayor a Mes de Nacimiento");
					edad = todayYear - FechaNacimientoYear;
					//alert (edad);
					return edad;
				} else if (todayMonth<FechaNacimientoMonth)
				{
					//alert ("Mes Hoy Menor a Mes de Nacimiento");
					edad = todayYear - FechaNacimientoYear - 1;
					//alert (edad);
					return edad;
					
				} else if (todayMonth=FechaNacimientoMonth)
				{
					//alert ("Mes Hoy Igual a Mes de Nacimiento");
					
					if (todayDay>=FechaNacimientoDay)
					{
						edad = todayYear - FechaNacimientoYear;
						//alert ("Dia Hoy Mayor Fecha Nacimiento y Edad es "+edad);
						return edad;

					} else if (todayDay<FechaNacimientoDay)
					{
						edad = todayYear - FechaNacimientoYear - 1;
						//alert (edad);
						return edad;
					}
				}
			};			

			var edad =  calcularEdad ($('#FechaNacimiento').val());

			// Pregunta 10 Sexo

			if(Pregunta10==='')
			{
				alert ("Falta Sexo - Pregunta 10");
				$('#Sexo').focus();	
				validado4505 = false;
				return false;
			}

			// Pregunta 11 Pertenencia Étnica

			if(Pregunta11==='')
			{
				alert ("Falta Pertenencia Étnica - Pregunta 11");
				$('#PertenenciaEtnica').focus();	
				validado4505 = false;
				return false;
			}

			// Pregunta 12 Codigo Ocupacion

			if (Pregunta12==='')
			{
				alert ("Falta Codigo Ocupación - Pregunta 12");
				$('#CodigoOcupacion').focus();	
				validado4505 = false;
				return false;
			}

			// Pregunta 13 Código Nivel Educativo

			if (Pregunta13==='')
			{
				alert ("Falta Codigo Nivel Educativo - Pregunta 13");
				$('#CodigoNivelEducativo').focus();	
				validado4505 = false;
				return false;
			}

			// Pregunta 14 Gestación

			if (Pregunta14==='')
			{
				alert ("Falta Gestación - Pregunta 14");
				$('#Gestacion').focus();
				validado4505 = false;
				return false;
			}

			if (Pregunta14==='1' && Pregunta10!='F')
			{
				alert ("Si la Pregunta 14. Gestación Registra 1, La Pregunta 10. Sexo debe Corresponder a F");
				validado4505 = false;
				return false;
			}

			// Pregunta 15 Sífilis Gestacional o Congénita

			if (Pregunta15==='')
			{
				alert ("Falta Sífilis Gestacional o Congénita - Pregunta 15");
				$('#SifilisGestacional').focus();
				validado4505 = false;
				return false;
			}

			if (Pregunta15==='1' && Pregunta10!='F')
			{
				alert ("Si la Pregunta 15. Sifilis Gestacional Registra 1, La Pregunta 10. Sexo debe Corresponder a F");
				validado4505 = false;
				return false;
			}

			if (Pregunta15==='1' && Pregunta14!='1')
			{
				alert ("Si la Pregunta 15. Sifilis Gestacional Registra 1, La Pregunta 14. Gestación debe Corresponder a 1");
				validado4505 = false;
				return false;
			}

			// Pregunta 16 Hipertensión Inducida por la Gestación

			if(Pregunta16==='')
			{
				alert ("Falta Hipertensión Inducida por la Gestación - Pregunta 16");
				$('#HipertensionInducidaGestacion').focus();
				validado4505 = false;
				return false;
			}

			if (Pregunta16==='1' && Pregunta10!='F')
			{
				alert ("Si la Pregunta 16. Hipertension Inducida por la Gestación Registra 1, La Pregunta 10. Sexo debe Corresponder a F");
				validado4505 = false;
				return false;
			}

			if (Pregunta16==='1' && Pregunta14!='1')
			{
				alert ("Si la Pregunta 16. Hipertension Inducida por la Gestación Registra 1, La Pregunta 14. Gestación debe Corresponder a 1");
				validado4505 = false;
				return false;				
			}

			// Pregunta 17 Hipotiroidismo Congénito

			if(Pregunta17==='')
			{
				alert ("Falta Hipotiroidismo Congénito - Pregunta 17");
				$('#HipotiroidismoCongenito').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 18 Sintomático Respiratorio

			if(Pregunta18==='')
			{
				alert ("Falta Sintomático Respiratorio - Pregunta 18");
				$('#SintomaticoRespiratorio').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 19 Tuberculosis Multidrogoresistente

			if(Pregunta19==='')
			{
				alert ("Falta Tuberculosis Multidrogoresistente - Pregunta 19");
				$('#Tuberculosis').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 20 Lepra

			if(Pregunta20==='')
			{
				alert ("Falta Lepra - Pregunta 20");
				$('#Lepra').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 21 Obesidad o Desnutrición Proteico Calórica

			if (Pregunta21==='')
			{
				alert ("Falta Obesidad o Desnutrición Proteico Calórica - Pregunta 21");
				$('#ObesidadDesnutricion').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 22 Víctima de Maltrato

			if (Pregunta22==='')
			{
				alert ("Falta Víctima de Maltrato - Pregunta 22");
				$('#VictimaMaltrato').focus();
				validado4505 = false;
				return false;
			}

			if (Pregunta22==='1' && Pregunta10!='F')
			{
				alert ("Si la Pregunta 22. Victima Maltrato Registra 1, La Pregunta 10. Sexo debe Corresponder a F");
				validado4505 = false;
				return false;
			}

			var edad = calcularEdad($('#FechaNacimiento').val());
			if (Pregunta22==='2' && edad > 19)
			{
				alert ("Si la Pregunta 22. Victima Maltrato Registra 2, El calculo de la Edad debe ser Mayo a 19 Años");
				validado4505 = false;
				return false;
			}

			// Pregunta 23 Víctima de Violencia Sexual

			if(Pregunta23==='')
			{
				alert ("Falta Víctima de Violencia Sexual - Pregunta 23");
				$('#VictimaViolenciaSexual').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 24 Infecciones de Trasmisión Sexual

			if(Pregunta24==='')
			{
				alert ("Falta Infecciones de Trasmisión Sexual - Pregunta 24");
				$('#InfeccionTrasmisionSexual').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 25 Enfermedad Mental

			if(Pregunta25==='')
			{
				alert ("Falta Enfermedad Mental - Pregunta 25");
				$('#EnfermedadMental').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 26 Cáncer de Cervix

			if(Pregunta26==='')
			{
				alert ("Falta Cáncer de Cervix - Pregunta 26");
				$('#CancerCervix').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 27 Cáncer de Seno

			if (Pregunta27==='')
			{
				alert ("Falta Cáncer de Seno - Pregunta 27");
				$('#CancerSeno').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 28 Fluorosis Dental 

			if (Pregunta28==='')
			{
				alert ("Falta Fluorosis Dental - Pregunta 28");
				$('#FluorosisDental').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 29 Fecha del Peso

			if (Pregunta29==='')
			{
				alert ("Falta Fecha del Peso - Pregunta 29");
				$('#FechaPeso').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 30 Peso en Kilogramos

			if (Pregunta30==='')
			{
				alert ("Falta Peso en Kilogramos - Pregunta 30");
				$('#PesoKilogramos').focus();
				validado4505 = false;
				return false;
			}

			if (Pregunta30==='999' && Pregunta29!='1800-01-01')
			{
				alert ("Si la Pregunta 30. Peso en Kilogramos Registra 999, la Pregunta 29 Fecha Peso debe Registrar 1800-01-01");
				validado4505 = false;
				return false;
			}

			// Pregunta 31 Fecha de la Talla

			if (Pregunta31==='')
			{
				alert ("Falta Fecha de la Talla - Pregunta 31");
				$('#FechaTalla').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 32 Talla en Centimetros

			if (Pregunta32==='')
			{
				alert ("Falta Talla en Centimetros - Pregunta 32");
				$('#TallaCentimetros').focus();
				validado4505 = false;
				return false;
			}

			if (Pregunta32==='999' && Pregunta31!='1800-01-01')
			{
				alert ("Si la Pregunta 32. Talla en Centimetros Registra 999, la Pregunta 31 Fecha de la Talla debe Registrar 1800-01-01");
				validado4505 = false;
				return false;				
			}

			// Pregunta 33 Fecha Probable de Parto

			// Validar que cuando la variable 33 registre un dato diferente a 1845-01-01 
			// la variable 10 corresponda a F.
			// Validar que cuando la variable 33 registre un dato diferente a 1845-01-01 
			// la variable 14 corresponda a 1.

			if (Pregunta33==='')
			{
				alert ("Falta Fecha Probable de Parto - Pregunta 33");
				$('#FechaProbablePartoInput').focus();
				validado4505 = false;
				return false;
			}

			if (Pregunta14 === '0')
			{
				$('#FechaProbablePartoInput').val('1845-01-01');
			} else if (Pregunta14 === '1') {
				$('#FechaProbablePartoInput').val('1800-01-01');
			}

			// Pregunta 34 Edad Gestacional al Nacer

			// Validar que cuando la variable 34 registre un valor diferente a 0 
			// el cálculo de la edad* sea menor a 6 años.

			if (edad > 5)
			{
				$('#EdadGestacional').val('0');
			}

			if (Pregunta34==='')
			{
				alert ("Falta Edad Gestacional al Nacer - Pregunta 34");
				$('#EdadGestacional').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 35 BCG
			// La opción 0 se usa en mayores de 6 años de edad, que no tienen condiciones especiales que ameriten la vacuna.

			if (edad > 6)

			{
				$('#BCG').val('0');
			} 

			if (Pregunta35==='')
			{
				alert ("Falta BCG - Pregunta 35");
				$('#BCG').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 36 Hepatitis B Menores de 1 Año

			if (Pregunta36==='')
			{
				alert ("Falta Hepatitis B Menores de 1 Año - Pregunta 36");
				$('#HepatitisB').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 37 Pentavalente
			// La opción 0 se usa para mayores de 2 años de edad.

			if (edad > 2)
			{
				$('#Pentavalente').val('0');
			} 
			

			if (Pregunta37==='')
			{
				alert ("Falta Pentavalente - Pregunta 37");
				$('#Pentavalente').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 38 Polio
			// La opción 0 se usa en mayores de 6 años.

			if (edad > 6)
			{
				$('#Polio').val('0');
			} 

			if (Pregunta38==='')
			{
				alert ("Falta Polio - Pregunta 38");
				$('#Polio').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 39 DPT Menores de 5 Años
			// La opción 0 se usa en mayores de 6 años de edad.

			if (edad > 6)
			{
				$('#DPT').val('0');
			} 

			if (Pregunta39==='')
			{
				alert ("Falta DPT Menores de 5 Años - Pregunta 39");
				$('#DPT').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 40 Rotavirus
			// La opción 0 se usa en mayores de 8 meses de edad.

			if (edad > 1)
			{
				$('#Rotavirus').val('0');
			} 

			if (Pregunta40==='')
			{
				alert ("Falta Rotavirus - Pregunta 40");
				$('#Rotavirus').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 41 Neumococo

			if (edad > 3)
			{
				$('#Neumococo').val('0');
			} 

			if (Pregunta41==='')
			{
				alert ("Falta Neumococo - Pregunta 41");
				$('#Neumococo').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 42 Influenza Niños

			if (edad > 3)
			{
				$('#InfluenzaN').val('0');
			}

			if (Pregunta42==='')
			{
				alert ("Falta Influenza Niños - Pregunta 42");
				$('#InfluenzaN').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 43 Fiebre Amarilla Niños de 1 Año

			if (edad > 2)
			{
				$('#FiebreAmarillaN1').val('0');
			}

			if (Pregunta43==='')
			{
				alert ("Falta Fiebre Amarilla Niños de 1 Año - Pregunta 43");
				$('#FiebreAmarillaN1').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 44 Hepatitis A
			// La opción 0 se usa en mayores de 2 años.

			if (edad > 2)
			{
				$('#HepatitisA').val('0');
			}

			if (Pregunta44==='')
			{
				alert ("Falta Hepatitis A - Pregunta 44");
				$('#HepatitisA').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 45 Triple Viral Niños
			// La opción 0 se usa en mayores de 6 años de edad.

			if (edad > 6)
			{
				$('#TripleViralN').val('0');
			}

			if (Pregunta45==='')
			{
				alert ("Falta Triple Viral Niños - Pregunta 45");
				$('#TripleViralN').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 46 Virus del Papiloma Humano (VPH)

			if (Pregunta46==='')
			{
				alert ("Falta Virus del Papiloma Humano (VPH) - Pregunta 46");
				$('#VPH').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 47 TD o TT Mujeres en Edad Fértil 15 a 49 Años

			if (edad > 49)
			{
				$('#TdTtMEF').val('0');
			} else if (edad < 15)
			{
				$('#TdTtMEF').val('0');
			}


			if (Pregunta47==='')
			{
				alert ("Falta TD o TT Mujeres en Edad Fértil 15 a 49 Años - Pregunta 47");
				$('#TdTtMEF').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 48 Control de Placa Bacteriana

			// Validar que cuando la variable 48 registre un valor diferente a 0 
			// el cálculo de la edad* debe ser mayor o igual a 2 años.

			if (Pregunta48==='')
			{
				alert ("Falta Control de Placa Bacteriana - Pregunta 48");
				$('#ControlPlacaBacteriana').focus();
				validado4505 = false;
				return false;
			}

			if (edad < 2)
			{
				$('#ControlPlacaBacteriana').val('0');
			}

			// Pregunta 49 Fecha Atención Parto o Cesárea


			if (Pregunta49==='')
			{
				alert ("Falta Fecha Atención Parto o Cesárea - Pregunta 49");
				$('#FechaAtencionPartoInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 50 Fecha Salida de la Atención del Parto o Cesárea

			if (Pregunta50==='')
			{
				alert ("Falta Fecha Salida de la Atención del Parto o Cesárea - Pregunta 50");
				$('#FechaSalidaPartoInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 51 Fecha Consejería en Lactancia Materna

			if (Pregunta51==='')
			{
				alert ("Falta Fecha Consejería en Lactancia Materna - Pregunta 51");
				$('#FechaConsejeriaLactanciaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 52 Control Recién Nacido

			// Validar que cuando la variable 52 registre un dato diferente a 1845-01-01 
			// el cálculo de la edad* debe ser menor a 30 días.

			if (edad > 1)
			{
				$('#ControlRecienNacidoInput').val('1845-01-01');
			}

			if (Pregunta52==='')
			{
				alert ("Falta Control Recién Nacido - Pregunta 52");
				$('#ControlRecienNacidoInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 53 Planificación Familiar Primera Vez

			if (edad < 10)
			{
				$('#PlanificacionFamiliarPrimeraVezInput').val('1845-01-01');
			}

			if (Pregunta53==='')
			{
				alert ("Falta Planificación Familiar Primera Vez - Pregunta 53");
				$('#PlanificacionFamiliarPrimeraVezInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 54 Suministro de Método Anticonceptivo

			if (Pregunta54==='')
			{
				alert ("Falta Suministro de Método Anticonceptivo - Pregunta 54");
				$('#SuministroMetodoAnticonceptivo').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 55 Fecha Suministro de Método Anticonceptivo

			if (Pregunta55==='')
			{
				alert ("Falta Fecha Suministro de Método Anticonceptivo - Pregunta 55");
				$('#FechaSuministroMetodoAnticonceptivoInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 56 Control Prenatal de Primera Vez

			if (Pregunta56==='')
			{
				alert ("Falta Control Prenatal de Primera Vez - Pregunta 56");
				$('#ControlPrenatalPrimeraVezInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 57 Control Prenatal

			if (Pregunta57==='')
			{
				alert ("Falta Control Prenatal - Pregunta 57");
				$('#ControlPrenatalInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 58 Último Control Prenatal

			if (Pregunta58==='')
			{
				alert ("Falta Último Control Prenatal - Pregunta 58");
				$('#UltimoControlPrenatalInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 59 Suministro de Ácido Fólico en el Último Control Prenatal

			if (Pregunta59==='')
			{
				alert ("Falta Suministro de Ácido Fólico en el Último Control Prenatal - Pregunta 59");
				$('#SuministroAcidoFolico').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 60 Suministro de Sulfato Ferroso en el Último Control Prenatal

			if (Pregunta60==='')
			{
				alert ("Falta Suministro de Sulfato Ferroso en el Último Control Prenatal - Pregunta 60");
				$('#SuministroSulfatoFerroso').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 61 Suministro de Carbonato de Calcio en el Último Control Prenatal

			if (Pregunta61==='')
			{
				alert ("Falta Suministro de Carbonato de Calcio en el Último Control Prenatal - Pregunta 61");
				$('#SuministroCarbonatoCalcio').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 62 Valoración de la Agudeza Visual

			if (Pregunta62==='')
			{
				alert ("Falta Valoración de la Agudeza Visual - Pregunta 62");
				$('#ValoracionAgudezaVisualInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 63 Consulta por Oftalmología

			if (Pregunta63==='')
			{
				alert ("Falta Consulta por Oftalmología - Pregunta 63");
				$('#ConsultaOftalmologiaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 64 Fecha Diagnóstico Desnutrición Proteico Calórica

			if (Pregunta64==='')
			{
				alert ("Falta Fecha Diagnóstico Desnutrición Proteico Calórica - Pregunta 64");
				$('#FechaDiagnosticoDesnutricionInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 65 Consulta Mujer o Menor Víctima del Maltrato

			if (Pregunta65==='')
			{
				alert ("Falta Consulta Mujer o Menor Víctima del Maltrato - Pregunta 65");
				$('#ConsultaMujerMenorVictimaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 66 Consulta Víctimas de Violencia Sexual

			if (Pregunta66==='')
			{
				alert ("Falta Consulta Víctimas de Violencia Sexual - Pregunta 66");
				$('#ConsultaVictimaViolenciaSexualInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 67 Consulta Nutrición

			if (Pregunta67==='')
			{
				alert ("Falta Consulta Nutrición - Pregunta 67");
				$('#ConsultaNutricionInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 68 Consulta de Psicología

			if (Pregunta68==='')
			{
				alert ("Falta Consulta de Psicología - Pregunta 68");
				$('#ConsultaPsicologiaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 69 Consulta de Crecimiento y Desarrollo Primera Vez

			if (edad > 10)
			{
				$('#ConsultaCyDPrimeraVezInput').val('1845-01-01');
			}

			if (Pregunta69==='')
			{
				alert ("Falta Consulta de Crecimiento y Desarrollo Primera Vez - Pregunta 69");
				$('#ConsultaCyDPrimeraVezInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 70 Suministro de Sulfato Ferroso en la Última Consulta del Menor de 10 Años

			// Validar que cuando la variable 70 registre un valor diferente a 0
			// el cálculo de la edad debe ser menor a 10 años.

			if (edad > 10)
			{
				$('#SuministroSulfatoFerrosoMenor').val('0');
			}

			if (Pregunta70==='')
			{
				alert ("Falta Suministro de Sulfato Ferroso en la Última Consulta del Menor de 10 Años - Pregunta 70");
				$('#SuministroSulfatoFerrosoMenor').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 71 Suministro de Vitamina A en la Última Consulta del Menor de 10 Años

			// Validar que cuando la variable 71 registre un valor diferente a 0
			// el cálculo de la edad* debe ser menor a 10 años.

			if (edad > 10)
			{
				$('#SuministroVitaminaAMenor').val('0');
			}

			if (Pregunta71==='')
			{
				alert ("Falta Suministro de Vitamina A en la Última Consulta del Menor de 10 Años - Pregunta 71");
				$('#SuministroVitaminaAMenor').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 72 Consulta de Joven Primera Vez

			if (Pregunta72==='')
			{
				alert ("Falta Consulta de Joven Primera Vez - Pregunta 72");
				$('#ConsultaJovenPrimeraVezInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 73 Consulta de Adulto Primera Vez

			if (Pregunta73==='')
			{
				alert ("Falta Consulta de Adulto Primera Vez - Pregunta 73");
				$('#ConsultaAdultoPrimeraVezInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 74 Preservativos entregados a pacientes con ITS

			if (Pregunta74==='')
			{
				alert ("Falta Preservativos entregados a pacientes con ITS - Pregunta 74");
				$('#PreservativosITSInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 75 Asesoría Pre test Elisa para VIH
			
			if (Pregunta75==='')
			{
				alert ("Falta Asesoría Pre test Elisa para VIH - Pregunta 75");
				$('#AsesoriaPreElisaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 76 Asesoría Post test Elisa para VIH

			if (Pregunta76==='')
			{
				alert ("Falta Asesoría Post test Elisa para VIH - Pregunta 76");
				$('#AsesoriaPostElisaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 77 Paciente con Diagnóstico de: Ansiedad, Depresión, Esquizofrenia, déficit de atención, consumo SPA y Bipolaridad recibió Atención en los últimos 6 meses por Equipo Interdisciplinario Completo

			if (Pregunta77==='')
			{
				alert ("Falta Paciente con Diagnóstico de: Ansiedad, Depresión, Esquizofrenia... - Pregunta 77");
				$('#PacienteEnfermedadMental').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 78 Fecha Antígeno de Superficie Hepatitis B en Gestantes

			if (Pregunta78==='')
			{
				alert ("Falta Fecha Antígeno de Superficie Hepatitis B en Gestantes - Pregunta 78");
				$('#FechaAntigenoHepatitisBGestantesInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 79 Resultado Antígeno de Superficie Hepatitis B en Gestantes

			if (Pregunta79==='')
			{
				alert ("Falta Resultado Antígeno de Superficie Hepatitis B en Gestantes - Pregunta 79");
				$('#ResultadoAntigenoHepatitisBGestantes').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 80 Fecha Serología para Sífilis

			if (Pregunta80==='')
			{
				alert ("Falta Fecha Serología para Sífilis - Pregunta 80");
				$('#FechaSerologiaSifilisInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 81 Resultado Serología para Sífilis

			if (Pregunta81==='')
			{
				alert ("Falta Resultado Serología para Sífilis - Pregunta 81");
				$('#ResultadoSerologiaSifilis').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 82 Fecha de Toma de Elisa para VIH 

			if (Pregunta82==='')
			{
				alert ("Falta Fecha de Toma de Elisa para VIH - Pregunta 82");
				$('#FechaTomaElisaVIHInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 83 Resultado Elisa para VIH

			if (Pregunta83==='')
			{
				alert ("Falta Resultado Elisa para VIH - Pregunta 83");
				$('#ResultadoElisaVIH').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 84 Fecha TSH Neonatal



			if (Pregunta84==='')
			{
				alert ("Falta Fecha TSH Neonatal - Pregunta 84");
				$('#FechaTSHNeonatalInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 85 Resultado TSH Neonatal

			if (edad > 1)
			{
				$('#ResultadoTSHNeonatal').val('0');
			}

			if (Pregunta85==='')
			{
				alert ("Falta Resultado TSH Neonatal - Pregunta 85");
				$('#ResultadoTSHNeonatal').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 86 Tamizaje Cáncer de Cuello Uterino

			// Validar que cuando la variable 86 registre un dato diferente a 0
			// la variable 10 corresponda a F.
			// Validar que cuando la variable 86 registre un valor diferente a 0 
			// el cálculo de la edad* debe ser mayor a 10 años.

			if (Pregunta86==='')
			{
				alert ("Falta Tamizaje Cáncer de Cuello Uterino - Pregunta 86");
				$('#TamizajeCencerCU').focus();
				validado4505 = false;
				return false;
			}

			if (edad < 10)
			{
				$('#TamizajeCencerCU').val('0')
			}

			// Pregunta 87 Fecha Citología Cervico Uterina

			if (edad < 10)
			{
				$('#FechaCitologiaCUInput').val('1845-01-01');
			}

			if (Pregunta87==='')
			{
				alert ("Falta Fecha Citología Cervico Uterina - Pregunta 87");
				$('#FechaCitologiaCUInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 88 Citología Cervico Uterina Resultados según Bethesda

			// Validar que cuando la variable 88 registre un dato diferente a 0
			// la variable 10 corresponda a F.
			// Validar que cuando la variable 88 registre un valor diferente a 0 
			// el cálculo de la edad* debe ser mayor a 10 años.
			
			if (Pregunta88==='')
			{
				alert ("Falta Citología Cervico Uterina Resultados según Bethesda - Pregunta 88");
				$('#CitologiaCUResultados').focus();
				validado4505 = false;
				return false;
			}

			if (edad < 10)
			{
				$('#CitologiaCUResultados').val('0');
			}

			// Pregunta 89 Calidad en la Muestra de Citología Cervicouterina

			// Validar que cuando la variable 89 registre un dato diferente a 0
			// la variable 10 corresponda a F.
			// Validar que cuando la variable 89 registre un valor diferente a 0 
			// el cálculo de la edad* debe ser mayor a 10 años.

			if (Pregunta89==='')
			{
				alert ("Falta Calidad en la Muestra de Citología Cervicouterina - Pregunta 89");
				$('#CalidadMuestraCitologia').focus();
				validado4505 = false;
				return false;
			}

			if (edad < 10)
			{
				$('#CalidadMuestraCitologia').val('0');
			}

			// Pregunta 90 Código de Habilitación IPS donde se toma la Citología Cervicouterina

			// Validar que cuando la variable 90 registre un dato diferente a 0
			// la variable 10 corresponda a F.
			// Validar que cuando la variable 90 registre un valor diferente a 0 
			// el cálculo de la edad* debe ser mayor a 10 años.

			if (edad < 10)
			{
				$('#CodigoHabilitacionIPSTomaMuestra').val('0');
			}

			if (Pregunta90==='')
			{
				alert ("Falta Código de Habilitación IPS donde se toma la Citología Cervicouterina - Pregunta 90");
				$('#CodigoHabilitacionIPSTomaMuestra').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 91 Fecha Colposcopia

			// Validar que cuando la variable 91 registre un dato diferente a 1845-01-01 la variable 10 corresponda a F.
			// Validar que cuando la variable 91 registre un valor diferente a 1845-01-01 
			// el cálculo de la edad* debe ser mayor a 10 años.

			if (edad < 10)
			{
				$('#FechaColposcopiaInput').val('1845-01-01')
			}

			if (Pregunta91==='')
			{
				alert ("Falta Fecha Colposcopia - Pregunta 91");
				$('#FechaColposcopiaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 92 Código Habilitación IPS donde se toma la Colposcopia

			// Validar que cuando la variable 92 registre un dato diferente a 0
			// la variable 10 corresponda a F.
			// Validar que cuando la variable 92 registre un valor diferente a 0 
			// el cálculo de la edad* debe ser mayor a 10 años.

			if (Pregunta92==='')
			{
				alert ("Falta Código Habilitación IPS donde se toma la Colposcopia - Pregunta 92");
				$('#CodigoHabilitacionTomaColposcopia').focus();
				validado4505 = false;
				return false;
			}

			if (edad < 10)
			{
				$('#CodigoHabilitacionTomaColposcopia').val('0')
			}

			// Pregunta 93 Fecha Biopsia Cervical

			if (edad < 10)
			{
				$('#FechaBiopsiaCervicalInput').val('1845-01-01');
			}

			if (Pregunta93==='')
			{
				alert ("Falta Fecha Biopsia Cervical - Pregunta 93");
				$('#FechaBiopsiaCervicalInput').focus();
				validado4505 = false;
				return false;
			}


			// Pregunta 94 Resultado de Biopsia Cervical

			// Validar que cuando la variable 94 registre un dato diferente a 0
			// la variable 10 corresponda a F.
			// Validar que cuando la variable 94 registre un valor diferente a 0 
			// el cálculo de la edad* debe ser mayor a 10 años.
			
			if (Pregunta94==='')
			{
				alert ("Falta Resultado de Biopsia Cervical - Pregunta 94");
				$('#ResultadoBiopsiaCervical').focus();
				validado4505 = false;
				return false;
			}

			if (edad < 10)
			{
				$('#ResultadoBiopsiaCervical').val('0')
			}

			// Pregunta 95 Código Habilitación IPS donde se toma la Biopsia Cervical

			// Validar que cuando la variable 95 registre un dato diferente a 0
			// la variable 10 corresponda a F.
			// Validar que cuando la variable 95 registre un valor diferente a 0 
			// el cálculo de la edad* debe ser mayor a 10 años.

			if (Pregunta95==='')
			{
				alert ("Falta Código Habilitación IPS donde se toma la Biopsia Cervical - Pregunta 95");
				$('#CodigoHabilitacionTomaBiopsia').focus();
				validado4505 = false;
				return false;
			}

			if (edad < 10)
			{
				$('#CodigoHabilitacionTomaBiopsia').val('0')
			}

			// Pregunta 96 Fecha Mamografía

			// Validar que cuando la variable 96 registre un dato diferente a 1845-01-01 la variable 10 corresponda a F.
			// Validar que cuando la variable 96 registre un valor diferente a 1845-01-01 
			// el cálculo de la edad* debe ser mayor a 35 años.

			if (edad < 35)
			{
				$('#FechaMamografiaInput').val('1845-01-01');
			}


			if (Pregunta96==='')
			{
				alert ("Falta Fecha Mamografía - Pregunta 96");
				$('#FechaMamografiaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 97 Resultado Mamografía

			if (Pregunta97==='')
			{
				alert ("Falta Resultado Mamografía - Pregunta 97");
				$('#ResultadoMamografia').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 98 Código Habilitación IPS donde se toma la Mamografía

			// Validar que cuando la variable 98 registre un dato diferente a 0 la variable 10 corresponda a F.
			// Validar que cuando la variable 98 registre un valor diferente a 0 
			// el cálculo de la edad* debe ser mayor a 35 años.

			if (edad < 35)
			{
				$('#CodigoHabilitacionTomaMamografia').val('0');
			}

			if (Pregunta98==='')
			{
				alert ("Falta Código Habilitación IPS donde se toma la Mamografía - Pregunta 98");
				$('#CodigoHabilitacionTomaMamografia').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 99 Fecha Toma Biopsia Seno por BACAF

			if (Pregunta99==='')
			{
				alert ("Falta Fecha Toma Biopsia Seno por BACAF - Pregunta 99");
				$('#FechaBiopsiaSenoInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 100 Fecha Resultado Biopsia Seno por BACAF

			if (Pregunta100==='')
			{
				alert ("Falta Fecha Resultado Biopsia Seno por BACAF - Pregunta 100");
				$('#FechaResultadoBiopsiaSeno').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 101 Resultado Biopsia Seno por BACAF

			if (Pregunta101==='')
			{
				alert ("Falta Resultado Biopsia Seno por BACAF - Pregunta 101");
				$('#ResultadoBiopsiaSeno').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 102 Código Habilitación IPS donde se toma la Biopsia de Seno por BACAF

			if (Pregunta102==='')
			{
				alert ("Falta Código Habilitación IPS donde se toma la Biopsia de Seno por BACAF - Pregunta 102");
				$('#CodigoHabilitacionBiopsiaSeno').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 103  Fecha Toma de Hemoglobina

			if (Pregunta103==='')
			{
				alert ("Falta Fecha Toma de Hemoglobina - Pregunta 103");
				$('#FechaTomaHemoglobinaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 104 Resultado Hemoglobina

			if (Pregunta104==='')
			{
				alert ("Falta Resultado Hemoglobina - Pregunta 104");
				$('#ResultadoHemoglobina').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 105 Fecha de la Toma de Glisemia Basal

			if (Pregunta105==='')
			{
				alert ("Falta Fecha de la Toma de Glisemia Basal - Pregunta 105");
				$('#FechaTomaGlisemiaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 106 Fecha Toma Creatinina

			if (Pregunta106==='')
			{
				alert ("Falta Fecha Toma Creatinina - Pregunta 106");
				$('#FechaTomaCreatininaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 107 Resultado Creatinina

			if (Pregunta107==='')
			{
				alert ("Falta Resultado Creatinina - Pregunta 107");
				$('#ResultadoCreatinina').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 108 Fecha Hemoglobina Glicosilada

			if (Pregunta108==='')
			{
				alert ("Falta Fecha Hemoglobina Glicosilada - Pregunta 108");
				$('#FechaHemoglobinaGlicosiladaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 109 Resultado Hemoglobina Glicosilada
			
			if (Pregunta109==='')
			{
				alert ("Falta Resultado Hemoglobina Glicosilada - Pregunta 109");
				$('#ResultadoHemoglobinaGlicosilada').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 110 Fecha Toma de Microalbuminuria

			if (Pregunta110==='')
			{
				alert ("Falta Fecha Toma de Microalbuminuria - Pregunta 110");
				$('#FechaTomaMicroalbuminuriaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 111 Fecha Toma de HDL

			if (Pregunta111==='')
			{
				alert ("Falta Fecha Toma de HDL - Pregunta 111");
				$('#FechaTomaHDLInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 112 Fecha Toma de Baciloscopia de Diagnóstico

			if (Pregunta112==='')
			{
				alert ("Falta Fecha Toma de Baciloscopia de Diagnóstico - Pregunta 112");
				$('#FechaTomaBaciloscopiaInput').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 113 Resultado de Baciloscopia de Diagnóstico

			if (Pregunta113==='')
			{
				alert ("Falta Resultado de Baciloscopia de Diagnóstico - Pregunta 113");
				$('#ResultadoBaciloscopia').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 114 Tratamiento para Hipotiroidismo Congénito

			if (Pregunta114==='')
			{
				alert ("Falta Tratamiento para Hipotiroidismo Congénito - Pregunta 114");
				$('#TratamientoHipotiroidismoCongenito').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 115 Tratamiento para Sífilis Gestacional

			if (Pregunta115==='')
			{
				alert ("Falta Tratamiento para Sífilis Gestacional - Pregunta 115");
				$('#TratamientoHipotiroidismoCongenito').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 116 Tratamiento para Sífilis Congénita
			
			if (Pregunta116==='')
			{
				alert ("Falta Tratamiento para Sífilis Congénita - Pregunta 116");
				$('#TratamientoSifilisCongenita').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 117 Tratamiento para Lepra

			if (Pregunta117==='')
			{
				alert ("Falta Tratamiento para Lepra - Pregunta 117");
				$('#TratamientoLepra').focus();
				validado4505 = false;
				return false;
			}

			// Pregunta 118 Fecha de Terminación Tratamiento para Leishmaniasis

			if (Pregunta118==='')
			{
				alert ("Falta Fecha de Terminación Tratamiento para Leishmaniasis - Pregunta 118");
				$('#FechaTerLeishmaniasisInput').focus();
				validado4505 = false;
				return false;
			}

			if (validado4505 === true) return true;
			return false;

		});

	// FINAL - VALIDACION FORMULARIO 4505 - VALIDACIÓN DE CAMPOS VACIOS ------------------------------------

	// INICIO - VALIDACIÓN FORMULARIO 4505 - VALIDACIÓN DE CONTENIDO ------------------------------------

		// Pregunta 5 Primer Apellido del Usuario

		$('#Apellido1').keyup(function(){
    	this.value = this.value.toUpperCase();
		});

		// Pregunta 6 Segundo Apellido del Usuario

		$('#Apellido2').keyup(function(){
    	this.value = this.value.toUpperCase();
		});

		$('#Apellido2').blur(function(){

			if($('#Apellido2').val()==='')
			{	
				$('#Apellido2').val("NONE");
			} 
		});

		// Pregunta 7 Primer Nombre del Usuario

		$('#Nombre1').keyup(function(){
    	this.value = this.value.toUpperCase();
		});

		// Pregunta 8 Segundo Nombre del Usuario

		$('#Nombre2').keyup(function(){
    	this.value = this.value.toUpperCase();
		});

		$('#Nombre2').blur(function(){
						
			if($('#Nombre2').val()==='')
			{	
				$('#Nombre2').val("NONE");
			}

		});

		function calcularEdad (fecha)
		{
			var today = new Date();
			var FechaNacimiento = new Date($('#FechaNacimiento').val());
			var todayYear = today.getFullYear();
			var todayMonth = today.getMonth() + 1;
			var todayDay = today.getDate();
			var FechaNacimientoYear = FechaNacimiento.getFullYear();
			var FechaNacimientoMonth = FechaNacimiento.getMonth() + 1;
			var FechaNacimientoDay = FechaNacimiento.getUTCDate();
			var edad;
			//alert (today);
			//alert (FechaNacimiento);
			//alert (todayYear);
			//alert ("Mes Actual: "+todayMonth);
			//alert (todayDay);
			//alert (FechaNacimientoYear);
			//alert ("Mes de Nacimiento: "+FechaNacimientoMonth);
			//alert (FechaNacimientoDay);

			if (todayMonth>FechaNacimientoMonth)
			{
				//alert ("Mes Hoy Mayor a Mes de Nacimiento");
				edad = todayYear - FechaNacimientoYear;
				//alert (edad);
				return edad;
			} else if (todayMonth<FechaNacimientoMonth)
			{
				//alert ("Mes Hoy Menor a Mes de Nacimiento");
				edad = todayYear - FechaNacimientoYear - 1;
				//alert (edad);
				return edad;
				
			} else if (todayMonth=FechaNacimientoMonth)
			{
				//alert ("Mes Hoy Igual a Mes de Nacimiento");
				
				if (todayDay>=FechaNacimientoDay)
				{
					edad = todayYear - FechaNacimientoYear;
					//alert ("Dia Hoy Mayor Fecha Nacimiento y Edad es "+edad);
					return edad;

				} else if (todayDay<FechaNacimientoDay)
				{
					edad = todayYear - FechaNacimientoYear - 1;
					//alert (edad);
					return edad;
				}
			}
		};

		// Pregunta 9 Fecha Nacimiento

		$('#FechaNacimiento').blur(function(){

			var edad = calcularEdad($('#FechaNacimiento').val());
			//alert (edad);

		});

		// Pregunta 10 Sexo

		$('#Sexo').blur(function(){

			// VALIDACION SI ES SEXO MASCULINO

				if($('#Sexo').val()==='M')
				{
					
					var edad = calcularEdad($('#FechaNacimiento').val());
					// 11 Código pertenencia étnica

					$('#PertenenciaEtnica').val('ND');

					// 12 Código de ocupación

					$('#CodigoOcupacion').val('9999');

					// 14 Gestacion

					$('#Gestacion').val('0').attr('readonly', true);

					// 15 Sifilis Sífilis Gestacional o Congénita

					$('#SifilisGestacional').val('0').attr('readonly', true);

					// 16 Hipertensión Inducida por la Gestación

					$('#HipertensionInducidaGestacion').val('0').attr('readonly', true);

					// 17 Hipotiroidismo Congénito

					$('#HipotiroidismoCongenito').val('21');

					// 18 Sintomático Respiratorio

					$('#SintomaticoRespiratorio').val('21');

					// 19 Tuberculosis Multidrogoresistente

					$('#Tuberculosis').val('21');

					// 20 Lepra

					$('#Lepra').val('21');

					// 21 Obesidad o Desnutrición Proteico Calórica

					$('#ObesidadDesnutricion').val('21');

					// 22 Víctima de Maltrato

					$('#VictimaMaltrato').val('21');

					// 23 Victima Violencia Sexual

					$('#VictimaViolenciaSexual').val('21');

					// 24 Infecciones de Trasmisión Sexual

					$('#InfeccionTrasmisionSexual').val('21');

					// 25 Enfermedad Mental

					$('#EnfermedadMental').val('21');

					// 26 Cáncer de Cervix

					$('#CancerCervix').val('0').attr('readonly', true);

					// 27 Cáncer de Seno

					$('#CancerSeno').val('21').attr('readonly', true);

					// 28 Fluorosis Dental

					$('#FluorosisDental').val('21');

					// 29 Fecha de Peso

					$('#FechaPeso').val('1800-01-01');

					// 30 Peso en Kilogramos

					$('#PesoKilogramos').val('999');

					// 31 Fecha Talla

					$('#FechaTalla').val('1800-01-01');

					// 32 Talla en Centímetros

					$('#TallaCentimetros').val('999');

					// 33 Fecha Probable de Parto

					$('#FechaProbablePartoInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaProbablePartoRadio]').attr('readonly', true);

					// 34 Edad gestacional al Nacer

					$('#EdadGestacional').val('0')

					// 35 BCG

					$('#BCG').val('22');

					// 36 Hepatitis B Menores de 1 Año

					$('#HepatitisB').val('0');

					// 37 Pentavalente

					$('#Pentavalente').val('22');

					// 38 Polio

					$('#Polio').val('22');

					// 39 DPT Menores de 5 Años

					$('#DPT').val('22');

					// 40 Rotavirus

					$('#Rotavirus').val('22');

					// 41 Neumococo

					$('#Neumococo').val('22');

					// 42 Influenza Niños

					$('#InfluenzaN').val('22');

					// 43 Fiebre Amarilla Niños de 1 Año

					$('#FiebreAmarillaN1').val('22');

					// 44 Hepatitis A

					$('#HepatitisA').val('22');

					// 45 Triple Viral Niños

					$('#TripleViralN').val('22');

					// 46 Virus del Papiloma Humano (VPH)

					$('#VPH').val('0').attr('readonly', true);

					// 47 TD o TT Mujeres en Edad Fértil 15 a 49 Años

					$('#TdTtMEF').val('0').attr('readonly', true);

					// 48 Control de Placa Bacteriana

					$('#ControlPlacaBacteriana').val('22');

					// 49 Fecha Atención Parto o Cesárea

					$('#FechaAtencionPartoInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaAtencionPartoRadio]').attr('readonly', true);

					// 50 Fecha Salida de la Atención del Parto o Cesárea

					$('#FechaSalidaPartoInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaSalidaPartoRadio]').attr('readonly', true);

					// 51 Fecha Consejería en Lactancia Materna

					$('#FechaConsejeriaLactanciaInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaConsejeriaLactanciaRadio]').attr('readonly', true);

					// 52 Control Recién Nacido

					$('#ControlRecienNacidoInput').val('1845-01-01');

					// 53 Planificación Familiar Primera Vez

					$('#PlanificacionFamiliarPrimeraVezInput').val('1845-01-01');

					// 54 Suministro de Método Anticonceptivo

					$('#SuministroMetodoAnticonceptivo').val('0');

					// 55 Fecha Suministro de Método Anticonceptivo

					$('#FechaSuministroMetodoAnticonceptivoInput').val('1845-01-01');

					// 56 Control Prenatal de Primera Vez

					$('#ControlPrenatalPrimeraVezInput').val('1845-01-01').attr('readonly', true);
					$('input[name=ControlPrenatalPrimeraVezRadio]').attr('readonly', true);

					// 57 Control Prenatal

					$('#ControlPrenatalInput').val('0').attr('readonly', true);
					$('input[name=ControlPrenatalRadio]').attr('readonly', true);

					// 58 Último Control Prenatal

					$('#UltimoControlPrenatalInput').val('1845-01-01').attr('readonly', true);
					$('input[name=UltimoControlPrenatalRadio]').attr('readonly', true);

					// 59 Suministro de Ácido Fólico en el Último Control Prenatal

					$('#SuministroAcidoFolico').val('0').attr('readonly', true);

					// 60 Suministro de Sulfato Ferroso en el Último Control Prenatal

					$('#SuministroSulfatoFerroso').val('0').attr('readonly', true);

					// 61 Suministro de Carbonato de Calcio en el Último Control Prenatal

					$('#SuministroCarbonatoCalcio').val('0').attr('readonly', true);

					// 62 Valoración de la Agudeza Visual

					$('#ValoracionAgudezaVisualInput').val('1800-01-01');

					// 63 Consulta por Oftalmología

					$('#ConsultaOftalmologiaInput').val('1800-01-01');

					// 64 Fecha Diagnóstico Desnutrición Proteico Calórica

					$('#FechaDiagnosticoDesnutricionInput').val('1845-01-01');

					// 65 Consulta Mujer o Menor Víctima del Maltrato

					$('#ConsultaMujerMenorVictimaInput').val('1845-01-01');

					// 66 Consulta Víctimas de Violencia Sexual

					$('#ConsultaVictimaViolenciaSexualInput').val('1845-01-01');

					// 67 Consulta Nutrición

					$('#ConsultaNutricionInput').val('1800-01-01');

					// 68 Consulta de Psicología

					$('#ConsultaPsicologiaInput').val('1800-01-01');

					// 69 Consulta de Crecimiento y Desarrollo Primera Vez

					$('#ConsultaCyDPrimeraVezInput').val('1800-01-01');

					// 70 Suministro de Sulfato Ferroso en la Última Consulta del Menor de 10 Años

					if (edad > 10)
					{
						$('#SuministroSulfatoFerrosoMenor').val('0');
					}
					else 
					{
						$('#SuministroSulfatoFerrosoMenor').val('21');
					}

					// 71 Suministro de Vitamina A en la Última Consulta del Menor de 10 Años

					if (edad > 10)
					{
						$('#SuministroVitaminaAMenor').val('0');
					}
					else
					{
						$('#SuministroVitaminaAMenor').val('21');
					}

					// 72 Consulta de Joven Primera Vez

					$('#ConsultaJovenPrimeraVezInput').val('1800-01-01');

					// 73 Consulta de Adulto Primera Vez

					$('#ConsultaAdultoPrimeraVezInput').val('1800-01-01');

					// 74 Preservativos entregados a pacientes con ITS

					$('#PreservativosITSInput').val('0');

					// 75 Asesoría Pre test Elisa para VIH

					$('#AsesoriaPreElisaInput').val('1800-01-01');

					// 76 Asesoría Post test Elisa para VIH

					$('#AsesoriaPostElisaInput').val('1800-01-01');

					// 77 Paciente con Diagnóstico de: Ansiedad, Depresión, Esquizofrenia ...

					$('#PacienteEnfermedadMental').val('0');

					// 78 Fecha Antígeno de Superficie Hepatitis B en Gestantes

					$('#FechaAntigenoHepatitisBGestantesInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaAntigenoHepatitisBGestantesRadio]').attr('readonly', true);

					// 79 Resultado Antígeno de Superficie Hepatitis B en Gestantes

					$('#ResultadoAntigenoHepatitisBGestantes').val('0').attr('readonly', true);

					// 80 Fecha Serología para Sífilis

					$('#FechaSerologiaSifilisInput').val('1800-01-01');

					// 81 Resultado Serología para Sífilis

					$('#ResultadoSerologiaSifilis').val('22');

					// 82 Fecha de Toma de Elisa para VIH

					$('#FechaTomaElisaVIHInput').val('1800-01-01');

					// 83 Resultado Elisa para VIH

					$('#ResultadoElisaVIH').val('22');

					// 84 Fecha TSH Neonatal

					$('#FechaTSHNeonatalInput').val('1845-01-01');

					// 85 Resultado TSH Neonatal

					$('#ResultadoTSHNeonatal').val('22');

					// 86 Tamizaje Cáncer de Cuello Uterino

					$('#TamizajeCencerCU').val('0').attr('readonly', true);

					// 87 Fecha Citología Cervico Uterina

					$('#FechaCitologiaCUInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaCitologiaCURadio]').attr('readonly', true);

					// 88 Citología Cervico Uterina Resultados según Bethesda

					$('#CitologiaCUResultados').val('0').attr('readonly', true);

					// 89 Calidad en la Muestra de Citología Cervicouterina

					$('#CalidadMuestraCitologia').val('0').attr('readonly', true);

					// 90 Código de Habilitación IPS donde se toma la Citología Cervicouterina

					$('#CodigoHabilitacionIPSTomaMuestra').val('0').attr('readonly', true);

					// 91 Fecha Colposcopia

					$('#FechaColposcopiaInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaColposcopiaRadio]').attr('readonly', true);

					// 92 Código Habilitación IPS donde se toma la Colposcopia

					$('#CodigoHabilitacionTomaColposcopia').val('0').attr('readonly', true);

					// 93 Fecha Biopsia Cervical

					$('#FechaBiopsiaCervicalInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaBiopsiaCervicalRadio]').attr('readonly', true);

					// 94 Resultado de Biopsia Cervical

					$('#ResultadoBiopsiaCervical').val('0').attr('readonly', true);

					// 95 Código Habilitación IPS donde se toma la Biopsia Cervical

					$('#CodigoHabilitacionTomaBiopsia').val('0').attr('readonly', true);

					// 96 Fecha Mamografía

					$('#FechaMamografiaInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaMamografiaRadio]').attr('readonly', true);

					// 97 Resultado Mamografía

					$('#ResultadoMamografia').val('0').attr('readonly', true);

					// 98 Código Habilitación IPS donde se toma la Mamografía

					$('#CodigoHabilitacionTomaMamografia').val('0').attr('readonly', true);

					// 99 Fecha Toma Biopsia Seno por BACAF

					$('#FechaBiopsiaSenoInput').val('1845-01-01').attr('readonly', true);
					$('input[name=FechaBiopsiaSenoRadio]').attr('readonly', true);

					// 100 Fecha Resultado Biopsia Seno por BACAF

					$('#FechaResultadoBiopsiaSeno').val('1845-01-01').attr('readonly', true);

					// 101 Resultado Biopsia Seno por BACAF

					$('#ResultadoBiopsiaSeno').val('0').attr('readonly', true);

					// 102 Código Habilitación IPS donde se toma la Biopsia de Seno por BACAF

					$('#CodigoHabilitacionBiopsiaSeno').val('0').attr('readonly', true);

					// 103 Fecha Toma de Hemoglobina

					$('#FechaTomaHemoglobinaInput').val('1800-01-01');

					// 104 Resultado Hemoglobina

					$('#ResultadoHemoglobina').val('0');

					// 105 Fecha de la Toma de Glisemia Basal

					$('#FechaTomaGlisemiaInput').val('1800-01-01');

					// 106 Fecha Toma Creatinina

					$('#FechaTomaCreatininaInput').val('1800-01-01');

					// 107 Resultado Creatinina

					$('#ResultadoCreatinina').val('999');

					// 108 Fecha Hemoglobina Glicosilada

					$('#FechaHemoglobinaGlicosiladaInput').val('1800-01-01');

					// 109 Resultado Hemoglobina Glicosilada

					$('#ResultadoHemoglobinaGlicosilada').val('999');

					// 110 Fecha Toma de Microalbuminuria

					$('#FechaTomaMicroalbuminuriaInput').val('1800-01-01');

					// 111 Fecha Toma de HDL

					$('#FechaTomaHDLInput').val('1800-01-01');

					// 112 Fecha Toma de Baciloscopia de Diagnóstico

					$('#FechaTomaBaciloscopiaInput').val('1800-01-01');

					// 113 Resultado de Baciloscopia de Diagnóstico

					$('#ResultadoBaciloscopia').val('22');

					// 114 Tratamiento para Hipotiroidismo Congénito

					$('#TratamientoHipotiroidismoCongenito').val('0');

					// 115 Tratamiento para Sífilis Gestacional

					$('#TratamientoSifilisGestacional').val('0').attr('readonly', true);

					// 116 Tratamiento para Sífilis Congénita

					$('#TratamientoSifilisCongenita').val('0');

					// 117 Tratamiento para Lepra

					$('#TratamientoLepra').val('0');

					// 118 Fecha de Terminación Tratamiento para Leishmaniasis

					$('#FechaTerLeishmaniasisInput').val('1845-01-01');

			// VALIDACION SI ES SEXO FEMENINO	

			} else if ($('#Sexo').val()==='F')
			{
				var edad = calcularEdad($('#FechaNacimiento').val());
				// 11 Código pertenencia étnica

				$('#PertenenciaEtnica').val('ND');

				// 12 Código de ocupación

				$('#CodigoOcupacion').val('9999');

				// 14 Gestacion

				if (edad < 10) {
					$('#Gestacion').val('0');
				}
				else
				{
					$('#Gestacion').val('21');
				}
				
				// 15 Sifilis Sífilis Gestacional o Congénita

				$('#SifilisGestacional').val('21');

				// 16 Hipertensión Inducida por la Gestación

				$('#HipertensionInducidaGestacion').val('21');

				// 17 Hipotiroidismo Congénito

				$('#HipotiroidismoCongenito').val('21');

				// 18 Sintomático Respiratorio

				$('#SintomaticoRespiratorio').val('21');

				// 19 Tuberculosis Multidrogoresistente

				$('#Tuberculosis').val('21');

				// 20 Lepra

				$('#Lepra').val('21');

				// 21 Obesidad o Desnutrición Proteico Calórica

				$('#ObesidadDesnutricion').val('21');

				// 22 Víctima de Maltrato

				$('#VictimaMaltrato').val('21');

				// 23 Victima Violencia Sexual

				$('#VictimaViolenciaSexual').val('21');

				// 24 Infecciones de Trasmisión Sexual

				$('#InfeccionTrasmisionSexual').val('21');

				// 25 Enfermedad Mental

				$('#EnfermedadMental').val('21');

				// 26 Cáncer de Cervix

				$('#CancerCervix').val('21');

				// 27 Cáncer de Seno

				$('#CancerSeno').val('21');

				// 28 Fluorosis Dental

				$('#FluorosisDental').val('21');

				// 29 Fecha de Peso

				$('#FechaPeso').val('1800-01-01');

				// 30 Peso en Kilogramos

				$('#PesoKilogramos').val('999');

				// 31 Fecha Talla

				$('#FechaTalla').val('1800-01-01');

				// 32 Talla en Centímetros

				$('#TallaCentimetros').val('999');

				// 33 Fecha Probable de Parto

				$('#FechaProbablePartoInput').val('1845-01-01');

				// 34 Edad gestacional al Nacer

				$('#EdadGestacional').val('0')

				// 35 BCG

				$('#BCG').val('22');

				// 36 Hepatitis B Menores de 1 Año

				$('#HepatitisB').val('0');

				// 37 Pentavalente

				$('#Pentavalente').val('22');

				// 38 Polio

				$('#Polio').val('22');

				// 39 DPT Menores de 5 Años

				$('#DPT').val('22');

				// 40 Rotavirus

				$('#Rotavirus').val('22');

				// 41 Neumococo

				$('#Neumococo').val('22');

				// 42 Influenza Niños

				$('#InfluenzaN').val('22');

				// 43 Fiebre Amarilla Niños de 1 Año

				$('#FiebreAmarillaN1').val('22');

				// 44 Hepatitis A

				$('#HepatitisA').val('22');

				// 45 Triple Viral Niños

				$('#TripleViralN').val('22');

				// 46 Virus del Papiloma Humano (VPH)

				$('#VPH').val('22');

				// 47 TD o TT Mujeres en Edad Fértil 15 a 49 Años

				$('#TdTtMEF').val('22');

				// 48 Control de Placa Bacteriana

				$('#ControlPlacaBacteriana').val('22');

				// 49 Fecha Atención Parto o Cesárea

				$('#FechaAtencionPartoInput').val('1800-01-01');

				// 50 Fecha Salida de la Atención del Parto o Cesárea

				$('#FechaSalidaPartoInput').val('1845-01-01');

				// 51 Fecha Consejería en Lactancia Materna

				$('#FechaConsejeriaLactanciaInput').val('1800-01-01');

				// 52 Control Recién Nacido

				$('#ControlRecienNacidoInput').val('1845-01-01');

				// 53 Planificación Familiar Primera Vez

				$('#PlanificacionFamiliarPrimeraVezInput').val('1800-01-01');

				// 54 Suministro de Método Anticonceptivo

				$('#SuministroMetodoAnticonceptivo').val('21');

				// 55 Fecha Suministro de Método Anticonceptivo

				$('#FechaSuministroMetodoAnticonceptivoInput').val('1800-01-01');

				// 56 Control Prenatal de Primera Vez

				$('#ControlPrenatalPrimeraVezInput').val('1845-01-01');

				// 57 Control Prenatal

				$('#ControlPrenatalInput').val('0');

				// 58 Último Control Prenatal

				$('#UltimoControlPrenatalInput').val('1845-01-01');

				// 59 Suministro de Ácido Fólico en el Último Control Prenatal

				$('#SuministroAcidoFolico').val('0');

				// 60 Suministro de Sulfato Ferroso en el Último Control Prenatal

				$('#SuministroSulfatoFerroso').val('0');

				// 61 Suministro de Carbonato de Calcio en el Último Control Prenatal

				$('#SuministroCarbonatoCalcio').val('0');

				// 62 Valoración de la Agudeza Visual

				$('#ValoracionAgudezaVisualInput').val('1800-01-01');

				// 63 Consulta por Oftalmología

				$('#ConsultaOftalmologiaInput').val('1800-01-01');

				// 64 Fecha Diagnóstico Desnutrición Proteico Calórica

				$('#FechaDiagnosticoDesnutricionInput').val('1845-01-01');

				// 65 Consulta Mujer o Menor Víctima del Maltrato

				$('#ConsultaMujerMenorVictimaInput').val('1845-01-01');

				// 66 Consulta Víctimas de Violencia Sexual

				$('#ConsultaVictimaViolenciaSexualInput').val('1845-01-01');

				// 67 Consulta Nutrición

				$('#ConsultaNutricionInput').val('1800-01-01');

				// 68 Consulta de Psicología

				$('#ConsultaPsicologiaInput').val('1800-01-01');

				// 69 Consulta de Crecimiento y Desarrollo Primera Vez

				$('#ConsultaCyDPrimeraVezInput').val('1800-01-01');

				// 70 Suministro de Sulfato Ferroso en la Última Consulta del Menor de 10 Años

				if (edad > 10)
					{
						$('#SuministroSulfatoFerrosoMenor').val('0');
					}
					else 
					{
						$('#SuministroSulfatoFerrosoMenor').val('21');
					}

				// 71 Suministro de Vitamina A en la Última Consulta del Menor de 10 Años

				if (edad > 10)
					{
						$('#SuministroVitaminaAMenor').val('0');
					}
					else 
					{
						$('#SuministroVitaminaAMenor').val('21');
					}

				// 72 Consulta de Joven Primera Vez

				$('#ConsultaJovenPrimeraVezInput').val('1800-01-01');

				// 73 Consulta de Adulto Primera Vez

				$('#ConsultaAdultoPrimeraVezInput').val('1800-01-01');

				// 74 Preservativos entregados a pacientes con ITS

				$('#PreservativosITSInput').val('0');

				// 75 Asesoría Pre test Elisa para VIH

				$('#AsesoriaPreElisaInput').val('1800-01-01');

				// 76 Asesoría Post test Elisa para VIH

				$('#AsesoriaPostElisaInput').val('1800-01-01');

				// 77 Paciente con Diagnóstico de: Ansiedad, Depresión, Esquizofrenia ...

				$('#PacienteEnfermedadMental').val('0');

				// 78 Fecha Antígeno de Superficie Hepatitis B en Gestantes

				$('#FechaAntigenoHepatitisBGestantesInput').val('1845-01-01');

				// 79 Resultado Antígeno de Superficie Hepatitis B en Gestantes

				$('#ResultadoAntigenoHepatitisBGestantes').val('0');

				// 80 Fecha Serología para Sífilis

				$('#FechaSerologiaSifilisInput').val('1800-01-01');

				// 81 Resultado Serología para Sífilis

				$('#ResultadoSerologiaSifilis').val('22');

				// 82 Fecha de Toma de Elisa para VIH

				$('#FechaTomaElisaVIHInput').val('1800-01-01');

				// 83 Resultado Elisa para VIH

				$('#ResultadoElisaVIH').val('22');

				// 84 Fecha TSH Neonatal

				$('#FechaTSHNeonatalInput').val('1845-01-01');

				// 85 Resultado TSH Neonatal

				$('#ResultadoTSHNeonatal').val('22');

				// 86 Tamizaje Cáncer de Cuello Uterino

				$('#TamizajeCencerCU').val('22');

				// 87 Fecha Citología Cervico Uterina

				$('#FechaCitologiaCUInput').val('1800-01-01');

				// 88 Citología Cervico Uterina Resultados según Bethesda

				$('#CitologiaCUResultados').val('999');

				// 89 Calidad en la Muestra de Citología Cervicouterina

				$('#CalidadMuestraCitologia').val('999');

				// 90 Código de Habilitación IPS donde se toma la Citología Cervicouterina

				$('#CodigoHabilitacionIPSTomaMuestra').val('053680483301');

				// 91 Fecha Colposcopia

				$('#FechaColposcopiaInput').val('1845-01-01');

				// 92 Código Habilitación IPS donde se toma la Colposcopia

				$('#CodigoHabilitacionTomaColposcopia').val('999');

				// 93 Fecha Biopsia Cervical

				$('#FechaBiopsiaCervicalInput').val('1800-01-01');

				// 94 Resultado de Biopsia Cervical

				$('#ResultadoBiopsiaCervical').val('999');

				// 95 Código Habilitación IPS donde se toma la Biopsia Cervical

				$('#CodigoHabilitacionTomaBiopsia').val('999');

				// 96 Fecha Mamografía

				$('#FechaMamografiaInput').val('1845-01-01');

				// 97 Resultado Mamografía

				if (edad > 35)
				{
					$('#ResultadoMamografia').val('999');
				}
				else
				{
					$('#ResultadoMamografia').val('0');
				}

				// 98 Código Habilitación IPS donde se toma la Mamografía

				$('#CodigoHabilitacionTomaMamografia').val('0');

				// 99 Fecha Toma Biopsia Seno por BACAF

				$('#FechaBiopsiaSenoInput').val('1800-01-01').attr('readonly', true);
				$('input[name=FechaBiopsiaSenoRadio]').attr('disabled', 'disabled');

				// 100 Fecha Resultado Biopsia Seno por BACAF

				$('#FechaResultadoBiopsiaSeno').val('1800-01-01').attr('readonly', true);

				// 101 Resultado Biopsia Seno por BACAF

				$('#ResultadoBiopsiaSeno').val('999').attr('readonly', true);

				// 102 Código Habilitación IPS donde se toma la Biopsia de Seno por BACAF

				$('#CodigoHabilitacionBiopsiaSeno').val('999').attr('readonly', true);

				// 103 Fecha Toma de Hemoglobina

				$('#FechaTomaHemoglobinaInput').val('1800-01-01');

				// 104 Resultado Hemoglobina

				$('#ResultadoHemoglobina').val('0');

				// 105 Fecha de la Toma de Glisemia Basal

				$('#FechaTomaGlisemiaInput').val('1800-01-01');

				// 106 Fecha Toma Creatinina

				$('#FechaTomaCreatininaInput').val('1800-01-01');

				// 107 Resultado Creatinina

				$('#ResultadoCreatinina').val('999');

				// 108 Fecha Hemoglobina Glicosilada

				$('#FechaHemoglobinaGlicosiladaInput').val('1800-01-01');

				// 109 Resultado Hemoglobina Glicosilada

				$('#ResultadoHemoglobinaGlicosilada').val('999');

				// 110 Fecha Toma de Microalbuminuria

				$('#FechaTomaMicroalbuminuriaInput').val('1800-01-01');

				// 111 Fecha Toma de HDL

				$('#FechaTomaHDLInput').val('1800-01-01');

				// 112 Fecha Toma de Baciloscopia de Diagnóstico

				$('#FechaTomaBaciloscopiaInput').val('1800-01-01');

				// 113 Resultado de Baciloscopia de Diagnóstico

				$('#ResultadoBaciloscopia').val('22');

				// 114 Tratamiento para Hipotiroidismo Congénito

				$('#TratamientoHipotiroidismoCongenito').val('22');

				// 115 Tratamiento para Sífilis Gestacional

				$('#TratamientoSifilisGestacional').val('0');

				// 116 Tratamiento para Sífilis Congénita

				$('#TratamientoSifilisCongenita').val('0');

				// 117 Tratamiento para Lepra

				$('#TratamientoLepra').val('0');

				// 118 Fecha de Terminación Tratamiento para Leishmaniasis

				$('#FechaTerLeishmaniasisInput').val('1800-01-01');

			}

		});

	// FINAL - VALIDACIÓN FORMULARIO 4505 - VALIDACIÓN DE CONTENIDO ------------------------------------

	// INICIO - VALIDACIÓN FORMULARIO BUSQUEDA USUARIO

		$("#form-res").submit(function()
			{
				var validado = true;

				if ($("#PeriodoReporte").val()===0 || $("#NumeroIdUsuarioRes").val()==='')
				{
					validado = false;
					/*if ($("#NumeroIdUsuarioRes").val()==='')
					{
						$(this).next("<span class='help-inline'>Campo Vacio</span>");
					}*/
				}

				if (!$("#EntidadReporte").val())
				{
					var span = $("<span class='help-inline'>Seleccione Entidad</span>");
					//$("#EntidadReporte").after(span);
					$("#EntidadReporte").next("span").html("Seleccione Entidad");
					$("#Control-Entidad").addClass("error");
					validado = false;
				}


				if(!$("#MesReporte").val())
				{
					$("#MesReporte").next("span").html("Seleccione Mes");
					$("#Control-Mes").addClass("error");
					validado = false;
				}


				if(!$("#PeriodoReporte").val())
				{
					$("#PeriodoReporte").next("span").html("Seleccione Periodo");
					$("#Control-Periodo").addClass("error");
					validado = false;
				}

				if ($("#NumeroIdUsuarioRes").val()==='')
				{
					$("#NumeroIdUsuarioRes").next("span").html("Campo Vacio");
					$("#Control-User").addClass("error");
					validado = false;
					//$("#NumeroIdUsuarioRes").before().addClass("error");
				}

				if (validado === true) return true;
				return false;

			});

			// Mensajes de Alerta Formulario Busqueda Usuario

			$("#NumeroIdUsuarioRes").focus(function()
			{
				$("#Control-User").removeClass("error");
				$("#NumeroIdUsuarioRes").next("span").html("");
			});


			$("#EntidadReporte").click(function()
			{
				$("#Control-Entidad").removeClass("error");
				$("#EntidadReporte").next("span").html("");
			});

			$("#PeriodoReporte").click(function()
			{
				$("#Control-Periodo").removeClass("error");
				$("#PeriodoReporte").next("span").html("");
			});

			$("#NumeroIdUsuario").blur(function(){

				//alert("Hello World!");
				//$("#NumeroIdUsuario").after("<span class='help-inline'>Campo Vacio</span>");
			});

			// Valida si la entidad Seleccionada es ECOOPSOS o COMFAMA
			// Si asi es, muestra controles para Ingresar Tipo Documento, Numero Documento, Apellido1, Apellido1, Nombre1, Nombre2 y Fecha Nacimiento
			// Esto Permite Validar Los Datos de estas dos Entidades con el Maestro del Regimen Subsidiado del FOSYGA

			$("#EntidadReporte").change(function() {
				if ($(this).val() === 'ESS091' || $(this).val() === 'CCF002') 
				{
					//alert ("ECOOPSOS");
					$("#Control-Tipo-Documento").css("display", "block");
					$("#Control-Ap1").css("display", "block");
					$("#Control-Ap2").css("display", "block");
					$("#Control-Nom1").css("display", "block");
					$("#Control-Nom2").css("display", "block");
					$("#Control-FecNac").css("display", "block");
    			} 
    			else if ($(this).val() != 'ESS091' || $(this).val() != 'CCF002') 
    			{
    				$("#Control-Tipo-Documento").css("display", "none");
    				$("#Control-Ap1").css("display", "none");
					$("#Control-Ap2").css("display", "none");
					$("#Control-Nom1").css("display", "none");
					$("#Control-Nom2").css("display", "none");
					$("#Control-FecNac").css("display", "none");
    			}
			});

	// FINAL - VALIDACIÓN FORMULARIO BUSQUEDA USUARIO	
	
	// INICIO - VALIDACIÓN FORMULARIO EXPORTACION DE ARCHIVOS PLANOS 4505

		$("#form-export").submit(function()
			{
				var validado = true;

				if ($("#EntidadReporte").val()==='')
				{
					alert ("Seleccione Entidada a Exportar");
					validado = false;
					return false;
				}

				if ($("#MesInicial").val()==='')
				{
					alert ("Seleccione Mes Inicial");
					validado = false;
					return false;
				}

				if ($("#MesFinal").val()==='')
				{
					alert ("Seleccione Mes Final");
					validado = false;
					return false;
				}

				if ($("#PeriodoInicial").val()==='')
				{
					alert ("Seleccione Año Incial");
					validado = false;
					return false;
				}

				if ($("#PeriodoFinal").val()==='')
				{
					alert ("Seleccione Año Final");
					validado = false;
					return false;
				}

				if (validado === true) return true;
				return false;
			});

	// FINAL - VALIDACIÓN FORMULARIO EXPORTACION DE ARCHIVOS PLANOS 4505

	// INICIO - SELECCIONES RADIO BUTTONS FORMULARIOS 4505

		// Pregunta 33 Fecha Probable de Parto

		$("input[name=FechaProbablePartoRadio]").click(function()
		{
			var radio33 = $("input[name=FechaProbablePartoRadio]:checked").val();
			//alert (radio);
			$('#FechaProbablePartoInput').val(radio33);
		});

		// Pregunta 49 Atención Parto o Cesárea

		$("input[name=FechaAtencionPartoRadio]").click(function()
		{
			var radio49 = $("input[name=FechaAtencionPartoRadio]:checked").val();
			//alert (radio);
			$('#FechaAtencionPartoInput').val(radio49);
		});

		// Pregunta 50 Fecha Salida de la Atención del Parto o Cesárea

		$("input[name=FechaSalidaPartoRadio]").click(function()
		{
			var radio50 = $("input[name=FechaSalidaPartoRadio]:checked").val();
			//alert (radio);
			$('#FechaSalidaPartoInput').val(radio50);
		});


		$("input[name=ControlRecienNacidoRadio]").click(function()
		{
			var radio52 = $("input[name=ControlRecienNacidoRadio]:checked").val();
			//alert (radio);
			$('#ControlRecienNacidoInput').val(radio52);
		});

		$("input[name=PlanificacionFamiliarPrimeraVezRadio]").click(function()
		{
			var radio53 = $("input[name=PlanificacionFamiliarPrimeraVezRadio]:checked").val();
			//alert (radio);
			$('#PlanificacionFamiliarPrimeraVezInput').val(radio53);
		});

		// 55 Fecha Suministro de Método Anticonceptivo

		$("input[name=FechaSuministroMetodoAnticonceptivoRadio]").click(function()
		{
			var radio55 = $("input[name=FechaSuministroMetodoAnticonceptivoRadio]:checked").val();
			//alert (radio);
			$('#FechaSuministroMetodoAnticonceptivoInput').val(radio55);
		});

		// 56 Control Prenatal de Primera Vez

		$("input[name=ControlPrenatalPrimeraVezRadio]").click(function()
		{
			var radio56 = $("input[name=ControlPrenatalPrimeraVezRadio]:checked").val();
			//alert (radio);
			$('#ControlPrenatalPrimeraVezInput').val(radio56);
		});

		// 57 Control Prenatal

		$("input[name=ControlPrenatalRadio]").click(function()
		{
			var radio57 = $("input[name=ControlPrenatalRadio]:checked").val();
			//alert (radio);
			$('#ControlPrenatalInput').val(radio57);
		});

		// 58 Último Control Prenatal

		$("input[name=UltimoControlPrenatalRadio]").click(function()
		{
			var radio58 = $("input[name=UltimoControlPrenatalRadio]:checked").val();
			//alert (radio);
			$('#UltimoControlPrenatalInput').val(radio58);
		})

		// 62 

		$("input[name=ValoracionAgudezaVisualRadio]").click(function()
		{
			var radio62 = $("input[name=ValoracionAgudezaVisualRadio]:checked").val();
			//alert (radio);
			$('#ValoracionAgudezaVisualInput').val(radio62);
		});

		$("input[name=ConsultaOftalmologiaRadio]").click(function()
		{
			var radio63 = $("input[name=ConsultaOftalmologiaRadio]:checked").val();
			//alert (radio);
			$('#ConsultaOftalmologiaInput').val(radio63);
		});

		// 64 Fecha Diagnóstico Desnutrición Proteico Calórica

		$("input[name=FechaDiagnosticoDesnutricionRadio]").click(function()
		{
			var radio64 = $("input[name=FechaDiagnosticoDesnutricionRadio]:checked").val();
			//alert (radio);
			$('#FechaDiagnosticoDesnutricionInput').val(radio64);
		});

		// 65 

		$("input[name=ConsultaMujerMenorVictimaRadio]").click(function()
		{
			var radio65 = $("input[name=ConsultaMujerMenorVictimaRadio]:checked").val();
			//alert (radio);
			$('#ConsultaMujerMenorVictimaInput').val(radio65);
		});

		$("input[name=ConsultaVictimaViolenciaSexualRadio]").click(function()
		{
			var radio66 = $("input[name=ConsultaVictimaViolenciaSexualRadio]:checked").val();
			//alert (radio);
			$('#ConsultaVictimaViolenciaSexualInput').val(radio66);
		});

		$("input[name=ConsultaNutricionRadio]").click(function()
		{
			var radio67 = $("input[name=ConsultaNutricionRadio]:checked").val();
			//alert (radio);
			$('#ConsultaNutricionInput').val(radio67);
		});

		$("input[name=ConsultaPsicologiaRadio]").click(function()
		{
			var radio68 = $("input[name=ConsultaPsicologiaRadio]:checked").val();
			//alert (radio);
			$('#ConsultaPsicologiaInput').val(radio68);
		});

		$("input[name=ConsultaCyDPrimeraVezRadio]").click(function()
		{
			var radio69 = $("input[name=ConsultaCyDPrimeraVezRadio]:checked").val();
			//alert (radio);
			$('#ConsultaCyDPrimeraVezInput').val(radio69);
		});

		$("input[name=ConsultaJovePrimeraVezRadio]").click(function()
		{
			var radio72 = $("input[name=ConsultaJovePrimeraVezRadio]:checked").val();
			//alert (radio);
			$('#ConsultaJovenPrimeraVezInput').val(radio72);
		});

		$("input[name=ConsultaAdultoPrimeraVezRadio]").click(function()
		{
			var radio73 = $("input[name=ConsultaAdultoPrimeraVezRadio]:checked").val();
			//alert (radio);
			$('#ConsultaAdultoPrimeraVezInput').val(radio73);
		});

		$("input[name=PreservativosITSRadio]").click(function()
		{
			var radio74 = $("input[name=PreservativosITSRadio]:checked").val();
			//alert (radio);
			$('#PreservativosITSInput').val(radio74);
		});

		$("input[name=AsesoriaPreElisaRadio]").click(function()
		{
			var radio75 = $("input[name=AsesoriaPreElisaRadio]:checked").val();
			//alert (radio);
			$('#AsesoriaPreElisaInput').val(radio75);
		});

		$("input[name=AsesoriaPostElisaRadio]").click(function()
		{
			var radio76 = $("input[name=AsesoriaPostElisaRadio]:checked").val();
			//alert (radio);
			$('#AsesoriaPostElisaInput').val(radio76);
		});

		$("input[name=FechaAntigenoHepatitisBGestantesRadio]").click(function()
		{
			var radio78 = $("input[name=FechaAntigenoHepatitisBGestantesRadio]:checked").val();
			//alert (radio);
			$('#FechaAntigenoHepatitisBGestantesInput').val(radio78);
		});

		$("input[name=FechaSerologiaSifilisRadio]").click(function()
		{
			var radio80 = $("input[name=FechaSerologiaSifilisRadio]:checked").val();
			//alert (radio);
			$('#FechaSerologiaSifilisInput').val(radio80);
		});

		$("input[name=FechaTomaElisaVIHInputRadio]").click(function()
		{
			var radio82 = $("input[name=FechaTomaElisaVIHInputRadio]:checked").val();
			//alert (radio);
			$('#FechaTomaElisaVIHInput').val(radio82);
		});

		$("input[name=FechaTSHNeonatalRadio]").click(function()
		{
			var radio84 = $("input[name=FechaTSHNeonatalRadio]:checked").val();
			//alert (radio);
			$('#FechaTSHNeonatalInput').val(radio84);
		});

		$("input[name=FechaCitologiaCURadio]").click(function()
		{
			var radio87 = $("input[name=FechaCitologiaCURadio]:checked").val();
			//alert (radio);
			$('#FechaCitologiaCUInput').val(radio87);
		});

		$("input[name=FechaColposcopiaRadio]").click(function()
		{
			var radio91 = $("input[name=FechaColposcopiaRadio]:checked").val();
			//alert (radio);
			$('#FechaColposcopiaInput').val(radio91);
		});

		$("input[name=FechaBiopsiaCervicalRadio]").click(function()
		{
			var radio93 = $("input[name=FechaBiopsiaCervicalRadio]:checked").val();
			//alert (radio);
			$('#FechaBiopsiaCervicalInput').val(radio93);
		});

		$("input[name=FechaMamografiaRadio]").click(function()
		{
			var radio96 = $("input[name=FechaMamografiaRadio]:checked").val();
			//alert (radio);
			$('#FechaMamografiaInput').val(radio96);
		});

		$("input[name=FechaBiopsiaSenoRadio]").click(function()
		{
			var radio99 = $("input[name=FechaBiopsiaSenoRadio]:checked").val();
			//alert (radio);
			$('#FechaBiopsiaSenoInput').val(radio99);
		});

		$("input[name=FechaTomaHemoglobinaRadio]").click(function()
		{
			var radio103 = $("input[name=FechaTomaHemoglobinaRadio]:checked").val();
			//alert (radio);
			$('#FechaTomaHemoglobinaInput').val(radio103);
		});

		$("input[name=FechaTomaGlisemiaRadio]").click(function()
		{
			var radio105 = $("input[name=FechaTomaGlisemiaRadio]:checked").val();
			//alert (radio);
			$('#FechaTomaGlisemiaInput').val(radio105);
		});

		$("input[name=FechaTomaCreatininaRadio]").click(function()
		{
			var radio106 = $("input[name=FechaTomaCreatininaRadio]:checked").val();
			//alert (radio);
			$('#FechaTomaCreatininaInput').val(radio106);
		});

		$("input[name=FechaHemoglobinaGlicosiladaRadio]").click(function()
		{
			var radio108 = $("input[name=FechaHemoglobinaGlicosiladaRadio]:checked").val();
			//alert (radio);
			$('#FechaHemoglobinaGlicosiladaInput').val(radio108);
		});

		$("input[name=FechaTomaMicroalbuminuriaRadio]").click(function()
		{
			var radio110 = $("input[name=FechaTomaMicroalbuminuriaRadio]:checked").val();
			//alert (radio);
			$('#FechaTomaMicroalbuminuriaInput').val(radio110);
		});

		$("input[name=FechaTomaHDLRadio]").click(function()
		{
			var radio111 = $("input[name=FechaTomaHDLRadio]:checked").val();
			//alert (radio);
			$('#FechaTomaHDLInput').val(radio111);
		});

		$("input[name=FechaTomaBaciloscopiaRadio]").click(function()
		{
			var radio112 = $("input[name=FechaTomaBaciloscopiaRadio]:checked").val();
			//alert (radio);
			$('#FechaTomaBaciloscopiaInput').val(radio112);
		});

		$("input[name=FechaTerLeishmaniasisRadio]").click(function()
		{
			var radio118 = $("input[name=FechaTerLeishmaniasisRadio]:checked").val();
			//alert (radio);
			$('#FechaTerLeishmaniasisInput').val(radio118);
		});

	// FINAL - SELECCIONES RADIO BUTTONS FORMULARIOS 4505

});