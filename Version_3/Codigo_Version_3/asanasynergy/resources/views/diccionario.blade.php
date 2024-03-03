<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Tus etiquetas de head aquí -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posturas de Yoga</title>

    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

     <!-- CSS stylesheet -->
     <link rel="stylesheet" href="css\style.css">
    <!-- fuentes-->
    <link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&family=Titillium+Web&display=swap" rel="stylesheet">
	
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

</head>
<body class="d-flex flex-column">
    @include('header')

    @include('agregar_postura')
    @include('agregar_morfema')
    <main class="flex-grow-1">

        @include('barra_de_busqueda')
        @include('resultados_busqueda')
        

    </main>


    @include('footer')
     <script>
            $(document).ready(function() {
                $("#busqueda-form").submit(function(event) {
                    event.preventDefault();

                    var formData = $(this).serialize();

                    $.ajax({
                        url: "{{ route('diccionario.buscar') }}",
                        method: "POST",
                        data: formData,
                        success: function(response) {
                            // Actualiza el contenido de la página con los resultados
                            $("#resultados-busqueda").html(response);
                        }
                    });
                });
            });
            $(document).ready(function() {
                $('.multiple').select2();
            });

            document.getElementById('postura_form').addEventListener('submit', function(event) {
            event.preventDefault(); // Evita que el formulario se envíe de forma predeterminad

            // Obtener el valor del campo #termino_spanish y reemplazar los espacios en blanco con guiones bajos
            var termino_spanish = document.getElementById('termino_spanish').value.replace(/\s+/g, "_");

            var formData = new FormData(this);
            console.log(formData);
            $.ajax({
                url: "{{ route('posturas.store') }}",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // Actualiza el contenido de la página con los resultados
                    //redirigir a la página de inicio
                    window.location.href = "{{ route('diccionario.index') }}";
                    
                }
            });
        });

            

    </script>
</body>
</html>