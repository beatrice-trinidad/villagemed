<?php require_once('../../../private/initialize.php');
header("Cache-Control: no cache");
session_start();
$_SESSION['page'] = "check_in";
if($_SESSION['user'] == NULL){
  header("Location: /en/public");
}
?>
<?php $page_title = 'Pages'; ?>
<?php include(SHARED_PATH . '/staff_header.php'); ?>

<div class="container">
  <div class="row">
    <div class="col-md-12">

      <h2 id="heading" class="text-danger text-center mb-5">Check-In Patient</h2>

      <div class="actions">
        <div class="center-btn pb-3 mb-4" align="center">
          <a class="action btn-lg btn-danger shadow" href="<?php echo url_for('/staff/pages/new.php'); ?>">Register New Patient</a>
        </div>
      </div>

        <h5 align="center" class="checkin pb-3 mb-4">- Or -</h5>

        <div class="search-patient">
          <form class="mx-2 my-auto d-inline w-100" method="post">
            <div class="input-group p-2">
                <input type="text" class="form-control border border-right-0" placeholder="Search Existing Patient" name="search">
                <span class="input-group-append">
                <button class="btn btn-danger my-2 my-sm-0" type="submit">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </div>

        <div id="alert1" class="alert alert-info" role="alert" style="display: none; margin-top: 5%;">
          Patient not found
        </div>

        <div id="alert2" class="alert alert-danger" role="alert" style="display: none; margin-top: 5%;">
          Patient already checked in
        </div>

        <script type="text/javascript">
        function displayError1() {
          document.getElementById("alert1").style.display = "block";
        }
        function displayError2() {
          document.getElementById("alert2").style.display = "block"
        }
        </script>
        <?php
        if(is_post_request()){
          if(isset($_POST['ticket'])){
            if(is_user_checked_in(get_puid_by_id($_POST['id'])) > 0){
              echo '<script type="text/javascript"> displayError2(); </script>';
            }
            else{
              $check_in_patient = get_patient_by_uid(get_puid_by_id($_POST['id']));
              $check_in_patient['ticket'] = $_POST['ticket'];
              check_in_patient($check_in_patient, get_puid_by_id($_POST['id']));
              header("Location: /en/public/staff/index.php");
            }
          }

          $search = $_POST['search'];
          $patient_set = filter_patients($search);
          if($patient_set == NULL){
            echo '<script type="text/javascript"> displayError1(); </script>';
          }
        }
        else{
          $patient_set = find_all_patients();
        }
        ?>

        <div class="table-responsive h-100 justify-content-center align-items-center">
          <table class="checkin table shadow-sm p-1 mb-2 bg-white rounded">
            <thead class="checkin">
              <tr>
                <th class="p-3 mb-2" scope="col">No.</th>
                <th class="p-3 mb-2" scope="col">First Name</th>
                <th class="p-3 mb-2" scope="col">Last Name</th>
                <th class="p-3 mb-2" scope="col">Date of Birth</th>
                <th class="p-3 mb-2" scope="col">Ticket</th>
                <th class="p-3 mb-2" scope="col">Check-In</th>
                <th class="p-3 mb-2" scope="col">Edit</th>
              </tr>
            </thead>

            <?php while($patient = mysqli_fetch_assoc($patient_set)) { ?>
              <form method="post">
                <tr>
                  <input type="hidden" name="id" value="<?php echo h($patient['id']); ?>"/>
                  <td class="align-middle"><?php echo h($patient['id']); ?></td>
                  <td class="align-middle"><?php echo h($patient['fname']); ?></td>
                  <td class="align-middle"><?php echo h($patient['lname']); ?></td>
                  <td class="align-middle"><?php echo h($patient['dob']); ?></td>
                  <td class="align-middle"><input type="text" style="width:40px;" name="ticket" required/></td>
                  <td><button class="action btn btn-danger btn-sm" type="submit">Check-In</button></td>
                  <td><a class="action" href="<?php echo url_for('/staff/pages/edit.php?id=' . h(u($patient['id']))); ?>"><i class="fa fa-pencil-square-o fa-2x"></i></a></td>
                </tr>
              </form>
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
