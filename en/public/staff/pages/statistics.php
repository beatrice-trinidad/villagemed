<?php require_once('../../../private/initialize.php');
header("Cache-Control: no cache");
session_start();
$_SESSION['page'] = "check_in";
if($_SESSION['user'] == NULL){
  header("Location: /en/public");
}
?>
<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php');
$stats = get_stats();
?>

<div class="container">
    <div class="row">
      <div class="col-md-12">

        <h2 id="heading" class="text-danger text-center mb-5">Statistics</h2>

        <div class="table-responsive h-100 justify-content-center align-items-center">
          <table class="checkin table shadow-sm p-1 mb-2 bg-white rounded">
            <thead class="checkin">
              <tr>
                <th class="p-3 mb-2" scope="col">Date</th>
                <th class="p-3 mb-2" scope="col">Total Patients Seen</th>
              </tr>
            </thead>
            <?php while($stat = mysqli_fetch_assoc($stats)) { ?>
            <tr>
              <td>
                <?php echo h($stat["date"]); ?>
              </td>
              <td>
                <?php echo h($stat["patients_seen"]); ?>
              </td>
            </tr>
            <?php } ?>
          </table>

          <?php
    mysqli_free_result($patient_set);
    ?>

        </div>
      </div>
      <!--column-->
    </div>
    <!--row-->
  </div>
  <!--container-->

  </body>

  </html>
