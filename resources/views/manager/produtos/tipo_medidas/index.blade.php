<x-app-layout>
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tipos de medidas</li>
                    </ol>
                </nav>
            </div>
            <div class="col-md-2">
                <a href="{{ route('medidas.create') }}" title="Cadastrar tipos de medidas de produtos" class="btn btn-sm btn-success px-3">
                    Cadastrar
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>
        </div><hr>
        <livewire:manager.produtos.tipo-medidas/>
    </div>
</x-app-layout>
