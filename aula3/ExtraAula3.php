<?php
    //Desenvolvendo um sistema básico de cadastro de alunos em PHP utilizando conceitos de orientações a objetos
    //Requisitos: Login, Classes Aluno e CadastroAlunos.

    class Aluno{
        private $nome;
        private $matricula;
        private $curso;

        public function getNome(){
            return $this->nome;
        }
        public function getMatricula(){
            return $this->matricula;
        }
        public function getCurso(){
            return $this->curso;
        }
        public function setNome($nome){
            $this->nome = $nome;
        }
        public function setMatricula($matricula){
            $this->matricula = $matricula;
        }
        public function setCurso($curso){
            $this->curso = $curso;
        }

        function __construct(){
            $this->nome = "Rafael";
            $this->matricula = "223322";
            $this->curso = "Engenharia de Software";
        }
    }

    class CadastroAlunos extends Aluno{
        private $alunos;

        function __construct(){
            $this->alunos = array();
        }

        public function cadastroAluno($aluno, $nome, $matricula, $curso){
            $this->alunos[] = $aluno;
            $this->getNome();
            $this->getMatricula();
            $this->getCurso();
        }

        public function listarAlunos(){
            return $this->alunos;
        }
        
    }
?>
<body>
    <h1>Cadastro de Alunos</h1>
    <form action="Extra - Aula 3.php" method="post">
        <label for="login">Login:</label>
        <input type="text" name="login" id="login">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha">
        <input type="submit" value="Entrar">
    </form>
    <?php

        class Login extends CadastroAlunos{
            private $login;
            private $senha;

            public function getLogin(){
                return $this->login;
            }
            public function getSenha(){
                return $this->senha;
            }
            public function setLogin($login){
                $this->login = $login;
            }
            public function setSenha($senha){
                $this->senha = $senha;
            }

            function __construct($login, $senha){
                $this->login = "admin";
                $this->senha = "admin";
            }
        }


        if(isset($_POST['login']) && isset($_POST['senha'])){
            $login = $_POST['login'];
            $senha = $_POST['senha'];
            if($login == "admin" && $senha == "admin"){
                echo "<h3>Logado com sucesso!</h3>";
                $aluno = new Aluno();
                $cadastro = new CadastroAlunos();
                $cadastro->cadastroAluno($aluno, $aluno->getNome(), $aluno->getMatricula(), $aluno->getCurso());
                $alunos = $cadastro->listarAlunos();
                echo "<h3>Alunos Cadastrados:</h3>";
                foreach($alunos as $aluno){
                    echo "<h4>Nome: ".$aluno->getNome()."</h4>";
                    echo "<h4>Matrícula: ".$aluno->getMatricula()."</h4>";
                    echo "<h4>Curso: ".$aluno->getCurso()."</h4>";
                }
            }else{
                echo "<h3>Usuário ou senha inválidos!</h3>";
            }
        }
    ?>
    <br>
    <input type="button" value="Voltar" onclick="window.location.href='ExtraAula3.php'">
</body>
