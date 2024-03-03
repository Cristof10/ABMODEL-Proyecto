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
    
    <title>Posturas de Yoga</title>

	<!-- CSS stylesheet -->
	<link rel="stylesheet" href="css\style.css">
    <style>
        main{           
            width: 100%;
        }

        .fondo-video{
            
            background-color: #DDD;
            padding: 1rem 0;
            margin: 1rem 0;
        }
            /* Estilo por defecto para pantallas pequeñas */
        .video-container {
            height: 20rem;
        }

        /* Estilo para pantallas medianas y grandes */
        @media (min-width: 768px) {
            .video-container {
                height: 20rem;
            }
        }

        /* Estilo para pantallas extra grandes */
        @media (min-width: 1200px) {
            .video-container {
                height: 40rem;
            }
        }
        footer {
            background-color: rgba(131, 170, 229, 1);
        }

    </style>
    <!-- fuentes-->
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Tilt+Warp&family=Titillium+Web&display=swap" rel="stylesheet">
</head>
<body>
    


    <header class="py-sm-3 bg-primary d-flex justify-content-between align-items-center">
        <!-- agregar un boton de retorno a la pagina principal como icono de fontawesome-->
        <div></div> <!-- Este div vacío es para mantener el equilibrio en el diseño flexbox -->
        <a href="/" class="link-underline-opacity-0 text-decoration-none link-light">
            <h1 class="text-center titulo">ASANASYNERGY</h1>
        </a>
        <a href="/" class="link-light px-3">
            <i class="fa-regular fa-circle-xmark fa-2xl"></i>
        </a>
    </header>



    <main class="container">
    <div class="fondo-video container text-center">
        <div>


        <div class="row mb-3 justify-content-center">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-5 mb-3">
            <h2 class="card-title">Referencia</h2>
            <div>
                <img src="{{ asset('images/' . $postura->getImagenURL()) }}" class="card-img-bottom img-fluid w-50" alt="<?php echo $postura['terminoSanskrit']; ?>">

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
                        <strong>Sánscrito: </strong><?php echo $morfemaInfo['morfemaSanskrit'] ?><br>
                        <strong>Español:  </strong><?php echo $morfemaInfo['morfemaSpanish'] ?><br>
                        <strong>Inglés:   </strong><?php echo $morfemaInfo['morfemaEnglish'] ?><br>
                        --<br>
                    <?php } ?>
                    <?php } else { ?>
                    No hay morfemas relacionados.<br>
                    <?php } ?>
                </p>
                </div>
            </div>
            </div>
        </div>

       
            <div class="row">
                <div class="col-12 video-container">
                    <h2>Video explicativo</h2>
                    <div class="embed-responsive embed-responsive-16by9 h-100 ">
                        <iframe class="embed-responsive-item w-50 h-50" src="<?php echo $postura['videoURL']; ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        
        </div>
    </div>
    </main>


    @include('footer')
    <script>
    // Reproducir iframe de YouTube al cargar la página
    var iframe = document.querySelector('iframe');
    iframe.src = iframe.src + "&autoplay=1";
    </script>
    
</body>
</html>