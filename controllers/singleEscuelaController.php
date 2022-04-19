<?php

    function obtenerEscuela($data,$idEscuela){
        $posicion = $idEscuela - 1;
        $data = json_decode($data[$posicion]);
        return $data;
    }

    function crearClase($idEscuela,$nombre_clase,$dataEscuela,$data){
        if(strlen($nombre_clase)<3) return "Error al crear clase";
        array_push($dataEscuela->clases,$nombre_clase);
        return crearData($dataEscuela,$idEscuela,$data);
    }

    function crearAlumno($idEscuela,$dataAlumno,$dataEscuela,$data){
        if(strlen($dataAlumno['nombre_alumno'])<3 || strlen($dataAlumno['apellidos_alumno'])<3) return "Error al crear clase";
        $datosAlumno = [
            "nombre" => $dataAlumno['nombre_alumno'],
            "apellidos" => $dataAlumno['apellidos_alumno'],
            "email" =>  $dataAlumno['email']
        ];
        array_push($dataEscuela->alumnos,$datosAlumno);
        return crearData($dataEscuela,$idEscuela,$data);
    }

    function crearData($dataEscuela,$idEscuela,$data){
        $dataEscuela = json_encode($dataEscuela);
        $posicion = $idEscuela - 1;
        $data[$posicion] = $dataEscuela;

        /// pasamos todos los datos a string con nuestro delimitador
        $data = implode(";",$data);
        // apuntamos a nuestro archivo creado
        $dataFile = fopen("clases/clases.txt","w");
        // insertamos nuestro array
        fwrite($dataFile,$data.";");
        // cerramos el archivo
        fclose($dataFile);
        return true;
    }

?>