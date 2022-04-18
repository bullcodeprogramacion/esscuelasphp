<?php

    function obtenerEscuela($data,$idEscuela){
        $posicion = $idEscuela - 1;
        $data = json_decode($data[$posicion]);
        return $data;
    }

?>