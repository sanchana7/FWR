 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 if(isset($_POST["users_id"]))  
 {  
      $query = "SELECT * FROM users WHERE id = '".$_POST["users_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 
 