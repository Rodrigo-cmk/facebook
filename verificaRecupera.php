<?php

class recupera{
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

$userRecupera = new recupera($_POST['emailRecuperar'], $_POST['senhaRecuperar'], $_POST['confirmaSenha']);

$varErroRecupera = array(
    $email = "",
    $senha = "",
    $senha2 = "",
);

    if($userRecupera->getEmailEntrada() !== null && $userRecupera->getSenhaEntrada() !== null &&
    $userRecupera->getSenhaEntrada2() !== null){
        
        if(empty($userRecupera->getEmailEntrada())){
            $varErroRecupera[0] = "Por favor, insira um email";
        }
        elseif($userRecupera->getEmailEntrada() != $_SESSION['email']){
            limpeza($userRecupera->getEmailEntrada());
            
            $varErroRecupera[0] = "Email inexistente, você precisa conhecer o email para fazer a alteração!!";
        }

        if(empty($userRecupera->getSenhaEntrada())){
            $varErroRecupera[1] = "Por favor insira uma senha!";
        }
        elseif(strlen($userRecupera->getSenhaEntrada()) <= 7){
                $varErroRecupera[1] = "A senha deve conter pelo menos 8 caracteres!";
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
            if(!pesquisa($userRecupera->getSenhaEntrada())){
                $varErroRecupera[1] = "Insira também '@' ou '#'.";
            }
        }

        if(empty($userRecupera->getSenhaEntrada2())){
            $varErroRecupera[2] = "Por  favor faça a confirmação da senha!";
        }
        elseif($userRecupera->getSenhaEntrada2() !== $userRecupera->getSenhaEntrada()){
            $varErroRecupera[2] = "As senhas não coincidem!";
        }

        if($varErroRecupera[0] == "" && $varErroRecupera[1] == "" && $varErroRecupera[2] == ""){
            $_SESSION['senha'] = $userRecupera->getSenhaEntrada();

            header('location: /facebook/inicio#'); 
        }
    }
?>