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
function increment_total_seen(){
  $sql = "SELECT total_seen FROM village_med_stats WHERE id = '1'";
  $result = mysqli_query(dbx_connect(), $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $current = intval($row['total_seen']);
  $current++;
  $sql = "UPDATE village_med_stats SET ";
  $sql .= "total_seen = " . $current . " WHERE id = '1'";
  $result2 = mysqli_query(db_connect(), $sql);
  return $result2;
}
function find_pvisit_patients(){
  $sql = "SELECT * FROM pvisit ORDER BY pid ASC";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function filter_patients($search){
  if($search == ""){
    return find_all_patients();
  }
  else{
    $sql = "SELECT * FROM patientinfo ";
    $sql .= "WHERE INSTR('".$search."', fname) > 0 ";
    $sql .= "OR INSTR('".$search."', lname) > 0";
    $result = mysqli_query(db_connect(), $sql);
    $count = mysqli_num_rows($result);
    if($count == 0) return NULL;
    return $result;
  }
}
function get_pinfo_by_uid($uid){
  $sql = "SELECT * FROM pinfo ";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);
  $patient = mysqli_fetch_assoc($result);
  return $patient;
}
function insert_prescription($id){
  $uid = get_uid_by_id($id);
  $sql = "UPDATE pinfo SET ";
  $sql .= "treatment_plan = '". $_POST['treatment_plan'] . "',";
  $sql .= "drug_name = '". $_POST['drug_name']. "',";
  $sql .= "dosage = '". $_POST['dosage']. "',";
  $sql .= "quantity = '". $_POST['quantity']. "'";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function insert_pvitals($id, $any_treatment, $treatment_helpful){
  $uid = get_uid_by_id($id);
  $vdate = date('m/d/Y h:i:s a', time());
  $sql = "INSERT INTO pinfo ";
  $sql .= "(uid, body_temp, weight, height, rr, bp, pulse, problem, length_of_problem, any_treatment, current_treatment, treatment_helpful, vdate) ";
  $sql .= "VALUES (";
  $sql .= "'". $uid . "',";
  $sql .= "'". $_POST['body_temp'] . "',";
  $sql .= "'". $_POST['weight']. "',";
  $sql .= "'". $_POST['height']. "',";
  $sql .= "'". $_POST['rr']. "',";
  $sql .= "'". $_POST['bp']. "',";
  $sql .= "'". $_POST['pulse']. "',";
  $sql .= "'". $_POST['problem']. "',";
  $sql .= "'". $_POST['length_of_problem']. "',";
  $sql .= "'". $any_treatment. "',";
  $sql .= "'". $_POST['current_treatment']. "',";
  $sql .= "'". $treatment_helpful. "',";
  $sql .= "'". $vdate. "'";
  $sql .= ")";
  $result = mysqli_query(db_connect(), $sql);
  update_history($uid, $_POST['immunization_history'], $_POST['allergy_history'], $_POST['past_diseases']);
  return $result;
}
function update_history($uid, $immunizations, $allergies, $past_diseases){
  $sql = "UPDATE patientinfo SET ";
  $sql .= "immunizations = '". $immunizations . "',";
  $sql .= "allergies = '". $allergies . "',";
  $sql .= "past_diseases = '". $past_diseases . "'";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function insert_pexam($id, $general_ros_positive, $general_ros_negative, $general_ros_comments, $ophthalmic_ros_positive, $ophthalmic_ros_negative, $ophthalmic_ros_comments, $ent_ros_positive, $ent_ros_negative, $ent_ros_comments, $respiratory_ros_positive, $respiratory_ros_negative, $respiratory_ros_comments, $cardiovascular_ros_positive, $cardiovascular_ros_negative, $cardiovascular_ros_comments, $gastrointestinal_ros_positive, $gastrointestinal_ros_negative, $gastrointestinal_ros_comments, $urinary_ros_positive, $urinary_ros_negative, $urinary_ros_comments, $musculoskeleton_ros_positive, $musculoskeleton_ros_negative, $musculoskeleton_ros_comments, $neurological_ros_positive, $neurological_ros_negative, $neurological_ros_comments, $dermatological_ros_positive, $dermatological_ros_negative, $dermatological_ros_comments) {
  $uid = get_uid_by_id($id);
  $sql = "UPDATE pinfo SET ";
  $sql .= "general_ros_positive = '". $general_ros_positive . "',";
  $sql .= "general_ros_negative = '". $general_ros_negative . "',";
  $sql .= "general_ros_comments = '". $general_ros_comments . "',";
  $sql .= "ophthalmic_ros_positive = '". $ophthalmic_ros_positive . "',";
  $sql .= "ophthalmic_ros_negative = '". $ophthalmic_ros_negative . "',";
  $sql .= "ophthalmic_ros_comments = '". $ophthalmic_ros_comments . "',";
  $sql .= "ent_ros_positive = '". $ent_ros_positive . "',";
  $sql .= "ent_ros_negative = '". $ent_ros_negative . "',";
  $sql .= "ent_ros_comments = '". $ent_ros_comments . "',";
  $sql .= "respiratory_ros_positive = '". $respiratory_ros_positive . "',";
  $sql .= "respiratory_ros_negative = '". $respiratory_ros_negative . "',";
  $sql .= "respiratory_ros_comments = '". $respiratory_ros_comments . "',";
  $sql .= "cardiovascular_ros_positive = '". $cardiovascular_ros_positive . "',";
  $sql .= "cardiovascular_ros_negative = '". $cardiovascular_ros_negative . "',";
  $sql .= "cardiovascular_ros_comments = '". $cardiovascular_ros_comments . "',";
  $sql .= "gastrointestinal_ros_positive = '". $gastrointestinal_ros_positive . "',";
  $sql .= "gastrointestinal_ros_negative = '". $gastrointestinal_ros_negative . "',";
  $sql .= "gastrointestinal_ros_comments = '". $gastrointestinal_ros_comments . "',";
  $sql .= "urinary_ros_positive = '". $urinary_ros_positive . "',";
  $sql .= "urinary_ros_negative = '". $urinary_ros_negative . "',";
  $sql .= "urinary_ros_comments = '". $urinary_ros_comments . "',";
  $sql .= "musculoskeleton_ros_positive = '". $musculoskeleton_ros_positive . "',";
  $sql .= "musculoskeleton_ros_negative = '". $musculoskeleton_ros_negative . "',";
  $sql .= "musculoskeleton_ros_comments = '". $musculoskeleton_ros_comments . "',";
  $sql .= "neurological_ros_positive = '". $neurological_ros_positive . "',";
  $sql .= "neurological_ros_negative = '". $neurological_ros_negative . "',";
  $sql .= "neurological_ros_comments = '". $neurological_ros_comments . "',";
  $sql .= "dermatological_ros_positive = '". $dermatological_ros_positive . "',";
  $sql .= "dermatological_ros_negative = '". $dermatological_ros_negative . "',";
  $sql .= "dermatological_ros_comments = '". $dermatological_ros_comments . "'";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function login_user(){
  $sql = "SELECT * FROM staff ";
  $sql .= "WHERE email = '" .$_POST['email'] ."' and password = '" .$_POST['password'] ."'";
  $result = mysqli_query(db_connect(), $sql);
  $count = mysqli_num_rows($result);
  return $count;
}
function register_new_user(){
  $sql = "INSERT INTO staff ";
  $sql .= "(uid, fname, lname, email, password, role, nationality)";
  $sql .= "VALUES(";
  $sql .= "'". uniqid() . "',";
  $sql .= "'". $_POST['fname'] . "',";
  $sql .= "'". $_POST['lname']  . "',";
  $sql .= "'". $_POST['email_address']  . "',";
  $sql .= "'". $_POST['password_']  . "',";
  $sql .= "'". $_POST['role']  . "',";
  $sql .= "'". $_POST['language']  . "'";
  $sql .= ")";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function get_patient_by_ticket($ticket){
  $sql = "SELECT * FROM pvisit ";
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

function get_uid_by_id($id){
  $sql = "SELECT uid FROM pvisit ";
  $sql .= "WHERE pid='" . $id . "'";
  $result = mysqli_query(db_connect(), $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['uid'];
}
function get_puid_by_id($id){
  $sql = "SELECT uid FROM patientinfo ";
  $sql .= "WHERE id='" . $id . "'";
  $result = mysqli_query(db_connect(), $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['uid'];
}
function get_patient_by_uid($uid){
  $sql = "SELECT * FROM patientinfo ";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);
  $patient = mysqli_fetch_assoc($result);
  return $patient;
}
function save_pinfo(){
  $sql = "INSERT INTO visit_history SELECT * FROM pinfo";
  $result = mysqli_query(db_connect(), $sql);
}
function clear_pinfo(){
  $sql = "DELETE FROM pinfo";
  $result = mysqli_query(db_connect(), $sql);
}
function clear_pvisit(){
  $sql = "DELETE FROM pvisit";
  $result = mysqli_query(db_connect(), $sql);
}
function get_patient_image($uid){
  $sql = "SELECT patient_image_content FROM patientinfo ";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['patient_image_content'];
}
function insert_patient($patient, $uid, $image_content){
  $sql = "INSERT INTO patientinfo ";
  $sql .= "(uid, fname, lname, gender, dob, age, GRname, GRemail, GRphone, patient_image_content) ";
  $sql .= "VALUES (";
  $sql .= "'". $uid . "',";
  $sql .= "'". $patient['fname'] . "',";
  $sql .= "'". $patient['lname']. "',";
  $sql .= "'". $patient['gender']. "',";
  $sql .= "'". $patient['dob']. "',";
  $sql .= "'". $patient['age']. "',";
  $sql .= "'". $patient['GRname']. "',";
  $sql .= "'". $patient['GRemail']. "',";
  $sql .= "'". $patient['GRphone']. "',";
  $sql .= "'". $image_content. "'";
  $sql .= ")";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function check_in_patient($patient, $uid){
  date_default_timezone_set('Australia/Melbourne');
  $sql = "INSERT INTO pvisit ";
  $sql .= "(uid, fname, age, ticket, checkin, vitals, exam, prescription, dispense) ";
  $sql .= "VALUES (";
  $sql .= "'". $uid . "',";
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
