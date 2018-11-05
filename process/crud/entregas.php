<?php 
include '../../library/configServer.php';
include '../../library/consulSQL.php';
session_start();
$usu_entrega = $_SESSION['usuario'];
$action=$_POST['action'];
 
date_default_timezone_set('America/Guayaquil');
$Fechaentrega = date("Y-m-d H:i:s");
switch ($action) {
    case 'save':
    $departamento=consultasSQL::CleanStringText($_POST['departamento']);
    $cant=consultasSQL::CleanStringText($_POST['cantidad']);
    $descripcion=consultasSQL::CleanStringText($_POST['descripcion']);
    
//sirve para posesionarse de los campos de la consulta
//fila=mysql_fetch_array($checkAdmin);
        $sql_1=ejecutarSQL::consultar("SELECT * FROM  entregas WHERE  cantidad='$cant' AND Detalle ='$descripcion'  AND idDepartamento='$departamento' AND Fechaentrega='$Fechaentrega'");

        if(mysql_num_rows($sql_1)<1){
            $insert_sql=consultasSQL::InsertSQL("entregas", "cantidad, Detalle,Fechaentrega, usuario, idDepartamento
                                                ", "'$cant','$descripcion','$Fechaentrega','$usu_entrega','$departamento'");
            $sql_2=ejecutarSQL::consultar("SELECT * FROM  entregas WHERE  cantidad='$cant' AND Detalle ='$descripcion'  AND idDepartamento='$departamento' AND Fechaentrega='$Fechaentrega'");
            if (mysql_num_rows($sql_2)>0) {
                    $sms ="Se registro exitosamente";
                    header("location: ../../entregas.php?sms=".$sms); 
            }

        }else{
               $sms ="Error: La entrega ya fue registrada";
            header("location:../../entregas.php?smse=".$sms);

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