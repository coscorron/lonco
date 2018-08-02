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
function updateProject($conn,$txtProject,$slcCliente,$txtNombre,$txtCC, $slcGerente, $slcJefe,$txtPlazo,$txtEsfuerzoHH,$txtFInicio, $txtFTermino){
  $fechaI = substr($txtFInicio,6,4) . "-" . substr($txtFInicio,3,2) . "-" . substr($txtFInicio,0,2);
  $fechaT = substr($txtFTermino,6,4) . "-" . substr($txtFTermino,3,2) . "-" . substr($txtFTermino,0,2);
  $sql = "UPDATE tbl_proyecto set idCliente = $slcCliente, nombre = '$txtNombre', cc = '$txtCC', gerente='$slcGerente',
          jefe = '$slcJefe', plazo = $txtPlazo, esfuerzoHH = $txtEsfuerzoHH, fechaInicio = '$fechaI', fechaTermino ='$fechaT'
          WHERE idProyecto = $txtProject";
  $conn->query($sql);
}
function getChart($conn,$session_user){
  $sql = "SELECT tp.idProyecto, tc.nombre cliente, tp.nombre proyecto, tp.esfuerzoHH FROM tbl_proyecto tp, tbl_cliente tc
    WHERE tp.eliminado = 0 and tp.fechaTermino > sysdate()
    AND tp.gerente = '$session_user'
    and tc.eliminado = 0 and tc.idCliente = tp.idCliente";
  $rs = $conn->query($sql);
  while ($row = $rs->fetch_assoc()){
    $idProyecto=$row["idProyecto"];
    $cliente=trim($row["cliente"]);
    $proyecto=trim($row["proyecto"]);
    $esfuerzoHH=$row["esfuerzoHH"]; ?>
    <div class="row">
      <div class="col-md-12 col-sm-4 col-xs-4">
        <div class="dashboard_graph">
          <div class="row x_title">
            <div class="col-md-6">
              <h3><?php echo $proyecto; ?> <small><?php echo $cliente; ?></small></h3>
            </div>
          </div>
          <div class="col-md-12 col-sm-6 col-xs-4">
            <div id="chart_div<?php echo $idProyecto; ?>" style="width: 100%; height: 100%;"></div>
          </div>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    <script type="text/javascript">
      google.charts.setOnLoadCallback(drawChart<?php echo $idProyecto; ?>);

      function drawChart<?php echo $idProyecto; ?>() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Proyectado', 'Real', 'Esperado'],
		  ['2012',  0,      400, <?php echo $esfuerzoHH; ?>],
          ['2013',  500,      400, <?php echo $esfuerzoHH; ?>],
          ['2014',  1000,      460, <?php echo $esfuerzoHH; ?>],
          ['2015',  1500,       1120, <?php echo $esfuerzoHH; ?>],
          ['2016',  2000,      1560, <?php echo $esfuerzoHH; ?>]
        ]);

        var options = {
          title: "Esfuero en HH",
          hAxis: {title: 'Year',  titleTextStyle: {color: '#333'}},
          vAxis: {title: 'HH', minValue: 0,  titleTextStyle: {color: '#333'}},
		 colors: ['red', 'orange', 'green']
        };

        var chart = new google.visualization.AreaChart(document.getElementById('chart_div<?php echo $idProyecto; ?>'));
        chart.draw(data, options);
      }
    </script>

     <?php
  }
}
 ?>
