<?php require_once('../../private/initialize.php');
if(date('H') == 0 && date('i') == 0) {
    if(save_pinfo() == 1){
      clear_pinfo();
      clear_pvisit();
    }
}
session_start();
if($_SESSION['user'] == NULL){
  header("Location: /public");
}
?>
<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/home_header.php'); ?>
<?php $patient_set = find_pvisit_patients(); ?>
<div class = "container">
  <div class ="row">
    <div class = "col-md-12">
<div>
  <div class='btn-toolbar pull-right'>
              <div class='btn-group'>
                  <a href="<?php echo url_for('/staff/pages/index.php'); ?>" class='btn btn-danger'><i class="fa fa-user"></i> Check-In</a>
              </div>
          </div>
          <h2 id="heading" class= "text-danger">Patients Waiting Today: <?php echo number_of_patients_waiting() ?></h2>
</div>
<div>
  <h5 class = 'pull-left'>Total Seen: <?php echo number_of_patients_seen() ?></h5>
</div>



<br>
<div class="table-responsive h-100 justify-content-center align-items-center">
<table class="table shadow p-1 mb-2 bg-white rounded ">
  <thead>
    <tr>
      <th class= "shadow p-3 mb-2 bg-white rounded" scope="col">No.</th>
      <th class= "shadow p-3 mb-2 bg-white rounded" scope="col">Name</th>
      <th class= "shadow p-3 mb-2 bg-white rounded" scope="col">Ticket</th>
      <th class= "shadow p-3 mb-2 bg-white rounded" scope="col">Vitals</th>
      <th class= "shadow p-3 mb-2 bg-white rounded" scope="col">Exam</th>
      <th class= "shadow p-3 mb-2 bg-white rounded" scope="col">Prescription</th>
      <th class= "shadow p-3 mb-2 bg-white rounded" scope="col">Dispense</th>
    </tr>
  </thead>
  <tbody>
    <?php while($patient = mysqli_fetch_assoc($patient_set)) {
      if($patient['vitals'] == '0' && $patient['exam'] == '0' && $patient['prescription'] == '0' && $patient['dispense'] == '0'){?>
      <tr>
        <td class = "align-middle" scope="row"><?php echo h($patient['pid']); ?></td>
        <td class = "align-middle" ><?php echo h($patient['fname']); ?></td>
        <th class = "align-middle" ><?php echo h($patient['ticket']); ?></th>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/vitals.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/vital.png" ></td>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/exam.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/exam.png" ></td>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/prescription.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/presc.png" ></td>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/dispense.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/dispense.png" ></td>
      </tr>
    <?php }
    else if($patient['vitals'] == '1' && $patient['exam'] == '0' && $patient['prescription'] == '0' && $patient['dispense'] == '0'){?>
      <tr>
        <td class = "align-middle" scope="row"><?php echo h($patient['pid']); ?></td>
        <td class = "align-middle" ><?php echo h($patient['fname']); ?></td>
        <th class = "align-middle" ><?php echo h($patient['ticket']); ?></th>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/exam.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/exam.png" ></td>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/prescription.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/presc.png" ></td>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/dispense.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/dispense.png" ></td>
      </tr>
    <?php }
    else if($patient['vitals'] == '1' && $patient['exam'] == '1' && $patient['prescription'] == '0' && $patient['dispense'] == '0'){?>
      <tr>
        <td class = "align-middle" scope="row"><?php echo h($patient['pid']); ?></td>
        <td class = "align-middle" ><?php echo h($patient['fname']); ?></td>
        <th class = "align-middle" ><?php echo h($patient['ticket']); ?></th>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/prescription.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/presc.png" ></td>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/dispense.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/dispense.png" ></td>
      </tr>
    <?php }
    else if($patient['vitals'] == '1' && $patient['exam'] == '1' && $patient['prescription'] == '1' && $patient['dispense'] == '0'){?>
      <tr>
        <td class = "align-middle" scope="row"><?php echo h($patient['pid']); ?></td>
        <td class = "align-middle" ><?php echo h($patient['fname']); ?></td>
        <th class = "align-middle" ><?php echo h($patient['ticket']); ?></th>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
        <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/dispense.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/dispense.png" ></td>
      </tr>
    <?php } else if($patient['vitals'] == '1' && $patient['exam'] == '1' && $patient['prescription'] == '1' && $patient['dispense'] == '1'){?>
      <tr>
        <td class = "align-middle" scope="row"><?php echo h($patient['pid']); ?></td>
        <td class = "align-middle" ><?php echo h($patient['fname']); ?></td>
        <th class = "align-middle" ><?php echo h($patient['ticket']); ?></th>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
        <td class = "align-middle" ><img src="../images/done.png" ></td>
      </tr>
    <?php } ?>
  <?php } ?>
  </tbody>
</table>
</div><!--table-->
</div><!--col -->
</div><!--row-->
</div><!-- fluid-container-->
</body>
</html>
