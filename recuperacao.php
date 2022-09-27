<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/facebook/estilização/styleRecupera.css">
    <link rel="stylesheet" href="/facebook/estilização/mediaQueryRecupera.css">

    <title> Recuperação </title>
</head>
<body>
    <!-- Abre Modal -->
    <a href="#modalRecupera" class="linkEsqueceu">
        Esqueceu a senha?
    </a>

     <!-- DIV Modal -->
    <div id="modalRecupera">
    
        <div class="conteinerRecupera">

            <div class="boxModalRecupera">

                <a href="#" class="fechaRecupera">
                    ✖
                </a>

                <span class="tituloBoxRecupera">
                    Altere sua conta
                    <hr>
                </span>

                <form method="post" class="formModalRecupera">

                    <input type="email" name="emailRecuperar" id="emailRecuperar" autofocus placeholder="Email"
                    value="<?php if($userRecupera->getEmailEntrada() !== null){echo $userRecupera->getEmailEntrada();} ?>"
                    class="inputModalRecupera"
                    class="<?php if($varErroRecupera[0] !== ""){echo "invalidoRecupera";} ?>">                    
                    <span class="erroRecupera"> <?php echo $varErroRecupera[0]; ?> </span>

                    <br>

                    <input type="password" name="senhaRecuperar" id="senhaRecuperar" placeholder="Nova Senha"
                    value="<?php if($userRecupera->getSenhaEntrada() !== null){ echo $userRecupera->getSenhaEntrada();} ?>"
                    class="inputModalRecupera"
                    class="<?php if($varErroRecupera[1] !== ""){ echo "invalidoRecupera";} ?>">
                    <span class="erroRecupera"> <?php echo $varErroRecupera[1]; ?> </span>

                    <br>    

                    <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Repita a Senha"
                    value="<?php if($userRecupera->getSenhaEntrada2() !== null){ echo $userRecupera->getSenhaEntrada2();} ?>"
                    class="inputModalRecupera"
                    class="<?php if($varErroRecupera[2] != null){echo 'invalidoRecupera';}?>">
                    <span class="erroRecupera"> <?php echo $varErroRecupera[2]; ?> </span> 

                    <button class="btnAlterar">
                        Alterar
                    </button>
                </form>
            </div>
        </div>
    </div>
    
</body>
</html>