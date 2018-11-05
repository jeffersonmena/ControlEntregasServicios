<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$personalDNI=consultasSQL::CleanStringText($_POST['personalDNI']);
$personalName=consultasSQL::CleanStringText($_POST['personalName']);
$personalSurname=consultasSQL::CleanStringText($_POST['personalSurname']);
$personalPhone=consultasSQL::CleanStringText($_POST['personalPhone']);
$personalPosition=consultasSQL::CleanStringText($_POST['personalPosition']);
$checkDNI=ejecutarSQL::consultar("SELECT * FROM personal WHERE DNI='".$personalDNI."'");
if(mysql_num_rows($checkDNI)<=0){
    if(consultasSQL::InsertSQL("personal", "DNI, Nombre, Apellido, Telefono, Cargo", "'$personalDNI','$personalName','$personalSurname','$personalPhone','$personalPosition'")){ 
        echo '<script type="text/javascript">
            swal({
               title:"¡Personal admin. registrado!",
               text:"Los datos del personal administrativo se almacenaron exitosamente",
               type: "success",
               confirmButtonText: "Aceptar"
            });
            $(".form_SRCB")[0].reset();
        </script>';
    }else{
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"No se pudo registrar personal administrativo, por favor intenta nuevamente", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>'; 
    }
}else{
    echo '<script type="text/javascript">
        swal({ 
            title:"¡Ocurrió un error inesperado!", 
            text:"Este número de cédula está asociado con otro personal administrativo registrado en el sistema, verifícalo e intenta nuevamente", 
            type: "error", 
            confirmButtonText: "Aceptar" 
        });
    </script>'; 
}
mysql_free_result($checkDNI);