<?php

namespace Controllers;

class PedidosController
{
    private $view;

  public function __construct()
  {
    $this->view = new \Views\MainView('pedidos');
  }

  public function executar()
  {
    if(isset($_POST['adicionar'])){
      \Models\Pedidos::cadastrarPedidos($_POST['tamanho'],$_POST['extras'],$_POST['sabor'],$_POST['cliente'],$_POST['retirada']);
    }
    $this->view->render();
  }
}
