<?php
  include("connection_db.php");
  include("WS_checklist.php");
  $idProyecto = isset($_POST['txtidProyecto']) ? $_POST['txtidProyecto'] : '';
  $cont = isset($_POST['txtCont']) ? $_POST['txtCont'] : '';

  for ($i=1; $i<=$cont; $i++){
    $respuesta = 'slcPreg' . $i;
    $comentario = 'txtCom' . $i;
    $txtRespuesta = isset($_POST[$respuesta]) ? $_POST[$respuesta] : '';
    $txtComentario = isset($_POST[$comentario]) ? $_POST[$comentario] : '';
    if ($txtRespuesta != ''){
      updateCheckAnswer($conn,$idProyecto,$i,$txtRespuesta,$txtComentario);
    }
  }
?>
<html>
<body>
  <form name="form1" id="form1" method="post" action="checklist_complete.php">
    <input type="hidden" id="txtidProyecto" name="txtidProyecto" value="<?php echo $idProyecto; ?>">
  </form>
</body>
</html>
<script>
form1.submit();
</script>
