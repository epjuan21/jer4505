<?php
require_once ("cl_clases.php");
$tra= new Trabajo();
$usuarios=$tra->buscar_rped ();
$registroseps=$tra->registros_por_eps();
$EntidadReporte = $_POST['EntidadReporte'];

if($usuarios)
{
	//echo "Usuario Encontrado - Ira al Formulario de Actualizacion";
	$MesReporte = $_POST['MesReporte'];
	$PerdiodReporte = $_POST['PeriodoReporte'];
	$IdUsuario = $_POST["NumeroIdUsuarioRes"];
	header ("Location: index.php?menu=4&U=$IdUsuario&M=$MesReporte&P=$PerdiodReporte"); // Formulario de Actualizacion de Datos pg_formulario_4505_actualizacion.php
}

else 

{
	//echo "Usuario No Encontrado - Ira al Formulario de Ingreso";
	$IdUsuario = $_POST["NumeroIdUsuarioRes"];
	$MesReporte = $_POST['MesReporte'];
	$PerdiodReporte = $_POST['PeriodoReporte'];
	$EntidadReporte = $_POST['EntidadReporte'];
	$consecutivo = $registroseps +1;
	$registroseps=$registroseps +1;
	//echo $IdUsuario;
	//echo $registroseps;
	//echo $_POST['EntidadReporte'];
	header ("Location: index.php?menu=3&U=$IdUsuario&EPS=$EntidadReporte&Periodo=$PerdiodReporte&Mes=$MesReporte&NumReg=$registroseps&Cons=$consecutivo"); // Formulario de Ingreso de Datos
}

?>