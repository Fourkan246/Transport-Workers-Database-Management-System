<!DOCTYPE html>

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>


<?php
  $db = oci_connect('final','final','localhost/XE');
  if(!$db)
  {
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }

  $reg_first_name = @$_POST['FirstName'];
  $reg_middle_name = @$_POST['MiddleName'];
  $reg_last_name = @$_POST['LastName'];
  $reg_email = @$_POST['email'];
  $reg_pass = @$_POST['password'];
  $reg_pass2 = @$_POST['SecondPass'];


$stid = oci_parse($db, "select reg_email from reginfo
              where reg_email = '$reg_email'");
              oci_execute($stid);

$var;
if($row = oci_fetch_array($stid))
{
	echo "<script>

window.location.href='register.php';
alert('This Email is already taken. Try another one');
</script>";
}


  //header("Location:form.php");
else if($reg_pass !== $reg_pass2)
{
  //echo '<script language="javascript">';
//echo 'alert("incorrect password confirmation. try again.")';
//echo '</script>';
echo "<script>

window.location.href='register.php';
alert('incorrect password confirmation. try again.');
</script>";
}

 else
 {
  $regseq;

  $seq = oci_parse($db, 'select REGINFO_Reg_id_seq.nextval from dual');
  oci_execute($seq);
  while($row = oci_fetch_array($seq))
  {
    $regseq = $row[0];
  }


  $insertq = oci_parse($db, "Insert into reginfo(REG_ID,REG_FIRST_NAME,REG_MIDDLE_NAME,REG_LAST_NAME,REG_EMAIL,REG_PASS) values ('$regseq','$reg_first_name','$reg_middle_name','$reg_last_name','$reg_email','$reg_pass')");
  oci_execute($insertq);

  $insertqIntoTemp = oci_parse($db, "Insert into temp_employee(auto_id) values ('$regseq')");
  oci_execute($insertqIntoTemp);

  session_start();
  $_SESSION['REG_ID'] = $regseq;
  $_SESSION['CHECK_VAL'] = 1;

  //oci_free_statement($nextval);
  oci_free_statement($insertq);
  oci_close($db);

  header("location:NewReg.php?");
 }
?>

</body>
</html>
