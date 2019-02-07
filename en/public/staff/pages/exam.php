<?php require_once('../../../private/initialize.php');
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /en/public");
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
    $neurology_exam = $musculoskeleton_exam = $skin_exam = $genitourinary_exam = $lymph_exam = $abdomen_exam = $cardiovascular_exam = $respiratory_exam = $eyes_exam = $neck_exam = $ent_exam = $general_exam = $general_ros_positive = $general_ros_comments = $ophthalmic_ros_positive = $ophthalmic_ros_comments = $ent_ros_positive = $ent_ros_comments = $respiratory_ros_positive = $respiratory_ros_comments
    = $cardiovascular_ros_positive = $cardiovascular_ros_comments = $gastrointestinal_ros_positive = $gastrointestinal_ros_comments = $urinary_ros_positive = $urinary_ros_comments = $musculoskeletal_ros_positive = $musculoskeletal_ros_comments = $neurological_ros_positive = $neurological_ros_comments = $dermatological_ros_positive = $dermatological_ros_comments = "";

    if(isset($_POST['neur_aao'])) $neurology_exam .= "AAO, ";
    if(isset($_POST['neur_cn_ii'])) $neurology_exam .= "CN II-XII grossly intact, ";
    if(isset($_POST['neur_dtrs'])) $neurology_exam .= "DTRs 2+, ";
    if(isset($_POST['neur_normal_gait'])) $neurology_exam .= "normal gait, ";

    if(isset($_POST['musc_full_range'])) $musculoskeleton_exam .= "full range of motion in all joints, ";
    if(isset($_POST['musc_no_swelling_tenderness'])) $musculoskeleton_exam .= "no swelling or tenderness, ";
    if(isset($_POST['musc_normal_strength'])) $musculoskeleton_exam .= "normal strength, ";

    if(isset($_POST['skin_good_turgor'])) $skin_exam .= "good turgor, ";
    if(isset($_POST['skin_no_rashes'])) $skin_exam .= "no rashes, ";
    if(isset($_POST['skin_no_unusual_bruising'])) $skin_exam .= "no unusual bruising, ";
    if(isset($_POST['skin_no_prom_lesions'])) $skin_exam .= "no prominent lesions, ";

    if(isset($_POST['geni_normal_genitalia'])) $genitourinary_exam .= "normal genitalia, ";
    if(isset($_POST['geni_descended_testicles'])) $genitourinary_exam .= "descended testicles, ";
    if(isset($_POST['geni_circumcised'])) $genitourinary_exam .= "circumcised, ";
    if(isset($_POST['geni_non_circumcised'])) $genitourinary_exam .= "non-circumcised, ";
    if(isset($_POST['geni_no_vaginal_discharge_tears'])) $genitourinary_exam .= "no vaginal discharge or tears, ";
    if(isset($_POST['geni_labical_adhesions'])) $genitourinary_exam .= "no labical adhesions, ";

    if(isset($_POST['lymph_nodes'])) $lymph_exam = "no lymph nodes palpable";

    if(isset($_POST['ab_soft'])) $abdomen_exam .= "soft, ";
    if(isset($_POST['ab_bowel_sounds'])) $abdomen_exam .= "no increased effort, ";
    if(isset($_POST['resp_normal_sitting'])) $abdomen_exam .= "normal sitting position, ";

    if(isset($_POST['cardio_rrr'])) $cardiovascular_exam .= "RRR, ";
    if(isset($_POST['cardio_s1s2'])) $cardiovascular_exam .= "S1S2, ";
    if(isset($_POST['cardio_no_murmur'])) $cardiovascular_exam .= "No murmur, ";

    if(isset($_POST['resp_clear_breath'])) $respiratory_exam .= "clear breath sounds bilaterally, ";
    if(isset($_POST['resp_no_increased_effort'])) $respiratory_exam .= "no increased effort, ";
    if(isset($_POST['resp_normal_sitting'])) $respiratory_exam .= "normal sitting position, ";

    if(isset($_POST['eyes_conjunctivae_clear'])) $eyes_exam .= "conjunctivae clear bilaterally, ";
    if(isset($_POST['eyes_equal_pupil_size'])) $eyes_exam .= "equal pupil size, ";
    if(isset($_POST['eyes_reactive_pupils'])) $eyes_exam .= "reactive pupils, ";
    if(isset($_POST['eyes_normal_eye_movement'])) $eyes_exam .= "normal eye movement, ";

    if(isset($_POST['neck_full_range'])) $neck_exam .= "full range of motion, ";
    if(isset($_POST['neck_supple'])) $neck_exam .= "supple, ";

    if(isset($_POST['hent_no_distress'])) $ent_exam .= "normocephalic/atraumatic, ";
    if(isset($_POST['hent_tympanic_membranes'])) $ent_exam .= "tmpanic membranes clear bilaterally, ";
    if(isset($_POST['hent_oropharynx_clear'])) $ent_exam .= "oropharynx clear, ";
    if(isset($_POST['hent_moist_mucous_membranes'])) $ent_exam .= "moist mucous membranes, ";

    if(isset($_POST['gen_no_distress'])) $general_exam .= "no distress, ";
    if(isset($_POST['gen_well_developed'])) $general_exam .= "well-developed, ";
    if(isset($_POST['gen_well_nourished'])) $general_exam .= "well-nourished, ";

    if(isset($_POST['fatigue_g'])) $general_ros_positive .= "fatigue, ";
    if(isset($_POST['fever_g'])) $general_ros_positive .= "fever, ";
    if(isset($_POST['malaise_g'])) $general_ros_positive .= "malaise, ";
    if(isset($_POST['sleep_disturbance_g'])) $general_ros_positive .= "sleep disturbance, ";

    if(isset($_POST['comments_g'])) $general_ros_comments .= $_POST['comments_g'];

    if(isset($_POST['eye_pain_o'])) $ophthalmic_ros_positive .= "eye pain, ";
    if(isset($_POST['blurry_vision_o'])) $ophthalmic_ros_positive .= "blurry vision, ";
    if(isset($_POST['itchy_eyes_o'])) $ophthalmic_ros_positive .= "itchy eyes, ";
    if(isset($_POST['excessive_tears_o'])) $ophthalmic_ros_positive .= "excessive tearing, ";

    if(isset($_POST['comments_o'])) $ophthalmic_ros_comments .= $_POST['comments_o'];

    if(isset($_POST['sneezing_e'])) $ent_ros_positive .= "sneezing, ";
    if(isset($_POST['sore_throat_e'])) $ent_ros_positive .= "sore throat, ";
    if(isset($_POST['rhinorrhea_e'])) $ent_ros_positive .= "rhinorrhea, ";
    if(isset($_POST['oral_lesions_e'])) $ent_ros_positive .= "oral lesions, ";
    if(isset($_POST['ear_infections_e'])) $ent_ros_positive .= "freq. ear infections, ";
    if(isset($_POST['nasal_congestion_e'])) $ent_ros_positive .= "nasal congestion, ";

    if(isset($_POST['comments_e'])) $ent_ros_comments .= $_POST['comments_e'];

    if(isset($_POST['cough_r'])) $respiratory_ros_positive .= "cough, ";
    if(isset($_POST['wheezing_r'])) $respiratory_ros_positive .= "wheezing, ";
    if(isset($_POST['short_of_breath_r'])) $respiratory_ros_positive .= "shortness of breath, ";

    if(isset($_POST['comments_r'])) $respiratory_ros_comments .= $_POST['comments_r'];

    if(isset($_POST['chest_pain_c'])) $cardiovascular_ros_positive .= "chest pain, ";
    if(isset($_POST['rapid_heart_rate_c'])) $cardiovascular_ros_positive .= "rapid heart rate, ";

    if(isset($_POST['comments_c'])) $cardiovascular_ros_comments .= $_POST['comments_c'];

    if(isset($_POST['diarrhea_i'])) $gastrointestinal_ros_positive .= "diarrhea, ";
    if(isset($_POST['appetite_loss_i'])) $gastrointestinal_ros_positive .= "appetite loss, ";
    if(isset($_POST['constipation_i'])) $gastrointestinal_ros_positive .= "constipation, ";
    if(isset($_POST['blood_in_stool_i'])) $gastrointestinal_ros_positive .= "blood in stool, ";
    if(isset($_POST['abdominal_pain_i'])) $gastrointestinal_ros_positive .= "abdominal pain, ";
    if(isset($_POST['nausea_vomiting_i'])) $gastrointestinal_ros_positive .= "nausea/vomiting, ";
    if(isset($_POST['hematemesis_i'])) $gastrointestinal_ros_positive .= "hematemesis, ";

    if(isset($_POST['comments_i'])) $gastrointestinal_ros_comments .= $_POST['comments_i'];

    if(isset($_POST['painful_burning_urination_u'])) $urinary_ros_positive .= "painful/burning urination, ";
    if(isset($_POST['difficulty_urinating_u'])) $urinary_ros_positive .= "difficulty urinating, ";
    if(isset($_POST['loss_of_bladder_control_u'])) $urinary_ros_positive .= "loss of bladder control, ";
    if(isset($_POST['cloudy_urine_u'])) $urinary_ros_positive .= "cloudy urine, ";
    if(isset($_POST['blood_in_urine_u'])) $urinary_ros_positive .= "blood in urine, ";
    if(isset($_POST['history_of_stds_u'])) $urinary_ros_positive .= "history of STDs, ";

    if(isset($_POST['comments_u'])) $urinary_ros_comments .= $_POST['comments_u'];

    if(isset($_POST['swelling_m'])) $musculoskeletal_ros_positive .= "swelling, ";
    if(isset($_POST['erythema_m'])) $musculoskeletal_ros_positive .= "erythema (redness), ";
    if(isset($_POST['heat_m'])) $musculoskeletal_ros_positive .= "calor (heat), ";
    if(isset($_POST['muscle_pain_m'])) $musculoskeletal_ros_positive .= "muscle pain, ";
    if(isset($_POST['joint_pain_m'])) $musculoskeletal_ros_positive .= "joint pain, ";
    if(isset($_POST['bone_pain_m'])) $musculoskeletal_ros_positive .= "bone pain, ";

    if(isset($_POST['comments_m'])) $musculoskeletal_ros_comments .= $_POST['comments_m'];

    if(isset($_POST['headache_n'])) $neurological_ros_positive .= "headaches, ";
    if(isset($_POST['dizziness_n'])) $neurological_ros_positive .= "dizziness, ";
    if(isset($_POST['seizures_n'])) $neurological_ros_positive .= "seizures, ";
    if(isset($_POST['fatigue_n'])) $neurological_ros_positive .= "fatigue, ";

    if(isset($_POST['comments_n'])) $neurological_ros_comments .= $_POST['comments_n'];

    if(isset($_POST['rash_d'])) $dermatological_ros_positive .= "rash, ";
    if(isset($_POST['redness_d'])) $dermatological_ros_positive .= "redness, ";
    if(isset($_POST['itchiness_d'])) $dermatological_ros_positive .= "itchiness, ";
    if(isset($_POST['lesions_d'])) $dermatological_ros_positive .= "lesions, ";
    if(isset($_POST['sores_d'])) $dermatological_ros_positive .= "sores, ";
    if(isset($_POST['discoloration_d'])) $dermatological_ros_positive .= "discoloration, ";

    if(isset($_POST['comments_d'])) $dermatological_ros_comments .= $_POST['comments_d'];

    $assessment = $_POST['assessment'];

    insert_pexam($_GET['id'], $assessment, $neurology_exam, $musculoskeleton_exam, $skin_exam, $genitourinary_exam, $lymph_exam, $abdomen_exam, $cardiovascular_exam, $respiratory_exam, $eyes_exam, $neck_exam, $ent_exam, $general_exam, $general_ros_positive, $general_ros_comments, $ophthalmic_ros_positive, $ophthalmic_ros_comments, $ent_ros_positive, $ent_ros_comments, $respiratory_ros_positive, $respiratory_ros_comments,
    $cardiovascular_ros_positive, $cardiovascular_ros_comments, $gastrointestinal_ros_positive, $gastrointestinal_ros_comments, $urinary_ros_positive, $urinary_ros_comments, $musculoskeletal_ros_positive, $musculoskeletal_ros_comments, $neurological_ros_positive, $neurological_ros_comments, $dermatological_ros_positive, $dermatological_ros_comments);
    update_patient_status("exam", $_GET['id']);
    header("Location: /en/public/staff/index.php");
  }
?>
  <div class="container-fluid" <div class="col-sm-12">
    <ul class="nav nav-tabs border-bottom-0" role="tablist">
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#history">History</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#vitals">Vitals Report</a>
      </li>
      <li class="nav-item">
        <a class="nav-link active" data-toggle="tab" href="#ros">ROS</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-toggle="tab" href="#exam">Exam</a>
      </li>
    </ul>

    <form method="post">
      <div class="tab-content bg-white border">
        <div id="history" role="tabpanel" class="container tab-pane fade">
          <br>
          <div class="form-group mb-4">
            <h6 class="strong">Immunizations</h6>
            <textarea readonly class="form-control plaintext" name="immunization_history" id="exampleFormControlTextarea1" placeholder="N/A" rows="4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['immunizations']?></textarea>
          </div>
          <div class="form-group mb-4">
            <h6 class="strong">Allergies</h6>
            <textarea readonly class="form-control plaintext" name="allergy_history" id="exampleFormControlTextarea1"  placeholder="N/A" rows="4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['allergies']?></textarea>
          </div>
          <div class="form-group mb-4">
            <h6 class="strong">Past Diseases</h6>
            <textarea readonly class="form-control plaintext" name="past_diseases" id="exampleFormControlTextarea1"  placeholder="N/A" rows="4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['past_diseases']?></textarea>
          </div>
        </div><!-- end of history -->
        <div id="vitals" role="tabpanel" class="container tab-pane fade"><br>
          <div class="row">
            <div class="col-sm-4">
              <h6 class="strong">Body Temperature</h6>
                  <div class="form-group form-inline">
                    <input type="text" name="body_temp" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['body_temp']?>">
                    <label for="input" class="col-sm-2 col-form-label">°C</label>
                  </div>
              </div>
              <div class="col-sm-4">
                <h6 class="strong">Weight</h6>
                    <div class="form-group form-inline">
                      <input type="text" name="weight" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['weight']?>">
                      <label for="input" class="col-form-label ml-1">kg</label>
                    </div>
                </div>
              <div class="col-sm-4">
                <h6 class="strong">Height</h6>
                    <div class="form-group form-inline">
                      <input type="text" name="height" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['height']?>">
                      <label for="input" class="col-form-label ml-1">cm</label>
                    </div>
                </div>
              </div> <!-- end row -->
              <div class="row mb-4">
                <div class="col-sm-4">
                  <h6 class="strong">Respiratory Rate</h6>
                      <div class="form-group form-inline">
                        <input type="text" name="rr" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['rr']?>">
                        <label for="input" class="col-form-label ml-1">breaths</label>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <h6 class="strong">Blood Pressure</h6>
                        <div class="form-group form-inline">
                          <input type="text" name="bp" readonly class="form-control plaintext col-sm-6" id="inputPassword" placeholder="___ / __" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['bp']?>">
                          <label for="input" class="col-form-label ml-1">mm Hg</label>
                        </div>
                    </div>
                  <div class="col-sm-4">
                    <h6 class="strong">Pulse</h6>
                        <div class="form-group form-inline">
                          <input type="text" name="pulse" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['pulse']?>">
                          <label for="input" class=" col-form-label ml-1">bpm</label>
                        </div>
                    </div>
                  </div> <!-- end row -->

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <h6 class="strong">Any problem(s)?</h6>
                        <textarea readonly class="form-control plaintext" name="problem" id="exampleFormControlTextarea1" rows="3"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['problem']?></textarea>
                    </div>
                  </div> <!-- end row -->
                  <div class="form-group row mb-5">
                    <div class="col-sm-12">
                      <h6 class="strong mb-0">For how long have the problems been happening? (ex. 3 months)</h6>
                          <small class="text-muted" style="font-size:0.75rem;">For example, "3 months" or "1 year".</small>
                        <input type="text" name="length_of_problem" readonly class="form-control plaintext" id="inputPassword" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['length_of_problem']?>">
                    </div>
                  </div> <!-- end row -->

                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <h6 class="strong">Has the patient recieved any treatment?</h6>
                      <div class="form-check pl-0">
                        <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                            <input class="form-check-input" type="radio" onclick="{radio1()}" name="gridRadios" id="gridRadios"
                            <?php
                            if(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['any_treatment'] == "Yes"){
                              echo "checked";
                            }
                            ?>
                            disabled>
                            Yes
                        </label>
                        <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                            <input class="form-check-input" type="radio" onclick="{radio2()}" name="gridRadios1" id="gridRadios1"
                            <?php
                            if(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['any_treatment'] == "No"){
                              echo "checked";
                            }
                            ?>
                            disabled>
                            No
                        </label>
                      </div>
                    </div>
                  </div> <!-- end row -->

                  <div class="row mb-3">
                    <div class="col-sm-12">
                      <h6 class="strong mb-0">If yes, what is the current treatment(s)?</h6>
                      <small class="text-muted" style="font-size:0.75rem;">If none, write "N/A" or "No current treatment".</small>
                      <div class="form-check pl-0">
                        <textarea readonly class="form-control plaintext" name="current_treatment" class="form-control" id="inputPassword" rows="2"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['current_treatment']?></textarea>
                      </div>
                    </div>
                  </div> <!-- end row -->

                  <div class="row mb-4">
                    <div class="col-sm-12">
                      <h6 class="strong">Is the current treatment(s) helpful at all?</h6>
                      <div class="form-check pl-0">
                        <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                            <input class="form-check-input" type="radio" onclick="{radio3()}" name="gridRadios2" id="gridRadios2"
                            <?php
                            if(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['treatment_helpful'] == "Yes"){
                              echo "checked";
                            }
                            ?>
                            disabled>
                            Yes
                        </label>
                        <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                            <input class="form-check-input" type="radio" onclick="{radio4()}" name="gridRadios3" id="gridRadios3"
                            <?php
                            if(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['treatment_helpful'] == "No"){
                              echo "checked";
                            }
                            ?>
                            disabled>
                            No
                        </label>
                        <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                            <input class="form-check-input" type="radio" onclick="{radio5()}" name="gridRadios4" id="gridRadios4"
                            <?php
                            if(get_pinfo_by_uid(get_uid_by_id($_GET['id']))['treatment_helpful'] == "No current treatment"){
                              echo "checked";
                            }
                            ?>
                            disabled>
                            No current treatment
                        </label>
                      </div>
                    </div>
                  </div> <!-- end row -->
              </div><!--vitals-->

        <div id="ros" role="tabpanel" class="container tab-pane active">
          <br>
          <h6 class="strong">General ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="fatigue_g" id="jevattend_id" value="1"/>
                Fatigue
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="fever_g" id="jevattend_id" value="1"/>
                Fever
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="malaise_g" id="jevattend_id" value="1"/>
                Malaise
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="sleep_disturbance_g" id="jevattend_id" value="1"/>
                Sleep disturbance
              </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_g" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->

          <h6 class="strong">Ophthalmic ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="eye_pain_o">
                Eye pain
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="sitchy_eyes_o">
                Itchy eyes
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="blurry_vision_o">
                Blurry vision
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="excessive_tears_o">
                Excessive tearing
              </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_o" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->

          <h6 class="strong">Ears, Nose, Mouth, Throat ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="sneezing_e">
                Sneezing
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="sore_throat_e">
                Sore throat
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="rhinorrhea_e">
                Rhinorrhea
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="ear_infections_e">
                Frequent ear infections
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="nasal_congestion_e">
                Nasal congestion
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="oral_lesions_e">
                Oral lesions
              </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_e" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->

          <h6 class="strong">Respiratory ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="cough_r">
                Cough
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="wheezing_r">
                Weezing
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="short_of_breath_r">
                Short of breath
              </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_r" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->

          <h6 class="strong">Cardiovascular ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="chest_pain_c">
                Chest pain
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="rapid_heart_rate_c">
                Rapid heart rate
              </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_c" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->

          <h6 class="strong">Gastrointestinal ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="diarrhea_i">
                Diarrhea
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="appetite_loss_i">
                Appetite loss
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="constipation_i">
                Constipation
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="blood_in_stool_i">
                Blood in stool
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="abdominal_pain_i">
                Abdominal pain
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="nausea_vomiting_i">
                Nausea/Vomiting
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="hematemesis_i">
                Hematemesis
            </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_i" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->

          <h6 class="strong">Urinary ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="painful_burning_urination_u">
                Painful/Burning urination
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="difficulty_urinating_u">
                Difficulty urinating
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="loss_of_bladder_control_u">
                Loss of bladder control
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="cloudy_urine_u">
                Cloudy urine
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="blood_in_urine_u">
                Blood in urine
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="history_of_stds_u">
                History of STDs
              </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_u" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->

          <h6 class="strong">Musculoskeletal ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="swelling_m">
                Swelling
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="erythema_m">
                Erythema (Redness)
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="heat_m">
                Calor (Heat)
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="muscle_pain_m">
                Muscle pain
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="joint_pain_m">
                Joint pain
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="bone_pain_m">
                Bone pain
            </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_m" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->

          <h6 class="strong">Neurological ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="headache_n">
                Headache
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="dizziness_n">
                Dizziness
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="seizures_n">
                Seizures
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="fatigue_n">
                Fatigue
            </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_n" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->

          <h6 class="strong">Dermatological ROS</h6>
          <div class="row mb-3">
            <div class="col">
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="rash_d">
                Rash
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="redness_d">
                Redness
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="itchiness_d">
                Itchiness
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="lesions_d">
                Lesions
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="sores_d">
                Sores
            </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="discoloration_d">
                Discoloration
            </label>
            </div>
            <!-- end col-->
            <div class="col">
              <textarea class="form-control w-100" name="comments_d" id="exampleFormControlTextarea1" rows="5" placeholder="Comments"></textarea>
            </div>
            <!-- end col-->
          </div>
          <!-- end row-->
        </div>
        <!--end of ROS tab-->

        <div id="exam" role="tabpanel" class="container tab-pane fade">
          <br>
          <div class="row mb-3">
            <div class="col">
              <h6 class="strong">General</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="gen_no_distress">
                  No distress
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="gen_well_developed">
                  Well-developed
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="gen_well_nourished">
                  Well-nourished
                </label>
            </div>
            <!-- end col -->
            <div class="col">
              <h6 class="strong">Head, Ears, Nose, Throat</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="hent_no_distress">
                  Normocephalic/atraumatic
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="hent_tympanic_membranes">
                  Tympanic membrane's clear bilaterally
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="hent_oropharynx_clear">
                  Oropharynx clear
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="hent_moist_mucous_membranes">
                  Moist mucous membranes
                </label>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row mb-3">
            <div class="col">
              <h6 class="strong">Eyes</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="eyes_conjunctivae_clear">
                  Conjunctivae clear bilaterally
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="eyes_equal_pupil_size">
                  Equal pupil size
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="eyes_reactive_pupils">
                  Reactive pupils
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="eyes_normal_eye_movement">
                  Normal eye movement
                </label>
            </div>
            <!-- end col -->
            <div class="col">
              <h6 class="strong">Neck</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="neck_full_range">
                  Full range of motion
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="neck_supple">
                  Supple
                </label>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row mb-3">
            <div class="col">
              <h6 class="strong">Respiratory</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="resp_clear_breath">
                  Clear breath sounds bilaterally
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="resp_no_increased_effort">
                  No increased effort
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="resp_normal_sitting">
                  Normal sitting position
                </label>
            </div>
            <!-- end col -->
            <div class="col">
              <h6 class="strong">Cardiovascular</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="cardio_rrr">
                  RRR
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="cardio_s1s2">
                  S1S2
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="cardio_no_murmur">
                  No murmur
                </label>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row mb-3">
            <div class="col">
              <h6 class="strong">Abdomen</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="ab_soft">
                  Soft
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="ab_bowel_sounds">
                  No increased effort
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="resp_normal_sitting">
                  Normal sitting position
                </label>
            </div>
            <!-- end col -->
            <div class="col">
              <h6 class="strong">Genitourinary</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="geni_normal_genitalia">
                  Normal Genitalia
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="geni_descended_testicles">
                  (Male) Descended testicles
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="geni_circumcised">
                  (Male) Circumcised
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="geni_non_circumcised">
                  (Male) Non-Circumcised
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="geni_no_vaginal_discharge_tears">
                (Female) No vaginal discharge or tears
              </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                <input class="form-check-input" type="checkbox" name="geni_labical_adhesions">
                (Female) No labical adhesions
              </label>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row mb-3">
            <div class="col">
              <h6 class="strong">Lymph</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="lymph_nodes">
                  No lymph nodes palpable
                </label>
            </div>
            <!-- end col -->
            <div class="col">
              <h6 class="strong">Skin</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="skin_good_turgor">
                  Good turgor
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="skin_no_rashes">
                  No rashes
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="skin_no_unusual_bruising">
                  No unusual bruising
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="skin_no_prom_lesions">
                  No prominent lesions
                </label>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row mb-3">
            <div class="col">
              <h6 class="strong">Musculoskeletal</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="musc_full_range">
                  Full range of motion in all joints
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="musc_no_swelling_tenderness">
                  No swelling or tenderness
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="musc_normal_strength">
                  Normal strength
                </label>
            </div>
            <!-- end col -->
            <div class="col">
              <h6 class="strong">Neurology</h6>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="neur_aao">
                  AAO
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="neur_cn_ii">
                  CN II-XII grossly intact
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="neur_dtrs">
                  DTRs 2+
                </label>
                <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                  <input class="form-check-input" type="checkbox" name="neur_normal_gait">
                  Normal gait
                </label>
            </div>
            <!-- end col -->
          </div>
          <!-- end row -->

          <div class="row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Assessment</h6>
              <div class="form-check pl-0">
                <textarea class="form-control" name="assessment" class="form-control" id="assessment" rows="3"></textarea>
              </div>
            </div>
          </div>
          <!-- end row -->

          <div class="center-btn py-3 my-4" align="center">
            <button class="action btn btn-danger shadow" type="submit">Exam Completed<i class="fa fa-check ml-1" aria-hidden="true"></i></button>
          </div>


        </div>
        <!-- end of exam tab-->
      </div>
      <!--end of tab-content-->
    </form>
  </div>
  <!-- end of container-fluid -->

  </body>

  </html>
