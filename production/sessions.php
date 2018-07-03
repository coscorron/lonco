<?php
session_start();
if (isset($_SESSION["mail"])){
} else {
  header('Location: '.'login.php');
}
 ?>
