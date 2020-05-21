<?php 
	
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "country";

	// Create connection
	$conn = new mysqli($servername, $username, $password, $dbname);
	// Check connection
	if ($conn->connect_error) {
	  die("Connection failed: " . $conn->connect_error);
	}

	$sql = "SELECT * FROM country_data";
	$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html>
<head>
	<title>Country Flags</title>
	
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">

	<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
</head>
<body>
	<div class="container">
	  	<h2>Country Flags</h2>
	  	<p>Here are list of all country and its flag:</p>            
	  
	  	<table id="example" class="table table-striped table-bordered" style="width:100%">
	        <thead>
	            <tr>
	                <th>No</th>
	                <th>Country Name</th>
	                <th>Code 1</th>
	                <th>Code 2</th>
	                <th>Flag</th>
	            </tr>
	        </thead>
	        <tbody>
	        	<?php
	        		if ($result->num_rows > 0) {
	        			while($row = $result->fetch_assoc()) {
	        				echo '<tr>
					                <td>'.$row['id_country'].'</td>
					                <td>'.$row['country_name'].'</td>
					                <td>'.$row['code1'].'</td>
					                <td>'.$row['code2'].'</td>
					                <td><img src="img-country-flag/'.$row['flag'].'"></td>
					            </tr>';
	        			}
	        		}
	        	?>
	        </tbody>
	        <tfoot>
	            <tr>
	                <th>No</th>
	                <th>Country Name</th>
	                <th>Code 1</th>
	                <th>Code 2</th>
	                <th>Flag</th>
	            </tr>
	        </tfoot>
    	</table>
    	<br>

	</div>

	<script type="text/javascript">
		$(document).ready(function() {
	    $('#example').DataTable();
	} );
	</script>
</body>
</html>