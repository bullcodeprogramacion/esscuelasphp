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
                    if(isset($response) && $response==="Error al crear clase" && $response==="Error al crear la imagen, solo imagenes jpeg,jpg y png y no mayores a 1MB") echo "<span class='error'>$response</span>";
                ?>
            </form>
        </div>
        <div class="show-data-div">
            <?php
                $todasLasClases = obtenerTodasLasClases();
                if($todasLasClases){
                    foreach($todasLasClases as $clase){
                        $clase = json_decode($clase);
                    ?>
                        <div class="data-clase">
                            <div class="div-image">
                                <img src="<?php echo $clase->imagen?>" class="clase-imagen">
                            </div>
                            <div> 
                                <span>Nombre:</span><span class="nombre-clase"><?php echo $clase->nombre ?></span>
                            </div>
                            <div>
                                <span>Web:</span><span class="nombre-url"><?php echo $clase->url ?></span>
                                <a href="clase.php?id=<?php echo $clase->id ?>" class="ver-clase">Ver Clase</a>
                            </div>
                        </div>
            <?php
                    }
                }
            ?>
        </div>
    </body>
</html>
