<?php
error_reporting(E_ALL ^ E_NOTICE);
require_once ("cl_clases.php");
$tra= new Trabajo();
$menu=$tra->obtener_menu();
$menuid=$tra->obtener_menu_por_id();
?>
<!DOCTYPE HTML>
<html lang="es">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="css/estilos.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap-responsive.css">
	<link rel="stylesheet" type="text/css" href="css/datepicker.css">
<script src="js/jquery-1.9.1.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.validate.js"></script>
<script src="js/funciones.js"></script>
<script src="js/validaciones.js"></script>

	<title>Resolución 4505 - ESE Hospital San Rafael de Jericó</title>
</head>
<body>

<!-- Barra Navegacion Encabezado -->

		<div class="navbar navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a href="index.php" class="brand"></a>
					<div class="nav-collapse">
						<ul class="nav">
							<li><a href="index.php">Inicio</a></li> 
							<li class="dropdown">
								<a class="dropdown-toggle" data-toggle="dropdown" href="">
									4505
									<b class="caret"></b>
								</a>
								<ul class="dropdown-menu">
									<li><a href="?menu=<?php echo $menu["1"]["id_menu"];?>">Ingresar Datos</a></li>
									<li> <a href="?menu=<?php echo $menu["4"]["id_menu"];?>">Exportar 4505</a> </li>
								</ul>
							</li>
							<li><a href="?menu=6">Parametros</a></li>
						</ul>

						<?php
						/*
						if (!$_SESSION["sesion_usuario"] and !$_SESSION["sesion_perfil"])
						{
						*/
						?>
						<!--
							<a href="#myModal" class="btn btn-primary pull-right" data-toggle="modal"><i class="icon-user icon-white"></i> Ingresar</a>
						-->
						<?php
						/*
						} else 
						{
						*/
						?>
						<!--
							<a href="fn_logout.php" class="btn btn-danger pull-right"><i class="icon-off icon-white"></i> Salir</a>
						-->
						<?php
						/*
						}
						*/
						?>

					</div>
				</div>
			</div>
		</div>

<!-- Ventana Modal Formulario Ingreso -->

<div id="myModal" class="modal hide fade">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>
		<h3>Ingreso de Usuarios</h3>
	</div>
	<div class="modal-body">
		
		<form action="fn_logueo.php" method="post" class="form-horizontal" id="form-ingreso" name="form-ingreso">
			<div class="control-group">
				<label class="control-label" for="LoginUsuario">Usuario</label>
				<div class="controls">
					<input type="text" id="LoginUsuario" name="LoginUsuario" placeholder="Usuario">
				</div>
			</div>

			<div class="control-group">
				<label class="control-label" for="LoginClave">Clave</label>
				<div class="controls">
					<input type="password" id="LoginClave" name="LoginClave" placeholder="Clave">
				</div>
			</div>

			<div class="control-group">
				<div class="controls">
					<button type="submit" class="btn btn-primary">Ingresar</button>
					<a href="" data-dismiss="modal" class="btn">Salir</a>

				</div>

			</div>

		</form>

	</div>

</div>

<!-- Encabezado -->

<div class="container-fluid">
	<div class="row-fluid">
		<div class="span3">
			<div class="container-fluid">
				<a href="index.php" class="brand"><img src="img/Logo.jpg" alt="Hospital San Rafale de Jericó - Inicio"></a>
			</div>
		</div>
		
		<div class="span9">

			<div class="container-fluid">
		
			<div class="well">
				<h1>
				<?php
				if (!empty($_GET["menu"]))
				{
					for ($i=0;$i<sizeof($menuid);$i++)
					{
						echo $menuid["$i"]["menu"];
					}
				}
				else
				{
					echo "Inicio";
				}

				?>	
				</h1>
			</div>
			
			</div>
		</div>
	</div>
</div>

<hr>

<!-- Contenido -->

<div class="container">
	<div class="row">

		<div class="span12">

			<div class="row">

				<?php

					if (!empty($_GET["menu"]))
					{
						for ($i=0;$i<sizeof($menuid);$i++)
						{
						include ($menuid["$i"]["html"].".php");
						}
					}
					else 
					{
						include ("inicio.php");
					}
				
				?>

			</div>

		</div>

	</div>

</div>


<!-- Pie de Página -->

<!-- Le Javascript -->

<script src="js/jquery-ui-1.9.2.custom.js"></script>
<script src="js/bootstrap.js"></script>
<script src="js/bootstrap-transition.js"></script>
<script src="js/bootstrap-carousel.js"></script>
<script src="js/bootstrap-dropdown.js" ></script>


</body>
</html>