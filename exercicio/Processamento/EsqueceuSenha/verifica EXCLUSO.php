<?php
    header('Cache-Control: no cache');
    session_cache_limiter('private_no_expire');
    
    session_start();
?>

<?php
    class user{
        public $emailUser;
        public $senhaUser;
    }
$usuario = new user();
$usuario->emailUser = trim($_POST['emailRecuperar']);
$usuario->senhaUser = trim($_POST['senhaRecuperar']);

    if($usuario->emailUser !== $_SESSION['email']){
        echo "<script> alert('Email inexistente, é necessário que você conheça o email!!!'); </script>".
        "<script> window.history.back(); </script>";
    }
    else{
        if(strlen($usuario->senhaUser) <= 7){
            echo "<script> alert('A nova senha deve ter pelo menos 8 dígitos!!'); </script>".
            "<script> window.history.back(); </script>";
        }
        else{
            $_SESSION['senha'] = $usuario->senhaUser;

            echo "<script> alert('Senha redefinida, faça login novamente!') </script>".
            "<script> window.open('/exercicio/processamento/login/index.php') </script>".
            "<script> window.close() </script>";
        }
    }

?>