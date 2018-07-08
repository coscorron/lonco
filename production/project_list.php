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
    ?>
    <script>
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
                  <h2>Listado de Proyectos  <?php  echo $txtError; ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form id="form2" name="form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="">
                    <input type="hidden" id="txtProject" name="txtProject" value="">
                        <div class="x_content">
                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Cliente</th>
                                <th>Nombres</th>
                                <th>Centro Costo</th>
                                <th>Gerente</th>
                                <th>Jefe de Proyecto</th>
                                <th>Fecha Termino</th>
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
                <button type="button" class="btn btn-success" onclick="location.href='project_add.php'"><i class="fa fa-plus"></i> Nuevo</button>
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
