<?php
require_once('../../../private/initialize.php');
session_start();
$_SESSION['page'] = "edit";
$_SESSION['id'] = $_GET['id'];
if($_SESSION['user'] == NULL){
  header("Location: /ht/public");
}
if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];
if(is_post_request()) {
  $patient = [];
  $patient['id'] = $id;
  $patient['fname'] = $_POST['fname'] ?? '';
  $patient['lname'] = $_POST['lname'] ?? '';
  $patient['gender'] = $_POST['gender'] ?? '';
  $patient['dob'] = $_POST['dob'] ?? '';
  $patient['age'] = $_POST['age'] ?? '';
  $patient['GRname'] = $_POST['GRname'] ?? '';
  $patient['GRemail'] = $_POST['GRemail'] ?? '';
  $patient['GRphone'] = $_POST['GRphone'] ?? '';
  $result = update_patient($patient);
  if($result === true){
    redirect_to(url_for('/staff/pages/index.php'));
  }
  else{
    $errors = $result;
  }
}
else{
  $patient = get_patient_by_uid(get_puid_by_id($id));
}
?>

<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>


  <div class="container">

    <div class="col-sm-12">
      <div class="row">
        <h2 id="heading" class="text-danger text-center mb-4 w-100">Edit Patient</h2>
      </div>

      <br>
      <?php echo display_errors($errors); ?>

      <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">

      <div class="row">
        <div class="col-sm-5">
          <div class="form-group">
            <label for="name" class="">First Name</label>
            <input type="text" class="form-control" name="fname" value="<?php echo h($patient['fname']); ?>" />
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <label for="name">Last Name</label>
            <input type="text" class="form-control" name="lname" value="<?php echo h($patient['lname']); ?>" />
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-sm-8">
          <label for="pwd">Gender</label>
          <div class="row">
            <div class="col">
          <div class="form-check form-check-inline">
            <label class="btn btn-light d-flex justify-content-start px-3 mr-3 w-100">
                        <input class="form-check-input" type="radio" name="role" id="jevattend_id" value="Male"
                        <?php
                          if($patient['gender'] == "Male"){
                            echo "checked";
                          }
                        ?>
                        >
                        Male
            </label>
              <label class="btn btn-light d-flex justify-content-start px-3 mr-3 w-100">
                        <input class="form-check-input" type="radio" name="role" id="jevattend_id" value="Female"
                        <?php
                          if($patient['gender'] == "Female"){
                            echo "checked";
                          }
                        ?>
                        >
                        Female
                      </label>
              <label class="btn btn-light d-flex justify-content-start px-3 mr-1 w-100">
                        <input class="form-check-input" type="radio" name="role" id="jevattend_id" value="Other"
                        <?php
                          if($patient['gender'] == "Other"){
                            echo "checked";
                          }
                        ?>
                        >
                        Other
          </div>
        </div>
        </div>
      </div>
        <div class="col-sm-4">
          <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" name="dob" value="<?php echo h($patient['dob']); ?>" />
          </div>
      </div>
    </div>
      <div class="row">
        <div class="col-sm-10">
          <div class="form-group">
            <label for="pwd">Guardian's Name</label>
            <input type="text" class="form-control" name="GRname" value="<?php echo h($patient['GRname']); ?>" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10">
          <div class="form-group">
            <label for="pwd">Guardian's Email Address</label>
              <input type="text" class="form-control" name="GRemail" value="<?php echo h($patient['GRemail']); ?>" />
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10">
          <div class="form-group">
            <label for="pwd">Guardian's Phone Number</label>
              <input type="text" class="form-control" name="GRphone" value="<?php echo h($patient['GRphone']); ?>" />
          </div>
        </div>
      </div>

        <div class="form-group">
          <div class="actions">
            <div class="center-btn py-3 my-4" align="center">
              <input class="action btn  btn-danger shadow" type="submit" value="Update Patient Info" />
            </div>
          </div>
        </div>

  </div>
</form>

</div>
</body>

</html>
