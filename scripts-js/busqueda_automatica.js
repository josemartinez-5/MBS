const paciente_nombre = document.getElementById("paciente_nombre");
paciente_nombre.addEventListener("input",input_paciente_nombre);

const lista_nombres = document.getElementById("lista_nombres");
const lista_fechas = document.getElementById("lista_fechas_1consulta"); 

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