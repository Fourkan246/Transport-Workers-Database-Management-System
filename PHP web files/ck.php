<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

    <form method="POST" action="">

      <div class="form-group">
          <label for="InputEmail1">First Name</label>
          <br><input class="form-control" type="text" name="FirstName" required ></br>
      </div>

      <div class="form-group">
          <label for="InputEmail1">Middle Name</label>
          <br><input class="form-control" type="text" name="MiddleName" required ></br>
      </div>
        <input type="submit" name="submit" value="Register">
    </form>


    <?php

          if (isset($_POST['submit'])){
            echo "yes";
          }else {
            echo "no";
          }




     ?>



  </body>
</html>
