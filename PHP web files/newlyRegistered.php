<?php
  session_start();

  if($_SESSION['CHECK_VAL']==null)
  {
     //echo $_SESSION['CHECK_VAL'];
     session_destroy();
     header("location:login.php?");
  }

  $empid = $_SESSION['REG_ID'];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>Transport Workers Database Management System</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Page level plugin CSS-->
  <link href="vendor/datatables/dataTables.bootstrap4.css" rel="stylesheet">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">


  <!-- Navigation-->

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Transport Workers Database Management System</a>

    <!-- unused -->
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button> <!--END unused -->


    <!-- left nev bar start -->
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="oneEmp.php?id=<?php echo $empid?>">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">My Profile</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="index.php">
            <span class="nav-link-text">Current Employees</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="newlyRegistered.php">
            <span class="nav-link-text">Newly Registered</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <span class="nav-link-text">Vehicles and Roads</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="allVehicles.php">Vehicles</a>
            </li>
            <li>
              <a href="allRoutes.php">Roads</a>
            </li>
          </ul>
        </li>



                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                  <a class="nav-link" href="exemployee.php">
                    <span class="nav-link-text">Ex Employees</span>
                  </a>
                </li>









      </ul>


  <!-- Top menu bar start -->

      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>

      <ul class="navbar-nav ml-auto">



        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
      <!-- Top menu bar end -->

    </div>
  </nav>

<!--end of nevigation bar -->>

<!--end of nevigation bar -->>




  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">My Dashboard</li>
      </ol>
    </div>










    <!-- Example DataTables Card-->
    <div class="card mb-3">
      <div class="card-header">



      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>NID</th>
                <th>TYPE</th>
                <th>Status</th>
                <th>Update</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th>ID</th>
                <th>Name</th>
                <th>NID</th>
                <th>TYPE</th>
                <th>Status</th>
                <th>Update</th>
              </tr>
            </tfoot>
            <tbody>



        <!-- connection stablished -->

        <?php

            $con = oci_connect('final','final','localhost/XE');
            if(!$con)
            {
              $e = oci_error();
              trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
            }

//            error_reporting(0);
//            ini_set('display_errors', 0);

            $one=1;
            $stid = oci_parse($con, "select AUTO_ID, first_name ||' '|| MIDDLE_NAME ||' '|| last_name, emp_nid, emp_type from temp_employee where EMP_STATUS_NO = 1");
//          oci_bind_by_name($stid, ':one', $one);
            oci_execute($stid);

            while($row = oci_fetch_array($stid))
            {
          ?>
          <form action="" method="POST">
              <tr>
                <td>
                <div class="form-group">
                <input id="lala" name="new_id" value="<?php echo $row[0] ?>">
               </div>
              </td>

                <td> <?php echo $row[1] ?> </td>
                <td> <?php echo $row[2] ?> </td>
                <td> <?php echo $row[3] ?> </td>

                <td>

                  <div class="form-group">
                  <select id="lala" name="promo">
                    <option value=2>Driver</option>
                    <option value=3>Conductor</option>
                    <option value=4>Office Worker</option>
                    <option value=5>Supervisor</option>
                  </select>
                </div>


                    <input type="submit" name ="submit" value="update">

                 </td>

              </tr>
            </form>

          <?php  }

          if (isset($_POST['submit'])){
            //$promo_var = $_POST['promo'];
            //$_SESSION['promo'] = $promo_var;
            //header("location:promote.php?");
            $promo_var = $_POST['promo'];
//            echo $promo_var;

            //$_SESSION['promo_var'] = $promo_var;
            $id = $_POST['new_id'];
//            echo $id;



            $p1 = oci_parse($con, "Update final.reginfo set CHECK_VAL='$promo_var'
                where REG_ID='$id'");
              	oci_execute($p1);
            $p1 = oci_parse($con, "Update final.temp_employee set EMP_STATUS_NO='$promo_var'
                where AUTO_ID='$id'");
              	oci_execute($p1);
            $p1 = oci_parse($con, "Update final.temp_qualification set EMP_STATUS_NO='$promo_var'
               where AUTO_ID='$id'");
               oci_execute($p1);
            $p1 = oci_parse($con, "Update final.TEMP_Healthinfo set EMP_STATUS_NO='$promo_var'
               where AUTO_ID='$id'");
               oci_execute($p1);



            //$_SESSION['promo_id'] = $id;

            //header("location:promote.php?");
            //exit();

          }else{
                //header("location:promote.php?");
          }



//          $_SESSION['promo'] = $

          oci_free_statement($stid);
          oci_close($con);
          ?>

          </tbody>

          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">Transport workers database management system</div>
    </div>
  </div>


















    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/chart.js/Chart.min.js"></script>
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <script src="js/sb-admin-charts.min.js"></script>
  </div>
</body>

</html>
