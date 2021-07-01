 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 if(isset($_POST["contact_id"]))  
 {  
      $query = "SELECT * FROM contact WHERE id = '".$_POST["contact_id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 
 