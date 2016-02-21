
<div class="span12">

<?php
require_once ("cl_clases.php");
$tra= new Trabajo();
$act=$tra->listar_rped_actualizar();

$hoy = date("Y-m-d");

function calcularEdad ($FechaFin, $FechaNacimiento)
{
	$dateExport = date($FechaFin);
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

function calcularEdadenDias ($FechaFin, $FechaNacimiento)
{
	$segundos=strtotime($FechaNacimiento) - strtotime($FechaFin);
	$dias=intval($segundos/60/60/24);
	return $dias;
}

$edadDias = calcularEdadenDias ($act["0"]["FechaNacimiento"], date('Y-m-d'));
$Edad = $edadDias / 365;

?>
	<!-- Formulario 4505 -->

	<form id="form-res-4505" class="form-horizontal" method="post" action="fn_actualizar_4505.php">

		<!-- REGISTRO TIPO 1 REGISTRO DE CONTROL DE DATOS ORIGINALES -->

		<fieldset>
			<legend>Registro de Control de Datos Originales</legend>

			<!-- 1. Tipo de Registro Control -->

			<div class="control-group">
				<label class="control-label" for="TipoRegistroControl">1. Tipo de Registro Control</label>
				<div class="controls">
					<input class="input-mini uneditable-input" type="text" name="TipoRegistroControl" id="TipoRegistroControl" value="1" readonly>
				</div>
			</div>

			<!-- 2. Código de la EPS o de la Dirección Territorial de Salud -->

			<div class="control-group">
				<label class="control-label" for="EPSActual">EPS o Actual</label>
				<div class="controls">
					<input class="input-mini" type="text" name="EPSActual" id="EPSActual" value="<?php echo $act["0"]["CodigoEPSoDLS"];?>" readonly>
				</div>
			</div>

			<div class="control-group" id="control-pregunta3">
				<label class="control-label" for="CodigoEPSoDLS">2. Código de la EPS o de la Dirección Territorial de Salud</label>
				<div class="controls">
					<select id="CodigoEPSoDLS" name="CodigoEPSoDLS" class="span3">
						<option value="">...Seleccione Tipo Identificación</option>
						<option value="EPS016" <?php if($act["0"]["CodigoEPSoDLS"]=="EPS016") echo "selected";?> >EPS016 - COOMEVA</option>
						<option value="CCF002" <?php if($act["0"]["CodigoEPSoDLS"]=="CCF002") echo "selected";?> >CCF002 - ALIANZA MEDELLIN</option>
						<option value="EPS013" <?php if($act["0"]["CodigoEPSoDLS"]=="EPS013") echo "selected";?> >EPS013 - SALUDCOOP</option>
						<option value="EPS003" <?php if($act["0"]["CodigoEPSoDLS"]=="EPS003") echo "selected";?> >EPS003 - CAFESALUD</option>
						<option value="EPS037" <?php if($act["0"]["CodigoEPSoDLS"]=="EPS037") echo "selected";?> >EPS037 - NUEVA EPS</option>
						<option value="EPS009" <?php if($act["0"]["CodigoEPSoDLS"]=="EPS009") echo "selected";?> >EPS009 - COMFENALCO</option>
						<option value="ESS024" <?php if($act["0"]["CodigoEPSoDLS"]=="ESS024") echo "selected";?> >ESS024 - COOSALUD</option>
						<option value="RES004" <?php if($act["0"]["CodigoEPSoDLS"]=="RES004") echo "selected";?> >RES004 - FMP</option>
						<option value="RES001" <?php if($act["0"]["CodigoEPSoDLS"]=="RES001") echo "selected";?> >RES001 - POLICIA</option>
						<option value="RES003" <?php if($act["0"]["CodigoEPSoDLS"]=="RES003") echo "selected";?> >RES003 - HOSPITAL MILITAR</option>
						<option value="05368" <?php if($act["0"]["CodigoEPSoDLS"]=="05368") echo "selected";?> >05368 - VINCULADOS</option>
					</select>
				</div>
			</div>

			<?php 

			switch ($_POST["PeriodoReporteSaludcoop"]) 
			{
				case 'Enero':
					$FechaInicio="2013-01-01";
					$FechaFin="2013-01-31";
					break;
				
				case 'Febrero':
					$FechaInicio="2013-02-01";
					$FechaFin="2013-02-28";
					break;

				case 'Marzo':
					$FechaInicio="2013-03-01";
					$FechaFin="2013-03-31";
					break;

				case 'Abril':
					$FechaInicio="2013-04-01";
					$FechaFin="2013-04-30";
					break;

				case 'Mayo':
					$FechaInicio="2013-05-01";
					$FechaFin="2013-05-31";
					break;

				case 'Junio':
					$FechaInicio="2013-06-01";
					$FechaFin="2013-06-30";
					break;

				case 'Julio':
					$FechaInicio="2013-07-01";
					$FechaFin="2013-07-31";
					break;

				case 'Agosto':
					$FechaInicio="2013-08-01";
					$FechaFin="2013-08-31";
					break;

				case 'Septiembre':
					$FechaInicio="2013-09-01";
					$FechaFin="2013-09-30";
					break;

				case 'Octubre':
					$FechaInicio="2013-10-01";
					$FechaFin="2013-10-31";
					break;

				case 'Noviembre':
					$FechaInicio="2013-11-01";
					$FechaFin="2013-11-30";
					break;

				case 'Diciembre':
					$FechaInicio="2013-12-01";
					$FechaFin="2013-12-31";
					break;
			}

			?>

			<!-- 3. Fecha Inicial del Período de la Información Reportada -->

			<div class="control-group">
				<label class="control-label" for="FechaInicialReporte">3. Fecha Inicial del Período de la Información Reportada</label>
				<div class="controls">
					<input class="input-small" type="text" name="FechaInicialReporte" id="FechaInicialReporte" value="<?php echo $act["0"]["FechaInicialReporte"]; ?>" readonly>
				</div>
			</div>

			<!-- 4. Fecha Final del Período de la Información Reportada -->

			<div class="control-group">
				<label class="control-label" for="FechaFinalReporte">4. Fecha Final del Período de la Información Reportada</label>
				<div class="controls">
					<input class="input-small" type="text" name="FechaFinalReporte" id="FechaFinalReporte" value="<?php echo $act["0"]["FechaFinalReporte"]; ?>" readonly>
				</div>
			</div>

			<!-- 5. Número Total de Registros de Detalle Contenidos en el Archivo -->

			<div class="control-group">
				<label class="control-label" for="NumeroRegistros">5. Número Total de Registros de Detalle Contenidos en el Archivo</label>
				<div class="controls">	
					<input class="input-mini" type="text" name="NumeroRegistros" id="NumeroRegistros" value="1" readonly>
				</div>
			</div>

		</fieldset>


		<!-- REGISTRO TIPO 2 DE DETALLE DATOS ORIGINALES -->


		<fieldset>
			<legend>Datos de Identificación</legend>

			<!-- 0. Tipo de Registro Detalle -->
			
			<div class="control-group">
				<label class="control-label" for="TipoRegistroDetalle">0. Tipo de Registro Detalle</label>
				<div class="controls">
					<input class="input-mini" type="text" name="TipoRegistroDetalle" id="TipoRegistroDetalle" value="2" readonly>
				</div>
			</div>

			<!-- 1. Consecutivo de Registro -->

			<div class="control-group">
				<label class="control-label" for="ConsecutivoRegistro">1. Consecutivo de registro</label>
				<div class="controls">
					<input class="input-mini" type="text" name="ConsecutivoRegistro" id="ConsecutivoRegistro" value="1" readonly>
				</div>
			</div>

			<!-- 2. Código de habilitación -->

			<div class="control-group">
				<label class="control-label" for="CodigoHabilitacion">2. Código de Habilitación</label>
				<div class="controls">
					<input class="input-medium" type="text" name="CodigoHabilitacion" id="CodigoHabilitacion" value="053680483301" readonly>
				</div>
			</div>

			<!-- 3. Tipo de identificación del usuario -->

			<div class="control-group" id="control-pregunta3">
				<label class="control-label" for="TipoIdUsuario">3. Tipo Identificación Usuario</label>
				<div class="controls">
					<select id="TipoIdUsuario" name="TipoIdUsuario" class="span3">
						<option value="">...Seleccione Tipo Identificación</option>
						<option value="RC" <?php if($act["0"]["TipoIdUsuario"]=="RC") echo "selected";?> >RC - Registro Civil</option>
						<option value="TI" <?php if($act["0"]["TipoIdUsuario"]=="TI") echo "selected";?> >TI - Tarjeta de Identidad</option>
						<option value="CE" <?php if($act["0"]["TipoIdUsuario"]=="CE") echo "selected";?> >CE - Cedula de Extranjería</option>
						<option value="CC" <?php if($act["0"]["TipoIdUsuario"]=="CC") echo "selected";?> >CC - Cedula de Ciudadanía</option>
						<option value="PA" <?php if($act["0"]["TipoIdUsuario"]=="PA") echo "selected";?> >PA - Pasaporte</option>
						<option value="MS" <?php if($act["0"]["TipoIdUsuario"]=="MS") echo "selected";?> >MS - Menor sin Identificación</option>
						<option value="AS" <?php if($act["0"]["TipoIdUsuario"]=="AS") echo "selected";?> >AS - Adulto sin Identificación</option>
						<option value="NV" <?php if($act["0"]["TipoIdUsuario"]=="NV") echo "selected";?> >NV - Certificado Nacido Vivo</option>
					</select>
					<span class="help-inline">En Caso de Ser NV - Certificado de Nacido Vivo, solo para menores con 2 meses o menos de nacidos</span>
				</div>
			</div>

			<!-- 4. Número de identificación del usuario -->

			<div class="control-group">
				<label class="control-label	" for="NumeroIdUsuario">4. Número de identificación del usuario</label>
				<div class="controls">
					<input class="input-medium" type="text" name="NumeroIdUsuario" id="NumeroIdUsuario" value="<?php echo $act["0"]["NumeroIdUsuario"]; ?>">
				</div>
			</div>

			<!-- 5. Primer Apellido del Usuario -->

			<div class="control-group">
				<label class="control-label	" for="Apellido1">5. Primer Apellido del Usuario</label>
				<div class="controls">
					<input class="input-medium" type="text" name="Apellido1" id="Apellido1" value="<?php echo $act["0"]["Apellido1"]; ?>">
				</div>
			</div>

			<!-- 6. Segundo Apellido del Usuario -->

			<div class="control-group">
				<label class="control-label	" for="Apellido2">6. Segundo Apellido del Usuario</label>
				<div class="controls">
					<input class="input-medium" type="text" name="Apellido2" id="Apellido2" value="<?php echo $act["0"]["Apellido2"]; ?>">
					<span class="help-inline">En Caso que el Usuario no tenga Segundo Apellido o no se tenga este dato Registre "NONE", en mayuscula sostenida</span>
				</div>
			</div>

			<!-- 7. Primer Nombre del Usuario -->

			<div class="control-group">
				<label class="control-label	" for="Nombre1">7. Primer Nombre del Usuario</label>
				<div class="controls">
					<input class="input-medium" type="text" name="Nombre1" id="Nombre1" value="<?php echo $act["0"]["Nombre1"]; ?>">
				</div>
			</div>

			<!-- 8. Segundo Nombre del Usuario -->

			<div class="control-group">
				<label class="control-label	" for="Nombre2">8. Segundo Nombre del Usuario</label>
				<div class="controls">
					<input class="input-medium" type="text" name="Nombre2" id="Nombre2" value="<?php echo $act["0"]["Nombre2"]; ?>">
					<span class="help-inline">En Caso que el Usuario no tenga Segundo Nombre o no se tenga este dato Registre "NONE", en mayuscula sostenida</span>
				</div>
			</div>

			<!-- 9. Fecha de Nacimiento -->

			<div class="control-group">
				<label class="control-label	" for="FechaNacimiento">9. Fecha de Nacimiento</label>
				<div class="controls">
  					<input class="input-medium" type="text" name="FechaNacimiento" id="FechaNacimiento" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaNacimiento"]; ?>">
  					<span class="help-inline">Edad: <?php echo $Edad;?></span>
				</div>
			</div>

			<!-- 10. Sexo -->

			<div class="control-group">
				<label class="control-label	" for="Sexo">10. Sexo</label>
				<div class="controls">
					<select id="Sexo" name="Sexo">
						<option value="">...Seleccione Sexo</option>
						<option value="M" <?php if($act["0"]["Sexo"]=="M") echo "selected";?> >M - Masculino</option>
						<option value="F" <?php if($act["0"]["Sexo"]=="F") echo "selected";?> >F - Femenino</option>
					</select>
				</div>
			</div>

			<!-- 11. Código pertenencia étnica -->

			<div class="control-group">
				<label class="control-label	" for="PertenenciaEtnica">11. Código Pertenencia Étnica</label>
				<div class="controls">
					<select id="PertenenciaEtnica" name="PertenenciaEtnica" class="span4">
						<option value="">...Seleccione Código Pertenencia Étnica</option>
						<option value="1" <?php if($act["0"]["PertenenciaEtnica"]=="1") echo "selected";?> >1 - Indígena</option>
						<option value="2" <?php if($act["0"]["PertenenciaEtnica"]=="2") echo "selected";?> >2 - ROM (Gitano)</option>
						<option value="3" <?php if($act["0"]["PertenenciaEtnica"]=="3") echo "selected";?> >3 - Raizal (Archipiélago de San Andrés y Providencia)</option>
						<option value="4" <?php if($act["0"]["PertenenciaEtnica"]=="4") echo "selected";?> >4 - Palanquero de San Basilio</option>
						<option value="5" <?php if($act["0"]["PertenenciaEtnica"]=="5") echo "selected";?> >5 - Negro(a), Mulato(a), Afrocolombiano(a) o Afrodescendiente</option>
						<option value="6" <?php if($act["0"]["PertenenciaEtnica"]=="6") echo "selected";?> >6 - Ninguno de los Anteriores</option>
					</select>
				</div>
			</div>

			<!-- 12. Código de ocupación -->

			<div class="control-group">
				<label class="control-label	" for="CodigoOcupacion">12. Código Ocupación</label>
				<div class="controls">
					<select id="CodigoOcupacion" name="CodigoOcupacion" class="span4">
						<option value="">...Seleccione Código Ocupación</option>
						<option value="6111" <?php if($act["0"]["CodigoOcupacion"]=="6111") echo "selected";?> >Agricultores y trabajadores calificados de cultivos extensivos</option>
						<option value="9998" <?php if($act["0"]["CodigoOcupacion"]=="9998") echo "selected";?> >No Aplica</option>
						<option value="9999" <?php if($act["0"]["CodigoOcupacion"]=="9999") echo "selected";?> >Sin Dato</option>
					</select>
					<span class="help-inline"></span>
				</div>
			</div>			

			<!-- 13. Código Nivel Educativo -->

			<div class="control-group">
				<label class="control-label	" for="CodigoNivelEducativo">13. Código Nivel Educativo</label>
				<div class="controls">
					<select id="CodigoNivelEducativo" name="CodigoNivelEducativo" class="span4">
						<option value="">...Seleccione Código Nivel Educativo</option>
						<option value="1" <?php if($act["0"]["CodigoNivelEducativo"]=="1") echo "selected";?> >1 - Preescolar</option>
						<option value="2" <?php if($act["0"]["CodigoNivelEducativo"]=="2") echo "selected";?> >2 - Básica Primaria</option>
						<option value="3" <?php if($act["0"]["CodigoNivelEducativo"]=="3") echo "selected";?> >3 - Básica Secundaria</option>
						<option value="4" <?php if($act["0"]["CodigoNivelEducativo"]=="4") echo "selected";?> >4 - Media Académica o Clásica</option>
						<option value="5" <?php if($act["0"]["CodigoNivelEducativo"]=="5") echo "selected";?> >5 - Media Técnica (Bachillerato Técnico)</option>
						<option value="6" <?php if($act["0"]["CodigoNivelEducativo"]=="6") echo "selected";?> >6 - Normalista</option>
						<option value="7" <?php if($act["0"]["CodigoNivelEducativo"]=="7") echo "selected";?> >7 - Técnica Profesional</option>
						<option value="8" <?php if($act["0"]["CodigoNivelEducativo"]=="8") echo "selected";?> >8 - Tecnológica</option>
						<option value="9" <?php if($act["0"]["CodigoNivelEducativo"]=="9") echo "selected";?> >9 - Profesional</option>
						<option value="10" <?php if($act["0"]["CodigoNivelEducativo"]=="10") echo "selected";?> >10 - Especialización</option>
						<option value="11" <?php if($act["0"]["CodigoNivelEducativo"]=="11") echo "selected";?> >11 - Maestría</option>
						<option value="12" <?php if($act["0"]["CodigoNivelEducativo"]=="12") echo "selected";?> >12 - Doctorado</option>
						<option value="13" <?php if($act["0"]["CodigoNivelEducativo"]=="13") echo "selected";?> >13 - Ninguno</option>
					</select>
				</div>
			</div>	

		</fieldset>

		<fieldset>
			<legend>Identificación del Riesgo</legend>	

			<!-- 14. Gestación -->

			<div class="control-group">
				<label class="control-label	" for="Gestacion">14. Gestación</label>
				<div class="controls">
					<select id="Gestacion" name="Gestacion">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["Gestacion"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["Gestacion"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["Gestacion"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["Gestacion"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 15. Sífilis Gestacional o Congénita -->

			<div class="control-group">
				<label class="control-label	" for="SifilisGestacional">15. Sífilis Gestacional o Congénita</label>
				<div class="controls">
					<select id="SifilisGestacional" name="SifilisGestacional">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["SifilisGestacional"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["SifilisGestacional"]=="1") echo "selected";?> >1 - Si es mujer con sífilis gestacional</option>
						<option value="2" <?php if($act["0"]["SifilisGestacional"]=="2") echo "selected";?> >2 - Si es recién nacido con sífilis congénita</option>
						<option value="3" <?php if($act["0"]["SifilisGestacional"]=="3") echo "selected";?> >3 - No</option>
						<option value="21" <?php if($act["0"]["SifilisGestacional"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 16. Hipertensión Inducida por la Gestación -->

			<div class="control-group">
				<label class="control-label	" for="HipertensionInducidaGestacion">16. Hipertensión Inducida por la Gestación</label>
				<div class="controls">
					<select id="HipertensionInducidaGestacion" name="HipertensionInducidaGestacion">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["HipertensionInducidaGestacion"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["HipertensionInducidaGestacion"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["HipertensionInducidaGestacion"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["HipertensionInducidaGestacion"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 17. Hipotiroidismo Congénito -->

			<div class="control-group">
				<label class="control-label	" for="HipotiroidismoCongenito">17. Hipotiroidismo Congénito</label>
				<div class="controls">
					<select id="HipotiroidismoCongenito" name="HipotiroidismoCongenito">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["HipotiroidismoCongenito"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["HipotiroidismoCongenito"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["HipotiroidismoCongenito"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["HipotiroidismoCongenito"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 18. Sintomático Respiratorio -->

			<div class="control-group">
				<label class="control-label	" for="SintomaticoRespiratorio">18. Sintomático Respiratorio</label>
				<div class="controls">
					<select id="SintomaticoRespiratorio" name="SintomaticoRespiratorio">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["SintomaticoRespiratorio"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["SintomaticoRespiratorio"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["SintomaticoRespiratorio"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 19. Tuberculosis Multidrogoresistente -->

			<div class="control-group">
				<label class="control-label	" for="Tuberculosis">19. Tuberculosis Multidrogoresistente</label>
				<div class="controls">
					<select id="Tuberculosis" name="Tuberculosis">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["Tuberculosis"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["Tuberculosis"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["Tuberculosis"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["Tuberculosis"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 20. Lepra -->

			<div class="control-group">
				<label class="control-label	" for="Lepra">20. Lepra</label>
				<div class="controls">
					<select id="Lepra" name="Lepra">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["Lepra"]=="1") echo "selected";?> >1 - Pausibacilar</option>
						<option value="2" <?php if($act["0"]["Lepra"]=="2") echo "selected";?> >2 - Multibacilar</option>
						<option value="3" <?php if($act["0"]["Lepra"]=="3") echo "selected";?> >3 - No</option>
						<option value="21" <?php if($act["0"]["Lepra"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 21. Obesidad o Desnutrición Proteico Calórica -->

			<div class="control-group">
				<label class="control-label	" for="ObesidadDesnutricion">21. Obesidad o Desnutrición Proteico Calórica</label>
				<div class="controls">
					<select id="ObesidadDesnutricion" name="ObesidadDesnutricion">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["ObesidadDesnutricion"]=="1") echo "selected";?> >1 - Si es Obesidad</option>
						<option value="2" <?php if($act["0"]["ObesidadDesnutricion"]=="2") echo "selected";?> >2 - Si es Desnutrición Proteico Calórica</option>
						<option value="3" <?php if($act["0"]["ObesidadDesnutricion"]=="3") echo "selected";?> >3 - No</option>
						<option value="21" <?php if($act["0"]["ObesidadDesnutricion"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 22. Víctima de Maltrato -->

			<div class="control-group">
				<label class="control-label	" for="VictimaMaltrato">22. Víctima de Maltrato</label>
				<div class="controls">
					<select id="VictimaMaltrato" name="VictimaMaltrato">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["VictimaMaltrato"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["VictimaMaltrato"]=="1") echo "selected";?> >1 - Si es Mujer Víctima de Maltrato</option>
						<option value="2" <?php if($act["0"]["VictimaMaltrato"]=="2") echo "selected";?> >2 - Si es Menor Víctima de Maltrato</option>
						<option value="3" <?php if($act["0"]["VictimaMaltrato"]=="3") echo "selected";?> >3 - No</option>
						<option value="21" <?php if($act["0"]["VictimaMaltrato"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 23. Víctima de Violencia Sexual -->

			<div class="control-group">
				<label class="control-label	" for="VictimaViolenciaSexual">23. Víctima de Violencia Sexual</label>
				<div class="controls">
					<select id="VictimaViolenciaSexual" name="VictimaViolenciaSexual">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["VictimaViolenciaSexual"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["VictimaViolenciaSexual"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["VictimaViolenciaSexual"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 24. Infecciones de Trasmisión Sexual -->

			<div class="control-group">
				<label class="control-label	" for="InfeccionTrasmisionSexual">24. Infecciones de Trasmisión Sexual</label>
				<div class="controls">
					<select id="InfeccionTrasmisionSexual" name="InfeccionTrasmisionSexual">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["InfeccionTrasmisionSexual"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["InfeccionTrasmisionSexual"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["InfeccionTrasmisionSexual"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 25. Enfermedad Mental -->

			<div class="control-group">
				<label class="control-label	" for="EnfermedadMental">25. Enfermedad Mental</label>
				<div class="controls">
					<select id="EnfermedadMental" name="EnfermedadMental">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["EnfermedadMental"]=="1") echo "selected";?> >1 - Si el diagnóstico es ansiedad</option>
						<option value="2" <?php if($act["0"]["EnfermedadMental"]=="2") echo "selected";?> >2 - Si el diagnóstico es depresión</option>
						<option value="3" <?php if($act["0"]["EnfermedadMental"]=="3") echo "selected";?> >3 - Si el diagnóstico es esquizofrenia</option>
						<option value="4" <?php if($act["0"]["EnfermedadMental"]=="4") echo "selected";?> >4 - Si el diagnóstico es déficit de atención por hiperactividad</option>
						<option value="5" <?php if($act["0"]["EnfermedadMental"]=="5") echo "selected";?> >5 - Si el diagnóstico es consumo de sustancias psicoactivas</option>
						<option value="6" <?php if($act["0"]["EnfermedadMental"]=="6") echo "selected";?> >6 - Si el diagnóstico es trastorno del ánimo bipolar</option>
						<option value="7" <?php if($act["0"]["EnfermedadMental"]=="7") echo "selected";?> >7 - No</option>
						<option value="21" <?php if($act["0"]["EnfermedadMental"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 26. Cáncer de Cervix -->

			<div class="control-group">
				<label class="control-label	" for="CancerCervix">26. Cáncer de Cervix</label>
				<div class="controls">
					<select id="CancerCervix" name="CancerCervix">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["CancerCervix"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["CancerCervix"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["CancerCervix"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["CancerCervix"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 27. Cáncer de Seno -->

			<div class="control-group">
				<label class="control-label	" for="CancerSeno">27. Cáncer de Seno</label>
				<div class="controls">
					<select id="CancerSeno" name="CancerSeno">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["CancerSeno"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["CancerSeno"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["CancerSeno"]=="21") echo "selected";?> >3 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 28. Fluorosis Dental -->

			<div class="control-group">
				<label class="control-label	" for="FluorosisDental">28. Fluorosis Dental</label>
				<div class="controls">
					<select id="FluorosisDental" name="FluorosisDental">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["FluorosisDental"]=="1") echo "selected";?> >1 - Si</option>
						<option value="2" <?php if($act["0"]["FluorosisDental"]=="2") echo "selected";?> >2 - No</option>
						<option value="21" <?php if($act["0"]["FluorosisDental"]=="21") echo "selected";?> >21 - Riesgo No Evaluado</option>
					</select>
				</div>
			</div>

		</fieldset>

		<fieldset>
			<legend>Actividades de Intervención Según el Riesgo</legend>

			<!-- 29. Fecha del Peso -->

			<div class="control-group">
				<label class="control-label	" for="FechaPeso">29. Fecha de Peso</label>
				<div class="controls">
  					<input class="input-medium" type="text" name="FechaPeso" id="FechaPeso" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaPeso"]; ?>">
  					<span class="help-inline">Si no se toma registrar 1800-01-01</span>
				</div>
			</div>

			<!-- 30. Peso en Kilogramos -->

			<div class="control-group">
				<label class="control-label	" for="PesoKilogramos">30. Peso en Kilogramos</label>
				<div class="controls">
					<input class="input-medium" type="text" name="PesoKilogramos" id="PesoKilogramos" value="<?php echo $act["0"]["PesoKilogramos"]; ?>">
					<span class="help-inline">Si no se toma registrar 999</span>
				</div>
			</div>

			<!-- 31. Fecha de la Talla -->

			<div class="control-group">
				<label class="control-label	" for="FechaTalla">31. Fecha de la Talla</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTalla" id="FechaTalla" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTalla"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD. Si no se toma registrar 1800-01-01</span>
				</div>
			</div>

			<!-- 32. Talla en Centímetros -->

			<div class="control-group">
				<label class="control-label	" for="TallaCentimetros">32. Talla en Centímetros</label>
				<div class="controls">
					<input class="input-medium" type="text" name="TallaCentimetros" id="TallaCentimetros" value="<?php echo $act["0"]["TallaCentimetros"]; ?>">
					<span class="help-inline">Si no se toma registrar 999</span>
				</div>
			</div>

			<!-- 33. Fecha Probable de Parto -->

			<div class="control-group">
				<label class="control-label	" for="FechaProbablePartoInput">33. Fecha Probable de Parto</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaProbablePartoInput" id="FechaProbablePartoInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaProbableParto"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD.</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaProbablePartoRadio" id="FechaProbablePartoRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaProbablePartoRadio" id="FechaProbablePartoRadio2" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>
			</div>

			<!-- 34. Edad Gestacional al Nacer -->

			<div class="control-group">
				<label class="control-label	" for="EdadGestacional">34. Edad Gestacional al Nacer</label>
				<div class="controls">
					<input class="input-medium" type="text" name="EdadGestacional" id="EdadGestacional" value="<?php echo $act["0"]["EdadGestacional"]; ?>">
					<span class="help-inline">Se registra el dato de la edad gestacional en semanas. Si no tiene el dato registrar 999. Si no aplica registrar 0</span>
				</div>
			</div>

			<!-- 35. BCG -->

			<div class="control-group">
				<label class="control-label	" for="BCG">35. BCG</label>
				<div class="controls">
					<select id="BCG" name="BCG">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["BCG"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["BCG"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="16" <?php if($act["0"]["BCG"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["BCG"]=="17") echo "selected";?> >17 - No se admninistra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["BCG"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["BCG"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["BCG"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["BCG"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 36. Hepatitis B Menores de 1 Año -->

			<div class="control-group">
				<label class="control-label	" for="HepatitisB">36. Hepatitis B Menores de 1 Año</label>
				<div class="controls">
					<select id="HepatitisB" name="HepatitisB">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["HepatitisB"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["HepatitisB"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="16" <?php if($act["0"]["HepatitisB"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["HepatitisB"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["HepatitisB"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["HepatitisB"]=="19") echo "selected";?> >18 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["HepatitisB"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["HepatitisB"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 37. Pentavalente -->

			<div class="control-group">
				<label class="control-label	" for="Pentavalente">37. Pentavalente</label>
				<div class="controls">
					<select id="Pentavalente" name="Pentavalente">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["Pentavalente"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["Pentavalente"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="2" <?php if($act["0"]["Pentavalente"]=="2") echo "selected";?> >2 - Dos Dosis</option>
						<option value="3" <?php if($act["0"]["Pentavalente"]=="3") echo "selected";?> >3 - Tres Dosis</option>
						<option value="16" <?php if($act["0"]["Pentavalente"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["Pentavalente"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["Pentavalente"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["Pentavalente"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["Pentavalente"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["Pentavalente"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 38. Polio -->

			<div class="control-group">
				<label class="control-label	" for="Polio">38. Polio</label>
				<div class="controls">
					<select id="Polio" name="Polio">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["Polio"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["Polio"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="2" <?php if($act["0"]["Polio"]=="2") echo "selected";?> >2 - Dos Dosis</option>
						<option value="3" <?php if($act["0"]["Polio"]=="3") echo "selected";?> >3 - Tres Dosis</option>
						<option value="4" <?php if($act["0"]["Polio"]=="4") echo "selected";?> >4 - Cuatro Dosis</option>
						<option value="5" <?php if($act["0"]["Polio"]=="5") echo "selected";?> >5 - Cinco Dosis</option>
						<option value="16" <?php if($act["0"]["Polio"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["Polio"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["Polio"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["Polio"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["Polio"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["Polio"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 39. DPT Menores de 5 Años -->

			<div class="control-group">
				<label class="control-label	" for="DPT">39. DPT Menores de 5 Años</label>
				<div class="controls">
					<select id="DPT" name="DPT">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["DPT"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="4" <?php if($act["0"]["DPT"]=="4") echo "selected";?> >4 - Cuatro Dosis</option>
						<option value="5" <?php if($act["0"]["DPT"]=="5") echo "selected";?> >5 - Cinco Dosis</option>
						<option value="16" <?php if($act["0"]["DPT"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["DPT"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["DPT"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["DPT"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["DPT"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["DPT"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 40. Rotavirus -->

			<div class="control-group">
				<label class="control-label	" for="Rotavirus">40. Rotavirus</label>
				<div class="controls">
					<select id="Rotavirus" name="Rotavirus">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["Rotavirus"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["Rotavirus"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="2" <?php if($act["0"]["Rotavirus"]=="2") echo "selected";?> >2 - Dos Dosis</option>
						<option value="16" <?php if($act["0"]["Rotavirus"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["Rotavirus"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["Rotavirus"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["Rotavirus"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["Rotavirus"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["Rotavirus"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 41. Neumococo -->

			<div class="control-group">
				<label class="control-label	" for="Neumococo">41. Neumococo</label>
				<div class="controls">
					<select id="Neumococo" name="Neumococo">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["Neumococo"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["Neumococo"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="2" <?php if($act["0"]["Neumococo"]=="2") echo "selected";?> >2 - Dos Dosis</option>
						<option value="3" <?php if($act["0"]["Neumococo"]=="3") echo "selected";?> >3 - Tres Dosis</option>
						<option value="16" <?php if($act["0"]["Neumococo"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["Neumococo"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["Neumococo"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["Neumococo"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["Neumococo"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["Neumococo"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 42. Influenza Niños -->

			<div class="control-group">
				<label class="control-label	" for="InfluenzaN">42. Influenza Niños</label>
				<div class="controls">
					<select id="InfluenzaN" name="InfluenzaN">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["InfluenzaN"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["InfluenzaN"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="2" <?php if($act["0"]["InfluenzaN"]=="2") echo "selected";?> >2 - Dos Dosis</option>
						<option value="3" <?php if($act["0"]["InfluenzaN"]=="3") echo "selected";?> >3 - Tres Dosis Anual</option>
						<option value="16" <?php if($act["0"]["InfluenzaN"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["InfluenzaN"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["InfluenzaN"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["InfluenzaN"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["InfluenzaN"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["InfluenzaN"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 43. Fiebre Amarilla Niños de 1 Año -->

			<div class="control-group">
				<label class="control-label	" for="FiebreAmarillaN1">43. Fiebre Amarilla Niños de 1 Año</label>
				<div class="controls">
					<select id="FiebreAmarillaN1" name="FiebreAmarillaN1">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["FiebreAmarillaN1"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["FiebreAmarillaN1"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="16" <?php if($act["0"]["FiebreAmarillaN1"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["FiebreAmarillaN1"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["FiebreAmarillaN1"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["FiebreAmarillaN1"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["FiebreAmarillaN1"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["FiebreAmarillaN1"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 44. Hepatitis A -->

			<div class="control-group">
				<label class="control-label	" for="HepatitisA">44. Hepatitis A</label>
				<div class="controls">
					<select id="HepatitisA" name="HepatitisA">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["HepatitisA"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["HepatitisA"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="16" <?php if($act["0"]["HepatitisA"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["HepatitisA"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["HepatitisA"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["HepatitisA"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["HepatitisA"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["HepatitisA"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 45. Triple Viral Niños -->

			<div class="control-group">
				<label class="control-label	" for="TripleViralN">45. Triple Viral Niños</label>
				<div class="controls">
					<select id="TripleViralN" name="TripleViralN">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["TripleViralN"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["TripleViralN"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="2" <?php if($act["0"]["TripleViralN"]=="2") echo "selected";?> >2 - Dos Dosis</option>
						<option value="16" <?php if($act["0"]["TripleViralN"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["TripleViralN"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["TripleViralN"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["TripleViralN"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["TripleViralN"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["TripleViralN"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 46. Virus del Papiloma Humano (VPH) -->

			<div class="control-group">
				<label class="control-label	" for="VPH">46. Virus del Papiloma Humano (VPH)</label>
				<div class="controls">
					<select id="VPH" name="VPH">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["VPH"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["VPH"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="2" <?php if($act["0"]["VPH"]=="2") echo "selected";?> >2 - Dos Dosis</option>
						<option value="3" <?php if($act["0"]["VPH"]=="3") echo "selected";?> >3 - Tres Dosis</option>
						<option value="16" <?php if($act["0"]["VPH"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["VPH"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["VPH"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["VPH"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["VPH"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["VPH"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 47. TD o TT Mujeres en Edad Fértil 15 a 49 Años -->

			<div class="control-group">
				<label class="control-label	" for="TdTtMEF">47. TD o TT Mujeres en Edad Fértil 15 a 49 Años</label>
				<div class="controls">
					<select id="TdTtMEF" name="TdTtMEF">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["TdTtMEF"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["TdTtMEF"]=="1") echo "selected";?> >1 - Una Dosis</option>
						<option value="2" <?php if($act["0"]["TdTtMEF"]=="2") echo "selected";?> >2 - Dos Dosis</option>
						<option value="3" <?php if($act["0"]["TdTtMEF"]=="3") echo "selected";?> >3 - Tres Dosis</option>
						<option value="4" <?php if($act["0"]["TdTtMEF"]=="4") echo "selected";?> >4 - Cuatro Dosis</option>
						<option value="5" <?php if($act["0"]["TdTtMEF"]=="5") echo "selected";?> >5 - Cinco Dosis</option>
						<option value="16" <?php if($act["0"]["TdTtMEF"]=="16") echo "selected";?> >16 - No se administra por una tradición</option>
						<option value="17" <?php if($act["0"]["TdTtMEF"]=="17") echo "selected";?> >17 - No se administra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["TdTtMEF"]=="18") echo "selected";?> >18 - No se administra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["TdTtMEF"]=="19") echo "selected";?> >19 - No se administra por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["TdTtMEF"]=="20") echo "selected";?> >20 - No se administra por otras razones</option>
						<option value="22" <?php if($act["0"]["TdTtMEF"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
					<span class="help-inline">Registre el dato de la última dosis aplicada</span>
				</div>
			</div>

			<!-- 48. Control de Placa Bacteriana -->

			<div class="control-group">
				<label class="control-label	" for="ControlPlacaBacteriana">48. Control de Placa Bacteriana</label>
				<div class="controls">
					<select id="ControlPlacaBacteriana" name="ControlPlacaBacteriana">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["ControlPlacaBacteriana"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["ControlPlacaBacteriana"]=="1") echo "selected";?> >1 - Si - Primera Vez en el Año</option>
						<option value="2" <?php if($act["0"]["ControlPlacaBacteriana"]=="2") echo "selected";?> >2 - Si - Segunda Vez en el Año</option>
						<option value="16" <?php if($act["0"]["ControlPlacaBacteriana"]=="16") echo "selected";?> >16 - No se realiza por una tradición</option>
						<option value="17" <?php if($act["0"]["ControlPlacaBacteriana"]=="17") echo "selected";?> >17 - No se realiza por una condición de salud</option>
						<option value="18" <?php if($act["0"]["ControlPlacaBacteriana"]=="18") echo "selected";?> >18 - No se realiza por negación del usuario</option>
						<option value="19" <?php if($act["0"]["ControlPlacaBacteriana"]=="19") echo "selected";?> >19 - No se realiza por tener datos de contacto del usuario no actualizados</option>
						<option value="20" <?php if($act["0"]["ControlPlacaBacteriana"]=="20") echo "selected";?> >20 - No se realiza por otras razones</option>
						<option value="22" <?php if($act["0"]["ControlPlacaBacteriana"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 49. Fecha Atención Parto o Cesárea -->

			<div class="control-group">
				<label class="control-label" for="FechaAtencionPartoInput">49. Fecha Atención Parto o Cesárea</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaAtencionPartoInput" id="FechaAtencionPartoInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaAtencionParto"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaAtencionPartoRadio" id="FechaAtencionPartoRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaAtencionPartoRadio" id="FechaAtencionPartoRadio2" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>
			</div>

			<!-- 50. Fecha Salida de la Atención del Parto o Cesárea -->

			<div class="control-group">
				<label class="control-label" for="FechaSalidaPartoInput">50. Fecha Salida de la Atención del Parto o Cesárea</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaSalidaPartoInput" id="FechaSalidaPartoInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaSalidaParto"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaSalidaPartoRadio" id="FechaSalidaPartoRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaSalidaPartoRadio" id="FechaSalidaPartoRadio2" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>
			</div>

			<!-- 51. Fecha Consejería en Lactancia Materna -->

			<div class="control-group">
				<label class="control-label" for="FechaConsejeriaLactanciaInput">51. Fecha Consejería en Lactancia Materna</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaConsejeriaLactanciaInput" id="FechaConsejeriaLactanciaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaConsejeriaLactanciaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaConsejeriaLactanciaRadio" id="FechaConsejeriaLactanciaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaConsejeriaLactanciaRadio" id="FechaConsejeriaLactanciaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaConsejeriaLactanciaRadio" id="FechaConsejeriaLactanciaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaConsejeriaLactanciaRadio" id="FechaConsejeriaLactanciaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaConsejeriaLactanciaRadio" id="FechaConsejeriaLactanciaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaConsejeriaLactanciaRadio" id="FechaConsejeriaLactanciaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaConsejeriaLactanciaRadio" id="FechaConsejeriaLactanciaRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 52. Control Recién Nacido -->

			<div class="control-group">
				<label class="control-label	" for="ControlRecienNacidoInput">52. Control Recién Nacido</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ControlRecienNacidoInput" id="ControlRecienNacidoInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ControlRecienNacidoInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ControlRecienNacidoRadio" id="ControlRecienNacidoRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlRecienNacidoRadio" id="ControlRecienNacidoRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlRecienNacidoRadio" id="ControlRecienNacidoRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlRecienNacidoRadio" id="ControlRecienNacidoRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlRecienNacidoRadio" id="ControlRecienNacidoRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlRecienNacidoRadio" id="ControlRecienNacidoRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlRecienNacidoRadio" id="ControlRecienNacidoRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>


			<!-- 53. Planificación Familiar Primera Vez -->

			<div class="control-group">
				<label class="control-label	" for="PlanificacionFamiliarPrimeraVezInput">53. Planificación Familiar Primera Vez</label>
				<div class="controls">
					<input class="input-medium" type="text" name="PlanificacionFamiliarPrimeraVezInput" id="PlanificacionFamiliarPrimeraVezInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["PlanificacionFamiliarPrimeraVezInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="PlanificacionFamiliarPrimeraVezRadio" id="PlanificacionFamiliarPrimeraVezRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="PlanificacionFamiliarPrimeraVezRadio" id="PlanificacionFamiliarPrimeraVezRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="PlanificacionFamiliarPrimeraVezRadio" id="PlanificacionFamiliarPrimeraVezRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="PlanificacionFamiliarPrimeraVezRadio" id="PlanificacionFamiliarPrimeraVezRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="PlanificacionFamiliarPrimeraVezRadio" id="PlanificacionFamiliarPrimeraVezRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="PlanificacionFamiliarPrimeraVezRadio" id="PlanificacionFamiliarPrimeraVezRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="PlanificacionFamiliarPrimeraVezRadio" id="PlanificacionFamiliarPrimeraVezRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 54. Suministro de Método Anticonceptivo -->

			<div class="control-group">
				<label class="control-label	" for="SuministroMetodoAnticonceptivo">54. Suministro de Método Anticonceptivo</label>
				<div class="controls">
					<select id="SuministroMetodoAnticonceptivo" name="SuministroMetodoAnticonceptivo">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="1") echo "selected";?> >1 - Dispositivo Intrauterino</option>
						<option value="2" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="2") echo "selected";?> >2 - Dispositivo Intrauterino y Barrera</option>
						<option value="3" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="3") echo "selected";?> >3 - Implante Subdérmico</option>
						<option value="4" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="4") echo "selected";?> >4 - Implante Subdérmico y Barrera</option>
						<option value="5" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="5") echo "selected";?> >5 - Oral</option>
						<option value="6" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="6") echo "selected";?> >6 - Oral y Barrera</option>
						<option value="7" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="7") echo "selected";?> >7 - Inyectable Mensual</option>
						<option value="8" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="8") echo "selected";?> >8 - Inyectable Mensual y Barrera</option>
						<option value="9" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="9") echo "selected";?> >9 - Inyectable Trimestral</option>
						<option value="10" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="10") echo "selected";?> >10 - Inyectable Trimestral y Barrera</option>
						<option value="11" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="11") echo "selected";?> >11 - Emergencia</option>
						<option value="12" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="12") echo "selected";?> >12 - Emergencia y Barrera</option>
						<option value="13" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="13") echo "selected";?> >13 - Esterilización</option>
						<option value="14" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="14") echo "selected";?> >14 - Esterilización y Barrera</option>
						<option value="15" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="15") echo "selected";?> >15 - Barrera</option>
						<option value="16" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="16") echo "selected";?> >16 - No se suministra por una tradición</option>
						<option value="17" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="17") echo "selected";?> >17 - No se suministra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="18") echo "selected";?> >18 - No se suministra por negación de la usuaria</option>
						<option value="20" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="20") echo "selected";?> >20 - No se suministra por otras razones</option>
						<option value="21" <?php if($act["0"]["SuministroMetodoAnticonceptivo"]=="21") echo "selected";?> >21 - Registro No Evaluado</option>

					</select>
				</div>
			</div>

			<!-- 55. Fecha Suministro de Método Anticonceptivo -->

			<div class="control-group">
				<label class="control-label	" for="FechaSuministroMetodoAnticonceptivoInput">55. Fecha Suministro de Método Anticonceptivo</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaSuministroMetodoAnticonceptivoInput" id="FechaSuministroMetodoAnticonceptivoInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaSuministroMetodoAnticonceptivo"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD.</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaSuministroMetodoAnticonceptivoRadio" id="FechaSuministroMetodoAnticonceptivoRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaSuministroMetodoAnticonceptivoRadio" id="FechaSuministroMetodoAnticonceptivoRadio2" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>
			</div>

			<!-- 56. Control Prenatal de Primera Vez -->

			<div class="control-group">
				<label class="control-label	" for="ControlPrenatalPrimeraVezInput">56. Control Prenatal de Primera Vez</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ControlPrenatalPrimeraVezInput" id="ControlPrenatalPrimeraVezInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ControlPrenatalPrimeraVezInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ControlPrenatalPrimeraVezRadio" id="ControlPrenatalPrimeraVezRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlPrenatalPrimeraVezRadio" id="ControlPrenatalPrimeraVezRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlPrenatalPrimeraVezRadio" id="ControlPrenatalPrimeraVezRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlPrenatalPrimeraVezRadio" id="ControlPrenatalPrimeraVezRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlPrenatalPrimeraVezRadio" id="ControlPrenatalPrimeraVezRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlPrenatalPrimeraVezRadio" id="ControlPrenatalPrimeraVezRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlPrenatalPrimeraVezRadio" id="ControlPrenatalPrimeraVezRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 57. Control Prenatal -->

			<div class="control-group">
				<label class="control-label	" for="ControlPrenatalInput">57. Control Prenatal</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ControlPrenatalInput" id="ControlPrenatalInput" value="<?php echo $act["0"]["ControlPrenatal"]; ?>">
					<span class="help-inline">Registre el numero de controles que ha tenido en el último período de reporte durante la gestación actual.</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ControlPrenatalRadio" id="ControlPrenatalRadio1" value="999">
				 	No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ControlPrenatalRadio" id="ControlPrenatalRadio2" value="0">
				  	No Aplica
				</label>
			</div>

			<!-- 58. Último Control Prenatal -->

			<div class="control-group">
				<label class="control-label	" for="UltimoControlPrenatalInput">58. Último Control Prenatal</label>
				<div class="controls">
					<input class="input-medium" type="text" name="UltimoControlPrenatalInput" id="UltimoControlPrenatalInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["UltimoControlPrenatal"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD.</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="UltimoControlPrenatalRadio" id="UltimoControlPrenatalRadio1" value="1800-01-01">
				 	No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="UltimoControlPrenatalRadio" id="UltimoControlPrenatalRadio2" value="1845-01-01">
				  	No Aplica
				</label>
			</div>

			<!-- 59. Suministro de Ácido Fólico en el Último Control Prenatal -->

			<div class="control-group">
				<label class="control-label	" for="SuministroAcidoFolico">59. Suministro de Ácido Fólico en el Último Control Prenatal</label>
				<div class="controls">
					<select id="SuministroAcidoFolico" name="SuministroAcidoFolico">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["SuministroAcidoFolico"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["SuministroAcidoFolico"]=="1") echo "selected";?> >1 - Si se suministra</option>
						<option value="16" <?php if($act["0"]["SuministroAcidoFolico"]=="16") echo "selected";?> >16 - No se suministra por una tradición</option>
						<option value="17" <?php if($act["0"]["SuministroAcidoFolico"]=="17") echo "selected";?> >17 - No se suministra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["SuministroAcidoFolico"]=="18") echo "selected";?> >18 - No se suministra por negación de la usuaria</option>
						<option value="20" <?php if($act["0"]["SuministroAcidoFolico"]=="20") echo "selected";?> >20 - No se suministra por otras razones</option>
						<option value="21" <?php if($act["0"]["SuministroAcidoFolico"]=="21") echo "selected";?> >21 - Registro No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 60. Suministro de Sulfato Ferroso en el Último Control Prenatal -->

			<div class="control-group">
				<label class="control-label	" for="SuministroSulfatoFerroso">60. Suministro de Sulfato Ferroso en el Último Control Prenatal</label>
				<div class="controls">
					<select id="SuministroSulfatoFerroso" name="SuministroSulfatoFerroso">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["SuministroSulfatoFerroso"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["SuministroSulfatoFerroso"]=="1") echo "selected";?> >1 - Si se suministra</option>
						<option value="16" <?php if($act["0"]["SuministroSulfatoFerroso"]=="16") echo "selected";?> >16 - No se suministra por una tradición</option>
						<option value="17" <?php if($act["0"]["SuministroSulfatoFerroso"]=="17") echo "selected";?> >17 - No se suministra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["SuministroSulfatoFerroso"]=="18") echo "selected";?> >18 - No se suministra por negación de la usuaria</option>
						<option value="20" <?php if($act["0"]["SuministroSulfatoFerroso"]=="20") echo "selected";?> >20 - No se suministra por otras razones</option>
						<option value="21" <?php if($act["0"]["SuministroSulfatoFerroso"]=="21") echo "selected";?> >21 - Registro No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 61. Suministro de Carbonato de Calcio en el Último Control Prenatal -->

			<div class="control-group">
				<label class="control-label	" for="SuministroCarbonatoCalcio">61. Suministro de Carbonato de Calcio en el Último Control Prenatal</label>
				<div class="controls">
					<select id="SuministroCarbonatoCalcio" name="SuministroCarbonatoCalcio">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["SuministroCarbonatoCalcio"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["SuministroCarbonatoCalcio"]=="1") echo "selected";?> >1 - Si se suministra</option>
						<option value="16" <?php if($act["0"]["SuministroCarbonatoCalcio"]=="16") echo "selected";?> >16 - No se suministra por una tradición</option>
						<option value="17" <?php if($act["0"]["SuministroCarbonatoCalcio"]=="17") echo "selected";?> >17 - No se suministra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["SuministroCarbonatoCalcio"]=="18") echo "selected";?> >18 - No se suministra por negación de la usuaria</option>
						<option value="20" <?php if($act["0"]["SuministroCarbonatoCalcio"]=="20") echo "selected";?> >20 - No se suministra por otras razones</option>
						<option value="21" <?php if($act["0"]["SuministroCarbonatoCalcio"]=="21") echo "selected";?> >21 - Registro No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 62. Valoración de la Agudeza Visual -->

			<div class="control-group">
				<label class="control-label	" for="ValoracionAgudezaVisualInput">62. Valoración de la Agudeza Visual</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ValoracionAgudezaVisualInput" id="ValoracionAgudezaVisualInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ValoracionAgudezaVisualInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ValoracionAgudezaVisualRadio" id="ValoracionAgudezaVisualRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ValoracionAgudezaVisualRadio" id="ValoracionAgudezaVisualRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ValoracionAgudezaVisualRadio" id="ValoracionAgudezaVisualRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ValoracionAgudezaVisualRadio" id="ValoracionAgudezaVisualRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ValoracionAgudezaVisualRadio" id="ValoracionAgudezaVisualRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ValoracionAgudezaVisualRadio" id="ValoracionAgudezaVisualRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ValoracionAgudezaVisualRadio" id="ValoracionAgudezaVisualRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 63. Consulta por Oftalmología -->

			<div class="control-group">
				<label class="control-label	" for="ConsultaOftalmologiaInput">63. Consulta por Oftalmología</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ConsultaOftalmologiaInput" id="ConsultaOftalmologiaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ConsultaOftalmologiaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ConsultaOftalmologiaRadio" id="ConsultaOftalmologiaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaOftalmologiaRadio" id="ConsultaOftalmologiaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaOftalmologiaRadio" id="ConsultaOftalmologiaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaOftalmologiaRadio" id="ConsultaOftalmologiaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaOftalmologiaRadio" id="ConsultaOftalmologiaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaOftalmologiaRadio" id="ConsultaOftalmologiaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaOftalmologiaRadio" id="ConsultaOftalmologiaRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 64. Fecha Diagnóstico Desnutrición Proteico Calórica -->

			<div class="control-group">
				<label class="control-label	" for="FechaDiagnosticoDesnutricionInput">64. Fecha Diagnóstico Desnutrición Proteico Calórica</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaDiagnosticoDesnutricionInput" id="FechaDiagnosticoDesnutricionInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaDiagnosticoDesnutricion"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD.</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaDiagnosticoDesnutricionRadio" id="FechaDiagnosticoDesnutricionRadio1" value="1800-01-01">
				 	No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaDiagnosticoDesnutricionRadio" id="FechaDiagnosticoDesnutricionRadio2" value="1845-01-01">
				  	No Aplica
				</label>
			</div>

			<!-- 65. Consulta Mujer o Menor Víctima del Maltrato -->

			<div class="control-group">
				<label class="control-label	" for="ConsultaMujerMenorVictimaInput">65. Consulta Mujer o Menor Víctima del Maltrato</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ConsultaMujerMenorVictimaInput" id="ConsultaMujerMenorVictimaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ConsultaMujerMenorVictimaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ConsultaMujerMenorVictimaRadio" id="ConsultaMujerMenorVictimaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaMujerMenorVictimaRadio" id="ConsultaMujerMenorVictimaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaMujerMenorVictimaRadio" id="ConsultaMujerMenorVictimaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaMujerMenorVictimaRadio" id="ConsultaMujerMenorVictimaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaMujerMenorVictimaRadio" id="ConsultaMujerMenorVictimaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaMujerMenorVictimaRadio" id="ConsultaMujerMenorVictimaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaMujerMenorVictimaRadio" id="ConsultaMujerMenorVictimaRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 66. Consulta Víctimas de Violencia Sexual -->

			<div class="control-group">
				<label class="control-label	" for="ConsultaVictimaViolenciaSexualInput">66. Consulta Víctimas de Violencia Sexual</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ConsultaVictimaViolenciaSexualInput" id="ConsultaVictimaViolenciaSexualInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ConsultaVictimaViolenciaSexualInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ConsultaVictimaViolenciaSexualRadio" id="ConsultaVictimaViolenciaSexualRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaVictimaViolenciaSexualRadio" id="ConsultaVictimaViolenciaSexualRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaVictimaViolenciaSexualRadio" id="ConsultaVictimaViolenciaSexualRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaVictimaViolenciaSexualRadio" id="ConsultaVictimaViolenciaSexualRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaVictimaViolenciaSexualRadio" id="ConsultaVictimaViolenciaSexualRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaVictimaViolenciaSexualRadio" id="ConsultaVictimaViolenciaSexualRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaVictimaViolenciaSexualRadio" id="ConsultaVictimaViolenciaSexualRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 67. Consulta Nutrición -->

			<div class="control-group">
				<label class="control-label	" for="ConsultaNutricionInput">67. Consulta Nutrición</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ConsultaNutricionInput" id="ConsultaNutricionInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ConsultaNutricionInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ConsultaNutricionRadio" id="ConsultaNutricionRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaNutricionRadio" id="ConsultaNutricionRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaNutricionRadio" id="ConsultaNutricionRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaNutricionRadio" id="ConsultaNutricionRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaNutricionRadio" id="ConsultaNutricionRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaNutricionRadio" id="ConsultaNutricionRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaNutricionRadio" id="ConsultaNutricionRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 68. Consulta de Psicología -->

			<div class="control-group">
				<label class="control-label	" for="ConsultaPsicologiaInput">68. Consulta de Psicología</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ConsultaPsicologiaInput" id="ConsultaPsicologiaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ConsultaPsicologiaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ConsultaPsicologiaRadio" id="ConsultaPsicologiaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaPsicologiaRadio" id="ConsultaPsicologiaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaPsicologiaRadio" id="ConsultaPsicologiaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaPsicologiaRadio" id="ConsultaPsicologiaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaPsicologiaRadio" id="ConsultaPsicologiaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaPsicologiaRadio" id="ConsultaPsicologiaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaPsicologiaRadio" id="ConsultaPsicologiaRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 69. Consulta de Crecimiento y Desarrollo Primera Vez -->

			<div class="control-group">
				<label class="control-label	" for="ConsultaCyDPrimeraVezInput">69. Consulta de Crecimiento y Desarrollo Primera Vez</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ConsultaCyDPrimeraVezInput" id="ConsultaCyDPrimeraVezInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ConsultaCyDPrimeraVezInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ConsultaCyDPrimeraVezRadio" id="ConsultaCyDPrimeraVezRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaCyDPrimeraVezRadio" id="ConsultaCyDPrimeraVezRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaCyDPrimeraVezRadio" id="ConsultaCyDPrimeraVezRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaCyDPrimeraVezRadio" id="ConsultaCyDPrimeraVezRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaCyDPrimeraVezRadio" id="ConsultaCyDPrimeraVezRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaCyDPrimeraVezRadio" id="ConsultaCyDPrimeraVezRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaCyDPrimeraVezRadio" id="ConsultaCyDPrimeraVezRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 70. Suministro de Sulfato Ferroso en la Última Consulta del Menor de 10 Años -->

			<div class="control-group">
				<label class="control-label	" for="SuministroSulfatoFerrosoMenor">70. Suministro de Sulfato Ferroso en la Última Consulta del Menor de 10 Años</label>
				<div class="controls">
					<select id="SuministroSulfatoFerrosoMenor" name="SuministroSulfatoFerrosoMenor">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["SuministroSulfatoFerrosoMenor"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["SuministroSulfatoFerrosoMenor"]=="1") echo "selected";?> >1 - Si se suministra</option>
						<option value="16" <?php if($act["0"]["SuministroSulfatoFerrosoMenor"]=="16") echo "selected";?> >16 - No se suministra por una tradición</option>
						<option value="17" <?php if($act["0"]["SuministroSulfatoFerrosoMenor"]=="17") echo "selected";?> >17 - No se suministra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["SuministroSulfatoFerrosoMenor"]=="18") echo "selected";?> >18 - No se suministra por negación de la usuaria</option>
						<option value="20" <?php if($act["0"]["SuministroSulfatoFerrosoMenor"]=="20") echo "selected";?> >20 - No se suministra por otras razones</option>
						<option value="21" <?php if($act["0"]["SuministroSulfatoFerrosoMenor"]=="21") echo "selected";?> >21 - Registro No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 71. Suministro de Vitamina A en la Última Consulta del Menor de 10 Años -->

			<div class="control-group">
				<label class="control-label	" for="SuministroVitaminaAMenor">71. Suministro de Vitamina A en la Última Consulta del Menor de 10 Años</label>
				<div class="controls">
					<select id="SuministroVitaminaAMenor" name="SuministroVitaminaAMenor">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["SuministroVitaminaAMenor"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["SuministroVitaminaAMenor"]=="1") echo "selected";?> >1 - Si se suministra</option>
						<option value="16" <?php if($act["0"]["SuministroVitaminaAMenor"]=="16") echo "selected";?> >16 - No se suministra por una tradición</option>
						<option value="17" <?php if($act["0"]["SuministroVitaminaAMenor"]=="17") echo "selected";?> >17 - No se suministra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["SuministroVitaminaAMenor"]=="18") echo "selected";?> >18 - No se suministra por negación de la usuaria</option>
						<option value="20" <?php if($act["0"]["SuministroVitaminaAMenor"]=="20") echo "selected";?> >20 - No se suministra por otras razones</option>
						<option value="21" <?php if($act["0"]["SuministroVitaminaAMenor"]=="21") echo "selected";?> >21 - Registro No Evaluado</option>
					</select>
				</div>
			</div>

			<!-- 72. Consulta de Joven Primera Vez -->

			<div class="control-group">
				<label class="control-label	" for="ConsultaJovenPrimeraVezInput">72. Consulta de Joven Primera Vez</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ConsultaJovenPrimeraVezInput" id="ConsultaJovenPrimeraVezInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ConsultaJovenPrimeraVezInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ConsultaJovePrimeraVezRadio" id="ConsultaJovePrimeraVezRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaJovePrimeraVezRadio" id="ConsultaJovePrimeraVezRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaJovePrimeraVezRadio" id="ConsultaJovePrimeraVezRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaJovePrimeraVezRadio" id="ConsultaJovePrimeraVezRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaJovePrimeraVezRadio" id="ConsultaJovePrimeraVezRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaJovePrimeraVezRadio" id="ConsultaJovePrimeraVezRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaJovePrimeraVezRadio" id="ConsultaJovePrimeraVezRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 73. Consulta de Adulto Primera Vez -->

			<div class="control-group">
				<label class="control-label	" for="ConsultaAdultoPrimeraVezInput">73. Consulta de Adulto Primera Vez</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ConsultaAdultoPrimeraVezInput" id="ConsultaAdultoPrimeraVezInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["ConsultaAdultoPrimeraVezInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="ConsultaAdultoPrimeraVezRadio" id="ConsultaAdultoPrimeraVezRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaAdultoPrimeraVezRadio" id="ConsultaAdultoPrimeraVezRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaAdultoPrimeraVezRadio" id="ConsultaAdultoPrimeraVezRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaAdultoPrimeraVezRadio" id="ConsultaAdultoPrimeraVezRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaAdultoPrimeraVezRadio" id="ConsultaAdultoPrimeraVezRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaAdultoPrimeraVezRadio" id="ConsultaAdultoPrimeraVezRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="ConsultaAdultoPrimeraVezRadio" id="ConsultaAdultoPrimeraVezRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 74. Preservativos entregados a pacientes con ITS -->

			<div class="control-group">
				<label class="control-label	" for="PreservativosITSInput">74. Preservativos entregados a pacientes con ITS</label>
				<div class="controls">
					<input class="input-medium" type="text" name="PreservativosITSInput" id="PreservativosITSInput" value="<?php echo $act["0"]["PreservativosITSInput"]; ?>">
					<span class="help-inline">Registre el número de preservativos entregados durante el período de reporte</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="PreservativosITSRadio" id="PreservativosITSRadio1" value="999">
				 	999 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="PreservativosITSRadio" id="PreservativosITSRadio2" value="0">
				  	0 - No Aplica
				</label>
				<label class="radio">
				  	<input type="radio" name="PreservativosITSRadio" id="PreservativosITSRadio3" value="997">
				  	997 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="PreservativosITSRadio" id="PreservativosITSRadio4" value="996">
				  	996 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="PreservativosITSRadio" id="PreservativosITSRadio5" value="995">
				  	995 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="PreservativosITSRadio" id="PreservativosITSRadio6" value="994">
				  	994 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="PreservativosITSRadio" id="PreservativosITSRadio7" value="993">
				  	993 - No se realiza por otras razones
				</label>

			</div>

			<!-- 75. Asesoría Pre test Elisa para VIH -->

			<div class="control-group">
				<label class="control-label	" for="AsesoriaPreElisaInput">75. Asesoría Pre test Elisa para VIH</label>
				<div class="controls">
					<input class="input-medium" type="text" name="AsesoriaPreElisaInput" id="AsesoriaPreElisaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["AsesoriaPreElisaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="AsesoriaPreElisaRadio" id="AsesoriaPreElisaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPreElisaRadio" id="AsesoriaPreElisaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPreElisaRadio" id="AsesoriaPreElisaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPreElisaRadio" id="AsesoriaPreElisaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPreElisaRadio" id="AsesoriaPreElisaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPreElisaRadio" id="AsesoriaPreElisaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPreElisaRadio" id="AsesoriaPreElisaRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 76. Asesoría Post test Elisa para VIH -->

			<div class="control-group">
				<label class="control-label	" for="AsesoriaPostElisaInput">76. Asesoría Post test Elisa para VIH</label>
				<div class="controls">
					<input class="input-medium" type="text" name="AsesoriaPostElisaInput" id="AsesoriaPostElisaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["AsesoriaPostElisaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="AsesoriaPostElisaRadio" id="AsesoriaPostElisaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPostElisaRadio" id="AsesoriaPostElisaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPostElisaRadio" id="AsesoriaPostElisaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPostElisaRadio" id="AsesoriaPostElisaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPostElisaRadio" id="AsesoriaPostElisaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPostElisaRadio" id="AsesoriaPostElisaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="AsesoriaPostElisaRadio" id="AsesoriaPostElisaRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 77. Paciente con Diagnóstico de: Ansiedad, Depresión, Esquizofrenia, déficit de atención, consumo SPA y Bipolaridad recibió Atención en los últimos 6 meses por Equipo Interdisciplinario Completo -->

			<div class="control-group">
				<label class="control-label	" for="PacienteEnfermedadMental">77. Paciente con Diagnóstico de: Ansiedad, Depresión, Esquizofrenia, déficit de atención, consumo SPA y Bipolaridad recibió Atención en los últimos 6 meses por Equipo Interdisciplinario Completo</label>
				<div class="controls">
					<select id="PacienteEnfermedadMental" name="PacienteEnfermedadMental">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["PacienteEnfermedadMental"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["PacienteEnfermedadMental"]=="1") echo "selected";?> >1 - En Proceso de Atención</option>
						<option value="2" <?php if($act["0"]["PacienteEnfermedadMental"]=="2") echo "selected";?> >2 - Si recibió atención por equipo interdisciplinario completo</option>
						<option value="16" <?php if($act["0"]["PacienteEnfermedadMental"]=="16") echo "selected";?> >16 - No recibió atención por tener una tradición que se lo impide</option>
						<option value="17" <?php if($act["0"]["PacienteEnfermedadMental"]=="17") echo "selected";?> >17 - No se suministra por una condición de salud</option>
						<option value="18" <?php if($act["0"]["PacienteEnfermedadMental"]=="18") echo "selected";?> >18 - No se suministra por negación del usuario</option>
						<option value="19" <?php if($act["0"]["PacienteEnfermedadMental"]=="19") echo "selected";?> >19 - No recibió atención porque los datos de contacto del usuario no se encuentran actualizados </option>
						<option value="20" <?php if($act["0"]["PacienteEnfermedadMental"]=="20") echo "selected";?> >20 - No recibió atención por otras razones</option>
						<option value="22" <?php if($act["0"]["PacienteEnfermedadMental"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 78. Fecha Antígeno de Superficie Hepatitis B en Gestantes -->

			<div class="control-group">
				<label class="control-label	" for="FechaAntigenoHepatitisBGestantesInput">78. Fecha Antígeno de Superficie Hepatitis B en Gestantes</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaAntigenoHepatitisBGestantesInput" id="FechaAntigenoHepatitisBGestantesInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaAntigenoHepatitisBGestantesInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaAntigenoHepatitisBGestantesRadio" id="FechaAntigenoHepatitisBGestantesRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaAntigenoHepatitisBGestantesRadio" id="FechaAntigenoHepatitisBGestantesRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaAntigenoHepatitisBGestantesRadio" id="FechaAntigenoHepatitisBGestantesRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaAntigenoHepatitisBGestantesRadio" id="FechaAntigenoHepatitisBGestantesRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaAntigenoHepatitisBGestantesRadio" id="FechaAntigenoHepatitisBGestantesRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaAntigenoHepatitisBGestantesRadio" id="FechaAntigenoHepatitisBGestantesRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaAntigenoHepatitisBGestantesRadio" id="FechaAntigenoHepatitisBGestantesRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 79. Resultado Antígeno de Superficie Hepatitis B en Gestantes -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoAntigenoHepatitisBGestantes">79. Resultado Antígeno de Superficie Hepatitis B en Gestantes</label>
				<div class="controls">
					<select id="ResultadoAntigenoHepatitisBGestantes" name="ResultadoAntigenoHepatitisBGestantes">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["ResultadoAntigenoHepatitisBGestantes"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["ResultadoAntigenoHepatitisBGestantes"]=="1") echo "selected";?> >1 - Negativo</option>
						<option value="2" <?php if($act["0"]["ResultadoAntigenoHepatitisBGestantes"]=="2") echo "selected";?> >2 - Positivo</option>
						<option value="22" <?php if($act["0"]["ResultadoAntigenoHepatitisBGestantes"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 80. Fecha Serología para Sífilis -->

			<div class="control-group">
				<label class="control-label	" for="FechaSerologiaSifilisInput">80. Fecha Serología para Sífilis</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaSerologiaSifilisInput" id="FechaSerologiaSifilisInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaSerologiaSifilisInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaSerologiaSifilisRadio" id="FechaSerologiaSifilisRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaSerologiaSifilisRadio" id="FechaSerologiaSifilisRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaSerologiaSifilisRadio" id="FechaSerologiaSifilisRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaSerologiaSifilisRadio" id="FechaSerologiaSifilisRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaSerologiaSifilisRadio" id="FechaSerologiaSifilisRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaSerologiaSifilisRadio" id="FechaSerologiaSifilisRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaSerologiaSifilisRadio" id="FechaSerologiaSifilisRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 81. Resultado Serología para Sífilis -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoSerologiaSifilis">81. Resultado Serología para Sífilis</label>
				<div class="controls">
					<select id="ResultadoSerologiaSifilis" name="ResultadoSerologiaSifilis">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["ResultadoSerologiaSifilis"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["ResultadoSerologiaSifilis"]=="1") echo "selected";?> >1 - No Reactiva</option>
						<option value="2" <?php if($act["0"]["ResultadoSerologiaSifilis"]=="2") echo "selected";?> >2 - Reactiva</option>
						<option value="22" <?php if($act["0"]["ResultadoSerologiaSifilis"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 82. Fecha de Toma de Elisa para VIH -->

			<div class="control-group">
				<label class="control-label	" for="FechaTomaElisaVIHInput">82. Fecha de Toma de Elisa para VIH</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTomaElisaVIHInput" id="FechaTomaElisaVIHInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTomaElisaVIHInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaTomaElisaVIHInputRadio" id="FechaTomaElisaVIHInputRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaElisaVIHInputRadio" id="FechaTomaElisaVIHInputRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaElisaVIHInputRadio" id="FechaTomaElisaVIHInputRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaElisaVIHInputRadio" id="FechaTomaElisaVIHInputRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaElisaVIHInputRadio" id="FechaTomaElisaVIHInputRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaElisaVIHInputRadio" id="FechaTomaElisaVIHInputRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaElisaVIHInputRadio" id="FechaTomaElisaVIHInputRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 83. Resultado Elisa para VIH -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoElisaVIH">83. Resultado Elisa para VIH</label>
				<div class="controls">
					<select id="ResultadoElisaVIH" name="ResultadoElisaVIH">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["ResultadoElisaVIH"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["ResultadoElisaVIH"]=="1") echo "selected";?> >1 - Negativo</option>
						<option value="2" <?php if($act["0"]["ResultadoElisaVIH"]=="2") echo "selected";?> >2 - Positivo</option>
						<option value="22" <?php if($act["0"]["ResultadoElisaVIH"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 84. Fecha TSH Neonatal -->

			<div class="control-group">
				<label class="control-label	" for="FechaTSHNeonatalInput">84. Fecha TSH Neonatal</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTSHNeonatalInput" id="FechaTSHNeonatalInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTSHNeonatalInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaTSHNeonatalRadio" id="FechaTSHNeonatalRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTSHNeonatalRadio" id="FechaTSHNeonatalRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTSHNeonatalRadio" id="FechaTSHNeonatalRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTSHNeonatalRadio" id="FechaTSHNeonatalRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTSHNeonatalRadio" id="FechaTSHNeonatalRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTSHNeonatalRadio" id="FechaTSHNeonatalRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTSHNeonatalRadio" id="FechaTSHNeonatalRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 85. Resultado TSH Neonatal -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoTSHNeonatal">85. Resultado TSH Neonatal</label>
				<div class="controls">
					<select id="ResultadoTSHNeonatal" name="ResultadoTSHNeonatal">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["ResultadoTSHNeonatal"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["ResultadoTSHNeonatal"]=="1") echo "selected";?> >1 - Normal</option>
						<option value="2" <?php if($act["0"]["ResultadoTSHNeonatal"]=="2") echo "selected";?> >2 - Anormal</option>
						<option value="22" <?php if($act["0"]["ResultadoTSHNeonatal"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 86. Tamizaje Cáncer de Cuello Uterino -->

			<div class="control-group">
				<label class="control-label	" for="TamizajeCencerCU">86. Tamizaje Cáncer de Cuello Uterino</label>
				<div class="controls">
					<select id="TamizajeCencerCU" name="TamizajeCencerCU">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["TamizajeCencerCU"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["TamizajeCencerCU"]=="1") echo "selected";?> >1 - Citología cervico uterina</option>
						<option value="2" <?php if($act["0"]["TamizajeCencerCU"]=="2") echo "selected";?> >2 - ADN - VPH</option>
						<option value="3" <?php if($act["0"]["TamizajeCencerCU"]=="3") echo "selected";?> >3 - Técnica de inspección visual</option>
						<option value="16" <?php if($act["0"]["TamizajeCencerCU"]=="16") echo "selected";?> >16 - No se realiza por una tradición</option>
						<option value="17" <?php if($act["0"]["TamizajeCencerCU"]=="17") echo "selected";?> >17 - No se realiza por una condición de salud</option>
						<option value="18" <?php if($act["0"]["TamizajeCencerCU"]=="18") echo "selected";?> >18 - No se realiza por negación de la usuaria</option>
						<option value="19" <?php if($act["0"]["TamizajeCencerCU"]=="19") echo "selected";?> >19 - No se realiza por tener datos de contacto de la usuaria no actualizados</option>
						<option value="20" <?php if($act["0"]["TamizajeCencerCU"]=="20") echo "selected";?> >20 - No se realiza por otras razones</option>
						<option value="22" <?php if($act["0"]["TamizajeCencerCU"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 87. Fecha Citología Cervico Uterina -->

			<div class="control-group">
				<label class="control-label	" for="FechaCitologiaCUInput">87. Fecha Citología Cervico Uterina</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaCitologiaCUInput" id="FechaCitologiaCUInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaCitologiaCUInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaCitologiaCURadio" id="FechaCitologiaCURadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaCitologiaCURadio" id="FechaCitologiaCURadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaCitologiaCURadio" id="FechaCitologiaCURadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaCitologiaCURadio" id="FechaCitologiaCURadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaCitologiaCURadio" id="FechaCitologiaCURadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaCitologiaCURadio" id="FechaCitologiaCURadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaCitologiaCURadio" id="FechaCitologiaCURadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 88. Citología Cervico Uterina Resultados según Bethesda -->

			<div class="control-group">
				<label class="control-label	" for="CitologiaCUResultados">88. Citología Cervico Uterina Resultados según Bethesda</label>
				<div class="controls">
					<select id="CitologiaCUResultados" name="CitologiaCUResultados">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["CitologiaCUResultados"]=="1") echo "selected";?> >1 - ASC-US (células escamosas atípicas de significado indeterminado)</option>
						<option value="2" <?php if($act["0"]["CitologiaCUResultados"]=="2") echo "selected";?> >2 - ASC-H (células escamosas atípicas, de significado indeterminado sugestivo de LEI de alto grado)</option>
						<option value="3" <?php if($act["0"]["CitologiaCUResultados"]=="3") echo "selected";?> >3 - Lesión intraepitelial escamosa (LEI) de bajo grado- HPV (NIC I) (LEI BG)</option>
						<option value="4" <?php if($act["0"]["CitologiaCUResultados"]=="4") echo "selected";?> >4 - Lesión intraepitelial escamosa (LEI) de alto grado (NIC II-III CA INSITU) (LEI AG)</option>
						<option value="5" <?php if($act["0"]["CitologiaCUResultados"]=="5") echo "selected";?> >5 - Lesión intraepitelial escamosa de alto grado sospechosa de infiltración</option>
						<option value="6" <?php if($act["0"]["CitologiaCUResultados"]=="6") echo "selected";?> >6 - Carcinoma de células escamosas (escamocelular)</option>
						<option value="7" <?php if($act["0"]["CitologiaCUResultados"]=="7") echo "selected";?> >7 - Células endocervicales atípicas sin ningún otro significado</option>
						<option value="8" <?php if($act["0"]["CitologiaCUResultados"]=="8") echo "selected";?> >8 - Células endometriales atípicas sin ningún otro significado</option>
						<option value="9" <?php if($act["0"]["CitologiaCUResultados"]=="9") echo "selected";?> >9 - Células glandulares atípicas sin ningún otro significado</option>
						<option value="10" <?php if($act["0"]["CitologiaCUResultados"]=="10") echo "selected";?> >10 - Células endocervicales atípicas sospechosas de neoplasia</option>
						<option value="11" <?php if($act["0"]["CitologiaCUResultados"]=="11") echo "selected";?> >11 - Células endometriales atípicas sospechosas de neoplasia</option>
						<option value="12" <?php if($act["0"]["CitologiaCUResultados"]=="12") echo "selected";?> >12 - Células glandulares atípicas sospechosas de neoplasia</option>
						<option value="13" <?php if($act["0"]["CitologiaCUResultados"]=="13") echo "selected";?> >13 - Adenocarcinoma endocervical in situ</option>
						<option value="14" <?php if($act["0"]["CitologiaCUResultados"]=="14") echo "selected";?> >14 - Adenocarcinoma endocervical</option>
						<option value="15" <?php if($act["0"]["CitologiaCUResultados"]=="15") echo "selected";?> >15 - Adenocarcinoma endometrial</option>
						<option value="16" <?php if($act["0"]["CitologiaCUResultados"]=="16") echo "selected";?> >16 - Otras neoplasias</option>
						<option value="17" <?php if($act["0"]["CitologiaCUResultados"]=="17") echo "selected";?> >17 - Negativa para lesión intraepitelial o neoplasia</option>
						<option value="18" <?php if($act["0"]["CitologiaCUResultados"]=="18") echo "selected";?> >18 - Inadecuada para lectura</option>
						<option value="999" <?php if($act["0"]["CitologiaCUResultados"]=="999") echo "selected";?> >999 - Sin Dato</option>
						<option value="0" <?php if($act["0"]["CitologiaCUResultados"]=="0") echo "selected";?> >0 - No Aplica</option>
					</select>
				</div>
			</div>

			<!-- 89. Calidad en la Muestra de Citología Cervicouterina -->

			<div class="control-group">
				<label class="control-label	" for="CalidadMuestraCitologia">89. Calidad en la Muestra de Citología Cervicouterina</label>
				<div class="controls">
					<select id="CalidadMuestraCitologia" name="CalidadMuestraCitologia">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["CalidadMuestraCitologia"]=="1") echo "selected";?> >1 - Satisfactoria Zona de Transformación Presente</option>
						<option value="2" <?php if($act["0"]["CalidadMuestraCitologia"]=="2") echo "selected";?> >2 - Satisfactoria Zona de Transformación Ausente</option>
						<option value="3" <?php if($act["0"]["CalidadMuestraCitologia"]=="3") echo "selected";?> >3 - Insatisfactoria</option>
						<option value="4" <?php if($act["0"]["CalidadMuestraCitologia"]=="4") echo "selected";?> >4 - Rechazada</option>
						<option value="999" <?php if($act["0"]["CalidadMuestraCitologia"]=="999") echo "selected";?> >999 - Sin Dato</option>
						<option value="0" <?php if($act["0"]["CalidadMuestraCitologia"]=="0") echo "selected";?> >0 - No Aplica</option>
					</select>
				</div>
			</div>

			<!-- 90. Código de Habilitación IPS donde se toma la Citología Cervicouterina -->

			<div class="control-group">
				<label class="control-label	" for="CodigoHabilitacionIPSTomaMuestra">90. Código de Habilitación IPS donde se toma la Citología Cervicouterina</label>
				<div class="controls">
					<input class="input-medium" type="text" name="CodigoHabilitacionIPSTomaMuestra" id="CodigoHabilitacionIPSTomaMuestra" value="<?php echo $act["0"]["CodigoHabilitacionIPSTomaMuestra"]; ?>">
					<span class="help-inline">Si no se tiene el dato registrar 999, si no aplica registrar 0</span>
				</div>
			</div>

			<!-- 91. Fecha Colposcopia -->

			<div class="control-group">
				<label class="control-label	" for="FechaColposcopiaInput">91. Fecha Colposcopia</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaColposcopiaInput" id="FechaColposcopiaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaColposcopiaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaColposcopiaRadio" id="FechaColposcopiaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaColposcopiaRadio" id="FechaColposcopiaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaColposcopiaRadio" id="FechaColposcopiaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaColposcopiaRadio" id="FechaColposcopiaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaColposcopiaRadio" id="FechaColposcopiaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaColposcopiaRadio" id="FechaColposcopiaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaColposcopiaRadio" id="FechaColposcopiaRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 92. Código Habilitación IPS donde se toma la Colposcopia -->

			<div class="control-group">
				<label class="control-label	" for="CodigoHabilitacionTomaColposcopia">92. Código Habilitación IPS donde se toma la Colposcopia</label>
				<div class="controls">
					<input class="input-medium" type="text" name="CodigoHabilitacionTomaColposcopia" id="CodigoHabilitacionTomaColposcopia" value="<?php echo $act["0"]["CodigoHabilitacionTomaColposcopia"]; ?>">
					<span class="help-inline">Si no se tiene el dato registrar 999, si no aplica registrar 0</span>
				</div>
			</div>

			<!-- 93. Fecha Biopsia Cervical -->
			
			<div class="control-group">
				<label class="control-label	" for="FechaBiopsiaCervicalInput">93. Fecha Biopsia Cervical</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaBiopsiaCervicalInput" id="FechaBiopsiaCervicalInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaBiopsiaCervicalInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaBiopsiaCervicalRadio" id="FechaBiopsiaCervicalRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaCervicalRadio" id="FechaBiopsiaCervicalRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaCervicalRadio" id="FechaBiopsiaCervicalRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaCervicalRadio" id="FechaBiopsiaCervicalRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaCervicalRadio" id="FechaBiopsiaCervicalRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaCervicalRadio" id="FechaBiopsiaCervicalRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaCervicalRadio" id="FechaBiopsiaCervicalRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 94. Resultado de Biopsia Cervical -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoBiopsiaCervical">94. Resultado de Biopsia Cervical</label>
				<div class="controls">
					<select id="ResultadoBiopsiaCervical" name="ResultadoBiopsiaCervical">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["ResultadoBiopsiaCervical"]=="1") echo "selected";?> >1 - Negativo para Neoplasia</option>
						<option value="2" <?php if($act["0"]["ResultadoBiopsiaCervical"]=="2") echo "selected";?> >2 - Infección por VPH</option>
						<option value="3" <?php if($act["0"]["ResultadoBiopsiaCervical"]=="3") echo "selected";?> >3 - NIC de Bajo Grado - NIC I</option>
						<option value="4" <?php if($act["0"]["ResultadoBiopsiaCervical"]=="4") echo "selected";?> >4 - NIC de Alto Grado - NIC II - NIC III</option>
						<option value="5" <?php if($act["0"]["ResultadoBiopsiaCervical"]=="5") echo "selected";?> >5 - Neoplasia Microinfiltrante: Escamocelular o Adenocarcinoma</option>
						<option value="6" <?php if($act["0"]["ResultadoBiopsiaCervical"]=="6") echo "selected";?> >6 - Neoplasia Infiltrante: Escamocelular o Adenocarcinoma</option>
						<option value="999" <?php if($act["0"]["ResultadoBiopsiaCervical"]=="999") echo "selected";?> >999 - Sin Dato</option>
						<option value="0" <?php if($act["0"]["ResultadoBiopsiaCervical"]=="0") echo "selected";?> >0 - No Aplica</option>
					</select>
				</div>
			</div>	

			<!-- 95. Código Habilitación IPS donde se toma la Biopsia Cervical -->

			<div class="control-group">
				<label class="control-label	" for="CodigoHabilitacionTomaBiopsia">95. Código Habilitación IPS donde se toma la Biopsia Cervical</label>
				<div class="controls">
					<input class="input-medium" type="text" name="CodigoHabilitacionTomaBiopsia" id="CodigoHabilitacionTomaBiopsia" value="<?php echo $act["0"]["CodigoHabilitacionTomaBiopsia"]; ?>">
					<span class="help-inline">Si no se tiene el dato registrar 999, si no aplica registrar 9</span>
				</div>
			</div>

			<!-- 96. Fecha Mamografía -->

			<div class="control-group">
				<label class="control-label	" for="FechaMamografiaInput">96. Fecha Mamografía</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaMamografiaInput" id="FechaMamografiaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaMamografiaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaMamografiaRadio" id="FechaMamografiaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaMamografiaRadio" id="FechaMamografiaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaMamografiaRadio" id="FechaMamografiaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaMamografiaRadio" id="FechaMamografiaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaMamografiaRadio" id="FechaMamografiaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaMamografiaRadio" id="FechaMamografiaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaMamografiaRadio" id="FechaMamografiaRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 97. Resultado Mamografía -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoMamografia">97. Resultado Mamografía</label>
				<div class="controls">
					<select id="ResultadoMamografia" name="ResultadoMamografia">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["ResultadoMamografia"]=="1") echo "selected";?> >1 - BIRADS 0: Necesidad de Nuevo Estudio Imagenológico o Mamograma previo para evaluación</option>
						<option value="2" <?php if($act["0"]["ResultadoMamografia"]=="2") echo "selected";?> >2 - BIRADS 1: Negativo</option>
						<option value="3" <?php if($act["0"]["ResultadoMamografia"]=="3") echo "selected";?> >3 - BIRADS 2: Hallazgos Benignos</option>
						<option value="4" <?php if($act["0"]["ResultadoMamografia"]=="4") echo "selected";?> >4 - BIRADS 3: Probablemente Benigno</option>
						<option value="5" <?php if($act["0"]["ResultadoMamografia"]=="5") echo "selected";?> >5 - BIRADS 4: Anormalidad Sospechosa</option>
						<option value="6" <?php if($act["0"]["ResultadoMamografia"]=="5") echo "selected";?> >6 - BIRADS 5: Altamente Sospechoso de Malignidad</option>
						<option value="7" <?php if($act["0"]["ResultadoMamografia"]=="6") echo "selected";?> >7 - BIRADS 6: Malignidad por Biopsia conocida</option>
						<option value="999" <?php if($act["0"]["ResultadoMamografia"]=="999") echo "selected";?> >999 - Sin Dato</option>
						<option value="0" <?php if($act["0"]["ResultadoMamografia"]=="0") echo "selected";?> >0 - No Aplica</option>
					</select>
				</div>
			</div>	

			<!-- 98. Código Habilitación IPS donde se toma la Mamografía -->

			<div class="control-group">
				<label class="control-label	" for="CodigoHabilitacionTomaMamografia">98. Código Habilitación IPS donde se toma la Mamografía</label>
				<div class="controls">
					<input class="input-medium" type="text" name="CodigoHabilitacionTomaMamografia" id="CodigoHabilitacionTomaMamografia" value="<?php echo $act["0"]["CodigoHabilitacionTomaMamografia"]; ?>">
					<span class="help-inline">Si no se tiene el dato registrar 999, si no aplica registrar 0</span>
				</div>
			</div>

			<!-- 99. Fecha Toma Biopsia Seno por BACAF -->

			<div class="control-group">
				<label class="control-label	" for="FechaBiopsiaSenoInput">99. Fecha Toma Biopsia Seno por BACAF</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaBiopsiaSenoInput" id="FechaBiopsiaSenoInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaBiopsiaSenoInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaBiopsiaSenoRadio" id="FechaBiopsiaSenoRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaSenoRadio" id="FechaBiopsiaSenoRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaSenoRadio" id="FechaBiopsiaSenoRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaSenoRadio" id="FechaBiopsiaSenoRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaSenoRadio" id="FechaBiopsiaSenoRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaSenoRadio" id="FechaBiopsiaSenoRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaBiopsiaSenoRadio" id="FechaBiopsiaSenoRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 100. Fecha Resultado Biopsia Seno por BACAF -->

			<div class="control-group">
				<label class="control-label	" for="FechaResultadoBiopsiaSeno">100. Fecha Resultado Biopsia Seno por BACAF</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaResultadoBiopsiaSeno" id="FechaResultadoBiopsiaSeno" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaResultadoBiopsiaSeno"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD. Si no se tiene registrar 1800-01-01. Si no aplica registrar 1845-01-01</span>
				</div>
			</div>

			<!-- 101. Resultado Biopsia Seno por BACAF -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoBiopsiaSeno">101. Resultado Biopsia Seno por BACAF</label>
				<div class="controls">
					<select id="ResultadoBiopsiaSeno" name="ResultadoBiopsiaSeno">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["ResultadoBiopsiaSeno"]=="1") echo "selected";?> >1 - Benigna</option>
						<option value="2" <?php if($act["0"]["ResultadoBiopsiaSeno"]=="2") echo "selected";?> >2 - Atípica (Indeterminada)</option>
						<option value="3" <?php if($act["0"]["ResultadoBiopsiaSeno"]=="3") echo "selected";?> >3 - Malignidad Sospechosa/Probable</option>
						<option value="4" <?php if($act["0"]["ResultadoBiopsiaSeno"]=="4") echo "selected";?> >4 - Maligna</option>
						<option value="5" <?php if($act["0"]["ResultadoBiopsiaSeno"]=="5") echo "selected";?> >5 - No Satisfactoria</option>
						<option value="999" <?php if($act["0"]["ResultadoBiopsiaSeno"]=="999") echo "selected";?> >999 - Sin Dato</option>
						<option value="0" <?php if($act["0"]["ResultadoBiopsiaSeno"]=="0") echo "selected";?> >0 - No Aplica</option>
					</select>
				</div>
			</div>

			<!-- 102. Código Habilitación IPS donde se toma la Biopsia de Seno por BACAF -->

			<div class="control-group">
				<label class="control-label	" for="CodigoHabilitacionBiopsiaSeno">102. Código Habilitación IPS donde se toma la Biopsia de Seno por BACAF</label>
				<div class="controls">
					<input class="input-medium" type="text" name="CodigoHabilitacionBiopsiaSeno" id="CodigoHabilitacionBiopsiaSeno" value="<?php echo $act["0"]["CodigoHabilitacionBiopsiaSeno"]; ?>">
					<span class="help-inline">Si no se tiene el dato registrar 999, si no aplica registrar 0</span>
				</div>
			</div>

			<!-- 103. Fecha Toma de Hemoglobina -->

			<div class="control-group">
				<label class="control-label	" for="FechaTomaHemoglobinaInput">103. Fecha Toma de Hemoglobina</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTomaHemoglobinaInput" id="FechaTomaHemoglobinaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTomaHemoglobinaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaTomaHemoglobinaRadio" id="FechaTomaHemoglobinaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHemoglobinaRadio" id="FechaTomaHemoglobinaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHemoglobinaRadio" id="FechaTomaHemoglobinaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHemoglobinaRadio" id="FechaTomaHemoglobinaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHemoglobinaRadio" id="FechaTomaHemoglobinaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHemoglobinaRadio" id="FechaTomaHemoglobinaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHemoglobinaRadio" id="FechaTomaHemoglobinaRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 104. Resultado Hemoglobina -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoHemoglobina">104. Resultado Hemoglobina Alteración del Joven</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ResultadoHemoglobina" id="ResultadoHemoglobina" value="<?php echo $act["0"]["ResultadoHemoglobina"]; ?>">
					<span class="help-inline">Registre el dato reportado por el laboratorio. Si no aplica registre 0</span>
				</div>
			</div>

			<!-- 105. Fecha de la Toma de Glisemia Basal -->

			<div class="control-group">
				<label class="control-label	" for="FechaTomaGlisemiaInput">105. Fecha de la Toma de Glisemia Basal</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTomaGlisemiaInput" id="FechaTomaGlisemiaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTomaGlisemiaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaTomaGlisemiaRadio" id="FechaTomaGlisemiaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaGlisemiaRadio" id="FechaTomaGlisemiaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaGlisemiaRadio" id="FechaTomaGlisemiaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaGlisemiaRadio" id="FechaTomaGlisemiaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaGlisemiaRadio" id="FechaTomaGlisemiaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaGlisemiaRadio" id="FechaTomaGlisemiaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaGlisemiaRadio" id="FechaTomaGlisemiaRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 106. Fecha Toma Creatinina -->

			<div class="control-group">
				<label class="control-label	" for="FechaTomaCreatininaInput">106. Fecha Toma Creatinina</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTomaCreatininaInput" id="FechaTomaCreatininaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTomaCreatininaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaTomaCreatininaRadio" id="FechaTomaCreatininaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaCreatininaRadio" id="FechaTomaCreatininaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaCreatininaRadio" id="FechaTomaCreatininaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaCreatininaRadio" id="FechaTomaCreatininaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaCreatininaRadio" id="FechaTomaCreatininaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaCreatininaRadio" id="FechaTomaCreatininaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaCreatininaRadio" id="FechaTomaCreatininaRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 107. Resultado Creatinina -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoCreatinina">107. Resultado Creatinina</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ResultadoCreatinina" id="ResultadoCreatinina" value="<?php echo $act["0"]["ResultadoCreatinina"]; ?>">
					<span class="help-inline">Registre el dato reportado por el laboratorio. Si no tiene el dato registrar 999, si no aplica registrar 0</span>
				</div>
			</div>

			<!-- 108. Fecha Hemoglobina Glicosilada -->

			<div class="control-group">
				<label class="control-label	" for="FechaHemoglobinaGlicosiladaInput">108. Fecha Hemoglobina Glicosilada</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaHemoglobinaGlicosiladaInput" id="FechaHemoglobinaGlicosiladaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaHemoglobinaGlicosiladaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaHemoglobinaGlicosiladaRadio" id="FechaHemoglobinaGlicosiladaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaHemoglobinaGlicosiladaRadio" id="FechaHemoglobinaGlicosiladaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaHemoglobinaGlicosiladaRadio" id="FechaHemoglobinaGlicosiladaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaHemoglobinaGlicosiladaRadio" id="FechaHemoglobinaGlicosiladaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaHemoglobinaGlicosiladaRadio" id="FechaHemoglobinaGlicosiladaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaHemoglobinaGlicosiladaRadio" id="FechaHemoglobinaGlicosiladaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaHemoglobinaGlicosiladaRadio" id="FechaHemoglobinaGlicosiladaRadio7" value="1845-01-01">
				  	1845-01-01 - No aplica
				</label>

			</div>

			<!-- 109. Resultado Hemoglobina Glicosilada -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoHemoglobinaGlicosilada">109. Resultado Hemoglobina Glicosilada</label>
				<div class="controls">
					<input class="input-medium" type="text" name="ResultadoHemoglobinaGlicosilada" id="ResultadoHemoglobinaGlicosilada" value="<?php echo $act["0"]["ResultadoHemoglobinaGlicosilada"]; ?>">
					<span class="help-inline">Registre el dato reportado por el laboratorio. Si no tiene el dato registrar 999, si no aplica registrar 0</span>
				</div>
			</div>

			<!-- 110. Fecha Toma de Microalbuminuria -->

			<div class="control-group">
				<label class="control-label	" for="FechaTomaMicroalbuminuriaInput">110. Fecha Toma de Microalbuminuria</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTomaMicroalbuminuriaInput" id="FechaTomaMicroalbuminuriaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTomaMicroalbuminuriaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaTomaMicroalbuminuriaRadio" id="FechaTomaMicroalbuminuriaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaMicroalbuminuriaRadio" id="FechaTomaMicroalbuminuriaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaMicroalbuminuriaRadio" id="FechaTomaMicroalbuminuriaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaMicroalbuminuriaRadio" id="FechaTomaMicroalbuminuriaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaMicroalbuminuriaRadio" id="FechaTomaMicroalbuminuriaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaMicroalbuminuriaRadio" id="FechaTomaMicroalbuminuriaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaMicroalbuminuriaRadio" id="FechaTomaMicroalbuminuriaRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 111. Fecha Toma de HDL -->

			<div class="control-group">
				<label class="control-label	" for="FechaTomaHDLInput">111. Fecha Toma de HDL</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTomaHDLInput" id="FechaTomaHDLInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTomaHDLInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaTomaHDLRadio" id="FechaTomaHDLRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHDLRadio" id="FechaTomaHDLRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHDLRadio" id="FechaTomaHDLRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHDLRadio" id="FechaTomaHDLRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHDLRadio" id="FechaTomaHDLRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHDLRadio" id="FechaTomaHDLRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaHDLRadio" id="FechaTomaHDLRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 112. Fecha Toma de Baciloscopia de Diagnóstico -->

			<div class="control-group">
				<label class="control-label	" for="FechaTomaBaciloscopiaInput">112. Fecha Toma de Baciloscopia de Diagnóstico</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTomaBaciloscopiaInput" id="FechaTomaBaciloscopiaInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTomaBaciloscopiaInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaTomaBaciloscopiaRadio" id="FechaTomaBaciloscopiaRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaBaciloscopiaRadio" id="FechaTomaBaciloscopiaRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaBaciloscopiaRadio" id="FechaTomaBaciloscopiaRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaBaciloscopiaRadio" id="FechaTomaBaciloscopiaRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaBaciloscopiaRadio" id="FechaTomaBaciloscopiaRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaBaciloscopiaRadio" id="FechaTomaBaciloscopiaRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTomaBaciloscopiaRadio" id="FechaTomaBaciloscopiaRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>

			<!-- 113. Resultado de Baciloscopia de Diagnóstico -->

			<div class="control-group">
				<label class="control-label	" for="ResultadoBaciloscopia">113. Resultado de Baciloscopia de Diagnóstico</label>
				<div class="controls">
					<select id="ResultadoBaciloscopia" name="ResultadoBaciloscopia">
						<option value="">...Seleccione Una Opción</option>
						<option value="1" <?php if($act["0"]["ResultadoBaciloscopia"]=="1") echo "selected";?> >1 - Negativa</option>
						<option value="2" <?php if($act["0"]["ResultadoBaciloscopia"]=="2") echo "selected";?> >2 - Positiva</option>
						<option value="3" <?php if($act["0"]["ResultadoBaciloscopia"]=="3") echo "selected";?> >3 - En Proceso</option>
						<option value="4" <?php if($act["0"]["ResultadoBaciloscopia"]=="4") echo "selected";?> >4 - No</option>
						<option value="22" <?php if($act["0"]["ResultadoBaciloscopia"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 114. Tratamiento para Hipotiroidismo Congénito -->

			<div class="control-group">
				<label class="control-label	" for="TratamientoHipotiroidismoCongenito">114. Tratamiento para Hipotiroidismo Congénito</label>
				<div class="controls">
					<select id="TratamientoHipotiroidismoCongenito" name="TratamientoHipotiroidismoCongenito">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["TratamientoHipotiroidismoCongenito"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["TratamientoHipotiroidismoCongenito"]=="1") echo "selected";?> >1 - Si recibe tratamiento pero aún no ha terminado</option>
						<option value="2" <?php if($act["0"]["TratamientoHipotiroidismoCongenito"]=="2") echo "selected";?> >2 - Si recibió tratamiento y ya lo terminó</option>
						<option value="16" <?php if($act["0"]["TratamientoHipotiroidismoCongenito"]=="16") echo "selected";?> >16 - No recibió tratamiento por tener una tradición que se lo impide</option>
						<option value="17" <?php if($act["0"]["TratamientoHipotiroidismoCongenito"]=="17") echo "selected";?> >17 - No recibió tratamiento por una condición de salud que se lo impide</option>
						<option value="18" <?php if($act["0"]["TratamientoHipotiroidismoCongenito"]=="18") echo "selected";?> >18 - No recibió tratamiento por negación del usuario</option>
						<option value="19" <?php if($act["0"]["TratamientoHipotiroidismoCongenito"]=="19") echo "selected";?> >19 - No recibió tratamiento por que los datos de contacto del usuario no se encuentran actualizados</option>
						<option value="20" <?php if($act["0"]["TratamientoHipotiroidismoCongenito"]=="20") echo "selected";?> >20 - No recibió tratamiento por otras razones</option>
						<option value="22" <?php if($act["0"]["TratamientoHipotiroidismoCongenito"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 115. Tratamiento para Sífilis Gestacional -->

			<div class="control-group">
				<label class="control-label	" for="TratamientoSifilisGestacional">115. Tratamiento para Sífilis Gestacional</label>
				<div class="controls">
					<select id="TratamientoSifilisGestacional" name="TratamientoSifilisGestacional">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["TratamientoSifilisGestacional"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["TratamientoSifilisGestacional"]=="1") echo "selected";?> >1 - Si recibe tratamiento pero aún no ha terminado</option>
						<option value="2" <?php if($act["0"]["TratamientoSifilisGestacional"]=="2") echo "selected";?> >2 - Si recibió tratamiento y ya lo terminó</option>
						<option value="16" <?php if($act["0"]["TratamientoSifilisGestacional"]=="16") echo "selected";?> >16 - No recibió tratamiento por tener una tradición que se lo impide</option>
						<option value="17" <?php if($act["0"]["TratamientoSifilisGestacional"]=="17") echo "selected";?> >17 - No recibió tratamiento por una condición de salud que se lo impide</option>
						<option value="18" <?php if($act["0"]["TratamientoSifilisGestacional"]=="18") echo "selected";?> >18 - No recibió tratamiento por negación del usuario</option>
						<option value="19" <?php if($act["0"]["TratamientoSifilisGestacional"]=="19") echo "selected";?> >19 - No recibió tratamiento por que los datos de contacto del usuario no se encuentran actualizados</option>
						<option value="20" <?php if($act["0"]["TratamientoSifilisGestacional"]=="20") echo "selected";?> >20 - No recibió tratamiento por otras razones</option>
						<option value="22" <?php if($act["0"]["TratamientoSifilisGestacional"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 116. Tratamiento para Sífilis Congénita -->

			<div class="control-group">
				<label class="control-label	" for="TratamientoSifilisCongenita">116. Tratamiento para Sífilis Congénita</label>
				<div class="controls">
					<select id="TratamientoSifilisCongenita" name="TratamientoSifilisCongenita">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["TratamientoSifilisCongenita"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["TratamientoSifilisCongenita"]=="1") echo "selected";?> >1 - Si recibe tratamiento pero aún no ha terminado</option>
						<option value="2" <?php if($act["0"]["TratamientoSifilisCongenita"]=="2") echo "selected";?> >2 - Si recibió tratamiento y ya lo terminó</option>
						<option value="16" <?php if($act["0"]["TratamientoSifilisCongenita"]=="16") echo "selected";?> >16 - No recibió tratamiento por tener una tradición que se lo impide</option>
						<option value="17" <?php if($act["0"]["TratamientoSifilisCongenita"]=="17") echo "selected";?> >17 - No recibió tratamiento por una condición de salud que se lo impide</option>
						<option value="18" <?php if($act["0"]["TratamientoSifilisCongenita"]=="18") echo "selected";?> >18 - No recibió tratamiento por negación del usuario</option>
						<option value="19" <?php if($act["0"]["TratamientoSifilisCongenita"]=="19") echo "selected";?> >19 - No recibió tratamiento por que los datos de contacto del usuario no se encuentran actualizados</option>
						<option value="20" <?php if($act["0"]["TratamientoSifilisCongenita"]=="20") echo "selected";?> >20 - No recibió tratamiento por otras razones</option>
						<option value="22" <?php if($act["0"]["TratamientoSifilisCongenita"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 117. Tratamiento para Lepra -->

			<div class="control-group">
				<label class="control-label	" for="TratamientoLepra">117. Tratamiento para Lepra</label>
				<div class="controls">
					<select id="TratamientoLepra" name="TratamientoLepra">
						<option value="">...Seleccione Una Opción</option>
						<option value="0" <?php if($act["0"]["TratamientoLepra"]=="0") echo "selected";?> >0 - No Aplica</option>
						<option value="1" <?php if($act["0"]["TratamientoLepra"]=="1") echo "selected";?> >1 - Si recibe tratamiento pero aún no ha terminado</option>
						<option value="2" <?php if($act["0"]["TratamientoLepra"]=="2") echo "selected";?> >2 - Si recibió tratamiento y ya lo terminó</option>
						<option value="16" <?php if($act["0"]["TratamientoLepra"]=="16") echo "selected";?> >16 - No recibió tratamiento por tener una tradición que se lo impide</option>
						<option value="17" <?php if($act["0"]["TratamientoLepra"]=="17") echo "selected";?> >17 - No recibió tratamiento por una condición de salud que se lo impide</option>
						<option value="18" <?php if($act["0"]["TratamientoLepra"]=="18") echo "selected";?> >18 - No recibió tratamiento por negación del usuario</option>
						<option value="19" <?php if($act["0"]["TratamientoLepra"]=="19") echo "selected";?> >19 - No recibió tratamiento por que los datos de contacto del usuario no se encuentran actualizados</option>
						<option value="20" <?php if($act["0"]["TratamientoLepra"]=="20") echo "selected";?> >20 - No recibió tratamiento por otras razones</option>
						<option value="22" <?php if($act["0"]["TratamientoLepra"]=="22") echo "selected";?> >22 - Sin Dato</option>
					</select>
				</div>
			</div>

			<!-- 118. Fecha de Terminación Tratamiento para Leishmaniasis -->

			<div class="control-group">
				<label class="control-label	" for="FechaTerLeishmaniasisInput">118. Fecha de Terminación Tratamiento para Leishmaniasis</label>
				<div class="controls">
					<input class="input-medium" type="text" name="FechaTerLeishmaniasisInput" id="FechaTerLeishmaniasisInput" data-date-format="yyyy-mm-dd" value="<?php echo $act["0"]["FechaTerLeishmaniasisInput"]; ?>">
					<span class="help-inline">Formato AAAA-MM-DD</span>
				</div>
			</div>

			<div class="control-group">
				<label class="radio">
					<input type="radio" name="FechaTerLeishmaniasisRadio" id="FechaTerLeishmaniasisRadio1" value="1800-01-01">
				 	1800-01-01 - No Se Tiene el Dato
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTerLeishmaniasisRadio" id="FechaTerLeishmaniasisRadio2" value="1805-01-01">
				  	1805-01-01 - No se realiza por una tradición
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTerLeishmaniasisRadio" id="FechaTerLeishmaniasisRadio3" value="1810-01-01">
				  	1810-01-01 - No se realiza por una condición de salud
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTerLeishmaniasisRadio" id="FechaTerLeishmaniasisRadio4" value="1825-01-01">
				  	1825-01-01 - No se realiza por negación del usuario
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTerLeishmaniasisRadio" id="FechaTerLeishmaniasisRadio5" value="1830-01-01">
				  	1830-01-01 - No se realiza por tener datos de contacto del usuario no actualizados
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTerLeishmaniasisRadio" id="FechaTerLeishmaniasisRadio6" value="1835-01-01">
				  	1835-01-01 - No se realiza por otras razones
				</label>
				<label class="radio">
				  	<input type="radio" name="FechaTerLeishmaniasisRadio" id="FechaTerLeishmaniasisRadio7" value="1845-01-01">
				  	1845-01-01 - No Aplica
				</label>

			</div>
			
		</fieldset>

		<hr>

		<button type="submit" class="btn btn-primary btn-large btn-block">GRABAR FORMULARIO</button>


	</form>

</div>
