<?php

namespace Controllers;

class DeslogarController
{
 

  public function executar()
  {
    \Models\Users::desLogar();
  }
}