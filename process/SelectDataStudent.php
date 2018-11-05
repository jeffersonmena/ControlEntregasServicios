<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$codeStudent=consultasSQL::CleanStringText($_POST['code']);
$selectStudent=ejecutarSQL::consultar("SELECT * FROM estudiante WHERE NIE='".$codeStudent."'");
$dataStudent=mysql_fetch_array($selectStudent);
if(mysql_num_rows($selectStudent)>=1){
    echo '
    <legend><strong>Información del estudiante</strong></legend><br>
    <input type="hidden" value="'.$dataStudent['NIE'].'" name="studentNIEOld">
    <div class="group-material">
        <input type="text" class="material-control tooltips-general" value="'.$dataStudent['NIE'].'" name="studentNIE" required="" maxlength="20" data-toggle="tooltip" data-placement="top" title="NIE de estudiante">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>NIE</label>
    </div>
    <div class="group-material">
        <input type="text" class="material-control tooltips-general" value="'.$dataStudent['Nombre'].'" name="studentName" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombres del estudiante">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Nombres</label>
    </div>
    <div class="group-material">
        <input type="text" class="material-control tooltips-general" value="'.$dataStudent['Apellido'].'" name="studentSurname" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Apellidos del estudiante">
        <span class="highlight"></span>
        <span class="bar"></span>
        <label>Apellidos</label>
    </div>
    <div class="group-material">
        <span>Sección</span>
        <select class="material-control tooltips-general" name="studentSection" data-toggle="tooltip" data-placement="top" title="Elige la sección a la que pertenece el alumno">';
            $checkTeacherSection=ejecutarSQL::consultar("SELECT * FROM docente WHERE CodigoSeccion <> '".$dataStudent['CodigoSeccion']."' ORDER BY Nombre ASC");
            $checkSectionStudent=ejecutarSQL::consultar("SELECT * FROM seccion WHERE CodigoSeccion='".$dataStudent['CodigoSeccion']."'");
            $dataSts=mysql_fetch_array($checkSectionStudent);
            echo '<option value="'.$dataSts['CodigoSeccion'].'">'.$dataSts['Nombre'].'</option>';
            while($fila=mysql_fetch_array($checkTeacherSection)){
                $checkStudentSection=ejecutarSQL::consultar("SELECT * FROM seccion WHERE CodigoSeccion='".$fila['CodigoSeccion']."' ORDER BY Nombre ASC");
                $row=mysql_fetch_array($checkStudentSection);
                echo '<option value="'.$row['CodigoSeccion'].'">'.$row['Nombre'].'</option>';
                mysql_free_result($checkStudentSection);
            }
            mysql_free_result($checkTeacherSection);
            mysql_free_result($checkSectionStudent);
        echo '</select>
    </div>
    ';
}else{
    echo '<div class="alert alert-danger text-center" role="alert"><strong><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Error!:</strong> Lo sentimos ha ocurrido un error.</div>';
}
mysql_free_result($selectStudent);