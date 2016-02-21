<?php
require_once ("cl_clases.php");
$tra = new Trabajo();

$Registros=$tra->get_num_rows_RPEDT();
$Coomeva = $tra->get_num_rows_COOMEVA();
$Coosalud = $tra->get_num_rows_COOSALUD();
$Vinculados = $tra->get_num_rows_VINCULADOS();
$NuevaEPS = $tra->get_num_rows_NUEVA_EPS();
$Saludcoop = $tra->get_num_rows_SALUDCOOP();
$Alianza = $tra->get_num_rows_ALIANZA();
$cafesalud = $tra->get_num_rows_CAFESALUD();
?>
<div class="span12">
	<h3>Total Registros en La Base de Datos:  <?php echo $Registros;?></h3>

</div>
	
<div class="span4">

	<table class="table table-striped table-bordered table-condensed">

		<tr>
			<th>Entidad</th>	
			<th>Número de Registros</th>
		</tr>

		<tr>
			<td>COOMEVA</td>
			<td><?php echo $Coomeva;?></td>
		</tr>

		<tr>
			<td>COOSALUD</td>
			<td><?php echo $Coosalud;?></td>
		</tr>

		<tr>
			<td>VINCULADOS</td>
			<td><?php echo $Vinculados;?></td>
		</tr>

		<tr>
			<td>NUEVA EPS</td>
			<td><?php echo $NuevaEPS;?></td>
		</tr>

		<tr>
			<td>SALUDCOOP</td>
			<td><?php echo $Saludcoop;?></td>
		</tr>

		<tr>
			<td>CAFESALUD</td>
			<td><?php echo $cafesalud;?></td>
		</tr>

		<tr>
			<td>ALIANZA</td>
			<td><?php echo $Alianza;?></td>
		</tr>

	</table>
</div>