function validarInput(input) {
    var caracteresPermitidos = /^[a-zA-ZñÑáéíóúÁÉÍÓÚüÜ' ]+$/;
    if(input.match(caracteresPermitidos)) {
        return true;
    } else {
        return false;
    }
}

// Almacena la selección del usuario en el almacenamiento local cuando se envía el formulario
document.querySelector('form').addEventListener('submit', function() {
    localStorage.setItem('filterOptions', document.getElementById('filterOptions').value);
});

// Recupera la selección del usuario del almacenamiento local cuando se carga la página
document.addEventListener('DOMContentLoaded', function() {
    var filterOptions = localStorage.getItem('filterOptions');
    if (filterOptions) {
        document.getElementById('filterOptions').value = filterOptions;
    }
});

document.getElementById('keyword').addEventListener('input', function (e) {
var regex = /\d/g; // Expresión regular para buscar números
    if (regex.test(e.target.value)) {
        e.target.value = e.target.value.replace(regex, ''); // Elimina los números
        alert('Oops, parece que hay un problema. Por favor, ingrese solo letras en este campo y evite usar números.'); 
    }
});
document.querySelector('form').addEventListener('submit', function(event) {
    var input = document.getElementById('keyword').value;
    if(!validarInput(input)) {
        event.preventDefault();
        alert('Ups, parece que hay un problema. Por favor, use solo letras y caracteres válidos.');
    }
});
//validacion de entrada null en el form de busqueda
document.querySelector('form').addEventListener('submit', function(event) {
    var input = document.getElementById('keyword');
    if(input.value.trim() == "") {
        event.preventDefault();
        alert('Oops, parece que hay un problema. Por favor, ingrese al menos una letra o carácter válido.');
        input.focus();
    }
});
//cuando se detecte un cambio en el filtro se llame a la funcion de filtrado
document.getElementById('filterOptions').addEventListener('change', function() {
    filter(localStorage.getItem('filterOptions'));
});
