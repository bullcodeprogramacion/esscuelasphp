<?php
require_once './controllers/loginController.php';
checkSession($_SERVER['REQUEST_URI']);
if(isset($_SESSION['usuario'])){
    echo $_SESSION['usuario'];
}

?>
<div>
    <a href='logout.php'>Cerrar Sesion</a>
</div>
<h1>HOLA GESTION ESCUELAS</h1>