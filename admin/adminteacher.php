<!DOCTYPE html>
<html lang="es">
<head>
    <title>Docentes</title>
    <?php
        session_start();
        $LinksRoute="../";
        include '../inc/links.php'; 
    ?>
    <script src="../js/SendForm.js"></script>
</head>
<body>
    <?php 
        include '../library/configServer.php';
        include '../library/consulSQL.php';
        include '../process/SecurityAdmin.php';
        include '../inc/NavLateral.php';
    ?>
    <div class="content-page-container full-reset custom-scroll-containers">
        <?php 
            include '../inc/NavUserInfo.php';
        ?>
        <div class="container">
            <div class="page-header">
              <h1 class="all-tittles"><small>Administración Usuarios</small></h1>
            </div>
        </div>
        <div class="conteiner-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
                <li role="presentation"><a href="adminuser.php">Administradores</a></li>
                <li role="presentation"  class="active"><a href="adminteacher.php">Docentes</a></li>
                <li role="presentation"><a href="adminstudent.php">Estudiantes</a></li>
                <li role="presentation"><a href="adminpersonal.php">Personal administrativo</a></li>
            </ul>
        </div>
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                
              
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 lead">
                    <ol class="breadcrumb">
                      <li class="active">Nuevo docente</li>
                      <li><a href="adminlistteacher.php">Listado de docentes</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Registrar un nuevo docente</div>
                <form action="../process/AddTeacher.php" method="post" class="form_SRCB" data-type-form="save" autocomplete="off">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                           <?php
                                $checkSection=ejecutarSQL::consultar("select * from seccion order by Nombre");
                                if(mysql_num_rows($checkSection)<=0){
                                    echo '<br><div class="alert alert-danger text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante!:</strong> No puedes registrar docentes, primero debes de agregar carreras al sistema</div><br>';
                                } 
                            ?>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de cédula del docente" name="teachingDNI" pattern="[0-9-]{1,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números y guiones, 10 dígitos">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Número de Cedula</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del docente" name="teachingName" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los nombres del docente, solamente letras">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombres</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos del docente" name="teachingSurname" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los apellidos del docente, solamente letras">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Apellidos</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del docente" name="teachingPhone" pattern="[0-9]{10,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente 10 números">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Teléfono</label>
                            </div>
                           <div class="group-material">
                                <span>Carrera encargada</span>
                                <select class="material-control tooltips-general" name="teachingSection" data-toggle="tooltip" data-placement="top" title="Elige la carrera encargada del docente">
                                    <option value="" disabled="" selected="">Selecciona una carrera</option>
                                    <?php
                                        while($fila=mysql_fetch_array($checkSection)){
                                            $checkSectionTeacher=ejecutarSQL::consultar("select * from docente where CodigoSeccion='".$fila['CodigoSeccion']."'");
                                            if(mysql_num_rows($checkSectionTeacher)<=0){
                                               echo '<option value="'.$fila['CodigoSeccion'].'">'.$fila['Nombre'].'</option>'; 
                                            } 
                                            mysql_free_result($checkSectionTeacher);
                                        }
                                        mysql_free_result($checkSection);
                                    ?>
                                </select>
                            </div>
                      
                           
                            <p class="text-center">
                                <button type="reset" class="btn btn-info" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                            </p> 
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="msjFormSend"></div>
        <div class="modal fade" tabindex="-1" role="dialog" id="ModalHelp">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                   
            </div>
          </div>
        </div>
        <?php include '../inc/footer.php'; ?>
    </div>
</body>
</html>