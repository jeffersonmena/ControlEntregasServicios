 <?php 
 include 'library/configServer.php';
include 'library/consulSQL.php';
    
        $LinksRoute="./";
        include './inc/links.php'; 
    
//include 'process/fpdfPlantilla/plantilla.php';
//$con = new Mysqli("localhost", "root", "", "vitalcade");
$fechainicio=$_POST['fechainicio'];
$fechafin=$_POST['fechafin'];

    
    $resultado =ejecutarSQL::consultar("SELECT
    SUM(cantidad) as cantidad,
    Detalle,
    usuario,
    d.Departamento as Departamento
FROM
    entregas e
INNER JOIN departamento d ON
    e.idDepartamento = d.idDepartamento
WHERE
    Fechaentrega  BETWEEN '$fechainicio' AND '$fechafin'
GROUP BY
    detalle,
    usuario,
    d.Departamento");


    if(mysql_num_rows($resultado)>0){
            echo '<div class="container">
            <div class="modal-content">
            <div class="container table table-responsive">
           
<table class="table table-hover">
    <caption style="text-align: center;">
         <h3 >Reportes de Entregas por rango de fecha</h3>
          <label class="default"> Fecha Inicio:<input style="border:none; text-align:center;" disabled value="'.$fechainicio.'"></label>
            <label> Fecha Fin:<input style="border:none; text-align:center;" disabled value="'.$fechafin.'"></label>
    </caption>
    <thead>
        <tr>
            <th>Cantidad</th>
            <th>Detalle</th>
            <th>Usuario</th>
            <th>Departamento</th>
        </tr>
    </thead>
    <tbody>
        
       '; 
        while ($row = mysql_fetch_assoc($resultado)) {
           echo'
        <tr>
            <td>'.$row['cantidad'].'</td>
            <td>'.$row['Detalle'].'</td>
            <td>'.$row['usuario'].'</td>
            <td>'.$row['Departamento'].'</td>
        </tr>
        ';
         }
    echo'     
        
    </tbody>
</table>
            </div>
            </div>
            </div>';

mysql_close($con);
    } else{
        header("location: reportesporfecha.php");
    }
    ?>
