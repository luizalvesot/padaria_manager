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

function carregarFornecedor(id) {
    $.ajax({
        url: '/fornecedores/' + id, // Ajuste a URL conforme necessário
        type: 'GET',
        success: function(data) {
            $('#fornecedorDetalhes').html(data);
        },
        error: function() {
            $('#fornecedorDetalhes').html('Erro ao carregar os detalhes do fornecedor.');
        }
    });
}

window.carregarFornecedor = carregarFornecedor;

function deleteData(e) { 
    var t = "delete" + e, 
        a = document.getElementById(t), 
        o = a.dataset.token, 
        r = a.dataset.route, 
        n = a.dataset.redirect; 

    //alert(a);
    
    swal({ 
        title: "Atenção!", 
        text: "Tem certeza que deseja deletar este item?", 
        icon: "warning", buttons: ["Não, cancele", "Sim, tenho certeza"], 
        dangerMode: !0 
    })
    .then((e => {
        e && $.ajax({ url: r, type: "post", 
            data: { 
                _method: "delete",_token:o 
            }, 
            success: function () { 
                swal({ 
                    title: "Exclusão!", text: "Item excluído com sucesso!", 
                    icon: "success" 
                })
                .then((function () { 
                    $(location).attr("href", n) 
                })) 
            }, 
            error: function () { 
                swal("Ocorreu um erro!", { 
                    icon: "error" 
                }) 
            } 
        }) 
    })) 
} 

window.deleteData = deleteData; 