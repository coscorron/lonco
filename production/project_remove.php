<?php
//variable de sesion
session_start();
include("connection_db.php");
include("WS_project.php");
include("WS_log.php");
$session_user = $_SESSION["mail"];
$txtProject = isset($_POST['txtProject']) ? $_POST['txtProject'] : '';

RemoveProject($conn, $txtProject);
$description = "Eliminacion de proyecto id " . $txtProject;
log_app($conn,'DELETE',$session_user,$description);
$ref="project_list.php";
$error=" <b>Eliminado proyecto $txtProject</b>";
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
