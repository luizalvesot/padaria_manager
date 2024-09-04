<!-- Primeira coluna - destinada a dados do fornecedor -->
<div class="col-md-6 border p-3">
    <div class="row mb-3">
        <!-- nome do fornecedor -->
        <div class="col-md-8">
            <div class="form-group">
                <label for="nome_fornecedor" class="text-dark"><strong>Nome </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control rounded py-1 @error('nome_fornecedor') is-invalid @enderror" 
                    id="nome_fornecedor" name="nome_fornecedor" value="{{ $fornecedor->nome_fornecedor ?? old('nome_fornecedor') }}">
                
                @error('nome_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <!-- tipo de fornecedor - pessoa fisica ou juridica -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="tipo_fornecedor" class="text-dark"><strong>Tipo de fornecedor </strong><strong class="text-danger"> *</strong></label>
                <select class="form-select rounded py-1 @error('tipo_fornecedor') is-invalid @enderror" id="tipo_fornecedor" name="tipo_fornecedor">
                    @if(isset($fornecedor))
                        @if($fornecedor->tipo_fornecedor == "PF")
                            <option value="PF">PF</option>
                            <option value="CNPJ">CNPJ</option>
                        @else
                            <option value="CNPJ">CNPJ</option>
                            <option value="PF">PF</option>
                        @endif
                    @else
                        <option value="PF">PF</option>
                        <option value="CNPJ">CNPJ</option>
                    @endif
                </select>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <!-- cnpj do fornecedor -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="cnpj_fornecedor" class="text-dark"><strong>CNPJ</strong></label>
                <input type="text" class="form-control cnpj rounded py-1 @error('cnpj_fornecedor') is-invalid @enderror" 
                    id="cnpj_fornecedor" name="cnpj_fornecedor" value="{{ $fornecedor->cnpj_fornecedor ?? old('cnpj_fornecedor') }}">
                
                @error('cnpj_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- nome fantasia do fornecedor -->
        <div class="col-md-7">
            <div class="form-group">
                <label for="nome_fantasia_fornecedor" class="text-dark"><strong>Nome fantasia</strong></label>
                <input type="text" class="form-control rounded py-1 @error('nome_fantasia_fornecedor') is-invalid @enderror" 
                    id="nome_fantasia_fornecedor" name="nome_fantasia_fornecedor" value="{{ $fornecedor->nome_fantasia_fornecedor ?? old('nome_fantasia_fornecedor') }}">
                
                @error('nome_fantasia_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <!-- status do fornecedor - ativo ou inativo -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="status_fornecedor" class="text-dark"><strong>Status </strong><strong class="text-danger"> *</strong></label>
                <select class="form-select rounded py-1 @error('status_fornecedor') is-invalid @enderror" id="status_fornecedor" name="status_fornecedor">
                    @if(isset($fornecedor))
                        @if($fornecedor->status_fornecedor == 1)
                            <option value=1>Ativo</option>
                            <option value=0>Inativo</option>
                        @else 
                            <option value=0>Inativo</option>
                            <option value=1>Ativo</option>
                        @endif
                    @else
                        <option value=1>Ativo</option>
                        <option value=0>Inativo</option>
                    @endif    
                </select>
            </div>
        </div>
        <!-- telefone celular do fornecedor -->
        <div class="col-md-7">
            <div class="form-group">
                <label for="telefone_celular_fornecedor" class="text-dark"><strong>Telefone celular </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control celular rounded py-1 @error('telefone_celular_fornecedor') is-invalid @enderror" 
                    id="telefone_celular_fornecedor" name="telefone_celular_fornecedor" value="{{ $fornecedor->telefone_celular_fornecedor ?? old('telefone_celular_fornecedor') }}">
                
                @error('telefone_celular_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- telefone fixo do fornecedor -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="telefone_fixo_fornecedor" class="text-dark"><strong>Telefone fixo</strong></label>
                <input type="text" class="form-control telefone rounded py-1 @error('telefone_fixo_fornecedor') is-invalid @enderror" 
                    id="telefone_fixo_fornecedor" name="telefone_fixo_fornecedor" value="{{ $fornecedor->telefone_fixo_fornecedor ?? old('telefone_fixo_fornecedor') }}">
                
                @error('telefone_fixo_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <div class="col-md-7">
            <!-- email do fornecedor -->
            <div class="form-group">
                <label for="email_fornecedor" class="text-dark"><strong>E-mail</strong></label>
                <input type="text" class="form-control rounded py-1 @error('email_fornecedor') is-invalid @enderror" 
                    id="email_fornecedor" name="email_fornecedor" value="{{ $fornecedor->email_fornecedor ?? old('email_fornecedor') }}">
                
                @error('telefone_celular_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
</div>

<!-- segunda coluna - destinada ao endereco do fornecedor -->
<div class="col-md-6 border p-3">
    <div class="row mb-3">
        <!-- cep do fornecedor -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="cep_fornecedor" class="text-dark"><strong>CEP</strong></label>
                <input type="text" class="form-control cep rounded py-1 @error('cep_fornecedor') is-invalid @enderror" 
                    id="cep_fornecedor" name="cep_fornecedor" value="{{ $fornecedor->cep_fornecedor ?? old('cep_fornecedor') }}">
                
                @error('cep_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- cidade do fornecedor -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="cidade_fornecedor" class="text-dark"><strong>Cidade</strong></label>
                <input type="text" class="form-control rounded py-1 @error('cidade_fornecedor') is-invalid @enderror" 
                    id="cidade_fornecedor" name="cidade_fornecedor" value="{{ $fornecedor->cidade_fornecedor ?? old('cidade_fornecedor') }}">
                
                @error('cidade_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- estado da cidade do fornecedor -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="estado_fornecedor" class="text-dark"><strong>UF</strong></label>
                <select class="form-select rounded py-1  @error('estado_fornecedor') is-invalid @enderror" id="estado_fornecedor" name="estado_fornecedor">
                    @if(isset($fornecedor))
                        @if($fornecedor->estado_fornecedor == "MG")
                            <option value="MG">MG</option>
                            <option value="SP">SP</option>
                        @else
                            <option value="SP">SP</option> 
                            <option value="MG">MG</option> 
                        @endif
                    @else
                        <option value="MG">MG</option>
                        <option value="SP">SP</option>
                    @endif
                </select>
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- barrio do fornecedor -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="bairro_fornecedor" class="text-dark"><strong>Bairro</strong></label>
                <input type="text" class="form-control rounded py-1 @error('bairro_fornecedor') is-invalid @enderror" 
                    id="bairro_fornecedor" name="bairro_fornecedor" value="{{ $fornecedor->bairro_fornecedor ?? old('bairro_fornecedor') }}">
                
                @error('bairro_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- logradouro do fornecedor -->
        <div class="col-md-7">
            <div class="form-group">
                <label for="logradouro_fornecedor" class="text-dark"><strong>Logradouro</strong></label>
                <input type="text" class="form-control rounded py-1 @error('logradouro_fornecedor') is-invalid @enderror" 
                    id="logradouro_fornecedor" name="logradouro_fornecedor" value="{{ $fornecedor->logradouro_fornecedor ?? old('logradouro_fornecedor') }}">
                
                @error('logradouro_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- numero da residencia do fornecedor -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="numero_fornecedor" class="text-dark"><strong>Número</strong></label>
                <input type="text" class="form-control rounded py-1 @error('numero_fornecedor') is-invalid @enderror" 
                    id="numero_fornecedor" name="numero_fornecedor" value="{{ $fornecedor->numero_fornecedor ?? old('numero_fornecedor') }}">
                
                @error('numero_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- referencia do endereco do fornecedor -->
        <div class="col-md-8">
            <div class="form-group">
                <label for="referencia_fornecedor" class="text-dark"><strong>Referência</strong></label>
                <input type="text" class="form-control rounded py-1 @error('referencia_fornecedor') is-invalid @enderror" 
                    id="referencia_fornecedor" name="referencia_fornecedor" value="{{ $fornecedor->referencia_fornecedor ?? old('referencia_fornecedor') }}">
                
                @error('referencia_fornecedor')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- observacoes sobre o fornecedor, se houver -->
        <label for="observacoes_fornecedor" class="text-dark"><strong>Observações</strong></label>
        <div class="form-floating">
            <textarea class="form-control rounded @error('observacoes_fornecedor') is-invalid @enderror"
                id="observacoes_fornecedor" name="observacoes_fornecedor" style="height: 110px; border-color:rgb(132, 132, 132)">
                {{ $fornecedor->observacoes_fornecedor ?? old('observacoes_fornecedor') }}
            </textarea>
        </div>
    </div>
</div>