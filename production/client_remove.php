<?php
//variable de sesion
session_start();
include("connection_db.php");
include("WS_client.php");
include("WS_log.php");
$session_user = $_SESSION["mail"];
$txtidCliente = isset($_POST['txtidCliente']) ? $_POST['txtidCliente'] : '';

RemoveClient($conn, $txtidCliente,$session_user);
$description = "Eliminacion de cliente " . $txtidCliente;
log_app($conn,'DELETE',$session_user,$description);
$ref="client_list.php";
$error="     <b>Eliminado cliente $txtidCliente</b>";
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
