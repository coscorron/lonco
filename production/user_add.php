<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include("referencia.php");
      include("connection_db.php");
      include("WS_perfil.php");
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
                  <h2>Nuevo Usuario<small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="form1" name="form1" data-parsley-validate class="form-horizontal form-label-left" method="post">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Mail <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="email" id="txtMail" name="txtMail" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Password
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="txtPass1" name="txtPass1" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12"  for="first-name">Confirmar Password <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="password" id="txtPass2" name="txtPass2" required="required"  class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtNombre" name="txtNombre" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Paterno <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtPaterno" name="txtPaterno" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Apellido Materno <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtMaterno" name="txtMaterno" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Perfil</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <select name="slcProfile" id="slcProfile"  required><?php getPerfil($conn, 0); ?></select>
                      </div>
                    </div>
                      <div class="form-group">
                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Tipo</label>
                        <div class="col-md-6 col-sm-6 col-xs-12">
                          <select id="slcTipo" name="slcTipo" required="required">
                            <option value="">Seleccionar</option>
                            <option value="P">P - Propio</option>
                            <option value="E">E - Externo / Subcontratado</option>
                          </select>
                        </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12">Habilitado</label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <label>
                           <input type="checkbox" class="js-switch" checked />
                         </label>
                      </div>
                    </div>
                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Valor Hora <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="number" id="txtValorHH" name="txtValorHH" required="required" class="form-control col-md-7 col-xs-12">
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
