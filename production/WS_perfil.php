<?php
function getPerfil($conn,$selected){
  $sql = "SELECT id_perfil, name FROM perfil WHERE eliminado = 0 ORDER BY name ASC";
  $rs = $conn->query($sql);


    echo "<option value=''>Seleccionar</option>";
    while ($row = $rs->fetch_assoc()) {
      $idPerfil = $row["id_perfil"];
      $nombrePerfil = $row["name"];
      if (trim($selected) == trim($id_perfil)){
        $select = " selected ";
      } else {
        $select = " ";
      }
      echo "<option $select value='$id_perfil'>$nombrePerfil</option>";
    }
}
 ?>
