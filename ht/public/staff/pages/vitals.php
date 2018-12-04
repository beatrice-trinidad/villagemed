<?php require_once('../../../private/initialize.php');
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /ht/public");
}
?>
<?php include(SHARED_PATH . '/pInfo_header.php'); ?>
<?php
  if(is_post_request()){
    $any_treatment = $treatment_helpful = "";
    if(isset($_POST['gridRadios'])) $any_treatment = "Yes";
    if(isset($_POST['gridRadios1'])) $any_treatment = "No";
    if(isset($_POST['gridRadios2'])) $treatment_helpful = "Somewhat Yes";
    if(isset($_POST['gridRadios3'])) $treatment_helpful = "Not at All";
    if(isset($_POST['gridRadios4'])) $treatment_helpful = "N/A";
    insert_pvitals($_GET['id'], $any_treatment, $treatment_helpful);
    update_patient_status("vitals", $_GET['id']);
    header("Location: /ht/public/staff/index.php");
  }
?>
<script type="text/javascript">
function radio1(){
  document.getElementById('gridRadios1').checked = false;
}
function radio2(){
  document.getElementById('gridRadios').checked = false;
}
function radio3(){
  document.getElementById('gridRadios3').checked = false;
  document.getElementById('gridRadios4').checked = false;
}
function radio4(){
  document.getElementById('gridRadios2').checked = false;
  document.getElementById('gridRadios4').checked = false;
}
function radio5(){
  document.getElementById('gridRadios2').checked = false;
  document.getElementById('gridRadios3').checked = false;
}
</script>
<div class = "container-fluid">
    <div class = "col-md-12">
  <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#vitals">Vitals</a>
    </li>
      <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#history">History</a>
      </li>
</ul>

<form method="post">
<div class="tab-content">
  <div id="vitals" role="tabpanel" class="container tab-pane active" style="border:1px solid #cecece;"><br>

    <div class = "row">
      <div class = "col-md-6">
    <div class = "form-group row">
        <label for="input" class="col-md-5 col-form-label">Body Temp</label>
        <div class="col-md-5">
          <input type="text" name="body_temp" class="form-control" id="inputPassword" placeholder="" value="">
        </div>
          <label for="input" class="col-md-2 col-form-label">°F</label>
      </div>
      <div class="form-group row">
          <label for="input" class="col-md-5 col-form-label">Weight</label>
          <div class="col-md-5">
            <input type="text" name="weight" class="form-control" id="inputPassword" placeholder="" value="">
          </div>
          <label for="input" class="col-md-2 col-form-label">Kg</label>
        </div>
        <div class="form-group row">
            <label for="input" class="col-md-5 col-form-label">Height</label>
            <div class="col-md-5">
              <input type="text" name="height" class="form-control" id="inputPassword" placeholder="" value="">
            </div>
            <label for="input" class="col-md-2 col-form-label">cm</label>
          </div>
        </div><!--col-md-6-->

        <div class = "col-md-1">
        </div>
        <div class = "col-md-5">
      <div class="form-group row">
          <label for="input" class="col-md-3 col-form-label">RR</label>
          <div class="col-md-7">
            <input type="text" name="rr" class="form-control" id="inputPassword" placeholder="" value="">
          </div>
          <label for="input" class="col-md-2 col-form-label">bpm</label>
        </div>
        <div class="form-group row">
            <label for="input" class="col-md-3 col-form-label">BP</label>
            <div class="col-md-7">
              <input type="text" name="bp" class="form-control" id="inputPassword" placeholder="" value="">
            </div>
            <label for="input" class="col-md-2 col-form-label">mmHg</label>
          </div>
          <div class="form-group row">
              <label for="input" class="col-md-3 col-form-label">Pulse</label>
              <div class="col-md-7">
                <input type="text" name="pulse" class="form-control" id="inputPassword" placeholder="" value="">
              </div>
              <label for="input" class="col-md-2 col-form-label">bpm</label>
            </div>

          </div><!--col-md-6-->

      </div>
      <br>
      <div class="form-group row">
<label for="exampleFormControlTextarea1" class = "col-md-2 col-form-label">Problem</label>
  <div class="col-md-10">
<textarea class="form-control" name="problem" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
</div>

<div class="form-group row">
    <label for="input" class="col-md-2 col-form-label">How Long</label>
    <div class="col-md-10">
      <input type="text" name="length_of_problem" class="form-control" id="inputPassword" placeholder="" value="">
    </div>
  </div>

<br>
  <div class = "row">

      <legend class="col-form-label col-md-3 pt-0">Any Treatment?</legend>

        <div class="col">
          <input class="form-check-input" type="radio" onclick="{radio1()}" name="gridRadios" id="gridRadios" value="" checked>
          <label class="form-check-label" for="gridRadios">

            Yes
          </label>
        </div>
        <div class="col">
            <input class="form-check-input" type="radio" onclick="{radio2()}" name="gridRadios1" id="gridRadios1" value="">
            <label class="form-check-label" for="gridRadios1">
              No
            </label>
          </div>

        </div><!--row-->
<br>
        <div class="form-group row">
            <label for="input" class="col-md-2 col-form-label">Current Treatment</label>
            <div class="col-md-10">
              <input type="text" name="current_treatment" class="form-control" id="inputPassword" placeholder="" value="">
            </div>
          </div>

          <br>
          <div class = "row">

              <legend class="col-form-label col-md-3 pt-0">Treatment Helpful?</legend>

                <div class="col">
                  <input class="form-check-input" type="radio" onclick="{radio3()}" name="gridRadios2" id="gridRadios2" value="" checked>
                  <label class="form-check-label" for="gridRadios1">

                    Somewhat Yes
                  </label>
                </div>
                <div class="col">
                    <input class="form-check-input" type="radio" onclick="{radio4()}" name="gridRadios3" id="gridRadios3" value="">
                    <label class="form-check-label" for="gridRadios1">
                      Not at all
                    </label>
                  </div>
                  <div class="col">
                      <input class="form-check-input" type="radio" onclick="{radio5()}" name="gridRadios4" id="gridRadios4" value="">
                      <label class="form-check-label" for="gridRadios1">
                        N/A
                      </label>
                    </div>




                </div><!--row-->


                <footer>
                <div class="shadow p-3 mb-1 bg-red rounded actions">
                <div class="center-btn" align="center">

                <a href="<?php echo url_for('/staff/index.php'); ?>"><input class="action btn btn-danger" type="submit" value="Vitals Done"></input></a>

                </div>
                </div>
                </footer>

  </div><!--vitals-->

  <div id= "history" class=" container tab-pane fade" style="border:1px solid #cecece;">
<br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Immunizations</label>
        <textarea class="form-control" name="immunization_history" id="exampleFormControlTextarea1" rows= "4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['immunizations']?></textarea>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Allergies</label>
        <textarea class="form-control" name="allergy_history" id="exampleFormControlTextarea1" rows = "4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['allergies']?></textarea>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Past Diseases</label>
        <textarea class="form-control" name="past_diseases" id="exampleFormControlTextarea1" rows = "4"><?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['past_diseases']?></textarea>
      </div>
      <br>



  </div><!-- history -->

</div><!--tab-content-->
</form>

</div>

</div><!--container-->
</body>
</html>
