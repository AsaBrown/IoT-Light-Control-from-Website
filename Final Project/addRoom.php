<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

$action = $_GET['action'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$roomName = $_POST['roomName'];
	$roommateID = $_POST['roommateID'];
    $roomID = $_POST['roomID'];
		if($action == 'add') {
            $sql = file_get_contents('sql/insertRoom.sql');
            $params = array(
                'roomName' => $roomName,
                'roommateID' => $roommateID
            );

            $statement = $database->prepare($sql);
            $statement->execute($params);
        }
        elseif ($action == 'edit') {
            $sql = file_get_contents('sql/editRoom.sql');
            $params = array(
                'roomName' => $roomName,
                'roommateID' => $roommateID,
                'roomID' => $roomID
            );

            $statement = $database->prepare($sql);
            $statement->execute($params);
    }
}
?>
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
        <form action="" method="POST">
            <ul>

            <li>
            <p class="left">
            <label for="roomName">Room Name</label>
            <input type="text" name="roomName" placeholder="Living Room" />
            </p>
            <p>
            <label for="roommateID">Permission</label>
            <input type="text" name="roommateID" placeholder="Enter a number (4 = public)"/>
            </p>
            <p>
            <label for="roomID">Room ID</label>
            <input type="text" name="roomID" placeholder="Enter a number (4 = public)"/>
            </p>
            </li>
            <li>
            <input class="btn btn-submit" type="submit" value="Submit" />
            <small><a href="addRoom.php?action=edit">Edit an existing room</a> </small>
            </li>
            </ul>
        </form>  
    </div>
</div>

    
    </body>
</html>