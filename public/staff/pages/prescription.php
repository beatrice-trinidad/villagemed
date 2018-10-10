<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/pInfo_header.php'); ?>
<?php
  if(is_post_request()){
    insert_prescription($_GET['id']);
    update_patient_status("prescription", $_GET['id']);
    header("Location: /villagemed-master/public/staff/index.php");
  }
?>
<form method="post">
<div class = "container-fluid">
  <div class ="col-md-12">

  <ul class="nav nav-tabs" role="tablist">
      <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#vitals">Vitals Report</a>
    </li>
      <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#history">History Report</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#ros">ROS and Exam Report</a>
      </li>
      <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#prescription">Prescription</a>
      </li>
</ul>

<div class="tab-content">
  <div id="vitals" role="tabpanel" class="container tab-pane active" style="border:1px solid #cecece;"><br>
    <div class = "row">
      <div class = "col-md-6">
        <div class = "row row-bottom-margin">
          <label for="input" class="col-md-5 col-form-label">Body Temp</label>
          <div class="col-md-7">
            <input type="text" readonly class="form-control-plaintext"  id="inputPassword"  value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['body_temp']?>">
          </div>
        </div>
        <div class="row row-bottom-margin">
          <label for="input" class="col-md-5 col-form-label">Weight</label>
          <div class="col-md-7">
            <input type="text" readonly class="form-control-plaintext" id="inputPassword"  value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['weight']?>">
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
            <input type="text" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['rr']?>" required>
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
        <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" rows="1"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['problem']?></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-2 col-form-label">How Long</label>
      <div class="col-md-10">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['length_of_problem']?>">
      </div>
    </div>
    <br>
    <div class = "row">
      <legend class="col-form-label col-md-3 pt-0">Any Treatment?</legend>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1" checked >Yes
        </label>
      </div>
      <div class="form-check form-check-inline">
        <label class="form-check-label">
          <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">No
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
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="" checked>
          <label class="form-check-label" for="gridRadios1">
            Somewhat Yes
          </label>
        </div>
        <div class="col">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="">
          <label class="form-check-label" for="gridRadios1">
            Not at all
          </label>
        </div>
        <div class="col">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="">
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
        <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" placeholder="N/A" rows= "4"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['immunization_history']?></textarea>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Allergies</label>
        <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" placeholder="N/A" rows = "4"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['allergy_history']?></textarea>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Past Diseases</label>
        <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" placeholder="N/A" rows = "4"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['past_diseases']?></textarea>
      </div>
    </div><!-- history -->
  <div id="ros" role="tabpanel" class="container tab-pane fade" style="border:1px solid #cecece;">
    <br>
    <h4>ROS Report</h4>
    <h5>General ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['general_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['general_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['general_ros_comments']?>">
      </div>
    </div>
    <br>
    <h5>Ophthalmic ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ophthalmic_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ophthalmic_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ophthalmic_ros_comments']?>">
      </div>
    </div><br>
    <h5>ENT ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ent_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ent_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['ent_ros_comments']?>">
      </div>
    </div><br>
    <h5>Respiratory ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['respiratory_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['respiratory_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['respiratory_ros_comments']?>">
      </div>
    </div><br>
    <h5>Cardiovascular ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['cardiovascular_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['cardiovascular_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['cardiovascular_ros_comments']?>">
      </div>
    </div><br>
    <h5>Gastrointestinal ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['gastrointestinal_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['gastrointestinal_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['gastrointestinal_ros_comments']?>">
      </div>
    </div><br>
    <h5>Urinary ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['urinary_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['urinary_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['urinary_ros_comments']?>">
      </div>
    </div><br>
    <h5>Musculoskeleton ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['musculoskeleton_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['musculoskeleton_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['musculoskeleton_ros_comments']?>">
      </div>
    </div><br>
    <h5>Neurological ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['neurological_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['neurological_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['neurological_ros_comments']?>">
      </div>
    </div><br>
    <h5>Dermatological ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['dermatological_ros_positive']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['dermatological_ros_negative']?>">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['$dermatological_ros_comments']?>">
      </div>
    </div><br>
    <h4>Exam Report</h4>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">General:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">HEENT:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Eyes:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Neck:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Respiratory:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Cardiovascular:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Abdomen:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Genetourinary:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Lymph:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Skin:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Musculoskeleton:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Neurology:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="N/A" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Assessment</label>
      <textarea readonly class="form-control" id="exampleFormControlTextarea1" rows = "3"></textarea>
    </div>
  </div>

  <div id="prescription" role="tabpanel" class="container tab-pane fade" style="border:1px solid #cecece;"><br>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Treatment Plan</label>
      <textarea class="form-control" name="treatment_plan" placeholder="" id="exampleFormControlTextarea1" rows = "4"></textarea>
    </div>
    <br>
    <div class = "container-fluid" style="border:1px solid #cecece; padding: 20px;">
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Drug Name</label>
      <div class="col-sm-6">
        <input type="text" name="drug_name" class="form-control" id="inputdrug" placeholder="">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Dosage</label>
      <div class="col-sm-6">
        <input type="text" name="dosage" class="form-control" id="inputdrug" placeholder="">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Quantity</label>
      <div class="col-sm-6">
        <input type="text" name="quantity" class="form-control" id="inputdrug" placeholder="">
      </div>
    </div>
  </div>
</form>
<br><br>
<br>
<br>
<br>
<br>
<br>
<br>
<footer>
<div class="shadow p-3 mb-1 bg-red rounded actions">
<div class="center-btn" align="center">
<a href="<?php echo url_for('/staff/index.php'); ?>"><input class="action btn btn-danger" type="submit" value="Prescription Done"></input></a>
</div>
</div>
</footer>


  </div>
</div><!--tab-content-->



</div><!--row-->
</div><!--container-->
</body>
</html>
