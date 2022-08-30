<?php
    ini_set('display_error', 0);
    error_reporting(0);

    header('Cache-Control: no cache');
    session_cache_limiter('private_no_expire');

    session_start();
?>

<?php

class user {
    public $emailLogin;
    public $senhaLogin;
}

$usuario = new user();

$variavelErro = array(
    $erroEmail = '',    // Vazias, pois depois o código retorna erro dizendo que não foi definido.
    $erroSenha = '',
);

function limpeza($valor){
    $valor = trim($valor);
    $valor = htmlspecialchars($valor);
    $valor = stripslashes($valor);
    return $valor;
}

    // Verifica se POST foi REQUERIDO
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $usuario->emailLogin = $_POST['email'];
        $usuario->senhaLogin = $_POST['senha'];

        // Verifica se POST_EMAIL está VAZIO
        if(empty($usuario->emailLogin)){
            $variavelErro[0] = "Por favor, insira um Email";
        }
        else{
            // Passa POST para variável e faz FUNÇÃO de LIMPEZA
            $usuario->emailLogin = limpeza($usuario -> emailLogin);

            // Verificação de Email
            if(!filter_var($usuario->emailLogin, FILTER_VALIDATE_EMAIL)){
                $variavelErro[0] = "Email inválido";
            }
            elseif($usuario->emailLogin != $_SESSION['email']){
                $variavelErro[0] = "Email inexistente!";
            }
        }
        
        if(empty($usuario->senhaLogin)){
            $variavelErro[1] = "Por favor, insira uma senha";
        }
        else{
            // Foi posto condição de Email também, pq se o email estiver errado e a senha correta ele não 
            // dá erro na senha e pode ser perigoso (Aqui estava sendo utilizado sessões)
            if($usuario->senhaLogin != $_SESSION['senha'] || $variavelErro[0] != ""){ 
                $variavelErro[1] = "Senha incorreta!";
            }
        }

        if($variavelErro[0] == "" && $variavelErro[1] == ""){
            header('Location: /exercicio/processamento/login/pagina/dash.php');
        }
    }
?>


