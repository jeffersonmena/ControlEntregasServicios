 <?php 
include '../../library/configServer.php';
include '../../library/consulSQL.php';
$action=$_POST['action'];
switch ($action) {
    case 'save':

$idperusu=consultasSQL::CleanStringText($_POST['idpersonausu']);
$user=consultasSQL::CleanStringText($_POST['user']);
$pass=consultasSQL::CleanStringText($_POST['clave']);
$estado=consultasSQL::CleanStringText($_POST['estado']);
$politica=consultasSQL::CleanStringText($_POST['politica']);


$sql_1=ejecutarSQL::consultar("SELECT * FROM usuarios WHERE Usuario='$user'");    
    //sirve para posesionarse de los campos de la consulta
    //fila=mysql_fetch_array($checkAdmin);    
    if(mysql_num_rows($sql_1)<1){            
        $insert_sql=consultasSQL::InsertSQL("usuarios", "Usuario, Clave, Estado, IdPolitica, idPersona", 
                                                        "'$user','$pass','$estado','$politica','$idperusu'");   
        $sql_2=ejecutarSQL::consultar("SELECT * FROM usuarios WHERE Usuario='$user' AND IdPolitica='$politica' AND idPersona='$idperusu' ");    
        if (mysql_num_rows($sql_2)>0) {
                    $sms ="Usuario registrado exitosamente";
        header("location: ../../usuario.php?sms=".$sms);    
        }   

    }else{
           $sms ="Nombre de Usuario Ya exite, escoja otro";
        header("location: ../../usuario.php?smse=".$sms);

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