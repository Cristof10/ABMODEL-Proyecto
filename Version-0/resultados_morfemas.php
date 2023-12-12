<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
	<!-- CSS stylesheet -->
	<link rel="stylesheet" href="css\style.css">
</head>
<body>
<div class="container">
    <div class="row">
        <?php 
        if (!empty($morfemas) && is_array($morfemas)) {
            foreach ($morfemas as $morfema) { ?>
                <div class="col-sm-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">
                                <strong>Sánscrito:</strong> <?php echo $morfema['morfemaSanskrit'] ?><br>
                                <strong>Español:</strong> <?php echo $morfema['morfemaSpanish'] ?><br>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } }
        else {
            // Si $morfemas está vacío o no es un arreglo, puedes mostrar un mensaje o tomar la acción correspondiente
            echo "<div class='col-sm-12 text-center'>";
            echo "<h2>No hay datos disponibles.</h2>";
            echo "<p>Por favor, intenta con otra búsqueda.</p>";
            echo "</div>";
        } ?>
    </div>
</div>


</body>
</html>