<?php
  if(!isset($page_title)) { $page_title = 'Staff Area'; }
?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class = "container-fluid">
  <div class ="row">
    <div class = "col-md-2">
      <h5>Ticket</h5>
      <div class ="container" style="border:1px solid #cecece;">
        <h3><?php echo $_GET['ticket']; ?></h3>
      </div>
    </div><!--col-md-2-->
    <div class = "col-md-10">
          <div class = "row" style = "font-weight: 500; font-size: 0.9em">
          <div class = "col-md-4">
        <div class="row row-bottom-margin">
    <label for="staticName" class="col-md-5 col-form-label">Name</label>
    <div class="col-md-7">
      <input type="text" readonly class="form-control-plaintext" id="staticName" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['fname'] ?>">
    </div>
  </div>
  <div class="row row-bottom-margin">
    <label for="staticGender" class="col-md-5 col-form-label">Gender</label>
    <div class="col-md-7">
      <input type="text" readonly class="form-control-plaintext" id="staticGender" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['gender'] ?>">
    </div>
  </div>

  <div class="row row-bottom-margin">
    <label for="staticAge" class="col-md-5 col-form-label">Age</label>
    <div class="col-md-7">
      <input type="text" readonly class="form-control-plaintext" id="staticAge" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['age'] ?>">
    </div>
  </div>
</div>

<div class = "col-md-5">
  <div class="row row-bottom-margin">
<label for="staticEmail" class="col-md-4 col-form-label">G.Name</label>
<div class="col-md-8">
<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['GRname'] ?>">
</div>
</div>
<div class="row row-bottom-margin">
<label for="staticEmail" class="col-md-4 col-form-label">G.Email</label>
<div class="col-md-8">
<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['GRemail'] ?>">
</div>
</div>
<div class="row row-bottom-margin">
<label for="staticEmail" class="col-md-4 col-form-label">G.Phone</label>
<div class="col-md-8">
<input type="text" readonly class="form-control-plaintext" id="staticEmail" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['GRphone'] ?>">
</div>
</div>

</div>

<div class = " container col-md-3">
    <?php
      echo '<img style="object-fit: cover;" width="200" height="200" src="data:image/png;base64,'.base64_encode(get_patient_image(get_uid_by_id($_GET['id']))).'"/>';
    ?>
</div>
      </div>
  </div><!--col-md-10-->
  </div><!--row-->
</div><!--container-->
