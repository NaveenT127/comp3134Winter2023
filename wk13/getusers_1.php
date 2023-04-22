<!DOCTYPE html>
<html>
<head>
	<title>Get Users</title>
</head>
<body>
	<h1>Get Users</h1>
	<form method="GET">
		<label>First Name:</label>
		<input type="text" name="first_name">
		<input type="submit" value="Search">
	</form>
	<br>
	<?php
		if(isset($_GET['first_name'])) {
			
			$servername = "localhost";
			$username = "root";
			$password = "naveen123";
			$dbname = "users";
			
			// Create connection
			$conn = new mysqli("localhost", "root", "", "users");

			// echo "test";
			// Check connection
			if ($conn->connect_error) {
				die("Connection failed: " . $conn->connect_error);
			}else{
				echo "connection success";
			} 
            

			$sql = "SELECT * FROM users WHERE username='" . $_GET['first_name'] . "' AND active=1";
			$result = $conn->query($sql);

			if ($result->num_rows > 0) {
				echo "<table border='1'>";
				echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Active</th></tr>";
				// output data of each row
				while($row = $result->fetch_assoc()) {
					echo "<tr><td>" . $row["id"]. "</td><td>" . $row["username"]. "</td><td>" . $row["email"]. "</td><td>" . $row["firstname"]. "</td><td>" . $row["lastname"]. "</td><td>" . $row["active"]. "</td></tr>";
				}
				echo "</table>";
			} else {
				echo "0 results";
			}

			$conn->close();
		}
	?>
</body>
</html>
