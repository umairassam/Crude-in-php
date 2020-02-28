<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./public/css/bootstrap.css">
    <link rel="stylesheet" href="./public/css/bootstrap.min.css">
    <script src="./public/js/jquery.js"></script>
<script src="./public/js/bootstrap.min.js"></script>
<script src="./public/js/jquery.js"></script>
   
    <title>Document</title>
</head>
<body>



<script>
$(function(){
//on load print table
function printdata(){
    $.ajax({
        url:"datashow.php",
        method:"POST",
        success:function(mydata){
            $('body').html(mydata);
        },
    })
}
    printdata();


$(document).on('click' , 'button[name=delete]' , function(){

var rowid =  $(this).attr("id");
var tablerow = $(this).parents("tr")[0];



$.ajax({

    url : "deletedata.php",
    method : "POST",
    data : {id:rowid},
   success:function(data)
   {
    printdata();
   }
});

tablerow.remove();

})



    $(document).on('click','button[name=edit]',function(){
        $(this).parents("tr").find(".cancel").show();
        $(this).parents("tr").find(".update").show();
       
        $(this).parents("tr").find(".edit").hide();
        $(this).parents("tr").find(".delete").hide();



        
        var getlabel1=$(this).parents('tr').find("#name");
        var gettext1=$(this).parents('tr').find("#hname");
        getlabel1.hide();
        gettext1.css({ 'visibility' : 'visible'});
        var lbl1text =  $(this).parents('tr').find('#name').text();
        $(this).parents('tr').find('#hname').val(lbl1text);

        var getlabel2=$(this).parents('tr').find("#fname");
        var gettext2=$(this).parents('tr').find("#hfname");
        getlabel2.hide();
        gettext2.css({ 'visibility' : 'visible'});
        var lbl2text =  $(this).parents('tr').find('#fname').text();
        $(this).parents('tr').find('#hfname').val(lbl2text);


        var getlabel=$(this).parents('tr').find("#email");
        var gettext=$(this).parents('tr').find("#hemail");
        getlabel.hide();
        gettext.css({ 'visibility' : 'visible'});
        var lbltext =  $(this).parents('tr').find('#email').text();
        $(this).parents('tr').find('#hemail').val(lbltext);

    })

    $(document).on('click','button[name=cancel]',function(){
        $(this).parents("tr").find(".cancel").hide();
        $(this).parents("tr").find(".update").hide();
       
        $(this).parents("tr").find(".edit").show();
        $(this).parents("tr").find(".delete").show();

        var getlabel1=$(this).parents('tr').find("#name");
        var gettext1=$(this).parents('tr').find("#hname");
        getlabel1.show();
        gettext1.css({ 'visibility' : 'hidden'});

        var getlabel2=$(this).parents('tr').find("#fname");
        var gettext2=$(this).parents('tr').find("#hfname");
        getlabel2.show();
        gettext2.css({ 'visibility' : 'hidden'});


        var getlabel=$(this).parents('tr').find("#email");
        var gettext=$(this).parents('tr').find("#hemail");
        getlabel.show();
        gettext.css({ 'visibility' : 'hidden'});


    })

    $(document).on('click','button[name=update]',function(){

        $(this).parents("tr").find(".cancel").hide();
        $(this).parents("tr").find(".update").hide();
       
        $(this).parents("tr").find(".edit").show();
        $(this).parents("tr").find(".delete").show();

        
        var getlabel1=$(this).parents('tr').find("#name");
        var gettext1=$(this).parents('tr').find("#hname");
        getlabel1.show();
        gettext1.css({ 'visibility' : 'hidden'});

        var getlabel2=$(this).parents('tr').find("#fname");
        var gettext2=$(this).parents('tr').find("#hfname");
        getlabel2.show();
        gettext2.css({ 'visibility' : 'hidden'});


        var getlabel=$(this).parents('tr').find("#email");
        var gettext=$(this).parents('tr').find("#hemail");
        getlabel.show();
        gettext.css({ 'visibility' : 'hidden'});

        var rowid =  $(this).attr("id");
       var name=gettext1.val();
       var fname=gettext2.val();
       var email=gettext.val();

        $.ajax({

    url : "updatedata.php",
    method : "POST",
    data : {
                id:rowid,
                name:name,
                fname:fname,
                email:email
            },
        

            
    
    
   
});

var tablerow = $(this).parents("tr")[0];
if(tablerow)
{
 var newname=$(this).parents('tr').find('#hname').val();
 var newfname=$(this).parents('tr').find('#hfname').val();
 var newemail=$(this).parents('tr').find('#hemail').val(); 
 
 $(this).parents('tr').find("#name").text(newname);
 $(this).parents('tr').find("#fname").text(newfname);
 $(this).parents('tr').find("#email").text(newemail);
 
}

})

$(document).on('click','button[name=btn_add]',function(){
    var getname=$("#std_name").val();
    var getfname=$("#std_fname").val();
    var getemail=$("#std_email").val();
    $.ajax({
        url:"insert.php",
        method:"POST",
        data:{
            getname:getname,
            getfname:getfname,
            getemail:getemail
            },
success:function(data)
{   
    var id = data; 
$("#std_name").val("");
$("#std_fname").val("");
$("#std_email").val("");
var markup="";
markup += "<tr><td><label id='id' for=''>"+id+"</label></td>";
markup+="<td><label id='name' for=''>"+getname+"</label><input type='text' class='form-control'  name='hname' id='hname' style='visibility: hidden;'=></td>";
markup+="<td><label id='fname' for=''>"+getfname+"</label><input type='text'  class='form-control' name='hfname' id='hfname' style='visibility: hidden;'></td>";
markup+="<td><label id='email' for=''>"+getemail+"</label><input type='text' class='form-control' name='hemail' id='hemail' style='visibility: hidden;'></td><";
markup+="<td><button name='edit' class='btn btn-primary edit'><span class='glyphicon glyphicon-pencil'></span></button>";
markup+="<button  name='update' id="+id+" class='btn btn-info update' style='display: none;'><span class='glyphicon glyphicon-ok'></span></button> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp";
markup+="<button name='delete' id="+id+" class='btn btn-danger delete'><span class='glyphicon glyphicon-trash'></span></button>";
markup+="<button name='cancel' id="+id+"  class='btn btn-dark cancel' style='display: none;'><span class='glyphicon glyphicon-remove'></span></button></td></tr>";

    $("table tbody").append(markup);
    
}


    });


});
})
</script>
</body>
</html>