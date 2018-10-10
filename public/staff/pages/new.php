<?php

require_once('../../../private/initialize.php');


if(is_post_request()) {
  // Handle form values sent by new.php
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
  $insert_result = insert_patient($patient, $uid);
  $check_in_result = check_in_patient($patient, $uid);
  if($insert_result && $check_in_result) {
    //echo 'no error';
    header("Location: /villagemed-master/public/staff/index.php");
    //$new_id = mysqli_insert_id(db_connect());
    //redirect_to(url_for('/staff/subjects/show.php?id=' . $new_id));
  }
  else {
    //echo 'error';
    //redirect_to(url_for('/staff/pages/new.php'));
  }
}
/*if(is_post_request()) {

// Handle form values sent by new.php

$menu_name = $_POST['menu_name'] ?? '';
$position = $_POST['position'] ?? '';
$visible = $_POST['visible'] ?? '';

echo "Form parameters<br />";
echo "Menu name: " . $menu_name . "<br />";
echo "Position: " . $position . "<br />";
echo "Visible: " . $visible . "<br />";
}*/
?>

<?php $page_title = 'Register New '; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<script type="text/javascript">
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
</script>
<div class="container" id="content">
  <div class = "row">
    <div class = "col-md-12">
      <div class="page new">
        <h2 id="heading" class= "text-danger">Register New Patient</h2>
        <br>
        <form action="<?php echo url_for('/staff/pages/new.php'); ?>" method="post">
          <div class= "row">
            <div class="col-md-7">
              <div class="form-group">
                <label for="name">First Name:</label>
                <input type="text" class="form-control" name="fname" id="email" required>
              </div>
              <div class="form-group">
                <label for="pwd">Last Name:</label>
                <input type="text" class="form-control" name="lname" id="pwd" required>
              </div>
              <div class="form-group">
                <label class= "col-sm-3" for="pwd">Ticket:</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control" name="ticket" id="pwd" required>
                </div>
              </div>
            </div><!--col1-->
            <div class =" col-md-4 shadow p-1 mb-2 bg-white rounded" style = "margin-left: 30px">
              <div style="height:0px;overflow:hidden">
                <dd><input type="file" accept="image/*" id="fileInput" name="fileInput" /></dd>
              </div>
              <div id="imageupload" align = "center">
                <button class="action btn" type="button" onclick="chooseFile();"><i class="fa fa-camera"></i></button>
              </div>
            </div><!--col2-->
          </div><!--row-->
          <br><br>
          <div class = "row">
            <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
            <div class="col">
              <input class="form-check-input" type="radio" name="male" id="gridRadios1" onclick="{radio1()}" checked>
              <label class="form-check-label" for="gridRadios1">
                Male
              </label>
            </div>
            <div class="col">
              <input class="form-check-input" type="radio" name="female" id="gridRadios2" onclick="{radio2()}">
              <label class="form-check-label" for="gridRadios2">
                Female
              </label>
            </div>
            <div class="col">
              <input class="form-check-input" type="radio" name="other" id="gridRadios3" onclick="{radio3()}">
              <label class="form-check-label" for="gridRadios3">
                Other
              </label>
            </div>
          </div><!--row-->
          <br>
          <div class = "row">
            <div class = "col-sm-6">
              <div class = "form-group row">
                <label for="input" class="col-sm-4 col-form-label">Date of Birth</label>
                <div class="col-sm-8">
                  <input id="bday" type="date" class="form-control" name="dob" onchange="submitBday()" required/>
                </div>
              </div>
            </div>
            <div class = "col-sm-6">
              <div class = "form-group row">
                <label for="input" class="col-sm-2 col-form-label">Age</label>
                <div class="col-sm-8">
                  <input id="resultBday" type="integer" class="form-control" name="age" required/>
                </div>
              </div>
            </div>
          </div><!--row-->
          <br>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label">Guardian's name</label>
            <div class="col-sm-8">
              <input type="text" class="form-control" name="GRname" id="inputPassword" placeholder="Full name" required>
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label">Guardian's Email</label>
            <div class="col-sm-8">
              <input type="Email" class="form-control" name="GRemail" id="inputPassword" placeholder="me@example.com">
            </div>
          </div>
          <div class="form-group row">
            <label for="input" class="col-sm-3 col-form-label">Guardian's Phone</label>
            <div class="col-sm-8">
              <input type="tel" class="form-control" name="GRphone" id="inputPassword" placeholder="123-456-7890">
            </div>
          </div>
          <div align="center" id="operations">
            <input class = "action btn btn-danger" type="submit" value="Register and Check-In" />
          </div>
        </div><!--row-->
      </form>
    </div><!--page-new-->
  </div><!--col-->
</div><!--row-->
</div><!--container-->
</body>
</html>
