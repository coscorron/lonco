<?php
  include("connection_db.php");
  include("WS_checklist.php");
  $txtProject = isset($_POST['txtProject']) ? $_POST['txtProject'] : '';
  $cont = isset($_POST['txtCont']) ? $_POST['txtCont'] : '';

  for ($i=1; $i<=$cont; $i++){
    $respuesta = 'slcPreg' . $i;
    $comentario = 'txtCom' . $i;
    $txtRespuesta = isset($_POST[$respuesta]) ? $_POST[$respuesta] : '';
    $txtComentario = isset($_POST[$comentario]) ? $_POST[$comentario] : '';
    if ($txtRespuesta != ''){
      updateCheckAnswer($conn,$txtProject,$i,$txtRespuesta,$txtComentario);
    }
  }
?>
<html>
<body>
  <form name="form1" id="form1" method="post" action="checklist_complete.php">
    <input type="hidden" id="txtProject" name="txtProject" value="<?php echo $txtProject; ?>">
  </form>
</body>
</html>
<script>
form1.submit();
</script>
