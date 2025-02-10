<x-app-layout>
    <div class="container-fluid">
        <div class="row pt-2 m-1">
            {{--<div class="col-md-2">
                <a href="{{route('clientes.create')}}" title="Cadastrar cliente" class="btn btn-sm btn-success px-3">
                    Cadastrar
                    <i class="bi bi-plus-lg"></i>
                </a>
            </div>--}}
        </div>
        <livewire:manager.vendas.edit-vendas :vendaId="$vendaId" :clienteId="$clienteId"/>
    </div>
</x-app-layout>
