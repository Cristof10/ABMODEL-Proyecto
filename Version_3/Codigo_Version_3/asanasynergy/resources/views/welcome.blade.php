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
	
</head>
<body class="d-flex flex-column">
    <?php include("header.php"); ?>


    <main class="flex-grow-1">
        <?php include("barra_de_busqueda.php"); ?>

        <div class="container">
        <h2>Resultados de la búsqueda</h2>
        <?php if (!empty($resultados->posturas)) : ?>
        <h4>Posturas</h4>
        

        <div class="row">
            <?php foreach ($resultados->posturas as $postura) : ?>
                <?php $imagenURL = "images/" . $postura->getImagenURL(); ?>
                <div class="col-sm-3 col-xs-6 mb-3">
                    <a href="detalle_postura.php?id=<?php echo $postura->getTerminoID(); ?>" class="card h-100 link-underline-opacity-0 text-decoration-none">
                        <div>
                            <img src="<?php echo $imagenURL; ?>" class="card-img-top img-fluid" alt="<?php echo $postura->getTerminoSanskrit(); ?>">
                        </div>

                        <div class="card-body">
                            <h5 class="card-title"><?php echo $postura->getTerminoSanskrit(); ?></h5>
                            <p class="card-text">
                                <strong>Inglés:</strong> <?php echo $postura->getTerminoEnglish() ?><br>
                                <strong>Español:</strong> <?php echo $postura->getTerminoSpanish() ?><br>
                            </p>
                        </div>
                    </a>
                </div>
            <?php endforeach; ?>

        </div>
        <?php endif; ?>
        <?php if (!empty($resultados->morfemas)) : ?>
        <h4>Morfemas</h4>

        <div class="row">
            <?php foreach ($resultados->morfemas as $morfema) : ?>
                <div class="col-sm-4 mb-3">
                    <div class="card h-100">
                        <div class="card-body">
                            <p class="card-text">
                                <strong>Sánscrito:</strong> <?php echo $morfema->getMorfemaSanskrit() ?><br>
                                <strong>Español:</strong> <?php echo $morfema->getMorfemaSpanish() ?><br>
                                <strong>Inglés:</strong> <?php echo $morfema->getMorfemaEnglish() ?><br>
                            </p>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

        </div>
        <?php endif; ?>
        <?php if (empty($resultados->posturas) && empty($resultados->morfemas)) : ?>
        <div class="col-sm-12 text-center">
            <h3>No hay datos disponibles.</h3>
            <p>Por favor, intenta con otra búsqueda.</p>
        </div>
        <?php endif; ?>
        </div>
        

    </main>


    <?php include("footer.php"); ?>
</body>
</html>