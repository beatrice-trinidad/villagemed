<?php
require_once('../../../private/initialize.php');
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /ht/public");
}
?>

<?php $page_title = 'Register New '; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<html lang="ht">
<div class="container" id="content">
  <div class = "row">
    <div class = "col-md-12">
      <div class="page new">
        <h2 id="heading" class= "text-danger">Enskri New Pasyan</h2>
        <br>
        <form method="post" enctype="multipart/form-data">
          <div class= "row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="name">Premye Non:</label>
                <input type="text" class="form-control" name="fname" id="email" required>
              </div>
              <div class="form-group">
                <label for="pwd">Siyati:</label>
                <input type="text" class="form-control" name="lname" id="pwd" required>
              </div>
              <div class="form-group">
                <label class= "col-sm-3" for="pwd">Tikè:</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="ticket" id="pwd" required>
                </div>
              </div>
            </div><!--col1-->
            <div class =" col-md-4" style = "margin-left: 30px">
              <div style="height:0px;overflow:hidden">
                <dd><input type="file" accept="image/*" id="fileInput" name="fileInput" /></dd>
              </div>
              <div style="height: 275px; width: 200px; box-shadow: 3px 3px 3px 3px #888888;">
                <img width="200" height="275" style="display: none; object-fit: cover; position: absolute;" id="patient_picture" /><br />
                <button id="camera" style="margin-top: 30%; position: absolute; left: 50%; -webkit-transform: translateX(-50%); transform: translateX(-50%)"class="action btn" type="button" onclick="chooseFile();"><i class="fa fa-camera"></i></button>
              </div>
              <script type="text/javascript">
                $("#camera").click(function(){
                  $("#patient_picture").css("display", "block");
                });
              </script>
            </div><!--col2-->
          </div><!--row-->
          <br><br>
          <div class = "row">
            <legend class="col-form-label col-sm-2 pt-0">Sèks</legend>
            <div class="col">
              <input class="form-check-input" type="radio" name="male" id="gridRadios1" onclick="{radio1()}" checked>
              <label class="form-check-label" for="gridRadios1">
                Gason
              </label>
            </div>
            <div class="col">
              <input class="form-check-input" type="radio" name="female" id="gridRadios2" onclick="{radio2()}">
              <label class="form-check-label" for="gridRadios2">
                Fi
              </label>
            </div>
            <div class="col">
              <input class="form-check-input" type="radio" name="other" id="gridRadios3" onclick="{radio3()}">
              <label class="form-check-label" for="gridRadios3">
                Lòt
              </label>
            </div>
          </div><!--row-->
          <br>
          <div class = "row">
            <div class = "col-sm-6">
              <div class = "form-group row">
                <label for="input" class="col-sm-4 col-form-label">Dat Nesans</label>
                <div class="col-sm-8">
                  <input id="bday" type="date" class="form-control" name="dob" onchange="submitBday()" required/>
                </div>
              </div>
            </div>
            <div class = "col-sm-6">
              <div class = "form-group row">
                <label for="input" class="col-sm-2 col-form-label">Laj</label>
                <div class="col-sm-8">
                  <input id="resultBday" type="integer" class="form-control" name="age" required/>
                </div>
              </div>
            </div>
          </div><!--row-->
          <br>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label">Non Gadyen An</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="GRname" id="inputPassword" placeholder="Full name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label">Imèl Gadyen An</label>
            <div class="col-sm-8">
              <input type="Email" class="form-control" name="GRemail" id="inputPassword" placeholder="me@example.com">
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label">Nimewo Telefòn Gadyen Legal La</label>
            <div class="col-sm-8">
              <input type="tel" class="form-control" name="GRphone" id="inputPassword" placeholder="123-456-7890">
            </div>
          </div>
          <div align="center" id="operations">
            <input class = "action btn btn-danger" type="submit" value="Enskri ak Tcheke" />
          </div>
          <div id="alert">
            <div id="alert1" class="alert alert-danger alert-dismissible fade show" role="alert">
              Yon bagay ale mal! Pasyan an pa anrejistre. Eseye ankò pita.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="alert2" class="alert alert-danger alert-dismissible fade show" role="alert">
              Yon bagay ale mal! Pasyan an pa tcheke pous Eseye ankò pita.
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div id="alert3" class="alert alert-success alert-dismissible fade show" role="alert">
              Pasyan anrejistre!
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
          </div>
        </div><!--row-->
      </form>
    </div><!--page-new-->
  </div><!--col-->
</div><!--row-->
</div><!--container-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript">
document.getElementById("alert1").style.display = "none";
document.getElementById("alert2").style.display = "none";
document.getElementById("alert3").style.display = "none";
function readURL(input){
  if(input.files && input.files[0]){
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#patient_picture').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}
$("#fileInput").change(function() {
  readURL(this);
});
function radio1(){
  document.getElementById('gridRadios2').checked = false;
  document.getElementById('gridRadios3').checked = false;
}
function radio2(){
  document.getElementById('gridRadios1').checked = false;
  document.getElementById('gridRadios3').checked = false;
}
function radio3(){
  document.getElementById('gridRadios1').checked = false;
  document.getElementById('gridRadios2').checked = false;
}
function submitBday() {
  var Bdate = document.getElementById('bday').value;
  var Bday = +new Date(Bdate);
  var Q4A =  ~~ ((Date.now() - Bday) / (31557600000));
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
  $patient['age'] = $_POST['age'] ?? '';
  $patient['GRname'] = $_POST['GRname'] ?? '';
  $patient['GRemail'] = $_POST['GRemail'] ?? '';
  $patient['GRphone'] = $_POST['GRphone'] ?? '';
  if($_POST['male'] == "on"){
    $patient['gender'] = "Male";
  }
  else if($_POST['female'] == "on"){
    $patient['gender'] = "Female";
  }
  else{
    $patient['gender'] = "Other";
  }
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
