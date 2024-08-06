<?php

namespace Controllers;
class CozinhaController
{
  private $view;

  public function __construct()
  {
    $this->view = new \Views\MainView('cozinha');
  }

  public function executar()
  {
    if (isset($_GET["concluir"])) {
        \Models\Pedidos::finalizarPedido($_GET["concluir"]);
    }
    elseif(isset($_GET["excluir"])){
        \Models\Pedidos::deletarPedidos($_GET["excluir"]);
    }
    $this->view->render();
  }
}