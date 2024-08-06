<?php

namespace Models;

class Sabor
{
    public static function adicionarSabor($nome,$preco) {
        $mysql = new \MySql();
        $mysql->Insert('sabores',['sabor','preco'],[$nome,$preco]);
    }

    public static function pegarSabores(){
        $mysql = new \MySql();
        return $mysql->Select('sabores','*','','');
    }
    
    public static function pegarSabor($id){
        $mysql = new \MySql();
        return $mysql->Select('sabores','*','id',$id);
    }

    public static function editarSabor($nome,$preco,$id) {
        $mysql = new \MySql();
        $mysql->Update('sabores','sabor',$nome,$id);
        $mysql->Update('sabores','preco',$preco,$id);
    }
}
