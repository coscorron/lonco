<?php
session_start();
include("connection_db.php");
include("WS_user.php");
include("WS_log.php");
$txtUser = isset($_POST['txtUser']) ? $_POST['txtUser'] : '';
$txtPass = isset($_POST['txtPass']) ? $_POST['txtPass'] : '';
$txtError = isset($_POST['txtError']) ? $_POST['txtError'] : '';

$resultado = login($conn, $txtUser, $txtPass);

$error = "";
$ref= "";
if ($resultado[0] == "0"){
  $error = $resultado[1];
  $ref="login.php";
} else {
  $ref = "index.php";
  $_SESSION["mail"] = $txtUser;
  $_SESSION["nombre"] = $resultado[2];
  $_SESSION["idPerfil"] = $resultado[3];
}
?>
<html>
<body>
<form name="form1" id="form1" method="post" action="<?php echo $ref; ?>">
  <input type="hidden" id="txtError" name="txtError" value="<?php echo $error; ?>">
</form>
<script>
  form1.submit();
</script>
</body>
</html>
