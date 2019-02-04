<?php require_once('../../private/initialize.php');
if(date('H') == 0 && date('i') == 0) {
    if(save_pinfo() == 1){
      clear_pinfo();
      clear_pvisit();
    }
}
session_start();
$_SESSION['page'] = "queue";
if($_SESSION['user'] == NULL){
  header("Location: /en/public");
}
?>
<?php $page_title = 'Staff Menu'; ?>
<?php include(SHARED_PATH . '/home_header.php'); ?>
<?php $patient_set = find_pvisit_patients(); ?>
<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2 id="heading" class="text-danger text-center mb-4">Patient Queue</h2>

      <div class="row">
        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body px-3 py-3">
              <h3 class="card-title text-danger mb-0" id="heading"><?php echo number_of_patients_waiting() ?></h3>
              <h6 class="card-title text-danger mb-0 pb-0" id="heading">Patients Currently Waiting</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card text-center shadow-sm">
            <div class="card-body px-2 py-3">
              <h3 class="card-title text-danger mb-0" id="heading"><?php echo number_of_patients_seen() ?></h3>
              <h6 class="card-title text-danger mb-0 pb-0" id="heading">Total Patients Seen Today</h6>
            </div>
          </div>
        </div>
        <div class="col-md-4 my-auto">
          <div class="btn-toolbar justify-content-center">
            <div class='btn-group shadow'>
              <a href="<?php echo url_for('/staff/pages/index.php'); ?>" class='btn btn-danger'><i class="fa fa-user mr-2"></i> Check-In Patient</a>
            </div>
          </div>
        </div>
      </div>

      <br>
      <div class="table-responsive h-100 justify-content-center align-items-center">
        <table class="table shadow-sm p-1 mb-2 bg-white rounded">
          <thead class="pqueue-head">
            <tr>
              <th class="p-3 mb-2" scope="col">Ticket</th>
              <th class="p-3 mb-2" scope="col">Name</th>
              <th class="p-3 mb-2" scope="col">Vitals</th>
              <th class="p-3 mb-2" scope="col">Exam</th>
              <th class="p-3 mb-2" scope="col">Prescription</th>
              <th class="p-3 mb-2" scope="col">Dispense</th>
            </tr>
          </thead>
          <tbody>
            <?php while($patient = mysqli_fetch_assoc($patient_set)) {
              if($patient['vitals'] == '0' && $patient['exam'] == '0' && $patient['prescription'] == '0' && $patient['dispense'] == '0'){?>
              <tr>
                <td class = "align-middle" ><?php echo h($patient['ticket']); ?></td>
                <td class = "align-middle" ><?php echo get_patient_by_uid($patient['pid'])['fname']; ?></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/vitals.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/vital.png" ></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/exam.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/exam.png" ></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/prescription.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/presc.png" ></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/dispense.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/dispense.png" ></td>
              </tr>
            <?php }
            else if($patient['vitals'] == '1' && $patient['exam'] == '0' && $patient['prescription'] == '0' && $patient['dispense'] == '0'){?>
              <tr>
                <td class = "align-middle" ><?php echo h($patient['ticket']); ?></td>
                <td class = "align-middle" ><?php echo h($patient['fname']); ?></td>
                <td class = "align-middle" ><img src="../images/done.png" ></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/exam.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/exam.png" ></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/prescription.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/presc.png" ></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/dispense.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/dispense.png" ></td>
              </tr>
            <?php }
            else if($patient['vitals'] == '1' && $patient['exam'] == '1' && $patient['prescription'] == '0' && $patient['dispense'] == '0'){?>
              <tr>
                <td class = "align-middle" ><?php echo h($patient['ticket']); ?></td>
                <td class = "align-middle" ><?php echo h($patient['fname']); ?></td>
                <td class = "align-middle" ><img src="../images/done.png" ></td>
                <td class = "align-middle" ><img src="../images/done.png" ></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/prescription.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/presc.png" ></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/dispense.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/dispense.png" ></td>
              </tr>
            <?php }
            else if($patient['vitals'] == '1' && $patient['exam'] == '1' && $patient['prescription'] == '1' && $patient['dispense'] == '0'){?>
              <tr>
                <td class = "align-middle" ><?php echo h($patient['ticket']); ?></td>
                <td class = "align-middle" ><?php echo h($patient['fname']); ?></td>
                <td class = "align-middle" ><img src="../images/done.png" ></td>
                <td class = "align-middle" ><img src="../images/done.png" ></td>
                <td class = "align-middle" ><img src="../images/done.png" ></td>
                <td class = "align-middle" ><a href="<?php echo url_for('/staff/pages/dispense.php?id=' . h(u($patient['pid'])) .'&ticket=' .h(u($patient['ticket'])));?>"><img src="../images/dispense.png" ></td>
              </tr>
            <?php } else if($patient['vitals'] == '1' && $patient['exam'] == '1' && $patient['prescription'] == '1' && $patient['dispense'] == '1'){?>
              <tr>
                <td class = "align-middle" ><?php echo h($patient['ticket']); ?></td>
                <td class = "align-middle" ><?php echo h($patient['fname']); ?></td>
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
