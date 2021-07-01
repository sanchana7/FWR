<?php

?>

<head>
	<title><title>
	<?php include 'css/style.css'; ?>
	<?php include 'links/links.php'; ?>
<head>
<body>

<div class="main-div">
	<h1>List of Hotel Food Donation<h1>
    <div class="center-div">
        <div class="table-response">   
        <table>
            <thead>
                <th>id</th>
                <th>username</th>
                <th>email</th>
                <th>ftype</th>
				<th>ctime</th>
				<th>cdate</th>
				<th>quantity</th>
				<th>address</th>
				<th>Action</th>
			<thead>	
			<tbody>
<?php
		include 'dbhd.php';
		$selectquery = "select * from donate ";
		$query = mysqli_query($con,$selectquery);
		while($result = mysqli_fetch_assoc($query)){
			
			<tr>
		<td><?php echo $result['id'}]username</td>
                <td>email</td>
                <td>ftype</td>
				<td>ctime</td>
				<td>cdate</td>
				<td>quantity</td>
				<td>address</td>
				<td>Action</td>
			</tr>	
			
		}
		
		
?>	
			</tbody>	
		</table>
		</div>
	</div>
</div>		
</body>	
</html>