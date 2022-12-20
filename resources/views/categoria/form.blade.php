<div class="row">
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Descrição</span>
            </div>
            <input type="text" name="descricao" value="{{ isset($categoria->descricao) ? $categoria->descricao : '' }}" minlength="3"
                class="form-control" required>
        </div>
    </div>
</div>