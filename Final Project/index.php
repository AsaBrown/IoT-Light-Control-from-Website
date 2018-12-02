<?php

// Create and include a configuration file with the database connection
include('config.php');

// Include functions for application
include('functions.php');

$value = getValue($database);
$value = $value[0]['value'];
if($value == 0){
    $value = "";
    $inverse = 1;
    $css = "night";
}
else {
    $value = "checked";
    $inverse = 0;
    $css = "day";
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $sql = file_get_contents('sql/setValue.sql');
    $params = array(
                'value' => $inverse
    );
    $statement = $database->prepare($sql);
    $statement->execute($params);
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
	<link rel="stylesheet" href="style.css">
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
    <body id="<?php echo $css ?>">
        <div class="light">
            <form method="POST">
            <input <?php echo $value ?> id="l" class="l" type="checkbox" onchange="this.form.submit()" onclick="getBackColor()" >
            </form>
        </div>
        <div id='city'>
        </div>
    
    </body>
    
</html>