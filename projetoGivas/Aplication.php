<?php
define('INCLUDE_PATH','http://localhost/www/projetoGivas/');
define('INCLUDE_DIR',__DIR__);
class Aplication
{
    public function executar()
    {
        $mysql = new MySql();
        $mysql->SetUp("CREATE TABLE IF NOT EXISTS Usuarios(
            id int primary key not null AUTO_INCREMENT,
            id_status boolean not null, 
            email varchar(200) not null,
            nome varchar(200) not null,
            senha varchar(255) not null
            );
            
            CREATE TABLE IF NOT EXISTS funcionarios(
                id int primary key not null AUTO_INCREMENT,
                nome varchar(200) not null,
                cargo varchar(200) not null,
                contato varchar(20) not null,
                CEP int(8) not null,  
                logradouro varchar(50) not null,
                bairro varchar(20) not null,
                localidade varchar (30) not null,
                uf char(2) not null,
                ibge int(10) not null,
                numeroCasa int(5) not null
            );

            CREATE TABLE IF NOT EXISTS clientes(
                id int primary key not null AUTO_INCREMENT,
                nome varchar(255) not null,
                CPF char(12) not null UNIQUE,
                contato varchar(20) not null,
                CEP int(8) not null,  
                logradouro varchar(50) not null,
                bairro varchar(20) not null,
                localidade varchar (30) not null,
                uf char(2) not null,
                ibge int(10) not null,
                numeroCasa int(5) not null,
                complemento varchar(255) not null
            );
            
            CREATE TABLE IF NOT EXISTS sabores(
                id int primary key not null AUTO_INCREMENT,
                sabor varchar(100) not null UNIQUE,
                preco decimal(6,2) not null
            );
            
            CREATE TABLE IF NOT EXISTS extras(
                id int primary key not null AUTO_INCREMENT,
                extra varchar(100) not null UNIQUE,
                preco decimal(6,2) not null
            );
            
            CREATE TABLE IF NOT EXISTS tamanhos(
                id int primary key not null AUTO_INCREMENT,
                tamanho varchar(100) not null UNIQUE,
                preco decimal(6,2) not null 
            );
            
            CREATE TABLE IF NOT EXISTS pizzas(
                id int primary key not null AUTO_INCREMENT,
                idSabores int not null,
                idExtras int not null,
                idTamanhos int not null,
                FOREIGN KEY (idSabores) REFERENCES sabores(id),
                FOREIGN KEY (idExtras) REFERENCES extras(id),
                FOREIGN KEY (idTamanhos) REFERENCES tamanhos(id)
            );
            
            CREATE TABLE IF NOT EXISTS pedidos(
                id int primary key not null AUTO_INCREMENT,
                idPizza int not null,
                idCliente int not null,
                preco decimal(6,2) not null,
                tipo char(1) not null,
                pronta boolean not null, 
                FOREIGN KEY (idPizza) REFERENCES pizzas(id),
                FOREIGN KEY (idCliente) REFERENCES clientes(id)                
            );

            CREATE TABLE IF NOT EXISTS relatorios(
                id int primary key not null AUTO_INCREMENT,
                nome varchar(100) not null                
            );
            ");


        $url = isset ($_GET['url']) ? explode('/', $_GET['url'])[0] : 'Login';
        $url = ucfirst($url);
        $url .= "Controller";
        if (file_exists('Controllers/' . $url . '.php')) {
            if(@$_SESSION["logado"] == true || $url == 'LoginController'){
                $className = 'Controllers\\' . $url;
                $controller = new $className();
                $controller->executar();
            }
            else {
                echo '404';
                die();
            }
        } else {
            die ("não existe controlador");
        }
    }
}

