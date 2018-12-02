<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

$action = $_GET['action'];

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$lightName = $_POST['lightName'];
    $roomID = $_POST['roomID'];
		if($action == 'add') {
            $sql = file_get_contents('sql/insertLight.sql');
            $params = array(
                'lightName' => $lightName,
                'roomID' => $roomID
            );

            $statement = $database->prepare($sql);
            $statement->execute($params);
        }
        elseif ($action == 'edit') {
            $sql = file_get_contents('sql/editLight.sql');
            $params = array(
                'lightName' => $lightName,
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
            <h1>NEW LIGHT &nbsp;</h1>
            <h3>Add a new light</h3>
          </div>
          <div class="row body">
            <form action="" method="POST">
              <ul>

                <li>
                  <p class="left">
                    <label for="lightName">Light Name</label>
                    <input type="text" name="lightName" placeholder="Living Room" />
                    </p>
                    <p>
                        <label for="roomID">Room ID</label>
                        <input type="text" name="roomID" placeholder="Enter a number (4 = public)"/>
                    </p>
                    <p>
                        <label for="lightID">Light ID</label>
                        <input type="text" name="lightID" placeholder="Enter a number (4 = public)"/>
                    </p>
                </li>
                <li>
                  <input class="btn btn-submit" type="submit" value="Submit" />
                  <small><a href="addLight.php?action=edit">Edit an existing light</a> </small>
                </li>

              </ul>
            </form>  
          </div>
        </div>

    
    </body>
    
</html>