<?php
//include('class.Roommate.php');

// Connecting to the MySQL database
$DB_USER = "browna62";
$DB_PASSWORD = '$1$huyiS';

$database = new PDO('mysql:host=csweb.hh.nku.edu;dbname=db_fall18_browna62', $DB_USER, $DB_PASSWORD);

// Start the session
session_start();

$current_url = basename($_SERVER['REQUEST_URI']);


/*
if (isset($_SESSION['roommateID'])) {    
    $roommateNew = new Roommate($_SESSION['roommateID'], $database);
    $roommate = $roommateNew;
    $_SESSION['roommate'] = $roommate;
}
*/

function my_autoloader($class) {
    include('class.' . $class . '.php');
}

spl_autoload_register('my_autoloader');