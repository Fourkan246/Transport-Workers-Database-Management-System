<?php
  session_start();

  if($_SESSION['CHECK_VAL']==null)
  {
     //echo $_SESSION['CHECK_VAL'];
     session_destroy();
     header("location:login.php?");
  }

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
  <title>TRANSPORT WORKERS' DATABASE MANAGEMENT SYSTEM</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Working Schedule</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
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
    </div>
  </nav>
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->

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






<form action="" method="post" >
          <div class="container">
            <div class="card card-register mx-auto mt-5">
              <div class="card-header"><Strong>Update Your Educational Information</Strong></div>
              <div class="card-body">
                <form>



                    <div class="form-group">
                      <label for="InputEducationalQualification">Educational Qualification</label>
                      <br><input class="form-control" type="text" name="educational_qualification" </br>
                  </div>
                  <div class="form-group">
                      <label for="InputYearsOfExperience">Years Of Experience</label>
                      <br><input class="form-control" type="text" name="years_of_experience" </br>
                  </div>

                  <div class="form-group">
                      <label for="InputPreviousOrganization">Previous Organization</label>
                      <br><input class="form-control" type="text" name="previous_organization" </br>
                  </div>


                <div class="form-row">
                  <div class="col-md-5">
                  </div>

                  <div class="col-md-4">
                    <input type="submit" value="Update">
                  </div>

                  <div class="col-md-3">
                  </div>
                </div

                </form>
                <div class="text-center">

                </div>

              </div>
            </div>

          </form>





        <?php
        $nid=$_GET['id'];
        $con = oci_connect('final','final','localhost/XE');
        if(!$con)
        {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
        }

          $Educational_qualification = @$_POST['educational_qualification'];
          $Years_of_experience = @$_POST['years_of_experience'];

          $Previous_organization = @$_POST['previous_organization'];



        $p=oci_parse($con,"select quali_test_serial,quali_test_date from employee join
        qualified_as using(emp_id) join education using(quali_test_serial,quali_test_date)
        where emp_id='$nid'");
        oci_execute($p);
        $serial=0;
        $date=0;
        while($row = oci_fetch_array($p))
        {
            $serial=$row[0];
            $date=$row[1];
        }
        //echo $serial;
       //echo $date;

if($Educational_qualification != null)
{



    $p1 = oci_parse($con, "Update final.education set edu_details='$Educational_qualification'
     where quali_test_serial='$serial' and quali_test_date='$date'");
	oci_execute($p1);
	?>
	<div class="container">

  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Educational Qualification Number Updated!!!
  </div>
<?php
}


if($Years_of_experience != null)
{
    $p1 = oci_parse($con, "Update final.experience set yrs_of_experience='$Years_of_experience'
    where quali_test_serial='$serial' and quali_test_date='$date'");
	oci_execute($p1);
	?>
	<div class="container">

  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Years Of Experience Updated!!!
  </div>
<?php
}


if($Previous_organization != null)
{
    $p1 = oci_parse($con, "Update final.experience set previous_org='$Previous_organization'
    where quali_test_serial='$serial' and quali_test_date='$date'");
	oci_execute($p1);
	?>
	<div class="container">

  <div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>Success!</strong> Previous Organization Updated!!!
  </div>
<?php
}


          /*$updateq = oci_parse($db, "update Employee set First_name=:fn,Last_name=:ln,Emp_nid=:enid,
          Father_name=:fname,Mother_name=:mname,Emp_type=:etype,Reports_to=:rt,Street=:street,
          Road_no=:road,Upazilla=:upazilla,City=:city,Division=:division
          where emp_id= :nid");
          oci_bind_by_name($updateq, ':fn', $First_name);
          oci_bind_by_name($updateq, ':ln', $Last_name);
          oci_bind_by_name($updateq, ':enid', $Emp_nid);
          oci_bind_by_name($updateq, ':fname', $Father_name);
          oci_bind_by_name($updateq, ':mname', $Mother_name);
          oci_bind_by_name($updateq, ':etype', $Emp_type);
          oci_bind_by_name($updateq, ':rt', $Reports_to);
          oci_bind_by_name($updateq, ':street', $Street);
          oci_bind_by_name($updateq, ':road', $Road_no);
          oci_bind_by_name($updateq, ':upazilla', $Upazilla);
          oci_bind_by_name($updateq, ':city', $City);
          oci_bind_by_name($updateq, ':division', $Division);
          oci_bind_by_name($updateq, ':nid', $nid);
          //oci_execute($updateq, OCI_COMMIT_ON_SUCCESS);

          oci_execute($updateq);

          oci_free_statement($updateq);
*/
          /*$insertq = oci_parse($db, "Insert into Temp_Employee(First_name,Last_name,Emp_nid,
          Father_name,Mother_name,Emp_type,Reports_to,Street,Road_no,Upazilla,City,Division)
          values ('$First_name','$Last_name','$Emp_nid','$Father_name','$Mother_name',
          '$Emp_type','$Reports_to','$Street','$Road_no','$Upazilla','$City','$Division')");
          oci_execute($insertq);

          oci_free_statement($insertq);*/
          //oci_close($db);

          //header("location:NewReg.php?");
        ?>




    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
  </div>
</body>

</html>
