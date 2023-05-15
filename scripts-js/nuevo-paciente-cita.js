const nuevo_paciente_si = document.getElementById("nuevo_paciente_si");
const nuevo_paciente = document.getElementById("nuevo_paciente");
const div_fecha_1consulta = document.getElementById("div_fecha_1consulta");
const lista_nombres = document.getElementById("lista_nombres");
const lista_fechas = document.getElementById("lista_fechas_1consulta");
const div_periodicidad = document.getElementById("div_periodicidad");
const div_num_consulta = document.getElementById("div_num_consulta");

const nombre = document.getElementById("nombre");
const fecha_1consulta = document.getElementById("fecha_1consulta");
const edad = document.getElementById("edad");
const email = document.getElementById("email");
const telefono = document.getElementById("telefono");
const fecha_hora = document.getElementById("fecha_hora");
const periodicidad = document.getElementById("periodicidad");
const num_consulta = document.getElementById("num_consulta");

nuevo_paciente.addEventListener("click",click_nuevo_paciente);

function click_nuevo_paciente(){
    if(nuevo_paciente_si.checked){
        div_fecha_1consulta.setAttribute("hidden","");
        div_periodicidad.setAttribute("hidden","");
        nombre.removeEventListener("input",input_nombre);
        fecha_1consulta.removeEventListener("change",change_fecha_1consulta);
        periodicidad.removeEventListener("change",change_periodicidad);
    }
    else{
        div_fecha_1consulta.removeAttribute("hidden");
        div_periodicidad.removeAttribute("hidden");
        nombre.addEventListener("input",input_nombre);
        fecha_1consulta.addEventListener("change",change_fecha_1consulta);
        periodicidad.addEventListener("change",change_periodicidad);
    }
}

function input_nombre(){
    if(nombre.value.length >= 4){
        let valores = lista_nombres.getElementsByTagName("option");
        for(let i=0; i<valores.length; i++)
            if(nombre.value == valores[i].value){
                //Buscar fecha(s) de 1° consulta a partir del nombre del paciente
                $.ajax({
                    method: "POST",
                    url: "scripts-php/integracion-js.php",
                    data: {nombre_para_fecha: nombre.value}
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
            data: {termino_nombre: nombre.value}
        }).done(function (response){
            lista_nombres.innerHTML = response;
        });
    }else{
        lista_nombres.innerHTML = "";
    }
    fecha_1consulta.value = "";
    edad.value = "";
    email.value = "";
    telefono.value = "";
    fecha_hora.value = "";
    periodicidad.value = "";
}

function change_fecha_1consulta(){
    $.ajax({
        method: "POST",
        url: "scripts-php/integracion-js.php",
        data: {nombre_datos_cita: nombre.value,
            fecha_1consulta_datos_cita: fecha_1consulta.value}
    }).done(function (response){
        let datos = response.split("\n");
        let d = new Date();
        edad.value = datos[0];
        email.value = datos[1];
        telefono.value = datos[2];
        periodicidad.value = datos[3];
        num_consulta.innerHTML = datos[4];
        if(periodicidad.value != ""){
            d.setDate(d.getDate() + (periodicidad.value*7));
            let s = d.getFullYear() + "-" + ("0"+(d.getMonth()+1)).slice(-2) + "-" + ("0"+d.getDate()).slice(-2) + "T" + ("0"+d.getHours()).slice(-2) + ":00";
            fecha_hora.value = s;
        }
        console.log(fecha_1consulta.value);
        if(fecha_1consulta.value != "")
            div_num_consulta.removeAttribute("hidden");
        else
            div_num_consulta.setAttribute("hidden","");
    });
}

function change_periodicidad(){
    if(periodicidad.value != ""){
        let d = new Date();
        d.setDate(d.getDate() + (periodicidad.value*7));
        let s = d.getFullYear() + "-" + ("0"+(d.getMonth()+1)).slice(-2) + "-" + ("0"+d.getDate()).slice(-2) + "T" + ("0"+d.getHours()).slice(-2) + ":00";
        fecha_hora.value = s;
    }
}