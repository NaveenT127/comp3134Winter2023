<!DOCTYPE html>
<html>
<head>
	<title>Get Users</title>
</head>
<body>
	<h1>Get Users</h1>

	<form action="" method="get">
		<label for="firstname">Enter First Name:</label>
		<input type="text" name="firstname" id="firstname">
		<input type="submit" value="Search">
	</form>

	<?php
		// Get the search term from the form input
		$search_term = $_GET['firstname'];

		// Open a connection to the database
		$mysqli = new mysqli("localhost", "webuser", "password", "users");

		// Prepare the SQL statement with a parameter placeholder
		$stmt = $mysqli->prepare("SELECT id, username, email, firstname, lastname, active FROM users WHERE firstname = ? AND active = 1");

		// Bind the search term to the parameter placeholder
		$stmt->bind_param("s", $search_term);

		// Execute the SQL statement
		$stmt->execute();

		// Bind the result columns to variables
		$stmt->bind_result($id, $username, $email, $firstname, $lastname, $active);

		// Display the results in an HTML table
		echo "<table border='1'>";
		echo "<tr><th>ID</th><th>Username</th><th>Email</th><th>First Name</th><th>Last Name</th><th>Active</th></tr>";
		while ($stmt->fetch()) {
			echo "<tr><td>$id</td><td>$username</td><td>$email</td><td>$firstname</td><td>$lastname</td><td>$active</td></tr>";
		}
		echo "</table>";

		// Close the statement and connection
		$stmt->close();
		$mysqli->close();
	?>
</body>
</html>
