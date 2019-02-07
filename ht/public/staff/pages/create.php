<?php

require_once('../../../private/initialize.php');
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /ht/public");
}
if(is_post_request()) {

  // Handle form values sent by new.php

  $patient = [];
  $patient['ticket'] = $_POST['ticket'] ?? '';
  //$patient['id'] = $id;
  $patient['fname'] = $_POST['fname'] ?? '';
  $patient['lname'] = $_POST['lname'] ?? '';
  $patient['gender'] = $_POST['gender'] ?? '';
  $patient['dob'] = $_POST['dob'] ?? '';
  $patient['age'] = $_POST['age'] ?? '';
  $patient['GRname'] = $_POST['GRname'] ?? '';

  $patient['GRemail'] = $_POST['GRemail'] ?? '';
  $patient['GRphone'] = $_POST['GRphone'] ?? '';

  $result= insert_patient($patient);
}
  else {
    redirect_to(url_for('/staff/pages/new.php'));
  }

?>
