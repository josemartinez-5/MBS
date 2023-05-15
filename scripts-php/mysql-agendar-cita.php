<?php
// Conectarse a la base de datos (reemplazar los valores con los de tu servidor de base de datos)
// $servername = "localhost";
// $username = "root2";
// $password = "ContraseñaInsegura6#";
// $dbname = "mbs";

//$conn = new mysqli($servername, $username, $password, $dbname);

//Se va a usar el objeto de la clase mysql en mysql.php, cambiar ahí los datos de username y password
include 'mysql.php';
$mysql = new mysql();

// Verificar la conexión
if ($mysql->connect_error()) {
  die("Conexión fallida: " . $mysql->connect_error());
}

// Procesar los datos del formulario
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$fecha_hora = $_POST['fecha_hora'];
$comentarios = $_POST['comentarios'];

// Insertar los datos en la tabla de citas
$sql = "INSERT INTO citas (nombre, edad, email, telefono, fecha_hora, comentarios)
        VALUES ('$nombre', $edad,  '$email', '$telefono', '$fecha_hora', '$comentarios')";

if ($mysql->consulta($sql) == TRUE) {
    if($_POST['nuevo_paciente'] == 1){
        $sql = "INSERT INTO `mbs`.`paciente` (`paciente_nombre`, `fecha_1consulta`, `paciente_tel`, `paciente_email`, `paciente_dir_cp`, `paciente_dir_estado`, `paciente_dir_municipio`, `paciente_dir_colonia`, `paciente_dir_calle_numero`, `paciente_fecha_nac`, `paciente_edad`, `paciente_hijos_status`, `paciente_ocupacion`, `paciente_nombre_comun`, proxima_consulta)
        VALUES ('$nombre','".substr($fecha_hora,0,10)."','$telefono','$email','','','','','','1001-01-01',$edad,0,'','','$fecha_hora')";
        if($mysql->consulta($sql))
            echo "Cita agendada correctamente";
        else
            echo "Error al agendar la cita: " . $mysql->error();
    }else if($_POST['nuevo_paciente'] == 0 && strlen($_POST['fecha_1consulta'])){
        $fecha_1consulta = $_POST['fecha_1consulta'];
        if(strlen($_POST['periodicidad']))
            $periodicidad = $_POST['periodicidad'];
        else
            $periodicidad = NULL;
        $sql = "UPDATE `mbs`.`paciente`
                SET
                `paciente_tel` = '$telefono',
                `paciente_email` = '$email',
                `paciente_edad` = $edad,
                `proxima_consulta` = '$fecha_hora',
                `periodicidad` = $periodicidad
                WHERE `paciente_nombre` = '$nombre' AND `fecha_1consulta` = '$fecha_1consulta'";
        if($mysql->consulta($sql))
            echo "Cita agendada correctamente";
        else
            echo "Error al agendar la cita: " . $mysql->error();
    }else
        echo "Error al agendar la cita";
} else
    echo "Error al agendar la cita: " . $mysql->error();

// Cerrar la conexión
$mysql->close();
?>
<button onclick="window.location.href='../principal.html'">Regresar</button>