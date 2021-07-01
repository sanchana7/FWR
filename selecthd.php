 <?php  
 if(isset($_POST["users_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "donor");  
      $query = "SELECT * FROM users WHERE id = '".$_POST["users_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>HotelDonor</label></td>  
                     <td width="70%">'.$row["username"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Contact</label></td>  
                     <td width="70%">'.$row["contact"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Account</label></td>  
                     <td width="70%">'.$row["account"].'</td>  
                </tr>  
                  
           ';  
      }  
      $output .= '  
           </table>  
      </div>  
      ';  
      echo $output;  
 }  
 ?>
 
