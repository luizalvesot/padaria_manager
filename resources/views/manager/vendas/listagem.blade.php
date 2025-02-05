<x-app-layout>
    <div class="container">
        <div class="row pt-3">
            <div class="col-md-10">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('dashboard')}}">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Listagem de vendas</li>
                    </ol>
                </nav>
            </div>
        </div>
        <livewire:manager.vendas.listagem :vendas="$vendas"/>
    </div>
</x-app-layout>
