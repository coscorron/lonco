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

function getClient($conn,$txtidCliente){
  $sql = "SELECT nombre, status, CECO
  FROM client
  WHERE idCliente = '$txtidCliente' AND eliminado=0 ";
  $rs = $conn->query($sql);
  $existe = 0;
  while ($row = $rs->fetch_assoc()) {
    $existe=1;
    $resultado[0]=trim($row["nombre"]);
    $resultado[1]=trim($row["CECO"]);
    $habilitado=trim($row["status"]);
    if (trim($habilitado) == "1"){
      $habilitado = " checked ";
    } else {
      $habilitado = "";
    }
    $resultado[2] = $habilitado;
  }
return $resultado;
}

function getClientList($conn){
  $sql = "SELECT idCliente, nombre, CECO, status
          FROM client
          WHERE eliminado = 0
          ORDER BY nombre asc";
  $rs = $conn->query($sql);

    while ($row = $rs->fetch_assoc()) {
      $idCliente = $row["idCliente"];
      $nombre = trim($row["nombre"]);
      $CECO = trim($row["CECO"]);
      $habilitado = $row["status"];
      if (trim($habilitado) == "1"){
        $enabled = "Habilitado";
      } else {
        $enabled = "Deshabilitado";
      }
      echo "<tr><td>$nombre</td><td>$CECO</td>";
      echo "<td>$enabled</td>
          <td class='text-center'>
            <button type='button' class='btn btn-primary btn-sm' onclick=\"editar('$idCliente');\">
                <i class='fa fa-edit'></i> Edit
            </button>
            <button type='button' class='btn btn-danger btn-sm'  data-toggle=\"modal\" data-target=\".bs-example-modal-sm\" onclick=\"Remove('$idCliente');\">
                <i class='fa fa-ban'></i> Remove
            </button>
          </td>
      </tr>";
    }
}
function RemoveClient($conn, $txtidCliente,$session_user){
  $sql = "UPDATE client set  eliminado = 1, fecha_eliminacion = now(), user_eliminador = '$session_user' WHERE idCliente = '$txtidCliente' ";
  $conn->query($sql);
}

function updateClient($conn,$txtidCliente,$txtNombre,$txtCECO,$chkEnabled){
  $sql = "UPDATE client set nombre = '$txtNombre', status = $chkEnabled, CECO = '$txtCECO'  WHERE idCliente = '$txtidCliente'";
  $conn->query($sql);
}

 ?>
