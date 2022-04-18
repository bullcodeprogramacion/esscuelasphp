<?php
    require_once './controllers/loginController.php';
    require_once './controllers/escuelasController.php';
    require_once './controllers/singleEscuelaController.php';
    checkSession($_SERVER['REQUEST_URI']);
    require_once 'head.php';
    $idEscuela = $_GET['id'];
    $data = obtenerTodosLosDatos();
    $dataEscuela = obtenerEscuela($data,$idEscuela);
?>
<div class="data-escuela">
    <p>Imagen de escuela</p>
    <img class="image-escuela" src="<?php echo $dataEscuela->imagen ?>"/>
    <p> Nombre : <span> <?php echo $dataEscuela->nombre ?></span></p>
    <p>Sitio web : <a href="https://<?php echo $dataEscuela->url ?>" target="_blank"> <?php echo $dataEscuela->url ?></a></p>
</div>
<div class="insert-data">
    <h1>Crear Clase</h1>
    <form action='' method='POST'>
        <input type="text" name="nombre_clase" placeholder="Insertar el nombre de la clase">
        <input type="submit" name="enviar_clase" value="Crear Clase">
    </form>
</div>
<div class="insert-data">
    <h1>Crear Alumno</h1>
    <form action='' method='POST'>
        <input type="text" name="nombre_alumno" placeholder="Insertar el nombre del alumno">
        <input type="text" name="apellidos_alumno" placeholder="Insertar el apellido del alumno">
        <input type="mail" name="email" placeholder="Insertar el email del alumno">
        <input type="submit" name="enviar_clase" value="Crear Alumno">
    </form>
</div>