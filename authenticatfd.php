<?php      
    include('connectfd.php');  
    $username = $_POST['username'];
    $email = $_POST['email']; 
    $ftype = $_POST['ftype']; 
    $cdate = $_POST['cdate']; 
    $ctime = $_POST['ctime']; 
    $quantity = $_POST['quantity']; 
    $addr_s = $_POST['addr_s']; 
      
      
        //to prevent from mysqli injection  
        $username = stripcslashes($username);
        $email = stripcslashes($email); 
        $ftype = stripcslashes($ftype);  
        $cdate = stripcslashes($cdate); 
        $ctime = stripcslashes($ctime);
		$quantity = stripcslashes($quantity); 
        $addr_s = stripcslashes($addr_s); 
        $username = mysqli_real_escape_string($con, $username);  
        $email = mysqli_real_escape_string($con, $email);  
		$ftype = mysqli_real_escape_string($con, $ftype);
		$cdate = mysqli_real_escape_string($con, $cdate);  
        $quantity = mysqli_real_escape_string($con, $quantity);  
        $addr_s = mysqli_real_escape_string($con, $addr_s);  
      
        $sql = "select *from donate where username = '$username',  email = '$email', ftype = '$ftype', cdate = '$cdate', ctime = '$ctime', quantity = '$quantity', and addr_s = '$addr_s'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){  
            echo "<h1> Registration Successful.</h1>";  
        }  
        else{  
            echo "<h1> Login failed. Invalid username or password.</h1>";  
        }     
?>  