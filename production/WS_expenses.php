<?php
function getExpenseList($conn,$idProject){
  $sql = "SELECT tg.estado, tg.descripcion, tp.nombre, tg.coste, tg.unidad, tg.fecha, tg.costeTotal, tg.idGasto
          FROM tbl_gasto tg, tbl_parametro tp
          WHERE tg.idProyecto = $idProject
          AND tg.idCategoria = tp.idParametro
          AND tg.eliminado = 0
          ORDER BY tg.fecha desc";
  $rs = $conn->query($sql);

    while ($row = $rs->fetch_assoc()) {
      $idGasto = $row["idGasto"];
      $estado = $row["estado"];
      $descripcion = $row["descripcion"];
      $nombre = $row["nombre"];
      $coste = $row["coste"];
      $unidad = $row["unidad"];
      $fecha = $row["fecha"];
      $costeTotal = $row["costeTotal"];
      if ($estado == 'P'){
        $idEstado = 'Provision';
      } else {
        $idEstado = 'Real';
      }
      echo "<tr><td>$idEstado</td><td>$descripcion</td><td>$nombre</td><td>$coste</td>";
      echo "<td>$unidad</td><td>$costeTotal</td><td>$fecha</td>
          <td class='text-center'>
            <button type='button' class='btn btn-primary btn-sm' onclick=\"editar('$idGasto');\">
                <i class='fa fa-edit'></i> Edit
            </button>
            <button type='button' class='btn btn-danger btn-sm'  data-toggle=\"modal\" data-target=\".bs-example-modal-sm\" onclick=\"Remove('$idGasto');\">
                <i class='fa fa-ban'></i> Remove
            </button>
          </td>
      </tr>";
    }
}

function RemoveExpenses($conn, $txtExpense){
  $sql = "UPDATE tbl_gasto set  eliminado = 1 WHERE idGasto = '$txtExpense' ";
  $conn->query($sql);
}

//Ingresa un nuevo proyecto a la tabla tbl_proyecto
function insertExpense($conn,$txtProject,$sclEstado,$txtDescripcion, $slcCategoria, $txtCosteU,$txtUnidad, $txtFTermino){
  $fechaT = substr($txtFTermino,6,4) . "-" . substr($txtFTermino,3,2) . "-" . substr($txtFTermino,0,2);
  $costeTotal = $txtCosteU * $txtUnidad;
  $sql = "INSERT INTO tbl_gasto (idProyecto, estado, descripcion, idCategoria, coste, unidad,fecha, costeTotal, eliminado) VALUES
          ($txtProject,'$sclEstado','$txtDescripcion',$slcCategoria,$txtCosteU,$txtUnidad,'$fechaT',$costeTotal,0)";
  $conn->query($sql);
}

function getExpense($conn,$txtExpense){
  $sql = "SELECT idCliente, nombre, cc, gerente, jefe, plazo, esfuerzoHH, fechaInicio, fechaTermino FROM tbl_proyecto  WHERE idProyecto = '$project'";
  $rs = $conn->query($sql);
  $existe = 0;
  while ($row = $rs->fetch_assoc()) {
    $existe=1;
    $resultado[0]=trim($row["idCliente"]);
    $resultado[1]=trim($row["nombre"]);
    $resultado[2]=trim($row["cc"]);
    $resultado[3]=trim($row["gerente"]);
    $resultado[4]=trim($row["jefe"]);
    $resultado[5]=trim($row["plazo"]);
    $resultado[8]=trim($row["esfuerzoHH"]);
    $resultado[6]=trim(substr($row["fechaInicio"],8,2)."/".substr($row["fechaInicio"],5,2)."/".substr($row["fechaInicio"],0,4));
    $resultado[7]=trim(substr($row["fechaTermino"],8,2)."/".substr($row["fechaTermino"],5,2)."/".substr($row["fechaTermino"],0,4));

  }
return $resultado;
}

 ?>
