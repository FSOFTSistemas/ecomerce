<div class="row">
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Nome</span>
            </div>
            <input type="text" name="nome" value="{{ isset($produto->nome) ? $produto->nome : '' }}" minlength="3"
                class="form-control" required>
        </div>
    </div>
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Estoque</span>
            </div>
            <input type="text" name="estoque" value="{{ isset($produto->estoque) ? $produto->estoque : '' }}"
                class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Referencia</span>
            </div>
            <input type="text" name="referencia" value="{{ isset($produto->referencia) ? $produto->referencia : '' }}"
                class="form-control">
        </div>
    </div>
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Código de barras</span>
            </div>
            <input type="text" name="codigo_de_barras"
                value="{{ isset($produto->codigo_de_barras) ? $produto->codigo_de_barras : '' }}" class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Preço de venda</span>
            </div>
            <input type="text" name="preco_venda"
                value="{{ isset($produto->preco_venda) ? $produto->preco_venda : '' }}" class="form-control">
        </div>
    </div>
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Preço de promocao</span>
            </div>
            <input type="text" name="preco_promocao"
                value="{{ isset($produto->preco_promocao) ? $produto->preco_promocao : '' }}" class="form-control">
        </div>
    </div>
</div>

<div class="row">
    <!-- <div class="col-6">
        <div class="input-group mb-3 file-field">
            <div class="input-group-prepend">
                <div class="btn btn-primary">
                    <span class="input-group-text">Foto</span>
                    <input type="file" name="foto" value="{{ isset($produto->nome) ? $produto->nome : '' }}" class="form-control">
                </div>
            </div>
        </div>
    </div> -->
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Tamanho</span>
            </div>
            <input type="text" name="tamanho" value="{{ isset($produto->tamanho) ? $produto->tamanho : '' }}"
                class="form-control">
        </div>
    </div>
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="">Categoria</span>
            </div>
            <select name="categoria" class="custom-select">
                <option selected>Selecione uma categoria</option>
                @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">{{$categoria->descricao}}</option>
                @endforeach
            </select>
        </div>
    </div>
</div>

<!-- <div class="row">
    <div class="col-6">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroup-sizing-default">Default</span>
            </div>
            <input type="text" class="form-control">
        </div>
    </div>
</div> -->

<div class="row">
    <div class="col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Descrição</span>
            </div>
            {{-- {{$produto->descricao}} --}}
            <textarea class="form-control" name="descricao" value="{{ isset($produto->descricao) ? $produto->descricao : '' }}">{{ isset($produto->descricao) ? $produto->descricao : '' }}</textarea>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-4">
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" name="item_ativo" id="item_ativo"
                {{ isset($produto->item_ativo) && $produto->item_ativo == 'sim' ? 'checked' : '' }} value="true">
            <label class="custom-control-label" for="item_ativo">Item ativo</label>
        </div>
    </div>
    <div class="col-4">
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" name="promocao_ativa" id="promocao_ativa"
                {{ isset($produto->promocao_ativa) && $produto->promocao_ativa == 'sim' ? 'checked' : '' }}
                value="true">
            <label class="custom-control-label" for="promocao_ativa">Promoção ativa</label>
        </div>
    </div>
    <div class="col-4">
        <div class="custom-control custom-checkbox mb-3">
            <input type="checkbox" class="custom-control-input" name="item_destaque" id="item_destaque"
                {{ isset($produto->item_destaque) && $produto->item_destaque == 'sim' ? 'checked' : '' }}
                value="true">
            <label class="custom-control-label" for="item_destaque">Item em Destaque</label>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-12">
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" name="foto"
                    aria-describedby="inputGroupFileAddon01">
                <label class="custom-file-label" for="inputGroupFile01">Choose file</label>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        @if (isset($produto->foto))
            <img src="{{ asset($produto->foto) }}" class="rounded float-left" width="150">
        @endif
    </div>
</div>
