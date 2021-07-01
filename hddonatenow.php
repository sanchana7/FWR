<?php include('serverhdnow.php') ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" 
	integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="hdnow.css">
	<title>Hotel Donor</title>
</head>

<body>
	<center>
		<h1>Donate Food</h1>
			<form method="post" action="hdnow.php">
  
			<p>
				<label for="username">User Name:</label>
				<input type="text" name="username" id="username">
			</p>
			
			<p>
				<label for="emailAddress">Email Address:</label>
				<input type="text" name="email" id="email">
			</p>


			
			<p>
				<label for="foodtype">Food Type:</label>
				<input type="text" name="ftype" id="ftype">
			</p>


			
			<p>
				<label for="Date">Cooking Date</label>
				<input type="date" name="cdate" min="2021-06-11"  id="cdate">
			</p>

			<p>
				<label for="Time">Cooking Time</label>
				<input type="time" name="ctime" id="ctime">
			</p>

			<p>
				<label for="quantity">Quantity</label>
				<input type="text" name="quantity" id="quantity">
			</p>

			
			<p>
				<label for="addr_s">Address</label>
				<input type="text" name="addr_s" id="addr_s">
			</p>

			
			<input type="submit" value="Submit">
		</form>
	</center>
</body>

</html>








