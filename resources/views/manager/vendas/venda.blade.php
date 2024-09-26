<x-app-layout>
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><strong class="text-primary">Venda</strong></li>
                    </ol>
                </nav>
            </div>
            {{--<div class="col-md-2">
                <a href="{{route('clientes.create')}}" title="Cadastrar cliente" class="btn btn-sm btn-success px-3">
                    Cadastrar
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>--}}
        </div><hr>
        <livewire:manager.vendas.venda :produto="$produto" :cliente="$cliente" :formasPagamento="$formasPagamento"/>
    </div>
</x-app-layout>
