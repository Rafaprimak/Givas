<?php
namespace Models;
    class Pedidos{

        public static function cadastrarPedidos($tamanho, $extras, $sabor, $cliente, $tipo)
        {
            function calcularPreco($tamanhoId,$saborId,$extraId){
                $mysql = new \MySql();
     
                $tamanhoPreco = $mysql->Select('tamanhos','preco','id',$tamanhoId)[0]['preco'];
                $saborPreco = $mysql->Select('sabores','preco','id', $saborId)[0]['preco'];
     
                $extraPreco = $mysql->Select('extras','preco','id', $extraId)[0]['preco'];
     
                $precoTotal= $tamanhoPreco + $saborPreco + $extraPreco;
     
                return $precoTotal;
            }
            $mysql = new \MySql();
            $mysql->Insert('pizzas',['idSabores','idExtras','idTamanhos'],[$sabor,$extras,$tamanho]);
            $idPizza = $mysql->Sql('SELECT LAST_INSERT_ID();')[0][0];
            $preco = calcularPreco($tamanho,$sabor,$extras);
            $mysql->Insert('pedidos',['idPizza','idCliente','preco','tipo','pronta'],[$idPizza, $cliente, $preco, $tipo, false]);
            
            
        }
        public static function pegarPedidos(){
            $mysql = new \MySql();
            
            return $mysql -> Select('pedidos','*','','');
        }
        
        public static function pegarPedidosPendentes(){
            $mysql = new \MySql();
            return $mysql -> Select('pedidos','*','pronta','0');
        }

        public static function pegarPedido($id){
            $mysql = new \MySql();
            return $mysql -> Select('pedidos','*','id', $id);
        }
        public static function editarPedidos($valores = [], $id){
            $mysql = new \MySql();
            $colunas = ['tamanho','extra','sabor','preco'];
            foreach ($valores as $key => $value) {
                $mysql->Update('pedidos',$colunas[$key],$value,$id);
            }

        }

        public static function finalizarPedido($id) {
            $mysql = new \MySql();
            $mysql->Update('pedidos','pronta',true,$id);
        }
        
        public static function deletarPedidos($id){
            $mysql = new \MySql();
            $mysql->Delete('pedidos','id',$id);
        }

       
    }


