
  <?php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $name = mysqli_real_escape_string($connect, $_POST["name"]);  
      $email = mysqli_real_escape_string($connect, $_POST["email"]);  
      $comment = mysqli_real_escape_string($connect, $_POST["comment"]);  
      $reply = mysqli_real_escape_string($connect, $_POST["reply"]);  
      
      if($_POST["contact_id"] != '')  
      {  
           $query = "  
           UPDATE contact   
           SET name='$name',   
           email='$email',   
           comment = '$comment',   
           reply = '$reply'   
           WHERE id='".$_POST["contact_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO contact(name, email, comment, reply)  
           VALUES('$name', '$email', '$comment', '$reply');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM contact ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Contact List</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["name"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["id"] .'" class="btn btn-info btn-xs Edit_data" /></td>  
                          <td><input type="button" name="view" value="View" id="' . $row["id"] . '" class="btn btn-info btn-xs View_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 
