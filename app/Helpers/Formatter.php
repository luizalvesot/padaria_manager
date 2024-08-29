<?php

namespace App\Helpers;

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
}