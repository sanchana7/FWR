
  <?php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $photo = mysqli_real_escape_string($connect, $_POST["photo"]);  
      $username = mysqli_real_escape_string($connect, $_POST["username"]);  
      $email = mysqli_real_escape_string($connect, $_POST["email"]);  
      $contact = mysqli_real_escape_string($connect, $_POST["contact"]);  
      $account = mysqli_real_escape_string($connect, $_POST["account"]);  
      
      if($_POST["users_id"] != '')  
      {  
           $query = "  
           UPDATE users   
           SET photo='$photo',   
           username='$username',   
           email='$email',   
           contact='$contact',   
           account = '$account'   
           WHERE id='".$_POST["users_id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO users(photo,username, email, contact, account)  
           VALUES('$photo','$username', '$email', '$contact', '$account');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM users ORDER BY id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Hotel Donor Detail List</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["username"] . '</td>  
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
 
