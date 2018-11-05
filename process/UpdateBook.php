<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$bookCode=consultasSQL::CleanStringText($_POST['primaryKey']);
$bookCorrelative=consultasSQL::CleanStringText($_POST['bookCorrelative']);
$bookCategory=consultasSQL::CleanStringText($_POST['bookCategory']);
$bookName=consultasSQL::CleanStringText($_POST['bookName']);
$bookAutor=consultasSQL::CleanStringText($_POST['bookAutor']);


$bookYear=consultasSQL::CleanStringText($_POST['bookYear']);
$bookEditorial=consultasSQL::CleanStringText($_POST['bookEditorial']);
$bookEdition=consultasSQL::CleanStringText($_POST['bookEdition']);

    if(consultasSQL::UpdateSQL("libro", "CodigoCategoria='$bookCategory',CodigoCorrelativo='$bookCorrelative',Titulo='$bookName',Autor='$bookAutor',Year='$bookYear',Editorial='$bookEditorial',Edicion='$bookEdition',Estado='$bookState'", "CodigoLibro='$bookCode'")){
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Datos del libro actualizados!", 
                text:"Los datos del libro se actualizaron correctamente", 
                type: "success", 
                confirmButtonText: "Aceptar" 
            },
            function(isConfirm){  
                if (isConfirm) {     
                   window.location="infobook.php?codeBook='.$bookCode.'";
                } else {    
                    window.location="infobook.php?codeBook='.$bookCode.'";;
                } 
            });
        </script>';
    }else{
        echo '<script type="text/javascript">
            swal({ 
                title:"¡Ocurrió un error inesperado!", 
                text:"No hemos podido actualizar los datos del libro, por favor intenta nuevamente", 
                type: "error", 
                confirmButtonText: "Aceptar" 
            });
        </script>';
    }

mysql_free_result($checkLoanBook);
mysql_free_result($checkLoanBook1);