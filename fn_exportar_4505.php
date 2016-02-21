<?php
// Ultima Modificacion el dia 22 de Junio de 2014 10:41 PM
require_once ("cl_clases.php");
$tra = new Trabajo();

$entidad = $_POST["EntidadReporte"];

$MonthIni = $_POST["MesInicial"];		// Mes Inicial del Formulario
$MonthFin = $_POST["MesFinal"];			// Mes Final del Formulario

$YearIni = $_POST["PeriodoInicial"];	// Año Inicial del Formulario
$YearFin = $_POST["PeriodoFinal"];		// Año Final del Formulario

$MesIn = substr($MonthIni, 0,2);		// Mes Inicial del Formulario
$MesFin = substr($MonthFin, 0,2);		// Mes Final del Formulario

$UltimoDiaMMesIn = substr($MonthIni, 3,2); 	// ULtimo Dia Mes Inicial del Formulario
$UltimoDiaMMesFin = substr($MonthFin, 3,2); // ULtimo Dia Mes Final del Formulario

$PeriodoInicial = $YearIni."-".$MesIn."-01";
$PeriodoFinal = $YearFin."-".$MesFin."-".$UltimoDiaMMesFin;

			switch ($entidad) 
			{
				case 'CCF002';
					$regimen="S";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case 'EPS003';
					$regimen="C";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case 'EPS009';
					$regimen="C";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case 'EPS013';
					$regimen="C";
					$TipoIdEntidad="NI";
					$IdEntidad="053680483301";
					break;

				case 'EPS016';
					$regimen="C";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case 'EPS037';
					$regimen="C";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case 'ESS024':
					$regimen="S";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case 'ESS091':
					$regimen="S";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case 'RES001';
					$regimen="E";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case 'RES003';
					$regimen="E";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case 'RES004';
					$regimen="E";
					$TipoIdEntidad="NI";
					$IdEntidad="000890980765";
					break;

				case '05368';
					$regimen="N";
					$TipoIdEntidad="MU";
					$IdEntidad="000000005368";
					break;

			}
//$PeriodoInicialExportacion = '2013-01-01'; // Exporta Todo desde Primero de Enero de 2013
$PeriodoInicialExportacion = $PeriodoInicial;	// Exporta desde el Periodo Inicial Seleccionado en el Formulario de Exportación

$registroseps=$tra->registros_por_eps($entidad,$PeriodoInicialExportacion,$PeriodoFinal);
$reg=$tra->lista_4505($PeriodoInicialExportacion, $PeriodoFinal);

$res='4505';
$año = substr($PeriodoFinal, 0, 4);
$mes = substr($PeriodoFinal, 5, 2);
$dia = substr($PeriodoFinal, 8, 2);

if ($entidad == 'EPS013' || $entidad == 'EPS003')
{
	$nombreArchivo=$res."".$año."".$mes."".$dia."".$entidad."".$IdEntidad.""."01.TXT";
} else 
{
	$nombreArchivo="SGD280RPED".$año."".$mes."".$dia."".$TipoIdEntidad."".$IdEntidad."".$regimen."01.TXT";
}

// Calculo Periodo Final Para COOMEVA

if ($entidad == 'EPS016')
{
	if ($MesIn=='01' || $MesIn=='02' || $MesIn=='03')
	{
		$PeriodoFinal = $YearFin."-".'03-31';
	}
	else if ($MesIn=='04' || $MesIn=='05' || $MesIn=='06')
	{
		$PeriodoFinal = $YearFin."-".'06-30';
	}
	else if ($MesIn=='07' || $MesIn=='08' || $MesIn=='09')
	{
		$PeriodoFinal = $YearFin."-".'09-30';
	}
	else if ($MesIn=='10' || $MesIn=='11' || $MesIn=='12')
	{
		$PeriodoFinal = $YearFin."-".'12-31';
	}
}

function calcularEdad ($PeriodoFinal, $FechaNacimiento)
{
	$dateExport = date($PeriodoFinal);
	$FechaNacimiento = date($FechaNacimiento);
	$yearExport = date("Y", strtotime($dateExport));
	$monthExport = date("m", strtotime($dateExport));
	$dayExport = date("d", strtotime($dateExport));
	$yearBirthday = date("Y", strtotime($FechaNacimiento));
	$monthBirthday = date("m", strtotime($FechaNacimiento));
	$dayhBirthday = date("d", strtotime($FechaNacimiento));

	if ($monthExport>$monthBirthday)
	{	
		//Si Mes Exportacion es Mayor a Mes de Nacimiento;
		$edad = $yearExport - $yearBirthday;
		return $edad;
	} else if ($monthExport<$monthBirthday)
	{	
		//Si Mes Exportacion es Menor a Mes de Nacimiento;
		$edad = $yearExport - $yearBirthday - 1;
		return $edad;

		// Si Mes Exportacion es Igual a Mes de Nacimiento
	} else if ($monthExport==$monthBirthday)
	{
		if ($dayExport>=$dayhBirthday)
		{
			$edad = $yearExport - $yearBirthday;
			return $edad;
		} else if ($dayExport<$dayhBirthday)
		{
			$edad = $yearExport - $yearBirthday - 1;
			return $edad;
		}
	}
}

function calcularEdadenDias ($PeriodoFinal, $FechaNacimiento)
{
	$segundos=strtotime($FechaNacimiento) - strtotime($PeriodoFinal);
	$dias=intval($segundos/60/60/24);
	return $dias;
}

$txt=fopen("$nombreArchivo","w");

fwrite($txt,$reg[0]["TipoRegistroControl"]);
fwrite($txt,"|");
fwrite($txt,$reg[0]["CodigoEPSoDLS"]);
fwrite($txt,"|");
fwrite($txt,$PeriodoInicial);
fwrite($txt,"|");
fwrite($txt,$PeriodoFinal);
fwrite($txt,"|");
fwrite($txt,$registroseps.PHP_EOL);

for ($i=0;$i<sizeof($reg);$i++)
{
	$edad = calcularEdad($PeriodoFinal, $reg[$i]["FechaNacimiento"]);
	$EdadAn = calcularEdad($PeriodoFinal, $reg[$i]["FechaNacimiento"]);
	$edadDias = calcularEdadenDias ($reg[$i]["FechaNacimiento"], $PeriodoFinal);
	fwrite($txt,$reg[$i]["TipoRegistroDetalle"]);
	fwrite($txt,"|");
	fwrite($txt,$i+1);
	//fwrite($txt,$reg[$i]["ConsecutivoRegistro"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["CodigoHabilitacion"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["TipoIdUsuario"]);
	fwrite($txt,"|");
	fwrite($txt,trim($reg[$i]["NumeroIdUsuario"]));
	fwrite($txt,"|");
	fwrite($txt,trim($reg[$i]["Apellido1"]));
	fwrite($txt,"|");
	fwrite($txt,trim($reg[$i]["Apellido2"]));
	fwrite($txt,"|");
	fwrite($txt,trim($reg[$i]["Nombre1"]));
	fwrite($txt,"|");
	fwrite($txt,trim($reg[$i]["Nombre2"]));
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["FechaNacimiento"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["Sexo"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["PertenenciaEtnica"]);
	fwrite($txt,"|");
	fwrite($txt,'9999'); // 12. Código de ocupación
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["CodigoNivelEducativo"]);
	fwrite($txt,"|");

	$Edad = $edadDias / 365;
	$Edad360 = ($edadDias / 365);
	$ValGestacion = $reg[$i]["Gestacion"];
	$EdadRound = floor($Edad);
	$EdadResiduo = $EdadRound % 5;
		if ($reg[$i]["Sexo"]=='M' && $ValGestacion=='0' && $ValGestacion!='')
		{
			fwrite($txt,$reg[$i]["Gestacion"]); // Condicion 1
		} 
		else if ($reg[$i]["Sexo"]=='F' && $ValGestacion!='' && $ValGestacion == '0' && $Edad < 10)
		{
			fwrite($txt,$reg[$i]["Gestacion"]); // Condicion 2
		} 
		else if ($reg[$i]["Sexo"]=='F' && $ValGestacion!='' && $Edad > 49 && ($ValGestacion == '0' || $ValGestacion == '2'))
		{
			fwrite($txt,$reg[$i]["Gestacion"]); // Condicion 3
		} 
		else if ($reg[$i]["Sexo"]=='F' && $Edad >= 10 && $Edad <= 49 && $ValGestacion > 0 && $ValGestacion !='')
		{
			fwrite($txt,'21'); // Condicion 4
		} 
		else if ($reg[$i]["Sexo"]=='F' && ($Edad >= 10 && $Edad <= 49) && $ValGestacion == '0')
		{
			fwrite($txt,'21'); // Condicion 5
		} 
		else if ($reg[$i]["Sexo"]=='F' && $ValGestacion == '21' && $Edad < 10) // Condicion Para Saludcoop
		{
			fwrite($txt,'0');
		}
		else 
		{
			fwrite($txt,$reg[$i]["Gestacion"]);
		}

		//fwrite($txt,$reg[$i]["Gestacion"]); // 14. Gestacion
	fwrite($txt,"|");
		if ($Edad < 10 && $reg[$i]["Gestacion"]=='0' && $reg[$i]["SifilisGestacional"]=='1' && $reg[$i]["Sexo"]=='F') // Error
		{
			fwrite($txt,'21'); // Condicion 1
		} 
		else if ($reg[$i]["SifilisGestacional"]=='1' && $reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,'21'); // Condicion 2
		} 
		else if (($reg[$i]["SifilisGestacional"]=='1' || $reg[$i]["SifilisGestacional"]=='3' || $reg[$i]["SifilisGestacional"]=='21') && $reg[$i]["Sexo"]=='F' && ($Edad >= 10 && $Edad <= 49) && $ValGestacion > 0 && $reg[$i]["SifilisGestacional"]!='1')
		{
			fwrite($txt,'21'); // Condicion 3 Verificada
		} 
		else if ($reg[$i]["SifilisGestacional"]=='1' && $reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"]=='1' && $reg[$i]["SifilisGestacional"]!='' && ($Edad >= 10 && $Edad <=49))
		{
			fwrite($txt,$reg[$i]["SifilisGestacional"]); // Condicion 4
		} 
		else if (($reg[$i]["SifilisGestacional"]=='0' || $reg[$i]["SifilisGestacional"]=='3') && $reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"] >= 0 && $reg[$i]["SifilisGestacional"]!='' && ($Edad<10 || $Edad >49))
		{
			fwrite($txt,'0'); // Condicion 5
		} 
		else if ($reg[$i]["SifilisGestacional"]=='0' && $reg[$i]["Sexo"]=='M' && (($Edad * 360) >= 90 ) && $reg[$i]["Gestacion"]=='0' && $reg[$i]["SifilisGestacional"]!='')
		{
			fwrite($txt,'0'); // Condicion 6
		} 
		else if ($reg[$i]["SifilisGestacional"] > 0 && (($Edad * 360) < 90) && $reg[$i]["SifilisGestacional"]!='')
		{
			fwrite($txt,$reg[$i]["SifilisGestacional"] ); // Condicion 7
		} 
		else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"]=='0' && $reg[$i]["SifilisGestacional"]=='21' && ($Edad >= 10 && $Edad <= 49) )
		{
			fwrite($txt,'21');	// Condicion 8
		}
		else 
		{
			fwrite($txt,$reg[$i]["SifilisGestacional"]);	// Condicion 9
		}

	//fwrite($txt,$reg[$i]["SifilisGestacional"]); // 15. Sifilis Gestacional y Congenita
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M' && $reg[$i]["HipertensionInducidaGestacion"]=='0' && $reg[$i]["HipertensionInducidaGestacion"]!='')
		{
			fwrite($txt,$reg[$i]["HipertensionInducidaGestacion"]);
		} else if ($reg[$i]["Sexo"]=='F' && $Edad < 10 && $reg[$i]["Gestacion"]!='1' && $reg[$i]["HipertensionInducidaGestacion"]!='' && $reg[$i]["HipertensionInducidaGestacion"]=='0')
		{
			fwrite($txt,$reg[$i]["HipertensionInducidaGestacion"]);
		} else if ($reg[$i]["HipertensionInducidaGestacion"]!='0' && $reg[$i]["Sexo"]=='F' && $ValGestacion > 0 && $reg[$i]["HipertensionInducidaGestacion"]!='' && $Edad >= 10 && $Edad <= 49)
		{
			fwrite($txt,$reg[$i]["HipertensionInducidaGestacion"]);
		} else if ($reg[$i]["HipertensionInducidaGestacion"] >= 0 && $reg[$i]["Sexo"]=='F' && $ValGestacion >= 0 && $reg[$i]["HipertensionInducidaGestacion"]!='' && ($Edad <10 || $Edad > 49))
		{
			fwrite($txt,$reg[$i]["HipertensionInducidaGestacion"]);
		} else {
			fwrite($txt,$reg[$i]["HipertensionInducidaGestacion"]);
		}
	//fwrite($txt,$reg[$i]["HipertensionInducidaGestacion"]); // 16. Hipertension Inducida por la Gestacion
	fwrite($txt,"|");
		if ($edad >= 3)
		{
			fwrite($txt,'0');
		} else if ($edad <= 3 && $reg[$i]["HipotiroidismoCongenito"]=='0')
		{
			fwrite($txt,'21');
		} else {
			fwrite($txt,$reg[$i]["HipotiroidismoCongenito"]);
		}
	//fwrite($txt,$reg[$i]["HipotiroidismoCongenito"]); // 17. Hipotiroidismo Congenito
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["SintomaticoRespiratorio"]);
	fwrite($txt,"|");
		if ($reg[$i]["Tuberculosis"]=='')
		{
			fwrite($txt,'21');
		} else {
			fwrite($txt,$reg[$i]["Tuberculosis"]);
		}
	//fwrite($txt,$reg[$i]["Tuberculosis"]); // 19. Tuberculosis Multidrogoresistente
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["Lepra"]);
	fwrite($txt,"|");
		if ($reg[$i]["ObesidadDesnutricion"]=='')
		{
			fwrite($txt,'21');
		} else {
			fwrite($txt,$reg[$i]["ObesidadDesnutricion"]);
		}
	//fwrite($txt,$reg[$i]["ObesidadDesnutricion"]); // 21. Obsesidad o Desnutrición Proteico Calórica
	fwrite($txt,"|");
		if ($edad >= 19 and $reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,'0');
		} else if ($edad < 19 and $reg[$i]["VictimaMaltrato"]=='0')
		{
			fwrite($txt,'21');
		} else {
			fwrite($txt,$reg[$i]["VictimaMaltrato"]);
		}
	//fwrite($txt,$reg[$i]["VictimaMaltrato"]); // 22. Victima Maltrato
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["VictimaViolenciaSexual"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["InfeccionTrasmisionSexual"]);
	fwrite($txt,"|");
		if ($reg[$i]["EnfermedadMental"] == '21' && $Edad < 3)
		{
			fwrite($txt,$reg[$i]["EnfermedadMental"]);
		} else if ($reg[$i]["EnfermedadMental"] > 0 && $Edad >= 3)
		{
			fwrite($txt,$reg[$i]["EnfermedadMental"]);
		} else 
		{
			fwrite($txt,$reg[$i]["EnfermedadMental"]);
		}
	//fwrite($txt,$reg[$i]["EnfermedadMental"]); // 25. Enfermedad Mental
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["CancerCervix"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["CancerSeno"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["FluorosisDental"]);
	fwrite($txt,"|");
		$DifDiasPeso = calcularEdadenDias($reg[$i]["FechaPeso"], $PeriodoFinal);
		if ($DifDiasPeso > 90)
		{
			fwrite($txt,'1800-01-01');
		}
		else
		{
			fwrite($txt,$reg[$i]["FechaPeso"]);
		}
	//fwrite($txt,$reg[$i]["FechaPeso"]);	// 29. Fecha Peso
	fwrite($txt,"|");
		if ($reg[$i]["PesoKilogramos"] > 1000)
		{
			$peso = $reg[$i]["PesoKilogramos"] * 0.001;
			fwrite($txt,$peso);
		} else {
			fwrite($txt,$reg[$i]["PesoKilogramos"]);
		}
	//fwrite($txt,$reg[$i]["PesoKilogramos"]); // 30. Peso en Kilogramos
	fwrite($txt,"|");
		$DifDiasTalla = calcularEdadenDias($reg[$i]["FechaTalla"], $PeriodoFinal);
		if ($DifDiasTalla > 90)
		{
			fwrite($txt,'1800-01-01');
		}
		else
		{
			fwrite($txt,$reg[$i]["FechaTalla"]);
		}
	//fwrite($txt,$reg[$i]["FechaTalla"]); // 31. Fecha Talla
	fwrite($txt,"|");
		if ($reg[$i]["TallaCentimetros"] > 225 && $reg[$i]["TallaCentimetros"]!='999')
		{
			$talla = $reg[$i]["TallaCentimetros"] * 0.1;
			fwrite($txt,$talla);
		} else {
			fwrite($txt,$reg[$i]["TallaCentimetros"]);
		}
	//fwrite($txt,$reg[$i]["TallaCentimetros"]); // 32. Talla en Centimetros
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M' || $reg[$i]["Gestacion"]=='2')
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"]=='0')
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"]=='1' && $reg[$i]["FechaProbableParto"]=='1845-01-01') 
		{
			fwrite($txt,'1800-01-01');
		} else {
			fwrite($txt,$reg[$i]["FechaProbableParto"]);
		}
	//fwrite($txt,$reg[$i]["FechaProbableParto"]); // 33. Fecha Probable Parto
	fwrite($txt,"|");
		if ($edad < 6 and $reg[$i]["EdadGestacional"]=='0')
		{
			fwrite($txt,'999');
		} else {
			fwrite($txt,$reg[$i]["EdadGestacional"]);
		}
	//fwrite($txt,$reg[$i]["EdadGestacional"]); // 34. Edad Gestacion al Nacer
	fwrite($txt,"|");
		if ($reg[$i]["BCG"]!='0' && $Edad > 6 && $reg[$i]["Lepra"]!='3')
		{
			if ($entidad=='EPS013')
			{
				fwrite($txt,'0'); // Condicion Para Saludcoop
			}
			else
			{
				fwrite($txt,$reg[$i]["BCG"]); // Condicion 1
			}
		} 
		else if ($reg[$i]["BCG"]=='0' && $Edad > 6) 
		{
			fwrite($txt,$reg[$i]["BCG"]); // Condicion 2
		} 
		else if ($reg[$i]["BCG"] >= 1 && $Edad > 0 && $Edad <= 6)
		{
			fwrite($txt,$reg[$i]["BCG"]); // Condicion 3
		} 
		else if ($reg[$i]["BCG"] == '22' && $Edad > 6)
		{
			fwrite($txt,'0'); // Condicion 4
		} 
		else 
		{
			fwrite($txt,$reg[$i]["BCG"]);
		}
	//fwrite($txt,$reg[$i]["BCG"]); // 35. BCG
	fwrite($txt,"|");
		if ($reg[$i]["HepatitisB"]=='0' && $reg[$i]["HepatitisB"]!='' && $Edad > 6)
		{
			fwrite($txt,$reg[$i]["HepatitisB"]);
		} 
		else if ($reg[$i]["HepatitisB"] > 1 && $Edad > 0 &&  $reg[$i]["HepatitisB"]!='' && $Edad <= 6)
		{
			fwrite($txt,$reg[$i]["HepatitisB"]); 
		} 
		else if ($reg[$i]["HepatitisB"]=='0' && $Edad > 0 && $Edad <= 6)
		{
			if ($entidad == 'EPS013')
			{
				fwrite($txt,'0');
			}
			else
			{
				fwrite($txt,'22');
			}
		} 
		else 
		{
			fwrite($txt,$reg[$i]["HepatitisB"]);
		}
		//fwrite($txt,$reg[$i]["HepatitisB"]); // 36. Hepatitis B Menores de 1 año
	fwrite($txt,"|");
		if ($reg[$i]["Pentavalente"]=='0' && $Edad > 6)
		{
			fwrite($txt,$reg[$i]["Pentavalente"]);
		} 
		else if ($reg[$i]["Pentavalente"] >= 1 && $Edad > 0 && $Edad <= 6)
		{
			if ($entidad == 'EPS013' && $reg[$i]["Pentavalente"] == '22')
			{
				fwrite($txt,'0');
			}
			else
			{
				fwrite($txt,$reg[$i]["Pentavalente"]);
			}
		} 
		else if ($reg[$i]["Pentavalente"]=='22' && $Edad > 6)
		{
			fwrite($txt,'0');
		} 
		else if ($reg[$i]["Pentavalente"]=='0' && $Edad <= 6)
		{
			if ($entidad == 'EPS013') // Condicion Para Saludcoop
			{
				fwrite($txt,'22');
			}
			else
			{
				fwrite($txt,'22');
			}
		}
		else 
		{
			fwrite($txt,$reg[$i]["Pentavalente"]);
		}
	// fwrite($txt,$reg[$i]["Pentavalente"]); // 37. Pentavalente
	fwrite($txt,"|");
		if ($edad > 6)
		{
			fwrite($txt,'0');
		} else if ($edad < 6 and $reg[$i]["Polio"]=='0') 
		{
			fwrite($txt,'22');
		} else {
			fwrite($txt,$reg[$i]["Polio"]);
		}
	// fwrite($txt,$reg[$i]["Polio"]); // 38. Polio
	fwrite($txt,"|");
		if ($edad > 6)
		{
			fwrite($txt,'0');
		} else if ($edad < 6 and $reg[$i]["DPT"]=='0')
		{
			fwrite($txt,'22');
		} else {
			fwrite($txt,$reg[$i]["DPT"]);
		}
	//fwrite($txt,$reg[$i]["DPT"]); // 39. DPT en Menores de 5 años
	fwrite($txt,"|");
		if ($reg[$i]["Rotavirus"]=='0' && $Edad >= 6)
		{
			fwrite($txt,$reg[$i]["Rotavirus"]);
		} else if ($reg[$i]["Rotavirus"] >= 1 && $Edad > 0 && $Edad <= 6)
		{
			fwrite($txt,$reg[$i]["Rotavirus"]);
		} else if ($reg[$i]["Rotavirus"]=='0' && ($Edad > 0 && $Edad <= 6))
		{
			fwrite($txt,'22');
		} else if ($reg[$i]["Rotavirus"]=='22' && $Edad >= 6)
		{
			fwrite($txt,'0');
		} else 
		{
			fwrite($txt,$reg[$i]["Rotavirus"]);
		}
	//fwrite($txt,$reg[$i]["Rotavirus"]); // 40. Rotavirus
	fwrite($txt,"|");
		if ($reg[$i]["Neumococo"]=='0' && $Edad >= 6)
		{
			fwrite($txt,$reg[$i]["Neumococo"]);
		} else if ($reg[$i]["Neumococo"] >= 1 && $Edad > 0 && $Edad <= 6)
		{
			fwrite($txt,$reg[$i]["Neumococo"]);
		} else if ($reg[$i]["Neumococo"]=='0' && ($Edad > 0 && $Edad <= 6))
		{
			fwrite($txt,'22');
		} else if ($reg[$i]["Neumococo"]=='22' && $Edad >= 6)
		{
			fwrite($txt,'0');
		} else 
		{
			fwrite($txt,$reg[$i]["Neumococo"]);
		}
	//fwrite($txt,$reg[$i]["Neumococo"]); // 41. Neumococo
	fwrite($txt,"|");
		if ($reg[$i]["InfluenzaN"]=='0' && $Edad >= 6)
		{
			fwrite($txt,$reg[$i]["InfluenzaN"]);
		} else if ($reg[$i]["InfluenzaN"] >= 1 && $Edad > 0 && $Edad <= 6)
		{
			fwrite($txt,$reg[$i]["InfluenzaN"]);
		} else if ($reg[$i]["InfluenzaN"]=='0' && ($Edad > 0 && $Edad <= 6))
		{
			fwrite($txt,'22');
		} else if ($reg[$i]["InfluenzaN"]=='22' && $Edad >= 6)
		{
			fwrite($txt,'0');
		} else 
		{
			fwrite($txt,$reg[$i]["InfluenzaN"]);
		}
	//fwrite($txt,$reg[$i]["InfluenzaN"]); // 42. Influenza Niños
	fwrite($txt,"|");
		if ($reg[$i]["FiebreAmarillaN1"]=='0' && $Edad >= 6)
		{
			fwrite($txt,$reg[$i]["FiebreAmarillaN1"]);
		} 
		else if ($reg[$i]["FiebreAmarillaN1"] >= 1 && $Edad > 0 && $Edad <= 6)
		{
			fwrite($txt,$reg[$i]["FiebreAmarillaN1"]);
		} 
		else if ($reg[$i]["FiebreAmarillaN1"]=='0' && ($Edad > 0 && $Edad <= 6))
		{
			fwrite($txt,'22');
		}
		else if ($reg[$i]["FiebreAmarillaN1"]=='22' && $Edad >= 6)
		{
			fwrite($txt,'0');
		} else 
		{
			fwrite($txt,$reg[$i]["FiebreAmarillaN1"]);
		}
	//fwrite($txt,$reg[$i]["FiebreAmarillaN1"]); // 43. Fiebre Amarilla en Menores de Un Año
	fwrite($txt,"|");
		if ($reg[$i]["HepatitisA"]=='0' && $Edad >= 6)
		{
			fwrite($txt,$reg[$i]["HepatitisA"]);
		} else if ($reg[$i]["HepatitisA"] >= 1 && $Edad > 0 && $Edad <= 6)
		{
			fwrite($txt,$reg[$i]["HepatitisA"]);
		} else if ($reg[$i]["HepatitisA"]=='0' && ($Edad > 0 && $Edad <= 6))
		{
			fwrite($txt,'22');
		} else if ($reg[$i]["HepatitisA"]=='22' && $Edad >= 6)
		{
			fwrite($txt,'0');
		} else 
		{
			fwrite($txt,$reg[$i]["HepatitisA"]);
		}
	//fwrite($txt,$reg[$i]["HepatitisA"]); // 44. Hepatitis A
	fwrite($txt,"|");
		if ($edad > 6)
		{
			fwrite($txt,'0');
		} else if ($edad < 6 && $reg[$i]["TripleViralN"]=='0')
		{
			fwrite($txt,'22');
		} else {
			fwrite($txt,$reg[$i]["TripleViralN"]);
		}
	//fwrite($txt,$reg[$i]["TripleViralN"]); // 45. Triple Viral Niños
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='F' && $Edad <= 9 && $reg[$i]["VPH"]=='20')
		{
			fwrite($txt,$reg[$i]["VPH"]);
		} else if ($reg[$i]["Sexo"]=='F' && $Edad >= 25 && $reg[$i]["VPH"]=='20')
		{
			fwrite($txt,$reg[$i]["VPH"]);
		} else if ($reg[$i]["Sexo"]=='M' && $reg[$i]["VPH"]=='0')
		{
			fwrite($txt,$reg[$i]["VPH"]);
		} else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["VPH"]=='0')
		{
			fwrite($txt,'20');
		} else if ($reg[$i]["Sexo"]=='F' && $Edad > 9 && $Edad < 25 && $reg[$i]["VPH"]!='0')
		{
			fwrite($txt,$reg[$i]["VPH"]);
		} else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["VPH"]=='22' && (($Edad >= 25) || ($Edad <= 9)))
		{
			fwrite($txt,'20');
		} else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["VPH"]=='2' && (($Edad >= 25) || ($Edad <= 9)))
		{
			fwrite($txt,'20'); 
		} else 
		{
			fwrite($txt,$reg[$i]["VPH"]);
		}
	//fwrite($txt,$reg[$i]["VPH"]); // 46. Virus del Papiloma Humano (VPH)
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='F' && $Edad <= 15 && $reg[$i]["TdTtMEF"]=='20')
		{
			fwrite($txt,$reg[$i]["TdTtMEF"]);
		} 
		else if ($reg[$i]["Sexo"]=='F' && $Edad >= 49 && $reg[$i]["TdTtMEF"]=='20')
		{
			fwrite($txt,$reg[$i]["TdTtMEF"]);
		} 
		else if ($reg[$i]["Sexo"]=='M' && $reg[$i]["TdTtMEF"]=='0')
		{
			fwrite($txt,$reg[$i]["TdTtMEF"]);
		} 
		else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["TdTtMEF"]=='0')
		{
			if ((($Edad >= 49) || ($Edad <= 15)))
				{
					fwrite($txt,'20');
				} 
				else if ($Edad > 15 && $Edad < 49)
				{
					fwrite($txt,'22');
				} 
				else 
				{
					fwrite($txt,$reg[$i]["TdTtMEF"]);
				}
		}
		 else if ($reg[$i]["Sexo"]=='F' && $Edad > 15 && $Edad < 49 && $reg[$i]["TdTtMEF"]!='20')
		{
			fwrite($txt,$reg[$i]["TdTtMEF"]);
		} 
		else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["TdTtMEF"]=='22' && (($Edad >= 49) || ($Edad <= 15)))
		{
			fwrite($txt,'20');
		} 
		else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["TdTtMEF"]=='2' && (($Edad >= 49) || ($Edad <= 15)))
		{
			fwrite($txt,'20'); 
		} 
		else 
		{
			fwrite($txt,$reg[$i]["TdTtMEF"]);
		}
	//fwrite($txt,$reg[$i]["TdTtMEF"]); // 47. TD o TT Mujeres en Edad Fertil 15  a 49 años
	fwrite($txt,"|");
		if ($Edad < 2)
		{
			fwrite($txt,'0');
		} 
		else if ($Edad > 2 && $reg[$i]["ControlPlacaBacteriana"]=='0')
		{
			fwrite($txt,'22');
		} 
		else {
			fwrite($txt,$reg[$i]["ControlPlacaBacteriana"]);
		}
	//fwrite($txt,$reg[$i]["ControlPlacaBacteriana"]); // 48. Control de Placa Bacteriana
	fwrite($txt,"|");
		if ($reg[$i]["Gestacion"]=='0' || $reg[$i]["Gestacion"]=='2' || $reg[$i]["Gestacion"]=='21')
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["Gestacion"]=='1' && $reg[$i]["FechaAtencionParto"]=='1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		} else {
			fwrite($txt,$reg[$i]["FechaAtencionParto"]);
		}
	//fwrite($txt,$reg[$i]["FechaAtencionParto"]); // 49. Fecha Atencion Parto o Cesarea
	// SEGUN Secretaria Seccional de Salud cuando registre un dato diferente a 1845-01-01 no debe ser gestante. 2
	fwrite($txt,"|");
		if ($reg[$i]["Gestacion"]=='0' || $reg[$i]["Gestacion"]=='2' || $reg[$i]["Gestacion"]=='21')
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["Gestacion"]=='1' && $reg[$i]["FechaSalidaParto"]=='1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		} else {
			fwrite($txt,$reg[$i]["FechaSalidaParto"]);
		}
	//fwrite($txt,$reg[$i]["FechaSalidaParto"]); // 50. Fecha Salida de la Atención del Parto o Cesárea
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M' || $reg[$i]["Gestacion"]=='2')
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["Gestacion"]=='1' && $reg[$i]["FechaConsejeriaLactanciaInput"]=='1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		} else {
			fwrite($txt,$reg[$i]["FechaConsejeriaLactanciaInput"]);
		}
	//fwrite($txt,$reg[$i]["FechaConsejeriaLactanciaInput"]); // 51. Fecha de Consejería en Lactancia Materna
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ControlRecienNacidoInput"]);
	fwrite($txt,"|");
		if ($Edad > 10 && $Edad < 50 && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]!='1845-01-01')
		{
			fwrite($txt,$reg[$i]["PlanificacionFamiliarPrimeraVezInput"]);
		} else if ($reg[$i]["Gestacion"]=='1' && ($Edad > 10 && $Edad < 50) && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["PlanificacionFamiliarPrimeraVezInput"]);
		} else if ($Edad < 10 && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["PlanificacionFamiliarPrimeraVezInput"]);
		} else if ($reg[$i]["Sexo"]=='M' && $Edad < 10 && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["PlanificacionFamiliarPrimeraVezInput"]);
		} else if ($reg[$i]["Sexo"]=='M' && $Edad > 10 && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]!='1845-01-01')
		{
			fwrite($txt,$reg[$i]["PlanificacionFamiliarPrimeraVezInput"]);
		} else if ($reg[$i]["Sexo"]=='F' && $Edad > 50 && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["PlanificacionFamiliarPrimeraVezInput"]);
		} else if ($reg[$i]["Sexo"]=='F' && $Edad < 10 && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["Sexo"]=='M' && $Edad > 10 && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]=='1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		} else if ($reg[$i]["Sexo"]=='F' && $Edad > 10 && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]=='1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		} else if ($reg[$i]["Sexo"]=='F'  && $Edad > 50 && $reg[$i]["PlanificacionFamiliarPrimeraVezInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01');
		} else 
		{
			fwrite($txt,$reg[$i]["PlanificacionFamiliarPrimeraVezInput"]);
		}

		//fwrite($txt,$reg[$i]["PlanificacionFamiliarPrimeraVezInput"]); //53. Planificacion Familiar Primera Vez Input
	fwrite($txt,"|");
		if ($Edad < 10 && $reg[$i]["SuministroMetodoAnticonceptivo"]=='0' && $reg[$i]["SuministroMetodoAnticonceptivo"]!='')
		{
			fwrite($txt,$reg[$i]["SuministroMetodoAnticonceptivo"]);
		} else if ($Edad >= 10 && $Edad < 50 && $reg[$i]["Gestacion"]=='1' && $reg[$i]["SuministroMetodoAnticonceptivo"]=='0' && $reg[$i]["SuministroMetodoAnticonceptivo"]!='')
		{
			fwrite($txt,$reg[$i]["SuministroMetodoAnticonceptivo"]);
		} else if ($Edad >= 10 && $reg[$i]["SuministroMetodoAnticonceptivo"]!='' && $reg[$i]["SuministroMetodoAnticonceptivo"]!='0')
		{
			fwrite($txt,$reg[$i]["SuministroMetodoAnticonceptivo"]);
		} else if ($reg[$i]["Sexo"]=='M' && $reg[$i]["SuministroMetodoAnticonceptivo"]=='0' && $Edad > 10)
		{
			fwrite($txt,'21');
		} else if ($reg[$i]["Sexo"]=='F' && $Edad < 10 && $reg[$i]["SuministroMetodoAnticonceptivo"]=='21')
		{
			fwrite($txt,'0');
		} else 
		{
			fwrite($txt,$reg[$i]["SuministroMetodoAnticonceptivo"]);
		}
	//fwrite($txt,$reg[$i]["SuministroMetodoAnticonceptivo"]); //54. Planificacion Familiar Primera Vez Input
	fwrite($txt,"|");
		if ($Edad < 10 && $reg[$i]["FechaSuministroMetodoAnticonceptivo"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaSuministroMetodoAnticonceptivo"]);
		} else if ($reg[$i]["Sexo"]=='F' && $Edad > 50 && $reg[$i]["FechaSuministroMetodoAnticonceptivo"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaSuministroMetodoAnticonceptivo"]);
		} else if ($Edad >= 10 && $reg[$i]["FechaSuministroMetodoAnticonceptivo"]!='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaSuministroMetodoAnticonceptivo"]);
		} else if ($reg[$i]["Gestacion"]=='1' && $Edad >= 10 && $Edad < 50 && $reg[$i]["FechaSuministroMetodoAnticonceptivo"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaSuministroMetodoAnticonceptivo"]);
		} else if ($reg[$i]["Sexo"]=='F' && $Edad < 10 && $reg[$i]["FechaSuministroMetodoAnticonceptivo"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["Sexo"]=='M' && $Edad > 10 && $reg[$i]["FechaSuministroMetodoAnticonceptivo"]=='1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		} else 
		{
			fwrite($txt,$reg[$i]["FechaSuministroMetodoAnticonceptivo"]);
		}
	//fwrite($txt,$reg[$i]["FechaSuministroMetodoAnticonceptivo"]); //55. Fecha Suministro Metodo Anticonceptivo
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["Gestacion"]=='1')
		{
			fwrite($txt,'1800-01-01');
		} else 
		{
			fwrite($txt,$reg[$i]["ControlPrenatalPrimeraVezInput"]);
		}
	//fwrite($txt,$reg[$i]["ControlPrenatalPrimeraVezInput"]); // 56. Control Prenatal de Primera Vez
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M' || $reg[$i]["Gestacion"]=='2' || $reg[$i]["Gestacion"]=='0')
		{
			fwrite($txt,'0');
		} else if ($reg[$i]["Gestacion"]=='1' && $reg[$i]["ControlPrenatal"]=='0')
		{
			fwrite($txt,'999');
		} else {
			fwrite($txt,$reg[$i]["ControlPrenatal"]);
		}
	//fwrite($txt,$reg[$i]["ControlPrenatal"]); // 57. Control Prenatal
	fwrite($txt,"|");
		if ($reg[$i]["UltimoControlPrenatal"] == '1845-01-01' && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,"1800-01-01");
		} else 
		{
			fwrite($txt,$reg[$i]["UltimoControlPrenatal"]);
		}
	//fwrite($txt,$reg[$i]["UltimoControlPrenatal"]); // 58. Ultimo Control Prenatal
	fwrite($txt,"|");
		if ($reg[$i]["SuministroAcidoFolico"] == '0' && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'21');
		} else if ($reg[$i]["Gestacion"]=='1')
		{
			fwrite($txt,'21');
		} else 
		{
			fwrite($txt,$reg[$i]["SuministroAcidoFolico"]);
		}
	//fwrite($txt,$reg[$i]["SuministroAcidoFolico"]); // 59. Suministro de Acido Folico en el Ultimo Control Prenatal
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,'0');
		} else if ($reg[$i]["Gestacion"]=='1')
		{
			fwrite($txt,'21');
		} else 
		{
			fwrite($txt,$reg[$i]["SuministroSulfatoFerroso"]);
		}
	//fwrite($txt,$reg[$i]["SuministroSulfatoFerroso"]); // 60. Suministro de Sulfato Ferroso en el Ultimo Control Prenatal
	fwrite($txt,"|");
		if ($reg[$i]["SuministroCarbonatoCalcio"] == '0' && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'21');
		} else if ($reg[$i]["Gestacion"]=='1')
		{
			fwrite($txt,'21');
		} else
		{
			fwrite($txt,$reg[$i]["SuministroCarbonatoCalcio"]);
		}
	//fwrite($txt,$reg[$i]["SuministroCarbonatoCalcio"]); // 61. Suministro de Carbonato de Calcio en el Ultimo Control Prenatal
	fwrite($txt,"|");
		if ($reg[$i]["ValoracionAgudezaVisualInput"]!='1845-01-01' && $Edad >= 4 && $Edad < 5)
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]!='1845-01-01' && $Edad >= 11 && $Edad < 12)
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]!='1845-01-01' && $Edad >= 16 && $Edad < 17)
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]!='1845-01-01' && $Edad >= 45 && $Edad < 46)
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1845-01-01' && $Edad > 0 && $Edad < 4)
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1845-01-01' && $Edad >= 5 && $Edad < 11)
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1845-01-01' && $Edad >= 12 && $Edad < 16)
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1845-01-01' && $Edad >= 16 && $Edad < 45)
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1845-01-01' && $Edad >= 46)
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1845-01-01' && $Edad >= 4 && $Edad < 5)
		{
			fwrite($txt,'1800-01-01');
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1800-01-01' && $Edad > 0 && $Edad < 4)
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1800-01-01' && $Edad >= 5 && $Edad < 11)
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1800-01-01' && $Edad >= 12 && $Edad < 16)
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1800-01-01' && $Edad >= 16 && $Edad < 45)
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["ValoracionAgudezaVisualInput"]=='1800-01-01' && $Edad >= 46)
		{
			fwrite($txt,'1845-01-01'); 
		} else
		{
			fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]);
		}
	//fwrite($txt,$reg[$i]["ValoracionAgudezaVisualInput"]); // 62. Valoración de la Agudeza Visual
	fwrite($txt,"|");
		if ($Edad < 55 && $reg[$i]["ConsultaOftalmologiaInput"] == '1845-01-01')
		{
			fwrite($txt,$reg[$i]["ConsultaOftalmologiaInput"]);
		} else if ($Edad >= 55 && $Edad <= 105 && $EdadResiduo == 0 && $reg[$i]["ConsultaOftalmologiaInput"] != '1845-01-01')
		{
			fwrite($txt,$reg[$i]["ConsultaOftalmologiaInput"]);
		} else if ($Edad >= 55 && $Edad <= 105 && $EdadResiduo > 0 && $reg[$i]["ConsultaOftalmologiaInput"] == '1845-01-01')
		{
			fwrite($txt,$reg[$i]["ConsultaOftalmologiaInput"]);
		} else if ($Edad >= 55 && $Edad <= 105 && $EdadResiduo == 0 && $reg[$i]["ConsultaOftalmologiaInput"] == '1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		} else if ($Edad < 55 && $reg[$i]["ConsultaOftalmologiaInput"] == '1800-01-01')
		{
			fwrite($txt,'1845-01-01');
		} else if ($Edad >= 55 && $Edad <= 105 && $EdadResiduo > 0 && $reg[$i]["ConsultaOftalmologiaInput"] == '1800-01-01')
		{
			fwrite($txt,'1845-01-01');
		} else
		{
			fwrite($txt,$reg[$i]["ConsultaOftalmologiaInput"]);
		}
	//fwrite($txt,$reg[$i]["ConsultaOftalmologiaInput"]); // 63. Consulta por Oftalmología
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["FechaDiagnosticoDesnutricion"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ConsultaMujerMenorVictimaInput"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ConsultaVictimaViolenciaSexualInput"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ConsultaNutricionInput"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ConsultaPsicologiaInput"]);
	fwrite($txt,"|");
		if ($reg[$i]["ConsultaCyDPrimeraVezInput"] == '1845-01-01' && ( (($Edad*360-90)<0) || $Edad >= 10 ))
		{
			fwrite($txt,$reg[$i]["ConsultaCyDPrimeraVezInput"]);
		} else if ($reg[$i]["ConsultaCyDPrimeraVezInput"] != '1845-01-01' && $Edad < 10)
		{
			fwrite($txt,$reg[$i]["ConsultaCyDPrimeraVezInput"]);
		} else if ($reg[$i]["ConsultaCyDPrimeraVezInput"] == '1800-01-01' && ( (($Edad*360-90)<0) || $Edad >= 10 ))
		{
			fwrite($txt,'1845-01-01');
		} else 
		{
			fwrite($txt,$reg[$i]["ConsultaCyDPrimeraVezInput"]);
		}
	//fwrite($txt,$reg[$i]["ConsultaCyDPrimeraVezInput"]); // 69. Consulta de Crecimiento y Desarrollo Primera vez
	fwrite($txt,"|");
		if ($Edad >= 10 && $reg[$i]["SuministroSulfatoFerrosoMenor"]=='0' && $reg[$i]["SuministroSulfatoFerrosoMenor"]!='0')
		{
			fwrite($txt,$reg[$i]["SuministroSulfatoFerrosoMenor"]); 
		} else if ($edad < 10 && $reg[$i]["SuministroSulfatoFerrosoMenor"] > 0 && $reg[$i]["SuministroSulfatoFerrosoMenor"]!='0')
		{
			fwrite($txt,$reg[$i]["SuministroSulfatoFerrosoMenor"]);
		} else if ($Edad >= 10 && $reg[$i]["SuministroSulfatoFerrosoMenor"]=='21')
		{
			fwrite($txt,'0');
		}
		else
		{
			fwrite($txt,$reg[$i]["SuministroSulfatoFerrosoMenor"]);
		}
	//fwrite($txt,$reg[$i]["SuministroSulfatoFerrosoMenor"]); // 70. Suministro de Sulfato Ferroso en la Ultima Consulta de Menor de 10 Años
	fwrite($txt,"|");
	if ($Edad >= 10 && $reg[$i]["SuministroVitaminaAMenor"]=='0' && $reg[$i]["SuministroVitaminaAMenor"]!='0')
		{
			fwrite($txt,$reg[$i]["SuministroVitaminaAMenor"]); 
		} else if ($edad < 10 && $reg[$i]["SuministroVitaminaAMenor"] > 0 && $reg[$i]["SuministroVitaminaAMenor"]!='0')
		{
			fwrite($txt,$reg[$i]["SuministroVitaminaAMenor"]);
		} else if ($Edad >= 10 && $reg[$i]["SuministroVitaminaAMenor"]=='21')
		{
			fwrite($txt,'0');
		}
		else
		{
			fwrite($txt,$reg[$i]["SuministroVitaminaAMenor"]);
		}
	//fwrite($txt,$reg[$i]["SuministroVitaminaAMenor"]); // 71. Suministro de Vitamina A en la Ultima Consulta de Menor de 10 Años
	fwrite($txt,"|");
		if ($reg[$i]["ConsultaJovenPrimeraVezInput"]!='1845-01-01' && $Edad >= 10 && $Edad < 30)
		{
			fwrite($txt,$reg[$i]["ConsultaJovenPrimeraVezInput"]);
		} else if ($reg[$i]["ConsultaJovenPrimeraVezInput"]=='1845-01-01' && $Edad < 10)
		{
			fwrite($txt,$reg[$i]["ConsultaJovenPrimeraVezInput"]);
		} else if ($reg[$i]["ConsultaJovenPrimeraVezInput"]=='1845-01-01' && $Edad >= 30)
		{
			fwrite($txt,$reg[$i]["ConsultaJovenPrimeraVezInput"]);
		} else if ($reg[$i]["ConsultaJovenPrimeraVezInput"]=='1800-01-01' && $Edad < 10)
		{
			fwrite($txt,'1845-01-01');
		} 
		else if ($reg[$i]["ConsultaJovenPrimeraVezInput"]=='1800-01-01' && $Edad >= 30)
		{
			fwrite($txt,'1845-01-01');
		} else 
		{
			fwrite($txt,$reg[$i]["ConsultaJovenPrimeraVezInput"]);
		}
	//fwrite($txt,$reg[$i]["ConsultaJovenPrimeraVezInput"]); // 72. Consulta de Joven Primera vez
	fwrite($txt,"|");
		if ($Edad < 45 && $reg[$i]["ConsultaAdultoPrimeraVezInput"]=='1845-01-01') 
		{
			fwrite($txt,$reg[$i]["ConsultaAdultoPrimeraVezInput"]);
		} 
		else if ($Edad >= 45 && $Edad <= 105 && $EdadResiduo == 0 && $reg[$i]["ConsultaAdultoPrimeraVezInput"]!='1845-01-01') 
		{
			fwrite($txt,$reg[$i]["ConsultaAdultoPrimeraVezInput"]);
		} 
		else if ($Edad >= 45 && $Edad <= 105 && $EdadResiduo > 0 && $reg[$i]["ConsultaAdultoPrimeraVezInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["ConsultaAdultoPrimeraVezInput"]);
		} 
		else if ($Edad >= 45 && $Edad <= 105 && $EdadResiduo > 0 && $reg[$i]["ConsultaAdultoPrimeraVezInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01');
		} 
		else if ($Edad < 45 && $reg[$i]["ConsultaAdultoPrimeraVezInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01');
		} else 
		{
			fwrite($txt,$reg[$i]["ConsultaAdultoPrimeraVezInput"]);
		}
	//fwrite($txt,$reg[$i]["ConsultaAdultoPrimeraVezInput"]); // 73. Consulta de Adulto Primera vez
	fwrite($txt,"|");
		fwrite($txt,'0');
	//fwrite($txt,$reg[$i]["PreservativosITSInput"]); // 74. Preservativos Entregados a Pacientes con ITS
	fwrite($txt,"|");
		if ($entidad == "EPS016") {
			fwrite($txt,'1845-01-01');
		} else {
			fwrite($txt,$reg[$i]["AsesoriaPreElisaInput"]);
		}
	//fwrite($txt,$reg[$i]["AsesoriaPreElisaInput"]); // 75. Asesoría Pre test Elisa para VIH
	fwrite($txt,"|");
		if ($entidad == "EPS016") {
			fwrite($txt,'1845-01-01');
		} else {
			fwrite($txt,$reg[$i]["AsesoriaPostElisaInput"]);
		}
	//fwrite($txt,$reg[$i]["AsesoriaPostElisaInput"]); // 76. Asesoría Pos test Elisa para VIH
	fwrite($txt,"|");
		if ($reg[$i]["PacienteEnfermedadMental"] != '0' && $reg[$i]["PacienteEnfermedadMental"] != '' &&  $reg[$i]["EnfermedadMental"] <= 6)	
		{
			fwrite($txt,$reg[$i]["PacienteEnfermedadMental"]);
		}
		else if ($reg[$i]["PacienteEnfermedadMental"] == '0' && $reg[$i]["PacienteEnfermedadMental"] != '' &&  $reg[$i]["EnfermedadMental"] >= 6)
		{
			fwrite($txt,$reg[$i]["PacienteEnfermedadMental"]);
		}
		else if ($reg[$i]["PacienteEnfermedadMental"] == '22' && $reg[$i]["EnfermedadMental"] == '21')
		{
			fwrite($txt,'0');
		}
		else
		{
			fwrite($txt,$reg[$i]["PacienteEnfermedadMental"]);
		}
	//fwrite($txt,$reg[$i]["PacienteEnfermedadMental"]); // 77. Paciente con Diagnóstico de: Ansiedad, Depresión, Esquizofrenia, déficit de atención, consumo SPA y Bipolaridad recibió Atención en los últimos 6 meses por Equipo Interdisciplinario Completo
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,'1845-01-01');
		} 
		else if ($reg[$i]["Gestacion"]=='1' && $reg[$i]["FechaAntigenoHepatitisBGestantesInput"]=='1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		} 
		else 
		{
			fwrite($txt,$reg[$i]["FechaAntigenoHepatitisBGestantesInput"]);
		}
	//fwrite($txt,$reg[$i]["FechaAntigenoHepatitisBGestantesInput"]); // 78. Fecha Antigeno de Superficie Hepatitis B en Gestantes
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,'0');
		} else if ($reg[$i]["Gestacion"]=='1' && $reg[$i]["ResultadoAntigenoHepatitisBGestantes"]=='0')
		{
			fwrite($txt,'22');
		} else {
			fwrite($txt,$reg[$i]["ResultadoAntigenoHepatitisBGestantes"]);
		}
	//fwrite($txt,$reg[$i]["ResultadoAntigenoHepatitisBGestantes"]); // 79. Resultado Antigeno de Superficie Hepatitis B en Gestantes
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["FechaSerologiaSifilisInput"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ResultadoSerologiaSifilis"]);
	fwrite($txt,"|");
		if ($reg[$i]["FechaTomaElisaVIHInput"]=='0000-00-00')
		{
			fwrite($txt,'1800-01-01');
		} else {
			fwrite($txt,$reg[$i]["FechaTomaElisaVIHInput"]);
		}
	//fwrite($txt,$reg[$i]["FechaTomaElisaVIHInput"]); // 82. Fecha de Toma de Elisa para VIH
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ResultadoElisaVIH"]);
	fwrite($txt,"|");
		// $datetime1 = new DateTime($reg[$i]["FechaTSHNeonatalInput"]);
		// $datetime2 = new DateTime($reg[$i]["FechaNacimiento"]);
		// $interval = $datetime1->diff($datetime2);
		// $diferencia = $interval->format('%d');
		if ($reg[$i]["FechaTSHNeonatalInput"]=='1845-01-01' && (($Edad*360) > 90))
		{
			fwrite($txt,$reg[$i]["FechaTSHNeonatalInput"]);
		}
		else if ($reg[$i]["FechaTSHNeonatalInput"]!='1845-01-01' && $Edad > 0 && (($Edad*360) <= 90)) 
		{
			fwrite($txt,$reg[$i]["FechaTSHNeonatalInput"]);
		} 
		else if ($reg[$i]["FechaTSHNeonatalInput"]=='1845-01-01' && $Edad > 0 && (($Edad*360) <= 90))
		{
			fwrite($txt,'1800-01-01');
		} else 
		{
			fwrite($txt,$reg[$i]["FechaTSHNeonatalInput"]);
		}
	//fwrite($txt,$reg[$i]["FechaTSHNeonatalInput"]); // 84. Fecha TSH Neonatal
	fwrite($txt,"|");
		if ($reg[$i]["FechaTSHNeonatalInput"]=='1845-01-01' && $reg[$i]["ResultadoTSHNeonatal"]=='0')
		{
			fwrite($txt,$reg[$i]["ResultadoTSHNeonatal"]);
		} 
		else if ($reg[$i]["FechaTSHNeonatalInput"]!='1845-01-01' && $reg[$i]["ResultadoTSHNeonatal"] > 0)
		{
			fwrite($txt,$reg[$i]["ResultadoTSHNeonatal"]);		
		} 
		else if ($reg[$i]["FechaTSHNeonatalInput"]=='1845-01-01' && $Edad > 0 && (($Edad*360) <= 90))
		{
			fwrite($txt,'22');
		}
		else if ($reg[$i]["FechaTSHNeonatalInput"] == '1845-01-01' && $reg[$i]["ResultadoTSHNeonatal"] == '22')
		{
			fwrite($txt,'0');	
		} 
		else
		{
			fwrite($txt,$reg[$i]["ResultadoTSHNeonatal"]);
		}
	//fwrite($txt,$reg[$i]["ResultadoTSHNeonatal"]); // 85. Resultado de TSH Neonatal
	fwrite($txt,"|");
		if ($reg[$i]["TamizajeCencerCU"]!='' && $reg[$i]["TamizajeCencerCU"]=='0' && $Edad <= 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["TamizajeCencerCU"]);
		} 
		else if ($reg[$i]["TamizajeCencerCU"]!='' && $reg[$i]["TamizajeCencerCU"] > 0 && $Edad > 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["TamizajeCencerCU"]);
		} 
		else if ($reg[$i]["TamizajeCencerCU"]!='' && $reg[$i]["TamizajeCencerCU"] == '0' && $reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,$reg[$i]["TamizajeCencerCU"]);
		}
		else if ($Edad >= 10 && $Edad < 50 && $reg[$i]["Gestacion"]=='1' && $reg[$i]["TamizajeCencerCU"]=='0' && $reg[$i]["TamizajeCencerCU"]!='')
		{
			fwrite($txt,$reg[$i]["TamizajeCencerCU"]);
		}
		else if ($reg[$i]["TamizajeCencerCU"]=='0' && $Edad > 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'22'); 
		}
		else if ($reg[$i]["TamizajeCencerCU"]=='22' && $Edad <= 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'0'); 
		}
		else
		{
			fwrite($txt,$reg[$i]["TamizajeCencerCU"]);
		}
	//fwrite($txt,$reg[$i]["TamizajeCencerCU"]); // 86. Tamizaje Cancer de Cuello Uterino
	fwrite($txt,"|");
		if ($reg[$i]["FechaCitologiaCUInput"]=='1845-01-01' && $Edad <= 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaCitologiaCUInput"]); // Condicion 1
		} 
		else if ($reg[$i]["FechaCitologiaCUInput"]!='1845-01-01' && $Edad > 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaCitologiaCUInput"]); // Condicion 2
		} 
		else if ($reg[$i]["FechaCitologiaCUInput"]=='1845-01-01' && $reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,$reg[$i]["FechaCitologiaCUInput"]); // Condicion 3
		}
		else if ($reg[$i]["Gestacion"]=='1' && $Edad > 10 && $Edad < 50 && $reg[$i]["FechaCitologiaCUInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaCitologiaCUInput"]); // Condicion 4
		} 
		else if ($reg[$i]["FechaCitologiaCUInput"]=='1800-01-01' && $Edad <= 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'1845-01-01'); // Condicion 5
		}
		else if ($reg[$i]["FechaCitologiaCUInput"]=='1845-01-01' && $Edad > 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'1800-01-01'); // Condicion 6
		}
		else
		{
		 	fwrite($txt,$reg[$i]["FechaCitologiaCUInput"]); // Condicion 7
		}
	//fwrite($txt,$reg[$i]["FechaCitologiaCUInput"]); // 87. Citologia Cervicouterina
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,'0'); // Condicion 1
		} 
		else if ($Edad <= 10 && $reg[$i]["CitologiaCUResultados"]!='0')
		{
			fwrite($txt,'0'); // Condicion 2
		} 
		else if ($Edad >= 10 && $reg[$i]["Sexo"]=='F' && $reg[$i]["CitologiaCUResultados"]=='0')
		{
			fwrite($txt,'999'); // Condicion 3
		} 
		else {
			fwrite($txt,$reg[$i]["CitologiaCUResultados"]);
		}
	//fwrite($txt,$reg[$i]["CitologiaCUResultados"]); // 88. Citologia Cervico Uterina Resultados Segun Bethesda
	fwrite($txt,"|");
		if ($reg[$i]["FechaCitologiaCUInput"]=='1845-01-01' && $reg[$i]["CalidadMuestraCitologia"]=='0' && $Edad <= 10 && $reg[$i]["Sexo"]=='F' && $reg[$i]["CalidadMuestraCitologia"]!='')
		{
			fwrite($txt,$reg[$i]["CalidadMuestraCitologia"]);
		} 
		else if ($reg[$i]["Sexo"]=='M' && $reg[$i]["CalidadMuestraCitologia"]=='1')
		{
			fwrite($txt,'0'); 
		}
		else if ($reg[$i]["FechaCitologiaCUInput"]=='1800-01-01' && $Edad <= 10 && $reg[$i]["Sexo"]=='F' && $reg[$i]["CitologiaCUResultados"]!='0')
		{
			fwrite($txt,'0'); // Condicion 5 Pregunta 87 y Condicion 2 Pregunta 88 = $reg[$i]["CitologiaCUResultados"]!='0'
		}
		else if ($reg[$i]["FechaCitologiaCUInput"]=='1845-01-01' && $Edad > 10 && $reg[$i]["Sexo"]=='F' && $reg[$i]["CitologiaCUResultados"]=='0')
		{
			fwrite($txt,'999'); // Condicion 6 Pregunta 87 y Condicion 3 Pregunta 88 = $reg[$i]["CitologiaCUResultados"]=='0'
		}
		else if ($reg[$i]["Sexo"]=='F' && $reg[$i]["FechaCitologiaCUInput"]=='1845-01-01' && $reg[$i]["CitologiaCUResultados"]=='0' && $reg[$i]["CalidadMuestraCitologia"]=='999')
		{
			fwrite($txt,'0');
		}
		else if ($reg[$i]["FechaCitologiaCUInput"]!='1845-01-01' && $reg[$i]["CitologiaCUResultados"] > 0 && $Edad <= 10 &&  $reg[$i]["Sexo"]=='F' && $reg[$i]["CalidadMuestraCitologia"]!='')
		{
			fwrite($txt,$reg[$i]["CalidadMuestraCitologia"]);
		} 
		else if ($reg[$i]["FechaCitologiaCUInput"]!='1845-01-01' && $reg[$i]["CitologiaCUResultados"] > 0 && $Edad > 10 &&  $reg[$i]["Sexo"]=='F' && $reg[$i]["CalidadMuestraCitologia"]!='')
		{
			fwrite($txt,$reg[$i]["CalidadMuestraCitologia"]);
		} 
		else if ($reg[$i]["FechaCitologiaCUInput"]=='1845-01-01' && $reg[$i]["CalidadMuestraCitologia"]=='0' && $reg[$i]["Sexo"]=='M' && $reg[$i]["CalidadMuestraCitologia"]!='')
		{
			fwrite($txt,$reg[$i]["CalidadMuestraCitologia"]);
		}
		else if ($reg[$i]["FechaCitologiaCUInput"]=='1845-01-01' && $reg[$i]["CalidadMuestraCitologia"]=='0')
		{
			fwrite($txt,$reg[$i]["CalidadMuestraCitologia"]); 
		}
		else if ($reg[$i]["FechaCitologiaCUInput"]=='1800-01-01' && $reg[$i]["CitologiaCUResultados"]=='999' && $reg[$i]["CalidadMuestraCitologia"]=='0' && $Edad > 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'999'); 
		}
		else
		{
			fwrite($txt,$reg[$i]["CalidadMuestraCitologia"]);
		}
	//fwrite($txt,$reg[$i]["CalidadMuestraCitologia"]); // 89. Calidad en la Muestra de Citologia Cervicouterina
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,'0');
		} else if ($Edad <= 10 && $reg[$i]["CodigoHabilitacionIPSTomaMuestra"]!='0')
		{
			fwrite($txt,'0');
		} else if ($Edad >= 10 && $reg[$i]["Sexo"]=='F' && $reg[$i]["CodigoHabilitacionIPSTomaMuestra"]=='0')
		{
			fwrite($txt,'999');
		} else {
			fwrite($txt,$reg[$i]["CodigoHabilitacionIPSTomaMuestra"]);
		}
	//fwrite($txt,$reg[$i]["CodigoHabilitacionIPSTomaMuestra"]); // 90. Codigo de Habilitacion IPS donde se toma Citologia Cervicouterina
	fwrite($txt,"|");
		if ($reg[$i]["FechaColposcopiaInput"]!='1845-01-01' && $Edad > 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaColposcopiaInput"]);
		} 
		else if ($reg[$i]["Sexo"]=='F' && $Edad >= 10 && $Edad <= 49 && $ValGestacion > 0 && $ValGestacion !='')
		{
			fwrite($txt,'1800-01-01'); // Condicion 4 Pregunta 14
		} 
		else if ($reg[$i]["FechaColposcopiaInput"]=='1845-01-01' && $Edad <= 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaColposcopiaInput"]);
		} 
		else if ($reg[$i]["FechaColposcopiaInput"]=='1845-01-01' && $reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,$reg[$i]["FechaColposcopiaInput"]);
		} 
		else if ($reg[$i]["Gestacion"]=='1' && $Edad > 10 && $Edad < 50 && $reg[$i]["FechaColposcopiaInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaColposcopiaInput"]);
		} 
		else if ($reg[$i]["Gestacion"]=='21' && $reg[$i]["Sexo"]=='F' && $Edad > 10 && $Edad < 50 && $reg[$i]["FechaColposcopiaInput"]=='1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		}
		else
		{
			fwrite($txt,$reg[$i]["FechaColposcopiaInput"]);
		}
	//fwrite($txt,$reg[$i]["FechaColposcopiaInput"]); // 91. Fecha Colposcopia
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M' || $reg[$i]["CitologiaCUResultados"]=='17' || $Edad <= 10)
		{
			fwrite($txt,'0');
		} 
		else if ($edad >= 10 && $reg[$i]["Sexo"]=='F' && $reg[$i]["CodigoHabilitacionTomaColposcopia"]=='0')
		{
			fwrite($txt,'999');
		} 
		else 
		{
			fwrite($txt,$reg[$i]["CodigoHabilitacionTomaColposcopia"]);
		}
	//fwrite($txt,$reg[$i]["CodigoHabilitacionTomaColposcopia"]); // 92. Codigo de Habilitacion IPS donde se toma Colposcopia
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M' || $reg[$i]["CitologiaCUResultados"]=='17' || $edad <= 10)
		{
			fwrite($txt,'1845-01-01');
		} else if ($reg[$i]["FechaBiopsiaCervicalInput"]=='1845-01-01' && $reg[$i]["Sexo"]=='F' && $edad >=10)
		{
			fwrite($txt,'1800-01-01');
		} else {
			fwrite($txt,$reg[$i]["FechaBiopsiaCervicalInput"]);
		}
	//fwrite($txt,$reg[$i]["FechaBiopsiaCervicalInput"]); // 93. Fecha Biopsia Cervical
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M' || $reg[$i]["CitologiaCUResultados"]=='17' || $edad <= 10)
		{
			fwrite($txt,'0');
		} else if ($edad >= 10 && $reg[$i]["Sexo"]=='F' && $reg[$i]["ResultadoBiopsiaCervical"]=='0')
		{
			fwrite($txt,'999');
		} else {
			fwrite($txt,$reg[$i]["ResultadoBiopsiaCervical"]);
		}
	//fwrite($txt,$reg[$i]["ResultadoBiopsiaCervical"]); // 94. Resultado Biopsia Cervical
	fwrite($txt,"|");
		if ($reg[$i]["Sexo"]=='M' || $reg[$i]["CitologiaCUResultados"]=='17' || $edad <= 10)
		{
			fwrite($txt,'0');
		} else if ($edad >= 10 && $reg[$i]["Sexo"]=='F' && $reg[$i]["CodigoHabilitacionTomaBiopsia"]=='0') 
		{
			fwrite($txt,'999');
		} else {
			fwrite($txt,$reg[$i]["CodigoHabilitacionTomaBiopsia"]);
		}
	//fwrite($txt,$reg[$i]["CodigoHabilitacionTomaBiopsia"]); // 95. Codigo de Habilitacion IPS donde se toma la Biopsia Cervical
	fwrite($txt,"|");
		if ($edad >= 35 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'1800-01-01');
		} else {
			fwrite($txt,$reg[$i]["FechaMamografiaInput"]);
		}
	//fwrite($txt,$reg[$i]["FechaMamografiaInput"]); // 96. Fecha Mamografia
	fwrite($txt,"|");
		if ($edad >= 35 and $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'999');
		} else {
			fwrite($txt,$reg[$i]["ResultadoMamografia"]);
		}
	//fwrite($txt,$reg[$i]["ResultadoMamografia"]); // 97. Resultado Mamografia
	fwrite($txt,"|");
		if ($edad >= 35 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'999');
		} else {
			fwrite($txt,$reg[$i]["CodigoHabilitacionTomaMamografia"]);
		}
	//fwrite($txt,$reg[$i]["CodigoHabilitacionTomaMamografia"]); // 98. Codigo de Habilitacion donde se Toma la Mamografia
	fwrite($txt,"|");
		if ($reg[$i]["FechaBiopsiaSenoInput"]=='1845-01-01' && $Edad <= 35 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaBiopsiaSenoInput"]); // Condicion 1
		}
		else if ( ($reg[$i]["FechaBiopsiaSenoInput"]=='1845-01-01' || $reg[$i]["FechaBiopsiaSenoInput"]!='1845-01-01') &&  $Edad > 35 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaBiopsiaSenoInput"]); // Condicion 2
		}
		else if ($reg[$i]["FechaBiopsiaSenoInput"]=='1845-01-01' && $reg[$i]["ResultadoMamografia"] <= 4 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaBiopsiaSenoInput"]); // Condicion 3
		}
		else if ($reg[$i]["FechaBiopsiaSenoInput"]=='1845-01-01' && $reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,$reg[$i]["FechaBiopsiaSenoInput"]); // Condicion 4
		}
		else if ($reg[$i]["ResultadoMamografia"]=='0' && $reg[$i]["FechaBiopsiaSenoInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01'); // Condicion 5
		}
		else
		{
			fwrite($txt,$reg[$i]["FechaBiopsiaSenoInput"]); // Condicion 6
		}
	//fwrite($txt,$reg[$i]["FechaBiopsiaSenoInput"]); // 99. Fecha Toma Biopsia Seno por BACAF
	fwrite($txt,"|");
		if ($reg[$i]["FechaResultadoBiopsiaSeno"]=='1845-01-01' && $Edad <= 35 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaResultadoBiopsiaSeno"]); // Condicion 1
		}
		else if ( ($reg[$i]["FechaResultadoBiopsiaSeno"]=='1845-01-01' || $reg[$i]["FechaResultadoBiopsiaSeno"]!='1845-01-01') && $Edad > 35 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaResultadoBiopsiaSeno"]); // Condicion 2
		}
		else if ($reg[$i]["FechaBiopsiaSenoInput"]=='1845-01-01' && $reg[$i]["ResultadoMamografia"] <= 4 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaResultadoBiopsiaSeno"]); // Condicion 3
		}
		else if ($reg[$i]["FechaResultadoBiopsiaSeno"]=='1845-01-01' && $reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,$reg[$i]["FechaResultadoBiopsiaSeno"]); // Condicion 4
		}
		else if ($reg[$i]["FechaBiopsiaSenoInput"]=='1800-01-01' && $reg[$i]["FechaResultadoBiopsiaSeno"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01'); // Condicion 5
		}
		else
		{
			fwrite($txt,$reg[$i]["FechaResultadoBiopsiaSeno"]); // Condicion 6
		}
	//fwrite($txt,$reg[$i]["FechaResultadoBiopsiaSeno"]); // 100. Fecha Resultado Biopsia Seno por BACAF
	fwrite($txt,"|");
		if ($reg[$i]["FechaResultadoBiopsiaSeno"]=='1845-01-01' && $reg[$i]["ResultadoBiopsiaSeno"]=='0')
		{
			fwrite($txt,$reg[$i]["ResultadoBiopsiaSeno"]); // Condicion 1
		}
		else if ($reg[$i]["FechaBiopsiaSenoInput"]=='1800-01-01' && $reg[$i]["FechaResultadoBiopsiaSeno"]=='1800-01-01')
		{
			fwrite($txt,'0'); // Condicion 5 Pregunta 100
		}
		else if ($reg[$i]["FechaResultadoBiopsiaSeno"]=='1845-01-01' && $reg[$i]["ResultadoBiopsiaSeno"]=='0' && $reg[$i]["Sexo"]=='F' && $reg[$i]["ResultadoBiopsiaSeno"]!='')
		{
			fwrite($txt,$reg[$i]["ResultadoBiopsiaSeno"]); // Condicion 2
		}
		else if ($reg[$i]["FechaResultadoBiopsiaSeno"]!='1845-01-01' && $reg[$i]["ResultadoBiopsiaSeno"] > 0 && $Edad > 10 && $reg[$i]["Sexo"]=='F' && $reg[$i]["ResultadoBiopsiaSeno"]!='')
		{
			fwrite($txt,$reg[$i]["ResultadoBiopsiaSeno"]); // Condicion 3
		}
		else if ($reg[$i]["FechaResultadoBiopsiaSeno"]=='1845-01-01' && $reg[$i]["ResultadoBiopsiaSeno"]=='0' && $reg[$i]["Sexo"]=='M' && $reg[$i]["ResultadoBiopsiaSeno"]!='')
		{
			fwrite($txt,$reg[$i]["ResultadoBiopsiaSeno"]); // Condicion 4
		}
		else if ($reg[$i]["FechaResultadoBiopsiaSeno"]=='1800-01-01' && $reg[$i]["ResultadoBiopsiaSeno"]=='999' && $Edad < 10 && $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,'0');
		}
		else if ($reg[$i]["FechaResultadoBiopsiaSeno"]=='1845-01-01' && $reg[$i]["ResultadoBiopsiaSeno"]=='999')
		{
			fwrite($txt,'0'); 
		}
		else
		{
			fwrite($txt,$reg[$i]["ResultadoBiopsiaSeno"]); 
		}
	//fwrite($txt,$reg[$i]["ResultadoBiopsiaSeno"]); // 101. Biopsia Seno por BACAF
	fwrite($txt,"|");
		if ( ($reg[$i]["FechaBiopsiaSenoInput"]=='1845-01-01' && $reg[$i]["CodigoHabilitacionBiopsiaSeno"]=='0' && $reg[$i]["CodigoHabilitacionBiopsiaSeno"]!='') || ( $reg[$i]["FechaBiopsiaSenoInput"]!='1845-01-01' && $reg[$i]["CodigoHabilitacionBiopsiaSeno"]=='0' && $reg[$i]["CodigoHabilitacionBiopsiaSeno"]!=''))
		{
			fwrite($txt,$reg[$i]["CodigoHabilitacionBiopsiaSeno"]); // Condicion 1
		}
		else if ($reg[$i]["ResultadoMamografia"]=='0' && $reg[$i]["FechaBiopsiaSenoInput"]=='1800-01-01')
		{
			fwrite($txt,'0'); // Condicion 5 Pregunta 99
		}
		else if ($reg[$i]["CodigoHabilitacionBiopsiaSeno"]=='0' && $reg[$i]["FechaBiopsiaSenoInput"]=='1800-01-01')
		{
			fwrite($txt,'999');
		}
		else if ($reg[$i]["FechaBiopsiaSenoInput"]=='1845-01-01' && $reg[$i]["CodigoHabilitacionBiopsiaSeno"]=='999')
		{
			fwrite($txt,'0');
		}
		else
		{
			fwrite($txt,$reg[$i]["CodigoHabilitacionBiopsiaSeno"]);
		}
	//fwrite($txt,$reg[$i]["CodigoHabilitacionBiopsiaSeno"]); // 102. Código de habilitación IPS donde se toma Biopsia Seno por BACAF
	fwrite($txt,"|");
		if ($reg[$i]["FechaTomaHemoglobinaInput"]!='1845-01-01' && $reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"]=='1')
		{
			fwrite($txt,$reg[$i]["FechaTomaHemoglobinaInput"]); // Condicion 1
		}
	 	else if ($reg[$i]["FechaTomaHemoglobinaInput"]!='1845-01-01' && ($Edad > 10 && $Edad < 13) &&  $reg[$i]["Sexo"]=='F')
		{
			fwrite($txt,$reg[$i]["FechaTomaHemoglobinaInput"]); // Condicion 2
		}
		else if ($reg[$i]["FechaTomaHemoglobinaInput"]=='1845-01-01' && $reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"]!='1' && ($Edad <= 10 || $Edad >= 13)   )
		{
			fwrite($txt,$reg[$i]["FechaTomaHemoglobinaInput"]); // Condicion 3
		}
		else if ($reg[$i]["FechaTomaHemoglobinaInput"]=='1845-01-01' && $reg[$i]["Sexo"]=='M')
		{
			fwrite($txt,$reg[$i]["FechaTomaHemoglobinaInput"]); // Condicion 4
		} 
		else if ($reg[$i]["Sexo"]=='M' && $reg[$i]["FechaTomaHemoglobinaInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01'); // Condicion 5
		}
		else if ($reg[$i]["FechaTomaHemoglobinaInput"]=='1800-01-01' && $reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"]=='21' && ($Edad <= 10 || $Edad >= 13) )
		{
			fwrite($txt,'1845-01-01'); // Condicion 6
		}
		else if ($reg[$i]["FechaTomaHemoglobinaInput"]=='1800-01-01' && $reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"]=='0' && ($Edad <= 10 || $Edad >= 13) )
		{
			fwrite($txt,'1845-01-01'); // Condicion 7
		}
		else
		{
			fwrite($txt,$reg[$i]["FechaTomaHemoglobinaInput"]); // Condicion 8
		}
		//fwrite($txt,$reg[$i]["FechaTomaHemoglobinaInput"]); // 103. Fecha de Toma de Hemoglobina
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ResultadoHemoglobina"]); // 104.
	fwrite($txt,"|");
		if ($Edad > 10 && $Edad < 50 && $reg[$i]["Sexo"]=='F' && ($reg[$i]["Gestacion"]=='1' || $reg[$i]["Gestacion"]=='21') && $reg[$i]["FechaTomaGlisemiaInput"]!='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaTomaGlisemiaInput"]);
		} 
		else if ($Edad < 45 && $reg[$i]["Sexo"]=='M' && $reg[$i]["FechaTomaGlisemiaInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaTomaGlisemiaInput"]);
		}
		else if ($Edad >= 45 && $reg[$i]["FechaTomaGlisemiaInput"]!='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaTomaGlisemiaInput"]);
		}
		else if ( ($Edad < 10 || $Edad > 50 ) && $reg[$i]["Gestacion"]=='0' && $reg[$i]["FechaTomaGlisemiaInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaTomaGlisemiaInput"]);
		}
		else if ( ($Edad > 10 && $Edad < 50) && $reg[$i]["Sexo"]=='F' && $reg[$i]["Gestacion"]=='2' && $reg[$i]["FechaTomaGlisemiaInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaTomaGlisemiaInput"]);
		}
		else if ($reg[$i]["Sexo"]=='F' && $Edad < 10 && $reg[$i]["FechaTomaGlisemiaInput"]=='1800-01-01') // Condicion 2 Pregunta 14
		{
			fwrite($txt,'1845-01-01'); 
		}
		else if (($Edad < 10 || $Edad > 50 ) && $reg[$i]["Gestacion"]=='0' && $reg[$i]["FechaTomaGlisemiaInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01'); 
		}
		else if ($Edad < 45 && $reg[$i]["Sexo"]=='M' && $reg[$i]["FechaTomaGlisemiaInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01'); 
		}
		else
		{
			fwrite($txt,$reg[$i]["FechaTomaGlisemiaInput"]); 
		}
	//fwrite($txt,$reg[$i]["FechaTomaGlisemiaInput"]); // 105. Fecha de la Toma de Glisemia Basal
	fwrite($txt,"|");
		if ($Edad < 45 && $reg[$i]["FechaTomaCreatininaInput"]=='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaTomaCreatininaInput"]);
		}
		else if ($Edad >= 45 && $reg[$i]["FechaTomaCreatininaInput"]!='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaTomaCreatininaInput"]);
		} 
		else if ($Edad < 45 && $reg[$i]["FechaTomaCreatininaInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01');
		}
		else if ($Edad >= 45 && $reg[$i]["FechaTomaCreatininaInput"]=='1845-01-01')
		{
			fwrite($txt,'1800-01-01');
		}
		else
		{
			fwrite($txt,$reg[$i]["FechaTomaCreatininaInput"]);
		}
	//fwrite($txt,$reg[$i]["FechaTomaCreatininaInput"]); // 106. Fecha Creatinina
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ResultadoCreatinina"]); // 107.
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["FechaHemoglobinaGlicosiladaInput"]); // 108.
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["ResultadoHemoglobinaGlicosilada"]); // 109.
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["FechaTomaMicroalbuminuriaInput"]); // 110.
	fwrite($txt,"|");
		if ($Edad < 45 && $reg[$i]["FechaTomaHDLInput"]=='1845-01-01') 
		{
			fwrite($txt,$reg[$i]["FechaTomaHDLInput"]); 
		} 
		else if ($Edad >= 45 && $reg[$i]["FechaTomaHDLInput"]!='1845-01-01')
		{
			fwrite($txt,$reg[$i]["FechaTomaHDLInput"]); 
		}
		else if ($Edad >= 45 && $reg[$i]["FechaTomaHDLInput"]=='1845-01-01') 
		{
			fwrite($txt,'1800-01-01');
		}
		else if ($Edad < 45 && $reg[$i]["FechaTomaHDLInput"]=='1800-01-01')
		{
			fwrite($txt,'1845-01-01');
		}
		else
		{
			fwrite($txt,$reg[$i]["FechaTomaHDLInput"]);
		}
	//fwrite($txt,$reg[$i]["FechaTomaHDLInput"]); // 111. Fecha Toma de HDL
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["FechaTomaBaciloscopiaInput"]);
	fwrite($txt,"|");
		if ($reg[$i]["SintomaticoRespiratorio"] == '21') {
			fwrite($txt,'4');
		} else {
			fwrite($txt,$reg[$i]["ResultadoBaciloscopia"]);
		}
	//fwrite($txt,$reg[$i]["ResultadoBaciloscopia"]); // 113. Baciloscopia de Diagnóstico
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["TratamientoHipotiroidismoCongenito"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["TratamientoSifilisGestacional"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["TratamientoSifilisCongenita"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["TratamientoLepra"]);
	fwrite($txt,"|");
	fwrite($txt,$reg[$i]["FechaTerLeishmaniasisInput"].PHP_EOL);
}

fclose($txt);
$nombreArchivo;
header("Content-disposition: attachment; filename=$nombreArchivo");
header("Content-type: application/octet-stream");

readfile($nombreArchivo);

?>