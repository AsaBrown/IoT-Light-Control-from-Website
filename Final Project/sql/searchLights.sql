SELECT lights.lightID, lights.lightName, rooms.roomName, rooms.roommateID
FROM lights
JOIN rooms on lights.roomID = rooms.roomID
WHERE roommateID = :roommateID
OR roommateID = '4';
