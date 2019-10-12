<?php
  session_start();

  $vari = $_GET['id'];

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
          <a class="nav-link" href="updateSalary.php?id=<?php echo $vari?>">
            <span class="nav-link-text">Update Salary</span>
          </a>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
          <a class="nav-link" href="supervisor.php?id=<?php echo $vari?>">
            <span class="nav-link-text">Employees Under</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="removeEmployeeSup.php?id=<?php echo $vari?>">
            <span class="nav-link-text">Remove employee</span>
          </a>
        </li>


                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                  <a class="nav-link" href="AssignedLeave.php?id=<?php echo $vari?>">
                    <span class="nav-link-text">Assign leave</span>
                  </a>
                </li>

                <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Charts">
                  <a class="nav-link" href="AssignedPenalty.php?id=<?php echo $vari?>">
                    <span class="nav-link-text">Assign penalty</span>
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

          <i class="fa fa-table"></i> ALL EMPLOYEE</div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>NID</th>
                    <th>BIRTH CERTIFICATE</th>
                    <th>FATHER NAME</th>
                    <th>MOTHER NAME</th>
                    <th>BIRTH DAY</th>
                    <th>JOINING DATE</th>
                    <th>LEAVING DATE</th>
                    <th>TYPE</th>
                    <th>REPORTS TO</th>
                    <th>ADDRESS</th>
                  </tr>
                </thead>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>NAME</th>
                    <th>NID</th>
                    <th>BIRTH CERTIFICATE</th>
                    <th>FATHER NAME</th>
                    <th>MOTHER NAME</th>
                    <th>BIRTH DAY</th>
                    <th>JOINING DATE</th>
                    <th>LEAVING DATE</th>
                    <th>TYPE</th>
                    <th>REPORTS TO</th>
                    <th>ADDRESS</th>
                  </tr>
                </tfoot>



            <!-- connection stablished -->

            <?php
                $con = oci_connect('final','final','localhost/XE');
                if(!$con)
                {
                	$e = oci_error();
                	trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }

              //  $vari=$_GET['id'];

                $stid = oci_parse($con, "select DISTINCT emp_id, e.first_name||' '||e.middle_name||' '||e.LAST_NAME, emp_nid,birth_cert_no,father_name,mother_name,date_of_birth,joining_date,
                leaving_date,emp_type,reports_to, e.address.street || ', ' || e.address.road_no || ', ' || e.address.upazilla || ', ' ||e.address.city || ', ' || e.address.division from employee e join driver using (emp_id) join assigned using (driving_license) where ROUTE_NO
                in ( select route_no from supervisor where emp_id = $vari)");
                oci_execute($stid);

                //$stid = oci_parse($con, "select emp_id,first_name || ' ' || middle_name || ' ' || last_name, emp_nid,birth_cert_no,father_name,mother_name,date_of_birth,joining_date,
                //leaving_date,emp_type,reports_to,e.address.street || ', ' || e.address.road_no || ', ' || e.address.upazilla || ', ' ||e.address.city || ', ' || e.address.division
                //from employee e where emp_id");
                //oci_execute($stid);

                while($row = oci_fetch_array($stid))
                {
              ?>

                  <tr>
                    <td> <a href="oneEmp.php?id=<?php echo $row['EMP_ID'] ?>"> <?php echo $row['EMP_ID'] ?> </a> </td>
                          <td> <?php echo $row[1] ?> </td>
  				  <td> <?php echo $row[2] ?> </td>
                    <td> <?php echo $row[3] ?> </td>
                    <td> <?php echo $row[4] ?> </td>
                    <td> <?php echo $row[5] ?> </td>
  				  <td> <?php echo $row[6] ?> </td>
                    <td> <?php echo $row[7] ?> </td>
                    <td> <?php echo $row[8] ?> </td>
                    <td> <?php echo $row[9] ?> </td>
                    <td> <?php echo $row[10] ?> </td>
                    <td> <?php echo $row[11] ?> </td>
                  </tr>

              <?php  }

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
