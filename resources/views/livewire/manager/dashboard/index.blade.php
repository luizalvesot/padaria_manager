<div>
    <div class="container p-4">
        <div class="row">
            <div class="col-md-4">
                <div class="card card-dashboard bg-white border rounded shadow mx-2 my-2">
                    <div class="card-body text-center">
                        <a href="{{route('clientes.show')}}">
                            <strong class="card-title h5 text-primary">
                                Clientes ativos <i class="bi bi-person-check-fill text-secondary"></i>
                            </strong>
                            <h1 class="h1 text-primary">{{ $clientes_ativos }}</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard bg-white border rounded shadow mx-2 my-2">
                    <div class="card-body text-center">
                        <a href="{{route('clientes.show')}}">
                            <strong class="card-title h5 text-danger">
                                Clientes inativos <i class="bi bi-person-fill-slash text-secondary"></i>
                            </strong>
                            <h1 class="h1 text-danger">{{ $clientes_inativos }}</h1>
                        </a>    
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard bg-white border rounded shadow mx-2 my-2">
                    <div class="card-body text-center">
                        <a href="{{route('produtos.show')}}">
                            <strong class="card-title h5 text-primary">
                                Produtos ativos <i class="bi bi-box-fill"></i>
                            </strong>
                            <h1 class="h1 text-primary">{{ $produtos_ativos }}</h1>
                        </a>    
                    </div>
                </div>
            </div>
        </div>
        <!-- segunda linha -->
        <div class="row">
            <div class="col-md-4">
                <div class="card card-dashboard bg-white border rounded shadow mx-2 my-2">
                    <div class="card-body text-center">
                        <a href="{{route('produtos.show')}}">
                            <strong class="card-title h5 text-danger">
                                Produtos inativos <i class="bi bi-box-fill"></i>
                            </strong>
                            <h1 class="h1 text-danger">{{ $produtos_inativos }}</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard bg-success border rounded shadow mx-2 my-2">
                    <div class="card-body text-center">
                        <a href="{{route('vendas.show')}}" title="acessar painel de vendas">
                            <strong class="card-title h5 text-white">
                                Vendas finalizadas
                            </strong>
                            <h1 class="h1 text-white">2</h1>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard bg-danger border rounded shadow mx-2 my-2">
                    <div class="card-body text-center">
                        <a href="{{route('vendas.show')}}" title="acessar painel de vendas">
                            <strong class="card-title h5 text-white">
                                Vendas abertas
                            </strong>
                            <h1 class="h1 text-white">5</h1>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- terceira linha -->
        <div class="row">
            <div class="col-md-4">
                <div class="card card-dashboard bg-white border rounded shadow mx-2 my-2">
                    <div class="card-body text-center">
                        <a href="{{route('clientes.show')}}" title="acessar menu de clientes">
                            <strong class="card-title h5 text-dark">Clientes negativos</strong>
                            <h1 class="h1 text-dark">1</h1>
                        </a>    
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard border shadow pb-2 mx-2 my-1">
                    <div class="card-body text-center">
                        <h4 class="card-title h4"></h4>
                        <h1 class="h1 text-secondary" style="font-size: 62px"> + </h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard border shadow pb-2 mx-2 my-1">
                    <div class="card-body text-center">
                        <h4 class="card-title h4"></h4>
                        <h1 class="h1 text-secondary" style="font-size: 62px"> + </h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
