<?php

namespace Controllers;
class DashboardController
{
  private $view;

  public function __construct()
  {
    $this->view = new \Views\MainView('dashboard','BaseHeader.php',null);
  }

  public function executar()
  {
    $this->view->render();
  }
}