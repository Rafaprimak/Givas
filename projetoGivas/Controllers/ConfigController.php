<?php

namespace Controllers;
class ConfigController
{
  private $view;

  public function __construct()
  {
    $this->view = new \Views\MainView('config','BaseHeader.php');
  }

  public function executar()
  {
    $this->view->render();
  }
}