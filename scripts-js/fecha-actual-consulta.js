//Guardar fecha actual en variable d
let d = new Date();
//Obtener string de la fecha en formato ISO-8601
let s = d.getFullYear() + "-" + ("0"+d.getMonth()).slice(-2) + "-" + ("0"+d.getDate()).slice(-2);

//Asignar fecha actual al campo de fecha de consulta
const input_fecha_consulta = document.querySelector("#fecha_consulta");
input_fecha_consulta.setAttribute("value",s);