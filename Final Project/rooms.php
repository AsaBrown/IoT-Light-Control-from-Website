<?php
include('config.php');
include('functions.php');

$rooms = getRooms($database);
?>
<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	
  	<title>The Apartment</title>
	<meta name="description" content="The HTML5 Herald">
	<meta name="author" content="SitePoint">
    <script type="text/javascript" src="scripts.js"></script>
	<link rel="stylesheet" href="roomsStyle.css">
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
    <body id="">
        <table>
  <thead>
    <tr>
      <th>
        Room ID
      </th>
      <th>
        Room 
      </th>
      <th>
        Permissions
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($rooms as $room) : ?>
            <tr>
                <td><?php echo $room['roomID']; ?></td>
                <td><a href="newRoom.php?roomID=<?php echo $room['roomID']; ?>"><?php echo $room['roomName']; ?></a></td>
                <td><?php echo $room['roommateID']; ?></td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    </body>
    
</html>