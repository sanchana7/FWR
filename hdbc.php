 
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 $query = "SELECT * FROM contact ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Contact</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
		   <a href="adminpanel.html" ><input type="button" value="Go back!" onclick="history.back()"></a>
		
                <h3 align="center">Contact List Detail</h3>  
                <br />  
                <div class="table-responsive">  
                     <br />  
                     <div id="employee_table">  
                          <table class="table table-bordered">  
                               <tr>  
                                    <th width="70%">Contact Details</th>  
                                    <th width="15%">Edit</th>  
                                    <th width="15%">View</th>  
                               </tr>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
							     <tr>  
                        <td><?php echo $row["name"]; ?></td>  
                        <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs Edit_data" /></td>  
						<td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs View_data" /></td>  
                               </tr>  
              
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Contact</h4>  
                </div>  
                <div class="modal-body" id="contact_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
	             <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Contact Status</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>Email</label>  
                          <textarea name="email" id="email" class="form-control"></textarea>  
                          <br />  
                          <label>Message</label>  
                          <input type="text" name="comment" id="comment" class="form-control" />  
                          <br />  
                          <label>Reply</label>  
                          <textarea name="reply" id="reply" class="form-control"></textarea>  
                          <br />  
                          <input type="hidden" name="contact_Id" id="contact_Id" />  
                          <input type="submit" name="insert" id="insert" value="insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
 
      $(document).on('click', '.Edit_data', function(){  
	    var contact_id = $(this).attr("id");
        $.ajax({  
                url:"fetchedc.php",  
                method:"POST",  
                data:{contact_id:contact_id},  
                dataType:"json",  
                success:function(data){  
				$('#name').val(data.name);  
                $('#email').val(data.email);  
                $('#Action').val(data.Action);  
                $('#comment').val(data.comment);  
                $('#reply').val(data.reply);  
                $('#contact_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#email').val() == '')  
           {  
                alert("email is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insertedc.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#contact').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.View_data', function(){  
           var contact_id = $(this).attr("id");  
           if(contact_id != '')  
           {  
                $.ajax({  
                     url:"selectc.php",  
                     method:"POST",  
                     data:{contact_id:contact_id},  
                     success:function(data){  
                          $('#contact_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
 


 
  <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 if(isset($_POST["contact_Id"]))  
 {  
      $query = "SELECT * FROM contact_Id WHERE Id = '".$_POST["contact_Id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 
