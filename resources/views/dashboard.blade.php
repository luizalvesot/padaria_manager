<x-app-layout>
    <div class="py-1">
       {{-- <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <livewire:manager.dashboard.index />
        </div> --}}

        <style>
            body {
                background-color: #f8f9fa;
            }
            .welcome-box {
                background: #fff;
                padding: 50px;
                border-radius: 10px;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
                text-align: center;
            }
            .icon-box {
                display: flex;
                justify-content: center;
                gap: 100px;
                margin-top: 20px;
            }
            .icon-box a {
                text-decoration: none;
                color: #333;
                transition: 0.3s;
            }
            .icon-box a:hover {
                transform: scale(1.1);
                color: #7f76ff;
            }
            .icon {
                font-size: 50px;
            }
        </style>

        <div class="container d-flex justify-content-center align-items-center" style="height: 65vh;">
            <div class="welcome-box">
                <h1>Bem-vindo! 🥖</h1>
                <p class="lead">Escolha uma opção abaixo para continuar:</p>
                
                <div class="icon-box">
                    <a href="{{ route('vendas.show') }}" class="mx-4">
                        <div class="icon">🛒</div>
                        <p>Vendas</p>
                    </a>
                    <a href="{{ route('listagem.show') }}" class="mx-4">
                        <div class="icon">📋</div>
                        <p>Listagem de vendas</p>
                    </a>
                    <a href="{{ route('produtos.show') }}">
                        <div class="icon">📦</div>
                        <p>Produtos</p>
                    </a>
                    <a href="{{ route('clientes.show') }}">
                        <div class="icon">👥</div>
                        <p>Clientes</p>
                    </a>
                    <a href="{{ route('fornecedores.show') }}">
                        <div class="icon">🚚</div>
                        <p>Fornecedores</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
