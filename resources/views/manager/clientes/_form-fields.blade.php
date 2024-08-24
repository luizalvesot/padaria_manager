<!-- Primeira coluna - destinada a dados do cliente -->
<div class="col-md-6 border p-3">
    <div class="row mb-3">
        <!-- nome do cliente -->
        <div class="col-md-7">
            <div class="form-group">
                <label for="nome_cliente" class="text-dark"><strong>Nome </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control shadow rounded py-1 @error('nome_cliente') is-invalid @enderror" 
                    id="nome_cliente" name="nome_cliente" placeholder="Nome do cliente" value="{{ $cliente->nome_cliente ?? old('nome_cliente') }}">
                
                @error('nome_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- data de nascimento do cliente -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="nascimento_cliente" class="text-dark"><strong>Data de nascimento </strong><strong class="text-danger"> *</strong></label>
                <input type="date" class="form-control shadow rounded py-1 @error('nascimento_cliente') is-invalid @enderror" 
                    id="nascimento_cliente" name="nascimento_cliente" value="{{ $cliente->nascimento_cliente ?? old('nascimento_cliente') }}">
                
                @error('nascimento_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <!-- tipo de cliente - pessoa fisica ou juridica -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="tipo_cliente" class="text-dark"><strong>Tipo de cliente </strong><strong class="text-danger"> *</strong></label>
                <select class="form-select shadow rounded py-1" value="{{ $cliente->tipo_cliente ?? old('tipo_cliente') }}">
                    <option value="PF">PF</option>
                    <option value="CNPJ">CNPJ</option>
                </select>
            </div>
        </div>
        <!-- cpf do cliente -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="cpf_cliente" class="text-dark"><strong>CPF</strong></label>
                <input type="text" class="form-control shadow rounded py-1 @error('cpf_cliente') is-invalid @enderror" 
                    id="cpf_cliente" name="cpf_cliente" placeholder="CPF" value="{{ $cliente->cpf_cliente ?? old('cpf_cliente') }}">
                
                @error('cpf_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- rg do cliente -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="rg_cliente" class="text-dark"><strong>RG</strong></label>
                <input type="text" class="form-control shadow rounded py-1 @error('rg_cliente') is-invalid @enderror" 
                    id="rg_cliente" name="rg_cliente" placeholder="RG" value="{{ $cliente->rg_cliente ?? old('rg_cliente') }}">
                
                @error('rg_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <!-- cnpj do cliente -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="cnpj_cliente" class="text-dark"><strong>CNPJ</strong></label>
                <input type="text" class="form-control shadow rounded py-1 @error('cnpj_cliente') is-invalid @enderror" 
                    id="cnpj_cliente" name="cnpj_cliente" placeholder="CNPJ" value="{{ $cliente->cnpj_cliente ?? old('cnpj_cliente') }}">
                
                @error('cnpj_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- nome fantasia do cliente -->
        <div class="col-md-7">
            <div class="form-group">
                <label for="nome_fantasia_cliente" class="text-dark"><strong>Nome fantasia</strong></label>
                <input type="text" class="form-control shadow rounded py-1 @error('nome_fantasia_cliente') is-invalid @enderror" 
                    id="nome_fantasia_cliente" name="nome_fantasia_cliente" placeholder="Nome fantasia do cliente" value="{{ $cliente->nome_fantasia_cliente ?? old('nome_fantasia_cliente') }}">
                
                @error('nome_fantasia_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <!-- status do cliente - ativo ou inativo -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="status_cliente" class="text-dark"><strong>Status </strong><strong class="text-danger"> *</strong></label>
                <select class="form-select shadow rounded py-1" value="{{ $cliente->status_cliente ?? old('status_cliente') }}">
                    <option value=1>Ativo</option>
                    <option class="bg-danger text-white" value=0>Inativo</option>
                </select>
            </div>
        </div>
        <!-- telefone celular do cliente -->
        <div class="col-md-7">
            <div class="form-group">
                <label for="telefone_celular_cliente" class="text-dark"><strong>Telefone celular </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control shadow rounded py-1 @error('telefone_celular_cliente') is-invalid @enderror" 
                    id="telefone_celular_cliente" name="telefone_celular_cliente" placeholder="Celular" value="{{ $cliente->telefone_celular_cliente ?? old('telefone_celular_cliente') }}">
                
                @error('telefone_celular_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- telefone fisico do cliente -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="telefone_fixo_cliente" class="text-dark"><strong>Telefone fixo</strong></label>
                <input type="text" class="form-control rounded shadow py-1 @error('telefone_fixo_cliente') is-invalid @enderror" 
                    id="telefone_fixo_cliente" name="telefone_fixo_cliente" placeholder="Telefone fixo" value="{{ $cliente->telefone_fixo_cliente ?? old('telefone_fixo_cliente') }}">
                
                @error('telefone_fixo_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-7">
            <!-- email do cliente -->
            <div class="form-group">
                <label for="email_cliente" class="text-dark"><strong>E-mail</strong></label>
                <input type="text" class="form-control shadow rounded py-1 @error('email_cliente') is-invalid @enderror" 
                    id="email_cliente" name="email_cliente" placeholder="E-mail" value="{{ $cliente->email_cliente ?? old('email_cliente') }}">
                
                @error('telefone_celular_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<!-- segunda coluna - destinada ao endereco do cliente -->
<div class="col-md-6 border p-3">
    <div class="row mb-3">
        <div class="col-md-3">
            <div class="form-group">
                <label for="cep_cliente" class="text-dark"><strong>CEP</strong></label>
                <input type="text" class="form-control shadow rounded py-1 @error('cep_cliente') is-invalid @enderror" 
                    id="cep_cliente" name="cep_cliente" placeholder="CEP" value="{{ $cliente->cep_cliente ?? old('cep_cliente') }}">
                
                @error('cep_cliente')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mb-3">

    </div>

    <div class="row mb-3">

    </div>

    <div class="row mb-3">

    </div>

    <div class="row mb-3">

    </div>
</div>