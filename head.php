<?php
     
    $getTitle=explode('/',$_SERVER['REQUEST_URI']);
    $getTitle=end($getTitle);
    //$getTitle=explode('.',$getTitle);
    $getTitle=substr($getTitle,0,-4);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="resources/styles/style.css"> 
    <title><? echo $getTitle;?></title>
</head>
<body>