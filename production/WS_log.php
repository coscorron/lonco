<?php
function log_app($conn,$action, $user, $description ){
  $sql = "INSERT INTO tbl_log (fecha,accion, usuario, descripcion) VALUES
          (now(),'$action','$user','$description')";
  $conn->query($sql);
}
?>
