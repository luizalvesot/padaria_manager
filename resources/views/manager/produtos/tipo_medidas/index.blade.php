<x-app-layout>
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('produtos.show')}}">
                                <strong class="text-primary">Produtos</strong>
                            </a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tipos de medidas</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-2">
                <a href="{{ route('produtos.show') }}" class="btn btn-sm btn-secondary">
                    Voltar
                </a>
                <a href="{{ route('medidas.create') }}" title="Cadastrar tipos de medidas de produtos" class="btn btn-sm btn-success px-3">
                    Cadastrar
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>
        </div><hr>
        <livewire:manager.produtos.tipo-medidas/>
    </div>
</x-app-layout>
