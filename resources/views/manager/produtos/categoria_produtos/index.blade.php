<x-app-layout>
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Categorias de produtos</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-2">
                <a href="{{ route('categorias.create') }}" title="Cadastrar categorias de produtos" class="btn btn-sm btn-success px-3">
                    Cadastrar
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>
        </div><hr>
        <livewire:manager.produtos.categoria-produtos/>
    </div>
</x-app-layout>
