<?php

namespace Controllers;

class RelatorioController
{
    private $view;

  public function __construct()
  {
    $this->view = new \Views\MainView('relatorio');
  }

  public function executar()
  {
    if (isset($_POST['Gerar'])) {
      \Models\Relatorio::adiconarRelatorio();
    }
    $this->view->render();
  }
}
