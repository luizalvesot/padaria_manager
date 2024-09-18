<!-- Primeira coluna - destinada a dados do cliente -->
<div class="col-md-6 border p-3">
    <div class="row mb-3">
        <!-- descricao do produto -->
        <div class="col-md-12">
            <div class="form-group">
                <label for="descricao_produto" class="text-dark"><strong>Descrição </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control rounded py-1 @error('descricao_produto') is-invalid @enderror" 
                    id="descricao_produto" name="descricao_produto" value="{{ $produto->descricao_produto ?? old('descricao_produto') }}">
                
                @error('descricao_produto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
         <!-- codigo de barras -->
         <div class="col-md-9">
            <div class="form-group">
                <label for="codigo_barras_produto" class="text-dark"><strong>Código de barras</strong></label>
                <input type="text" class="form-control rounded py-1 @error('codigo_barras_produto') is-invalid @enderror" 
                    id="codigo_barras_produto" name="codigo_barras_produto" value="{{ $produto->codigo_barras_produto ?? old('codigo_barras_produto') }}">
                
                @error('codigo_barras_produto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- tipo de medida do produto -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="tipo_medida" class="text-dark"><strong>Tipo de medida </strong><strong class="text-danger"> *</strong></label>
                <select class="form-select rounded py-1 @error('tipo_medida') is-invalid @enderror" id="tipo_medida" name="tipo_medida">
                    {{--@if(isset($cliente))
                        @if($produto->tipo_cliente == "PF")
                            <option value="PF">PF</option>
                            <option value="CNPJ">CNPJ</option>
                        @else
                            <option value="CNPJ">CNPJ</option>
                            <option value="PF">PF</option>
                        @endif
                    @else
                        <option value="PF">PF</option>
                        <option value="CNPJ">CNPJ</option>
                    @endif--}}
                    <option value="">KG</option>
                    <option value="">LT</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <!-- categoria do produto -->
        <div class="col-md-5">
            <div class="form-group">
                <label for="categoria_produto" class="text-dark"><strong>Categoria </strong><strong class="text-danger"> *</strong></label>
                <select class="form-select rounded py-1 @error('categoria_produto') is-invalid @enderror" id="categoria_produto" name="categoria_produto">
                    {{--@if(isset($cliente))
                        @if($produto->tipo_cliente == "PF")
                            <option value="PF">PF</option>
                            <option value="CNPJ">CNPJ</option>
                        @else
                            <option value="CNPJ">CNPJ</option>
                            <option value="PF">PF</option>
                        @endif
                    @else
                        <option value="PF">PF</option>
                        <option value="CNPJ">CNPJ</option>
                    @endif--}}
                    <option value="">Bebida Láctea</option>
                    <option value="">Alimentício</option>
                </select>
            </div>
        </div>
        <!-- fornecedor do produto -->
        <div class="col-md-7">
            <div class="form-group">
                <label for="fornecedor" class="text-dark"><strong>Fornecedor </strong><strong class="text-danger"> *</strong></label>
                <select class="form-select rounded py-1 @error('fornecedor') is-invalid @enderror" id="fornecedor" name="fornecedor">
                    {{--@if(isset($cliente))
                        @if($produto->tipo_cliente == "PF")
                            <option value="PF">PF</option>
                            <option value="CNPJ">CNPJ</option>
                        @else
                            <option value="CNPJ">CNPJ</option>
                            <option value="PF">PF</option>
                        @endif
                    @else
                        <option value="PF">PF</option>
                        <option value="CNPJ">CNPJ</option>
                    @endif--}}
                    <option value="">PHS distribuidora</option>
                    <option value="">Super Vale</option>
                </select>
            </div>
        </div>
    </div>
    
    <div class="row mb-3">
        <!-- preco de custo -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="preco_custo_produto" class="text-dark"><strong>Preço de custo </strong><strong class="text-danger"> *</strong></label>
                <input type="number" class="form-control rounded py-1 @error('preco_custo_produto') is-invalid @enderror" 
                    id="preco_custo_produto" name="preco_custo_produto" value="{{ $produto->preco_custo_produto ?? old('preco_custo_produto') }}">
                
                @error('preco_custo_produto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- desconto -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="desconto_produto" class="text-dark"><strong>Desconto</strong></label>
                <input type="number" class="form-control rounded py-1 @error('desconto_produto') is-invalid @enderror" 
                    id="desconto_produto" name="desconto_produto" value="{{ $produto->desconto_produto ?? old('desconto_produto') }}">
                
                @error('desconto_produto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- preco de venda -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="preco_venda_produto" class="text-dark"><strong>Preço de venda </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control  rounded py-1 @error('preco_venda_produto') is-invalid @enderror" 
                    id="preco_venda_produto" name="preco_venda_produto" value="{{ $produto->preco_venda_produto ?? old('preco_venda_produto') }}">
                
                @error('preco_venda_produto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row mb-3">
        <!-- quantidade -->
        <div class="col-md-4">
            <div class="form-group">
                <label for="quantidade_produto" class="text-dark"><strong>Quantidade </strong><strong class="text-danger"> *</strong></label>
                <input type="text" class="form-control rounded py-1 @error('quantidade_produto') is-invalid @enderror" 
                    id="quantidade_produto" name="quantidade_produto" value="{{ $produto->quantidade_produto ?? old('quantidade_produto') }}">
                
                @error('quantidade_produto')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
       <!-- status do produto - ativo ou inativo -->
       <div class="col-md-5">
            <div class="form-group">
                <label for="status_produto" class="text-dark"><strong>Status </strong><strong class="text-danger"> *</strong></label>
                <select class="form-select rounded py-1 @error('status_produto') is-invalid @enderror" id="status_produto" name="status_produto">
                    @if(isset($produto))
                        @if($produto->status_produto == 1)
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
        <!-- ID do produto -->
        <div class="col-md-3">
            <div class="form-group">
                <label for="id" class="text-dark"><strong>Código</strong></label>
                <input disabled type="text" class="form-control  rounded py-1 @error('id') is-invalid @enderror" 
                    id="id" name="id" value="{{ $produto->id ?? old('id') }}">
                
                @error('id')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
    </div>
    <div class="row mb-3">
        <!-- observacoes sobre o produto, se houver -->
        <label for="observacoes_produto" class="text-dark"><strong>Observações</strong></label>
        <div class="form-floating">
            <textarea class="form-control rounded @error('observacoes_produto') is-invalid @enderror"
                id="observacoes_produto" name="observacoes_produto" style="height: 110px; border-color:rgb(132, 132, 132)">
                {{ $produto->observacoes_produto ?? old('observacoes_produto') }}
            </textarea>
        </div>
    </div>
</div>

<!-- segunda coluna -->
<div class="col-md-6 border p-3">
    <div class="row">
        <!-- hora de ultima entrada do produto -->
        <div class="col-md-5">
            <div class="form-group mb-3">
                <label for="hora_ultima_entrada" class="text-dark"><strong>Horário da última entrada</strong></label>
                <input disabled type="text" class="form-control rounded py-1 @error('hora_ultima_entrada') is-invalid @enderror" 
                    id="hora_ultima_entrada" name="hora_ultima_entrada" value="{{ $produto->hora_ultima_entrada ?? old('hora_ultima_entrada') }}">
                
                @error('hora_ultima_entrada')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- hora da ultima saida do produto -->
            <div class="form-group mb-3">
                <label for="hora_ultima_saida" class="text-dark"><strong>Horário da última saída</strong></label>
                <input disabled type="text" class="form-control rounded py-1 @error('hora_ultima_saida') is-invalid @enderror" 
                    id="hora_ultima_saida" name="hora_ultima_saida" value="{{ $produto->hora_ultima_saida ?? old('hora_ultima_saida') }}">
                
                @error('hora_ultima_saida')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- quantidade da ultima entrada do produto -->
            <div class="form-group mb-3">
                <label for="qtd_ultima_entrada" class="text-dark"><strong>Quantidade da última entrada</strong></label>
                <input disabled type="text" class="form-control rounded py-1 @error('qtd_ultima_entrada') is-invalid @enderror" 
                    id="qtd_ultima_entrada" name="qtd_ultima_entrada" value="{{ $produto->qtd_ultima_entrada ?? old('qtd_ultima_entrada') }}">
                
                @error('qtd_ultima_entrada')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
            <!-- quantidade da ultima saida do produto -->
            <div class="form-group mb-3">
                <label for="qtd_ultima_saida" class="text-dark"><strong>Quantidade da última saída</strong></label>
                <input disabled type="text" class="form-control rounded py-1 @error('qtd_ultima_saida') is-invalid @enderror" 
                    id="qtd_ultima_saida" name="qtd_ultima_saida" value="{{ $produto->qtd_ultima_saida ?? old('qtd_ultima_saida') }}">
                
                @error('qtd_ultima_saida')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>
        <!-- imagem do produto -->
        <div class="col-md-7">
            <div class="form-group">
                <label for="" class="text-dark"><strong>Foto do produto</strong></label>
                <!--Image-->
                <img id="selectedImage" src="https://mdbootstrap.com/img/Photos/Others/placeholder.jpg"
                    alt="example placeholder" style="width: 320px; border-radius:10px" />
                <div class="d-flex justify-content-left my-2">
                    <div data-mdb-ripple-init class="btn btn-secondary btn-sm">
                        <label class="form-label m-0" for="customFile1">Escolher imagem</label>
                        <input type="file" class="form-control d-none" id="customFile1" onchange="displaySelectedImage(event, 'selectedImage')" />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>