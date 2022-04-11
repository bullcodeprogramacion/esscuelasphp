<?php
    
    $getTitle = explode("/",$_SERVER['REQUEST_URI']);
    $title = end($getTitle);
    $title = explode(".", $title);
    //$title = substr($title,0,-4); 
?>
<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="resources/styles/style.css"> 
        <title><?php echo $title[0] ?></title>
    </head>
    <body>
