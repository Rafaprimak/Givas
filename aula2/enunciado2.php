<?php
    class Carro{
        public $marca;
        public $modelo;

        public function __construct($marca, $modelo){
            $this->marca = $marca;
            $this->modelo = $modelo;
        }

        public function exibirInfo(){
            echo "Carro: {$this->marca} {$this->modelo}";
        }
    }

    $carro1 = new Carro("Toyota", "Corolla");
    $carro1->exibirInfo();

//////////////////////////////////////////////////////////////////////////

    class Animal{
        protected $nome;
        private $idade;

        public function getNome(){
            return $this->nome;
        }
        public function getIdade(){
            return $this->idade;
        }
        public function setNome($novoNome){
            $this->nome = $novoNome;
        }
        public function setIdade($novaIdade){
            if($novaIdade > 0){
                $this->idade = $novaIdade;
            }
            else{
                echo "Idade inválida";
            }
        }

        public function __construct($nome, $idade){
            $this->nome = $nome;
            $this->idade = $idade;
        }
        public function mostrarInfo(){
            echo "Nome: {$this->nome} Idade: {$this->idade}";
        }
    }

    class Cachorro extends Animal{
        public function __construct($nome, $idade){
            parent::__construct($nome, $idade);
        }
    }
    $cachorro = new Cachorro("Rex", 3);
    $cachorro->mostrarInfo();



?>