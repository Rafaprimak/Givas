<?php
namespace Controllers;
class LoginController
{
  private $view;

  public function __construct()
  {
    $this->view = new \Views\MainView('login','BaseHeader.php',null);
  }

  public function executar()
  {
    if (isset($_POST['logar'])) {
        \Models\Users::Logar($_POST['usuario'],$_POST['senha']);
    }
    $this->view->render();
  }
}
