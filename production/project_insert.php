<?php
//variable de sesion
session_start();
include("connection_db.php");
include("WS_project.php");
include("WS_log.php");
$session_user = $_SESSION["mail"];
$slcCliente = isset($_POST['slcCliente']) ? $_POST['slcCliente'] : '';
$txtNombre = isset($_POST['txtNombre']) ? $_POST['txtNombre'] : '';
$txtCC = isset($_POST['txtCC']) ? $_POST['txtCC'] : '';
$slcGerente = isset($_POST['slcGerente']) ? $_POST['slcGerente'] : '';
$slcJefe = isset($_POST['slcJefe']) ? $_POST['slcJefe'] : '';
$txtPlazo = isset($_POST['txtPlazo']) ? $_POST['txtPlazo'] : '';
$txtEsfuerzoHH = isset($_POST['txtEsfuerzoHH']) ? $_POST['txtEsfuerzoHH'] : '';
$txtFInicio = isset($_POST['txtFInicio']) ? $_POST['txtFInicio'] : '';
$txtFTermino = isset($_POST['txtFTermino']) ? $_POST['txtFTermino'] : '';

$description = "  Creacion de proyecto " . $txtNombre;
  insertProject($conn,$slcCliente,$txtNombre,$txtCC, $slcGerente, $slcJefe,$txtPlazo,$txtEsfuerzoHH,$txtFInicio, $txtFTermino);
  log_app($conn,'INSERT',$session_user,$description);
  $ref="project_list.php";
  $error="   <b>Creado proyecto $txtNombre</b>";
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
