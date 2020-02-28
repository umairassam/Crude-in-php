

<?php
     $myid =   $_POST["id"];
     $myname =   $_POST["name"];
    $fname =   $_POST["fname"];
    $email =   $_POST["email"];
   require('sqlconnection.php');

  $result =  mysqli_query($con , "update tbl_student set name='$myname',fname='$fname',email='$email' WHERE id=$myid");
  if($result)
  {
    echo $myid;
    echo $myname;
    echo $fname;
    echo $email;
  }
 
?>
