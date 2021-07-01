<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "donor";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

if(isset($_POST['name'])){ $name = $_POST['name']; }
if(isset($_POST['email'])){ $email = $_POST['email']; }
if(isset($_POST['comment'])){ $comment = $_POST['comment']; }


$sql = "INSERT INTO `contact`(`id`, `name`, `email`, `comment`) 
					VALUES ('id','$name','$email','$comment')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('New record created successfully');</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();

?>