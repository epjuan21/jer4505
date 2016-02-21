<div class="span12">
		<h2>INGRESO DE DATOS</h2>
		<hr>

		<form id="form-res" class="form-horizontal"  method="post" action="fn_buscar_usuario.php">

			<!-- ENTIDAD -->

			<div class="control-group" id="Control-Entidad">
				<label class="control-label	" for="EntidadReporte">Entidad</label>
				<div class="controls">
					<select id="EntidadReporte" name="EntidadReporte">
						<option value="">...Seleccione Entidad</option>
						<option value="EPS016">COOMEVA</option> 
						<option value="CCF002">ALIANZA MEDELLIN</option>
						<option value="EPS013">SALUDCOOP</option>
						<option value="EPS003">CAFESALUD</option>
						<option value="EPS037">NUEVA EPS</option>
						<option value="EPS009">COMFENALCO</option>
						<option value="ESS024">COOSALUD</option>
						<option value="RES004">FMP</option>
						<option value="RES001">POLICIA</option>
						<option value="RES003">HOSPITAL MILITAR</option> 
						<option value="05368">VINCULADOS</option>
					</select>
					<span class="help-inline"></span>
				</div>
			</div>

			<!-- MES REPORTE -->

			<div class="control-group" id="Control-Mes">
				<label class="control-label" for="MesReporte">Mes Reporte</label>
				<div class="controls">
					<select id="MesReporte" name="MesReporte">
						<option value="">...Seleccione Mes</option>
						<option value="01-31">Enero</option>
						<option value="02-28">Febrero</option>
						<option value="03-31">Marzo</option>
						<option value="04-30">Abril</option>
						<option value="05-31">Mayo</option>
						<option value="06-30">Junio</option> 
						<option value="07-31">Julio</option>
						<option value="08-31">Agosto</option>
						<option value="09-30">Septiembre</option>
						<option value="10-31">Octubre</option>
						<option value="11-30">Noviembre</option>
						<option value="12-31">Diciembre</option>
					</select>
					<span class="help-inline"></span>
				</div>
			</div>

			<!-- AÑO REPORTE -->

			<div class="control-group" id="Control-Periodo">
				<label class="control-label" for="PeriodoReporte">Año Reporte</label>
				<div class="controls">
					<select id="PeriodoReporte" name="PeriodoReporte">
						<option value="">...Seleccione Año</option>
						<option value="2013">2013</option>
						<option value="2014">2014</option>
						<option value="2015">2015</option>
						<option value="2016">2016</option>
						<option value="2017">2017</option>
						<option value="2018">2018</option>
						<option value="2019">2019</option>
					</select>
					<span class="help-inline"></span>
				</div>
			</div>

			<!-- NUMERO DE IDENTIFICACION DEL USUARIO -->

			<div class="control-group" id="Control-User">
				<label class="control-label" for="NumeroIdUsuarioRes">Número de identificación del usuario</label>
				<div class="controls">
					<input class="input-medium" type="text" name="NumeroIdUsuarioRes" id="NumeroIdUsuarioRes">
					<span class='help-inline'></span>
				</div>
			</div>

				<?php
				if (isset($_GET["Error"]) and $_GET["Error"] == "1")
				{
				?>
					<div class="alert alert-error">
              			<button type="button" class="close" data-dismiss="alert">×</button>
              			<strong>Error</strong> El afiliado no existe en la base de datos o sus datos no concuerdan con BDUA.; Afiliado con valores en Nombres y/o Apellidos y/o Fecha de nacimiento diferentes a BDUA
           		 	</div>
				<?php
				}
				?>
			
			<input type="hidden" name="CodigoEPS" value="EPS013">
			<button type="submit" class="btn btn-large btn-block  btn-primary"">INGRESAR DATOS</button>

		</form>


</div>