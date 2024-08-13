<?php
    require_once '../chamado/src/models/User.php';
    class LoginController{
        private $usuarios;

        public function __construct(){
            $this->usuarios = [
                new User(1, 'adm@teste.com', '1234', 1),
                new User(2, 'user@teste.com', '1234', 2)
            ];
        }

        public function autenticar($email, $senha){
            foreach($this->usuarios as $user){
                if($user->email == $email && $user->verificarSenha($senha)){
                    session_start();
                    $_SESSION['autenticacao'] = true;
                    $_SESSION['id'] = $user->id;
                    $_SESSION['tipo'] = $user->tipo;
                    header('Location: ../chamado/src/view/home.php');
                    exit;
                }
            }
            session_start();
            $_SESSION['autenticacao'] = false;
            header('Location: index.php?login=erro');
            exit;
        }
    }
?>