<?php require_once('../../../private/initialize.php'); ?>


<?php include(SHARED_PATH . '/pInfo_header.php'); ?>
<?php
  if(is_post_request()){
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
    <div class ="tab-content">
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
      <div id= "history" role="tabpanel" class="container tab-pane fade" style="border:1px solid #cecece;"><br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Immunizations</label>
          <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" rows= "4"></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Allergies</label>
          <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" rows = "4"></textarea>
        </div>
        <br>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">Past Diseases</label>
          <textarea readonly class="form-control-plaintext" id="exampleFormControlTextarea1" rows = "4"></textarea>
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
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                      fatigue
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fever
                    </label>
                  </div>
                </div><!-- col-md-6 -->
                <div class = "col-md-7">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      malaise
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fatigue
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fever
                    </label>
                  </div>
                </div>
                <div class = "col-md-7">
                  <div class = "form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" >
                    <label class="form-check-label" for="defaultCheck1">
                      weight loss
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      sleep disturbance
                    </label>
                  </div>
                </div>
              </div>
            </div><!-- col-md-6-->
          </div><!-- row this -->
        <div class="form-group" style = "margin-top : 10px">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
          </div>
          <br>

        <h5>Ophthalmic ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Eye Pain
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Blurry Vision
                  </label>
                </div>
              </div><!-- col-md-6 -->
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Itchy Eyes
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Eye Pain
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Blurry Vision
                  </label>
                </div>
              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Itchy Eyes
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Excessive Tearing
                  </label>
                </div>
              </div>
            </div>
          </div><!-- col-md-6-->
        </div><!-- row this -->
        <div class="form-group" style = "margin-top : 10px">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
          </div>
          <br>

        <h5>ENT ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                Sneezing
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                Sour Throat
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                Rhinorrhea
                </label>
              </div>
            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  oral lesions
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  freq. ear infections
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    headaches
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Sneezing
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                  Rhinorrhea
                  </label>
                </div>

              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    Sore Throat
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    oral lesions
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    nasal congestions
                  </label>
                </div>
              </div>



            </div>
          </div><!-- col-md-6-->
          </div><!-- row this -->
          <div class="form-group" style = "margin-top : 10px">
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>

        <h5>Respiratory ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  cough
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  wheezing
                </label>
              </div>
            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    cough
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                  wheezing
                  </label>
                </div>

              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    short of breath
                  </label>
                </div>
              </div>
            </div>
          </div><!-- col-md-6-->
        </div><!-- row this -->
        <div class="form-group" style = "margin-top : 10px">
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>

        <h5>Cardiovascular ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  chest pain
                </label>
              </div>

            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    chest pain
                  </label>
                </div>


              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    rapid heart rate
                  </label>
                </div>
              </div>



            </div>
          </div><!-- col-md-6-->


          </div><!-- row this -->
          <div class="form-group" style = "margin-top : 10px">
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>

        <h5>Gastrointestinal ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  diarrhea
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  appetite loss
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  constipation
                </label>
              </div>
            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  blood in stool
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  abdominal pain
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    diarrhea
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    appetite loss
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    constipation
                  </label>
                </div>

              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    blood in stool
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    abdominal pain
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    nausea/vomiting
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    hematemesis
                  </label>
                </div>
              </div>
            </div>
          </div><!-- col-md-6-->
        </div><!-- row this -->
          <div class="form-group" style = "margin-top : 10px">
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>

        <h5>Urinary ROS</h5>
        <div class = "row">
          <div class = "col-md-6">
            <h6>Positive for </h6>
            <div class = "row">
            <div class = "col-md-5">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  fatigue
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  fever
                </label>
              </div>
            </div><!-- col-md-6 -->
            <div class = "col-md-7">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                <label class="form-check-label" for="defaultCheck1">
                  malaise
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    fatigue
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    fever
                  </label>
                </div>

              </div>
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    weight loss
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    sleep disturbance
                  </label>
                </div>
              </div>



            </div>
          </div><!-- col-md-6-->


          </div><!-- row this -->
          <div class="form-group" style = "margin-top : 10px">
            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
          </div>
          <br>

        <h5>Musculoskeleton ROS</h5>
        <div class = "row">
            <div class = "col-md-6">
              <h6>Positive for </h6>
              <div class = "row">
              <div class = "col-md-5">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    fatigue
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    fever
                  </label>
                </div>
              </div><!-- col-md-6 -->
              <div class = "col-md-7">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                  <label class="form-check-label" for="defaultCheck1">
                    malaise
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fatigue
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      fever
                    </label>
                  </div>

                </div>
                <div class = "col-md-7">
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      weight loss
                    </label>
                  </div>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                    <label class="form-check-label" for="defaultCheck1">
                      sleep disturbance
                    </label>
                  </div>
                </div>



              </div>
            </div><!-- col-md-6-->


            </div><!-- row this -->
            <div class="form-group" style = "margin-top : 10px">
              <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
            </div>
            <br>


        <h5>Neurological ROS</h5>
        <div class = "row">
                <div class = "col-md-6">
                  <h6>Positive for </h6>
                  <div class = "row">
                  <div class = "col-md-5">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        fatigue
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        fever
                      </label>
                    </div>
                  </div><!-- col-md-6 -->
                  <div class = "col-md-7">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                      <label class="form-check-label" for="defaultCheck1">
                        malaise
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          fatigue
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          fever
                        </label>
                      </div>

                    </div>
                    <div class = "col-md-7">
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          weight loss
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                        <label class="form-check-label" for="defaultCheck1">
                          sleep disturbance
                        </label>
                      </div>
                    </div>



                  </div>
                </div><!-- col-md-6-->


                </div><!-- row this -->
                <div class="form-group" style = "margin-top : 10px">
                  <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
                </div>
                <br>

        <h5>Dermatological ROS</h5>
        <div class = "row">
                        <div class = "col-md-6">
                          <h6>Positive for </h6>
                          <div class = "row">
                          <div class = "col-md-5">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                fatigue
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                fever
                              </label>
                            </div>
                          </div><!-- col-md-6 -->
                          <div class = "col-md-7">
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                              <label class="form-check-label" for="defaultCheck1">
                                malaise
                              </label>
                            </div>
                            <div class="form-check">
                              <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
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
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  fatigue
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  fever
                                </label>
                              </div>

                            </div>
                            <div class = "col-md-7">
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  weight loss
                                </label>
                              </div>
                              <div class="form-check">
                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                <label class="form-check-label" for="defaultCheck1">
                                  sleep disturbance
                                </label>
                              </div>
                            </div>



                          </div>
                        </div><!-- col-md-6-->


                        </div><!-- row this -->
                        <div class="form-group" style = "margin-top : 10px">
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="comments">
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
          <form method="post">
          <a href="<?php echo url_for('/staff/index.php'); ?>"><input class="action btn btn-danger" type="submit" value="Exam Done"></input></a>
          </form>
        </div>
      </div>
    </footer>


      </div><!--exam-->
    </div><!--tab-content-->

  </div>
  </div><!--container-->
</body>
</html>
