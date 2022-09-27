<?php
// Retirando controle de cache, pois como estou utilizando sessões
// ele retorna erro
// Deve ser posto antes do inicio da sessão, senão não tem efeito
    header('Cache-Control: no cache');
    session_cache_limiter('private_no_expire');

    session_start();

// Omição de erros como "arrays não definidos por exemplo"
    ini_set('display_errors',0);
    error_reporting(0);    
?>

<?php
    include "funLimpeza.php";
    include "verificaCadastro.php";
    include "verificaLogin.php";
    include "verificaRecupera.php";
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="author" content="Rodrigo Alves">
    <meta name="description" content="Tela de login do Facebook">
    <meta name="keywords" content="Facebook, login"> 
    <link rel="stylesheet" href="/facebook/Estilização/style.css">
    <link rel="stylesheet" href="/facebook/Estilização/mediaQueryStyle.css">

    <title> Entre ou Cadastre-se </title>
</head>

<body> 

    <div class="conteiner">
        
        <div class="elementos">
            <p class="logo">
                facebook
            </p>

            <p class="texto">
                O Facebook ajuda você a se conectar e compartilhar com as 
                pessoas que fazer parte da sua vida.
            </p>
        </div>

        <div class="caixaLogin">

            <form method="post" class="formLogin">    <!-- Sem 'Action' pois isso foi definido na verificação -->
                <input type="email" class="<?php if($variavelErroLogin[0] != "") {echo "invalido";}?>" 
                value="<?php if($usuarioLogin->getEmailLogin() !== null) {echo $usuarioLogin->getEmailLogin();}?>" 
                name="email" placeholder="Email ou telefone" id="email" autofocus> 
                <br> <span class="erro"> <?php if($variavelErroLogin[0] != ""){echo $variavelErroLogin[0];} ?> </span>
                
                <input type="password" class="<?php if($variavelErroLogin[1] != "") {echo "invalido";}?>" 
                name="senha" id="senha" placeholder="Senha">
                <br> <span class="erro"> <?php if($variavelErroLogin[1] != "") {echo $variavelErroLogin[1];} ?> </span>
                
                <button id="botao">
                    Entrar
                </button>

            </form>    

            <!-- Fora do <form> porque senão ele tenta enviar naquele <form> -->
            <?php
                include "recuperacao.php";
            ?>      

            <hr style="color: grey; width: 100%;">

            <?php
                include "criarconta.php";
            ?>

        </div>

    </div>    

    <div class="rodape">
        <p>
            <a href="https://github.com/rodrigo-cmk" class="rodapeParagrafo" target="_blank"> 
                Rodrigo Alves © 2022
            </a>
        </p>
    </div>

</body>
</html>