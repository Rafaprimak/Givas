<?php

namespace Models;

class Funcionario
{
    public static function Cadastrar($nome,$cargo,$contato, $cep, $logradouro, $bairro, $localidade, $uf, $ibge, $numero){
        $mysql = new \MySql();
        $verificaArray = [' ','/','.',','];
        $nomeVerifica = str_replace($verificaArray,'',$nome);
        $contatoVerifica = str_replace($verificaArray,'',$contato);

        if($nomeVerifica != '' && $contatoVerifica != ''){
            $mysql->Insert('funcionarios',['nome','cargo','contato','CEP','logradouro','bairro','localidade','uf','ibge','numeroCasa'],
            [$nome,$cargo,$contato,$cep,$logradouro,$bairro,$localidade,$uf,$ibge,$numero]);
        }
        else{
            echo '<script> alert("preencha todos os campos"); </script>';
        }
    }

    public static function Atualizar($valores = [],$id) {
        $mysql = new \MySql();
        $colunas = ['nome','cargo','contato','CEP','logradouro','bairro','localidade','uf','ibge','numeroCasa'];
        foreach ($valores as $key => $value) {
            $mysql->Update('funcionarios',$colunas[$key],$value,$id);
        }
    }

    public static function pegarFuncionario($id){
        $mysql = new \MySql();
        try {
            return $mysql->Select('funcionarios','*','id',$id);
        } catch (\Throwable $th) {
            return [];
        }
    }

    public static function pegarFuncionarios(){
        $mysql = new \MySql();
        try {
            return $mysql->Select('funcionarios','*','','');
        } catch (\Throwable $th) {
            return [];
        }
    }

    public static function deletarFuncionario($id) {
        $mysql = new \MySql();
        $mysql->Delete('funcionarios','id',$id);
    }
}
