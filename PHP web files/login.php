<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>SB Admin - Start Bootstrap Template</title>
  <!-- Bootstrap core CSS-->
  <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Custom fonts for this template-->
  <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">
</head>

<body class="bg-dark">
  <div class="container">
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form action="" method="post">
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input class="form-control" id="exampleInputEmail1" type="email" name="std_id" aria-describedby="emailHelp" placeholder="Enter email">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input class="form-control" id="exampleInputPassword1" type="password" name="std_password" placeholder="Password">
          </div>
          <div class="form-group">
            <div class="form-check">
              <label class="form-check-label">
                <input class="form-check-input" type="checkbox"> Remember Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" type="submit" name="Submit">Login</button>
        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="register.php">Register an Account</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>
      </div>
    </div>
  </div>



<?php


                $con = oci_connect('final','final','localhost/XE');
                if(!$con)
                {
                  $e = oci_error();
                  trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
                }


      if (isset($_POST['Submit'])){
          $std_id=$_POST['std_id'];
          $std_password=$_POST['std_password'];
          $stid = oci_parse($con, 'SELECT * FROM reginfo WHERE REG_EMAIL= :std_id and REG_PASS= :std_password');
           oci_bind_by_name($stid, ':std_id', $std_id);
           oci_bind_by_name($stid, ':std_password', $std_password);
           oci_execute($stid);
        if(($row = oci_fetch_array($stid, OCI_BOTH)) != false) {
              session_start();
              $_SESSION['REG_ID'] = $row['REG_ID'];
              $_SESSION['CHECK_VAL'] = $row['CHECK_VAL'];
              header("location:CheckLoginStatus.php?");
              exit();
          }

     else {
          //var_dump($std_id);
          echo '<script language="javascript">';
          echo 'alert("The username and password you entered is incorrect...!!!")';
          echo '</script>';

              echo "<p style='text-align: center; font: bold 20px Comic Sans MS'>wrong username or password</p>";
          }
      oci_free_statement($stid);
      oci_close($con);
      }

?>





  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
