
<?php
session_start();
include '../library/configServer.php';
include '../library/consulSQL.php';
$ResponDNI=consultasSQL::CleanStringText($_GET['DNI']);
$checkBDRespon=ejecutarSQL::consultar("SELECT * FROM encargado WHERE DNI='".$ResponDNI."'");
if(mysql_num_rows($checkBDRespon)>0){
    $fila=mysql_fetch_array($checkBDRespon);
    echo '
        <input type="hidden" class="form-control"  name="responStatus" value="1">
        <div class="group-material">
            <span>Nombre completo del encargado</span>
            <input type="text" readonly class="material-control" required="" name="representativeName" value="'.$fila['Nombre'].'">
        </div>
        <div class="group-material">
            <span>Teléfono</span>
            <input type="text" readonly class="material-control" required="" name="representativePhone" value="'.$fila['Telefono'].'">
        </div>
     ';
}else{
    echo '
        <div class="group-material">
            <input type="text" class="material-control tooltips-general" placeholder="Nombre del encargado" name="representativeName" required="" pattern="[a-zA-ZéíóúáñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombre del encargado del estudiante">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Nombre completo del encargado</label>
        </div>
        <div class="group-material">
            <input type="text" class="material-control tooltips-general" placeholder="Teléfono" name="representativePhone" pattern="[0-9]{10,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente 10 números">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Teléfono</label>
        </div>
     ';
}
mysql_free_result($checkBDRespon);