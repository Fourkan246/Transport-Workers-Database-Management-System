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
            <a class="btn btn-primary" href="login.html">Logout</a>
          </div>
        </div>
      </div>
    </div>



    <?php
     error_reporting(0);
     @ini_set('display_errors', 0);
              $con = oci_connect('final','final','localhost/XE');
              if(!$con)
              {
                $e = oci_error();
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
              }

              $stid = oci_parse($con, 'select * from HEALTHINFO where test_serial=1');
              oci_execute($stid);

              $row = oci_fetch_array($stid);

            ?>





        <form action="" method="post" >
          <div class="container">
            <div class="card card-register mx-auto mt-5">
              <div class="card-header">Assign Route</div>
              <div class="card-body">
                <form>

                  <div class="form-group">

                        <label for="exampleInputFirstName">Route No</label>
                      <br><select id="lala" name="route_no">



          <?php
              $con = oci_connect('final','final','localhost/XE');
              if(!$con)
              {
                $e = oci_error();
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
              }

              $stid = oci_parse($con, 'select * from route');
              oci_execute($stid);

              while($row = oci_fetch_array($stid))
              {
            ?>
                <option value=<?php echo $row[0] ?> ><?php echo $row[0] ?></option>

            <?php  }

            oci_free_statement($stid);
            oci_close($con);
            ?>



                      </select></br>

                  </div>

                  <div class="form-group">
                      <label for="InputFatherName">Assigned Date</label>
                      <br><input class="form-control" type="date" name="assigned_date" </br>
                  </div>


                  <div class="form-group">
                      <label for="InputFatherName">Lisense Number</label>
                      <br><select id="lala" name="driving_license">



          <?php
              $con = oci_connect('final','final','localhost/XE');
              if(!$con)
              {
                $e = oci_error();
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
              }

              $stid = oci_parse($con, 'select * from driver');
              oci_execute($stid);

              while($row = oci_fetch_array($stid))
              {
            ?>
                <option value=<?php echo $row['DRIVING_LICENSE'] ?> ><?php echo $row['DRIVING_LICENSE'] ?></option>

            <?php  }

            oci_free_statement($stid);
            oci_close($con);
            ?>



                </select></br>
                  </div>

                  <div class="form-group">
                  <label for="InputMotherName">Registration Number of Vehicle</label>
                <br><select id="lala" name="reg_number">



          <?php
              $con = oci_connect('final','final','localhost/XE');
              if(!$con)
              {
                $e = oci_error();
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
              }

              $stid = oci_parse($con, 'select * from AssignedVehicle');
              oci_execute($stid);

              while($row = oci_fetch_array($stid))
              {
            ?>
                <option value=<?php echo $row[0] ?> ><?php echo $row[0] ?></option>

            <?php  }

            oci_free_statement($stid);
            oci_close($con);
            ?>



                      </select></br>
                  </div>

                  <div class="form-group">
                      <label for="InputFatherName">Helper ID</label>
                      <br><select id="lala" name="helper_id">



          <?php
              $con = oci_connect('final','final','localhost/XE');
              if(!$con)
              {
                $e = oci_error();
                trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
              }

              $stid = oci_parse($con, "select emp_id from employee where emp_type = 'Conductor' or emp_type = 'Helper'");
              oci_execute($stid);

              while($row = oci_fetch_array($stid))
              {
            ?>
                <option value=<?php echo $row[0] ?> ><?php echo $row[0] ?></option>

            <?php  }

            oci_free_statement($stid);
            oci_close($con);
            ?>



                      </select></br>
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
          $db = oci_connect('final' ,'final','localhost/XE');
          if(!$db)
          {
            $e = oci_error();
            trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
          }

          $route_no          = @$_POST['route_no'];
          $driving_license   = @$_POST['driving_license'];
          $reg_number        = @$_POST['reg_number'];
          $helper_id         = @$_POST['helper_id'];
          $assigned_date     = @$_POST['assigned_date'];


         
          //INSERT Query*************************

          $insertq = oci_parse($db, "Insert into Assigned(
            Reg_number  ,
            Driving_License  ,
            Route_no  ,
            Helper_id,
            Assigned_date )
          values ('$reg_number','$driving_license','$route_no','$helper_id', to_date('$assigned_date','yyyy-mm-dd'))");
          oci_execute($insertq);

          oci_free_statement($insertq);
          oci_close($db);



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
