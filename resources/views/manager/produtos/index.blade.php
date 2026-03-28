<x-app-layout>
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <strong class="text-primary">Produtos</strong>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-4">
                <!--a href="{{-- route('codigo_barras.create') --}}" title="Cadastrar código de barras" 
                    class="btn btn-sm btn-success px-3 mb-1">
                    Cadastrar cód barras
                    <i class="bi bi-plus-lg"></i>
                </a-->
                <a href="{{ route('categorias.show') }}" title="Categorias de produtos" 
                    class="btn btn-sm btn-secondary px-3 mb-1">
                    Categorias
                </a>
                <a href="{{ route('medidas.show') }}" title="Medidas de produtos" 
                    class="btn btn-sm btn-secondary px-3 mb-1">
                    Medidas
                </a>
                <a href="{{ route('produtos.create') }}" title="Cadastrar produto" 
                    class="btn btn-sm btn-success px-3 mb-1">
                    Cadastrar produtos
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>
        </div><hr>
        <livewire:manager.produtos :fornecedores="$fornecedores" :categoria_produtos="$categoria_produtos"/>
    </div>
</x-app-layout>
