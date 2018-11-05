<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <?php
        $LinksRoute="./";
        include './inc/links.php'; 
    ?>
</head>
<body>
    <?php 
        include './library/configServer.php';
        include './library/consulSQL.php';
        
    
       
        include './inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset ">
        <?php 
            include './inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><small>Inicio</small></h1>
            </div>
        </div>