<?php
    error_reporting(E_ALL^E_STRICT);
    ini_set('display_errors', 'on');
    ini_set('date.timezone','America/Mexico_City');
//    include_once 'mysql.php';
    include("terminarConsulta.php");

    $mysql_consulta = new mysql_consulta();

    if(!empty($_POST)){
        $mysql_consulta->terminar_consulta();
        var_dump($_POST);
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Pagina con formulario que se llena durante una consulta">
    <title> Consulta </title>
    <link href="styles/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href=Constyle.css>
    <script src="https://kit.fontawesome.com/b85031486b.js" crossorigin="anonymous"></script>
</head>

<body>
    <header hidden>
        <a href="#" class="logo">
            <span>M&B&S</span> Mint, Body and Spirit
        </a>
        <input type="checkbox" id="menu">
        <label for="menu" class="fa-solid fa-bars"></label>

        <nav class="navbar">
            <a href="Principalindex.html">Regresar</a>
            <a href="#">Guardar</a>
        </nav>
    </header>

    <div class="primero container ms-2">
        <div class="row">
            <div class="col">
                <h1 style="font-size: 4rem;">Consulta</h1>
            </div>
        </div>
    </div>

    <form method = "POST" enctype="multipart/form-data" autocomplete="off">
<!-- Ficha de identificación -->
        <div class="container my-4 ms-2 formulario">
            <h2><b>Ficha de identificación</b></h2>
            <div class="row row-cols-auto">
                <div class="col-6">
                    <label for="paciente_nombre">
                        <span>Nombre completo: </span>
                    </label>
                    <input type="text" id="paciente_nombre" name="paciente_nombre" size="40">
                </div>
                <div class="col-4">
                    <label for="fecha_1consulta">
                        <span>Fecha de 1a consulta: </span>
                    </label>
                    <input type="date" id="fecha_1consulta" name="fecha_1consulta" max="" value="">
                </div>
                <div class="col">
                    <button type="submit" style="padding-inline: 5px 5px;">Buscar paciente</button>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col-6">
                    <label for="paciente_nombre_comun">
                        <span>Nombre común: </span>
                    </label>
                    <input type="text" id="paciente_nombre_comun" name="paciente_nombre_comun" size="40"
                    placeholder="¿Cómo quiere el paciente que le llamen?">
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="paciente_tel">
                        <span>Teléfono: </span>
                    </label>
                    <input type="tel" id="paciente_tel" name="paciente_tel" size="12">
                </div>
                <div class="col">
                    <label for="paciente_tel_tipo">
                        <span>Tipo: </span>
                    </label>
                    <input type="text" id="paciente_tel_tipo" name="paciente_tel_tipo"
                    placeholder="Móvil, casa, WhatsApp, etc." size="25">
                </div>
                <div class="col">
                    <button type="submit" style="padding-inline: 5px 5px;">Agregar otro teléfono</button>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="paciente_email">
                        <span>Email: </span>
                    </label>
                    <input type="email" id="paciente_email" name="paciente_email" size="50">
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="paciente_direccion">
                        <span>Dirección: </span>
                    </label>
                    <input type="text" id="paciente_direccion" name="paciente_direccion" size="80">
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="paciente_fecha_nac">
                        <span>Fecha de nacimiento: </span>
                    </label>
                    <input type="date" id="paciente_fecha_nac" name="paciente_fecha_nac" max="">
                </div>
                <div class="col">
                    <label for="paciente_edad">
                        <span>Edad: </span>
                    </label>
                    <input type="number" id="paciente_edad" name="paciente_edad">
                    <span>años</span>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <span>¿Hijos? </span>
                    <label for="paciente_hijos_status_si">
                        <input type="radio" id="paciente_hijos_status_si" name="paciente_hijos_status"
                        value="1">
                        Sí
                    </label>
                    <label for="paciente_hijos_status_no">
                        <input type="radio" id="paciente_hijos_status_no" name="paciente_hijos_status"
                        value="0">
                        No
                    </label>
                </div>
                <div class="col">
                    <label for="paciente_ocupacion">
                        <span>Ocupación: </span>
                    </label>
                    <input type="text" id="paciente_ocupacion" name="paciente_ocupacion">
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
                    <button type="submit" style="padding-inline: 5px 5px;">Agregar otra vacuna</button>
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
                    <input type="date" id="fecha_consulta" name="fecha_consulta" max="">
                </div>
                <div class="col">
                    <label for="num_consulta">
                        <span>Consulta #</span>
                    </label>
                    <input type="number" id="num_consulta" name="num_consulta" value="0" maxlength="3">
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
                    rows="3"></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="sintomas">
                        <span>Síntomas: </span>
                    </label><br>
                    <textarea class="largeinput" id="sintomas" name="sintomas"
                    rows="3"></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="emociones">
                        <span>Emociones: </span>
                    </label><br>
                    <textarea class="largeinput" id="emociones" name="emociones"
                    rows="2"></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="APP-TX actual">
                        <span>APP-TX: </span>
                    </label><br>
                    <textarea class="largeinput" id="APP-TX" name="APP-TX"
                    rows="4"></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="HEA">
                        <span>Historia de enfermedad actual (HEA): </span>
                    </label><br>
                    <textarea class="largeinput" id="HEA" name="HEA" rows="4"></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="agrava">
                        <span>Agrava: </span>
                    </label><br>
                    <textarea class="largeinput" id="agrava" name="agrava" rows="3"></textarea>
                </div>
                <div class="col">
                    <label for="mejora">
                        <span>Mejora: </span>
                    </label><br>
                    <textarea class="largeinput" id="mejora" name="mejora" rows="3"></textarea>
                </div>
                <div class="col">
                    <label for="antojos">
                        <span>Antojos: </span>
                    </label><br>
                    <textarea class="largeinput" id="antojos" name="antojos" rows="3"></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="AHF">
                        <span>AHF: </span>
                    </label><br>
                    <textarea class="largeinput" id="AHF" name="AHF" rows="15">
Artritis
Cáncer
Cardiopatías
Colesterol/triglicéridos
Diabetes
HTA
Epilepsia
Malformaciones
Obesidad
Trastornos mentales
Toxicomanías
ITS
Tuberculosis
Otros
Fallecimientos, edad y causa</textarea>
                </div>
                <div class="col">
                    <label for="APNP">
                        <span>APNP: </span>
                    </label><br>
                    <textarea class="largeinput" id="APNP" name="APNP" rows="9">
Ejercicio
Grupo Sanguíneo
Hospitalizado
Adicciones: tabaco, alcohol, café
Método anticonceptivo
Comidas al día
Convivencia con animales
Dieta diaria
Inmunizaciones recientes</textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="APP">
                        <span>APP: </span>
                    </label><br>
                    <textarea class="largeinput" id="APP" name="APP" rows="13">
Estudios de laboratorio
Transfusiones de sangre
Enfermedades actuales
Alergias
Asma
Artritis
Cáncer
Hepátitis
Colesterol/triglícéridos
Diabetes
HTA
Malformaciones
Trastornos</textarea>
                </div>
                <div class="col">
                    <label for="AGO">
                        <span>AGO: </span>
                    </label><br>
                    <textarea class="largeinput" id="AGO" name="AGO" rows="7">
Menarca
Método anticonceptivo
Fecha última menstruación
Partos (césarea, natural, abortos)
ITS
Infertilidad
Estudio Papanicolau</textarea>
                </div>
            </div>
            <h3><b>IAS</b></h3>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_general">
                        <span>Síntomas generales: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_general" name="IAS_general" rows="8">
Fiebre
Cambio de peso
Malestar general
Cambio apetito
Sudoración
Insomnio
Dolor(SIDIDACET)
Edo de ánimo</textarea>
                </div>
                <div class="col">
                    <label for="IAS_respiratorio">
                        <span>Ap. Respiratorio: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_respiratorio" name="IAS_respiratorio" rows="5">
Disnea
Tos
Expectoración
Hemoptisis
Dolor</textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_cardiovascular">
                        <span>Ap. Cardiovascular: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_cardiovascular" name="IAS_cardiovascular" rows="16">
Disnea esfuerzo
Disnea acostado
Edema
Dolor precordial
Hipertensión arterial
Obstrucción nasal
Epistaxis
Ruido oídos
Disfonía
Ver manchas luminosas
Dolor torácico
Palpitaciones
Cianosis
Sudoración excesiva
Várices
Moretones</textarea>
                </div>
                <div class="col">
                    <label for="IAS_gastrointestinal">
                        <span>Ap. Gastrointestinal: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_gastrointestinal" name="IAS_gastrointestinal" rows="17">
Mal aliento
Sed
Caries
Dolor dientes
Dolor
Apetito/anorexia
Náusea/vómito
Disfagia
Pirosis
Diarrea/constipación/tenesmo
Melena
Regurgitaciones/borborismos
Sangrado recto
Hipo/eruptos/flatulencias
Meteorismo
Heces
Prurito anal</textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_genitourinario">
                        <span>Ap. Genitourinario: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_genitourinario" name="IAS_genitourinario" rows="7">
Dolor al orinar
Frec micciones
Cantidad
Se levanta a orinar
Secrecciones/sangre
Incontinencia
Color</textarea>
                </div>
                <div class="col">
                    <label for="IAS_endocrino">
                        <span>Ap. Endocrino: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_endocrino" name="IAS_endocrino" rows="7">
Baja/aumento peso
Intolerencia al frío/calor
Mucha sed
Mucha hambre
Somnolencia
Sequedad piel
Esterilidad</textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_nervioso">
                        <span>Ap. Nervioso: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_nervioso" name="IAS_nervioso" rows="8">
Cefalea
Mareos/vértigos
Problemas coordinación
Paralísis
Pérdida sensibilidad
Dolor lumbar/Otros
Cansancio
Emociones</textarea>
                </div>
                <div class="col">
                    <label for="IAS_visual">
                        <span>Ap. Visual: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_visual" name="IAS_visual" rows="4">
Alteraciones visuales
Dolor
Secreción palpebral
Ojo rojo</textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_auditivo">
                        <span>Ap. Auditivo: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_auditivo" name="IAS_auditivo" rows="5">
Dolor de oídos
Alteración de oídos
Tinnitus
Problemas de audición
Epistaxis</textarea>
                </div>
                <div class="col">
                    <label for="IAS_musesq">
                        <span>Ap. Músculo Esquelético: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_musesq" name="IAS_musesq" rows="4">
Dolor huesos
Tendones
Músculos
Articulaciones</textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="IAS_otros">
                        <span>Otros: </span>
                    </label><br>
                    <textarea class="largeinput" id="IAS_otros" name="IAS_otros" rows="2"></textarea>
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
                    <textarea class="largeinput" id="paciente_observacion" name="paciente_observacion"
                    rows="2"></textarea>
                </div>
                <div class="col">
                    <label for="auscultacion">
                        <span>Palpación/Auscultación: </span>
                    </label><br>
                    <textarea class="largeinput" id="auscultacion" name="auscultacion"
                    rows="2"></textarea>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="iridologia_izq">
                        <span>IRIS IZQ: </span>
                    </label><br>
                    <textarea class="largeinput" id="iridologia_izq" name="iridologia_izq"
                    rows="2"></textarea>
                </div>
                <div class="col">
                    <label for="iridologia_der">
                        <span>IRIS DER: </span>
                    </label><br>
                    <textarea class="largeinput" id="iridologia_der" name="iridologia_der"
                    rows="2"></textarea>
                </div>
            </div>
            <h3><b>Signos</b></h3>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="estatura">
                        <span>Estatura: </span>
                    </label>
                    <input type="number" id="estatura" name="estatura" size="5">
                    <span>m</span>
                </div>
                <div class="col">
                    <label for="temperatura">
                        <span>Temperatura: </span>
                    </label>
                    <input type="number" id="temperatura" name="temperatura" size="5">
                    <span>°C</span>
                </div>
                <div class="col">
                    <label for="oxigenacion">
                        <span>Oxigenación: </span>
                    </label>
                    <input type="number" id="oxigenacion" name="oxigenacion" size="5">
                    <span>%</span>
                </div>
            </div>
            <div class="row row-cols-auto">
                <div class="col">
                    <label for="FC">
                        <span>FC: </span>
                    </label>
                    <input type="number" id="FC" name="FC" size="5">
                    <span>lat/min</span>
                </div>
                <div class="col">
                    <label for="peso">
                        <span>Peso: </span>
                    </label>
                    <input type="number" id="peso" name="peso" size="5">
                    <span>kg</span>
                </div>
                <div class="col-6">
                    <label for="PA">
                        <span>Presión arterial: </span>
                    </label>
                    <input type="number" id="PA" name="PAS" size="5">
                    <span>/</span>
                    <input type="number" name="PAD" size="5">
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
                    rows="2"></textarea>
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
                    <button type="submit" style="padding-inline: 5px 5px;">Agregar otro medicamento</button>
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
                    <input type="number" id="ingreso" name="ingreso" size="7">
                </div>
                <div class="col">
                    <button type="submit" style="padding-inline: 5px 5px;">Guardar dato</button>
                </div>
            </div>
        </div>

        <div class="container ms-2 ultimo">
            <button class="submit" type="submit">Redactar receta</button>
            <button class="submit" type="submit">Terminar consulta</button>
        </div>
    </form>

</body>

</html>