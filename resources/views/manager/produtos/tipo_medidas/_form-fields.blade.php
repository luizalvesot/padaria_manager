<div class="col p-3 border">
    <div class="row mb-3 justify-content-center">
        <!-- descricao da medida -->
        <div class="col-md-10">
            <div class="form-group">
                <label for="descricao_medida" class="text-dark"><strong>Descrição </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control rounded py-1 @error('descricao_medida') is-invalid @enderror" 
                    id="descricao_medida" name="descricao_medida" value="{{ $medida->descricao_medida ?? old('descricao_medida') }}">
                
                @error('descricao_medida')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3 justify-content-center">
        <!-- representacao da medida -->
        <div class="col-md-10">
            <div class="form-group">
                <label for="representacao_medida" class="text-dark"><strong>Representação </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control rounded py-1 @error('representacao_medida') is-invalid @enderror" 
                    id="representacao_medida" name="representacao_medida" value="{{ $medida->representacao_medida ?? old('representacao_medida') }}">
                
                @error('representacao_medida')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3 justify-content-center">
        <!-- chave da medida -->
        <div class="col-md-10">
            <div class="form-group">
                <label for="chave_medida" class="text-dark"><strong>Chave </strong></label>
                <input type="text" disabled class="form-control rounded py-1 @error('chave_medida') is-invalid @enderror" 
                    id="chave_medida" name="chave_medida" value="{{ $medida->chave_medida ?? old('chave_medida') }}">
                
                @error('chave_medida')
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
                    id="created_at" name="created_at" value="{{ $medida->created_at ?? old('created_at') }}">
            </div>
        </div>
        <div class="col-md-5">
            <div class="form-group">
                <label for="updated_at" class="text-dark"><strong>Última atualização</strong></label>
                <input type="text" disabled class="form-control rounded py-1 @error('updated_at') is-invalid @enderror" 
                    id="updated_at" name="updated_at" value="{{ $medida->updated_at ?? old('updated_at') }}">
            </div>
        </div>
    </div>
</div>