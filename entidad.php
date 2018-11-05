
<?php 
session_start();
if ($_SESSION['usuario']!== null) {
include "process/partialheaderprincipal.php";

 ?> 
<div class="modal-content">
	<div class="modal-header">
		
	</div>
	<div class="modal-body">
		<div class="panel panel-info">
			<div class="panel-heading">
				<h4>Registro de Entidad</h4>
			</div>
			<div class="panel-body">
				<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br>
                    <form  method="POST" action="process/crud/entidad.php" class="form-horizontal form-label-left" >
                      <div class="form-group">
                      	<!--Input escondido para determinar la acción del formulario --Save, Update or Delete -->
                      	<input type="hidden" name="action" value="save">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="razon">Razón Social<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="razon" name="razon" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="ruc">Ruc<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="text" id="ruc" name="ruc" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="direccion" class="control-label col-md-3 col-sm-3 col-xs-12">Dirección</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input id="direccion" class="form-control col-md-7 col-xs-12" type="text" name="direccion">
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