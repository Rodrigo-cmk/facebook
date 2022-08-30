<?php
    include "verificacao.php";
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/Exercicio/Estilização/styleCriarConta.css">

    <title> Cadastre-se </title>
</head>

<body>

    <?php
    ini_set('display_errors',0);
    error_reporting(0);
    ?>

    <?php
        header('Cache-Control: no cache');
        session_cache_limiter('private_no_expire');

        session_start();
    ?>

    <div class="conteiner">

        <div class="box">
            <h1 class="titulo">
                Cadastre-se     
            </h1>
        
            <h5 class="subtitulo">
                É rápido e fácil!
            </h5>

            <hr> 

            <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">

                <input type="text" name="insereNome" id="insereNome" placeholder="Insira seu Nome" autofocus
                value="<?php if(isset($_POST['insereNome'])){echo $_POST['insereNome'];}?>"
                class="<?php if($variaveisErros[1] == true){echo "invalido";}?>">
                <br> <span class="erro"> <?php echo $variaveisErros[1]; ?> </span>
        
                <br>
                
                <input type="email" name="insereEmail" id="insereEmail" placeholder="Insira um Email"
                value="<?php if(isset($_POST['insereEmail'])){echo $_POST['insereEmail'];}?>"
                class="<?php if($variaveisErros[0] == true){echo "invalido";}?>">
                <br> <span class="erro"> <?php echo $variaveisErros[0]; ?> </span>
        
                <br>
        
                <input type="password" name="insereSenha" id="insereSenha" placeholder="Insira uma Senha"
                value="<?php if(isset($_POST['insereSenha'])){echo $_POST['insereSenha'];}?>"
                class="<?php if($variaveisErros[2] == true){echo "invalido";}?>">
                <br> <span class="erro"> <?php echo $variaveisErros[2]; ?> </span>
                
                <br>
        
                <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Confirme sua senha"
                value="<?php if(isset($_POST['confirmaSenha'])){echo $_POST['confirmaSenha'];}?>"
                class="<?php if($variaveisErros[3] == true){echo "invalido";}?>">
                <br> <span class="erro"> <?php echo $variaveisErros[3]; ?> </span> 

                <br>
        
                <button id="botaoCadastrese">
                    Cadastre-se
                </button>
            </form>
        </div>
    </div>
    
</body>

</html>