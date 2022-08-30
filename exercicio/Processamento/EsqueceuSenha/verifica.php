<?php
    header('Cache-Control: no cache');
    session_cache_limiter('private_no_expire');
    session_start();

    ini_set('display_error', 0);
    error_reporting(0);
?>

<?php

class user{
    public $emailEntrada;
    public $senhaEntrada;
}

$usuario = new user();
$usuario->emailEntrada = $_POST['emailRecuperar'];
$usuario->senhaEntrada = $_POST['senhaRecuperar'];

function limpeza($valor){
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);
}

$variavelErro = array(
    $email = "",
    $senha = "",
);

// $redefinicao = "Senha Redefinida";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        if(empty($usuario->emailEntrada)){
            $variavelErro[0] = "Por favor, insira um email";
        }
        else{
            limpeza($usuario->emailEntrada);

            if($usuario->emailEntrada != $_SESSION['email']){
                $variavelErro[0] = "Email inexistente, você precisa conhecer o email para fazer a alteração!!";
            }
        }

        if(empty($usuario->senhaEntrada)){
            $variavelErro[1] = "Por favor insira uma senha!";
        }
        else{
            if(strlen($usuario->senhaEntrada) <= 7){
                $variavelErro[1] = "A senha deve conter pelo menos 8 caracteres!";
            }
            elseif($variavelErro[0] == "" && $variavelErro[1] == ""){
                    $_SESSION['senha'] = $usuario->senhaEntrada;
                    // $redefinicao = "Senha redefinida!";
    
                    sleep(3);
    
                    header('location: /exercicio/processamento/login/index.php');
                }
            }
        }
?>