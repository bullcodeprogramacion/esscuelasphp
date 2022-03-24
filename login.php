<?php
require_once './controllers/loginController.php';
if(isset($_POST['enviar'])){
    $errorLogin=login($_POST['user'],$_POST['pass']);
}
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="resources/styles/style.css"> 
        <title>Login</title>
    </head>
    <body>
        <div class="div-login">
            <h1>Login</h1>
            <form action="" method="POST">
                <input type="text" name="user">
                <input type="password" name="pass">
                <input type="submit" name="enviar" value="login">
                <?php
                    if($errorLogin) echo "<span class='error'>$errorLogin</span>";
                ?>
            </form>
        </div>
    </body>
</html>