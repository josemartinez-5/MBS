<?php 
require_once("mysql.php");
class mysql_consulta extends mysql{
	public function terminar_consulta(){
		if (isset($_POST)) {
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
			$num_consulta = strlen(trim($_POST['num_consulta'])) ? "'".trim($_POST['num_consulta'])."'" : 'NULL';
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
			$estatura = strlen(trim($_POST['estatura'])) ? "'".trim($_POST['estatura'])."'" : 'NULL';
			$temperatura = strlen(trim($_POST['temperatura'])) ? "'".trim($_POST['temperatura'])."'" : 'NULL';
			$oxigenacion = strlen(trim($_POST['oxigenacion'])) ? "'".trim($_POST['oxigenacion'])."'" : 'NULL';
			$FC = strlen(trim($_POST['FC'])) ? "'".trim($_POST['FC'])."'" : 'NULL';
			$peso = strlen(trim($_POST['peso'])) ? "'".trim($_POST['peso'])."'" : 'NULL';
			$PAS = strlen(trim($_POST['PAS'])) ? "'".trim($_POST['PAS'])."'" : 'NULL';
			$PAD = strlen(trim($_POST['PAD'])) ? "'".trim($_POST['PAD'])."'" : 'NULL';
			$recomendacion = strlen(trim($_POST['recomendacion'])) ? "'".trim($_POST['recomendacion'])."'" : 'NULL';
			$medtx_capacidad = strlen(trim($_POST['medtx_capacidad'])) ? "'".trim($_POST['medtx_capacidad'])."'" : 'NULL';
			$medtx_dosis = strlen(trim($_POST['medtx_dosis'])) ? "'".trim($_POST['medtx_dosis'])."'" : 'NULL';
			$medtx_nombre = strlen(trim($_POST['medtx_nombre'])) ? "'".trim($_POST['medtx_nombre'])."'" : 'NULL';
			$medtx_leyenda = strlen(trim($_POST['medtx_leyenda'])) ? "'".trim($_POST['medtx_leyenda'])."'" : 'NULL';
			$ingreso = strlen(trim($_POST['ingreso'])) ? "'".trim($_POST['ingreso'])."'" : 'NULL';
		
			$consulta = "INSERT INTO `mbs`.`paciente` (`paciente_nombre`, `fecha_1consulta`, `paciente_tel`, `paciente_tel_tipo`, `paciente_email`, `paciente_direccion`, `paciente_fecha_nac`, `paciente_edad`, `paciente_hijos_status`, `paciente_ocupacion`, `paciente_nombre_comun`, `APP-TX`, `HEA`, `AHF`, `APNP`, `APP`, `AGO`)
			VALUES ($paciente_nombre,$fecha_1consulta,$paciente_tel,$paciente_tel_tipo,$paciente_email,$paciente_direccion,$paciente_fecha_nac,$paciente_edad,$paciente_hijos_status,$paciente_ocupacion,$paciente_nombre_comun,$APP_TX,$HEA,$AHF,$APNP,$APP,$AGO)";
			$resultado = $this->consulta($consulta);
			if ($resultado) {
				?>
				<h3 class="ok">¡REGISTRADO!</h3>
				<?php
			} else {
				?> 
				<h3 class="bad">¡ERROR!</h3>
				<?php
			}
		}else{
			?> 
			<h3 class="bad">¡COMPLETE LOS CAMPOS!</h3>
			<?php
		}
	}
}

?>
