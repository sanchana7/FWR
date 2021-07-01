<?php      
    include('connecthdnow.php');  
    $username = $_POST['username'];
    $email = $_POST['email'];
    $foodtype = $_POST['foodtype']; 
    $cdate = $_POST['cdate'];
	$ctime = $_POST['ctime'];
    $location = $_POST['address'];
    $quantity = $_POST['quantity'];
    
      
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $email = stripcslashes($email); 
        $foodtype = stripcslashes($foodtype); 
        $dateandtime = stripcslashes($cdate); 
        $dateandtime = stripcslashes($ctime); 
        $address = stripcslashes($address);
      	$quantity = stripcslashes($quantity);
      	$username = mysqli_real_escape_string($con, $username);  
        $email = mysqli_real_escape_string($con, $email);  
		$foodtype = mysqli_real_escape_string($con, $foodtype);
		$cdate = mysqli_real_escape_string($con, $cdate);
		$ctime = mysqli_real_escape_string($con, $ctime);  
		$address = mysqli_real_escape_string($con, $address);  
		$quantity = mysqli_real_escape_string($con, $quantity);  
      
        $sql = "select *from donate where username = '$username', email = '$email', foodtype = '$foodtype', cdate = '$date', ctime = '$ctime', address = '$address' quantity = '$quantity'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1> Donate Successful.</h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  