<?php require_once('../../../private/initialize.php'); ?>

<?php
// $id = isset($_GET['id']) ? $_GET['id'] : '1';
$id = $_GET['id'] ?? '1'; // PHP > 7.0
$patient = find_patient_by_id($id);
?>

<?php $page_title = 'Show Page'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="page show">

    <h1>Patient: <?php echo h($patient['fname']); ?> <?php echo h($patient['lname']); ?></h1>
    <div class ="attributes">
      <dl>
        <dt>Gender</dt>
        <dd><?php echo h($patient['gender']);?></dd>
      </dl>
      <dl>
        <dt>Date of Birth</dt>
        <dd><?php echo h($patient['dob']);?></dd>
      </dl>
      <dl>
        <dt>Age</dt>
        <dd><?php echo h($patient['age']);?></dd>
      </dl>
      <dl>
        <dt>Guardian's Name</dt>
        <dd><?php echo h($patient['GRname']);?></dd>
      </dl>
      <dl>
        <dt>Guardian's Email</dt>
        <dd><?php echo h($patient['GRemail']);?></dd>
      </dl>
      <dl>
        <dt>Guardian's Phone</dt>
        <dd><?php echo h($patient['GRphone']);?></dd>
      </dl>


  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
