<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Posturas de Yoga</title>

	<!-- CSS stylesheet -->
	<link rel="stylesheet" href="css\style.css">
    
	<!-- fuentes-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&family=Titillium+Web&display=swap" rel="stylesheet">
	
</head>
<body>
    <header class="py-sm-3 bg-primary">
        <h1 class="text-center titulo">ASANASYNERGY</h1>
    </header>
	<div class="fondo-principal">
	</div>
    <!-- botones para agregar morfema y postura -->
    <div class="container">
        <div class="pt-3 row ">
            <div class="col-2 d-flex flex-row bd-highlight mb-3">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarPosturaModal">Agregar Postura</a>
            </div>
            <div class="col-2 d-flex flex-row bd-highlight mb-3">
                <a class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#agregarMorfemaModal">Agregar Morfema</a>
            </div>
        </div>
    </div>


</body>
</html>
