<?php
include('config.php');
include('functions.php');

$roomID = $_GET['roomID'];
$room = getRoom($roomID, $database);
if (!isset($_SESSION['roommateID']) && $room[0]['roommateID'] != 4) {
    header("Location: login.php");
}

$userID = $_SESSION['roommateID'];
if($room[0]['roommateID'] != $userID && $room[0]['roommateID'] != 4){
    header('location: login.php');
}

$light = getLights($roomID, $database);

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
    <link rel="stylesheet" href="newRoomCheck.css">
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
        <table>
  <thead>
    <tr>
      <th>
        Light ID
      </th>
      <th>
        Light 
      </th>
      <th>
        Room ID
      </th>
        <th>
        ON/OFF
      </th>
    </tr>
  </thead>
  <tbody>
    <?php foreach($light as $lights) : ?>
            <tr>
                <td><?php echo $lights['lightID']; ?></td>
                <td><?php echo $lights['lightName']; ?></td>
                <td><?php echo $lights['roomID']; ?></td>
                <td>
                <div class="switch">
  <input type="checkbox" name="switch" id="switch">
  <label for="switch"></label>
</div>
                </td>
            </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    
    </body>
    
</html>