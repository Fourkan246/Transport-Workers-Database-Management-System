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
    <div class="card-header">Qualification and Educational info</div>
    <div class="card-body">


            <div class="form-group">
                         <label for="InputFatherName">Educational Qualification</label>
                         <br><input class="form-control" type="text" name="educational_qualification" </br>
                   </div>

                      <div class="form-group">
                          <label for="InputFatherName">Qualification Test Serial</label>
                          <br><input class="form-control" type="text" name="Quali_test_serial" </br>
                      </div>
                      <div class="form-group">
                          <label for="InputFatherName">Test Date</label>
                          <br><input class="form-control" type="date" name="Quali_test_date" </br>
                      </div>

                      <div class="form-group">
                          <label for="InputFatherName">Years of Experience</label>
                          <br><input class="form-control" type="number" name="Yrs_of_experience" </br>
                      </div>
                      <div class="form-group">
                          <label for="InputFatherName">Previous Organization</label>
                          <br><input class="form-control" type="text" name="Previous_org" </br>
                      </div>


                      <div class="form-group">
                       <label for="InputDivisionName">Remarks</label>
                       <br><input class="form-control" type="text" name="Remarks_of_passedtest" </br>
                     </div>





                <div class="form-row">
                                 <div class="col-md-5">
                                 </div>

                                 <div class="col-md-4">
                                   <input type="submit" name="submit" value="Insert">
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

           $educational_qualification = @$_POST['educational_qualification'];
           $Quali_test_serial = @$_POST['Quali_test_serial'];
           $Quali_test_date = date("d-m-Y",strtotime(@$_POST['Quali_test_date']));
           $Remarks_of_passedtest = @$_POST['Remarks_of_passedtest'];

           $Yrs_of_experience = @$_POST['Yrs_of_experience'];
           $Previous_org = @$_POST['Previous_org'];

           $reg_id = $_SESSION['REG_ID'];

                         
                         //echo $Remarks_of_passedtest;


              $ins = oci_parse($db, "Insert into TEMP_Qualification(auto_id,Quali_test_serial,Quali_test_date,Remarks_of_passedtest,educational_qualification,
                                Previous_org,Yrs_of_experience)
                        values ('$reg_id','$Quali_test_serial',to_date('$Quali_test_date','dd-mm-yyyy'),'$Remarks_of_passedtest','$educational_qualification',
                                '$Previous_org','$Yrs_of_experience')");
                        oci_execute($ins);


           }else{
             
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
