<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <?php
        session_start();
        $LinksRoute="./";
        include './inc/links.php'; 
    ?>
</head>
<body>
    <?php 
        include './library/configServer.php';
        include './library/consulSQL.php';
        if ($_SESSION['usuario']!== null) {
    
       
        include './inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php 
            include './inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><small>Inicio</small></h1>
            </div>
        </div>



        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               
            </div>
          </div>
        </div>
        <?php include './inc/footer.php'; ?>
    </div>
</body>
</html> 
<?php 
}  else {
    header("Location: process/logout.php");
    exit();
   }
   ?>