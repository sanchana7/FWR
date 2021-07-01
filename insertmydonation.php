
  <?php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 
 if(!empty($_POST))  
 {  
      $output = '';  
      $message = '';  
      $username = mysqli_real_escape_string($connect, $_POST["username"]);  
      $email = mysqli_real_escape_string($connect, $_POST["email"]);  
      $ftype = mysqli_real_escape_string($connect, $_POST["ftype"]);  
      $ctime = mysqli_real_escape_string($connect, $_POST["ctime"]);  
      $cdate = mysqli_real_escape_string($connect, $_POST["cdate"]);  
      $quantity = mysqli_real_escape_string($connect, $_POST["quantity"]);  
      $address = mysqli_real_escape_string($connect, $_POST["address"]);  
      $Action = mysqli_real_escape_string($connect, $_POST["Action"]);  
      $comment = mysqli_real_escape_string($connect, $_POST["comment"]);  
      
      if($_POST["donate_Id"] != '')  
      {  
           $query = "  
           UPDATE donate   
           SET username='$username',   
           email='$email',   
           ftype='$ftype',   
           ctime = '$ctime',   
           cdate = '$cdate' ,  
           quantity = '$quantity',   
           address = '$address' ,  
           WHERE Id='".$_POST["donate_Id"]."'";  
           $message = 'Data Updated';  
      }  
      else  
      {  
           $query = "  
           INSERT INTO donate(username, email, ftype, ctime, cdate, quantity, address)  
           VALUES('$username', '$email', '$ftype', '$ctime', '$cdate', '$quantity', '$address');  
           ";  
           $message = 'Data Inserted';  
      }  
      if(mysqli_query($connect, $query))  
      {  
           $output .= '<label class="text-success">' . $message . '</label>';  
           $select_query = "SELECT * FROM donate ORDER BY Id DESC";  
           $result = mysqli_query($connect, $select_query);  
           $output .= '  
                <table class="table table-bordered">  
                     <tr>  
                          <th width="70%">Donate List</th>  
                          <th width="15%">Edit</th>  
                          <th width="15%">View</th>  
                     </tr>  
           ';  
           while($row = mysqli_fetch_array($result))  
           {  
                $output .= '  
                     <tr>  
                          <td>' . $row["username"] . '</td>  
                          <td><input type="button" name="edit" value="Edit" id="'.$row["Id"] .'" class="btn btn-info btn-xs Edit_data" /></td>  
                          <td><input type="button" name="view" value="View" id="' . $row["Id"] . '" class="btn btn-info btn-xs View_data" /></td>  
                     </tr>  
                ';  
           }  
           $output .= '</table>';  
      }  
      echo $output;  
 }  
 ?>
 
