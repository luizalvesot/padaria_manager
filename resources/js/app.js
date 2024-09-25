//import './bootstrap';

import 'bootstrap';
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
    $(document).ready(function(){
        $('.money').mask('#.##0,00', {reverse: true});
    });
});