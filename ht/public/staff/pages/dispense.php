<?php require_once('../../../private/initialize.php');
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /ht/public");
}
?>


<?php include(SHARED_PATH . '/pInfo_header.php'); ?>
<?php
  if(is_post_request()){
    update_patient_status("dispense", $_GET['id']);
    increment_total_seen();
    header("Location: /ht/public/staff/index.php");
  }
?>
<form method="post">
  <div class="container-fluid">
    <div class="col-sm-12">
      <ul class="nav nav-tabs border-bottom-0" role="tablist">
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#history">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#vitals">Vitals</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#ros">ROS and Exam</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#prescription">Prescription</a>
        </li>
      </ul>

      <div class="tab-content bg-white border">
        <div id="vitals" role="tabpanel" class="container tab-pane fade"><br>
          <div class="row">
            <div class="col-sm-4">
              <h6 class="strong">Body Temperature</h6>
                  <div class="form-group form-inline">
                    <input type="text" name="body_temp" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['body_temp']?>">
                    <label for="input" class="col-sm-2 col-form-label">°C</label>
                  </div>
              </div>
              <div class="col-sm-4">
                <h6 class="strong">Weight</h6>
                    <div class="form-group form-inline">
                      <input type="text" name="weight" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['weight']?>">
                      <label for="input" class="col-form-label ml-1">kg</label>
                    </div>
                </div>
              <div class="col-sm-4">
                <h6 class="strong">Height</h6>
                    <div class="form-group form-inline">
                      <input type="text" name="height" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['height']?>">
                      <label for="input" class="col-form-label ml-1">cm</label>
                    </div>
                </div>
              </div> <!-- end row -->
              <div class="row mb-4">
                <div class="col-sm-4">
                  <h6 class="strong">Respiratory Rate</h6>
                      <div class="form-group form-inline">
                        <input type="text" name="rr" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['rr']?>">
                        <label for="input" class="col-form-label ml-1">breaths</label>
                      </div>
                  </div>
                  <div class="col-sm-4">
                    <h6 class="strong">Blood Pressure</h6>
                        <div class="form-group form-inline">
                          <input type="text" name="bp" readonly class="form-control plaintext col-sm-6" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['bp']?>">
                          <label for="input" class="col-form-label ml-1">mm Hg</label>
                        </div>
                    </div>
                  <div class="col-sm-4">
                    <h6 class="strong">Pulse</h6>
                        <div class="form-group form-inline">
                          <input type="text" name="pulse" readonly class="form-control plaintext col-sm-5" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['pulse']?>">
                          <label for="input" class=" col-form-label ml-1">bpm</label>
                        </div>
                    </div>
                  </div> <!-- end row -->

                  <div class="form-group row">
                    <div class="col-sm-12">
                      <h6 class="strong">Any problem(s)?</h6>
                        <textarea readonly class="form-control plaintext" name="problem" id="exampleFormControlTextarea1" rows="3" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['problem']?></textarea>
                    </div>
                  </div> <!-- end row -->
                  <div class="form-group row mb-5">
                    <div class="col-sm-12">
                      <h6 class="strong mb-0">For how long have the problems been happening? (ex. 3 months)</h6>
                          <small class="text-muted" style="font-size:0.75rem;">For example, "3 months" or "1 year".</small>
                        <input type="text" name="length_of_problem" readonly class="form-control plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['length_of_problem']?>">
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
                        <textarea readonly class="form-control plaintext" name="current_treatment" class="form-control" id="inputPassword" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['current_treatment']?></textarea>
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
        <!-- end of vitals-->
        <div id="history" role="tabpanel" class="container tab-pane fade"><br>
          <div class="form-group mb-4">
            <h6 class="strong">Immunizations</h6>
            <textarea readonly class="form-control plaintext" name="immunization_history" id="exampleFormControlTextarea1" placeholder="N/A" rows="4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['immunizations']?></textarea>
          </div>
          <div class="form-group mb-4">
            <h6 class="strong">Allergies</h6>
            <textarea readonly class="form-control plaintext" name="allergy_history" id="exampleFormControlTextarea1" placeholder="N/A" rows="4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['allergies']?></textarea>
          </div>
          <div class="form-group mb-4">
            <h6 class="strong">Past Diseases</h6>
            <textarea readonly class="form-control plaintext" name="past_diseases" id="exampleFormControlTextarea1" placeholder="N/A" rows="4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['past_diseases']?></textarea>
          </div>
        </div>
        <!-- end of history -->
        <div id="ros" role="tabpanel" class="container tab-pane fade">
          <br>
          <h4>ROS Report</h4>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">General ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['general_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['general_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Opthalmic ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ophthalmic_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ophthalmic_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Ears, Nose, Mouth, Throat ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ent_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ent_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Respiratory ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['respiratory_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['respiratory_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Cardiovascular ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['cardiovascular_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['cardiovascular_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Gastrointestinal ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['gastrointestinal_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['gastrointestinal_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Urinary ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['urinary_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['urinary_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Musculoskeletal ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['musculoskeleton_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['musculoskeleton_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Neurological ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['neurological_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['neurological_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-5">
            <div class="col-sm-12">
              <h6 class="strong mb-0">Dermatological ROS</h6>
              <small class="text-muted" style="font-size:0.75rem;">Positive for</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['dermatological_ros_positive']?></textarea>
              <small class="text-muted" style="font-size:0.75rem;">Comments</small>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['dermatological_ros_comments']?></textarea>
            </div>
          </div>
          <!-- end row -->

          <h4>Exam Report</h4>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">General</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['general_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Head, Ears, Nose, Throat</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ent_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Eyes</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['eyes_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Neck</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['neck_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Respiratory</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['respiratory_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Cardiovascular</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['cardiovascular_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Abdomen</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['abdomen_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Genitourinary</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['genitourinary_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Lymph</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['lymph_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Skin</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['skin_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Musculoskeletal</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['musculoskeleton_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Neurology</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="2" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['neurology_exam']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-4">
            <div class="col-sm-12">
              <h6 class="strong">Assessment</h6>
              <textarea type="text" name="length_of_problem" readonly class="form-control plaintext" rows="3" placeholder="N/A"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['assessment']?></textarea>
            </div>
          </div>
          <div class="form-group row mb-5">
            <div class="col-sm-6">
              <h6 class="strong mb-0">Doctor's Signature</h6>
                <input type="text" name="doctorsignature" readonly class="form-control plaintext" placeholder="N/A" id="signature" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['doc_sig']?>">
            </div>
          </div>
        </div>
        <!-- end of ROS/Exam tab -->

        <div id="prescription" role="tabpanel" class="container tab-pane active"><br>
          <div class="form-group row mb-5">
            <div class="col-sm-12">
              <h6 class="strong">Treatment Plan</h6>
              <textarea readonly class="form-control plaintext" name="problem" id="exampleFormControlTextarea1" rows="4"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['treatment_plan']?></textarea>
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row mb-2">
            <div class="col-sm-6 border p-3">
              <h5 class="text-center">Drug #1</h5>
              <h6 class="strong">Name</h6>
              <input type="text" name="drug1_name" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug1_name']?>">
              <h6 class="strong">Dosage</h6>
              <input type="text" name="drug1_dosage" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug1_dosage']?>">
              <h6 class="strong">Quantity</h6>
              <input type="text" name="drug1_quantity" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug1_quantity']?>">
            </div>
            <div class="col-sm-6 border p-3">
              <h5 class="text-center">Drug #2</h5>
              <h6 class="strong">Name</h6>
              <input type="text" name="drug2_name" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug2_name']?>">
              <h6 class="strong">Dosage</h6>
              <input type="text" name="drug2_dosage" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug2_dosage']?>">
              <h6 class="strong">Quantity</h6>
              <input type="text" name="drug2_quantity" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug2_quantity']?>">
            </div>
          </div>
          <!-- end row -->
          <div class="form-group row">
            <div class="col-sm-6 border p-3">
              <h5 class="text-center">Drug #3</h5>
              <h6 class="strong">Name</h6>
              <input type="text" name="drug3_name" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug3_name']?>">
              <h6 class="strong">Dosage</h6>
              <input type="text" name="drug3_dosage" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug3_dosage']?>">
              <h6 class="strong">Quantity</h6>
              <input type="text" name="drug3_quantity" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug3_quantity']?>">
            </div>
            <div class="col-sm-6 border p-3">
              <h5 class="text-center">Drug #4</h5>
              <h6 class="strong">Name</h6>
              <input type="text" name="drug4_name" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug4_name']?>">
              <h6 class="strong">Dosage</h6>
              <input type="text" name="drug4_dosage" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug4_dosage']?>">
              <h6 class="strong">Quantity</h6>
              <input type="text" name="drug4_quantity" readonly class="form-control plaintext mb-1" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug4_quantity']?>">
            </div>
          </div><!-- end row -->
          <div class="form-group row mb-5">
            <div class="col-sm-6">
              <h6 class="strong mb-0">Doctor's Signature</h6>
                <input type="text" readonly name="doctorsignature" class="form-control plaintext" id="signature" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['doc_sig_2']?>">
            </div>
          </div>

  <div class="center-btn py-3 my-4" align="center">
    <button class="action btn btn-danger shadow" type="submit">Medicine Dispensed<i class="fa fa-check ml-1" aria-hidden="true"></i></button>
  </div>
  </form>
  </div>
</div><!-- end of tab-content-->
</div><!--container-->
</body>
</html>
