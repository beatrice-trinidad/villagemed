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
      <textarea class="form-control" id="exampleFormControlTextarea1" rows = "4"></textarea>
    </div>
    <br>
    <div class = "container-fluid" style="border:1px solid #cecece; padding: 20px;">
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Drug Name</label>
        <div class="col-sm-6">
          <input type="text" readonly class="form-control-plaintext" id="inputdrug" value = "drug1">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Dosage</label>
        <div class="col-sm-6">
          <input type="text" readonly class="form-control-plaintext" id="inputdrug" value = "3 times a day, 5 ml">
        </div>
      </div>
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-3 col-form-label">Quantity</label>
        <div class="col-sm-6">
          <input type="text" readonly class="form-control-plaintext" id="inputdrug" value = "500ml">
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
