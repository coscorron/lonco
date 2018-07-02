<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include("referencia.php");
      include("connection_db.php");
      include("WS_perfil.php");
      include("WS_checklist.php");
      $idProyecto = isset($_POST['txtidProyecto']) ? $_POST['txtidProyecto'] : '';
      $idProyecto = 1;
    ?>
    <script>
    function check(){
      form1.action = "checklist_complete.php";
      form1.submit();
    }
    </script>
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
                  <h2>Editar Proyecto<small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="form1" name="form1" data-parsley-validate class="form-horizontal form-label-left" method="post">
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Cliente</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="slcCliente" id="slcCliente"  required><?php getPerfil($conn, 0); ?></select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Nombre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtNombre" name="txtNombre" required="required" class="form-control col-md-7 col-xs-12">
                        <input type="hidden" id="txtidProyecto" name="txtidProyecto" value="<?php echo $idProyecto; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Centro Costo <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtCC" name="txtCC" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Gerente <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="slcGerente" id="slcGerente"  required="required"><?php getPerfil($conn, 0); ?></select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Jefe de Proyecto <span class="required">*</span></label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="slcJefe" id="slcJefe"  required="required"><?php getPerfil($conn, 0); ?></select>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Plazo en meses <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="txtPlazo" name="txtPlazo" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Fecha Inicio <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class='input-group date' id='myDatepicker2'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class='form-group'>
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Fecha Término <span class="required">*</span>
                      </label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class='input-group date' id='myDatepicker3'>
                                <input type='text' class="form-control" />
                                <span class="input-group-addon">
                                   <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Checklist <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <button class="btn btn-primary" type="button" onclick="check();"><i class="fa fa-check-square-o"></i> Checklist</button>
                        <div class="progress">
                          <div class="progress-bar progress-bar-success" title="<?php echo getChecklistAnswered($conn, $idProyecto); ?>%"  data-toggle="tooltip" data-placement="bottom" data-transitiongoal="<?php echo getChecklistAnswered($conn, $idProyecto); ?>"></div>
                        </div>
                      </div>
                    </div>
                   <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button" onclick="location.href='project_list.php'">Cancel</button>
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
    $('#myDatepicker2').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    $('#myDatepicker3').datetimepicker({
        format: 'DD/MM/YYYY'
    });
    </script>
  </body>
  <script>
  var form = document.getElementById('form1');
  var pass1 = document.getElementById('txtPass1');
  var pass2 = document.getElementById('txtPass2');

  form.addEventListener("submit", function (event) {
    if (pass1.value != pass2.value){
      alert('WRONG password confirm!');
      event.preventDefault();
      pass2.focus();
    }
  }, false);
  </script>
</html>
