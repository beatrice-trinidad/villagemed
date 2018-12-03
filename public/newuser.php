<?php
require_once('../private/initialize.php');
?>
<!doctype html>

<html lang="en">
  <head>
    <!-- Standard Meta -->
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <!-- Site Properties -->
    <title>VillageMED</title>
    <!-- Stylesheets -->
    <link rel="stylesheet" href="/villagemed/public/stylesheets/staff.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="/villagemed/public/stylesheets/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">



      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>




  </head>

  <body>
<form method="post">
<div class ="container-fluid">
        <nav class=" shadow p-3 mb-3 bg-white rounded navbar navbar-expand-lg navbar-light flex-row">
          <a href="javascript:history.back()"><img src="images/smallback.png"/></a>
            <a class= "mx-auto" href="staff/index.php"><img class="navbar-brand" src="images/vMedLogo.png" alt="logo"/></a>
        </nav>
      </div>

<div class="container" id="content">
<div class = "row">
<div class = "col-md-12">
  <div class="page new">
    <h2 id="heading" class= "text-danger">Register New User</h2>
    <br>
    <form action="/villagemed/public/staff/pages/new.php" method="post">
<div class= "row">
  <div class="col-md-6">
      <div class="form-group">
    <label for="name">First Name:</label>
    <input type="text" name="fname" class="form-control" id="email" value="" required>
  </div>
</div>
  <div class="col-md-6">
  <div class="form-group">
    <label for="pwd">Last Name:</label>
    <input type="text" name="lname" class="form-control" id="pwd" value="" required>
  </div>
</div>
</div>

<div class="row">
  <div class="col">
    <div class="form-group">
      <label for="pwd">Email Address:</label>
      <input type="email" name="email_address" class="form-control" id="pwd" value="" required>
    </div>
  </div>
</div><!--row-->

<div class="row">
  <div class="col-md-6">
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" name="password_" class="form-control" id="pwd" value="" required>
  </div>
</div>
<div class="col-md-6">
  <div class="form-group">
    <label for="pwd">Re-type Password:</label>
    <input type="password" name="password_confirmed" class="form-control" id="pwd" value="" required>
  </div>
</div><!--col-->
</div><!--row-->

<div class="row">
  <div class="col-md-6">
    <div class="row">
      <div class = "col-md-6">
        <div class="form-group">
           <label for="user-role">Role</label>
           <select name="role" class="form-control" id="user-role">
             <option>Administration</option>
             <option>Nurse</option>
             <option>Medical Volunteer</option>
             <option>Non-Medical Volunteer</option>
           </select>
         </div>
      </div>
      <div class = "col-md-6">
        <div class="form-group">
           <label for="nationality">Nationality</label>
           <select name="nationality" class="form-control" id="nationality">
             <option>Haitian</option>
             <option>American</option>
             <option>Other</option>
           </select>
         </div>
        </div>
      </div>
    </div>
    <div class="col-md-6">
  <div class="form-group">
    <div class="mx-auto" id="operations">
    <span class="align-bottom">  <input  class = "action btn btn-block btn-danger" type="submit" value="Register New User" /></span>
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
         header("Location: /public");
      }
      else{
        echo '<script type="text/javascript"> displayError1(); </script>';
      }
    }
    ?>
  </div>
</div><!--col-->
</div><!--row-->

</div>
</div>







  </form>

</div><!--page-new-->
</div><!--col-->
</div><!--row-->
</div><!--container-->
</form>
</body>
</html>
