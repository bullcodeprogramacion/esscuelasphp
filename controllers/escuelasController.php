<?php

    function crearEscuela($nombre,$url,$file){
        
        if(strlen($nombre)<4 || strlen($url)<4) return "Error al crear clase";

        $fileName = createImage($file);
        if(!$fileName) return "Error al crear la imagen, solo imagenes jpeg,jpg y png y no mayores a 1MB";
    
        if(!is_dir('clases')) mkdir('clases',0777);
        $id = 1;
        if(file_exists("clases/clases.txt")){
            $id = incrementarId($id);
        }
        insertarDatos($id,$nombre,$url,$fileName);
        return true;
    }

    function incrementarId($id){
        // obtenemos los datos
        $data = file_get_contents("clases/clases.txt");
        // convertimos el string en array con el delimitador que hemos puesto de ;
        $data = explode(";",$data);
        // quitamos el ultimo elemento del array ya que esta vacio
        array_pop($data);
        // obtenemos el ultimo elementoo del array
        $data = end($data);
        // decoodificamos los datos
        $data = json_decode($data);
        //incrementamos en 1 el id
        $id =  $data->id +1;
        return $id;
    }
    function insertarDatos($id,$nombre,$url,$fileName){
        // creamos nuestro array de datos
        $datosInsertar = [
            "id"=>$id,
            "nombre"=>$nombre,
            "url"=>$url,
            "alumnos"=>[],
            "clases"=>[],
               "imagen"=>$fileName
        ];
        // codificamos el array en JSON
        $datosInsertar = json_encode($datosInsertar);
        // apuntamos a nuestro archivo creado
        $dataFile = fopen("clases/clases.txt","a");
        // insertamos nuestro array
        fwrite($dataFile,$datosInsertar.";");
        // cerramos el archivo
        fclose($dataFile);
        return true;
    }

    function createImage($file){
        // COMPROBAMOS QUE LA IMAGEN TIENE UN NOMBRE, SI NO ESQUE NO HEMOS INSERTADO IMAGEN Y PONEMOS LA NUESTRA POR DEFECTO
        if($file['image_escuela']['name']=='') return $_SERVER['DOCUMENT_ROOT'].'/escuelasphp/resources/images/sin_imagen.jpeg';
        // comprobamos que nuesstra imagen es mas pequeña de 1MB
        if($file['image_escuela']['size']>1000000) return false;
        // checkamos que solo sean imagenes de tipo jpg,jpeg,png para securizar la subida
        if($file['image_escuela']['type']!=='image/png' && $file['image_escuela']['type']!=='image/jpg' && $file['image_escuela']['type']!=='image/jpeg') return false;
        // escribimos el directorio donde vamos a insertar la imagen
        $carpeta = $_SERVER['DOCUMENT_ROOT'].'/escuelasphp/resources/images/';
        // movemos la imagen desde el archivo temporal al nuestro
        move_uploaded_file($file['image_escuela']['tmp_name'],$carpeta.$file['image_escuela']['name']);
        // retornamos el nombre de la imagen
        return $carpeta.$file['image_escuela']['name'];
    }

?>