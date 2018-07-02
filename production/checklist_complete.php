<!DOCTYPE html>
<html lang="es">
  <head>
    <?php
      include("referencia.php");
      include("connection_db.php");
      include("WS_checklist.php");
      $idProyecto = isset($_POST['txtidProyecto']) ? $_POST['txtidProyecto'] : '';
    ?>
    <script>
    function Volver(){
      form1.action = "project_edit.php";
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
                  <h2>Checklist Lanzamiento<small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="form1" name="form1" data-parsley-validate class="form-horizontal form-label-left" method="post" action="checklist_answer.php">
                    <input type="hidden" id="txtidProyecto" name="txtidProyecto" value="<?php echo $idProyecto; ?>">
                    <?php $cont = getCheckProyecto($conn, $idProyecto); ?>
                    <input type="hidden" id="txtCont" name="txtCont" value="<?php echo $cont; ?>">


                   <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button" onclick="Volver();">Cancel</button>
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
</html>
