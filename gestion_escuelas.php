<?php
    require_once './controllers/loginController.php';
    checkSession($_SERVER['REQUEST_URI']);
    require_once 'head.php';
?>
    <header>
        <nav>
            <ul>
                <li><a href="logout.php">Cerrar Sesion</a></li>
            </ul>
        </nav>
    </header> 
    <div class="insert-data">
        <h1>Crear Escuela</h1>
        <form action='' method='POST'>
            <input type="text" name="escuela_nombre" placeholder="Inserta el nombre de la escuela">
            <input type="text" name="url_escuela" placeholder="Inserta la url">
            <input type="submit" value="Crear Escuela" name="enviar">
        </form>
    </div>
</body>
</html>