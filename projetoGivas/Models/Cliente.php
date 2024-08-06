<?php

namespace Models;

class Cliente
{
    public static function adicionarCliente($nome, $cpf, $contato, $cep, $logradouro, $bairro, $localidade, $uf, $ibge, $numero, $complemento)
    {
        $mysql = new \MySql();
        $verificaArray = [' ', '/', '.', ','];
        $nomeVerifica = str_replace($verificaArray, '', $nome);
        $contatoVerifica = str_replace($verificaArray, '', $contato);

        if ($nomeVerifica != '' && $contatoVerifica != '') {
            try {
                $mysql->Insert(
                    'clientes',
                    ['nome', 'CPF', 'contato', 'CEP', 'logradouro', 'bairro', 'localidade', 'uf', 'ibge', 'numeroCasa', 'complemento'],
                    [$nome, $cpf, $contato, $cep, $logradouro, $bairro, $localidade, $uf, $ibge, $numero, $complemento]
                );
            } catch (\Throwable $th) {
                echo $th;
            }
        } else {
            echo '<script> alert("preencha todos os campos"); </script>';
        }
    }

    public static function pegarClientes()
    {
        $mysql = new \MySql();
        return $mysql->Select('clientes', '*', '', '');
    }

    public static function pegarCliente($id)
    {
        $mysql = new \MySql();
        return $mysql->Select('clientes', '*', 'id', $id);
    }

    public static function deletarCliente($id) {
        $mysql = new \MySql();
        $mysql->Delete('clientes','id',$id);
    }

    public static function atualizarCliente($valores = [],$id) {
        $mysql = new \MySql();
        $colunas = ['nome', 'CPF', 'contato', 'CEP', 'logradouro', 'bairro', 'localidade', 'uf', 'ibge', 'numeroCasa', 'complemento'];
        foreach ($valores as $key => $value) {
            $mysql->Update('clientes',$colunas[$key],$value,$id);
        }
    }

    




}
