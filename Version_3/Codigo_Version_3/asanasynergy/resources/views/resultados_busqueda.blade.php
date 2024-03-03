<div class="container" id="resultados-busqueda">
        <h2>Resultados de la búsqueda</h2>


        <?php if (!empty($resultados->posturas)) : ?>
        <h4>Posturas</h4>
        

        <div class="row">
            <?php foreach ($resultados->posturas as $postura) : ?>
                <?php $imagenURL = "images/" . $postura->getImagenURL(); ?>
                <div class="col-sm-3 col-xs-6 mb-3">
                    <a href="{{ route('postura.detalle', $postura->getTerminoID()) }}" class="card h-100 link-underline-opacity-0 text-decoration-none">
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