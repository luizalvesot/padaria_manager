<?php

namespace App\Helpers;

use Carbon\Carbon;

class Formatter
{
    public static function formatCpf($cpf_mask)
    {
        $cpf_formated = str_replace(['.', '-'], '', $cpf_mask);
        return $cpf_formated;
    }

    public static function formatRg($rg_mask)
    {
        $rg_formated = str_replace(['.', '-'], '', $rg_mask);
        return $rg_formated;
    }

    public static function formatCnpj($cnpj_mask)
    {
        $cnpj_formated = str_replace(['.', '-', '/'], '', $cnpj_mask);
        return $cnpj_formated;
    }

    public static function formatCelular($celular_mask)
    {
        $celular_formated = str_replace(['(', ')', '-', ' '], '', $celular_mask);
        return $celular_formated;
    }

    public static function formatTelefone($telefone_mask)
    {
        $telefone_formated = str_replace(['(', ')', '-', ' '], '', $telefone_mask);
        return $telefone_formated;
    }

    public static function formatCep($cep_mask)
    {
        $cep_formated = str_replace(['.', '-', '/'], '', $cep_mask);
        return $cep_formated;
    }

    public static function formatMoney($money_mask)
    {
        $money_formated = str_replace(['.'], '', $money_mask);
        $money_formated_final = str_replace([','], '.', $money_formated);
        $money = number_format((double)$money_formated_final, 2, '.', '');
        return $money;
    }

    public static function formatDescricaoVenda($nome_cliente) {
        $des_cliente1 = strtolower($nome_cliente);
        $des_cliente2 = preg_replace('/[ -]/', '_', $des_cliente1);
        $des_data = preg_replace('/[\/:]/', '_', Carbon::now()->format('d/m/Y H:i:s'));
        $des_data1 = preg_replace('/[ -]/', '_', $des_data);

        return $des_cliente2 . '_' . $des_data1;
    }
}