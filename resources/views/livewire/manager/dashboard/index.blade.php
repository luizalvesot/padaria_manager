<div>
    <div class="container p-4">
        <a href="{{ route('categorias.show') }}" class="btn btn-warning px-3">Categorias de produtos</a>
        <div class="row">
            <div class="col-md-4">
                <div class="card card-dashboard bg-secondary border shadow pb-2 mx-2 my-1">
                    <div class="card-body text-center">
                        <h4 class="card-title h4 text-white">Clientes ativos</h4>
                        <h1 class="h1 text-white" style="font-size: 62px">{{ $clientes_ativos }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard border shadow pb-2 mx-2 my-1">
                    <div class="card-body text-center">
                        <h4 class="card-title h4 text-danger">Clientes inativos</h4>
                        <h1 class="h1 text-danger" style="font-size: 62px">{{ $clientes_inativos }}</h1>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card card-dashboard border shadow bg-success pb-2 mx-2 my-1">
                    <div class="card-body text-center">
                        <h4 class="card-title h4 text-white">Produtos ativos</h4>
                        <h1 class="h1 text-white" style="font-size: 62px">0</h1>
                    </div>
                </div>
            </div>
        </div>
        <!-- segunda linha -->
        <div class="row">
            <div class="col-md-4">
                <div class="card card-dashboard bg-danger border shadow pb-2 mx-2 my-1">
                    <div class="card-body text-center">
                        <h4 class="card-title h4 text-white">Produtos inativos</h4>
                        <h1 class="h1 text-white" style="font-size: 62px">0</h1>
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
        <!-- terceira linha -->
        <div class="row">
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
