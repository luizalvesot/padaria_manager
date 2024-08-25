function carregarCliente(id) {
    $.ajax({
        url: '/clientes/' + id, // Ajuste a URL conforme necessário
        type: 'GET',
        success: function(data) {
            $('#clienteDetalhes').html(data);
        },
        error: function() {
            $('#clienteDetalhes').html('Erro ao carregar os detalhes do cliente.');
        }
    });
}

window.carregarCliente = carregarCliente;  // Torna a função disponível globalmente
