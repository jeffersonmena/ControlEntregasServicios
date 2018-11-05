
<?php 
session_start();
if ($_SESSION['usuario']!== null) {
include "process/partialheaderprincipal.php";

 ?> 
<div class="modal-content">
	<div class="modal-header">
		
	</div>
	<div class="modal-body">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<h4>Registro de Usuario</h4>
			</div>
			<div class="panel-body">
				<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br>
                    <form  method="POST" action="process/crud/usuario.php" class="form-horizontal form-label-left" >
                          <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Persona</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
            
                              <select class="form-control col-md-7 col-xs-12" required="required" name="idpersonausu">
                            <?php 
                                  $con = new Mysqli("localhost", "root", "", "vitalcade");
                                  //$sql=ejecutarSQL::consultar("SELECT * FROM genero "); 
                                  $sql = mysqli_query($con,"SELECT * FROM personas ");
                                  while ($row=mysqli_fetch_object($sql)) {
                                ?>
                                <option value="<?php echo $row->idPersona ?> "> <?php echo $row->NombreCompleto ?> </option>
                                <?php
                              }  
                              ?>
                                  
                              </select>
                            </div>
                          </div> 
                      <div class="form-group">
                      	<!--Input escondido para determinar la acción del formulario --Save, Update or Delete -->
                      	<input type="hidden" name="action" value="save">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="user">Usuario<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="user" name="user" placeholder="ej: nombre.apellido" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="clave">Contraseña<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="password" id="clave" name="clave" placeholder="clave de seguridad" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Estado</label>
                            <div class="col-md-6 col-sm-6 col-xs-12" >
                              <select class="form-control col-md-7 col-xs-12" required="required" name="estado">
                                <option value="1">Activo</option>
                                <option value="0">Desabilidado</option>
                              </select>
                            </div>
                          </div>                   
                      <div class="form-group">
                            <label class="control-label col-md-3 col-sm-3 col-xs-12">Politica</label>
                            <div class="col-md-6 col-sm-6 col-xs-12">
            
                              <select class="form-control col-md-7 col-xs-12"required="required" name="politica">
                            <?php 
                                  $con = new Mysqli("localhost", "root", "", "vitalcade");
                                  //$sql=ejecutarSQL::consultar("SELECT * FROM genero "); 
                                  $sql = mysqli_query($con,"SELECT * FROM politicas ");
                                  while ($row=mysqli_fetch_object($sql)) {
                                ?>
                                <option value="<?php echo $row->idPolitica ?> "> <?php echo $row->Politica; ?> </option>
                                <?php
                              }  
                              ?>
                                  
                              </select>
                            </div>
                          </div>
                    
                      <div class="ln_solid"></div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                          <button class="btn btn-primary" type="button">Cancel</button>
            						  <button class="btn btn-primary" type="reset">Reset</button>
                          <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
            </div>
			</div>
		</div>
	</div>
	<div  class="modal-footer" style="text-align:left; ">
		<?php 
			if (!empty($_GET['sms'])) {
				echo '<ul class="list-group">
  <li class="list-group-item list-group-item-success">"'.$_GET['sms'].'"</li>

</ul>';
			}elseif (!empty($_GET['smse'])) {
        echo '<ul class="list-group">
  <li class="list-group-item list-group-item-danger">"'.$_GET['smse'].'"</li>

</ul>';
      }      
    ?>	
	</div>
	
</div>
<?php 
include "process/partialfooterprincipal.php";

} 
else {
    header("Location: process/logout.php");
    exit();
   }
 ?> 