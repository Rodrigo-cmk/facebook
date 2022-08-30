    <?php
        ini_set('display_errors',0);
        error_reporting(0);
    ?>

    <?php
        header('Cache-Control: no cache');
        session_cache_limiter('private_no_expire'); 

        session_start();
    ?>

<?php

        class user{
            public $emailEntrada;
            public $senhaEntrada;
            public $nomeEntrada;
            public $senhaEntrada2;
        }
    $usuario = new user();
    $usuario->senhaEntrada2 = trim($_POST['confirmaSenha']);
    $usuario->nomeEntrada = trim($_POST['insereNome']);
    $usuario->emailEntrada = trim($_POST['insereEmail']);
    $usuario->senhaEntrada = trim($_POST['insereSenha']);

$variaveisErros = array(
    $emailErro = "", 
    $erroNome = "", 
    $senhaErro = "", 
    $senhaErro2 = "");

    if(isset($_POST['insereNome']) && isset($_POST['insereEmail']) && isset($_POST['insereSenha']) && isset($_POST['confirmaSenha'])){ // $_SERVER['REQUEST_METHOD'] == 'POST'

        function limpeza($valor){
            $valor = trim($valor);
            $valor = htmlspecialchars($valor);
            $valor = stripslashes($valor);
            return $valor;
        }

        if(empty($usuario->nomeEntrada)){
            $variaveisErros[1] = "Por favor, insira um nome!";
        }
        else{
            limpeza($variaveisErros[1]);

            if(!preg_match("/^[a-zA-Z' ]*$/", $usuario->nomeEntrada)){
                $variaveisErros[1] = "Por favor, insira somente letras e espaços!";
            }
        }

        if(empty($usuario->emailEntrada)){
            $variaveisErros[0] = "Por favor insira um email";
        }
        else{
            if(!filter_var($usuario->emailEntrada, FILTER_VALIDATE_EMAIL)){
                $variaveisErros[0] = "Por favor, insira um email válido";
            }
        }

        if(empty($usuario->senhaEntrada)){
            $variaveisErros[2] = "Por favor, insira uma senha!";
        }
        else{
            if(strlen($usuario->senhaEntrada) <= 7){
                $variaveisErros[2] = "A senha deve conter no mínimo 8 caracteres!";
            }
        }

        if(empty($usuario->senhaEntrada2)){
            $variaveisErros[3] = "Por favor, faça a confirmação da senha!";
        }
        else{
            if($usuario->senhaEntrada2 !== $usuario->senhaEntrada){
                $variaveisErros[3] = "As senhas não coincidem!";
            }
        }

        if($variaveisErros[0] == "" && $variaveisErros[1] == "" && $variaveisErros[2] == "" && $variaveisErros[3] == ""){
            $_SESSION['nome'] = $usuario->nomeEntrada;
            $_SESSION['email'] = $usuario->emailEntrada;
            $_SESSION['senha'] = $usuario->senhaEntrada;

            header('location: /Exercicio/Processamento/Login/index.php');
        }
    }
    else{
        echo "";
    }
?>