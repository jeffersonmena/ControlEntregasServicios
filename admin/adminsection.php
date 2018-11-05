
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Departamentos</title>
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
              <h1 class="all-tittles"><small>Administración VITAL CADE</small></h1>
            </div>
        </div>
        <div class="container-fluid">
            <ul class="nav nav-tabs nav-justified"  style="font-size: 17px;">
              <li role="presentation"><a href="admininstitution.php">VITAL CADE</a></li>
              
              <li role="presentation"><a href="admincategory.php">Productos</a></li>
              <li role="presentation"  class="active"><a href="adminsection.php">Departamentos</a></li>
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
                      <li class="active">Nuevo Departamento</li>
                      <li><a href="adminlistsection.php">Listado de Departamentos</a></li>
                    </ol>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Agregar un nuevo Departamento</div>
                <form action="../process/AddSection.php" method="post" class="form_SRCB" data-type-form="save">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <span>Año/Semestre</span>
                                <select class="material-control tooltips-general" name="sectionGrade" data-toggle="tooltip" data-placement="top" title="Elige el año">
                                    <option value="" disabled="" selected="">Selecciona una opción</option>
                                    <option value="1°">1°</option>
                                    <option value="2°">2°</option>
                                    <option value="3°">3°</option>
                                     <option value="4°">4°</option>
                                      <option value="5°">5°</option>
                                       <option value="6°">6°</option>

                                </select>
                            </div>
                            <div class="group-material">
                                <span>Especialidad</span>
                                <select class="material-control tooltips-general" name="sectionSpecialty" data-toggle="tooltip" data-placement="top" title="Elige la especialidad">
                                    <option value="" disabled="" selected="">Selecciona una opción</option>
                                   
                                    <option value="Bachillerato ">Administración</option>
                                    <option value="Formal ">Internado Señoritas</option>
                                    <option value="Sistemas ">Internado Varones</option>
                                    <option value="Administracion">Laboratorio</option>
                                    <option value="Salud ">Enfermeria</option>
                                    <option value="Teologia ">Secretaria ITSAE</option>
                                </select>
                            </div>
                            <div class="group-material">
                                <span></span>
                                <select class="material-control tooltips-general" name="sectionSection" data-toggle="tooltip" data-placement="top" title="Elige la sección">
                                    <option value="" disabled="" selected="">Selecciona una opción</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                     <option value="Unico">Único</option>
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
                    <h4 class="modal-title text-center all-tittles">ayuda del sistema</h4>
                </div>
                <div class="modal-body">
                    <?php include '../help/help-adminsection.php'; ?>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="zmdi zmdi-thumb-up"></i> &nbsp; De acuerdo</button>
                </div>
            </div>
          </div>
        </div>
        <?php include '../inc/footer.php'; ?>
    </div>
</body>
</html>