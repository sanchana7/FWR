 <?php  
 if(isset($_POST["contact_id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "donor");  
      $query = "SELECT * FROM contact WHERE id = '".$_POST["contact_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $output .= '  
      <div class="table-responsive">  
           <table class="table table-bordered">';  
      while($row = mysqli_fetch_array($result))  
      {  
           $output .= '  
                <tr>  
                     <td width="30%"><label>Name</label></td>  
                     <td width="70%">'.$row["name"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Email</label></td>  
                     <td width="70%">'.$row["email"].'</td>  
                </tr>  
                <tr>  
                    <td width="30%"><label>Message</label></td>  
                     <td width="70%">'.$row["comment"].'</td>  
              </tr>
			  <tr>  
                    <td width="30%"><label>Reply</label></td>  
                     <td width="70%">'.$row["reply"].'</td>  
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
 
