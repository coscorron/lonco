<?php
function getChecklistAnswered($conn, $idProyecto){
  $sql = "SELECT count(*) as total, sum(case when respuesta <> '' then 1 else 0 end) as contestada
          FROM tbl_proy_respuesta
          WHERE idProyecto = $idProyecto";
  $rs = $conn->query($sql);
  while ($row = $rs->fetch_assoc()) {
    $total = $row["total"];
    $contestada = $row["contestada"];
  }
  if ($contestada == 0){
    $porcentaje = 0;
  } else {
    $porcentaje = ceil(($contestada * 100) / $total);
  }

  return $porcentaje;
}

function updateCheckAnswer($conn,$idProyecto,$idPregunta,$respuesta,$comentario){
  $sql = "UPDATE tbl_proy_respuesta SET respuesta = '$respuesta', comentario = '$comentario', fecha = Now()
          WHERE idProyecto = $idProyecto AND idPregunta = $idPregunta ";
  $conn->query($sql);
}

function getCheckProyecto($conn,$idProyecto){
  $cont=0;
  $sql = "SELECT tcs.idSeccion , tcs.nombre as seccion, tcsp.idPregunta, tcsp.nombre pregunta, tpr.respuesta, tpr.comentario
          FROM tbl_checklist tc, tbl_cl_section tcs, tbl_cl_s_pregunta tcsp, tbl_proy_respuesta tpr
          WHERE tc.idCheckList = 1
          AND tpr.idProyecto = $idProyecto
          AND tc.idCheckList = tcs.idCheckList
          AND tcsp.idSeccion = tcs.idSeccion
          AND tcsp.idPregunta = tpr.idPregunta
          ORDER by tcs.orden asc, tcsp.orden asc";
  $rs = $conn->query($sql);
  $encabezado = "";

    while ($row = $rs->fetch_assoc()) {
      $cont++;
      $idSeccion = $row["idSeccion"];
      $seccion =  $row["seccion"];
      $idPregunta = $row["idPregunta"];
      $pregunta = $row["pregunta"];
      $respuesta = $row["respuesta"];
      $comentario = $row["comentario"];
      if ($cont << $idPregunta){
        $cont = $idPregunta;
      }
      if (trim($encabezado) <> trim($idSeccion)){
        echo "<div class=\"row\">
          <div class=\"col-md-12 col-sm-12 col-xs-12 form-group alert alert-info\">
            <p class=\"font-gray-dark\">$seccion</p>
          </div>
        </div>";
      } else {
        echo "<div class=\"row\">
          <div class=\"col-md-6 col-sm-6 col-xs-6 form-group\">
            <p class=\"font-gray-dark\">$pregunta</p>
          </div>
          <div class=\"col-md-2 col-sm-12 col-xs-12 form-group\">
            <p class=\"font-gray-dark\">
              <select name=\"slcPreg$idPregunta\" id=\"slcPreg$idPregunta\" >
                <option value=''></option>
                <option value='SI'";
          if ($respuesta == "SI"){ echo " selected "; }
          echo ">SI</option>
                <option value='NO'";
          if ($respuesta == "NO"){ echo " selected "; }            
          echo ">NO</option>
              </select>
            </p>
          </div>
          <div class=\"col-md-4 col-sm-12 col-xs-12 form-group\">
            <p class=\"font-gray-dark\"><input type=\"text\" id=\"txtCom$idPregunta\" name=\"txtCom$idPregunta\" class=\"form-control col-md-4 col-xs-12\" value=\"$comentario\"></p>
          </div>
        </div>";
      }
      $encabezado = $idSeccion;
    }
    return $cont;
}
 ?>
