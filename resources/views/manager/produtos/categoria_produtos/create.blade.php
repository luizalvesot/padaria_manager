<x-app-layout>
    <div class="container">
        <div class="row pt-3">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('produtos.show')}}">
                            <strong>Produtos</strong>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        <a href="{{ route('categorias.show') }}">
                            <strong class="text-primary">Categorias de produtos</strong>
                        </a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">Cadastro</li>
                </ol>
            </nav>
        </div><hr>
        
        <form method="POST" action="{{ route('categorias.store') }}">
            @csrf
            <div class="row bg-light p-4 shadow-lg mt-2 mb-4 rounded">

                @include('manager.produtos.categoria_produtos._form-fields')

                <div class="row text-right mt-4">
                    <div class="col">
                        <a href="{{ route('categorias.show') }}" class="btn btn-secondary btn-sm px-4">Voltar</a>
                        <button type="submit" class="btn btn-primary btn-sm active px-5">Cadastrar</button>
                    </div>
                </div>
            </div>
        </form> 
    </div>
</x-app-layout>
