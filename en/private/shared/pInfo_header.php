<?php
  if(!isset($page_title)) { $page_title = 'Staff Area'; }
?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>
<?php
if(is_post_request()){
  if(isset($_POST["confirm"])){
    header("Location: /en/public/staff/index.php");
    delete_patient(get_uid_by_id($_GET['id']));
  }
}
?>
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
            echo '<img class="img-fluid" style="transform: rotate(90deg); transform-origin: 31% 50%;" src="data:image/png;base64,'.base64_encode(get_patient_image(get_uid_by_id($_GET['id']))).'"/>';
          ?>
        </div>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                Are you sure you want to delete this patient?
              </div>
              <div class="modal-footer">
                <form method="post">
                  <input type="hidden" name="confirm" />
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                  <input type="submit" value="Confirm" class="btn btn-primary" />
                </form>
              </div>
            </div>
          </div>
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
          <div class="row mb-1">
            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
              Delete Patient
            </button>
          </div>
        </div>
      </div><!-- end row-->
    </div>
</div><!--container-->
