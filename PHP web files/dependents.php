<?php
session_start();
?>
<?php

function selectEmp($query, $id="id") {
    global $con;

    $results = array();
    $sql = OCI_Parse($conn, $query);
    OCI_Execute($sql);
    while ( false!==($row=oci_fetch_assoc($sql)) ) {
        $results[ $row[$id] ] = $row;
    }
    return $results;
}
$id1=$_GET['id'];
$con = oci_connect('final','final','localhost/XE');
if(!$con)
{
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
}
$flag=0;
$type = oci_parse($con,'select emp_type from employee where emp_id = :nid');
              oci_bind_by_name($type, ':nid',$nid);
              oci_execute($type);
              while($row = oci_fetch_array($type)){
                echo $row[0];
                if($row[0] == 'Driver')
                {
                    $flag=1;;
                }
                else $flag=2;
              }

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
          <a class="nav-link" href="allEmp.php">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard</span>
          </a>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Employee Info">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Employee Info</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="education.php?id=<?php echo $id1 ?>">Education</a>
            </li>
            <li>
              <a href="dependents.php?id=<?php echo $id1 ?>">Dependents</a>
            </li>
            <li>
              <a href="accounts.php?id=<?php echo $id1 ?>">Accounts</a>
            </li>
            <li>
              <a href="contact.php?id=<?php echo $id1 ?>">Contact Info</a>
            </li>
            <li>
              <a href="health.php?id=<?php echo $id1 ?>">Health Info</a>
            </li>

            <li>
              <a href="leave.php?id=<?php echo $id1 ?>">Leave Details</a>
            </li>

            <li>
              <a href="overtime.php?id=<?php echo $id1 ?>">Overtime</a>
            </li>
            <li>
              <a href="workerTypeInfo.php?id=<?php echo $id1 ?>">Worker Type Info</a>
            </li>


          </ul>
        </li>

        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Work Related Info">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Work Related Info</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
          <li>
              <a href="workingSchedule.php?id=<?php echo $id1 ?>">Working Schedule</a>
            </li>
            <li>
              <a href="vehicleRoute.php?id=<?php echo $id1 ?>">Vehicle and Route Info</a>
            </li>
            <li>
              <a href="penaltyFeedback.php?id=<?php echo $id1 ?>">Penalty and Feedback</a>
            </li>
            <li>
              <a href="vehicleDamage.php?id=<?php echo $id1 ?>">Vehicle Damage Info</a>
            </li>
            <li>
              <a href="companyHelp.php?id=<?php echo $id1 ?>">Company Help</a>
            </li>
            <li>
              <a href="totalWorkingDays.php?id=<?php echo $id1 ?>">Total Working Days</a>
            </li>
            <li>
              <a href="vehiclesDriven.php?id=<?php echo $id1 ?>">Vehicles Driven</a>
            </li>

          </ul>
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




<!-- connection stablished -->



      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">

          <i class="fa fa-table"></i> DEPENDENTS INFO</div>

        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                  <th>ID</th>
                  <th>NAME</th>

                  <th>DEPENDENT NID</th>
                  <th>DEPNDENT NAME</th>
                  <th>RELATION</th>
                  <th>GENDER</th>
                  <th>DELETE</th>

                </tr>
              </thead>
              <tfoot>
                <tr>
                <th>ID</th>
                  <th>NAME</th>

                  <th>DEPENDENT NID</th>
                  <th>DEPNDENT NAME</th>
                  <th>RELATION</th>
                  <th>GENDER</th>
                  <th>DELETE</th>
                </tr>
              </tfoot>

			<tbody>
          <?php

            error_reporting(0);
            @ini_set('display_errors', 0);
              $nid=$_GET['id'];
              $_SESSION['nid']=$nid;
			//$results=selectEmp('select * from customer');
              $stid = oci_parse($con, "select emp_id,first_name || ' ' || middle_name || ' ' || last_name, dep_nid,dep_name,relation,gender
              from employee join depends_on using(emp_id) join dependents using (dep_nid) where emp_id = :nid");
              oci_bind_by_name($stid, ':nid', $nid);
              oci_execute($stid);

              while($row = oci_fetch_array($stid))
              {
            ?>

<tr>                <td> <?php echo $row[0] ?> </td>
             <td> <?php echo $row[1] ?> </td>
				  <td> <?php echo $row[2] ?> </td>
                  <td> <?php echo $row[3] ?> </td>
                  <td> <?php echo $row[4] ?> </td>
                  <td> <?php echo $row[5] ?> </td>
                  <td> <a href="deleteDependent.php?id=<?php echo $row[2] ?>"> <?php echo 'Delete' ?> </a> </td>


             <?php }




            oci_free_statement($stid);
            oci_close($con);
            ?>
			</tbody>
            </table>
            <a href="updateDependentInfo.php?id=<?php echo $nid ?>"> Update</a>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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
            <a class="btn btn-primary" href="login.html">Logout</a>
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
