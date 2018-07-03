<?php
session_start();
// remove all session variables
session_unset();
// destroy the session
session_destroy();
?>
<!DOCTYPE html>
<html>
  <head>
    <?php
    $txtError = isset($_POST['txtError']) ? $_POST['txtError'] : '';
    ?>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <link rel="icon" href="images/fav_folder.ico" type="image/x-icon"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Lonco! | </title>

    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- PNotify -->
    <link href="../vendors/pnotify/dist/pnotify.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.buttons.css" rel="stylesheet">
    <link href="../vendors/pnotify/dist/pnotify.nonblock.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="../vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <form id="form1" name="form1" method="post" action="validar.php">
              <h1>Login</h1>
              <?php if ($txtError != ""){ ?>
                <div class="alert alert-danger alert-dismissible fade in" role="alert">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                </button>
                <strong>Error!</strong> <?php echo $txtError; ?>.
                </div>
              <?php } ?>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="required" id="txtUser" name="txtUser" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="required" id="txtPass" name="txtPass" />
              </div>
              <div>
                <button type="submit" class="btn btn-info" > Log in</button>
                <a class="reset_pass" href="#">Olvidaste tu password?</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1></i> Lonco</h1>
                  <p>©2018 All Rights Reserved. Connectis</p>
                </div>
              </div>
            </form>
          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">
            <form>
              <h1>Create Account</h1>
              <div>
                <input type="text" class="form-control" placeholder="Username" required="" />
              </div>
              <div>
                <input type="email" class="form-control" placeholder="Email" required="" />
              </div>
              <div>
                <input type="password" class="form-control" placeholder="Password" required="" />
              </div>
              <div>
                <a class="btn btn-default submit" href="index.html">Submit</a>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">Already a member ?
                  <a href="#signin" class="to_register"> Log in </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                  <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 3 template. Privacy and Terms</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
    <!-- jQuery -->
     <script src="../vendors/jquery/dist/jquery.min.js"></script>
     <!-- Bootstrap -->
     <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
     <!-- FastClick -->
     <script src="../vendors/fastclick/lib/fastclick.js"></script>
     <!-- NProgress -->
     <script src="../vendors/nprogress/nprogress.js"></script>
     <!-- bootstrap-progressbar -->
     <script src="../vendors/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
     <!-- iCheck -->
     <script src="../vendors/iCheck/icheck.min.js"></script>


     <!-- Custom Theme Scripts -->
     <script src="../build/js/custom.min.js"></script>
  </body>
</html>
