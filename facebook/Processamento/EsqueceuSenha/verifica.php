<?php
    header('Cache-Control: no cache');
    session_cache_limiter('private_no_expire');
    session_start();

    ini_set('display_error', 0);
    error_reporting(0);
?>

<?php

class user{
    private $emailEntrada;
    private $senhaEntrada;
    private $senhaEntrada2;

    // Construtor para obtenção de dados, dessa forma tudo é tratado dentro da classe
    public function __construct($email, $senha, $senha2){
        $this->setEmailEntrada($email);
        $this->setSenhaEntrada($senha);
        $this->setSenhaEntrada2($senha2);
    }

    private function setEmailEntrada($email){
        $this->emailEntrada = $email;
    }
    public function getEmailEntrada(){
        return $this->emailEntrada;
    }

    private function setSenhaEntrada($senha){
        $this->senhaEntrada = $senha;
    }
    public function getSenhaEntrada(){
        return $this->senhaEntrada;
    }

    private function setSenhaEntrada2($senha2){
        $this->senhaEntrada2 = $senha2;
    }
    public function getSenhaEntrada2(){
        return $this->senhaEntrada2;
    }
}

$usuario = new user($_POST['emailRecuperar'], $_POST['senhaRecuperar'], $_POST['confirmaSenha']);

function limpeza($valor){
    $valor = trim($valor);
    $valor = stripslashes($valor);
    $valor = htmlspecialchars($valor);
}

$variavelErro = array(
    $email = "",
    $senha = "",
    $senha2 = "",
);

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        
        if(empty($usuario->getEmailEntrada())){
            $variavelErro[0] = "Por favor, insira um email";
        }
        elseif($usuario->getEmailEntrada() != $_SESSION['email']){
            limpeza($usuario->getEmailEntrada());
            
            $variavelErro[0] = "Email inexistente, você precisa conhecer o email para fazer a alteração!!";
        }

        if(empty($usuario->getSenhaEntrada())){
            $variavelErro[1] = "Por favor insira uma senha!";
        }
        elseif(strlen($usuario->getSenhaEntrada()) <= 7){
                $variavelErro[1] = "A senha deve conter pelo menos 8 caracteres!";
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
                $variavelErro[1] = "Insira também '@' ou '#'.";
            }
        }

        if(empty($usuario->getSenhaEntrada2())){
            $variavelErro[2] = "Por  favor faça a confirmação da senha!";
        }
        elseif($usuario->getSenhaEntrada2() !== $usuario->getSenhaEntrada()){
            $variavelErro[2] = "As senhas não coincidem!";
        }

        if($variavelErro[0] == "" && $variavelErro[1] == "" && $variavelErro[2] == ""){
            $_SESSION['senha'] = $usuario->getSenhaEntrada();

            header('location: /facebook/inicio'); 
        }
    }
?>