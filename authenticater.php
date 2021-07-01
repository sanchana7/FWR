<?php      
    include('connectr.php');  
    $username = $_POST['username'];
    $last_name = $_POST['last'];
    $email = $_POST['email']; 
    $password = $_POST['password'];
      
      
        //to prevent from mysqli injection  
        $first_name = stripcslashes($first_name);
        $last_name = stripcslashes($last_name);
        $email = stripcslashes($email); 
        $password = stripcslashes($password);  
        $cpassword = stripcslashes($cpass); 
      	$username = mysqli_real_escape_string($con, $first_name);  
        $last_name = mysqli_real_escape_string($con, $last_name);  
        $email = mysqli_real_escape_string($con, $email);  
		$password = mysqli_real_escape_string($con, $password);
		$cpassword = mysqli_real_escape_string($con, $cpassword);  
      
        $sql = "select *from login where first_name = '$first_name', last_name = '$last_name', email = '$email', password = '$password' and cpassword = '$cpassword'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1> Donate Successful.</h1>";  
        }  
        else{  
            echo "<h1> Donate failed. Invalid username or password.</h1>";  
        }     
?>  