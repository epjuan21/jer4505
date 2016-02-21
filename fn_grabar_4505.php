<?php
require_once ("cl_clases.php");
$tra= new Trabajo();
$grabar=$tra->grabar_registro_4505 ();
header ("Location: index.php?menu=2")
?>