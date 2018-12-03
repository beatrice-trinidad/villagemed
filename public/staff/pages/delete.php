<?php

require_once('../../../private/initialize.php');
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /public");
}
if(!isset($_GET['id'])) {
  redirect_to(url_for('/staff/pages/index.php'));
}
$id = $_GET['id'];



if(is_post_request()) {
  $result = delete_patient($id);
redirect_to(url_for('/staff/pages/index.php'));
}
else{
  $patient= find_patient_by_id($id);
}

?>

<?php $page_title = 'Delete Patient'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div id="content">

  <a class="back-link" href="<?php echo url_for('/staff/pages/index.php'); ?>">&laquo; Back to List</a>

  <div class="subject delete">
    <h1>Delete Patient</h1>
    <p>Are you sure you want to delete this Patient record?</p>
    <p class="item"><?php echo h($patient['fname']); ?> <?php echo h($patient['lname']); ?></p>

    <form action="<?php echo url_for('/staff/pages/delete.php?id=' . h(u($patient['id']))); ?>" method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Delete Patient" />
      </div>
    </form>
  </div>

</div>

<?php include(SHARED_PATH . '/staff_footer.php'); ?>
