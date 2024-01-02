<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- CSS de Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Posturas de Yoga</title>

	<!-- CSS stylesheet -->
	<link rel="stylesheet" href="css\style.css">
    <style>
        main{
            height: 750px;
            width: 100%;
            padding-top: 30px;
        }

        .fondo-video{
            height: 700px;
            background-color: #DDD;
            padding-top: 30px;
        }
    </style>
    <!-- fuentes-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>
    <!-- Obtener el valor de get -->
    <?php 
        include 'db_connection.php';
        include 'functions\buscar_todas_las_posturas.php';
        $id = $_GET['id'];
        $videoURL = $posturas[$id]['videoURL']; 
        $sql = "SELECT pd.terminoID, pd.terminoEnglish, pd.terminoSanskrit, pd.terminoSpanish, pd.imagenURL, pd.videoURL, GROUP_CONCAT(m.morfemaSanskrit) AS traduccionMorfemaSanskrit, GROUP_CONCAT(m.morfemaSpanish) AS traduccionMorfemaSpanish, GROUP_CONCAT(m.morfemaEnglish) AS traduccionMorfemaEnglish ";
        $sql = "SELECT pd.terminoID, pd.terminoEnglish, pd.terminoSanskrit, pd.terminoSpanish, pd.imagenURL, pd.videoURL, ";
        $sql .= "m.morfemaSanskrit AS traduccionMorfemaSanskrit, m.morfemaSpanish AS traduccionMorfemaSpanish, m.morfemaEnglish AS traduccionMorfemaEnglish ";
        $sql .= "FROM postura pd ";
        $sql .= "LEFT JOIN relacion_postura_morfema rpm ON pd.terminoID = rpm.terminoID ";
        $sql .= "LEFT JOIN morfema m ON rpm.morfemaID = m.morfemaID ";
        $sql .= "WHERE pd.terminoID = $id ";

        $resultado = mysqli_query($connection, $sql) or die(mysqli_error($connection));

        // Verificar si hay resultados
        if (mysqli_num_rows($resultado) > 0) {
            $posturas = array();

            // Iterar sobre los resultados y organizar la información por postura
            while ($fila = mysqli_fetch_assoc($resultado)) {
                $terminoID = $fila['terminoID'];
                $terminoEnglish = $fila['terminoEnglish'];
                $terminoSanskrit = $fila['terminoSanskrit'];
                $terminoSpanish = $fila['terminoSpanish'];
                $imagenURL = $fila['imagenURL'];
                $videoURL = $fila['videoURL'];

                // Organizar la información por postura
                if (!isset($posturas[$terminoID])) {
                    $posturas[$terminoID] = array(
                        'terminoID' => $terminoID,
                        'terminoEnglish' => $terminoEnglish,
                        'terminoSanskrit' => $terminoSanskrit,
                        'terminoSpanish' => $terminoSpanish,
                        'imagenURL' => $imagenURL,
                        'videoURL' => $videoURL,
                        // Agregar información de morfemas a la postura
                        'morfemas' => array()
                    );
                }

                // Verificar si hay morfemas relacionados antes de agregar la información de morfemas
                if (!empty($fila['traduccionMorfemaSanskrit']) || !empty($fila['traduccionMorfemaSpanish'])) {
                    // Agregar información de morfemas a la postura
                    $traduccionMorfemaSanskrit = $fila['traduccionMorfemaSanskrit'];
                    $traduccionMorfemaSpanish = $fila['traduccionMorfemaSpanish'];
                    $traduccionMorfemaEnglish = $fila['traduccionMorfemaEnglish'];

                    $posturas[$terminoID]['morfemas'][] = array(
                        'traduccionMorfemaSanskrit' => $traduccionMorfemaSanskrit,
                        'traduccionMorfemaSpanish' => $traduccionMorfemaSpanish,
                        'traduccionMorfemaEnglish' => $traduccionMorfemaEnglish
                    );
                }
            }
        }

    ?>


    <header class="py-sm-3 bg-primary">
        <h1 class="text-center titulo">ASANASYNERGY</h1>
    </header>

    <main>
        <div class="fondo-video container text-center">
            <div>
                <?php 
                if (!empty($posturas) && is_array($posturas)) {
                    foreach ($posturas as $index => $postura) { ?>
                        <?php $imagenURL = "images/" . $postura['imagenURL']; ?>
                        <div class="row mb-3 justify-content-center">
                            <div class="col-sm-6 col-xs-12 mb-3">
                                <div class="card h-100 link-underline-opacity-0 text-decoration-none">
                                    <div>
                                        <img src="<?php echo $imagenURL; ?>" class="card-img-top img-fluid" alt="<?php echo $postura['terminoSanskrit']; ?>" style="max-height: 250px; width: 300px;">
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-6 col-xs-12 mb-3">
                                <div class="card h-100 link-underline-opacity-0 text-decoration-none">
                                    <div class="card-body" style="background-color: #DDD;">
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
                        </div>
                    <?php } }
                else {
                    echo "<div class='col-sm-12 text-center'>";
                    echo "<h3>No hay datos disponibles.</h2>";
                    echo "<p>Por favor, intenta con otra búsqueda.</p>";
                    echo "</div>";
                } ?>
            </div>

            <h2>Video explicativo</h2>
            <iframe width="560" height="315" src="<?php echo $videoURL; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
        
    </main>

    <?php 
        include("footer.php");
    ?>
    <!-- 
        5. <iframe width="560" height="315" src="https://www.youtube.com/embed/2ZCBRdD-lE0?si=k96ekgtwj6-AZdAY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        7. <iframe width="560" height="315" src="https://www.youtube.com/embed/YiaUHv5o5ls?si=5Pj3AIr6Cm1KV88k" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        8. <iframe width="560" height="315" src="https://www.youtube.com/embed/wG0eR6W1Jxg?si=8rcQ3wcojh6ZXpvl" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        9. <iframe width="560" height="315" src="https://www.youtube.com/embed/Hgca0II_CKI?si=3KqpUGEBr0Uy_rXb" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>        
        10. <iframe width="560" height="315" src="https://www.youtube.com/embed/R-DB4qF6Egk?si=uA_QBiOPPJJezqmN" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>    
        11. <iframe width="560" height="315" src="https://www.youtube.com/embed/ioUcFTiBCcY?si=qx9Of1AF0qTs-vup" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        12. <iframe width="560" height="315" src="https://www.youtube.com/embed/OL1TFWREaMw?si=BmburCRf00fu12vM" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        13. <iframe width="560" height="315" src="https://www.youtube.com/embed/L57v0Lq9EcM?si=Y0QOUHdVN1p_Qm0T" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        14. <iframe width="560" height="315" src="https://www.youtube.com/embed/BAhOz-b_dEc?si=3pMeZ_GNtNIqkTHQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        15. <iframe width="560" height="315" src="https://www.youtube.com/embed/iAclKRoyOjU?si=qfVj5GAYL4DVCqh-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        16. <iframe width="560" height="315" src="https://www.youtube.com/embed/ZhcTGjiZhDc?si=73VuHwZXGMxdwQTs" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        17. <iframe width="560" height="315" src="https://www.youtube.com/embed/625gxCZFh74?si=LXzcL5mfBqQw5e5O" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        18. <iframe width="560" height="315" src="https://www.youtube.com/embed/QMVJp_Fop2g?si=tTJMT18z2Bgo8f8y" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        19. <iframe width="560" height="315" src="https://www.youtube.com/embed/ioUcFTiBCcY?si=IvnMf9mspTadQjp-" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        20. <iframe width="560" height="315" src="https://www.youtube.com/embed/QCP6TEuosVs?si=kGA7VE7PgxzP_62g" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>    
        -->
</body>
</html>