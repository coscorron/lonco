<?php
//variable de sesion
session_start();
include("connection_db.php");
include("WS_user.php");
include("WS_log.php");
$session_user = $_SESSION["mail"];
$txtMail = isset($_POST['txtMail']) ? $_POST['txtMail'] : '';

RemoveUser($conn, $txtMail,$session_user);
$description = "Eliminacion de usuario " . $txtMail;
log_app($conn,'DELETE',$session_user,$description);
$ref="user_list.php";
$error="     <b>Eliminado usuario $txtMail</b>";
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
