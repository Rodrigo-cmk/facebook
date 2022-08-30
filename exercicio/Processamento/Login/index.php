<?php
    include "verifica.php";
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
    <link rel="stylesheet" href="/Exercicio/Estilização/style.css">
    <link rel="stylesheet" href="/Exercicio/Estilização/mediaQueryStyle.css">

    <title> Entre ou Cadastre-se </title>
</head>

<body> 

    <?php
        ini_set('display_errors',0);
        error_reporting(0);
    ?>

    <?php
        header('Cache-Control: no cache');
    ?> 

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

            <form method="post">    <!-- Sem 'Action' pois isso foi definido na verificação -->
                <input type="email" class="<?php if($variavelErro[0] != "") {echo "invalido";}?>" 
                value="<?php if(isset($_POST['email'])) {echo $_POST['email'];}?>" 
                name="email" placeholder="Email ou telefone" id="email" autofocus> 
                <br> <span class="erro"> <?php if($variavelErro[0] != ""){echo $variavelErro[0];} ?> </span>
                
                <input type="password" class="<?php if($variavelErro[1] != "") {echo "invalido";}?>" 
                name="senha" id="senha" placeholder="Senha">
                <br> <span class="erro"> <?php if($variavelErro[1] != "") {echo $variavelErro[1];} ?> </span>
                
                <button id="botao">
                    Entrar
                </button>

                <p class="esqueceuASenha">
                    <a href="<?php echo htmlspecialchars('/Exercicio/Processamento/EsqueceuSenha/esqueceuSenha.php')?>" target="_self" class="esqueceuASenha"> 
                        Esqueceu a senha?
                    </a>
                </p>

                <hr>

            </form>    

            <form action="<?php echo htmlspecialchars('/Exercicio/Processamento/CriaConta/criarConta.php');?>" method="post">
                <button name="criarNovaConta" id="criarNovaConta"> 
                    <span>Criar nova conta</span>        
                </button>
            </form>

        </div>

    </div>    

    <div class="rodape">
        <p>
            <a href="https://github.com/rodrigo-cmk" class="rodapeParagrafo" target="_blank"> 
                Rodrigo Alves © 2022
            </a>
        </p>
    </div>

<!-- =========================================================================================================== -->

</body>



</html>
