<?php
    ini_set('display_error', 0);
    error_reporting(0);

    header('Cache-Control: no cache');
    session_cache_limiter('private_no_expire');

    session_start();
?>

<?php

class user {
    private $emailLogin;
    private $senhaLogin;

    public function __construct($email, $senha){
        $this->setEmailLogin($email);
        $this->setSenhaLogin($senha);
    }

    private function setEmailLogin($email){
        $this->emailLogin = $email;
    }
    public function getEmailLogin(){
        return $this->emailLogin;
    }

    private function setSenhaLogin($senha){
        $this->senhaLogin = $senha;
    }
    public function getSenhaLogin(){
        return $this->senhaLogin;
    }
}

$usuario = new user($_POST['email'], $_POST['senha']);

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
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($usuario->getEmailLogin() !== null && $usuario->getSenhaLogin() !== null){

        // Verifica se POST_EMAIL está VAZIO
        if(empty($usuario->getEmailLogin())){
            $variavelErro[0] = "Por favor, insira um Email";
        }
        else{
            // Faz FUNÇÃO de LIMPEZA
            limpeza($usuario->getEmailLogin());

            // Verificação de Email
            if(!filter_var($usuario->getEmailLogin(), FILTER_VALIDATE_EMAIL)){
                $variavelErro[0] = "Email inválido";
            }
            elseif($usuario->getEmailLogin() != $_SESSION['email']){
                $variavelErro[0] = "Email inexistente!";
            }
        }
        
        if(empty($usuario->getSenhaLogin())){
            $variavelErro[1] = "Por favor, insira uma senha";
        }
        else{
            // Foi posto condição de Email também, pq se o email estiver errado e a senha correta ele não 
            // dá erro na senha e pode ser perigoso, significando que alguém utiliza essa
            // senha (Aqui estava sendo utilizado sessões)
            if($usuario->getSenhaLogin() != $_SESSION['senha'] || $variavelErro[0] != ""){ 
                $variavelErro[1] = "Senha incorreta!";
            }
        }

        if($variavelErro[0] == "" && $variavelErro[1] == ""){
            header('Location: /facebook/sessao');
        }
    }
?>


