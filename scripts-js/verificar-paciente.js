const paciente_nombre = document.getElementById("paciente_nombre");
const fecha_1consulta = document.getElementById("fecha_1consulta");
const lista_nombres = document.getElementById("lista_nombres");
const lista_fechas = document.getElementById("lista_fechas_1consulta");
const lista_estudio_doc = document.getElementById("lista_estudio_doc");
const lista_estudio_fecha = document.getElementById("lista_estudio_fecha");
const estudio_doc = document.getElementById("estudio_doc_text");
const estudio_fecha = document.getElementById("estudio_fecha");
const btn_agregar_parametro = document.getElementById("btn_agregar_parametro");

var num_parametros = 1;

paciente_nombre.addEventListener("input",input_paciente_nombre);
fecha_1consulta.addEventListener("change",change_fecha_1consulta);
btn_agregar_parametro.addEventListener("click",click_btn_agregar_parametro);

function input_paciente_nombre(){
    if(paciente_nombre.value.length >= 4){
        let valores = lista_nombres.getElementsByTagName("option");
        for(let i=0; i<valores.length; i++)
            if(paciente_nombre.value == valores[i].value){
                //Buscar fecha(s) de 1° consulta a partir del nombre del paciente
                $.ajax({
                    method: "POST",
                    url: "scripts-php/integracion-js.php",
                    data: {nombre_para_fecha: paciente_nombre.value}
                }).done(function (response){
                    lista_fechas.innerHTML = response;
                });
                //El nombre del paciente ya corresponde a una opción de lista_nombres
                //Evitar volver a consultar nombres y cambiar lista_nombres
                return;
            }
        $.ajax({
            method: "POST",
            url: "scripts-php/integracion-js.php",
            data: {termino_nombre: paciente_nombre.value}
        }).done(function (response){
            lista_nombres.innerHTML = response;
        });
    }else{
        lista_nombres.innerHTML = "";
    }
}

function change_fecha_1consulta(){
    if(fecha_1consulta.value != ""){
        $.ajax({
            method: "POST",
            url: "scripts-php/integracion-js.php",
            data: {paciente_nombre_estudio: paciente_nombre.value,
                fecha_1consulta_estudio: fecha_1consulta.value}
        }).done(function (response){
            let listas = response.split("\n");
            lista_estudio_doc.innerHTML = listas[0];
            lista_estudio_fecha.innerHTML = listas[1];
        });
        estudio_doc.addEventListener("change",change_estudio_doc);
        estudio_fecha.addEventListener("change",change_estudio_fecha);
    }else{
        lista_estudio_doc.innerHTML = "";
        lista_estudio_fecha.innerHTML = "";
        estudio_doc.removeEventListener("change",change_estudio_doc);
        estudio_fecha.removeEventListener("change",change_estudio_fecha);
    }
}

function change_estudio_doc(){
    let valores = lista_estudio_doc.getElementsByTagName("option");
    for(let i=0; i<valores.length; i++)
        if(estudio_doc.value == valores[i].value){
            estudio_fecha.value = lista_estudio_fecha.getElementsByTagName("option")[i].value;
            rellenar_parametros();
            return;
        }
    limpiar_parametros();
}

function change_estudio_fecha(){
    rellenar_parametros();
    let valores = lista_estudio_fecha.getElementsByTagName("option");
    for(let i=0; i<valores.length; i++)
        if(estudio_fecha.value == valores[i].value){
            estudio_doc.value = lista_estudio_doc.getElementsByTagName("option")[i].value;
            return;
        }
    limpiar_parametros();
}

function click_btn_agregar_parametro(){
    let params_anterior = document.getElementById("params"+num_parametros);
    num_parametros++;
    let params = document.createElement("div");
    params.id = "params"+num_parametros;
    params.className = "row row-cols-auto";
    params.innerHTML = `<div class="col">
    <label for="param_nombre">
        <span>Nombre: </span>
    </label>
    <input type="text" id="param_nombre`+num_parametros+`" name="param_nombre`+num_parametros+`" size="18">
</div>
<div class="col">
    <label for="param_valor">
        <span>Valor: </span>
    </label>
    <input type="text" id="param_valor`+num_parametros+`" name="param_valor`+num_parametros+`" size="15">
</div>
<div class="col">
    <label for="param_rango">
        <span>Rango: </span>
    </label>
    <input type="text" id="param_rango`+num_parametros+`" name="param_rango`+num_parametros+`" size="15">
</div>
<div class="col">
    <label for="param_observacion">
        <span>Observación: </span>
    </label><br/>
<textarea class="largeinput" id="param_observacion`+num_parametros+`" name="param_observacion`+num_parametros+`" rows="3"></textarea>
</div>`
    params_anterior.insertAdjacentElement("afterend",params);
    document.getElementById("num_params").setAttribute("value",num_parametros);
}

function rellenar_parametros(){
    $.ajax({
        method: "POST",
        url: "scripts-php/integracion-js.php",
        data: {paciente_nombre_parametro: paciente_nombre.value,
            fecha_1consulta_parametro: fecha_1consulta.value,
            estudio_fecha_parametro: estudio_fecha.value}
    }).done(function (response){
        let lineas = response.split("\n");
        for(let j=0; j<Math.floor(lineas.length/4); j++){
            document.getElementById("param_nombre"+(j+1)).value = lineas[j*4];
            document.getElementById("param_valor"+(j+1)).value = lineas[j*4+1];
            document.getElementById("param_rango"+(j+1)).value = lineas[j*4+2];
            document.getElementById("param_observacion"+(j+1)).value = lineas[j*4+3];
            btn_agregar_parametro.click();
        }
    });
}

function limpiar_parametros(){
    for(let j=1; j<=num_parametros; j++){
        document.getElementById("param_nombre"+j).value = "";
        document.getElementById("param_valor"+j).value = "";
        document.getElementById("param_rango"+j).value = "";
        document.getElementById("param_observacion"+j).value = "";
    }
}