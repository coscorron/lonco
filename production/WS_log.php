<?php

function log_app($conn,$action, $session_user, $description ){
  $sql = "INSERT INTO tbl_log (fecha,accion, usuario, descripcion) VALUES
          (now(),'$action','$session_user','$description')";
  $conn->query($sql);
}
?>
