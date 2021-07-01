 <?php  
 //fetch.php  
 $connect = mysqli_connect("localhost", "root", "", "donor");  
 if(isset($_POST["donate_Id"]))  
 {  
      $query = "SELECT * FROM donate WHERE Id = '".$_POST["donate_Id"]."'";  
      $result = mysqli_query($connect, $query);  
      $row = mysqli_fetch_array($result);  
      echo json_encode($row);  
 }  
 ?>
 
 