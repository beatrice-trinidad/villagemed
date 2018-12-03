<?php require_once('../../../private/initialize.php');
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /public");
}
?>


<?php include(SHARED_PATH . '/pInfo_header.php');
  $value = $value1 = $value2 = $value3 = $value4 = "";
  if(strcmp(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['any_treatment'], "Yes") == 0) $value = "checked";
  if(strcmp(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['any_treatment'], "No") == 0) $value1 = "checked";
  if(strcmp(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['treatment_helpful'], "Somewhat Yes") == 0) $value2 = "checked";
  if(strcmp(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['treatment_helpful'], "Not at All") == 0) $value3 = "checked";
  if(strcmp(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['treatment_helpful'], "N/A") == 0) $value4 = "checked";
?>
<?php
  if(is_post_request()){
    $general_ros_positive = $general_ros_negative = $general_ros_comments = $ophthalmic_ros_positive = $ophthalmic_ros_negative = $ophthalmic_ros_comments = $ent_ros_positive = $ent_ros_negative = $ent_ros_comments = $respiratory_ros_positive = $respiratory_ros_negative = $respiratory_ros_comments = $cardiovascular_ros_positive = $cardiovascular_ros_negative = $cardiovascular_ros_comments = $gastrointestinal_ros_positive = $gastrointestinal_ros_negative = $gastrointestinal_ros_comments = "";
    $urinary_ros_positive = $urinary_ros_negative = $urinary_ros_comments = $musculoskeleton_ros_positive = $musculoskeleton_ros_negative = $musculoskeleton_ros_comments = $neurological_ros_positive = $neurological_ros_negative = $neurological_ros_comments = $dermatological_ros_positive = $dermatological_ros_negative = $dermatological_ros_comments = "";
    if(isset($_POST['fatigue_g'])) $general_ros_positive .= "fatigue, ";
    if(isset($_POST['fever_g'])) $general_ros_positive .= "fever, ";
    if(isset($_POST['malaise_g'])) $general_ros_positive .= "malaise, ";
    if(isset($_POST['sleep_disturbance_g'])) $general_ros_positive .= "sleep disturbance, ";

    if(isset($_POST['fatigue_g_n'])) $general_ros_negative .= "fatigue, ";
    if(isset($_POST['fever_g_n'])) $general_ros_negative .= "fever, ";
    if(isset($_POST['weight_loss_g_n'])) $general_ros_negative .= "weight loss, ";
    if(isset($_POST['sleep_disturbance_g_n'])) $general_ros_negative .= "sleep disturbance, ";

    if(isset($_POST['comments_g'])) $general_ros_comments .= $_POST['comments_g'];

    if(isset($_POST['eye_pain_o'])) $ophthalmic_ros_positive .= "eye pain, ";
    if(isset($_POST['blurry_vision_o'])) $ophthalmic_ros_positive .= "blurry vision, ";
    if(isset($_POST['itchy_eyes_o'])) $ophthalmic_ros_positive .= "itchy eyes, ";
    if(isset($_POST['excessive_tears_o'])) $ophthalmic_ros_positive .= "excessive tearing, ";

    if(isset($_POST['eye_pain_o_n'])) $ophthalmic_ros_negative .= "eye pain, ";
    if(isset($_POST['blurry_vision_o_n'])) $ophthalmic_ros_negative .= "blurry vision, ";
    if(isset($_POST['itchy_eyes_o_n'])) $ophthalmic_ros_negative .= "itchy eyes, ";
    if(isset($_POST['excessive_tears_o_n'])) $ophthalmic_ros_negative .= "excessive tearing, ";

    if(isset($_POST['comments_o'])) $ophthalmic_ros_comments .= $_POST['comments_o'];

    if(isset($_POST['sneezing_e'])) $ent_ros_positive .= "sneezing, ";
    if(isset($_POST['sore_throat_e'])) $ent_ros_positive .= "sore throat, ";
    if(isset($_POST['rhinorrhea_e'])) $ent_ros_positive .= "rhinorrhea, ";
    if(isset($_POST['oral_lesions_e'])) $ent_ros_positive .= "oral lesions, ";
    if(isset($_POST['ear_infections_e'])) $ent_ros_positive .= "freq. ear infections, ";
    if(isset($_POST['nasal_congestion_e'])) $ent_ros_positive .= "nasal congestion, ";

    if(isset($_POST['sneezing_e_n'])) $ent_ros_negative .= "sneezing, ";
    if(isset($_POST['sore_throat_e_n'])) $ent_ros_negative .= "sore throat, ";
    if(isset($_POST['rhinorrhea_e_n'])) $ent_ros_negative .= "rhinorrhea, ";
    if(isset($_POST['oral_lesions_e_n'])) $ent_ros_negative .= "oral lesions, ";
    if(isset($_POST['headaches_e_n'])) $ent_ros_negative .= "headaches, ";
    if(isset($_POST['nasal_congestion_e_n'])) $ent_ros_negative .= "nasal congestion, ";

    if(isset($_POST['comments_e'])) $ent_ros_comments .= $_POST['comments_e'];

    if(isset($_POST['cough_r'])) $respiratory_ros_positive .= "cough, ";
    if(isset($_POST['wheezing_r'])) $respiratory_ros_positive .= "wheezing, ";
    if(isset($_POST['short_of_breath_r'])) $respiratory_ros_positive .= "shortness of breath, ";

    if(isset($_POST['cough_r_n'])) $respiratory_ros_negative .= "cough, ";
    if(isset($_POST['wheezing_r_n'])) $respiratory_ros_negative .= "wheezing, ";
    if(isset($_POST['short_of_breath_r_n'])) $respiratory_ros_negative .= "shortness of breath, ";

    if(isset($_POST['comments_r'])) $respiratory_ros_comments .= $_POST['comments_r'];

    if(isset($_POST['chest_pain_c'])) $cardiovascular_ros_positive .= "chest pain, ";
    if(isset($_POST['rapid_heart_rate_c'])) $cardiovascular_ros_positive .= "rapid heart rate, ";

    if(isset($_POST['chest_pain_c_n'])) $cardiovascular_ros_negative .= "chest pain, ";
    if(isset($_POST['rapid_heart_rate_c_n'])) $cardiovascular_ros_negative .= "rapid heart rate, ";

    if(isset($_POST['comments_c'])) $cardiovascular_ros_comments .= $_POST['comments_c'];

    if(isset($_POST['diarrhea_i'])) $gastrointestinal_ros_positive .= "diarrhea, ";
    if(isset($_POST['appetite_loss_i'])) $gastrointestinal_ros_positive .= "appetite loss, ";
    if(isset($_POST['constipation_i'])) $gastrointestinal_ros_positive .= "constipation, ";
    if(isset($_POST['blood_in_stool_i'])) $gastrointestinal_ros_positive .= "blood in stool, ";
    if(isset($_POST['abdominal_pain_i'])) $gastrointestinal_ros_positive .= "abdominal pain, ";
    if(isset($_POST['nausea_vomiting_i'])) $gastrointestinal_ros_positive .= "nausea/vomiting, ";

    if(isset($_POST['diarrhea_i_n'])) $gastrointestinal_ros_negative .= "diarrhea, ";
    if(isset($_POST['appetite_loss_i_n'])) $gastrointestinal_ros_negative .= "appetite loss, ";
    if(isset($_POST['constipation_i_n'])) $gastrointestinal_ros_negative .= "constipation, ";
    if(isset($_POST['blood_in_stool_i_n'])) $gastrointestinal_ros_negative .= "blood in stool, ";
    if(isset($_POST['abdominal_pain_i_n'])) $gastrointestinal_ros_negative .= "abdominal pain, ";
    if(isset($_POST['nausea_vomiting_i_n'])) $gastrointestinal_ros_negative .= "nausea/vomiting, ";
    if(isset($_POST['hematemesis_i_n'])) $gastrointestinal_ros_negative .= "hematemesis, ";

    if(isset($_POST['comments_i'])) $gastrointestinal_ros_comments .= $_POST['comments_i'];

    if(isset($_POST['fatigue_u'])) $urinary_ros_positive .= "fatigue, ";
    if(isset($_POST['fever_u'])) $urinary_ros_positive .= "fever, ";
    if(isset($_POST['malaise_u'])) $urinary_ros_positive .= "malaise, ";
    if(isset($_POST['sleep_disturbance_u'])) $urinary_ros_positive .= "sleep disturbance, ";

    if(isset($_POST['fatigue_u_n'])) $urinary_ros_negative .= "fatigue, ";
    if(isset($_POST['fever_u_n'])) $urinary_ros_negative .= "fever, ";
    if(isset($_POST['weight_loss_u_n'])) $urinary_ros_negative .= "weight loss, ";
    if(isset($_POST['sleep_disturbance_u_n'])) $urinary_ros_negative .= "sleep disturbance, ";

    if(isset($_POST['comments_u'])) $urinary_ros_comments .= $_POST['comments_u'];

    if(isset($_POST['fatigue_m'])) $musculoskeleton_ros_positive .= "fatigue, ";
    if(isset($_POST['fever_m'])) $musculoskeleton_ros_positive .= "fever, ";
    if(isset($_POST['malaise_m'])) $musculoskeleton_ros_positive .= "malaise, ";
    if(isset($_POST['sleep_disturbance_m'])) $musculoskeleton_ros_positive .= "sleep disturbance, ";

    if(isset($_POST['fatigue_m_n'])) $musculoskeleton_ros_negative .= "fatigue, ";
    if(isset($_POST['fever_m_n'])) $musculoskeleton_ros_negative .= "fever, ";
    if(isset($_POST['weight_loss_m_n'])) $musculoskeleton_ros_negative .= "weight loss, ";
    if(isset($_POST['sleep_disturbance_m_n'])) $musculoskeleton_ros_negative .= "sleep disturbance, ";

    if(isset($_POST['comments_m'])) $musculoskeleton_ros_comments .= $_POST['comments_m'];

    if(isset($_POST['fatigue_n'])) $neurological_ros_positive .= "fatigue, ";
    if(isset($_POST['fever_n'])) $neurological_ros_positive .= "fever, ";
    if(isset($_POST['malaise_n'])) $neurological_ros_positive .= "malaise, ";
    if(isset($_POST['sleep_disturbance_n'])) $neurological_ros_positive .= "sleep disturbance, ";

    if(isset($_POST['fatigue_n_n'])) $neurological_ros_negative .= "fatigue, ";
    if(isset($_POST['fever_n_n'])) $neurological_ros_negative .= "fever, ";
    if(isset($_POST['weight_loss_n_n'])) $neurological_ros_negative .= "weight loss, ";
    if(isset($_POST['sleep_disturbance_n_n'])) $neurological_ros_negative .= "sleep disturbance, ";

    if(isset($_POST['comments_n'])) $neurological_ros_comments .= $_POST['comments_n'];

    if(isset($_POST['fatigue_d'])) $dermatological_ros_positive .= "fatigue, ";
    if(isset($_POST['fever_d'])) $dermatological_ros_positive .= "fever, ";
    if(isset($_POST['malaise_d'])) $dermatological_ros_positive .= "malaise, ";
    if(isset($_POST['sleep_disturbance_d'])) $dermatological_ros_positive .= "sleep disturbance, ";

    if(isset($_POST['fatigue_d_n'])) $dermatological_ros_negative .= "fatigue, ";
    if(isset($_POST['fever_d_n'])) $dermatological_ros_negative .= "fever, ";
    if(isset($_POST['weight_loss_d_n'])) $dermatological_ros_negative .= "weight loss, ";
    if(isset($_POST['sleep_disturbance_d_n'])) $dermatological_ros_negative .= "sleep disturbance, ";

    if(isset($_POST['comments_d'])) $dermatological_ros_comments .= $_POST['comments_d'];

    $general_ros_positive = substr($general_ros_positive, 0, -2);
    $general_ros_negative = substr($general_ros_negative, 0, -2);

    $ophthalmic_ros_positive = substr($ophthalmic_ros_positive, 0, -2);
    $ophthalmic_ros_negative = substr($ophthalmic_ros_negative, 0, -2);

    $ent_ros_positive = substr($ent_ros_positive, 0, -2);
    $ent_ros_negative = substr($ent_ros_negative, 0, -2);

    $respiratory_ros_positive = substr($respiratory_ros_positive, 0, -2);
    $respiratory_ros_negative = substr($respiratory_ros_negative, 0, -2);

    $cardiovascular_ros_positive = substr($cardiovascular_ros_positive, 0, -2);
    $cardiovascular_ros_negative = substr($cardiovascular_ros_negative, 0, -2);

    $gastrointestinal_ros_positive = substr($gastrointestinal_ros_positive, 0, -2);
    $gastrointestinal_ros_negative = substr($gastrointestinal_ros_negative, 0, -2);

    $musculoskeleton_ros_positive = substr($musculoskeleton_ros_positive, 0, -2);
    $musculoskeleton_ros_negative = substr($musculoskeleton_ros_negative, 0, -2);

    $neurological_ros_positive = substr($neurological_ros_positive, 0, -2);
    $neurological_ros_negative = substr($neurological_ros_negative, 0, -2);

    $dermatological_ros_positive = substr($dermatological_ros_positive, 0, -2);
    $dermatological_ros_negative = substr($dermatological_ros_negative, 0, -2);
    insert_pexam($_GET['id'], $general_ros_positive, $general_ros_negative, $general_ros_comments, $ophthalmic_ros_positive, $ophthalmic_ros_negative, $ophthalmic_ros_comments, $ent_ros_positive, $ent_ros_negative, $ent_ros_comments, $respiratory_ros_positive, $respiratory_ros_negative, $respiratory_ros_comments, $cardiovascular_ros_positive, $cardiovascular_ros_negative, $cardiovascular_ros_comments, $gastrointestinal_ros_positive, $gastrointestinal_ros_negative, $gastrointestinal_ros_comments, $urinary_ros_positive, $urinary_ros_negative, $urinary_ros_comments, $musculoskeleton_ros_positive, $musculoskeleton_ros_negative, $musculoskeleton_ros_comments, $neurological_ros_positive, $neurological_ros_negative, $neurological_ros_comments, $dermatological_ros_positive, $dermatological_ros_negative, $dermatological_ros_comments);
    update_patient_status("exam", $_GET['id']);
    header("Location: /villagemed-master/public/staff/index.php");
  }
?>
<div class = "container-fluid">
  <div class = "col-md-12">
    <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#vitals">Vitals Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#history">History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#ros">ROS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#exam">Exam</a>
      </li>
    </ul>
<form method="post">
    <div class ="tab-content">
      <div id="vitals" role="tabpanel" class="container tab-pane active" style="border:1px solid #cecece;"><br>
        <div class = "row">
          <div class = "col-md-6">
            <div class = "row row-bottom-margin">
              <label for="input" class="col-md-5 col-form-label">Body Temp</label>
              <div class="col-md-7">
                <input type="text" readonly class="form-control-plaintext"  id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['body_temp']?>">
              </div>
            </div>
            <div class="row row-bottom-margin">
              <label for="input" class="col-md-5 col-form-label">Weight</label>
              <div class="col-md-7">
                <input type="text" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['weight']?>">
              </div>
            </div>
            <div class="row">
              <label for="input" class="col-md-5 col-form-label">Height</label>
              <div class="col-md-7">
                <input type="text" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['height']?>">
              </div>
            </div>
          </div><!--col-md-6-->
          <div class = "col-md-6">
            <div class="row row-bottom-margin">
              <label for="input" class="col-md-5 col-form-label">RR</label>
              <div class="col-md-7">
                <input type="text" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['rr']?>" >
              </div>
            </div>
            <div class="row row-bottom-margin">
              <label for="input" class="col-md-5 col-form-label">BP</label>
              <div class="col-md-7">
                <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['bp']?>">
              </div>
            </div>
            <div class="row">
              <label for="input" class="col-md-5 col-form-label">Pulse</label>
              <div class="col-md-7">
                <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['pulse']?>">
              </div>
            </div>
          </div><!--col-md-6-->
        </div>
        <br>
        <div class="form-group row">
          <label for="exampleFormControlTextarea1" class = "col-md-2 col-form-label">Problem</label>
          <div class="col-md-10">
            <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" rows="1" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['problem']?></textarea>
          </div>
        </div>
        <div class="form-group row">
          <label for="input" class="col-md-2 col-form-label">How Long</label>
          <div class="col-md-10">
            <input type="text" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['length_of_problem']?>">
          </div>
        </div>
        <br>
        <div class = "row">
          <legend class="col-form-label col-md-3 pt-0">Any Treatment?</legend>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" <?php echo $value ?> value="option1" disabled>Yes
            </label>
          </div>
          <div class="form-check form-check-inline">
            <label class="form-check-label">
              <input class="form-check-input" type="radio" name="inlineRadioOptions1" id="inlineRadio2" <?php echo $value1 ?> value="option2" disabled>No
            </label>
          </div>
        </div><!--row-->
          <br>
          <div class="form-group row">
            <label for="input" class="col-md-2 col-form-label">Current Treatment</label>
            <div class="col-md-10">
              <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['current_treatment']?>">
            </div>
          </div>
          <br>
          <div class = "row">
            <legend class="col-form-label col-md-3 pt-0">Treatment Helpful?</legend>
            <div class="col">
              <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="" <?php echo $value2 ?> disabled>
              <label class="form-check-label" for="gridRadios1">
                Somewhat Yes
              </label>
            </div>
            <div class="col">
              <input class="form-check-input" type="radio" name="gridRadios1" id="gridRadios1" value="" <?php echo $value3 ?> disabled>
              <label class="form-check-label" for="gridRadios1">
                Not at all
              </label>
            </div>
            <div class="col">
              <input class="form-check-input" type="radio" name="gridRadios2" id="gridRadios1" value="" <?php echo $value4 ?> disabled>
              <label class="form-check-label" for="gridRadios1">
                N/A
              </label>
            </div>
          </div><!--row-->
          <br>
        </div><!--vitals-->
      <div id= "history" role="tabpanel" class="container tab-pane fade" style="border:1px solid #cecece;"><br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Immunizations</label>
          <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" placeholder="N/A" rows= "4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['immunizations']?></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Allergies</label>
          <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" placeholder="N/A" rows = "4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['allergies']?></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Past Diseases</label>
          <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" placeholder="N/A" rows = "4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['past_diseases']?></textarea>
        </div>
      </div><!-- history -->
      <div id= "ros" role="tabpanel" class = "container tab-pane fade" style="border:1px solid #cecece;"><br>
        <h5>General ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" name="fatigue_g" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                      fatigue
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="fever_g" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fever
                    </label>
                  </div>
                </div><!-- col-md-6 -->
                <div class = "col-md-7">
                  <div class="form-check">
                    <input class="form-check-input" name="malaise_g" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      malaise
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="sleep_disturbance_g" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      sleep disturbance
                    </label>
                  </div>
                </div>
              </div><!-- row -->
            </div><!--col-md-6-->
            <div class = "col-md-6">
              <h6>Negative for </h6>
              <div class = "row">
                <div class = "col-md-5">
                  <div class="form-check">
                    <input class="form-check-input" name="fatigue_g_n" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fatigue
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="fever_g_n" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fever
                    </label>
                  </div>
                </div>
                <div class = "col-md-7">
                  <div class = "form-check">
                    <input class="form-check-input" name="weight_loss_g_n" type="checkbox" value="" id="defaultCheck1" >
                    <label class="form-check-label" for="defaultCheck1">
                      weight loss
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="sleep_disturbance_g_n" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      sleep disturbance
                    </label>
                  </div>
                </div>
              </div>
            </div><!-- col-md-6-->
          </div><!-- row this -->
        <div class="form-group" style = "margin-top : 10px">
            <input type="text" name="comments_g" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
          </div>
          <br>

        <h5>Ophthalmic ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" name="eye_pain_o" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Eye Pain
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="blurry_vision_o" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Blurry Vision
                  </label>
                </div>
              </div><!-- col-md-6 -->
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" name="itchy_eyes_o" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Itchy Eyes
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="excessive_tears_o" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Excessive Tearing
                  </label>
                </div>
              </div>
            </div><!-- row -->
          </div><!--col-md-6-->
          <div class = "col-md-6">
            <h6>Negative for </h6>
            <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" name="eye_pain_o_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Eye Pain
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="blurry_vision_o_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Blurry Vision
                  </label>
                </div>
              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" name="itchy_eyes_o_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Itchy Eyes
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="excessive_tears_o_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Excessive Tearing
                  </label>
                </div>
              </div>
            </div>
          </div><!-- col-md-6-->
        </div><!-- row this -->
        <div class="form-group" style = "margin-top : 10px">
            <input type="text" name="comments_o" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
          </div>
          <br>

        <h5>ENT ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" name="sneezing_e" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                Sneezing
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="sore_throat_e" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                Sore Throat
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="rhinorrhea_e" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                Rhinorrhea
                </label>
              </div>
            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" name="oral_lesions_e" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  oral lesions
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="ear_infections_e" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  freq. ear infections
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="nasal_congestion_e" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  nasal congestion
                </label>
              </div>
            </div>

          </div><!-- row -->
          </div><!--col-md-6-->
          <div class = "col-md-6">
            <h6>Negative for </h6>
            <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" name="headaches_e_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    headaches
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="sneezing_e_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Sneezing
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="rhinorrhea_e_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                  Rhinorrhea
                  </label>
                </div>

              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" name="sore_throat_e_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Sore Throat
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="oral_lesions_e_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    oral lesions
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="nasal_congestion_e_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    nasal congestions
                  </label>
                </div>
              </div>



            </div>
          </div><!-- col-md-6-->
          </div><!-- row this -->
          <div class="form-group" style = "margin-top : 10px">
              <input type="text" name="comments_e" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>

        <h5>Respiratory ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" name="cough_r" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  cough
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="wheezing_r" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  wheezing
                </label>
              </div>
            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" name="short_of_breath_r" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  short of breath
                </label>
              </div>

            </div>

          </div><!-- row -->
          </div><!--col-md-6-->
          <div class = "col-md-6">
            <h6>Negative for </h6>
            <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" name="cough_r_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    cough
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="wheezing_r_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                  wheezing
                  </label>
                </div>

              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" name="short_of_breath_r_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    short of breath
                  </label>
                </div>
              </div>
            </div>
          </div><!-- col-md-6-->
        </div><!-- row this -->
        <div class="form-group" style = "margin-top : 10px">
              <input type="text" name="comments_r" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>

        <h5>Cardiovascular ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" name="chest_pain_c" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  chest pain
                </label>
              </div>

            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" name="rapid_heart_rate_c" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  rapid heart rate
                </label>
              </div>

            </div>

          </div><!-- row -->
          </div><!--col-md-6-->
          <div class = "col-md-6">
            <h6>Negative for </h6>
            <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" name="chest_pain_c_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    chest pain
                  </label>
                </div>


              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" name="rapid_heart_rate_c_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    rapid heart rate
                  </label>
                </div>
              </div>



            </div>
          </div><!-- col-md-6-->


          </div><!-- row this -->
          <div class="form-group" style = "margin-top : 10px">
              <input type="text" name="comments_c" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>

        <h5>Gastrointestinal ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" name="diarrhea_i" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  diarrhea
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="appetite_loss_i" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  appetite loss
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="constipation_i" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  constipation
                </label>
              </div>
            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" name="blood_in_stool_i" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  blood in stool
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="abdominal_pain_i" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  abdominal pain
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="nausea_vomiting_i" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  nausea/vomiting
                </label>
              </div>
            </div>

          </div><!-- row -->
          </div><!--col-md-6-->
          <div class = "col-md-6">
            <h6>Negative for </h6>
            <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" name="diarrhea_i_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    diarrhea
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="appetite_loss_i_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    appetite loss
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="constipation_i_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    constipation
                  </label>
                </div>

              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" name="blood_in_stool_i_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    blood in stool
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="abdominal_pain_i_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    abdominal pain
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="nausea_vomiting_i_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    nausea/vomiting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="hematemesis_i_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    hematemesis
                  </label>
                </div>
              </div>
            </div>
          </div><!-- col-md-6-->
        </div><!-- row this -->
          <div class="form-group" style = "margin-top : 10px">
              <input type="text" name="comments_i" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>

        <h5>Urinary ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" name="fatigue_u" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  fatigue
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="fever_u" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  fever
                </label>
              </div>
            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" name="malaise_u" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  malaise
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" name="sleep_disturbance_u" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  sleep disturbance
                </label>
              </div>
            </div>

          </div><!-- row -->
          </div><!--col-md-6-->
          <div class = "col-md-6">
            <h6>Negative for </h6>
            <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" name="fatigue_u_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    fatigue
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="fever_u_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    fever
                  </label>
                </div>

              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" name="weight_loss_u_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    weight loss
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="sleep_disturbance_u_n" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    sleep disturbance
                  </label>
                </div>
              </div>



            </div>
          </div><!-- col-md-6-->


          </div><!-- row this -->
          <div class="form-group" style = "margin-top : 10px">
            <input type="text" name="comments_u" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
          </div>
          <br>

        <h5>Musculoskeleton ROS</h5>
        <div class = "row">
            <div class = "col-md-6">
              <h6>Positive for </h6>
              <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" name="fatigue_m" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    fatigue
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="fever_m" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    fever
                  </label>
                </div>
              </div><!-- col-md-6 -->
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" name="malaise_m" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    malaise
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" name="sleep_disturbance_m" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    sleep disturbance
                  </label>
                </div>
              </div>

            </div><!-- row -->
            </div><!--col-md-6-->
            <div class = "col-md-6">
              <h6>Negative for </h6>
              <div class = "row">
                <div class = "col-md-5">
                  <div class="form-check">
                    <input class="form-check-input" name="fatigue_m_n" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fatigue
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="fever_m_n" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fever
                    </label>
                  </div>

                </div>
                <div class = "col-md-7">
                  <div class="form-check">
                    <input class="form-check-input" name="weight_loss_m_n" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      weight loss
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" name="sleep_disturbance_m_n" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      sleep disturbance
                    </label>
                  </div>
                </div>



              </div>
            </div><!-- col-md-6-->


            </div><!-- row this -->
            <div class="form-group" style = "margin-top : 10px">
              <input type="text" name="comments_m" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>


        <h5>Neurological ROS</h5>
        <div class = "row">
                <div class = "col-md-6">
                  <h6>Positive for </h6>
                  <div class = "row">
                  <div class = "col-md-5">
                    <div class="form-check">
                      <input class="form-check-input" name="fatigue_n" type="checkbox" value="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        fatigue
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="fever_n" type="checkbox" value="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        fever
                      </label>
                    </div>
                  </div><!-- col-md-6 -->
                  <div class = "col-md-7">
                    <div class="form-check">
                      <input class="form-check-input" name="malaise_n" type="checkbox" value="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        malaise
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" name="sleep_disturbance_n" type="checkbox" value="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        sleep disturbance
                      </label>
                    </div>
                  </div>

                </div><!-- row -->
                </div><!--col-md-6-->
                <div class = "col-md-6">
                  <h6>Negative for </h6>
                  <div class = "row">
                    <div class = "col-md-5">
                      <div class="form-check">
                        <input class="form-check-input" name="fatigue_n_n" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          fatigue
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="fever_n_n" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          fever
                        </label>
                      </div>

                    </div>
                    <div class = "col-md-7">
                      <div class="form-check">
                        <input class="form-check-input" name="weight_loss_n_n" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          weight loss
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" name="sleep_disturbance_n_n" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          sleep disturbance
                        </label>
                      </div>
                    </div>



                  </div>
                </div><!-- col-md-6-->


                </div><!-- row this -->
                <div class="form-group" style = "margin-top : 10px">
                  <input type="text" name="comments_n" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
                </div>
                <br>

        <h5>Dermatological ROS</h5>
        <div class = "row">
                        <div class = "col-md-6">
                          <h6>Positive for </h6>
                          <div class = "row">
                          <div class = "col-md-5">
                            <div class="form-check">
                              <input class="form-check-input" name="fatigue_d" type="checkbox" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                fatigue
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" name="fever_d" type="checkbox" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                fever
                              </label>
                            </div>
                          </div><!-- col-md-6 -->
                          <div class = "col-md-7">
                            <div class="form-check">
                              <input class="form-check-input" name="malaise_d" type="checkbox" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                malaise
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" name="sleep_disturbance_d" type="checkbox" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                sleep disturbance
                              </label>
                            </div>
                          </div>

                        </div><!-- row -->
                        </div><!--col-md-6-->
                        <div class = "col-md-6">
                          <h6>Negative for </h6>
                          <div class = "row">
                            <div class = "col-md-5">
                              <div class="form-check">
                                <input class="form-check-input" name="fatigue_d_n" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  fatigue
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" name="fever_d_n" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  fever
                                </label>
                              </div>

                            </div>
                            <div class = "col-md-7">
                              <div class="form-check">
                                <input class="form-check-input" name="weight_loss_d_n" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  weight loss
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" name="sleep_disturbance_d_n" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  sleep disturbance
                                </label>
                              </div>
                            </div>



                          </div>
                        </div><!-- col-md-6-->


                        </div><!-- row this -->
                        <div class="form-group" style = "margin-top : 10px">
                          <input type="text" name="comments_d" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
                        </div>
                        <br>


      </div><!--ros-->
      <div id= "exam" role="tabpanel" class = "container tab-pane fade" style="border:1px solid #cecece;"><br>
        <h5>General</h5>
            <div class = "row">
              <div class = "col-md-4">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                      no distress
                    </label>
                  </div>
                </div><!-- col-md-6 -->
                <div class = "col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      well nourished
                    </label>
                  </div>
                </div>
                <div class = "col-md-4">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      well developed
                    </label>
                  </div>
                </div>
              </div><!-- row -->
          <br>

        <h5>HEENT</h5>
            <div class = "row">
              <div class = "col-md-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    normocephalic/autramatic
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    normocephalic/autramatic
                  </label>
                </div>
              </div><!-- col-md-6 -->
              <div class = "col-md-6">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    normocephalic/autramatic
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    normocephalic/autramatic
                  </label>
                </div>
              </div>
            </div><!-- row -->
          <br>

        <h5>Eyes</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

        <h5>Neck</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

        <h5>Respiratory</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

        <h5>Cardiovascular</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

        <h5>Abdomen</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

        <h5>Genetourinary</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

        <h5>Lymph</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

        <h5>Skin</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

        <h5>Musculoskeleton</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

        <h5>Neurology</h5>
        <div class = "row">
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div><!-- col-md-6 -->
          <div class = "col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
              <label class="form-check-label" for="defaultCheck1">
                normocephalic/autramatic
              </label>
            </div>
          </div>
        </div><!-- row -->
        <br>

          <div class="form-group">
            <label for="exampleFormControlTextarea1">Assessment</label>
            <textarea class="form-control" id="exampleFormControlTextarea1" rows = "3"></textarea>
          </div>

          <footer>
      <div class="shadow p-3 mb-1 bg-red rounded actions">
        <div class="center-btn" align="center">
          <a href="<?php echo url_for('/staff/index.php'); ?>"><input class="action btn btn-danger" type="submit" value="Exam Done"></input></a>
        </div>
      </div>
    </footer>


      </div><!--exam-->
    </div><!--tab-content-->
</form>
  </div>
  </div><!--container-->
</body>
</html>
