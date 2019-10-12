<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


    <?php

    session_start();
  

    if($_SESSION['CHECK_VAL']=='6')
    {
	     //echo $_SESSION['CHECK_VAL'];
       header("location:index.php?");
    }else if($_SESSION['CHECK_VAL']=='1'){
      //echo $_SESSION['CHECK_VAL'];
      header("location:NewReg.php?");
    }else if($_SESSION['CHECK_VAL']=='2'){
      $var =  "oneEmp.php?id=".$_SESSION['REG_ID'];
      //echo $var;
       header("location:$var");
    }else if($_SESSION['CHECK_VAL']=='3'){
      $var =  "oneEmp.php?id=".$_SESSION['REG_ID'];
      //echo $var;
       header("location:$var");
    }else if($_SESSION['CHECK_VAL']=='4'){
      $var =  "officeoneemp.php?id=".$_SESSION['REG_ID'];
      //echo $var;
       header("location:$var");
    }else if($_SESSION['CHECK_VAL']=='5'){
      $var =  "supervisor.php?id=".$_SESSION['REG_ID'];
      //echo $var;
       header("location:$var");
    }
    else {
      header("location:login.php?");
    }
    ?>



<?php
if($_SERVER['REQUEST_METHOD'] == "POST" and isset($_POST['logout']))
  {
    func();
  }
function func()
  {
    session_destroy();
    header("location:index.php?");
  }
?>


</body>
</html>
