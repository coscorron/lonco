<?php   include("sessions.php");
$idApp = 1;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include("referencia.php");
      include("connection_db.php");
      include("WS_project.php");
      include("WS_parameters.php");
      $txtProject = isset($_POST['txtProject']) ? $_POST['txtProject'] : '';
      $txtError = isset($_POST['txtError']) ? $_POST['txtError'] : '';
      $resultado = getProject($conn,$txtProject);
    ?>
  </head>
  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <?php
        include("profile_info.php");
         ?>
        <!-- page content -->
        <div class="right_col" role="main">
          <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Nuevo Proyecto<?php echo "     ".$txtError; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="form1" name="form1" data-parsley-validate class="form-horizontal form-label-left" method="post" action="expenses_insert.php">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Proyecto</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" name="txtProject" id="txtProject" disabled value="<?php echo $resultado[1]; ?>"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="slcEstado" name="slcEstado" required="required">
                            <option value="R">Real</option>
                            <option value="P">Provisi&oacute;n</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Descripci&oacute;n <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtDescripcion" name="txtDescripcion" required="required"  class="form-control col-md-7 col-xs-12" required>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Categoria <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="slcCategoria" id="slcCategoria"  required="required"><?php getParameters($conn, 1, 0); ?></select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Coste Unidad <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="txtCosteU" name="txtCosteU" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Unidad <span class="required">*</span>
                        </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <input type="number" id="txtUnidad" name="txtUnidad" required="required"  class="form-control col-md-7 col-xs-12">
                        </div>
                    </div>
                    <div class='form-group'>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Fecha <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class='input-group date' id='myDatepicker3'>
                                <input type='text' id="txtFTermino" name="txtFTermino" class="form-control" required="" />
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                   <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button" onclick="location.href='project_expenses.php'">Cancel</button>
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
        <!-- /page content -->
        <?php
          include("footer.php");
        ?>
      </div>
    </div>
    <?php
      include("referenciaFooter.php");
    ?>
    <script>
    $('#myDatepicker3').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    </script>
  </body>
</html>
