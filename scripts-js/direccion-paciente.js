const estado = document.getElementById("paciente_dir_estado");
estado.addEventListener("change",change_estado);

const cp = document.getElementById("paciente_dir_cp");
cp.addEventListener("change",change_cp);

const municipio = document.getElementById("paciente_dir_municipio");
municipio.addEventListener("change",change_municipio);

const asentamiento = document.getElementById("paciente_dir_colonia");
asentamiento.addEventListener("change",change_asentamiento);

function change_cp(){
    if(this.value.length == 5){
        //Se selecciona automáticamente un estado
        $.ajax({
            method: "POST",
            url: "scripts-php/integracion-js.php",
            data: {cp_estado: cp.value}
        }).done(function (response){
            if(response.length == 0){
                alert("El código postal no existe");
                cp.value = "";
            }else{
                let opcion = document.getElementById("opt-estado-"+response);
                opcion.setAttribute("selected", "");

                //Se actualiza la lista de opciones de municipios y se selecciona automáticamente uno
                $.ajax({
                    method: "POST",
                    url: "scripts-php/integracion-js.php",
                    data: {cp_municipio: cp.value,
                        estado_municipio: estado.value}
                }).done(function (response){
                    console.log("Apunto de cambiar el municipio: "+response);
                    municipio.innerHTML = response;

                    //Se cambia la lista de asentamientos
                    $.ajax({
                        method: "POST",
                        url: "scripts-php/integracion-js.php",
                        data: {cp_asentamiento: cp.value}
                    }).done(function (response){
                        asentamiento.innerHTML = response;
                    });
                });
            }
        });
    }
}

function change_estado(){
    //Eliminar el campo de código postal
    cp.value = "";

    //Actualizar lista de municipios
    $.ajax({
        method: "POST",
        url: "scripts-php/integracion-js.php",
        data: {estado_municipio: estado.value}
    }).done(function (response){
        if(response.length == 0)
            municipio.innerHTML = '<option value="0">---</option>';
        else
            municipio.innerHTML = response;

        //Poner en "cero" los asentamientos, se llenaran hasta que se seleccione un municipio
        asentamiento.innerHTML = '<option value="0">---</option>';
    });
}

function change_municipio(){
    //Eliminar el campo de código postal
    cp.value = "";

    //Actualizar lista de asentamientos
    $.ajax({
        method: "POST",
        url: "scripts-php/integracion-js.php",
        data: {municipio_asentamiento: municipio.value,
            estado_asentamiento: estado.value}
    }).done(function (response){
        if(response.length == 0)
            asentamiento.innerHTML = '<option value="0">---</option>';
        else
            asentamiento.innerHTML = response;
    });
}

function change_asentamiento(){
    data_cp = asentamiento.selectedOptions[0].getAttribute("data-cp");
    if(data_cp != null)
        if(data_cp == 0)
            cp.value = "";
        else
            cp.value = data_cp;
}