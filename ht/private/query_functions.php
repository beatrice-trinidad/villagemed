<?php
require_once('database.php');
require_once('validation_functions.php');


function find_all_patients($start){
  $sql = "SELECT * FROM patientinfo ORDER BY id ASC LIMIT $start, 15";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}

function get_total_patients(){
  $sql = "SELECT * FROM patientinfo";
  $result = mysqli_query(db_connect(), $sql);
  return mysqli_num_rows($result);
}

function update_patient_status($status, $pid){
  $sql = "UPDATE pvisit SET " .$status ."='1' WHERE pid = " .$pid;
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function number_of_patients_seen(){
  $sql = "SELECT vitals, prescription, exam, dispense FROM pvisit WHERE DATE(vdate) = CURDATE()";
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
  $result = mysqli_query(db_connect(), $sql);
  $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
  $current = intval($row['total_seen']);
  $current++;
  $sql = "UPDATE village_med_stats SET ";
  $sql .= "total_seen = " . $current . " WHERE id = '1'";
  $result2 = mysqli_query(db_connect(), $sql);
  return $result2;
}
function get_stats(){
  $sql = "SELECT * FROM statistics";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function find_pvisit_patients(){
  $sql = "SELECT * FROM pvisit WHERE DATE(vdate) = CURDATE() ORDER BY ticket ASC";
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
  $sql .= "drug1_name = '". $_POST['drug1_name']. "',";
  $sql .= "drug1_dosage = '". $_POST['drug1_dosage']. "',";
  $sql .= "drug1_quantity = '". $_POST['drug1_quantity']. "',";
  $sql .= "drug2_name = '". $_POST['drug2_name']. "',";
  $sql .= "drug2_dosage = '". $_POST['drug2_dosage']. "',";
  $sql .= "drug2_quantity = '". $_POST['drug2_quantity']. "',";
  $sql .= "drug3_name = '". $_POST['drug3_name']. "',";
  $sql .= "drug3_dosage = '". $_POST['drug3_dosage']. "',";
  $sql .= "drug3_quantity = '". $_POST['drug3_quantity']. "',";
  $sql .= "drug4_name = '". $_POST['drug4_name']. "',";
  $sql .= "drug4_dosage = '". $_POST['drug4_dosage']. "',";
  $sql .= "drug4_quantity = '". $_POST['drug4_quantity']. "',";
  $sql .= "doc_sig_2 = '". $_POST['doctorsignature2']. "'";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function insert_pvitals($id, $any_treatment, $treatment_helpful){
  $uid = get_uid_by_id($id);
  $sql = "INSERT INTO pinfo ";
  $sql .= "(uid, body_temp, weight, height, rr, bp, pulse, problem, length_of_problem, any_treatment, current_treatment, treatment_helpful) ";
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
  $sql .= "'". $treatment_helpful. "'";
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

function insert_pexam($id, $docsig, $assessment, $neurology_exam, $musculoskeleton_exam, $skin_exam, $genitourinary_exam, $lymph_exam, $abdomen_exam, $cardiovascular_exam, $respiratory_exam, $eyes_exam, $neck_exam, $ent_exam, $general_exam, $general_ros_positive, $general_ros_comments, $ophthalmic_ros_positive, $ophthalmic_ros_comments, $ent_ros_positive, $ent_ros_comments, $respiratory_ros_positive, $respiratory_ros_comments,
$cardiovascular_ros_positive, $cardiovascular_ros_comments, $gastrointestinal_ros_positive, $gastrointestinal_ros_comments, $urinary_ros_positive, $urinary_ros_comments, $musculoskeletal_ros_positive, $musculoskeletal_ros_comments, $neurological_ros_positive, $neurological_ros_comments, $dermatological_ros_positive, $dermatological_ros_comments) {
  $uid = get_uid_by_id($id);
  $sql = "UPDATE pinfo SET ";
  $sql .= "general_ros_positive = '". $general_ros_positive . "', ";
  $sql .= "general_ros_comments = '". $general_ros_comments . "', ";
  $sql .= "ophthalmic_ros_positive = '". $ophthalmic_ros_positive . "', ";
  $sql .= "ophthalmic_ros_comments = '". $ophthalmic_ros_comments . "', ";
  $sql .= "ent_ros_positive = '". $ent_ros_positive . "', ";
  $sql .= "ent_ros_comments = '". $ent_ros_comments . "', ";
  $sql .= "respiratory_ros_positive = '". $respiratory_ros_positive . "', ";
  $sql .= "respiratory_ros_comments = '". $respiratory_ros_comments . "', ";
  $sql .= "cardiovascular_ros_positive = '". $cardiovascular_ros_positive . "', ";
  $sql .= "cardiovascular_ros_comments = '". $cardiovascular_ros_comments . "', ";
  $sql .= "gastrointestinal_ros_positive = '". $gastrointestinal_ros_positive . "', ";
  $sql .= "gastrointestinal_ros_comments = '". $gastrointestinal_ros_comments . "', ";
  $sql .= "urinary_ros_positive = '". $urinary_ros_positive . "', ";
  $sql .= "urinary_ros_comments = '". $urinary_ros_comments . "', ";
  $sql .= "musculoskeleton_ros_positive = '". $musculoskeletal_ros_positive . "', ";
  $sql .= "musculoskeleton_ros_comments = '". $musculoskeletal_ros_comments . "', ";
  $sql .= "neurological_ros_positive = '". $neurological_ros_positive . "', ";
  $sql .= "neurological_ros_comments = '". $neurological_ros_comments . "', ";
  $sql .= "dermatological_ros_positive = '". $dermatological_ros_positive . "', ";
  $sql .= "dermatological_ros_comments = '". $dermatological_ros_comments . "', ";
  $sql .= "neurology_exam = '". $neurology_exam . "', ";
  $sql .= "musculoskeleton_exam = '". $musculoskeleton_exam . "', ";
  $sql .= "skin_exam = '". $skin_exam. "', ";
  $sql .= "genitourinary_exam = '". $genitourinary_exam . "', ";
  $sql .= "lymph_exam = '". $lymph_exam . "', ";
  $sql .= "abdomen_exam = '". $abdomen_exam . "', ";
  $sql .= "cardiovascular_exam = '". $cardiovascular_exam . "', ";
  $sql .= "respiratory_exam = '". $respiratory_exam . "', ";
  $sql .= "eyes_exam = '". $eyes_exam . "', ";
  $sql .= "neck_exam = '". $neck_exam . "', ";
  $sql .= "ent_exam = '". $ent_exam . "', ";
  $sql .= "general_exam = '". $general_exam . "', ";
  $sql .= "assessment = '". $assessment . "', ";
  $sql .= "doc_sig = '". $docsig . "' ";
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
function get_current_uid(){
  $sql = "SELECT uid FROM staff ";
  $sql .= "WHERE email = '" .$_POST['email'] ."' and password = '" .$_POST['password'] ."'";
  $result = mysqli_query(db_connect(), $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['uid'];
}
function edit_account_settings(){
  $sql = "UPDATE staff ";
  $sql .= "SET email = '" .$_POST['_address'] ."', password = '" .$_POST['pswd_'] ."', role = '" .$_POST['role']. "', language = '" .$_POST['language']. "'";
  $sql .= "WHERE uid = '" .$_SESSION['uid']. "'";
  $result = mysqli_query(db_connect(), $sql);
  $row = mysqli_fetch_assoc($result);
  return $row['uid'];
}
function user_exists($email){
  $sql = "SELECT * FROM staff WHERE email='$email'";
  $result = mysqli_query(db_connect(), $sql);
  $count = mysqli_num_rows($result);
  if($count > 0){
    return TRUE;
  }
  else{
    return FALSE;
  }
}
function register_new_user(){
  $sql = "INSERT INTO staff ";
  $sql .= "(uid, fname, lname, email, password, role, language, master_password)";
  $sql .= "VALUES(";
  $sql .= "'". uniqid() . "',";
  $sql .= "'". $_POST['fname'] . "',";
  $sql .= "'". $_POST['lname']  . "',";
  $sql .= "'". $_POST['email_address']  . "',";
  $sql .= "'". $_POST['password_']  . "',";
  $sql .= "'". $_POST['role']  . "',";
  $sql .= "'". $_POST['language']  . "',";
  $sql .= "'". $_POST['master_password']  . "'";
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
function get_staff_by_uid($uid){
  $sql = "SELECT * FROM staff ";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);
  $patient = mysqli_fetch_assoc($result);
  return $patient;
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
  $sql .= "(uid, fname, lname, gender, dob, GRname, GRemail, GRphone, patient_image_content) ";
  $sql .= "VALUES (";
  $sql .= "'". $uid . "',";
  $sql .= "'". $patient['fname'] . "',";
  $sql .= "'". $patient['lname']. "',";
  $sql .= "'". $patient['gender']. "',";
  $sql .= "'". $patient['dob']. "',";
  $sql .= "'". $patient['GRname']. "',";
  $sql .= "'". $patient['GRemail']. "',";
  $sql .= "'". $patient['GRphone']. "',";
  $sql .= "'". $image_content. "'";
  $sql .= ")";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function is_user_checked_in($uid){
  $sql = "SELECT * FROM pvisit WHERE uid='$uid' AND WHERE DATE(vdate) = CURDATE()";
  $result = mysqli_query(db_connect(), $sql);
  $count = mysqli_num_rows($result);
  return $count;
}
function check_in_patient($patient, $uid){
  $vdate = date('y-m-d', time());
  $sql = "";
  $sql = "INSERT INTO pvisit ";
  $sql .= "(uid, ticket, checkin, vitals, exam, prescription, dispense, vdate) ";
  $sql .= "VALUES (";
  $sql .= "'". $uid . "',";
  $sql .= "'". $patient['ticket'] . "',";
  $sql .= "'1', '0', '0', '0', '0', '".$vdate."'";
  $sql .= ")";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}
function number_of_patients_waiting(){
  $sql = "SELECT COUNT(*) FROM pvisit WHERE DATE(vdate) = CURDATE()";
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
  $sql .= "GRname='" . $patient['GRname'] . "', ";
  $sql .= "GRemail='" . $patient['GRemail'] . "', ";
  $sql .= "GRphone='" . $patient['GRphone'] . "' ";
  $sql .= "WHERE id='" . $patient['id'] . "' ";
  $sql .="LIMIT 1";
  $result = mysqli_query(db_connect(), $sql);
  return $result;
}

function delete_patient($uid){
  $sql = "DELETE FROM pinfo ";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);

  $sql = "DELETE FROM pvisit ";
  $sql .= "WHERE uid='" . $uid . "'";
  $result = mysqli_query(db_connect(), $sql);

  return $result;
}
?>
