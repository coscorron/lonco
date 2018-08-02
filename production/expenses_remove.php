<?php
//variable de sesion
session_start();
include("connection_db.php");
include("WS_expenses.php");
include("WS_log.php");
$session_user = $_SESSION["mail"];
$txtProject = isset($_POST['txtProject']) ? $_POST['txtProject'] : '';
$txtExpense = isset($_POST['txtExpense']) ? $_POST['txtExpense'] : '';

RemoveExpenses($conn, $txtExpense);
$description = "Eliminacion de gasto id " . $txtExpense;
log_app($conn,'DELETE',$session_user,$description);
$ref="project_expenses.php";
$error=" <b>Eliminado gasto</b>";
?>
<html>
<body>
<form name="form1" id="form1" method="post" action="<?php echo $ref; ?>">
  <input type="hidden" id="txtError" name="txtError" value="<?php echo $error; ?>">
  <input type="hidden" id="txtProyecto" name="txtProyecto" value="<?php echo $txtProject; ?>">
</form>
<script>
 form1.submit();
</script>
</body>
</html>
