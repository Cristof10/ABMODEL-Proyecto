
<div class="modal fade" id="agregarMorfemaModal" tabindex="-1" aria-labelledby="agregarMorfemaLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="agregarMorfemaLabel">Agregar nuevo morfema</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('morfemas.store') }}" method="post">
          @csrf

          <div class="mb-3">
            <label for="morfemaSanskrit" class="form-label">Ingrese el término en sánscrito:</label>
            <input type="text" name="morfemaSanskrit" id="morfemaSanskrit" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="morfemaSpanish" class="form-label">Ingrese el término en español:</label>
            <input type="text" name="morfemaSpanish" id="morfemaSpanish" class="form-control" required>
          </div>

          <div class="mb-3">
            <label for="morfemaEnglish" class="form-label">Ingrese el término en inglés:</label>
            <input type="text" name="morfemaEnglish" id="morfemaEnglish" class="form-control" required>
          </div>

          <button type="submit" class="btn btn-primary">Guardar morfema</button>
        </form>
      </div>
    </div>
  </div>
</div>
