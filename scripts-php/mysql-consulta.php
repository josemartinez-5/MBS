<?php

include 'mysql.php';
$mysql = new mysql();

$paciente_nombre = "";
$fecha_1consulta = "";
$paciente_tel = "";
$paciente_tel_tipo = "";
$paciente_email = "";
$paciente_direccion = "";
$paciente_fecha_nac = "";
$paciente_edad = "";
$paciente_hijos_status = "";
$paciente_ocupacion = "";
$paciente_nombre_comun = "";
$APP_TX = "";
$HEA = "";
$AHF = "Artritis\nCáncer\nCardiopatías\nColesterol/triglicéridos\nDiabetes\nHTA\nEpilepsia\nMalformaciones\nObesidad\nTrastornos mentales\nToxicomanías\nITS\nTuberculosis\nOtros\nFallecimientos, edad y causa";
$APNP = "Ejercicio\nGrupo Sanguíneo\nHospitalizado\nAdicciones: tabaco, alcohol, café\nMétodo anticonceptivo\nComidas al día\nConvivencia con animales\nDieta diaria\nInmunizaciones recientes";
$APP = "Estudios de laboratorio\nTransfusiones de sangre\nEnfermedades actuales\nAlergias\nAsma\nArtritis\nCáncer\nHepátitis\nColesterol/triglícéridos\nDiabetes\nHTA\nMalformaciones\nTrastornos";
$AGO = "Menarca\nMétodo anticonceptivo\nFecha última menstruación\nPartos (césarea, natural, abortos)\nITS\nInfertilidad\nEstudio Papanicolau";
$num_consulta = 1;
if(isset($_POST['num_consulta'])){
	$$num_consulta = $_POST['num_consulta'];
}
if(isset($_POST['buscar_paciente'])){
	if(strlen($_POST['paciente_nombre']) && strlen($_POST['fecha_1consulta'])){
		$paciente_nombre = $_POST['paciente_nombre'];
		$fecha_1consulta = $_POST['fecha_1consulta'];
		$sentencia="SELECT `paciente`.`paciente_nombre`,
						`paciente`.`fecha_1consulta`,
						`paciente`.`paciente_tel`,
						`paciente`.`paciente_tel_tipo`,
						`paciente`.`paciente_email`,
						`paciente`.`paciente_direccion`,
						`paciente`.`paciente_fecha_nac`,
						`paciente`.`paciente_edad`,
						`paciente`.`paciente_hijos_status`,
						`paciente`.`paciente_ocupacion`,
						`paciente`.`paciente_nombre_comun`,
						`paciente`.`APP-TX`,
						`paciente`.`HEA`,
						`paciente`.`AHF`,
						`paciente`.`APNP`,
						`paciente`.`APP`,
						`paciente`.`AGO`
					FROM `mbs`.`paciente`
					WHERE paciente_nombre='$paciente_nombre' AND fecha_1consulta='$fecha_1consulta'";
		$datos_paciente = $mysql->consulta($sentencia);
		$sentencia = "SELECT 
						MAX(num_consulta) AS ultima_consulta
					FROM
						`mbs`.`consulta`
					WHERE paciente_nombre='$paciente_nombre' AND fecha_1consulta='$fecha_1consulta'";
		$dato_ultima_consulta = $mysql->consulta($sentencia);
		if($dato_ultima_consulta->num_rows > 0){
			$fila = mysqli_fetch_assoc($dato_ultima_consulta);
			$num_consulta = $fila['ultima_consulta'] + 1;
		}
		if($datos_paciente->num_rows > 0){
			$fila = mysqli_fetch_assoc($datos_paciente);
			$_POST['paciente_nombre'] = $fila['paciente_nombre'];
			$_POST['fecha_1consulta'] = $fila['fecha_1consulta'];
			$_POST['paciente_tel'] = $fila['paciente_tel'];
			$_POST['paciente_tel_tipo'] = $fila['paciente_tel_tipo'];
			$_POST['paciente_email'] = $fila['paciente_email'];
			$_POST['paciente_direccion'] = $fila['paciente_direccion'];
			$_POST['paciente_fecha_nac'] = $fila['paciente_fecha_nac'];
			$_POST['paciente_edad'] = $fila['paciente_edad'];
			$_POST['paciente_hijos_status'] = $fila['paciente_hijos_status'];
			$_POST['paciente_ocupacion'] = $fila['paciente_ocupacion'];
			$_POST['paciente_nombre_comun'] = $fila['paciente_nombre_comun'];
			$_POST['APP-TX'] = $fila['APP-TX'];
			$_POST['HEA'] = $fila['HEA'];
			$_POST['AHF'] = $fila['AHF'];
			$_POST['APNP'] = $fila['APNP'];
			$_POST['APP'] = $fila['APP'];
			$_POST['AGO'] = $fila['AGO'];
		}else{
			?>
				<script>
					alert("El paciente no existe");
				</script>
			<?php
		}
	}
}else if(isset($_POST['terminar_consulta'])){
	if(validar_datos()){
		$paciente_nombre = strlen(trim($_POST['paciente_nombre'])) ? "'".trim($_POST['paciente_nombre'])."'" : 'NULL';
		$fecha_1consulta = strlen(trim($_POST['fecha_1consulta'])) ? "'".trim($_POST['fecha_1consulta'])."'" : 'NULL';
		$paciente_nombre_comun = strlen(trim($_POST['paciente_nombre_comun'])) ? "'".trim($_POST['paciente_nombre_comun'])."'" : 'NULL';
		$paciente_tel = strlen(trim($_POST['paciente_tel'])) ? "'".trim($_POST['paciente_tel'])."'" : 'NULL';
		$paciente_tel_tipo = strlen(trim($_POST['paciente_tel_tipo'])) ? "'".trim($_POST['paciente_tel_tipo'])."'" : 'NULL';
		$paciente_email = strlen(trim($_POST['paciente_email'])) ? "'".trim($_POST['paciente_email'])."'" : 'NULL';
		$paciente_direccion = strlen(trim($_POST['paciente_direccion'])) ? "'".trim($_POST['paciente_direccion'])."'" : 'NULL';
		$paciente_fecha_nac = strlen(trim($_POST['paciente_fecha_nac'])) ? "'".trim($_POST['paciente_fecha_nac'])."'" : 'NULL';
		$paciente_edad = strlen(trim($_POST['paciente_edad'])) ? "'".trim($_POST['paciente_edad'])."'" : 'NULL';
		$paciente_hijos_status = strlen(trim($_POST['paciente_hijos_status'])) ? "'".trim($_POST['paciente_hijos_status'])."'" : 'NULL';
		$paciente_ocupacion = strlen(trim($_POST['paciente_ocupacion'])) ? "'".trim($_POST['paciente_ocupacion'])."'" : 'NULL';
		$inm_nombre = strlen(trim($_POST['inm_nombre'])) ? "'".trim($_POST['inm_nombre'])."'" : 'NULL';
		$inm_lab = strlen(trim($_POST['inm_lab'])) ? "'".trim($_POST['inm_lab'])."'" : 'NULL';
		$inm_sintomas = strlen(trim($_POST['inm_sintomas'])) ? "'".trim($_POST['inm_sintomas'])."'" : 'NULL';
		$inm_anotacion = strlen(trim($_POST['inm_anotacion'])) ? "'".trim($_POST['inm_anotacion'])."'" : 'NULL';
		$fecha_consulta = strlen(trim($_POST['fecha_consulta'])) ? "'".trim($_POST['fecha_consulta'])."'" : 'NULL';
		$num_consulta = strlen(trim($_POST['num_consulta'])) ? trim($_POST['num_consulta']) : 'NULL';
		$motivo_consulta = strlen(trim($_POST['motivo_consulta'])) ? "'".trim($_POST['motivo_consulta'])."'" : 'NULL';
		$sintomas = strlen(trim($_POST['sintomas'])) ? "'".trim($_POST['sintomas'])."'" : 'NULL';
		$emociones = strlen(trim($_POST['emociones'])) ? "'".trim($_POST['emociones'])."'" : 'NULL';
		$APP_TX = strlen(trim($_POST['APP-TX'])) ? "'".trim($_POST['APP-TX'])."'" : 'NULL';
		$HEA = strlen(trim($_POST['HEA'])) ? "'".trim($_POST['HEA'])."'" : 'NULL';
		$agrava = strlen(trim($_POST['agrava'])) ? "'".trim($_POST['agrava'])."'" : 'NULL';
		$mejora = strlen(trim($_POST['mejora'])) ? "'".trim($_POST['mejora'])."'" : 'NULL';
		$antojos = strlen(trim($_POST['antojos'])) ? "'".trim($_POST['antojos'])."'" : 'NULL';
		$AHF = strlen(trim($_POST['AHF'])) ? "'".trim($_POST['AHF'])."'" : 'NULL';
		$APNP = strlen(trim($_POST['APNP'])) ? "'".trim($_POST['APNP'])."'" : 'NULL';
		$APP = strlen(trim($_POST['APP'])) ? "'".trim($_POST['APP'])."'" : 'NULL';
		$AGO = strlen(trim($_POST['AGO'])) ? "'".trim($_POST['AGO'])."'" : 'NULL';
		$IAS_general = strlen(trim($_POST['IAS_general'])) ? "'".trim($_POST['IAS_general'])."'" : 'NULL';
		$IAS_respiratorio = strlen(trim($_POST['IAS_respiratorio'])) ? "'".trim($_POST['IAS_respiratorio'])."'" : 'NULL';
		$IAS_cardiovascular = strlen(trim($_POST['IAS_cardiovascular'])) ? "'".trim($_POST['IAS_cardiovascular'])."'" : 'NULL';
		$IAS_gastrointestinal = strlen(trim($_POST['IAS_gastrointestinal'])) ? "'".trim($_POST['IAS_gastrointestinal'])."'" : 'NULL';
		$IAS_genitourinario = strlen(trim($_POST['IAS_genitourinario'])) ? "'".trim($_POST['IAS_genitourinario'])."'" : 'NULL';
		$IAS_endocrino = strlen(trim($_POST['IAS_endocrino'])) ? "'".trim($_POST['IAS_endocrino'])."'" : 'NULL';
		$IAS_nervioso = strlen(trim($_POST['IAS_nervioso'])) ? "'".trim($_POST['IAS_nervioso'])."'" : 'NULL';
		$IAS_visual = strlen(trim($_POST['IAS_visual'])) ? "'".trim($_POST['IAS_visual'])."'" : 'NULL';
		$IAS_auditivo = strlen(trim($_POST['IAS_auditivo'])) ? "'".trim($_POST['IAS_auditivo'])."'" : 'NULL';
		$IAS_musesq = strlen(trim($_POST['IAS_musesq'])) ? "'".trim($_POST['IAS_musesq'])."'" : 'NULL';
		$IAS_otros = strlen(trim($_POST['IAS_otros'])) ? "'".trim($_POST['IAS_otros'])."'" : 'NULL';
		$paciente_observacion = strlen(trim($_POST['paciente_observacion'])) ? "'".trim($_POST['paciente_observacion'])."'" : 'NULL';
		$auscultacion = strlen(trim($_POST['auscultacion'])) ? "'".trim($_POST['auscultacion'])."'" : 'NULL';
		$iridologia_izq = strlen(trim($_POST['iridologia_izq'])) ? "'".trim($_POST['iridologia_izq'])."'" : 'NULL';
		$iridologia_der = strlen(trim($_POST['iridologia_der'])) ? "'".trim($_POST['iridologia_der'])."'" : 'NULL';
		$estatura = strlen(trim($_POST['estatura'])) ? trim($_POST['estatura']) : 'NULL';
		$temperatura = strlen(trim($_POST['temperatura'])) ? trim($_POST['temperatura']) : 'NULL';
		$oxigenacion = strlen(trim($_POST['oxigenacion'])) ? trim($_POST['oxigenacion']) : 'NULL';
		$FC = strlen(trim($_POST['FC'])) ? trim($_POST['FC']) : 'NULL';
		$peso = strlen(trim($_POST['peso'])) ? trim($_POST['peso']) : 'NULL';
		$PAS = strlen(trim($_POST['PAS'])) ? trim($_POST['PAS']) : 'NULL';
		$PAD = strlen(trim($_POST['PAD'])) ? trim($_POST['PAD']) : 'NULL';
		$recomendacion = strlen(trim($_POST['recomendacion'])) ? "'".trim($_POST['recomendacion'])."'" : 'NULL';
		$medtx_capacidad = strlen(trim($_POST['medtx_capacidad'])) ? "'".trim($_POST['medtx_capacidad'])."'" : 'NULL';
		$medtx_dosis = strlen(trim($_POST['medtx_dosis'])) ? "'".trim($_POST['medtx_dosis'])."'" : 'NULL';
		$medtx_nombre = strlen(trim($_POST['medtx_nombre'])) ? "'".trim($_POST['medtx_nombre'])."'" : 'NULL';
		$medtx_leyenda = strlen(trim($_POST['medtx_leyenda'])) ? "'".trim($_POST['medtx_leyenda'])."'" : 'NULL';
		$ingreso = strlen(trim($_POST['ingreso'])) ? trim($_POST['ingreso']) : 'NULL';
		$sentencia = "SELECT 
						1
					FROM
						`mbs`.`consulta`
					WHERE paciente_nombre=$paciente_nombre AND fecha_1consulta=$fecha_1consulta";
		if($mysql->consulta($sentencia)->num_rows > 0){
			$sentencia = "UPDATE `mbs`.`paciente`
						SET
						`paciente_tel` = $paciente_tel,
						`paciente_tel_tipo` = $paciente_tel_tipo,
						`paciente_email` = $paciente_email,
						`paciente_direccion` = $paciente_direccion,
						`paciente_fecha_nac` = $paciente_fecha_nac,
						`paciente_edad` = $paciente_edad,
						`paciente_hijos_status` = $paciente_hijos_status,
						`paciente_ocupacion` = $paciente_ocupacion,
						`paciente_nombre_comun` = $paciente_nombre_comun,
						`APP-TX` = $APP_TX,
						`HEA` = $HEA,
						`AHF` = $AHF,
						`APNP` = $APNP,
						`APP` = $APP,
						`AGO` = $AGO
						WHERE paciente_nombre=$paciente_nombre AND fecha_1consulta=$fecha_1consulta";
		}
		else{
			$sentencia = "INSERT INTO `mbs`.`paciente` (`paciente_nombre`, `fecha_1consulta`, `paciente_tel`, `paciente_tel_tipo`, `paciente_email`, `paciente_direccion`, `paciente_fecha_nac`, `paciente_edad`, `paciente_hijos_status`, `paciente_ocupacion`, `paciente_nombre_comun`, `APP-TX`, `HEA`, `AHF`, `APNP`, `APP`, `AGO`)
			VALUES ($paciente_nombre,$fecha_1consulta,$paciente_tel,$paciente_tel_tipo,$paciente_email,$paciente_direccion,$paciente_fecha_nac,$paciente_edad,$paciente_hijos_status,$paciente_ocupacion,$paciente_nombre_comun,$APP_TX,$HEA,$AHF,$APNP,$APP,$AGO)";
		}
		$mysql->consulta($sentencia);
		$sentencia = "INSERT INTO `mbs`.`consulta`
					(`paciente_nombre`,`fecha_1consulta`,`num_consulta`,`fecha_consulta`,`motivo_consulta`,`sintomas`,`emociones`,`agrava`,`mejora`,`antojos`,`IAS_general`,`IAS_respiratorio`,`IAS_cardiovascular`,`IAS_gastrointestinal`,`IAS_genitourinario`,`IAS_endocrino`,`IAS_nervioso`,`IAS_visual`,`IAS_auditivo`,`IAS_musesq`,`IAS_otros`,`paciente_observacion`,`auscultacion`,`iridologia_der`,`iridologia_izq`,`estatura`,`temperatura`,`oxigenacion`,`FC`,`peso`,`PAS`,`PAD`,`recomendación`,`ingreso`)
					VALUES ($paciente_nombre,$fecha_1consulta,$num_consulta,$fecha_consulta,$motivo_consulta,$sintomas,$emociones,$agrava,$mejora,$antojos,$IAS_general,$IAS_respiratorio,$IAS_cardiovascular,$IAS_gastrointestinal,$IAS_genitourinario,$IAS_endocrino,$IAS_nervioso,$IAS_visual,$IAS_auditivo,$IAS_musesq,$IAS_otros,$paciente_observacion,$auscultacion,$iridologia_der,$iridologia_izq,$estatura,$temperatura,$oxigenacion,$FC,$peso,$PAS,$PAD,$recomendacion,$ingreso);";
		$mysql->consulta($sentencia);
		?>
			<script>
				alert("Consulta terminada con éxito");
				location.href = 'http://localhost/MBS/principal.html';
			</script>
		<?php
		die();
	}
}

function validar_datos(){
	$datos_necesarios = array(
		"Nombre completo" => $_POST['paciente_nombre'],
		"Fecha de 1a consulta" => $_POST['fecha_1consulta'],
		"Dirección del paciente" => $_POST['paciente_direccion'],
		"Fecha de nacimiento" => $_POST['paciente_fecha_nac'],
		"Edad" => $_POST['paciente_edad'],
		"¿Hijos?" => $_POST['paciente_hijos_status'],
		"Ocupación" => $_POST['paciente_ocupacion'],
		"Nombre común" => $_POST['paciente_nombre_comun'],
		"Número de consulta" => $_POST['num_consulta'],
		"Fecha de consulta" => $_POST['fecha_consulta'],
	);
	foreach($datos_necesarios as $key => $value){
		if(!(strlen(trim($value)))){
			?>
				<script>
					alert("Error\nNo se ha ingresado el campo '<?php echo $key; ?>'");
				</script>
			<?php
			return false;
		}
	}
	return true;
}
?>
