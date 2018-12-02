<?php
function getRooms($database) {
	// Get list of books
	$sql = file_get_contents('sql/getRooms.sql');
	$statement = $database->prepare($sql);
	$statement->execute();
	$rooms = $statement->fetchAll(PDO::FETCH_ASSOC);
	return $rooms;
}

function getRoom($roomID, $database){
    $sql = file_get_contents('sql/getUserRoom.sql');
    $params = array(
        'roomID' => $roomID
    );
    $statement = $database->prepare($sql);
    $statement->execute($params);
    $room = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $room;
}

function checkValue($value){
    if(value == 1){
        return "true";
    }
    else {
        return "false";
    }
}

function getLights($roomID, $database){
    $sql = file_get_contents('sql/getLight.sql');
    $params = array(
        'roomID' => $roomID
    );
    $statement = $database->prepare($sql);
    $statement->execute($params);
    $room = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $room;
}

function getValue($database){
    $sql = file_get_contents('sql/getValue.sql');
    $statement = $database->prepare($sql);
    $statement->execute();
    $value = $statement->fetchAll(PDO::FETCH_ASSOC);
    return $value;
}