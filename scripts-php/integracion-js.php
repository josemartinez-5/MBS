<?php
    include 'mysql-consulta.php';

    //Seleccionar un estado después de ingresar CP
    if(isset($_POST['cp_estado']))
        echo obtener_estado($_POST['cp_estado']);

    //Actualizar lista de municipios y seleccionar uno después de ingresar CP
    if(isset($_POST['cp_municipio'])){
        $id_municipio = obtener_municipio($_POST['cp_municipio']);
        $opciones = consulta_municipios($_POST['estado_municipio']);
        echo '<option value="0">---</option>';
        while($row = mysqli_fetch_assoc($opciones)){
            echo '<option id="opt-municipio-'.$row['clave_municipio'].'" value="'.$row['clave_municipio'].'"';
            if($row['clave_municipio'] == $id_municipio)
                echo ' selected';
            echo '>'.$row['nombre_municipio'].'</option>';
        }
    }

    //Actualizar lista de asentamientos después de ingresar CP
    if(isset($_POST['cp_asentamiento'])){
        $opciones = consulta_asentamientos2($_POST['cp_asentamiento']);
        echo '<option value="0">---</option>';
        while($row = mysqli_fetch_assoc($opciones)){
            echo '<option>'.$row['nombre_asentamiento'].'</option>';
        }
    }

    //Actualizar lista de municipios después de cambiar el estado
    if(isset($_POST['estado_municipio'])){
        $opciones = consulta_municipios($_POST['estado_municipio']);
        echo '<option value="0">---</option>';
        while($row = mysqli_fetch_assoc($opciones)){
            echo '<option id="opt-municipio-'.$row['clave_municipio'].'" value="'.$row['clave_municipio'].'">';
            echo $row['nombre_municipio'].'</option>';
        }
    }

    //Actualizar lista de asentamientos después de cambiar municipio
    if(isset($_POST['municipio_asentamiento'])){
        $opciones = consulta_asentamientos1($_POST['estado_asentamiento'],$_POST['municipio_asentamiento']);
        echo '<option value="0" data-cp="0">---</option>';
        while($row = mysqli_fetch_assoc($opciones)){
            echo '<option value="'.$row['nombre_asentamiento'].'" data-cp="'.$row['cp_asentamiento'].'">';
            echo $row['nombre_asentamiento'].' (C.P. '.$row['cp_asentamiento'].')';
            echo '</option>';
        }
    }

    //Actualizar lista de nombres para escoger en el campo paciente_nombre
    if(isset($_POST['termino_nombre'])){
        $opciones = buscar_nombres_paciente($_POST['termino_nombre']);
        while($row = mysqli_fetch_assoc($opciones)){
            echo '<option value="'.$row['paciente_nombre'].'">';
        }
    }

    //Obtener fecha(s) de primera consulta a partir del nombre del paciente
    if(isset($_POST['nombre_para_fecha'])){
        $opciones = buscar_fecha_1consulta($_POST['nombre_para_fecha']);
        while($row = mysqli_fetch_assoc($opciones)){
            echo '<option value="'.$row['fecha_1consulta'].'">';
        }
    }

    //Obtener datos para agendar nueva cita de paciente ya existente
    if(isset($_POST['nombre_datos_cita'])){
        $datos = datos_cita($_POST['nombre_datos_cita'],$_POST['fecha_1consulta_datos_cita']);
        echo $datos['paciente_edad']."\n";
        echo $datos['paciente_email']."\n";
        echo $datos['paciente_tel']."\n";
        echo $datos['periodicidad']."\n";
        echo $datos['ultima_consulta'];
    }
?>