<?php      
    $host = "localhost";  
    $username = "";  
    $password = '';  
    $db_name = "donate";  
      
    $con = mysqli_connect($host, $username,  $email, $ftype, $cdate, $ctime, $address, $quantity, $db_donate);  
    if(mysqli_connect_errno()) {  
        die("Failed to connect with MySQL: ". mysqli_connect_error());  
    }  
?>  