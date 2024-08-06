<!DOCTYPE html>
<html lang="pt-br">

<head>
  <script src="https://cdn.tailwindcss.com"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="<?php echo INCLUDE_PATH; ?>/assets/css/style.css">
  <title><?php echo $arr['titulo']; ?></title>
</head>


<nav style="display: flex;align-items: center;gap: 10px;background-color: #BFCCB5; justify-content: space-around; height: 13%;">
<img src="<?php echo INCLUDE_PATH ?>/assets/images/logoMealTime.png" alt="" style="max-width: 100px" >

  <a class="bto" href="<?php echo INCLUDE_PATH ?>Dashboard">DASHBOARD</a>
  <a class="bto" href="<?php echo INCLUDE_PATH ?>Funcionario">FUNCIONÁRIOS</a>
  <a class="bto" href="<?php echo INCLUDE_PATH ?>cozinha">COZINHA</a>
  <a class="bto" href="<?php echo INCLUDE_PATH ?>Pedidos">PEDIDOS</a>
  <a class="bto" href="<?php echo INCLUDE_PATH ?>Clientes">CLIENTES</a>
  
</nav>


