<?php
//trae los datos asociados a un usuario determinado
function getUser($conn,$user){
  $sql = "SELECT password, nombre, habilitado, idPerfil FROM tbl_usuario WHERE usuario = '$user'";
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
  $sql = "select password from tbl_usuario where usuario = '$user' and password = '$pass'";
/*  $rs=odbc_exec($conn,$sql);
  if (!$rs)
    {exit("Error");}

    $existe = 0;
    while (odbc_fetch_row($rs)) {
      $existe=1;
    }
  return $existe;*/
}


//Ingresa un nuevo usuario a la tabla tbl_usuario
function insertUser($conn,$txtMail,$txtNombre,$txtPaterno, $txtMaterno, $txtPass,$chkEnabled,$slcProfile, $slcTipo, $txtValorHH){
  $sql = "INSERT INTO tbl_usuario (mail, password, nombre, paterno, materno, idPerfil, tipo, habilitado, valorHH, eliminado) VALUES
          ('$txtMail','$txtPass','$txtNombre','$txtPaterno','$txtMaterno',$slcProfile,'$slcTipo',$chkEnabled,$txtValorHH,0)";
//echo $sql;
  $conn->query($sql);
}

//Actualiza usuario
function updateUser($conn,$txtUser,$txtNombre,$txtPass,$chkEnabled,$slcProfile,$change){
  $sql = "UPDATE tbl_usuario set nombre = '$txtNombre', idPerfil = $slcProfile, habilitado = $chkEnabled ";
  if ($change ==0){
    $sql2 = " , password = '$txtPass' ";
  } else {
    $sql2= "";
  }
  $sql = $sql . $sql2 . " WHERE usuario = '$txtUser'";
  $res = odbc_exec($conn, $sql);
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
        $enabled = "Enabled";
        $badge = "badge-success";
      } else {
        $enabled = "Disabled";
        $badge = "badge-danger";
      }
      if ($tipo == "P"){
        $tipo = "Propio/Interno";
      } else {
        $tipo = "Externo";
      }
      echo "<tr><td>$usuario</td><td>$nombre</td><td>$perfil</td><td>$tipo</td>";
      echo "<td><span class='badge $badge '>$enabled</span></td>
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

//asocia un cliente a un usuarios
function AddClient($conn, $idCliente, $txtUser){
  $sql = "INSERT INTO tbl_cli_usu (idCliente, usuario) VALUES
          ('$idCliente','$txtUser')";
  $res = odbc_exec($conn, $sql);
}

//asocia un cliente a un usuarios
function RemoveClient($conn, $idCliente, $txtUser){
  $sql = "DELETE FROM tbl_cli_usu WHERE idCliente = '$idCliente' and usuario = '$txtUser' ";
  $res = odbc_exec($conn, $sql);
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
