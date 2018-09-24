<?php
require_once('database.php');
require_once('validation_functions.php');

function find_all_patients(){
  $sql = "SELECT * FROM patientinfo ORDER BY id ASC";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function update_patient_status($status, $pid){
  $sql = "UPDATE pvisit SET " .$status ."='1' WHERE pid = " .$pid;
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function number_of_patients_seen(){
  $sql = "SELECT vitals, prescription, exam, dispense FROM pvisit";
  $result = mysqli_query(db_connect(), $sql);
  $count = 0;
  while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
    if(intval($row['vitals']) == 1 && intval($row['prescription']) == 1 && intval($row['exam']) == 1 && intval($row['dispense']) == 1){
        $count ++;
    }
  }
  return $count;
}
function find_pvisit_patients(){
  $sql = "SELECT * FROM pvisit ORDER BY pid ASC";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function filter_patients($fname, $lname){
  if($fname == "" && $lname == ""){
    return find_all_patients();
  }
  else if($lname == ""){
    $sql = "SELECT * FROM patientinfo ";
    $sql .= "WHERE fname='" .$fname ."'";
    $result = mysqli_query(db_connect(), $sql);
    return $result;
  }
  else if($fname == ""){
    $sql = "SELECT * FROM patientinfo ";
    $sql .= "WHERE lname='" .$lname ."'";
    $result = mysqli_query(db_connect(), $sql);
    return $result;
  }
  else{
    $sql = "SELECT * FROM patientinfo ";
    $sql .= "WHERE fname='" .$fname ."'";
    $sql .= "AND lname='" .$lname ."'";
    $result = mysqli_query(db_connect(), $sql);
    return $result;
  }
}
function get_patient_by_id($id){
  $sql = "SELECT * FROM patientinfo ";
  $sql .= "WHERE id='" . $id . "'";
  $result = mysqli_query(db_connect(), $sql);
  $patient = mysqli_fetch_assoc($result);
  return $patient;
}
function get_patient_by_ticket($ticket){
  $sql = "SELECT * FROM patientinfo ";
  $sql .= "WHERE ticket='" . $ticket . "'";
  $result = mysqli_query(db_connect(), $sql);
  $patient = mysqli_fetch_assoc($result);
  return $patient;
}
function validate_patient($patient) {
  $errors = array();
  $i = 0;
  if(is_blank($patient['fname'])) {
    $errors[$i] = "Name cannot be blank.";
    $i += 1;
  }
  else if(!has_length($patient['fname'], ['min' => 2, 'max' => 255])) {
    $errors[$i] = "Name must be between 2 and 255 characters.";
    $i += 1;
  }
  if(is_blank($patient['lname'])) {
    $errors[$i] = "Last Name cannot be blank.";
    $i += 1;
  }
  else if(!has_length($patient['lname'], ['min' => 2, 'max' => 255])) {
    $errors[$i] = "Last Name must be between 2 and 255 characters.";
    $i += 1;
  }
  if(is_blank($patient['GRname'])) {
    $errors[$i] = "Guardian's name cannot be blank.";
    $i += 1;
  }
// position
// Make sure we are working with an integer
/*  $postion_int = (int) $patient['position'];
if($postion_int <= 0) {
$errors[] = "Position must be greater than zero.";
}
if($postion_int > 999) {
$errors[] = "Position must be less than 999.";
}*/

// visible
// Make sure we are working with a string
/*  $visible_str = (string) $patient['visible'];
if(!has_inclusion_of($visible_str, ["0","1"])) {
$errors[] = "Visible must be true or false.";
}*/
  return $errors;
}


function insert_patient($patient){
  if(count(validate_patient($patient)) > 0){
    //echo "there are errors the count is " . count(validate_patient($patient));
    //print_r(validate_patient($patient));
  }
  else{
    //echo "there are no errors";
  }
  $sql = "INSERT INTO patientinfo ";
  $sql .= "(fname, lname, gender, dob, age, GRname, GRemail, GRphone) ";
  $sql .= "VALUES (";
  $sql .= "'". $patient['fname'] . "',";
  $sql .= "'". $patient['lname']. "',";
  $sql .= "'". $patient['gender']. "',";
  $sql .= "'". $patient['dob']. "',";
  $sql .= "'". $patient['age']. "',";
  $sql .= "'". $patient['GRname']. "',";
  $sql .= "'". $patient['GRemail']. "',";
  $sql .= "'". $patient['GRphone']. "'";
  $sql .= ")";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function check_in_patient($patient){
  date_default_timezone_set('Australia/Melbourne');
  $vdate = date('m/d/Y h:i:s a', time());
  $sql = "INSERT INTO pvisit ";
  $sql .= "(vdate, fname, age, ticket, checkin, vitals, exam, prescription, dispense) ";
  $sql .= "VALUES (";
  $sql .= "'". $vdate . "',";
  $sql .= "'". $patient['fname'] . "',";
  $sql .= "'". $patient['age'] . "',";
  $sql .= "'". $patient['ticket'] . "',";
  $sql .= "'1', '0', '0', '0', '0'";
  $sql .= ")";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function number_of_patients_waiting(){
  $sql = "SELECT COUNT(*) FROM pvisit";
  $result = mysqli_query(db_connect(), $sql);
  return mysqli_fetch_assoc($result)['COUNT(*)'];
}
function update_patient($patient){
  $errors = validate_patient($patient);
  if(!empty($errors)) {
    return $errors;
  }
  $sql = "UPDATE patientinfo SET ";
  $sql .= "fname='" . $patient['fname'] . "', ";
  $sql .= "lname='" . $patient['lname'] . "', ";
  $sql .= "gender='" . $patient['gender'] . "', ";
  $sql .= "dob='" . $patient['dob'] . "', ";
  $sql .= "age='" . $patient['age'] . "', ";
  $sql .= "GRname='" . $patient['GRname'] . "', ";
  $sql .= "GRemail='" . $patient['GRemail'] . "', ";
  $sql .= "GRphone='" . $patient['GRphone'] . "' ";
  $sql .= "WHERE id='" . $patient['id'] . "' ";
  $sql .="LIMIT 1";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}

function delete_patient($id){
  global $db;
  $sql = "DELETE FROM patientinfo ";
  $sql .= "WHERE id='" . $id ."' ";
  $sql .= "LIMIT 1";

  $result = mysqli_query($db, $sql);

  if($result){
    return true;

  }
  else{
    //delete failed
    echo mysqli_error($db);
    db_disconnect($db);
    exit;

  }
}
?>
