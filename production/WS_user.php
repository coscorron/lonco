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
  $sql = "SELECT name, tipo, active, id_perfil, valorHH
  FROM user u, userperfilsubclient ups
  WHERE email = '$user' AND ups.id_user = user ";
  $rs = $conn->query($sql);
  $existe = 0;
  while ($row = $rs->fetch_assoc()) {
    $existe=1;
    $resultado[0]=trim($row["name"]);
    $resultado[1]=trim($row["tipo"]);
    $habilitado=trim($row["active"]);
    $resultado[2]=trim($row["id_perfil"]);
    $resultado[3]=trim($row["valorHH"]);
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
  $conn->query($sql);
}

//Actualiza usuario
function updateUser($conn,$txtMail,$txtNombre,$txtPaterno,$txtMaterno,$txtPass,$chkEnabled,$slcTipo,$txtValorHH,$change){
  $sql = "UPDATE user set name = '$txtNombre', active = $chkEnabled, tipo = '$slcTipo', valorHH ='$txtValorHH' ";
  if ($change ==0){
    $passHash = md5($txtPass);
    $sql2 = " , password = '$passHash' ";
  } else {
    $sql2= "";
  }
  $sql = $sql . $sql2 . " WHERE email = '$txtMail'";
  $conn->query($sql);
}

//trae los usuarios existentes en la base de datos
function getUserList($conn){
  $sql = "SELECT tu.email, tu.name,  tp.name as perfil, tu.active as habilitado, tipo
          FROM user tu, perfil tp, userperfilsubclient ups
          WHERE tu.eliminado = 0
          AND ups.id_user = tu.user
          AND ups.id_perfil = tp.id_perfil
          ORDER BY tu.email asc";
  $rs = $conn->query($sql);

    while ($row = $rs->fetch_assoc()) {
      $idPerfil = $row["perfil"];
      $usuario=trim($row["email"]);
      $nombre = trim($row["name"]);
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
function RemoveUser($conn, $txtUser,$session_user){
  $sql = "UPDATE user set  eliminado = 1, fecha_eliminacion = now(), user_eliminador = '$session_user' WHERE email = '$txtUser' ";
  $conn->query($sql);
}

//valida login
function login($conn, $txtMail, $txtPass){
  $sql = "SELECT user, email, name, pass, 0 as idPerfil FROM user WHERE (user = '$txtMail' OR email = '$txtMail') AND eliminado = 0 AND active = 1";
  $rs = $conn->query($sql);
  $resultado[0] = 0;
  $resultado[1] = "Usuario no existe o bloqueado";
  while ($row = $rs->fetch_assoc()) {
    $password = $row["pass"];
    $nombre = $row["name"];
    $idPerfil = $row["idPerfil"];
    $user = $row["user"];
    $email = $row["email"];
    $txtPass = md5($txtPass);
    if ($txtPass == $password) {
        $resultado[0] = 1;
        $resultado[1] = "OK";
        $resultado[2] = $nombre;
        $resultado[3] = $idPerfil;
        $resultado[4] = $user;
        $resultado[5] = $email;
        $sql = "UPDATE user SET ingresos = ingresos + 1, ultimo_login = NOW() where user = '$user'";
        $conn->query($sql);
    } else {
        $resultado[0] = 0;
        $resultado[1] = "Usuario o contraseña no coinciden";
    }
  }
  return $resultado;
}
?>
