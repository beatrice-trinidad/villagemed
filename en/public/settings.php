<?php
require_once('../private/initialize.php');
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
session_start();
?>

<html lang="en">
  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>VillageMED</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/en/public/stylesheets/staff.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/villagemed/public/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">



      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




  </head>

  <body>

  <?php include(SHARED_PATH . '/staff_header.php'); ?>


  <div class="container">

    <div class="col-sm-12">
      <div class="row">
        <h2 id="heading" class="text-danger text-center mb-4 w-100">Account Settings</h2>
      </div>

    <br>
      <form method="post">

      <div class="row">
        <div class="col-sm-10">
          <div class="form-group">
            <label for="pwd">Change Current Email</label>
            <input type="email" name="_address" class="form-control" value="<?php echo get_staff_by_uid($_SESSION['uid'])['email'] ?>" required>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-sm-5">
          <div class="form-group">
            <label for="pwd">Change Password</label>
            <input type="password" name="pswd_" class="form-control" value="<?php echo get_staff_by_uid($_SESSION['uid'])['password'] ?>" required>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <label for="pwd">Re-type Password</label>
            <input type="password" name="pswd_confirmed" class="form-control" value="<?php echo get_staff_by_uid($_SESSION['uid'])['password'] ?>" required>
          </div>
        </div>
        <div class="col-sm-2">
        </div>
      </div>
      <div class="row mb-4">
      <div class="col-sm-6 mb-2">
        <label for="pwd">Change Current Role</label>
        <div class="form-check pl-0">
          <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" value="Administration"
                      <?php
                        if(get_staff_by_uid($_SESSION['uid'])['role'] == "Administration"){
                          echo "checked";
                        }
                      ?>
                      >
                      Administration
          </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" value="Nurse"
                      <?php
                        if(get_staff_by_uid($_SESSION['uid'])['role'] == "Nurse"){
                          echo "checked";
                        }
                      ?>
                      >
                      Nurse
                    </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" value="Medical Volunteer"
                      <?php
                        if(get_staff_by_uid($_SESSION['uid'])['role'] == "Medical Volunteer"){
                          echo "checked";
                        }
                      ?>
                      >
                      Medical Volunteer
                    </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" value="Non-Medical Volunteer"
                      <?php
                        if(get_staff_by_uid($_SESSION['uid'])['role'] == "Non-Medical Volunteer"){
                          echo "checked";
                        }
                      ?>
                      >
                      Non-Medical Volunteer
            </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" value="Pharmacy"
                      <?php
                        if(get_staff_by_uid($_SESSION['uid'])['role'] == "Pharmacy"){
                          echo "checked";
                        }
                      ?>
                      >
                      Pharmacy
            </label>
        </div>
      </div>
    </div>
    <div class="row mb-4">
      <div class="col-sm-6">
        <label for="pwd">Change Default Language</label>
        <div class="form-check pl-0">
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                    <input class="form-check-input" type="radio" name="language" value="English"
                    <?php
                      if(get_staff_by_uid($_SESSION['uid'])['language'] == "English"){
                        echo "checked";
                      }
                    ?>
                    >
                    English
                  </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                    <input class="form-check-input" type="radio" name="language" value="Haitian"
                    <?php
                      if(get_staff_by_uid($_SESSION['uid'])['language'] == "Haitian"){
                        echo "checked";
                      }
                    ?>
                    >
                    Haitian
                  </label>
        </div>
      </div>
    </div>

    <div class="form-group">
          <div class="actions">
            <div class="center-btn py-3 my-4" align="center">
              <input  class = "action btn  btn-danger shadow" type="submit" value="Update Settings" />
            </div>
          </div>
          <div id="alert1" class="alert alert-danger" role="alert" style="display: none; margin-top: 5%;">
      Passwords do not match
    </div>
    <script type="text/javascript">
    function displayError1(){
      document.getElementById("alert1").style.display = "block";
    }
    </script>
    <?php
    if(is_post_request()){
      if(strcmp($_POST['pswd_'], $_POST['pswd_confirmed']) == 0){
        edit_account_settings();
        header("Location: /en/public/staff/index.php");
      }
      else{
        echo '<script type="text/javascript"> displayError1(); </script>';
      }
    }
    ?>
        </div>

  </div>
</form>
</body>

</html>
