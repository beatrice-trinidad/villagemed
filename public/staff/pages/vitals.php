<?php require_once('../../../private/initialize.php'); ?>
<?php include(SHARED_PATH . '/pInfo_header.php'); ?>
<?php
  if(is_post_request()){
    update_patient_status("vitals", $_GET['id']);
    header("Location: /villagemed-master/public/staff/index.php");
  }
?>
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

<div class="tab-content">
  <div id="vitals" role="tabpanel" class="container tab-pane active" style="border:1px solid #cecece;"><br>

    <div class = "row">
      <div class = "col-md-6">
    <div class = "form-group row">
        <label for="input" class="col-md-5 col-form-label">Body Temp</label>
        <div class="col-md-5">
          <input type="text" class="form-control" id="inputPassword" placeholder="" value="" required>
        </div>
          <label for="input" class="col-md-2 col-form-label">°F</label>
      </div>
      <div class="form-group row">
          <label for="input" class="col-md-5 col-form-label">Weight</label>
          <div class="col-md-5">
            <input type="Email" class="form-control" id="inputPassword" placeholder="" value="">
          </div>
          <label for="input" class="col-md-2 col-form-label">Kg</label>
        </div>
        <div class="form-group row">
            <label for="input" class="col-md-5 col-form-label">Height</label>
            <div class="col-md-5">
              <input type="Email" class="form-control" id="inputPassword" placeholder="" value="">
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
            <input type="text" class="form-control" id="inputPassword" placeholder="" value="" required>
          </div>
          <label for="input" class="col-md-2 col-form-label">cm</label>
        </div>
        <div class="form-group row">
            <label for="input" class="col-md-3 col-form-label">BP</label>
            <div class="col-md-7">
              <input type="Email" class="form-control" id="inputPassword" placeholder="" value="">
            </div>
            <label for="input" class="col-md-2 col-form-label">cm</label>
          </div>
          <div class="form-group row">
              <label for="input" class="col-md-3 col-form-label">Pulse</label>
              <div class="col-md-7">
                <input type="Email" class="form-control" id="inputPassword" placeholder="" value="">
              </div>
              <label for="input" class="col-md-2 col-form-label">cm</label>
            </div>

          </div><!--col-md-6-->

      </div>
      <br>
      <div class="form-group row">
<label for="exampleFormControlTextarea1" class = "col-md-2 col-form-label">Problem</label>
  <div class="col-md-10">
<textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
</div>
</div>

<div class="form-group row">
    <label for="input" class="col-md-2 col-form-label">How Long</label>
    <div class="col-md-10">
      <input type="Email" class="form-control" id="inputPassword" placeholder="" value="">
    </div>
  </div>

<br>
  <div class = "row">

      <legend class="col-form-label col-md-3 pt-0">Any Treatment?</legend>

        <div class="col">
          <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="" checked>
          <label class="form-check-label" for="gridRadios1">

            Yes
          </label>
        </div>
        <div class="col">
            <input class="form-check-input" type="radio" name="gridRadios" id="gridRadios1" value="">
            <label class="form-check-label" for="gridRadios1">
              No
            </label>
          </div>

        </div><!--row-->
<br>
        <div class="form-group row">
            <label for="input" class="col-md-2 col-form-label">Current Treatment</label>
            <div class="col-md-10">
              <input type="Email" class="form-control" id="inputPassword" placeholder="" value="">
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


                <footer>
                <div class="shadow p-3 mb-1 bg-red rounded actions">
                <div class="center-btn" align="center">
                <form method="post">
                <a href="<?php echo url_for('/staff/index.php'); ?>"><input class="action btn btn-danger" type="submit" value="Vitals Done"></input></a>
                </form>
                </div>
                </div>
                </footer>

  </div><!--vitals-->

  <div id= "history" class=" container tab-pane fade" style="border:1px solid #cecece;">
<br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Immunizations</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows= "4"></textarea>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Allergies</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows = "4"></textarea>
      </div>
      <br>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">Past Diseases</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows = "4"></textarea>
      </div>
      <br>





  </div><!-- history -->

</div><!--tab-content-->


</div>

</div><!--container-->
</body>
</html>
