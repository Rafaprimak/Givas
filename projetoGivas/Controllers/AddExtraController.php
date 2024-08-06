<?php

namespace Controllers;

class AddExtraController
{
  private $view;

  public function __construct()
  {
    $this->view = new \Views\MainView('AddExtra');
  }

  public function executar()
  {
    if (isset($_POST['AddExtra'])) {
      \Models\Extra::adicionarExtra($_POST['nome'], $_POST['preco']);
      header('location: ' . INCLUDE_PATH . '/Config');
    }
    $this->view->render();
  }
}