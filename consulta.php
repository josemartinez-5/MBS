<?php
    error_reporting(E_ALL^E_STRICT);
    ini_set('display_errors', 'on');
    ini_set('date.timezone','America/Mexico_City');
    include 'scripts-php/mysql-consulta.php';
    
    //var_dump($_POST);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina con formulario que se llena durante una consulta">
    <title> Consulta</title>
    <link href="styles/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles/consulta.css">
    <script src="https://kit.fontawesome.com/b85031486b.js" crossorigin="anonymous"></script>
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
            <a href="#" hidden>Guardar</a>
        </nav>
    </header>

    <div class="primero container ms-2">
        <div class="row">
            <div class="col">
                <h1 style="font-size: 4rem;">Consulta</h1>
            </div>
        </div>
    </div>

    <form method="POST" enctype="multipart/form-data" autocomplete="off">
<!-- Ficha de identificación -->
        <div class="container my-4 ms-2 formulario">
            <h2><b>Ficha de identificación</b></h2>
            <div class="row row-cols-auto">
                <div class="col-6">
                    <label for="paciente_nombre">
                        <span>Nombre completo: </span>
                    </label>
                    <?php
                        echo '<input type="text" id="paciente_nombre" name="paciente_nombre" size="40" value="';
                        if(isset($_POST['paciente_nombre'])){
                            echo $_POST['paciente_nombre'];
                        }
                        echo'">';
                    ?>
                </div>
                <div class="col-4">
                    <label for="fecha_1consulta">
                        <span>Fecha de 1a consulta: </span>
                    </label>
                    <?php
                        echo '<input type="date" id="fecha_1consulta" name="fecha_1consulta" max="" value="';
                        if(isset($_POST['fecha_1consulta'])){
                            echo $_POST['fecha_1consulta'];
                        }
                        echo '">';
                    ?>
                </div>
                <div class="col">
                    <button type="submit" style="padding-inline: 5px 5px;" name="buscar_paciente">Buscar paciente</button>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col-6">
                    <label for="paciente_nombre_comun">
                        <span>Nombre común: </span>
                    </label>
                    <?php
                        echo '<input type="text" id="paciente_nombre_comun" name="paciente_nombre_comun" size="40" placeholder="¿Cómo quiere el paciente que le llamen?" value="';
                        if(isset($_POST['paciente_nombre_comun'])){
                            echo $_POST['paciente_nombre_comun'];
                        }
                        echo '">';
                    ?>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="paciente_tel">
                        <span>Teléfono: </span>
                    </label>
                    <?php
                        echo '<input type="tel" id="paciente_tel" name="paciente_tel" size="12" value="';
                        if(isset($_POST['paciente_tel'])){
                            echo $_POST['paciente_tel'];
                        }
                        echo '">';
                    ?>
                </div>
                <div class="col">
                    <label for="paciente_tel_tipo">
                        <span>Tipo: </span>
                    </label>
                    <?php
                        echo '<input type="text" id="paciente_tel_tipo" name="paciente_tel_tipo" placeholder="Móvil, casa, WhatsApp, etc." size="25" value="';
                        if(isset($_POST['paciente_tel_tipo'])){
                            echo $_POST['paciente_tel_tipo'];
                        }
                        echo '">';
                    ?>
                </div>
                <div class="col">
                    <!-- Se habilitará en otro momento este botón -->
                    <button type="submit" style="padding-inline: 5px 5px;" hidden>Agregar otro teléfono</button>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="paciente_email">
                        <span>Email: </span>
                    </label>
                    <?php
                        echo '<input type="email" id="paciente_email" name="paciente_email" size="50" value="';
                        if(isset($_POST['paciente_email'])){
                            echo $_POST['paciente_email'];
                        }
                        echo '">';
                    ?>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="paciente_direccion">
                        <span>Dirección: </span>
                    </label>
                    <?php
                        echo '<input type="text" id="paciente_direccion" name="paciente_direccion" size="80" value="';
                        if(isset($_POST['paciente_direccion'])){
                            echo $_POST['paciente_direccion'];
                        }
                        echo '">';
                    ?>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="paciente_fecha_nac">
                        <span>Fecha de nacimiento: </span>
                    </label>
                    <?php
                        echo '<input type="date" id="paciente_fecha_nac" name="paciente_fecha_nac" max="" value="';
                        if(isset($_POST['paciente_fecha_nac'])){
                            echo $_POST['paciente_fecha_nac'];
                        }
                        echo '">';
                    ?>
                </div>
                <div class="col">
                    <label for="paciente_edad">
                        <span>Edad: </span>
                    </label>
                    <?php
                        echo '<input type="number" id="paciente_edad" name="paciente_edad" value="';
                        if(isset($_POST['paciente_edad'])){
                            echo $_POST['paciente_edad'];
                        }
                        echo '">';
                    ?>
                    <span>años</span>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <span>¿Hijos? </span>
                    <label for="paciente_hijos_status_si">
                    <?php
                        echo '<input type="radio" id="paciente_hijos_status_si" name="paciente_hijos_status" value="1"';
                        if(isset($_POST['paciente_hijos_status']) && $_POST['paciente_hijos_status']==1){
                            echo ' checked ';
                        }
                        echo '>';
                    ?>
                        Sí
                    </label>
                    <label for="paciente_hijos_status_no">
                    <?php
                        echo '<input type="radio" id="paciente_hijos_status_no" name="paciente_hijos_status" value="0"';
                        if(!isset($_POST['paciente_hijos_status']) || $_POST['paciente_hijos_status']==0){
                            echo ' checked ';
                        }
                        echo '>';
                    ?>
                        No
                    </label>
                </div>
                <div class="col">
                    <label for="paciente_ocupacion">
                        <span>Ocupación: </span>
                    </label>
                    <?php
                        echo '<input type="text" id="paciente_ocupacion" name="paciente_ocupacion" value="';
                        if(isset($_POST['paciente_ocupacion'])){
                            echo $_POST['paciente_ocupacion'];
                        }
                        echo '">';
                    ?>
                </div>
            </div>
            <h3><b>Inmunización</b></h3>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="inm_nombre">
                        <span>Nombre: </span>
                    </label>
                    <input type="text" id="inm_nombre" name="inm_nombre">
                </div>
                <div class="col">
                    <label for="inm_lab">
                        <span>Laboratorio: </span>
                    </label>
                    <input type="text" id="inm_lab" name="inm_lab" size="25">
                </div>
                <div class="col">
                    <label for="inm_sintomas">
                        <span>Síntomas: </span>
                    </label><br>
                    <textarea class="largeinput" id="inm_sintomas" name="inm_sintomas" rows="5" cols="33"></textarea>
                </div>
                <div class="col">
                    <label for="inm_anotacion">
                        <span>Otro apunte: </span>
                    </label><br>
                    <textarea class="largeinput" id="inm_anotacion" name="inm_anotacion" rows="5" cols="33"></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <!-- Se habilitará en otro momento este botón -->
                    <button type="submit" style="padding-inline: 5px 5px;" hidden>Agregar otra vacuna</button>
                </div>
            </div>
        </div>

<!-- Identificación de consulta -->
        <div class="container my-4 ms-2 formulario">
            <h2><b>Identificación de consulta</b></h2>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="fecha_consulta">
                        <span>Fecha de consulta: </span>
                    </label>
                    <?php
                        echo '<input type="date" id="fecha_consulta" name="fecha_consulta" max="" value="';
                        if(isset($_POST['fecha_consulta'])){
                            echo $_POST['fecha_consulta'];
                        }                        
                        echo '">';
                    ?>
                </div>
                <div class="col">
                    <label for="num_consulta">
                    <?php
                        echo '<span>Consulta #'.$num_consulta.'</span>';
                    ?>
                    </label>
                <?php
                    echo '<input type="number" id="num_consulta" name="num_consulta" value="'.$num_consulta.'" hidden>';
                ?>
                </div>
            </div>
        </div>

<!-- Motivos, síntomas y antecedentes -->
        <div class="container my-4 ms-2 formulario">
            <h2><b>Motivos, síntomas y antecendentes</b></h2>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="motivo_consulta">
                        <span>Motivo de consulta: </span>
                    </label><br>
                    <textarea class="largeinput" id="motivo_consulta" name="motivo_consulta"
                    rows="3"><?php
                        if(isset($_POST['motivo_consulta'])){
                            echo $_POST['motivo_consulta'];
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="sintomas">
                        <span>Síntomas: </span>
                    </label><br>
                    <textarea class="largeinput" id="sintomas" name="sintomas"
                    rows="3"><?php
                        if(isset($_POST['sintomas'])){
                            echo $_POST['sintomas'];
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="emociones">
                        <span>Emociones: </span>
                    </label><br>
                    <textarea class="largeinput" id="emociones" name="emociones"
                    rows="2"><?php
                        if(isset($_POST['emociones'])){
                            echo $_POST['emociones'];
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="APP-TX actual">
                        <span>APP-TX: </span>
                    </label><br>
                    <textarea class="largeinput" id="APP-TX" name="APP-TX"
                    rows="4"><?php
                        if(isset($_POST['APP-TX'])){
                            echo $_POST['APP-TX'];
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="HEA">
                        <span>Historia de enfermedad actual (HEA): </span>
                    </label><br>
                    <textarea class="largeinput" id="HEA" name="HEA" rows="4"><?php
                        if(isset($_POST['HEA'])){
                            echo $_POST['HEA'];
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="agrava">
                        <span>Agrava: </span>
                    </label><br>
                    <textarea class="largeinput" id="agrava" name="agrava" rows="3"><?php
                        if(isset($_POST['agrava'])){
                            echo $_POST['agrava'];
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="mejora">
                        <span>Mejora: </span>
                    </label><br>
                    <textarea class="largeinput" id="mejora" name="mejora" rows="3"><?php
                        if(isset($_POST['mejora'])){
                            echo $_POST['mejora'];
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="antojos">
                        <span>Antojos: </span>
                    </label><br>
                    <textarea class="largeinput" id="antojos" name="antojos" rows="3"><?php
                        if(isset($_POST['antojos'])){
                            echo $_POST['antojos'];
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="AHF">
                        <span>AHF: </span>
                    </label><br>
                    <textarea class="largeinput" id="AHF" name="AHF" rows="15"><?php
                        if(isset($_POST['AHF'])){
                            echo $_POST['AHF'];
                        }else{
                            echo "Artritis\nCáncer\nCardiopatías\nColesterol/triglicéridos\nDiabetes\nHTA\nEpilepsia\nMalformaciones\nObesidad\nTrastornos mentales\nToxicomanías\nITS\nTuberculosis\nOtros\nFallecimientos, edad y causa";
                        }                        
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="APNP">
                        <span>APNP: </span>
                    </label><br>
                    <textarea class="largeinput" id="APNP" name="APNP" rows="9"><?php
                        if(isset($_POST['APNP'])){
                            echo $_POST['APNP'];
                        }else{
                            echo "Ejercicio\nGrupo Sanguíneo\nHospitalizado\nAdicciones: tabaco, alcohol, café\nMétodo anticonceptivo\nComidas al día\nConvivencia con animales\nDieta diaria\nInmunizaciones recientes";
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="APP">
                        <span>APP: </span>
                    </label><br>
                    <textarea class="largeinput" id="APP" name="APP" rows="13"><?php
                        if(isset($_POST['APP'])){
                            echo $_POST['APP'];
                        }else{
                            echo "Estudios de laboratorio\nTransfusiones de sangre\nEnfermedades actuales\nAlergias\nAsma\nArtritis\nCáncer\nHepátitis\nColesterol/triglícéridos\nDiabetes\nHTA\nMalformaciones\nTrastornos";
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="AGO">
                        <span>AGO: </span>
                    </label><br>
                    <textarea class="largeinput" id="AGO" name="AGO" rows="7"><?php
                        if(isset($_POST['AGO'])){
                            echo $_POST['AGO'];
                        }else{
                            echo "Menarca\nMétodo anticonceptivo\nFecha última menstruación\nPartos (césarea, natural, abortos)\nITS\nInfertilidad\nEstudio Papanicolau";
                        }
                    ?></textarea>
                </div>
            </div>
            <h3><b>IAS</b></h3>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_general">
                        <span>Síntomas generales: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_general" name="IAS_general" rows="8"><?php
                        if(isset($_POST['IAS_general'])){
                            echo $_POST['IAS_general'];
                        }else{
                            echo "Fiebre\nCambio de peso\nMalestar general\nCambio apetito\nSudoración\nInsomnio\nDolor(SIDIDACET)\nEdo de ánimo";
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="IAS_respiratorio">
                        <span>Ap. Respiratorio: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_respiratorio" name="IAS_respiratorio" rows="5"><?php
                        if(isset($_POST['IAS_general'])){
                            echo $_POST['IAS_general'];
                        }else{
                            echo "Disnea\nTos\nExpectoración\nHemoptisis\nDolor";
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_cardiovascular">
                        <span>Ap. Cardiovascular: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_cardiovascular" name="IAS_cardiovascular" rows="16"><?php
                        if(isset($_POST['IAS_cardiovascular'])){
                            echo $_POST['IAS_cardiovascular'];
                        }else{
                            echo "Disnea esfuerzo\nDisnea acostado\nEdema\nDolor precordial\nHipertensión arterial\nObstrucción nasal\nEpistaxis\nRuido oídos\nDisfonía\nVer manchas luminosas\nDolor torácico\nPalpitaciones\nCianosis\nSudoración excesiva\nVárices\nMoretones";
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="IAS_gastrointestinal">
                        <span>Ap. Gastrointestinal: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_gastrointestinal" name="IAS_gastrointestinal" rows="17"><?php
                        if(isset($_POST['IAS_gastrointestinal'])){
                            echo $_POST['IAS_gastrointestinal'];
                        }else{
                            echo "Mal aliento\nSed\nCaries\nDolor dientes\nDolor\nApetito/anorexia\nNáusea/vómito\nDisfagia\nPirosis\nDiarrea/constipación/tenesmo\nMelena\nRegurgitaciones/borborismos\nSangrado recto\nHipo/eruptos/flatulencias\nMeteorismo\nHeces\nPrurito anal";
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_genitourinario">
                        <span>Ap. Genitourinario: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_genitourinario" name="IAS_genitourinario" rows="7"><?php
                        if(isset($_POST['IAS_genitourinario'])){
                            echo $_POST['IAS_genitourinario'];
                        }else{
                            echo "Dolor al orinar\nFrec micciones\nCantidad\nSe levanta a orinar\nSecrecciones/sangre\nIncontinencia\nColor";
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="IAS_endocrino">
                        <span>Ap. Endocrino: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_endocrino" name="IAS_endocrino" rows="7"><?php
                        if(isset($_POST['IAS_endocrino'])){
                            echo $_POST['IAS_endocrino'];
                        }else{
                            echo "Baja/aumento peso\nIntolerencia al frío/calor\nMucha sed\nMucha hambre\nSomnolencia\nSequedad piel\nEsterilidad";
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_nervioso">
                        <span>Ap. Nervioso: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_nervioso" name="IAS_nervioso" rows="8"><?php
                        if(isset($_POST['IAS_nervioso'])){
                            echo $_POST['IAS_nervioso'];
                        }else{
                            echo "Cefalea\nMareos/vértigos\nProblemas coordinación\nParalísis\nPérdida sensibilidad\nDolor lumbar/Otros\nCansancio\nEmociones";
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="IAS_visual">
                        <span>Ap. Visual: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_visual" name="IAS_visual" rows="4"><?php
                        if(isset($_POST['IAS_visual'])){
                            echo $_POST['IAS_visual'];
                        }else{
                            echo "Alteraciones visuales\nDolor\nSecreción palpebral\nOjo rojo";
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_auditivo">
                        <span>Ap. Auditivo: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_auditivo" name="IAS_auditivo" rows="5"><?php
                        if(isset($_POST['IAS_auditivo'])){
                            echo $_POST['IAS_auditivo'];
                        }else{
                            echo "Dolor de oídos\nAlteración de oídos\nTinnitus\nProblemas de audición\nEpistaxis";
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="IAS_musesq">
                        <span>Ap. Músculo Esquelético: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_musesq" name="IAS_musesq" rows="4"><?php
                        if(isset($_POST['IAS_musesq'])){
                            echo $_POST['IAS_musesq'];
                        }else{
                            echo "Dolor huesos\nTendones\nMúsculos\nArticulaciones";
                        }
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_otros">
                        <span>Otros: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_otros" name="IAS_otros" rows="2"></textarea><?php
                        if(isset($_POST['IAS_otros'])){
                            echo $_POST['IAS_otros'];
                        }
                    ?>
                </div>
            </div>
        </div>

<!-- Examen físico -->
        <div class="container my-4 ms-2 formulario">
            <h2><b>Examen físico</b></h2>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="paciente_observacion">
                        <span>Observación: </span>
                    </label><br>
                    <textarea class="largeinput" id="paciente_observacion" name="paciente_observacion" rows="2"><?php
                        if(isset($_POST['paciente_observacion'])){
                            echo $_POST['paciente_observacion'];
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="auscultacion">
                        <span>Palpación/Auscultación: </span>
                    </label><br>
                    <textarea class="largeinput" id="auscultacion" name="auscultacion"
                    rows="2"><?php
                        if(isset($_POST['auscultacion'])){
                            echo $_POST['auscultacion'];
                        }                        
                    ?></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="iridologia_izq">
                        <span>IRIS IZQ: </span>
                    </label><br>
                    <textarea class="largeinput" id="iridologia_izq" name="iridologia_izq"
                    rows="2"><?php
                        if(isset($_POST['iridologia_izq'])){
                            echo $_POST['iridologia_izq'];
                        }
                    ?></textarea>
                </div>
                <div class="col">
                    <label for="iridologia_der">
                        <span>IRIS DER: </span>
                    </label><br>
                    <textarea class="largeinput" id="iridologia_der" name="iridologia_der"
                    rows="2"><?php
                        if(isset($_POST['iridologia_der'])){
                            echo $_POST['iridologia_der'];
                        }
                    ?></textarea>
                </div>
            </div>
            <h3><b>Signos</b></h3>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="estatura">
                        <span>Estatura: </span>
                    </label>
                    <?php
                        echo '<input type="number" id="estatura" name="estatura" size="5" value="';
                        if(isset($_POST['estatura'])){
                            echo $_POST['estatura'];
                        }
                        echo '">';
                    ?>
                    <span>m</span>
                </div>
                <div class="col">
                    <label for="temperatura">
                        <span>Temperatura: </span>
                    </label>
                    <?php
                        echo '<input type="number" id="temperatura" name="temperatura" size="5" value="';
                        if(isset($_POST['temperatura'])){
                            echo $_POST['temperatura'];
                        }
                        echo '">';
                    ?>
                    <span>°C</span>
                </div>
                <div class="col">
                    <label for="oxigenacion">
                        <span>Oxigenación: </span>
                    </label>
                    <?php
                        echo '<input type="number" id="oxigenacion" name="oxigenacion" size="5" value="';
                        if(isset($_POST['oxigenacion'])){
                            echo $_POST['oxigenacion'];
                        }
                        echo '">';
                    ?>
                    <span>%</span>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="FC">
                        <span>FC: </span>
                    </label>
                    <?php
                        echo '<input type="number" id="FC" name="FC" size="5" value="';
                        if(isset($_POST['FC'])){
                            echo $_POST['FC'];
                        }
                        echo '">';
                    ?>
                    <span>lat/min</span>
                </div>
                <div class="col">
                    <label for="peso">
                        <span>Peso: </span>
                    </label>
                    <?php
                        echo '<input type="number" id="peso" name="peso" size="5" value="';
                        if(isset($_POST['peso'])){
                            echo $_POST['peso'];
                        }
                        echo '">';
                    ?>
                    <span>kg</span>
                </div>
                <div class="col-6">
                    <label for="PAS">
                        <span>Presión arterial: </span>
                    </label>
                    <?php
                        echo '<input type="number" id="PAS" name="PAS" size="5" value="';
                        if(isset($_POST['PAS'])){
                            echo $_POST['PAS'];
                        }
                        echo '">';
                    ?>
                    <span>/</span>
                    <?php
                        echo '<input type="number" id="PAD" name="PAD" size="5" value="';
                        if(isset($_POST['PAD'])){
                            echo $_POST['PAD'];
                        }                        
                        echo '">';
                    ?>
                </div>
            </div>
        </div>

<!-- Recomendaciones y tratamiento -->
        <div class="container my-4 ms-2 formulario">
            <h2><b>Recomendaciones y tratamiento</b></h2>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="recomendacion">
                        <span><b>Recomendaciones: </b></span>
                    </label><br>
                    <textarea class="largeinput" id="recomendacion" name="recomendacion"
                    rows="2"><?php
                        if(isset($_POST['recomendacion'])){
                            echo $_POST['recomendacion'];
                        }
                    ?></textarea>
                </div>
            </div>
            <h3><b>0o Tratamiento</b></h3>
            <div class="row row-cols-auto">
                <div class="col-9">
                    <span>N.-   </span>
                    <input type="text" id="medtx_capacidad" name="medtx_capacidad" size="9" placeholder="Capacidad">
                    <span>, </span>
                    <input type="text" id="medtx_dosis" name="medtx_dosis" size="15" placeholder="Dosis">
                    <span>, </span>
                    <input type="text" id="medtx_nombre" name="medtx_nombre" size="40" placeholder="Nombre de medicamento">
                    <span> (</span>
                    <input type="text" id="medtx_leyenda" name="medtx_leyenda" size="20" placeholder="¿Para qué sirve?">
                    <span>)</span>
                </div>
                <div class="col">
                    <button type="submit" style="padding-inline: 5px 5px;" hidden>Agregar otro medicamento</button>
                </div>
            </div>
        </div>

<!-- Ingresos de consulta -->
        <div class="container my-4 ms-2 formulario">
            <h2><b>Cobro de consulta y tratamiento</b></h2>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="ingreso">
                        <span>Cantidad ingresada: $</span>
                    </label>
                    <?php
                        echo '<input type="number" id="ingreso" name="ingreso" size="7" value="';
                        if(isset($_POST['ingreso'])){
                            echo $_POST['ingreso'];
                        }
                        echo '">';
                    ?>
                </div>
                <div class="col">
                    <button type="submit" style="padding-inline: 5px 5px;">Guardar dato</button>
                </div>
            </div>
        </div>

        <div class="container ms-2 ultimo">
            <button class="submit" type="submit" name="redactar_receta" hidden>Redactar receta</button>
            <button class="submit" type="submit" name="terminar_consulta">Terminar consulta</button>
        </div>
    </form>
    <script src="scripts-js/fecha-actual-consulta.js"></script>
</body>

</html>