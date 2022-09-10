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
    <link rel="stylesheet" href="/exercicio/Estilização/styleEsqueceuSenha.css">

    <title> Redefinição de Senha </title>
</head>

<body>
    <?php
    // header('Cache-Control: no cache');
    // session_cache_limiter('private_no_expire');

    ini_set('display_errors', 0);
    error_reporting(0);

    // session_start();
    ?> 

    <span class="logo">
        facebook
    </span>

    <div class="conteiner">

        <div class="box">

            <span class="tituloBox">
                Altere sua conta
                <hr>
            </span>

            <form method="post" target="_self">

                <input type="email" name="emailRecuperar" id="emailRecuperar" autofocus placeholder="Email"
                value="<?php if($usuario->getEmailEntrada() !== null){echo $usuario->getEmailEntrada();} ?>"
                class="<?php if($variavelErro[0] !== ""){echo "invalido";} ?>">
                <span class="erro"> <?php echo $variavelErro[0]; ?> </span>

                <br>

                <input type="password" name="senhaRecuperar" id="senhaRecuperar" placeholder="Nova Senha"
                value="<?php if($usuario->getSenhaEntrada() !== null){ echo $usuario->getSenhaEntrada();} ?>"
                class="<?php if($variavelErro[1] !== ""){ echo "invalido";} ?>">
                <span class="erro"> <?php echo $variavelErro[1]; ?> </span>

                <br>    

                <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Repita a Senha"
                value="<?php if($usuario->getSenhaEntrada2() !== null){ echo $usuario->getSenhaEntrada2();} ?>"
                class="<?php if($variavelErro[2] != null){echo 'invalido';}?>">
                <span class="erro"> <?php echo $variavelErro[2]; ?> </span>

                <hr>

                <button class="alterar">
                    Alterar
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
</body>

</html>