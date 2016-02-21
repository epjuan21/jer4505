<?php
session_start();

class Trabajo
{
	private $dbh;		//Variable de Conexion
	private $menu;		//Variable Para Obtener el Menu
	private $menuid;	//Variable Para Obtener el Menu Por Id
	private $entidades;	//Variable para Obtener el Listado de las Entidades
	private $usuarios;
	private $log;
	private $reg;
	private $rped;
	private $cantidadMS;

	public function __construct()
	{

		$this->dbh=new PDO('mysql:host=localhost;dbname=jer4505', "root", "", array( PDO::MYSQL_ATTR_LOCAL_INFILE => 1,PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',));
		
		$this->menu=array();
		$this->listaInd=array();
	}

    public function set_names()
    {
        return $this->dbh->query("SET NAMES 'utf8'");    
    }

	public function obtener_menu ()
	{
		//self::set_names();
		$sql="SELECT id_menu, menu, html FROM menu";
		foreach ($this->dbh->query($sql) as $row)
		{
			$this->menu[]=$row;
		}

			return $this->menu;
			$this->dbh=null;
	}

	public function obtener_menu_por_id ()
	{
		self::set_names();
		if (isset($_GET["menu"]))
		{
			//var_dump($this->dbh->query);
			$sql="SELECT menu, html FROM menu WHERE id_menu=".$_GET["menu"];
			foreach ($this->dbh->query($sql) as $row)
			{
				$this->menuid[]=$row;
			}
				return $this->menuid;
				$this->dbh=null;
		}
	}


	public function logueo ()
	{

		
		if (empty($_POST["LoginUsuario"]) or empty($_POST["LoginClave"]) )
		{
			//echo "Formulario Vacio";
			header("Location: index.php");
		}
		else
		{
			//print_r($_POST);
			$sql="SELECT nombre_usuario, login, clave, id_perfil_usuario FROM usuarios WHERE login='".$_POST["LoginUsuario"]."' AND clave='".$_POST["LoginClave"]."'";
			//echo $sql;
			$stmt=$this->dbh->prepare($sql);
			$stmt->execute();
			$cantidad = $stmt->rowCount();
			if ($cantidad==0)
			{
				echo "Vacio";
				
			} 
			else
			{
				while ($row=$stmt->fetch())
				{
					$this->log[]=$row;

					
				}
				return $this->log;

			}


		}

	}

	public function lista_4505($FechaInicio, $FechaFin)
	{
		//echo $FechaFin;
		//echo $_POST["EntidadExp"];
		$sql="SELECT * FROM rped WHERE CodigoEPSoDLS ='".$_POST["EntidadReporte"]."' AND FechaInicialReporte >= '".$FechaInicio."' AND FechaFinalReporte <= '".$FechaFin."' ORDER BY ConsecutivoRegistro";
		foreach($this->dbh->query($sql) as $row)
		{
			$this->reg[]=$row;
		}
		return $this->reg;
		$this->dbh=null;
	}


	public function registros_por_eps($entidad,$FechaIn,$FechaFin)
	{
		self::set_names();
		$sql="SELECT CodigoEPSoDLS FROM rped WHERE CodigoEPSoDLS ='".$entidad."' AND FechaInicialReporte >= '".$FechaIn."' AND FechaFinalReporte <= '".$FechaFin."';";
		$stmt=$this->dbh->prepare($sql);
		$stmt->execute();
		$cantidadeps = $stmt->rowCount();

		$this->cantidad=$cantidadeps;
		return $this->cantidad;
	}

	public function get_num_rows_RPEDT () {
		$this->query = $this->dbh->prepare('SELECT * FROM rped');
		$this->query->execute();
		return $numRows = $this->query->rowCount();
	}

	public function get_num_rows_COOMEVA () {
		$this->query = $this->dbh->prepare("SELECT * FROM rped WHERE CodigoEPSoDLS='EPS016'");
		$this->query->execute();
		return $numRows = $this->query->rowCount();
	}

	public function get_num_rows_COOSALUD () {
		$this->query = $this->dbh->prepare("SELECT * FROM rped WHERE CodigoEPSoDLS='ESS024'");
		$this->query->execute();
		return $numRows = $this->query->rowCount();
	}

	public function get_num_rows_VINCULADOS () {
		$this->query = $this->dbh->prepare("SELECT * FROM rped WHERE CodigoEPSoDLS='05368'");
		$this->query->execute();
		return $numRows = $this->query->rowCount();
	}

	public function get_num_rows_NUEVA_EPS () {
		$this->query = $this->dbh->prepare("SELECT * FROM rped WHERE CodigoEPSoDLS='EPS037'");
		$this->query->execute();
		return $numRows = $this->query->rowCount();
	}

	public function get_num_rows_SALUDCOOP () {
		$this->query = $this->dbh->prepare("SELECT * FROM rped WHERE CodigoEPSoDLS='EPS013'");
		$this->query->execute();
		return $numRows = $this->query->rowCount();
	}

	public function get_num_rows_ALIANZA () {
		$this->query = $this->dbh->prepare("SELECT * FROM rped WHERE CodigoEPSoDLS='CCF002'");
		$this->query->execute();
		return $numRows = $this->query->rowCount();
	}

	public function get_num_rows_CAFESALUD () {
		$this->query = $this->dbh->prepare("SELECT * FROM rped WHERE CodigoEPSoDLS='EPS003'");
		$this->query->execute();
		return $numRows = $this->query->rowCount();
	}

	public function listar_rped_actualizar()
	{
		if(isset($_GET["U"]))
		{
			$sql="SELECT * FROM rped WHERE NumeroIdUsuario= ? ;";
			$stmt=$this->dbh->prepare($sql);
			if ($stmt->execute( array($_GET['U']) ))
			{
			while ($row = $stmt->fetch())
			{
				$this->rped[]=$row;
			}
			return $this->rped;
			$this->dbh=null;
			}
		}

	}

	public function buscar_rped ()
	{
		if(isset($_POST['NumeroIdUsuarioRes']))
		{
			//echo $_POST['NumeroIdUsuarioRes'];
			//$word = $_POST['NumeroIdUsuario'];
			$sql="SELECT NumeroIdUsuario FROM rped WHERE NumeroIdUsuario= ? ;";
			//echo $sql;
			$stmt=$this->dbh->prepare($sql);
			if ($stmt->execute( array($_POST['NumeroIdUsuarioRes']) ))
			{
			while ($row = $stmt->fetch())
			{
				$this->usuarios[]=$row;
			}
			return $this->usuarios;
			$this->dbh=null;
			}


			/*foreach ($this->dbh->query($sql) as $row) 
			{
				$this->usuarios[]=$row;
			}
				return $this->usuarios;
				$this->dbh=null;*/
		}

	}

	public function buscar_MaestroSubsidiado()
	{
		echo "Entrada a la Funcion buscar_MaestroSubsidiado<br>";
		$sql="SELECT CodigoEPS, TipoIdAfiliado, NumeroIdAfiliado, Apellido1, Apellido2, Nombre1, Nombre2, FechaNacimiento, Genero, EstadoAfiliado FROM  maestrosubsidiado WHERE TipoIdAfiliado='".$_POST["TipoDocumento"]."' AND NumeroIdAfiliado='".$_POST["NumeroIdUsuarioRes"]."' AND Apellido1 ='".$_POST["Ap1"]."' AND Apellido2 ='".$_POST["Ap2"]."' AND Nombre1 ='".$_POST["Nom1"]."' AND Nombre2 ='".$_POST["Nom2"]."' ";
		$stmt=$this->dbh->prepare($sql);
		//echo $sql;
		$stmt->execute();
		$cantidad = $stmt->rowCount();
		return $cantidad;

	}

	public function lista_entidades()
	{
		$sql="SELECT id_entidad, NombreEntidad FROM entidades";
		foreach($this->dbh->query($sql) as $row)
		{
			$this->entidades[]=$row;
		}
			return $this->entidades;
			$this->dbh=null;
	}

	public function grabar_registro_4505 ()
	{	

		self::set_names();
		$sqlr="SELECT CodigoEPSoDLS FROM rped WHERE CodigoEPSoDLS = ?;";
		$stmtr=$this->dbh->prepare($sqlr);
		$stmtr->execute(array($_POST["CodigoEPSoDLS"]));
		$cantidadeps = $stmtr->rowCount();
		$consecutivo = $cantidadeps + 1;
		$numeroregistros = $cantidadeps + 1;
		$_POST["NumeroRegistros"]=$numeroregistros;
		$_POST["ConsecutivoRegistro"]=$consecutivo;

		$sql="INSERT INTO rped VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		$stmt=$this->dbh->prepare($sql);

		$stmt->bindValue(1,$_POST["TipoRegistroControl"],PDO::PARAM_INT);
		$stmt->bindValue(2,$_POST["CodigoEPSoDLS"],PDO::PARAM_STR);
		$stmt->bindValue(3,$_POST["FechaInicialReporte"],PDO::PARAM_STR);
		$stmt->bindValue(4,$_POST["FechaFinalReporte"],PDO::PARAM_STR);
		$stmt->bindValue(5,$_POST["NumeroRegistros"],PDO::PARAM_INT);
		$stmt->bindValue(6,$_POST["TipoRegistroDetalle"],PDO::PARAM_INT);
		$stmt->bindValue(7,$_POST["ConsecutivoRegistro"],PDO::PARAM_INT);
		$stmt->bindValue(8,$_POST["CodigoHabilitacion"],PDO::PARAM_INT);
		$stmt->bindValue(9,$_POST["TipoIdUsuario"],PDO::PARAM_STR);
		$stmt->bindValue(10,$_POST["NumeroIdUsuario"],PDO::PARAM_INT);
		$stmt->bindValue(11,trim($_POST["Apellido1"]),PDO::PARAM_STR);
		$stmt->bindValue(12,trim($_POST["Apellido2"]),PDO::PARAM_STR);
		$stmt->bindValue(13,trim($_POST["Nombre1"]),PDO::PARAM_STR);
		$stmt->bindValue(14,trim($_POST["Nombre2"]),PDO::PARAM_STR);
		$stmt->bindValue(15,$_POST["FechaNacimiento"],PDO::PARAM_STR);
		$stmt->bindValue(16,$_POST["Sexo"],PDO::PARAM_STR);
		$stmt->bindValue(17,$_POST["PertenenciaEtnica"],PDO::PARAM_STR);
		$stmt->bindValue(18,$_POST["CodigoOcupacion"],PDO::PARAM_STR);
		$stmt->bindValue(19,$_POST["CodigoNivelEducativo"],PDO::PARAM_STR);
		$stmt->bindValue(20,$_POST["Gestacion"],PDO::PARAM_STR);
		$stmt->bindValue(21,$_POST["SifilisGestacional"],PDO::PARAM_STR);
		$stmt->bindValue(22,$_POST["HipertensionInducidaGestacion"],PDO::PARAM_STR);
		$stmt->bindValue(23,$_POST["HipotiroidismoCongenito"],PDO::PARAM_STR);
		$stmt->bindValue(24,$_POST["SintomaticoRespiratorio"],PDO::PARAM_STR);
		$stmt->bindValue(25,$_POST["Tuberculosis"],PDO::PARAM_STR);
		$stmt->bindValue(26,$_POST["Lepra"],PDO::PARAM_STR);
		$stmt->bindValue(27,$_POST["ObesidadDesnutricion"],PDO::PARAM_STR);
		$stmt->bindValue(28,$_POST["VictimaMaltrato"],PDO::PARAM_STR);
		$stmt->bindValue(29,$_POST["VictimaViolenciaSexual"],PDO::PARAM_STR);
		$stmt->bindValue(30,$_POST["InfeccionTrasmisionSexual"],PDO::PARAM_STR);
		$stmt->bindValue(31,$_POST["EnfermedadMental"],PDO::PARAM_STR);
		$stmt->bindValue(32,$_POST["CancerCervix"],PDO::PARAM_STR);
		$stmt->bindValue(33,$_POST["CancerSeno"],PDO::PARAM_STR);
		$stmt->bindValue(34,$_POST["FluorosisDental"],PDO::PARAM_STR);
		$stmt->bindValue(35,$_POST["FechaPeso"],PDO::PARAM_STR);
		$stmt->bindValue(36,$_POST["PesoKilogramos"],PDO::PARAM_STR);
		$stmt->bindValue(37,$_POST["FechaTalla"],PDO::PARAM_STR);
		$stmt->bindValue(38,str_replace(".", "", $_POST["TallaCentimetros"]),PDO::PARAM_STR);
		$stmt->bindValue(39,$_POST["FechaProbablePartoInput"],PDO::PARAM_STR);
		$stmt->bindValue(40,$_POST["EdadGestacional"],PDO::PARAM_STR);
		$stmt->bindValue(41,$_POST["BCG"],PDO::PARAM_STR);
		$stmt->bindValue(42,$_POST["HepatitisB"],PDO::PARAM_STR);
		$stmt->bindValue(43,$_POST["Pentavalente"],PDO::PARAM_STR);
		$stmt->bindValue(44,$_POST["Polio"],PDO::PARAM_STR);
		$stmt->bindValue(45,$_POST["DPT"],PDO::PARAM_STR);
		$stmt->bindValue(46,$_POST["Rotavirus"],PDO::PARAM_STR);
		$stmt->bindValue(47,$_POST["Neumococo"],PDO::PARAM_STR);
		$stmt->bindValue(48,$_POST["InfluenzaN"],PDO::PARAM_STR);
		$stmt->bindValue(49,$_POST["FiebreAmarillaN1"],PDO::PARAM_STR);
		$stmt->bindValue(50,$_POST["HepatitisA"],PDO::PARAM_STR);
		$stmt->bindValue(51,$_POST["TripleViralN"],PDO::PARAM_STR);
		$stmt->bindValue(52,$_POST["VPH"],PDO::PARAM_STR);
		$stmt->bindValue(53,$_POST["TdTtMEF"],PDO::PARAM_STR);
		$stmt->bindValue(54,$_POST["ControlPlacaBacteriana"],PDO::PARAM_STR);
		$stmt->bindValue(55,$_POST["FechaAtencionPartoInput"],PDO::PARAM_STR);
		$stmt->bindValue(56,$_POST["FechaSalidaPartoInput"],PDO::PARAM_STR);
		$stmt->bindValue(57,$_POST["FechaConsejeriaLactanciaInput"],PDO::PARAM_STR);
		$stmt->bindValue(58,$_POST["ControlRecienNacidoInput"],PDO::PARAM_STR);
		$stmt->bindValue(59,$_POST["PlanificacionFamiliarPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(60,$_POST["SuministroMetodoAnticonceptivo"],PDO::PARAM_STR);
		$stmt->bindValue(61,$_POST["FechaSuministroMetodoAnticonceptivoInput"],PDO::PARAM_STR);
		$stmt->bindValue(62,$_POST["ControlPrenatalPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(63,$_POST["ControlPrenatalInput"],PDO::PARAM_STR);
		$stmt->bindValue(64,$_POST["UltimoControlPrenatalInput"],PDO::PARAM_STR);
		$stmt->bindValue(65,$_POST["SuministroAcidoFolico"],PDO::PARAM_STR);
		$stmt->bindValue(66,$_POST["SuministroSulfatoFerroso"],PDO::PARAM_STR);
		$stmt->bindValue(67,$_POST["SuministroCarbonatoCalcio"],PDO::PARAM_STR);
		$stmt->bindValue(68,$_POST["ValoracionAgudezaVisualInput"],PDO::PARAM_STR);
		$stmt->bindValue(69,$_POST["ConsultaOftalmologiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(70,$_POST["FechaDiagnosticoDesnutricionInput"],PDO::PARAM_STR);
		$stmt->bindValue(71,$_POST["ConsultaMujerMenorVictimaInput"],PDO::PARAM_STR);
		$stmt->bindValue(72,$_POST["ConsultaVictimaViolenciaSexualInput"],PDO::PARAM_STR);
		$stmt->bindValue(73,$_POST["ConsultaNutricionInput"],PDO::PARAM_STR);
		$stmt->bindValue(74,$_POST["ConsultaPsicologiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(75,$_POST["ConsultaCyDPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(76,$_POST["SuministroSulfatoFerrosoMenor"],PDO::PARAM_STR);
		$stmt->bindValue(77,$_POST["SuministroVitaminaAMenor"],PDO::PARAM_STR);
		$stmt->bindValue(78,$_POST["ConsultaJovenPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(79,$_POST["ConsultaAdultoPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(80,$_POST["PreservativosITSInput"],PDO::PARAM_STR);
		$stmt->bindValue(81,$_POST["AsesoriaPreElisaInput"],PDO::PARAM_STR);
		$stmt->bindValue(82,$_POST["AsesoriaPostElisaInput"],PDO::PARAM_STR);
		$stmt->bindValue(83,$_POST["PacienteEnfermedadMental"],PDO::PARAM_STR);
		$stmt->bindValue(84,$_POST["FechaAntigenoHepatitisBGestantesInput"],PDO::PARAM_STR);
		$stmt->bindValue(85,$_POST["ResultadoAntigenoHepatitisBGestantes"],PDO::PARAM_STR);
		$stmt->bindValue(86,$_POST["FechaSerologiaSifilisInput"],PDO::PARAM_STR);
		$stmt->bindValue(87,$_POST["ResultadoSerologiaSifilis"],PDO::PARAM_STR);
		$stmt->bindValue(88,$_POST["FechaTomaElisaVIHInput"],PDO::PARAM_STR);
		$stmt->bindValue(89,$_POST["ResultadoElisaVIH"],PDO::PARAM_STR);
		$stmt->bindValue(90,$_POST["FechaTSHNeonatalInput"],PDO::PARAM_STR);
		$stmt->bindValue(91,$_POST["ResultadoTSHNeonatal"],PDO::PARAM_STR);
		$stmt->bindValue(92,$_POST["TamizajeCencerCU"],PDO::PARAM_STR);
		$stmt->bindValue(93,$_POST["FechaCitologiaCUInput"],PDO::PARAM_STR);
		$stmt->bindValue(94,$_POST["CitologiaCUResultados"],PDO::PARAM_STR);
		$stmt->bindValue(95,$_POST["CalidadMuestraCitologia"],PDO::PARAM_STR);
		$stmt->bindValue(96,$_POST["CodigoHabilitacionIPSTomaMuestra"],PDO::PARAM_STR);
		$stmt->bindValue(97,$_POST["FechaColposcopiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(98,$_POST["CodigoHabilitacionTomaColposcopia"],PDO::PARAM_STR);
		$stmt->bindValue(99,$_POST["FechaBiopsiaCervicalInput"],PDO::PARAM_STR);
		$stmt->bindValue(100,$_POST["ResultadoBiopsiaCervical"],PDO::PARAM_STR);
		$stmt->bindValue(101,$_POST["CodigoHabilitacionTomaBiopsia"],PDO::PARAM_STR);
		$stmt->bindValue(102,$_POST["FechaMamografiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(103,$_POST["ResultadoMamografia"],PDO::PARAM_STR);
		$stmt->bindValue(104,$_POST["CodigoHabilitacionTomaMamografia"],PDO::PARAM_STR);
		$stmt->bindValue(105,$_POST["FechaBiopsiaSenoInput"],PDO::PARAM_STR);
		$stmt->bindValue(106,$_POST["FechaResultadoBiopsiaSeno"],PDO::PARAM_STR);
		$stmt->bindValue(107,$_POST["ResultadoBiopsiaSeno"],PDO::PARAM_STR);
		$stmt->bindValue(108,$_POST["CodigoHabilitacionBiopsiaSeno"],PDO::PARAM_STR);
		$stmt->bindValue(109,$_POST["FechaTomaHemoglobinaInput"],PDO::PARAM_STR);
		$stmt->bindValue(110,$_POST["ResultadoHemoglobina"],PDO::PARAM_STR);
		$stmt->bindValue(111,$_POST["FechaTomaGlisemiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(112,$_POST["FechaTomaCreatininaInput"],PDO::PARAM_STR);
		$stmt->bindValue(113,$_POST["ResultadoCreatinina"],PDO::PARAM_STR);
		$stmt->bindValue(114,$_POST["FechaHemoglobinaGlicosiladaInput"],PDO::PARAM_STR);
		$stmt->bindValue(115,$_POST["ResultadoHemoglobinaGlicosilada"],PDO::PARAM_STR);
		$stmt->bindValue(116,$_POST["FechaTomaMicroalbuminuriaInput"],PDO::PARAM_STR);
		$stmt->bindValue(117,$_POST["FechaTomaHDLInput"],PDO::PARAM_STR);
		$stmt->bindValue(118,$_POST["FechaTomaBaciloscopiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(119,$_POST["ResultadoBaciloscopia"],PDO::PARAM_STR);
		$stmt->bindValue(120,$_POST["TratamientoHipotiroidismoCongenito"],PDO::PARAM_STR);
		$stmt->bindValue(121,$_POST["TratamientoSifilisGestacional"],PDO::PARAM_STR);
		$stmt->bindValue(122,$_POST["TratamientoSifilisCongenita"],PDO::PARAM_STR);
		$stmt->bindValue(123,$_POST["TratamientoLepra"],PDO::PARAM_STR);
		$stmt->bindValue(124,$_POST["FechaTerLeishmaniasisInput"],PDO::PARAM_STR);
		$stmt->execute();
		$this->dbh=null;
	}

	public function actualizar_registro_4505 ()
	{
		$sql="UPDATE rped SET
			CodigoEPSoDLS=?,
			TipoIdUsuario=?,
			NumeroIdUsuario=?,
			Apellido1=?,
			Apellido2=?,
			Nombre1=?,
			Nombre2=?,
			FechaNacimiento=?,
			Sexo=?,
			PertenenciaEtnica=?,
			CodigoOcupacion=?,
			CodigoNivelEducativo=?,
			Gestacion=?,
			SifilisGestacional=?,
			HipertensionInducidaGestacion=?,
			HipotiroidismoCongenito=?,
			SintomaticoRespiratorio=?,
			Tuberculosis=?,
			Lepra=?,
			ObesidadDesnutricion=?,
			VictimaMaltrato=?,
			VictimaViolenciaSexual=?,
			InfeccionTrasmisionSexual=?,
			EnfermedadMental=?,
			CancerCervix=?,
			CancerSeno=?,
			FluorosisDental=?,
			FechaPeso=?,						-- Estar Pendiente
			PesoKilogramos=?,
			FechaTalla=?,						-- Estar Pendiente
			TallaCentimetros=?,
			FechaProbableParto=?,
			EdadGestacional=?,
			BCG=?,
			HepatitisB=?,
			Pentavalente=?,
			Polio=?,
			DPT=?,
			Rotavirus=?,
			Neumococo=?,
			InfluenzaN=?,
			FiebreAmarillaN1=?,
			HepatitisA=?,
			TripleViralN=?,
			VPH=?,
			TdTtMEF=?,
			ControlPlacaBacteriana=?,
			FechaAtencionParto=?,
			FechaSalidaParto=?,
			FechaConsejeriaLactanciaInput=?,
			ControlRecienNacidoInput=?,
			PlanificacionFamiliarPrimeraVezInput=?,
			SuministroMetodoAnticonceptivo=?,
			FechaSuministroMetodoAnticonceptivo=?,
			ControlPrenatalPrimeraVezInput=?,
			ControlPrenatal=?,
			UltimoControlPrenatal=?,
			SuministroAcidoFolico=?,
			SuministroSulfatoFerroso=?,
			SuministroCarbonatoCalcio=?,
			ValoracionAgudezaVisualInput=?,
			ConsultaOftalmologiaInput=?,
			FechaDiagnosticoDesnutricion=?,
			ConsultaMujerMenorVictimaInput=?,
			ConsultaVictimaViolenciaSexualInput=?,
			ConsultaNutricionInput=?,
			ConsultaPsicologiaInput=?,
			ConsultaCyDPrimeraVezInput=?,
			SuministroSulfatoFerrosoMenor=?,
			SuministroVitaminaAMenor=?,
			ConsultaJovenPrimeraVezInput=?,
			ConsultaAdultoPrimeraVezInput=?,
			PreservativosITSInput=?,
			AsesoriaPreElisaInput=?,
			AsesoriaPostElisaInput=?,
			PacienteEnfermedadMental=?,
			FechaAntigenoHepatitisBGestantesInput=?,
			ResultadoAntigenoHepatitisBGestantes=?,
			FechaSerologiaSifilisInput=?,
			ResultadoSerologiaSifilis=?,
			FechaTomaElisaVIHInput=?,
			ResultadoElisaVIH=?,
			FechaTSHNeonatalInput=?,
			ResultadoTSHNeonatal=?,
			TamizajeCencerCU=?,
			FechaCitologiaCUInput=?,
			CitologiaCUResultados=?,
			CalidadMuestraCitologia=?,
			CodigoHabilitacionIPSTomaMuestra=?,
			FechaColposcopiaInput=?,
			CodigoHabilitacionTomaColposcopia=?,
			FechaBiopsiaCervicalInput=?,
			ResultadoBiopsiaCervical=?,
			CodigoHabilitacionTomaBiopsia=?,
			FechaMamografiaInput=?,
			ResultadoMamografia=?,
			CodigoHabilitacionTomaMamografia=?,
			FechaBiopsiaSenoInput=?,
			FechaResultadoBiopsiaSeno=?,
			ResultadoBiopsiaSeno=?,
			CodigoHabilitacionBiopsiaSeno=?,
			FechaTomaHemoglobinaInput=?,
			ResultadoHemoglobina=?,
			FechaTomaGlisemiaInput=?,
			FechaTomaCreatininaInput=?,
			ResultadoCreatinina=?,
			FechaHemoglobinaGlicosiladaInput=?,
			ResultadoHemoglobinaGlicosilada=?,
			FechaTomaMicroalbuminuriaInput=?,
			FechaTomaHDLInput=?,
			FechaTomaBaciloscopiaInput=?,
			ResultadoBaciloscopia=?,
			TratamientoHipotiroidismoCongenito=?,
			TratamientoSifilisGestacional=?,
			TratamientoSifilisCongenita=?,
			TratamientoLepra=?,
			FechaTerLeishmaniasisInput=?
			
			WHERE
			NumeroIdUsuario=?";

		$stmt=$this->dbh->prepare($sql);

		$stmt->bindValue(1,$_POST["CodigoEPSoDLS"], PDO::PARAM_STR);
		$stmt->bindValue(2,$_POST["TipoIdUsuario"],PDO::PARAM_STR);
		$stmt->bindValue(3,$_POST["NumeroIdUsuario"],PDO::PARAM_STR);
		$stmt->bindValue(4,$_POST["Apellido1"], PDO::PARAM_STR);
		$stmt->bindValue(5,$_POST["Apellido2"],PDO::PARAM_STR);
		$stmt->bindValue(6,$_POST["Nombre1"],PDO::PARAM_STR);
		$stmt->bindValue(7,$_POST["Nombre2"],PDO::PARAM_STR);
		$stmt->bindValue(8,$_POST["FechaNacimiento"],PDO::PARAM_STR);
		$stmt->bindValue(9,$_POST["Sexo"],PDO::PARAM_STR);
		$stmt->bindValue(10,$_POST["PertenenciaEtnica"],PDO::PARAM_STR);
		$stmt->bindValue(11,$_POST["CodigoOcupacion"],PDO::PARAM_STR);
		$stmt->bindValue(12,$_POST["CodigoNivelEducativo"],PDO::PARAM_STR);
		$stmt->bindValue(13,$_POST["Gestacion"],PDO::PARAM_STR);
		$stmt->bindValue(14,$_POST["SifilisGestacional"],PDO::PARAM_STR);
		$stmt->bindValue(15,$_POST["HipertensionInducidaGestacion"],PDO::PARAM_STR);
		$stmt->bindValue(16,$_POST["HipotiroidismoCongenito"],PDO::PARAM_STR);
		$stmt->bindValue(17,$_POST["SintomaticoRespiratorio"],PDO::PARAM_STR);
		$stmt->bindValue(18,$_POST["Tuberculosis"],PDO::PARAM_STR);
		$stmt->bindValue(19,$_POST["Lepra"],PDO::PARAM_STR);
		$stmt->bindValue(20,$_POST["ObesidadDesnutricion"],PDO::PARAM_STR);
		$stmt->bindValue(21,$_POST["VictimaMaltrato"],PDO::PARAM_STR);
		$stmt->bindValue(22,$_POST["VictimaViolenciaSexual"],PDO::PARAM_STR);
		$stmt->bindValue(23,$_POST["InfeccionTrasmisionSexual"],PDO::PARAM_STR);
		$stmt->bindValue(24,$_POST["EnfermedadMental"],PDO::PARAM_STR);
		$stmt->bindValue(25,$_POST["CancerCervix"],PDO::PARAM_STR);
		$stmt->bindValue(26,$_POST["CancerSeno"],PDO::PARAM_STR);
		$stmt->bindValue(27,$_POST["FluorosisDental"],PDO::PARAM_STR);
		$stmt->bindValue(28,$_POST["FechaPeso"],PDO::PARAM_STR); 							// Estar Pendiente
		$stmt->bindValue(29,$_POST["PesoKilogramos"],PDO::PARAM_STR);
		$stmt->bindValue(30,$_POST["FechaTalla"],PDO::PARAM_STR);							// Estar Pendiente
		$stmt->bindValue(31,$_POST["TallaCentimetros"],PDO::PARAM_STR);
		$stmt->bindValue(32,$_POST["FechaProbablePartoInput"],PDO::PARAM_STR);
		$stmt->bindValue(33,$_POST["EdadGestacional"],PDO::PARAM_STR);
		$stmt->bindValue(34,$_POST["BCG"],PDO::PARAM_STR);
		$stmt->bindValue(35,$_POST["HepatitisB"],PDO::PARAM_STR);
		$stmt->bindValue(36,$_POST["Pentavalente"],PDO::PARAM_STR);
		$stmt->bindValue(37,$_POST["Polio"],PDO::PARAM_STR);
		$stmt->bindValue(38,$_POST["DPT"],PDO::PARAM_STR);
		$stmt->bindValue(39,$_POST["Rotavirus"],PDO::PARAM_STR);
		$stmt->bindValue(40,$_POST["Neumococo"],PDO::PARAM_STR);
		$stmt->bindValue(41,$_POST["InfluenzaN"],PDO::PARAM_STR);
		$stmt->bindValue(42,$_POST["FiebreAmarillaN1"],PDO::PARAM_STR);
		$stmt->bindValue(43,$_POST["HepatitisA"],PDO::PARAM_STR);
		$stmt->bindValue(44,$_POST["TripleViralN"],PDO::PARAM_STR);
		$stmt->bindValue(45,$_POST["VPH"],PDO::PARAM_STR);
		$stmt->bindValue(46,$_POST["TdTtMEF"],PDO::PARAM_STR);
		$stmt->bindValue(47,$_POST["ControlPlacaBacteriana"],PDO::PARAM_STR);
		$stmt->bindValue(48,$_POST["FechaAtencionPartoInput"],PDO::PARAM_STR);
		$stmt->bindValue(49,$_POST["FechaSalidaPartoInput"],PDO::PARAM_STR);
		$stmt->bindValue(50,$_POST["FechaConsejeriaLactanciaInput"],PDO::PARAM_STR);
		$stmt->bindValue(51,$_POST["ControlRecienNacidoInput"],PDO::PARAM_STR);
		$stmt->bindValue(52,$_POST["PlanificacionFamiliarPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(53,$_POST["SuministroMetodoAnticonceptivo"],PDO::PARAM_STR);
		$stmt->bindValue(54,$_POST["FechaSuministroMetodoAnticonceptivoInput"],PDO::PARAM_STR);
		$stmt->bindValue(55,$_POST["ControlPrenatalPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(56,$_POST["ControlPrenatalInput"],PDO::PARAM_STR);
		$stmt->bindValue(57,$_POST["UltimoControlPrenatalInput"],PDO::PARAM_STR);
		$stmt->bindValue(58,$_POST["SuministroAcidoFolico"],PDO::PARAM_STR);
		$stmt->bindValue(59,$_POST["SuministroSulfatoFerroso"],PDO::PARAM_STR);
		$stmt->bindValue(60,$_POST["SuministroCarbonatoCalcio"],PDO::PARAM_STR);
		$stmt->bindValue(61,$_POST["ValoracionAgudezaVisualInput"],PDO::PARAM_STR);
		$stmt->bindValue(62,$_POST["ConsultaOftalmologiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(63,$_POST["FechaDiagnosticoDesnutricionInput"],PDO::PARAM_STR);
		$stmt->bindValue(64,$_POST["ConsultaMujerMenorVictimaInput"],PDO::PARAM_STR);
		$stmt->bindValue(65,$_POST["ConsultaVictimaViolenciaSexualInput"],PDO::PARAM_STR);
		$stmt->bindValue(66,$_POST["ConsultaNutricionInput"],PDO::PARAM_STR);
		$stmt->bindValue(67,$_POST["ConsultaPsicologiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(68,$_POST["ConsultaCyDPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(69,$_POST["SuministroSulfatoFerrosoMenor"],PDO::PARAM_STR);
		$stmt->bindValue(70,$_POST["SuministroVitaminaAMenor"],PDO::PARAM_STR);
		$stmt->bindValue(71,$_POST["ConsultaJovenPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(72,$_POST["ConsultaAdultoPrimeraVezInput"],PDO::PARAM_STR);
		$stmt->bindValue(73,$_POST["PreservativosITSInput"],PDO::PARAM_STR);
		$stmt->bindValue(74,$_POST["AsesoriaPreElisaInput"],PDO::PARAM_STR);
		$stmt->bindValue(75,$_POST["AsesoriaPostElisaInput"],PDO::PARAM_STR);
		$stmt->bindValue(76,$_POST["PacienteEnfermedadMental"],PDO::PARAM_STR);
		$stmt->bindValue(77,$_POST["FechaAntigenoHepatitisBGestantesInput"],PDO::PARAM_STR);
		$stmt->bindValue(78,$_POST["ResultadoAntigenoHepatitisBGestantes"],PDO::PARAM_STR);
		$stmt->bindValue(79,$_POST["FechaSerologiaSifilisInput"],PDO::PARAM_STR);
		$stmt->bindValue(80,$_POST["ResultadoSerologiaSifilis"],PDO::PARAM_STR);
		$stmt->bindValue(81,$_POST["FechaTomaElisaVIHInput"],PDO::PARAM_STR);
		$stmt->bindValue(82,$_POST["ResultadoElisaVIH"],PDO::PARAM_STR);
		$stmt->bindValue(83,$_POST["FechaTSHNeonatalInput"],PDO::PARAM_STR);
		$stmt->bindValue(84,$_POST["ResultadoTSHNeonatal"],PDO::PARAM_STR);
		$stmt->bindValue(85,$_POST["TamizajeCencerCU"],PDO::PARAM_STR);
		$stmt->bindValue(86,$_POST["FechaCitologiaCUInput"],PDO::PARAM_STR);
		$stmt->bindValue(87,$_POST["CitologiaCUResultados"],PDO::PARAM_STR);
		$stmt->bindValue(88,$_POST["CalidadMuestraCitologia"],PDO::PARAM_STR);
		$stmt->bindValue(89,$_POST["CodigoHabilitacionIPSTomaMuestra"],PDO::PARAM_STR);
		$stmt->bindValue(90,$_POST["FechaColposcopiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(91,$_POST["CodigoHabilitacionTomaColposcopia"],PDO::PARAM_STR);
		$stmt->bindValue(92,$_POST["FechaBiopsiaCervicalInput"],PDO::PARAM_STR);
		$stmt->bindValue(93,$_POST["ResultadoBiopsiaCervical"],PDO::PARAM_STR);
		$stmt->bindValue(94,$_POST["CodigoHabilitacionTomaBiopsia"],PDO::PARAM_STR);
		$stmt->bindValue(95,$_POST["FechaMamografiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(96,$_POST["ResultadoMamografia"],PDO::PARAM_STR);
		$stmt->bindValue(97,$_POST["CodigoHabilitacionTomaMamografia"],PDO::PARAM_STR);
		$stmt->bindValue(98,$_POST["FechaBiopsiaSenoInput"],PDO::PARAM_STR);
		$stmt->bindValue(99,$_POST["FechaResultadoBiopsiaSeno"],PDO::PARAM_STR);
		$stmt->bindValue(100,$_POST["ResultadoBiopsiaSeno"],PDO::PARAM_STR);
		$stmt->bindValue(101,$_POST["CodigoHabilitacionBiopsiaSeno"],PDO::PARAM_STR);
		$stmt->bindValue(102,$_POST["FechaTomaHemoglobinaInput"],PDO::PARAM_STR);
		$stmt->bindValue(103,$_POST["ResultadoHemoglobina"],PDO::PARAM_STR);
		$stmt->bindValue(104,$_POST["FechaTomaGlisemiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(105,$_POST["FechaTomaCreatininaInput"],PDO::PARAM_STR);
		$stmt->bindValue(106,$_POST["ResultadoCreatinina"],PDO::PARAM_STR);
		$stmt->bindValue(107,$_POST["FechaHemoglobinaGlicosiladaInput"],PDO::PARAM_STR);
		$stmt->bindValue(108,$_POST["ResultadoHemoglobinaGlicosilada"],PDO::PARAM_STR);
		$stmt->bindValue(109,$_POST["FechaTomaMicroalbuminuriaInput"],PDO::PARAM_STR);
		$stmt->bindValue(110,$_POST["FechaTomaHDLInput"],PDO::PARAM_STR);
		$stmt->bindValue(111,$_POST["FechaTomaBaciloscopiaInput"],PDO::PARAM_STR);
		$stmt->bindValue(112,$_POST["ResultadoBaciloscopia"],PDO::PARAM_STR);
		$stmt->bindValue(113,$_POST["TratamientoHipotiroidismoCongenito"],PDO::PARAM_STR);
		$stmt->bindValue(114,$_POST["TratamientoSifilisGestacional"],PDO::PARAM_STR);
		$stmt->bindValue(115,$_POST["TratamientoSifilisCongenita"],PDO::PARAM_STR);
		$stmt->bindValue(116,$_POST["TratamientoLepra"],PDO::PARAM_STR);
		$stmt->bindValue(117,$_POST["FechaTerLeishmaniasisInput"],PDO::PARAM_STR);

		$stmt->bindValue(118,$_POST["NumeroIdUsuario"], PDO::PARAM_STR);
 
		$stmt->execute();
	}
}
?>
