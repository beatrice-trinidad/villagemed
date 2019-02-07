<?php require_once('../../../private/initialize.php');
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /en/public");
}
?>
<?php include(SHARED_PATH . '/pInfo_header.php'); ?>
<?php
  if(is_post_request()){
    insert_pvitals($_GET['id'], $_POST['recieved_treatment'], $_POST['current_treatment_helpful']);
    update_patient_status("vitals", $_GET['id']);
    header("Location: /en/public/staff/index.php");
  }
?>

  <div class="container-fluid">
    <div class="col-sm-12">
      <ul class="nav nav-tabs border-bottom-0" role="tablist">
        <li class="nav-item">
          <a class="nav-link active" data-toggle="tab" href="#history">History</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" data-toggle="tab" href="#vitals">Vitals</a>
        </li>
      </ul>

      <form method="post">
        <div class="tab-content bg-white border">

          <div id="history" class=" container tab-pane active">
            <br>
            <div class="form-group mb-4">
              <h6 class="strong">Immunizations</h6>
              <textarea class="form-control" name="immunization_history" id="exampleFormControlTextarea1" rows="4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['immunizations']?></textarea>
            </div>
            <div class="form-group mb-4">
              <h6 class="strong">Allergies</h6>
              <textarea class="form-control" name="allergy_history" id="exampleFormControlTextarea1" rows="4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['allergies']?></textarea>
            </div>
            <div class="form-group mb-4">
              <h6 class="strong">Past Diseases</h6>
              <textarea class="form-control" name="past_diseases" id="exampleFormControlTextarea1" rows="4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['past_diseases']?></textarea>
            </div>
          </div><!-- end history -->

          <div id="vitals" role="tabpanel" class="container tab-pane fade"><br>
            <div class="row">
              <div class="col-sm-4">
                <h6 class="strong">Body Temperature</h6>
                    <div class="form-group form-inline">
                      <input type="text" name="body_temp" class="form-control col-sm-5" id="inputPassword" placeholder="" value="">
                      <label for="input" class="col-sm-2 col-form-label">°C</label>
                    </div>
                </div>
                <div class="col-sm-4">
                  <h6 class="strong">Weight</h6>
                      <div class="form-group form-inline">
                        <input type="text" name="weight" class="form-control col-sm-5" id="inputPassword" placeholder="" value="">
                        <label for="input" class="col-form-label ml-1">kg</label>
                      </div>
                  </div>
                <div class="col-sm-4">
                  <h6 class="strong">Height</h6>
                      <div class="form-group form-inline">
                        <input type="text" name="height" class="form-control col-sm-5" id="inputPassword" placeholder="" value="">
                        <label for="input" class="col-form-label ml-1">cm</label>
                      </div>
                  </div>
                </div> <!-- end row -->
                <div class="row mb-4">
                  <div class="col-sm-4">
                    <h6 class="strong">Respiratory Rate</h6>
                        <div class="form-group form-inline">
                          <input type="text" name="rr" class="form-control col-sm-5" id="inputPassword" placeholder="" value="">
                          <label for="input" class="col-form-label ml-1">breaths</label>
                        </div>
                    </div>
                    <div class="col-sm-4">
                      <h6 class="strong">Blood Pressure</h6>
                          <div class="form-group form-inline">
                            <input type="text" name="bp" class="form-control col-sm-6" id="inputPassword" placeholder="___ / __">
                            <label for="input" class="col-form-label ml-1">mm Hg</label>
                          </div>
                      </div>
                    <div class="col-sm-4">
                      <h6 class="strong">Pulse</h6>
                          <div class="form-group form-inline">
                            <input type="text" name="pulse" class="form-control col-sm-5" id="inputPassword" placeholder="" value="">
                            <label for="input" class=" col-form-label ml-1">bpm</label>
                          </div>
                      </div>
                    </div> <!-- end row -->

                    <div class="form-group row">
                      <div class="col-sm-12">
                        <h6 class="strong">Any problem(s)?</h6>
                          <textarea class="form-control" name="problem" id="exampleFormControlTextarea1" rows="3"></textarea>
                      </div>
                    </div> <!-- end row -->
                    <div class="form-group row mb-5">
                      <div class="col-sm-12">
                        <h6 class="strong mb-0">For how long have the problems been happening? (ex. 3 months)</h6>
                            <small class="text-muted" style="font-size:0.75rem;">For example, "3 months" or "1 year".</small>
                          <input type="text" name="length_of_problem" class="form-control" id="inputPassword" placeholder="" value="">
                      </div>
                    </div> <!-- end row -->

                    <div class="row mb-3">
                      <div class="col-sm-12">
                        <h6 class="strong">Has the patient recieved any treatment?</h6>
                        <div class="form-check pl-0">
                          <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                              <input class="form-check-input" type="radio" name="recieved_treatment" value="Yes" checked>
                              Yes
                          </label>
                          <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                              <input class="form-check-input" type="radio" name="recieved_treatment" value="No" value="">
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
                          <textarea class="form-control" name="current_treatment" class="form-control" id="inputPassword" rows="2"></textarea>
                        </div>
                      </div>
                    </div> <!-- end row -->

                    <div class="row mb-4">
                      <div class="col-sm-12">
                        <h6 class="strong">Is the current treatment(s) helpful at all?</h6>
                        <div class="form-check pl-0">
                          <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                              <input class="form-check-input" type="radio" name="current_treatment_helpful" value="Yes" checked>
                              Yes
                          </label>
                          <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                              <input class="form-check-input" type="radio" name="current_treatment_helpful" value="No" value="">
                              No
                          </label>
                          <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                              <input class="form-check-input" type="radio" name="current_treatment_helpful" value="No current treatment">
                              No current treatment
                          </label>
                        </div>
                      </div>
                    </div>  <!-- end row -->

                    <div class="center-btn py-3 my-4" align="center">
                      <button class = "action btn btn-danger shadow" type="submit" />Vitals Signs Completed<i class="fa fa-check ml-1" aria-hidden="true"></i></button>
                    </div>

              </div> <!-- end vitals -->


            </div> <!-- end tab-content -->


          </div>
          <!--vitals-->



        </div>
        <!--tab-content-->
      </form>

    </div>

  </div>
  <!--container-->
  </body>

  </html>
