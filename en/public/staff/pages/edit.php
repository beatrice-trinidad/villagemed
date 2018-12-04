<?php

require_once('../../../private/initialize.php');
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /en/public");
}
if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];
if(is_post_request()) {
  $patient = [];
  $patient['id'] = $id;
  $patient['fname'] = $_POST['fname'] ?? '';
  $patient['lname'] = $_POST['lname'] ?? '';
  $patient['gender'] = $_POST['gender'] ?? '';
  $patient['dob'] = $_POST['dob'] ?? '';
  $patient['age'] = $_POST['age'] ?? '';
  $patient['GRname'] = $_POST['GRname'] ?? '';
  $patient['GRemail'] = $_POST['GRemail'] ?? '';
  $patient['GRphone'] = $_POST['GRphone'] ?? '';
  $result = update_patient($patient);
  if($result === true){
    redirect_to(url_for('/staff/pages/index.php'));
  }
  else{
    $errors = $result;
  }
}
else{
  $patient = get_patient_by_uid(get_puid_by_id($id));
}
?>

<?php $page_title = 'Edit Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">



  <div class="page edit">
    <h1>Edit Page</h1>
    <?php echo display_errors($errors); ?>

    <form action="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($id))); ?>" method="post">
      <!--  <dl>
      <dt>Ticket Number</dt>
      <dd><input type="text" name="menu_name" value="<?php echo h($visit['ticket']); ?>" /></dd>
    </dl>-->
    <dl>
      <dt>First Name</dt>
      <dd><input type="text" name="fname" value="<?php echo h($patient['fname']); ?>" /></dd>
      <!--  <select name="position">
      <option value="1"<?php if($position == "1") { echo " selected"; } ?>>1</option>
    </select>-->
  </dd>
</dl>
<dl>
  <dt>Last Name</dt>
  <dd><input type="text" name="lname" value="<?php echo h($patient['lname']); ?>" />
    <!--  <input type="hidden" name="visible" value="0" />
    <input type="checkbox" name="visible" value="1"<?php if($visible == "1") { echo " checked"; } ?> />-->
  </dd>
</dl>
<dl>
  <dt>Gender</dt>
  <dd><input type="text" name="gender" value="<?php echo h($patient['gender']); ?>" />
  </dd>
</dl>
<dl>
  <dt>Date of Birth</dt>
  <dd><input type="text" name="dob" value="<?php echo h($patient['dob']); ?>" />
  </dd>
</dl>

<dl>
  <dt>Age</dt>
  <dd><input type="text" name="age" value="<?php echo h($patient['age']); ?>" />
  </dd>
</dl>

<dl>
  <dt>Guardian's Name</dt>
  <dd><input type="text" name="GRname" value="<?php echo h($patient['GRname']); ?>" />
  </dd>
</dl>
<dl>
  <dt>Guardian's Email</dt>
  <dd><input type="text" name="GRemail" value="<?php echo h($patient['GRemail']); ?>" />
  </dd>
</dl>
<dl>
  <dt>Guardian's Phone</dt>
  <dd><input type="text" name="GRphone" value="<?php echo h($patient['GRphone']); ?>" />
  </dd>
</dl>
<div id="operations">
  <input class="action btn btn-danger" type="submit" value="Update" />
</div>
</form>

</div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
