<?php
  session_start();

  if($_SESSION['CHECK_VAL']==null)
  {
     //echo $_SESSION['CHECK_VAL'];
     session_destroy();
     header("location:login.php?");
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
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="index.html">Transport Workers Database Management System</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion">


        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Update Info</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="UpdatePersonalInfo.php">Personal Info</a>
            </li>
            <li>
              <a href="#">Qualification & education</a>
            </li>
            <li>
              <a href="#">Healthinfo</a>
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




<form method="POST" action="">


    <div class="container">
    <div class="card card-register mx-auto mt-5">
    <div class="card-header">Register an Account</div>
    <div class="card-body">



<div class="form-group">
  <div class="form-row">
    <div class="col-md-6">
      <label for="exampleInputFirstName">NID no</label>
      <br><input class="form-control" type="text" name="Emp_nid" </br>
    </div>
    <div class="col-md-6">
      <label for="exampleInputLastName">Birth Cert No</label>
      <br><input class="form-control" type="number" name="Birth_cert_no" </br>
    </div>
  </div>
</div>


                <div class="form-group">
                     <label for="InputFatherName">Father Name</label>
                     <br><input class="form-control" type="text" name="Father_name" </br>
                 </div>

                 <div class="form-group">
                   <label for="InputMotherName">Mother Name</label>
                   <br><input class="form-control" type="text" name="Mother_name" </br>
                 </div>

                 <div class="form-group">
                   <label for="InputFatherName">Employee Type</label>

                   <select id="lala" name="promo">
                     <option value="Driver">Driver</option>
                     <option value="Conductor">Conductor</option>
                     <option value="Office Worker">Office Worker</option>
                     <option value="Supervisor">Supervisor</option>
                   </select>
                  </div>


                 <div class="form-group">
                     <label for="InputFatherName">Date of Birth</label>
                     <br><input class="form-control" type="date" name="date_dob" </br>
                 </div>



                 <div class="form-group">
                   <div class="form-row">
                     <div class="col-md-6">
                       <label for="exampleInputFirstName">Street</label>
                       <br><input class="form-control" type="text" name="Street" </br>
                     </div>
                     <div class="col-md-6">
                       <label for="exampleInputLastName">Road no</label>
                       <br><input class="form-control" type="number" name="Road_no" </br>
                     </div>
                   </div>
                 </div>


                 <div class="form-group">
                   <div class="form-row">
                     <div class="col-md-6">
                       <label for="exampleInputFirstName">Upazilla</label>
                       <br><input class="form-control" type="text" name="Upazilla" </br>
                     </div>
                     <div class="col-md-6">
                       <label for="exampleInputLastName">City</label>
                       <br><input class="form-control" type="text" name="City" </br>
                     </div>
                   </div>
                 </div>


                 <div class="form-group">
                  <label for="InputDivisionName">Division</label>
                  <br><input class="form-control" type="text" name="Division" </br>
                </div>




                <div class="form-row">
                                 <div class="col-md-5">
                                 </div>

                                 <div class="col-md-4">
                                   <input type="submit" name="submit" value="Register">
                                 </div>

                                 <div class="col-md-3">
                                 </div>
              </div



    </form>

      </div>
    </div>
  </div>
</div>



    <?php
    $db = oci_connect('final' ,'final','localhost/XE');
    if(!$db)
    {
      $e = oci_error();
      trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
    }


          if (isset($_POST['submit'])){
            $First_name = @$_POST['First_name'];
             $Last_name = @$_POST['Last_name'];

             $Emp_nid = @$_POST['Emp_nid'];
             $Birth_cert_no = @$_POST['Birth_cert_no'];

             $Father_name = @$_POST['Father_name'];
             $Mother_name = @$_POST['Mother_name'];
             $Emp_type = @$_POST['promo'];
             $Reports_to = @$_POST['Reports_to'];
             $Street = @$_POST['Street'];
             $Road_no = @$_POST['Road_no'];
             $Upazilla = @$_POST['Upazilla'];
             $City = @$_POST['City'];
             $Division = @$_POST['Division'];
             $date_dob = date("d-m-Y",strtotime(@$_POST['date_dob']));

             $reg_id = $_SESSION['REG_ID'];

             //echo $Father_name;
             //echo $Mother_name;



             $REG_FIRST_NAME;
             $REG_MIDDLE_NAME;
             $REG_LAST_NAME;
             $CHECK_VAL;



             $stid = oci_parse($db, 'SELECT * FROM reginfo WHERE REG_ID= :reg_id');
              oci_bind_by_name($stid, ':reg_id', $reg_id);
              oci_execute($stid);

             if(($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
                 $REG_FIRST_NAME = $row['REG_FIRST_NAME'];
                 $REG_MIDDLE_NAME = $row['REG_MIDDLE_NAME'];
                 $REG_LAST_NAME = $row['REG_LAST_NAME'];
                 $CHECK_VAL = $row['CHECK_VAL'];
             }


             $dlt = oci_parse($db, "Delete from Temp_Employee where AUTO_ID= $reg_id");
             oci_execute($dlt);

            $insertq = oci_parse($db, "Insert into Temp_Employee(Date_of_birth,AUTO_ID,First_name, MIDDLE_NAME,Last_name,Emp_nid,
            Father_name,Mother_name,Emp_type,Reports_to,Street,Road_no,Upazilla,City,Division,EMP_STATUS_NO)
            values (to_date('$date_dob','dd-mm-yyyy'),'$reg_id','$REG_FIRST_NAME','$REG_MIDDLE_NAME','$REG_LAST_NAME','$Emp_nid',
            '$Father_name','$Mother_name','$Emp_type','$Reports_to','$Street','$Road_no','$Upazilla','$City','$Division','$CHECK_VAL')");


//            // $sql = 'INSERT INTO Temp_EMPLOYEE(Date_of_birth,First_name,Last_name,Emp_nid,
            // Father_name,Mother_name,Emp_type,Reports_to,Street,Road_no,Upazilla,City,Division)'.
            //        'VALUES(to_date(:date_dob,'d-m-Y'),:First_name,:Last_name,:Emp_nid,:Father_name,:Mother_name,:Emp_type,:Reports_to,
            //         :Street, :Road_no, :Upazilla, :City, :Division)';
            //
            //
            //  $compiled = oci_parse($db, $sql);
            //  oci_bind_by_name($compiled, ':date_dob', $date_dob);
            //  oci_bind_by_name($compiled, ':First_name', $First_name);
            //  oci_bind_by_name($compiled, ':Last_name', $Last_name);
            //  oci_bind_by_name($compiled, ':Emp_nid', $Emp_nid);
            //  oci_bind_by_name($compiled, ':Father_name', $Father_name);
            //  oci_bind_by_name($compiled, ':Mother_name', $Mother_name);
            //  oci_bind_by_name($compiled, ':Emp_type', $Emp_type);
            //  oci_bind_by_name($compiled, ':Reports_to', $Reports_to);
            //  oci_bind_by_name($compiled, ':Street', $Street);
            //  oci_bind_by_name($compiled, ':Road_no', $Road_no);
            //  oci_bind_by_name($compiled, ':Upazilla', $Upazilla);
            //  oci_bind_by_name($compiled, ':City', $City);
            //  oci_bind_by_name($compiled, ':Division', $Division);


             oci_execute($insertq);
   //////          oci_execute($compiled);

             oci_free_statement($insertq);

           }else{
    //         echo "nai kiso...";
           }

           oci_close($db);


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
