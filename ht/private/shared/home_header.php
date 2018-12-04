<?php
  if(!isset($page_title)) { $page_title = 'Staff Area'; }?>
  <?php require_once('../../private/initialize.php'); ?>
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
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/bootstrap.min.css'); ?>">
    <link rel="stylesheet" href="<?php echo url_for('/stylesheets/staff.css'); ?>">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

  </head>

  <body>

    <div class ="container-fluid">
            <nav class=" shadow p-3 mb-5 bg-white rounded navbar navbar-expand-lg navbar-light flex-row">
                <img class="navbar-brand  mx-auto" align="center" src="<?php echo url_for('/images/vMedLogo.png'); ?>" alt="logo"/>
          </div>
