 <?php  
 if(isset($_POST["donate_Id"]))  
 {  
      $output = '';  
      $connect = mysqli_connect("localhost", "root", "", "donor");  
      $query = "SELECT * FROM donate WHERE Id = '".$_POST["donate_Id"]."'";  
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
                     <td width="30%"><label>FoodType</label></td>  
                     <td width="70%">'.$row["f_type"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>FoodDetail</label></td>  
                     <td width="70%">'.$row["fdetail"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>CookingTime</label></td>  
                     <td width="70%">'.$row["ctime"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>CookingDate</label></td>  
                     <td width="70%">'.$row["ctime"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Quantity</label></td>  
                     <td width="70%">'.$row["quantity"].'</td>  
                </tr>  
                <tr>  
                     <td width="30%"><label>Address</label></td>  
                     <td width="70%">'.$row["address"].'</td>  
              </tr>  
                <tr>  
                     <td width="30%"><label>Action</label></td>  
                     <td width="70%">'.$row["Action"].'</td>  
              </tr>  
              <tr>  
                     <td width="30%"><label>Comment</label></td>  
                     <td width="70%">'.$row["comment"].'</td>  
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
 
