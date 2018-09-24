<?php require_once('../../../private/initialize.php'); ?>
<?php
if(is_post_request()){
  if(isset($_POST['ticket'])){
    $check_in_patient = get_patient_by_id($_POST['id']);
    $check_in_patient['ticket'] = $_POST['ticket'];
    check_in_patient($check_in_patient);
    header("Location: /villagemed-master/public/staff/index.php");
  }
  $fname = $_POST['fname'];
  $lname = $_POST['lname'];
  $patient_set = filter_patients($fname, $lname);
}
else{
  $patient_set = find_all_patients();
}
?>

<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class = "container h-100">
  <div class ="row h-100 justify-content-center">
    <div class = "col-md-12">
      <h2 id="heading" class= "text-danger" align= "center" >Check-In Patient</h2>
      <br>
      <div class="actions">
        <div class="center-btn" align="center">
          <a class="action btn btn-danger" href="<?php echo url_for('/staff/pages/new.php'); ?>">Register New Patient</a>
        </div>
      </div>
      <h6 align="center"> Or </h6>
      <br>
      <div class="shadow p-3 mb-5 bg-white rounded">
        <h5> Search Existing Patient </h5>
        <form method="post">
          <div class="form-row">
            <div class="col">
              <input type="text" class="form-control" placeholder="First name" name="fname">
            </div>
            <div class="col">
              <input type="text" class="form-control" placeholder="Last name" name="lname">
            </div>
          </div>
          <br>
          <fieldset class="form-group">
            <div class="center-btn" align="center">
              <i class="fa fa-search"></i> <input class = "action btn btn-danger" type="submit" value="Search" />
            </div>
          </fieldset>
        </form>
      </div>
      <br>
      <div class="table-responsive">
        <table class="table">
          <tr class = "shadow p-1 mb-2 bg-white rounded">
            <th>No.</th>
            <th>Name</th>
            <th>Gender</th>
            <th>Date of Birth</th>
            <th>Ticket</th>
            <th>Check-In</th>
            <!--  <th>View</th> -->
            <th>Edit</th>
            <!--  <th>Delete</th>-->
          </tr>
          <?php while($patient = mysqli_fetch_assoc($patient_set)) { ?>
            <form method="post">
              <tr>
                <input type="hidden" name="id" value="<?php echo h($patient['id']); ?>"/>
                <td><?php echo h($patient['id']); ?></td>
                <td><?php echo h($patient['fname']); ?></td>
                <td><?php echo h($patient['gender']); ?></td>
                <td><?php echo h($patient['dob']); ?></td>
                <td><input type="text" style="width:40px;" name="ticket" required/></td>
                <td><input class="action btn btn-danger" type="submit" value="Check-In"/></td>
                <!-- <td><a class="action" href="<?php echo url_for('/staff/pages/show.php?id=' . h(u($patient['id']))); ?>">View</a></td>-->
                <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($patient['id']))); ?>"><input type="button" class="action btn btn-primary" value="Edit"/></a></td>
                <!--  <td><a class="action" href="<?php echo url_for('/staff/pages/delete.php?id=' .h(u($patient['id']))); ?>">Delete</a></td>-->
              </tr>
            </form>
          <?php } ?>
        </table>
        <?php
        mysqli_free_result($patient_set);
        ?>
      </div>
    </div><!--column-->
  </div><!--row-->
</div><!--container-->
</body>
</html>
