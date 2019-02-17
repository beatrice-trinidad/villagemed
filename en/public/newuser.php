<?php
require_once('../private/initialize.php');
header("Cache-Control: no cache");
session_cache_limiter("private_no_expire");
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
    <link rel="stylesheet" href="/en/public/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">



      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




  </head>

  <body>

  <nav class="navbar navbar-expand-sm navbar-light bg-white mb-5 shadow">
    <div class="navbar-collapse collapse w-100 order-1 order-sm-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link back" href="javascript:history.back()"><i class="fa fa-chevron-left mr-2" aria-hidden="true"></i>Back</a>
        </li>
      </ul>
    </div>
    <div class="mx-auto order-0">
      <img class="navbar-brand mx-auto" src="images/vMedLogo.png" alt="logo" />
    </div>
    <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
        </li>
      </ul>
    </div>
  </nav>

  <form method="post">

  <div class="container">

    <div class="col-sm-12">
      <div class="row">
        <h2 id="heading" class="text-danger text-center mb-4 w-100">Register New User</h2>
      </div>

      <br>
      <form action="/villagemed/public/staff/pages/new.php" method="post">
      <div class="row mb-4">
        <div class="col-sm-5">
          <div class="form-group">
            <label for="name" class="">First Name</label>
            <input type="text" name="fname" class="form-control" required>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <label for="name">Last Name</label>
            <input type="text" name="lname" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-sm-10">
          <div class="form-group">
            <label for="pwd">Email Address</label>
            <input type="email" name="email_address" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col-sm-5">
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" name="password_" class="form-control" required>
          </div>
        </div>
        <div class="col-sm-5">
          <div class="form-group">
            <label for="pwd">Re-type Password</label>
            <input type="password" name="password_confirmed" class="form-control" required>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col mb-2">
          <label for="pwd">Role</label>
          <div class="form-check pl-0">
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                        <input class="form-check-input" type="radio" name="role" value="Administration" checked>
                        Administration
            </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" value="Nurse">
                      Nurse
                    </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" value="Medical Volunteer">
                      Medical Volunteer
                    </label>
              <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                        <input class="form-check-input" type="radio" name="role" value="Non-Medical Volunteer">
                        Non-Medical Volunteer
              </label>
              <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                        <input class="form-check-input" type="radio" name="role" value="Pharmacy">
                        Pharmacy
              </label>
          </div>
        </div>
      </div>
      <div class="row mb-4">
        <div class="col">
          <label for="pwd">Preferred Language</label>
          <div class="form-check pl-0">
              <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="language" value="English" checked>
                      English
                    </label>
              <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="language" value="Haitian">
                      Haitian
                    </label>
          </div>
        </div>
      </div>

        <div class="form-group">
          <div class="actions">
            <div class="center-btn py-3 my-4" align="center">
              <input  class = "action btn  btn-danger shadow" type="submit" value="Register New User" />
            </div>
          </div>
          <div id="alert1" class="alert alert-danger" role="alert" style="display: none; margin-top: 5%;">
      Passwords do not match
    </div>
    <div id="alert2" class="alert alert-danger" role="alert" style="display: none; margin-top: 5%;">
      User already exists. Please login
    </div>
    <script type="text/javascript">
    function displayError1(){
      document.getElementById("alert1").style.display = "block";
    }
    function displayError2(){
      document.getElementById("alert2").style.display = "block";
    }
    </script>
    <?php
    if(is_post_request()){
      if(user_exists($_POST['email_address'])){
        echo '<script type="text/javascript"> displayError2(); </script>';
      }
      else if(strcmp($_POST['password_'], $_POST['password_confirmed']) == 0){
         register_new_user();
         header("Location: /en/public");
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
