 
 <?php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 $query = "SELECT * FROM users ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>HotelDonor Details</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
		   <a href="adminpanel.html" ><input type="button" value="Go back!" onclick="history.back()"></a>
		<div align="right">  
                          <button type="button"  name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>  
                     </div>
                <h3 align="center">Donor List Detail</h3>  
                <br />  
                <div class="table-responsive">  
                     <br />  
                     <div id="employee_table">  
                          <table class="table table-bordered">  
                               <tr>  
                                    <th width="70%">Hotel Donor Details</th>  
                                    <th width="15%">Edit</th>  
                                    <th width="15%">View</th>  
                               </tr>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
							     <tr>  
                        <td><?php echo $row["username"]; ?></td>  
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
                     <h4 class="modal-title">HotelDonor Details</h4>  
                </div>  
                <div class="modal-body" id="users_detail">  
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
                <div class="modal-header" >  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Donor's Status</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form" >  
                <label class="header">Profile Photo:</label>
                <input id="image" type="file" name="profile_photo" id="photo" placeholder="Photo" required="" capture>
                          <label>HotelDonor</label>  
                          <input type="text" name="username" id="username" class="form-control" />  
                          <br />  
                          <label>Email</label>  
                          <textarea name="email" id="email" class="form-control"></textarea>  
                          <br />  
                          <label>Contact</label>  
                          <input type="text" name="contact" id="contact" class="form-control" />  
                          <br />  
                          <label>Password</label>  
                          <input type="text" name="pass" id="pass" class="form-control" />  
                          <br />  
                          <br />  
                          <label>Account</label>  
                          <select name="account" id="account" class="form-control">  
                               <option value="active">Active</option>  
                               <option value="deactive">Deactive</option>  
                          </select>  
                          <br />  						  
                          <input type="hidden" name="users_id" id="users_id" />  
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
           $('#inserthd').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
 
      $(document).on('click', '.Edit_data', function(){  
	    var users_id = $(this).attr("id");
        $.ajax({  
                url:"fetchd.php",  
                method:"POST",  
                data:{users_id:users_id},  
                dataType:"json",  
                success:function(data){  
				$('#photo').val(data.photo);  
				$('#username').val(data.username);  
                $('#email').val(data.email);  
                $('#contact').val(data.contact);  
                $('#account').val(data.account);  
                $('#users_id').val(data.id);  
                     $('#inserthd').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#username').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#Contact').val() == '')  
           {  
                alert("Contact is required");  
           }  
           else if($('#email').val() == '')  
           {  
                alert("email is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"inserthd.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#inserthd').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#users').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.View_data', function(){  
           var users_id = $(this).attr("id");  
           if(users_id != '')  
           {  
                $.ajax({  
                     url:"selecthd.php",  
                     method:"POST",  
                     data:{users_id:users_id},  
                     success:function(data){  
                          $('#users_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script>
 


 
  <?php  
 //fetchd.php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 if(isset($_POST["users_id"]))  
 {  
      $query = "SELECT * FROM users WHERE id = '".$_POST["users_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 
