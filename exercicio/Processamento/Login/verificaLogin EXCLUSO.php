<?php
    header('Cache-Control: no cache');
    session_cache_limiter('private_no_expire');

    session_start();
?>

<?php
    // ini_set('display_error',0);
    // error_reporting(0);
?>

<?php

    class user{
        public $emailEntrada;
        public $senhaEntrada;
    }
$usuario = new user();
$usuario->emailEntrada = trim($_POST['email']);
$usuario->senhaEntrada = trim($_POST['senha']);

    if(empty($usuario->emailEntrada)){
        echo "<script> alert('Por favor, insira um email!'); </script>";

        echo "<script> window.history.back(); </script>";
    }
    else{

        if(empty($usuario->senhaEntrada)){
            echo "<script> alert('Por favor, insira uma senha!'); </script>";

            echo "<script> window.history.back(); </script>";
        }
        else{
            $emailCadastrado = $_SESSION['email'];
            $emailLogin = $usuario->emailEntrada;

            $senhaCadastrada = $_SESSION['senha'];
            $senhaLogin = $usuario->senhaEntrada;

            if($emailLogin !== $emailCadastrado){
                echo "<script> alert('Esse email não existe!'); </script>";

                echo "<script> window.history.back(); </script>";
            }
            else{

                if($senhaLogin !== $senhaCadastrada){
                    echo "<script> alert('Esta senha não existe!'); </script>";

                    echo "<script> window.history.back(); </script>";
                }
                else{
                    echo "<script> window.open('/Exercicio/Processamento/Login/Pagina/dash.php'); </script>".
                    "<script> window.close() </script>";
                }
            }
        }
    }
?>