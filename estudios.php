<?php
    error_reporting(E_ALL^E_STRICT);
    ini_set('display_errors', 'on');
    ini_set('date.timezone','America/Mexico_City');
    include 'scripts-php/mysql-estudios.php';

    //var_dump($_POST);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina con formulario para agregar archivo y datos de los estudios de un paciente">
    <title> Agregar estudios </title>
    <link href="styles/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/estudios.css">
    <script src="https://kit.fontawesome.com/b85031486b.js" crossorigin="anonymous"></script>
    <script src="scripts-js/jquery-3.6.4.min.js"></script>
</head>

<body>
    <header>
        <a href="#" class="logo">
            <span>M&B&S</span> Mint, Body and Spirit
        </a>
        <input type="checkbox" id="menu">
        <label for="menu" class="fa-solid fa-bars"></label>

        <nav class="navbar">
            <a href="principal.html">Regresar</a>
        </nav>
    </header>

    <datalist id="lista_nombres"></datalist>
	<datalist id="lista_fechas_1consulta"></datalist>
    <datalist id="lista_estudio_doc"></datalist>
    <datalist id="lista_estudio_fecha"></datalist>

    <div class="primero container ms-2">
        <div class="row">
            <div class="col">
                <h1 style="font-size: 4rem;">Agregar estudios de paciente</h1>
            </div>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" autocomplete="off">
        <div class="container my-4 ms-2 formulario" id="formulario">
            <h2><b>Datos de paciente</b></h2>
            <div class="row row-cols-auto mb-5">
                <div class="col-6">
                    <label for="paciente_nombre">
                        <span>Nombre completo: </span>
                    </label>
                    <?php
                    echo '<input type="text" id="paciente_nombre" name="paciente_nombre" list="lista_nombres" size="40" value="'.$paciente_nombre.'">';
                    ?>
                </div>
                <div class="col-4">
                    <label for="fecha_1consulta">
                        <span>Fecha de 1a consulta: </span>
                    </label>
                    <?php
                    echo '<input type="date" id="fecha_1consulta" name="fecha_1consulta" list="lista_fechas_1consulta" value="'.$fecha_1consulta.'">';
                    ?>
                </div>
                <!-- <div class="col">
                    <button type="button" style="padding-inline: 5px 5px;" name="verificar_paciente">Verificar paciente</button>
                </div> -->
            </div>
            <h2><b>Datos de estudio</b></h2>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="estudio_doc">
                        <span>Archivo: </span>
                    </label>
                    <input type="file" id="estudio_doc" name="estudio_doc" style="display: none;">
                    <input type="text" id="estudio_doc_text" name="estudio_doc_text" placeholder="Archivo o link" list="lista_estudio_doc">
                    <button type="button" id="examinar_btn" style="padding-inline: 5px 5px;">Examinar</button>
                </div>
            </div>
            <div class="row row-cols-auto mb-5">
                <div class="col">
                    <label for="estudio_fecha">
                        <span>Fecha del estudio: </span>
                    </label>
                    <?php
                    echo '<input type="date" id="estudio_fecha" name="estudio_fecha" list="lista_estudio_fecha" value="'.$estudio_fecha.'">';
                    ?>
                </div>
            </div>

            <h3><b>Parámetros importantes</b></h3>
            <div class="row row-cols-auto" id="params1">
                <div class="col">
                    <label for="param_nombre">
                        <span>Nombre: </span>
                    </label>
                    <?php
                    echo '<input type="text" id="param_nombre1" name="param_nombre1" size="18" value="'.$param_nombre.'">';
                    ?>
                </div>
                <div class="col">
                    <label for="param_valor">
                        <span>Valor: </span>
                    </label>
                    <?php
                    echo '<input type="text" id="param_valor1" name="param_valor1" size="15" value="'.$param_valor.'">';
                    ?>
                </div>
                <div class="col">
                    <label for="param_rango">
                        <span>Rango: </span>
                    </label>
                
                    <?php
                    echo '<input type="text" id="param_rango1" name="param_rango1" size="15" value="'.$param_rango.'">';
                    ?>
                </div>
                <div class="col">
                    <label for="param_observacion">
                        <span>Observación: </span>
                    </label><br/>
                <textarea class="largeinput" id="param_observacion1" name="param_observacion1" rows="3"><?php echo $param_observacion; ?></textarea>
                </div>
            </div>
            <input type="hidden" id="num_params" name="num_params" value="1">
            <div class="row row-cols-auto">
                <div class="col">
                    <button type="button" style="padding-inline: 5px 5px;" id="btn_agregar_parametro">
                        Agregar otro parámetro
                    </button>
                </div>
            </div>
        </div>

        <div class="container ms-2 ultimo">
            <button class="submit" type="submit" name="guardar_estudio">Guardar estudio</button>
        </div>
	</form>
    <script>
        // Agregar controlador de eventos al botón "Examinar"
        document.getElementById('examinar_btn').addEventListener('click', function() {
            document.getElementById('estudio_doc').click();
        });

        // Capturar el archivo seleccionado y mostrar su nombre en el campo de texto
        document.getElementById('estudio_doc').addEventListener('change', function() {
            var archivo = document.getElementById('estudio_doc').files[0];
            document.getElementById('estudio_doc_text').value = archivo.name;
        });
    </script>
    <script src="scripts-js/verificar-paciente.js"></script>
</body> 
</html>