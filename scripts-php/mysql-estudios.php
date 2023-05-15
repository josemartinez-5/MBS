<?php
error_reporting(E_ALL^E_STRICT);
ini_set('display_errors', 'on');

include 'mysql.php';
$mysql = new mysql();

$paciente_nombre = "";
$fecha_1consulta = "";
$estudio_fecha = "";
$param_nombre = "";
$param_valor = "";
$param_rango = "";
$param_observacion = "";
$estudio_doc= "";
$estudio_fecha="";
$estudio_parametro="";
/* if (isset($_POST['buscar_paciente'])) {
    if(strlen($_POST['paciente_nombre']) && strlen($_POST['fecha_1consulta'])){
        $paciente_nombre = $_POST['paciente_nombre'];
        $fecha_1consulta = $_POST['fecha_1consulta'];

        // Construye la consulta SQL
        $sentencia= "SELECT * FROM paciente WHERE paciente_nombre = '$paciente_nombre' AND fecha_1consulta = '$fecha_1consulta'";

        $resultado = $mysql->consulta($sentencia);

        if (mysqli_num_rows($resultado) > 0) {
            echo "<script>('El usuario $paciente_nombre ha sido encontrado.');</script>";
            
            // Obtener los valores de estudio_doc y estudio_fecha de la tabla estudio
            $sentencia = "SELECT estudio_doc, estudio_fecha FROM estudio WHERE paciente_nombre = '$paciente_nombre' AND fecha_1consulta = '$fecha_1consulta'";
            $resultado = $mysql->consulta($sentencia);
            var_dump($resultado);
            $fila = mysqli_fetch_assoc($resultado);
            $estudio_doc = $fila['estudio_doc'];
            $estudio_fecha = $fila['estudio_fecha'];

            // Muestra los resultados
            // ...
        } else {
            echo "<script>alert('El paciente $paciente_nombre no tiene estudios almacenados.');</script>";
        }
    }
    else{
        ?>
        <script>
            alert("Ingrese nombre y fecha de 1a consulta del paciente");
        </script>
        <?php
    }
} else */
if(isset($_POST['guardar_estudio']) && validar_datos()){
    $paciente_nombre = $_POST['paciente_nombre'];
    $fecha_1consulta = $_POST['fecha_1consulta'];
	$estudio_fecha = $_POST['estudio_fecha'];
    //Si se utilizan '\', hay que escapar esos caracteres
    $estudio_doc = str_replace('\\','\\\\',$_POST['estudio_doc_text']);

    $sentencia = "SELECT 
                    *
                FROM
                    mbs.estudio 
                WHERE estudio.paciente_nombre = '$paciente_nombre' AND estudio.fecha_1consulta = '$fecha_1consulta' AND estudio.estudio_fecha = '$estudio_fecha'";
    if($mysql->consulta($sentencia)->num_rows > 0){
        $sentencia = "UPDATE `mbs`.`estudio`
                    SET
                    `estudio_doc` = '$estudio_doc'
                    WHERE estudio.paciente_nombre = '$paciente_nombre' AND estudio.fecha_1consulta = '$fecha_1consulta' AND estudio.estudio_fecha = '$estudio_fecha'";
    }else{
        $sentencia = "INSERT INTO `mbs`.`estudio`
                    (`paciente_nombre`,
                    `fecha_1consulta`,
                    `estudio_fecha`,
                    `estudio_doc`)
                    VALUES
                    ('$paciente_nombre',
                    '$fecha_1consulta',
                    '$estudio_fecha',
                    '$estudio_doc')";
    }
    if($mysql->consulta($sentencia)) {
        // Inserta los datos en la tabla estudio_parametro
        for($i=1; $i<=$_POST['num_params']; $i++){
            $param_nombre = $_POST['param_nombre'.$i];
            $param_valor = $_POST['param_valor'.$i];
            $param_rango = $_POST['param_rango'.$i];
            $param_observacion = $_POST['param_observacion'.$i];
            if(strlen($param_nombre) && strlen($param_valor) && strlen($param_rango)){
                $sentencia = "INSERT INTO estudio_parametro (paciente_nombre, fecha_1consulta, estudio_fecha, param_nombre, param_valor, param_rango, param_observacion)
                VALUES ('$paciente_nombre', '$fecha_1consulta', '$estudio_fecha', '$param_nombre', '$param_valor', '$param_rango', '$param_observacion')";
                $mysql->consulta($sentencia);
            }
        }
        echo "<script>
            alert('Los datos se han guardado correctamente.');
            location.href = 'principal.html';
        </script>";
        die();
    } else {
        echo "<script>alert('Error al guardar los datos.');</script>";   
    }
}

function validar_datos(){
	$datos_necesarios = array(
		"Nombre completo" => $_POST['paciente_nombre'],
		"Fecha de 1a consulta" => $_POST['fecha_1consulta'],
		"Fecha del estudio" => $_POST['estudio_fecha'],
	);
    //Validar que los datos no estén vacíos
	foreach($datos_necesarios as $key => $value){
		if(!(strlen(trim($value)))){
            echo '<script>
				alert("Error\nNo se ha ingresado el campo '.$key.'");
			</script>';
			return false;
		}
	}
    //Validar que el paciente exista
    global $mysql;
    $sentencia = "SELECT * FROM mbs.paciente WHERE paciente.paciente_nombre = '".$_POST['paciente_nombre']."' AND paciente.fecha_1consulta = '".$_POST['fecha_1consulta']."'";
    if($mysql->consulta($sentencia)->num_rows < 1){
        echo '<script>
            alert("Error\nEl paciente '.$_POST['paciente_nombre'].' no ha sido encontrado");
        </script>';
        return false;
    }
	return true;
}
?>

