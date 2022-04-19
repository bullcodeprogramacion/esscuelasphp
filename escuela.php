<?php
    require_once './controllers/loginController.php';
    require_once './controllers/escuelasController.php';
    require_once './controllers/singleEscuelaController.php';
    checkSession($_SERVER['REQUEST_URI']);
    require_once 'head.php';
    $idEscuela = $_GET['id'];
    $data = obtenerTodosLosDatos();
    $dataEscuela = obtenerEscuela($data,$idEscuela);
    if(isset($_POST['enviar_clase'])) crearClase($idEscuela,$_POST['nombre_clase'],$dataEscuela,$data);
    if(isset($_POST['enviar_alumno'])) crearAlumno($idEscuela,$_POST,$dataEscuela,$data);
?>
<div class="data-escuela">
    <p>Imagen de escuela</p>
    <img class="image-escuela" src="<?php echo $dataEscuela->imagen ?>"/>
    <p> Nombre : <span> <?php echo $dataEscuela->nombre ?></span></p>
    <p>Sitio web : <a href="https://<?php echo $dataEscuela->url ?>" target="_blank"> <?php echo $dataEscuela->url ?></a></p>
</div>
<hr>
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
        <input type="submit" name="enviar_alumno" value="Crear Alumno">
    </form>
</div>
<hr>
<h2 class="title-data">DATOS DE LA ESCUELA <?php echo $dataEscuela->nombre?></h2>
<div class="show-data">
    <h3>Todas las clases</h3>
    <?php
        foreach ($dataEscuela->clases as $clase) {?>
            <span class="each-escuela"><?php echo $clase?></span> 
    <?php }
    ?>
</div>
<div class="show-data">
    <h3>Todos los alumnos</h3>
    <?php
        foreach ($dataEscuela->alumnos as $alumno) {?>
            <div class="each-data-alumno">
                <span class="each-alumno">Nombre y Apellidos: <?php echo $alumno->nombre." ".$alumno->apellidos?></span>
                <span class="each-alumno">Email: <?php echo $alumno->email?></span>
            </div> 
    <?php }
    ?>
</div>