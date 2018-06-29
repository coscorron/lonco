<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include("referencia.php");
    ?>
    <script>
    function Editar(){
      location.href = 'user_edit.php';
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
                  <h2>Listado de Usuarios</h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <form id="form2" name="form2" data-parsley-validate class="form-horizontal form-label-left">

                        <div class="x_content">

                          <table id="datatable-buttons" class="table table-striped table-bordered">
                            <thead>
                              <tr>
                                <th>Mail</th>
                                <th>Nombres</th>
                                <th>Apellido Paterno</th>
                                <th>Apellido Materno</th>
                                <th>Tipo</th>
                                <th>Habilitado</th>
                                <th>Acciones</th>
                              </tr>
                            </thead>


                            <tbody>
                              <tr>
                                <td>Tiger Nixon</td>
                                <td>System Architect</td>
                                <td>Edinburgh</td>
                                <td>61</td>
                                <td>2011/04/25</td>
                                <td>$320,800</td>
                                <td>
                                  <div class="btn-group  btn-group-sm">
                                    <button class="btn btn-info" type="button" onclick="Editar();">Editar</button>
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target=".bs-example-modal-sm">Eliminar</button>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Garrett Winters</td>
                                <td>Accountant</td>
                                <td>Tokyo</td>
                                <td>63</td>
                                <td>2011/07/25</td>
                                <td>$170,750</td>
                                <td>
                                  <div class="btn-group  btn-group-sm">
                                    <button class="btn btn-info" type="button" onclick="Editar();">Editar</button>
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target=".bs-example-modal-sm">Eliminar</button>
                                  </div>
                                </td>
                              </tr>
                              <tr>
                                <td>Ashton Cox</td>
                                <td>Junior Technical Author</td>
                                <td>San Francisco</td>
                                <td>66</td>
                                <td>2009/01/12</td>
                                <td>$86,000</td>
                                <td>
                                  <div class="btn-group  btn-group-sm">
                                    <button class="btn btn-info" type="button" onclick="Editar();">Editar</button>
                                    <button class="btn btn-danger" type="button" data-toggle="modal" data-target=".bs-example-modal-sm">Eliminar</button>
                                  </div>
                                </td>
                              </tr>
                            </tbody>
                          </table>
                        </div>

                  </form>
                </div>
                <div class="clearfix"></div>
                <button type="button" class="btn btn-success" onclick="location.href='user_add.php'"><i class="fa fa-plus"></i> Nuevo</button>
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
                      <p>¿está seguro de eliminar a usuario XXXXXXX</p>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                      <button type="button" class="btn btn-danger">Eliminar</button>
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
