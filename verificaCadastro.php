<?php

        class userCadastro{
            private $emailEntrada;
            private $senhaEntrada;
            private $nomeEntrada;
            private $confirmaSenha;

            // Construtor para obtenção de dados, dessa forma tudo é tratado dentro da classe
            public function __construct($email, $senha, $nome, $confirmaSenha){
                $this->setEmailEntrada($email);
                $this->setSenhaEntrada($senha);
                $this->setNomeEntrada($nome);
                $this->setconfirmaSenha($confirmaSenha);
            }

            // Getter e Setter do EMAIL
            public function getEmailEntrada(){
                return $this->emailEntrada;
            }
            private function setEmailEntrada($email){
                $this->emailEntrada = $email;
            }

            // Getter e Setter da SENHA
            public function getSenhaEntrada(){
                return $this->senhaEntrada;
            }
            private function setSenhaEntrada($senha){
                $this->senhaEntrada = $senha;
            }

            // Getter e Setter do NOME
            public function getNomeEntrada(){
                return $this->nomeEntrada;
            }
            private function setNomeEntrada($nome){
                $this->nomeEntrada = $nome;
            }

            // Getter e Setter da CONFIRMAÇÃO_SENHA
            public function getconfirmaSenha(){
                return $this->confirmaSenha;
            }
            private function setconfirmaSenha($confirmaSenha){
                $this->confirmaSenha = $confirmaSenha;
            }
        }

// Instanciando Classe e inserido valores no construtor
$usuarioCadastro = new userCadastro($_POST['insereEmail'], $_POST['insereSenha'], $_POST['insereNome'], $_POST['confirmaSenha']);

    // Array para armazenamento de valores de erros.
    // Valores definidos como "" para que não retorne erros de código
$variavelErroCadastro = array(
    $emailErro = "", 
    $erroNome = "", 
    $senhaErro = "", 
    $senhaErro2 = "");

    // $_SERVER['REQUEST_METHOD'] == 'POST' --> Outra forma de se fazer
    // Condição que verifica se tem alguma requisição
    // if(isset($_POST['insereNome']) && isset($_POST['insereEmail']) && isset($_POST['insereSenha']) && isset($_POST['confirmaSenha'])){ 
    if(null !== $usuarioCadastro->getNomeEntrada() && null !== $usuarioCadastro->getEmailEntrada() && 
    null !== $usuarioCadastro->getSenhaEntrada() && null !== $usuarioCadastro->getconfirmaSenha()){

        if(empty($usuarioCadastro->getNomeEntrada())){
            $variavelErroCadastro[1] = "Por favor, insira um nome!";
        }
        else{
            limpeza($usuarioCadastro->getNomeEntrada());

            // Filtrando com "preg_match" os caracteres de entrada
            // Barra: Inicio e fim. Colchetes: Intervalo de caracteres. ^ *: Inicio e fim respectivamente
            if(!preg_match("/^[a-zA-ZçÇ' ]*$/", $usuarioCadastro->getNomeEntrada())){
                $variavelErroCadastro[1] = "Por favor, insira somente letras e espaços!";
            }
        }

        if(empty($usuarioCadastro->getEmailEntrada())){
            $variavelErroCadastro[0] = "Por favor insira um email";
        }
        else{
            if(!filter_var($usuarioCadastro->getEmailEntrada(), FILTER_VALIDATE_EMAIL)){
                $variavelErroCadastro[0] = "Por favor, insira um email válido";
            }
        }

        if(empty($usuarioCadastro->getSenhaEntrada())){
            $variavelErroCadastro[2] = "Por favor, insira uma senha!";
        }
        elseif(strlen($usuarioCadastro->getSenhaEntrada()) <= 7){
            $variavelErroCadastro[2] = "A senha deve conter no mínimo 8 caracteres!";
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
            if(!pesquisa($usuarioCadastro->getSenhaEntrada())){
                $variavelErroCadastro[2] = "Insira também '@' ou '#'.";
            }
        }

        if(empty($usuarioCadastro->getconfirmaSenha())){
            $variavelErroCadastro[3] = "Por favor, faça a confirmação da senha!";
        }
        else{
            if($usuarioCadastro->getconfirmaSenha() !== $usuarioCadastro->getSenhaEntrada()){
                $variavelErroCadastro[3] = "As senhas não coincidem!";
            }
        }

        if($variavelErroCadastro[0] == "" && $variavelErroCadastro[1] == "" && $variavelErroCadastro[2] == "" && $variavelErroCadastro[3] == ""){
            $_SESSION['nome'] = $usuarioCadastro->getNomeEntrada();
            $_SESSION['email'] = $usuarioCadastro->getEmailEntrada();
            $_SESSION['senha'] = $usuarioCadastro->getSenhaEntrada();

            header('location: /facebook/inicio#');    
        }
    }
    else{
        echo "";
    }
?>