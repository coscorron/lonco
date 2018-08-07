<?php
//variable de sesion
session_start();
include("connection_db.php");
include("WS_client.php");
include("WS_log.php");
$session_user = $_SESSION["mail"];
$txtidCliente = isset($_POST['txtidCliente']) ? $_POST['txtidCliente'] : '';
$txtCECO = isset($_POST['txtCECO']) ? $_POST['txtCECO'] : '';
$txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$chkEnabled = isset($_POST['chkEnabled']) ? $_POST['chkEnabled'] : '';

if ($chkEnabled == 'on'){
  $chkEnabled = 1;
} else {
  $chkEnabled = 0;
}

updateClient($conn,$txtidCliente,$txtNombre,$txtCECO,$chkEnabled);
$description = "Actualizado el cliente " . $txtidCliente;
log_app($conn,'UPDATE',$session_user,$description);
$ref="client_list.php";
$error="    <b>Cliente $txtNombre actualizado!</b>";
?>
<html>
<body>
<form name="form1" id="form1" method="post" action="<?php echo $ref; ?>">
  <input type="hidden" id="txtidCliente" name="txtidCliente" value="<?php echo $txtidCliente; ?>">
  <input type="hidden" id="txtError" name="txtError" value="<?php echo $error; ?>">
</form>
<script>
  form1.submit();
</script>
</body>
</html>
