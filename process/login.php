<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';

$loginName=consultasSQL::CleanStringText($_POST['loginName']);
$loginPassword=consultasSQL::CleanStringText($_POST['loginPassword']);
    $checkAdmin=ejecutarSQL::consultar("SELECT * FROM usuarios WHERE Usuario='$loginName' AND Clave='$loginPassword' AND Estado='1' AND IdPolitica='1'");
    //sirve para posesionarse de los campos de la consulta
    //fila=mysql_fetch_array($checkAdmin);
    if(mysql_num_rows($checkAdmin)>0){            
        $_SESSION['usuario'] = $loginName;
        header("location: ../home.php");
    }else{
           
        header("location: ../index.php");

        }
 