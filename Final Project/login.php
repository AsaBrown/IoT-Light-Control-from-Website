<?php
include('config.php');
include('functions.php');


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	// Get username and password from the form as variables
	$username = $_POST['username'];
	$password = $_POST['password'];
	
	// Query records that have usernames and passwords that match those in the customers table
	$sql = file_get_contents('sql/attemptLogin.sql');
	$params = array(
		'username' => $username,
		'password' => $password
	);
	$statement = $database->prepare($sql);
	$statement->execute($params);
	$users = $statement->fetchAll(PDO::FETCH_ASSOC);
	
	// If $users is not empty
	if(!empty($users)) {
		// Set $user equal to the first result of $users
		$user = $users[0];
		
		// Set a session variable with a key of customerID equal to the customerID returned
		$_SESSION['roommateID'] = $user['roommateID'];
		
		// Redirect to the index.php file
		header('location: index.php');
	}
    print_r($users);
}
?>
<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	
  	<title>The Apartment</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">
    <script type="text/javascript" src="scripts.js"></script>
	<link rel="stylesheet" href="addRoomStyle.css">
    <link rel="stylesheet" href="header.css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    
	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
        
    </head>
    <header>
        <nav id="del">
            <ul id="header">
                <li><a href="index.php">Home</a></li>
                <li><a href="rooms.php">Rooms</a></li> 
                <li><a href="addLight.php?action=add">Add Light</a></li>
                <li><a href="addRoom.php?action=add">Add Room</a></li>
                <li><a href="searchLights.php?roommateID=4">Search Lights</a></li>
            </ul>
        </nav>
    </header>
    <body>
        <div class="container">
            <div class="row header">
                <h1>NEW ROOM &nbsp;</h1>
                <h3>Add a new room</h3>
            </div>
            <div class="row body">
                <form method="POST">
                    <ul>
                    <li>
                    <p class="left">
                    <label for="username">Username</label>
                    <input type="text" name="username" placeholder="Username" />
                    </p>
                    </li>
                    <li>
                    <p>
                    <label for="password">Password</label>
                    <input type="text" name="password" placeholder="Password"/>
                    </p>
                    </li>
                    <li>
                    <input class="btn btn-submit" type="submit" value="Submit" />
                    </li>
                    </ul>
                </form>  
            </div>
        </div>
    </body> 
</html>