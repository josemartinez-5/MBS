const tabs = document.getElementsByClassName("tablink");
const tabs_contenido = document.getElementsByClassName("tabcontenido");
for(let i=0; i<tabs_contenido.length; i++)
    tabs[i].addEventListener("click", click_tab);

function click_tab(){
    for(let i=0; i<tabs_contenido.length; i++)
        tabs_contenido[i].setAttribute("hidden","");
    for(let i=0; i<tabs.length; i++)
        tabs[i].style.backgroundColor = "darkgreen";
    switch(this.getAttribute("id")){
        case "tab_ficha_identificacion":
            tabs_contenido[0].removeAttribute("hidden");
            break;
        case "tab_identificacion_consulta":
            tabs_contenido[1].removeAttribute("hidden");
            break;
        case "tab_motivos_etc":
            tabs_contenido[2].removeAttribute("hidden");
            break;
        case "tab_examen_fisico":
            tabs_contenido[3].removeAttribute("hidden");
            break;
        case "tab_recomendaciones_tratamiento":
            tabs_contenido[4].removeAttribute("hidden");
            break;
        case "tab_cobro":
            tabs_contenido[5].removeAttribute("hidden");
    }
    this.style.backgroundColor = "rgb(131, 219, 131)";
}

tabs[0].click();