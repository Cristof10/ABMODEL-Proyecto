<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

     <!-- CSS stylesheet -->
     <link rel="stylesheet" href="css\style.css">
     <script src="js\app.js"></script>


    <title>Document</title>
</head>
<body>
    <div class="container py-5" style="max-width: 600px; margin: auto;">
        <h1 class="mb-4 titulo">DICCIONARIO DE YOGA</h1>
        <form action="busqueda_por_palabra_clave.php" method="get">
            <div class="d-flex mb-3">
                <div class="col-3 me-3">
                    <div class="input-group me-3">
                        <select class="form-select" id="filterOptions" name="filterOptions">
                            <option value="postura" selected>Postura</option>
                            <option value="morfema">Morfema</option>
                        </select>
                    </div>
                </div>
                
                <div class="input-group me-3" style="flex-grow: 1; max-width: 300px;">
                    <span class="input-group-text" id="basic-addon1"><i class="bi bi-search"></i></span>
                    <input type="search" class="form-control" id="keyword" name="keyword" placeholder="Escriba aquí" required>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>


    <script>
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
                alert('No se permiten números en este campo.');
            }
        });
        document.querySelector('form').addEventListener('submit', function(event) {
            var input = document.getElementById('keyword').value;
            if(!validarInput(input)) {
                event.preventDefault();
                alert('Entrada no válida. Por favor, solo usa caracteres permitidos.');
            }
        });


    </script>

</body>
</html>