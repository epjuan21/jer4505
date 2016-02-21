<h2>EXPORTACIÓN DE DATOS</h2>
		<hr>


	<form id="form-export" class="form-horizontal"  method="post" action="fn_exportar_4505.php">

			<div class="control-group" id="Control-Entidad-Exp">
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

			<div class="control-group" id="Control-Periodo-Exp">
				<label class="control-label" for="MesInicial">Mes Incial</label>
				<div class="controls">
					<select id="MesInicial" name="MesInicial">
						<option value="">...Seleccione Mes Inicial</option>
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

			<div class="control-group" id="Control-Periodo-Exp">
				<label class="control-label" for="MesFinal">Mes Final</label>
				<div class="controls">
					<select id="MesFinal" name="MesFinal">
						<option value="">...Seleccione Mes Final</option>
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

			<div class="control-group" id="Control-Periodo-Exp">
				<label class="control-label" for="PeriodoInicial">Año Inicial</label>
				<div class="controls">
					<select id="PeriodoInicial" name="PeriodoInicial">
						<option value="">...Seleccione Año Inicial</option>
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

			<div class="control-group" id="Control-Periodo-Exp">
				<label class="control-label" for="PeriodoFinal">Año Final</label>
				<div class="controls">
					<select id="PeriodoFinal" name="PeriodoFinal">
						<option value="">...Seleccione Año Final</option>
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


			<button type="submit" class="btn btn-large btn-block btn-primary">EXPORTAR</button>

		</form>

<!-- 		<hr>

	<h2>CARGAR MAESTRO SUBSIDIADO</h2>

	<hr>

	<form action="fn_subirMaestroSubsidiado.php" method="post" enctype="multipart/form-data">
	        <input type="file" name="archivo" id="archivo"></input>
            <button type="submit" class="btn btn-primary">Subir Archivo</button>
	</form> -->