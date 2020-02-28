<?php

   $myid =   $_POST["id"];
   require('sqlconnection.php');
   $result =  mysqli_query($con , "delete from tbl_student where id = $myid");



?>