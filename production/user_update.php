<?php
//variable de sesion
session_start();
include("connection_db.php");
include("WS_user.php");
include("WS_log.php");
$session_user = $_SESSION["mail"];
$txtMail = isset($_POST['txtMail']) ? $_POST['txtMail'] : '';
$txtPass1 = isset($_POST['txtPass1']) ? $_POST['txtPass1'] : '';
$txtPass2 = isset($_POST['txtPass2']) ? $_POST['txtPass2'] : '';
$txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$txtPaterno = isset($_POST['txtPaterno']) ? $_POST['txtPaterno'] : '';
$txtMaterno = isset($_POST['txtMaterno']) ? $_POST['txtMaterno'] : '';
$slcTipo = isset($_POST['slcTipo']) ? $_POST['slcTipo'] : '';
$chkEnabled = isset($_POST['chkEnabled']) ? $_POST['chkEnabled'] : '';
$slcProfile = isset($_POST['slcProfile']) ? $_POST['slcProfile'] : '';
$txtValorHH = isset($_POST['txtValorHH']) ? $_POST['txtValorHH'] : '';
if ($chkEnabled == 'on'){
  $chkEnabled = 1;
} else {
  $chkEnabled = 0;
}

//Valida si el correo existe
$change = changePass($conn,$txtMail,$txtPass1);
updateUser($conn,$txtMail,$txtNombre,$txtPaterno,$txtMaterno,$txtPass1,$chkEnabled,$slcTipo,$txtValorHH,$change);
$description = "Actualizado el usuario " . $txtMail;
log_app($conn,'UPDATE',$session_user,$description);
$ref="user_list.php";
$error="    <b>Usuario $txtMail actualizado!</b>";
?>
<html>
<body>
<form name="form1" id="form1" method="post" action="<?php echo $ref; ?>">
  <input type="hidden" id="txtMail" name="txtMail" value="<?php echo $txtMail; ?>">
  <input type="hidden" id="txtError" name="txtError" value="<?php echo $error; ?>">
</form>
<script>
  form1.submit();
</script>
</body>
</html>
