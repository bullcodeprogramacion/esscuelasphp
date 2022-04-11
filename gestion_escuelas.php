<?php
    require_once './controllers/loginController.php';
    require_once './controllers/escuelasController.php';
    checkSession($_SERVER['REQUEST_URI']);
    if(isset($_POST['enviar']))  $response = crearEscuela($_POST['escuelas_nombre'],$_POST['escuelas_web'],$_FILES);
    require_once 'head.php';
?>
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="logout.php">Cerrar Sesion</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div class="insert-data">
            <h1>Crear Escuela</h1>
            <form action='' method='POST' enctype="multipart/form-data">
                <input type="text" name="escuelas_nombre" placeholder="Insertar el nombre de la escuela">
                <input type="text" name="escuelas_web" placeholder="Insertar la web de la escuela">
                <input type="file" name="image_escuela">
                <input type="submit" name="enviar" value="Crear Escuela">
                <?php
                    if(isset($response) && $response=="Error al crear clase") echo "<span class='error'>$response</span>";
                ?>
            </form>
        </div>
    </body>
</html>
