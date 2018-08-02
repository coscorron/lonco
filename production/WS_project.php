<?php
function getProjectList($conn){
  $sql = "SELECT tc.nombre as nombreCli, tp.nombre as nomPro, tp.cc, tu.nombre, tu.paterno, tp.jefe, tp.fechaTermino, tp.idProyecto, tp.precioUF, tp.precioCLP, tp.margenCLP, tp.margenP
          FROM tbl_proyecto tp, tbl_cliente tc, tbl_usuario tu
          WHERE tc.idCliente = tp.idCliente
          AND tp.eliminado = 0 and tc.eliminado = 0
          AND tp.gerente = tu.mail
          ORDER BY tc.nombre asc";
  $rs = $conn->query($sql);

    while ($row = $rs->fetch_assoc()) {
      $idProject = $row["idProyecto"];
      $nomPro=trim($row["nomPro"]);
      $nombre = trim($row["nombreCli"]);
      $cc = trim($row["cc"]);
      $gerente = trim($row["nombre"]. " " . $row["paterno"]);
      $jefe = trim($row["jefe"]);
      $fechaTermino = trim($row["fechaTermino"]);
      $sql = "SELECT tu.nombre, tu.paterno FROM tbl_usuario tu WHERE mail = '$jefe' ";
      $rs1 = $conn->query($sql);
      while ($row1 = $rs1->fetch_assoc()){
        $jefes  = trim($row1["nombre"]. " " . $row1["paterno"]);
      }

      echo "<tr><td>$nombre</td><td>$nomPro</td><td>$cc</td><td>$gerente</td>";
      echo "<td>$jefes</td><td>$fechaTermino</td>
          <td class='text-center'>
            <button type='button' class='btn btn-primary btn-sm' onclick=\"editar('$idProject');\">
                <i class='fa fa-edit'></i> Edit
            </button>
            <button type='button' class='btn btn-danger btn-sm'  data-toggle=\"modal\" data-target=\".bs-example-modal-sm\" onclick=\"Remove('$idProject');\">
                <i class='fa fa-ban'></i> Remove
            </button>
          </td>
      </tr>";
    }
}

function RemoveProject($conn, $txtProject){
  $sql = "UPDATE tbl_proyecto set  eliminado = 1 WHERE idProyecto = '$txtProject' ";
  $conn->query($sql);
}

//Ingresa un nuevo proyecto a la tabla tbl_proyecto
function insertProject($conn,$slcCliente,$txtNombre,$txtCC, $slcGerente, $slcJefe,$txtPlazo,$txtEsfuerzoHH,$txtFInicio, $txtFTermino){
  $fechaI = substr($txtFInicio,6,4) . "-" . substr($txtFInicio,3,2) . "-" . substr($txtFInicio,0,2);
  $fechaT = substr($txtFTermino,6,4) . "-" . substr($txtFTermino,3,2) . "-" . substr($txtFTermino,0,2);
  $sql = "INSERT INTO tbl_proyecto (idCliente, nombre, cc, gerente, jefe, plazo,esfuerzoHH, fechaInicio, fechaTermino, estadoCHK, eliminado) VALUES
          ($slcCliente,'$txtNombre','$txtCC','$slcGerente','$slcJefe',$txtPlazo,$txtEsfuerzoHH,'$fechaI','$fechaT',0,0)";
  if ($conn->query($sql) === TRUE) {
      $last_id = $conn->insert_id;
      $sql = "insert into tbl_proy_respuesta (idProyecto, idPregunta, respuesta, comentario, fecha)
              SELECT $last_id, idPregunta, '' as respuesta,'' as comentario,'' as fecha
              FROM tbl_cl_s_pregunta tcsp, tbl_cl_section tcs
              WHERE tcsp.idSeccion = tcs.idSeccion
              AND tcsp.eliminado = 0 AND tcs.eliminado = 0
              AND tcs.idCheckList = 1";
      $conn->query($sql);
  }
}

function getProject($conn,$project){
  $sql = "SELECT idCliente, nombre, cc, gerente, jefe, plazo, esfuerzoHH, fechaInicio, fechaTermino, precioUF, precioCLP, margenCLP, margenP FROM tbl_proyecto  WHERE idProyecto = '$project'";
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
    $resultado[9]=trim($row["precioUF"]);
    $resultado[10]=trim($row["precioCLP"]);
    $resultado[11]=trim($row["margenCLP"]);
    $resultado[12]=trim($row["margenP"]);

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
