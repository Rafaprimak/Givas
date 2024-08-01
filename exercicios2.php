<?php
    class Livro{
        private $titulo;
        private $autor;

        function getTitulo(){
            return $this->titulo;
        }
        function getAutor(){
            return $this->autor;
        }
        function setTitulo($novoTitulo){
            $this->titulo = $novoTitulo;
        }
        function setAutor($novoAutor){
            $this->autor = $novoAutor;
        }

        function __construct($titulo, $autor){
            $this->titulo = $titulo;
            $this->autor = $autor;
        }
        
        function mostrarInfo(){
            echo "Livro: {$this->titulo} Autor: {$this->autor}" . "<br>";
        }
    }
    $livro1 = new Livro("O Senhor dos Anéis", "J.R.R. Tolkien");
    $livro1->mostrarInfo();

    $livro1->setTitulo("Harry Potter");
    $livro1->setAutor("J.K. Rowling");
    $livro1->mostrarInfo();

    ///////////////////////////////////
    echo "---------------------------------";
    echo "<br>";
    ///////////////////////////////////

    class Animal{
        protected $nome;
        protected $idade;

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
            echo "Nome: {$this->nome} Idade: {$this->idade}" . "<br>";
        }
    }

    class Cachorro extends Animal{
        public function __construct($nome, $idade){
            parent::__construct($nome, $idade);
        }
    }
    $cachorro = new Cachorro("Rex", 3);
    $cachorro->mostrarInfo();

    ///////////////////////////////////
    echo "---------------------------------";
    echo "<br>";
    ///////////////////////////////////

    class Calculadora{
        public $numero1;
        public $numero2;

        public function __construct($numero1, $numero2){
            $this->numero1 = $numero1;
            $this->numero2 = $numero2;
        }

        static function soma($numero1, $numero2){
            return $numero1 + $numero2;
        }
        
    }
    $numero1 = 5;
    $numero2 = 3;
    echo "Soma: " . Calculadora::soma($numero1, $numero2) . "<br>";


?>