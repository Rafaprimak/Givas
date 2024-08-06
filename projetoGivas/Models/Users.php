<?php
namespace Models;

  class Users
  {
    public static function Logar($email,$senha){
      $mysql = new \MySql();
      $info = $mysql->Select("Usuarios", "*", 'email', $email);
      if(password_verify($senha,$info[0]['senha'])){
        $mysql->Update('Usuarios','id_status',1,$info[0]['id']);
        $_SESSION["id"] = $info[0]['id'];
        $_SESSION["email"] = $info[0]['email'];
        $_SESSION["nome"] = $info[0]['nome'];
        $_SESSION["logado"] = true;
        header('location: '.INCLUDE_PATH.'/Dashboard');
        die();
      }
     
    }

    public static function desLogar() {
      $mysql = new \MySql();
      $mysql->Update('Usuarios','id_status',0,$_SESSION["id"]);
      $_SESSION["id"] = null;
      $_SESSION["email"] = null;
      $_SESSION["nome"] = null;
      $_SESSION["logado"] = false;
      header('location: '.INCLUDE_PATH.'/Login');
      die();
    }
  }
  

?>