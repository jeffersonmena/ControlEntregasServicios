
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
				<h4>Consultas por Fechas.</h4>
			</div>
			<div class="panel-body">
				<div class="row">
              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_content">
                    <br>
                    <form  method="POST" action="pdfreporte.php" class="form-horizontal form-label-left" >
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fechainicio">Fecha Inicio<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="fechainicio" name="fechainicio" placeholder="fecha Fin" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>                      
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="fechafin">Fecha Fin<span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="date" id="fechafin" name="fechafin" placeholder="fecha Fin" required="required" class="form-control col-md-7 col-xs-12">
                        </div>
                      </div>
                      <div class="form-group">
                        <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
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
include "process/partialfooterprinfechapal.php";

} 
else {
    header("Location: process/logout.php");
    exit();
   }
 ?> 