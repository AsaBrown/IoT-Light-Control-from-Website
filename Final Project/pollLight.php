<?php
include('config.php');
include('functions.php');

$value = getValue($database);
$value = $value[0]['value'];
?>
<!doctype html>
<html lang="en">
    <head>
	<meta charset="utf-8">
	
  	<title>The Apartment</title>
    
	<!--[if lt IE 9]>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script>
  	<![endif]-->
    </head>
    
    <?php echo '_v'.$value.'##' ?>
    
</html>