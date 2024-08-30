//import './bootstrap';

import 'bootstrap';
import Sortable from 'sortablejs';
import $ from 'jquery';
import 'jquery-mask-plugin';

$(document).ready(function() {
    $('.cpf').mask('000.000.000-00');
    $('.rg').mask('XY-00.000.000', {
        translation: {
            'X': { pattern: /[A-Za-z]/},
            'Y': { pattern: /[A-Za-z]/},
            '0': { pattern: /[0-9]/ }
        }
    });
    $('.cnpj').mask('00.000.000/0000-00');
    $('.celular').mask('(00) 00000-0000');
    $('.telefone').mask('(00) 0000-0000');
    $('.cep').mask('00000-000');
});

document.addEventListener('DOMContentLoaded', function () {
    var sortableList = document.getElementById('sortable-list');
    
    new Sortable(sortableList, {
        animation: 150,
        onEnd: function (evt) {
            // Aqui você pode capturar a nova ordem dos itens e enviar para o servidor via AJAX
            console.log('Item moved', evt.item);
        },
    });
});