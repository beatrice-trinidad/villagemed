<?php
  if(!isset($page_title)) { $page_title = 'Staff Area'; }
?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class = "container-fluid">

  <div class="bg-white p-3 mb-4 w-100 shadow-sm">
    <div class="row pr-2 pl-2 mb-2">
      <div class="col-sm-4">
      <h5 class="text-danger font-weight-bold">Ticket: <?php echo $_GET['ticket']; ?></h5>
      </div>
      <div class="d-flex justify-content-end col-sm-4">
      </div>
      <div class="d-flex justify-content-end col-sm-4">
        <a href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u(get_patient_by_uid(get_uid_by_id($_GET['id']))['id']))); ?>" class="small"><i class="fa fa-pencil" aria-hidden="true"></i> Edit Patient Info</a>
      </div>
    </div>

    <div class="row">
        <div class="col-sm-4">
          <?php
            echo '<img class="img-fluid" src="data:image/png;base64,'.base64_encode(get_patient_image(get_uid_by_id($_GET['id']))).'"/>';
          ?>
        </div>
        <div class="col-sm-3">
          <div class="row mb-1">
            <h6 class="mb-0 font-weight-bold">Name</h6>
              <input type="text" readonly class="small form-control-plaintext" id="staticName" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['fname'] ?>">
          </div>
          <div class="row mb-1">
            <h6 class="mb-0 font-weight-bold">Gender</h6>
              <input type="text" readonly class="small form-control-plaintext" id="staticGender" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['gender'] ?>">
          </div>
          <div class="row mb-1">
            <h6 class="mb-0 font-weight-bold">Age</h6>
              <input type="text" readonly class="small form-control-plaintext" id="staticAge" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['age'] ?>">
          </div>
        </div>
        <div class="col-sm-5">
          <div class="row mb-1">
            <h6 class="mb-0 font-weight-bold">Guardian's Name</h6>
              <input type="text" readonly class="small form-control-plaintext" id="staticEmail" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['GRname'] ?>">
          </div>
          <div class="row mb-1">
            <h6 class="mb-0 font-weight-bold">Guardian's Email</h6>
              <input type="text" readonly class="small form-control-plaintext" id="staticEmail" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['GRemail'] ?>">
          </div>
          <div class="row mb-1">
            <h6 class="mb-0 font-weight-bold">Guardian's Phone Number</h6>
              <input type="text" readonly class="small form-control-plaintext" id="staticEmail" value="<?php echo get_patient_by_uid(get_uid_by_id($_GET['id']))['GRphone'] ?>">
          </div>
        </div>
      </div><!-- end row-->
    </div>
</div><!--container-->
