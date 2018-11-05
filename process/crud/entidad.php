<?php 
include '../../library/configServer.php';
include '../../library/consulSQL.php';
$action=$_POST['action'];
switch ($action) {
    case 'save':
        $ruc=consultasSQL::CleanStringText($_POST['ruc']);
        $direccion=consultasSQL::CleanStringText($_POST['direccion']);
        $razonsocial=consultasSQL::CleanStringText($_POST['razon']);
        $insert_sql=consultasSQL::InsertSQL("entidad", "Razonsocial, Ruc, Direccion", "'$razonsocial','$ruc','$direccion'");
    //sirve para posesionarse de los campos de la consulta
    //fila=mysql_fetch_array($checkAdmin);
            $sql=ejecutarSQL::consultar("SELECT * FROM entidad WHERE Razonsocial='$razonsocial' AND Ruc='$ruc'");
            if(mysql_num_rows($sql)>0){            
                
                
                $sms ="Se registro exitosamente";
                header("location: ../../entidad.php?sms=".$sms);    
            }else{
                   
                header("location: ../index.php");

                }
                break;
    case 'update':
        # code...
        break;
    case 'delete':
        # code...
        break;                
    
    default:
        # code...
        break;
}
 ?>