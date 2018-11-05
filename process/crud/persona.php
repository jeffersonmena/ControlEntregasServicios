<?php 
include '../../library/configServer.php';
include '../../library/consulSQL.php';
$action=$_POST['action'];
switch ($action) {
    case 'save':
        $name=consultasSQL::CleanStringText($_POST['name']);
        $ci=consultasSQL::CleanStringText($_POST['ci']);
        $cell=consultasSQL::CleanStringText($_POST['cel']);
        $genero=consultasSQL::CleanStringText($_POST['genero']);
    //sirve para posesionarse de los campos de la consulta
    //fila=mysql_fetch_array($checkAdmin);
            $sql=ejecutarSQL::consultar("SELECT * FROM personas WHERE CiRuc='$ci'");
            if(mysql_num_rows($sql)<1){
                $insert_sql=consultasSQL::InsertSQL("personas", "NombreCompleto, CiRuc, TelCel, IdGenero", "'$name','$ci','$cell','$genero'");
                if (mysql_num_rows($sql)>1) {
                        $sms ="Se registro exitosamente";
                        header("location: ../../persona.php?sms=".$sms); 
                }
   
            }else{
                   $sms ="Error: Ya existe persona con Número de CI ";
                header("location:../../persona.php?smse=".$sms);

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