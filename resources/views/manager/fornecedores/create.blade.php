<x-app-layout>
    <div class="container">
        <div class="row pt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('fornecedores.show') }}">Fornecedores</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
                </ol>
            </nav>
        </div><hr>
        
        <form method="POST" action="{{-- route('fornecedores.store') --}}">
            @csrf
            <div class="row bg-light p-4 shadow-lg mt-2 mb-4 rounded">

                @include('manager.fornecedores._form-fields')

                <div class="row text-right mt-4">
                    <div class="col">
                        <a href="{{ route('fornecedores.show') }}" class="btn btn-secondary btn-sm px-4">Voltar</a>
                        <button type="submit" class="btn btn-primary btn-sm active px-5">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form> 
    </div>
</x-app-layout>
