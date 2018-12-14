<?php
session_start();
if($_GET['type'] == "logout"){
  $_SESSION["user"] = NULL;
  header("Location: /en/public");
}
else if($_GET['type'] == "lang"){
  if($_SESSION['page'] == "queue") header("Location: /ht/public/staff/index.php");
  else if($_SESSION['page'] == "login") header("Location: /ht/public");
  else if($_SESSION['page'] == "check_in") header("Location: /ht/public/staff/pages/index.php");
  else if($_SESSION['page'] == "register") header("Location: /ht/public/staff/pages/new.php");
  else if($_SESSION['page'] == "edit") header("Location: /ht/public/staff/pages/edit.php?id=".$_SESSION['id']);
}
?>
