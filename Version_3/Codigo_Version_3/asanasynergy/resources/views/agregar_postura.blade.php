<div class="modal fade" id="agregarPosturaModal" tabindex="-1" aria-labelledby="agregarPosturaLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="agregarPosturaLabel">Agregar postura</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('posturas.store') }}" method="post">
                    @csrf

                    <label for="termino_sanskrit">Ingrese el término en sánscrito:</label>
                    <input type="text" name="termino_sanskrit" id="termino_sanskrit" class="form-control">

                    <label for="termino_english">Ingrese el término en inglés:</label>
                    <input type="text" name="termino_english" id="termino_english" class="form-control">

                    <label for="termino_spanish">Ingrese el término en español:</label>
                    <input type="text" name="termino_spanish" id="termino_spanish" class="form-control">

                    <label for="url_imagen">URL de la imagen:</label>
                    <input type="text" name="imagen" id="imagen" class="form-control">

                    <label for="url_video">URL del video:</label>
                    <input type="text" name="video" id="video" class="form-control">

                    <label for="morfema_ids">Morfemas relacionados (opcional):</label>
                    <select name="morfema_ids[]" id="morfema_ids" class="form-control select2" multiple>
                        @foreach ($resultados->morfemas as $morfema)
                            <option value="{{ $morfema->id }}">{{ $morfema->morfemaSanskrit }}</option>
                        @endforeach
                    </select>



                    <button type="submit" class="btn btn-primary mt-3">Agregar postura</button>
                </form>
            </div>
        </div>
    </div>
</div>
