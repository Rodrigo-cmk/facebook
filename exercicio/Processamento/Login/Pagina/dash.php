<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Dash </title>
</head>

<body>
    <h1>
        <span> Login feito, </span> <?php echo $_SESSION['nome']; ?>

        <a href="/exercicio/Processamento/Login/index.php">
            <p type="submit">
                Inicio
            </p>
        </a>

    </h1>
</body>

</html>