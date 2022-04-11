<?php
require_once './controllers/loginController.php';
checkSession($_SERVER['REQUEST_URI']);
if(isset($_POST['enviar'])){
    $errorLogin=login($_POST['user'],$_POST['pass']);
}
require_once 'head.php';
?>
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