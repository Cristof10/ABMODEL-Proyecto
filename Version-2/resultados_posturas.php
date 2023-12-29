
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.2/font/bootstrap-icons.min.css">

    <!-- CSS stylesheet -->
    <link rel="stylesheet" href="css\style.css">

    <title>Document</title>
</head>
<body>

<?php 
    $imagenURL
?>

<div class="container">
    <div class="row">
        <?php 
        if (!empty($posturas) && is_array($posturas)) {
            foreach ($posturas as $index => $postura) { ?>
                <?php $imagenURL = "images/" . $postura['imagenURL']; ?>
                <div class="col-sm-3 col-xs-6 mb-3">
                    <div class="card h-100">
                        <div >
                            <img src="<?php echo $imagenURL; ?>" class="card-img-top img-fluid" alt="<?php echo $postura['terminoSanskrit']; ?>">
                        </div>
                         
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $postura['terminoSanskrit']; ?></h5>
                            <p class="card-text">
                                <strong>Inglés:</strong> <?php echo $postura['terminoEnglish'] ?><br>
                                <strong>Español:</strong> <?php echo $postura['terminoSpanish'] ?><br>
                                <?php if (!empty($postura['morfemas'])) { ?>
                                    <strong>Morfemas:</strong><br>
                                    <?php foreach ($postura['morfemas'] as $morfemaInfo) { ?>
                                        <?php echo $morfemaInfo['traduccionMorfemaSanskrit'] ?>
                                        = <?php echo $morfemaInfo['traduccionMorfemaSpanish'] ?><br>
                                    <?php } ?>
                                <?php } else { ?>
                                    No hay morfemas relacionados.<br>
                                <?php } ?>
                            </p>
                        </div>
                    </div>
                </div>
            <?php } }
        else {
            // Si $posturas está vacío o no es un arreglo, puedes mostrar un mensaje o tomar la acción correspondiente
            echo "<div class='col-sm-12 text-center'>";
            echo "<h3>No hay datos disponibles.</h2>";
            echo "<p>Por favor, intenta con otra búsqueda.</p>";
            echo "</div>";
        } ?>
    </div>
</div>



</body>
</html>
