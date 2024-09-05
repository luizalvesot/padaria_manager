<div class="col p-3 border">
    <div class="row mb-3 justify-content-center">
        <!-- nome da categoria -->
        <div class="col-md-10">
            <div class="form-group">
                <label for="nome_categoria" class="text-dark"><strong>Nome </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control rounded py-1 @error('nome_categoria') is-invalid @enderror" 
                    id="nome_categoria" name="nome_categoria" value="{{ $categoria->nome_categoria ?? old('nome_categoria') }}">
                
                @error('nome_categoria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3 justify-content-center">
        <!-- descricao da categoria -->
        <div class="col-md-10">
            <div class="form-group">
                <label for="descricao_categoria" class="text-dark"><strong>Descrição</strong></label>
                <input type="text" class="form-control rounded py-1 @error('descricao_categoria') is-invalid @enderror" 
                    id="descricao_categoria" name="descricao_categoria" value="{{ $categoria->descricao_categoria ?? old('descricao_categoria') }}">
                
                @error('descricao_categoria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3 justify-content-center">
        <!-- chave da categoria -->
        <div class="col-md-10">
            <div class="form-group">
                <label for="chave_categoria" class="text-dark"><strong>Chave </strong></label>
                <input type="text" disabled class="form-control rounded py-1 @error('chave_categoria') is-invalid @enderror" 
                    id="chave_categoria" name="chave_categoria" value="{{ $categoria->chave_categoria ?? old('chave_categoria') }}">
                
                @error('chave_categoria')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mb-3 justify-content-center">
        <!-- datas -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="created_at" class="text-dark"><strong>Data de criação</strong></label>
                <input type="text" disabled class="form-control rounded py-1 @error('created_at') is-invalid @enderror" 
                    id="created_at" name="created_at" value="{{ $categoria->created_at ?? old('created_at') }}">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="updated_at" class="text-dark"><strong>Última atualização</strong></label>
                <input type="text" disabled class="form-control rounded py-1 @error('updated_at') is-invalid @enderror" 
                    id="updated_at" name="updated_at" value="{{ $categoria->updated_at ?? old('updated_at') }}">
            </div>
        </div>
    </div>
</div>