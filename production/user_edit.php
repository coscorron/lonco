<?php   include("sessions.php");
$idApp = 1;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include("referencia.php");
      include("connection_db.php");
      include("WS_perfil.php");
      include("WS_user.php");
      $txtMail = isset($_POST['txtMail']) ? $_POST['txtMail'] : '';
      $resultado = getUser($conn,$txtMail);
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
                  <h2>Editar Usuario<small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="demo-form2" data-parsley-validate class="form-horizontal form-label-left" method="post" action="user_update.php">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="mail" id="txtMail2" name="txtMail2"  class="form-control col-md-7 col-xs-12" value="<?php echo $txtMail;?>" disabled>
                        <input type="hidden" id="txtMail" name="txtMail" value="<?php echo $txtMail;?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="txtPass1" name="txtPass1"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirmar Password
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="txtPass2" name="txtPass2"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtNombre" name="txtNombre" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resultado[0]; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Paterno <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtPaterno" name="txtPaterno" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resultado[1]; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Materno <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtMaterno" name="txtMaterno" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resultado[2]; ?>">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Perfil</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                          <select name="slcProfile" id="slcProfile"  required><?php getPerfil($conn, $resultado[5]); ?></select>
                      </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="slcTipo" name="slcTipo" required="required">
                            <option <?php if($resultado[3] == "P") { echo " selected "; } ?>>P - Propio</option>
                            <option <?php if($resultado[3] == "E") { echo " selected "; } ?>>E - Externo / Subcontratado</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Habilitado</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label>
                           <input type="checkbox"  id="chkEnabled" name="chkEnabled"  class="js-switch" <?php echo $resultado[4] ; ?>/>
                         </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Valor Hora <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="txtValorHH" name="txtValorHH" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $resultado[6] ; ?>">
                      </div>
                    </div>                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button" onclick="location.href='user_list.php'">Cancel</button>
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
  </body>
</html>
