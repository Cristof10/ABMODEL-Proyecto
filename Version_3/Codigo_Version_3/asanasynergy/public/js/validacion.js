

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


