<?php

function getUser2($conn,$selected){
  $sql = "SELECT mail, nombre, paterno, materno FROM tbl_usuario WHERE eliminado = 0 and habilitado = 1 ORDER BY paterno ASC";
  $rs = $conn->query($sql);


    echo "<option value=''>Seleccionar</option>";
    while ($row = $rs->fetch_assoc()) {
      $mail = $row["mail"];
      $nombre = $row["nombre"] . " " .$row["paterno"];
      if (trim($selected) == trim($mail)){
        $select = " selected ";
      } else {
        $select = " ";
      }
      echo "<option $select value='$mail'>$nombre</option>";
    }
}
//trae los datos asociados a un usuario determinado
function getUser($conn,$user){
  $sql = "SELECT nombre, paterno, materno, tipo, habilitado, idPerfil, valorHH FROM tbl_usuario WHERE mail = '$user'";
  $rs = $conn->query($sql);
  $existe = 0;
  while ($row = $rs->fetch_assoc()) {
    $existe=1;
    $resultado[0]=trim($row["nombre"]);
    $resultado[1]=trim($row["paterno"]);
    $resultado[2]=trim($row["materno"]);
    $resultado[3]=trim($row["tipo"]);
    $habilitado=trim($row["habilitado"]);
    $resultado[5]=trim($row["idPerfil"]);
    $resultado[6]=trim($row["valorHH"]);
    if (trim($habilitado) == "1"){
      $habilitado = " checked ";
    } else {
      $habilitado = "";
    }
    $resultado[4] = $habilitado;
  }
return $resultado;
}

//Valida si el usuario que se está creando ya existe
function userExist($conn,$user){
  $sql = "select mail from tbl_usuario where mail = '$user'";
  $rs = $conn->query($sql);

    $existe = 0;
    while ($row = $rs->fetch_assoc()) {
      $existe=1;
    }
  return $existe;
}

function changePass($conn,$user,$pass){
  if ($pass != ""){
    $sql = "select password from tbl_usuario where mail = '$user' ";
    $rs = $conn->query($sql);
      while ($row = $rs->fetch_assoc()) {
        $password = trim($row["password"]);
      }
    if (password_verify($pass, $password)) {
      //no se actualiza la pass
      $existe = 1;
    } else {
      $existe = 0;
    }
  } else {
    $existe = 1;
  }
  return $existe;
}


//Ingresa un nuevo usuario a la tabla tbl_usuario
function insertUser($conn,$txtMail,$txtNombre,$txtPaterno, $txtMaterno, $txtPass,$chkEnabled,$slcProfile, $slcTipo, $txtValorHH){
  $sql = "INSERT INTO tbl_usuario (mail, password, nombre, paterno, materno, idPerfil, tipo, habilitado, valorHH, eliminado) VALUES
          ('$txtMail','$txtPass','$txtNombre','$txtPaterno','$txtMaterno',$slcProfile,'$slcTipo',$chkEnabled,$txtValorHH,0)";
//echo $sql;
  $conn->query($sql);
}

//Actualiza usuario
function updateUser($conn,$txtMail,$txtNombre,$txtPaterno,$txtMaterno,$txtPass,$chkEnabled,$slcProfile,$slcTipo,$txtValorHH,$change){
  $sql = "UPDATE tbl_usuario set nombre = '$txtNombre', paterno = '$txtPaterno', materno='$txtMaterno',
          idPerfil = $slcProfile, habilitado = $chkEnabled, tipo = '$slcTipo', valorHH ='$txtValorHH' ";
  if ($change ==0){
    $passHash = password_hash($txtPass, PASSWORD_BCRYPT);
    $sql2 = " , password = '$passHash' ";
  } else {
    $sql2= "";
  }
  $sql = $sql . $sql2 . " WHERE mail = '$txtMail'";
  $conn->query($sql);
}

//trae los usuarios existentes en la base de datos
function getUserList($conn){
  $sql = "SELECT tu.mail, tu.nombre, tu.paterno, tu.materno, tp.nombre as perfil, tu.habilitado, tipo
          FROM tbl_usuario tu, tbl_perfil tp
          WHERE tu.eliminado = 0
          AND tu.idPerfil = tp.idPerfil
          ORDER BY tu.mail asc";
  $rs = $conn->query($sql);

    while ($row = $rs->fetch_assoc()) {
      $idPerfil = $row["perfil"];
      $usuario=trim($row["mail"]);
      $nombre = trim($row["nombre"]." ".$row["paterno"]);
      $perfil = trim($row["perfil"]);
      $tipo = trim($row["tipo"]);
      $habilitado = $row["habilitado"];
      if (trim($habilitado) == "1"){
        $enabled = "Habilitado";
      } else {
        $enabled = "Deshabilitado";
      }
      if ($tipo == "P"){
        $tipo = "Propio/Interno";
      } else {
        $tipo = "Externo";
      }
      echo "<tr><td>$usuario</td><td>$nombre</td><td>$perfil</td><td>$tipo</td>";
      echo "<td>$enabled</td>
          <td class='text-center'>
            <button type='button' class='btn btn-primary btn-sm' onclick=\"editar('$usuario');\">
                <i class='fa fa-edit'></i> Edit
            </button>
            <button type='button' class='btn btn-danger btn-sm'  data-toggle=\"modal\" data-target=\".bs-example-modal-sm\" onclick=\"Remove('$usuario');\">
                <i class='fa fa-ban'></i> Remove
            </button>
          </td>
      </tr>";
    }
}

//elimina un usuario
function RemoveUser($conn, $txtUser){
  $sql = "UPDATE tbl_usuario set  eliminado = 1 WHERE mail = '$txtUser' ";
  $conn->query($sql);
}

//valida login
function login($conn, $txtMail, $txtPass){
  $sql = "SELECT nombre, paterno, idPerfil, password FROM tbl_usuario WHERE mail = '$txtMail' AND habilitado = 1 AND eliminado = 0";
  $rs = $conn->query($sql);
  $resultado[0] = 0;
  $resultado[1] = "Usuario no existe o bloqueado";
  while ($row = $rs->fetch_assoc()) {
    $password = $row["password"];
    $nombre = $row["nombre"] . " " . $row["paterno"];
    $idPerfil = $row["idPerfil"];
    if (password_verify($txtPass, $password)) {
        $resultado[0] = 1;
        $resultado[1] = "OK";
        $resultado[2] = $nombre;
        $resultado[3] = $idPerfil;
    } else {
        $resultado[0] = 0;
        $resultado[1] = "Usuario o contraseña no coinciden";
    }
  }
  return $resultado;
}
?>
