
<div class="container">
    <div class="container py-4" style="max-width: 600px; margin: auto;">
        <h1 class="mb-2 titulo text-center">DICCIONARIO DE YOGA</h1>
        <form action="{{ route('diccionario.buscar') }}" method="post" id="busqueda-form">
        @csrf
            <div class="d-flex mb-3">
                <div class="col-3 me-3">
                    <div class="input-group me-3">
                        <select class="form-select" id="filterOptions" name="filterOptions">
                            <option value="postura" selected>Postura</option>
                            <option value="morfema">Morfema</option>
                        </select>
                    </div>
                </div>
                
                <div class="input-group me-3" style="flex-grow: 1;">
                    <input type="search" class="form-control" id="keyword" name="keyword" placeholder="Escriba aquí" >
                    <button type="submit" class="btn btn-primary"><i class="bi bi-search"></i></button> 
                    <!-- <span class="input-group-text" id="basic-addon1" style="background-color: transparent; border-left: none;"><i class="bi bi-search"></i></span>-->
                </div>

                
            </div>
        </form>
    </div>

   

</div>

        <!-- JS -->
        <script src="js\validacion.js"></script>


