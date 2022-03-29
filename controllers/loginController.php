<?php
session_start();
$errorLogin=false;
function login($user,$password){
    $accessFile=file_get_contents("./access/credentials.txt");
    $credentials=explode(" ",$accessFile);
    if($user==$credentials[0] && $password==$credentials[1]){
        initSession();
        header('Location:gestion_escuelas.php');
        return;
    }
    return 'Error en el login';
}

function initSession(){
    $_SESSION['usuario'] = 'Administrador';
    $_SESSION['id'] = 10;
    return 1;
}

function checkSession($url){
    if($url!='/escuelasphp/login.php' && !isset($_SESSION['usuario'])) return header('Location:login.php');
    if($url=='/escuelasphp/login.php' && isset($_SESSION['usuario']) ) return header('Location:gestion_escuelas.php');
}

?>