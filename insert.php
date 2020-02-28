<?php
       require('sqlconnection.php');
       if(count($_POST)>0)
    {
        
       $name =   $_POST["getname"];
       $fname =   $_POST["getfname"];
       $email =   $_POST["getemail"];

        $sql = mysqli_query($con ,"INSERT INTO tbl_student (name,fname,email) VALUES ('$name','$fname','$email')");
        if ($sql) 
        { $result=mysqli_query($con,"select * from tbl_student ORDER BY id DESC  LIMIT 1");
         while($a =  mysqli_fetch_array($result)){
            $fetch="";
            $fetch=$a["id"];
            echo $fetch;

         }
        }
           
    }
     
      

?>

