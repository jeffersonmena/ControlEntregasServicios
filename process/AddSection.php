<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$sectionGrade=consultasSQL::CleanStringText($_POST['sectionGrade']);
$sectionSpecialty=consultasSQL::CleanStringText($_POST['sectionSpecialty']);
$sectionSection=consultasSQL::CleanStringText($_POST['sectionSection']);
$sectionName=$sectionGrade.$sectionSpecialty.$sectionSection;
$checkSection=ejecutarSQL::consultar("SELECT * FROM seccion");
$checktotal=mysql_num_rows($checkSection);
$numS=$checktotal+1;
$checkInst=ejecutarSQL::consultar("SELECT * FROM institucion");
$dataInsti=mysql_fetch_array($checkInst);
$codigo=""; 
$longitud=4; 
for ($i=1; $i<=$longitud; $i++){ 
    $numero = rand(0,9); 
    $codigo .= $numero; 
}
$sectionCode="I".$dataInsti['CodigoInfraestructura']."Y".$dataInsti['Year']."S".$numS."N".$codigo."";
if(mysql_num_rows($checkInst)>0){
    if(!$sectionGrade=="" && !$sectionSpecialty=="" && !$sectionSection==""){
        $checkSectionName=ejecutarSQL::consultar("SELECT * FROM seccion WHERE Nombre='".$sectionName."'");
        $checktotalName=mysql_num_rows($checkSectionName);
        if($checktotalName<=0){
            if(consultasSQL::InsertSQL("seccion", "CodigoSeccion, Nombre", "'$sectionCode','$sectionName'")){
                echo '<script type="text/javascript">
                    swal({
                       title:"¡Sección registrada!",
                       text:"Los datos de la sección se almacenaron exitosamente",
                       type: "success",
                       confirmButtonText: "Aceptar"
                    });
                    $(".form_SRCB")[0].reset();
                </script>';
            }
            else{
               echo '<script type="text/javascript">
                    swal({ 
                        title:"¡Ocurrió un error inesperado!", 
                        text:"No se pudo registrar la sección, por favor intenta nuevamente", 
                        type: "error", 
                        confirmButtonText: "Aceptar" 
                    });
                </script>';
            }
        }else{
            echo '<script type="text/javascript">
                swal({ 
                    title:"¡Ocurrió un error inesperado!", 
                    text:"Esta carrera ya esta registrada. Por favor verifique la lista de carreras e intente nuevamente", 
                    type: "error", 
                    confirmButtonText: "Aceptar" 
                });
            </script>';
        }
    }else{
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"Debes de seleccionar un grado de estudio, especialidad y sección, verifica e intenta nuevamente", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>';
    }
}else{
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"Primero debes de registrar los datos de la institución, ve a la opción Administración y luego a Datos Institución", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>';
}   
mysql_free_result($checkSection);
mysql_free_result($checkInst);
mysql_free_result($checkSectionName);