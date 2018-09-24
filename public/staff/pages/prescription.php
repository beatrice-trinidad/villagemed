<?php require_once('../../../private/initialize.php'); ?>


<?php include(SHARED_PATH . '/pInfo_header.php'); ?>
<?php
  if(is_post_request()){
    update_patient_status("prescription", $_GET['id']);
    header("Location: /villagemed-master/public/staff/index.php");
  }
?>
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
            <input type="text" readonly class="form-control-plaintext"  id="inputPassword"  value="100">
          </div>
        </div>
        <div class="row row-bottom-margin">
          <label for="input" class="col-md-5 col-form-label">Weight</label>
          <div class="col-md-7">
            <input type="text" readonly class="form-control-plaintext" id="inputPassword"  value="50">
          </div>
        </div>
        <div class="row">
          <label for="input" class="col-md-5 col-form-label">Height</label>
          <div class="col-md-7">
            <input type="text" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="160">
          </div>
        </div>
      </div><!--col-md-6-->
      <div class = "col-md-6">
        <div class="row row-bottom-margin">
          <label for="input" class="col-md-5 col-form-label">RR</label>
          <div class="col-md-7">
            <input type="text" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="" required>
          </div>
        </div>
        <div class="row row-bottom-margin">
          <label for="input" class="col-md-5 col-form-label">BP</label>
          <div class="col-md-7">
            <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
          </div>
        </div>
        <div class="row">
          <label for="input" class="col-md-5 col-form-label">Pulse</label>
          <div class="col-md-7">
            <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
          </div>
        </div>
      </div><!--col-md-6-->
    </div>
    <br>
    <div class="form-group row">
      <label for="exampleFormControlTextarea1" class = "col-md-2 col-form-label">Problem</label>
      <div class="col-md-10">
        <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" rows="1"></textarea>
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-2 col-form-label">How Long</label>
      <div class="col-md-10">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
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
          <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
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

  <div id="ros" role="tabpanel" class="container tab-pane fade" style="border:1px solid #cecece;">
    <br>
    <h4>ROS Report</h4>
    <h5>General ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <br>
    <h5>ENT ROS</h5>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Positive for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Negative for:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Comments:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div><br>
    <h4>Exam Report</h4>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">General:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">HEENT:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Eyes:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Neck:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Respiratory:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Cardiovascular:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Abdomen:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Genetourinary:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Lymph:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Skin:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Musculoskeleton:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group row">
      <label for="input" class="col-md-3 col-form-label">Neurology:</label>
      <div class="col-md-9">
        <input type="Email" readonly class="form-control-plaintext" id="inputPassword" placeholder="" value="">
      </div>
    </div>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Assessment</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows = "3"></textarea>
    </div>
  </div>

  <div id="prescription" role="tabpanel" class="container tab-pane fade" style="border:1px solid #cecece;"><br>
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Treatment Plan</label>
      <textarea class="form-control" id="exampleFormControlTextarea1" rows = "4"></textarea>
    </div>
    <br>
    <div class = "container-fluid" style="border:1px solid #cecece; padding: 20px;">
    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Drug Name</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="inputdrug" placeholder="">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Dosage</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="inputdrug" placeholder="">
      </div>
    </div>

    <div class="form-group row">
      <label for="inputPassword" class="col-sm-3 col-form-label">Quantity</label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="inputdrug" placeholder="">
      </div>
    </div>
  </div>
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
<form method="post">
<a href="<?php echo url_for('/staff/index.php'); ?>"><input class="action btn btn-danger" type="submit" value="Prescription Done"></input></a>
</form>
</div>
</div>
</footer>


  </div>
</div><!--tab-content-->



</div><!--row-->
</div><!--container-->
</body>
</html>
