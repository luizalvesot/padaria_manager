<!-- Primeira coluna - destinada a dados do cliente -->
<div class="col-md-10 border p-3">
    <div class="row mb-1">
        <!-- descricao do produto -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="produto" class="text-dark"><strong>Produto </strong><strong class="text-danger"> *</strong></label>
                <select class="form-select rounded py-0 @error('produto') is-invalid @enderror" id="produto" name="produto">
                    @if(Route::is('codigo_barras.create'))
                        <option value="">Selecione  </option>
                    @endif
                    @foreach($produtos as $produto)
                        <option value="{{ $produto->id }}">{{ $produto->descricao_produto }}</option>
                    @endforeach
                </select>
            </div>
        </div>
    </div>
    
    <div class="row mb-1">
         <!-- codigo de barras -->
         <div class="col-md-9">
            <div class="form-group">
                <label for="codigo" class="text-dark"><strong>Código de barras</strong></label>
                <input type="text" class="form-control rounded py-0 @error('codigo') is-invalid @enderror" 
                    id="codigo" name="codigo">
                
                @error('codigo')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>