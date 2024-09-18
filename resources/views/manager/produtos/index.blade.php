<x-app-layout>
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-7">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page">
                            <strong>Produtos</strong>
                        </li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-5">
                <a href="{{ route('categorias.show') }}" title="Categorias de produtos" 
                    class="btn btn-sm btn-secondary shadow-sm px-3">
                    Categorias de produtos
                </a>
                <a href="{{ route('medidas.show') }}" title="Medidas de produtos" 
                    class="btn btn-sm shadow-sm btn-secondary px-3">
                    Tipos de medidas
                </a>
                <a href="{{ route('produtos.create') }}" title="Cadastrar produto" 
                    class="btn btn-sm btn-success px-3">
                    Cadastrar produtos
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>
        </div><hr>
        <livewire:manager.produtos/>
    </div>
</x-app-layout>
