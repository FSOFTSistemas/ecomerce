<div class="row">
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Nome</span>
            </div>
            <input type="text" name="nome" value="{{isset($produto->nome) ? $produto->nome:''}}" minlength="3" class="form-control" required>
        </div>
    </div>
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Quantidade</span>
            </div>
            <input type="text" name="descricao" minlength="3" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" required>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
            </div>
            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="input-group">
            <div class="input-group-prepend">
                <span class="input-group-text">Descrição</span>
            </div>
            <textarea class="form-control" aria-label="With textarea"></textarea>
        </div>
    </div>
</div>