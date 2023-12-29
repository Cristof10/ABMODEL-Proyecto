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
</head>
<body>
    <!-- Obtener el valor de get -->
    <?php 
        include 'db_connection.php';
        include 'functions\buscar_todas_las_posturas.php';
        $id = $_GET['id'];
        $videoURL = $posturas[$id]['videoURL'];
        
        
    ?>


    <!-- mostrar video embebido de youtube -->
   <iframe width="560" height="315" src="<?php echo $videoURL; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

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