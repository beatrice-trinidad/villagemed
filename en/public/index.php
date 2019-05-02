<?php
require_once('../private/initialize.php');
date_default_timezone_set("America/New_York");
session_start();
$_SESSION['page'] = "login";
?>
  <html lang="en">

  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
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

    <nav class="navbar navbar-expand-sm navbar-light bg-white mb-5 shadow-sm">
      <div class="navbar-collapse collapse w-100 order-1 order-sm-0 dual-collapse2">
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

      <div class="container">
      <form class="form-horizontal" role="form" method="POST">
        <div class="row">
          <h2 id="heading" class="text-danger text-center mb-4 w-100">Welcome to VillageMED</h2>
        </div>
        <div class="row">
          <div class="col"></div>
          <div class="col-sm-10">
            <div class="form-group has-danger">
              <label class="sr-only" for="email">Email Address</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                <input type="text" name="email" class="form-control" id="email" placeholder="you@example.com" required autofocus>
              </div>
            </div>
          </div>
          <div class="col">
            <div class="form-control-feedback">
              <span class="text-danger align-middle">
              </span>
            </div>
          </div>
        </div><!-- end row --->
        <div class="row">
          <div class="col"></div>
          <div class="col-sm-10">
            <div class="form-group">
              <label class="sr-only" for="password">Password</label>
              <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
              </div>
            </div>
            <div id="alert1" class="alert alert-danger" role="alert" style="display: none; margin-top: 5%;">
              Your email/password combination is incorrect - Try again.
            </div>
          </div>
          <div class="col">
            <div class="form-control-feedback">
              <span class="text-danger align-middle">
              </span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col"></div>
          <div class="col">
            <a class="btn btn-link text-warning" href="./newuser.php">Register New User</a>
          </div>
          <div class="col"></div>
        </div>
        <div class="center-btn py-3" align="center">
          <button type="submit" class="action btn btn-danger shadow">Login<i class="fa fa-sign-in ml-1"></i></a>
        </div>

        </div>
      </form>
    </div>
    <script type="text/javascript">
      function displayError1() {
        document.getElementById('alert1').style.display = "block";
      }
    </script>
    <?php
if(is_post_request()){
  if(login_user() == 1){
    session_start();
    $_SESSION['user'] = 1;
    $_SESSION['uid'] = get_current_uid();
    header("Location: /en/public/staff/index.php");
  }
  else{
    echo '<script type="text/javascript"> displayError1(); </script>';
  }
}
?>
  </body>

  </html>
