<?php 
include '../../library/configServer.php';
include '../../library/consulSQL.php';
$action=$_POST['action'];
switch ($action) {
    case 'save':
        $departamento=consultasSQL::CleanStringText($_POST['departamento']);
        $idpersonaresponsable=consultasSQL::CleanStringText($_POST['personaresponsable']);
    //sirve para posesionarse de los campos de la consulta
    //fila=mysql_fetch_array($checkAdmin);
            $sql_1=ejecutarSQL::consultar("SELECT * FROM departamento WHERE Departamento='$departamento'");
            if(mysql_num_rows($sql_1)<1){
                $insert_sql=consultasSQL::InsertSQL("departamento", "Departamento, idPersona", "'$departamento','$idpersonaresponsable'");
                $sql_2=ejecutarSQL::consultar("SELECT * FROM departamento WHERE Departamento='$departamento' AND idPersona='$idpersonaresponsable'");
                if (mysql_num_rows($sql_2)>1) {
                        $sms ="Se registro exitosamente";
                        header("location: ../../departamento.php?sms=".$sms); 
                }
   
            }else{
                   $sms ="Error: El Departamento Ya está registrado";
                header("location:../../departamento.php?smse=".$sms);

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