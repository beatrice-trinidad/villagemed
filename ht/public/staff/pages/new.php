<?php
require_once('../../../private/initialize.php');
header("Cache-Control: no cache");
session_start();
$_SESSION['page'] = "register";
if($_SESSION['user'] == NULL){
  header("Location: /ht/public");
}
?>

  <?php $page_title = 'Register New '; ?>
  <?php include(SHARED_PATH . '/staff_header.php'); ?>


  <div class="container">

    <form method="post" enctype="multipart/form-data">

      <div class="col-sm-12">
        <div class="row">
          <h2 id="heading" class="text-danger text-center mb-4 w-100">Register New Patient</h2>
        </div>

        <br>
        <div class="row mb-4">
          <div class="col">
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="name" class="">First Name</label>
                  <input type="text" class="form-control" name="fname" id="email" required>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12">
                <div class="form-group">
                  <label for="name">Last Name</label>
                  <input type="text" class="form-control" name="lname" id="pwd" required>
                </div>
              </div>
            </div>
            <div class="row mb-4">
              <div class="col-sm-6">
                <div class="form-group">
                  <label for="name" class="">Ticket</label>
                  <input type="text" class="form-control" name="ticket" id="pwd" required>
                </div>
              </div>
            </div>
          </div>
          <div class="col">
            <div style="height:0px;overflow:hidden;">
              <dd><input type="file" accept="image/*" id="fileInput" name="fileInput" /></dd>
            </div>
            <div style="height: 275px; width: 154px; float: right; position:relative;" class="bg-white shadow">
              <img style="display: none; height: 154px; width: 275px; transform-origin: top bottom; position: absolute; object-fit: cover;  overflow: hidden; transform: rotate(90deg) translateX(61px) translateY(61px);" id="patient_picture" /><br />
              <button id="camera" style="margin-top: 50%;" class="action btn btn-lg btn-success mx-auto d-block" type="button" onclick="chooseFile();"><i class="fa fa-camera"></i></button>
            </div>
            <div class="pt-2 text-center" style="height: 50px; width: 154px; float: right; clear: both;">
              <div class="row text-center" style="clear: both;">
                <div class="col text-center"><button onclick="chooseFile();" id="retake" style="display:block;">Retake Picture</button></div>
              </div>
              <div class="col"></div>
            </div>
            <script type="text/javascript">
              $("#camera").click(function() {
                $("#patient_picture").css("display", "block");
              });
            </script>
          </div>
        </div>

        <div class="row mb-3">
          <div class="col-sm-7">
            <label for="pwd">Gender</label>
            <div class="form-check form-check-inline">
              <label class="btn btn-light d-flex justify-content-start px-2 mr-3 w-100">
                  <input class="form-check-input" type="radio" name="gender" id="gridRadios1" value="Male" checked>
                    Male
        </label>
              <label class="btn btn-light d-flex justify-content-start px-2 mr-3 w-100">
          <input class="form-check-input" type="radio" name="gender" id="gridRadios2" value="Female">
                    Female
                  </label>
              <label class="btn btn-light d-flex justify-content-start px-2 mr-1 w-100">
              <input class="form-check-input" type="radio" name="gender" id="gridRadios3" value="Other">
                    Other
      </div>
    </div>
  </div>
  <div class="row mb-4">
    <div class="col-sm-4">
      <div class="form-group">
        <label for="dob">Date of Birth</label>
              <input id="bday" type="date" class="form-control" name="dob" onchange="submitBday()" required/>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-8">
            <div class="form-group">
              <label for="pwd">Guardian's Name</label>
              <input type="text" class="form-control" name="GRname" id="inputPassword" placeholder="Full name" required>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-10">
            <div class="form-group">
              <label for="pwd">Guardian's Email Address</label>
              <input type="Email" class="form-control" name="GRemail" id="inputPassword" placeholder="me@example.com">
            </div>
          </div>
        </div>
        <div class="row mb-4">
          <div class="col-sm-10">
            <div class="form-group">
              <label for="pwd">Guardian's Phone Number</label>
              <input type="tel" class="form-control" name="GRphone" id="inputPassword" placeholder="123-456-7890">
            </div>
          </div>
        </div>

        <div class="form-group">
          <div class="actions">
            <div class="center-btn py-3 my-4" align="center">
              <input class="action btn  btn-danger shadow" type="submit" value="Register and Check-In Patient" />
            </div>
          </div>
        </div>


        <div id="alert">
          <div id="alert1" class="alert alert-danger alert-dismissible fade show" role="alert">
            Something went wrong! Patient not registered. Try again later.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div id="alert2" class="alert alert-danger alert-dismissible fade show" role="alert">
            Something went wrong! Patient not checked in. Try again later.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
          <div id="alert3" class="alert alert-success alert-dismissible fade show" role="alert">
            Patient Registered!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
          </div>
        </div>


      </div>
    </form>

  </div>
  </body>

  </html>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script type="text/javascript">
    document.getElementById("alert1").style.display = "none";
    document.getElementById("alert2").style.display = "none";
    document.getElementById("alert3").style.display = "none";

    function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function(e) {
          $('#patient_picture').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
      }
    }
    $("#fileInput").change(function() {
      readURL(this);
    });

    function submitBday() {
      var Bdate = document.getElementById('bday').value;
      var Bday = +new Date(Bdate);
      var Q4A = ~~((Date.now() - Bday) / (31557600000));
      var theBday = document.getElementById('resultBday');
      theBday.value = Q4A;
    }

    function chooseFile() {
      document.getElementById("fileInput").click();
    }

    function displayError1() {
      document.getElementById("alert1").style.display = "block";
    }

    function displayError2() {
      document.getElementById("alert2").style.display = "block";
    }

    function displayError3() {
      document.getElementById("alert3").style.display = "block";
    }
  </script>
  <?php
if(is_post_request()) {
  $imagetmp = addslashes(file_get_contents($_FILES["fileInput"]["tmp_name"]));
  $patient = [];
  $patient['ticket'] = $_POST['ticket'] ?? '';
  $patient['fname'] = $_POST['fname'] ?? '';
  $patient['lname'] = $_POST['lname'] ?? '';
  $patient['dob'] = $_POST['dob'] ?? '';
  $patient['GRname'] = $_POST['GRname'] ?? '';
  $patient['GRemail'] = $_POST['GRemail'] ?? '';
  $patient['GRphone'] = $_POST['GRphone'] ?? '';
  $patient['gender'] = $_POST['gender'] ?? '';
  $uid = uniqid();
  $insert_result = insert_patient($patient, $uid, $imagetmp);
  $check_in_result = check_in_patient($patient, $uid);
  if($insert_result && $check_in_result) {
    echo '<script type="text/javascript"> displayError3(); </script>';
    header("Location: /ht/public/staff/index.php");
  }
  else {
    if(!$insert_result){
      echo '<script type="text/javascript"> displayError1(); </script>';
    }
    if(!$check_in_result){
      echo '<script type="text/javascript"> displayError2(); </script>';
    }
  }
}
?>
    </body>

    </html>
