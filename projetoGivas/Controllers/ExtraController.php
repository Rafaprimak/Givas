<?php

namespace Controllers;

class ExtraController
{
  private $view;

  public function __construct()
  {
    $this->view = new \Views\MainView('extra');
  }

  public function executar()
  {
    if (isset($_POST['AddExtra'])) {
      \Models\Extra::adicionarExtra($_POST['nome'], $_POST['preco']);
      header('location: ' . INCLUDE_PATH . '/Config');
    }
    elseif(isset($_POST['updateExtra'])){
      \Models\Extra::editarExtra($_POST['nome'], $_POST['preco'],$_POST['id']);
      header('location: ' . INCLUDE_PATH . '/Config');
    }
    $this->view->render();
  }
}