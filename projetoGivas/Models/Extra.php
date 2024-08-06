<?php

namespace Models;

class Extra
{
    public static function adicionarExtra($nome, $preco)
    {
        $mysql = new \MySql();
        $mysql->Insert('extras', ['extra', 'preco'], [$nome, $preco]);
    }

    public static function pegarExtras()
    {
        $mysql = new \MySql();
        return $mysql->Select('extras', '*', '', '');
    }

    public static function pegarExtra($id)
    {
        $mysql = new \MySql();
        return $mysql->Select('extras', '*', 'id', $id);
    }

    public static function editarExtra($nome, $preco, $id)
    {
        $mysql = new \MySql();
        $mysql->Update('extras', 'extra', $nome, $id);
        $mysql->Update('extras', 'preco', $preco, $id);
    }
}
