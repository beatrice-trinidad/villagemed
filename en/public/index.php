<?php
require_once('../private/initialize.php');
date_default_timezone_set("America/New_York");
?>
<html lang="en">
<head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>VillageMED Login Form</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
</head>
<body>

        <div class="container">
          <nav class="navbar navbar-expand-lg navbar-light bg-light flex-column">
            <div class="row">
              <img class="navbar-brand" align="center" src="images/vMedLogo.png" alt="logo">
            </div>
          </nav>
          <br>
          <br>
        <form class="form-horizontal" role="form" method="POST" >
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h2 class= "text-danger">Please Login</h2>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group has-danger">
                        <label class="sr-only" for="email">E-Mail Address</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-at"></i></div>
                            <input type="text" name="email" class="form-control" id="email"
                                   placeholder="you@example.com" required autofocus>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">

                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="sr-only" for="password">Password</label>
                        <div class="input-group mb-2 mr-sm-2 mb-sm-0">
                            <div class="input-group-addon" style="width: 2.6rem"><i class="fa fa-key"></i></div>
                            <input type="password" name="password" class="form-control" id="password"
                                   placeholder="Password" required>
                        </div>
                    </div>
                    <div id="alert1" class="alert alert-danger" role="alert" style="display: none; margin-top: 5%;">
                      Your email/password combination is incorrect
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="form-control-feedback">
                        <span class="text-danger align-middle">
                        </span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-6" style="padding-top: .35rem">
                    <div class="form-check mb-2 mr-sm-2 mb-sm-0">
                        <label class="form-check-label">
                            <input class="form-check-input" name="remember"
                                   type="checkbox" >
                            <span style="padding-bottom: .15rem">Remember me</span>
                        </label>
                    </div>
                </div>
            </div>
            <div class="row" style="padding-top: 1rem">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <button type="submit" class="btn btn-danger"><i class="fa fa-sign-in"></i> Login</button>
                    <a class="btn btn-link text-warning" href="./newuser.php">Register New User</a>
                    <a class="btn btn-link text-warning" href="#">Forgot Your Password?</a>
                </div>
            </div>
        </form>
    </div>
<script type="text/javascript">
function displayError1(){
  document.getElementById('alert1').style.display = "block";
}
</script>
<?php
if(is_post_request()){
  if(login_user() == 1){
    session_start();
    $_SESSION['user'] = 1;
    header("Location: /en/public/staff/index.php");
  }
  else{
    echo '<script type="text/javascript"> displayError1(); </script>';
  }
}
?>
</body>
</html>
