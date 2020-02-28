<?php
    require('sqlconnection.php');
    $result=mysqli_query($con,"select * from tbl_student");

    $fetchdata=
    '
    <div class="container">
    <div class="row">
                    <div class="col-sm-9">
    <h1 class="h1"><b>CRUD OPERATIONS IN PHP</b></h1>
                    </div>
                    <div class="col-sm-3" style="margin-top:15px;">
                    <button type="button" class="btn btn-success btn-lg active" data-toggle="modal" data-target="#addEmployeeModal"><span class="glyphicon glyphicon-plus"></span>Add New User</button>
                    <button name="add" id="add">Add</button>

                    </div>
    </div>

    
        <table class="table table-striped table-hover " id=""mytable>
            <thead class="thead-dark">
                <tr>
                    <th>STUDENT ID</th>
                    <th>NAME</th>
                    <th>FATHER NAME</th>
                    <th>E-MAIL</th>
                    <th>EDIT DATA</th>

                </tr>
            </thead>
            <tbody>
            
    ';

    while($a =  mysqli_fetch_array($result)){
        $fetchdata.='<tr>
        <td><label id="id" for="">'.$a["id"].'</label></td>
         <td><label id="name" for="">'.$a["name"].'</label><input type="text" class="form-control"  name="hname" id="hname" style="visibility: hidden;"></td>
        <td><label id="fname" for="">'.$a["fname"].'</label><input type="text"  class="form-control" name="hfname" id="hfname" style="visibility: hidden;"></td>
        <td><label id="email" for="">'.$a["email"].'</label><input type="text" class="form-control" name="hemail" id="hemail" style="visibility: hidden;"></td>
                <td>
        <button name="edit" class="btn btn-primary edit"><span class="glyphicon glyphicon-pencil"></span></button>
        <button  name="update" id="'.$a["id"].'" class="btn btn-info update" style="display: none;"><span class="glyphicon glyphicon-ok"></span></button>
        &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp 
        <button name="delete" id="'.$a["id"].'" class="btn btn-danger delete"><span class="glyphicon glyphicon-trash"></span></button>
        <button name="cancel" id="'.$a["id"].'"  class="btn btn-dark cancel" style="display: none;"><span class="glyphicon glyphicon-remove"></span></button>
                </td>

                        
                    </tr>';
                    
       
    }

    $fetchdata.='</tbody> </table></div> 
    <!-- Add Modal HTML -->
	<div id="addEmployeeModal" class="modal fade mymodal">
		<div class="modal-dialog">
			<div class="modal-content">
				<form id="user_form">
					<div class="modal-header">						
						<h4 class="modal-title">Add New User</h4>
						<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
					</div>
					<div class="modal-body">					
						<div class="form-group">
							<label>NAME:</label>
							<input type="text" id="std_name" name="std_name" class="form-control" placeholder="Enter Name">
                        </div>
                        <div class="form-group">
							<label>FATHER NAME:</label>
                            <input type="text" id="std_fname" name="std_fname" class="form-control" placeholder="Enter Father Name">						</div>
						<div class="form-group">
							<label>EMAIL:</label>
                            <input type="email" id="std_email" name="std_email" class="form-control" placeholder="Enter E-mail">						</div>
						
											
					</div>
					<div class="modal-footer">
					    
						<input type="button" class="btn btn-default btn-lg" data-dismiss="modal" value="Cancel">
                        <button type="button" class="btn btn-success btn-lg"  name="btn_add">Save</button>
					</div>
				</form>
			</div>
		</div>
	</div>';
    echo $fetchdata;

    
?>

