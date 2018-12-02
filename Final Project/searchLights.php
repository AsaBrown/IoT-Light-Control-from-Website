<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

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
                <h1>SEARCH LIGHTS &nbsp;</h1>
                <h3>Search Lights</h3>
            </div>
            <div class="row body">
                <form action="" method="GET">
                  <ul>
                    <li>
                      <p class="left">
                        <label for="roommateID">Roommate ID</label>
                        <input type="text" name="roommateID" placeholder="enter a number" />
                        </p>
                    </li>
                    <li>
                      <input class="btn btn-submit" type="submit" value="Submit" />
                    </li>
                  </ul>
                </form>  
            </div>
        </div>
        
        <?php
        if($_SERVER['REQUEST_METHOD'] == 'GET'){
            $roommateID = $_GET['roommateID'];
            $sql = file_get_contents('sql/searchLights.sql');
            $params = array(
                'roommateID' => $roommateID
            );
            $statement = $database->prepare($sql);
            $statement->execute($params);
            $lights = $statement->fetchAll(PDO::FETCH_ASSOC); 
        }
        ?>
        
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
                Room  
              </th>
                <th>
                Permissions
              </th>
            </tr>
          </thead>
          <tbody>
            <?php foreach($lights as $light) : ?>
                <tr>
                    <td><?php echo $light['lightID']; ?></td>
                    <td><?php echo $light['lightName']; ?></td>
                    <td><?php echo $light['roomName']; ?></td>
                    <td><?php echo $light['roommateID']; ?></td>
                </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
    </body>
</html>