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

<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

<h1> Data successfully Inserted </h1>


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
                    $Emp_type = @$_POST['Emp_type'];
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

                    echo $_SESSION['REG_ID'];

                   

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


                   // $sql = 'INSERT INTO Temp_EMPLOYEE(Date_of_birth,First_name,Last_name,Emp_nid,
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
          //          oci_execute($compiled);

                    oci_free_statement($insertq);
          //}
          }else {
         
            echo isset($_POST['submit']);

          }
                    oci_close($db);

                    //header("location:NewReg.php?");
?>





</body>
</html>
