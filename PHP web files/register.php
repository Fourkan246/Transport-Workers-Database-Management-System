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




<body class="bg-dark">

<form action="clogin.php" method="post" >

  <div class="container">
    <div class="card card-register mx-auto mt-5">
      <div class="card-header">Register an Account</div>
      <div class="card-body">
        <form>

                <div class="form-group">
                    <label for="InputEmail1">First Name</label>
                    <br><input class="form-control" type="text" name="FirstName" required
					value="<?php if(isset($_POST['FirstName'])) {echo htmlentities($_POST['FirstName']);}?>"></br>
                </div>

                <div class="form-group">
                    <label for="InputEmail1">Middle Name</label>
                    <br><input class="form-control" type="text" name="MiddleName"  ></br>
                </div>

                <div class="form-group">
                    <label for="InputEmail1">Last Name</label>
                    <br><input class="form-control" type="text" name="LastName" required ></br>
                </div>



          <div class="form-group">
            <label for="InputEmail1">Email address</label>
            <br><input class="form-control" type="email" name="email" </br>
          </div>

          <div class="form-group">
            <div class="form-row">
              <div class="col-md-6">
                <label for="InputPassword">Password</label>
                <br><input class="form-control" type="password" name="password" required </br>
              </div>
              <div class="col-md-6">
                <label for="ConfirmPassword">Confirm password</label>
                <br><input class="form-control" type="password" name="SecondPass" required</br>
              </div>
            </div>
          </div>

        <div class="form-row">
          <div class="col-md-5">
          </div>

          <div class="col-md-4">
            <input type="submit" value="Register">
          </div>

          <div class="col-md-3">
          </div>
        </div

        </form>
        <div class="text-center">
          <a class="d-block small mt-3" href="login.php">Login Page</a>
          <a class="d-block small" href="forgot-password.html">Forgot Password?</a>
        </div>

      </div>
    </div>

  </form>

  </div>











  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
</body>

</html>
