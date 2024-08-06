<?php

namespace Controllers;

class FuncionarioController
{
    private $view;

    public function __construct()
    {
      $this->view = new \Views\MainView('funcionario');
    }
  
    public function executar()
    {
      if(isset($_POST['cadastrar'])){
        \Models\Funcionario::Cadastrar($_POST['nome'],$_POST['cargo'],$_POST['contato'],$_POST['cep'], $_POST['logradouro'], $_POST['bairro'], $_POST['localidade'], $_POST['uf'], $_POST['ibge'], $_POST['numero']);
        $_POST = [];
      }
      else if(isset($_POST['atualizar'])){
        \Models\Funcionario::Atualizar([$_POST['nome'],$_POST['cargo'],$_POST['contato'],$_POST['cep'], $_POST['logradouro'], $_POST['bairro'], $_POST['localidade'], $_POST['uf'], $_POST['ibge'], $_POST['numero']],$_POST['id']);
        $_POST = [];
      }
      else if(isset($_GET["deletar"])){
        \Models\Funcionario::deletarFuncionario($_GET["deletar"]);
      }

      $this->view->render();
    }
}
