<?php
//variable de sesion
session_start();
include("connection_db.php");
include("WS_expenses.php");
include("WS_log.php");
$session_user = $_SESSION["mail"];
$txtProject = isset($_POST['txtProyecto']) ? $_POST['txtProyecto'] : '';
$slcEstado = isset($_POST['slcEstado']) ? $_POST['slcEstado'] : '';
$txtDescripcion = isset($_POST['txtDescripcion']) ? $_POST['txtDescripcion'] : '';
$slcCategoria = isset($_POST['slcCategoria']) ? $_POST['slcCategoria'] : '';
$txtCosteU = isset($_POST['txtCosteU']) ? $_POST['txtCosteU'] : '';
$txtUnidad = isset($_POST['txtUnidad']) ? $_POST['txtUnidad'] : '';
$txtFTermino = isset($_POST['txtFTermino']) ? $_POST['txtFTermino'] : '';

  $description = "Nuevo gasto ";
  insertExpense($conn,$txtProject,$slcEstado,$txtDescripcion, $slcCategoria, $txtCosteU,$txtUnidad, $txtFTermino);
  log_app($conn,'INSERT',$session_user,$description);
  $ref="project_expenses.php";
  $error="   <b>Se ha ingresado un nuevo gasto</b>";
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
