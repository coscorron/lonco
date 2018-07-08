<?php
function getCliente($conn,$selected){
  $sql = "SELECT idCliente, nombre FROM tbl_cliente WHERE eliminado = 0 ORDER BY nombre ASC";
  $rs = $conn->query($sql);


    echo "<option value=''>Seleccionar</option>";
    while ($row = $rs->fetch_assoc()) {
      $idCliente = $row["idCliente"];
      $nombre = $row["nombre"];
      if (trim($selected) == trim($idCliente)){
        $select = " selected ";
      } else {
        $select = " ";
      }
      echo "<option $select value='$idCliente'>$nombre</option>";
    }
}
 ?>
