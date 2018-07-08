<?php
//variable de sesion
session_start();
include("connection_db.php");
include("WS_user.php");
include("WS_log.php");
$session_user = $_SESSION["mail"];
$txtMail = isset($_POST['txtMail']) ? $_POST['txtMail'] : '';
$txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$txtPass1 = isset($_POST['txtPass1']) ? $_POST['txtPass1'] : '';
$txtPaterno = isset($_POST['txtPaterno']) ? $_POST['txtPaterno'] : '';
$txtMaterno = isset($_POST['txtMaterno']) ? $_POST['txtMaterno'] : '';
$chkEnabled = isset($_POST['chkEnabled']) ? $_POST['chkEnabled'] : '';
$slcProfile = isset($_POST['slcProfile']) ? $_POST['slcProfile'] : '';
$slcTipo = isset($_POST['slcTipo']) ? $_POST['slcTipo'] : '';
$txtValorHH = isset($_POST['txtValorHH']) ? $_POST['txtValorHH'] : '';

$passHash = password_hash($txtPass1, PASSWORD_BCRYPT);


if ($chkEnabled == 'on'){
  $chkEnabled = 1;
} else {
  $chkEnabled = 0;
}

//Valida si el correo existe
$existe = userExist($conn,$txtMail);
if ($existe == "0"){
  $description = "Creacion de usuario " . $txtMail;
  insertUser($conn,$txtMail,$txtNombre,$txtPaterno, $txtMaterno, $passHash,$chkEnabled,$slcProfile, $slcTipo, $txtValorHH);
  log_app($conn,'INSERT',$session_user,$description);
  $ref="user_list.php";
  $error="&nbsp;&nbsp;&nbsp;<b>Creado usuario $txtMail</b>";
} else {
  $error="<b>Usuario ya existe</b>";
  $ref="user_add.php";
}
?>
<html>
<body>
<form name="form1" id="form1" method="post" action="<?php echo $ref; ?>">
  <input type="hidden" id="txtMail" name="txtMail" value="<?php echo $txtMail; ?>">
  <input type="hidden" id="txtNombre" name="txtNombre" value="<?php echo $txtNombre; ?>">
  <input type="hidden" id="txtPaterno" name="txtPaterno" value="<?php echo $txtPaterno; ?>">
  <input type="hidden" id="txtMaterno" name="txtMaterno" value="<?php echo $txtMaterno; ?>">
  <input type="hidden" id="slcProfile" name="slcProfile" value="<?php echo $slcProfile; ?>">
  <input type="hidden" id="slcTipo" name="slcTipo" value="<?php echo $slcTipo; ?>">
  <input type="hidden" id="chkEnabled" name="chkEnabled" value="<?php echo $chkEnabled; ?>">
  <input type="hidden" id="txtValorHH" name="txtValorHH" value="<?php echo $txtValorHH; ?>">
  <input type="hidden" id="txtError" name="txtError" value="<?php echo $error; ?>">
</form>
<script>
  form1.submit();
</script>
</body>
</html>
