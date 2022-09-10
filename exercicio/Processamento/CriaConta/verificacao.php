    <?php
        // Omição de erros de código, como um "array não definido" por exemplo
        ini_set('display_errors',0);
        error_reporting(0);
    ?>

    <?php
        // Para que não de erro de cache, pois foram utilizadas sessões
        header('Cache-Control: no cache');
        session_cache_limiter('private_no_expire'); 

        session_start();
    ?>

<?php

        class user{
            private $emailEntrada;
            private $senhaEntrada;
            private $nomeEntrada;
            private $senhaEntrada2;

            // Getter e Setter do EMAIL
            public function getEmailEntrada(){
                return $this->emailEntrada;
            }
            public function setEmailEntrada($email){
                $this->emailEntrada = $email;
            }

            // Getter e Setter da SENHA
            public function getSenhaEntrada(){
                return $this->senhaEntrada;
            }
            public function setSenhaEntrada($senha){
                $this->senhaEntrada = $senha;
            }

            // Getter e Setter do NOME
            public function getNomeEntrada(){
                return $this->nomeEntrada;
            }
            public function setNomeEntrada($nome){
                $this->nomeEntrada = $nome;
            }

            // Getter e Setter da CONFIRMAÇÃO_SENHA
            public function getSenhaEntrada2(){
                return $this->senhaEntrada2;
            }
            public function setSenhaEntrada2($senha2){
                $this->senhaEntrada2 = $senha2;
            }
        }

// Instanciando Classe
$usuario = new user();

// Obtendo valores de entrada
$usuario->setSenhaEntrada2($_POST['confirmaSenha']);
$usuario->setNomeEntrada($_POST['insereNome']);
$usuario->setEmailEntrada($_POST['insereEmail']);
$usuario->setSenhaEntrada($_POST['insereSenha']);

    // Array para armazenamento de valores de erros.
    // Valores definidos como "" para que não retorne erros de código
$variaveisErros = array(
    $emailErro = "", 
    $erroNome = "", 
    $senhaErro = "", 
    $senhaErro2 = "");
// $certo = "";

    // $_SERVER['REQUEST_METHOD'] == 'POST' --> Outra forma de se fazer
    // Condição que verifica se tem alguma requisição
    // if(isset($_POST['insereNome']) && isset($_POST['insereEmail']) && isset($_POST['insereSenha']) && isset($_POST['confirmaSenha'])){ 
    if(null !== $usuario->getNomeEntrada() && null !== $usuario->getEmailEntrada() && 
    null !== $usuario->getSenhaEntrada() && null !== $usuario->getSenhaEntrada2()){

        function limpeza($valor){
            $valor = trim($valor);
            $valor = htmlspecialchars($valor);
            $valor = stripslashes($valor);
            return $valor;
        }

        if(empty($usuario->getNomeEntrada())){
            $variaveisErros[1] = "Por favor, insira um nome!";
        }
        else{
            limpeza($usuario->getNomeEntrada());

            // Filtrando com "preg_match" os caracteres de entrada
            // Barra: Inicio e fim. Colchetes: Intervalo de caracteres. ^ *: Inicio e fim respectivamente
            if(!preg_match("/^[a-zA-ZçÇ' ]*$/", $usuario->getNomeEntrada())){
                $variaveisErros[1] = "Por favor, insira somente letras e espaços!";
            }
        }

        if(empty($usuario->getEmailEntrada())){
            $variaveisErros[0] = "Por favor insira um email";
        }
        else{
            if(!filter_var($usuario->getEmailEntrada(), FILTER_VALIDATE_EMAIL)){
                $variaveisErros[0] = "Por favor, insira um email válido";
            }
        }

        if(empty($usuario->getSenhaEntrada())){
            $variaveisErros[2] = "Por favor, insira uma senha!";
        }
        elseif(strlen($usuario->getSenhaEntrada()) <= 7){
            $variaveisErros[2] = "A senha deve conter no mínimo 8 caracteres!";
        }
        else{
            // Se tiver especiais, ele retornará true e está tudo certo, senão, 
            // ele retorna false e dá erro
            function pesquisa($valor){
                if( (preg_match('/@/', $valor)) || (preg_match('/#/', $valor)) ){
                    return true;
                }
                else{
                    return false;
                }
            }

            // Utilizei função própria para usar operador OR
            // Se ele retornar um FALSE da minha função, dará erro
            if(!pesquisa($usuario->getSenhaEntrada())){
                $variaveisErros[2] = "Insira também '@' ou '#'.";
            }
        }

        if(empty($usuario->getSenhaEntrada2())){
            $variaveisErros[3] = "Por favor, faça a confirmação da senha!";
        }
        else{
            if($usuario->getSenhaEntrada2() !== $usuario->getSenhaEntrada()){
                $variaveisErros[3] = "As senhas não coincidem!";
            }
        }

        if($variaveisErros[0] == "" && $variaveisErros[1] == "" && $variaveisErros[2] == "" && $variaveisErros[3] == ""){
            $_SESSION['nome'] = $usuario->getNomeEntrada();
            $_SESSION['email'] = $usuario->getEmailEntrada();
            $_SESSION['senha'] = $usuario->getSenhaEntrada();

            header('location: /Exercicio/Processamento/Login/index.php');
        }
    }
    else{
        echo "";
    }
?>