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
      $txtError = isset($_POST['txtError']) ? $_POST['txtError'] : '';
      $txtProyecto = isset($_POST['txtProyecto']) ? $_POST['txtProyecto'] : '';
      $resultado = getProject($conn,$txtProyecto);
    ?>
    <script>
    function agregar(){
      form2.txtProject.value = <?php echo $txtProyecto; ?>;
      form2.action = "expenses_add.php";
      form2.submit();
    }
    function editar(project){
      form2.txtProject.value = project;
      form2.action = "project_edit.php";
      form2.submit();
    }
    function Remove(project){
      form2.txtProject.value = project;
    }
    function Delete(){
      form2.action="project_remove.php";
      form2.submit();
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
                  <h2><?php  echo $resultado[1] . " - Gastos" . $txtError; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form id="form2" name="form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">
                    <input type="hidden" id="txtProject" name="txtProject" value="<?php echo $txtProyecto; ?>">
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Estado</th>
                                <th>Descripción</th>
                                <th>Categoría</th>
                                <th>Costo Unidad</th>
                                <th>Unidad</th>
                                <th>Total</th>
                                <th>Fecha</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>
                            <tbody>
                              <?php getProjectList($conn); ?>
                            </tbody>
                          </table>
                        </div>
                  </form>
                </div>
                <div class="clearfix"></div>
                <button type="button" class="btn btn-success" onclick="agregar();"><i class="fa fa-plus"></i> Nuevo</button>
              </div>
              <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-hidden="true">
                <div class="modal-dialog modal-sm">
                  <div class="modal-content">

                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span>
                      </button>
                      <h4 class="modal-title" id="myModalLabel2">Confirmación de eliminación</h4>
                    </div>
                    <div class="modal-body">
                      <p>¿está seguro de eliminar el proyecto?</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-danger" onclick="Delete();">Eliminar</button>
                    </div>

                  </div>
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
  </body>
</html>
