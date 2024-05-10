// Obtener el valor del parámetro 'dia' de la URL

var urlParams = new URLSearchParams(window.location.search);
var diaURL = parseInt(urlParams.get('dia'));

// Obtener todos los elementos <a> con la clase 'dia'
var elementosDia = document.querySelectorAll('.dia');

// Iterar sobre los elementos para encontrar el que coincida con el día de la URL
elementosDia.forEach(function (elemento) {
    var contenidoDia = parseInt(elemento.textContent); // Obtener el número del día del contenido del elemento
    if (contenidoDia === diaURL) {
        // Si el contenido del elemento coincide con el día de la URL, establecer el color de fondo del <td>
        var tdElemento = elemento.parentElement;
        tdElemento.style.backgroundColor = 'lightblue'; // Cambia 'lightblue' por el color que desees
    }
});
var idHoraURL = "hora" + parseInt(urlParams.get('idhora'));
if (document.getElementById(idHoraURL))
    document.getElementById(idHoraURL).style.backgroundColor = 'lightblue';

document.getElementById("btnReserva").onclick = () => {

    const params = new URLSearchParams(window.location.search);
    const fechaActual = new Date();
    // Obtener el mes actual
    let mesActual = (fechaActual.getMonth() + 1).toString();
    // Añadir un cero al principio si el mes es menor que 10
    mesActual = mesActual.padStart(2, '0');
    // Obtener el año actual
    const anioActual = fechaActual.getFullYear();

    // Obtener el valor de un parámetro específico
    let idpista = document.getElementById("pista").value;
    const pista_id = params.get('pista_id') == null ? idpista : params.get('pista_id');
    const dia = params.get('dia');
    const mes = params.get('mes') == null ? mesActual : params.get('mes');
    const anio = params.get('anio') == null ? anioActual : params.get('anio');
    const idhora = params.get('idhora');
    if (dia == null || idhora == null) {
        alert("Falta seleccionar dia y hora para reservar")
    } else {
        // Obtener la ruta actual
        const rutaActual = window.location.pathname;
        let fecha=anio+mes.toString().padStart(2,'0')+dia.toString().padStart(2,'0');
        // Obtener la parte de la ruta sin el nombre del archivo PHP
        const directorioRaiz = rutaActual.substring(0, rutaActual.lastIndexOf('/'));
        let url=directorioRaiz+"/reservar.php?idpista="+pista_id+"&fecha="+fecha+"&idhora="+idhora;
        // Cargar la URL en el navegador
        window.location.href = url;
    }
}