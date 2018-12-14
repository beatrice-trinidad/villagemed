<?php
require_once('../private/initialize.php');
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
    <link rel="stylesheet" href="/villagemed-master/en/public/stylesheets/staff.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/villagemed/public/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">



      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




  </head>

  <body>

  <nav class="navbar navbar-expand-md navbar-light bg-white mb-5">
    <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link back" href="javascript:history.back()"><i class="fa fa-chevron-left mr-2" aria-hidden="true"></i>Back</a>
        </li>
      </ul>
    </div>
    <div class="mx-auto order-0">
      <img class="navbar-brand mx-auto" src="images/vMedLogo.png" alt="logo" />
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
          <span class="navbar-toggler-icon"></span>
      </button>
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

    <div class="col-md-12">
      <div class="row">
        <h2 id="heading" class="text-danger text-center mb-4 w-100">Register New User</h2>
      </div>

    <br>
      <form action="/villagemed/public/staff/pages/new.php" method="post">

      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
            <label for="name" class="">First Name</label>
            <input type="text" name="fname" class="form-control" id="email" value="" required="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
            <label for="name">Last Name</label>
            <input type="text" name="lname" class="form-control" id="pwd" value="" required="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="pwd">Email Address</label>
            <input type="email" name="email_address" class="form-control" id="pwd" value="" required="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
            <label for="pwd">Password</label>
            <input type="password" name="password_" class="form-control" id="pwd" value="" required="">
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-7">
          <div class="form-group">
            <label for="pwd">Re-type Password</label>
            <input type="password" name="password_confirmed" class="form-control" id="pwd" value="" required="">
          </div>
        </div>
      </div>
      <div class="row">
      <div class="col-md-6 mb-2">
        <label for="pwd">Role</label>
        <div class="form-check pl-0">
          <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" id="jevattend_id" value="Administration">
                      Administration
          </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" id="jevattend_id" value="Nurse">
                      Nurse
                    </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" id="jevattend_id" value="Medical Volunteer">
                      Medical Volunteer
                    </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                      <input class="form-check-input" type="radio" name="role" id="jevattend_id" value="Non-Medical Volunteer">
                      Non-Medical Volunteer
            </label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6">
        <label for="pwd">Preferred Language</label>
        <div class="form-check pl-0">
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                    <input class="form-check-input" type="radio" name="language" id="jevattend_id" value="English">
                    English
                  </label>
            <label class="btn btn-light d-flex justify-content-start px-4 w-100">
                    <input class="form-check-input" type="radio" name="language" id="jevattend_id" value="Haitian">
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
    <script type="text/javascript">
    function displayError1(){
      document.getElementById("alert1").style.display = "block";
    }
    </script>
    <?php
    if(is_post_request()){
      if(strcmp($_POST['password_'], $_POST['password_confirmed']) == 0){
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
