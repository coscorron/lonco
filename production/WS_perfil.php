<?php
function getPerfil($conn,$selected){
  $sql = "SELECT idPerfil, nombre FROM tbl_perfil WHERE eliminado = 0 ORDER BY nombre ASC";
  $rs = $conn->query($sql);


    echo "<option value=''>Seleccionar</option>";
    while ($row = $rs->fetch_assoc()) {
      $idPerfil = $row["idPerfil"];
      $nombrePerfil = $row["nombre"];
      if (trim($selected) == trim($idPerfil)){
        $select = " selected ";
      } else {
        $select = " ";
      }
      echo "<option $select value='$idPerfil'>$nombrePerfil</option>";
    }
}
 ?>
