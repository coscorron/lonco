<?php
function getParameters($conn,$tipo,$selected){
  $sql = "SELECT idParametro, nombre FROM tbl_parametro WHERE habilitado = 1 AND tipo = $tipo ";
  $rs = $conn->query($sql);

    echo "<option value=''>Seleccionar</option>";
    while ($row = $rs->fetch_assoc()) {
      $idParametro = $row["idParametro"];
      $nombre = $row["nombre"];
      if (trim($selected) == trim($idParametro)){
        $select = " selected ";
      } else {
        $select = " ";
      }
      echo "<option $select value='$idParametro'>$nombre</option>";
    }
}
 ?>
