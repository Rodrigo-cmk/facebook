<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/facebook/estilização/styleCadastro.css">
    <link rel="stylesheet" href="/facebook/estilização/mediaQueryCada.css">

    <title> Cadastro </title>
</head>

<body>
    <!-- Abre Modal -->
    <a href="#modalCadastro" class="abrirModalCadastro"> Criar conta </a>

    <!-- DIV Modal -->
    <div class="modalCadastro" id="modalCadastro">

        <div class="conteinerModalCadastro">

            <div class="boxModalCadastro">

                <!-- link fecha modal 
                Dentro da box, para que quando ela expanda ele seja influenciado (position relative)-->
                <a href="#" class="fechaModalCadastro"> ✖ </a>

                <h1 class="tituloModalCadastro">
                    Cadastre-se
                </h1>

                <h5 class="subtituloModalCadastro">
                    É rápido e fácil!
                </h5>

                <hr>

                <form method="post" class="formModalCadastro">
                    <input type="text" name="insereNome" id="insereNome" placeholder="Insira seu Nome" autofocus 
                    value="<?php if (null !== $usuarioCadastro->getNomeEntrada()) {echo $usuarioCadastro->getNomeEntrada();} ?>" 
                    class="inputModalCadastro" class="<?php if ($variavelErroCadastro[1] == true) {echo "invalido";} ?>">
                    <br> <span class="erroModalCadastro"> <?php echo $variavelErroCadastro[1]; ?> </span>

                    <br>

                    <input type="email" name="insereEmail" id="insereEmail" placeholder="Insira um Email" 
                    value="<?php if (null !== $usuarioCadastro->getEmailEntrada()) {echo $usuarioCadastro->getEmailEntrada();} ?>" 
                    class="inputModalCadastro" class="<?php if ($variavelErroCadastro[0] == true) {echo "invalido";} ?>">
                    <br> <span class="erroModalCadastro"> <?php echo "".$variavelErroCadastro[0]; ?> </span>

                    <br>

                    <input type="password" name="insereSenha" id="insereSenha" placeholder="Insira uma Senha" 
                    value="<?php if (null !== $usuarioCadastro->getSenhaEntrada()) {echo $usuarioCadastro->getSenhaEntrada();} ?>" 
                    class="inputModalCadastro" class="<?php if ($variavelErroCadastro[2] == true) {echo "invalido"; } ?>">
                    <br> <span class="erroModalCadastro"> <?php echo $variavelErroCadastro[2]; ?> </span>

                    <br>

                    <input type="password" name="confirmaSenha" id="confirmaSenha" placeholder="Confirme sua senha" 
                    value="<?php if (null !== $usuarioCadastro->getconfirmaSenha()) {echo $usuarioCadastro->getconfirmaSenha();} ?>" 
                    class="inputModalCadastro" class="<?php if ($variavelErroCadastro[3] == true) {echo "invalido";} ?>">
                    <br> <span class="erroModalCadastro"> <?php echo $variavelErroCadastro[3]; ?> </span>

                    <br>

                    <button id="botaoCadastreseModal">
                        Cadastre-se
                    </button>
                </form>

            </div>
        </div>
    </div>
</body>
</html>