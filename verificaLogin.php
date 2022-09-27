<?php

class userLogin {
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

$usuarioLogin = new userLogin($_POST['email'], $_POST['senha']);

$variavelErroLogin = array(
    $erroEmail = '',    // Vazias, pois depois o código retorna erro dizendo que não foi definido.
    $erroSenha = '',
);

    // Verifica se POST foi REQUERIDO
    // if($_SERVER['REQUEST_METHOD'] == 'POST'){
    if($usuarioLogin->getEmailLogin() !== null && $usuarioLogin->getSenhaLogin() !== null){

        // Verifica se POST_EMAIL está VAZIO
        if(empty($usuarioLogin->getEmailLogin())){
            $variavelErroLogin[0] = "Por favor, insira um Email";
        }
        else{
            // Faz FUNÇÃO de LIMPEZA
            limpeza($usuarioLogin->getEmailLogin());

            // Verificação de Email
            if(!filter_var($usuarioLogin->getEmailLogin(), FILTER_VALIDATE_EMAIL)){
                $variavelErroLogin[0] = "Email inválido";
            }
            elseif($usuarioLogin->getEmailLogin() != $_SESSION['email']){
                $variavelErroLogin[0] = "Email inexistente!";
            }
        }
        
        if(empty($usuarioLogin->getSenhaLogin())){
            $variavelErroLogin[1] = "Por favor, insira uma senha";
        }
        else{
            // Foi posto condição de Email também, pq se o email estiver errado e a senha correta ele não 
            // dá erro na senha e pode ser perigoso, significando que alguém utiliza essa
            // senha (Aqui estava sendo utilizado sessões)
            if($usuarioLogin->getSenhaLogin() != $_SESSION['senha'] || $variavelErroLogin[0] != ""){ 
                $variavelErroLogin[1] = "Senha incorreta!";
            }
        }

        if($variavelErroLogin[0] == "" && $variavelErroLogin[1] == ""){
            header('Location: /facebook/sessao');
        }
    }
?>