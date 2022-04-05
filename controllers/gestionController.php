<?php

function crearClase($nombre,$url){
    if(strlen($nombre)<4 || strlen($url)<4) return "Error al crear clase";
    
    // // si no existe el directorio lo creamos
    if(!is_dir('clases')) mkdir('clases',0777);

    $id=1;
    /**
     * crear identificador unico
    */
    if(file_exists("clases/clases.txt")){
        $data = file_get_contents('clases/clases.txt');
        $data = explode(';',$data);
        array_pop($data);
        $data = end($data); 
        $data = json_decode($data);
        $id = $data->id + 1;
    }
    
    $dataFile = fopen("clases/clases.txt","a");

    $datosInsertar = [
        "id"=>$id,
        "nombre"=>$nombre,
        "url"=>$url,
        "alumnos"=>[],
        "clases"=>[]
    ];

    $datosInsertarJson = json_encode($datosInsertar);
    fwrite($dataFile,$datosInsertarJson.";");
    fclose($dataFile);
    return true;
}

?>