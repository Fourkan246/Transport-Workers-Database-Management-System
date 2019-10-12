value is <b> <?php echo $_GET['id']; ?> </br>


  <?php
  $con = oci_connect('final','final','localhost/XE');
  if(!$con)
  {
   $e = oci_error();
   trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
  }
  $delete_id=$_GET['id'];
  echo $delete_id;

  $dll = oci_parse($con, "Delete from employee where EMP_ID= '$delete_id'");
  oci_execute($dll);

  $dll = oci_parse($con, "Delete from reginfo where REG_ID= '$delete_id'");
  oci_execute($dll);

  $dll = oci_parse($con, "Delete from temp_employee where AUTO_ID= '$delete_id'");
  oci_execute($dll);

  $dll = oci_parse($con, "Delete from temp_qualification where AUTO_ID= '$delete_id'");
  oci_execute($dll);

  $dll = oci_parse($con, "Delete from temp_healthinfo where AUTO_ID= '$delete_id'");
  oci_execute($dll);

  header("location:index.php?");
  oci_close($con);

?>
