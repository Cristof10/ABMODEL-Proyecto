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
//validacion de entrada de números en el form de busqueda
document.getElementById('keyword').addEventListener('input', function (e) {
var regex = /\d/g; // Expresión regular para buscar números
    if (regex.test(e.target.value)) {
        e.target.value = e.target.value.replace(regex, ''); // Elimina los números
        alert('Error: Campo no válido. Por favor, ingrese solo letras en este campo y evite usar números.');
        

        
    }
});
//validacion de entrada de caracteres especiales en el form de busqueda
document.querySelector('form').addEventListener('submit', function(event) {
    var input = document.getElementById('keyword').value;
    if(!validarInput(input) && input != "") {
        event.preventDefault();
        alert('Error: Campo no válido. Por favor, ingrese al menos una letra o carácter válido.');
    }
});
//validacion de entrada null en el form de busqueda
document.querySelector('form').addEventListener('submit', function(event) {
    var input = document.getElementById('keyword');
    if(input.value.trim() == "") {
        event.preventDefault();
        alert('Error: Campo vacío. Por favor, use solo letras y caracteres válidos');
        input.focus();
    }
});
//cuando se detecte un cambio en el filtro se llame a la funcion de filtrado
document.getElementById('filterOptions').addEventListener('change', function() {
    filter(localStorage.getItem('filterOptions'));
});
