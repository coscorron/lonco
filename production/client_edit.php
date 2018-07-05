<?php   include("sessions.php");
$idApp = 1;
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <?php
      include("referencia.php");
      include("connection_db.php");
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
                  <h2>Editar Cliente<small></small></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <br />
                  <form id="form1" name="form1" data-parsley-validate class="form-horizontal form-label-left" method="post">

                    <div class="form-group">
                      <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Nombre <span class="required">*</span>
                      </label>
                      <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="txtNombre" name="txtNombre" required="required" class="form-control col-md-7 col-xs-12">
                      </div>
                    </div>
                    <div class="ln_solid"></div>
                    <div class="form-group">
                      <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                        <button class="btn btn-primary" type="button" onclick="location.href='client_list.php'">Cancel</button>
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
