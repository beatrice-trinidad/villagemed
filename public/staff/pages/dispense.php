<?php require_once('../../../private/initialize.php'); ?>


<?php include(SHARED_PATH . '/pInfo_header.php'); ?>
<?php
  if(is_post_request()){
    update_patient_status("dispense", $_GET['id']);
    header("Location: /villagemed-master/public/staff/index.php");
  }
?>
<div class = "container-fluid">
  <div class ="col-md-12">
    <div class="form-group">
      <label for="exampleFormControlTextarea1">Treatment Plan</label>
      <textarea readonly class="form-control" id="exampleFormControlTextarea1" placeholder="N/A" rows = "4"><?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['treatment_plan']?></textarea>
    </div>
    <br>
    <div class = "container-fluid" style="border:1px solid #cecece; padding: 20px;">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Drug Name</label>
        <div class="col-sm-6">
          <input type="text" readonly class="form-control-plaintext" id="inputdrug" placeholder="N/A" value = "<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['drug_name']?>">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Dosage</label>
        <div class="col-sm-6">
          <input type="text" readonly class="form-control-plaintext" id="inputdrug" placeholder="N/A" value = "<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['dosage']?>">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Quantity</label>
        <div class="col-sm-6">
          <input type="text" readonly class="form-control-plaintext" id="inputdrug" placeholder="N/A" value = "<?php echo get_pinfo_by_uid(get_uid_by_id($_GET['id']))['quantity']?>">
        </div>
      </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <footer>
      <div class="shadow p-3 mb-1 bg-red rounded actions">
        <div class="center-btn" align="center">
          <form method="post">
          <a href="<?php echo url_for('/staff/index.php'); ?>"><input class="action btn btn-danger" type="submit" value="Medicine Dispensed"></input></a>
          </form>
      </div>
      </div>
    </footer>
  </div>
